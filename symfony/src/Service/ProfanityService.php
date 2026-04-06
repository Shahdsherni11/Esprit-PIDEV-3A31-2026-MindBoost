<?php

namespace App\Service;

class ProfanityService
{
    private array $badWords = [
        'fuck', 'shit', 'ass', 'bitch', 'damn', 'crap',
        'merde', 'putain', 'connard', 'salope', 'con', 'idiot',
        'bastard', 'whore', 'piss', 'cock', 'dick', 'pussy',
    ];

    public function isProfane(string $text): bool
    {
        $lower = strtolower($text);
        foreach ($this->badWords as $word) {
            if (str_contains($lower, $word)) {
                return true;
            }
        }
        return false;
    }

    public function censor(string $text): string
    {
        foreach ($this->badWords as $word) {
            $censored = str_repeat('*', strlen($word));
            $text = str_ireplace($word, $censored, $text);
        }
        return $text;
    }
}
