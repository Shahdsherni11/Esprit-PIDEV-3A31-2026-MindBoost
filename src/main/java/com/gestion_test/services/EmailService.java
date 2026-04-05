package com.gestion_test.services;

import javax.mail.*;
import javax.mail.internet.*;
import java.util.Properties;

public class EmailService {

    // ===== CONFIGURATION GMAIL =====
    // 1. Allez sur https://myaccount.google.com/apppasswords
    // 2. Generez un "Mot de passe d'application"
    // 3. Mettez-le ici
    private static final String FROM_EMAIL = "chernichahd5@gmail.com";
    private static final String APP_PASSWORD = "cutl vgby arrb fhfw";
    private static final String SMTP_HOST = "smtp.gmail.com";
    private static final int SMTP_PORT = 587;

    public static boolean sendEmail(String toEmail, String subject, String htmlBody) {
        try {
            Properties props = new Properties();
            props.put("mail.smtp.auth", "true");
            props.put("mail.smtp.starttls.enable", "true");
            props.put("mail.smtp.host", SMTP_HOST);
            props.put("mail.smtp.port", String.valueOf(SMTP_PORT));
            props.put("mail.smtp.ssl.protocols", "TLSv1.2");
            props.put("mail.smtp.ssl.trust", SMTP_HOST);

            Session session = Session.getInstance(props, new Authenticator() {
                @Override
                protected PasswordAuthentication getPasswordAuthentication() {
                    return new PasswordAuthentication(FROM_EMAIL, APP_PASSWORD);
                }
            });

            Message message = new MimeMessage(session);
            message.setFrom(new InternetAddress(FROM_EMAIL, "MindBoost"));
            message.setRecipients(Message.RecipientType.TO, InternetAddress.parse(toEmail));
            message.setSubject(subject);
            message.setContent(htmlBody, "text/html; charset=utf-8");

            Transport.send(message);
            System.out.println("Email envoye a: " + toEmail);
            return true;

        } catch (Exception e) {
            System.err.println("Erreur envoi email: " + e.getMessage());
            e.printStackTrace();
            return false;
        }
    }

    // ===== EMAIL RESULTATS TEST A L'ETUDIANT =====

    public static boolean sendTestResultEmail(String studentEmail, String studentName,
                                              String testTitle, String category,
                                              String level, int percentage,
                                              int totalScore, int maxScore) {
        String levelColor = "#2ECC71";
        String levelEmoji = "Bon";
        if ("Modere".equals(level)) { levelColor = "#F39C12"; levelEmoji = "Attention"; }
        else if ("Eleve".equals(level)) { levelColor = "#E74C3C"; levelEmoji = "Alerte"; }

        String subject = "MindBoost - Resultats de votre test : " + testTitle;

        String html = "<!DOCTYPE html><html><head><meta charset='UTF-8'></head>"
                + "<body style='font-family: Arial, sans-serif; background-color: #0F0F23; color: #E8E8F0; padding: 20px;'>"
                + "<div style='max-width: 600px; margin: 0 auto; background-color: #1A1A2E; border-radius: 16px; padding: 30px; border: 1px solid rgba(108,99,255,0.3);'>"

                // Header
                + "<div style='text-align: center; margin-bottom: 30px;'>"
                + "<h1 style='color: white; margin: 0;'>Mind<span style='color: #6C63FF;'>Boost</span></h1>"
                + "<p style='color: #9B9BB0; font-size: 12px;'>Suivi de sante mentale</p>"
                + "</div>"

                // Salutation
                + "<p style='font-size: 16px;'>Bonjour <strong>" + studentName + "</strong>,</p>"
                + "<p>Voici les resultats de votre test <strong>" + testTitle + "</strong> :</p>"

                // Resultats
                + "<div style='background-color: rgba(108,99,255,0.1); border-radius: 12px; padding: 20px; margin: 20px 0;'>"
                + "<table style='width: 100%; border-collapse: collapse;'>"
                + "<tr><td style='padding: 8px; color: #9B9BB0;'>Categorie</td>"
                + "<td style='padding: 8px; font-weight: bold; text-align: right;'>" + category + "</td></tr>"
                + "<tr><td style='padding: 8px; color: #9B9BB0;'>Score</td>"
                + "<td style='padding: 8px; font-weight: bold; text-align: right;'>" + totalScore + "/" + maxScore + "</td></tr>"
                + "<tr><td style='padding: 8px; color: #9B9BB0;'>Pourcentage</td>"
                + "<td style='padding: 8px; font-weight: bold; text-align: right;'>" + percentage + "%</td></tr>"
                + "<tr><td style='padding: 8px; color: #9B9BB0;'>Niveau</td>"
                + "<td style='padding: 8px; font-weight: bold; text-align: right;'>"
                + "<span style='background-color: " + levelColor + "33; color: " + levelColor + "; "
                + "padding: 4px 12px; border-radius: 12px;'>" + levelEmoji + " " + level + "</span></td></tr>"
                + "</table>"
                + "</div>"

                // Conseils selon le niveau
                + "<div style='background-color: rgba(78,205,196,0.1); border-radius: 12px; padding: 20px; margin: 20px 0; "
                + "border-left: 4px solid #4ECDC4;'>"
                + "<h3 style='color: #4ECDC4; margin-top: 0;'>Conseils</h3>"
                + getAdviceHtml(category, level)
                + "</div>"

                // Footer
                + "<div style='text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.05);'>"
                + "<p style='color: #9B9BB0; font-size: 11px;'>Cet email a ete envoye automatiquement par MindBoost.</p>"
                + "<p style='color: #9B9BB0; font-size: 11px;'>Si vous avez des questions, contactez votre psychologue.</p>"
                + "</div>"

                + "</div></body></html>";

        return sendEmail(studentEmail, subject, html);
    }

