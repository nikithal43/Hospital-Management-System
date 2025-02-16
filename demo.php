<?php
session_start();
$con = mysqli_connect("localhost","hms","test1234","hospital_management");

if(isset($_POST['save_datetime']))
{
   $name = $_POST['name'];
   $eventdt = $_POST['eventdt'];
  
   
   $query = "INSERT INTO demo (name,eventdt) VALUES ('$name','$eventdt')";
   $query_run = mysqli_query($con, $query);
   
   if($query_run)
   {
       $_SESSION['status'] = "Appointment Booked Successfully";
       header("Location: datetime.php");
   }
   else
   {
       $_SESSION['status'] = "Sorry Appointment Not Booked";
       header("Location: datetime.php");
   }

}
?>
