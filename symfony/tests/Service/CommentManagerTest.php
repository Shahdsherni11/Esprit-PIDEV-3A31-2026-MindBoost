<?php

namespace App\Tests\Service;

use App\Entity\Comment;
use App\Service\CommentManager;
use PHPUnit\Framework\TestCase;

class CommentManagerTest extends TestCase
{
    public function testValidComment(): void
    {
        $comment = (new Comment())
            ->setComment('Great post!')
            ->setUserId(1)
            ->setPostId(10)
            ->setLikes(0)
            ->setDislikes(0);

        $manager = new CommentManager();

        $this->assertTrue($manager->validate($comment));
    }

    public function testCommentWithoutContent(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $comment = (new Comment())
            ->setComment('')
            ->setUserId(1)
            ->setPostId(10);

        $manager = new CommentManager();
        $manager->validate($comment);
    }
}
