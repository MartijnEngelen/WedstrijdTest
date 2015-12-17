<?php

//eerst controleren of er wel toegang is tot de API (beveiligen met username & password)
	require_once('../assets/php/medoo.min.php');
	
	$database = new medoo();
	
	$decoded = json_decode(file_get_contents('php://input'),true);
	//$decoded = json_decode($data, true);	
	
	$email = $decoded['email'];
	$pw = $decoded['wachtwoord'];

	$hash =  password_hash($pw, PASSWORD_DEFAULT); //Moet nog een check of het gefaild is of niet
		
	
	echo $database->insert("gebruikers", ["email" => $email,"wachtwoord" => $hash]);
	
	
?>