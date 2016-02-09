<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxDelCommController extends Controller
{
    public function delcomAction(Request $request)
    {
        $comment_id = $request->request->get('id_comm');

        $select_comment = $this->getDoctrine()->getRepository('BlogBundle:Comment')->findOneBy(array('id' => $comment_id));

        $em = $this->getDoctrine()->getManager();
        $em->remove($select_comment);
        $em->flush();

        $response = array('code' => 100, 'success' => true);

        return new Response(json_encode($response));
    }
}