<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h1>Order completed</h1>
	<?php $p= $_GET['pNo'];
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="mcdb";
	$conn=mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
	$sql = "INSERT INTO Orders (PrescriptionNo) VALUES ($p)";
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	?>
	<p>Your order has been recorded successfully.</p>
	<p>The details will be send you through an e-mail.</p>
	<button onclick="next()">Ok</button>
	<script>
		function next(){
			window.location.href="index.php";
		}
	</script>
</body>
</html>