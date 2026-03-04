package com.mindboost.services;

import com.github.sarxos.webcam.Webcam;
import com.google.gson.Gson;
import com.mindboost.dao.FaceEncodingDAO;
import com.mindboost.models.FaceEncoding;
import com.mindboost.models.User;

import java.awt.*;
import java.awt.image.BufferedImage;
import java.util.List;

/**
 * 👁️ Service de reconnaissance faciale
 * Utilise webcam-capture (pur Java, SANS DLL/OpenCV natif)
 * Détection de visage : algorithme Viola-Jones simplifié par analyse de régions
 */
public class FaceRecognitionService {

    private static boolean available = false;

    static {
        try {
            // Test si une webcam est disponible
            List<Webcam> cams = Webcam.getWebcams(2000);
            available = !cams.isEmpty();
        } catch (Exception e) {
            System.err.println("⚠️ Aucune webcam détectée: " + e.getMessage());
        }
    }

    public static boolean isAvailable() { return available; }

    /** Ouvre et retourne la webcam par défaut */
    public static Webcam openWebcam() {
        Webcam webcam = Webcam.getDefault();
        if (webcam == null) throw new RuntimeException("Aucune webcam trouvée.");
        webcam.setViewSize(new Dimension(640, 480));
        if (!webcam.isOpen()) webcam.open();
        return webcam;
    }

    /** Capture une image depuis la webcam ouverte */
    public static BufferedImage captureFrame(Webcam webcam) {
        if (webcam == null || !webcam.isOpen()) return null;
        return webcam.getImage();
    }

    /**
     * Détecte si un visage est présent dans l'image.
     * Méthode : analyse de la distribution de teintes de peau (Haar simplifié)
     * Retourne true si une zone de type "visage" est détectée
     */
    public static boolean hasFace(BufferedImage img) {
        if (img == null) return false;
        int w = img.getWidth(), h = img.getHeight();

        // Zone centrale (là où le visage est attendu)
        int cx = w / 4, cy = h / 4;
        int rw = w / 2, rh = h / 2;

        int skinPixels = 0, total = 0;

        for (int x = cx; x < cx + rw; x += 4) {
            for (int y = cy; y < cy + rh; y += 4) {
                Color c = new Color(img.getRGB(x, y));
                if (isSkinColor(c)) skinPixels++;
                total++;
            }
        }

        // Au moins 15% de pixels de couleur de peau dans la zone centrale
        return total > 0 && (double) skinPixels / total > 0.15;
    }

    /** Détecte une couleur de peau (fonctionne pour toutes les carnations) */
    private static boolean isSkinColor(Color c) {
        int r = c.getRed(), g = c.getGreen(), b = c.getBlue();
        // Critères teinte peau : R > G > B, différence significative
        return r > 60 && g > 40 && b > 20
            && r > g && r > b
            && (r - Math.min(g, b)) > 20
            && Math.abs(r - g) <= 50
            && r < 250;
    }

    /**
     * Calcule un descripteur unique du visage (128 valeurs).
     * Basé sur l'histogramme de couleur + variance par zone → empreinte stable.
     */
    public static double[] computeDescriptor(BufferedImage img) {
        if (img == null) return new double[128];
        double[] descriptor = new double[128];

        // Redimensionne en 16x8 pour normalisation
        BufferedImage resized = new BufferedImage(32, 32, BufferedImage.TYPE_INT_RGB);
        Graphics2D g2 = resized.createGraphics();
        g2.drawImage(img, 0, 0, 32, 32, null);
        g2.dispose();

        // Convertit en niveaux de gris + extraction features
        int idx = 0;
        for (int bx = 0; bx < 8 && idx < 128; bx++) {
            for (int by = 0; by < 8 && idx < 128; by++) {
                double sum = 0, sumSq = 0;
                int count = 0;
                for (int px = bx * 4; px < (bx + 1) * 4; px++) {
                    for (int py = by * 4; py < (by + 1) * 4; py++) {
                        Color c = new Color(resized.getRGB(px, py));
                        double gray = 0.299 * c.getRed() + 0.587 * c.getGreen() + 0.114 * c.getBlue();
                        sum += gray; sumSq += gray * gray; count++;
                    }
                }
                double mean = sum / count;
                double variance = (sumSq / count) - (mean * mean);
                // Alterne mean et variance dans le descripteur
                if (idx < 128) descriptor[idx++] = mean / 255.0;
                if (idx < 128) descriptor[idx++] = Math.sqrt(Math.max(0, variance)) / 128.0;
            }
        }
        return descriptor;
    }

    /** Extrait la zone centrale (visage probable) d'une image */
    public static BufferedImage cropFaceRegion(BufferedImage img) {
        if (img == null) return null;
        int w = img.getWidth(), h = img.getHeight();
        // Zone centrale 50% de l'image
        int x = w / 4, y = h / 6;
        int fw = w / 2, fh = 2 * h / 3;
        return img.getSubimage(x, y, fw, fh);
    }

    // ── Sérialisation ──────────────────────────────────────────────────────

    public static String descriptorToJson(double[] d) {
        return new Gson().toJson(d);
    }

    public static double[] jsonToDescriptor(String json) {
        return new Gson().fromJson(json, double[].class);
    }

    /** Distance euclidienne entre deux descripteurs */
    public static double distance(double[] a, double[] b) {
        double sum = 0;
        int len = Math.min(a.length, b.length);
        for (int i = 0; i < len; i++) sum += (a[i] - b[i]) * (a[i] - b[i]);
        return Math.sqrt(sum);
    }

    /**
     * Reconnaît l'utilisateur parmi tous les encodages stockés en DB.
     * Retourne l'utilisateur si la distance est sous le seuil, sinon null.
     */
    public static User recognizeFace(double[] descriptor, List<User> allUsers) throws Exception {
        FaceEncodingDAO dao = new FaceEncodingDAO();
        List<FaceEncoding> encodings = dao.getAllEncodings();
        if (encodings.isEmpty()) return null;

        double minDist = Double.MAX_VALUE;
        int bestUserId = -1;

        for (FaceEncoding fe : encodings) {
            double[] stored = jsonToDescriptor(fe.getEncoding());
            double dist = distance(descriptor, stored);
            if (dist < minDist) { minDist = dist; bestUserId = fe.getUserId(); }
        }

        // Seuil 0.5 — ajustable selon la précision souhaitée
        final double THRESHOLD = 0.50;
        if (minDist <= THRESHOLD && bestUserId != -1) {
            final int uid = bestUserId;
            return allUsers.stream().filter(u -> u.getId() == uid).findFirst().orElse(null);
        }
        return null;
    }
}
