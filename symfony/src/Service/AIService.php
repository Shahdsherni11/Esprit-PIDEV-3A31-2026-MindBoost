<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class AIService
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private string $hfToken
    ) {}

    public function summarize(string $text): string
    {
        try {
            $response = $this->httpClient->request('POST', 'https://router.huggingface.co/hf-inference/models/facebook/bart-large-cnn', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->hfToken,
                    'Content-Type' => 'application/json',
                ],
                'json' => ['inputs' => $text],
                'timeout' => 30,
            ]);

            $data = $response->toArray();

            if (isset($data[0]['summary_text'])) {
                return $data[0]['summary_text'];
            }

            return 'Summary not available.';
        } catch (\Throwable $e) {
            return 'Summarization failed: ' . $e->getMessage();
        }
    }

    public function translate(string $text, string $targetLang = 'fr'): string
    {
        try {
            $response = $this->httpClient->request('GET', 'https://api.mymemory.translated.net/get', [
                'query' => [
                    'q' => $text,
                    'langpair' => 'en|' . $targetLang,
                ],
                'timeout' => 15,
            ]);

            $data = $response->toArray();

            if (isset($data['responseData']['translatedText'])) {
                return $data['responseData']['translatedText'];
            }

            return 'Translation not available.';
        } catch (\Throwable $e) {
            return 'Translation failed: ' . $e->getMessage();
        }
    }
}
