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
$visit = array(1 => 0, 2=> 0 , 3=> 0, 4=> 0, 5=> 0 , 6=> 0, 7=> 0, 8=> 0 , 9=> 0 , 10=> 0, 11=> 0 , 12=> 0);
$arrayx = array();
$total = 0;
while ($data = mysql_fetch_array($RESU)){
    $array = array();
    $room = $data['Room_id'];
    $room_name = $data['Room_name'];
    $room_number= $data['Room_number'];
    $roomx = $room_name." ".$room_number;
    //echo $roomx;
    
    for ($i = 1; $i <= 12; $i++){
        $QUE = "SELECT * FROM reservation WHERE MONTH(reservation.Checkin) = $i AND YEAR(reservation.Checkin) = ".date("Y")." AND RoomID='$room' AND HotelID = '$id'";
        $res = mysql_query($QUE);
        $count = mysql_num_rows($res);
        $visit[$i] += $count;
        $total += $count;
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
<title>Report of the income</title>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="http://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
   <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">

    
<script language="JavaScript">
$(document).ready(function() {
   var title = {
      text: 'Monthly Reservations for <?php echo $_SESSION['hotel']; ?> for the year <?php echo date("Y");?> Room Vice'   
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
<script language="JavaScript">
            $(document).ready(function() {
                   var title = {
                  text: 'Monthly Total Reservations for <?php echo $_SESSION['hotel']; ?> for the year <?php echo date("Y");?>'   
               };
               

               var xAxis = {
                  categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                     'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
               };
               var yAxis = {
                  title: {
                     text: 'Number of Reservations'
                  },
                  plotLines: [{
                     value: 0,
                     width: 1,
                     color: '#888888'
                  }]
               };   

               var tooltip = {
                  
               };

               var legend = {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'middle',
                  borderWidth: 0
               };

               var series =  [
                  {
                     name: 'Reservations',
                     data: [<?php echo implode(",", $visit);?>]
                  }
               ];

               var json = {};

               json.title = title;

               json.xAxis = xAxis;
               json.yAxis = yAxis;
               json.tooltip = tooltip;
               json.legend = legend;
               json.series = series;

               $('#container2').highcharts(json);
            });
            </script>
   
</head>

<body>
    
     <!-- navbar -->
  <style>
.navbar {
    color: #FFFFFF;
    background-color: #161640;
}

/* OR*/

.nav {
    color: #FFFFFF;
    background-color: #161640;
  
.nav-pills > li > a {
  color: #A7A79Bf;
  font-family: 'Oswald', sans-serif;
  font-size: 0.8em ;
  padding: 1px 1px 1px ;
}
</style>

<nav class="navbar navbar-default responsive">
    <div class="container-fluid">
          <div class="navbar-header">
              <ul class="nav navbar-nav navbar-left">
                
                <li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li>
          </ul>
          <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
          </div>

        
              <ul class="nav nav-pills navbar-right">
                  <li><a href=<?php echo "Hotel-profile.php?hotel_id=".$_SESSION['hotel_id'].""?>><span class="glyphicon glyphicon-arrow-left"><b>
              <font size="4" color="#FFF" face="calibri light"> Back</font>
                </b></a></li>
                <li><a href="homepage.php"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></span></a></li>
                <li><a href="hotel_logout.php"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#FFF" face="calibri light">Logout</font></b></a></li></ul>
          
      </div>
    
    
    
      </div>
  </nav>    
    
 <div class="container">
    <div class="panel panel-primary"
      <div class="table table-responsive">
            <div class="panel-heading">
                <h4 class="text-center">Report<span class="glyphicon glyphicon-saved pull-right"></span></h4>
            </div>
            <br><br>
            <table class="table" id="table1">
                <tr>
                    <td>
                        <div id="container" class="container" style="width: 800px; height: 400px; margin: 0 auto">    
                        </div>

                    </td>
                </tr>
            </table>
            <br><br><br><br><br><br>
            
            <table class ="table" id="table2" >
                <tr>
                    <td>
                        <div id="container2" class="container" style="width: 800px; height: 400px; margin: 0 auto"></div>

                    </td>
                </tr>
            </table>
        
            <table class ="table" id="table3">
                <tr>
                    <td>
                        <div id="container3" class="container" style="width: 600px; height: 200px; margin: 0 auto"></div>
                    </td>
            </table>
        
            
        
        </div>
 </div>
     
    
</body>
</html>