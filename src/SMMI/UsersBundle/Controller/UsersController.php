<?php

namespace SMMI\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller
{
    public function indexAction()
    {
        return $this->render('SMMIUsersBundle:Users:index.html.twig');
    }
}
