<?php

namespace App\DataFixtures;


use App\Entity\Annonce;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private Generator $faker;

    protected $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        
           $user = [];

            //Creation de l'admin  
            /*$admin = new User();
            $admin->setEmail('admin@test.com')
                ->setPrenom('Vincent')
                ->setNom('Parrot')
                ->setRoles(['ROLE_USER', 'ROLE_ADMIN'])
                ->setPlainPassword('password');
            $user[] = $admin;
            $manager->persist($admin);*/


            //Creation de l'employé
        for ($i = 1; $i < 5; $i++) {
            $user = new User();
            $user->setEmail($this->faker->email())
                ->setPrenom($this->faker->firstName)
                ->setNom($this->faker->lastName)
                ->setRoles(['ROLE_USER'])
                ->setPlainPassword('password');

            //$users[] = $admin;
            $manager->persist($user);

    }



        // Creation d'un produit
         for ($i=0; $i < 10; $i++) {
            $annonce = new Annonce();
            
            $annonce->setTitle($this->faker->words(2, true))
                    ->setPrice($this->faker->randomFloat(100, 9999))
                    ->setdateTime($this->faker->date('2000', '2022'))
                    ->setKm($this->faker->randomFloat(2, 100, 9999))
                    ->setCarburant($this->faker->words(2, true))
                    ->setDescription($this->faker->text(500))
                    ->setOption($this->faker->text(500))
                    ->setEquipement($this->faker->text(500))
                    ->setSlug(strtolower($this->slugger->slug($annonce->getTitle())));
                    
            $manager->persist($annonce);
        } 
   
        

        $manager->flush();

    }    
}  
