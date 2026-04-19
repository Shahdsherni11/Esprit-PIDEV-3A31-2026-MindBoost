<?php

namespace App\Controller;

use App\Entity\GeneralAnswer;
use App\Entity\Score;
use App\Entity\SpecificAnswer;
use App\Entity\SpecificScore;
use App\Entity\StudentAnswer;
use App\Repository\GeneralAnswerRepository;
use App\Repository\GeneralTestRepository;
use App\Repository\SpecificAnswerRepository;
use App\Repository\SpecificTestRepository;
use App\Service\FrontTestService;
use App\Service\GeneralTestService;
use App\Service\MotivationalService;
use App\Service\SentimentApiService;
use App\Service\SpecificTestService;
use App\Service\UserSessionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/user', name: 'front_')]
class FrontTestController extends AbstractController
{
    public function __construct(
        private GeneralTestRepository $generalTestRepository,
        private SpecificTestRepository $specificTestRepository,
        private GeneralAnswerRepository $generalAnswerRepository,
        private SpecificAnswerRepository $specificAnswerRepository,
        private GeneralTestService $generalTestService,
        private SpecificTestService $specificTestService,
        private FrontTestService $frontTestService,
        private MotivationalService $motivationalService,
        private SentimentApiService $sentimentApiService,
        private EntityManagerInterface $entityManager
    ) {
    }

    #[Route('', name: 'user_home', methods: ['GET'])]
    public function userHome(Request $request): Response
    {
        $generalTest = $this->generalTestRepository->findOneBy(['status' => 'ACTIVE']);
        $motivationalQuote = $this->motivationalService->getMotivationalContent();

        $emotionText = trim((string) $request->query->get('emotionText', ''));
        $sentimentUiLevel = (string) $request->query->get('sentimentUiLevel', 'unknown');
        $sentimentFeedback = $request->query->get('sentimentFeedback');
        $sentimentLabel = $request->query->get('sentimentLabel');
        $sentimentScore = $request->query->get('sentimentScore');

        $sentimentAnalysis = null;
        if ($sentimentLabel !== null || $sentimentScore !== null) {
            $sentimentAnalysis = [
                'sentiment' => $sentimentLabel,
                'score' => $sentimentScore,
                'text' => $emotionText,
            ];
        }

        return $this->render('front_test/user_home.html.twig', [
            'generalTest' => $generalTest,
            'motivationalQuote' => $motivationalQuote,
            'emotionText' => $emotionText,
            'sentimentAnalysis' => $sentimentAnalysis,
            'sentimentUiLevel' => $sentimentUiLevel,
            'sentimentFeedback' => $sentimentFeedback,
        ]);
    }

    #[Route('/emotion-journal/analyze', name: 'emotion_journal_analyze', methods: ['POST'])]
    public function analyzeEmotionJournal(Request $request): Response
    {
        $emotionText = trim((string) $request->request->get('emotion_text', ''));

        if ($emotionText === '') {
            $this->addFlash('error', 'Veuillez décrire votre ressenti en une phrase.');
            return $this->redirectToRoute('front_user_home');
        }

        $analysis = $this->sentimentApiService->analyze($emotionText);

        $uiLevel = 'unknown';
        $feedback = 'Merci pour votre retour. L’analyse détaillée est indisponible pour le moment.';
        $sentimentLabel = null;
        $sentimentScore = null;

        if ($analysis !== null) {
            $uiLevel = $this->sentimentApiService->toUiLevel($analysis);
            $feedback = $this->sentimentApiService->getFeedbackMessage($analysis);
            $sentimentLabel = (string) ($analysis['sentiment'] ?? 'NEUTRAL');
            $sentimentScore = (string) ($analysis['score'] ?? '0');
        }

        return $this->redirectToRoute('front_user_home', [
            'emotionText' => $emotionText,
            'sentimentUiLevel' => $uiLevel,
            'sentimentFeedback' => $feedback,
            'sentimentLabel' => $sentimentLabel,
            'sentimentScore' => $sentimentScore,
        ]);
    }

