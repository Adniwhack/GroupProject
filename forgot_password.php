<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 9/27/2015
 * Time: 12:02 PM
 */

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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

<body style="background-color:white"><!--changed-->
   <nav class="navbar navbar-default navbar-fixed-top navbar-responsive">
		<div class="container-fluid">
		<div class="navbar-header ">
			<ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
			</ul>
    
		<a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a></div>
		<ul class="nav nav-pills navbar-right ">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></a></li>
				<li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"></span><b><font size="4" color="#FFF" face="calibri light"> AboutUs</font></b></a></li>
				<li><a href="#"><span class="glyphicon glyphicon-phone-alt"></span><b><font size="4" color="#FFF" face="calibri light"> ContactUs</font></b></a></li>
		</ul>
        				
		</div>   
  </nav>
  <br><br><br><br><br><br><b><br><br><br><br>
    <div class="container" >

        <div class="col-md-4 col-md-offset-8 text-center">

            <div class="jumbotron">
                <form name="forgot_password" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ; ?> " >
                    <p> <b>Type your email to recover your password</b></p>
                    <div class="form-group">
                        <label for="email">
                          <font color="green"> E mail address</font>
                        </label>
                        <input type="email" name="email">
                    </div>
                    <button type="submit" class = "btn btn-success">Recover password</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
