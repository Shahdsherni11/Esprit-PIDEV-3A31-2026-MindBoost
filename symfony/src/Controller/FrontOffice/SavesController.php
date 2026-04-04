<?php

namespace App\Controller\FrontOffice;

use App\Repository\SavesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/saves')]
class SavesController extends AbstractController
{
    public function __construct(
        private SavesRepository $savesRepository
    ) {}

    #[Route('', name: 'front_saves_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('front/saves/index.html.twig', [
            'saves' => $this->savesRepository->findAll(),
        ]);
    }
}
