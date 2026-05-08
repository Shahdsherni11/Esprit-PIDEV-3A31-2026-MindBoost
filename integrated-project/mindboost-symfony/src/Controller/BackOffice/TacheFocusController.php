<?php

namespace App\Controller\BackOffice;

use App\Repository\TacheFocusRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/taches')]
class TacheFocusController extends AbstractController
{
    #[Route('', name: 'back_tache_focus_index', methods: ['GET'])]
    public function index(
        Request $request,
        TacheFocusRepository $tacheFocusRepository,
        PaginatorInterface $paginator
    ): Response {
        $search = $request->query->get('search', '');
        $statut = $request->query->get('statut', '');
        $tri = $request->query->get('tri', 'id');
        $ordre = $request->query->get('ordre', 'ASC');

        $query = $tacheFocusRepository->findBySearchAndFilter($search, $statut, $tri, $ordre);

        $taches = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('back/tache_focus/index.html.twig', [
            'tache_foci' => $taches,
            'search' => $search,
            'statut' => $statut,
            'tri' => $tri,
            'ordre' => $ordre,
        ]);
    }
}
