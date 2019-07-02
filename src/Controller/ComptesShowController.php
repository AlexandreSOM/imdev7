<?php

namespace App\Controller;

use App\Entity\Compte;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ComptesShowController extends AbstractController
{
    /**
     * @Route("/compte/show", name="comptes_show")
     */
    public function index()
    {
        return $this->render('comptes_show/index.html.twig', [
            'controller_name' => 'ComptesShowController',
        ]);
    }

    // //Function qui recupère les comptes de l'utilisateur connecté et affiche
//    public function listeCompteBy()
//    {
//        // Recuperer l'id de l'utilisateur connecté
//        $userConnected = $this->get('security.token_storage')
//            ->getToken()
//            ->getUser();
//
//        //Recuperer les comptes de l'utilisateur connecté
//        $comptes = $this
//            ->getDoctrine()
//            ->getManager()
//            ->getRepository(Compte::class)
//            ->findBy(
//                ['gestionnaire' => $userConnected->getId()]
//            );
//        return $this->render('gestionnaire/mescomptes.html.twig', [
//            'comptes' => $comptes
//        ]);
//    }


}
