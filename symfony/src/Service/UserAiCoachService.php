<?php

namespace App\Service;

class UserAiCoachService
{
    public function __construct(
        private GroqClientService $groqClientService
    ) {
    }

    public function ask(string $category, string $userMessage): string
    {
        $systemPrompt = $this->buildSystemPrompt($category);

        $messages = [
            ['role' => 'system', 'content' => $systemPrompt],
            ['role' => 'user', 'content' => $userMessage],
        ];

        return $this->groqClientService->chat($messages, 0.6);
    }

    private function buildSystemPrompt(string $category): string
    {
        $base = <<<TXT
Tu es MindBoost AI, un coach bienveillant en santé mentale.
Règles:
- Réponds en français.
- Réponse courte, claire, actionnable.
- Ne pose pas de diagnostic médical.
- Donne conseils pratiques (respiration, routine, sommeil, activité douce, journaling).
- Si risque (suicide/auto-mutilation/danger), orienter immédiatement vers urgences et professionnel.
TXT;

        $hints = match (mb_strtolower($category)) {
            'anxiety', 'anxiete' => "Contexte: anxiété. Conseils: respiration 4-6, grounding 5-4-3-2-1, réduire caféine, routine du soir.",
            'stress' => "Contexte: stress. Conseils: prioriser 3 tâches, pauses régulières, respiration carrée, marche 10 min.",
            'depression' => "Contexte: dépression. Conseils: micro-objectifs, lumière naturelle, activation comportementale, soutien social.",
            'sleep', 'trouble du sommeil' => "Contexte: sommeil. Conseils: horaires fixes, écran off avant coucher, hygiène du sommeil.",
            default => "Contexte: bien-être général. Conseils: habitudes stables, auto-compassion, progression pas à pas.",
        };

        return $base . "\n" . $hints;
    }
}