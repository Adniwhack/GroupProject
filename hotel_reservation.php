<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 10/23/2015
 * Time: 11:37 AM
 */

include "function.php";
if (isset($_SESSION['hotel_login'])) {
    $hotel_id = $_SESSION['hotel_id'];
    $log = new dbFunction();
    $que = "SELECT * FROM reservation INNER JOIN hotel_room on hotel_room.Room_id= reservation.RoomID INNER Join hotel on hotel.Hotel_ID = reservation.HotelID INNER JOIN customer on reservation.UserID=customer.Customer_ID WHERE hotel.Hotel_ID = '".$hotel_id ."'";
    echo $que;
    $res = mysql_query($que);


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
            <h1>Reservations</h1>
            <table class="table table-responsive">
                <tr>
                    <th>Room Name</th>
                    <th>Room Number</th>
                    <th>Customer Name</th>
                    <th>Check in</th>
                    <th>Check Out</th>

                </tr>
                <?php
                    while ($data = mysql_fetch_array($res)){
                        echo "<td>".$data['Room_name']."</td><td>".$data['Room_number']."</td><td>".$data['Customer_FirstName']." ".$data['Customer_LastName']."</td><td>".$data['Checkin']."</td><td>".$data['Checkout']."</td>";
                    }
                ?>
            </table>
            <form method="get" action="payment.php">
                <button class="btn btn-primary" type="submit">Manual Reservation</button>
            </form>


            </div>
        </div>
    </div>
</body>
</html>
