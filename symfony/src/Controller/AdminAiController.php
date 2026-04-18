<?php

namespace App\Controller;

use App\Service\AdminAiPersistService;
use App\Service\AdminAiTestService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/ai', name: 'admin_ai_')]
class AdminAiController extends AbstractController
{
    #[Route('/tests', name: 'tests', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('admin_ai/tests.html.twig', [
            'generatedJson' => null,
            'rawResponse' => null,
            'errorMessage' => null,
            'successMessage' => null,
            'type' => 'specific',
            'category' => 'Stress',
            'questionCount' => 5,
        ]);
    }

    #[Route('/tests/generate', name: 'tests_generate', methods: ['POST'])]
    public function generate(
        Request $request,
        AdminAiTestService $service,
        AdminAiPersistService $persistService,
        LoggerInterface $logger
    ): Response {
        $type = (string) $request->request->get('type', 'specific');
        $type = in_array($type, ['general', 'specific'], true) ? $type : 'specific';

        $category = trim((string) $request->request->get('category', 'Stress'));
        if ($category === '') {
            $category = 'Stress';
        }

        $count = max(3, min(20, (int) $request->request->get('questionCount', 5)));

        try {
            $result = $service->generateTestDraft($type, $category, $count);

            if (!$result['ok']) {
                $logger->error('Échec génération IA', [
                    'type' => $type,
                    'category' => $category,
                    'questionCount' => $count,
                    'result' => $result,
                ]);

                return $this->render('admin_ai/tests.html.twig', [
                    'generatedJson' => $result['json'] ?? null,
                    'rawResponse' => $result['raw'] ?? null,
                    'errorMessage' => $result['error'] ?? 'Erreur inconnue lors de la génération.',
                    'successMessage' => null,
                    'type' => $type,
                    'category' => $category,
                    'questionCount' => $count,
                ]);
            }

            $savedInfo = $persistService->saveGeneratedTestJson($result['json'], $type);

            $logger->info('Test IA généré et sauvegardé', [
                'type' => $type,
                'category' => $category,
                'questionCount' => $count,
                'savedInfo' => $savedInfo,
            ]);

            return $this->render('admin_ai/tests.html.twig', [
                'generatedJson' => $result['json'],
                'rawResponse' => $result['raw'] ?? null,
                'errorMessage' => null,
                'successMessage' => 'Test généré et enregistré avec succès : ' . $savedInfo,
                'type' => $type,
                'category' => $category,
                'questionCount' => $count,
            ]);
        } catch (\Throwable $e) {
            $logger->error('Erreur pendant génération/sauvegarde IA', [
                'message' => $e->getMessage(),
                'class' => get_class($e),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'type' => $type,
                'category' => $category,
                'questionCount' => $count,
            ]);

            return $this->render('admin_ai/tests.html.twig', [
                'generatedJson' => null,
                'rawResponse' => null,
                'errorMessage' => 'Erreur lors de la sauvegarde : ' . $e->getMessage(),
                'successMessage' => null,
                'type' => $type,
                'category' => $category,
                'questionCount' => $count,
            ]);
        }
    }
}