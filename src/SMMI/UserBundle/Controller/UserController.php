<?php

namespace SMMI\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function loginAction()
    {
        return $this->render('SMMIUserBundle:Security:login.html.twig');
    }
}