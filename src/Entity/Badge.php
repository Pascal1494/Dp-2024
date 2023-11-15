<?php

namespace App\Entity;

use App\Repository\BadgeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BadgeRepository::class)]
class Badge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15)]
    private ?string $reference = null;

    #[ORM\Column(length: 15)]
    private ?string $slug = null;

    #[ORM\Column]
    private ?bool $isValid = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'badges')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Couleur $color = null;

    #[ORM\OneToOne(mappedBy: 'relation', cascade: ['persist', 'remove'])]
    private ?OldBadge $oldBadge = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

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

    public function isIsValid(): ?bool
    {
        return $this->isValid;
    }

    public function setIsValid(bool $isValid): static
    {
        $this->isValid = $isValid;

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

    public function getColor(): ?Couleur
    {
        return $this->color;
    }

    public function setColor(?Couleur $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getOldBadge(): ?OldBadge
    {
        return $this->oldBadge;
    }

    public function setOldBadge(OldBadge $oldBadge): static
    {
        // set the owning side of the relation if necessary
        if ($oldBadge->getRelation() !== $this) {
            $oldBadge->setRelation($this);
        }

        $this->oldBadge = $oldBadge;

        return $this;
    }
}
