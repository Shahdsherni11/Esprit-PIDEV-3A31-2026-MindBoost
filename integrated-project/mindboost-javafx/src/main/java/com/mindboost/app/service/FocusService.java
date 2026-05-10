package com.mindboost.app.service;

import com.google.gson.Gson;
import com.google.gson.JsonArray;
import com.google.gson.JsonObject;
import com.mindboost.app.config.AppConfig;
import com.mindboost.app.model.TacheFocus;

import java.net.URI;
import java.net.URLEncoder;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.nio.charset.StandardCharsets;
import java.time.Duration;
import java.util.ArrayList;
import java.util.List;

public class FocusService {
    private final HttpClient httpClient = HttpClient.newHttpClient();
    private final Gson gson = new Gson();
    private final String openAiApiKey;

    public FocusService(AppConfig config) {
        this.openAiApiKey = config.get("openai.apiKey", "");
    }

    public TaskService.FocusAdvice buildAdvice(TacheFocus task) {
        String titre = task.getTitre() == null ? "" : task.getTitre();
        String objectif = task.getObjectifPrincipal() == null ? "" : task.getObjectifPrincipal();
        int niveau = task.getNiveauDifficulte() == null ? 3 : task.getNiveauDifficulte();

        Advice advice = adviseTask(titre, objectif, niveau);
        List<BookRecommendation> books = recommendBooks(niveau);
        List<MusicRecommendation> tracks = recommendMusic(niveau);

        return new TaskService.FocusAdvice(advice.conseil(), advice.priorite(), advice.dureeMinutes(), books, tracks);
    }