    #[Route('/general-test', name: 'general_test', methods: ['GET'])]
    public function generalTest(): Response
    {
        $test = $this->generalTestRepository->findOneBy(['status' => 'ACTIVE']);

        if (!$test) {
            $this->addFlash('warning', 'Aucun test général actif n\'est disponible.');
            return $this->redirectToRoute('front_user_home');
        }

        $questionsWithAnswers = $this->generalTestService->getQuestionsWithAnswers($test);

        return $this->render('front_test/general_test.html.twig', [
            'test' => $test,
            'questionsWithAnswers' => $questionsWithAnswers,
        ]);
    }

    #[Route('/general-test/submit', name: 'general_test_submit', methods: ['POST'])]
    public function submitGeneralTest(Request $request, UserSessionService $userSessionService): Response
    {
        $test = $this->generalTestRepository->findOneBy(['status' => 'ACTIVE']);

        if (!$test) {
            $this->addFlash('error', 'Aucun test général actif trouvé.');
            return $this->redirectToRoute('front_user_home');
        }

        $answers = $request->request->all('answers');

        if (empty($answers)) {
            $this->addFlash('error', 'Veuillez répondre aux questions du test général.');
            return $this->redirectToRoute('front_general_test');
        }

        $questionsWithAnswers = $this->generalTestService->getQuestionsWithAnswers($test);

        foreach ($questionsWithAnswers as $item) {
            $questionId = $item['question']->getId();
            if (!isset($answers[$questionId])) {
                $this->addFlash('error', 'Veuillez répondre à toutes les questions.');
                return $this->redirectToRoute('front_general_test');
            }
        }

        $totalScore = 0;
        $maxScore = 0;

        foreach ($questionsWithAnswers as $item) {
            $questionAnswers = $item['answers'];
            if (!empty($questionAnswers)) {
                $scores = array_map(fn ($a) => $a->getScore(), $questionAnswers);
                $maxScore += max($scores);
            }
        }

        foreach ($answers as $answerId) {
            $answer = $this->generalAnswerRepository->find($answerId);

            if ($answer instanceof GeneralAnswer) {
                $totalScore += (int) $answer->getScore();
            }
        }

        $percentage = $this->frontTestService->calculatePercentage($totalScore, $maxScore);
        $currentUserId = $userSessionService->getCurrentUserId($request);

        $score = new Score();
        $score->setUserId($currentUserId);
        $score->setGeneralTestId($test->getId());
        $score->setTotalScore($totalScore);
        $score->setPercentage($percentage);

        $this->entityManager->persist($score);
        $this->entityManager->flush();

        return $this->redirectToRoute('front_general_result', [
            'scoreId' => $score->getId(),
        ]);
    }

    #[Route('/general-test/result/{scoreId}', name: 'general_result', methods: ['GET'])]
    public function generalResult(int $scoreId): Response
    {
        $score = $this->entityManager->getRepository(Score::class)->find($scoreId);

        if (!$score) {
            $this->addFlash('error', 'Résultat introuvable.');
            return $this->redirectToRoute('front_user_home');
        }

        $test = $this->generalTestRepository->find($score->getGeneralTestId());

        if (!$test) {
            $this->addFlash('error', 'Test général introuvable.');
            return $this->redirectToRoute('front_user_home');
        }

        return $this->render('front_test/general_result.html.twig', [
            'test' => $test,
            'totalScore' => $score->getTotalScore(),
            'percentage' => $score->getPercentage(),
            'category' => $this->frontTestService->determineCategory($score->getTotalScore()),
        ]);
    }

    #[Route('/specific-test/{category}', name: 'specific_test', methods: ['GET'])]
    public function specificTest(string $category): Response
    {
        $test = $this->specificTestRepository->findOneBy([
            'category' => $category,
            'status' => 'ACTIVE',
        ]);

        if (!$test) {
            $this->addFlash('warning', 'Aucun test spécifique actif disponible pour la catégorie : ' . $category);
            return $this->redirectToRoute('front_user_home');
        }

        $questionsWithAnswers = $this->specificTestService->getQuestionsWithAnswers($test);

        return $this->render('front_test/specific_test.html.twig', [
            'test' => $test,
            'questionsWithAnswers' => $questionsWithAnswers,
        ]);
    }

