<?php 
	
	try {

		$dbhost = "localhost";
		$dbname = "contactapp";
		$dbuser = "root";
		$dbpassword = "";
		$db = new PDO("mysql:host=$dbhost; dbname=$dbname", $dbuser, $dbpassword);
	

	} catch (Exception $e){
		die($e->getMessage);
	}



 ?>