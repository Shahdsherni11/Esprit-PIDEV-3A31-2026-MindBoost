package org.example.utils;

import com.google.gson.JsonArray;
import com.google.gson.JsonObject;
import com.google.gson.JsonParser;
import okhttp3.*;

import java.io.IOException;
import java.net.URLEncoder;
import java.nio.charset.StandardCharsets;

public class AIClient {

    // ✅ Hugging Face Router endpoint (NEW)
    private static final String HF_MODEL = "facebook/bart-large-cnn";
    private static final String HF_URL = "https://router.huggingface.co/hf-inference/models/" + HF_MODEL;

    private static final String HF_TOKEN_FALLBACK = ""; // optional local fallback
    private static final String MYMEMORY_EMAIL = "";

    private static final OkHttpClient client = new OkHttpClient();

    private static String resolveHfToken() {
        String env = System.getenv("HF_TOKEN");
        if (env != null && !env.isBlank()) return env.trim();
        if (HF_TOKEN_FALLBACK != null && !HF_TOKEN_FALLBACK.isBlank()) return HF_TOKEN_FALLBACK.trim();
        return null;
    }

    public static String summarize(String text) throws IOException {
        String safe = text == null ? "" : text.trim();
        if (safe.isBlank()) return "Aucun contenu.";

        String token = resolveHfToken();
        if (token == null) {
            throw new IOException("Missing HF token. Set HF_TOKEN env variable.");
        }

        JsonObject payload = new JsonObject();
        payload.addProperty("inputs", safe);

        JsonObject parameters = new JsonObject();
        parameters.addProperty("max_length", 120);
        parameters.addProperty("min_length", 30);
        parameters.addProperty("do_sample", false);
        payload.add("parameters", parameters);

        JsonObject options = new JsonObject();
        options.addProperty("wait_for_model", true);
        payload.add("options", options);

        Request request = new Request.Builder()
                .url(HF_URL)
                .addHeader("Authorization", "Bearer " + token)
                .addHeader("Accept", "application/json")
                .addHeader("Content-Type", "application/json")
                .post(RequestBody.create(payload.toString(), MediaType.parse("application/json")))
                .build();

        try (Response response = client.newCall(request).execute()) {
            String body = response.body() != null ? response.body().string() : "";

            if (!response.isSuccessful()) {
                throw new IOException("Hugging Face error " + response.code() + ": " + body);
            }

            String trimmed = body.trim();

            // Expected success: [{"summary_text":"..."}]
            if (trimmed.startsWith("[")) {
                JsonArray arr = JsonParser.parseString(trimmed).getAsJsonArray();
                if (arr.size() > 0 && arr.get(0).isJsonObject()) {
                    JsonObject first = arr.get(0).getAsJsonObject();
                    if (first.has("summary_text")) {
                        return first.get("summary_text").getAsString();
                    }
                }
            }

            // Error JSON shape
            if (trimmed.startsWith("{")) {
                JsonObject obj = JsonParser.parseString(trimmed).getAsJsonObject();
                if (obj.has("error")) {
                    throw new IOException("Hugging Face API error: " + obj.get("error").getAsString());
                }
            }

            throw new IOException("Unexpected Hugging Face response: " + body);
        }
    }

    public static String translate(String text, String targetLang) throws IOException {
        String sourceLang = "en";

        String encoded = URLEncoder.encode(text, StandardCharsets.UTF_8);
        String url = "https://api.mymemory.translated.net/get?q=" + encoded
                + "&langpair=" + sourceLang + "|" + targetLang;

        if (!MYMEMORY_EMAIL.isBlank()) {
            url += "&de=" + URLEncoder.encode(MYMEMORY_EMAIL, StandardCharsets.UTF_8);
        }

        Request request = new Request.Builder().url(url).get().build();

        try (Response response = client.newCall(request).execute()) {
            String body = response.body() != null ? response.body().string() : "";

            if (!response.isSuccessful()) {
                throw new IOException("MyMemory error " + response.code() + ": " + body);
            }

            JsonObject obj = JsonParser.parseString(body).getAsJsonObject();
            JsonObject data = obj.getAsJsonObject("responseData");

            if (data != null && data.has("translatedText")) {
                return data.get("translatedText").getAsString();
            }

            throw new IOException("Unexpected MyMemory response: " + body);
        }
    }
}