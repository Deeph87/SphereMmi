<?php

namespace SMMI\ExercicesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExercicesController extends Controller
{
    public function indexAction()
    {
        return $this->render('SMMIExercicesBundle:Exercices:index.html.twig');
    }
}