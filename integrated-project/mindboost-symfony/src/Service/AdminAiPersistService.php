<?php

namespace App\Service;

use App\Entity\GeneralAnswer;
use App\Entity\GeneralQuestion;
use App\Entity\GeneralTest;
use App\Entity\SpecificAnswer;
use App\Entity\SpecificQuestion;
use App\Entity\SpecificTest;
use Doctrine\ORM\EntityManagerInterface;

class AdminAiPersistService
{
    public function __construct(private EntityManagerInterface $em) {}

    public function saveGeneratedTestJson(string $raw, string $type): string
    {
        $json = $this->extractJson($raw);
        $data = json_decode($json, true);

        if (!is_array($data)) {
            throw new \RuntimeException('JSON invalide après nettoyage.');
        }

        if (empty($data['title'])) {
            throw new \RuntimeException('Champ "title" manquant.');
        }

        if (empty($data['questions']) || !is_array($data['questions'])) {
            throw new \RuntimeException('Le JSON ne contient pas de questions.');
        }

        return $type === 'general'
            ? $this->saveGeneralTest($data)
            : $this->saveSpecificTest($data);
    }

    private function saveGeneralTest(array $data): string
    {
        $now = new \DateTime();

        $test = new GeneralTest();
        $test->setTitle((string) $data['title']);
        $test->setDescription((string) ($data['description'] ?? ''));
        $test->setStatus('DRAFT');
        $test->setCreatedBy(1);
        $test->setCreatedAt($now);
        $test->setUpdatedAt($now);

        foreach ($data['questions'] as $questionIndex => $questionData) {
            if (!is_array($questionData)) {
                continue;
            }

            $questionText = trim((string) ($questionData['questionText'] ?? ''));
            if ($questionText === '') {
                $questionText = 'Question ' . ($questionIndex + 1);
            }

            $question = new GeneralQuestion();
            $question->setQuestionText($questionText);
            $question->setQuestionOrder($questionIndex + 1);
            $question->setCreatedAt(new \DateTime());
            $question->setTest($test);

            $answers = $questionData['answers'] ?? [];
            if (!is_array($answers) || count($answers) === 0) {
                throw new \RuntimeException('La question générale #' . ($questionIndex + 1) . ' ne contient aucune réponse.');
            }

            $labels = ['A', 'B', 'C', 'D', 'E', 'F'];

            foreach ($answers as $answerIndex => $answerData) {
                if (!is_array($answerData)) {
                    continue;
                }

                $answerText = trim((string) ($answerData['answerText'] ?? ''));
                if ($answerText === '') {
                    $answerText = 'Réponse ' . ($answerIndex + 1);
                }

                $answer = new GeneralAnswer();
                $answer->setQuestion($question);
                $answer->setAnswerLabel($labels[$answerIndex] ?? ('R' . ($answerIndex + 1)));
                $answer->setAnswerText($answerText);
                $answer->setScore((int) ($answerData['score'] ?? 0));
                $answer->setAnswerOrder($answerIndex + 1);
                $answer->setCreatedAt(new \DateTime());

                $question->addAnswer($answer);
                $this->em->persist($answer);
            }

            $test->addQuestion($question);
            $this->em->persist($question);
        }

        $this->em->persist($test);
        $this->em->flush();

        return 'Test général ID ' . $test->getId();
    }

    private function saveSpecificTest(array $data): string
    {
        $now = new \DateTime();

        $test = new SpecificTest();

        // IMPORTANT :
        // remplace 1 par un vrai general_test_id existant si nécessaire
        $test->setGeneralTestId(1);

        $test->setTitle((string) $data['title']);
        $test->setDescription((string) ($data['description'] ?? ''));
        $test->setCategory((string) ($data['category'] ?? 'Stress'));
        $test->setStatus('DRAFT');
        $test->setCreatedBy(1);
        $test->setCreatedAt($now);
        $test->setUpdatedAt($now);

        foreach ($data['questions'] as $questionIndex => $questionData) {
            if (!is_array($questionData)) {
                continue;
            }

            $questionText = trim((string) ($questionData['questionText'] ?? ''));
            if ($questionText === '') {
                $questionText = 'Question ' . ($questionIndex + 1);
            }

            $question = new SpecificQuestion();
            $question->setQuestionText($questionText);
            $question->setQuestionOrder($questionIndex + 1);
            $question->setCreatedAt(new \DateTime());
            $question->setTest($test);

            $answers = $questionData['answers'] ?? [];
            if (!is_array($answers) || count($answers) === 0) {
                throw new \RuntimeException('La question spécifique #' . ($questionIndex + 1) . ' ne contient aucune réponse.');
            }

            foreach ($answers as $answerIndex => $answerData) {
                if (!is_array($answerData)) {
                    continue;
                }

                $answerText = trim((string) ($answerData['answerText'] ?? ''));
                if ($answerText === '') {
                    $answerText = 'Réponse ' . ($answerIndex + 1);
                }

                $answer = new SpecificAnswer();
                $answer->setQuestion($question);
                $answer->setAnswerText($answerText);
                $answer->setScore((int) ($answerData['score'] ?? 0));
                $answer->setAnswerOrder($answerIndex + 1);
                $answer->setCreatedAt(new \DateTime());

                $question->addAnswer($answer);
                $this->em->persist($answer);
            }

            $test->addQuestion($question);
            $this->em->persist($question);
        }

        $this->em->persist($test);
        $this->em->flush();

        return 'Test spécifique ID ' . $test->getId();
    }

    private function extractJson(string $raw): string
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