    // ===== ALERTE AU PSYCHOLOGUE SI NIVEAU ELEVE =====

    public static boolean sendAlertToPsychologist(String psychologistEmail, String studentName,
                                                  String studentEmail, String category,
                                                  String level, int percentage) {
        if (!"Eleve".equals(level)) return false;

        String subject = "ALERTE MindBoost - Etudiant en difficulte : " + studentName;

        String html = "<!DOCTYPE html><html><head><meta charset='UTF-8'></head>"
                + "<body style='font-family: Arial, sans-serif; background-color: #0F0F23; color: #E8E8F0; padding: 20px;'>"
                + "<div style='max-width: 600px; margin: 0 auto; background-color: #1A1A2E; border-radius: 16px; padding: 30px; "
                + "border: 1px solid #E74C3C;'>"

                + "<div style='text-align: center; margin-bottom: 20px;'>"
                + "<h1 style='color: white;'>Mind<span style='color: #6C63FF;'>Boost</span></h1>"
                + "<div style='background-color: #E74C3C33; color: #E74C3C; padding: 10px 20px; border-radius: 8px; "
                + "font-weight: bold; font-size: 16px; display: inline-block;'>ALERTE - NIVEAU ELEVE</div>"
                + "</div>"

                + "<p>Un etudiant a obtenu un <strong>niveau eleve</strong> lors de son dernier test :</p>"

                + "<div style='background-color: rgba(231,76,60,0.1); border-radius: 12px; padding: 20px; margin: 20px 0;'>"
                + "<table style='width: 100%; border-collapse: collapse;'>"
                + "<tr><td style='padding: 8px; color: #9B9BB0;'>Etudiant</td>"
                + "<td style='padding: 8px; font-weight: bold; text-align: right;'>" + studentName + "</td></tr>"
                + "<tr><td style='padding: 8px; color: #9B9BB0;'>Email</td>"
                + "<td style='padding: 8px; text-align: right;'>" + studentEmail + "</td></tr>"
                + "<tr><td style='padding: 8px; color: #9B9BB0;'>Categorie</td>"
                + "<td style='padding: 8px; font-weight: bold; text-align: right;'>" + category + "</td></tr>"
                + "<tr><td style='padding: 8px; color: #9B9BB0;'>Pourcentage</td>"
                + "<td style='padding: 8px; font-weight: bold; text-align: right; color: #E74C3C;'>" + percentage + "%</td></tr>"
                + "<tr><td style='padding: 8px; color: #9B9BB0;'>Niveau</td>"
                + "<td style='padding: 8px; font-weight: bold; text-align: right; color: #E74C3C;'>ELEVE</td></tr>"
                + "</table>"
                + "</div>"

                + "<p style='color: #F39C12;'><strong>Action recommandee :</strong> Prenez contact avec cet etudiant pour un suivi.</p>"

                + "<div style='text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.05);'>"
                + "<p style='color: #9B9BB0; font-size: 11px;'>Alerte automatique MindBoost</p>"
                + "</div>"
                + "</div></body></html>";

        return sendEmail(psychologistEmail, subject, html);
    }

