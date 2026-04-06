package org.example.entities;




public class post {
    private int post_id;
    private String content;
    private String title;
    private String tag;
    private String image_url;
    private int post_likes;
    private int post_dislikes;
    private int help_meter;
    private int user_id;
    private int acheivement_id;

    //constructeurs

    public post() {
    }

    public post(String content, String title, String tag, String image_url, int post_likes, int post_dislikes, int help_meter, int user_id, int acheivement_id) {
        this.content = content;
        this.title = title;
        this.tag = tag;
        this.image_url = image_url;
        this.post_likes = post_likes;
        this.post_dislikes = post_dislikes;
        this.help_meter = help_meter;
        this.user_id = user_id;
        this.acheivement_id = acheivement_id;
    }

    public int getPost_id() {
        return post_id;
    }

    public void setPost_id(int post_id) {
        this.post_id = post_id;
    }

    public String getContent() {
        return content;
    }

    public void setContent(String content) {
        this.content = content;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getTag() {
        return tag;
    }

    public void setTag(String tag) {
        this.tag = tag;
    }

    public String getImage_url() {
        return image_url;
    }

    public void setImage_url(String image_url) {
        this.image_url = image_url;
    }

    public int getPost_likes() {
        return post_likes;
    }

    public void setPost_likes(int post_likes) {
        this.post_likes = post_likes;
    }

    public int getPost_dislikes() {
        return post_dislikes;
    }

    public void setPost_dislikes(int post_dislikes) {
        this.post_dislikes = post_dislikes;
    }

    public int getHelp_meter() {
        return help_meter;
    }

    public void setHelp_meter(int help_meter) {
        this.help_meter = help_meter;
    }

    public int getUser_id() {
        return user_id;
    }

    public void setUser_id(int user_id) {
        this.user_id = user_id;
    }

    public int getAcheivement_id() {
        return acheivement_id;
    }

    public void setAcheivement_id(int acheivement_id) {
        this.acheivement_id = acheivement_id;
    }

    @Override
    public String toString() {
        return "post{" +
                "post_id=" + post_id +
                ", content='" + content + '\'' +
                ", title='" + title + '\'' +
                ", tag='" + tag+ '\'' +
                ", image_url='" + image_url + '\'' +
                ", post_likes='" + post_likes + '\'' +
                ", post_dislikes='" + post_dislikes + '\'' +
                ", help_meter='" + help_meter + '\'' +
                ", acheivements_id='" + acheivement_id + '\'' +
                ", user_id='" + user_id + '\'' +
                '}';
    }

}

