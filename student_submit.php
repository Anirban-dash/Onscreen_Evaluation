<?php
require("conn.php");
$name=mysqli_real_escape_string($con,$_POST['name']);
$mail=mysqli_real_escape_string($con,$_POST['mail']);
$pass=mysqli_real_escape_string($con,$_POST['pass']);
$branch=mysqli_real_escape_string($con,$_POST['branch']);
$fac_list="INSERT INTO `student` (`name`, `mail`, `pass`,`branch`) VALUES ('$name', '$mail', '$pass','$branch')";
$fac_res=mysqli_query($con,$fac_list) or die(mysqli_error($con));
header("location:add_student.php");
?>