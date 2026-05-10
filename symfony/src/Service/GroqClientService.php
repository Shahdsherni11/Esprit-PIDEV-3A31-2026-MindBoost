<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class GroqClientService
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private string $apiKey,
        private string $model
    ) {
    }

    public function chat(array $messages, float $temperature = 0.6): string
    {
        $response = $this->httpClient->request('POST', 'https://api.groq.com/openai/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => $this->model,
                'messages' => $messages,
                'temperature' => $temperature,
            ],
            'timeout' => 30,
        ]);

        if ($response->getStatusCode() !== 200) {
            return 'Désolé, le service chatbot est temporairement indisponible.';
        }

        $data = $response->toArray(false);

        return $data['choices'][0]['message']['content'] ?? 'Aucune réponse générée.';
    }
}