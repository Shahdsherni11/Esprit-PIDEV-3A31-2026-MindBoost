<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AiSousTacheGenerator
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private ?string $openAiApiKey = null
    ) {
    }

    public function generate(string $titre, string $objectif): array
    {
        if (!$this->openAiApiKey) {
            return $this->fallbackSuggestions($titre, $objectif);
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
                        "Tu es un assistant de productivite. Propose 5 sous-taches courtes en francais pour cette tache.\nTitre: %s\nObjectif: %s\nRetourne uniquement une liste simple, une ligne par sous-tache, sans introduction.",
                        $titre,
                        $objectif
                    ),
                ],
                'timeout' => 20,
            ]);

            $data = $response->toArray(false);
            $text = $data['output'][0]['content'][0]['text'] ?? null;

            if (!$text) {
                return $this->fallbackSuggestions($titre, $objectif);
            }

            $lines = preg_split('/\r\n|\r|\n/', $text) ?: [];
            $suggestions = [];

            foreach ($lines as $line) {
                $line = trim($line);
                $line = preg_replace('/^\d+[\).\s-]*/', '', $line ?? '');
                $line = trim((string) $line, "- \t\n\r\0\x0B");

                if ($line !== '') {
                    $suggestions[] = $line;
                }
            }

            $suggestions = array_values(array_unique($suggestions));

            return $suggestions ?: $this->fallbackSuggestions($titre, $objectif);
        } catch (ExceptionInterface|\Throwable $e) {
            return $this->fallbackSuggestions($titre, $objectif);
        }
    }

    private function fallbackSuggestions(string $titre, string $objectif): array
    {
        $base = [
            'Analyser le besoin principal',
            'Decouper le travail en etapes simples',
            'Preparer les ressources necessaires',
            'Realiser la partie principale',
            'Verifier le resultat final',
        ];

        $text = strtolower($titre.' '.$objectif);

        if (str_contains($text, 'exam') || str_contains($text, 'revision') || str_contains($text, 'etud')) {
            return [
                'Lister les chapitres a reviser',
                'Preparer un resume des points importants',
                'Faire une session de revision concentree',
                'Resoudre des exercices d application',
                'Verifier les notions non maitrisees',
            ];
        }

        if (str_contains($text, 'projet') || str_contains($text, 'app') || str_contains($text, 'site')) {
            return [
                'Definir les fonctionnalites principales',
                'Organiser les taches par priorite',
                'Developper la premiere partie importante',
                'Tester les cas principaux',
                'Corriger et finaliser la livraison',
            ];
        }

        return $base;
    }
}
