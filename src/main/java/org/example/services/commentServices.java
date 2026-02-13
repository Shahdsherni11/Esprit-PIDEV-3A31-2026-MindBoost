package org.example.services;

import org.example.entities.comment;
import org.example.utils.MyDataBase;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class commentServices implements CRUDcomment<comment>
{  Connection con;
    public commentServices(){
        con =  MyDataBase.getInstance().getConnection();

    }
    @Override
    public void ajouter_comment(comment comment) throws SQLException {
        String sql="INSERT INTO `comment`( `comment`, `likes`, `dislikes`, `user_id`, `post_id`) VALUES ('"+comment.getComment()+"','"+comment.getLikes()+"','"+comment.getDislikes()+"','"+comment.getUser_id()+"','"+comment.getPost_id()+"')";
        Statement statement = con.createStatement();
        statement.executeUpdate(sql);
        System.out.println("comment ajoutée avec succes!");
    }


    @Override
    public void supprimer_comment(int id) throws SQLException {
        String sql = "DELETE FROM comment WHERE comment_id=?";
        PreparedStatement preparedStatement = con.prepareStatement(sql);
        //1 est l'indice de parametre 1 donc id 2 est nom...
        preparedStatement.setInt(1,id);
        preparedStatement.executeUpdate();
        System.out.println("suppresion avec succes!");
    }

    @Override
    public void modifier_comment(comment comment) throws SQLException {
        String sql =  "UPDATE comment SET comment=?, likes=?, dislikes=?, user_id=?, post_id=? WHERE comment_id=?";
        PreparedStatement preparedStatement = con.prepareStatement(sql);
        preparedStatement.setString(1, comment.getComment());
        preparedStatement.setInt(2, comment.getLikes());
        preparedStatement.setInt(3, comment.getDislikes());
        preparedStatement.setInt(4, comment.getUser_id());
        preparedStatement.setInt(5, comment.getPost_id());
        preparedStatement.setInt(6, comment.getComment_id());
        preparedStatement.executeUpdate();
        System.out.println("modification avec succes!");
    }





    @Override
    public List<comment> afficher_comment() throws SQLException {
        List<comment> comments = new ArrayList<>();
        String sql = "SELECT * FROM comment";
        Statement statement = con.createStatement();
        ResultSet rs = statement.executeQuery(sql);
        while (rs.next()) {
            comment comment= new comment();
            comment.setComment_id(rs.getInt("comment_id"));
            comment.setComment(rs.getString("comment"));
            comment.setLikes(rs.getInt("likes"));
            comment.setDislikes(rs.getInt("dislikes"));
            comment.setUser_id(rs.getInt("user_id"));
            comment.setPost_id(rs.getInt("post_id"));
            comments.add(comment);
        }
        return comments;


    }
}