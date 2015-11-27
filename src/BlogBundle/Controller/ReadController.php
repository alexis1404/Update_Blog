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

        return $this->render('@Blog/Page_templates/read.html.twig', array('read_post' => $read_post));
    }
}