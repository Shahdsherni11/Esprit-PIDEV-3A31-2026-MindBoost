<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/users')]
#[IsGranted('ROLE_ADMIN')]
class UserController extends AbstractController
{
    #[Route('/', name: 'admin_user_index', methods: ['GET'])]
    public function index(Request $request, UserRepository $userRepository): Response
    {
        $search   = $request->query->get('search', '');
        $role     = $request->query->get('role', 'all');
        $verified = $request->query->get('verified', 'all');

        $verifiedFilter = null;
        if ($verified === '1') $verifiedFilter = true;
        if ($verified === '0') $verifiedFilter = false;

        $users = $userRepository->findFiltered(
            $role !== 'all' ? $role : null,
            $verifiedFilter,
            $search !== '' ? $search : null
        );

        $stats = $userRepository->getStats();

        return $this->render('user/index.html.twig', [
            'users'    => $users,
            'stats'    => $stats,
            'search'   => $search,
            'role'     => $role,
            'verified' => $verified,
        ]);
    }

    #[Route('/new', name: 'admin_user_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher,
        UserRepository $userRepository
    ): Response {
        $user = new User();
        $form = $this->createForm(UserType::class, $user, ['is_edit' => false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($userRepository->findOneBy(['email' => $user->getEmail()])) {
                $this->addFlash('error', 'Cet email est déjà utilisé.');
            } else {
                $plain = $form->get('plainPassword')->getData();
                $user->setPassword($passwordHasher->hashPassword($user, $plain));
                $em->persist($user);
                $em->flush();
                $this->addFlash('success', '✅ Utilisateur créé avec succès !');
                return $this->redirectToRoute('admin_user_index');
            }
        }

        return $this->render('user/new.html.twig', ['user' => $user, 'form' => $form]);
    }

    #[Route('/{id}', name: 'admin_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', ['user' => $user]);
    }

    #[Route('/{id}/edit', name: 'admin_user_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        User $user,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher,
        UserRepository $userRepository
    ): Response {
        $form = $this->createForm(UserType::class, $user, ['is_edit' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Vérifier doublon email
            $existing = $userRepository->findOneBy(['email' => $user->getEmail()]);
            if ($existing && $existing->getId() !== $user->getId()) {
                $this->addFlash('error', 'Cet email est déjà utilisé par un autre compte.');
            } else {
                $plain = $form->get('plainPassword')->getData();
                if ($plain) {
                    $user->setPassword($passwordHasher->hashPassword($user, $plain));
                }
                $em->flush();
                $this->addFlash('success', '✅ Utilisateur modifié avec succès !');
                return $this->redirectToRoute('admin_user_index');
            }
        }

        return $this->render('user/edit.html.twig', ['user' => $user, 'form' => $form]);
    }

    #[Route('/{id}/toggle', name: 'admin_user_toggle', methods: ['POST'])]
    public function toggleVerified(Request $request, User $user, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('toggle' . $user->getId(), $request->getPayload()->getString('_token'))) {
            $user->setIsVerified(!$user->isVerified());
            $em->flush();
            $status = $user->isVerified() ? 'activé' : 'désactivé';
            $this->addFlash('success', "✅ Compte {$status} avec succès.");
        }
        return $this->redirectToRoute('admin_user_index');
    }

    #[Route('/{id}', name: 'admin_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->getPayload()->getString('_token'))) {
            // Empêcher l'admin de se supprimer lui-même
            if ($user === $this->getUser()) {
                $this->addFlash('error', '❌ Vous ne pouvez pas supprimer votre propre compte.');
                return $this->redirectToRoute('admin_user_index');
            }
            $em->remove($user);
            $em->flush();
            $this->addFlash('success', '✅ Utilisateur supprimé avec succès.');
        }
        return $this->redirectToRoute('admin_user_index');
    }
}
