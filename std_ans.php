<?php
require("conn.php");
$id=$_GET['id'];
$get_user="SELECT * from user_ans where ua_id='$id'";
$us_qu=mysqli_query($con,$get_user) or die(mysqli_error($con));
$row=mysqli_fetch_array($us_qu);
$u_d=$row['u_id'];
$e_id=$row['e_id'];
$sub_list="SELECT * from student where st_id='$u_d'";
$sub_res=mysqli_query($con,$sub_list) or die(mysqli_error($con));
$sub=mysqli_fetch_array($sub_res);
$up_sql="SELECT * from pdf_upload where st_id='$u_d' and ex_id='$e_id'";
$up_res=mysqli_query($con,$up_sql) or die(mysqli_error($con));
$pdf=mysqli_fetch_array($up_res);
$f_name=$pdf['pdf'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exam System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
    .col-md-6{
			box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
          
        }
        nav{
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
        }
        
        .card{
            margin:2px;
        }
        input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
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
        <a class="nav-link" href="fac_dash.php">Exams</a>
      </li>
      <li class="nav-item ">
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
      <li class="nav-item active">
        <a class="nav-link" href="stude_res.php">Student Response</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container-fluid">
    <div class="container mt-3 col-md-6">
    <div class="card">
  <div class="card-header d-flex justify-content-between">
    <p><?php echo $sub['name']?></p>
    <p>ID: <?php echo $sub['st_id']?></p>
  </div>
</div>
        <form action="evaluate.php" method="post" class="mt-2 mb-2">
          <input type="number" name="id" value="<?php echo $id;?>" hidden/>
<?php
$i=1;
$get_ans="SELECT * from user_exam where e_id='$e_id' and u_id='$u_d'";
$ans_res=mysqli_query($con,$get_ans) or die(mysqli_error($con));
while($ans=mysqli_fetch_array($ans_res)){
  echo '<div class="card">
  <div class="card-body">
    <h5 class="card-title">'.$i.' '.$ans['q_id'].'</h5>
    <p class="card-text">'.$ans['u_ans'].'</p>
    <input type="number" name="mark['.$i.']" class="form-control" placeholder="Add marks" required>
    </div>
    </div>';
    $i++;
}
?>
<iframe src="./uploads/<?php echo $f_name ?>" width="100%" height="500px"></iframe>
<a style="text-decoration:none" href="/uploads/<?php echo $f_name ?>" download>Download Sheet</a><br>
<input type="number" name="pdfMark" class="form-control" placeholder="Add marks" required><br>
<button type="submit" class="btn btn-success mb-2">Evaluate</button>
</form>


    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>