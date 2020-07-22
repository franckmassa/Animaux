<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\Continent;
use App\Repository\AnimalRepository;
use App\Repository\ContinentRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalController extends AbstractController
{
    /**
     * @Route("/", name="animaux")
     */

    // 1 ère solution : On récupère un "AnimalRepository" et on l'incorpore dans la variable $repository
    // C'est l'injection de dépendance
    public function index(AnimalRepository $repository)
    {
    // 2 ième solution : $repository = $this->getDoctrine()->getRepository(Animal::class);

        // On récupère tous les animaux
        $animaux = $repository->findAll();
        return $this->render('animal/index.html.twig', [
            'animaux' => $animaux
        ]);
    }

    // 1ere solution :
    // /**
    //  * @Route("/animal/{id}", name="afficher_animal")
    //  */
    // on injecte la dependance "animalRepository" dans $repository et on met en parametre $id  

    // public function afficherAnimal(AnimalRepository $repository, $id){

    //     // On va chercher l'animal dans la BDD et on le stocke dans la variable $animal

    //     $animal = $repository->find($id);
    //     return $this->render('animal/afficherAnimal.html.twig', [
    //         "animal" => $animal
    //     ]);
    // }

    // 2 ème solution :

    /**
     * @Route("/animal/{id}", name="afficher_animal")
     */
    // Avec le "parameter converter" on va récupérer une personne à partir de l'id
    public function afficherAnimal(Animal $animal){
        return $this->render('animal/afficherAnimal.html.twig', [
            // On récupère l'animal et on l'evoie vers la vue 
            "animal" => $animal
        ]);
    }

   
}
