<?php

namespace App\Controller;

use App\Service\GeneralTestService;
use App\Service\SpecificTestService;
use App\Service\TestLifecycleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/lifecycle', name: 'lifecycle_')]
class TestLifecycleController extends AbstractController
{
    public function __construct(
        private GeneralTestService $generalTestService,
        private SpecificTestService $specificTestService,
        private TestLifecycleService $testLifecycleService
    ) {
    }

    #[Route('/general/{id}/archive', name: 'general_archive')]
    public function archiveGeneral(int $id): Response
    {
        $test = $this->generalTestService->getTestById($id);
        $this->testLifecycleService->archiveGeneralTest($test);

        $this->addFlash('success', 'Test général archivé.');
        return $this->redirectToRoute('general_test_index');
    }

    #[Route('/general/{id}/duplicate', name: 'general_duplicate')]
    public function duplicateGeneral(int $id): Response
    {
        $test = $this->generalTestService->getTestById($id);
        $copy = $this->testLifecycleService->duplicateGeneralTest($test);

        $this->addFlash('success', 'Test général dupliqué.');
        return $this->redirectToRoute('general_test_show', ['id' => $copy->getId()]);
    }

    #[Route('/specific/{id}/archive', name: 'specific_archive')]
    public function archiveSpecific(int $id): Response
    {
        $test = $this->specificTestService->getTestById($id);
        $this->testLifecycleService->archiveSpecificTest($test);

        $this->addFlash('success', 'Test spécifique archivé.');
        return $this->redirectToRoute('specific_test_index');
    }

    #[Route('/specific/{id}/duplicate', name: 'specific_duplicate')]
    public function duplicateSpecific(int $id): Response
    {
        $test = $this->specificTestService->getTestById($id);
        $copy = $this->testLifecycleService->duplicateSpecificTest($test);

        $this->addFlash('success', 'Test spécifique dupliqué.');
        return $this->redirectToRoute('specific_test_show', ['id' => $copy->getId()]);
    }
}