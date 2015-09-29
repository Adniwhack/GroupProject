<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 8/31/2015
 * Time: 2:41 PM
 */
include ('function.php');
if ($_SERVER['REQUEST_METHOD']=="POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $log = new dbFunction();
    $res = $log->hotel_login($email, $password);

    if ($res == true){
        header("Location:hotel_welcome_page.php");
    }
    else{
        echo "<script>alert('Username and password do not match')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<!-- Adding bootstrap !-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>
<body  background="images/logit.jpg">
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

<form name="hotel_login" role="form" align="center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="form-group">
    <label class="control-label" for="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    
  </div>
  <div class="form-group">
    <label class="control-label" for="password">Password:</label>
	<input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
   
  </div>
  <div class="form-group">
    <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
      </div>
    
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-info">Sign in</button>
    
  </div>
    <br><a href="forgot_password.php" ><font align="center">Forgot password?</font></align></a>
  <br><a href="hotelform.html"><font align="center">Registration</font></a>
</form>
</div>
</div>
<div class="col-md-4">
</div>
</div>
</body>
</html>

