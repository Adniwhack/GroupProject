<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ("function.php");

if ($_SESSION['hotel_login']){
$email = $_SESSION['hotel_email'];
$id = $_SESSION["hotel_id"];
$log = new dbHotel();

$RESU = mysql_query("SELECT DISTINCT Room_id, Room_name, Room_number FROM hotel_room WHERE hotel_email='$email'");
$c = mysql_num_rows($RESU);

$arrayx = array();
while ($data = mysql_fetch_array($RESU)){
    $array = array();
    $room = $data['Room_id'];
    $room_name = $data['Room_name'];
    $room_number= $data['Room_number'];
    $roomx = $room_name." ".$room_number;
    echo $roomx;
    
    for ($i = 1; $i <= 12; $i++){
        $QUE = "SELECT * FROM reservation WHERE MONTH(reservation.Checkin) = $i AND YEAR(reservation.Checkin) = 2015 AND RoomID='$room' AND HotelID = '$id'";
        $res = mysql_query($QUE);
        $count = mysql_num_rows($res);
        
        $array[] = $count;
    }
    $arrayx[$roomx] = $array;
    

}}
else{
    header("location:index.html");
    exit();
}




?>
<!DOCTYPE html>
<html>
<head>
<title>Highcharts Tutorial</title>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="http://code.highcharts.com/highcharts.js"></script>
</head>
<body>
<div id="container" style="width: 400px; height: 400px; margin: 0 auto"></div>
<script language="JavaScript">
$(document).ready(function() {
   var title = {
      text: 'Monthly Total Reservations for <?php echo $_SESSION['hotel']; ?>'   
   };
   var chart = {
      type: 'column'
   };
   var xAxis = {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
         'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
   };
   var yAxis = {
      title: {
         text: 'Number of Reservations'
      },
      min: 0
   };   

   var tooltip = {
      
   };
   var plotOptions = {
      column: {
         pointPadding: 0.2,
         borderWidth: 0
      }
   }; 
   var legend = {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle',
      borderWidth: 0
   };

   var series =  [
       
       <?php
            $cx = 0;
            foreach($arrayx as $room=>$array){
                $cx+= 1;
                echo "{name: '$room',";
                echo "data :[".implode(",", $array)."]}";
                if ($cx != $c){
                    echo ",";
                }
            }
       ?>
      
   ];

   var json = {};

   json.title = title;
   json.chart = chart;
   json.xAxis = xAxis;
   json.yAxis = yAxis;
   json.tooltip = tooltip;
   json.legend = legend;
   json.series = series;
   json.plotOptions = plotOptions; 
   $('#container').highcharts(json);
});
</script>

</body>
</html>
