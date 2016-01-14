<?php
//counting data for the pie chart
include("lib/inc/chartphp_dist.php");
$freespace = disk_free_space("E:");
$totalspace = disk_total_space("E:");
$usedspace = $totalspace - $freespace;

$p = new chartphp();

$p->data = array(array(array('Free space',$freespace),array('Used space', $usedspace)));
$p->chart_type = "pie";

// Common Options
$p->title = "Performence of the hard disk";

$out = $p->render('c2');

?>

<!DOCTYPE html>
<html lang="en">
    <!--  Adding bootstrap !-->
  <head>
   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="lib/js/jquery.min.js"></script>
    <script src="lib/js/chartphp.js"></script>
    <link rel="stylesheet" href="lib/js/chartphp.css">
    
    
  </head>
    <body >
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

        <!-- ADDING NAV BAR -->
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
                <li><a href="ADMIN_LOGIN.php"><span class="glyphicon glyphicon-arrow-left"><b>
              <font size="4" color="#FFF" face="calibri light"> Back</font>
                </b></a></li>
              <li><a href="index.html"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></span></a></li>
              <li><a href="admin_logout.php"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#FFF" face="calibri light">Logout</font></b></a></li></ul>
          
      </div>
    
    
    
      </div>
  </nav>


    <div class="container-fluid">
            
	<!-- Adding the image to the page and align it -->
    <div class="row">
		<div class="col-md-12">
			<div class="page-header" align = "center">
               
				<h1>
					Online Hotel Reservation Management System - Admin portal
				</h1>
			</div>
		</div> 
	</div>
    <br><br>
         <div class="container-fluid">

         
        <!-- Adding the buttons -->   
        <div class="col-md-4">
           <img alt="Bootstrap Image Preview" src="hotelimages/admin.jpg" align = "left" width="300" height="250" />
        </div> 
        <div class="col-md-4" >
          
                <a class="btn btn-primary btn-lg" button type="button"  href="admin_account.php" role="button">Account &nbsp;&nbsp; Management</a>
               <br><br><br>
                <a class="btn btn-primary btn-lg" button type="button"  href="admin_all_hotel.php" role="button">&nbsp;Registered &nbsp;Hotel &nbsp;List</a>

          
            </div >
            <div class="col-md-4">
              
                <a class="btn btn-primary btn-lg" button type="button"  href="Admin_report.php" role="button">Report &nbsp;  Generation &nbsp;</a>
                <br><br><br>
                <a class="btn btn-primary btn-lg" button type="button"  href="admin_get_hotel.php" role="button">Email Sending Portal </a>
            
            </div>
            <!--
             <div class="col-md-3"></div>
            <div class = "col-md-3">
            <style>
                /* white color data labels */
                .jqplot-data-label{color:white;}
            </style>
            <div id="chart" style="width:40%; min-width:350px;">
                <?php //echo $out; ?>
            </div>
            </div> -->

        </div>
</div>
<!--footer start here-->
<!--description before footer-->
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