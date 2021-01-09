<?php 
	require 'db.php';

	session_start();

	if (!empty($_SESSION["userEmail"]) && !empty($_SESSION["userName"]) && !empty($_SESSION["userID"])) {
		$contactID = $_GET["ID"];
		$sql = "DELETE FROM contact WHERE ID = :contactID";

		$stmt = $db->prepare($sql);
		$stmt->execute(array(":contactID"=>$contactID));
		header("location:index.php");
	} else {
		header("location:login.php");
	}
 ?>