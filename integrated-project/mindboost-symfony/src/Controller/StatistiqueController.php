<?php

namespace App\Controller;

use App\Repository\TacheFocusRepository;
use App\Repository\SousTacheRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
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

        $parStatut = [];
        foreach ($taches as $tache) {
            $statut = $tache->getStatut() ?? 'Non défini';
            $parStatut[$statut] = ($parStatut[$statut] ?? 0) + 1;
        }

        $parEtat = [];
        foreach ($sousTaches as $st) {
            $etat = $st->getEtat() ?? 'Non défini';
            $parEtat[$etat] = ($parEtat[$etat] ?? 0) + 1;
        }

        $parDifficulte = [];
        foreach ($taches as $tache) {
            $diff = 'Niveau ' . ($tache->getNiveauDifficulte() ?? '?');
            $parDifficulte[$diff] = ($parDifficulte[$diff] ?? 0) + 1;
        }

        $totalTaches = count($taches);
        $totalSousTaches = count($sousTaches);
        $scoreMoyen = $totalTaches > 0
            ? round(array_sum(array_map(fn($t) => $t->getScoreProductivite() ?? 0, $taches)) / $totalTaches)
            : 0;
        $tachesTerminees = $parStatut['Terminée'] ?? 0;
        $progression = $totalTaches > 0 ? round(($tachesTerminees / $totalTaches) * 100) : 0;

        return $this->render('statistique/index.html.twig', [
            'parStatut'       => $parStatut,
            'parEtat'         => $parEtat,
            'parDifficulte'   => $parDifficulte,
            'totalTaches'     => $totalTaches,
            'totalSousTaches' => $totalSousTaches,
            'scoreMoyen'      => $scoreMoyen,
            'tachesTerminees' => $tachesTerminees,
            'progression'     => $progression,
        ]);
    }

    #[Route('/statistiques/pdf', name: 'app_statistiques_pdf')]
    public function exportPdf(
        TacheFocusRepository $tacheFocusRepository,
        SousTacheRepository $sousTacheRepository
    ): Response {
        $taches      = $tacheFocusRepository->findAll();
        $sousTaches  = $sousTacheRepository->findAll();

        $totalTaches     = count($taches);
        $totalSousTaches = count($sousTaches);
        $tachesTerminees = count(array_filter($taches, fn($t) => $t->getStatut() === 'Terminée'));
        $scoreMoyen      = $totalTaches > 0
            ? round(array_sum(array_map(fn($t) => $t->getScoreProductivite() ?? 0, $taches)) / $totalTaches)
            : 0;
        $progression = $totalTaches > 0
            ? round(($tachesTerminees / $totalTaches) * 100)
            : 0;

        $html = $this->renderView('statistique/pdf.html.twig', [
            'taches'          => $taches,
            'totalTaches'     => $totalTaches,
            'totalSousTaches' => $totalSousTaches,
            'tachesTerminees' => $tachesTerminees,
            'scoreMoyen'      => $scoreMoyen,
            'progression'     => $progression,
            'date'            => new \DateTime(),
        ]);

        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return new Response(
            $dompdf->output(),
            200,
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="mindboost-rapport-' . date('Y-m-d') . '.pdf"',
            ]
        );
    }
}