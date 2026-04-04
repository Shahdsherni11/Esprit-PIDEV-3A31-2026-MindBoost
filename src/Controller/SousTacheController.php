<?php

namespace App\Controller;

use App\Entity\SousTache;
use App\Entity\TacheFocus;
use App\Form\SousTacheType;
use App\Repository\SousTacheRepository;
use App\Repository\TacheFocusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sous/tache')]
class SousTacheController extends AbstractController
{
    #[Route('/', name: 'app_sous_tache_index', methods: ['GET'])]
    public function index(Request $request, SousTacheRepository $sousTacheRepository): Response
    {
        $search = $request->query->get('search', '');
        $etat = $request->query->get('etat', '');
        $sousTaches = $sousTacheRepository->findBySearchAndFilter($search, $etat);

        return $this->render('sous_tache/index.html.twig', [
            'sous_taches' => $sousTaches,
            'search' => $search,
            'etat' => $etat,
        ]);
    }

    #[Route('/new', name: 'app_sous_tache_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sousTache = new SousTache();
        $form = $this->createForm(SousTacheType::class, $sousTache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sousTache);
            $entityManager->flush();
            $this->mettreAjourProgression($sousTache->getTacheFocus(), $entityManager);
            $this->addFlash('success', '✅ Sous-tâche ajoutée !');
            return $this->redirectToRoute('app_sous_tache_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sous_tache/new.html.twig', [
            'sous_tache' => $sousTache,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sous_tache_show', methods: ['GET'])]
    public function show(SousTache $sousTache): Response
    {
        return $this->render('sous_tache/show.html.twig', [
            'sous_tache' => $sousTache,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sous_tache_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SousTache $sousTache, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SousTacheType::class, $sousTache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->mettreAjourProgression($sousTache->getTacheFocus(), $entityManager);
            $this->addFlash('success', '✅ Sous-tâche modifiée !');
            return $this->redirectToRoute('app_sous_tache_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sous_tache/edit.html.twig', [
            'sous_tache' => $sousTache,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sous_tache_delete', methods: ['POST'])]
    public function delete(Request $request, SousTache $sousTache, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sousTache->getId(), $request->request->get('_token'))) {
            $tacheFocus = $sousTache->getTacheFocus();
            $entityManager->remove($sousTache);
            $entityManager->flush();
            $this->mettreAjourProgression($tacheFocus, $entityManager);
            $this->addFlash('success', '✅ Sous-tâche supprimée !');
        }

        return $this->redirectToRoute('app_sous_tache_index', [], Response::HTTP_SEE_OTHER);
    }

    private function mettreAjourProgression(?TacheFocus $tacheFocus, EntityManagerInterface $em): void
    {
        if (!$tacheFocus) return;

        $sousTaches = $tacheFocus->getSousTaches();
        $total = count($sousTaches);
        if ($total === 0) return;

        $terminees = 0;
        foreach ($sousTaches as $st) {
            if (in_array($st->getEtat(), ['Terminée', 'Terminee'])) {
                $terminees++;
            }
        }

        $score = (int)(($terminees / $total) * 100);
        $tacheFocus->setScoreProductivite($score);

        if ($terminees === $total) {
            $tacheFocus->setStatut('Terminée');
        }

        $em->flush();
    }
}