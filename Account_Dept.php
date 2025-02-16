<?php
    $AccDept_ID = $_POST['AccDept_ID'];
    $Password = $_POST['Password'];
    
    //Database connection here
    $con = new mysqli("localhost","hms","test1234","hospital_management");
    if($con->connect_error){
         die("Failed to connect:".$con->connect_error);
    } else {
          $stmt = $con->prepare("select * from acc_login where AccDept_ID = ?");
          $stmt->bind_param("i",$AccDept_ID);
          $stmt->execute();
          $stmt_result = $stmt->get_result();
          if($stmt_result->num_rows > 0) {
              $data = $stmt_result->fetch_assoc();
              if ($data['Password'] === $Password){
                   echo "<h2>Login Successfully</h2>";
              } else {
                 echo "<h2>Invalid AccDept_ID or Password</h2>";
             }
          } else {
              echo "<h2>Invalid AccDept_ID or Password</h2>";
           }
     }
?>

<?php
if ($data['Password'] === $Password){
require_once('db.php');
$query = "SELECT * FROM accountdept";
$result = mysqli_query($con, $query);
}
?>

<html>
<head>
<title>Accounts Database</title>
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
<h2 class="display-6 text-center">Accounts</h2>
<table class="table table-bordered text-center">
<tr class="bg-dark text-white">
<td>Patient_ID</td>
<td>Reference_ID</td>
<td>Amount</td>
<td>PaymentStatus</td>
</tr>
<tr>
<?php

   while($row = mysqli_fetch_assoc($result))
   {
?>
   <td><?php echo $row['Patient_ID']; ?></td>
   <td><?php echo $row['Reference_ID']; ?></td>
   <td><?php echo $row['Amount']; ?></td>
   <td><?php echo $row['PaymentStatus']; ?></td>

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