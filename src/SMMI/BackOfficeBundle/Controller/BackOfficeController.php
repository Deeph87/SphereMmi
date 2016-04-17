<?php

namespace SMMI\BackOfficeBundle\Controller;

use SMMI\CoursBundle\Entity\Cours;
use SMMI\CoursBundle\Form\CoursType;
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
            // $cours est une instance de Cours
            $cours->getTitre();
            $cours->getPromo();
            $cours->getAuteur();
            $cours->getModule();
            $cours->getDate();
        }

        return $this->render('SMMIBackOfficeBundle:BackOffice:cours.html.twig', array(
            'listCours' => $listCours
        ));
    }

    public function addAction(Request $request)
    {
        $cours = new Cours();
        $id = $cours->getId();
        dump($id);
        $firstname = $this->getUser()->getFirstname();
        $lastname = $this->getUser()->getLastname();
        $rest = substr($firstname, 0,1);
        $cours->setAuteur($rest.'.'.$lastname);

        $form = $this->get('form.factory')->create(new CoursType(), $cours);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cours);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Cours bien enregistré.');

            return $this->redirect($this->generateUrl('smmi_backoffice_liste'));
        }

        return $this->render('SMMIBackOfficeBundle:BackOffice:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
