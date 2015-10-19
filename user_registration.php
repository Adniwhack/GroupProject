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
<form role="form"  onSubmit="return validate();">

	<div class="row">
	<div class="jumbotron">
   <div class="form-group">
      <label for="name">First Name</label>
      <input type="text" class="form-control" id="Fname" 
         placeholder="Enter Name of the hotel" required>
   </div>
  <div class="form-group">
      <label for="name">Last Name</label>
      <input type="text" class="form-control" id="Lname" 
         placeholder="Enter Name of the hotel" required>
   </div>
<div class="form-group">
<label for="gender">Gender</label>
<div class="radio">
<label class="radio-inline"><input type="radio" name="optradio">Male </label>
<label class="radio-inline"><input type="radio" name="optradio">Female</label>
</div>
</div>

<div class="form-group">
<label for="date_of_birth">Date of Birth <span class="glyphicon glyphicon-calendar"></span>:</label>
<input type="date" id="date_of_birth" class="form-control" placeholder="dd/mm/yyyy or dd-mm-yyyy">
</div>
   
<div class="form-group">
<label for="address">Address</label>
<textarea class="form-control" rows="3"></textarea>
</div>
  
  
<div class="form-group">
<label for="country">Country</label>
<input type="text" class="form-control" >
</div>
  
 
  
  <div class="form-group">
    <label for="name">contact number</label>
    <input type="text" class="form-control" >
  </div>
  
  
  
  <div class="form-group">
    <label for="name">E-mail address</label>
    <input type="email" class="form-control" placeholder="Enter your e-mail address" required>
  </div>
 
  
  <div class="form-group">
    <label for="name">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
  </div>
  
  <div class="form-group">
    <label for="name">Confirm password</label>
    <input type="password" class="form-control" id="confirm_password" placeholder="Please re-enter your password" required>
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