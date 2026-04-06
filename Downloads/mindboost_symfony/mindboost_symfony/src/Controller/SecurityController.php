<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\TacheFocusRepository;
use App\Repository\GeneralTestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_dashboard');
        }
        return $this->redirectToRoute('app_login');
    }

    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_dashboard');
        }
        return $this->render('security/login.html.twig', [
            'last_username' => $authUtils->getLastUsername(),
            'error'         => $authUtils->getLastAuthenticationError(),
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('Handled by Symfony Security.');
    }

    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $hasher,
        EntityManagerInterface $em
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_dashboard');
        }

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($hasher->hashPassword($user, $form->get('plainPassword')->getData()));
            $user->setRole('user');

            $profile = new Profile();
            $profile->setFirstName('Nouveau');
            $profile->setLastName('Membre');
            $user->setProfile($profile);

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', '✅ Inscription réussie ! Complétez votre profil.');
            return $this->redirectToRoute('app_profile_edit');
        }

        return $this->render('security/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(
        TacheFocusRepository $tacheRepo,
        GeneralTestRepository $testRepo
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $user = $this->getUser();

        if ($user->isAdmin()) {
            return $this->redirectToRoute('app_admin_dashboard');
        }

        $stats  = $tacheRepo->getStatsForUser($user->getId());
        $taches = $tacheRepo->findByUser($user->getId());
        $tests  = $testRepo->findActive();

        return $this->render('security/dashboard.html.twig', [
            'user'       => $user,
            'tacheStats' => $stats,
            'taches'     => array_slice($taches, 0, 5),
            'tests'      => $tests,
        ]);
    }
}
