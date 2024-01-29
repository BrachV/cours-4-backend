<?php

namespace App\Entity;

use App\Repository\ProprietaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProprietaireRepository::class)]
class Proprietaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'proprietaire', targetEntity: Batiments::class)]
    private Collection $batiments;

    public function __construct()
    {
        $this->batiments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Batiments>
     */
    public function getBatiments(): Collection
    {
        return $this->batiments;
    }

    public function addBatiment(Batiments $batiment): static
    {
        if (!$this->batiments->contains($batiment)) {
            $this->batiments->add($batiment);
            $batiment->setProprietaire($this);
        }

        return $this;
    }

    public function removeBatiment(Batiments $batiment): static
    {
        if ($this->batiments->removeElement($batiment)) {
            // set the owning side to null (unless already changed)
            if ($batiment->getProprietaire() === $this) {
                $batiment->setProprietaire(null);
            }
        }

        return $this;
    }
}
