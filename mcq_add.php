<?php
require("conn.php");
session_start();
$sub_id = $_GET['id'];
$sub_list = "SELECT * from exan where exam_id='$sub_id'";
$sub_res = mysqli_query($con, $sub_list) or die(mysqli_error($con));
$exam=mysqli_fetch_array($sub_res);
$mcq = $exam['mcq'];
$saq = $exam['saq'];
$id=$exam['exam_id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Exam System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.col-md-7{
			box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;

        }
        nav{
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
        }

        .card{
          box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
        }
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
        <a class="nav-link" href="fac_dash.php">All question</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add Question
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="mcq_add.php">Multiple choice</a>
          <a class="dropdown-item" href="saq_app.php">Subjective type</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add Student
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Add Manual</a>
          <a class="dropdown-item" href="#">By Excel Sheet</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fac_dash.php">Student Response</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container-fluid ">
    <div class="container col-md-7 mt-5">
    <div class="card">
  <div class="card-header d-flex justify-content-between">
    <p>Artificial Intelligence</p>
  </div>
</div>
    <form action="add_ques_submit.php" method="post" class="mt-2">
      <input type="number" name="mcq" value="<?php echo $mcq ?>" hidden/>
      <input type="number" name="saq" value="<?php echo $saq ?>" hidden/>
      <input type="number" name="e_id" value="<?php echo $id ?>" hidden/>
      <?php
      $i=1;
      while($i<=$mcq){

      ?>
      <div class="form-row jumbotron">
  <div class="form-group col-sm-12">
    <label for="formGroupExampleInput"><?php echo 'Mcq Question '.$i; ?></label>
    <input type="text" name="<?php echo 'mquestion'.$i; ?>" class="form-control" id="formGroupExampleInput" placeholder="Example input" required>
  </div>
  <div class="form-group col-md-6">
    <label for="formGroupExampleInput2">Option 1</label>
    <input type="text" name="<?php echo 'mquestion'.$i.'opo'; ?>" class="form-control" id="formGroupExampleInput2" placeholder="Enter option 1" required>
  </div>
  <div class="form-group col-md-6">
    <label for="formGroupExampleInput3">Option 2</label>
    <input type="text" name="<?php echo 'mquestion'.$i.'ops'; ?>" class="form-control" id="formGroupExampleInput3" placeholder="Enter option 2" required>
  </div>
  <div class="form-group col-md-6">
    <label for="formGroupExampleInput4">Option 3</label>
    <input type="text" name="<?php echo 'mquestion'.$i.'opt'; ?>" class="form-control" id="formGroupExampleInput4" placeholder="Enter option 3" required>
  </div>
  <div class="form-group col-md-6">
    <label for="formGroupExampleInput5">Option 4</label>
    <input type="text" name="<?php echo 'mquestion'.$i.'opf'; ?>" class="form-control" id="formGroupExampleInput5" placeholder="Enter option 4" required>
  </div>
  </div>
  <?php $i++;
  }
  $i=1;
  while($i<=$saq){
  ?>
  
  <div class="form-row jumbotron">
  <div class="form-group col-sm-12">
    <label for="formGroupExampleInput"><?php echo 'Saq Question '.$i; ?></label>
    <input type="text" name="<?php echo 'squestion'.$i; ?>" class="form-control" id="formGroupExampleInput" placeholder="Enter question" required>
  </div>
  </div>
  <?php
  $i++;
  }?>
  <button type="submit" class="btn btn-block btn-info mb-4">Add</button>
</form>

    </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