    // ===== CONSEILS HTML SELON CATEGORIE/NIVEAU =====

    private static String getAdviceHtml(String category, String level) {
        StringBuilder sb = new StringBuilder();

        if ("Faible".equals(level)) {
            sb.append("<p style='color: #2ECC71;'>Votre niveau est faible, c'est positif!</p>");
            sb.append("<ul style='color: #E8E8F0;'>");
            sb.append("<li>Continuez vos bonnes habitudes</li>");
            sb.append("<li>Maintenez une routine reguliere</li>");
            sb.append("<li>Pratiquez une activite physique</li>");
            sb.append("</ul>");
        } else if ("Modere".equals(level)) {
            sb.append("<p style='color: #F39C12;'>Votre niveau est modere. Quelques ajustements recommandes :</p>");
            sb.append("<ul style='color: #E8E8F0;'>");
            sb.append("<li>Pratiquez la respiration profonde (4-7-8)</li>");
            sb.append("<li>Faites 30 minutes d'exercice par jour</li>");
            sb.append("<li>Etablissez une routine de sommeil reguliere</li>");
            sb.append("<li>Parlez a un proche de confiance</li>");
            sb.append("</ul>");
        } else {
            sb.append("<p style='color: #E74C3C;'><strong>Votre niveau est eleve. Recommandations importantes :</strong></p>");
            sb.append("<ul style='color: #E8E8F0;'>");
            sb.append("<li><strong>Consultez un professionnel de sante mentale</strong></li>");
            sb.append("<li>Ne restez pas seul(e)</li>");
            sb.append("<li>Appelez un proche de confiance</li>");
            sb.append("<li>Pratiquez des exercices de relaxation quotidiens</li>");
            sb.append("</ul>");
        }

        return sb.toString();
    }

    // ===== EMAIL DE RAPPEL HEBDOMADAIRE =====

    public static boolean sendWeeklyReminder(String studentEmail, String studentName) {
        String subject = "MindBoost - Rappel : Passez votre test hebdomadaire !";

        String html = "<!DOCTYPE html><html><head><meta charset='UTF-8'></head>"
                + "<body style='font-family: Arial, sans-serif; background-color: #0F0F23; color: #E8E8F0; padding: 20px;'>"
                + "<div style='max-width: 600px; margin: 0 auto; background-color: #1A1A2E; border-radius: 16px; padding: 30px; "
                + "border: 1px solid rgba(108,99,255,0.3);'>"

                + "<div style='text-align: center; margin-bottom: 20px;'>"
                + "<h1 style='color: white;'>Mind<span style='color: #6C63FF;'>Boost</span></h1>"
                + "</div>"

                + "<p style='font-size: 16px;'>Bonjour <strong>" + studentName + "</strong>,</p>"
                + "<p>C'est l'heure de votre test hebdomadaire ! Suivre votre progression regulierement "
                + "est essentiel pour votre bien-etre.</p>"

                + "<div style='text-align: center; margin: 30px 0;'>"
                + "<div style='background-color: #6C63FF; color: white; padding: 15px 30px; "
                + "border-radius: 12px; font-weight: bold; font-size: 16px; display: inline-block;'>"
                + "Connectez-vous pour passer votre test"
                + "</div>"
                + "</div>"

                + "<p style='color: #9B9BB0;'>Passer vos tests regulierement permet de :</p>"
                + "<ul style='color: #E8E8F0;'>"
                + "<li>Suivre votre evolution semaine par semaine</li>"
                + "<li>Recevoir des conseils personnalises</li>"
                + "<li>Detecter les changements rapidement</li>"
                + "</ul>"

                + "<div style='text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.05);'>"
                + "<p style='color: #9B9BB0; font-size: 11px;'>MindBoost - Votre compagnon de sante mentale</p>"
                + "</div>"
                + "</div></body></html>";

        return sendEmail(studentEmail, subject, html);
    }
}