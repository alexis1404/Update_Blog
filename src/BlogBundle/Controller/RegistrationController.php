<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlogBundle\Form\UserType;
use BlogBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller
{
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();


            //any work --- temporarily blank)

            return $this->redirectToRoute('login_route');
        }

        return $this->render('@Blog/Page_templates/register.html.twig', array('form' => $form->createView()));
    }
}