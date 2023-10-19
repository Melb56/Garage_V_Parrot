<?php

namespace App\DataFixtures;


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


    public function __construct(private SluggerInterface $slugger)
    {   
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        
        //$users = [];

    //Creation de l'admin  
        $admin = new User();
        $admin->setEmail('admin@test.com')
             ->setPrenom('Vincent')
             ->setNom('Parrot')
             ->setRoles(['ROLE_ADMIN'])
             ->setPlainPassword('password');
        //$users[] = $admin;
        $manager->persist($admin);


    //Creation de l'employé'
    for ($i = 1; $i < 5; $i++) {
        $user = new User();
        $user->setEmail($this->faker->email())
             ->setPrenom($this->faker->firstName)
             ->setNom($this->faker->lastName)
             ->setRoles(['ROLE_USER'])
             ->setPlainPassword($this->faker->password);

        //$users[] = $admin;
        $manager->persist($user);

        }

    }     
}  
