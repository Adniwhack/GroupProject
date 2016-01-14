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
    $email_manual = $_POST['email'];
    
    $ID = md5($fname . $lname);
    
    
    $log = new dbHotel();
    //$rid = $log->create_new_reservation($hotel_id, $roomid, $fname, $lname, $country, $address, $checkin, $checkout,"CNF", $contact);
    
    require_once('mysqli_connection.php');
		//$nameErr = $descErr = $priceErr = $qtyErr = "";
  		

  		
                
		$formdata= array();
                $formdata = array('fname'=> $fname, 'lname' => $lname, 'address'=>$address, 'country'=>$country, 'roomid'=>$roomid, 'hotel_id'=>$hotel_id, 'checkin'=>$checkin, 'checkout'=>$checkout, 'contact'=> $contact, 'email'=>$email_manual);
                $_SESSION['formdata'] = $formdata;
                        //echo count(array_keys($isValid, True))	
                
    
    header("location:payment.php");
    
    ?>
