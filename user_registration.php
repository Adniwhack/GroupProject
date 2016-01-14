<?php


include "function.php";
$Fname= $Lname = $Gender = $DOB = $Address = $Country = $Contact = $Email = $Password = $Passwordc  = "";
$FnameErr= $LnameErr = $GenderErr = $DOBErr = $AddressErr = $CountryErr = $ContactErr = $EmailErr = $PasswordErr = $PasswordcErr = "";



if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $Fname=$_POST['Fname'];
    if (!isset($Fname)){
      $FnameErr = "THis field is required.";
    }
    else{
      $Fname = test_input($_POST["Fname"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$Fname)) {
        $FnameErr = "You can use letters and space only";
      }

      }
    

    $Lname = $_POST['Lname'];
    if (!isset($Lname)){
      $LnameErr = "This field is required.";
    }
    else{
      $Lname = test_input($_POST["Lname"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$Lname)) {
        $LnameErr = "You can use letters and space only";
      }
    }

    $Gender = $_POST['Gender'];
    $DOB= $_POST['DOB'];
    $Address = $_POST['Address'];
    $Country = $_POST['Country'];
	$Password = $_POST['password'];
	$Passwordc = $_POST['passwordc'];
    $Contact = $_POST['Contact'];
	if (strlen($Password) < 8){
            $PasswordErr = "Password length should be greater than 8 characters";
        }
        else{
        if ($Password != $Passwordc){
            $PasswordErr ="Passwords do not match!";
        }
    }
    if (isset($Contact)){
      $Contact = test_input($_POST["Contact"]);
      if (!preg_match("/^[0-9]{10}$/",$Contact)) {
      $ContactErr = "You can enter 10 numbers only";
      }
    }
	


    $Email = $_POST['email'];
   
    //$Passwordc = $_POST['passwordc'];

    if ($Password == $Passwordc and $PasswordErr == "" and $FnameErr == "" and $LnameErr=="" and $ContactErr=="") {
        $log = new dbFunction();
		//$res = mysql_query(SELECT * FROM registered_customer WHERE Customer_email = '$Email');
		//$c = mysql_num_rows($res);
		//if ($c == 0){
			
        $log->create_reg_user($Fname, $Lname, $Address, $Contact, $Country, $Email, $Password, "", $Gender, $DOB);


       // header("location:index.html");
       // echo "<script>alert('User Registered')</script>";


        $to = $Email;
        echo $to;
        $subject = 'Register to the OHMRS';
        $message = 'Congradulations! You have created a new account on OHMRS successfully.';
        $headers = 'From: ohrms2015@gmail.com' . "\r\n" .
        'Reply-To: ohrms2015@gmail.com' . "\r\n" .
        'X-Maillocer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        
    
        header("location:index.html");
		}
		
    
	}
	





?>


<!DOCTYPE html>
<html lang="en">
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
     <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>  
	  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
	  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
	  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>
<title>User registration form</title>

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
<body  style="background-color:white"> <!--changed-->
 
<nav class="navbar navbar-default navbar-fixed-top navbar-responsive">
	<div class="container-fluid">
    <div class="navbar-header">
    <ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
	</ul>
    
    <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a></div>
	<ul class="nav nav-pills navbar-right">
            <li><a href="homepage.php"><span class="glyphicon glyphicon-home"></span><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></a></li>
				<li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"></span><b><font size="4" color="#FFF" face="calibri light"> AboutUs</font></b></a></li>
				<li><a href="#"><span class="glyphicon glyphicon-phone-alt"></span><b><font size="4" color="#FFF" face="calibri light"> ContactUs</font></b></a></li>
	</ul>
        				
    </div>
