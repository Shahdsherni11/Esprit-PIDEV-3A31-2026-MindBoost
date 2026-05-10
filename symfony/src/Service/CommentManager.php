<?php

namespace App\Service;

use App\Entity\Comment;

class CommentManager
{
    public function validate(Comment $comment): bool
    {
        if (trim($comment->getComment()) === '') {
            throw new \InvalidArgumentException('Comment content is required.');
        }

        if ($comment->getLikes() < 0 || $comment->getDislikes() < 0) {
            throw new \InvalidArgumentException('Comment reactions must be zero or positive.');
        }

        if ($comment->getUserId() <= 0 || $comment->getPostId() <= 0) {
            throw new \InvalidArgumentException('Comment must reference a valid user and post.');
        }

        return true;
    }
}
