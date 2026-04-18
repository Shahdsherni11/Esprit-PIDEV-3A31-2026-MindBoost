<?php

namespace App\Controller;

use App\Repository\TacheFocusRepository;
use App\Repository\SousTacheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        TacheFocusRepository $tacheFocusRepository,
        SousTacheRepository $sousTacheRepository
    ): Response {
        $taches = $tacheFocusRepository->findAll();
        $sousTaches = $sousTacheRepository->findAll();

        $totalTaches      = count($taches);
        $totalSousTaches  = count($sousTaches);
        $tachesTerminees  = count(array_filter($taches, fn($t) => $t->getStatut() === 'Terminée'));
        $tachesEnCours    = count(array_filter($taches, fn($t) => $t->getStatut() === 'En cours'));
        $scoreMoyen       = $totalTaches > 0
            ? round(array_sum(array_map(fn($t) => $t->getScoreProductivite(), $taches)) / $totalTaches)
            : 0;
        $progression      = $totalTaches > 0
            ? round(($tachesTerminees / $totalTaches) * 100)
            : 0;

        return $this->render('home/index.html.twig', [
            'taches'          => $taches,
            'totalTaches'     => $totalTaches,
            'totalSousTaches' => $totalSousTaches,
            'tachesTerminees' => $tachesTerminees,
            'tachesEnCours'   => $tachesEnCours,
            'scoreMoyen'      => $scoreMoyen,
            'progression'     => $progression,
        ]);
    }
}