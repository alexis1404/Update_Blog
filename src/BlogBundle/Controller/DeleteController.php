<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlogBundle\Entity\Comment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DeleteController extends Controller
{
    /**
     * @Secure(roles="ROLE_ADMIN")
     */

    public function deleteAction(Comment $comment)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($comment);
        $em->flush();

        return $this->redirectToRoute('admin_page');
    }
}