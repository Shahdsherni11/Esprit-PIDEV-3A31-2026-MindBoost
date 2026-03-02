package com.gestion_test.services;

import com.itextpdf.text.*;
import com.itextpdf.text.pdf.*;
import com.itextpdf.text.pdf.draw.LineSeparator;
import com.gestion_test.services.SpecificScoreService.WeeklyScore;

import java.io.FileOutputStream;
import java.sql.SQLException;
import java.time.LocalDate;
import java.util.List;

public class PDFExportService {

    private static final BaseColor PRIMARY = new BaseColor(108, 99, 255);
    private static final BaseColor TEAL = new BaseColor(78, 205, 196);
    private static final BaseColor GREEN = new BaseColor(46, 204, 113);
    private static final BaseColor ORANGE = new BaseColor(243, 156, 18);
    private static final BaseColor RED = new BaseColor(231, 76, 60);

    public static String exportStudentReport(int userId, String studentName, String studentEmail) {
        String fileName = "MindBoost_Rapport_" + studentName.replace(" ", "_") + "_" +
                LocalDate.now().toString() + ".pdf";
        String filePath = System.getProperty("user.home") + "/Downloads/" + fileName;

        try {
            Document document = new Document(PageSize.A4, 40, 40, 40, 40);
            PdfWriter.getInstance(document, new FileOutputStream(filePath));
            document.open();

            Font titleFont = new Font(Font.FontFamily.HELVETICA, 28, Font.BOLD, PRIMARY);
            Font subtitleFont = new Font(Font.FontFamily.HELVETICA, 12, Font.NORMAL, BaseColor.GRAY);
            Font sectionFont = new Font(Font.FontFamily.HELVETICA, 16, Font.BOLD, PRIMARY);
            Font normalFont = new Font(Font.FontFamily.HELVETICA, 11, Font.NORMAL, BaseColor.DARK_GRAY);
            Font boldFont = new Font(Font.FontFamily.HELVETICA, 11, Font.BOLD, BaseColor.BLACK);
            Font smallFont = new Font(Font.FontFamily.HELVETICA, 9, Font.NORMAL, BaseColor.GRAY);

            // ===== TITRE =====
            Paragraph title = new Paragraph("MindBoost", titleFont);
            title.setAlignment(Element.ALIGN_CENTER);
            document.add(title);

            Paragraph subtitle = new Paragraph("Rapport de Suivi - Sante Mentale", subtitleFont);
            subtitle.setAlignment(Element.ALIGN_CENTER);
            subtitle.setSpacingAfter(5);
            document.add(subtitle);

            Paragraph datePara = new Paragraph("Genere le " + LocalDate.now().toString(), smallFont);
            datePara.setAlignment(Element.ALIGN_CENTER);
            datePara.setSpacingAfter(20);
            document.add(datePara);

            addSeparator(document);

            // ===== INFOS ETUDIANT =====
            Paragraph infoTitle = new Paragraph("Informations de l'etudiant", sectionFont);
            infoTitle.setSpacingBefore(15);
            infoTitle.setSpacingAfter(10);
            document.add(infoTitle);

            PdfPTable infoTable = new PdfPTable(2);
            infoTable.setWidthPercentage(100);
            infoTable.setWidths(new float[]{1, 2});
            addInfoRow(infoTable, "Nom", studentName, normalFont, boldFont);
            addInfoRow(infoTable, "Email", studentEmail, normalFont, boldFont);
            addInfoRow(infoTable, "Date du rapport", LocalDate.now().toString(), normalFont, boldFont);
            document.add(infoTable);

            // ===== SCORES =====
            addSeparator(document);
            Paragraph scoresTitle = new Paragraph("Resultats", sectionFont);
            scoresTitle.setSpacingBefore(15);
            scoresTitle.setSpacingAfter(10);
            document.add(scoresTitle);

            int generalPct = -1;
            String category = "N/A";
            try {
                generalPct = ScoreService.getLatestPercentageForUser(userId);
                if (generalPct >= 0) category = ScoreService.getCategoryFromPercentage(generalPct);
            } catch (SQLException e) { }

            int specificPct = -1;
            String level = "N/A";
            try {
                specificPct = SpecificScoreService.getLatestPercentage(userId);
                level = SpecificScoreService.getLatestLevel(userId);
            } catch (SQLException e) { }

            PdfPTable scoreTable = new PdfPTable(2);
            scoreTable.setWidthPercentage(100);
            scoreTable.setWidths(new float[]{1, 1});
            scoreTable.setSpacingAfter(10);

            addScoreCard(scoreTable, "Score General", generalPct >= 0 ? generalPct + "%" : "N/A", PRIMARY);
            addScoreCard(scoreTable, "Score Specifique", specificPct >= 0 ? specificPct + "%" : "N/A", TEAL);
            addScoreCard(scoreTable, "Categorie", category, PRIMARY);

            BaseColor levelColor = GREEN;
            if ("Modere".equals(level)) levelColor = ORANGE;
            else if ("Eleve".equals(level)) levelColor = RED;
            addScoreCard(scoreTable, "Niveau", level, levelColor);

            document.add(scoreTable);

            // ===== HISTORIQUE =====
            addSeparator(document);
            Paragraph histTitle = new Paragraph("Historique des Tests Specifiques", sectionFont);
            histTitle.setSpacingBefore(15);
            histTitle.setSpacingAfter(10);
            document.add(histTitle);

            try {
                List<WeeklyScore> scores = SpecificScoreService.getAllScoresForUser(userId);

                if (scores.isEmpty()) {
                    document.add(new Paragraph("Aucun historique disponible.", normalFont));
                } else {
                    PdfPTable histTable = new PdfPTable(6);
                    histTable.setWidthPercentage(100);
                    histTable.setWidths(new float[]{1, 2, 1, 1, 1.5f, 1.5f});

                    String[] headers = {"Sem.", "Test", "Score", "%", "Niveau", "Date"};
                    for (String h : headers) {
                        PdfPCell cell = new PdfPCell(new Phrase(h,
                                new Font(Font.FontFamily.HELVETICA, 10, Font.BOLD, BaseColor.WHITE)));
                        cell.setBackgroundColor(PRIMARY);
                        cell.setPadding(8);
                        cell.setHorizontalAlignment(Element.ALIGN_CENTER);
                        histTable.addCell(cell);
                    }

                    boolean alternate = false;
                    for (WeeklyScore score : scores) {
                        BaseColor rowBg = alternate ? new BaseColor(245, 245, 255) : BaseColor.WHITE;
                        alternate = !alternate;

                        addHistoryCell(histTable, "S" + score.getWeekNumber(), normalFont, rowBg);
                        addHistoryCell(histTable, score.getTestTitle(), normalFont, rowBg);
                        addHistoryCell(histTable, score.getTotalScore() + "/" + score.getMaxScore(), normalFont, rowBg);
                        addHistoryCell(histTable, score.getPercentage() + "%", boldFont, rowBg);

                        BaseColor lvlCol = GREEN;
                        if ("Modere".equals(score.getLevel())) lvlCol = ORANGE;
                        else if ("Eleve".equals(score.getLevel())) lvlCol = RED;
                        PdfPCell lvlCell = new PdfPCell(new Phrase(score.getLevel(),
                                new Font(Font.FontFamily.HELVETICA, 10, Font.BOLD, lvlCol)));
                        lvlCell.setPadding(6);
                        lvlCell.setHorizontalAlignment(Element.ALIGN_CENTER);
                        lvlCell.setBackgroundColor(rowBg);
                        histTable.addCell(lvlCell);

                        String dateStr = score.getPassedAt() != null && score.getPassedAt().length() >= 10
                                ? score.getPassedAt().substring(0, 10) : "N/A";
                        addHistoryCell(histTable, dateStr, smallFont, rowBg);
                    }

                    document.add(histTable);
                }
            } catch (SQLException e) {
                document.add(new Paragraph("Erreur chargement historique.", normalFont));
            }

            // ===== CONSEILS =====
            addSeparator(document);
            Paragraph conseilTitle = new Paragraph("Recommandations", sectionFont);
            conseilTitle.setSpacingBefore(15);
            conseilTitle.setSpacingAfter(10);
            document.add(conseilTitle);

            String conseil = getAdviceText(category, level);
            Paragraph conseilPara = new Paragraph(conseil, normalFont);
            conseilPara.setSpacingAfter(20);
            document.add(conseilPara);

            // ===== FOOTER =====
            addSeparator(document);
            Paragraph footer = new Paragraph(
                    "Ce rapport a ete genere automatiquement par MindBoost.\n" +
                            "Il ne remplace pas un avis medical professionnel.", smallFont);
            footer.setAlignment(Element.ALIGN_CENTER);
            footer.setSpacingBefore(20);
            document.add(footer);

            document.close();
            System.out.println("PDF genere: " + filePath);
            return filePath;

        } catch (Exception e) {
            System.err.println("Erreur PDF: " + e.getMessage());
            e.printStackTrace();
            return null;
        }
    }

