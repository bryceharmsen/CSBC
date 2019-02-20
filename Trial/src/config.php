<?php
	define("DB_SERVER", "localhost:3306");
	define("DB_USERNAME", "bryce_harmsen");
	define("DB_PASSWORD", "Alan1989!");
	define("DB_NAME", "CSBC");

	$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if ($link === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
?>
