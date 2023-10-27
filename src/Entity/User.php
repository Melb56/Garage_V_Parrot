<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity("email", message: "L'email' est déjà pris...")]
#[ORM\EntityListeners(['App\EntityListener\UserListener'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(
        message: "L'eamil ne doit pas être vide !")]
    #[Assert\Length(
        min: 2,
        max: 180,
        minMessage: "L'adresse email ne doit pas faire moins de 2 caractères",
        maxMessage: "L'adresse email ne doit pas faire plus de 180 caractères", )]      
    #[ORM\Column(length: 180, unique: true)]
    #[Assert\Email()]
    #[Assert\Length(min: 2, max: 180)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    private array $roles = [];

    private ?string $plainPassword = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(
        message: "Le mot de passe ne peut pas être vide !",
    )]
    private ?string $password = 'password';
    
    
    #[ORM\OneToMany(targetEntity: "App\Entity\Annonce", mappedBy: "user")]
    private $annonce;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPrenom(): ?string
        {
            return $this->prenom;
        }

        public function setPrenom(string $prenom): self
        {
            $this->prenom = $prenom;

            return $this;
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
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }


    /**
     * Get the value of plainPassword
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Set the value of plainPassword
     */
    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
       
    }
    
    public function getAnnonce()
    {
        return $this->annonce;
    }

    public function setAnnonce($annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

}
    

    

   