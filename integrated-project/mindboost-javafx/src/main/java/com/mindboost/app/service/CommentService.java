package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.Comment;

public class CommentService extends BaseService<Comment> {
    private final ProfanityService profanityService;

    public CommentService(DatabaseManager databaseManager, ProfanityService profanityService) {
        super(databaseManager, Comment.class);
        this.profanityService = profanityService;
    }

    @Override
    public Comment save(Comment entity) {
        if (entity.getComment() != null) {
            entity.setComment(profanityService.censor(entity.getComment()));
        }
        return super.save(entity);
    }
}
