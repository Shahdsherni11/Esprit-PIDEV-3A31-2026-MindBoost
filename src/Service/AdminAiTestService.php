<?php

namespace App\Service;

class AdminAiTestService
{
    public function __construct(private GeminiClientService $geminiClientService) {}

    public function generateTestDraft(string $type, string $category, int $questionCount = 5): array
    {
        $type = trim($type) !== '' ? trim($type) : 'specific';
        $category = trim($category) !== '' ? trim($category) : 'Stress';
        $questionCount = max(3, min(20, $questionCount));

        $prompt = <<<TXT
Return ONLY valid JSON.
No markdown.
No explanation.
No code fence.

Schema:
{
  "title": "string",
  "description": "string",
  "category": "string",
  "questions": [
    {
      "questionText": "string",
      "answers": [
        {"answerText":"string","score":0},
        {"answerText":"string","score":1},
        {"answerText":"string","score":2},
        {"answerText":"string","score":3}
      ]
    }
  ]
}

Rules:
- language: French
- type: {$type}
- category: {$category}
- generate exactly {$questionCount} questions
- each question must contain exactly 4 answers
- answers must be short and clear
- title must not be empty
- description must not be empty
TXT;

        $raw = $this->geminiClientService->generateText($prompt, 0.4);
        $json = $this->normalizeJson($raw);
        $data = json_decode($json, true);

        if (!is_array($data)) {
            return [
                'ok' => false,
                'raw' => $raw,
                'json' => $json,
                'error' => 'JSON invalide après normalisation',
            ];
        }

        if (empty($data['title']) || empty($data['questions']) || !is_array($data['questions'])) {
            return [
                'ok' => false,
                'raw' => $raw,
                'json' => $json,
                'error' => 'Structure JSON invalide (title/questions manquants)',
            ];
        }

        if (count($data['questions']) !== $questionCount) {
            return [
                'ok' => false,
                'raw' => $raw,
                'json' => $json,
                'error' => 'Le nombre de questions générées ne correspond pas à la demande.',
            ];
        }

        foreach ($data['questions'] as $index => $question) {
            if (
                !is_array($question) ||
                empty($question['questionText']) ||
                empty($question['answers']) ||
                !is_array($question['answers'])
            ) {
                return [
                    'ok' => false,
                    'raw' => $raw,
                    'json' => $json,
                    'error' => 'Structure invalide pour la question ' . ($index + 1),
                ];
            }

            if (count($question['answers']) !== 4) {
                return [
                    'ok' => false,
                    'raw' => $raw,
                    'json' => $json,
                    'error' => 'La question ' . ($index + 1) . ' ne contient pas exactement 4 réponses.',
                ];
            }

            foreach ($question['answers'] as $answerIndex => $answer) {
                if (!is_array($answer) || !array_key_exists('answerText', $answer) || !array_key_exists('score', $answer)) {
                    return [
                        'ok' => false,
                        'raw' => $raw,
                        'json' => $json,
                        'error' => 'Réponse invalide dans la question ' . ($index + 1),
                    ];
                }

                if (!in_array((int) $answer['score'], [0, 1, 2, 3], true)) {
                    return [
                        'ok' => false,
                        'raw' => $raw,
                        'json' => $json,
                        'error' => 'Score invalide dans la question ' . ($index + 1) . ', réponse ' . ($answerIndex + 1),
                    ];
                }
            }
        }

        return [
            'ok' => true,
            'raw' => $raw,
            'json' => $json,
            'data' => $data,
        ];
    }

    private function normalizeJson(string $raw): string
    {
        $txt = trim($raw);
        $txt = preg_replace('/^```json\s*/i', '', $txt);
        $txt = preg_replace('/^```\s*/', '', $txt);
        $txt = preg_replace('/\s*```$/', '', $txt);

        $start = strpos($txt, '{');
        $end = strrpos($txt, '}');

        if ($start !== false && $end !== false && $end > $start) {
            $txt = substr($txt, $start, $end - $start + 1);
        }

        return trim($txt);
    }
}