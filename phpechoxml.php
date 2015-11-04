<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 11/2/2015
 * Time: 11:09 AM
 */

function parseToXML($htmlStr)
{
    $xmlStr=str_replace('<','&lt;',$htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    return $xmlStr;
}

 require('function.php');

$db = new dbConnect();

