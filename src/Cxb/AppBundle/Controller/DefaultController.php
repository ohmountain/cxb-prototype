<?php

namespace Cxb\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        /**
         * @var \Cxb\AppBundle\Service\Department $department_manager
         */
        $department_manager = $this->get("cxb_app.department_manager");

        // $department = $department_manager->getByToken("b367af04c03a228acc4747cbbeb4d39c");
        $dps1 = $department_manager->getAll();
        $dps2 = $department_manager->find(["title" => "农业局", "weights" => 1]);
        $dps3 = $department_manager->findByWeights(10);

        return $this->render('CxbAppBundle:Default:index.html.twig');
    }

    public function personAction()
    {
        /**
         * @var \Cxb\AppBundle\Service\Person $person_manager
         */
        $person_manager = $this->get("cxb_app.person_manager");

        $person = $person_manager->create("田仁山", 0, "522630199009019658", "贵州省台江县方召乡方召村1组", md5(\uniqid()));

        dump($person);

        return $this->render('CxbAppBundle:Default:index.html.twig');
    }
}
