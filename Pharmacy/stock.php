<?php
$db=mysqli_connect("localhost","root","pass","pharmacy");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($db,"SELECT * FROM stock");

echo "<table border='1'>
<tr>
<th>Code</th>
<th>Description</th>
<th>Pack Size</th>
<th>Unit price</th>
<th>Active Grades</th>
<th>Active Grades</th>
<th>Supplier</th>
</tr>";

while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td>" . $row['code'] . "</td>";
	echo "<td>" . $row['description'] . "</td>";
	echo "<td>" . $row['packSize'] . "</td>";
	echo "<td>" . $row['unitPrice'] . "</td>";
	echo "<td>" . $row['activeGrades'] . "</td>";
	echo "<td>" . $row['sup_code'] . "</td>";
	echo "<td>" . $row['supplier'] . "</td>";
	echo "</tr>";
}
echo "</table>";

mysqli_close($db);
?>
