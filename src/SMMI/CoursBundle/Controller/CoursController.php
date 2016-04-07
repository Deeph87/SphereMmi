<?php

namespace SMMI\CoursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoursController extends Controller
{
    public function listeAction()
    {
        return $this->render('SMMICoursBundle:Cours:liste.html.twig');
    }
}

