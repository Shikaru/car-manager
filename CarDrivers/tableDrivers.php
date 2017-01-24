<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta content="text/html"; charset="utf-8" http-equiv="Content-Type" />
		
	</head>
	<body>
	<?php include '../mySqlFunctions.php';
	include '../functions.php';?>

	<table border="1">
  <tr>
    <th>Nombre</th>
	<th>Cedula</th>
    <th>Edad</th> 
    <th>Vencimiento de Licencia</th>
	<th>Vencimiento de Carta Medica</th> 
    <th>Telefono</th>
	<th>Cumpleaños en</th>
  </tr>
  <tr>
  <?php
	$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);//se conecta con la base de datos
	mysql_query("SET NAMES 'utf8'");//le envia al servidor que se trabajara mediante utf8
	$conn->set_charset ( "utf8" );

	//$sql = "SELECT Placa, Marca, Modelo, Año, Color, serial_vehiculo, serial_motor, modelo_motor, modelo_caja FROM vehiculos";
	$sql = "SELECT * FROM arrendatarios";
	$result = $conn->query($sql);
//echo $conn->errno . ": " . $conn->error; . "\n";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
	//	$fechaactual = time();
		$fechaactual = date('y-m-d');
		$fechaactual = new DateTime($fechaactual);

		$fechadenacimiento = $row["fecha-nacimiento"];
		$fechadenacimiento = new DateTime($fechadenacimiento);
		$edad = $fechaactual->diff($fechadenacimiento);
		$edad = $edad->format('%y');

		
		$fechadevencimientodelicencia = $row["licencia_vence"];
		$fechadevencimientodelicencia = new DateTime($fechadevencimientodelicencia);
		$licDias = $fechaactual->diff($fechadevencimientodelicencia);//->days;
		$licDias = $licDias->format('%r%a');
		
		$fechadevencimientodeCartaM = $row["cartam_vence"];
		$fechadevencimientodeCartaM = new DateTime($fechadevencimientodeCartaM);
		$cartaDiasV = $fechaactual->diff($fechadevencimientodeCartaM);
		$cartaDiasV = $cartaDiasV->format('%r%a');
		
		
		///////// CUMPLEAÑOS/////////
		// poner un if si el mes y dia es mayor o menor comparando el actual con el de nacimiento
		$birthDate = new DateTime ;
		
		$born_mes = $fechadenacimiento->format('n');
		$today_mes = $fechaactual->format('n');
	
		$born_day = $fechadenacimiento->format('d');
		$today_day = $fechaactual->format('d');
		
		$nextCumpleYear=$fechaactual->format('y');
		if ($today_mes <= $born_mes && $today_day <= $born_day  ){
		}else {
			$nextCumpleYear+=1; 
			
		}
		$birthDateStamp = mktime(0,0,0,$born_mes,$born_day,$nextCumpleYear);
		$birthDate->setTimestamp($birthDateStamp);
		//test
		//echo '<br><br>' . $row["nombre"] . '<br>Fecha de nacimiento: ' . $fechadenacimiento->format('d-m-Y');
		echo '<br><br>';
		echo $fechadenacimiento->format('d-m-y');
		echo daysUntilBirthdate($fechadenacimiento); //llamada a otro archivo
		echo daysUntilBirthdate($fechadenacimiento); //llamada a otro archivo
		
		$birthDatediff = $fechaactual->diff($birthDate);
		$birthDatediff = $birthDatediff->format('%a');
		echo '<br>__________________________________________________________________________________<br>';
		echo "<tr><td>" . $row["nombre"] . " " . $row["apellido"]. "</td><td>" . $row["cedula"]. "</td><td>" . $edad . "</td><td>" . $licDias . " dias</td><td>" . $cartaDiasV. " dias</td><td>" . $row["telefono01"]. "</td><td>" . $birthDatediff . "-" . daysUntilBirthdate($fechadenacimiento) . " días</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
  </tr>
</table>

	</body>
</html>
