//<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="#">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="register.php">

		//<?php include('errors.php'); ?>

		<div class=>
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class=>
			<label>Full Name</label>
			<input type="text" name="fullname" value="<?php echo $fullname; ?>">
		</div>
		<div class=>
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class=>
			<label>Phone Number</label>
			<input type="number" name="phonenumber" value="<?php echo $phonenumber; ?>">
		</div>
		<div class=>
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class=>
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class=>
			<button type="submit" class= name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="#">Sign in</a>
		</p>
	</form>
</body>
</html>
