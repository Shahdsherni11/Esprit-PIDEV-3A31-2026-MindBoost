<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class AdminReminderMailer
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function sendTestReminder(string $toEmail, string $userName, string $testUrl): void
    {
        $email = (new TemplatedEmail())
            ->from('no-reply@mindboost.local')
            ->to($toEmail)
            ->subject('MindBoost - Rappel pour passer votre test')
            ->htmlTemplate('emails/reminder_test.html.twig')
            ->context([
                'userName' => $userName,
                'testUrl' => $testUrl,
            ]);

        $this->mailer->send($email);
    }
}