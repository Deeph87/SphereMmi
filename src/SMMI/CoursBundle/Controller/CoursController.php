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
            ->getRepository('SMMICoursBundle:Module')
        ;

        $promo1 = $repository->findBy(
            array('promo' => 'S1')
        );

        foreach ($promo1 as $s1) {
            // $advert est une instance de Advert
            $s1->getNom();
            $s1->getId();
        }

        $promo2 = $repository->findBy(
            array('promo' => 'S2')
        );

        foreach ($promo2 as $s2) {
            // $advert est une instance de Advert
            $s2->getNom();
            $s2->getId();
        }

        $promo3 = $repository->findBy(
            array('promo' => 'S3')
        );

        foreach ($promo3 as $s3) {
            // $advert est une instance de Advert
            $s3->getNom();
            $s3->getId();
        }

        $promo4 = $repository->findBy(
            array('promo' => 'S4')
        );

        foreach ($promo4 as $s4) {
            // $advert est une instance de Advert
            $s4->getNom();
            $s4->getId();
        }

        $acces = $this->getUser()->getAcces();
        return $this->render('SMMICoursBundle:Cours:module.html.twig', array(
            'acces'  => $acces,
            'promo1' => $promo1,
            'promo2' => $promo2,
            'promo3' => $promo3,
            'promo4' => $promo4
        ));
    }

    public function listeAction($id)
    {
        $repositoryModule = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SMMICoursBundle:Module')
        ;

        $idModule = $repositoryModule->find($id);
        $idModule = $idModule->getNom();

        $repositoryCours = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SMMICoursBundle:Cours')
        ;

        $listCours = $repositoryCours->findByModule($idModule);

        return $this->render('SMMICoursBundle:Cours:liste.html.twig', array(
            'id'  => $id,
            'listCours'  => $listCours
        ));
    }

    public function chapitreAction($id)
    {

        $recupCours = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SMMICoursBundle:Cours')
        ;

        $cours = $recupCours->find($id);

        $recupChapitres = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SMMICoursBundle:Chapitre')
        ;

        $listChapitre = $recupChapitres->findByCours($cours);

        return $this->render('SMMICoursBundle:Cours:chapitre.html.twig', array(
            'id'             => $id,
            'cours'          => $cours,
            'listChapitre'   => $listChapitre
        ));
    }

    public function contenuAction($id)
    {

        $recupChapitre = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SMMICoursBundle:Chapitre')
        ;

        $chapitre = $recupChapitre->find($id);

        return $this->render('SMMICoursBundle:Cours:contenu.html.twig', array(
            'id'             => $id,
            'chapitre'          => $chapitre
        ));
    }

    public function showquizzAction()
    {

        $recupChapitre = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SMMICoursBundle:Chapitre')
        ;

        $chapitre = $recupChapitre->find($id);

        return $this->render('SMMICoursBundle:Cours:contenu.html.twig', array(
            'id'             => $id,
            'chapitre'          => $chapitre
        ));
    }
}

