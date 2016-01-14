<?php
include 'function.php';
if(isset($_SESSION["customer_login"])){
    if(isset($_SESSION["customer_login"])){
    $Checkin = $_SESSION['dates']['checkin'];
    $Checkout = $_SESSION['dates']['checkout'];
    
    $day1 = date_create($Checkin);
    $day2 = date_create($Checkout);
    $diff = date_diff($day1, $day2, TRUE);
    $days = $diff->days;
    $log = new dbHotel();
    $data = $log->get_room_data($_SESSION['fdata']['RoomID']);
    $cost = $days * $data['Cost_per_unit'];
}
}
else{
header("location:index.html");
}
require_once("mysqli_connection.php");
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
	

 
    
    <title>Online Payment</title>

    <!-- Bootstrap -->
    
	
	 
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
    
 <body style="background-color:white"><!--changed-->
	<!-- Navigation bar which is in the top of the page -->
               
	<nav class="navbar navbar-default navbar-fixed-top navbar-responsive">
		<div class="container-fluid">
			<div class="navbar-header">
				<ul class="nav navbar-nav navbar-right"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
				<a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
				</ul>
        
			
			</div>
				<ul class="nav nav-pills navbar-right">
						
						<li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#FFF" face="calibri light">AboutUs</font></b></span></a></li>
			
				</ul>                
		</div>	
	</nav>
          
	<br><br><br><br>		
		<div class="container">
			
			<div class="col-sm-10">
                    <!--  Create the form horizontally !-->
                    <br></br>
				<form class="form-horizontal col-md-10 col-md-offset-1" id="payment" data-toggle="validator" role="form" align = "center" method="post" action="onlineresult.php" >
					 
					   <legend><font color=#00003D> <b>Online Payment Details </b></font></legend>
					   <p><h5><b><font color="red">  *All fields are required to be filled</font></b></h5></p><!--changed-->
						<br><br>
						<div class="jumbotron">   
                         
						<div class="form-group" align = "center">
							<label for="CardHolder_name" class="col-md-4 control-label" >
								<font color = "green"> Card Holder's name: </font><!--changed-->
							</label>
                            <div class="col-md-8">
								<input type="text" class="form-control" name="CardHolder_name" required />
							</div>
						</div>
                        <div class="form-group" align = "center">
							<label for="Expire_date" class="col-md-4 control-label" >
								<font color = "green"> Expiration Date:</font></label><!--changed-->
                            <div class="col-md-8">
								<input type="date" class="form-control" name="Expire_date" placeholder="dd-mm-yyyy" required />
							</div>
						</div>
						
						<div class="form-group" align = "center">
								<label for="country" class="col-md-4 control-label">
									<font color="green">
										Country:
									</font>
								</label>
								<div class="col-md-8" class="form-control">
									<select name="country" class="form-control">
										<font color="green"><option value="Sri Lanka">Sri Lanka</option></font>
										<font color="green"><option value="United kingdom">United Kingdom</option></font>
										<font color="green"><option value="germany">Germany</option></font>
										<font color="green"><option value="USA">United States</option></font>

									</select>
								</div>
						</div>
						
                        <div class="form-group" align = "center">
							<label for="Amount" class="col-md-4 control-label" >
								<font color = "green"> Amount($):</font><!--span class="input-group-addon">$</span--><!--changed-->
							</label>
                            <div class="col-md-8" class="form-control">
								
								<input type="number" value="<?php echo $cost; ?>" min="10" class="form-control" step="0.5" placeholder="10.00" name="amount" required/>

							</div>
						</div>
                                           
												
						<input type="checkbox" name="checkbox" value="check" id="agree" /> 
						<font color = "black"> <b>I have read and agree to the Terms and Conditions and Privacy Policy</b></font>
						
						<br>
						<br>
						
						<div class="form-group">
								<div class="col-md-12 col-md-offset-2">
									<div id="messages"></div>
								</div>
						</div>
						<div class="col-sm-offset-8 col-sm-4">
							<input type="submit" name="Submit" value="Submit" class = "btn btn-success btn-md"/>
						</div>
					</div>
										
				</form>	
					
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#payment').bootstrapValidator({
					container: '#messages',
					feedbackIcons: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
					},
					fields: {
						CardHolder_name: {
							validators: {
								notEmpty: {
									message: 'Card holder name cannot be empty'
											}
										}
									},
						country: {
							validators: {
								notEmpty: {
									message: 'Country cannot be empty'
											}
										}
									}
            
							}
					});
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
                        