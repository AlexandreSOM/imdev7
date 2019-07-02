<?php

namespace App\Controller;

use App\Entity\Compte;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    // Fonction qui recupère tout les comptes existants et les tri par ordre croissant
//    /**
//     * @Route("/", name="home", requirements={"home"="^(?!register).+"})
//     */
//
//    public function ListeComptes()
//    {
//        $repository = $this->getDoctrine()->getRepository(Compte::class);
//        $comptes=$repository->findBy(array(), array('category' => 'asc'));
//
//        return $this->render('home/index.html.twig', [
//            'comptes' => $comptes
//        ]);
//    }
}
