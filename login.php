<?php
    $Patient_ID = $_POST['Patient_ID'];
    $Password = $_POST['Password'];
    
    //Database connection here
    $con = new mysqli("localhost","hms","test1234","hospital_management");
    if($con->connect_error){
         die("Failed to connect:".$con->connect_error);
    } else {
          $stmt = $con->prepare("select * from login where Patient_ID = ?");
          $stmt->bind_param("i",$Patient_ID);
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
$query = "SELECT * FROM patient JOIN appointment USING (Patient_ID)WHERE Patient_ID = $Patient_ID";
$result = mysqli_query($con, $query);
}
?>

<?php

if ($data['Password'] === $Password){

require_once('db.php');
$query1 = "SELECT * FROM patient JOIN medicalrecord USING (Patient_ID)WHERE Patient_ID = $Patient_ID";
$result1 = mysqli_query($con, $query1);

}
?>

<?php
if ($data['Password'] === $Password){

require_once('db.php');
$query2 = "SELECT * FROM patient WHERE Patient_ID = $Patient_ID";
$result2 = mysqli_query($con, $query2);

}
?>


<html>
<head>
<title>Databases of Patient</title>
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
</head>

<?php
if ($data['Password'] === $Password){
?>

<body>
<h2 class="display-6 text-center">Appointment</h2>
<table class="table table-bordered text-center">
<tr class="bg-dark text-white">
<td>Patient_ID</td>
<td>Patient_Name</td>
<td>Doctor_ID</td>
<td>Appointment_DT</td>
</tr>
<tr>
<?php

   while($row = mysqli_fetch_assoc($result))
   {
?>
   <td><?php echo $row['Patient_ID']; ?></td>
   <td><?php echo $row['Patient_Name']; ?></td>
   <td><?php echo $row['Doctor_ID']; ?></td>
   <td><?php echo $row['Appointment_DT']; ?></td>

</tr>
<?php
}
?>
</table>
</body>

<body>
<h2 class="display-6 text-center">Medical Records</h2>
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
<h2 class="display-6 text-center">Patient</h2>
<table class="table table-bordered text-center">
<tr class="bg-dark text-white">
<td>Patient_ID</td>
<td>Patient_Name</td>
<td>Gender</td>
<td>Phone_number</td>
</tr>
<tr>
<?php

   while($row2 = mysqli_fetch_assoc($result2))
   {
?>
   <td><?php echo $row2['Patient_ID']; ?></td>
   <td><?php echo $row2['firstName']; ?></td>
   <td><?php echo $row2['Gender']; ?></td>
   <td><?php echo $row2['Phone_number']; ?></td>

</tr>
<?php
}
?>
</table>
<?php
}
?>
</body>
</html>
