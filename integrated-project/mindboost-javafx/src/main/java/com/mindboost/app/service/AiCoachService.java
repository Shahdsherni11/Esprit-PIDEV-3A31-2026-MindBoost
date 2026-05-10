package com.mindboost.app.service;

import com.google.gson.Gson;
import com.google.gson.JsonArray;
import com.google.gson.JsonObject;
import com.mindboost.app.config.AppConfig;

import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.time.Duration;
import java.util.List;

public class AiCoachService {
    private final HttpClient httpClient = HttpClient.newHttpClient();
    private final Gson gson = new Gson();
    private final String apiKey;
    private final String model;

    public AiCoachService(AppConfig config) {
        this.apiKey = config.get("groq.apiKey", "");
        this.model = config.get("groq.model", "llama-3.1-70b-versatile");
    }

    public String ask(String category, List<ChatMessage> history, String userMessage) {
        if (apiKey.isBlank()) {
            return "Le service IA est indisponible. Ajoutez GROQ_API_KEY pour activer le coach.";
        }

        String systemPrompt = buildSystemPrompt(category);
        JsonArray messages = new JsonArray();
        messages.add(message("system", systemPrompt));
        if (history != null) {
            for (ChatMessage item : history) {
                messages.add(message(item.role(), item.content()));
            }
        }
        messages.add(message("user", userMessage));

        JsonObject payload = new JsonObject();
        payload.addProperty("model", model);
        payload.add("messages", messages);
        payload.addProperty("temperature", 0.6);

        try {
            HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create("https://api.groq.com/openai/v1/chat/completions"))
                .timeout(Duration.ofSeconds(30))
                .header("Authorization", "Bearer " + apiKey)
                .header("Content-Type", "application/json")
                .POST(HttpRequest.BodyPublishers.ofString(payload.toString()))
                .build();

            HttpResponse<String> response = httpClient.send(request, HttpResponse.BodyHandlers.ofString());
            if (response.statusCode() != 200) {
                return "Désolé, le service chatbot est temporairement indisponible.";
            }

            JsonObject data = gson.fromJson(response.body(), JsonObject.class);
            JsonArray choices = data.getAsJsonArray("choices");
            if (choices == null || choices.isEmpty()) {
                return "Aucune réponse générée.";
            }
            JsonObject message = choices.get(0).getAsJsonObject().getAsJsonObject("message");
            return message != null && message.has("content") ? message.get("content").getAsString() : "Aucune réponse générée.";
        } catch (Exception e) {
            return "Désolé, le service chatbot est temporairement indisponible.";
        }
    }

    private JsonObject message(String role, String content) {
        JsonObject msg = new JsonObject();
        msg.addProperty("role", role);
        msg.addProperty("content", content);
        return msg;
    }

    private String buildSystemPrompt(String category) {
        String base = "Tu es MindBoost AI, un coach bienveillant en santé mentale.\n"
            + "Règles:\n"
            + "- Réponds en français.\n"
            + "- Réponse courte, claire, actionnable.\n"
            + "- Ne pose pas de diagnostic médical.\n"
            + "- Donne conseils pratiques (respiration, routine, sommeil, activité douce, journaling).\n"
            + "- Si risque (suicide/auto-mutilation/danger), orienter immédiatement vers urgences et professionnel.";

        String hints = switch (category == null ? "" : category.toLowerCase()) {
            case "anxiety", "anxiete" -> "Contexte: anxiété. Conseils: respiration 4-6, grounding 5-4-3-2-1, réduire caféine, routine du soir.";
            case "stress" -> "Contexte: stress. Conseils: prioriser 3 tâches, pauses régulières, respiration carrée, marche 10 min.";
            case "depression" -> "Contexte: dépression. Conseils: micro-objectifs, lumière naturelle, activation comportementale, soutien social.";
            case "sleep", "trouble du sommeil" -> "Contexte: sommeil. Conseils: horaires fixes, écran off avant coucher, hygiène du sommeil.";
            default -> "Contexte: bien-être général. Conseils: habitudes stables, auto-compassion, progression pas à pas.";
        };

        return base + "\n" + hints;
    }

    public record ChatMessage(String role, String content) {}
}
