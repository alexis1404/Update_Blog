<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StartController extends Controller
{
    public function indexAction()
    {
        $posts = $this->getDoctrine()->getRepository('BlogBundle:Post')->findAll();

        if(!$posts)
        {
            throw $this->createNotFoundException(
                'Post not found!');
        }

        return $this->render('BlogBundle:Page_templates:index.html.twig', array('allpost' => $posts));
    }
}