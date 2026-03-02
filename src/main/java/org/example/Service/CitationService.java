package org.example.Service;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.Random;

public class CitationService {

    // API principale
    private static final String API_URL = "https://zenquotes.io/api/random";

    // API de secours
    private static final String API_URL_BACKUP = "https://api.quotable.io/random?tags=motivational|success|productivity";

    public String[] getCitation() {
        // Essayer API principale ZenQuotes
        String[] result = fetchFromZenQuotes();
        if (result != null) return result;

        // Essayer API de secours Quotable
        result = fetchFromQuotable();
        if (result != null) return result;

        // Si les deux APIs sont hors ligne → citation aléatoire parmi 10
        return getRandomDefaultCitation();
    }

    // ===== API 1 : ZenQuotes =====
    private String[] fetchFromZenQuotes() {
        try {
            URL url = new URL(API_URL);
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setRequestMethod("GET");
            conn.setConnectTimeout(5000);
            conn.setReadTimeout(5000);
            conn.setRequestProperty("User-Agent", "MindBood-App");

            if (conn.getResponseCode() != 200) return null;

            BufferedReader reader = new BufferedReader(
                    new InputStreamReader(conn.getInputStream())
            );
            StringBuilder response = new StringBuilder();
            String line;
            while ((line = reader.readLine()) != null) response.append(line);
            reader.close();

            // Format ZenQuotes: [{"q":"citation","a":"auteur"}]
            String json = response.toString();
            String content = extractJsonArray(json, "q");
            String author  = extractJsonArray(json, "a");

            if (content != null && author != null && !content.isEmpty()) {
                System.out.println("Citation ZenQuotes chargée !");
                return new String[]{content, author};
            }

        } catch (Exception e) {
            System.out.println("ZenQuotes non disponible: " + e.getMessage());
        }
        return null;
    }

    // ===== API 2 : Quotable =====
    private String[] fetchFromQuotable() {
        try {
            URL url = new URL(API_URL_BACKUP);
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setRequestMethod("GET");
            conn.setConnectTimeout(5000);
            conn.setReadTimeout(5000);

            if (conn.getResponseCode() != 200) return null;

            BufferedReader reader = new BufferedReader(
                    new InputStreamReader(conn.getInputStream())
            );
            StringBuilder response = new StringBuilder();
            String line;
            while ((line = reader.readLine()) != null) response.append(line);
            reader.close();

            String json = response.toString();
            String content = extractJson(json, "content");
            String author  = extractJson(json, "author");

            if (content != null && author != null) {
                System.out.println("Citation Quotable chargée !");
                return new String[]{content, author};
            }

        } catch (Exception e) {
            System.out.println("Quotable non disponible: " + e.getMessage());
        }
        return null;
    }

    // ===== Parser ZenQuotes (format array) =====
    private String extractJsonArray(String json, String key) {
        String search = "\"" + key + "\":\"";
        int start = json.indexOf(search);
        if (start == -1) return null;
        start += search.length();
        int end = json.indexOf("\"", start);
        if (end == -1) return null;
        return json.substring(start, end);
    }

    // ===== Parser Quotable (format object) =====
    private String extractJson(String json, String key) {
        String search = "\"" + key + "\":\"";
        int start = json.indexOf(search);
        if (start == -1) return null;
        start += search.length();
        int end = json.indexOf("\"", start);
        if (end == -1) return null;
        return json.substring(start, end);
    }

    // ===== 10 Citations par défaut aléatoires =====
    private String[] getRandomDefaultCitation() {
        String[][] citations = {
                {"La productivité, c'est ne jamais rien faire par accident.", "Atkinson"},
                {"Le succès, c'est tomber sept fois et se relever huit.", "Proverbe japonais"},
                {"La discipline est le pont entre les objectifs et les accomplissements.", "Jim Rohn"},
                {"Commencez par faire ce qui est nécessaire, puis ce qui est possible.", "François d'Assise"},
                {"Le secret de votre futur est caché dans votre routine quotidienne.", "Mike Murdock"},
                {"Un objectif sans plan n'est qu'un souhait.", "Antoine de Saint-Exupéry"},
                {"La seule façon de faire du bon travail est d'aimer ce que vous faites.", "Steve Jobs"},
                {"Ne comptez pas les jours, faites que les jours comptent.", "Muhammad Ali"},
                {"La motivation vous met en marche, l'habitude vous fait avancer.", "Jim Ryun"},
                {"Chaque expert a un jour été un débutant.", "Helen Hayes"},
        };

        int index = new Random().nextInt(citations.length);
        System.out.println("Citation par défaut aléatoire #" + (index + 1));
        return citations[index];
    }
}