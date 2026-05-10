package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.Post;

public class PostService extends BaseService<Post> {
    private final ProfanityService profanityService;

    public PostService(DatabaseManager databaseManager, ProfanityService profanityService) {
        super(databaseManager, Post.class);
        this.profanityService = profanityService;
    }

    @Override
    public Post save(Post entity) {
        if (entity.getContent() != null) {
            entity.setContent(profanityService.censor(entity.getContent()));
        }
        if (entity.getTitle() != null) {
            entity.setTitle(profanityService.censor(entity.getTitle()));
        }
        return super.save(entity);
    }
}