</nav>	
	<br><br><br><br>


	<div class="container">
	
	<div class="col-sm-10">

		<form role="form" align="center" class="form-horizontal col-md-10 col-md-offset-1" data-toggle="validator" onSubmit="return validate();" id ="form2"action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"><!--changed-->

			<p><h4><b><legend>  Registration Details</legend></b></h4></p><!--changed-->
			<p><h5><b><font color="red">  *All fields are required to be filled</font></b></h5></p><!--changed-->
			<br>
		<div class="row">
			<div class="jumbotron">
							<div class="form-group" align = "center">
								<label for="finame" class="col-md-4 control-label" ><font color="green">
								First Name:
								</font>
								</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="Fname" placeholder="Enter First Name"required />
								</div>
							</div>
							<div class="form-group" align = "center">
								<label for="laname" class="col-md-4 control-label" ><font color="green">
								Last Name:
								</font>
								</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="Lname" placeholder="Enter Last Name"required />
								</div>
							</div>
							<div class="form-group" align = "center">
								<div class="radio">
									<label for="Gender" class="col-md-4 control-label"><font color="green">
										<b>Gender:</b>
										</font>
									</label>
								<div class="col-md-6">
									<font color="green"><label><input type="radio" name="Gender" value="male" checked="checked" >Male</label></font>
									<font color="green"><label><input type="radio" name="Gender" value="female" >Female</label></font>
								</div>
								</div>
							</div>

							<div class="form-group" align="center">
								<font color="green"><label class="col-md-4 control-label"for="date_of_birth">Date of Birth <span class="glyphicon glyphicon-calendar"></span>:</label></font>
									<div class="col-md-8">
										<input type="date" id="date_of_birth" class="form-control" name="DOB" placeholder="dd/mm/yyyy or dd-mm-yyyy">
									</div>
							</div>
   
							<div class="form-group" align="center">
								<font color="green"><label class="col-md-4 control-label"for="address">Address:</label></font>
									<div class="col-md-8">
										<textarea class="form-control" rows="3" name="Address" required></textarea>
									</div>
							</div>
							
							<div class="form-group" align="center">
								<font color="green"><label class="col-md-4 control-label"for="country">Country</label></font>
									
										<div class="col-sm-6">
											<select name="Country">
												<option value="Sri lanka">Sri Lanka</option>
												<option value="United Kingdon">United Kingdom</option>
												<option value="Germany">Germany</option>
												<option value="USA">United States</option>
											</select>
										</div>
									
							</div>
 
  
							<div class="form-group" align="center">
								<font color="green"><label class="col-md-4 control-label"for="cnumber">Contact Number:</label></font>
									<div class="col-md-8">
										<input type="tel" pattern ="^\d{10}$" name="Contact" id="Contact" class="form-control"  placeholder="0710996370" required>
									</div>
							</div>
  
							<div class="form-group" align="center">
								<font color="green"><label class="col-md-4 control-label"for="email">E mail addresss:</label></font>
									<div class="col-md-8">
										<input type="email"  id="email" name="email" class="form-control"  placeholder="abc@gmail.com" required>
									</div>
							</div>
  
							<div class="form-group" align="center">
								<font color="green"><label class="col-md-4 control-label"for="password">Password:</label></font>
									<div class="col-md-8">
										<input type="password"   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="password" name="password" class="form-control"  placeholder="Enter your password" required>
										Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters
									</div>
							</div>
 
							
  
							<div class="form-group" align="center">
								<font color="green"><label class="col-md-4 control-label" for="confirm_password">Confirm password</label></font>
									<div class="col-md-8">
										<input type="password" class="form-control" id="passwordc" name="passwordc" placeholder="Please re-enter your password" required>
										
									</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label" id="captchaOperation"></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="captcha" />
									Please complete the above task for verfification
								</div>
							</div>
							<script>
										function validate(){

										var a = document.getElementById("password").value;
										var b = document.getElementById("passwordc").value;
										if (a!=b) {
										alert("Passwords do no match");
										return false;
										}
									}
							</script>
							<div class="form-group">
									<div class="col-md-9 col-md-offset-3">
										<div id="messages"><font size="30"></font></div>
									</div>
							</div>
							<div class="col-sm-offset-10 col-sm-3">
								<button type="submit" class="btn btn-success btn-md" > Next</button>
							</div>
							<br>
   <!--div class="controls">
   <a href="#" class="btn btn-info" role="button">Next</a>
   
   </div-->
   </div>
</div>
</form>

</div>
</div>

<br><br><br><br>
   
		<script type="text/javascript">
			$(document).ready(function() {
				$('#form2').bootstrapValidator({
					container: '#messages',
					feedbackIcons: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
					},
					fields: {
						Fname: {
							validators: {
								notEmpty: {
									message: 'The first name is required and cannot be empty'
								}
							}
						},
						Lname: {
							validators: {
								notEmpty: {
									message: 'The last name is required and cannot be empty'
								}
							}
						},
						Address: {
							validators: {
								notEmpty: {
									message: 'The address is required and cannot be empty'
								}
							}
						},
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
						},
						
							
						passwordc: {
							validators: {
								notEmpty: {
									message: 'The confirm password is required and cannot be empty'
							},
						identical: {
							field: 'password',
								message: 'The password and its confirm must be the same'
						}
						}
						},
						captcha: {
							validators: {
								callback: {
									message: 'Wrong answer',
									callback: function(value, validator, $field) {
										var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
										return value == sum;
									}
								}
							}
						},
						}
						})
						// Enable the password/confirm password validators if the password is not empty
						.on('keyup', '[name="password"]', function() {
						var isEmpty = $(this).val() == '';
						$('#form2')
						.formValidation('enableFieldValidators', 'password', !isEmpty)
						.formValidation('enableFieldValidators', 'passwordc', !isEmpty);

						// Revalidate the field when user start typing in the password field
						if ($(this).val().length == 7) {
						$('#form2').formValidation('validateField', 'password')
						.formValidation('validateField', 'passwordc');
						}
						});
						});
		</script>


  
		<script>
				// Check the captcha
				function checkCaptcha(value, validator, $field) {
					var items = $('#captchaOperation').html().split(' '),
						sum   = parseInt(items[0]) + parseInt(items[2]);
					return value == sum;
				}

				$(document).ready(function() {
					// Generate a simple captcha
					function randomNumber(min, max) {
						return Math.floor(Math.random() * (max - min + 1) + min);
					}
					$('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

					$('#basicBootstrapForm').formValidation();
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