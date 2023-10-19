<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?float $price = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private $dateTime;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?float $km = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $carburant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $option = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $equipement= null;

    #[ORM\ManyToOne(inversedBy: 'annonce')]
    private ?User $utilisateur = null;

    #[ORM\Column(type: 'string', length: 255)]
    private $slug = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDateTime() :?string
    {
        return $this->dateTime;
    }

    public function setDateTime(string $dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    public function getKm(): ?float
    {
        return $this->km;
    }

    public function setKm(float $km): static
    {
        $this->km = $km;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    /**
     * Set the value of carburant
     */
    public function setCarburant(?string $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of option
     */
    public function getOption(): ?string
    {
        return $this->option;
    }

    /**
     * Set the value of option
     */
    public function setOption(?string $option): self
    {
        $this->option = $option;

        return $this;
    }

    /**
     * Get the value of equipement
     */
    public function getEquipement(): ?string
    {
        return $this->equipement;
    }

    /**
     * Set the value of equipement
     */
    public function setEquipement(?string $equipement): self
    {
        $this->equipement = $equipement;

        return $this;
    }
    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }  

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the value of carburant
     */
    
}
