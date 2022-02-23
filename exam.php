<?php
require("conn.php");
session_start();
if(!isset($_SESSION['id'])){
  header("location:index.php");
}
$us_id=$_SESSION['id'];
$id=$_GET['id'];
$fac_list="SELECT * from question where e_id='$id'";
$fac_res=mysqli_query($con,$fac_list) or die(mysqli_error($con));
$check_ex="SELECT * from user_ans where u_id='$us_id'";
$check_res=mysqli_query($con,$check_ex) or die(mysqli_error($con));
if(mysqli_num_rows($check_res)>0){
  echo "You already give";
  die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exam System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
         .card{
            margin:2px;
        }
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
      <li class="nav-item">
        <a class="nav-link disabled" href="student_panel.php">Dashboard</a>
      </li>
      <li class="nav-item dropdown active">
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

<div class="container-fluid">
    <div class="container col-md-6">
    <div class="card">
  <div class="card-header d-flex justify-content-between">
    <p><?php echo $_SESSION['name'] ?></p>
  </div>
</div>
        <form action="ans_submit.php" method="post" class="mt-2 mb-2">
          <input type="number" name="e_id" value="<?php echo $id;?>" hidden/>
          <?php
          $i=1;
          while($row=mysqli_fetch_array($fac_res)){
            if($row['type']=='mcq'){
              $q_id=$row['q_id'];
              $op_list="SELECT * from options where q_id='$q_id' ORDER BY op_no";
              $op_res=mysqli_query($con,$op_list) or die(mysqli_error($con));
              ?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title"><?php echo $i.'. '.$row['question'];?></h5>
    <ul class="list-group list-group-flush">
    <input class="form-check-input" type="radio" value="Unattempt" name="<?php echo $row['q_id'];?>" checked hidden/>
      <?php while($options=mysqli_fetch_array($op_res)){ ?>
    <li class="list-group-item"><input class="form-check-input" type="radio" value="<?php echo $options['answer'];?>" name="<?php echo $row['q_id'];?>"><?php echo $options['answer'];?></li>
    <?php }
    echo '</div>
    </div>';
    }else if($row['type']=='saq'){?>
   <div class="card">
  <div class="card-body">
    <h5 class="card-title"><?php echo $i.'. '.$row['question'];?></h5>
    <input type="text" name="<?php echo $row['q_id'];?>" class="form-control" placeholder="Add marks">
  </div>
    </div>
    <?php }
    $i++;
          }
    ?>
<button type="submit" class="btn btn-success mb-2">Evaluate</button>
</div>
</form>


    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>