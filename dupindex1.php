<?php 
 
$conn = mysqli_connect('localhost','hms','test1234','hospital_management');

$sql = 'SELECT * FROM patient';
$result = mysqli_query($conn, $sql);
$patient = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);
print_r($sql);
?>

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
<form >
  <h2> Book Your Appointment</h2>
  &emsp;&emsp;<label for="fname">Patient's ID:</label>
  &ensp;<input type="number" id="PID" name="PID" placeholder="Enter Patient ID"><br><br>
  &emsp;&emsp; <label for="Time">TIME:</label>
  &emsp;&ensp;<select name="Time" id="Time">
    <option value="9.30">9.30 am</option>
    <option value="10.30">10.30 am</option>
    <option value="11.30">11.30 am</option>
    <option value="6.30">6.30 pm</option>
    <option value="7.30">6.30 pm</option>
  </select>
  &ensp;&emsp;&emsp;<label for="DID">Doctors ID</label>
  <input type="number" id="DID" name="DID" placeholder="Enter Doctors Id"><br><br>
  &emsp;&emsp;<label for="date">Date:</label>
  &ensp;<input type="date" id="date" name="date"><br><br>
 <input type="submit" value="Submit">
</form>

</body>
</html>
