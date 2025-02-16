<?php
    $Patient_ID = $_POST['Patient_ID'];
    $Patient_Name = $_POST['Patient_Name'];
    $Doctor_ID = $_POST['Doctor_ID'];
    $Appointment_DT = $_POST['Appointment_DT'];
    
    //Database connection here
    $con = new mysqli("localhost","hms","test1234","hospital_management");
    if($con->connect_error){
         die("Failed to connect:".$con->connect_error);
    } else {
	    $query = "INSERT INTO appointment (Patient_ID, Patient_Name,Doctor_ID,Appointment_DT) VALUES('$Patient_ID', '$Patient_Name','$Doctor_ID','$Appointment_DT')";
  	    $query_run = mysqli_query($con, $query);
          if($query_run)
            {
               $_SESSION['status'] = "Appointment Booked Successfully";
             header("Location: index.html");
            }
            else
            {
              $_SESSION['status'] = "Sorry Appointment Not Booked";
               header("Location: index.html");
            }
  	    
   }
?>

