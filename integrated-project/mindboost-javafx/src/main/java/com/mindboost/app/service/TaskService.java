package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.SousTache;
import com.mindboost.app.model.TacheFocus;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class TaskService extends BaseService<TacheFocus> {
    private final FocusService focusService;

    public TaskService(DatabaseManager databaseManager, FocusService focusService) {
        super(databaseManager, TacheFocus.class);
        this.focusService = focusService;
    }

    public TaskStats calculateStats(List<TacheFocus> tasks, List<SousTache> sousTaches) {
        Map<String, Integer> parStatut = new HashMap<>();
        for (TacheFocus tache : tasks) {
            String statut = tache.getStatut() == null ? "Non défini" : tache.getStatut();
            parStatut.put(statut, parStatut.getOrDefault(statut, 0) + 1);
        }

        Map<String, Integer> parEtat = new HashMap<>();
        for (SousTache st : sousTaches) {
            String etat = st.getEtat() == null ? "Non défini" : st.getEtat();
            parEtat.put(etat, parEtat.getOrDefault(etat, 0) + 1);
        }

        Map<String, Integer> parDifficulte = new HashMap<>();
        for (TacheFocus tache : tasks) {
            String diff = "Niveau " + (tache.getNiveauDifficulte() == null ? "?" : tache.getNiveauDifficulte());
            parDifficulte.put(diff, parDifficulte.getOrDefault(diff, 0) + 1);
        }

        int totalTaches = tasks.size();
        int totalSousTaches = sousTaches.size();
        int scoreMoyen = totalTaches > 0
            ? (int) Math.round(tasks.stream().mapToInt(t -> t.getScoreProductivite() == null ? 0 : t.getScoreProductivite()).average().orElse(0))
            : 0;
        int tachesTerminees = parStatut.getOrDefault("Terminée", 0);
        int progression = totalTaches > 0 ? (int) Math.round((double) tachesTerminees / totalTaches * 100) : 0;

        return new TaskStats(parStatut, parEtat, parDifficulte, totalTaches, totalSousTaches, scoreMoyen, tachesTerminees, progression);
    }

    public FocusAdvice getFocusAdvice(TacheFocus task) {
        return focusService.buildAdvice(task);
    }

    public record TaskStats(Map<String, Integer> parStatut,
                            Map<String, Integer> parEtat,
                            Map<String, Integer> parDifficulte,
                            int totalTaches,
                            int totalSousTaches,
                            int scoreMoyen,
                            int tachesTerminees,
                            int progression) {}

    public record FocusAdvice(String conseil, int priorite, int dureeMinutes, List<FocusService.BookRecommendation> books, List<FocusService.MusicRecommendation> tracks) {}
}
