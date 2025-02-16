<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $Patient_ID = $_POST['Patient_ID'];
    $gender = $_POST['gender'];
    $Phone_number = $_POST['Phone_number'];
    $Password = $_POST['Password'];

    $con = new mysqli("localhost","hms","test1234","hospital_management");
    if($con->connect_error){
         die("Failed to connect:".$con->connect_error);
    } else {
        $stmt = $con->prepare("insert into registerform(firstName, lastName, Patient_ID, gender, Phone_number, Password) values (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssis",$firstName, $lastName, $Patient_ID, $gender, $Phone_number, $Password);
        $stmt->execute();
        echo "Registeration Successful";
        $stmt->close();
        $con->close();
    }
?>