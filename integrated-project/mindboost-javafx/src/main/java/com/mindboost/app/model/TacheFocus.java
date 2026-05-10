package com.mindboost.app.model;

import jakarta.persistence.*;

import java.time.LocalTime;
import java.util.ArrayList;
import java.util.List;

@Entity
@Table(name = "tache_focus")
public class TacheFocus {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id_tache")
    private Integer id;

    @Column(length = 255)
    private String titre;

    @Column(name = "objectif_principal", length = 255, nullable = false)
    private String objectifPrincipal;

    @Column(name = "niveau_difficulte")
    private Integer niveauDifficulte;

    @Column(length = 50)
    private String statut;

    @Column(name = "score_productivite")
    private Integer scoreProductivite;

    @Column(name = "heure_debut")
    private LocalTime heureDebut;

    @Column(name = "heure_fin")
    private LocalTime heureFin;

    @OneToMany(mappedBy = "tacheFocus", cascade = CascadeType.ALL, orphanRemoval = true)
    private List<SousTache> sousTaches = new ArrayList<>();

    public Integer getId() {
        return id;
    }

    public String getTitre() {
        return titre;
    }

    public void setTitre(String titre) {
        this.titre = titre;
    }

    public String getObjectifPrincipal() {
        return objectifPrincipal;
    }

    public void setObjectifPrincipal(String objectifPrincipal) {
        this.objectifPrincipal = objectifPrincipal;
    }

    public Integer getNiveauDifficulte() {
        return niveauDifficulte;
    }

    public void setNiveauDifficulte(Integer niveauDifficulte) {
        this.niveauDifficulte = niveauDifficulte;
    }

    public String getStatut() {
        return statut;
    }

    public void setStatut(String statut) {
        this.statut = statut;
    }

    public Integer getScoreProductivite() {
        return scoreProductivite;
    }

    public void setScoreProductivite(Integer scoreProductivite) {
        this.scoreProductivite = scoreProductivite;
    }

    public LocalTime getHeureDebut() {
        return heureDebut;
    }

    public void setHeureDebut(LocalTime heureDebut) {
        this.heureDebut = heureDebut;
    }

    public LocalTime getHeureFin() {
        return heureFin;
    }

    public void setHeureFin(LocalTime heureFin) {
        this.heureFin = heureFin;
    }

    public List<SousTache> getSousTaches() {
        return sousTaches;
    }

    public void addSousTache(SousTache sousTache) {
        sousTaches.add(sousTache);
        sousTache.setTacheFocus(this);
    }

    public void removeSousTache(SousTache sousTache) {
        sousTaches.remove(sousTache);
        sousTache.setTacheFocus(null);
    }
}
