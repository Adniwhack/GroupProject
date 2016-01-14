<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 8/28/2015
 * Time: 12:43 AM
 */

include 'function.php';
$data = "";

if (isset($_SESSION['hotel_login']) and ($_POST['hotel_id'] == $_SESSION['hotel_id'] )){
    //redirect to shyama page
    header("Location:rooms_all.php");
}



if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $hotel_id = $_POST['hotel_id']; 
    if (empty($_POST['datefilter']) or $_POST['datefilter'] == ""){
        $log = new dbHotel();
        
        $res = $log->get_hotel_room($hotel_id);
    }
    else{
        $dates = $_POST['datefilter'];
        $args = explode("-", $dates);
        $Check_in = trim($args[0]);
        $inst = strtotime($Check_in);
        $Check_in = date("Y-m-d", $inst); 
        $Check_out = trim($args[1]);
        $outst = strtotime($Check_out);
        $Check_out =  date("Y-m-d", $outst); 
        $log = new dbHotel();
        $data = $log->get_hotel_data($hotel_id);
        $Hotel_email = $data['email'];
        $log = new dbSearch();
        $_SESSION['dates'] = array('checkin'=>$Check_in, 'checkout'=>$Check_out);
        $res = $log->return_unreserved_room($Hotel_email, $Check_in, $Check_out);
        
    }
}
 else {
    if (isset($_SESSION['chotel'])){
        $cid =$_SESSION['chotel'];
        $_SESSION['chotel'] = NULL;
        header("location:Hotel-profile.php?hotel_id=".$cid);
        exit();
    }
    else{
        header("location:index.html");
    }
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

				</ul>
     	
		</div>
		
	</nav>
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
<div class="container">



    <div class="col-md-12">

        
    </div>
    <div class="col-md-10">
        <div class="container-fluid">
            <h2>Rooms available</h2>
            <table class="table">
                <thread>
                    <tr>
                        <th>Room_name</th>
                        <th>Cost per Stay($)</th>
                        <th>Room Type</th>
                        <th>Room Image</th>

                        <th>Reserve now!</th>
                    </tr>
                    </thread>
                <tbody>
        <?php

        while ($data = mysql_fetch_array($res)){
            $room_name = $data['Room_name'];
            $room = $data['Room_id'];
            $room_cost = $data['Cost_per_unit'];
            $room_type = $data['Room_type'];
            $room_image = $data['Room_photo_location'];
            $Room_options =($log->return_room_options($room));
            $print_option = "";
            

            echo "<tr><td>".$room_name."</td><td>".$room_cost."</td><td>".$room_type."</td><td><img height=100 width=100 src=".$room_image."></td><td><a href='reservation.php?room_id=".$room."&hotel_id=".$hotel_id."'>Reserve Now!</a></td></tr>";
        }
        ?>
                </tbody>
                </table>
            
            </div>
    </div>
</div>
</body>
</html>