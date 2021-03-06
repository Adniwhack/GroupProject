<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 8/28/2015
 * Time: 12:43 AM
 */

include 'function.php';

$hotel_email = $_SESSION['hotel_email_view'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $log = new dbSearch();
    $Check_in=$_POST['Check_in'];
    $Check_out= $_POST['Check_out'];
    if(empty($Check_in) and empty($Check_out)){
        $res = $log->return_room($hotel_email);
    }
    else{
        $Check_in = date( 'Y-m-d H:i:s', $Check_in );
        $Check_out = date( 'Y-m-d H:i:s', $Check_out );
        $res = $log->return_unreserved_room($hotel_email, $Check_in, $Check_out);

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

<div class="container-fluid">



    <div class="col-md-12">

        <nav class="navbar navbar-default" role="navigation" >


            <div class="navbar-header">
                <button type="button" class="btn btn-primary btn-md">


                    <span class="glyphicon glyphicon-home"></span> Home
                </button>

                <button type="button" class="btn btn-primary btn-md">

                    <span class="glyphicon glyphicon-chevron-left"></span> Back
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <button type="submit" class="btn btn-primary btn-md">
                        <span class=" glyphicon glyphicon-log-in"></span> Login
                    </button>
                    <button type="submit" class="btn btn-primary btn-md">
                        <span class=" glyphicon glyphicon-thumbs-up"></span> About us

                    </button>

                </ul>

            </div>

        </nav>
    </div>
    <div class="col-md-6">
        <div class="container-fluid">
            <h2>Rooms available</h2>
            <table class="table">
                <thread>
                    <tr>
                        <th>Room_name</th>
                        <th>Cost per Stay</th>
                        <th>Room Type</th>
                        <th>Room Image</th>
                        <th>Reserve now!</th>
                    </tr>
                    </thread>
                <tbody>
        <?php

        while ($data = mysql_fetch_array($res)){
            $room = $data['Room_name'];
            $room_cost = $data['Cost_per_unit'];
            $room_type = $data['Room_type'];
            $room_image = $data['Room_photo_location'];
            echo "<tr><td>".$room."</td><td>".$room_cost."</td><td>".$room_type."</td><td><img height=100 width=100 src=".$room_image."></td><td><a href='reservation.php?room_id=".$room."'>Link</a></td></tr>";
        }
        ?>
                </tbody>
                </table>
            </div>
    </div>
</div>
</body>
</html>