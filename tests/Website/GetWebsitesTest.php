<?php
namespace App\Tests\Website;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetWebsitesTest extends WebTestCase
{
/**
 * @dataProvider provideUrls
 */
    public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertEquals(
            200,
            $client->getResponse()->getStatusCode()
        );
    }

    public function provideUrls()
    {
        return [
            ['/mitarbeiter/'],
            ['/teilnehmer/'],
            ['/firma/'],
            ['/funktion/'],
            ['/massnahmeart/'],
            ['/berufswunsch/'],
            ['/eintragsbereich/'],
            ['/massnahme/'],
            ['/eintragung/'],
            ['/praktika/']
        ];
    }
}