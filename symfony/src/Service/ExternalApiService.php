<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ExternalApiService
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private string $quoteApiUrl,
        private string $quoteApiKey,
        private ?LoggerInterface $logger = null
    ) {
    }

    public function getRandomQuote(?string $tag = null): ?array
    {
        try {
            $url = $this->quoteApiUrl;

            if ($tag !== null && trim($tag) !== '') {
                $separator = str_contains($url, '?') ? '&' : '?';
                $url .= $separator . 'tags=' . urlencode(trim($tag));
            }

            $response = $this->httpClient->request('GET', $url, [
                'headers' => [
                    'X-Api-Key' => trim($this->quoteApiKey),
                ],
                'timeout' => 10,
            ]);

            $status = $response->getStatusCode();
            $raw = $response->getContent(false);

            if ($status !== 200) {
                $this->logger?->error('Quote API non-200', [
                    'status' => $status,
                    'body' => $raw,
                    'url' => $url,
                ]);
                return null;
            }

            $data = json_decode($raw, true);

            if (is_array($data) && isset($data[0]) && is_array($data[0]) && isset($data[0]['quote'])) {
                return [
                    'content' => (string) $data[0]['quote'],
                    'author' => (string) ($data[0]['author'] ?? 'Auteur inconnu'),
                    'category' => (string) ($data[0]['category'] ?? $tag ?? 'general'),
                ];
            }

            if (is_array($data) && isset($data['quote'])) {
                return [
                    'content' => (string) $data['quote'],
                    'author' => (string) ($data['author'] ?? 'Auteur inconnu'),
                    'category' => (string) ($data['category'] ?? $tag ?? 'general'),
                ];
            }

            $this->logger?->error('Quote API invalid payload', [
                'payload' => $raw,
                'url' => $url,
            ]);

            return null;
        } catch (\Throwable $e) {
            $this->logger?->error('Quote API exception', [
                'message' => $e->getMessage(),
            ]);
            return null;
        }
    }
}