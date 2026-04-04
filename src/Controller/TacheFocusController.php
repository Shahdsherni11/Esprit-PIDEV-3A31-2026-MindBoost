<?php

namespace App\Controller;

use App\Entity\TacheFocus;
use App\Form\TacheFocusType;
use App\Repository\TacheFocusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tache/focus')]
class TacheFocusController extends AbstractController
{
    // ===== RECHERCHE + FILTRE + API CITATIONS =====
    #[Route('/', name: 'app_tache_focus_index', methods: ['GET'])]
    public function index(Request $request, TacheFocusRepository $tacheFocusRepository): Response
    {
        // Récupérer les paramètres de recherche et filtre
        $search = $request->query->get('search', '');
        $statut = $request->query->get('statut', '');
        $tri = $request->query->get('tri', 'id');
        $ordre = $request->query->get('ordre', 'ASC');

        // Recherche et filtre
        $taches = $tacheFocusRepository->findBySearchAndFilter($search, $statut, $tri, $ordre);

        // API Citations motivantes
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

    // ===== API CITATIONS MOTIVANTES =====
    private function getCitationMotivante(): array
    {
        // Citations par défaut
        $citationsDefault = [
            ['q' => 'La productivité, c\'est ne jamais rien faire par accident.', 'a' => 'Atkinson'],
            ['q' => 'Le succès, c\'est tomber sept fois et se relever huit.', 'a' => 'Proverbe japonais'],
            ['q' => 'La discipline est le pont entre les objectifs et les accomplissements.', 'a' => 'Jim Rohn'],
            ['q' => 'Chaque jour est une nouvelle opportunité de changer votre vie.', 'a' => 'Anonyme'],
            ['q' => 'Le secret du succès est de commencer.', 'a' => 'Mark Twain'],
        ];

        try {
            $context = stream_context_create([
                'http' => [
                    'timeout' => 3,
                    'user_agent' => 'MindBood-Web/1.0'
                ]
            ]);
            $response = @file_get_contents('https://zenquotes.io/api/random', false, $context);
            if ($response) {
                $data = json_decode($response, true);
                if (isset($data[0]['q']) && isset($data[0]['a'])) {
                    return ['q' => $data[0]['q'], 'a' => $data[0]['a']];
                }
            }
        } catch (\Exception $e) {
            // Fallback
        }

        // Retourner une citation aléatoire par défaut
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

            $this->addFlash('success', '✅ Tâche créée avec succès !');
            return $this->redirectToRoute('app_tache_focus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tache_focus/new.html.twig', [
            'tache_focu' => $tacheFocu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tache_focus_show', methods: ['GET'])]
    public function show(TacheFocus $tacheFocu): Response
    {
        return $this->render('tache_focus/show.html.twig', [
            'tache_focu' => $tacheFocu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tache_focus_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TacheFocus $tacheFocu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TacheFocusType::class, $tacheFocu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', '✅ Tâche modifiée avec succès !');
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
        if ($this->isCsrfTokenValid('delete'.$tacheFocu->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tacheFocu);
            $entityManager->flush();
            $this->addFlash('success', '✅ Tâche supprimée !');
        }

        return $this->redirectToRoute('app_tache_focus_index', [], Response::HTTP_SEE_OTHER);
    }
}