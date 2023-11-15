<?php

namespace App\Entity;

use App\Repository\AppartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppartementRepository::class)]
class Appartement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 5)]
    private ?string $lotNumber = null;

    #[ORM\ManyToOne(inversedBy: 'appartements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Position $position = null;

    #[ORM\OneToMany(mappedBy: 'appartement', targetEntity: Cave::class)]
    private Collection $cave;

    #[ORM\ManyToOne(inversedBy: 'appartements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Batiment $batiment = null;

    #[ORM\ManyToOne(inversedBy: 'appartements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etage $etage = null;

    #[ORM\OneToMany(mappedBy: 'appartement', targetEntity: Badge::class)]
    private Collection $badges;

    #[ORM\ManyToOne(inversedBy: 'appartements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Proprietaire $proprietaire = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->cave = new ArrayCollection();
        $this->badges = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLotNumber(): ?string
    {
        return $this->lotNumber;
    }

    public function setLotNumber(string $lotNumber): static
    {
        $this->lotNumber = $lotNumber;

        return $this;
    }

    public function getPosition(): ?Position
    {
        return $this->position;
    }

    public function setPosition(?Position $position): static
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Collection<int, Cave>
     */
    public function getCave(): Collection
    {
        return $this->cave;
    }

    public function addCave(Cave $cave): static
    {
        if (!$this->cave->contains($cave)) {
            $this->cave->add($cave);
            $cave->setAppartement($this);
        }

        return $this;
    }

    public function removeCave(Cave $cave): static
    {
        if ($this->cave->removeElement($cave)) {
            // set the owning side to null (unless already changed)
            if ($cave->getAppartement() === $this) {
                $cave->setAppartement(null);
            }
        }

        return $this;
    }

    public function getBatiment(): ?Batiment
    {
        return $this->batiment;
    }

    public function setBatiment(?Batiment $batiment): static
    {
        $this->batiment = $batiment;

        return $this;
    }

    public function getEtage(): ?Etage
    {
        return $this->etage;
    }

    public function setEtage(?Etage $etage): static
    {
        $this->etage = $etage;

        return $this;
    }

    /**
     * @return Collection<int, Badge>
     */
    public function getBadges(): Collection
    {
        return $this->badges;
    }

    public function addBadge(Badge $badge): static
    {
        if (!$this->badges->contains($badge)) {
            $this->badges->add($badge);
            $badge->setAppartement($this);
        }

        return $this;
    }

    public function removeBadge(Badge $badge): static
    {
        if ($this->badges->removeElement($badge)) {
            // set the owning side to null (unless already changed)
            if ($badge->getAppartement() === $this) {
                $badge->setAppartement(null);
            }
        }

        return $this;
    }

    public function getProprietaire(): ?Proprietaire
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?Proprietaire $proprietaire): static
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    // public function __toString()
    // {
    //     return $this->slug;
    // } 
}