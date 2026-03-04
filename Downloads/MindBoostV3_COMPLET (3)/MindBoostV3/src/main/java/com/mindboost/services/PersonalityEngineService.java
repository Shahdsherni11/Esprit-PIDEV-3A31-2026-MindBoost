package com.mindboost.services;

import com.mindboost.dao.BehaviorDAO;
import com.mindboost.dao.PsychProfileDAO;
import com.mindboost.models.BehaviorEvent;
import com.mindboost.models.PsychProfile;

import java.util.*;

/**
 * 🧬 Moteur de détection de personnalité par comportement
 * Analyse : vitesse de frappe, temps de pause, patterns de navigation,
 *            nombre de clics, tempo de décision
 */
public class PersonalityEngineService {

    private final BehaviorDAO behaviorDAO = new BehaviorDAO();
    private final PsychProfileDAO psychDAO = new PsychProfileDAO();

    // Buffers de session pour calculs temps-réel
    private final List<Long> typingIntervals = new ArrayList<>();
    private final List<Long> pauseDurations  = new ArrayList<>();
    private final List<String> navSequence   = new ArrayList<>();
    private int clickCount = 0;
    private long sessionStart;
    private long lastKeyTime = 0;
    private long lastActionTime = 0;
    private int userId;
    private String sessionId;

    public PersonalityEngineService(int userId) {
        this.userId = userId;
        this.sessionId = UUID.randomUUID().toString().substring(0, 8);
        this.sessionStart = System.currentTimeMillis();
        this.lastActionTime = sessionStart;
    }

    /** Enregistre une touche pressée */
    public void recordKeyPress() {
        long now = System.currentTimeMillis();
        if (lastKeyTime > 0) {
            long interval = now - lastKeyTime;
            if (interval < 2000) typingIntervals.add(interval);
        }
        lastKeyTime = now;
        checkPause(now);
        lastActionTime = now;
    }

    /** Enregistre un clic */
    public void recordClick(String elementId) {
        clickCount++;
        long now = System.currentTimeMillis();
        checkPause(now);
        lastActionTime = now;
        behaviorDAO.save(new BehaviorEvent(userId, "click",
            "{\"element\":\"" + elementId + "\",\"count\":" + clickCount + "}", sessionId));
    }

    /** Enregistre une navigation vers un écran */
    public void recordNavigation(String screen) {
        navSequence.add(screen);
        behaviorDAO.save(new BehaviorEvent(userId, "navigation",
            "{\"screen\":\"" + screen + "\"}", sessionId));
    }

    private void checkPause(long now) {
        long gap = now - lastActionTime;
        if (gap > 3000 && gap < 120000) { // Pause entre 3s et 2min
            pauseDurations.add(gap);
            behaviorDAO.save(new BehaviorEvent(userId, "pause",
                "{\"duration_ms\":" + gap + "}", sessionId));
        }
    }

    /**
     * Analyse le comportement et met à jour le profil psychologique
     */
    public PsychProfile analyzeAndUpdate() throws Exception {
        PsychProfile profile = psychDAO.getByUserId(userId);
        if (profile == null) profile = new PsychProfile(userId);

        // === ANALYSE VITESSE DE FRAPPE ===
        // Frappe rapide + régulière → focus élevé
        // Frappe lente + irrégulière → anxiété possible
        if (!typingIntervals.isEmpty()) {
            double avgInterval = typingIntervals.stream()
                .mapToLong(Long::longValue).average().orElse(200);
            double stdDev = standardDeviation(typingIntervals);

            if (avgInterval < 150 && stdDev < 50) {
                // Frappe rapide et régulière → très concentré
                profile.setFocus(Math.min(100, profile.getFocus() + 5));
                profile.setAnxiety(Math.max(0, profile.getAnxiety() - 2));
            } else if (avgInterval > 400 || stdDev > 200) {
                // Frappe lente ou très irrégulière → distrait ou anxieux
                profile.setFocus(Math.max(0, profile.getFocus() - 3));
                profile.setAnxiety(Math.min(100, profile.getAnxiety() + 3));
            }
        }

        // === ANALYSE PAUSES ===
        // Beaucoup de longues pauses → réflexif (analytique) ou anxieux
        if (!pauseDurations.isEmpty()) {
            double avgPause = pauseDurations.stream()
                .mapToLong(Long::longValue).average().orElse(0) / 1000.0;
            long longPauses = pauseDurations.stream().filter(p -> p > 10000).count();

            if (longPauses > 3) {
                // Beaucoup de pauses longues → anxieux
                profile.setAnxiety(Math.min(100, profile.getAnxiety() + 4));
                profile.setFocus(Math.max(0, profile.getFocus() - 2));
            } else if (avgPause > 5 && avgPause < 15) {
                // Pauses modérées → réflexif = bonne résilience
                profile.setResilience(Math.min(100, profile.getResilience() + 3));
            }
        }

        // === ANALYSE CLICS ===
        // Clics rapides / nombreux → impulsif ou extraverti
        long sessionMinutes = Math.max(1, (System.currentTimeMillis() - sessionStart) / 60000);
        double clicksPerMin = (double) clickCount / sessionMinutes;

        if (clicksPerMin > 20) {
            profile.setSociability(Math.min(100, profile.getSociability() + 4));
            profile.setFocus(Math.max(0, profile.getFocus() - 2));
        } else if (clicksPerMin < 3) {
            profile.setFocus(Math.min(100, profile.getFocus() + 3));
            profile.setResilience(Math.min(100, profile.getResilience() + 2));
        }

        // === ANALYSE NAVIGATION ===
        // Navigation vers MindBot/profil psy → introspectif
        long introspectNav = navSequence.stream()
            .filter(s -> s.contains("mindbot") || s.contains("psych") || s.contains("profil"))
            .count();
        if (introspectNav > 2) {
            profile.setResilience(Math.min(100, profile.getResilience() + 3));
        }

        // Recalcule type et score anomalie
        profile.recalculateType();
        profile.recalculateAnomaly();

        // Sauvegarde
        psychDAO.save(profile);

        // Reset buffers
        typingIntervals.clear();
        pauseDurations.clear();

        return profile;
    }

    private double standardDeviation(List<Long> values) {
        if (values.isEmpty()) return 0;
        double mean = values.stream().mapToLong(Long::longValue).average().orElse(0);
        double variance = values.stream()
            .mapToDouble(v -> (v - mean) * (v - mean)).average().orElse(0);
        return Math.sqrt(variance);
    }

    public int getUserId() { return userId; }
    public String getSessionId() { return sessionId; }
}
