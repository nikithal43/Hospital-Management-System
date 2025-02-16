<?php session_start(); ?>
<html>
<head><title>Jeevanraksha Hospital</title>
</head>
<style>
input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 50px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 20%;
  background-color:orange;
  color: white;
  padding: 10px 10px;
  margin: 8px 50px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
form{
background-color:hsla(212, 100%, 50%, 0.5);
color:white;
margin-left:650px;
width:500px;
margin-bottom:10px;
position: absolute;
top: 175px;
font-size:15px;
border-radius: 25px;
}
h2{
margin-left:120px;
margin-right:90px;
margin-bottom:10px;
magin-top:10px;
}
body {
  background-image: url('img1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
h1{
padding-bottom:20px;
padding-top:10px;
}
</style>
<body style="background-image: url('img1.jpg');">

<h1 style="text-align:left;color:DodgerBlue;font-family:Verdana;text-align:center;">Jeevanraksha Hospitals</h1>
<div class="container-fluid">
</div>
<div style="text-align:center; margin-top:20px;background-color:DodgerBlue;padding-top:5px;padding-bottom:5px;">
<a style="padding-right: 20px;color:white;" href="index.html">Home</a>
<a style="padding-right: 20px;color:white;" href="About_us.html">About Us</a>
<a style="padding-right: 20px;color:white;" href="Specialization.html">Specialization</a>
<a style="padding-right: 20px;color:white;" href="Login.html">Login</a>
</div>
<h1 style="text-align:left; color:DodgerBlue;font-size:80px;">Healthy Isn't <br> a GOAL. ITS <br> a Way of Living.</h1>
<?php
    if(isset($_SESSION['status']))
    {
      echo "<h4>".$_SESSION['status']."</h4>";
      unset($_SESSION['status']);
    }
 ?>
<form action="appointment.php" method="post" >
  <h2> Book Your Appointment</h2>
  <div class="form-group">
   <label for="Patient_ID">Patient_ID</label>
   <input type="Patient_ID" id="Patient_ID" class="form-control" name="Patient_ID">
   </div>
  <div class="form-group mb=3">
   <label for="">Appointment Date & Time</label>
   <input type="datetime-local" name="Appointment_DT" class="form-control">
   </div>
   <div class="form-group mb=3">
   <label for="Doctor_ID">Doctor_ID</label>
   <input type="Doctor_ID" id="Doctor_ID" class="form-control" name="Doctor_ID">
   </div>
  <div class="form-group mb=3">
     <button type="Submit" name="save_datetime" class="btn btn-primary">Submit</button>
  </div>
</form>

</body>
</html>
