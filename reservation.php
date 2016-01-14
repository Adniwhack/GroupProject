<?php
include "function.php";
if (!isset($_SESSION['customer_login'])){
    $_SESSION['next'] = "reservation";
    $_SESSION['rroom'] = $_GET['room_id'];
    $_SESSION['rhot'] = $_GET['hotel_id'];
	header("location:user_login.php");
}

if (isset($_GET['hotel_id']) && isset($_GET['room_id'])){
	$Hotel_id = $_GET['hotel_id'];
	$Room_id = $_GET['room_id'];
	$log = new dbHotel();
	$hotel_data = $log->get_hotel_data($Hotel_id);
	$room_data = $log->return_room($Room_id);
        
        $Checkin = $_SESSION['dates']['checkin'];
        $Checkout = $_SESSION['dates']['checkout'];
        $_SESSION['chotel'] = $_GET['hotel_id'];
}

//else{
	//header("location:index.html");
//}

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
	  <title>Reservation</title>


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
	<style>
		.modal-content{
				background-color:#000;
			}
	</style>
<!--script>
		function phonenumber(cnumber)
{
  var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
  if((cnumber.value.match(phoneno))
        {
      return true;
        }
      else
        {
        alert("Invalid Phone Number");
        return false;
        }
}
</script-->

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
                                            <li><a href="rooms_user.php"><span class="glyphicon glyphicon-chevron-left"></span><b><font size="4" color="#FFF" face="calibri light">Back</font></b></a></li>
						<li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"></span><b><font size="4" color="#FFF" face="calibri light"> About Us</font></b></a></li>
						
                                                <li><a href="user_logout.php"><span class="glyphicon glyphicon-log-out"></span><b><font size="4" color="#FFF" face="calibri light"> Logout</font></b></a></li><!--changed!-->
					</ul>
        				
			</div>   
		</nav>
        <!--
		<div class="row">
				<div class="col-md-6">
					<h1 align="center"><span class="label-primary" ><?php echo $hotel_data['Hotel_Name'] ?></span></h1>
				</div>
				<div class="col-md-6">
					<h3 align="center"><font align="center"><span class="label-primary" ><?php echo $room_data['Room_name'] ?></span></font></h3>
				</div>
        -->
			
		</div>
		<br><br><br>
        <div class="container">
			
				<div class="row">
			
					<div class="col-md-10"><!--changed-->
                    <!--  Create the form horizontally !-->
					<div class="col-md-6">
						<p><h4 align="center"><b><legend> Reservation Details</legend></b></h4></p><!--changed-->
						<p><h5 align="center"><b><font color="red">  *All fields are required to be filled</font></b></h5></p><!--changed-->
						<br><br>
					</div>

                    <form id= "form1" class="form-horizontal col-md-10 col-md-offset-1" data-toggle="validator" role="form" align = "center" action="next.php" method="post" >
					   <div class="jumbotron">
						<div class="row">
							<div class="form-group" align = "center">
								<label for="finame" class="col-md-4 control-label" ><font color="green">
								First Name:
								</font>
								</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="fname" placeholder="Enter First Name"required />
								</div>
							</div>

							<div class="form-group" align = "center">
								<label for="laname" class="col-md-4 control-label" ><font color="green">
								Last Name:
								</font>
								</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="lname" placeholder="Enter Last Name"required />
								</div>
							</div>
							
							</div>
							<div class="form-group" align = "center">
								<label for="add" class="col-md-4 control-label" ><font color="green">Address:</font></label>
									<div class="col-md-8">
										<textarea class="form-control" rows="4"  name="address" placeholder="Enter Address" required /></textarea>
									</div>
							</div>

							<div class="form-group" align = "center">
								<label for="country" class="col-md-4 control-label" >
									<font color="green">
										Country:
									</font>
								</label>
								<div class="col-md-8">
									<select name="Country"class="form-control">
										<font color="green"><option value="Sri Lanka">Sri Lanka</option></font>
										<font color="green"><option value="United Kingdom">United Kingdom</option></font>
										<font color="green"><option value="germany">Germany</option></font>
										<font color="green"><option value="USA">United States</option></font>

									</select>
								</div>
							</div>

						<div class="form-group" align = "center">
							<label for="number" class="col-md-4 control-label" ><font color="green">Contact Number:</font></label>
								<div class="col-md-8">
									<input type="tel" pattern="^[\s()+-]*([0-9][\s()+-]*){6,20}$" class="form-control" name="cnumber" placeholder="+94710996370" required />
								</div>
						</div>

						<div class="form-group" align = "center">
							<label for="checkindate" class="col-md-4 control-label" ><font color="green">Check In:</font></label>
								<div class="col-md-8">
									<input type="date" class="form-control" name="checkin" value="<?php echo $Checkin?>" placeholder="2015/08/08" required />
								</div>
						</div>

						<div class="form-group" align = "center">
							<label for="checkoutdate" class="col-md-4 control-label" ><font color="green">Check Out:</font></label>
								<div class="col-md-8">
									<input type="date" class="form-control" name="checkout" value="<?php echo $Checkout?>" placeholder="2015/08/08" required />
																		  
								</div>

						</div>
						<div class="form-group">
							<input type="hidden" value="<?php echo $Room_id?>" name="room_id">
							<input type="hidden" value="<?php echo $Hotel_id?>" name="hotel_id">
						</div>
						
						<div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
							<div id="messages"></div>
						</div>
                        </div>
						
						<br>
						<div class="col-sm-offset-10 col-sm-3">
							<button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal"> Next</button>
						</div>
						<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><font color="green"><b>Note</b></font></h4>
							  </div>
							  <div class="modal-body">
								<p><font color="red">Are you sure you want to continue the reservation?</font></p>
							  </div>
							  <div class="modal-footer">
								<a href="onlinepay.php"><button type="submit" class="btn btn-success" action="onlinepay.php">Yes</button></a>
								<button type="button" class="btn btn-success" data-dismiss="modal">No</button>
							  </div>
							</div>

						  </div>
						</div>
					</div>
                    </form>	
						
			</div>
		</div>
				
	</div>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#form1').bootstrapValidator({
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
						address: {
							validators: {
								notEmpty: {
									message: 'The address is required and cannot be empty'
								}
							}
						},
						
						
						
						}
						})
						
						
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
                          