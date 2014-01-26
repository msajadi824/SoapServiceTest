<?php

namespace Soap\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {
    public function indexAction()
    {
        return $this->render("SoapTestBundle:Default:index.html.twig");
    }

    public function getNameByIdAction($id)
    {
        return new Response('aa');
    }
} 