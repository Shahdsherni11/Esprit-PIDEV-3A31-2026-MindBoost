<?php

namespace App\Controller\FrontOffice;

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

    #[Route('/new', name: 'front_comment_new', methods: ['POST'])]
    public function new(int $postId, Request $request): Response
    {
        $comment = new Comment();
        $comment->setPostId($postId);
        $comment->setUserId(1);

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setComment($this->profanityService->censor($comment->getComment()));
            $this->em->persist($comment);
            $this->em->flush();
            $this->addFlash('success', 'Comment added!');
        }

        return $this->redirectToRoute('front_post_show', ['id' => $postId]);
    }
}
