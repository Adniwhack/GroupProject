<?php

include_once('function.php');

    

    /*if($_POST['welcome']){
        // remove all session variables
        session_unset(); 

        // destroy the session 
        session_destroy();
    }
*/
$Hotel_name= $Hotel_address= $Hotel_city= $Hotel_Country= $Hotel_email= $Hotel_contact= $Hotel_Username= $Hotel_Password= $Hotel_PasswordCon = "";
$nameErr = $addressErr = $cityErr = $CountryErr = $emailErr = $contactErr = $usererr =$passerr  = $conpasserr = "";
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
        if (!empty($_POST['Country'])){
            $Hotel_Country = $_POST['Country'];
        }
        else{
            $CountryErr = "Fill this field";
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
        if (!empty($_POST['username'])){
            $Hotel_Username = $_POST['username'];
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
        $Hotel_Username =($Hotel_Username);
        $Hotel_email = ($Hotel_email);

        if (!preg_match("/^[a-zA-Z0-9_]*$/",$Hotel_Username)) {
            $usererr = "Only letters numbers and underscore allowed";
        }
         else{
            if (strlen($Hotel_Username) < 8 or strlen($Hotel_Username) > 20 ){
                $usererr = "Length of username should be between 8 - 20 characters";
            }
         }

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




        if($nameErr == "" and $addressErr == "" and $cityErr == "" and $CountryErr == "" and  $emailErr == "" and  $contactErr == "" and  $usererr =="" and $passerr  == "" and  $conpasserr == ""){
            $log = new dbFunction();
            $log->create_hotel($Hotel_Username, $Hotel_email , $Hotel_Password, $Hotel_address, $Hotel_city , $Hotel_Country , $Hotel_contact, $Hotel_name);
            header("Location:home.html");
        }


    }

 ?>

<!DOCTYPE html>
<html lang="en">
    <!--  Adding bootstrap !-->
 <head>
   
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
    
    <body background="images/123.jpg">
    <nav class="navbar navbar-default">
		<div class="container-fluid">
    			<div class="navbar-header">
      				<ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
					</ul>
                        </div>
                    <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
		

    		
      				<ul class="nav nav-pills navbar-right">
        
        				<!--<li><a href="#"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#A7A79B">Rooms</font></b></span></a></li>-->
        				<!--li><a href="#"><span class="glyphicon glyphicon-user"><b><font size="4" color="#A7A79B">Profile</font></b></span></a></li-->
        				<!--<li><a href="#"><span class="glyphicon glyphicon-file"><b><font size="4" color="#A7A79B">Reports</font></b></span></a></li>-->
                                <li><a href="#"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></a></li>
				<li><a href="#"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#FFF" face="calibri light"> AboutUs</font></b></a></li>
      				<li><a href="#"><span class="glyphicon glyphicon-phone-alt"><b><font size="4" color="#FFF" face="calibri light"> ContactUs</font></b></a></li></ul>
					
    			
  		</div>
	</nav>

        
            <!--Create account for hotel -->
                <div class="container">
                <div class="col-md-6">
                    <!--  Create the form horizontally !-->
                    <br><br>
                    <form name = "hotel_registration" class="form-horizontal col-md-10 col-md-offset-1" role="form" align = "left" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <legend> <font color=" #FFF"> <b> Enter your registration details here </b></font> </legend>
                        
                        <div class="form-group">
                            <label for="inputName" class="col-md-4 control-label"> <font color=" #FFF">
                                Hotel name 
                                </font>
                            </label>
                            <div class="col-md-8">
                                <input type="inputName" class="form-control" id="inputName" name ="hotel_name" />
                            </div>
                        </div>
                        <?php
                        if(!empty($nameErr)){
                            echo '<div class="alert alert-warning">'.$nameErr.'</div>';
                        }
                        ?>
                        
    <!--<div class="form-group">
      <label for="name">Star ratings(If applicable)</label>
      <select class="form-control">
         <option>One star</option>
         <option>Two stars</option>
         <option>Three stars</option>
         <option>Four stars</option>
         <option>Five stars</option>
      </select>
	</div>-->
                        
                        <div class="form-group">
                            <label for="inputAddress" class="col-md-4 control-label"> <font color=" #FFF">
                                Address </font>
                            </label>
                            
                            <div class="col-md-8">
                                <input type="inputAddress" class="form-control" id="inputAddress" placeholder="No 10, Down Street, Colombo 10" name = "address"/>
                            </div>
                        </div>
                        <?php
                        if(!empty($addressErr)){
                            echo '<div class="alert alert-warning">'.$addressErr.'</div>';
                        }
                        ?>
                        
                        <div class="form-group" >
                            <label for="inputName" class="col-md-4 control-label"> <font color=" #FFF">
                                City </font>
                            </label>
                            <div class="col-md-8">
                                <input type="inputName" class="form-control" id="inputName" name = "city"/>
                            </div>
                        </div>
                        <?php
                        if(!empty($cityErr)){
                            echo '<div class="alert alert-warning">'.$cityErr.'</div>';
                        }
                        ?>

                        <div class="form-group" align = "center">
                            <label for="inputName" class="col-md-4 control-label" ><font color=" #FFF">
                                    Country</font>
                            </label>
                            <div class="col-md-8">
                            <select class="form-control" name="Country">
                                <option>Sri Lanka</option>
                                <option>India</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-md-4 control-label" align = "right"> <font color=" #FFF">
                                Email ID </font>
                            </label>
                            
                            <div class="col-md-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="abc@xyz.com" name = "email" />
                            </div>
                        </div>
                        <?php
                        if(!empty($emailErr)){
                            echo '<div class="alert alert-warning">'.$emailErr.'</div>';
                        }
                        ?>

                        <div class="form-group">
                            <label for="inputNumber" class="col-md-4 control-label"> <font color=" #FFF">
                                Contact No </font>
                            </label>
                            
                            <div class="col-md-8">
                                <input type="number" class="form-control" id="inputNumber" placeholder="00947777123456" name = "contact" />
                            </div>
                        </div>
                        <?php
                        if(!empty($contactErr)){
                            echo '<div class="alert alert-warning">'.$contactErr.'</div>';
                        }
                        ?>
                        
                        <div class="form-group">
                            <label for="inputName" class="col-md-4 control-label"> <font color=" #FFF">
                                User name </font>
                            </label>
                            <div class="col-md-8">
                                <input type="inputName" class="form-control" id="inputName" name = "username"/>
                            </div>
                        </div>
                        <?php
                        if(!empty($usererr)){
                            echo '<div class="alert alert-warning">'.$usererr.'</div>';
                        }
                        ?>
                        
                        <div class="form-group" >
                            <label for="inputPassword" class="col-md-4 control-label"> <font color=" #FFF">
                                Password </font>
                            </label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" id="inputName"  name = "password" type = "password"/>
                            </div>
                        </div>
                        <?php
                        if(!empty($passerr)){
                            echo '<div class="alert alert-warning">'.$passerr.'</div>';
                        }
                        ?>
                        
                        <div class="form-group" >
                            
                            <label for="inputPassword" class="col-md-4 control-label"> <font color=" #FFF">
                                Confirm password </font>
                            </label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" id="inputName" name = "passwordc" type = "password"/>
                            </div>
                            
                        </div>
                        <?php
                        if(!empty($conpasserr)){
                            echo '<div class="alert alert-warning">'.$conpasserr.'</div>';
                        }
                        ?>
                        <div class="form-group" >
                            <label for="inputName" class="col-md-4 control-label"> <font color=" #FFF">
                                Photos of the hotel </font>
                            </label>
                            <div class="col-md-8">
                                
                                
                          <input type="file" name="pic" accept="image/*">

                        
                                                    </div>
                        </div>
                        <p>  <font color=" #FFF">  I have read and accept the terms of the </font><a href="#" role="button" class="btn popovers" data-toggle="popover" title="" data-content="test content <a href='' title='test add link'>link on content</a>"data-original-title="test title"> <font color=" #FFF"> <u>User Agreement</u> </font></a></p>
                        
                                        <div class="form-group">
                    <div class="captcha">
                        <div id="recaptcha_image"></div>
                    </div>
                </div>
                        
                        <!-- Adding recaptcha into the page -->
                                    <div class="form-group">
                                        <div class="recaptcha_only_if_image"> <font color=" #FFF">Enter the words above</font></div>
                                        <div class="recaptcha_only_if_audio"><font color=" #FFF">Enter the numbers you hear</font></div>
                <div class="input-group">
                    <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" class="form-control input-lg" /> <a class="btn btn-default input-group-addon" href="javascript:Recaptcha.reload()"><span class="icon-refresh"></span></a>
             <a class="btn btn-default input-group-addon recaptcha_only_if_image" href="javascript:Recaptcha.switch_type('audio')"><span class="icon-volume-up"></span></a>
             <a class="btn btn-default input-group-addon recaptcha_only_if_audio" href="javascript:Recaptcha.switch_type('image')"><span class="icon-picture"></span></a>

                </div>
                <script>
                    var RecaptchaOptions = {
                        theme: 'custom',
                        custom_theme_widget: 'recaptcha_widget'
                    };
                </script>
                <script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6LcrK9cSAAAAALEcjG9gTRPbeA0yAVsKd8sBpFpR"></script>
                <noscript>
                    <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LcrK9cSAAAAALEcjG9gTRPbeA0yAVsKd8sBpFpR" height="300" width="500" frameborder="0"></iframe>
                    <br/>
                    <textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
                    <input type="hidden" name="recaptcha_response_field" value="manual_challenge" />
                </noscript>
            </div>
                        
                        
                        <div class="form-group" align = "right">
                            <div class="col-sm-offset-2 col-sm-10">
                                
                                <button type="Next" class="btn btn-default">
                                    
                                    Next
                                </button>
                                
                                
                            </div>
                        </div>
                    </form></div> </div>
        
    </body></html>