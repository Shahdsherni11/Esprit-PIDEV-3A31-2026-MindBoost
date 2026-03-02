package org.example.Service;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.StandardCharsets;
import java.util.ArrayList;
import java.util.List;

public class OpenAIService {

    // ⚠️ Remplacez par votre vraie clé API
    private static final String API_KEY = "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";
    private static final String API_URL = "https://api.openai.com/v1/chat/completions";

    // Génère des sous-tâches intelligentes pour une tâche donnée
    public List<String> genererSousTachesIA(String titreTache, String objectif) {
        List<String> sousTaches = new ArrayList<>();

        try {
            // Construire le prompt
            String prompt = "Tu es un assistant de productivité. " +
                    "Pour la tâche suivante : '" + titreTache + "' " +
                    "avec l'objectif : '" + objectif + "', " +
                    "génère exactement 5 sous-tâches concrètes et réalisables. " +
                    "Réponds UNIQUEMENT avec une liste numérotée, une sous-tâche par ligne, sans explication.";

            // Construire le JSON body
            String jsonBody = "{"
                    + "\"model\": \"gpt-3.5-turbo\","
                    + "\"messages\": ["
                    + "  {\"role\": \"user\", \"content\": \"" + prompt.replace("\"", "\\\"") + "\"}"
                    + "],"
                    + "\"max_tokens\": 300,"
                    + "\"temperature\": 0.7"
                    + "}";

            // Faire la requête HTTP
            URL url = new URL(API_URL);
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setRequestMethod("POST");
            conn.setRequestProperty("Content-Type", "application/json");
            conn.setRequestProperty("Authorization", "Bearer " + API_KEY);
            conn.setDoOutput(true);
            conn.setConnectTimeout(10000);
            conn.setReadTimeout(10000);

            // Envoyer le body
            try (OutputStream os = conn.getOutputStream()) {
                byte[] input = jsonBody.getBytes(StandardCharsets.UTF_8);
                os.write(input, 0, input.length);
            }

            // Lire la réponse
            int responseCode = conn.getResponseCode();
            if (responseCode != 200) {
                System.out.println("OpenAI erreur: " + responseCode);
                return getDefaultSousTaches(titreTache);
            }

            BufferedReader reader = new BufferedReader(
                    new InputStreamReader(conn.getInputStream(), StandardCharsets.UTF_8)
            );
            StringBuilder response = new StringBuilder();
            String line;
            while ((line = reader.readLine()) != null) {
                response.append(line);
            }
            reader.close();

            // Parser la réponse JSON pour extraire le texte
            String content = extractContent(response.toString());

            // Séparer les sous-tâches ligne par ligne
            if (content != null) {
                String[] lines = content.split("\\n");
                for (String l : lines) {
                    l = l.trim();
                    if (!l.isEmpty()) {
                        // Enlever les numéros "1. " "2. " etc.
                        l = l.replaceAll("^\\d+\\.\\s*", "");
                        if (!l.isEmpty()) {
                            sousTaches.add(l);
                        }
                    }
                }
            }

        } catch (Exception e) {
            System.out.println("OpenAI non disponible: " + e.getMessage());
            return getDefaultSousTaches(titreTache);
        }

        if (sousTaches.isEmpty()) {
            return getDefaultSousTaches(titreTache);
        }

        return sousTaches;
    }

    // Parser le JSON pour extraire le content
    private String extractContent(String json) {
        String search = "\"content\":\"";
        int start = json.indexOf(search);
        if (start == -1) return null;
        start += search.length();
        int end = json.indexOf("\"", start);
        if (end == -1) return null;
        return json.substring(start, end)
                .replace("\\n", "\n")
                .replace("\\\"", "\"");
    }

    // Sous-tâches par défaut si l'API ne répond pas
    private List<String> getDefaultSousTaches(String titre) {
        List<String> defaults = new ArrayList<>();
        defaults.add("Définir les objectifs de : " + titre);
        defaults.add("Faire une recherche préliminaire");
        defaults.add("Créer un plan d'action détaillé");
        defaults.add("Exécuter les actions principales");
        defaults.add("Vérifier et valider les résultats");
        return defaults;
    }
}