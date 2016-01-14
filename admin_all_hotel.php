<!DOCTYPE html>
<html lang="en">
<head>
	<nav class="navbar navbar-default">
    <div class="container-fluid">
          <div class="navbar-header">
              <ul class="nav navbar-nav navbar-left">
                
                <li><img src="images/logo.png" height=50px width=50px align="left"></li>
              </ul>
          </div>
          <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
          <ul class="nav nav-pills navbar-right">
            <li><a href="admin_portal.php"><span class="glyphicon glyphicon-arrow-left"><b><font size="4" color="#FFF" face="calibri light"> Back</font>
                </b></a></li>
          <li><a href="index.html"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font>
          </b></a></li>
          <li><a href="admin_logout.php"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#FFF" face="calibri light">Logout</font></b></a></li>
          </ul>
          
          
      </div>
  </nav>
  <title>Search_Query</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsgBFqz2cjiLyvYBDRHrOdgf9vDBIvno8">
    </script>
</head>
<body>
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
<div class="container">
<table class="table" >
    <thead>
      <tr>
          <th>Hotel name</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once('function.php');

        $search = new dbSearch();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $City = $_POST['city'];
            $Name = $_POST['hotelname'];
            $res= $search->search_hotel_city_name($City, $Name);
            if ($res == null){
                $res = $search->search_hotel_city($City);
                if($res == null) {
                    $res = $search->search_hotel_name($Name);
                    if ($res == null) {
                        echo "<script></script>";
                    }
                }
            }
        }
        else{
        $res = $search->return_hotel();
        }
        while ($data = mysql_fetch_array($res)){
            echo "<tr><td><a href='Hotel-profile.php?hotel_id=".$data['Hotel_ID']."'>".$data['Hotel_Name']."</a></td><td>".$data['address']."</td></tr>";
        }
        ?>

      
    </tbody>
  </table>
</div>
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
<style>
</body>
</html>