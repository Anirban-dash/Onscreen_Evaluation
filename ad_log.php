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
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <a class="navbar-brand" href="#">Exam System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Student Login</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="fac_lgin.php">Faculty Login</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="ad_log.php">COE Login</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container-fluid  d-flex justify-content-center">
<div class="row">
	<div class="container mt-5">
		<h3>COE Login</h3><br>
	<form action="coe_login.php" method="post">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" name="mail" class="form-control" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password </label>
    <div class="col-sm-10">
      <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
	<button type="submit" class="btn btn-success">Login</button>
    </div>
  </div>
</form>
	</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>