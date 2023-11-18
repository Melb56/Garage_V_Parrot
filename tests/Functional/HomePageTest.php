<?php

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomePageTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        /*$button = $crawler->filter('Nous contacter');
        $this->assertEquals(1, count($button));*/


        $this->assertSelectorTextContains('h1', 'Bienvenue au Garage V. Parrot');
    }
}
