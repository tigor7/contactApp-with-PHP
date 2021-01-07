<?php require 'includes/header.php'; ?>

<?php 
	require 'db.php';

	session_start();

	if (isset($_POST["SignUpbtn"])) {

		if (($_POST["email"] != null) && ($_POST["password"] != null) && ($_POST["conPassword"] != null) && ($_POST["name"] != null)) {
			
			$email = $_POST["email"];
			$password = $_POST["password"];
			$conPassword = $_POST["conPassword"];
			$name = $_POST["name"];

			if ($password == $conPassword) {

				
				$emailVerify = "SELECT * FROM user where email='$email'";

				
				$stmtEmail = $db->prepare($emailVerify);
				$stmtEmail->execute();
				$count = $stmtEmail->rowCount();
				
				if ($count == 0) {
					$passwordEncripted = password_hash($password, PASSWORD_DEFAULT);
			
					$sql = "INSERT INTO user(email, password, name) VALUES (:email, :password, :name)";

					$stmt = $db->prepare($sql);
					$stmt->execute(array(":email"=>$email, ":password"=>$passwordEncripted, ":name"=>$name));
				} else {

					$_SESSION["errorMessage"] = "Email alredy exists";
					
				}
				

			} else {
				$_SESSION["errorMessage"] = "Password do not match";
			}
		
		} else {

			
			$_SESSION["errorMessage"] = "fill in all the fields";

		}
		
	}





 ?>
 	
 	<div class="container p-4">
 		<div class="row">
 			<div class="col-md-4 mx-auto">
 				<div class="card card-body">
 					<p class="text-center font-weight-bold">Sign Up</p>
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
 						<input type="text" name="name" class="form-control m-2" placeholder="name">
 						<input type="text" name="email" class="form-control m-2" placeholder="email">
 						<input type="text" name="password" class="form-control m-2" placeholder="password">
 						<input type="text" name="conPassword" class="form-control m-2" placeholder=" confirm your password">
 						<input name="SignUpbtn"type="submit" value="Sign Up"class="btn btn-success btn-block m-2">
 						
 						<p class="m-2">Alredy have an account? <a href="login.php">Login</a></p>
 				</div>
 						
 					</form>
 				</div>
 			</div>
 		</div>
 	</div>


<?php require 'includes/footer.php'; ?>