<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 8/28/2015
 * Time: 12:43 AM
 */

include 'function.php';

$hotel_email = $_SESSION['hotel_email'];


$log = new dbSearch();

$res =$log->return_sorted_room($hotel_email);


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
 <!-- navbar -->
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

<nav class="navbar navbar-default responsive">
    <div class="container-fluid">
          <div class="navbar-header">
              <ul class="nav navbar-nav navbar-left">
                
                <li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li>
          </ul>
          <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
          </div>
    <div>

        
              <ul class="nav nav-pills navbar-right">
                  <li><a href=<?php echo "Hotel-profile.php?hotel_id=".$_SESSION['hotel_id'].""?>><span class="glyphicon glyphicon-arrow-left"><b>
              <font size="4" color="#FFF" face="calibri light"> Back</font>
                </b></a></li>
                <li><a href="homepage.php"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></span></a></li>
          
      </div>
    
    
    
      </div>
  </nav>
<div class="container-fluid">



    <div class="col-md-12">

        
    </div>
    
    <div class="col-md-10">
        <div class="container-fluid">
            <h2>Rooms </h2>
            
            <table class="table">
                 
                <thread>
                   
                    <tr>
                        <th>Room_name</th>
                        <th>Cost per Stay($)</th>
                        <th>Room Type</th>
                        <th>Room Image</th>
                        
                    </tr>
                    </thread>
                <tbody>
        
        <?php

        while ($data = mysql_fetch_array($res)){
            $room = $data['Room_name'];
            $room_cost = $data['Cost_per_unit'];
            $room_type = $data['Room_type'];
            $room_image = $data['Room_photo_location'];
            //$Room_options =($log->return_room_options($room));
            //$print_option = "";
            $room_id = $data['Room_id'];
            /*while($option = mysql_fetch_array($Room_options)){
                if ($print_option != "") {
                    $print_option = $print_option . " " . $option['Room_Option'];
                }
                else{
                    $print_option = $option['Room_Option'];
                }
            }*/

            echo "<tr><td>".$room."</td><td>".$room_cost."</td><td>".$room_type."</td><td><img height=100 width=100 src=".$room_image."></td><td><a href='room_edit.php?room_id=".$room_id."'>Edit</a></td></tr>";
        }
        ?>
                </tbody>
                </table>
            <a href="roominfo.php" class="btn btn-primary btn-lg" role="button">Create new Room</a>
            </div>
    </div>
</div>
</body>
</html>