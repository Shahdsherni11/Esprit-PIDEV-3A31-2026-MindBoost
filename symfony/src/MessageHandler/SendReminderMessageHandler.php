<?php

namespace App\MessageHandler;

use App\Message\SendReminderMessage;
use App\Service\AdminReminderMailer;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SendReminderMessageHandler
{
    public function __construct(private AdminReminderMailer $mailer) {}

    public function __invoke(SendReminderMessage $message): void
    {
        $this->mailer->sendTestReminder($message->email, $message->name);
    }
}