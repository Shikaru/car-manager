
<?php
$servername = "localhost";
$username = "shikaru";
$password = "a1s2d3f4g5h6j7k8l9";
$dbname = "acr";

function addVehicle($data) {
	$conn = mysql_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password']);//se conecta con la base de datos
	mysql_query("SET NAMES 'utf8'");//le envia al servidor que se trabajara mediante utf8
	$db = mysql_select_db($GLOBALS['dbname']);//selecciona la base de datos
	$result = mysql_query($data);//envia la consulta
return $result;
}
?>
