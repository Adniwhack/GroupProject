<?php 

    function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}
    include 'function.php';
    if (isset($_GET)){
        $name=$city = $type = $view = $ac = $gnd = $wifi = $park = $pool = $checkin = $checkout = $seaview= $MtnView =  $single =  $double =  $triple = "";
        if (isset($_GET['name']))
            {
                $name = $_GET['name'];
            }
        if (isset($_GET['city']))
            {
                $city = $_GET['city'];
            }
        if (isset($_GET['type']))
            {
                $type = $_GET['type'];
                //echo $type;
                if ($type == "Single"){$single ="1";}
                if ($type == "Double"){$double ="1";}
                if ($type == "Triple"){$triple="1";}
            }
        if (isset($_GET['view']))
            {
                $view = $_GET['view'];
                
                if ($view == "sea"){$seaview = "1"; $MTnView ="0";}
                if ($view == "mountain"){$seaview = "0"; $MTnView ="1";}
            }
        if (isset($_GET['ac']))
            {
                $ac = $_GET['ac'];
            }
        if (isset($_GET['gnd']))
            {
                $gnd = $_GET['gnd'];
            }
        if (isset($_GET['wifi']))
            {
                $wifi = $_GET['wifi'];
            }
        if (isset($_GET['park']))
            {
                $park = $_GET['park'];
            }
        if (isset($_GET['pool']))
            {
                $pool = $_GET['pool'];
            }
        if (isset($_GET['checkin']) and isset($_GET['checkout']))
            {
                $checkin =$_GET['checkin'];
                $checkout = $_GET['checkout'];
            }
           
            $log = new dbSearch();
            $res =  $log->adv_search($name, $city, $checkin, $checkout, $seaview, $MtnView, $gnd, $ac, $single, $double, $triple, $wifi, $pool, $park) or die(mysql_error());
            header("Content-type: text/xml");

    
            echo '<markers >';
            
            while($data = mysql_fetch_array($res)){
                echo '<marker ';
                echo 'id="'.parsetoXML($data['Hotel_ID']) .'" ';
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
            }
        
?>