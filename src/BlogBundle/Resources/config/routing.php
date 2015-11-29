<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('start_page', new Route('/welcome', array(
    '_controller' => 'BlogBundle:Start:index',
)));

$collection->add('admin_page', new Route('/admin', array(
    '_controller' => 'BlogBundle:Admin:admin',
)));

$collection->add('read_post', new Route('/read_post/{post}', array(
    '_controller' => 'BlogBundle:Read:read',
)));

$collection->add('delete_commentary', new Route('/delete_comm/{comment}', array(
    '_controller' => 'BlogBundle:Delete:delete',
)));

return $collection;
