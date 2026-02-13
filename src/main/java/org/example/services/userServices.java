package org.example.services;

import org.example.entities.user;
import org.example.utils.MyDataBase;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class userServices implements CRUDusr<user>
{  Connection con;
    public userServices(){
        con =  MyDataBase.getInstance().getConnection();

    }
    @Override
    public void ajouter_user(user user) throws SQLException {
        String sql="INSERT INTO `user`( `email`, `password`, `role`, `firstName`, `lastName`, `avatar_url`, `bio`, `phone`) VALUES ('"+user.getEmail()+"','"+user.getPassword()+"','"+user.getRole()+"','"+user.getFirstName()+"','"+user.getLastName()+"','"+user.getAvatar_url()+"','"+user.getBio()+"','"+user.getPhone()+"')";
        Statement statement = con.createStatement();
        statement.executeUpdate(sql);
        System.out.println("user ajoutée avec succes!");
    }


    @Override
    public void supprimer_user(int id) throws SQLException {
        String sql = "DELETE FROM user WHERE id=?";
        PreparedStatement preparedStatement = con.prepareStatement(sql);
        //1 est l'indice de parametre 1 donc id 2 est nom...
        preparedStatement.setInt(1,id);
        preparedStatement.executeUpdate();
        System.out.println("suppresion avec succes!");
    }

    @Override
    public void modifier_user(user user) throws SQLException {
        String sql =  "UPDATE user SET email=?, password=?, role=?, firstName=?, lastName=?, avatar_url=?, bio=?, phone=? WHERE id=?";
        PreparedStatement preparedStatement = con.prepareStatement(sql);
        preparedStatement.setString(1, user.getEmail());
        preparedStatement.setString(2, user.getPassword());
        preparedStatement.setString(3, user.getRole());
        preparedStatement.setString(4, user.getFirstName());
        preparedStatement.setString(5, user.getLastName());
        preparedStatement.setString(6, user.getAvatar_url());
        preparedStatement.setString(7, user.getBio());
        preparedStatement.setString(8, user.getPhone());
        preparedStatement.setInt(9, user.getId());
        preparedStatement.executeUpdate();
        System.out.println("modification avec succes!");
    }




    @Override
    public List<user> afficher_user() throws SQLException {
        List<user> users = new ArrayList<>();
        String sql = "SELECT * FROM user";
        Statement statement = con.createStatement();
        ResultSet rs = statement.executeQuery(sql);
        while (rs.next()) {
            user user= new user();
            user.setId(rs.getInt("id"));
            user.setEmail(rs.getString("email"));
            user.setPassword(rs.getString("password"));
            user.setRole(rs.getString("role"));
            user.setFirstName(rs.getString("firstName"));
            user.setLastName(rs.getString("lastName"));
            user.setAvatar_url(rs.getString("avatar_url"));
            user.setBio(rs.getString("bio"));
            user.setPhone(rs.getString("phone"));
            users.add(user);
        }
        return users;


    }
}
