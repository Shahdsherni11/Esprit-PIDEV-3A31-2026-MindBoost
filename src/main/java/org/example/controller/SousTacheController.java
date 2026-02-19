package org.example.controller;

import org.example.util.DBConnection;
import org.example.model.SousTache;

import java.sql.*;
import java.time.LocalTime;
import java.util.ArrayList;
import java.util.List;

public class SousTacheController {

    // =============================
    // CREATE SOUS-TACHE
    // =============================
    public void ajouterSousTache(SousTache sousTache) {

        String sql = """
            INSERT INTO sous_tache (id_tache, description, duree_recommandee, etat, 
                                   heure_debut, heure_fin, priorite) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        """;

        try (Connection conn = DBConnection.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, sousTache.getIdTache());
            stmt.setString(2, sousTache.getDescription());
            stmt.setInt(3, sousTache.getDureeRecommandee());
            stmt.setString(4, sousTache.getEtat());
            stmt.setTime(5, sousTache.getHeureDebut() != null ? Time.valueOf(sousTache.getHeureDebut()) : null);
            stmt.setTime(6, sousTache.getHeureFin() != null ? Time.valueOf(sousTache.getHeureFin()) : null);
            stmt.setInt(7, sousTache.getPriorite());

            stmt.executeUpdate();
            System.out.println("Sous-tâche ajoutée");

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // =============================
    // READ ALL SOUS-TACHES
    // =============================
    public List<SousTache> getAllSousTaches() {

        List<SousTache> list = new ArrayList<>();

        String sql = "SELECT * FROM sous_tache ORDER BY id_tache, priorite";

        try (Connection conn = DBConnection.getConnection();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {

            while (rs.next()) {
                SousTache st = new SousTache();
                st.setIdSousTache(rs.getInt("id_sous_tache"));
                st.setIdTache(rs.getInt("id_tache"));
                st.setDescription(rs.getString("description"));
                st.setDureeRecommandee(rs.getInt("duree_recommandee"));
                st.setEtat(rs.getString("etat"));
                
                Time debut = rs.getTime("heure_debut");
                Time fin = rs.getTime("heure_fin");
                st.setHeureDebut(debut != null ? debut.toLocalTime() : null);
                st.setHeureFin(fin != null ? fin.toLocalTime() : null);
                st.setPriorite(rs.getInt("priorite"));
                
                list.add(st);
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return list;
    }

    // =============================
    // READ SOUS-TACHES BY TACHE ID
    // =============================
    public List<SousTache> getSousTachesByTache(int idTache) {

        List<SousTache> list = new ArrayList<>();

        String sql = "SELECT * FROM sous_tache WHERE id_tache = ? ORDER BY priorite";

        try (Connection conn = DBConnection.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, idTache);
            ResultSet rs = stmt.executeQuery();

            while (rs.next()) {
                SousTache st = new SousTache();
                st.setIdSousTache(rs.getInt("id_sous_tache"));
                st.setIdTache(rs.getInt("id_tache"));
                st.setDescription(rs.getString("description"));
                st.setDureeRecommandee(rs.getInt("duree_recommandee"));
                st.setEtat(rs.getString("etat"));
                
                Time debut = rs.getTime("heure_debut");
                Time fin = rs.getTime("heure_fin");
                st.setHeureDebut(debut != null ? debut.toLocalTime() : null);
                st.setHeureFin(fin != null ? fin.toLocalTime() : null);
                st.setPriorite(rs.getInt("priorite"));
                
                list.add(st);
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return list;
    }

    // =============================
    // UPDATE SOUS-TACHE
    // =============================
    public void modifierSousTache(SousTache sousTache) {

        String sql = """
            UPDATE sous_tache 
            SET description = ?, duree_recommandee = ?, etat = ?, 
                heure_debut = ?, heure_fin = ?, priorite = ? 
            WHERE id_sous_tache = ?
        """;

        try (Connection conn = DBConnection.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setString(1, sousTache.getDescription());
            stmt.setInt(2, sousTache.getDureeRecommandee());
            stmt.setString(3, sousTache.getEtat());
            stmt.setTime(4, sousTache.getHeureDebut() != null ? Time.valueOf(sousTache.getHeureDebut()) : null);
            stmt.setTime(5, sousTache.getHeureFin() != null ? Time.valueOf(sousTache.getHeureFin()) : null);
            stmt.setInt(6, sousTache.getPriorite());
            stmt.setInt(7, sousTache.getIdSousTache());

            stmt.executeUpdate();
            System.out.println("Sous-tâche modifiée");

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // =============================
    // DELETE SOUS-TACHE
    // =============================
    public void supprimerSousTache(int idSousTache) {

        String sql = "DELETE FROM sous_tache WHERE id_sous_tache = ?";

        try (Connection conn = DBConnection.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, idSousTache);
            stmt.executeUpdate();
            System.out.println("Sous-tâche supprimée");

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // =============================
    // GET BY ID
    // =============================
    public SousTache getSousTacheById(int idSousTache) {

        String sql = "SELECT * FROM sous_tache WHERE id_sous_tache = ?";

        try (Connection conn = DBConnection.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, idSousTache);
            ResultSet rs = stmt.executeQuery();

            if (rs.next()) {
                SousTache st = new SousTache();
                st.setIdSousTache(rs.getInt("id_sous_tache"));
                st.setIdTache(rs.getInt("id_tache"));
                st.setDescription(rs.getString("description"));
                st.setDureeRecommandee(rs.getInt("duree_recommandee"));
                st.setEtat(rs.getString("etat"));
                
                Time debut = rs.getTime("heure_debut");
                Time fin = rs.getTime("heure_fin");
                st.setHeureDebut(debut != null ? debut.toLocalTime() : null);
                st.setHeureFin(fin != null ? fin.toLocalTime() : null);
                st.setPriorite(rs.getInt("priorite"));
                
                return st;
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return null;
    }
}