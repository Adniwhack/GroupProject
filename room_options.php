<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 10/31/2015
 * Time: 7:04 PM
 */

$opt = $_REQUEST['opt'];

require("function.php");


$db= new dbConnect();

$res = mysql_query("SELECT DISTINCT Room_Option FROM room_options WHERE Room_Option LIKE '".$opt."%'");

$str = "";

while($data = mysql_fetch_row($res)){
    if ($str == ""){
        $str = $data[0];
    }
    else{
        $str = $str.",".$data;
    }

}

if ($str == ""){
    $str = "No suggestions";
}
echo $str;




?>