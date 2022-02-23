<?php
require("conn.php");
session_start();
$mail=mysqli_real_escape_string($con,$_POST['mail']);
$pass=mysqli_real_escape_string($con,$_POST['pass']);
$sql="SELECT * from faculty where pass='$pass' and mail='$mail'";
$ques_res=mysqli_query($con,$sql) or die(mysqli_error($con));
$row=mysqli_fetch_array($ques_res);
if(mysqli_num_rows($ques_res)>0){
    $_SESSION['id']=$row['fac_id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    header("location:fac_dash.php");
}else{
    header("location:index.php");
}
?>