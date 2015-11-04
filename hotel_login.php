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
<style>
.navbar {
    color: #FFFFFF;
    background-color: #161640;
}

/* OR*/

.nav {
    color: #FFFFFF;
    background-color: #161640;
	
.nav-pills > li > a {
  color: #A7A79Bf;
  font-family: 'Oswald', sans-serif;
  font-size: 0.8em ;
  padding: 1px 1px 1px ;
}
</style>

</head>
<body  background="images/back3.jpg">
<nav class="navbar navbar-default" >
   <div class="navbar-header">
	         		<ul class="nav navbar-nav navbar-left"><li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li> <a class="navbar-brand" href="#">Online Hotel Reservation and Management System </a>
					</ul>
     
   </div>
   <div>

    		
      				<ul class="nav nav-pills navbar-right">
        
        				
        				
					<li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"><b><font size="3" color="#A7A79B">AboutUs</font></b></a></li>
      				</ul>
					
   </div>
</nav>

<div class="container" >

<div class=" col-md-offset-1 col-md-4 text-center">

<div class="jumbotron">

<form name="hotel_login" role="form" align="center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="header"><font size="20px">Login</font></div>
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
    <br><a href="recoverpwd.php" ><font align="center">Forgot password?</font></align></a>
  <br><a href="Hotel_registration.php"><font align="center">Registration</font></a>
</form>
</div>
</div>
<div class="col-md-4">
</div>
</div>
</body>
</html>

