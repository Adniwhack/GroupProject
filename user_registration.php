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
      $LnameErr = "THis field is required.";
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

    $Contact = $_POST['Contact'];
    if (isset($Contact)){
      $Contact = test_input($_POST["Contact"]);
      if (!preg_match("/^[0-9]{10}$/",$Contact)) {
      $ContactErr = "You can enter 10 numbers only";
      }
    }

    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Passwordc = $_POST['passwordc'];

    if ($Password == $Passwordc and $Password != "" and $FnameErr == "" and $LnameErr=="" and $ContactErr=="") {
        $log = new dbFunction();

        $log->create_reg_user($Fname, $Lname, $Address, $Contact, $Country, $Email, $Password, "", $Gender, $DOB);


       // header("location:index.html");
       // echo "<script>alert('User Registered')</script>";


        $to      = $Email;
        //echo $to;
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
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>User registration form</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<style>

.background {
    width: 100%;
    height:auto;
    top: 0px;
    left: 0px;
    z-index: -1;
    position: absolute;

}
  


.jumbotron {
    padding-left: 0px;
    padding-top: 50px;
    padding-bottom: 50px;
}
</style>

</head>
<body background="hotelimages/neela6.jpg">
 
<nav class="navbar navbar-default" >
   <div class="navbar-header">
	         		<ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
					</ul>
		  <a class="navbar-brand" href="#">Online Hotel Reservation and Management System </a>
	   </div>
	</nav>
	<br><br>


	<div class="container">
	<div class="col-sm-8">
<p><h4><b>  Please enter your details in the form below.</b></h4></p>
<br><br>
<form role="form"  onSubmit="return validate();" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

	<div class="row">
	<div class="jumbotron">
   <div class="form-group">
      <label for="name">First Name</label>
      <input type="text" class="form-control" id="Fname" name="Fname"
         placeholder="Enter First Name" required>
         <div class="alert alert-warning" ><?php echo $FnameErr;?></div>
   </div>
  <div class="form-group">
      <label for="name">Last Name</label>
      <input type="text" class="form-control" id="Lname" name="Lname"
         placeholder="Enter Last Name" required>
         <div class="alert alert-warning" ><?php echo $LnameErr;?></div>
   </div>
<div class="form-group">
<label for="gender">Gender</label>
<div class="radio">
<label class="radio-inline"><input type="radio" name="Gender" value="Male">Male </label>
<label class="radio-inline"><input type="radio" name="Gender" value="Female">Female</label>
</div>
</div>

<div class="form-group">
<label for="date_of_birth">Date of Birth <span class="glyphicon glyphicon-calendar"></span>:</label>
<input type="date" id="date_of_birth" class="form-control" name="DOB" placeholder="dd/mm/yyyy or dd-mm-yyyy">
</div>
   
<div class="form-group">
<label for="address">Address</label>
<textarea class="form-control" rows="3" name="Address"></textarea>
</div>
  
  
<div class="form-group">
<label for="country">Country</label>
<input type="text" class="form-control" name="Country" >
</div>
  
 
  
  <div class="form-group">
    <label for="name">contact number</label>
    <input type="text" name="Contact" class="form-control" >
    <div class="alert alert-warning" ><?php echo $ContactErr;?></div>
  </div>
  
  
  
  <div class="form-group">
    <label for="name">E-mail address</label>
    <input type="email" name="email" class="form-control" placeholder="Enter your e-mail address" required>
  </div>
 
  
  <div class="form-group">
    <label for="name">Password</label>
    <input type="password" class="form-control" id="password"  name="password" placeholder="Enter your password" required>
  </div>
  
  <div class="form-group">
    <label for="name">Confirm password</label>
    <input type="password" class="form-control" id="confirm_password" name="passwordc" placeholder="Please re-enter your password" required>
  </div>
 <script>
        function validate(){

        var a = document.getElementById("password").value;
        var b = document.getElementById("confirm_password").value;
        if (a!=b) {
        alert("Passwords do no match");
        return false;
        }
    }
   </script>
  
 
   
   <div class="btn-group-vertical">
   <button type="submit" class="btn btn-default">Submit</button>
   <br>
   <a href="#" class="btn btn-info" role="button">Next</a>
   </div>
</form>
</div>
</div>
</div>
</div>

<br><br><br><br>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
  </body>
 </html>