<?php
require_once('function.php');



$username = $email = $password = $passwordc =$hotel_name = $address =$city =$country = $contact ="";
$usererr = $emaerr = $passerr = $conpasserr = $nameerr =$adder = $cityerr =$counerr = $conterr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $username = ($username);
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
        $usererr = "Only letters numbers and underscore allowed";
    }
    else{
        $usererr = "";
    }


    $email = ($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }
    $password = $_POST['password'];
    $passwordc = $_POST['passwordc'];

    $hotel_name = ($_POST["hotel_name"]);
    $address = ($_POST['address']);
    $city = ($_POST['city']);
    $country = ($_POST['country']);
    $contact = $_POST['contact'];



    if ($password != $passwordc){
        $passerr = "Passwords do not match";
    }
    else {

        $ad = new dbFunction();
        $ad->create_hotel($username, $email, $password, $address, $city, $country, $contact, $hotel_name);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <!--  Adding bootstrap !-->
  <head>
  <script>
      function validate(){

      }
  </script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
    
    <body>
        
        <div class="container-fluid">
            
	<!-- Adding the image to the page and align it -->
    <div class="row">
		<div class="col-md-12">
			<div class="page-header" align = "center">
                <img alt="Bootstrap Image Preview" src="E:\Downloads\logo.jpg" align = "left" width="150" height="150" /> 
				<h1>
					Online Hotel Reservation Management System - Admin portal
				</h1>
			</div>
		</div> 
	</div>
            
        <!-- Adding the buttons -->    
        <div class="col-md-3" >
          <ul class="nav nav-pills nav-stacked">
                <p> </p>
                  <li button type="button" class="btn btn-primary btn-lg" href="admin_account.php">
                        Account Management
                  </button>  </li>
                <p> </p>  
                <li button type="button" class="btn btn-primary btn-lg"> 
                        System Management
                  </button>  </li>
                <p> </p>
                <li button type="button" class="btn btn-primary btn-lg"> 
                        Issue Response
                  </button>  </li>
                <p> </p>
                <li button type="button" class="btn btn-primary btn-lg"> 
                        Message Portal
                  </button>  </li>
          </ul>
    </div>
            <div class="col-md-9">
                <form name="login" class="form-control" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h1>Create New Hotel Account</h1><br><br>
                <div class="form-group">
                    <label for="username" id="username">Username</label>
                    <input type = "text" id ="username" name="username" required><br>
                </div>
                <?php
                    if(!empty($usererr)){
                        echo '<div class="alert alert-warning">'.$usererr.'</div>';
                    }
                ?>
                <div class="form-group">
                    <label for="email" id="email">Email Address</label>
                    <input type = "email" id ="email" name="email" required><br>
                </div>
                <div class="form-group">
                    <label for="password" id="password">Password</label>
                    <input type = "password" id ="password" name="password" required><br>
                    <?php
                    if(!empty($passerr)){
                        echo '<div class="alert alert-warning">'.$passerr.'</div>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="passwordc" id="passwordc">Confirm Password</label>
                    <input type = "password" id ="passwordc" name="passwordc" required><br>
                </div>
                <div class="form-group">
                    <label for="hotel_name" id="hotel_name">Hotel Name</label>
                    <input type = "text" id ="hotel_name" name="hotel_name" required><br>
                </div>
                <div class="form-group">
                    <label for="address" id="address">Address</label>
                    <input type = "text" id ="address" name="address" required><br>
                </div>
                <div class="form-group">
                    <label for="city" id="city">City</label>
                    <input type = "text" id ="city" name="city" required><br>
                </div>
                <div class="form-group">
                    <label for="country" id="country">Country</label>
                    <input type = "text" id ="country" name="country" required><br>
                </div>
                <div class="form-group">
                    <label for="contact" id="contact">Contact Number</label>
                    <input type = "number" id ="contact" name="contact" required><br>
                </div>
                <div class="form-group">
                   <button class="btn-primary" type="submit">Register</button>
                </div>

                </form>
            </div>

</div>

</body>
    </html>
