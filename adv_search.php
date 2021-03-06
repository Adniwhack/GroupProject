<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 11/11/2015
 * Time: 12:02 AM
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
include "function.php";

$search = new dbSearch();

if (isset($_GET)){
    $hotel = $city=  "";
    $opt = [];
    
    if (isset($_GET['hotel_name'])){
        //echo name
        $hotel = $_GET['hotel_name'];
    }
    if (isset($_GET['city'])){
        //echo city
        $city = $_GET['city'];
    }
    if (isset($_GET['options'])){
        //echo array options
        $opt = $_GET['options'];

    }


    $res = $search->advanced_search($hotel, $city, $opt, "","");

    header("Content-type: text/xml");

    
    echo '<markers >';
    while($data = mysql_fetch_array($res)){
        echo '<marker ';
        echo 'name="' . parseToXML($data['Hotel_Name']) . '" ';
        echo 'address="' . parseToXML($data['address']) . '" ';
        echo 'lat="' .$data['Hotel_Lat'] . '" ';
        echo 'lng="' . $data['Hotel_Lng'] . '" ';
        //echo 'type="' . $row['type'] . '" ';
        echo '/>';
        
        /*echo "<marker ";
        //folow style in advsearch.xml
        
        echo "name='".parseToXML($data['Hotel_Name'])."'";
        echo "address=".parseToXML($data['address'])."'";
        echo "lat=".parseToXML($data['Hotel_Lat'])."'";
        echo "lng=".parseToXML($data['Hotel_Lng'])."'";
        echo '/>';*/
    }
    echo '</markers>';


/*
    //
    $dom = new DOMDocument("1.0", "UTF-8");
    $xmlroot = $dom->createElement("markers");
    $xmlroot = $dom->appendChild($xmlroot);
    
    while ($data = mysql_fetch_array($res)){
        $mark = $xmlroot->appendChild($dom->createElement("marker"));
        $mark->appendChild($dom->createElement("name", $data['Hotel_Name']));
        $mark->appendChild($dom->createElement("address",$data['address'] ));
        $mark->appendChild($dom->createElement("lat", $data['Hotel_Lat']));
        $mark->appendChild($dom->createElement("lng",$data['Hotel_Lng'] ));
        
    }
    
    echo $dom->saveXML();
*/
}


?>