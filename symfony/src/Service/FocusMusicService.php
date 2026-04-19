<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class FocusMusicService
{
    public function __construct(private HttpClientInterface $httpClient)
    {
    }

    public function recommend(?int $niveauDifficulte): array
    {
        $keyword = $this->getKeyword($niveauDifficulte);

        try {
            $response = $this->httpClient->request('GET', 'https://api.deezer.com/search', [
                'query' => [
                    'q' => $keyword,
                    'limit' => 5,
                ],
                'timeout' => 15,
            ]);

            $data = $response->toArray(false);
            $tracks = $data['data'] ?? [];

            $results = [];
            foreach ($tracks as $track) {
                $results[] = [
                    'title' => $track['title'] ?? 'Titre inconnu',
                    'artist' => $track['artist']['name'] ?? 'Artiste inconnu',
                    'link' => $track['link'] ?? null,
                    'preview' => $track['preview'] ?? null,
                ];
            }

            if ($results) {
                return $results;
            }
        } catch (ExceptionInterface|\Throwable $e) {
        }

        return $this->fallbackResults();
    }

    private function getKeyword(?int $niveauDifficulte): string
    {
        return match (true) {
            $niveauDifficulte >= 4 => 'deep focus instrumental',
            $niveauDifficulte === 3 => 'ambient study',
            default => 'lofi focus',
        };
    }

    private function fallbackResults(): array
    {
        return [
            ['title' => 'Deep Focus Mix', 'artist' => 'MindBoost', 'link' => null, 'preview' => null],
            ['title' => 'Ambient Study Session', 'artist' => 'MindBoost', 'link' => null, 'preview' => null],
            ['title' => 'LoFi Concentration', 'artist' => 'MindBoost', 'link' => null, 'preview' => null],
        ];
    }
}
