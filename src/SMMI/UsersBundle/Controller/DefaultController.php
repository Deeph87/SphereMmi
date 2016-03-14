<?php

namespace SMMI\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SMMIUsersBundle:Default:index.html.twig');
    }
}
