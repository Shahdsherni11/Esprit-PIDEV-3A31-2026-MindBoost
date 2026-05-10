<?php

namespace App\Controller;

use App\Service\UserProgressService;
use App\Service\UserSessionService;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserPdfController extends AbstractController
{
    /**
     * 📄 Exporter l'historique en PDF
     */
    #[Route('/user/history/pdf', name: 'user_history_pdf', methods: ['GET'])]
    public function exportHistoryPdf(Request $request, UserProgressService $userProgressService, UserSessionService $userSessionService): Response
    {
        $userId = $userSessionService->getCurrentUserId($request);
        $history = $userProgressService->getUserHistory($userId);

        $html = $this->renderView('pdf/user_history_pdf.html.twig', [
            'history' => $history,
            'generatedAt' => new \DateTime(),
        ]);

        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $options->set('isRemoteEnabled', false);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return new Response(
            $dompdf->output(),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="historique_user.pdf"',
            ]
        );
    }

    /**
     * 📊 Exporter les statistiques en PDF
     */
    #[Route('/user/statistics/pdf', name: 'user_statistics_pdf', methods: ['GET'])]
    public function exportStatisticsPdf(Request $request, UserProgressService $userProgressService, UserSessionService $userSessionService): Response
    {
        $userId = $userSessionService->getCurrentUserId($request);
        $evolution = $userProgressService->getEvolution($userId);

        $html = $this->renderView('pdf/user_statistics_pdf.html.twig', [
            'evolution' => $evolution,
            'generatedAt' => new \DateTime(),
        ]);

        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $options->set('isRemoteEnabled', false);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return new Response(
            $dompdf->output(),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="statistiques_user.pdf"',
            ]
        );
    }
}