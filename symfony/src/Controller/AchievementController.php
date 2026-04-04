<?php

namespace App\Controller;

use App\Entity\Achievement;
use App\Form\AchievementType;
use App\Repository\AchievementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/achievements')]
class AchievementController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em,
        private AchievementRepository $achievementRepository
    ) {}

    #[Route('', name: 'achievement_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('achievement/index.html.twig', [
            'achievements' => $this->achievementRepository->findBy([], ['achievementScore' => 'DESC']),
        ]);
    }

    #[Route('/new', name: 'achievement_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $achievement = new Achievement();
        $form = $this->createForm(AchievementType::class, $achievement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($achievement);
            $this->em->flush();
            $this->addFlash('success', 'Achievement created!');
            return $this->redirectToRoute('achievement_index');
        }

        return $this->render('achievement/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'achievement_edit', methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request): Response
    {
        $achievement = $this->achievementRepository->find($id);
        if (!$achievement) {
            throw $this->createNotFoundException('Achievement not found.');
        }

        $form = $this->createForm(AchievementType::class, $achievement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', 'Achievement updated!');
            return $this->redirectToRoute('achievement_index');
        }

        return $this->render('achievement/edit.html.twig', [
            'form' => $form->createView(),
            'achievement' => $achievement,
        ]);
    }

    #[Route('/{id}/delete', name: 'achievement_delete', methods: ['POST'])]
    public function delete(int $id, Request $request): Response
    {
        $achievement = $this->achievementRepository->find($id);
        if (!$achievement) {
            throw $this->createNotFoundException('Achievement not found.');
        }

        if ($this->isCsrfTokenValid('delete_achievement' . $id, $request->request->get('_token'))) {
            $this->em->remove($achievement);
            $this->em->flush();
            $this->addFlash('success', 'Achievement deleted!');
        }

        return $this->redirectToRoute('achievement_index');
    }
}
