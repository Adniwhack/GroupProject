<?php
	include "function.php";
	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$FirstName = $_POST['fname'];
		$LastName = $_POST['lname'];
		$Address = $_POST['address'];
		$Country = $_POST['Country'];
		$Contact = $_POST['cnumber'];

		$hotelid = $_SESSION['hotel_id'];
		$roomid = $_SESSION['room_id'];

		$checkout =  date ("Y-m-d H:i:s", $_POST ["checkout"]);
		$checkin =  date ("Y-m-d H:i:s", $_POST ["checkin"]);
		$logx = new dbFunction();
		$logx->create_custom_user($FirstName, $Lastname,$Address, $Contact, $Country);

		$log = new dbUser();
		$log->user_reserve($hotelid, $userid, $roomid, $checkin, $checkout);
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
  
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
    
    <body background="images/back2.jpg">
	<!-- Navigation bar which is in the top of the page -->
               
        <nav class="navbar navbar-default">
		<div class="container-fluid">
				<div class="navbar-header">
					<ul class="nav navbar-nav navbar-left"><li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li>
					</ul>
				</div>
		
		<div>
					 <ul class="nav nav-pills navbar-left">
                        <li><a href="#"><span class="glyphicon glyphicon-home"><b><font size="4" color="#A7A79B">Home</font></b></span></a></li>  
						<li><a href="#"><span class="glyphicon glyphicon-chevron-left"><b><font size="4" color="#A7A79B">Back</font></b></span></a></li>
						
						<li><form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Hotel, Guest house etc" />
						</div> 
						<button type="submit" class="btn btn-primary btn-md">
							Search
						</button>
					</form></li>		
					</ul>
                     </ul>
				</div>
				<div>
						<ul class="nav nav-pills navbar-right">
						   <li><a href="#"><span class="glyphicon glyphicon-log-in"><b><font size="4" color="#A7A79B">Login</font></b></span></a></li>
						 <li><a href="#"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#A7A79B">AboutUs</font></b></span></a></li>
						 <li><a href="#"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#A7A79B">Rooms</font></b></span></a></li>
				
				
				
				</div>
                    
			<!--button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button-->                 
				</div>
				
				<!--div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
					<ul class="nav navbar-nav">

						<li >
                            
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Price Range<strong class="caret" ></strong></a>
						</li>
                        
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">City<strong class="caret" ></strong></a>
						</li>
						
					</ul-->
                    
                        <!--form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Hotel, Guest house etc" />
						</div> 
						<button type="submit" class="btn btn-primary btn-md">
							Search
						</button>
					</form-->					
                    <!--ul class="nav navbar-nav navbar-right">
						<button type="submit" class="btn btn-primary btn-md">
							<span class=" glyphicon glyphicon-log-in"></span> Login
						</button>
                        <button type="submit" class="btn btn-primary btn-md">
                            <span class=" glyphicon glyphicon-thumbs-up"></span> About us
							
						</button>
						<button type="submit" class="btn btn-primary btn-md">
                            <span class=" glyphicon glyphicon-modal-window"></span> Rooms
							
						</button>
						
					</ul-->
				</div>
				
			</nav>
			<div class="container">
			<div class="jumbotron">
			<div class="row">
			
			<div class="col-sm-offset-2 col-sm-6">
                    <!--  Create the form horizontally !-->
                    <br>
                    
                    
                    <form class="form-horizontal col-md-10 col-md-offset-1" data-toggle="validator" role="form" align = "center" >
					   <legend>Your Details</legend>
					   <div class="form-group" align = "center">
							<label for="finame" class="col-md-4 control-label" >
								First Name:
							</label>
							<?php
							if(isset($_POST["fname"])){echo $_POST ["fname"]; }?>
                            
						</div>
						
						<div class="form-group" align = "center">
							<label for="laname" class="col-md-4 control-label" >
								Last Name:
							</label>
							<?php if(isset($_POST["lname"])){echo $_POST ["lname"]; }?>
                            
						</div>
						
						<div class="form-group" align= "center">
							<label for="gender" class="col-md-4 control-label">
								Gender:
							</label>
							
								<?php
									if (isset($_POST['gender'])) {
										{
										if ($_POST['gender']=="male") { echo "Male"; }
											else { echo "Female"; }
										} 
																	}
								?>
						</div>
						<div class="form-group" align = "center">
							<label for="add" class="col-md-4 control-label" >
								Address:
							</label>
							<?php if(isset($_POST["address"])){echo $_POST ["address"]; }?>
                            
						</div>
						
						<div class="form-group" align = "center">
							<label for="add" class="col-md-4 control-label" >
								Country:
							</label>
							<?php
									
										if ($_POST['Country']=="UK") { echo "United Kingdom"; }
											elseif ($_POST['Country']=="germany") { echo "Germany"; }
												else{echo "USA";}
										 
																	
								?>
							
						</div>
						
						<div class="form-group" align = "center">
							<label for="number" class="col-md-4 control-label" >
								Contact Number:
							</label>
							<?php if(isset($_POST["cnumber"])){echo $_POST ["cnumber"]; }?>
                            
						</div>
						
						<div class="form-group" align = "center">
							<label for="checkindate" class="col-md-4 control-label" >
								Check In:
							</label>
							<?php if(isset($_POST["checkin"])){echo $_POST ["checkin"]; }?>
                            
						</div>
						
						<div class="form-group" align = "center">
							<label for="checkoutdate" class="col-md-4 control-label" >
								Check Out:
							</label>
							<?php if(isset($_POST["checkout"])){echo $_POST ["checkout"]; }?>
                            
						</div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">

							</button>
						</div>
			

			
			
			
			
			
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>
        			