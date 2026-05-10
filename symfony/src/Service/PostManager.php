<?php

namespace App\Service;

use App\Entity\Post;

class PostManager
{
    public function validate(Post $post): bool
    {
        if (trim($post->getTitle()) === '') {
            throw new \InvalidArgumentException('Post title is required.');
        }

        if (trim($post->getContent()) === '') {
            throw new \InvalidArgumentException('Post content is required.');
        }

        if ($post->getLikes() < 0 || $post->getDislikes() < 0 || $post->getHelpMeter() < 0) {
            throw new \InvalidArgumentException('Post reactions must be zero or positive.');
        }

        return true;
    }
}
