<?php

namespace SMMI\BackOfficeBundle\Controller;

use SMMI\CoursBundle\Entity\Cours;
use SMMI\CoursBundle\Entity\Module;
use SMMI\CoursBundle\Form\CoursType;
use SMMI\QuizzBundle\Form\QuizzType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class BackOfficeController extends Controller
{
    public function listeAction()
    {
        // On vérifie que l'utilisateur dispose bien du rôle ROLE_AUTEUR
        if (!$this->get('security.context')->isGranted('ROLE_PROF')) {
            // Sinon on déclenche une exception « Accès interdit »
            throw new AccessDeniedException('Accès limité aux profs.');
        }

        // Ici l'utilisateur a les droits suffisant,
        // on peut ajouter une annonce

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SMMICoursBundle:Cours')
        ;

        $listCours = $repository->findAll();

        foreach ($listCours as $cours) {
            $cours->getId();
            $cours->getTitre();
            $cours->getPromo();
            $cours->getAuteur();
            $cours->getModule();
            $cours->getDate();
            $cours->getOnline();
        }

        return $this->render('SMMIBackOfficeBundle:BackOffice:cours.html.twig', array(
            'listCours' => $listCours,
        ));
    }

    public function addAction(Request $request)
    {
        $cours = new Cours();
        $firstname = $this->getUser()->getFirstname();
        $lastname = $this->getUser()->getLastname();
        $rest = substr($firstname, 0,1);
        $cours->setAuteur($rest.'.'.$lastname);

        $form = $this->get('form.factory')->create(new CoursType(), $cours);
        dump($form);
        if ($form->handleRequest($request)->isValid()) {
            $module = $form->get('module')->getData();
            $promo = substr($module, 0,2);

            if ($promo == 'M1' ) {
                $cours->setPromo('S1');
            }
            elseif ($promo == 'M2' ) {
                $cours->setPromo('S2');
            }
            elseif ($promo == 'M3' ) {
                $cours->setPromo('S3');
            }
            elseif ($promo == 'M4' ) {
                $cours->setPromo('S4');
            }

            $em = $this->getDoctrine()->getManager();
            foreach ($cours->getChapitres() as $id)
            {
                $cours->addChapitre($id);
            }

            $em->persist($cours);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'Cours bien enregistré.');

            return $this->redirect($this->generateUrl('smmi_backoffice_liste'));
        }

        return $this->render('SMMIBackOfficeBundle:BackOffice:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function editAction($id, Request $request)
    {
        $recupCours = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SMMICoursBundle:Cours')
            ->find($id);
        ;

        $firstname = $this->getUser()->getFirstname();
        $lastname = $this->getUser()->getLastname();
        $rest = substr($firstname, 0,1);
        $recupCours->setAuteur($rest.'.'.$lastname);

        $form = $this->get('form.factory')->create(new CoursType(), $recupCours);

        if ($form->handleRequest($request)->isValid()) {
            $module = $form->get('module')->getData();
            $promo = substr($module, 0,2);

            if ($promo == 'M1' ) {
                $recupCours->setPromo('S1');
            }
            elseif ($promo == 'M2' ) {
                $recupCours->setPromo('S2');
            }
            elseif ($promo == 'M3' ) {
                $recupCours->setPromo('S3');
            }
            elseif ($promo == 'M4' ) {
                $recupCours->setPromo('S4');
            }

            $em = $this->getDoctrine()->getManager();
            foreach ($recupCours->getChapitres() as $id)
            {
                $recupCours->addChapitre($id);
            }

            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'Cours bien modifié.');

            return $this->redirect($this->generateUrl('smmi_backoffice_liste'));
        }

        return $this->render('SMMIBackOfficeBundle:BackOffice:edit.html.twig', array(
            'form' => $form->createView(),
        ));

    }


    public function deleteAction($id, Request $request)
    {

        $deleteCours = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SMMICoursBundle:Cours')
            ->find($id);
        ;

        $em = $this->getDoctrine()->getManager();

        $em->remove($deleteCours);
        $em->flush();

        $request->getSession()->getFlashBag()->add('success', 'Cours supprimé.');

        return $this->redirect($this->generateUrl('smmi_backoffice_liste'));

    }

    public function addmoduleAction()
    {
        $s11 = new Module();
        $s11->setNom('M1101 | Anglais');
        $s11->setPromo('S1');
        $s12 = new Module();
        $s12->setNom('M1102 | Approfondissement du Projet Professionnel');
        $s12->setPromo('S1');
        $s13 = new Module();
        $s13->setNom('M1110 | Projet tutoré');
        $s13->setPromo('S1');
        $s14 = new Module();
        $s14->setNom('M1111 | Stage');
        $s14->setPromo('S1');
        $s15 = new Module();
        $s15->setNom('M1103 | Global Marketing');
        $s15->setPromo('S1');
        $s16 = new Module();
        $s16->setNom('M1M103 | Scénarisation');
        $s16->setPromo('S1');
        $s17 = new Module();
        $s17->setNom('M1S103 | Stratégie Créative');
        $s17->setPromo('S1');
        $s18 = new Module();
        $s18->setNom('M1A103 | Référencement et optimisation');
        $s18->setPromo('S1');
        $s19 = new Module();
        $s19->setNom('M1B103 | Appli Mobile');
        $s19->setPromo('S1');
        $s110 = new Module();
        $s110->setNom('M1210 | Projet tutoré');
        $s110->setPromo('S1');
        $s111 = new Module();
        $s111->setNom('M1212 | Stage');
        $s111->setPromo('S1');
        $s112 = new Module();
        $s112->setNom('M1201 | Technologies JS');
        $s112->setPromo('S1');
        $s113 = new Module();
        $s113->setNom('M1204 | Hebergement Cryptographie');
        $s113->setPromo('S1');
        $s114 = new Module();
        $s114->setNom('M1M203 | Audiovisuel / Motion Design');
        $s114->setPromo('S1');
        $s115 = new Module();
        $s115->setNom('M1S203 | Webdesign');
        $s115->setPromo('S1');
        $s116 = new Module();
        $s116->setNom('M1A203 | CSS Avancé');
        $s116->setPromo('S1');
        $s117 = new Module();
        $s117->setNom('M1B203 | POO Avancé');
        $s117->setPromo('S1');

        $s21 = new Module();
        $s21->setNom('M2101 | Anglais');
        $s21->setPromo('S2');
        $s22 = new Module();
        $s22->setNom('M2102 | Approfondissement du Projet Professionnel');
        $s22->setPromo('S2');
        $s23 = new Module();
        $s23->setNom('M2110 | Projet tutoré');
        $s23->setPromo('S2');
        $s24 = new Module();
        $s24->setNom('M2111 | Stage');
        $s24->setPromo('S2');
        $s25 = new Module();
        $s25->setNom('M2103 | Global Marketing');
        $s25->setPromo('S2');
        $s26 = new Module();
        $s26->setNom('M2M103 | Scénarisation');
        $s26->setPromo('S2');
        $s27 = new Module();
        $s27->setNom('M2S103 | Stratégie Créative');
        $s27->setPromo('S2');
        $s28 = new Module();
        $s28->setNom('M2A103 | Référencement et optimisation');
        $s28->setPromo('S2');
        $s29 = new Module();
        $s29->setNom('M2B103 | Appli Mobile');
        $s29->setPromo('S2');
        $s210 = new Module();
        $s210->setNom('M2210 | Projet tutoré');
        $s210->setPromo('S2');
        $s211 = new Module();
        $s211->setNom('M2212 | Stage');
        $s211->setPromo('S2');
        $s212 = new Module();
        $s212->setNom('M2201 | Technologies JS');
        $s212->setPromo('S2');
        $s213 = new Module();
        $s213->setNom('M2204 | Hebergement Cryptographie');
        $s213->setPromo('S2');
        $s214 = new Module();
        $s214->setNom('M2M203 | Audiovisuel / Motion Design');
        $s214->setPromo('S2');
        $s215 = new Module();
        $s215->setNom('M2S203 | Webdesign');
        $s215->setPromo('S2');
        $s216 = new Module();
        $s216->setNom('M2A203 | CSS Avancé');
        $s216->setPromo('S2');
        $s217 = new Module();
        $s217->setNom('M2B203 | POO Avancé');
        $s217->setPromo('S2');

        $s31 = new Module();
        $s31->setNom('M3101 | Anglais');
        $s31->setPromo('S3');
        $s32 = new Module();
        $s32->setNom('M3102 | Approfondissement du Projet Professionnel');
        $s32->setPromo('S3');
        $s33 = new Module();
        $s33->setNom('M3110 | Projet tutoré');
        $s33->setPromo('S3');
        $s34 = new Module();
        $s34->setNom('M3111 | Stage');
        $s34->setPromo('S3');
        $s35 = new Module();
        $s35->setNom('M3103 | Global Marketing');
        $s35->setPromo('S3');
        $s36 = new Module();
        $s36->setNom('M3M103 | Scénarisation');
        $s36->setPromo('S3');
        $s37 = new Module();
        $s37->setNom('M3S103 | Stratégie Créative');
        $s37->setPromo('S3');
        $s38 = new Module();
        $s38->setNom('M3A103 | Référencement et optimisation');
        $s38->setPromo('S3');
        $s39 = new Module();
        $s39->setNom('M3B103 | Appli Mobile');
        $s39->setPromo('S3');
        $s310 = new Module();
        $s310->setNom('M3210 | Projet tutoré');
        $s310->setPromo('S3');
        $s311 = new Module();
        $s311->setNom('M3212 | Stage');
        $s311->setPromo('S3');
        $s312 = new Module();
        $s312->setNom('M3201 | Technologies JS');
        $s312->setPromo('S3');
        $s313 = new Module();
        $s313->setNom('M3204 | Hebergement Cryptographie');
        $s313->setPromo('S3');
        $s314 = new Module();
        $s314->setNom('M3M203 | Audiovisuel / Motion Design');
        $s314->setPromo('S3');
        $s315 = new Module();
        $s315->setNom('M3S203 | Webdesign');
        $s315->setPromo('S3');
        $s316 = new Module();
        $s316->setNom('M3A2033 | CSS Avancé');
        $s316->setPromo('S3');
        $s317 = new Module();
        $s317->setNom('M3B203 | POO Avancé');
        $s317->setPromo('S3');

        $s41 = new Module();
        $s41->setNom('M4101 | Anglais');
        $s41->setPromo('S4');
        $s42 = new Module();
        $s42->setNom('M4102 | Approfondissement du Projet Professionnel');
        $s42->setPromo('S4');
        $s43 = new Module();
        $s43->setNom('M4110 | Projet tutoré');
        $s43->setPromo('S4');
        $s44 = new Module();
        $s44->setNom('M4111 | Stage');
        $s44->setPromo('S4');
        $s45 = new Module();
        $s45->setNom('M4103 | Global Marketing');
        $s45->setPromo('S4');
        $s46 = new Module();
        $s46->setNom('M4M103 | Scénarisation');
        $s46->setPromo('S4');
        $s47 = new Module();
        $s47->setNom('M4S103 | Stratégie Créative');
        $s47->setPromo('S4');
        $s48 = new Module();
        $s48->setNom('M4A103 | Référencement et optimisation');
        $s48->setPromo('S4');
        $s49 = new Module();
        $s49->setNom('M4B103 | Appli Mobile');
        $s49->setPromo('S4');
        $s410 = new Module();
        $s410->setNom('M4210 | Projet tutoré');
        $s410->setPromo('S4');
        $s411 = new Module();
        $s411->setNom('M4212 | Stage');
        $s411->setPromo('S4');
        $s412 = new Module();
        $s412->setNom('M4201 | Technologies JS');
        $s412->setPromo('S4');
        $s413 = new Module();
        $s413->setNom('M4204 | Hebergement Cryptographie');
        $s413->setPromo('S4');
        $s414 = new Module();
        $s414->setNom('M4M203 | Audiovisuel / Motion Design');
        $s414->setPromo('S4');
        $s415 = new Module();
        $s415->setNom('M4S203 | Webdesign');
        $s415->setPromo('S4');
        $s416 = new Module();
        $s416->setNom('M4A203 | CSS Avancé');
        $s416->setPromo('S4');
        $s417 = new Module();
        $s417->setNom('M4B203 | POO Avancé');
        $s417->setPromo('S4');

        $em = $this->getDoctrine()->getManager();
        $em->persist($s11);
        $em->persist($s12);
        $em->persist($s13);
        $em->persist($s14);
        $em->persist($s15);
        $em->persist($s16);
        $em->persist($s17);
        $em->persist($s18);
        $em->persist($s19);
        $em->persist($s110);
        $em->persist($s111);
        $em->persist($s112);
        $em->persist($s113);
        $em->persist($s114);
        $em->persist($s115);
        $em->persist($s116);
        $em->persist($s117);
        $em->persist($s21);
        $em->persist($s22);
        $em->persist($s23);
        $em->persist($s24);
        $em->persist($s25);
        $em->persist($s26);
        $em->persist($s27);
        $em->persist($s28);
        $em->persist($s29);
        $em->persist($s210);
        $em->persist($s211);
        $em->persist($s212);
        $em->persist($s213);
        $em->persist($s214);
        $em->persist($s215);
        $em->persist($s216);
        $em->persist($s217);
        $em->persist($s31);
        $em->persist($s32);
        $em->persist($s33);
        $em->persist($s34);
        $em->persist($s35);
        $em->persist($s36);
        $em->persist($s37);
        $em->persist($s38);
        $em->persist($s39);
        $em->persist($s310);
        $em->persist($s311);
        $em->persist($s312);
        $em->persist($s313);
        $em->persist($s314);
        $em->persist($s315);
        $em->persist($s316);
        $em->persist($s317);
        $em->persist($s41);
        $em->persist($s42);
        $em->persist($s43);
        $em->persist($s44);
        $em->persist($s45);
        $em->persist($s46);
        $em->persist($s47);
        $em->persist($s48);
        $em->persist($s49);
        $em->persist($s410);
        $em->persist($s411);
        $em->persist($s412);
        $em->persist($s413);
        $em->persist($s414);
        $em->persist($s415);
        $em->persist($s416);
        $em->persist($s417);
        $em->flush();

        return $this->render('SMMIBackOfficeBundle:BackOffice:addmodule.html.twig');

    }
}
