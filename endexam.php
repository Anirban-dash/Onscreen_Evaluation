<?php
require("conn.php");
session_start();
$id=$_GET['id'];
$fac_list="UPDATE `exan` SET `statuss` = 'end' WHERE `exan`.`exam_id` = '$id'";
$fac_res=mysqli_query($con,$fac_list) or die(mysqli_error($con));
header("location:fac_dash.php");
?>