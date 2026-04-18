package org.example.model;

import java.time.LocalTime;

public class SousTache {

    private int idSousTache;
    private int idTache;
    private String description;
    private int dureeRecommandee;
    private String etat;
    private LocalTime heureDebut;
    private LocalTime heureFin;
    private int priorite;

    // Constructor vide
    public SousTache() {
    }

    // Constructor complet
    public SousTache(int idSousTache, int idTache, String description, int dureeRecommandee, 
                     String etat, LocalTime heureDebut, LocalTime heureFin, int priorite) {
        this.idSousTache = idSousTache;
        this.idTache = idTache;
        this.description = description;
        this.dureeRecommandee = dureeRecommandee;
        this.etat = etat;
        this.heureDebut = heureDebut;
        this.heureFin = heureFin;
        this.priorite = priorite;
    }

    // Getters & Setters
    public int getIdSousTache() {
        return idSousTache;
    }

    public void setIdSousTache(int idSousTache) {
        this.idSousTache = idSousTache;
    }

    public int getIdTache() {
        return idTache;
    }

    public void setIdTache(int idTache) {
        this.idTache = idTache;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public int getDureeRecommandee() {
        return dureeRecommandee;
    }

    public void setDureeRecommandee(int dureeRecommandee) {
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

    public int getPriorite() {
        return priorite;
    }

    public void setPriorite(int priorite) {
        this.priorite = priorite;
    }

    @Override
    public String toString() {
        return description;
    }
}