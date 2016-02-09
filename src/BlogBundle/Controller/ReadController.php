<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Entity\Post;
use BlogBundle\Entity\Comment;

class ReadController extends Controller
{
    public function readAction(Post $post, Request $request)
    {

        $read_post = $this->getDoctrine()->getRepository('BlogBundle:Post')->find($post);

        $comment = new Comment();
        $comment->setDateComment(new \DateTime('tomorrow'));
        $actual_user_name = $this->get('security.token_storage')->getToken()->getUsername();
        $comment->setAuthorComment($actual_user_name);
        $user_implement = $this->getDoctrine()->getRepository('BlogBundle:User')->findOneBy(array('username' => $actual_user_name));
        $comment->setInPost($post);
        $comment->setUser($user_implement);

        $form_comment = $this->createFormBuilder($comment)
            ->add('textComment', 'textarea', array('label' => 'Your comment', 'attr' => array('rows' => 20, 'cols' => 88,)))
            ->getForm();

        $form_comment->handleRequest($request);

        if($form_comment->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

           return $this->redirect($this->generateUrl('read_post', array('post' => $post->getId())));
        }

        $comments = $read_post->getComments();

        return $this->render('@Blog/Page_templates/read.html.twig', array('read_post' => $read_post,
            'form_for_comment' => $form_comment->createView(), 'comments' => $comments,
            'username' => $actual_user_name));
    }
}