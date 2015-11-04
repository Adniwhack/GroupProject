<?php
include "function.php";
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $FirstName = $_POST['fname'];
    $LastName = $_POST['lname'];
    $Address = $_POST['address'];
    $Country = $_POST['country'];
    $Contact = $_POST['contact'];

    $hotelid = $_POST['hotel_id'];
    $roomid = $_POST['room_id'];
    //echo $_POST ["checkout"];

    $checkout = $_POST ["checkout"];
    $checkin = $_POST ["checkin"];
    
    $errors = array(False, False, False);
    
    $FirstName = test_input($FirstName);
    $LastName =  test_input($LastName);
    $Address = test_input($Address);
    $Country = test_input($Country);
    $Contact = test_input($Country);
    $hotelid = test_input($hotelid);
    $roomid =test_input($roomid);


    if (!preg_match("/^[a-zA-Z0-9_]*$/",$FirstName)) {
        $errors[0] = True;
    }
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$LastName)) {
        $errors[1] = True ;
    }

    if ($errors[0] == True || $errors[1] == True){

        header("reservation.php?room_id=".$roomid."&hotel_id=".$hotelid."");
        echo '<script>alert("Name is invalid");</script>';
    }

    if($_SESSION['customer_login']){
        $userid=$_SESSION['customer_ID'];
        $notes = "Reserving for :- Name : $FirstName $LastName  | Address : $Address | Country : $Country | Contact : $Contact ";
        $log = new dbUser();
        $log->user_reserve($hotelid, $userid, $roomid, $checkin, $checkout, $notes);
        header("location:view_reservation.php");
    }

    else{

        $logx = new dbFunction();

        $userid = $logx->create_custom_user($FirstName, $LastName, $Address, $Contact, $Country);

        $log = new dbUser();
        $log->user_reserve($hotelid, $userid, $roomid, $checkin, $checkout, "");
        echo "<script>alert('Reservation has been created')</script>";
        header("location:view_reservation.php");
        exit();

        }
    }
?>