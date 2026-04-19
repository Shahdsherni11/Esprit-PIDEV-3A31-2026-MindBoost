<?php

namespace App\Service;

class MotivationalService
{
    private array $preferredTags = [
        'inspirational',
        'happiness',
        'success',
        'courage',
        'learning',
        'life',
    ];

    private array $blockedWords = [
        'marriage',
        'bills',
        'kids',
        'in-laws',
        'divorce',
        'war',
        'violence',
        'kill',
        'death',
        'politics',
        'gambling',
    ];

    private array $fallbackQuotes = [
        [
            'content' => 'Tu as le droit d’avancer à ton rythme.',
            'author' => 'MindBoost',
            'category' => 'support',
        ],
        [
            'content' => 'Un petit pas reste un vrai progrès.',
            'author' => 'MindBoost',
            'category' => 'support',
        ],
        [
            'content' => 'Respire. Reviens au présent. Continue doucement.',
            'author' => 'MindBoost',
            'category' => 'calm',
        ],
        [
            'content' => 'Tu n’as pas besoin d’être parfait aujourd’hui.',
            'author' => 'MindBoost',
            'category' => 'support',
        ],
    ];

    public function __construct(
        private ExternalApiService $externalApiService
    ) {
    }

    public function getMotivationalContent(): ?array
    {
        foreach ($this->preferredTags as $tag) {
            $quote = $this->externalApiService->getRandomQuote($tag);

            if ($this->isAcceptableQuote($quote)) {
                return $quote;
            }
        }

        return $this->fallbackQuotes[array_rand($this->fallbackQuotes)];
    }

    private function isAcceptableQuote(?array $quote): bool
    {
        if (!$quote || empty($quote['content'])) {
            return false;
        }

        $text = mb_strtolower((string) $quote['content']);

        foreach ($this->blockedWords as $word) {
            if (str_contains($text, $word)) {
                return false;
            }
        }

        if (mb_strlen($text) > 220) {
            return false;
        }

        return true;
    }
}