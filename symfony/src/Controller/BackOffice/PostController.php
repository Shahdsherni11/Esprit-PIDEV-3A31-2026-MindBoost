<?php

namespace App\Controller\BackOffice;

use App\Entity\Comment;
use App\Entity\Post;
use App\Form\PostType;
use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use App\Repository\SavesRepository;
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
        private CommentRepository $commentRepository,
        private SavesRepository $savesRepository,
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

    #[Route('/{id}/stats', name: 'back_post_stats', methods: ['GET'])]
    public function stats(int $id): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            throw $this->createNotFoundException('Post not found.');
        }

        $comments       = $this->commentRepository->findByPostId($id);
        $commentCount   = $this->commentRepository->countByPostId($id);
        $commentLikes   = $this->commentRepository->sumLikesByPostId($id);
        $commentDislikes = $this->commentRepository->sumDislikesByPostId($id);
        $savesCount     = $this->savesRepository->countByPostId($id);
        $commentsPerUser = $this->commentRepository->commentsPerUserByPostId($id);

        // Per-comment engagement for line chart (id → likes)
        $commentEngagement = [];
        foreach ($comments as $c) {
            $commentEngagement[] = [
                'label' => '#' . $c->getId(),
                'likes' => $c->getLikes(),
                'dislikes' => $c->getDislikes(),
            ];
        }

        // Engagement rate: (likes + helpMeter) / max(1, likes + dislikes + helpMeter) * 100
        $totalInteractions = $post->getLikes() + $post->getDislikes() + $post->getHelpMeter();
        $engagementRate = $totalInteractions > 0
            ? round(($post->getLikes() + $post->getHelpMeter()) / $totalInteractions * 100, 1)
            : 0;

        $likeRate    = $totalInteractions > 0 ? round($post->getLikes() / $totalInteractions * 100, 1) : 0;
        $dislikeRate = $totalInteractions > 0 ? round($post->getDislikes() / $totalInteractions * 100, 1) : 0;
        $helpRate    = $totalInteractions > 0 ? round($post->getHelpMeter() / $totalInteractions * 100, 1) : 0;

        $commentPositiveRate = ($commentLikes + $commentDislikes) > 0
            ? round($commentLikes / ($commentLikes + $commentDislikes) * 100, 1)
            : 0;

        return $this->render('back/post/stats.html.twig', [
            'post'               => $post,
            'commentCount'       => $commentCount,
            'commentLikes'       => $commentLikes,
            'commentDislikes'    => $commentDislikes,
            'savesCount'         => $savesCount,
            'commentsPerUser'    => $commentsPerUser,
            'commentEngagement'  => $commentEngagement,
            'engagementRate'     => $engagementRate,
            'likeRate'           => $likeRate,
            'dislikeRate'        => $dislikeRate,
            'helpRate'           => $helpRate,
            'commentPositiveRate' => $commentPositiveRate,
            'totalInteractions'  => $totalInteractions,
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
