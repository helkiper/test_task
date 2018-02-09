<?php

namespace Helkiper\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

//        $crawler = $client->request('GET', '/');
        $crawler = $client->request('GET', '/');

        $this->assertEquals(1, $crawler->filter('nav')->count());
    }
}
