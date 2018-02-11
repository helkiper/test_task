<?php

namespace Helkiper\BlogBundle\Controller;

use Helkiper\BlogBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

        return $this->render('comment_list.html.twig', array(
            'comments' => $comments,
        ));
    }

    /**
     * Creates a new comment entity.
     *
     */
    public function newAction(Request $request)
    {
	    $content = '';

	    $comment = new Comment();
	    $form = $this->createForm('Helkiper\BlogBundle\Form\CommentType', $comment);
	    $form->handleRequest($request);

	    if ($form->isSubmitted() && $form->isValid()) {
		    $em = $this->getDoctrine()->getManager();
		    $em->persist($comment);
		    $em->flush();

		    $content = $this->renderView('comment/single_comment.html.twig', array('comment' => $comment));
	    }

	    if($request->isXmlHttpRequest()) {
			return $this->json(array('content' => $content));
	    }
        else {
	        if ($comment->getCategory()) {
		        return $this->redirectToRoute('category_show', array('id' => $comment->getCategory()->getId()));
	        } elseif ($comment->getPost()) {
		        return $this->redirectToRoute('post_show', array('id' => $comment->getPost()->getId()));
	        } else {
		        throw new NotFoundHttpException();
	        }
        }
    }

}
