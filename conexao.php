<?php
	$host = "localhost:3306";
    $db_name = "meed";
    $username = "root";
    $password = "guguliberato24";
	$conn = null;
	

	try{
		$conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
	}catch(PDOException $exception){
		echo "Connection error: " . $exception->getMessage();
		die();
	}
?>