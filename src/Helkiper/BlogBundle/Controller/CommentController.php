<?php

namespace Helkiper\BlogBundle\Controller;

use Helkiper\BlogBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comment controller.
 *
 */
class CommentController extends Controller
{
    /**
     * Lists all comment entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comments = $em->getRepository('HelkiperBlogBundle:Comment')->findAll();

        return $this->render('comment/index.html.twig', array(
            'comments' => $comments,
        ));
    }

    /**
     * Creates a new comment entity.
     *
     */
    public function newAction(Request $request)
    {
        $comment = new Comment();
        $form = $this->createForm('Helkiper\BlogBundle\Form\CommentType', $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('comment_show', array('id' => $comment->getId()));
        }

        return $this->render('comment/new.html.twig', array(
            'comment' => $comment,
            'form' => $form->createView(),
        ));
    }

}
