<?php include('login_data.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<style>

        * {
            padding: 0;
            margin: 0;

        }
         

        .header h1 {
            position:fixed;
			left:50px;
			top:35px;
            color: red;
            height: 1px;
            width: 100%;
        }

        

    </style>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
	<div class="center">
	<div class="header">
		<h1>Sign Up</h1>
	</div>

	<form method="post" action="reg.php">

		<?php include('errors.php'); ?>

		<div class="form-group">
			<label>N.I.C.</label>
			<input type="text" class="form-control" name="nic" value="<?php echo $nic; ?>" placeholder="Enter your National Identity Card number">
		</div>
		<div class="form-group">
			<label>First Name</label>
			<input type="text"  class="form-control" name="firstname" value="<?php echo $firstname; ?>" placeholder="Enter your First Name">
		</div>
		<div class="form-group">
			<label>Last Name</label>
			<input type="text"  class="form-control" name="lastname" value="<?php echo $lastname; ?>" placeholder="Enter your Last Name">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Enter your Email">
		</div>
		<div class="form-group">
			<label>Phone Number</label>
			<input type="phonenumber" class="form-control" name="phonenumber" value="<?php echo $phonenumber; ?>" placeholder="Enter your Phone Number ">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Enter the Password">
		</div>
		<div class="form-group">
			<label>Confirm password</label>
			<input type="password" class="form-control" name="conpass" placeholder="ReEnter the Password">
		</div>
		<div class="col-xs-8 col-sm-9 col-md-9">
					 By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
		</div>
		<div class="modal-footer">
				<input type="checkbox" value="" required>I Agree</input>
		</div>
		<div class="form-group col-md">
			<button type="submit" class="btn btn-primary btn-block" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</div>
</body>
</html>
