<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatonsController extends AbstractController
{
    #[Route('', name: 'home')]
    public function index(): Response
    {
        // je vais chercher un objet dans le framework symfony
        //pour lister les dossiers qui sont dans /public/photos
        $finder = new Finder();
        $finder->directories()->in("../public/photos");
        return $this->render('chatons/index.html.twig', ["dossiers"=>$finder]);
    }

    #[Route('/voir/{dossier}', name: 'voirDossier')]
    public function voirDossier($dossier){
        $finder=new Finder();
        $finder->files()->in("../public/photos/".urldecode($dossier));
        return $this->render('chatons/voirDossier.html.twig', ["photos"=>$finder, "dossier"=>$dossier]);

    }
}
