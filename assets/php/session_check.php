<?php

	//deze session vars worden in de API geset als de gebruiker successvol ingelogd is! (als dit enigzins mogelijk is)

	session_start();
	if(isset($_SESSION['isLoggedIn'], $_SESSION['email']) && $_SESSION['isLoggedIn'] == "true"){
		echo "<h1>Session vars were set! " . $_SESSION['isLoggedIn'] . ", " . $_SESSION['email'] . "</h1>";
		echo "<a href='phpAPI/logout.php'>Klik hier om uit te loggen</a>";
	}else{
		//echo "<h1>Session vars not set! Redirect to login!</h1>";
		echo "<script type=\"text/javascript\"> window.location.assign(\"#/home\");</script>";
		die();
	}
?>