    private static void addSeparator(Document doc) throws DocumentException {
        LineSeparator separator = new LineSeparator();
        separator.setLineColor(new BaseColor(200, 200, 220));
        separator.setPercentage(100);
        Paragraph p = new Paragraph();
        p.add(separator);
        p.setSpacingBefore(5);
        p.setSpacingAfter(5);
        doc.add(p);
    }

    private static void addInfoRow(PdfPTable table, String label, String value,
                                   Font labelFont, Font valueFont) {
        PdfPCell labelCell = new PdfPCell(new Phrase(label, labelFont));
        labelCell.setBorder(Rectangle.NO_BORDER);
        labelCell.setPadding(6);
        table.addCell(labelCell);

        PdfPCell valueCell = new PdfPCell(new Phrase(value, valueFont));
        valueCell.setBorder(Rectangle.NO_BORDER);
        valueCell.setPadding(6);
        table.addCell(valueCell);
    }

    private static void addScoreCard(PdfPTable table, String label, String value, BaseColor color) {
        PdfPCell cell = new PdfPCell();
        cell.setPadding(15);
        cell.setBorderColor(new BaseColor(230, 230, 240));
        cell.setBorderWidth(1);

        Paragraph labelPara = new Paragraph(label,
                new Font(Font.FontFamily.HELVETICA, 10, Font.NORMAL, BaseColor.GRAY));
        Paragraph valuePara = new Paragraph(value,
                new Font(Font.FontFamily.HELVETICA, 20, Font.BOLD, color));

        cell.addElement(labelPara);
        cell.addElement(valuePara);
        table.addCell(cell);
    }

