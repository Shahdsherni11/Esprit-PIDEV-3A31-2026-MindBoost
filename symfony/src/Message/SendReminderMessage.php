<?php

namespace App\Message;

class SendReminderMessage
{
    public function __construct(
        public string $email,
        public string $name
    ) {}
}