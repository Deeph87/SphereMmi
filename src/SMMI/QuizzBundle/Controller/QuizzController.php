<?php

namespace SMMI\QuizzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QuizzController extends Controller
{
    public function indexAction($slug)
    {
        return $this->render('SMMIQuizzBundle:Quizz:index.html.twig', array('slug' => $slug));
    }
}