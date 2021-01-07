<?php require 'includes/header.php'; ?>

<?php 
	require 'db.php';
	session_start();

	if (isset($_POST["loginbtn"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];

		$sql = "SELECT * FROM user WHERE email=:email";

		$stmt = $db->prepare($sql);
		$stmt->execute(array(":email"=>$email));

		$row = $stmt->fetch();
		
		if ($stmt->rowCount() > 0 && password_verify($password, $row['password'])) {
			
			$_SESSION["userEmail"] = $row["email"];
			$_SESSION["userName"] = $row["name"];
			header("location:index.php");
		} else {
			$_SESSION["errorMessage"] = "Email or password incorrent";
		}
	}




 ?>	
 	<div class="container p-4">
 		<div class="row">
 			<div class="col-md-4 mx-auto">
 				<div class="card card-body">
 					<p class="text-center font-weight-bold">login</p>
 					
 					<?php if (isset($_SESSION["errorMessage"])): ?>
	 						<div class="alert alert-warning alert-dismissible fade show" role="alert">
	 							<?php if (isset($_SESSION["errorMessage"])){ 
	 								echo $_SESSION["errorMessage"];
	 								unset($_SESSION["errorMessage"]);
	 							}
	 							
	 							 ?>
	 							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
						<?php endif; ?>

 					<form action="" method="post"><div class="form-group">
 						<input type="text" name="email" class="form-control m-2" placeholder="email">
 						<input type="text" name="password" class="form-control m-2" placeholder="password">
 						<input name="loginbtn"type="submit" value="Login" class="btn btn-success btn-block m-2">
 						<p class="m-2"><a href="#">forgot your password?</a></p>
 						<p class="m-2">New user? <a href="SignUp.php">Sign Up</a></p>
 					</div>
 						
 					</form>
 				</div>
 			</div>
 		</div>
 	</div>

<?php 

	require 'db.php';





 ?>
<?php require 'includes/footer.php'; ?>