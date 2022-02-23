<?php
require("conn.php");
session_start();
if(!isset($_SESSION['id'])){
  header("location:index.php");
}
$fac_list="SELECT * from exan";
$fac_res=mysqli_query($con,$fac_list) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Exam System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.col-md-6{
			box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
          
        }
        nav{
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
        }
        .container{
          overflow-x: scroll;
        }
        .container::-webkit-scrollbar { width: 0 !important }
        /* .container{
            position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);   
        } */
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Exam System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="fac_dash.php">Exams</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_exam.php">Add Exam</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add Student
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="add_student.php">Add Manual</a>
          <a class="dropdown-item" href="add_by_excel.php">By Excel Sheet</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="stude_res.php">Student Response</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container-fluid">
    <div class="container col-md-6 mt-5">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Name</th>
      <th scope="col">Subject</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=1;
    while($row=mysqli_fetch_array($fac_res)){
      $sub_id=$row['sub_id'];
      $sub_list="SELECT * from subject where sub_id='$sub_id'";
      $sub_res=mysqli_query($con,$sub_list) or die(mysqli_error($con));
      $sub=mysqli_fetch_array($sub_res)['sub_name'];
      if($row['statuss']=='unset'){
        echo '<tr>
        <th scope="row">'.$i.'</th>
        <td>'.$row['name'].'</td>
        <td>'.$sub.'</td>
        <td>Question is not set</td>
        <td><a href="mcq_add.php?id='.$row['exam_id'].'"><button type="submit" class="btn btn-info">Set Questions</button></a></td>
      </tr>';
      }else if($row['statuss']=='set'){
        echo '<tr>
        <th scope="row">'.$i.'</th>
        <td>'.$row['name'].'</td>
        <td>'.$sub.'</td>
        <td>Exam is ready</td>
        <td><a href="publish_exam.php?id='.$row['exam_id'].'"><button type="submit" class="btn btn-success">Publish</button></a></td>
      </tr>';
      }else if($row['statuss']=='ongoing'){
        echo '<tr>
        <th scope="row">'.$i.'</th>
        <td>'.$row['name'].'</td>
        <td>'.$sub.'</td>
        <td>Exam is ongoing</td>
        <td><a href="endexam.php?id='.$row['exam_id'].'"><button type="submit" class="btn btn-danger">End Exam</button></a></td>
      </tr>';
      }else{
        echo '<tr>
        <th scope="row">'.$i.'</th>
        <td>'.$row['name'].'</td>
        <td>'.$sub.'</td>
        <td>Exam is over</td>
        <td>--</td>
      </tr>';
      }
      $i++;
    }?>
  </tbody>
</table>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>