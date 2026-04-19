<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AiTaskAdvisor
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private ?string $openAiApiKey = null
    ) {
    }

    public function advise(string $titre, string $objectif, ?int $niveauDifficulte): array
    {
        if (!$this->openAiApiKey) {
            return $this->fallbackAdvice($titre, $objectif, $niveauDifficulte);
        }

        try {
            $response = $this->httpClient->request('POST', 'https://api.openai.com/v1/responses', [
                'headers' => [
                    'Authorization' => 'Bearer '.$this->openAiApiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-4.1-mini',
                    'input' => sprintf(
                        "Analyse cette tache et reponds en JSON avec trois cles: priorite (1 a 5), duree_minutes, conseil.\nTitre: %s\nObjectif: %s\nDifficulte: %s",
                        $titre,
                        $objectif,
                        $niveauDifficulte ?? 'non definie'
                    ),
                ],
                'timeout' => 20,
            ]);

            $data = $response->toArray(false);
            $text = $data['output'][0]['content'][0]['text'] ?? '';

            if ($text) {
                $decoded = json_decode($text, true);
                if (is_array($decoded)) {
                    return [
                        'priorite' => max(1, min(5, (int) ($decoded['priorite'] ?? 3))),
                        'duree_minutes' => max(15, (int) ($decoded['duree_minutes'] ?? 60)),
                        'conseil' => (string) ($decoded['conseil'] ?? 'Travaille par petites etapes.'),
                    ];
                }
            }
        } catch (ExceptionInterface|\Throwable $e) {
        }

        return $this->fallbackAdvice($titre, $objectif, $niveauDifficulte);
    }

    private function fallbackAdvice(string $titre, string $objectif, ?int $niveauDifficulte): array
    {
        $difficulty = $niveauDifficulte ?? 3;
        $length = mb_strlen(trim($objectif ?: $titre));

        $priorite = 2;
        if ($difficulty >= 4 || $length > 80) {
            $priorite = 4;
        }
        if ($difficulty >= 5 || str_contains(strtolower($titre.' '.$objectif), 'urgent')) {
            $priorite = 5;
        }

        $duree = 30 + ($difficulty * 20);
        if ($length > 120) {
            $duree += 30;
        }

        return [
            'priorite' => $priorite,
            'duree_minutes' => $duree,
            'conseil' => 'Commence par la partie la plus importante puis avance etape par etape.',
        ];
    }
}
