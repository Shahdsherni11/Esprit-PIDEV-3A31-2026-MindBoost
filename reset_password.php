<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

$kernel = require __DIR__ . '/vendor/autoload_runtime.php';
$app = $kernel();

$hasher = $app->get(UserPasswordHasherInterface::class);
$em = $app->get(EntityManagerInterface::class);

$user = $em->getRepository(User::class)->findOneBy(['email' => 'test@gmail.com']);

if (!$user) {
    echo "User not found\n";
    exit(1);
}

$user->setPassword($hasher->hashPassword($user, 'password123'));
$em->flush();

echo "Password reset to: password123\n";