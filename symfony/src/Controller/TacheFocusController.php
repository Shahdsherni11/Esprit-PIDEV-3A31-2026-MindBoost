<?php

namespace App\Controller;

use App\Entity\TacheFocus;
use App\Form\TacheFocusType;
use App\Repository\TacheFocusRepository;
use App\Service\AiSousTacheGenerator;
use App\Service\AiTaskAdvisor;
use App\Service\FocusBookService;
use App\Service\FocusMusicService;
use App\Service\HolidayService;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tache/focus')]
class TacheFocusController extends AbstractController
{
    #[Route('/', name: 'app_tache_focus_index', methods: ['GET'])]
    public function index(
        Request $request,
        TacheFocusRepository $tacheFocusRepository,
        PaginatorInterface $paginator
    ): Response {
        $search = $request->query->get('search', '');
        $statut = $request->query->get('statut', '');
        $tri = $request->query->get('tri', 'id');
        $ordre = $request->query->get('ordre', 'ASC');

        $query = $tacheFocusRepository->findBySearchAndFilter($search, $statut, $tri, $ordre);

        $taches = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );

        $citation = $this->getCitationMotivante();

        return $this->render('tache_focus/index.html.twig', [
            'tache_foci' => $taches,
            'search' => $search,
            'statut' => $statut,
            'tri' => $tri,
            'ordre' => $ordre,
            'citation' => $citation,
        ]);
    }

    private function getCitationMotivante(): array
    {
        $citationsDefault = [
            ['q' => 'La productivite, c\'est ne jamais rien faire par accident.', 'a' => 'Atkinson'],
            ['q' => 'Le succes, c\'est tomber sept fois et se relever huit.', 'a' => 'Proverbe japonais'],
            ['q' => 'La discipline est le pont entre les objectifs et les accomplissements.', 'a' => 'Jim Rohn'],
            ['q' => 'Chaque jour est une nouvelle opportunite de changer votre vie.', 'a' => 'Anonyme'],
            ['q' => 'Le secret du succes est de commencer.', 'a' => 'Mark Twain'],
        ];

        try {
            $context = stream_context_create([
                'http' => [
                    'timeout' => 3,
                    'user_agent' => 'MindBoost-Web/1.0',
                ],
            ]);

            $response = @file_get_contents('https://zenquotes.io/api/random', false, $context);

            if ($response) {
                $data = json_decode($response, true);

                if (isset($data[0]['q']) && isset($data[0]['a'])) {
                    return [
                        'q' => $data[0]['q'],
                        'a' => $data[0]['a'],
                    ];
                }
            }
        } catch (\Exception $e) {
        }

        return $citationsDefault[array_rand($citationsDefault)];
    }

    #[Route('/new', name: 'app_tache_focus_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tacheFocu = new TacheFocus();
        $form = $this->createForm(TacheFocusType::class, $tacheFocu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tacheFocu);
            $entityManager->flush();

            $this->addFlash('success', 'Tache creee avec succes !');

            return $this->redirectToRoute('app_tache_focus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tache_focus/new.html.twig', [
            'tache_focu' => $tacheFocu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tache_focus_show', methods: ['GET'])]
    public function show(TacheFocus $tacheFocu, Request $request): Response
    {
        return $this->render('tache_focus/nex.html.twig', [
            'tache_focu' => $tacheFocu,
            'ai_suggestions' => $request->getSession()->getFlashBag()->get('ai_suggestions'),
            'ai_advice' => $request->getSession()->getFlashBag()->get('ai_advice')[0] ?? null,
            'focus_music' => $request->getSession()->getFlashBag()->get('focus_music'),
            'holidays' => $request->getSession()->getFlashBag()->get('holidays'),
            'focus_books' => $request->getSession()->getFlashBag()->get('focus_books'),
        ]);
    }

    #[Route('/{id}/ia', name: 'app_tache_focus_ai', methods: ['POST'])]
    public function generateAiSuggestions(
        TacheFocus $tacheFocu,
        Request $request,
        AiSousTacheGenerator $aiSousTacheGenerator
    ): Response {
        if (!$this->isCsrfTokenValid('ai' . $tacheFocu->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Jeton CSRF invalide.');
        }

        $suggestions = $aiSousTacheGenerator->generate(
            (string) $tacheFocu->getTitre(),
            (string) $tacheFocu->getObjectifPrincipal()
        );

        $request->getSession()->getFlashBag()->set('ai_suggestions', $suggestions);
        $this->addFlash('success', 'Suggestions IA generees avec succes.');

        return $this->redirectToRoute('app_tache_focus_show', ['id' => $tacheFocu->getId()]);
    }

    #[Route('/{id}/ia-advice', name: 'app_tache_focus_ai_advice', methods: ['POST'])]
    public function generateAiAdvice(
        TacheFocus $tacheFocu,
        Request $request,
        AiTaskAdvisor $aiTaskAdvisor
    ): Response {
        if (!$this->isCsrfTokenValid('ai_advice' . $tacheFocu->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Jeton CSRF invalide.');
        }

        $advice = $aiTaskAdvisor->advise(
            (string) $tacheFocu->getTitre(),
            (string) $tacheFocu->getObjectifPrincipal(),
            $tacheFocu->getNiveauDifficulte()
        );

        $request->getSession()->getFlashBag()->set('ai_advice', [$advice]);
        $this->addFlash('success', 'Analyse IA terminee.');

        return $this->redirectToRoute('app_tache_focus_show', ['id' => $tacheFocu->getId()]);
    }

    #[Route('/{id}/music', name: 'app_tache_focus_music', methods: ['POST'])]
    public function recommendMusic(
        TacheFocus $tacheFocu,
        Request $request,
        FocusMusicService $focusMusicService
    ): Response {
        if (!$this->isCsrfTokenValid('music' . $tacheFocu->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Jeton CSRF invalide.');
        }

        $music = $focusMusicService->recommend($tacheFocu->getNiveauDifficulte());

        $request->getSession()->getFlashBag()->set('focus_music', $music);
        $this->addFlash('success', 'Suggestions musique focus recuperees.');

        return $this->redirectToRoute('app_tache_focus_show', ['id' => $tacheFocu->getId()]);
    }

    #[Route('/{id}/holidays', name: 'app_tache_focus_holidays', methods: ['POST'])]
    public function showHolidays(
        TacheFocus $tacheFocu,
        Request $request,
        HolidayService $holidayService
    ): Response {
        if (!$this->isCsrfTokenValid('holidays' . $tacheFocu->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Jeton CSRF invalide.');
        }

        $holidays = $holidayService->getUpcoming('TN');
        $request->getSession()->getFlashBag()->set('holidays', $holidays);
        $this->addFlash('success', 'Jours feries recuperes.');

        return $this->redirectToRoute('app_tache_focus_show', ['id' => $tacheFocu->getId()]);
    }

    #[Route('/{id}/books', name: 'app_tache_focus_books', methods: ['POST'])]
    public function recommendBooks(
        TacheFocus $tacheFocu,
        Request $request,
        FocusBookService $focusBookService
    ): Response {
        if (!$this->isCsrfTokenValid('books' . $tacheFocu->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Jeton CSRF invalide.');
        }

        $books = $focusBookService->recommend($tacheFocu->getNiveauDifficulte());
        $request->getSession()->getFlashBag()->set('focus_books', $books);
        $this->addFlash('success', 'Suggestions de livres recuperes.');

        return $this->redirectToRoute('app_tache_focus_show', ['id' => $tacheFocu->getId()]);
    }

    #[Route('/{id}/edit', name: 'app_tache_focus_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TacheFocus $tacheFocu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TacheFocusType::class, $tacheFocu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Tache modifiee avec succes !');

            return $this->redirectToRoute('app_tache_focus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tache_focus/edit.html.twig', [
            'tache_focu' => $tacheFocu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tache_focus_delete', methods: ['POST'])]
    public function delete(Request $request, TacheFocus $tacheFocu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $tacheFocu->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tacheFocu);
            $entityManager->flush();

            $this->addFlash('success', 'Tache supprimee !');
        }

        return $this->redirectToRoute('app_tache_focus_index', [], Response::HTTP_SEE_OTHER);
    }
}
