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
        $Hotel_ID = $_SESSION['hotel_id'];
        header("location:Hotel-Profile.php?hotel_id=$Hotel_ID");
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
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>  
	  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
	  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
	  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>
<title>Hotel Login</title>
<!-- Bootstrap -->
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
</head>
<!--body background="images/ghv.jpg"-->
<body style="background-color:	white"><!--changed-->
	<nav class="navbar navbar-default navbar-fixed-top navbar-responsive">
		<div class="container-fluid">
		<div class="navbar-header">
		<ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
		</ul>
		
		<a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a></div>
		<ul class="nav nav-pills navbar-right">
                    <li><a href="homepage.php"><span class="glyphicon glyphicon-home"></span><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></a></li>
					<li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"></span><b><font size="4" color="#FFF" face="calibri light"> AboutUs</font></b></a></li>
		</ul>
							
		</div>   
	</nav>
<br><br><br><br><br>

<div class="container">

	<div class="col-md-4 col-md-offset-4  text-center">

		<div class="jumbotron">

	<form name="hotel_login" name="Login" id="Login" role="form" align="center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="header"><font size="20px" color="green">LogIn</font></div>
			<div class="control-group success">
				<label class="control-label" for="email"><font color="green">Email</font></label>
			<div class="controls">
				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required/>
			</div>
			</div>
		<div class="control-group success">
			<label class="control-label" for="password"><font color="green">Password</font></label>
			<div class="controls">
				<input type="password"  class="form-control" id="password" name="password" placeholder="Enter password">
			</div>
		</div>
		<div class="form-group">
			<div class="checkbox">
				<label><input type="checkbox"><font color="green"> Remember me</font></label>
			</div>
		</div>
		 <div class="col-md-8 col-md-offset-2">
			<div id="messages"><font size="30"></font></div>
		 </div>
		<div class="control-group success">
		   <div class="controls">
				<button type="submit" class="btn btn-success">Sign in</button>
		   </div> 
		 </div>
		<br><a href="forgot_password.php" ><font align="center">Forgot password?</font></align></a>
	  <br><a href="Hotel_registration.php"><font align="center">Registration</font></a>
	</form>
</div>
</div>
</div>
<div class="col-md-4">
</div>
	<script type="text/javascript">
		$(document).ready(function() {
		$('#Login').bootstrapValidator({
					container: '#messages',
					/*feedbackIcons: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
					},*/
			fields: {
				email: {
					validators: {
						notEmpty: {
							message: 'The email address is required and cannot be empty'
						},
						emailAddress: {
							message: 'The email address is not valid'
						}
					}
				},
				password: {
							validators: {
								notEmpty: {
									message: 'The password is required and cannot be empty'
								}
							}
						}
						
			 
			   
			}
		});
	});
				
	</script>
	<br><br><br>
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2 text-center">
		<h4>
			<a href="homepage.php">OHRMS</a>
		</h4>
		<p><b><font color="#161640">"Smarter choice for your business and vacation plans in Sri Lanka"</font></b></p>
		<hr>
<!-- starting of facebook icons-->
	<p> Join Us On </p>
	<ul class="list-inline center-block">
		<li><a href="#"><img src="hotelimages/facebook.png"></a></li>
		<li><a href="#"><img src="hotelimages/twitter.png"></a></li>
		<li><a href="#"><img src="hotelimages/google.png"></a></li>
		<li><a href="#"><img src="hotelimages/youtube.png"></a></li>
	</ul>

	</div><!--/col-->
	</div><!--/container-->

	<!-- scroll up button-->

	<ul class="nav pull-right scroll-top">
		<li><a href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
	</ul>

	<script>
		$('.scroll-top').click(function(){
		$('body,html').animate({scrollTop:0},1000);
		})

	</script>
	<!--footer-->

		<div id="footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<p><a href="homepage.php"> Online Hotel Reservation and Management System</a></p>
					</div>
					<div class="col-sm-4">
					</div>
					<div class="col-sm-4">
						<font color="#fff">© 2016 All Rights Reserved</font>
					</div>
				</div>
			</div>


		</div>
<!--footer end-->

		<style>
			#footer {
			height: 80px;
			background-color: #161640;
			margin-top:50px;
			padding-top:20px;


			}
			#footer {
			background-color:#161640;
			}

			#footer a {
			color:#efefef;
			}
			#footer > .container {

			}

		</style> 
</body>
</html>

