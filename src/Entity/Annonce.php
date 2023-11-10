<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
//use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

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

    #[ORM\Column(type: 'string', length: 255)]
    private $file;

    #[Vich\UploadableField(mapping: 'annonce_images', fileNameProperty: 'file')]
    //#[Assert\File(mimeTypes:'image/jpg')]
    private ?File $imageFile;


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
    
    #[ORM\OneToOne(inversedBy: 'annonce', targetEntity: Thumbnail::class, cascade: ['persist', 'remove'])]
    private ?Thumbnail $thumbnail = null;
    
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


    public function getFile()
    {
        return $this->file;
    }

    
    public function setFile($file): self
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $file = null): void
    {
        $this->imageFile = $file;

        if ($file) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

   
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    
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

    
    public function getOption(): ?string
    {
        return $this->option;
    }


    public function setOption(?string $option): self
    {
        $this->option = $option;

        return $this;
    }

    
    public function getEquipement(): ?string
    {
        return $this->equipement;
    }


    public function setEquipement(?string $equipement): self
    {
        $this->equipement = $equipement;

        return $this;
    }

    public function getThumbnail(): ?Thumbnail
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?Thumbnail $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }


    public function getUser()
    {
        return $this->user;
    }

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
  
    public function __toString()
    {
        return $this->title;
    }


}
