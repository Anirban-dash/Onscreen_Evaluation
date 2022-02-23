<?php
require("conn.php");
session_start();
$exam="SELECT * from exan";
$ex_res=mysqli_query($con,$exam) or die(mysqli_error($con));

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
      <li class="nav-item ">
        <a class="nav-link" href="coe_dash.php">Faculty List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="student_list.php">Student List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sub_list.php">Subject List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_fac.php">Add Faculty</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_sub.php">Add Subject</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="report.php">Report</a>
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
      <th scope="col">Pass</th>
      <th scope="col">Fail</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1;
    while($row=mysqli_fetch_array($ex_res)){
        $e_id=$row['exam_id'];
        $pass="SELECT COUNT(*) as cnt from user_ans where stat='check' and score>10 and e_id='$e_id'";
        $fail="SELECT COUNT(*) as cnt from user_ans where stat='check' and score<10 and e_id='$e_id'";
        $pass_res=mysqli_query($con,$pass) or die(mysqli_error($con));
        $fail_res=mysqli_query($con,$fail) or die(mysqli_error($con));
      echo '<tr>
      <th scope="row">'.$i.'</th>
      <td>'.$row['name'].'</td>
      <td>'.mysqli_fetch_array($pass_res)['cnt'].'</td>
      <td>'.mysqli_fetch_array($fail_res)['cnt'].'</td>
    </tr>';
    $i++;
    }
    ?>
  </tbody>
</table>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>