<?php

namespace Cxb\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CxbUserBundle:Default:index.html.twig');
    }
}
