<?php

namespace App\Entity;

use App\Repository\HomeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HomeRepository::class)]
class Home
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

   #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $reparation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $entretien = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $voiture = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of reparation
     */
    public function getReparation(): ?string
    {
        return $this->reparation;
    }

    /**
     * Set the value of reparation
     */
    public function setReparation(?string $reparation): self
    {
        $this->reparation = $reparation;

        return $this;
    }

    /**
     * Get the value of entretien
     */
    public function getEntretien(): ?string
    {
        return $this->entretien;
    }

    /**
     * Set the value of entretien
     */
    public function setEntretien(?string $entretien): self
    {
        $this->entretien = $entretien;

        return $this;
    }

    /**
     * Get the value of voiture
     */
    public function getVoiture(): ?string
    {
        return $this->voiture;
    }

    /**
     * Set the value of voiture
     */
    public function setVoiture(?string $voiture): self
    {
        $this->voiture = $voiture;

        return $this;
    }
}
