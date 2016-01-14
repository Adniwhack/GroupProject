<?php
include "function.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {

	$FirstName = $_POST['fname'];
	$LastName = $_POST['lname'];
	$Address = $_POST['address'];
	$Country = $_POST['Country'];
	$Contact = $_POST['cnumber'];

	$hotelid = $_POST['hotel_id'];
	$roomid = $_POST['room_id'];
	$checkout =  $_POST ["checkout"];
	$checkin =   $_POST ["checkin"];

	$FirstName = test_input($FirstName);
	$LastName = test_input($LastName);



}
$log=new dbUser();
require_once('mysqli_connection.php');
$fdata=array();

$fdata=array('HotelID'=>$hotelid, 'RoomID'=>$roomid,'fname'=>$FirstName,'lname'=>$LastName,'address'=>$Address,'Country'=>$Country,'cnumber'=>$Contact,'checkin'=>$checkin,'checkout'=>$checkout, 'notes'=> '');
$_SESSION['fdata']=$fdata;
header("location:onlinepay.php");

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

    <body style="background-color:	white"><!--changed-->
	<!-- Navigation bar which is in the top of the page -->

        <nav class="navbar navbar-default navbar-fixed-top navbar-responsive">
			<div class="container-fluid">
				<div class="navbar-header">
					<ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
					</ul>
    
				<a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a></div>
					<ul class="nav nav-pills navbar-right">
						<li><a href="#"><span class="glyphicon glyphicon-home"></span><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></a></li>
						<li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"></span><b><font size="4" color="#FFF" face="calibri light"> About Us</font></b></a></li>
						<li><a href="#"><span class="glyphicon glyphicon-phone-alt"></span><b><font size="4" color="#FFF" face="calibri light"> ContactUs</font></b></a></li>
						<li><a href="rooms_hotel.php"><b><font size="4" color="#FFF" face="calibri light"> Back</font></b><span class="glyphicon glyphicon-chevron-right"></span></a></li><!--changed!-->
						<li><a href="#"><span class="glyphicon glyphicon-log-out"></span><b><font size="4" color="#FFF" face="calibri light"> Logout</font></b></a></li><!--changed!-->
					</ul>
        				
			</div>   
		</nav>
			<div class="container">
			<br><br><br>
				<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="text-center">Summary<span class="glyphicon glyphicon-saved pull-right"></span></h4>
				</div>
				</div>
			<div class="row">

			<div class=" col-md-10">
                    <!--  Create the form horizontally !-->
                    <br>


                    <form class="form-horizontal col-md-10 col-md-offset-1" data-toggle="validator" role="form" align = "center" action="reserve_action.php" method="post" >
					   <p><h4 align="left"><b><legend> Reservation Details</legend></b></h4></p><!--changed-->
						<div class="jumbotron">
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

						
						</div-->
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
											elseif ($_POST['Country']=="SL") { echo "Sri Lanka"; }
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
						<div class="form-group" align="center">
							<div class="col-sm-offset-10 col-sm-3">
								<button type="submit" class="btn btn-success btn-md"> Next</button>
							</div>
						</div>
						<input type="hidden" value="<?php echo $FirstName;?>" name="fname">
						<input type="hidden" value="<?php echo $LastName;?>" name="lname">
						<input type="hidden" value="<?php echo $Address;?>" name="address">
						<input type="hidden" value="<?php echo $Country;?>" name="country">
						<input type="hidden" value="<?php echo $Contact;?>" name="contact">
						<input type="hidden" value="<?php echo $checkin;?>" name="checkin">
						<input type="hidden" value="<?php echo $checkout;?>" name="checkout">
						<input type="hidden" value="<?php echo $roomid;?>" name="room_id">
						<input type="hidden" value="<?php echo $hotelid;?>" name="hotel_id">
						</form>

</div>
</div>
</div>
</div>



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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>