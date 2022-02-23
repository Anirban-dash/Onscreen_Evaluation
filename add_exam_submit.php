<?php
require("conn.php");
session_start();
$name=mysqli_real_escape_string($con,$_POST['name']);
$sub=mysqli_real_escape_string($con,$_POST['sub']);
$mcq=mysqli_real_escape_string($con,$_POST['mcq']);
$saq=mysqli_real_escape_string($con,$_POST['saq']);
$fac_list="INSERT INTO `exan` (`name`, `statuss`, `mcq`, `saq`, `sub_id`) VALUES ('$name', 'unset', '$mcq', '$saq', '$sub')";
$fac_res=mysqli_query($con,$fac_list) or die(mysqli_error($con));
header("location:fac_dash.php");
?>