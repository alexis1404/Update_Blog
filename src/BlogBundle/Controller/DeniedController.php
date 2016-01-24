<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DeniedController extends Controller
{
    public function safeAction()
    {
        return $this->render(':Blog_pages:access_denied_page.html.twig');
    }
}