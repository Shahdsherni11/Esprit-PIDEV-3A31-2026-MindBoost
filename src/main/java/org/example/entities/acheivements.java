package org.example.entities;

public class acheivements {
    private int acheivement_id;
    private String acheivement_name;
    private int acheivement_score;


    //conctructeurs

    public acheivements() {
    }

    public acheivements(String acheivement_name, int acheivement_score) {

        this.acheivement_name = acheivement_name;
        this.acheivement_score = acheivement_score;

    }


    public int getAcheivement_id() {
        return acheivement_id;
    }

    public void setAcheivement_id(int acheivement_id) {
        this.acheivement_id = acheivement_id;
    }

    public String getAcheivement_name() {
        return acheivement_name;
    }

    public void setAcheivement_name(String acheivement_name) {
        this.acheivement_name = acheivement_name;
    }

    public int getAcheivement_score() {
        return acheivement_score;
    }

    public void setAcheivement_score(int acheivement_score) {
        this.acheivement_score = acheivement_score;
    }

    @Override
    public String toString() {
        return "acheivements{" +
                "acheivement_id=" + acheivement_id +
                ", acheivement_name='" + acheivement_name + '\'' +
                ", acheivement_score=" + acheivement_score +
                '}';
    }
}