<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Entity\User;
use App\Form\ProfileFormType;
use App\Form\UserAdminFormType;
use App\Repository\GeneralTestRepository;
use App\Repository\ProfileRepository;
use App\Repository\TacheFocusRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    // ── DASHBOARD ────────────────────────────────────────────
    #[Route('', name: 'app_admin_dashboard')]
    public function dashboard(
        UserRepository $userRepo,
        TacheFocusRepository $tacheRepo,
        GeneralTestRepository $testRepo,
        ProfileRepository $profileRepo
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('admin/dashboard.html.twig', [
            'userStats'       => $userRepo->getStats(),
            'testStats'       => $testRepo->countByStatus(),
            'recentUsers'     => $userRepo->findAllWithProfile(),
            'personalityStats'=> $profileRepo->countByPersonalityType(),
        ]);
    }

    // ── USERS : liste ────────────────────────────────────────
    #[Route('/users', name: 'app_admin_user_list')]
    public function userList(Request $request, UserRepository $repo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $keyword = $request->query->get('q', '');
        $role    = $request->query->get('role', '');

        if ($keyword) {
            $users = $repo->searchByKeyword($keyword);
        } elseif ($role) {
            $users = $repo->findByRole($role);
        } else {
            $users = $repo->findAllWithProfile();
        }

        return $this->render('admin/user_list.html.twig', [
            'users'   => $users,
            'keyword' => $keyword,
            'role'    => $role,
            'total'   => count($users),
        ]);
    }

    // ── USERS : créer ────────────────────────────────────────
    #[Route('/users/new', name: 'app_admin_user_new')]
    public function userNew(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $hasher
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $user = new User();
        $form = $this->createForm(UserAdminFormType::class, $user, ['is_edit' => false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($hasher->hashPassword($user, $form->get('plainPassword')->getData()));
            $profile = new Profile();
            $profile->setFirstName('Nouveau');
            $profile->setLastName('Membre');
            $user->setProfile($profile);
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', '✅ Utilisateur créé.');
            return $this->redirectToRoute('app_admin_user_list');
        }

        return $this->render('admin/user_form.html.twig', ['form' => $form, 'user' => $user, 'isNew' => true]);
    }

    // ── USERS : modifier ─────────────────────────────────────
    #[Route('/users/{id}/edit', name: 'app_admin_user_edit')]
    public function userEdit(User $user, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(UserAdminFormType::class, $user, ['is_edit' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', '✅ Utilisateur modifié.');
            return $this->redirectToRoute('app_admin_user_list');
        }

        return $this->render('admin/user_form.html.twig', ['form' => $form, 'user' => $user, 'isNew' => false]);
    }

    // ── USERS : supprimer ────────────────────────────────────
    #[Route('/users/{id}/delete', name: 'app_admin_user_delete', methods: ['POST'])]
    public function userDelete(User $user, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if ($this->isCsrfTokenValid('delete_user_' . $user->getId(), $request->request->get('_token'))) {
            $em->remove($user);
            $em->flush();
            $this->addFlash('success', '🗑 Utilisateur supprimé.');
        }
        return $this->redirectToRoute('app_admin_user_list');
    }

    // ── USERS : détail ───────────────────────────────────────
    #[Route('/users/{id}', name: 'app_admin_user_show')]
    public function userShow(User $user): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/user_show.html.twig', ['user' => $user]);
    }

    // ── PROFILES : liste ─────────────────────────────────────
    #[Route('/profiles', name: 'app_admin_profile_list')]
    public function profileList(Request $request, ProfileRepository $repo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $keyword = $request->query->get('q', '');
        $type    = $request->query->get('type', '');

        if ($keyword) {
            $profiles = $repo->searchByKeyword($keyword);
        } elseif ($type) {
            $profiles = $repo->filterByPersonalityType($type);
        } else {
            $profiles = $repo->findAllWithUser();
        }

        return $this->render('admin/profile_list.html.twig', [
            'profiles'         => $profiles,
            'keyword'          => $keyword,
            'selectedType'     => $type,
            'personalityTypes' => ['ANALYTIQUE', 'LEADER', 'SOCIAL', 'CREATIF', 'EMPATHIQUE'],
            'total'            => count($profiles),
        ]);
    }

    // ── PROFILES : modifier ──────────────────────────────────
    #[Route('/profiles/{id}/edit', name: 'app_admin_profile_edit')]
    public function profileEdit(Profile $profile, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(ProfileFormType::class, $profile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', '✅ Profil modifié.');
            return $this->redirectToRoute('app_admin_profile_list');
        }

        return $this->render('admin/profile_form.html.twig', ['form' => $form, 'profile' => $profile]);
    }

    // ── PROFILES : supprimer ─────────────────────────────────
    #[Route('/profiles/{id}/delete', name: 'app_admin_profile_delete', methods: ['POST'])]
    public function profileDelete(Profile $profile, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if ($this->isCsrfTokenValid('delete_profile_' . $profile->getId(), $request->request->get('_token'))) {
            $em->remove($profile);
            $em->flush();
            $this->addFlash('success', '🗑 Profil supprimé.');
        }
        return $this->redirectToRoute('app_admin_profile_list');
    }
}
