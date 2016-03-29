<?php

namespace SMMI\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SMMIBackOfficeBundle:Default:index.html.twig');
    }
}