    #[Route('/specific-test/{id}/submit', name: 'specific_test_submit', methods: ['POST'])]
    public function submitSpecificTest(int $id, Request $request, UserSessionService $userSessionService): Response
    {
        $test = $this->specificTestRepository->find($id);

        if (!$test) {
            $this->addFlash('error', 'Test spécifique introuvable.');
            return $this->redirectToRoute('front_user_home');
        }

        $answers = $request->request->all('answers');

        if (empty($answers)) {
            $this->addFlash('error', 'Veuillez répondre aux questions du test spécifique.');
            return $this->redirectToRoute('front_specific_test', ['category' => $test->getCategory()]);
        }

        $questionsWithAnswers = $this->specificTestService->getQuestionsWithAnswers($test);

        foreach ($questionsWithAnswers as $item) {
            $questionId = $item['question']->getId();
            if (!isset($answers[$questionId])) {
                $this->addFlash('error', 'Veuillez répondre à toutes les questions.');
                return $this->redirectToRoute('front_specific_test', ['category' => $test->getCategory()]);
            }
        }

        $totalScore = 0;
        $maxScore = 0;

        foreach ($questionsWithAnswers as $item) {
            $questionAnswers = $item['answers'];
            if (!empty($questionAnswers)) {
                $scores = array_map(fn ($a) => $a->getScore(), $questionAnswers);
                $maxScore += max($scores);
            }
        }

        foreach ($answers as $answerId) {
            $answer = $this->specificAnswerRepository->find($answerId);

            if ($answer instanceof SpecificAnswer) {
                $totalScore += (int) $answer->getScore();
            }
        }

        $percentage = $this->frontTestService->calculatePercentage($totalScore, $maxScore);
        $level = $this->frontTestService->determineLevel($percentage);
        $currentUserId = $userSessionService->getCurrentUserId($request);

        $specificScore = new SpecificScore();
        $specificScore->setUserId($currentUserId);
        $specificScore->setSpecificTestId($test->getId());
        $specificScore->setTotalScore($totalScore);
        $specificScore->setMaxScore($maxScore);
        $specificScore->setPercentage($percentage);
        $specificScore->setCategory($test->getCategory());
        $specificScore->setLevel($level);
        $specificScore->setWeekNumber((int) date('W'));
        $specificScore->setPassedAt(new \DateTime());

        $this->entityManager->persist($specificScore);
        $this->entityManager->flush();

        foreach ($questionsWithAnswers as $item) {
            $question = $item['question'];
            $selectedAnswerId = $answers[$question->getId()] ?? null;

            if ($selectedAnswerId) {
                $selectedAnswer = $this->specificAnswerRepository->find($selectedAnswerId);

                if ($selectedAnswer instanceof SpecificAnswer) {
                    $studentAnswer = new StudentAnswer();
                    $studentAnswer->setSpecificScoreId($specificScore->getId());
                    $studentAnswer->setUserId($currentUserId);
                    $studentAnswer->setSpecificTestId($test->getId());
                    $studentAnswer->setQuestionId($question->getId());
                    $studentAnswer->setQuestionText($question->getQuestionText());
                    $studentAnswer->setSelectedAnswerText($selectedAnswer->getAnswerText());
                    $studentAnswer->setAnswerScore((int) $selectedAnswer->getScore());
                    $studentAnswer->setPassedAt(new \DateTime());

                    $this->entityManager->persist($studentAnswer);
                }
            }
        }

        $this->entityManager->flush();

        if ($level === 'Élevé') {
            $this->addFlash('warning', '⚠️ Votre niveau ÉLEVÉ a été détecté. Pensez à consulter vos statistiques et à utiliser le coach IA.');
        }

        return $this->render('front_test/specific_result.html.twig', [
            'test' => $test,
            'totalScore' => $totalScore,
            'maxScore' => $maxScore,
            'percentage' => $percentage,
            'level' => $level,
        ]);
    }
}