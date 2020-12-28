<?php require 'includes/header.php'; ?>
 	
 	<div class="container p-4">
 		<div class="row">
 			<div class="col-md-4 mx-auto">
 				<div class="card card-body">
 					<p class="text-center font-weight-bold">login</p>
 					<form action="" method="post"><div class="form-group">
 						<input type="text" name="title" class="form-control m-2" placeholder="email">
 						<input type="text" name="title" class="form-control m-2" placeholder="password">
 						<input name="edit"type="submit" value="Login" class="btn btn-success btn-block m-2">
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