<?php

include('function.php');

    $Hotel_Name = $_SESSION['hotel'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hotel Welcome Page</title>

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
  
 <body background="hotelimages/neela4.jpg">

 <nav class="navbar navbar-default">
		<div class="container-fluid">
    			<div class="navbar-header">
      				<ul class="nav navbar-nav navbar-left"><li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li>
					</ul>
    			</div>
		<div>

    		
      				<ul class="nav nav-pills navbar-right">
        
        				<li><a href="rooms_hotel.php"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#A7A79B">Rooms</font></b></span></a></li>
        				<!--li><a href="#"><span class="glyphicon glyphicon-user"><b><font size="4" color="#A7A79B">Profile</font></b></span></a></li-->
        				<li><a href="#"><span class="glyphicon glyphicon-file"><b><font size="4" color="#A7A79B">Reports</font></b></span></a></li>
			  		<!--li><a href="#"><span class="glyphicon glyphicon-cog"><b><font size="4" color="#A7A79B">Settings</font></b></a></li-->
					<li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#A7A79B">AboutUs</font></b></a></li>
      				<li><a href="hotel_logout.php"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#A7A79B">Logout</font></b></a></li></ul>
					
    			</div>
  		</div>
	</nav>
	
	
		<pre><p class="text-center"><font size="30" face="verdana" ><legend><?php echo $Hotel_Name;?></legend></font></p></pre>
		<div class="container"><p class="text-center">
				
    			<div class="col-sm-2 col-sm-offset-4 text-center"><br><br><div class="btn-group-vertical" role="group" aria-label="...">
					<a href="Hotel-profile.php?hotel_id=<?php echo $_SESSION['hotel_id']; ?>" class="btn btn-primary btn-lg" role="button">Profile Page</a>
                                        <a href="manual_reserve.php" class="btn btn-primary btn-lg" role="button">Add Reservation Details</a>
					
					<a href="#" class="btn btn-primary btn-lg" role="button">View Feedback</a></div>

					
				</div>
		</p></div>
	</div>
 
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>