    private static void addHistoryCell(PdfPTable table, String text, Font font, BaseColor bg) {
        PdfPCell cell = new PdfPCell(new Phrase(text, font));
        cell.setPadding(6);
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);
        cell.setBackgroundColor(bg);
        table.addCell(cell);
    }

    private static String getAdviceText(String category, String level) {
        if ("N/A".equals(level)) return "Passez un test pour recevoir des conseils personnalises.";

        StringBuilder sb = new StringBuilder();
        sb.append("Categorie: ").append(category).append(" | Niveau: ").append(level).append("\n\n");

        if ("Faible".equals(level)) {
            sb.append("Votre niveau est faible, c'est positif!\n");
            sb.append("- Continuez vos bonnes habitudes\n");
            sb.append("- Maintenez une routine reguliere\n");
            sb.append("- Pratiquez une activite physique reguliere\n");
        } else if ("Modere".equals(level)) {
            sb.append("Votre niveau est modere. Quelques ajustements :\n");
            sb.append("- Pratiquez la respiration profonde (technique 4-7-8)\n");
            sb.append("- Faites 30 minutes d'exercice par jour\n");
            sb.append("- Etablissez une routine de sommeil reguliere\n");
            sb.append("- Parlez a un ami ou proche de confiance\n");
        } else {
            sb.append("ATTENTION - Votre niveau est eleve.\n");
            sb.append("- Consultez un professionnel de sante mentale\n");
            sb.append("- Ne restez pas seul(e)\n");
            sb.append("- Appelez un proche de confiance\n");
            sb.append("- Ligne d'ecoute: 3114\n");
        }

        return sb.toString();
    }
}