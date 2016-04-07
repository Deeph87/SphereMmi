<?php

namespace SMMI\BackOfficeBundle\Controller;

use SMMI\CoursBundle\Entity\Liste;
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

        return $this->render('SMMIBackOfficeBundle:BackOffice:liste.html.twig');
    }

    public function addAction(Request $request)
    {
        $liste = new Liste();
        
        $form = $this->get('form.factory')->createBuilder('form', $liste)
            ->add('titre',    'text')
            ->add('module',   'text')
            ->add('auteur',   'text')
            ->add('date',     'date')
            ->add('online',   'checkbox')
            ->add('save',     'submit')
            ->getForm()
        ;

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($liste);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Cours bien enregistré.');

            return $this->redirect($this->generateUrl('smmi_backoffice_liste', array('id' => $liste->getId())));
        }

        return $this->render('SMMIBackOfficeBundle:BackOffice:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
