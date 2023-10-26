<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
#[Vich\Uploadable]
class Annonce
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[Vich\UploadableField(mapping: 'annonce_image', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?float $price = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private $dateTime;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?float $km = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $carburant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $option = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $equipement= null;
    
    #[ORM\ManyToOne(targetEntity: "App\Entity\User", inversedBy: 'annonce')]
    private $user;

    #[ORM\Column(type: 'string', length: 255)]
    private $slug = null;



    public function __construct()
    {
        $this->updatedAt = new \DateTimeImmutable();
    }


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

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

     /**
     * Get the value of updatedAt
     */
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     */
    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

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

      /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     */
    public function setUser($user): self
    {
        $this->user = $user;

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
     
}
