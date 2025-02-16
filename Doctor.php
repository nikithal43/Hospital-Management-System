<?php 
 $Doctor_ID = $_POST['Doctor_ID'];
    $Password = $_POST['Password'];
    
    //Database connection here
    $con = new mysqli("localhost","hms","test1234","hospital_management");
    if($con->connect_error){
         die("Failed to connect:".$con->connect_error);
    } else {
          $stmt = $con->prepare("select * from doctor_login where Doctor_ID = ?");
          $stmt->bind_param("i",$Doctor_ID);
          $stmt->execute();
          $stmt_result = $stmt->get_result();
          if($stmt_result->num_rows > 0) {
              $data = $stmt_result->fetch_assoc();
              if ($data['Password'] === $Password){
                   echo "<h2>Login Successfully</h2>";
              } else {
                  echo "<h2>Invalid Patient_ID or Password</h2>";
                 }
              } else {
              echo "<h2>Invalid Patient_ID or Password</h2>";
                 }
     }
   ?>
   
<?php
if ($data['Password'] === $Password){

require_once('db.php');
$query = "SELECT * FROM doctor WHERE Doctor_Id= $Doctor_ID";
$result = mysqli_query($con, $query);
}
?>

<?php

if ($data['Password'] === $Password){

require_once('db.php');
$query1 = "SELECT * FROM medicalrecord";
$result1 = mysqli_query($con, $query1);

}
?>

<?php
if ($data['Password'] === $Password){

require_once('db.php');
$query2 = "SELECT * FROM appointment WHERE Doctor_Id= $Doctor_ID";
$result2 = mysqli_query($con, $query2);

}
?>


<html>
<head>
<style>
table {
  width:50%;
  border:2px solid;
  border-color:black;
  color:black;
  border: 1px solid;
  background-color:hsl(0, 0%, 90%);;
}
td {
  text-align:left;
  font-size:18px;
font-family:Ariel;
}
body{
  background-color:LightGray;
  background-image: url('img1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
<title>Databases of Doctor</title>
</head>
<?php
if ($data['Password'] === $Password){
?>
<body>
<h3 class="display-6 text-center">Doctor</h3>
<table class="table table-bordered text-center">
<tr class="bg-dark text-white">
<td>Doctor_ID</td>
<td>Doctor_Name</td>
<td>Specialist</td>
</tr>
<tr>
<?php

   while($row = mysqli_fetch_assoc($result))
   {
?>
   <td><?php echo $row['Doctor_ID']; ?></td>
   <td><?php echo $row['Doctor_Name']; ?></td>
   <td><?php echo $row['Specialization']; ?></td>

</tr>
<?php
}
?>
</table>
</body>
</html>


<body>
<h3 class="display-6 text-center">Medical Records</h3>
<table class="table table-bordered text-center">
<tr class="bg-dark text-white">
<td>Patient_ID</td>
<td>Drugs</td>
<td>Diagnosis</td>
<td>Date</td>
</tr>
<tr>
<?php
   while($row1 = mysqli_fetch_assoc($result1))
   {
?>
   <td><?php echo $row1['Patient_ID']; ?></td>
   <td><?php echo $row1['Drugs']; ?></td>
   <td><?php echo $row1['Diagnosis']; ?></td>
   <td><?php echo $row1['Date']; ?></td>

</tr>
<?php
}
?>
</table>
</body>

<body>
<h3 class="display-6 text-center">Appointment</h3>
<table class="table table-bordered text-center">
<tr class="bg-dark text-white">
<td>Patient_ID</td>
<td>Patient_Name</td>
<td>Doctor_ID</td>
<td>Appointment_DT</td>
</tr>
<tr>
<?php

   while($row2 = mysqli_fetch_assoc($result2))
   {
?>
   <td><?php echo $row2['Patient_ID']; ?></td>
   <td><?php echo $row2['Patient_Name']; ?></td>
   <td><?php echo $row2['Doctor_ID']; ?></td>
   <td><?php echo $row2['Appointment_DT']; ?></td>

</tr>
<?php
}
?>
<?php
}
?>
</table>

</body>
</html>
