<?php
require("conn.php");
session_start();
if(!isset($_SESSION['id'])){
  header("location:index.php");
}
$sql="SELECT * from exan where statuss='ongoing'";
$query=mysqli_query($con,$sql) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Exam System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.container{
			box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">Exam System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="student_panel.php">Dashboard</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Exams
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
          $i=0;
          while($row=mysqli_fetch_array($query)){
            $i=1;
            echo '<a class="dropdown-item" href="exam.php?id='.$row['exam_id'].'">'.$row['name'].'</a>';
          }
          if($i==0){
            echo '<a class="dropdown-item" href="#">No exam there</a>';
          }
          ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="studentResult.php">Result</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link disabled" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid  d-flex justify-content-center">
<div class="row">
	<div class="container mt-5">
    <div class="card mb-2 text-center" style="width: 18rem;">
  <img class="card-img-top" src="./User-Profile.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_SESSION['name']; ?></h5>
    <p class="card-text">Student</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">ID: <?php echo $_SESSION['id']; ?></li>
    <li class="list-group-item">Email: <?php echo $_SESSION['mail']; ?></li>
  </ul>
</div>
    </div>
    </div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>