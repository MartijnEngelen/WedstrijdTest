<?php



class GetEmailExistsTest extends PHPUnit_Framework_TestCase
{
    protected $client;

    protected function setUp()
    {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'http://localhost',
            'verify' => false
        ]);


    }

	//test of 1 wordt teruggegeven als er een e-mailadres "test@test.be" in de database zit
    public function testReturnsOneOnExistingEmail()
    {
		$response = $this->client->get('/wedstrijdplatform/phpapi/getEmailExists.php', [
            'query' => [
                'email' => 'test@test.be'
            ]
        ]);

		$this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertEquals(1, $data);
    }

	//test of er 0 wordt teruggegeven indien een e-mailadres niet in de database zit
    public function testReturnsZeroOnNonExistingEmail()
    {
		$response = $this->client->get('/wedstrijdplatform/phpapi/getEmailExists.php', [
            'query' => [
                'email' => 'bestaatniet@test.be'
            ]
        ]);

		$this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertEquals(0, $data);
    }
}
