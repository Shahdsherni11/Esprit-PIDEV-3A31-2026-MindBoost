package org.example.services;

import org.example.entities.post;
import org.example.utils.MyDataBase;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;
public class postServices implements CRUDpost<post> {

    Connection con;
    public postServices(){
        con =  MyDataBase.getInstance().getConnection();

    }
    @Override
    public void ajouter_post(post post) throws SQLException {
        String sql="INSERT INTO `post`( `content`, `title`, `tag`, `image_url`, `likes`, `dislikes`, `help_meter`, `user_id`,`acheivement_id`) VALUES ('"+post.getContent()+"','"+post.getTitle()+"','"+post.getTag()+"','"+post.getImage_url()+"','"+post.getPost_likes()+"','"+post.getPost_dislikes()+"','"+post.getHelp_meter()+"','"+post.getUser_id()+"','"+post.getAcheivement_id()+"')";
        Statement statement = con.createStatement();
        statement.executeUpdate(sql);
        System.out.println("post ajoutée avec succes!");
    }


    @Override
    public void supprimer_post(int post_id) throws SQLException {
        String sql = "DELETE FROM post WHERE user_id=?";
        PreparedStatement preparedStatement = con.prepareStatement(sql);
        //1 est l'indice de parametre 1 donc id 2 est nom...
        preparedStatement.setInt(1,post_id);
        preparedStatement.executeUpdate();
        System.out.println("suppresion post avec succes!");
    }

    @Override
    public void modifier_post(post post) throws SQLException {
        String sql =  "UPDATE post SET content=?, title=?, tag=?, image_url=?, likes=?, dislikes=?, help_meter=?, user_id=?, acheivement_id=? WHERE post_id=?";
        PreparedStatement preparedStatement = con.prepareStatement(sql);
        preparedStatement.setString(1, post.getContent());
        preparedStatement.setString(2, post.getTitle());
        preparedStatement.setString(3, post.getTag());
        preparedStatement.setString(4, post.getImage_url());
        preparedStatement.setInt(5, post.getPost_likes());
        preparedStatement.setInt(6, post.getPost_dislikes());
        preparedStatement.setInt(7, post.getHelp_meter());
        preparedStatement.setInt(8, post.getUser_id());
        preparedStatement.setInt(9, post.getAcheivement_id());
        preparedStatement.setInt(10, post.getPost_id());
        preparedStatement.executeUpdate();
        System.out.println("modification avec succes!");
    }




    @Override
    public List<post> afficher_post() throws SQLException {
        List<post> posts = new ArrayList<>();
        String sql = "SELECT * FROM post";
        Statement statement = con.createStatement();
        ResultSet rs = statement.executeQuery(sql);
        while (rs.next()) {
            post post= new post();
            post.setPost_id(rs.getInt("post_id"));
            post.setContent(rs.getString("content"));
            post.setTitle(rs.getString("title"));
            post.setTag(rs.getString("tag"));
            post.setImage_url(rs.getString("image_url"));
            post.setPost_likes(rs.getInt("likes"));
            post.setPost_dislikes(rs.getInt("dislikes"));
            post.setHelp_meter(rs.getInt("help_meter"));
            post.setUser_id(rs.getInt("user_id"));
            post.setAcheivement_id(rs.getInt("acheivement_id"));


            posts.add(post);
        }
        return posts;


    }

}
