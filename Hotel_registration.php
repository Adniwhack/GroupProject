<?php

include_once('function.php');
//create variable which use in the hotel registration
$Hotel_name= $Hotel_address= $Hotel_city= $Hotel_email= $Hotel_contact= $Hotel_Description= $Hotel_Password= $Hotel_PasswordCon = "";
$nameErr = $addressErr = $cityErr= $emailErr = $contactErr = $usererr =$passerr  = $conpasserr = "";
//check the variables are containing the values 
if($_SERVER["REQUEST_METHOD"] == "POST"){

        if (!empty($_POST['hotel_name'])){
            $Hotel_name = $_POST['hotel_name'];
        }
        else{
            $nameErr = "Fill this field";
        }

        if (!empty($_POST['address'])){
            $Hotel_address = $_POST['address'];
        }
        else{
            $addressErr = "Fill this field";
        }

        if (!empty($_POST['city'])){
            $Hotel_city = $_POST['city'];
        }
        else{
            $cityErr = "Fill this field";
        }
        if (!empty($_POST['email'])){
            $Hotel_email = $_POST['email'];
        }
        else{
            $emailErr = "Fill this field";
        }
        if (!empty($_POST['contact'])){
            $Hotel_contact = $_POST['contact'];
        }
        else{
            $contactErr = "Fill this field";
        }
        if (!empty($_POST['description'])){
            $Hotel_Description = $_POST['description'];
        }
        else{
            $usererr = "Fill this field";
        }

        if (!empty($_POST['password'])){
            $Hotel_Password = $_POST['password'];
        }
        else{
            $passerr = "Fill this field";
        }
        if (!empty($_POST['passwordc'])){
            $Hotel_PasswordCon = $_POST['passwordc'];

        }
        else{
            $conpasserr = "Fill this field";
        }
        $Hotel_name = ($Hotel_name);
        $Hotel_Description =($Hotel_Description);
        $Hotel_email = ($Hotel_email);

        

        if (strlen($Hotel_Password) < 8){
            $passerr = "Password length should be greater than 8 characters";
        }
        else{
        if ($Hotel_Password != $Hotel_PasswordCon){
            $passerr ="Passwords do not match!";
        }
        }
        if (!preg_match("/^[0-9_]*$/",$Hotel_contact)) {
            $contactErr = "Only numbers and underscore allowed";
        }

        if (!filter_var($Hotel_email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }    



        //check whether values give errors if not it'll call the create_hotel function in the function.php 
        if($nameErr == "" and $addressErr == "" and $cityErr == "" and $emailErr == "" and  $contactErr == "" and  $usererr =="" and $passerr  == "" and  $conpasserr == ""){
            $log = new dbFunction();
            //call the function create_hotel in function.php
            $res = $log->create_hotel($Hotel_Description, $Hotel_email , $Hotel_Password, $Hotel_address, $Hotel_city, $Hotel_contact, $Hotel_name);
            //insert images to database
            if ($res != null){
                $id = md5($Hotel_name);
                if (!empty($_FILES)) {
                    //$file_ary = reArrayFiles($_FILES);
                    $filepath = "images/".$id;
                    if (!file_exists($filepath)){
                        $fl = mkdir($filepath);}
                
                    }
                    $v = 1;
                    $c = 3;
                    $extarray = array("jpeg","jpg","png","gif");
                    foreach($_FILES["pic"]["tmp_name"] as $key=>$tmp_name){
                        $file_name= $_FILES["pic"]["name"][$key];
                        $file_tmp = $_FILES["pic"]["tmp_name"][$key];
                        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                        if(in_array($ext, $extarray)){
                        $target = $filepath."/".$file_name;
                        move_uploaded_file($file_tmp= $_FILES["pic"]["tmp_name"][$key],$target);
                        $Que = "Insert into hotel_photo(email, photo_id, photo_address, featured) VALUES ('$Hotel_email','$file_name','$target',$v)";
                        echo $Que;
                        $res = mysql_query($Que);
                        if ($c == 0){
                            $v = 0;
                        }
                        $c--;
                        }
                    
                        }
                }
                header("Location:mapmark.php?id=".$id."");
            }
            else{
                
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
            <!-- Adding recaptcha file in to the page -->
    <style>
            .captcha, #recaptcha_image, #recaptcha_image img {
             width:100% !important;
         }
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
    
<body bgcolor="#fff">

<!-- Building the nav bar of the page-->

	<nav class="navbar navbar-default">
		<div class="container-fluid">
    			<div class="navbar-header">
      				<ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li></ul>
                        </div>
                        <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
                        <ul class="nav nav-pills navbar-right">
                            <li><a href="homepage.php"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></a></li>
                            <li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#FFF" face="calibri light"> About Us</font></b></a></li>
                            <li><a href="aboutus.html"><span class="glyphicon glyphicon-envelope"><b><font size="4" color="#FFF" face="calibri light"> Contact Us</font></b></a></li>
                        </ul>
  		</div>
	</nav>

        
<!--Form for creating account for hotel -->

<div class="container">
    <div class="col-md-7">
<!--  Create the form horizontally !-->              
        <form id="contactForm" name = "hotel_registration" class="form-horizontal col-md-10 col-md-offset-1" role="form" align = "left" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
            <legend> <font color=" #000"> <b> Enter your registration details here </b></font> 
            </legend>
            <font color="red"> <b> * All fields are required to be filled</b></font>
			<br><br><br>
            
            <div class="jumbotron">
            <!--creating form lables and inputs-->
                <div class="form-group">
                    <label for="inputName" class="col-md-4 control-label" > 
                        <font color=" #000">Hotel name </font>
                    </label>
                        <div class="col-md-8">
                            <input type="inputName" class="form-control" id="inputName" name ="hotel_name"  required />
                        </div>
                </div>        					
                    <?php
                        if(!empty($nameErr)){
                            echo '<div class="alert alert-warning">'.$nameErr.'</div>';
                        }
                    ?>
            
                <div class="form-group">
                    <label for="inputAddress" class="col-md-4 control-label" > 
                        <font color=" #000">Address </font>
                    </label>
                        <div class="col-md-8">
                            <input type="inputAddress" class="form-control" id="inputAddress" placeholder="No 10, Down Street, Colombo 10" name = "address" required />
                        </div>
                </div>
						
                    <?php
                        if(!empty($addressErr)){
                            echo '<div class="alert alert-warning">'.$addressErr.'</div>';
                        }
                    ?>
                        
                <div class="form-group" >
                    <label for="inputName" class="col-md-4 control-label" > 
                        <font color=" #000">City </font>
                    </label>
                        <div class="col-md-8">
                            <input type="inputName" class="form-control" id="inputName" name = "city" required/>
                        </div>
                </div>
						
                    <?php
                        if(!empty($cityErr)){
                            echo '<div class="alert alert-warning">'.$cityErr.'</div>';
                        }
                    ?>			
                    <?php
                        if(!empty($emailErr)){
                            echo '<div class="alert alert-warning">'.$emailErr.'</div>';
                        }
                    ?>

                <div class="form-group">
                    <label for="inputEmail3" class="col-md-4 control-label" align = "right"> 
                        <font color=" #000">Email ID </font>
                    </label>
                        <div class="col-md-8">
                           <input type="email" class="form-control" id="inputEmail3" placeholder="abc@xyz.com" name = "email" required />
                        </div>
                </div>
							
                    <?php
                        if(!empty($emailErr)){
                            echo '<div class="alert alert-warning">'.$emailErr.'</div>';
                        }
                    ?>

                <div class="form-group">
                    <label for="inputNumber" class="col-md-4 control-label" > 
                        <font color=" #000">Contact No</font></label>
                        <div class="col-md-8">
                            <input id="inputNumber" class="form-control" type="tel" pattern="^\d{10}$" name = "contact" required placeholder="0718257237">
                        </div>
                </div>
							
                    <?php
                        if(!empty($contactErr)){
                            echo '<div class="alert alert-warning">'.$contactErr.'</div>';
                        }
                    ?>
                        
                <div class="form-group">
                    <label for="inputName" class="col-md-4 control-label" required> 
                        <font color=" #000">Description </font>
                    </label>
                        <div class="col-md-8">
                            <textarea name="description" rows="5" cols="5" class="form-control"/></textarea>
                        </div>			
                </div>
							
                    <?php
                        if(!empty($usererr)){
                            echo '<div class="alert alert-warning">'.$usererr.'</div>';
                        }
                    ?>
                        
                <div class="form-group" >
                    <label for="inputPassword" class="col-md-4 control-label" required>
                        <font color=" #000">Password </font>
                            </label>
                            <div class="col-md-8">
                            <input type="password" class="form-control"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  id="inputName"  name = "password" type = "password"/>
                            </div>
						</div>
							
                        <?php
                        if(!empty($passerr)){
                            echo '<div class="alert alert-warning">'.$passerr.'</div>';
                        }
                        ?>
                        
                        <div class="form-group" >
                            <label for="inputPassword" class="col-md-4 control-label" required> <font color=" #000">
                            Confirm password </font>
                            </label>
                            <div class="col-md-8">
                            <input type="password" class="form-control" id="inputName" name = "passwordc" type = "password"/>
                            </div>
                        </div>
							
						<p> <font size=2'>Please note that password should consist at least one number and one uppercase and lowercase letter, and at least 8 or more characters.</font></p>

							<?php
                        if(!empty($conpasserr)){
                            echo '<div class="alert alert-warning">'.$conpasserr.'</div>';
                        }
                        ?>
						
                        <div class="form-group" >
                            <label for="inputName" class="col-md-4 control-label" required> <font color=" #000">
                            Photos of the hotel </font>
                            </label>
                            <div class="col-md-8">
							<input type="file" name="pic[]" accept="image/*" multiple>
							</div>
						</div>
						
						<p> <font size='3' color="red">*First three photos will be allocated for the image slider </font></p>
						
						
						<hr>	
						<p> <font size='3'>Please complete the following task for verification.</font></p>
							
							
						<div class="form-group">
							<label class="col-md-4 control-label" id="captchaOperation"></label>
							<div class="col-xs-8">
							<input type="text" class="form-control" name="captcha" />
							</div>
						</div>
						
						<?php
                        if(!empty($conpasserr)){
                            echo '<div class="alert alert-warning">'.$conpasserr.'</div>';
                        }
                        ?>
							
						
						<div class="form-group">
							<div class="col-md-9 col-md-offset-3">
							<div id="messages"></div>
							</div>
						</div>
						
<!--to do real time validation (ajax)-->
					
<script type="text/javascript">
			$(document).ready(function() {
				$('#contactForm').bootstrapValidator({
					container: '#messages',
					feedbackIcons: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
					},
					fields: {
						hotel_name: {
							validators: {
								notEmpty: {
									message: 'The first name is required and cannot be empty'
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
						}
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


<!--capcha-->

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


					
					
                        
            <div class="form-group" align = "right">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success" >Next
            </button>
            </div>
            </div>						
</div> 
        </form>
         
    </div>
<div class="col-md-5">
<br><br><br><br><br><br><br>
<p><center><font size='3' color="#161640">*Layout of the hotel profile page</font></center><p>
<br><br>
<img src="hotelimages/layout.jpg">
</div>
</div>

<!--footer start here-->

<!--description before footer-->
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

</style> 

<!--footer end here-->		
 
</body>
</html>