<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class GeminiClientService
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private string $apiKey,
        private string $model
    ) {}

    public function generateText(string $prompt, float $temperature = 0.7): string
    {
        $url = sprintf(
            'https://generativelanguage.googleapis.com/v1beta/models/%s:generateContent?key=%s',
            urlencode($this->model),
            urlencode($this->apiKey)
        );

        $response = $this->httpClient->request('POST', $url, [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'generationConfig' => ['temperature' => $temperature],
                'contents' => [[
                    'role' => 'user',
                    'parts' => [['text' => $prompt]],
                ]],
            ],
            'timeout' => 45,
        ]);

        $status = $response->getStatusCode();
        $data = $response->toArray(false);

        if ($status !== 200) {
            return json_encode(['error' => "Gemini HTTP $status", 'payload' => $data], JSON_PRETTY_PRINT);
        }

        // Extraction robuste
        $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
        if (!$text) {
            return json_encode(['error' => 'Gemini empty text', 'payload' => $data], JSON_PRETTY_PRINT);
        }

        return trim($text);
    }
}