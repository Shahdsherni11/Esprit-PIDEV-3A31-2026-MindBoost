<?php

namespace App\Controller\BackOffice;

use App\Entity\Saves;
use App\Form\SavesType;
use App\Repository\SavesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/saves')]
class SavesController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em,
        private SavesRepository $savesRepository
    ) {}

    #[Route('', name: 'back_saves_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('back/saves/index.html.twig', [
            'saves' => $this->savesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'back_saves_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $save = new Saves();
        $form = $this->createForm(SavesType::class, $save);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($save);
            $this->em->flush();
            $this->addFlash('success', 'Post saved!');
            return $this->redirectToRoute('back_saves_index');
        }

        return $this->render('back/saves/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'back_saves_edit', methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request): Response
    {
        $save = $this->savesRepository->find($id);
        if (!$save) {
            throw $this->createNotFoundException('Save not found.');
        }

        $form = $this->createForm(SavesType::class, $save);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', 'Save updated!');
            return $this->redirectToRoute('back_saves_index');
        }

        return $this->render('back/saves/edit.html.twig', [
            'form' => $form->createView(),
            'save' => $save,
        ]);
    }

    #[Route('/{id}/delete', name: 'back_saves_delete', methods: ['POST'])]
    public function delete(int $id, Request $request): Response
    {
        $save = $this->savesRepository->find($id);
        if (!$save) {
            throw $this->createNotFoundException('Save not found.');
        }

        if ($this->isCsrfTokenValid('delete_save' . $id, $request->request->get('_token'))) {
            $this->em->remove($save);
            $this->em->flush();
            $this->addFlash('success', 'Save deleted!');
        }

        return $this->redirectToRoute('back_saves_index');
    }
}
