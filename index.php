<?php 

	require 'db.php';
	session_start();
	if (!empty($_SESSION["userEmail"]) && !empty($_SESSION["userName"]) && !empty($_SESSION["userID"])) {
		
	} else {
		header("location:login.php");
	}
	if (isset($_POST["btn"])) {
		unset($_SESSION["userEmail"]);
		header("location:login.php");
	}



	if (isset($_POST["submit"])) {

		$contactName = $_POST["contactName"];
		$contactNumber = $_POST["contactNumber"];
		
		

		$sql = "INSERT INTO contact (contactName, contactNumber, userID) VALUES (:contactName, :contactNumber, :userID)";
		$stmt = $db->prepare($sql);
		$stmt->execute(array(":contactName"=>$contactName, ":contactNumber"=>$contactNumber, ":userID"=>$_SESSION["userID"]));
		header("location:index.php");
		
		
		
	}



 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- BOOTSTRAP CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!-- FONT AWESOME SCRIPTS -->
	<script src="https://kit.fontawesome.com/49b6ed66b0.js" crossorigin="anonymous"></script>
	<title>contactApp with PHP</title>
</head>
<body>

	<nav class="navbar navbar-dark bg-dark">
		<div class="container">
			<a href="index.php" class="navbar-brand">contactApp with PHP</a>
			<form action="" method="post">
				<button class="btn btn-success" name="btn">logout</button>
			</form>
			
		</div>

	</nav>
	<div class="container p-4">
 		<div class="row">
 			<div class="col-md-4 mx-auto">
 				<div class="card card-body">
 					<p class="text-center font-weight-bold">Enter a new contact</p>
 						<form action="" method="post">
	 						<div class="form-group">
		 						<input type="text" name="contactName" class="form-control mx-1 my-2" placeholder="contactNumber">
		 						<input type="text" name="contactNumber" class="form-control mx-1 my-2" placeholder="contactNumber">
		 						<input name="submit"type="submit" value="Submit" class="btn btn-success btn-block mx-1 my-2">
	 						</div>
 						
 					</form>
 				</div>
 			</div>
 		</div>
 	</div>	

<?php 

	$sql = "SELECT * FROM contact WHERE userID = :userID";

	$stmt = $db->prepare($sql);

	$stmt->execute(array(":userID"=>$_SESSION["userID"]));


	while ($row = $stmt->fetch()):

 ?>

	<div class="container p-4">
 		<div class="row">
 			<div class="col-md-4 mx-auto">
 				<div class="card card-body ">
 					<p class="text-center h2 "><?php echo $row["contactName"]; ?></p>
 					<p class="text-center "><?php echo $row["contactNumber"]; ?></p>
 					<a href="<?php echo 'delete.php?ID=' . $row['ID']?>" class="btn btn-danger">Delete</a>

 				</div>
 			</div>
 		</div>
 	</div>
	

<?php endwhile; ?>












<?php 
	require("includes/footer.php");

 ?>