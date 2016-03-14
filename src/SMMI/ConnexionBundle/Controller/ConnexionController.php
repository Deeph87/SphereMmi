<?php

namespace SMMI\ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConnexionController extends Controller
{
    public function indexAction()
    {
        return $this->render('SMMIConnexionBundle:Connexion:connexion.html.twig');
    }
}