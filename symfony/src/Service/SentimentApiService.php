<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SentimentApiService
{
    private array $negativeKeywords = [
        'triste',
        'mal',
        'stressé',
        'stresse',
        'stressée',
        'anxieux',
        'anxieuse',
        'angoissé',
        'angoissee',
        'angoissée',
        'déprimé',
        'deprime',
        'déprime',
        'déprimée',
        'fatigué',
        'fatigue',
        'fatiguée',
        'seul',
        'seule',
        'perdu',
        'perdue',
        'vide',
        'peur',
        'épuisé',
        'epuise',
        'épuisée',
        'je vais mal',
        'je me sens mal',
        'je suis triste',
    ];

    private array $positiveKeywords = [
        'heureux',
        'heureuse',
        'bien',
        'motivé',
        'motivée',
        'calme',
        'serein',
        'sereine',
        'content',
        'contente',
        'je vais bien',
        'je me sens bien',
    ];

    public function __construct(
        private HttpClientInterface $httpClient,
        private string $sentimentApiUrl,
        private string $apiKey,
        private ?LoggerInterface $logger = null
    ) {
    }

    public function analyze(string $text): ?array
    {
        $text = trim($text);

        if ($text === '') {
            return null;
        }

        $normalized = mb_strtolower($text);

        try {
            $response = $this->httpClient->request('GET', $this->sentimentApiUrl, [
                'headers' => [
                    'X-Api-Key' => trim($this->apiKey),
                ],
                'query' => [
                    'text' => mb_substr($text, 0, 2000),
                ],
                'timeout' => 10,
            ]);

            $status = $response->getStatusCode();
            $raw = $response->getContent(false);

            if ($status !== 200) {
                $this->logger?->error('Sentiment API non-200', [
                    'status' => $status,
                    'body' => $raw,
                ]);

                return $this->fallbackKeywordAnalysis($text);
            }

            $data = json_decode($raw, true);

            if (!is_array($data)) {
                return $this->fallbackKeywordAnalysis($text);
            }

            $score = (float) ($data['score'] ?? 0);
            $sentiment = (string) ($data['sentiment'] ?? 'NEUTRAL');

            // Surcouche métier : si l’API renvoie neutre mais qu’un mot sensible est présent,
            // on corrige pour l’expérience psychologique.
            if ($this->containsAny($normalized, $this->negativeKeywords) && $score > -0.4) {
                $score = -0.7;
                $sentiment = 'NEGATIVE';
            }

            if ($this->containsAny($normalized, $this->positiveKeywords) && $score < 0.2) {
                $score = 0.6;
                $sentiment = 'POSITIVE';
            }

            return [
                'score' => $score,
                'sentiment' => $sentiment,
                'text' => (string) ($data['text'] ?? $text),
            ];
        } catch (\Throwable $e) {
            $this->logger?->error('Sentiment API exception', [
                'message' => $e->getMessage(),
            ]);

            return $this->fallbackKeywordAnalysis($text);
        }
    }

    public function toUiLevel(?array $analysis): string
    {
        if (!$analysis) {
            return 'unknown';
        }

        $score = (float) ($analysis['score'] ?? 0);
        $sentiment = (string) ($analysis['sentiment'] ?? 'NEUTRAL');

        if ($sentiment === 'NEGATIVE' || $sentiment === 'WEAK_NEGATIVE' || $score <= -0.4) {
            return 'critical';
        }

        if ($sentiment === 'POSITIVE' || $sentiment === 'WEAK_POSITIVE' || $score >= 0.2) {
            return 'positive';
        }

        return 'neutral';
    }

    public function getFeedbackMessage(?array $analysis): string
    {
        if (!$analysis) {
            return 'Merci pour votre retour.';
        }

        $uiLevel = $this->toUiLevel($analysis);

        return match ($uiLevel) {
            'critical' => 'Merci pour votre retour. Votre message montre un ressenti difficile. Prenez un moment pour respirer et n’hésitez pas à utiliser le coach IA.',
            'positive' => 'Merci pour votre retour. Votre ressenti semble plutôt positif aujourd’hui. Continuez à avancer à votre rythme.',
            default => 'Merci pour votre retour. Votre ressenti semble stable pour le moment.',
        };
    }

    private function fallbackKeywordAnalysis(string $text): array
    {
        $normalized = mb_strtolower($text);

        if ($this->containsAny($normalized, $this->negativeKeywords)) {
            return [
                'score' => -0.7,
                'sentiment' => 'NEGATIVE',
                'text' => $text,
            ];
        }

        if ($this->containsAny($normalized, $this->positiveKeywords)) {
            return [
                'score' => 0.6,
                'sentiment' => 'POSITIVE',
                'text' => $text,
            ];
        }

        return [
            'score' => 0.0,
            'sentiment' => 'NEUTRAL',
            'text' => $text,
        ];
    }

    private function containsAny(string $text, array $keywords): bool
    {
        foreach ($keywords as $keyword) {
            if (str_contains($text, mb_strtolower($keyword))) {
                return true;
            }
        }

        return false;
    }
}