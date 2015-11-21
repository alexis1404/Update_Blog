<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlogBundle\Entity\Post;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function adminAction(Request $request)
    {
        $post = new Post();
        $post->setPostDate(new \DateTime('tomorrow'));

        $form_post = $this->createFormBuilder($post)
            ->add('postName', 'text', array('label' => 'Name post'))
            ->add('postText', 'textarea', array('attr' => array('rows' => 20, 'cols' => 88)))
            ->add('save', 'submit', array('label' => 'Создать новый пост'))
            ->getForm();

        $form_post->handleRequest($request);

        if($form_post->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('admin_page');
        }

        return $this->render('@Blog/Page_templates/admin.html.twig', array('form_create_post' => $form_post->createView()));
    }
}