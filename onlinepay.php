<?php

require_once("mysqli_connection.php");
if (isset($_GET['rid'])) {

	$rid = $_GET['rid'];
	$res = mysqli_query($dbconn, "SELECT * FROM reservation where ReservationID = " . $rid . "");

	$rea = mysqli_fetch_assoc($res);
	$roid = $rea['RoomID'];
	$checkin = $rea['Checkin'];
	$checkout = $rea['Checkout'];

	$dateout = new DateTime($checkout);
	$diff = $dateout->diff(new DateTime($checkin));
	$diff = $diff->d;
	$res2  = mysqli_query($dbconn, "SELECT * from hotel_room WHERE Room_id = '".$roid."'");
	$rea2 = mysqli_fetch_assoc($res2);

	$cost = $rea2['Cost_per_unit'];
	$amt = $diff * $cost;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online Payment</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	  <script>

	  </script>
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
    <div class="navbar-header ">
    <ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
	</ul>
        
    <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
	</div>
	<ul class="nav nav-pills navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></span></a></li>
						<li><a href="#"><span class="glyphicon glyphicon-chevron-left"><b><font size="4" color="#FFF" face="calibri light">Back</font></b></span></a></li>
						 <li><a href="aboutuus.html"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#FFF" face="calibri light">AboutUs</font></b></span></a></li>
						 <li><a href="#"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#FFF" face="calibri light">Rooms</font></b></span></a></li>
			
	</ul>
                        
						
	

			
	</div>
		
</nav>
          
	<br><br><br><br>		
			<div class="row">
			
			<div class="col-sm-offset-2 col-sm-6">
                    <!--  Create the form horizontally !-->
                    <br></br>
                    
                    
                    <form class="form-horizontal col-md-10 col-md-offset-1" data-toggle="validator" role="form" align = "center" method="post" action="onlineresult.php" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
					   <legend><font color=#00003D> <b>Online Payment Details </b></font></legend>
					   <p><h5><b><font color="red">  All fields are required to be filled</font></b></h5></p><!--changed-->
						<br><br>
                         
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
								<input type="date" class="form-control" name="Expire_date" placeholder="dd/mm/yyyy or dd-mm-yyyy" required />
							</div>
						</div>
						<div class="form-group" align = "center">
							<label for="country" class="col-md-4 control-label">
								<font color = "green"> Country</font></label><!--changed-->
							<div class="col-md-8">
								<input type="text" class="form-control" name="country" required />
							</div>
						</div>
                                            <div class="form-group" align = "center">
							<label for="Amount" class="col-md-4 control-label" >
								<font color = "green"> Amount(Rs):</font><!--changed-->
							</label>
                            <div class="col-md-8">
								<input type="number" class="form-control" name="amount"  step="0.01" value="<?php echo $amt;?>"required />
							</div>
						</div>
                                           
												
						<input type="checkbox" name="checkbox" value="check" id="agree" /> 
						<font color = "black"> <b>I have read and agree to the Terms and Conditions and Privacy Policy</b></font>
						
						<br>
						<br>
						<input type="hidden" name="rid" value="<?php echo $rid;?>" >
						 <div class="col-sm-offset-9 col-sm-3">
						
						<input type="submit" name="submit" value="submit" class = "btn btn-success btn-md"/>
					</form>	
						
				</div>
				</div>
				
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>
                        