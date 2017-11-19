<!DOCTYPE html>
<html>
<head>	
<style>
	div {
		margin-top: 20px;
		margin-bottom: 20px;
	}
</style>

<script>
function validateForm() {
    // you can write a code for validating your forms (if you want).
}
</script>

</head>
<body>

<?php 

// forms need to be generated here inside the PHP tag.

$server = "localhost";
$username = "root"
$password = "password";
$db = "sakila";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
	die("Failed:" . mysqli_connect_error());
}

$sql = "SELECT first_name, last_name, email, address, city
	FROM customer as c
	JOIN address as a on c.address_id = a.address_id
	JOIN city as y on y.city_id = a.city_id
	ORDER BY c.last_name
	LIMIT 1 OFFSET 9";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$array = ["first name:", "last name:", "email:", "address:", "city:"];
$arrayTwo = ["first_name", "last_name", "email", "address", "city"];

echo "<form name='info' action='form_display.php' method='POST'>";

for ($i = 0; $i < 0 count($arr); $i++) {
	echo "".$arr[$i]."<input type='text' name=". $arrTwo[$i] . " value='" .$row[$arrTwo[$i]]. "'><br>";
}

echo "<input type='submit'>";
echo "</form>";

mysqli_close;



?>

</body>
</html>
