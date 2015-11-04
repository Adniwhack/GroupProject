<?php
include "function.php";
if (isset($_SESSION['customer_login'])){
    echo "<script>alert('You have already logged in')</script>";
    sleep(1);
    header("location:index.html");
}
if ($_SERVER['REQUEST_METHOD'] == "POST" ){
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    $log = new dbFunction();
    $log->customer_login($email, $password);
    if (isset($_SESSION['customer_login'])){
        if ($_SESSION['next'] != "reservation"){
            header("location:index.html");
            exit();
        }else{
            header("location:reservation.php?room_id=".$_SESSION['rroom']."&hotel_id=".$_SESSION['rhot']."");
            exit();
        }
    }
    else{
        echo "<script>alert('Username and password do not match')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>User Login</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

</head>
<body background="images/ghv.jpg">
<nav class="navbar navbar-default" >
   <div class="navbar-header">
	         		<ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
					</ul>
      <a class="navbar-brand" href="#">Online Hotel Reservation and Management System </a>
   </div>
</nav>



<div class="container" >

<div class="col-md-4 col-md-offset-8 text-center">

<div class="jumbotron">

<form role="form" align="center"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="post"><div class="header"><font size="20px">Log In</font></div>
  <div class="form-group">
    <label class="control-label" for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label class="control-label" for="pwd">Password:</label>
	<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
   
  </div>
  <div class="form-group">
    <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
      </div>
    
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-info">Sign in</button>
    
  </div>
  <br><a href="user_registration.php"><font align="center">New User?</font></a>
</form>
</div>
</div>
<div class="col-md-4">
</div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
  </body>
 </html>