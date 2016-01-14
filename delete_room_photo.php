<?php
include 'function.php';

if(isset($_GET['room_id']) and isset ($_GET['photo'])){
    $Photo_Name= $_GET['photo'];
    $Room_ID = $_GET['room_id'];
    $log = new dbHotel();
    $log -> delete_room_photo($Photo_Name, $Room_ID);
}

else{
    header("Location:rooms_all.php");
    exit();
}
?>