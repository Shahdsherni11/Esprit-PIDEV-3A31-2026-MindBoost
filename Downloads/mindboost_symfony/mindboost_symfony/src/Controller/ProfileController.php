<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Form\ProfileFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/profile')]
class ProfileController extends AbstractController
{
    #[Route('', name: 'app_profile_show')]
    public function show(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('profile/show.html.twig', [
            'user'    => $this->getUser(),
            'profile' => $this->getUser()->getProfile(),
        ]);
    }

    #[Route('/edit', name: 'app_profile_edit')]
    public function edit(Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $user    = $this->getUser();
        $profile = $user->getProfile();

        if (!$profile) {
            $profile = new Profile();
            $profile->setUser($user);
            $user->setProfile($profile);
        }

        $form = $this->createForm(ProfileFormType::class, $profile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($profile);
            $em->flush();
            $this->addFlash('success', '✅ Profil mis à jour avec succès !');
            return $this->redirectToRoute('app_profile_show');
        }

        return $this->render('profile/edit.html.twig', [
            'form'    => $form,
            'profile' => $profile,
        ]);
    }
}
