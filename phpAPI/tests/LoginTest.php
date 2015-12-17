<?php



class LoginTest extends PHPUnit_Framework_TestCase
{
    protected $client;

    protected function setUp()
    {

        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'http://localhost'
        ]);

            $this->client->setDefaultOption('verify', false);
    }

	//test of er een gebruiker met e-mailadres "test@test.be" en wachtwoord "test" in de database zit
    public function testReturnsUserOnValidLogin()
    {
        $response = $this->client->post('/wedstrijdplatform/phpapi/getUserByEmail.php', [
                'body' => '{"email": "test@test.be", "wachtwoord": "test"}'
			]);


        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

		//var_dump($data);

        $this->assertArrayHasKey('gebruiker_id', $data);
        $this->assertArrayHasKey('naam', $data);
        $this->assertArrayHasKey('voornaam', $data);
        //$this->assertEquals(42, $data['price']);
    }

	//test of er false teruggegeven wordt als het e-mailadres niet bestaat
    public function testReturnsFalseOnNonExistingEmail()
    {
        $response = $this->client->post('/wedstrijdplatform/phpapi/getUserByEmail.php', [
                'body' => '{"email": "bestaatniet@test.be"}'
			]);


        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertEquals(false, $data);
    }

	//test of er false teruggegeven wordt als het wachtwoord niet klopt, maar het e-mailadres wel bestaat
    public function testReturnsFalseOnWrongPasswordWithExistingEmail()
    {
        $response = $this->client->post('/wedstrijdplatform/phpapi/getUserByEmail.php', [
                'body' => '{"email": "test@test.be", "wachtwoord": "foutWachtwoord"}'
			]);


        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertEquals(false, $data);
    }

}
