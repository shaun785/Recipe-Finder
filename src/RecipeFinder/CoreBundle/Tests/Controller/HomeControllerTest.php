<?php

namespace RecipeFinder\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/*
* Home Controller Test
* @author Shaunak Deshmukh
* @since 1.0
*/

class HomeControllerTest extends WebTestCase
{
    public function testIndex()
    {
    	//test if the client side is working
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Find your recipe")')->count() > 0);
    }
}
