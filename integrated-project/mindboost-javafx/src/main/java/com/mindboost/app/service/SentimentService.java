package com.mindboost.app.service;

import com.google.gson.Gson;
import com.google.gson.JsonObject;
import com.mindboost.app.config.AppConfig;

import java.net.URI;
import java.net.URLEncoder;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.nio.charset.StandardCharsets;
import java.time.Duration;
import java.util.List;

public class SentimentService {
    private final HttpClient httpClient = HttpClient.newHttpClient();
    private final Gson gson = new Gson();
    private final String apiUrl;
    private final String apiKey;

    private final List<String> negativeKeywords = List.of(
        "triste", "mal", "stressé", "stresse", "stressée", "anxieux", "anxieuse",
        "angoissé", "angoissee", "angoissée", "déprimé", "deprime", "déprime",
        "déprimée", "fatigué", "fatigue", "fatiguée", "seul", "seule", "perdu",
        "perdue", "vide", "peur", "épuisé", "epuise", "épuisée", "je vais mal",
        "je me sens mal", "je suis triste"
    );

    private final List<String> positiveKeywords = List.of(
        "heureux", "heureuse", "bien", "motivé", "motivée", "calme", "serein",
        "sereine", "content", "contente", "je vais bien", "je me sens bien"
    );

    public SentimentService(AppConfig config) {
        this.apiUrl = config.get("sentiment.apiUrl", "");
        this.apiKey = config.get("sentiment.apiKey", "");
    }

    public Analysis analyze(String text) {
        String trimmed = text == null ? "" : text.trim();
        if (trimmed.isEmpty()) {
            return null;
        }

        if (apiUrl.isBlank() || apiKey.isBlank()) {
            return fallbackKeywordAnalysis(trimmed);
        }

        try {
            String url = apiUrl + "?text=" + URLEncoder.encode(trimmed.substring(0, Math.min(2000, trimmed.length())), StandardCharsets.UTF_8);
            HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create(url))
                .timeout(Duration.ofSeconds(10))
                .header("X-Api-Key", apiKey.trim())
                .GET()
                .build();

            HttpResponse<String> response = httpClient.send(request, HttpResponse.BodyHandlers.ofString());
            if (response.statusCode() != 200) {
                return fallbackKeywordAnalysis(trimmed);
            }

            JsonObject payload = gson.fromJson(response.body(), JsonObject.class);
            if (payload == null) {
                return fallbackKeywordAnalysis(trimmed);
            }

            double score = payload.has("score") ? payload.get("score").getAsDouble() : 0.0;
            String sentiment = payload.has("sentiment") ? payload.get("sentiment").getAsString() : "NEUTRAL";

            String normalized = trimmed.toLowerCase();
            if (containsAny(normalized, negativeKeywords) && score > -0.4) {
                score = -0.7;
                sentiment = "NEGATIVE";
            }
            if (containsAny(normalized, positiveKeywords) && score < 0.2) {
                score = 0.6;
                sentiment = "POSITIVE";
            }

            return new Analysis(score, sentiment, trimmed);
        } catch (Exception e) {
            return fallbackKeywordAnalysis(trimmed);
        }
    }

    public String toUiLevel(Analysis analysis) {
        if (analysis == null) {
            return "unknown";
        }
        double score = analysis.score();
        String sentiment = analysis.sentiment();

        if (sentiment.contains("NEGATIVE") || score <= -0.4) {
            return "critical";
        }
        if (sentiment.contains("POSITIVE") || score >= 0.2) {
            return "positive";
        }
        return "neutral";
    }

    public String getFeedbackMessage(Analysis analysis) {
        if (analysis == null) {
            return "Merci pour votre retour.";
        }
        return switch (toUiLevel(analysis)) {
            case "critical" -> "Merci pour votre retour. Votre message montre un ressenti difficile. Prenez un moment pour respirer et n’hésitez pas à utiliser le coach IA.";
            case "positive" -> "Merci pour votre retour. Votre ressenti semble plutôt positif aujourd’hui. Continuez à avancer à votre rythme.";
            default -> "Merci pour votre retour. Votre ressenti semble stable pour le moment.";
        };
    }

    private Analysis fallbackKeywordAnalysis(String text) {
        String normalized = text.toLowerCase();
        if (containsAny(normalized, negativeKeywords)) {
            return new Analysis(-0.7, "NEGATIVE", text);
        }
        if (containsAny(normalized, positiveKeywords)) {
            return new Analysis(0.6, "POSITIVE", text);
        }
        return new Analysis(0.0, "NEUTRAL", text);
    }

    private boolean containsAny(String text, List<String> keywords) {
        for (String keyword : keywords) {
            if (text.contains(keyword.toLowerCase())) {
                return true;
            }
        }
        return false;
    }

    public record Analysis(double score, String sentiment, String text) {}
}
