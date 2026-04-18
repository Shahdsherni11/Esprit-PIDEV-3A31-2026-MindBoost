<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class FocusBookService
{
    public function __construct(private HttpClientInterface $httpClient)
    {
    }

    public function recommend(?int $niveauDifficulte): array
    {
        $query = $this->getQuery($niveauDifficulte);

        try {
            $response = $this->httpClient->request('GET', 'https://openlibrary.org/search.json', [
                'query' => [
                    'q' => $query,
                    'limit' => 5,
                    'fields' => 'title,author_name,first_publish_year',
                    'lang' => 'fr',
                ],
                'headers' => [
                    'User-Agent' => 'MindBoost-Web',
                ],
                'timeout' => 15,
            ]);

            $data = $response->toArray(false);
            $docs = $data['docs'] ?? [];
            $books = [];

            foreach ($docs as $doc) {
                $books[] = [
                    'title' => $doc['title'] ?? 'Livre',
                    'author' => $doc['author_name'][0] ?? 'Auteur inconnu',
                    'year' => $doc['first_publish_year'] ?? null,
                ];
            }

            if ($books) {
                return $books;
            }
        } catch (ExceptionInterface|\Throwable $e) {
        }

        return [
            ['title' => 'Atomic Habits', 'author' => 'James Clear', 'year' => 2018],
            ['title' => 'Deep Work', 'author' => 'Cal Newport', 'year' => 2016],
            ['title' => 'The Power of Habit', 'author' => 'Charles Duhigg', 'year' => 2012],
        ];
    }

    private function getQuery(?int $niveauDifficulte): string
    {
        return match (true) {
            $niveauDifficulte >= 4 => 'deep work productivity',
            $niveauDifficulte === 3 => 'focus study productivity',
            default => 'habits motivation productivity',
        };
    }
}
