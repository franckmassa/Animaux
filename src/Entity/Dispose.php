<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

// La combinaison des deux attributs est unique
/**
 * @ORM\Entity(repositoryClass="App\Repository\DisposeRepository")
 * @UniqueEntity(fields={"personne", "animal"})
 */
class Dispose
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Animal", inversedBy="disposes")
     */
    private $animal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personne", inversedBy="disposes")
     */
    private $personne;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }

    public function getNb(): ?int
    {
        return $this->nb;
    }

    public function setNb(int $nb): self
    {
        $this->nb = $nb;

        return $this;
    }
}
