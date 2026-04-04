package org.example.Service;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

public class MusiqueService {

    private static final String API_URL = "https://itunes.apple.com/search?media=music&limit=5&term=";

    // Retourne une liste de chansons selon la difficulté
    public List<String[]> getSuggestionsMusique(int difficulte) {
        String genre = getGenreParDifficulte(difficulte);
        return fetchMusique(genre);
    }

    // Choisir le genre selon difficulté
    private String getGenreParDifficulte(int difficulte) {
        switch (difficulte) {
            case 1: return "lofi+chill+relaxing";
            case 2: return "ambient+focus+calm";
            case 3: return "deep+focus+instrumental";
            case 4: return "epic+cinematic+intense";
            case 5: return "epic+orchestral+powerful";
            default: return "focus+instrumental";
        }
    }

    // Appel API iTunes
    private List<String[]> fetchMusique(String genre) {
        List<String[]> chansons = new ArrayList<>();
        try {
            String urlStr = API_URL + genre;
            URL url = new URL(urlStr);
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setRequestMethod("GET");
            conn.setConnectTimeout(5000);
            conn.setReadTimeout(5000);
            conn.setRequestProperty("User-Agent", "MindBood-App");

            if (conn.getResponseCode() != 200) {
                return getDefaultChansons(genre);
            }

            BufferedReader reader = new BufferedReader(
                    new InputStreamReader(conn.getInputStream())
            );
            StringBuilder response = new StringBuilder();
            String line;
            while ((line = reader.readLine()) != null) response.append(line);
            reader.close();

            // Parser le JSON manuellement
            String json = response.toString();
            String[] results = json.split("\\{\"wrapperType\"");

            for (int i = 1; i < results.length && chansons.size() < 5; i++) {
                String block = results[i];

                String trackName = extractValue(block, "trackName");
                String artistName = extractValue(block, "artistName");
                String previewUrl = extractValue(block, "previewUrl");

                if (trackName != null && artistName != null) {
                    chansons.add(new String[]{trackName, artistName, previewUrl != null ? previewUrl : ""});
                }
            }

        } catch (Exception e) {
            System.out.println("iTunes API non disponible: " + e.getMessage());
            return getDefaultChansons(genre);
        }

        if (chansons.isEmpty()) return getDefaultChansons(genre);
        return chansons;
    }

    // Extraire valeur JSON
    private String extractValue(String json, String key) {
        String search = "\"" + key + "\":\"";
        int start = json.indexOf(search);
        if (start == -1) return null;
        start += search.length();
        int end = json.indexOf("\"", start);
        if (end == -1) return null;
        return json.substring(start, end);
    }

    // Chansons par défaut si API indisponible
    private List<String[]> getDefaultChansons(String genre) {
        List<String[]> defaults = new ArrayList<>();
        defaults.add(new String[]{"Clair de Lune", "Debussy", ""});
        defaults.add(new String[]{"Experience", "Ludovico Einaudi", ""});
        defaults.add(new String[]{"Time", "Hans Zimmer", ""});
        defaults.add(new String[]{"River Flows in You", "Yiruma", ""});
        defaults.add(new String[]{"Comptine d'un autre été", "Yann Tiersen", ""});
        return defaults;
    }

    // Retourne le label du genre
    public String getLabelGenre(int difficulte) {
        switch (difficulte) {
            case 1: return "Lo-Fi Chill 🌿";
            case 2: return "Ambient Calme 🌊";
            case 3: return "Deep Focus 🎯";
            case 4: return "Epic Cinématique 🚀";
            case 5: return "Orchestral Puissant ⚡";
            default: return "Focus Instrumental 🎵";
        }
    }
}
