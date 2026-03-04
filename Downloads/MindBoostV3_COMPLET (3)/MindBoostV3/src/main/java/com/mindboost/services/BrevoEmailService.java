package com.mindboost.services;

import com.google.gson.*;
import okhttp3.*;
import java.io.IOException;

/**
 * Service Brevo (ex-Sendinblue) — Plan gratuit : 300 emails/jour
 * Inscription: https://www.brevo.com (gratuit, pas de CB)
 */
public class BrevoEmailService {

    private static String API_KEY = System.getProperty("BREVO_API_KEY", "YOUR_BREVO_KEY");
    private static final String API_URL = "https://api.brevo.com/v3/smtp/email";

    private static final OkHttpClient client = new OkHttpClient();

    public static void setApiKey(String key) { API_KEY = key; }

    /**
     * Envoie une alerte au psychologue
     */
    public static boolean sendPsychAlert(String psyEmail, String psyName,
                                          String patientName, String alertMessage,
                                          double anomalyScore) throws IOException {
        JsonObject body = new JsonObject();

        // Expéditeur
        JsonObject sender = new JsonObject();
        sender.addProperty("name", "MindBoost Alerts");
        sender.addProperty("email", "noreply@mindboost.app");
        body.add("sender", sender);

        // Destinataire
        JsonArray to = new JsonArray();
        JsonObject recipient = new JsonObject();
        recipient.addProperty("email", psyEmail);
        recipient.addProperty("name", psyName);
        to.add(recipient);
        body.add("to", to);

        // Sujet
        String urgency = anomalyScore >= 70 ? "🚨 URGENT" : "⚠️ ATTENTION";
        body.addProperty("subject", urgency + " — Alerte patient: " + patientName);

        // Contenu HTML
        String html = """
            <div style="font-family:Arial,sans-serif;max-width:600px;margin:0 auto;background:#1A1A2E;color:white;padding:30px;border-radius:12px;">
                <div style="text-align:center;margin-bottom:24px;">
                    <h1 style="color:#6C63FF;margin:0;">Mind<span style="color:white">Boost</span></h1>
                    <p style="color:#9B9BB0;font-size:13px;">Système d'Alerte Psychologique</p>
                </div>
                <div style="background:rgba(231,76,60,0.15);border:1px solid rgba(231,76,60,0.5);border-radius:8px;padding:20px;margin-bottom:20px;">
                    <h2 style="color:#E74C3C;margin-top:0;">%s</h2>
                    <p style="color:#E8E8F0;">Patient: <strong>%s</strong></p>
                    <p style="color:#E8E8F0;">Score d'anomalie: <strong style="color:#E74C3C;">%.0f%%</strong></p>
                    <p style="color:#E8E8F0;">Message: %s</p>
                </div>
                <p style="color:#9B9BB0;font-size:12px;text-align:center;">
                    Veuillez contacter ce patient dès que possible.<br>
                    Ce message est généré automatiquement par MindBoost.
                </p>
            </div>
            """.formatted(urgency, patientName, anomalyScore, alertMessage);

        body.addProperty("htmlContent", html);

        Request request = new Request.Builder()
            .url(API_URL)
            .addHeader("api-key", API_KEY)
            .addHeader("Content-Type", "application/json")
            .post(RequestBody.create(body.toString(), MediaType.get("application/json")))
            .build();

        try (Response response = client.newCall(request).execute()) {
            return response.isSuccessful();
        }
    }
}
