<?php

namespace App\Tests\Tests\Unit;

use App\Entity\Annonce;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AnnonceEntityTest extends KernelTestCase
{
    public function getEntity() : Annonce
    {
        return (new Annonce())->setTitle('Annonce')
                            ->setDescription('Description Description')
                            ->setPrice('15000')
                            ->setDateTime('2015')
                            ->setKm('10000')
                            ->setCarburant('Carburant')
                            ->setOption('Option')
                            ->setEquipement('equipement');
    }

    public function testAnnonceEntityIsValid(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $annonce = $this->getEntity();

        $errors = $container->get('validator')->validate($annonce);
        $this->assertCount(0, $errors);  
    }

    public function testInvalideName()
    {
        self::bootKernel();
        $container = static::getContainer();

        $annonce = $this->getEntity();
        $annonce->setTitle('');
          
        $errors = $container->get('validator')->validate($annonce);
        $this->assertCount(2, $errors);

    } 
}
