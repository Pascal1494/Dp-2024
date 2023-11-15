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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column]
    private ?bool $isOccupant = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\OneToMany(mappedBy: 'proprietaire', targetEntity: Appartement::class)]
    private Collection $appartements;

    #[ORM\OneToMany(mappedBy: 'proprietaire', targetEntity: Locataire::class)]
    private Collection $locataire;

    public function __construct()
    {
        $this->appartements = new ArrayCollection();
        $this->locataire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function isIsOccupant(): ?bool
    {
        return $this->isOccupant;
    }

    public function setIsOccupant(bool $isOccupant): static
    {
        $this->isOccupant = $isOccupant;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, Appartement>
     */
    public function getAppartements(): Collection
    {
        return $this->appartements;
    }

    public function addAppartement(Appartement $appartement): static
    {
        if (!$this->appartements->contains($appartement)) {
            $this->appartements->add($appartement);
            $appartement->setProprietaire($this);
        }

        return $this;
    }

    public function removeAppartement(Appartement $appartement): static
    {
        if ($this->appartements->removeElement($appartement)) {
            // set the owning side to null (unless already changed)
            if ($appartement->getProprietaire() === $this) {
                $appartement->setProprietaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Locataire>
     */
    public function getLocataire(): Collection
    {
        return $this->locataire;
    }

    public function addLocataire(Locataire $locataire): static
    {
        if (!$this->locataire->contains($locataire)) {
            $this->locataire->add($locataire);
            $locataire->setProprietaire($this);
        }

        return $this;
    }

    public function removeLocataire(Locataire $locataire): static
    {
        if ($this->locataire->removeElement($locataire)) {
            // set the owning side to null (unless already changed)
            if ($locataire->getProprietaire() === $this) {
                $locataire->setProprietaire(null);
            }
        }

        return $this;
    }
}