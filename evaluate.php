<?php
require("conn.php");
$score=array_sum($_POST['mark']);
$score=$score+intval($_POST['pdfMark']);
$ua_id=intval($_POST['id']);
$sql="UPDATE `user_ans` SET `score` = '$score', `stat` = 'check' WHERE `user_ans`.`ua_id` = '$ua_id'";
$ans_res=mysqli_query($con,$sql) or die(mysqli_error($con));
header("location:stude_res.php");
?>