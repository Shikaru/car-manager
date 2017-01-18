<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta content="text/html; charset="utf-8" http-equiv="Content-Type" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="../mystyle.css">
	</head>
	<body>

	<div id='wall'>
		<div id='work_area'>

		<?php include '../headerv02.php';?>
		<?php include '../functions.php';?>
		<?php include '../mySqlFunctions.php';?>
		<br><br>
<table border="0" style="width:100%">
  <tr><td class="aligntotop">
<div id='formulario'> 

	<h1>Agregar vehiculo</h1>
	<form action="<?php echo htmlspecialchars("addVehicle.php");?>" method="post">
	<fieldset style="width:200px">
		<legend>Datos del vehiculo:</legend>
		Placa:<br>
		<input type="text" name="placa" value="" required>
		<br>
		Modelo:<br>
		<input type="text" name="modelo" value="" required>
		<br>
		Año de Compra:<br>
		<input type="text" name="año" value="">
		<br>
		Marca:<br>
		<input type="text" name="marca" value="">
		<br>
		Color:<br>
		<input type="text" name="color" value="">
		<br>
		Serial de Carroceria:<br>
		<input type="text" name="serialCarro" value="">
		<br>
		Serial del Motor:<br>
		<input type="text" name="serial_engine" value="">
		<br>
		Modelo del Motor:<br>
		<input type="text" name="EngineModel" value="">
		<br>
		Modelo de Caja:<br>
		<input type="text" name="TransModel" value="">
		<br><br>
		<input type="submit" value="Agregar Vehiculo" >
	</fieldset>
	</form>
	
	<?php

// define variables and set to empty values
$placa = $modelo = $año = $marca = $color = $serialCarro = $serial_engine = $EngineModel = $TransModel = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $placa = test_input($_POST["placa"]);
  $marca = test_input($_POST["marca"]);
  $modelo = test_input($_POST["modelo"]);
  $año = test_input($_POST["año"]);
  $color = test_input($_POST["color"]);
  $serialCarro = test_input($_POST["serialCarro"]);
  $serial_engine = test_input($_POST["serial_engine"]);
  $EngineModel = test_input($_POST["EngineModel"]);
  $TransModel = test_input($_POST["TransModel"]);
 
$sql = "INSERT INTO `vehiculos` (`Placa`, `Marca`, `Modelo`, `Año`, `Color`, `serial_vehiculo`, `serial_motor`, `modelo_motor`, `modelo_caja`) VALUES ('$placa','$marca','$modelo','$año','$color','$serialCarro', '$serial_engine','$EngineModel','$TransModel');";
	if(addVehicle($sql)){
		echo "<SCRIPT>alert('Consulta realizada con Exito');</SCRIPT>";
	}else{
		echo "<SCRIPT>alert('Transaccion Fallida');</SCRIPT>";
	}
}
?>
	
</div>
</td>
<td class="aligntotop">
<div id='vehiclesTable'><!-- vehiclesTableDiv -->



	<table border="1" style="width:100%;color:#d6d8dd">
  <tr>
    <th>Placa</th>
	<th>Marca</th>
    <th>Modelo</th> 
    <th>Año de compra</th>
	<th>Color</th> 
    <th>Serial de Carroceria</th>
	<th>Serial de Motor</th>
    <th>Modelo del Motor</th> 
    <th>Modelo de Caja</th>
  </tr>
  <tr>
  <?php
	$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);//se conecta con la base de datos
	mysql_query("SET NAMES 'utf8'");//le envia al servidor que se trabajara mediante utf8
	$conn->set_charset ( "utf8" );

	$sql = "SELECT Placa, Marca, Modelo, Año, Color, serial_vehiculo, serial_motor, modelo_motor, modelo_caja FROM vehiculos";
	$result = $conn->query($sql);
//echo $conn->errno . ": " . $conn->error; . "\n";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Placa"]. "</td><td>" . $row["Marca"]. "</td><td>" . $row["Modelo"]. "</td><td>" . $row["Año"]. "</td><td>" . $row["Color"]. "</td><td>" . $row["serial_vehiculo"]. "</td><td>" . $row["serial_motor"]. "</td><td>" . $row["modelo_motor"]. "</td><td>" . $row["modelo_caja"]. "</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
  </tr>
</table>
</div> <!-- vehiclesTableDiv -->
</td></tr>
</div><!-- Work area -->
</div><!-- Wall -->
	</body>
</html>
