
<?php

function test_input($data) {
  $data = trim($data, " ");
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function daysUntilBirthdate(DateTime $birthdateVar){
	$birthdate = $birthdateVar;
	$todayDate = new DateTime();//Object DateTime
	$edad = $birthdate->diff($todayDate)->format('%y');//string
	$birthday_Date = $birthdate;
	echo '<br>((BEFORE))' . $birthdate->format('d-m-y');
	$birthday_Date->add(new DateInterval ('P'.($edad+1).'Y'));//Object DateTime
	//$birthday_Date->modify('+'.$edad.' year');//Object DateTime
	echo '<br>((AFTER))' . $birthdate->format('d-m-y');
	echo '<br><br>';

	echo 'dia de hoy:' . $todayDate->format('d-m-y') . '<br>';
	echo 'dia de nacimiento:' . $birthdate->format('d-m-y') . '<br>';
	echo 'edad: ' . $edad . '<br>';
	echo 'proximo cumpleaños:' . $birthday_Date->format('d-m-y');	echo '<br>';
	
	

	
return ($todayDate->diff($birthday_Date)->format('%a')+1);	
}

?>
