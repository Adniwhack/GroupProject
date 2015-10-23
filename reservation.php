<?php
include "function.php";
if (!isset($_SESSION['customer_login'])){
	header("location:user_registration.php");
}
if ($_GET['hotel_id'] && $_GET['room_id']){
	$Hotel_id = $_GET['hotel_id'];
	$Room_id = $_GET['room_id'];
	$log = new dbHotel();
	$hotel_data = $log->get_hotel_data($Hotel_id);
	$room_data = $log->return_room($Room_id);


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
  color: #A7A79BF6;
  font-family: 'Oswald', sans-serif;
  font-size: 0.8em ;
  padding: 1px 1px 1px ;
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
			<div class="row">
				<div class="col-md-6">
					<h1 align="center"><span class="label-primary" ><?php echo $hotel_data['Hotel_Name'] ?></span></h1>
				</div>
				<div class="col-md-6">

					<h3 align="center"><font align="center"><span class="label-primary" ><?php echo $room_data['Room_name'] ?></span></font></h3>
				</div>
			</div>
			<br>
            <div class="container">
			<div class="jumbotron">
			<div class="row">

			<div class="col-sm-offset-2 col-sm-6">
                    <!--  Create the form horizontally !-->
                    <br><br>


                    <form class="form-horizontal col-md-10 col-md-offset-1" data-toggle="validator" role="form" align = "center" action="next.php" method="post" >
					   <legend>Reservation Details</legend>

                        <div class="form-group" align = "center">
							<label for="finame" class="col-md-4 control-label" >
								First Name:
							</label>
                            <div class="col-md-8">
								<input type="text" class="form-control" name="fname" required />
							</div>
						</div>

						<div class="form-group" align = "center">
							<label for="laname" class="col-md-4 control-label" >
								Last Name:
							</label>
                            <div class="col-md-8">
								<input type="text" class="form-control" name="lname" required />
							</div>
						</div>
						<div class="form-group" align = "center">
						<div class="radio">
							<label for="Gender" class="col-md-4 control-label">
								<b>Gender:</b>
							</label>
							<div class="col-md-8">
								<label><input type="radio" name="gender" value="male" >Male</label>
								<label><input type="radio" name="gender" value="female" >Female</label>
							</div>
						</div>
						</div>
						<div class="form-group" align = "center">
							<label for="add" class="col-md-4 control-label" >Address:</label>
                            <div class="col-md-8">
								<textarea class="form-control" rows="5"  name="address" required /></textarea>
							</div>
						</div>

						<div class="form-group" align = "center">
							<label for="country" class="col-md-4 control-label" >
								Country:
							</label>
                            <div class="col-md-8">
								<select name="Country">
									<option value="UK">United Kingdom</option>
									<option value="germany">Germany</option>
									<option value="USA">United States</option>
								</select>
							</div>
						</div>

						<div class="form-group" align = "center">
							<label for="number" class="col-md-4 control-label" >Contact Number:</label>
                            <div class="col-md-8">
								<input type="text" class="form-control" name="cnumber" placeholder required />
							</div>
						</div>

						<div class="form-group" align = "center">
							<label for="checkindate" class="col-md-4 control-label" >Check In:</label>
                            <div class="col-md-8">
								<input type="date" class="form-control" name="checkin" placeholder="2015/08/08" required />
							</div>
						</div>

						<div class="form-group" align = "center">
							<label for="checkoutdate" class="col-md-4 control-label" >Check Out:</label>
                            <div class="col-md-8">
								<input type="date" class="form-control" name="checkout" placeholder="2015/08/08" required />
								<?php $checkin=["checkin"];
								      $checkout=["checkout"];
                                      if ($checkin> $checkout){ echo"Invalid checkin";	}?>								  >
							</div>

						</div>
						<div class="form-group">
							<input type="hidden" value="<?php echo $Room_id?>" name="room_id">
							<input type="hidden" value="<?php echo $Hotel_id?>" name="hotel_id">
						</div>
						
						<br>
						 <div class="col-sm-offset-9 col-sm-3">
						<button type="submit" class="btn btn-primary btn-md" >Next</button></div>
					</form>	
				</div>		
				</div>
				</div>
				</div>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>
                        