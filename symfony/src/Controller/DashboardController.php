<?php

namespace App\Controller;

use App\Service\GeneralTestService;
use App\Service\SpecificTestService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    private $generalTestService;
    private $specificTestService;

    public function __construct(
        GeneralTestService $generalTestService,
        SpecificTestService $specificTestService
    ) {
        $this->generalTestService = $generalTestService;
        $this->specificTestService = $specificTestService;
    }

    #[Route('/', name: 'dashboard', methods: ['GET'])]
    public function index(): Response
    {
        try {
            $generalTests = $this->generalTestService->getAllTests();
            $specificTests = $this->specificTestService->getAllTests();

            return $this->render('dashboard.html.twig', [
                'generalTestsCount' => count($generalTests),
                'specificTestsCount' => count($specificTests),
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());
            return $this->render('dashboard.html.twig', [
                'generalTestsCount' => 0,
                'specificTestsCount' => 0,
            ]);
        }
    }
}