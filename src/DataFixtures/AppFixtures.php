<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        #$product = new Product();
        #$product = setName()
            #->setPrice()

        #$manager->persist($object);
        $manager->flush();
    }
}