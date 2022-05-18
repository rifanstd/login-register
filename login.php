<?php 
// require files
require 'functions.php'

?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Boostrap CSS -->
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">

	<title>Login Page</title>
</head>
<body>

	<!-- Login -->
	<div class="container mt-5" style="max-width: 500px;">
		<div class="row">
			<form action="" method="post">
				<div class="mb-3">
					<label for="username" class="form-label">Username</label>
					<input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username" placeholder="Inputkan username anda!">
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Inputkan password anda!">
				</div>
				<button type="submit" class="btn btn-primary" name="login">Login</button>
			</form>
		</div>
	</div>
	<!-- End of login -->

	<!-- Execute -->
	<div class="container" style="max-width: 500px;">
		<div class="row text-center">
			<?php if(isset($_POST["login"])) { ?>
				<?php if (login($_POST) === 0) { ?>
					<p style="color: red; font-weight: bold;">Username yang anda masukkan salah !!</p>
				<?php } elseif(login($_POST) === -1) { ?>
					<p style="color: red; font-weight: bold;">Password yang anda masukkan salah !!</p>
				<?php } else { ?>
					<?php header("Location: index.php"); ?>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
	<!-- End of execute -->

</body>
</html>