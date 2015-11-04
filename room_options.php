<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 10/31/2015
 * Time: 7:04 PM
 */

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $str = $_POST['text'];
    //echo $str;
    $arry = explode( ",", $str);
    $arr = array();



    $len = count($arry);

    for ($i = 0; $i < $len; $i++){
        $arry[$i] = trim($arry[$i]);
        if (!in_array($arry[$i], $arr) ){
            array_push($arr, $arry[$i]);
        }
        //echo $arry[$i];
    }

    $len = count($arr);
    for ($i = 0; $i< $len; $i++){
        echo $arr[$i];
    }



}


?>