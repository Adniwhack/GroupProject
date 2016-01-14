<?php
include ("function.php");

$log = new dbHotel();
$total=0;

$que = "SELECT DISTINCT City FROM hotel where Approve=1";
$RESU = mysql_query($que);
$c_array=array();
$c = mysql_num_rows($RESU);
while ($data = mysql_fetch_array($RESU)){
  array_push($c_array,$data['City']);
}

$count_array=array();
$h_array=array();
$arrayx = array();

for ($i=0;$i<$c;$i++){
  $city=$c_array[$i];
  //echo $city;
  //$m = $i+1;
  for ($j = 1; $j <= 12; $j++){
  $que = "SELECT DISTINCT Hotel_Name FROM hotel WHERE City='$city' AND Approve='1' AND MONTH(hotel.Register_Date) = $j AND YEAR(hotel.Register_Date) = ".date("Y")." ";
  
  $RESU2=mysql_query($que);
  $H=mysql_num_rows($RESU2);
  array_push($count_array,$H); 
  $total=$total+$H;
 

  while ($data[$i] = mysql_fetch_array($RESU2)){

  array_push($h_array,$data[$i]['Hotel_Name']);
  
}
}
}


?>

<!DOCTYPE html>
<html>
<head>
<title>Admin report</title>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="http://code.highcharts.com/highcharts.js"></script>
   <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script language="JavaScript">
$(document).ready(function() {
   var title = {
      text: 'Monthly Registered hotel for the year <?php echo date("Y");?> City Vice'   
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
         text: 'Number of Registered hotels'
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
      foreach ($c_array as $city){
        $cx+= 1;
      echo "{name: '$city',";
      
     
        echo "data :[";
    for ($j=0;$j<12;$j++){
       $index= 12*($cx-1)+$j;
        $value=$count_array[$index];
        echo "$value";
        if ($cx != 11){
          echo ",";
        }}
  
echo "]}";
      if ($cx != $c){
        echo ",";
      }
      
    }
     ?>];
      
  

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
</head>
<body>
     <nav class="navbar navbar-default responsive">
    <div class="container-fluid">
          <div class="navbar-header">
              <ul class="nav navbar-nav navbar-left">
                <li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li>
          </ul>
          <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
          </div>
    <div>

        
              <ul class="nav nav-pills navbar-right">
                  <li><a href="admin_portal.php"><span class="glyphicon glyphicon-arrow-left"><b>
              <font size="4" color="#FFF" face="calibri light"> Back</font>
                </b></a></li>
              <li><a href="index.html"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></span></a></li>
              <li><a href="admin_logout.php"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#FFF" face="calibri light">Logout</font></b></a></li></ul>
          
      </div>
    
    
    
      </div>
  </nav>
 <div class="container">
     <div class="">
    <div class="table table-responsive">
        <table class="table">
            
            <tr>
                <td>
            <div id="container" class="container" style="width: 600px; height: 400px; margin: 0 auto"></div>
                </td>
            </tr>
        
        </table>
        
        <div class="jumbotron">
                    <h3>Summary</h3><br>
                    <p><?php echo $total; ?> hotels has been registered to the OHRMS within this year. </p><br>
        </div>
    </div>
 </div>
</div>
 <!--footer start here-->
<!--description before footer-->
<br><br><br>
<div class="container">
<div class="col-sm-8 col-sm-offset-2 text-center">
<h4>
<a href="homepage.php">OHRMS</a>
</h4>
<p><b><font color="#161640">"Smarter choice for your business and vacation plans in Sri Lanka"</font></b></p>
<hr>
<!-- starting of facebook icons-->
<p> Join Us On </p>
<ul class="list-inline center-block">
<li><a href="#"><img src="hotelimages/facebook.png"></a></li>
<li><a href="#"><img src="hotelimages/twitter.png"></a></li>
<li><a href="#"><img src="hotelimages/google.png"></a></li>
<li><a href="#"><img src="hotelimages/youtube.png"></a></li>
</ul>

</div><!--/col-->
</div><!--/container-->
<!-- scroll up button-->
<ul class="nav pull-right scroll-top">
<li><a href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
</ul>
<script>
$('.scroll-top').click(function(){
$('body,html').animate({scrollTop:0},1000);
})
</script>
<!--footer-->
<div id="footer">
<div class="container">
<div class="row">
<div class="col-sm-4">
<p><a href="homepage.php"> Online Hotel Reservation and Management System</a></p>
</div> 
<div class="col-sm-4">
</div>
<div class="col-sm-4">
<font color="#fff">© 2016 All Rights Reserved</font>
</div>
</div>
</div>


</div>
<!--footer end-->
<style>
#footer {
height: 80px;
background-color: #161640;
margin-top:50px;
padding-top:20px;


}
#footer {
background-color:#161640;
}
#footer a {
color:#efefef;
}
#footer > .container {

}
</style>
</body>
</html>