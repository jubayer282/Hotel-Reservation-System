<?php

/**
* CSE 208 Lab [Project Demo]
* Lab 8
* 14 Oct, 2021
*/

$servername = "localhost";

$dbname = "lab_cse_208_hrs";

$dbusername = "root";

$dbpassword = "";



try {

	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);

// set the PDO error mode to exception

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//echo "Connected successfully";

}

catch(PDOException $e)

{

	echo "Connection failed: " . $e->getMessage();
	exit();

}