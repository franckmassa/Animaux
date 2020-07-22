<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonneRepository")
 */
class Personne
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Dispose", mappedBy="personne")
     */
    private $disposes;

    public function __construct()
    {
        $this->disposes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Dispose[]
     */
    public function getDisposes(): Collection
    {
        return $this->disposes;
    }

    public function addDispose(Dispose $dispose): self
    {
        if (!$this->disposes->contains($dispose)) {
            $this->disposes[] = $dispose;
            $dispose->setPersonne($this);
        }

        return $this;
    }

    public function removeDispose(Dispose $dispose): self
    {
        if ($this->disposes->contains($dispose)) {
            $this->disposes->removeElement($dispose);
            // set the owning side to null (unless already changed)
            if ($dispose->getPersonne() === $this) {
                $dispose->setPersonne(null);
            }
        }

        return $this;
    }
}
