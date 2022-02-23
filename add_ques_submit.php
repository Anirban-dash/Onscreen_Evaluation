<?php
require("conn.php");
session_start();
$saq=$_POST['saq'];
$mcq=$_POST['mcq'];
$e_id=$_POST['e_id'];
$i=1;
while($i<=$mcq){
    $key='mquestion'.$i;
    $ques_name=mysqli_real_escape_string($con,$_POST[$key]);
    $ques="INSERT INTO `question` (`question`, `type`, `e_id`) VALUES ('$ques_name', 'mcq', '$e_id')";
    $qu_res = mysqli_query($con, $ques) or die(mysqli_error($con));
    $id=mysqli_insert_id($con);
    $opkey=$key.'opo';
    $opo=mysqli_real_escape_string($con,$_POST[$opkey]);
    $opkey=$key.'ops';
    $ops=mysqli_real_escape_string($con,$_POST[$opkey]);
    $opkey=$key.'opt';
    $opt=mysqli_real_escape_string($con,$_POST[$opkey]);
    $opkey=$key.'opf';
    $opf=mysqli_real_escape_string($con,$_POST[$opkey]);
    $option1="INSERT INTO `options` (`answer`, `q_id`, `op_no`) VALUES ('$opo', '$id', '1')";
    $op1_res=mysqli_query($con, $option1) or die(mysqli_error($con));
    $option2="INSERT INTO `options` (`answer`, `q_id`, `op_no`) VALUES ('$ops', '$id', '2')";
    $op1_res=mysqli_query($con, $option2) or die(mysqli_error($con));
    $option3="INSERT INTO `options` (`answer`, `q_id`, `op_no`) VALUES ('$opt', '$id', '3')";
    $op1_res=mysqli_query($con, $option3) or die(mysqli_error($con));
    $option4="INSERT INTO `options` (`answer`, `q_id`, `op_no`) VALUES ('$opf', '$id', '4')";
    $op1_res=mysqli_query($con, $option4) or die(mysqli_error($con));
    $i++;
}
$i=1;
while($i<=$saq){
    $key='squestion'.$i;
    $ques_name=mysqli_real_escape_string($con,$_POST[$key]);
    $ques="INSERT INTO `question` (`question`, `type`, `e_id`) VALUES ('$ques_name', 'saq', '$e_id')";
    $qu_res = mysqli_query($con, $ques) or die(mysqli_error($con));
    $i++;
}
$update_sql="UPDATE `exan` SET `statuss` = 'set' WHERE `exan`.`exam_id` = $e_id";
$qu_res = mysqli_query($con, $update_sql) or die(mysqli_error($con));
header("location:fac_dash.php");
?>