<?php

namespace SMMI\CoursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoursController extends Controller
{
    public function indexAction()
    {
        return $this->render('SMMICoursBundle:Cours:index.html.twig');
    }
}

