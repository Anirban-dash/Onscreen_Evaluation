<?php
require("conn.php");
session_start();
$u_id=$_SESSION['id'];
$e_id=intval($_POST['e_id']);
$get_ques="SELECT * from question where e_id='$e_id'";
$ques_res=mysqli_query($con,$get_ques) or die(mysqli_error($con));
while($row=mysqli_fetch_array($ques_res)){
    $ans=$_POST[$row['q_id']];
    $ques=$row['question'];
    $add_sql="INSERT INTO `user_exam` (`q_id`, `u_ans`, `e_id`,`u_id`) VALUES ('$ques', '$ans', '$e_id','$u_id')";
    $add_res=mysqli_query($con,$add_sql) or die(mysqli_error($con));
}
$score_sql="INSERT INTO `user_ans` (`u_id`, `score`, `stat`, `e_id`) VALUES ('$u_id', '0', 'give', '$e_id')";
$a_res=mysqli_query($con,$score_sql) or die(mysqli_error($con));
header("location:student_panel.php");
?>