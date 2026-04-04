<?php

namespace App\Controller\BackOffice;

use App\Entity\Comment;
use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use App\Service\ProfanityService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/posts')]
class PostController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em,
        private PostRepository $postRepository,
        private ProfanityService $profanityService
    ) {}

    #[Route('', name: 'back_post_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('back/post/index.html.twig', [
            'posts' => $this->postRepository->findBy([], ['id' => 'DESC']),
        ]);
    }

    #[Route('/new', name: 'back_post_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $post = new Post();
        $post->setUserId(1);
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post->setContent($this->profanityService->censor($post->getContent()));
            $post->setTitle($this->profanityService->censor($post->getTitle()));
            $this->em->persist($post);
            $this->em->flush();
            $this->addFlash('success', 'Post created successfully!');
            return $this->redirectToRoute('back_post_index');
        }

        return $this->render('back/post/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'back_post_edit', methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            throw $this->createNotFoundException('Post not found.');
        }

        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post->setContent($this->profanityService->censor($post->getContent()));
            $post->setTitle($this->profanityService->censor($post->getTitle()));
            $this->em->flush();
            $this->addFlash('success', 'Post updated successfully!');
            return $this->redirectToRoute('back_post_index');
        }

        return $this->render('back/post/edit.html.twig', [
            'form' => $form->createView(),
            'post' => $post,
        ]);
    }

    #[Route('/{id}/delete', name: 'back_post_delete', methods: ['POST'])]
    public function delete(int $id, Request $request): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            throw $this->createNotFoundException('Post not found.');
        }

        if ($this->isCsrfTokenValid('delete' . $id, $request->request->get('_token'))) {
            $comments = $this->em->getRepository(Comment::class)->findByPostId($id);
            foreach ($comments as $comment) {
                $this->em->remove($comment);
            }
            $this->em->remove($post);
            $this->em->flush();
            $this->addFlash('success', 'Post deleted successfully!');
        }

        return $this->redirectToRoute('back_post_index');
    }
}
