<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('blog_homepage', new Route('/hello/{name}', array(
    '_controller' => 'BlogBundle:Default:index',
)));

return $collection;
