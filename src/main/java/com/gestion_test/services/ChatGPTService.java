package com.gestion_test.services;

import com.google.gson.Gson;
import com.google.gson.JsonArray;
import com.google.gson.JsonObject;
import com.google.gson.JsonParser;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.StandardCharsets;

public class ChatGPTService {

    // Mettez votre cle Gemini ici
    private static final String API_KEY = "AIzaSyBuAfLU_AizDDV71wJcXY4YUQyv4cqdS40";

    private static final String SYSTEM_PROMPT =
            "Tu es un psychologue bienveillant specialise en sante mentale des etudiants. " +
                    "Tu donnes des conseils personnalises en francais. " +
                    "Tu analyses les resultats des tests psychologiques et tu fournis : " +
                    "1. Une analyse du niveau de l'etudiant " +
                    "2. Des conseils pratiques et concrets " +
                    "3. Des exercices recommandes " +
                    "4. Quand consulter un professionnel " +
                    "Sois empathique, encourageant et professionnel. " +
                    "Reponds en francais uniquement.";

    public static String sendMessage(String userMessage) {
        // Les vrais modeles disponibles dans votre compte
        String[] models = {
                "gemini-2.5-flash",
                "gemini-2.0-flash",
                "gemini-2.5-pro"
        };

        for (String model : models) {
            System.out.println("Essai avec: " + model);
            String result = callGemini(userMessage, model);

            if (result != null && !result.startsWith("ERREUR_RETRY")) {
                return result;
            }

            try { Thread.sleep(2000); } catch (InterruptedException e) { }
        }

        return "L'IA est temporairement indisponible.\n\n" +
                "Consultez la section 'Conseil Personnalise' ci-dessus " +
                "pour des recommandations basees sur vos resultats.";
    }

    private static String callGemini(String userMessage, String model) {
        try {
            String geminiUrl = "https://generativelanguage.googleapis.com/v1beta/models/" +
                    model + ":generateContent?key=" + API_KEY;

            URL url = new URL(geminiUrl);
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setRequestMethod("POST");
            conn.setRequestProperty("Content-Type", "application/json");
            conn.setDoOutput(true);
            conn.setConnectTimeout(30000);
            conn.setReadTimeout(60000);

            JsonObject requestBody = new JsonObject();

            JsonArray contents = new JsonArray();
            JsonObject content = new JsonObject();
            content.addProperty("role", "user");
            JsonArray parts = new JsonArray();
            JsonObject part = new JsonObject();
            part.addProperty("text", SYSTEM_PROMPT + "\n\n" + userMessage);
            parts.add(part);
            content.add("parts", parts);
            contents.add(content);
            requestBody.add("contents", contents);

            JsonObject genConfig = new JsonObject();
            genConfig.addProperty("temperature", 0.7);
            genConfig.addProperty("maxOutputTokens", 1000);
            requestBody.add("generationConfig", genConfig);

            String jsonBody = new Gson().toJson(requestBody);

            OutputStream os = conn.getOutputStream();
            os.write(jsonBody.getBytes(StandardCharsets.UTF_8));
            os.flush();
            os.close();

            int responseCode = conn.getResponseCode();
            System.out.println(model + " -> code: " + responseCode);

            if (responseCode == 200) {
                BufferedReader br = new BufferedReader(
                        new InputStreamReader(conn.getInputStream(), StandardCharsets.UTF_8));
                StringBuilder response = new StringBuilder();
                String line;
                while ((line = br.readLine()) != null) response.append(line);
                br.close();

                System.out.println("SUCCES avec " + model);

                JsonObject jsonResponse = JsonParser.parseString(response.toString()).getAsJsonObject();
                JsonArray candidates = jsonResponse.getAsJsonArray("candidates");
                if (candidates != null && candidates.size() > 0) {
                    JsonObject firstCandidate = candidates.get(0).getAsJsonObject();
                    JsonObject contentObj = firstCandidate.getAsJsonObject("content");
                    JsonArray partsArr = contentObj.getAsJsonArray("parts");
                    if (partsArr != null && partsArr.size() > 0) {
                        return partsArr.get(0).getAsJsonObject().get("text").getAsString();
                    }
                }
                return "Reponse vide.";

            } else if (responseCode == 429) {
                System.err.println(model + " -> 429 quota depasse");
                return "ERREUR_RETRY";

            } else {
                BufferedReader br = new BufferedReader(
                        new InputStreamReader(conn.getErrorStream(), StandardCharsets.UTF_8));
                StringBuilder error = new StringBuilder();
                String line;
                while ((line = br.readLine()) != null) error.append(line);
                br.close();
                System.err.println(model + " (" + responseCode + "): " + error.toString());
                return "ERREUR_RETRY";
            }
        } catch (Exception e) {
            System.err.println(model + " exception: " + e.getMessage());
            return "ERREUR_RETRY";
        }
    }

    public static String analyzeTestResults(String category, String level, int percentage,
                                            int totalScore, int maxScore, String testTitle,
                                            String answersDetails) {
        String prompt = "Voici les resultats d'un test psychologique d'un etudiant:\n\n" +
                "Test: " + testTitle + "\n" +
                "Categorie: " + category + "\n" +
                "Score: " + totalScore + "/" + maxScore + " (" + percentage + "%)\n" +
                "Niveau: " + level + "\n\n" +
                "Detail des reponses:\n" + answersDetails + "\n\n" +
                "En tant que psychologue, analyse ces resultats et donne:\n" +
                "1. Une interpretation du score et du niveau\n" +
                "2. 3 a 5 conseils pratiques personnalises\n" +
                "3. Des exercices concrets a pratiquer\n" +
                "4. Des recommandations pour la prochaine semaine\n" +
                "5. Si necessaire, recommander de consulter un professionnel";
        return sendMessage(prompt);
    }

    public static String chatWithContext(String userQuestion, String category,
                                         String level, int percentage) {
        String prompt = "Contexte de l'etudiant:\n" +
                "- Categorie detectee: " + category + "\n" +
                "- Niveau: " + level + "\n" +
                "- Score: " + percentage + "%\n\n" +
                "L'etudiant pose cette question:\n" + userQuestion;
        return sendMessage(prompt);
    }
}