package org.example;

import org.example.Service.OpenAIService;
import org.example.controller.TacheFocusController;
import org.example.controller.SousTacheController;
import org.example.model.TacheFocus;
import org.example.model.SousTache;

import java.time.LocalTime;
import java.util.List;

public class Main {

    public static void main(String[] args) {

        TacheFocusController tacheController = new TacheFocusController();
        SousTacheController sousTacheController = new SousTacheController();

        System.out.println("=================================");
        System.out.println("TEST CRUD TACHE FOCUS");
        System.out.println("=================================");

        // ============================
        // CREATE TACHE FOCUS
        // ============================
        TacheFocus tache1 = new TacheFocus(
                0,
                "Développement Application Web",
                "Terminer le frontend de l'application",
                3,
                "En cours",
                75,
                1,
                LocalTime.of(9, 0),
                LocalTime.of(12, 0),
                1
        );

        TacheFocus tache2 = new TacheFocus(
                0,
                "Étude Marketing Digital",
                "Analyser les stratégies des concurrents",
                2,
                "Non commencée",
                0,
                1,
                LocalTime.of(14, 0),
                LocalTime.of(16, 0),
                2
        );

        tacheController.ajouterTache(tache1);
        tacheController.ajouterTache(tache2);

        // ============================
        // READ ALL TACHES
        // ============================
        List<TacheFocus> taches = tacheController.getAllTaches();
        System.out.println("\nListe des tâches focus:");
        for (TacheFocus t : taches) {
            System.out.println(
                    t.getIdTache() + " | " +
                            t.getTitre() + " | " +
                            t.getStatut() + " | " +
                            t.getScoreProductivite() + "%"
            );
        }

        // ============================
        // UPDATE TACHE
        // ============================
        if (!taches.isEmpty()) {
            TacheFocus firstTache = taches.get(0);
            firstTache.setStatut("Terminée");
            firstTache.setScoreProductivite(100);
            tacheController.modifierTache(firstTache);
            System.out.println("\nTâche " + firstTache.getIdTache() + " modifiée!");
        }

        System.out.println("\n=================================");
        System.out.println("TEST CRUD SOUS-TACHE");
        System.out.println("=================================");

        taches = tacheController.getAllTaches();
        if (taches.isEmpty()) {
            System.out.println("Aucune tâche focus trouvée. STOP.");
            return;
        }

        TacheFocus selectedTache = taches.get(0);

        // ============================
        // CREATE SOUS-TACHE
        // ============================
        SousTache st1 = new SousTache(
                0,
                selectedTache.getIdTache(),
                "Créer la maquette wireframe",
                60,
                "Terminée",
                LocalTime.of(9, 0),
                LocalTime.of(10, 0),
                1
        );

        SousTache st2 = new SousTache(
                0,
                selectedTache.getIdTache(),
                "Développer le header responsive",
                90,
                "En cours",
                LocalTime.of(10, 0),
                LocalTime.of(11, 30),
                1
        );

        sousTacheController.ajouterSousTache(st1);
        sousTacheController.ajouterSousTache(st2);

        // ============================
        // READ ALL SOUS-TACHES
        // ============================
        List<SousTache> sousTaches = sousTacheController.getSousTachesByTache(selectedTache.getIdTache());
        System.out.println("\nListe des sous-tâches pour la tâche " + selectedTache.getTitre() + ":");
        for (SousTache st : sousTaches) {
            System.out.println(
                    st.getIdSousTache() + " | " +
                            st.getDescription() + " | " +
                            st.getEtat() + " | " +
                            st.getDureeRecommandee() + " min"
            );
        }

        // ============================
        // UPDATE SOUS-TACHE
        // ============================
        if (!sousTaches.isEmpty()) {
            SousTache firstSousTache = sousTaches.get(0);
            firstSousTache.setEtat("Terminée");
            sousTacheController.modifierSousTache(firstSousTache);
            System.out.println("\nSous-tâche " + firstSousTache.getIdSousTache() + " modifiée!");
        }

        // ============================
        // DELETE ENTITIES
        // ============================
        if (sousTaches.size() > 1) {
            sousTacheController.supprimerSousTache(sousTaches.get(sousTaches.size() - 1).getIdSousTache());
            System.out.println("Sous-tâche supprimée.");
        }

        // ============================
        // TEST OPENAI IA
        // ============================
        try {
            System.out.println("\n=================================");
            System.out.println("TEST IA OPENAI");
            System.out.println("=================================");

            OpenAIService aiService = new OpenAIService();

            List<String> sousTachesIA = aiService.genererSousTachesIA(
                    "Préparer mon projet Java en 5 jours",
                    "Terminer toutes les fonctionnalités"
            );

            System.out.println("\nRéponse IA :");
            for (String s : sousTachesIA) {
                System.out.println("- " + s);
            }

        } catch (Exception e) {
            System.out.println("Erreur IA : " + e.getMessage());
        }

        System.out.println("\n=================================");
        System.out.println("TEST CRUD TERMINÉ AVEC SUCCÈS");
        System.out.println("=================================");
    }
}