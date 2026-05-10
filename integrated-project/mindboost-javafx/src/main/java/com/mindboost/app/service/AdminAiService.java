package com.mindboost.app.service;

import com.google.gson.Gson;
import com.google.gson.JsonArray;
import com.google.gson.JsonObject;
import com.google.gson.JsonParser;
import com.mindboost.app.config.AppConfig;
import com.mindboost.app.config.DatabaseManager;

import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.time.Duration;
import java.util.ArrayList;
import java.util.List;

public class AdminAiService {
    private final HttpClient httpClient = HttpClient.newHttpClient();
    private final Gson gson = new Gson();
    private final String apiKey;
    private final String model;
    private final DatabaseManager databaseManager;
    private final GeneralTestService generalTestService;
    private final SpecificTestService specificTestService;

    public AdminAiService(AppConfig config, DatabaseManager databaseManager, GeneralTestService generalTestService, SpecificTestService specificTestService) {
        this.apiKey = config.get("gemini.apiKey", "");
        this.model = config.get("gemini.model", "gemini-1.5-flash");
        this.databaseManager = databaseManager;
        this.generalTestService = generalTestService;
        this.specificTestService = specificTestService;
    }

    public AiResult generateTestDraft(String type, String category, int questionCount) {
        String safeType = (type == null || type.isBlank()) ? "specific" : type.trim();
        String safeCategory = (category == null || category.isBlank()) ? "Stress" : category.trim();
        int count = Math.max(3, Math.min(20, questionCount));

        if (apiKey.isBlank()) {
            return new AiResult(false, null, null, "Gemini API key manquante", null);
        }

        String prompt = "Return ONLY valid JSON. No markdown. No explanation.\n\nSchema:\n" +
            "{\n  \"title\": \"string\",\n  \"description\": \"string\",\n  \"category\": \"string\",\n  \"questions\": [\n    {\n      \"questionText\": \"string\",\n      \"answers\": [\n        {\"answerText\":\"string\",\"score\":0},\n        {\"answerText\":\"string\",\"score\":1},\n        {\"answerText\":\"string\",\"score\":2},\n        {\"answerText\":\"string\",\"score\":3}\n      ]\n    }\n  ]\n}\n\nRules:\n" +
            "- language: French\n" +
            "- type: " + safeType + "\n" +
            "- category: " + safeCategory + "\n" +
            "- generate exactly " + count + " questions\n" +
            "- each question must contain exactly 4 answers\n" +
            "- answers must be short and clear\n" +
            "- title must not be empty\n" +
            "- description must not be empty";

        JsonObject payload = new JsonObject();
        JsonObject generationConfig = new JsonObject();
        generationConfig.addProperty("temperature", 0.4);
        payload.add("generationConfig", generationConfig);
        JsonArray contents = new JsonArray();
        JsonObject user = new JsonObject();
        user.addProperty("role", "user");
        JsonArray parts = new JsonArray();
        JsonObject part = new JsonObject();
        part.addProperty("text", prompt);
        parts.add(part);
        user.add("parts", parts);
        contents.add(user);
        payload.add("contents", contents);

        try {
            String url = "https://generativelanguage.googleapis.com/v1beta/models/" + model + ":generateContent?key=" + apiKey;
            HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create(url))
                .timeout(Duration.ofSeconds(45))
                .header("Content-Type", "application/json")
                .POST(HttpRequest.BodyPublishers.ofString(payload.toString()))
                .build();

            HttpResponse<String> response = httpClient.send(request, HttpResponse.BodyHandlers.ofString());
            String raw = response.body();
            if (response.statusCode() != 200) {
                return new AiResult(false, raw, null, "Gemini HTTP " + response.statusCode(), null);
            }

            JsonObject data = JsonParser.parseString(raw).getAsJsonObject();
            String text = data.getAsJsonArray("candidates")
                .get(0).getAsJsonObject()
                .getAsJsonObject("content")
                .getAsJsonArray("parts")
                .get(0).getAsJsonObject()
                .get("text").getAsString();

            String json = normalizeJson(text);
            AiPayload payloadData = parsePayload(json, count);
            if (!payloadData.valid()) {
                return new AiResult(false, raw, json, payloadData.error(), null);
            }

            return new AiResult(true, raw, json, null, payloadData);
        } catch (Exception e) {
            return new AiResult(false, null, null, "Erreur génération: " + e.getMessage(), null);
        }
    }

    public String persistGeneratedTest(AiPayload payload, String type) {
        if (payload == null || !payload.valid()) {
            throw new IllegalArgumentException("Payload invalide");
        }
        if ("general".equalsIgnoreCase(type)) {
            generalTestService.createTest(payload.title(), payload.description(), 1, payload.toGeneralQuestions());
            return "Test général enregistré";
        }
        int generalTestId = payload.generalTestId() == null ? 1 : payload.generalTestId();
        specificTestService.createTest(generalTestId, payload.category(), payload.title(), payload.description(), 1, payload.toSpecificQuestions());
        return "Test spécifique enregistré";
    }

    private AiPayload parsePayload(String json, int expectedCount) {
        try {
            JsonObject data = JsonParser.parseString(json).getAsJsonObject();
            if (!data.has("title") || !data.has("questions")) {
                return AiPayload.invalid("Structure JSON invalide (title/questions manquants)");
            }
            String title = data.get("title").getAsString();
            String description = data.has("description") ? data.get("description").getAsString() : "";
            String category = data.has("category") ? data.get("category").getAsString() : "Stress";
            JsonArray questionsJson = data.getAsJsonArray("questions");
            if (questionsJson.size() != expectedCount) {
                return AiPayload.invalid("Le nombre de questions générées ne correspond pas à la demande.");
            }
            List<QuestionPayload> questions = new ArrayList<>();
            for (int i = 0; i < questionsJson.size(); i++) {
                JsonObject questionObj = questionsJson.get(i).getAsJsonObject();
                String questionText = questionObj.has("questionText") ? questionObj.get("questionText").getAsString() : "";
                JsonArray answersJson = questionObj.getAsJsonArray("answers");
                if (answersJson == null || answersJson.size() != 4) {
                    return AiPayload.invalid("La question " + (i + 1) + " ne contient pas exactement 4 réponses.");
                }
                List<AnswerPayload> answers = new ArrayList<>();
                for (int j = 0; j < answersJson.size(); j++) {
                    JsonObject ans = answersJson.get(j).getAsJsonObject();
                    String answerText = ans.has("answerText") ? ans.get("answerText").getAsString() : "";
                    int score = ans.has("score") ? ans.get("score").getAsInt() : 0;
                    if (score < 0 || score > 3) {
                        return AiPayload.invalid("Score invalide dans la question " + (i + 1));
                    }
                    answers.add(new AnswerPayload(answerText, score));
                }
                questions.add(new QuestionPayload(questionText, answers));
            }
            return new AiPayload(true, null, title, description, category, null, questions);
        } catch (Exception e) {
            return AiPayload.invalid("JSON invalide après normalisation");
        }
    }

    private String normalizeJson(String raw) {
        String txt = raw.trim();
        txt = txt.replaceAll("^```json\s*", "");
        txt = txt.replaceAll("^```\s*", "");
        txt = txt.replaceAll("\s*```$", "");
        int start = txt.indexOf('{');
        int end = txt.lastIndexOf('}');
        if (start >= 0 && end > start) {
            txt = txt.substring(start, end + 1);
        }
        return txt.trim();
    }

    public record AiResult(boolean ok, String raw, String json, String error, AiPayload payload) {}

    public record AiPayload(boolean valid, String error, String title, String description, String category,
                            Integer generalTestId, List<QuestionPayload> questions) {
        static AiPayload invalid(String error) {
            return new AiPayload(false, error, null, null, null, null, List.of());
        }

        List<GeneralTestService.QuestionDraft> toGeneralQuestions() {
            List<GeneralTestService.QuestionDraft> drafts = new ArrayList<>();
            for (QuestionPayload question : questions) {
                List<GeneralTestService.AnswerDraft> answers = new ArrayList<>();
                for (AnswerPayload answer : question.answers()) {
                    answers.add(new GeneralTestService.AnswerDraft(answer.answerText(), answer.score()));
                }
                drafts.add(new GeneralTestService.QuestionDraft(question.questionText(), answers));
            }
            return drafts;
        }

        List<SpecificTestService.QuestionDraft> toSpecificQuestions() {
            List<SpecificTestService.QuestionDraft> drafts = new ArrayList<>();
            for (QuestionPayload question : questions) {
                List<SpecificTestService.AnswerDraft> answers = new ArrayList<>();
                for (AnswerPayload answer : question.answers()) {
                    answers.add(new SpecificTestService.AnswerDraft(answer.answerText(), answer.score()));
                }
                drafts.add(new SpecificTestService.QuestionDraft(question.questionText(), answers));
            }
            return drafts;
        }
    }

    public record QuestionPayload(String questionText, List<AnswerPayload> answers) {}

    public record AnswerPayload(String answerText, int score) {}
}
