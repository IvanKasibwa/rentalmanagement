<?php
$con = @mysqli_connect("localhost","root","",rentalmanagement);
  if(!$con)
	  {
	  die(mysqli_connect_error($con));
	  }
mysqli_select_db($con,"rentalmanagement");
?>