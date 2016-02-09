<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxGetUserController extends Controller
{
    public function usergetAction(Request $request)
    {

        $get_user_name = $request->request->get('user_name');

        $test_1 = $this->getDoctrine()->getRepository('BlogBundle:User')->findOneBy(array('username' => $get_user_name));
        $test_2 = $test_1->getUserComments();

        $comments_content = $this->get('jms_serializer')->serialize($test_2, 'json');

        return new Response($comments_content);

    }
}