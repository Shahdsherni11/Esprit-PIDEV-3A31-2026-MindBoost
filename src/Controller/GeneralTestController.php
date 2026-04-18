<?php

namespace App\Controller;

use App\Service\GeneralTestService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/tests/general', name: 'general_test_')]
class GeneralTestController extends AbstractController
{
    private GeneralTestService $testService;

    public function __construct(GeneralTestService $testService)
    {
        $this->testService = $testService;
    }

    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            try {
                $title = $request->request->get('title');
                $description = $request->request->get('description');
                $createdBy = $request->request->get('created_by') ?? 1;
                $questions = $request->request->all()['questions'] ?? [];

                if (!$title || empty(trim($title))) {
                    throw new \Exception("Le titre est obligatoire");
                }

                if (preg_match('/^\d+$/', trim($title))) {
                    throw new \Exception("Le titre ne doit pas être uniquement des nombres");
                }

                if (strlen(trim($title)) < 3 || strlen(trim($title)) > 255) {
                    throw new \Exception("Le titre doit avoir entre 3 et 255 caractères");
                }

                $test = $this->testService->createTest(trim($title), $description, (int) $createdBy, $questions);

                $this->addFlash('success', 'Test créé avec succès avec ' . count($questions) . ' questions !');
                return $this->redirectToRoute('general_test_show', ['id' => $test->getId()]);
            } catch (\Exception $e) {
                $this->addFlash('error', $e->getMessage());
            }
        }

        return $this->render('general_test/create_general.html.twig');
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request): Response
    {
        try {
            $test = $this->testService->getTestById($id);
            $questionsWithAnswers = $this->testService->getQuestionsWithAnswers($test);

            if ($request->isMethod('POST')) {
                $title = $request->request->get('title');
                $description = $request->request->get('description');
                $status = $request->request->get('status');

                if (!$title || empty(trim($title))) {
                    throw new \Exception("Le titre est obligatoire");
                }

                if (preg_match('/^\d+$/', trim($title))) {
                    throw new \Exception("Le titre ne doit pas être uniquement des nombres");
                }

                if (strlen(trim($title)) < 3 || strlen(trim($title)) > 255) {
                    throw new \Exception("Le titre doit avoir entre 3 et 255 caractères");
                }

                if (!in_array($status, ['DRAFT', 'ACTIVE', 'INACTIVE'])) {
                    throw new \Exception("Statut invalide");
                }

                $test = $this->testService->updateTest($test, trim($title), $description, $status);

                $this->addFlash('success', 'Test mis à jour avec succès !');
                return $this->redirectToRoute('general_test_show', ['id' => $test->getId()]);
            }

            return $this->render('general_test/edit_general.html.twig', [
                'test' => $test,
                'questionsWithAnswers' => $questionsWithAnswers,
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());
            return $this->redirectToRoute('general_test_index');
        }
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['GET', 'POST'])]
    public function delete(int $id, Request $request): Response
    {
        try {
            $test = $this->testService->getTestById($id);

            if ($request->isMethod('POST')) {
                $this->testService->deleteTest($test);
                $this->addFlash('success', 'Test supprimé avec succès !');
                return $this->redirectToRoute('general_test_index');
            }

            return $this->render('general_test/delete.html.twig', [
                'test' => $test,
                'type' => 'general',
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());
            return $this->redirectToRoute('general_test_index');
        }
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(int $id): Response
    {
        try {
            $test = $this->testService->getTestById($id);
            $questionsWithAnswers = $this->testService->getQuestionsWithAnswers($test);

            return $this->render('general_test/show.html.twig', [
                'test' => $test,
                'questionsWithAnswers' => $questionsWithAnswers,
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());
            return $this->redirectToRoute('general_test_index');
        }
    }

    #[Route('', name: 'index', methods: ['GET'])]
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        try {
            $tests = $this->testService->getAllTests();

            $search = trim((string) $request->query->get('search', ''));
            if ($search !== '') {
                $tests = array_filter($tests, function ($test) use ($search) {
                    return stripos($test->getTitle(), $search) !== false;
                });
            }

            $sort = $request->query->get('sort', 'date_desc');

            usort($tests, function ($a, $b) use ($sort) {
                return match ($sort) {
                    'title_asc' => strcasecmp($a->getTitle(), $b->getTitle()),
                    'title_desc' => strcasecmp($b->getTitle(), $a->getTitle()),
                    'date_asc' => $a->getCreatedAt() <=> $b->getCreatedAt(),
                    default => $b->getCreatedAt() <=> $a->getCreatedAt(),
                };
            });

            $pagination = $paginator->paginate(
                array_values($tests),
                $request->query->getInt('page', 1),
                5
            );

            return $this->render('general_test/index.html.twig', [
                'generalTests' => $pagination,
                'generalCount' => count($tests),
                'type' => 'general',
                'search' => $search,
                'sort' => $sort,
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());
            return $this->redirectToRoute('general_test_index');
        }
    }
}