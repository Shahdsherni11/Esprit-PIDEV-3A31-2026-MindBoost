package controllers;

public class PostContext {
    private static int postId;

    public static int getPostId() {
        return postId;
    }

    public static void setPostId(int postId) {
        PostContext.postId = postId;
    }
}