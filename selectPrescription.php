<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
</head>
<body>
	<h1>Select the prescription you want to order:</h1>
	<?php
	$id=1;
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="mcdb";
	$conn=mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
	$sql = "SELECT Date, Doctor, PrescriptionNo FROM visits where id='".$id."'";
	$result = $conn->query($sql);
	echo "<table>
		<tr>
			<th>Date</th>
			<th>Doctor</th>
			<th>Prescription no</th>
		</tr>";
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	echo "<form action='delivery.php' method='GET'>";
	    	echo "<tr>";
	    	echo "<td>".$row["Date"]."</td>";
	    	echo "<td>".$row["Doctor"]."</td>";
	    	echo "<td>".$row["PrescriptionNo"]."</td>";
	    	echo "<input type='hidden' name='pNo' value='".$row["PrescriptionNo"]."' >";
	    	echo "<input type='hidden' name='addr' value=''>";
	    	echo "<input type='hidden' name='dmethod' value=''>";
	    	echo "<td><input type='submit' value='Select'></td>";
	        echo "</tr>";
	        echo "</form>";
	    }
	} else {
		echo "0 results";
	}
	$conn->close();
	echo "</table>";
	?>
	<button onclick="back()">Back</button>
	<script>
		function back(){
			window.location.href="index.php";
		}
	</script>

</body>
</html>