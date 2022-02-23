<?php
require("conn.php");
$name=mysqli_real_escape_string($con,$_POST['name']);
$code=mysqli_real_escape_string($con,$_POST['code']);
$fac_list="INSERT INTO `subject` (`sub_name`, `sub_code`) VALUES ('$name', '$code')";
$fac_res=mysqli_query($con,$fac_list) or die(mysqli_error($con));
header("location:add_sub.php");
?>