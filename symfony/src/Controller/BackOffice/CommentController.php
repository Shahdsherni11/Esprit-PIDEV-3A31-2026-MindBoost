<?php

namespace App\Controller\BackOffice;

use App\Form\CommentType;
use App\Repository\CommentRepository;
use App\Service\ProfanityService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/posts/{postId}/comments')]
class CommentController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em,
        private CommentRepository $commentRepository,
        private ProfanityService $profanityService
    ) {}

    #[Route('/{id}/edit', name: 'back_comment_edit', methods: ['GET', 'POST'])]
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
            return $this->redirectToRoute('front_post_show', ['id' => $postId]);
        }

        return $this->render('back/comment/edit.html.twig', [
            'form' => $form->createView(),
            'comment' => $comment,
            'postId' => $postId,
        ]);
    }

    #[Route('/{id}/delete', name: 'back_comment_delete', methods: ['POST'])]
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

        return $this->redirectToRoute('front_post_show', ['id' => $postId]);
    }
}
