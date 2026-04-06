<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Form\ProfileType;
use App\Repository\ProfileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/profile')]
#[IsGranted('ROLE_USER')]
class ProfileController extends AbstractController
{
    /**
     * Voir son propre profil
     */
    #[Route('/', name: 'app_profile_show', methods: ['GET'])]
    public function show(): Response
    {
        /** @var \App\Entity\User $user */
        $user    = $this->getUser();
        $profile = $user->getProfile();

        return $this->render('profile/show.html.twig', [
            'user'    => $user,
            'profile' => $profile,
        ]);
    }

    /**
     * Créer ou modifier son propre profil
     */
    #[Route('/edit', name: 'app_profile_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $em): Response
    {
        /** @var \App\Entity\User $user */
        $user    = $this->getUser();
        $profile = $user->getProfile();

        $isNew = false;
        if (!$profile) {
            $profile = new Profile();
            $profile->setUser($user);
            $isNew = true;
        }

        $form = $this->createForm(ProfileType::class, $profile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($isNew) {
                $em->persist($profile);
            }
            $em->flush();
            $this->addFlash('success', '✅ Profil mis à jour avec succès !');
            return $this->redirectToRoute('app_profile_show');
        }

        return $this->render('profile/edit.html.twig', [
            'form'    => $form,
            'profile' => $profile,
            'isNew'   => $isNew,
        ]);
    }

    /**
     * Admin : liste de tous les profils
     */
    #[Route('/admin/list', name: 'admin_profile_index', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function adminIndex(Request $request, ProfileRepository $profileRepository): Response
    {
        $search   = $request->query->get('search', '');
        $profiles = $search
            ? $profileRepository->searchProfiles($search)
            : $profileRepository->findAllWithUsers();

        return $this->render('profile/admin_index.html.twig', [
            'profiles' => $profiles,
            'search'   => $search,
        ]);
    }

    /**
     * Admin : voir le profil d'un utilisateur
     */
    #[Route('/admin/{id}', name: 'admin_profile_show', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function adminShow(Profile $profile): Response
    {
        return $this->render('profile/admin_show.html.twig', ['profile' => $profile]);
    }

    /**
     * Admin : supprimer un profil
     */
    #[Route('/admin/{id}/delete', name: 'admin_profile_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function adminDelete(Request $request, Profile $profile, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete_profile' . $profile->getId(), $request->getPayload()->getString('_token'))) {
            $em->remove($profile);
            $em->flush();
            $this->addFlash('success', '✅ Profil supprimé avec succès.');
        }
        return $this->redirectToRoute('admin_profile_index');
    }
}
