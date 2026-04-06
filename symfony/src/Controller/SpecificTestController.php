<?php

namespace App\Controller;

use App\Service\GeneralTestService;
use App\Service\SpecificTestService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/tests/specific', name: 'specific_test_')]
class SpecificTestController extends AbstractController
{
    private $testService;
    private $generalTestService;

    public function __construct(
        SpecificTestService $testService,
        GeneralTestService $generalTestService
    ) {
        $this->testService = $testService;
        $this->generalTestService = $generalTestService;
    }

    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $generalTests = $this->generalTestService->getAllTests();

        if ($request->isMethod('POST')) {
            try {
                $generalTestId = (int)($request->request->get('general_test_id') ?? 0);
                $category = $request->request->get('category');
                $title = $request->request->get('title');
                $description = $request->request->get('description');
                $createdBy = $request->request->get('created_by') ?? 1;
                $questions = $request->request->all()['questions'] ?? [];

                if ($generalTestId <= 0) {
                    throw new \Exception("Le test général parent est obligatoire");
                }

                if (!$category || empty(trim($category))) {
                    throw new \Exception("La catégorie est obligatoire");
                }

                $validCategories = ['Anxiete', 'Stress', 'Depression', 'Trouble du Sommeil'];
                if (!in_array(trim($category), $validCategories, true)) {
                    throw new \Exception("Catégorie invalide");
                }

                if (!$title || empty(trim($title))) {
                    throw new \Exception("Le titre est obligatoire");
                }

                if (preg_match('/^\d+$/', trim($title))) {
                    throw new \Exception("Le titre ne doit pas être uniquement des nombres");
                }

                if (strlen(trim($title)) < 3 || strlen(trim($title)) > 255) {
                    throw new \Exception("Le titre doit avoir entre 3 et 255 caractères");
                }

                if (empty($questions)) {
                    throw new \Exception("Vous devez ajouter au moins une question");
                }

                $test = $this->testService->createTest(
                    $generalTestId,
                    trim($category),
                    trim($title),
                    $description,
                    (int)$createdBy,
                    $questions
                );

                $this->addFlash('success', 'Test créé avec succès avec ' . count($questions) . ' questions!');
                return $this->redirectToRoute('specific_test_show', ['id' => $test->getId()]);
            } catch (\Exception $e) {
                $this->addFlash('error', $e->getMessage());
            }
        }

        return $this->render('specific_test/create_specific.html.twig', [
            'generalTests' => $generalTests
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request): Response
    {
        $generalTests = $this->generalTestService->getAllTests();

        try {
            $test = $this->testService->getTestById($id);
            $questionsWithAnswers = $this->testService->getQuestionsWithAnswers($test);

            if ($request->isMethod('POST')) {
                $generalTestId = (int)($request->request->get('general_test_id') ?? 0);
                $category = $request->request->get('category');
                $title = $request->request->get('title');
                $description = $request->request->get('description');
                $status = $request->request->get('status');

                if ($generalTestId <= 0) {
                    throw new \Exception("Le test général parent est obligatoire");
                }

                if (!$category || empty(trim($category))) {
                    throw new \Exception("La catégorie est obligatoire");
                }

                $validCategories = ['Anxiete', 'Stress', 'Depression', 'Trouble du Sommeil'];
                if (!in_array(trim($category), $validCategories, true)) {
                    throw new \Exception("Catégorie invalide");
                }

                if (!$title || empty(trim($title))) {
                    throw new \Exception("Le titre est obligatoire");
                }

                if (preg_match('/^\d+$/', trim($title))) {
                    throw new \Exception("Le titre ne doit pas être uniquement des nombres");
                }

                if (strlen(trim($title)) < 3 || strlen(trim($title)) > 255) {
                    throw new \Exception("Le titre doit avoir entre 3 et 255 caractères");
                }

                if (!in_array($status, ['DRAFT', 'ACTIVE', 'INACTIVE'], true)) {
                    throw new \Exception("Statut invalide");
                }

                $test = $this->testService->updateTest(
                    $test,
                    $generalTestId,
                    trim($category),
                    trim($title),
                    $description,
                    $status
                );

                $this->addFlash('success', 'Test mis à jour avec succès!');
                return $this->redirectToRoute('specific_test_show', ['id' => $test->getId()]);
            }

            return $this->render('specific_test/edit_specific.html.twig', [
                'test' => $test,
                'questionsWithAnswers' => $questionsWithAnswers,
                'generalTests' => $generalTests
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());
            return $this->redirectToRoute('specific_test_index');
        }
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['GET', 'POST'])]
    public function delete(int $id, Request $request): Response
    {
        try {
            $test = $this->testService->getTestById($id);

            if ($request->isMethod('POST')) {
                $this->testService->deleteTest($test);
                $this->addFlash('success', 'Test supprimé avec succès!');
                return $this->redirectToRoute('specific_test_index');
            }

            return $this->render('specific_test/delete.html.twig', [
                'test' => $test,
                'type' => 'specific'
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());
            return $this->redirectToRoute('specific_test_index');
        }
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(int $id): Response
    {
        try {
            $test = $this->testService->getTestById($id);
            $questionsWithAnswers = $this->testService->getQuestionsWithAnswers($test);

            return $this->render('specific_test/show.html.twig', [
                'test' => $test,
                'questionsWithAnswers' => $questionsWithAnswers
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());
            return $this->redirectToRoute('specific_test_index');
        }
    }

    #[Route('', name: 'index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        try {
            $tests = $this->testService->getAllTests();

            $search = $request->query->get('search');
            if ($search) {
                $tests = array_filter($tests, function ($test) use ($search) {
                    return stripos($test->getTitle(), $search) !== false
                        || stripos($test->getCategory(), $search) !== false;
                });
            }

            $category = $request->query->get('category');
            if ($category) {
                $tests = array_filter($tests, function ($test) use ($category) {
                    return $test->getCategory() === $category;
                });
            }

            return $this->render('specific_test/index.html.twig', [
                'specificTests' => array_values($tests),
                'specificCount' => count($tests),
                'type' => 'specific',
                'search' => $search,
                'category' => $category
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());
            return $this->redirectToRoute('specific_test_index');
        }
    }
}