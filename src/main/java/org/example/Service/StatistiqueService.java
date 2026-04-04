package org.example.Service;

import org.example.controller.TacheFocusController;
import org.example.model.TacheFocus;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class StatistiqueService {

    private TacheFocusController tacheController = new TacheFocusController();

    // Retourne un Map : statut → nombre de tâches
    public Map<String, Integer> getStatutRepartition() {
        Map<String, Integer> map = new HashMap<>();

        List<TacheFocus> taches = tacheController.getAllTaches();

        for (TacheFocus t : taches) {
            String statut = t.getStatut();
            if (statut == null || statut.isEmpty()) statut = "Non défini";
            map.put(statut, map.getOrDefault(statut, 0) + 1);
        }

        return map;
    }

    // Retourne le score moyen de productivité
    public double getScoreMoyen() {
        List<TacheFocus> taches = tacheController.getAllTaches();
        return taches.stream()
                .mapToInt(TacheFocus::getScoreProductivite)
                .average()
                .orElse(0.0);
    }

    // Retourne le nombre total de tâches
    public int getTotalTaches() {
        return tacheController.getAllTaches().size();
    }
}
