<? php session_start(); ?>
<html>
<?php
    if(isset($_SESSION['status']))
    {
       echo "<h4>".$_SESSION['status']."</h4>";
       unset($_SESSION['status']);
    }
 ?>
<form action="demo.php" method="POST" >
  <h2> Book Your Appointment</h2>
  <div class="form-group" mb=3>
   <label for="name">name</label>
   <input type="name" name="name" class="form-control" >
   </div>
  <div class="form-group mb=3">
   <label for="">Event Date & Time</label>
   <input type="datetime-local" name="eventdt" class="form-control">
   </div>
   </div>
  <div class="form-group mb=3">
     <button type="Submit" name="save_datetime" class="btn btn-primary">Submit</button>
  </div>
</form>
</html>
