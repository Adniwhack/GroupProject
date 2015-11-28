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

<body  background="images/back6.jpg">
    <nav class="navbar navbar-default" >
        <div class="navbar-header">
            <ul class="nav navbar-nav navbar-left"><li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li>
            </ul>
            <a class="navbar-brand" href="">Online Hotel Reservation and Management System </a>
        </div>
		<div>

    		
      				<ul class="nav nav-pills navbar-right">
        
        				
        				
					<li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#A7A79B">AboutUs</font></b></a></li>
      				</ul>
					
		</div>
    </nav>
    <div class="container" >

        <div class="col-md-4 col-md-offset-8 text-center">

            <div class="jumbotron">
                <form name="forgot_password" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ; ?> " >
                    <p>Type your email to recover your password</p>
                    <div class="form-group">
                        <label for="email">
                            E mail address
                        </label>
                        <input type="email" name="email">
						<?php
							if (empty($_POST["email"])) {
								$emailEr = "Email is required";
	
								} else {
									$email = test_input($_POST["email"]);
							if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
									$emailEr = "Invalid email"; 
  
								}
							}
						?>
						<span value=<?php echo $emailEr;?>> </span>
                    </div>
                    <button type="submit" class = "btn btn-primary">Recover password</button>
                </form>
            </div>
        </div>
    </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>