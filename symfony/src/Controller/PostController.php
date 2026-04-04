<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use App\Service\AIService;
use App\Service\ProfanityService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/posts')]
class PostController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em,
        private PostRepository $postRepository,
        private ProfanityService $profanityService,
        private AIService $aiService
    ) {}

    #[Route('', name: 'post_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $search = $request->query->get('search', '');
        $tag = $request->query->get('tag', '');

        if ($search) {
            $posts = $this->postRepository->searchByTitle($search);
        } elseif ($tag) {
            $posts = $this->postRepository->findByTag($tag);
        } else {
            $posts = $this->postRepository->findBy([], ['id' => 'DESC']);
        }

        $totalPosts = $this->postRepository->count([]);
        $mostLiked = $this->postRepository->findMostLiked();

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
            'totalPosts' => $totalPosts,
            'mostLiked' => $mostLiked,
            'search' => $search,
            'tag' => $tag,
        ]);
    }

    #[Route('/new', name: 'post_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $post = new Post();
        $post->setUserId(1); // default user
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post->setContent($this->profanityService->censor($post->getContent()));
            $post->setTitle($this->profanityService->censor($post->getTitle()));

            $this->em->persist($post);
            $this->em->flush();

            $this->addFlash('success', 'Post created successfully!');
            return $this->redirectToRoute('post_index');
        }

        return $this->render('post/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'post_show', methods: ['GET'])]
    public function show(int $id): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            throw $this->createNotFoundException('Post not found.');
        }

        $comments = $this->em->getRepository(\App\Entity\Comment::class)->findByPostId($id);

        $commentEntity = new \App\Entity\Comment();
        $commentForm = $this->createForm(\App\Form\CommentType::class, $commentEntity, [
            'action' => $this->generateUrl('comment_new', ['postId' => $id]),
            'method' => 'POST',
        ]);

        return $this->render('post/show.html.twig', [
            'post' => $post,
            'comments' => $comments,
            'commentForm' => $commentForm->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'post_edit', methods: ['GET', 'POST'])]
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
            return $this->redirectToRoute('post_show', ['id' => $id]);
        }

        return $this->render('post/edit.html.twig', [
            'form' => $form->createView(),
            'post' => $post,
        ]);
    }

    #[Route('/{id}/delete', name: 'post_delete', methods: ['POST'])]
    public function delete(int $id, Request $request): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            throw $this->createNotFoundException('Post not found.');
        }

        if ($this->isCsrfTokenValid('delete' . $id, $request->request->get('_token'))) {
            // Remove associated comments
            $comments = $this->em->getRepository(\App\Entity\Comment::class)->findByPostId($id);
            foreach ($comments as $comment) {
                $this->em->remove($comment);
            }
            $this->em->remove($post);
            $this->em->flush();
            $this->addFlash('success', 'Post deleted successfully!');
        }

        return $this->redirectToRoute('post_index');
    }

    #[Route('/{id}/react', name: 'post_react', methods: ['POST'])]
    public function react(int $id, Request $request): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            throw $this->createNotFoundException('Post not found.');
        }

        $type = $request->request->get('type');
        if ($type === 'like') {
            $post->setLikes($post->getLikes() + 1);
        } elseif ($type === 'dislike') {
            $post->setDislikes($post->getDislikes() + 1);
        }

        $this->em->flush();

        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(['likes' => $post->getLikes(), 'dislikes' => $post->getDislikes()]);
        }

        return $this->redirectToRoute('post_show', ['id' => $id]);
    }

    #[Route('/{id}/summarize', name: 'post_summarize', methods: ['POST'])]
    public function summarize(int $id): JsonResponse
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            return new JsonResponse(['error' => 'Post not found'], 404);
        }

        $summary = $this->aiService->summarize($post->getContent());
        return new JsonResponse(['summary' => $summary]);
    }

    #[Route('/{id}/translate', name: 'post_translate', methods: ['POST'])]
    public function translate(int $id, Request $request): JsonResponse
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            return new JsonResponse(['error' => 'Post not found'], 404);
        }

        $targetLang = $request->request->get('lang', 'fr');
        $translated = $this->aiService->translate($post->getContent(), $targetLang);
        return new JsonResponse(['translation' => $translated]);
    }
}
