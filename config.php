<?php 

	// connect to database
	$conn = mysqli_connect("localhost", "root", "", "tlhogi_lights_online_shop");
	
	if (!$conn)
	{
		die("Error connecting to database: " .mysqli_connect_error());
	}

	
	//define global constants
	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/Tlhogi_lights_online_shop/');
?>