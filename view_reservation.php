<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 10/18/2015
 * Time: 8:40 PM
 */
include "function.php";
$log = new dbFunction();
$user_id = $_SESSION["customer_ID"];
$QUE = "SELECT * FROM reservation INNER JOIN hotel_room on hotel_room.Room_id= reservation.RoomID INNER Join hotel on hotel.Hotel_ID = reservation.HotelID WHERE UserID = '".$user_id."'";
$res = mysql_query($QUE);
echo $QUE ;



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User registration form</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>

        .background {
            width: 100%;
            height:auto;
            top: 0px;
            left: 0px;
            z-index: -1;
            position: absolute;

        }

        }

        .jumbotron {
            padding-left: 0px;
            padding-top: 50px;
            padding-bottom: 50px;
        }
    </style>

</head>
<body background="hotelimages/neela6.jpg">

<nav class="navbar navbar-default" >
    <div class="navbar-header">
        <ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
        </ul>
        <a class="navbar-brand" href="#">Online Hotel Reservation and Management System </a>
    </div>
</nav>
<br><br>


<div class="container">
    <div class="jumbotron">
        <h4>Reservations by you</h4>
        <table class="table">
            <tr>
                <th>Reservation Hotel</th>
                <th>Room</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Pay</th>
                <th>Delete</th>
            </tr>
            <?php
                while($data = mysql_fetch_assoc($res)){

                    echo "<tr><td>".$data['Hotel_Name']."</td><td>".$data['Room_name']."</td><td>".$data['Checkin']."</td><td>".$data['Checkout']."</td><td><a href='onlinepay.php?rid=".$data['ReservationID']."' >Link</a></td><td>Modify</td></tr>";
                }
            ?>
        </table>
    </div>
</div>
</body>
</html>

