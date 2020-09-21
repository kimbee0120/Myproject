<?php

	if(!defined("IN_CODE")){
		die("not an entry point");
	}

	//define server information
	$server="imc.kean.edu";
	$login="kimeunb";
	$password="1046668";
	$dbname="CPS5740";

	//connect to database
	$con= mysqli_connect($server, $login, $password, $dbname)
	OR die('Could not connect to MySQL'.
			mysqli_connect_error());


?>