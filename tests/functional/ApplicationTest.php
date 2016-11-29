<?php
/**
 * Project portus - ApplicationTest.php
 * Created 5/5/16 - 14:15
 */

use Silex\Application;
use Silex\WebTestCase;

class ApplicationTest extends WebTestCase
{
    public function createApplication()
    {
        // Silex
        $app = new Application('test');
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
        $this->assertTrue($client->getResponse()->isOk());
        $this->assertCount(1, $crawler->filter('h1:contains("Welcome")'));
    }
}