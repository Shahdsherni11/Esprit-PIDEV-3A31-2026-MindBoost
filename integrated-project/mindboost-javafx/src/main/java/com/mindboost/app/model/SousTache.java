package com.mindboost.app.model;

import jakarta.persistence.*;

import java.time.LocalTime;

@Entity
@Table(name = "sous_tache")
public class SousTache {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id_sous_tache")
    private Integer id;

    @Column(length = 255)
    private String description;

    @Column(name = "duree_recommandee")
    private Integer dureeRecommandee;

    @Column(length = 50)
    private String etat;

    @Column(name = "heure_debut")
    private LocalTime heureDebut;

    @Column(name = "heure_fin")
    private LocalTime heureFin;

    private Integer priorite;

    @ManyToOne(fetch = FetchType.LAZY)
    @JoinColumn(name = "id_tache")
    private TacheFocus tacheFocus;

    public Integer getId() {
        return id;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public Integer getDureeRecommandee() {
        return dureeRecommandee;
    }

    public void setDureeRecommandee(Integer dureeRecommandee) {
        this.dureeRecommandee = dureeRecommandee;
    }

    public String getEtat() {
        return etat;
    }

    public void setEtat(String etat) {
        this.etat = etat;
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

    public Integer getPriorite() {
        return priorite;
    }

    public void setPriorite(Integer priorite) {
        this.priorite = priorite;
    }

    public TacheFocus getTacheFocus() {
        return tacheFocus;
    }

    public void setTacheFocus(TacheFocus tacheFocus) {
        this.tacheFocus = tacheFocus;
    }
}
