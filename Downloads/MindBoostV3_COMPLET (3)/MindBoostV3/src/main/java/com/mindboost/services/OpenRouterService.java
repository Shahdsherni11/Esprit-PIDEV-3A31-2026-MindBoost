package com.mindboost.services;

import com.google.gson.*;
import okhttp3.*;
import java.io.IOException;
import java.util.List;
import java.util.Map;

/**
 * Service MindBot — Utilise OpenRouter (gratuit avec clé API)
 * Modèle: mistralai/mistral-7b-instruct (100% gratuit sur OpenRouter)
 */
public class OpenRouterService {

    // ⚠️ CONFIGUREZ votre clé ici ou dans config.properties
    private static String API_KEY = System.getProperty("OPENROUTER_API_KEY", "YOUR_OPENROUTER_KEY");
    private static final String API_URL = "https://openrouter.ai/api/v1/chat/completions";
    private static final String MODEL   = "mistralai/mistral-7b-instruct:free";

    private static final OkHttpClient client = new OkHttpClient.Builder()
        .connectTimeout(30, java.util.concurrent.TimeUnit.SECONDS)
        .readTimeout(60, java.util.concurrent.TimeUnit.SECONDS)
        .build();

    public static void setApiKey(String key) { API_KEY = key; }

    /**
     * Envoie un message avec contexte psychologique complet
     */
    public static String chat(String userMessage, String psychContext, List<Map<String,String>> history) throws IOException {
        JsonObject body = new JsonObject();
        body.addProperty("model", MODEL);

        JsonArray messages = new JsonArray();

        // Système prompt avec contexte psy
        JsonObject system = new JsonObject();
        system.addProperty("role", "system");
        system.addProperty("content",
            "Tu es MindBot, un assistant psychologique bienveillant et empathique de la plateforme MindBoost. " +
            "Tu parles français et tu adaptes ton ton selon le profil de l'utilisateur. " +
            "Contexte psychologique actuel: " + psychContext + " " +
            "Réponds avec empathie, de façon concise (max 150 mots), et propose des exercices pratiques si pertinent. " +
            "Ne diagnostique jamais, oriente vers un professionnel si nécessaire.");
        messages.add(system);

        // Historique
        for (Map<String,String> msg : history) {
            JsonObject m = new JsonObject();
            m.addProperty("role", msg.get("role"));
            m.addProperty("content", msg.get("content"));
            messages.add(m);
        }

        // Message actuel
        JsonObject userMsg = new JsonObject();
        userMsg.addProperty("role", "user");
        userMsg.addProperty("content", userMessage);
        messages.add(userMsg);

        body.add("messages", messages);
        body.addProperty("max_tokens", 200);
        body.addProperty("temperature", 0.7);

        Request request = new Request.Builder()
            .url(API_URL)
            .addHeader("Authorization", "Bearer " + API_KEY)
            .addHeader("HTTP-Referer", "https://mindboost.app")
            .addHeader("X-Title", "MindBoost")
            .post(RequestBody.create(body.toString(), MediaType.get("application/json")))
            .build();

        try (Response response = client.newCall(request).execute()) {
            if (!response.isSuccessful()) {
                return "⚠️ MindBot temporairement indisponible. Vérifiez votre clé API OpenRouter.";
            }
            String respBody = response.body().string();
            JsonObject json = JsonParser.parseString(respBody).getAsJsonObject();
            return json.getAsJsonArray("choices")
                      .get(0).getAsJsonObject()
                      .getAsJsonObject("message")
                      .get("content").getAsString().trim();
        }
    }
}
