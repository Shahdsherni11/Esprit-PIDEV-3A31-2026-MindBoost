<?php

namespace App\Controller\BackOffice;

use App\Repository\SousTacheRepository;
use App\Repository\TacheFocusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/sous-taches')]
class SousTacheController extends AbstractController
{
    #[Route('', name: 'back_sous_tache_index', methods: ['GET'])]
    public function index(
        Request $request,
        SousTacheRepository $sousTacheRepository,
        TacheFocusRepository $tacheFocusRepository
    ): Response {
        $search = $request->query->get('search', '');
        $etat = $request->query->get('etat', '');
        $tacheId = $request->query->get('tache_id', '');

        $sousTaches = $sousTacheRepository->findBySearchAndFilter($search, $etat, $tacheId);
        $taches = $tacheFocusRepository->findAll();

        return $this->render('back/sous_tache/index.html.twig', [
            'sous_taches' => $sousTaches,
            'search' => $search,
            'etat' => $etat,
            'tache_id' => $tacheId,
            'taches' => $taches,
        ]);
    }
}
