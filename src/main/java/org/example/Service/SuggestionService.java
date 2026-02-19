package org.example.service;

import org.example.model.SousTache;
import java.time.LocalTime;
import java.util.ArrayList;
import java.util.List;

public class SuggestionService {

    public List<SousTache> suggererSousTaches(int idTache, String titreTache) {
        List<SousTache> suggestions = new ArrayList<>();
        String titre = titreTache.toLowerCase();

        if (titre.contains("développement") || titre.contains("application") || titre.contains("web")) {
            suggestions.add(creer(idTache, "Créer le wireframe", 30, LocalTime.of(9,0), LocalTime.of(9,30), 1));
            suggestions.add(creer(idTache, "Développer le frontend", 60, LocalTime.of(9,30), LocalTime.of(10,30), 2));
            suggestions.add(creer(idTache, "Développer le backend", 90, LocalTime.of(10,30), LocalTime.of(12,0), 3));
            suggestions.add(creer(idTache, "Tester l'application", 45, LocalTime.of(13,0), LocalTime.of(13,45), 4));

        } else if (titre.contains("marketing") || titre.contains("étude")) {
            suggestions.add(creer(idTache, "Analyser les concurrents", 45, LocalTime.of(9,0), LocalTime.of(9,45), 1));
            suggestions.add(creer(idTache, "Collecter les données", 60, LocalTime.of(9,45), LocalTime.of(10,45), 2));
            suggestions.add(creer(idTache, "Créer le rapport", 30, LocalTime.of(11,0), LocalTime.of(11,30), 3));

        } else if (titre.contains("formation") || titre.contains("productivité")) {
            suggestions.add(creer(idTache, "Lire la documentation", 30, LocalTime.of(8,0), LocalTime.of(8,30), 1));
            suggestions.add(creer(idTache, "Pratiquer les exercices", 60, LocalTime.of(8,30), LocalTime.of(9,30), 2));
            suggestions.add(creer(idTache, "Faire un résumé", 20, LocalTime.of(9,30), LocalTime.of(9,50), 3));

        } else {
            // Suggestions génériques
            suggestions.add(creer(idTache, "Planifier la tâche", 15, LocalTime.of(9,0), LocalTime.of(9,15), 1));
            suggestions.add(creer(idTache, "Exécuter la tâche", 60, LocalTime.of(9,15), LocalTime.of(10,15), 2));
            suggestions.add(creer(idTache, "Vérifier le résultat", 15, LocalTime.of(10,15), LocalTime.of(10,30), 3));
        }

        return suggestions;
    }

    private SousTache creer(int idTache, String desc, int duree, LocalTime debut, LocalTime fin, int priorite) {
        SousTache st = new SousTache();
        st.setIdTache(idTache);
        st.setDescription(desc);
        st.setDureeRecommandee(duree);
        st.setEtat("À faire");
        st.setHeureDebut(debut);
        st.setHeureFin(fin);
        st.setPriorite(priorite);
        return st;
    }
}