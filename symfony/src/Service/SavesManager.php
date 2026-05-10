<?php

namespace App\Service;

use App\Entity\Saves;

class SavesManager
{
    public function validate(Saves $saves): bool
    {
        if ($saves->getPostId() <= 0) {
            throw new \InvalidArgumentException('Post ID must be a positive integer.');
        }

        if ($saves->getUserId() <= 0) {
            throw new \InvalidArgumentException('User ID must be a positive integer.');
        }

        return true;
    }
}
