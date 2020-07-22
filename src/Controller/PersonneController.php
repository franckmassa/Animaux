<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Repository\PersonneRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PersonneController extends AbstractController
{
    /**
     * @Route("/personnes", name="personnes")
     */
    public function personnes(PersonneRepository $repository)
    {
        $personnes = $repository->findAll();
        return $this->render('personne/personnes.html.twig', [
            // On renvoie le tableau associatif $personnes en utilisant sa clé "personnes"
            "personnes" => $personnes
        ]);
    }

     /**
     * @Route("/personne/{id}", name="afficher_personne")
     */
    // Avec le "parameter converter" on va récupérer une personne à partir de l'id
    public function afficherPersonne(Personne $personne)
    {
        return $this->render('personne/afficherPersonne.html.twig', [
            // On renvoie le tableau associatif $personnes en utilisant sa clé "personnes"
            "personne" => $personne
        ]);
    }
}
