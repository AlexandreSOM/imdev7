<?php

namespace App\Controller;

use App\Entity\Gestionnaire;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GestionAdminController extends AbstractController
{
    //Fonction qui recupère les gestionnaires et les tri par ordre croissant
    /**
     * @Route("/gestion/admin", name="gestion_admin")
     */
    public function listeGestionnaire()
    {
        $repository = $this->getDoctrine()->getRepository(Gestionnaire::class);
        $gestionnaires=$repository->findAll();
        //        $comptes=$repository->findBy(array(), array('category' => 'asc'));
        return $this->render('gestion_admin/index.html.twig', [
            'gestionnaires' => $gestionnaires
        ]);
    }
        //Fonction ajout/edit des GESTIONNAIRE qui recupère les données du formulaire, les enregistres et les renvoie a la vue
    /**
     * @Route("/gestion/admin/{gestionnaire}/modifier", name="gestionnaire-modifier", requirements={"gestionnaire-ajout"="^(?!register).+"})
     */
    public function form(Request $request,  Gestionnaire $gestionnaire = null)
    {
        if(!$gestionnaire){
            $gestionnaire = new Gestionnaire();
        }
        $form = $this->createForm(RegistrationFormType::class, $gestionnaire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $gestionnaire = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($gestionnaire);
            $em->flush();
            $this->addFlash('success', "Edition du gestionnaire avec succès !");
            return $this->redirectToRoute('gestion_admin/index.html.twig');
        } else {
            return $this->render('gestion_admin/gestion-modal/edit-gestion.html.twig', [
                'registrationForm' => $form->createView(), 'errors' => $form->getErrors()
            ]);

        }
    }

       //Fonction supprime un GESTIONNAIRE selon son ID

    /**
     * @Route("/gestion/admin/delete-gestionnaire/{gestionnaire}", name="delete-gestionnaire", requirements={"delete-gestionnaire"="^(?!register).+"})
     */
    public function removeAdmin(Gestionnaire $gestionnaire)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($gestionnaire);
        $em->flush();
        $this->addFlash('success', 'Ce gestionnaire vient d\'être supprimé avec succès !');
        return $this->redirectToRoute('gestion_admin');
    }
}
