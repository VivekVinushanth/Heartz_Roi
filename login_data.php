<?php
	session_start();

	$nic = "";
	$email    = "";
	$firstname = "";
	$lastname = "";
	$phonenumber ="";
	$password = "";
	$errors = array();
	$_SESSION['success'] = "";
	$host = 'localhost';
	$user = 'root';
	$pass = 'pass';
	$dbase = 'registration';
	$db = mysqli_connect($host, $user, $pass, $dbase);

	if (!$db) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	if (isset($_POST['reg_user'])) {

		$nic = mysqli_real_escape_string($db,$_POST['nic']);
		$firstname = mysqli_real_escape_string($db,$_POST['firstname']);
		$lastname = mysqli_real_escape_string($db,$_POST['lastname']);
		$email =  mysqli_real_escape_string($db,$_POST['email']);
		$phonenumber = mysqli_real_escape_string($db,$_POST['phonenumber']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$conpass = mysqli_real_escape_string($db,$_POST['conpass']);




	
		$nic_query= $db->query("SELECT * FROM users WHERE nic='$nic'"); 
      	$niccount=mysqli_num_rows($nic_query);
      	if ($niccount ==1) {
        	array_push($errors, "N.I.C. that you entered is already used!"); 
      	}
		if (strlen($nic)!=12 && strlen($nic)!=10){
			array_push($errors, "N.I.C.length is invalid"); 
		}
		
		if (empty($firstname)) {                                                              
			array_push($errors,"First Name is required");
		}
		if (empty($lastname)) {
			array_push($errors,"Last Name is required");
		}
		if (empty($phonenumber)) {
		 array_push($errors, "Phone Number is required");
		}
		if (strlen($phonenumber)!=10){
			array_push($errors, "Phone number length is invalid. Requires 10 digits"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		
		if (empty($password)) { 
			array_push($errors, "Password is required"); 
		}
		if (empty($conpass)) {
			array_push($errors, "Confirming the password is required");
		}
		if ($password != $conpass) {
			array_push($errors, "The passwords do not match");
	
		}

		if (count($errors) == 0) {
			$pass = md5($pass);
			$query = "INSERT INTO users (nic, firstname, lastname, email, phonenumber, password)
					  VALUES('$nic','$firstname', '$lastname', '$email','$phonenumber','$password')";
			mysqli_query($db, $query);

			$_SESSION['nic'] = $nic;
			$_SESSION['success'] = "You are now logged in";
			header('location: home.php');
		}

	}
	
	if (isset($_POST['login_user'])) {
		$nic = mysqli_real_escape_string($db, $_POST['nic']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($nic)) {
			array_push($errors, "N.I.C. is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$pass = md5($pass);
			$query = "SELECT * FROM users WHERE nic='$nic' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['nic'] = $nic;
				$_SESSION['success'] = "You are now logged in";
				header('location: home.php');
			}else {
				array_push($errors, "Wrong N.I.C. or Password combination");
			}
		}
	}
?>