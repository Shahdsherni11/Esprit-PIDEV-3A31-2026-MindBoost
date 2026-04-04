<?php

namespace App\Controller\FrontOffice;

use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\PostRepository;
use App\Service\AIService;
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
        private AIService $aiService
    ) {}

    #[Route('', name: 'front_post_index', methods: ['GET'])]
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

        return $this->render('front/post/index.html.twig', [
            'posts' => $posts,
            'totalPosts' => $totalPosts,
            'mostLiked' => $mostLiked,
            'search' => $search,
            'tag' => $tag,
        ]);
    }

    #[Route('/{id}', name: 'front_post_show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(int $id): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            throw $this->createNotFoundException('Post not found.');
        }

        $comments = $this->em->getRepository(Comment::class)->findByPostId($id);

        $commentEntity = new Comment();
        $commentForm = $this->createForm(CommentType::class, $commentEntity, [
            'action' => $this->generateUrl('front_comment_new', ['postId' => $id]),
            'method' => 'POST',
        ]);

        return $this->render('front/post/show.html.twig', [
            'post' => $post,
            'comments' => $comments,
            'commentForm' => $commentForm->createView(),
        ]);
    }

    #[Route('/{id}/react', name: 'front_post_react', methods: ['POST'])]
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

        return $this->redirectToRoute('front_post_show', ['id' => $id]);
    }

    #[Route('/{id}/summarize', name: 'front_post_summarize', methods: ['POST'])]
    public function summarize(int $id): JsonResponse
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            return new JsonResponse(['error' => 'Post not found'], 404);
        }

        $summary = $this->aiService->summarize($post->getContent());
        return new JsonResponse(['summary' => $summary]);
    }

    #[Route('/{id}/translate', name: 'front_post_translate', methods: ['POST'])]
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
