<!DOCTYPE html>
<html>
<head>	
<style>
	div {
		margin-top: 20px;
		margin-bottom: 20px;
	}
</style>


</head>
<body>

<?php 
// The code that you recieve input data from the form goes to here.

$answer1 = $_POST["q1_fn"];
$answer2 = $_POST["q1_ln"];
$answer3 = $_POST["q3_email"];
$answer4 = $_POST["q4_address"];
$answer5 = $_POST["q5_city"];

$server = "localhost";
$username = "root";
$password = "password";
$db = "sakila";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
	die("Failed: " .mysqli_connect_error());
}
$count = 1;
$arrayTwo = ["first_name", "last_name", "email", "address", "city"];

echo"<table>";

foreach ($arrayTwo as $index){ 
	echo"<tr>";
	for $i = 0; $i < 1; $i++) {
		echo "<th>". $index . "</th>";
		echo "<td>". $_POST[$index] . "</td>";
		if ($counter == 1){ 
			$sql = "SELECT first_name
				FROM customer
				WHERE first_name like '". $_POST[$index] . "'";
			$result = mysqli_query($conn, $sql);
			if ($result -> num_rows === 0) {
				echo "<td>new</td>";
			} else {
				echo "<td>exist</td>";
			}
		} else if ($counter == 2) {
			$sql = "SELECT last_name
				FROM customer
				WHERE last_name like '". $_POST[$index]. "'";
			$result = mysqli_query($conn, $sql);
			if ($result -> num_rows === 0)	{
				echo "<td>new</td>";
			} else {
				echo "<td>exist</td>";
			}
		} else if ($counter == 3) {
			$sql = "SELECT email
				FROM customer
				WHERE email like '". $_POST[$index] ."'";
			$result = mysqli_query($conn, $sql);
			if ($result -> num_rows === 0) {
				echo "<td>new</td>";
			} else { 
				echo "<td>exist</td>";
			}
		} else if ($counter == 4) {
			$sql = "SELECT address
				FROM address
				WHERE address like '". $_POST[$index] ."'";
			$result = mysqli_query($conn, $sql);
			if ($result -> num_rows === 0) {
				echo "<td>new</td>";
			} else { 
				echo "<td>exist</td>";
			}
		} else { 
			$sql = "SELECT city
				FROM city
				WHERE first_name like '". $_POST[$index]. "'";
			$result = mysqli_query($conn, $sql);
			if ($result -> num_rows === 0) {
				echo "<td>new</td>";
			} else { 
				echo "<td>exist</td>";
			}
		}
	}
	$counter++;
	echo "</tr>";
}
echo "</table>";
mysqli_close($conn);




?>



</body>
</html>
