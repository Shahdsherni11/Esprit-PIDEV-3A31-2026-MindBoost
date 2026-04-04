<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use App\Service\ProfanityService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/posts/{postId}/comments')]
class CommentController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em,
        private CommentRepository $commentRepository,
        private ProfanityService $profanityService
    ) {}

    #[Route('/new', name: 'comment_new', methods: ['POST'])]
    public function new(int $postId, Request $request): Response
    {
        $comment = new Comment();
        $comment->setPostId($postId);
        $comment->setUserId(1); // default user

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setComment($this->profanityService->censor($comment->getComment()));
            $this->em->persist($comment);
            $this->em->flush();
            $this->addFlash('success', 'Comment added!');
        }

        return $this->redirectToRoute('post_show', ['id' => $postId]);
    }

    #[Route('/{id}/edit', name: 'comment_edit', methods: ['GET', 'POST'])]
    public function edit(int $postId, int $id, Request $request): Response
    {
        $comment = $this->commentRepository->find($id);
        if (!$comment) {
            throw $this->createNotFoundException('Comment not found.');
        }

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setComment($this->profanityService->censor($comment->getComment()));
            $this->em->flush();
            $this->addFlash('success', 'Comment updated!');
            return $this->redirectToRoute('post_show', ['id' => $postId]);
        }

        return $this->render('comment/edit.html.twig', [
            'form' => $form->createView(),
            'comment' => $comment,
            'postId' => $postId,
        ]);
    }

    #[Route('/{id}/delete', name: 'comment_delete', methods: ['POST'])]
    public function delete(int $postId, int $id, Request $request): Response
    {
        $comment = $this->commentRepository->find($id);
        if (!$comment) {
            throw $this->createNotFoundException('Comment not found.');
        }

        if ($this->isCsrfTokenValid('delete_comment' . $id, $request->request->get('_token'))) {
            $this->em->remove($comment);
            $this->em->flush();
            $this->addFlash('success', 'Comment deleted!');
        }

        return $this->redirectToRoute('post_show', ['id' => $postId]);
    }
}
