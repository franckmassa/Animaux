<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Repository\ContinentRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContinentController extends AbstractController
{
    /**
     * @Route("/continents", name="continents")
     */
    public function afficherContinents(ContinentRepository $repository)
    {
        // l'injection de dépendance "ContinentRepository" récupérée dans $repository permet
        // d'utiliser la fonction findAll()
        // on stocke les continents dans la variable $continents
        $continents = $repository->findAll();
        return $this->render('continent/continents.html.twig', [
            // On envoie le tableau associatif ave la clé 'continents' vers la vue twig
            'continents' => $continents
        ]);
    }

    /**
     * @Route("/continent/{id}", name="afficher_continent")
     */
    // Avec le "parameter converter" on va récupérer une personne à partir de l'id
    public function afficherContinent(Continent $continent){
        return $this->render('continent/afficherContinent.html.twig', [
            // On envoie le continent vers la vue twig avec la clé "continent"
            'continent' => $continent
        ]);
    }

}
