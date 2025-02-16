<?php 
 
$conn = mysqli_connect('localhost','hms','test1234','hospital_management');

$sql = 'SELECT Patient_ID,Patient_Name FROM patient';

$result = mysqli_query($conn, $sql);
$patient = mysqli_fetch_all($result, MYSQLI_ASSOC);
//mysqli_free_result($result);
mysqli_close($conn);
print_r($patient);

  ?>
