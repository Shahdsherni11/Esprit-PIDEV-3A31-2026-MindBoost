<?php

namespace App\Controller;

use App\Repository\TacheFocusRepository;
use App\Repository\SousTacheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatistiqueController extends AbstractController
{
    #[Route('/statistiques', name: 'app_statistiques')]
    public function index(
        TacheFocusRepository $tacheFocusRepository,
        SousTacheRepository $sousTacheRepository
    ): Response {
        $taches = $tacheFocusRepository->findAll();
        $sousTaches = $sousTacheRepository->findAll();

        // Stats tâches par statut
        $parStatut = [];
        foreach ($taches as $tache) {
            $statut = $tache->getStatut() ?? 'Non défini';
            $parStatut[$statut] = ($parStatut[$statut] ?? 0) + 1;
        }

        // Stats sous-tâches par état
        $parEtat = [];
        foreach ($sousTaches as $st) {
            $etat = $st->getEtat() ?? 'Non défini';
            $parEtat[$etat] = ($parEtat[$etat] ?? 0) + 1;
        }

        // Stats par difficulté
        $parDifficulte = [];
        foreach ($taches as $tache) {
            $diff = 'Niveau ' . ($tache->getNiveauDifficulte() ?? '?');
            $parDifficulte[$diff] = ($parDifficulte[$diff] ?? 0) + 1;
        }

        // Calculs généraux
        $totalTaches = count($taches);
        $totalSousTaches = count($sousTaches);
        $scoreMoyen = $totalTaches > 0
            ? round(array_sum(array_map(fn($t) => $t->getScoreProductivite() ?? 0, $taches)) / $totalTaches)
            : 0;
        $tachesTerminees = $parStatut['Terminée'] ?? 0;
        $progression = $totalTaches > 0 ? round(($tachesTerminees / $totalTaches) * 100) : 0;

        return $this->render('statistique/index.html.twig', [
            'parStatut' => $parStatut,
            'parEtat' => $parEtat,
            'parDifficulte' => $parDifficulte,
            'totalTaches' => $totalTaches,
            'totalSousTaches' => $totalSousTaches,
            'scoreMoyen' => $scoreMoyen,
            'tachesTerminees' => $tachesTerminees,
            'progression' => $progression,
        ]);
    }
}