<?php

namespace Soap\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
    public function indexAction()
    {
        return $this->render("SoapTestBundle:Default:index.html.twig");
    }
} 