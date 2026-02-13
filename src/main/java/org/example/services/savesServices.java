package org.example.services;

import org.example.entities.saves;
import org.example.utils.MyDataBase;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class savesServices implements CRUDsaves<saves>
{  Connection con;
    public savesServices(){
        con =  MyDataBase.getInstance().getConnection();

    }
    @Override
    public void ajouter_saves(saves saves) throws SQLException {
        String sql="INSERT INTO `saves`( `description`, `post_id`, `user_id`) VALUES ('"+saves.getDescription()+"','"+saves.getPost_id()+"','"+saves.getUser_id()+"')";
        Statement statement = con.createStatement();
        statement.executeUpdate(sql);
        System.out.println("saves ajoutée avec succes!");
    }


    @Override
    public void supprimer_saves(int id) throws SQLException {
        String sql = "DELETE FROM saves WHERE post_id=?";
        PreparedStatement preparedStatement = con.prepareStatement(sql);
        //1 est l'indice de parametre 1 donc id 2 est nom...
        preparedStatement.setInt(1,id);
        preparedStatement.executeUpdate();
        System.out.println("suppresion avec succes!");
    }

    @Override
    public void modifier_saves(saves saves) throws SQLException {
        String sql =  "UPDATE saves SET description=?, post_id=?, user_id=? WHERE post_id=? AND user_id=?";
        PreparedStatement preparedStatement = con.prepareStatement(sql);
        preparedStatement.setString(1, saves.getDescription());
        preparedStatement.setInt(2, saves.getPost_id());
        preparedStatement.setInt(3, saves.getUser_id());
        preparedStatement.setInt(4, saves.getPost_id());
        preparedStatement.setInt(5, saves.getUser_id());
        preparedStatement.executeUpdate();
        System.out.println("modification avec succes!");
    }




    @Override
    public List<saves> afficher_saves() throws SQLException {
        List<saves> savesList = new ArrayList<>();
        String sql = "SELECT * FROM saves";
        Statement statement = con.createStatement();
        ResultSet rs = statement.executeQuery(sql);
        while (rs.next()) {
            saves saves= new saves();
            saves.setDescription(rs.getString("description"));
            saves.setPost_id(rs.getInt("post_id"));
            saves.setUser_id(rs.getInt("user_id"));
            savesList.add(saves);
        }
        return savesList;


    }
}