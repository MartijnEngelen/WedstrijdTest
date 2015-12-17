<?php

require('../../vendor/autoload.php');

class FailingTest extends PHPUnit_Framework_TestCase
{
    protected $client;

    protected function setUp()
    {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'http://localhost'
        ]);
    }

	//Deze test moet niets meer doen dan falen, is nodig voor demonstratie Jenkins
    public function testFails()
    {
        $this->fail('Test "FailingTest" has failed');
    }
}