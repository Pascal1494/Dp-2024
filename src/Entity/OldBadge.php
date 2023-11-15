<?php

namespace App\Entity;

use App\Repository\OldBadgeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OldBadgeRepository::class)]
class OldBadge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $oldReference = null;

    #[ORM\Column(length: 255)]
    private ?string $remplacedBy = null;

    #[ORM\Column(length: 255)]
    private ?string $oldSlug = null;

    #[ORM\Column(length: 255)]
    private ?string $remplacedSlug = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\OneToOne(inversedBy: 'oldBadge', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?badge $relation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOldReference(): ?string
    {
        return $this->oldReference;
    }

    public function setOldReference(string $oldReference): static
    {
        $this->oldReference = $oldReference;

        return $this;
    }

    public function getRemplacedBy(): ?string
    {
        return $this->remplacedBy;
    }

    public function setRemplacedBy(string $remplacedBy): static
    {
        $this->remplacedBy = $remplacedBy;

        return $this;
    }

    public function getOldSlug(): ?string
    {
        return $this->oldSlug;
    }

    public function setOldSlug(string $oldSlug): static
    {
        $this->oldSlug = $oldSlug;

        return $this;
    }

    public function getRemplacedSlug(): ?string
    {
        return $this->remplacedSlug;
    }

    public function setRemplacedSlug(string $remplacedSlug): static
    {
        $this->remplacedSlug = $remplacedSlug;

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

    public function getRelation(): ?badge
    {
        return $this->relation;
    }

    public function setRelation(badge $relation): static
    {
        $this->relation = $relation;

        return $this;
    }
}
