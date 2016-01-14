<?php
include 'function.php';

?>
<!DOCTYPE html>
<html lang="en">
	
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online payment</title>

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
    
<body style="background-color:white"><!--changed-->
	<!-- Navigation bar which is in the top of the page -->
        
               
    <nav class="navbar navbar-default navbar-fixed-top navbar-responsive">
		<div class="container-fluid">
			<div class="navbar-header">
				<ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
				</ul>
        
				<a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
			</div>
				<ul class="nav nav-pills navbar-right">
                                    <li><a href="Hotel-profile.php"><span class="glyphicon glyphicon-chevron-left"></span><b><font size="4" color="#FFF" face="calibri light">Back</font></b></a></li>
                                    <li><a href="homepage.php"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></span></a></li>
                                    <li><a href="user_logout.php"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#FFF" face="calibri light">Logout</font></b></a></li></ul>

				</ul>
     	
		</div>
		
	</nav>
	<br><br><br><br>
            
			
		<div class="container">
			
			<div class="col-md-offset-2 col-md-12">
                    <!--  Create the form horizontally !-->
                    <br></br>
                    
                    
                    <form class="form-horizontal col-md-8 col-md-offset-1" data-toggle="validator" role="form" align = "center"  >
						
							<legend><font color=#00003D><b> Online Payment Details </b></font></legend>
								<div class="jumbotron col-md-10">
								<div class="form-group" align = "center">
									<label for="CardHolder_name" class="col-md-4 control-label">
										<font color = "green"> Card Holder's name: </font>
									</label>
									<div class="col-md-8">
										<?php if(isset($_POST["CardHolder_name"])){echo $_POST ["CardHolder_name"]; }?>
									</div>
								</div>
						<div class="form-group" align = "center">
							<label for="Expire_date" class="col-md-4 control-label" >
								<font color = "green">	Expiration Date:</font>
							</label>
							<div class="col-md-8">
								<?php if(isset($_POST["Expire_date"])){echo $_POST ["Expire_date"]; }?>
							</div>
						</div>
						<div class="form-group" align = "center">
							<label for="country" class="col-md-4 control-label">
								<font color = "green">	Country</font>
							</label>
							<div class="col-md-8">
								<?php if(isset($_POST["country"])){echo $_POST ["country"]; }?>
							</div>
						</div>
                        
						<div class="form-group" align = "center">
							<label for="Amount" class="col-md-4 control-label" >
								<font color = "green">	Amount(USD):</font>
							</label>
							
							<div class="col-md-8">
								<?php if(isset($_POST['amount'])){echo $_POST ["amount"]; }?>
							</div>
						</div>
						
                       
							
						<h4 align="center"><font color="red">Your Reservation has been successfully recorded.Thank you for visiting OHRMS.</font></h4>	
						</div>                       
						
						
							<?php
								require_once('mysqli_connection.php');
								//$nameErr = $descErr = $priceErr = $qtyErr = "";
								$holdername = $expdate = $country = $amount="";

								
                
                
								$isValid = array(False, False, False, False);
                
										if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        
											if (empty($_POST["CardHolder_name"])) {
												$isValid[0] = False;
												} else {
													$holdername= test_input($_POST["CardHolder_name"]);
													$isValid[0] = True;
												}
											if (empty($_POST["Expire_date"])) {
				
												$isValid[1] = False;
													} else {
													$expdate = test_input($_POST["Expire_date"]);
													$isValid[1] = True;
												}
											if (empty($_POST["country"])) {
				
												$isValid[2] = False;
			
												} else {
													$counrty = test_input($_POST["country"]);
													$isValid[2] = True;
												}
                        
											if (empty($_POST["amount"])) {
												$isValid[3] = False;
												} else {
													$amount = test_input($_POST["amount"]);
													$isValid[3] = True;
												}
												//$rid = $_POST['rid'];
												
												$_SESSION['fdata'];
												$reserfdata=$_SESSION['fdata'];
												$log=new dbUser();
												$rid=$log->user_reserve($reserfdata['HotelID'],$_SESSION['customer_ID'],$reserfdata['RoomID'],$reserfdata['checkin'],$reserfdata['checkout'],$reserfdata['notes']);
												//echo "$rid";
												//echo count($isValid);
												//echo count(array_keys($isValid, True)) ;
												$rid = mysql_insert_id();
                                
												require_once('mysqli_connection.php');
                                  
												$query = "insert into onlinepayment(reserid, holdername, expdate, country, amount)
												values ( '".$rid."','".$_POST['CardHolder_name']."', '".$_POST['Expire_date']."', '".$_POST['country']."', '".$_POST['amount']."')";
												//echo $query;
											if (mysqli_query($dbconn, $query)) {
												//echo "New record added successfully";
												$holdername = $expdate = $country = $amount="";
												//header("location:index.html");
											} else {
												echo "Error: " . $query . "<br>" . mysqli_error($dbconn);
											}

											//mysqli_close($dbconn);
													}
                
													?>
						 
					</form>	
				</div>		
			</div>
		</div>
	</div>
				
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
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
                        