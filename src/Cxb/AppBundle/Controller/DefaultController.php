<?php

namespace Cxb\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CxbAppBundle:Default:index.html.twig');
    }
}
