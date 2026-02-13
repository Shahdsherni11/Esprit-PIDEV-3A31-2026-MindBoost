package org.example.services;

import org.example.entities.acheivements;
import org.example.utils.MyDataBase;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class acheivementsServices implements CRUDacheivement<acheivements>
{  Connection con;
    public acheivementsServices(){
        con =  MyDataBase.getInstance().getConnection();

    }
    @Override
    public void ajouter_acheivement(acheivements acheivement) throws SQLException {
        String sql="INSERT INTO `acheivements`( `acheivement_name`, `acheivement_score`) VALUES ('"+acheivement.getAcheivement_name()+"','"+acheivement.getAcheivement_score()+"')";
        Statement statement = con.createStatement();
        statement.executeUpdate(sql);
        System.out.println("acheivement ajoutée avec succes!");
    }


    @Override
    public void supprimer_acheivement(int id) throws SQLException {
        String sql = "DELETE FROM acheivements WHERE acheivement_id=?";
        PreparedStatement preparedStatement = con.prepareStatement(sql);
        //1 est l'indice de parametre 1 donc id 2 est nom...
        preparedStatement.setInt(1,id);
        preparedStatement.executeUpdate();
        System.out.println("suppresion avec succes!");
    }

    @Override
    public void modifier_acheivement(acheivements acheivement) throws SQLException {
        String sql =  "UPDATE acheivements SET acheivement_name=?, acheivement_score=? WHERE acheivement_id=?";
        PreparedStatement preparedStatement = con.prepareStatement(sql);
        preparedStatement.setString(1, acheivement.getAcheivement_name());
        preparedStatement.setInt(2, acheivement.getAcheivement_score());
        preparedStatement.setInt(3, acheivement.getAcheivement_id());
        preparedStatement.executeUpdate();
        System.out.println("modification avec succes!");
    }





    @Override
    public List<acheivements> afficher_acheivement() throws SQLException {
        List<acheivements> acheivementsList = new ArrayList<>();
        String sql = "SELECT * FROM acheivements";
        Statement statement = con.createStatement();
        ResultSet rs = statement.executeQuery(sql);
        while (rs.next()) {
            acheivements acheivement= new acheivements();
            acheivement.setAcheivement_id(rs.getInt("acheivement_id"));
            acheivement.setAcheivement_name(rs.getString("acheivement_name"));
            acheivement.setAcheivement_score(rs.getInt("acheivement_score"));
            acheivementsList.add(acheivement);
        }
        return acheivementsList;


    }
}