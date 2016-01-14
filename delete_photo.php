<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'function.php';

if (isset($_SESSION['hotel_email']) and isset ($_GET['photo'])){
    $Photo_ID = $_GET['photo'];
    $Hotel_email = $_SESSION['hotel_email'];
    $log = new dbHotel();
    $log->delete_hotel_photo($Photo_ID, $Hotel_email);
    header("Location:Hotel_Edit.php");
    //exit();
}
else{
    header("Location:index.html");
    exit();
}

?>
