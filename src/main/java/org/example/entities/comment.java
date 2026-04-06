package org.example.entities;

public class comment {
    private int comment_id;
    private String comment;
    private int likes;
    private int dislikes;
    private int user_id;
    private int post_id;


    //conctructeurs

    public comment() {
    }

    public comment(String comment, int likes, int dislikes, int user_id, int post_id) {

        this.comment = comment;
        this.likes = likes;
        this.dislikes = dislikes;
        this.user_id = user_id;
        this.post_id = post_id;

    }


    public int getComment_id() {
        return comment_id;
    }

    public void setComment_id(int comment_id) {
        this.comment_id = comment_id;
    }

    public String getComment() {
        return comment;
    }

    public void setComment(String comment) {
        this.comment = comment;
    }

    public int getLikes() {
        return likes;
    }

    public void setLikes(int likes) {
        this.likes = likes;
    }

    public int getDislikes() {
        return dislikes;
    }

    public void setDislikes(int dislikes) {
        this.dislikes = dislikes;
    }

    public int getUser_id() {
        return user_id;
    }

    public void setUser_id(int user_id) {
        this.user_id = user_id;
    }

    public int getPost_id() {
        return post_id;
    }

    public void setPost_id(int post_id) {
        this.post_id = post_id;
    }

    @Override
    public String toString() {
        return "comment{" +
                "comment_id=" + comment_id +
                ", comment='" + comment + '\'' +
                ", likes=" + likes +
                ", dislikes=" + dislikes +
                ", user_id=" + user_id +
                ", post_id=" + post_id +
                '}';
    }
}