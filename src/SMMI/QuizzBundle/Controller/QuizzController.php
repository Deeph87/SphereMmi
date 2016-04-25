<?php

namespace SMMI\QuizzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SMMI\QuizzBundle\Entity\Reponses;
use SMMI\QuizzBundle\Form\ReponsesType;
use Symfony\Component\HttpFoundation\Request;

class QuizzController extends Controller
{
    public function repondreAction($id, Request $request)
    {
        /*On récupère le quizz voulu*/

        $quizzRepo = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SMMIQuizzBundle:Quizz')
        ;

        $quizz = $quizzRepo->find($id);

        /*On récupère les questions du quizz*/

        $questionsRepo = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SMMIQuizzBundle:Questions')
        ;

        $questions = $questionsRepo->findByQuizz($id);

        foreach ($questions as $quest) {
            $quest->getQuestion();
        }

        /*On récupère les réponses du quizz*/

        $reponsesRepo = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SMMIQuizzBundle:Reponses')
        ;

        $reponses = $reponsesRepo->findByQuizz($id);

        foreach ($reponses as $rep) {
            $rep->getReponsesEnnonce();
            $rep->getReponsesCorrect();
            $rep->getQuestions();
            $rep->getQuizz();
        }

        $reponses1 = $request->get('1');
        $reponses2 = $request->get('2');
        $reponses3 = $request->get('3');
        $reponses4 = $request->get('4');
        $reponses5 = $request->get('5');

        $note = 0;

        if($reponses1 == '1'){
            $note = 1;
        }
        if($reponses2 == '1'){
            $note = $note + 1;
        }
        if($reponses3 == '1'){
            $note = $note + 1;
        }
        if($reponses4 == '1'){
            $note = $note + 1;
        }
        if($reponses5 == '1'){
            $note = $note + 1;
        }

        $total = "Vous avez ".$note." / 5";

            $request->getSession()->getFlashBag()->add('success', $total);

        return $this->render('SMMIQuizzBundle:Quizz:repondre.html.twig', array(
            'quizz'             => $quizz,
            'questions'         => $questions,
            'reponses'          => $reponses
        ));
    }
}