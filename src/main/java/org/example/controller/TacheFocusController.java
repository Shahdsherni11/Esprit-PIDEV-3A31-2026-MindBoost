package org.example.controller;

import org.example.util.DBConnection;
import org.example.model.TacheFocus;
import org.example.model.SousTache;

import java.sql.*;
import java.time.LocalTime;
import java.util.ArrayList;
import java.util.List;

public class TacheFocusController {

    // =============================
    // CREATE TACHE FOCUS
    // =============================
    public void ajouterTache(TacheFocus tache) {

        String sql = """
            INSERT INTO tache_focus (titre, objectif_principal, niveau_difficulte, statut, 
                                    score_productivite, id_user, heure_debut, heure_fin, priorite) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        """;

        try (Connection conn = DBConnection.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setString(1, tache.getTitre());
            stmt.setString(2, tache.getObjectifPrincipal());
            stmt.setInt(3, tache.getNiveauDifficulte());
            stmt.setString(4, tache.getStatut());
            stmt.setInt(5, tache.getScoreProductivite());
            stmt.setInt(6, tache.getIdUser());
            stmt.setTime(7, tache.getHeureDebut() != null ? Time.valueOf(tache.getHeureDebut()) : null);
            stmt.setTime(8, tache.getHeureFin() != null ? Time.valueOf(tache.getHeureFin()) : null);
            stmt.setInt(9, tache.getPriorite());

            stmt.executeUpdate();
            System.out.println("Tache focus ajoutée avec succès");

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // =============================
    // READ ALL TACHE FOCUS
    // =============================
    public List<TacheFocus> getAllTaches() {

        List<TacheFocus> list = new ArrayList<>();

        String sql = "SELECT * FROM tache_focus ORDER BY priorite, heure_debut";

        try (Connection conn = DBConnection.getConnection();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {

            while (rs.next()) {

                TacheFocus t = new TacheFocus();
                t.setIdTache(rs.getInt("id_tache"));
                t.setTitre(rs.getString("titre"));
                t.setObjectifPrincipal(rs.getString("objectif_principal"));
                t.setNiveauDifficulte(rs.getInt("niveau_difficulte"));
                t.setStatut(rs.getString("statut"));
                t.setScoreProductivite(rs.getInt("score_productivite"));
                t.setIdUser(rs.getInt("id_user"));
                
                Time debut = rs.getTime("heure_debut");
                Time fin = rs.getTime("heure_fin");
                t.setHeureDebut(debut != null ? debut.toLocalTime() : null);
                t.setHeureFin(fin != null ? fin.toLocalTime() : null);
                t.setPriorite(rs.getInt("priorite"));

                list.add(t);
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return list;
    }

    // =============================
    // UPDATE TACHE FOCUS
    // =============================
    public void modifierTache(TacheFocus tache) {

        String sql = """
            UPDATE tache_focus
            SET titre = ?, objectif_principal = ?, niveau_difficulte = ?, statut = ?, 
                score_productivite = ?, id_user = ?, heure_debut = ?, heure_fin = ?, priorite = ?
            WHERE id_tache = ?
        """;

        try (Connection conn = DBConnection.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setString(1, tache.getTitre());
            stmt.setString(2, tache.getObjectifPrincipal());
            stmt.setInt(3, tache.getNiveauDifficulte());
            stmt.setString(4, tache.getStatut());
            stmt.setInt(5, tache.getScoreProductivite());
            stmt.setInt(6, tache.getIdUser());
            stmt.setTime(7, tache.getHeureDebut() != null ? Time.valueOf(tache.getHeureDebut()) : null);
            stmt.setTime(8, tache.getHeureFin() != null ? Time.valueOf(tache.getHeureFin()) : null);
            stmt.setInt(9, tache.getPriorite());
            stmt.setInt(10, tache.getIdTache());

            stmt.executeUpdate();
            System.out.println("Tache focus modifiée");

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // =============================
    // DELETE TACHE FOCUS
    // =============================
    public void supprimerTache(int idTache) {

        String sql = "DELETE FROM tache_focus WHERE id_tache = ?";

        try (Connection conn = DBConnection.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, idTache);
            stmt.executeUpdate();
            System.out.println("Tache focus supprimée");

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // =============================
    // GET BY ID
    // =============================
    public TacheFocus getTacheById(int idTache) {

        String sql = "SELECT * FROM tache_focus WHERE id_tache = ?";

        try (Connection conn = DBConnection.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, idTache);
            ResultSet rs = stmt.executeQuery();

            if (rs.next()) {
                TacheFocus t = new TacheFocus();
                t.setIdTache(rs.getInt("id_tache"));
                t.setTitre(rs.getString("titre"));
                t.setObjectifPrincipal(rs.getString("objectif_principal"));
                t.setNiveauDifficulte(rs.getInt("niveau_difficulte"));
                t.setStatut(rs.getString("statut"));
                t.setScoreProductivite(rs.getInt("score_productivite"));
                t.setIdUser(rs.getInt("id_user"));
                
                Time debut = rs.getTime("heure_debut");
                Time fin = rs.getTime("heure_fin");
                t.setHeureDebut(debut != null ? debut.toLocalTime() : null);
                t.setHeureFin(fin != null ? fin.toLocalTime() : null);
                t.setPriorite(rs.getInt("priorite"));
                
                return t;
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return null;
    }
}