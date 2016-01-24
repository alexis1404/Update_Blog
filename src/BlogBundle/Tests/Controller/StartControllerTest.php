<?php

namespace BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StartControllerTest extends WebTestCase
{
    public function testStart()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/welcome');

        $this->assertTrue($crawler->filter('html:contains("Welcome!")')->count() > 0);

        $link = $crawler
            ->filter('a:contains("Читать дальше")')
            ->eq(2)
            ->link();

        $crawler = $client->click($link);

        $form = $crawler->selectButton('Comment!')->form();

        $form['form[authorComment]'] = 'Crawler';
        $form['form[textComment]'] = $this->generate();

        $crawler = $client->submit($form);

    }

    //Function for generate random string

    function generate ($length = 64) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $result = '';
        for ($i = 0; $i <= $length; $i++) {
            $result .= $characters[mt_rand (0, strlen ($characters) - 1)];
        }
        return $result;
    }
}

