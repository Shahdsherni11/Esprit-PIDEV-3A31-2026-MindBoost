<?php

namespace App\Controller;

use App\Entity\SousTache;
use App\Entity\TacheFocus;
use App\Form\SousTacheFormType;
use App\Form\TacheFocusFormType;
use App\Repository\TacheFocusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/taches')]
class TacheFocusController extends AbstractController
{
    // ── LISTE ────────────────────────────────────────────────
    #[Route('', name: 'app_tache_list')]
    public function list(Request $request, TacheFocusRepository $repo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $user    = $this->getUser();
        $keyword = $request->query->get('q', '');
        $statut  = $request->query->get('statut', '');

        if ($keyword) {
            $taches = $repo->searchByKeyword($user->getId(), $keyword);
        } elseif ($statut) {
            $taches = $repo->findByUserAndStatut($user->getId(), $statut);
        } else {
            $taches = $repo->findByUser($user->getId());
        }

        return $this->render('tache/list.html.twig', [
            'taches'  => $taches,
            'keyword' => $keyword,
            'statut'  => $statut,
            'stats'   => $repo->getStatsForUser($user->getId()),
            'statuts' => TacheFocus::STATUTS,
        ]);
    }

    // ── DÉTAIL ───────────────────────────────────────────────
    #[Route('/{id}', name: 'app_tache_show', requirements: ['id' => '\d+'])]
    public function show(TacheFocus $tache): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $this->checkOwner($tache);

        return $this->render('tache/show.html.twig', ['tache' => $tache]);
    }

    // ── CRÉER ────────────────────────────────────────────────
    #[Route('/new', name: 'app_tache_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $tache = new TacheFocus();
        $tache->setIdUser($this->getUser()->getId());

        $form = $this->createForm(TacheFocusFormType::class, $tache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($tache);
            $em->flush();
            $this->addFlash('success', '✅ Tâche créée avec succès !');
            return $this->redirectToRoute('app_tache_show', ['id' => $tache->getId()]);
        }

        return $this->render('tache/form.html.twig', [
            'form'  => $form,
            'tache' => $tache,
            'isNew' => true,
        ]);
    }

    // ── MODIFIER ─────────────────────────────────────────────
    #[Route('/{id}/edit', name: 'app_tache_edit', requirements: ['id' => '\d+'])]
    public function edit(TacheFocus $tache, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $this->checkOwner($tache);

        $form = $this->createForm(TacheFocusFormType::class, $tache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', '✅ Tâche mise à jour.');
            return $this->redirectToRoute('app_tache_show', ['id' => $tache->getId()]);
        }

        return $this->render('tache/form.html.twig', [
            'form'  => $form,
            'tache' => $tache,
            'isNew' => false,
        ]);
    }

    // ── SUPPRIMER ─────────────────────────────────────────────
    #[Route('/{id}/delete', name: 'app_tache_delete', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function delete(TacheFocus $tache, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $this->checkOwner($tache);

        if ($this->isCsrfTokenValid('delete_tache_' . $tache->getId(), $request->request->get('_token'))) {
            $em->remove($tache);
            $em->flush();
            $this->addFlash('success', '🗑 Tâche supprimée.');
        }

        return $this->redirectToRoute('app_tache_list');
    }

    // ── AJOUTER SOUS-TÂCHE ───────────────────────────────────
    #[Route('/{id}/sous-tache/new', name: 'app_sous_tache_new', requirements: ['id' => '\d+'])]
    public function newSousTache(TacheFocus $tache, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $this->checkOwner($tache);

        $sousTache = new SousTache();
        $sousTache->setTacheFocus($tache);

        $form = $this->createForm(SousTacheFormType::class, $sousTache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($sousTache);
            $em->flush();
            $this->addFlash('success', '✅ Sous-tâche ajoutée !');
            return $this->redirectToRoute('app_tache_show', ['id' => $tache->getId()]);
        }

        return $this->render('tache/sous_tache_form.html.twig', [
            'form'      => $form,
            'tache'     => $tache,
            'sousTache' => $sousTache,
            'isNew'     => true,
        ]);
    }

    // ── MODIFIER SOUS-TÂCHE ──────────────────────────────────
    #[Route('/sous-tache/{id}/edit', name: 'app_sous_tache_edit', requirements: ['id' => '\d+'])]
    public function editSousTache(SousTache $sousTache, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $this->checkOwner($sousTache->getTacheFocus());

        $form = $this->createForm(SousTacheFormType::class, $sousTache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', '✅ Sous-tâche mise à jour.');
            return $this->redirectToRoute('app_tache_show', ['id' => $sousTache->getTacheFocus()->getId()]);
        }

        return $this->render('tache/sous_tache_form.html.twig', [
            'form'      => $form,
            'tache'     => $sousTache->getTacheFocus(),
            'sousTache' => $sousTache,
            'isNew'     => false,
        ]);
    }

    // ── SUPPRIMER SOUS-TÂCHE ─────────────────────────────────
    #[Route('/sous-tache/{id}/delete', name: 'app_sous_tache_delete', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function deleteSousTache(SousTache $sousTache, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $this->checkOwner($sousTache->getTacheFocus());
        $tacheId = $sousTache->getTacheFocus()->getId();

        if ($this->isCsrfTokenValid('delete_st_' . $sousTache->getId(), $request->request->get('_token'))) {
            $em->remove($sousTache);
            $em->flush();
            $this->addFlash('success', '🗑 Sous-tâche supprimée.');
        }

        return $this->redirectToRoute('app_tache_show', ['id' => $tacheId]);
    }

    // ── HELPER ───────────────────────────────────────────────
    private function checkOwner(TacheFocus $tache): void
    {
        if ($tache->getIdUser() !== $this->getUser()->getId() && !$this->getUser()->isAdmin()) {
            throw $this->createAccessDeniedException("Vous n'êtes pas propriétaire de cette tâche.");
        }
    }
}
