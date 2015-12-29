<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'function.php';
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $country = $_POST['Country'];
    $contact = $_POST['cnumber'];
    $roomid = $_POST['room_id'];
    $hotel_id = $_POST['hotel_id'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    
    $ID = md5($fname . $lname);
    
    
    $log = new dbHotel();
    $rid = $log->create_new_reservation($hotel_id, $roomid, $fname, $lname, $country, $address, $checkin, $checkout,"CNF", $contact);
    
    header("location:payment.php?rid=$rid");
    
    ?>
