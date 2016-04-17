<?php

namespace SMMI\CoursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoursController extends Controller
{
    public function moduleAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SMMICoursBundle:Cours')
        ;

        $listModules = $repository->findAll();

        foreach ($listModules as $module) {
            // $cours est une instance de Cours
            $module->getModule();
        }
        return $this->render('SMMICoursBundle:Cours:module.html.twig', array(
            'listModules' => $listModules
        ));
    }
}

