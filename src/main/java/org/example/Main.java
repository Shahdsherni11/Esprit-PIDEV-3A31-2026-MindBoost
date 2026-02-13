package org.example;

import org.example.services.postServices;
import org.example.services.userServices;
import org.example.services.commentServices;
import org.example.services.savesServices;
import org.example.services.acheivementsServices;
import org.example.entities.user;
import org.example.entities.post;
import org.example.entities.comment;
import org.example.entities.saves;
import org.example.entities.acheivements;
import java.sql.SQLException;

//TIP To <b>Run</b> code, press <shortcut actionId="Run"/> or
// click the <icon src="AllIcons.Actions.Execute"/> icon in the gutter.
public class Main {
    public static void main(String[] args) {
        //TIP Press <shortcut actionId="ShowIntentionActions"/> with your caret at the highlighted text
        // to see how IntelliJ IDEA suggests fixing it.

        userServices userServices = new userServices();
        postServices postServices = new postServices();
        commentServices commentServices = new commentServices();
        savesServices savesServices = new savesServices();
        acheivementsServices acheivementsServices = new acheivementsServices();
        try {
            /*userServices.ajouter_user(new user(
                    "khedi@gmail.com",
                    "abc",
                    "usr",
                    "hedi",
                    "chaibi",
                    "abc",
                                       "ddtdy",
                    "nourl" ));*/
            //userServices.supprimer_user( 3);
            //postServices.ajouter_post(new post("thisisatest","titre","stress","url",10,2,2,1,1));
           // System.out.println(postServices.afficher_post());

            commentServices.ajouter_comment(new comment("aha",10,2,5,1));
            commentServices.supprimer_comment(1);
            System.out.println(commentServices.afficher_comment());

            //savesServices.ajouter_saves(new saves("test",1,1));
            //savesServices.supprimer_saves(1);
           // System.out.println(savesServices.afficher_saves());

            //acheivementsServices.ajouter_acheivement(new acheivements("first",50));
            //acheivementsServices.supprimer_acheivement(1);
            //System.out.println(acheivementsServices.afficher_acheivement());

        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }

    }
}