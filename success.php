<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h1>Order completed</h1>
	<?php $p= $_GET['pNo'];
	$addr=$_GET['addr'];
	$dmethod=$_GET['dmethod'];
	$pmethod=$_GET['pmethod'];
	$d=strpos($p,"-");
	$id=substr($p,0,$d);
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="mcdb";
	$conn=mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
	$sql = "INSERT INTO Orders (id, PrescriptionNo, DeliveryMethod, Address, DateAndTime, PaymentMethod, StatusOfDelivery) VALUES ('".$id."','".$p."','".$dmethod."','".$addr."','".date('Y-m-d H:i:s')."','".$pmethod."','to be delivered')";
	if ($conn->query($sql) === TRUE) {
	    echo "Your order has been recorded successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	?>
	<p>The details will be send you through an e-mail.</p>
	<button onclick="next()">Ok</button>
	<script>
		function next(){
			window.location.href="index.php";
		}
	</script>
</body>
</html>