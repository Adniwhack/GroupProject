<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 11/2/2015
 * Time: 12:57 AM
 */

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    require_once('function.php');
    $db = new dbConnect();
    $LAT = $_POST['latitude'];
    $LNG = $_POST['longitude'];
    $ID = $_POST['id'];

    $query = "UPDATE hotel set Hotel_Lat=".$LAT.", Hotel_Lng=".$LNG." WHERE Hotel_ID='".$ID."' ";
    $res = mysql_query($query);

    header("Location:Hotel_Edit.php");

}