    public List<String> generateSubTaskSuggestions(String titre, String objectif) {
        if (openAiApiKey == null || openAiApiKey.isBlank()) {
            return fallbackSuggestions(titre, objectif);
        }
        try {
            JsonObject payload = new JsonObject();
            payload.addProperty("model", "gpt-4.1-mini");
            payload.addProperty("input", String.format(
                "Tu es un assistant de productivite. Propose 5 sous-taches courtes en francais pour cette tache. Retourne uniquement une liste simple, une ligne par sous-tache, sans introduction.\nTitre: %s\nObjectif: %s",
                titre, objectif
            ));

            HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create("https://api.openai.com/v1/responses"))
                .timeout(Duration.ofSeconds(20))
                .header("Authorization", "Bearer " + openAiApiKey)
                .header("Content-Type", "application/json")
                .POST(HttpRequest.BodyPublishers.ofString(payload.toString()))
                .build();

            HttpResponse<String> response = httpClient.send(request, HttpResponse.BodyHandlers.ofString());
            if (response.statusCode() != 200) {
                return fallbackSuggestions(titre, objectif);
            }

            JsonObject data = gson.fromJson(response.body(), JsonObject.class);
            JsonArray output = data.getAsJsonArray("output");
            if (output == null || output.isEmpty()) {
                return fallbackSuggestions(titre, objectif);
            }
            String text = output.get(0).getAsJsonObject().getAsJsonArray("content")
                .get(0).getAsJsonObject().get("text").getAsString();

            List<String> suggestions = new ArrayList<>();
            for (String line : text.split("\\r?\\n")) {
                String cleaned = line.replaceAll("^\\d+[\\).\\s-]*", "").trim();
                cleaned = cleaned.replaceAll("^[\\-\\*]", "").trim();
                if (!cleaned.isBlank()) {
                    suggestions.add(cleaned);
                }
            }
            return suggestions.isEmpty() ? fallbackSuggestions(titre, objectif) : suggestions;
        } catch (Exception e) {
            return fallbackSuggestions(titre, objectif);
        }
    }

    private Advice adviseTask(String titre, String objectif, int niveau) {
        if (openAiApiKey == null || openAiApiKey.isBlank()) {
            return fallbackAdvice(titre, objectif, niveau);
        }
        try {
            JsonObject payload = new JsonObject();
            payload.addProperty("model", "gpt-4.1-mini");
            payload.addProperty("input", String.format(
                "Analyse cette tache et reponds en JSON avec trois cles: priorite (1 a 5), duree_minutes, conseil.\nTitre: %s\nObjectif: %s\nDifficulte: %s",
                titre, objectif, niveau
            ));

            HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create("https://api.openai.com/v1/responses"))
                .timeout(Duration.ofSeconds(20))
                .header("Authorization", "Bearer " + openAiApiKey)
                .header("Content-Type", "application/json")
                .POST(HttpRequest.BodyPublishers.ofString(payload.toString()))
                .build();

            HttpResponse<String> response = httpClient.send(request, HttpResponse.BodyHandlers.ofString());
            if (response.statusCode() != 200) {
                return fallbackAdvice(titre, objectif, niveau);
            }

            JsonObject data = gson.fromJson(response.body(), JsonObject.class);
            JsonArray output = data.getAsJsonArray("output");
            if (output == null || output.isEmpty()) {
                return fallbackAdvice(titre, objectif, niveau);
            }
            String text = output.get(0).getAsJsonObject().getAsJsonArray("content")
                .get(0).getAsJsonObject().get("text").getAsString();

            JsonObject parsed = gson.fromJson(text, JsonObject.class);
            int priority = parsed.has("priorite") ? parsed.get("priorite").getAsInt() : 3;
            int duration = parsed.has("duree_minutes") ? parsed.get("duree_minutes").getAsInt() : 60;
            String conseil = parsed.has("conseil") ? parsed.get("conseil").getAsString() : "Travaille par petites étapes.";

            return new Advice(Math.max(1, Math.min(priority, 5)), Math.max(15, duration), conseil);
        } catch (Exception e) {
            return fallbackAdvice(titre, objectif, niveau);
        }
    }

    public List<BookRecommendation> recommendBooks(Integer niveau) {
        String query = switch (niveau == null ? 0 : niveau) {
            case 4, 5 -> "deep work productivity";
            case 3 -> "focus study productivity";
            default -> "habits motivation productivity";
        };

        try {
            String url = "https://openlibrary.org/search.json?q=" + URLEncoder.encode(query, StandardCharsets.UTF_8)
                + "&limit=5&fields=title,author_name,first_publish_year&lang=fr";
            HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create(url))
                .timeout(Duration.ofSeconds(15))
                .header("User-Agent", "MindBoost-JavaFX")
                .GET()
                .build();
            HttpResponse<String> response = httpClient.send(request, HttpResponse.BodyHandlers.ofString());
            if (response.statusCode() != 200) {
                return fallbackBooks();
            }
            JsonObject data = gson.fromJson(response.body(), JsonObject.class);
            JsonArray docs = data.getAsJsonArray("docs");
            if (docs == null) {
                return fallbackBooks();
            }
            List<BookRecommendation> books = new ArrayList<>();
            for (int i = 0; i < docs.size(); i++) {
                JsonObject doc = docs.get(i).getAsJsonObject();
                String title = doc.has("title") ? doc.get("title").getAsString() : "Livre";
                String author = "Auteur inconnu";
                if (doc.has("author_name") && doc.get("author_name").isJsonArray()) {
                    JsonArray authors = doc.getAsJsonArray("author_name");
                    if (!authors.isEmpty()) {
                        author = authors.get(0).getAsString();
                    }
                }
                Integer year = doc.has("first_publish_year") ? doc.get("first_publish_year").getAsInt() : null;
                books.add(new BookRecommendation(title, author, year));
            }
            return books.isEmpty() ? fallbackBooks() : books;
        } catch (Exception e) {
            return fallbackBooks();
        }
    }

    public List<MusicRecommendation> recommendMusic(Integer niveau) {
        String keyword = switch (niveau == null ? 0 : niveau) {
            case 4, 5 -> "deep focus instrumental";
            case 3 -> "ambient study";
            default -> "lofi focus";
        };

        try {
            String url = "https://api.deezer.com/search?q=" + URLEncoder.encode(keyword, StandardCharsets.UTF_8) + "&limit=5";
            HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create(url))
                .timeout(Duration.ofSeconds(15))
                .GET()
                .build();
            HttpResponse<String> response = httpClient.send(request, HttpResponse.BodyHandlers.ofString());
            if (response.statusCode() != 200) {
                return fallbackTracks();
            }
            JsonObject data = gson.fromJson(response.body(), JsonObject.class);
            JsonArray tracks = data.getAsJsonArray("data");
            if (tracks == null) {
                return fallbackTracks();
            }
            List<MusicRecommendation> results = new ArrayList<>();
            for (int i = 0; i < tracks.size(); i++) {
                JsonObject track = tracks.get(i).getAsJsonObject();
                String title = track.has("title") ? track.get("title").getAsString() : "Titre inconnu";
                String artist = "Artiste inconnu";
                if (track.has("artist")) {
                    JsonObject artistObj = track.getAsJsonObject("artist");
                    if (artistObj != null && artistObj.has("name")) {
                        artist = artistObj.get("name").getAsString();
                    }
                }
                String link = track.has("link") ? track.get("link").getAsString() : null;
                String preview = track.has("preview") ? track.get("preview").getAsString() : null;
                results.add(new MusicRecommendation(title, artist, link, preview));
            }
            return results.isEmpty() ? fallbackTracks() : results;
        } catch (Exception e) {
            return fallbackTracks();
        }
    }

    private Advice fallbackAdvice(String titre, String objectif, int niveau) {
        int difficulty = niveau <= 0 ? 3 : niveau;
        int length = (titre + " " + objectif).trim().length();

        int priority = 2;
        if (difficulty >= 4 || length > 80) {
            priority = 4;
        }
        if (difficulty >= 5 || (titre + " " + objectif).toLowerCase().contains("urgent")) {
            priority = 5;
        }

        int duration = 30 + difficulty * 20;
        if (length > 120) {
            duration += 30;
        }

        return new Advice(priority, duration, "Commence par la partie la plus importante puis avance étape par étape.");
    }

    private List<String> fallbackSuggestions(String titre, String objectif) {
        String text = (titre + " " + objectif).toLowerCase();
        if (text.contains("exam") || text.contains("revision") || text.contains("etud")) {
            return List.of(
                "Lister les chapitres à réviser",
                "Préparer un résumé des points importants",
                "Faire une session de révision concentrée",
                "Résoudre des exercices d’application",
                "Vérifier les notions non maîtrisées"
            );
        }
        if (text.contains("projet") || text.contains("app") || text.contains("site")) {
            return List.of(
                "Définir les fonctionnalités principales",
                "Organiser les tâches par priorité",
                "Développer la première partie importante",
                "Tester les cas principaux",
                "Corriger et finaliser la livraison"
            );
        }
        return List.of(
            "Analyser le besoin principal",
            "Découper le travail en étapes simples",
            "Préparer les ressources nécessaires",
            "Réaliser la partie principale",
            "Vérifier le résultat final"
        );
    }

    private List<BookRecommendation> fallbackBooks() {
        return List.of(
            new BookRecommendation("Atomic Habits", "James Clear", 2018),
            new BookRecommendation("Deep Work", "Cal Newport", 2016),
            new BookRecommendation("The Power of Habit", "Charles Duhigg", 2012)
        );
    }

    private List<MusicRecommendation> fallbackTracks() {
        return List.of(
            new MusicRecommendation("Deep Focus Mix", "MindBoost", null, null),
            new MusicRecommendation("Ambient Study Session", "MindBoost", null, null),
            new MusicRecommendation("LoFi Concentration", "MindBoost", null, null)
        );
    }

    private record Advice(int priorite, int dureeMinutes, String conseil) {}

    public record BookRecommendation(String title, String author, Integer year) {}

    public record MusicRecommendation(String title, String artist, String link, String preview) {}
}
