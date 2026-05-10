<?php

namespace App\Tests\Service;

use App\Entity\Post;
use App\Service\PostManager;
use PHPUnit\Framework\TestCase;

class PostManagerTest extends TestCase
{
    public function testValidPost(): void
    {
        $post = (new Post())
            ->setTitle('Mindfulness Tip')
            ->setContent('Take a deep breath and reset.')
            ->setLikes(0)
            ->setDislikes(0)
            ->setHelpMeter(0);

        $manager = new PostManager();

        $this->assertTrue($manager->validate($post));
    }

    public function testPostWithoutTitle(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $post = (new Post())
            ->setContent('Missing title should fail.');

        $manager = new PostManager();
        $manager->validate($post);
    }
}
