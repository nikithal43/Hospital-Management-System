<?php
$con = new mysqli("localhost","hms","test1234","hospital_management");
    if($con->connect_error){
         die("Failed to connect:".$con->connect_error);
    } 