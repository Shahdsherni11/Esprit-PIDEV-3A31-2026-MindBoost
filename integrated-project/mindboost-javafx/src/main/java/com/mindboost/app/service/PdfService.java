package com.mindboost.app.service;

import com.itextpdf.text.Document;
import com.itextpdf.text.DocumentException;
import com.itextpdf.text.Font;
import com.itextpdf.text.Paragraph;
import com.itextpdf.text.pdf.PdfPCell;
import com.itextpdf.text.pdf.PdfPTable;
import com.itextpdf.text.pdf.PdfWriter;

import java.io.File;
import java.io.FileOutputStream;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.List;

public class PdfService {
    private final Font titleFont = new Font(Font.FontFamily.HELVETICA, 16, Font.BOLD);
    private final Font bodyFont = new Font(Font.FontFamily.HELVETICA, 11);

    public File exportHistory(List<UserProgressService.HistoryItem> history, String filename) {
        return createTablePdf(filename, "Historique des tests", List.of("Type", "Titre", "Score", "%", "Catégorie", "Niveau"),
            history.stream().map(item -> List.of(
                item.type(),
                item.title(),
                String.valueOf(item.score()),
                String.valueOf(item.percentage()),
                item.category(),
                item.level()
            )).toList());
    }

    public File exportUserStatistics(UserStatisticsService.UserStats stats, String filename) {
        List<List<String>> rows = stats.history().stream().map(item -> List.of(
            String.valueOf(item.week()),
            item.category(),
            item.level(),
            String.valueOf(item.percentage())
        )).toList();
        return createTablePdf(filename, "Statistiques utilisateur", List.of("Semaine", "Catégorie", "Niveau", "%"), rows);
    }

    public File exportTaskStatistics(TaskService.TaskStats stats, String filename) {
        return createTablePdf(filename, "Statistiques tâches", List.of("Indicateur", "Valeur"), List.of(
            List.of("Total tâches", String.valueOf(stats.totalTaches())),
            List.of("Total sous-tâches", String.valueOf(stats.totalSousTaches())),
            List.of("Score moyen", String.valueOf(stats.scoreMoyen())),
            List.of("Tâches terminées", String.valueOf(stats.tachesTerminees())),
            List.of("Progression", stats.progression() + "%")
        ));
    }

    private File createTablePdf(String filename, String title, List<String> headers, List<List<String>> rows) {
        try {
            File file = new File(filename);
            Document document = new Document();
            PdfWriter.getInstance(document, new FileOutputStream(file));
            document.open();

            document.add(new Paragraph(title, titleFont));
            document.add(new Paragraph("Généré le " + LocalDateTime.now().format(DateTimeFormatter.ofPattern("yyyy-MM-dd HH:mm")), bodyFont));
            document.add(new Paragraph(" "));

            PdfPTable table = new PdfPTable(headers.size());
            headers.forEach(header -> {
                PdfPCell cell = new PdfPCell(new Paragraph(header, bodyFont));
                cell.setBackgroundColor(new com.itextpdf.text.BaseColor(230, 230, 230));
                table.addCell(cell);
            });

            for (List<String> row : rows) {
                for (String value : row) {
                    table.addCell(new Paragraph(value == null ? "-" : value, bodyFont));
                }
            }

            document.add(table);
            document.close();
            return file;
        } catch (DocumentException | java.io.IOException e) {
            throw new IllegalStateException("Erreur lors de la génération du PDF", e);
        }
    }
}
