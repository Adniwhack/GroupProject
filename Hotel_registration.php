<?php


include_once('function.php');
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    

    /*if($_POST['welcome']){
        // remove all session variables
        session_unset(); 

        // destroy the session 
        session_destroy();
    }
*/
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Hotel_name= $Hotel_address= $Hotel_city= $Hotel_Country= $Hotel_email= $Hotel_contact= $Hotel_Username= $Hotel_Password= $Hotel_PasswordCon = "";
        if (!empty($_POST['hotel_name'])){
            $Hotel_name = $_POST['hotel_name'];
        }

        if (!empty($_POST['address'])){
            $Hotel_address = $_POST['address'];
        }

        if (!empty($_POST['city'])){
            $Hotel_city = $_POST['city'];
        }
        if (!empty($_POST['country'])){
            $Hotel_Country = $_POST['country'];
        }
        if (!empty($_POST['hotel_name'])){
            $Hotel_email = $_POST['hotel_name'];
        }
        if (!empty($_POST['hotel_name'])){
            $Hotel_contact = $_POST['hotel_name'];
        }

        /*    if (empty($_POST['username'])){
                $nameErr = "This field is required";
            }else{
                $username = test_input($_POST['username']);
                if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
                    $nameErr = "Only letters numbers and underscore allowed";
                }
            }

            if (empty($_POST["Password"])){
                $passErr = "This field is required";
            }else{
                $password = test_input($_POST['password']);
            }

            if (empty($_POST['email'])){
                $emailErr = "This field is required";
            }else{
                $email = test_input($_POST['email']);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }

            if (isset($_POST['Country'])){
                $country = $_POST['Country'];
            }

            $City = $_POST['city'];


            if (empty($_POST["ConPassword"])){
                $passcErr = "This field is required";
            }else{
                $passwordc = test_input($_POST['passwordc']);
            }

            if (empty($_POST["Contact"])){
                $contErr = "This field is required";
            }else{
                $contact = test_input($_POST['contact']);
                if (!preg_match("[0-9]",$contact)){
                    $contErr = "Numbers only allowed";
                }
            }

            if (empty($_POST["address"])){
                $addrErr = "This field is required";
            }else{
                $address = test_input($_POST['address']);

            }

            if($password != $passwordc and  ($password != "" or $passwordc != "")){
                $passErr = "Passwords do not match";
            }
            else{
                if($nameErr == "" and $passErr == "" and $emailErr== "" and $contErr == "" and $addrErr == "" and $passcErr == ""){
                $log_obj = new dbFunction();
                $user = $log_obj->create_hotel($username, $password, $email, $address, $contact);
                header("Location:/home.php");
                }
            }*/
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
      
      </style>
    </head>
    
    <body>
        
                <div class="container-fluid">

            
                
                <div class="col-md-12">
            
            <nav class="navbar navbar-default" role="navigation" >
                

                <div class="navbar-header">
                     <button type="button" class="btn btn-primary btn-md">
                        
                          
          <span class="glyphicon glyphicon-home"></span> Home
        </button>
                    
                    <button type="button" class="btn btn-primary btn-md">
                         
          <span class="glyphicon glyphicon-chevron-left"></span> Back
        </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>                 
                </div>
                
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                    <ul class="nav navbar-nav navbar-right">
                        <button type="submit" class="btn btn-primary btn-md">
                            <span class=" glyphicon glyphicon-log-in"></span> Login
                        </button>
                        <button type="submit" class="btn btn-primary btn-md">
                            <span class=" glyphicon glyphicon-thumbs-up"></span> About us
                            
                        </button>
                        
                    </ul>
                    
                </div>
                
            </nav>
        </div>
        
        
            <!--Create account for hotel -->
                <div class="col-md-6">
                    <!--  Create the form horizontally !-->
                    <br></br>
                    <form name = "hotel_registration" class="form-horizontal col-md-10 col-md-offset-1" role="form" align = "left" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                       <legend>Enter your registration details here</legend>
                        
                        <div class="form-group" align = "center">
                            <label for="inputName" class="col-md-4 control-label">
                                Hotel name 
                            </label>
                            <div class="col-md-8">
                                <input type="inputName" class="form-control" id="inputName" name ="hotel_name" />
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label for="inputAddress" class="col-md-4 control-label">
                                Address
                            </label>
                            
                            <div class="col-md-8">
                                <input type="inputAddress" class="form-control" id="inputAddress" placeholder="No 10, Down Street, Colombo 10" name = "address"/>
                            </div>
                        </div>
                        
                        <div class="form-group" align = "center">
                            <label for="inputName" class="col-md-4 control-label">
                                City 
                            </label>
                            <div class="col-md-8">
                                <input type="inputName" class="form-control" id="inputName" name = "city"/>
                            </div>
                        </div>
                        
                        <div class="form-group" align = "center">
                            <label for="inputName" class="col-md-4 control-label" >
                                Country 
                            </label>
                            <div class="dropdown" name = "country">
                                  <button class="btn btn-default  dropdown-toggle" type="button" data-toggle="dropdown">   Country  
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu dropdown-menu-right" >
                                    <li><a href="#">Sri Lanka</a></li>
                                    <li><a href="#">India</a></li>
                                    
                                  </ul>
                                </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-md-4 control-label" align = "right">
                                Email ID
                            </label>
                            
                            <div class="col-md-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="abc@xyz.com" name = "email" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputNumber" class="col-md-4 control-label">
                                Contact No
                            </label>
                            
                            <div class="col-md-8">
                                <input type="inputNumber" class="form-control" id="inputNumber" placeholder="00947777123456" name = "Contact" />
                            </div>
                        </div>
                        
                        <div class="form-group" align = "center">
                            <label for="inputName" class="col-md-4 control-label">
                                User name 
                            </label>
                            <div class="col-md-8">
                                <input type="inputName" class="form-control" id="inputName" name = "username"/>
                            </div>
                        </div>
                        
                        <div class="form-group" >
                            <label for="inputPassword" class="col-md-4 control-label">
                                Password 
                            </label>
                            <div class="col-md-8">
                                <input type="inputPassword" class="form-control" id="inputName"  name = "Password" type = "password"/>
                            </div>
                        </div>
                        
                        <div class="form-group" >
                            
                            <label for="inputPassword" class="col-md-4 control-label">
                                Confirm password 
                            </label>
                            <div class="col-md-8">
                                <input type="inputPassword" class="form-control" id="inputName" name = "ConPassword" type = "password"/>
                            </div>
                            
                        </div>
                        
                        <div class="form-group" align = "center">
                            <label for="inputName" class="col-md-4 control-label">
                                Photos of the hotel
                            </label>
                            <div class="col-md-8">
                                
                                
                          <input type="file" name="pic" accept="image/*">

                        
                                                    </div>
                        </div>
                        <p>    I have read and accept the terms of the<a href="#" role="button" class="btn popovers" data-toggle="popover" title="" data-content="test content <a href='' title='test add link'>link on content</a>"data-original-title="test title">User Agreement</a></p>
                        
                                        <div class="form-group">
                    <div class="captcha">
                        <div id="recaptcha_image"></div>
                    </div>
                </div>
                        
                        <!-- Adding recaptcha into the page -->
                                    <div class="form-group">
                <div class="recaptcha_only_if_image">Enter the words above</div>
                <div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
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
                    </form></div>
        
    </body></html>