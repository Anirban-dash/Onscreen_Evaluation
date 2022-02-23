<?php
require("conn.php");
$name=mysqli_real_escape_string($con,$_POST['name']);
$mail=mysqli_real_escape_string($con,$_POST['mail']);
$pass=mysqli_real_escape_string($con,$_POST['pass']);
$fac_list="INSERT INTO `faculty` (`name`, `mail`, `pass`) VALUES ('$name', '$mail', '$pass')";
$fac_res=mysqli_query($con,$fac_list) or die(mysqli_error($con));
header("location:add_fac.php");
?>