<?php

    if (!$_SESSION['hotel_login']){

		$_SESSION['Reservation'] = true;
        //Enter redirect here

        //header('location:hotel_login.php');
		//exit();
    }
	else{

	}

?>


<!DOCTYPE html>
<?php 
	include_once('function.php');
	$func = new dbUser();


	$Hotel_ID = $_SESSION['hotel_id'];
	$Hotel_name = $_SESSION['hotel'];

	$Room_ID = $_SESSION['Room_ID'];
	$Room_name = $_SESSION['Room_name'];

	$User_ID = $_SESSION['customer_ID'];
	$First_Name = $Last_Name = $Country = $Contact =$Address = $DOB = $Checkin =$Checkout = "";

	$First_Name = $_POST['First_Name'];
	$Last_Name = $_POST['Last_Name'];
	$Gender = $_POST['Gender'];
	$Country = $_POST['Country'];
	$Contact = $_POST['Contact'];
	$Checkin = $_POST['Check_in'];
	$Checkout = $_POST['Check_out'];
$Check_in = date( 'Y-m-d H:i:s', $Check_in );
$Check_out = date( 'Y-m-d H:i:s', $Check_out );
	$Status = "NP";

	$func->user_reserve($Hotel_ID, $User_ID, $Room_ID, $Checkin, $Checkout, $First_Name,$Last_Name, $Gender, $Country, $Status);




?>




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
      
      
    </head>
    
    
    <body>
    
        <!-- Navigation bar which is in the top of the page -->
                <div class="container-fluid">
	<div class="row">
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
							<span class=" glyphicon glyphicon-log-in"></span> Login as 
						
                        </button>
                        
                        <button type="submit" class="btn btn-primary btn-md">
                            <span class=" glyphicon glyphicon-thumbs-up"></span> About us
							
						</button>
						
					</ul>
				</div>
				
			</nav>
        </div></div>
        <div class="row">
		<div class="col-md-18">
            <h3 class="text-primary" align = "center" ><b><?php echo $Hotel_name; ?></b></h3>
		</div>
	</div>
        <div class="container-fluid">
            
	
                <!--Create account for hotel -->
				<div class="col-md-6">
                    <!--  Create the form horizontally !-->
                    <br><br>
                    <form name = "reservation" class="form-horizontal col-md-10 col-md-offset-1" role="form" align = "left" >
					   <legend>Enter reservation details for <?php echo $Room_name; ?></legend>
                        
                        <div class="form-group" align = "center">
							<label for="first_name" class="col-md-4 control-label">
								First name 
							</label>
                            <div class="col-md-8">
								<input type="inputName" class="form-control" id="inputName" name = "First_Name" />
							</div>
						</div>
                        
                        <div class="form-group" align = "center">
							<label for="inputName" class="col-md-4 control-label">
								Last name 
							</label>
                            <div class="col-md-8">
								<input type="inputName" class="form-control" id="inputName"  name = "Last_Name" />
							</div>
						</div>
                        
                        <div class="form-group" align = "center">
							<label for="inputName" class="col-md-4 control-label" >
								Gender 
							</label>
                            <div class="dropdown" name = "Gender">
                                  <button class="btn btn-default  dropdown-toggle" type="button" data-toggle="dropdown">   Gender  
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu dropdown-menu-right" >
                                    <li><a href="#">Male</a></li>
                                    <li><a href="#">Female</a></li>
                                    
                                  </ul>
                                </div>
						</div>
                        
                        <div class="form-group" align = "center">
							<label for="inputName" class="col-md-4 control-label">
								Date of birth 
							</label>
                            <div class="col-md-8">
								
                        <input type="date" id="for" class="form-control" name = "DOB">
							</div>
						</div>
                      
                        <div class="form-group">
							<label for="inputAddress" class="col-md-4 control-label">
								Address
							</label>
							
                            <div class="col-md-8">
								<input type="inputAddress" class="form-control" id="inputAddress" placeholder="No 10, Down Street, Colombo 10" name = "Address"/>
							</div>
						</div>
                        
                        <div class="form-group" align = "center">
							<label for="inputName" class="col-md-4 control-label">
								Country 
							</label>
                    
                            <div class="dropdown" name = "Country">
                                  <button class="btn btn-default  dropdown-toggle btn-md"  type="button" data-toggle="dropdown">   Country  
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu dropdown-menu-right" >
                                    <li><a href="#">HTML</a></li>
                                    <li><a href="#">CSS</a></li>
                                    <li><a href="#">JavaScript</a></li>
                                  </ul>
                                </div>
						</div>
                        
                        <div class="form-group">
							<label for="inputNumber" class="col-md-4 control-label">
								Contact No
							</label>
							
                            <div class="col-md-8">
								<input type="inputNumber" class="form-control" id="inputNumber" placeholder="00947777123456" name= "Contact"/>
							</div>
						</div>
                        
                        <div class="form-group" align = "center">
							<label for="inputName" class="col-md-4 control-label">
								Check in
							</label>
                            <div class="col-md-8">
								
                        <input type="date" id="for" class="form-control" name = "Checkin">
							</div>
						</div>
                        
                        <div class="form-group" align = "center">
							<label for="inputName" class="col-md-4 control-label">
								Check out
							</label>
                            <div class="col-md-8">
								
                        <input type="date" id="for" class="form-control" name = "Checkout">
							</div>
						</div>
                        
                        
                        <div class="form-group" align = "center">
							<label for="inputName" class="col-md-4 control-label">
								Payment method 
							</label>
                        <div class="dropdown" name = "PayType">
                                  <button class="btn btn-default  dropdown-toggle btn-md"  type="button" data-toggle="dropdown">   Payment method  
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu dropdown-menu-right" >
                                    <li><a href="#">Cash</a></li>
                                    <li><a href="#">Cheque</a></li>
                                    <li><a href="#">Credit card</a></li>
                                  </ul>
                                </div>
                        </div>
                        
                        <p>    I have read and accept the terms of the<a href="#" role="button" class="btn popovers" data-toggle="popover" title="" data-content="test content <a href='' title='test add link'>link on content</a>"data-original-title="test title">User Agreement</a></p>
                        
                                        <div class="form-group">
                    <div class="captcha">
                        <div id="recaptcha_image"></div>
                    </div>
                </div>
                        <div class="form-group" align = "right">
							<div class="col-sm-offset-2 col-sm-10">
                                
								<button type="Next" class="btn btn-default" type="submit">
                                    
									Save
								</button>
                                
                                
							</div>
						</div>
                        

                        
                        
                        </div>
            </div>
        
        
        
        
        </div>
    
    </body>