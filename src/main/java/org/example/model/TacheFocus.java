package org.example.model;

import java.time.LocalTime;
import java.util.ArrayList;
import java.util.List;

public class TacheFocus {

    private int idTache;
    private String titre;
    private String objectifPrincipal;
    private int niveauDifficulte;
    private String statut;
    private int scoreProductivite;
    private int idUser;
    private LocalTime heureDebut;
    private LocalTime heureFin;
    private int priorite;
    
    // Relation (manual) - One to Many
    private List<SousTache> sousTaches;

    // Constructor vide
    public TacheFocus() {
        this.sousTaches = new ArrayList<>();
    }

    // Constructor complet
    public TacheFocus(int idTache, String titre, String objectifPrincipal, int niveauDifficulte, 
                      String statut, int scoreProductivite, int idUser, LocalTime heureDebut, 
                      LocalTime heureFin, int priorite) {
        this.idTache = idTache;
        this.titre = titre;
        this.objectifPrincipal = objectifPrincipal;
        this.niveauDifficulte = niveauDifficulte;
        this.statut = statut;
        this.scoreProductivite = scoreProductivite;
        this.idUser = idUser;
        this.heureDebut = heureDebut;
        this.heureFin = heureFin;
        this.priorite = priorite;
        this.sousTaches = new ArrayList<>();
    }

    // Getters & Setters
    public int getIdTache() {
        return idTache;
    }

    public void setIdTache(int idTache) {
        this.idTache = idTache;
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

    public int getNiveauDifficulte() {
        return niveauDifficulte;
    }

    public void setNiveauDifficulte(int niveauDifficulte) {
        this.niveauDifficulte = niveauDifficulte;
    }

    public String getStatut() {
        return statut;
    }

    public void setStatut(String statut) {
        this.statut = statut;
    }

    public int getScoreProductivite() {
        return scoreProductivite;
    }

    public void setScoreProductivite(int scoreProductivite) {
        this.scoreProductivite = scoreProductivite;
    }

    public int getIdUser() {
        return idUser;
    }

    public void setIdUser(int idUser) {
        this.idUser = idUser;
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

    public List<SousTache> getSousTaches() {
        return sousTaches;
    }

    public void setSousTaches(List<SousTache> sousTaches) {
        this.sousTaches = sousTaches;
    }
    
    public void addSousTache(SousTache sousTache) {
        this.sousTaches.add(sousTache);
    }
    
    @Override
    public String toString() {
        return "#" + idTache + " - " + titre + (statut != null ? " (" + statut + ")" : "");
    }
}