package org.example.entities;

public class saves {
    private String description;
    private int post_id;
    private int user_id;


    //conctructeurs

    public saves() {
    }

    public saves(String description, int post_id, int user_id) {

        this.description = description;
        this.post_id = post_id;
        this.user_id = user_id;

    }


    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public int getPost_id() {
        return post_id;
    }

    public void setPost_id(int post_id) {
        this.post_id = post_id;
    }

    public int getUser_id() {
        return user_id;
    }

    public void setUser_id(int user_id) {
        this.user_id = user_id;
    }

    @Override
    public String toString() {
        return "saves{" +
                "description='" + description + '\'' +
                ", post_id=" + post_id +
                ", user_id=" + user_id +
                '}';
    }
}