<?php

namespace App\Controller;

use App\Entity\GeneralAnswer;
use App\Entity\GeneralQuestion;
use App\Entity\GeneralTest;
use App\Form\GeneralTestFormType;
use App\Repository\GeneralTestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tests')]
class GeneralTestController extends AbstractController
{
    // ── LISTE DES TESTS DISPONIBLES ──────────────────────────
    #[Route('', name: 'app_test_list')]
    public function list(Request $request, GeneralTestRepository $repo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $keyword = $request->query->get('q', '');
        $tests   = $keyword ? $repo->searchByTitle($keyword) : $repo->findActive();

        return $this->render('tests/list.html.twig', [
            'tests'   => $tests,
            'keyword' => $keyword,
        ]);
    }

    // ── DÉTAIL D'UN TEST ─────────────────────────────────────
    #[Route('/{id}', name: 'app_test_show', requirements: ['id' => '\d+'])]
    public function show(GeneralTest $test): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('tests/show.html.twig', ['test' => $test]);
    }

    // ── ADMIN : LISTE TOUS LES TESTS ─────────────────────────
    #[Route('/admin/all', name: 'app_admin_test_list')]
    public function adminList(Request $request, GeneralTestRepository $repo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $keyword = $request->query->get('q', '');
        $tests   = $keyword ? $repo->searchByTitle($keyword) : $repo->findAll();

        return $this->render('tests/admin_list.html.twig', [
            'tests'   => $tests,
            'keyword' => $keyword,
            'stats'   => $repo->countByStatus(),
        ]);
    }

    // ── ADMIN : CRÉER TEST ───────────────────────────────────
    #[Route('/admin/new', name: 'app_admin_test_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $test = new GeneralTest();
        $test->setCreatedBy($this->getUser()->getId());

        $form = $this->createForm(GeneralTestFormType::class, $test);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($test);
            $em->flush();
            $this->addFlash('success', '✅ Test créé. Ajoutez maintenant les questions.');
            return $this->redirectToRoute('app_admin_test_questions', ['id' => $test->getId()]);
        }

        return $this->render('tests/admin_form.html.twig', [
            'form'  => $form,
            'test'  => $test,
            'isNew' => true,
        ]);
    }

    // ── ADMIN : MODIFIER TEST ────────────────────────────────
    #[Route('/admin/{id}/edit', name: 'app_admin_test_edit', requirements: ['id' => '\d+'])]
    public function edit(GeneralTest $test, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(GeneralTestFormType::class, $test);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', '✅ Test mis à jour.');
            return $this->redirectToRoute('app_admin_test_list');
        }

        return $this->render('tests/admin_form.html.twig', [
            'form'  => $form,
            'test'  => $test,
            'isNew' => false,
        ]);
    }

    // ── ADMIN : SUPPRIMER TEST ───────────────────────────────
    #[Route('/admin/{id}/delete', name: 'app_admin_test_delete', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function delete(GeneralTest $test, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if ($this->isCsrfTokenValid('delete_test_' . $test->getId(), $request->request->get('_token'))) {
            $em->remove($test);
            $em->flush();
            $this->addFlash('success', '🗑 Test supprimé.');
        }
        return $this->redirectToRoute('app_admin_test_list');
    }

    // ── ADMIN : GÉRER QUESTIONS ──────────────────────────────
    #[Route('/admin/{id}/questions', name: 'app_admin_test_questions', requirements: ['id' => '\d+'])]
    public function manageQuestions(GeneralTest $test, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        if ($request->isMethod('POST')) {
            $action = $request->request->get('action');

            if ($action === 'add_question') {
                $questionText = trim($request->request->get('question_text', ''));
                if ($questionText !== '') {
                    $q = new GeneralQuestion();
                    $q->setGeneralTest($test);
                    $q->setQuestionText($questionText);
                    $q->setQuestionOrder($test->getQuestions()->count() + 1);
                    $em->persist($q);
                    $em->flush();

                    // Ajouter 4 réponses par défaut (A/B/C/D)
                    foreach (['A' => 100, 'B' => 75, 'C' => 50, 'D' => 25] as $label => $score) {
                        $a = new GeneralAnswer();
                        $a->setQuestion($q);
                        $a->setAnswerLabel($label);
                        $a->setAnswerText("Réponse $label");
                        $a->setScore($score);
                        $a->setAnswerOrder(ord($label) - 64);
                        $em->persist($a);
                    }
                    $em->flush();
                    $this->addFlash('success', '✅ Question ajoutée avec 4 réponses par défaut.');
                }
            }

            if ($action === 'delete_question') {
                $qId = (int)$request->request->get('question_id');
                $question = $em->getRepository(GeneralQuestion::class)->find($qId);
                if ($question && $question->getGeneralTest() === $test) {
                    $em->remove($question);
                    $em->flush();
                    $this->addFlash('success', '🗑 Question supprimée.');
                }
            }

            if ($action === 'update_answer') {
                $answerId   = (int)$request->request->get('answer_id');
                $answerText = trim($request->request->get('answer_text', ''));
                $answerScore = (int)$request->request->get('answer_score', 0);
                $answer = $em->getRepository(GeneralAnswer::class)->find($answerId);
                if ($answer) {
                    $answer->setAnswerText($answerText);
                    $answer->setScore(max(0, min(100, $answerScore)));
                    $em->flush();
                    $this->addFlash('success', '✅ Réponse mise à jour.');
                }
            }

            return $this->redirectToRoute('app_admin_test_questions', ['id' => $test->getId()]);
        }

        return $this->render('tests/admin_questions.html.twig', ['test' => $test]);
    }
}
