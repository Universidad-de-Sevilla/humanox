<?php

use Silex\Application;
use Silex\WebTestCase;

class ApplicationTest extends WebTestCase
{
    public function createApplication()
    {
        $app = new Application();
        $app['session.test'] = true;

        return $app;
    }

    public function test404()
    {
        $client = $this->createClient();
        $client->request('GET', '/give-me-a-404');
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }

    public function testInitialPage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');
//        $this->assertEquals(200, $client->getResponse()->getStatusCode());
//        $this->assertTrue($client->getResponse()->isOk());
//        $this->assertCount(1, $crawler->filter('h3:contains("Recursos Humanos Universidad de Sevilla")'));
    }

    public function testNothing()
    {
        $this->assertTrue(true, true);
    }
}