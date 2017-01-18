<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<title></title>
	</head>
	<body>
	<div id="wall">

	<?php include 'header.php';?>




<?php
$servername = "localhost";
$username = "shikaru";
$password = "a1s2d3f4g5h6j7k8l9";
$dbname = "acr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Placa, Marca, Modelo FROM vehiculos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["Placa"]. " - Name: " . $row["Marca"]. " " . $row["Modelo"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</div><!--wall-->
	</body>
</html>
