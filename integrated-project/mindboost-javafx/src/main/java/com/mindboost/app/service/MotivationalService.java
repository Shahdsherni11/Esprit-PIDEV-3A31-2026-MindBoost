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

public class MotivationalService {
    private final HttpClient httpClient = HttpClient.newHttpClient();
    private final Gson gson = new Gson();
    private final String quoteApiUrl;
    private final String quoteApiKey;

    private final List<String> preferredTags = List.of(
        "inspirational", "happiness", "success", "courage", "learning", "life"
    );

    private final List<String> blockedWords = List.of(
        "marriage", "bills", "kids", "in-laws", "divorce", "war", "violence",
        "kill", "death", "politics", "gambling"
    );

    private final List<Quote> fallbackQuotes = List.of(
        new Quote("Tu as le droit d’avancer à ton rythme.", "MindBoost", "support"),
        new Quote("Un petit pas reste un vrai progrès.", "MindBoost", "support"),
        new Quote("Respire. Reviens au présent. Continue doucement.", "MindBoost", "calm"),
        new Quote("Tu n’as pas besoin d’être parfait aujourd’hui.", "MindBoost", "support")
    );

    public MotivationalService(AppConfig config) {
        this.quoteApiUrl = config.get("quote.apiUrl", "");
        this.quoteApiKey = config.get("quote.apiKey", "");
    }

    public Quote getMotivationalContent() {
        for (String tag : preferredTags) {
            Quote quote = fetchQuote(tag);
            if (isAcceptable(quote)) {
                return quote;
            }
        }
        return fallbackQuotes.get((int) (Math.random() * fallbackQuotes.size()));
    }

    private Quote fetchQuote(String tag) {
        if (quoteApiUrl.isBlank() || quoteApiKey.isBlank()) {
            return null;
        }
        try {
            String url = quoteApiUrl;
            if (!tag.isBlank()) {
                url = url + (url.contains("?") ? "&" : "?") + "tags=" + tag;
            }
            HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create(url))
                .timeout(Duration.ofSeconds(10))
                .header("X-Api-Key", quoteApiKey.trim())
                .GET()
                .build();
            HttpResponse<String> response = httpClient.send(request, HttpResponse.BodyHandlers.ofString());
            if (response.statusCode() != 200) {
                return null;
            }
            String body = response.body();
            JsonObject payload = gson.fromJson(body, JsonObject.class);
            if (payload != null && payload.has("quote")) {
                return new Quote(payload.get("quote").getAsString(),
                    payload.has("author") ? payload.get("author").getAsString() : "Auteur inconnu",
                    payload.has("category") ? payload.get("category").getAsString() : tag);
            }

            JsonArray array = gson.fromJson(body, JsonArray.class);
            if (array != null && !array.isEmpty()) {
                JsonObject item = array.get(0).getAsJsonObject();
                return new Quote(item.get("quote").getAsString(),
                    item.has("author") ? item.get("author").getAsString() : "Auteur inconnu",
                    item.has("category") ? item.get("category").getAsString() : tag);
            }
        } catch (Exception ignored) {
        }
        return null;
    }

    private boolean isAcceptable(Quote quote) {
        if (quote == null || quote.content() == null || quote.content().isBlank()) {
            return false;
        }
        String text = quote.content().toLowerCase();
        if (text.length() > 220) {
            return false;
        }
        return blockedWords.stream().noneMatch(text::contains);
    }

    public record Quote(String content, String author, String category) {}
}
