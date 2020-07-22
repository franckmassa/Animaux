<?php

namespace App\Controller;

use App\Entity\Famille;
use App\Repository\FamilleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FamilleController extends AbstractController
{
    /**
     * @Route("/familles", name="familles")
     */
    // On utilise le type "FamilleRepository" que l'on injecte dans la variable $repository
    public function index(FamilleRepository $repository)
    {
        // On récupère toutes les familles de la BDD à partir de
        // l'injection de dépendance "FamilleRepository"
        $familles = $repository->findAll();
        return $this->render('famille/familles.html.twig', [
            // On envoie le tableau associatif $familles avec la clé "familles" dans la vue
            'familles' => $familles
        ]);
    }
    /**
     * @Route("/famille/{id}", name="afficher_famille")
     */
    // Avec le "parameter converter" on va récupérer une personne à partir de l'id
    public function afficherFamille(Famille $famille)
    {
        return $this->render('famille/afficherFamille.html.twig', [
            'famille' => $famille
        ]);
    }

}
