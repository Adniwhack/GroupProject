<!DOCTYPE html>
<html lang="en">
    
    <?php
//include the function.php 
include ('function.php');
$res = NULL;
$log = new dbSearch();
//check whether the form send data via POST
if ($_SERVER['REQUEST_METHOD']=="POST"){
    if (isset($_POST['datefilter'])){
     $_POST['datefilter'];
    $date = explode(' - ',$_POST['datefilter'] );
     //$sql = "SELECT * FROM log WHERE call_date >= DATE_FORMAT('" . $from . "', '%Y%m%d') AND call_date <=  DATE_FORMAT('" . $to . "', '%Y%m%d')";
    $stdate = $date[0];
    $roomname=$_POST['roomname'];
    //Convertion of the start datee and end date 
    //$roomid=$_POST['roomid'];
    $startDate = date('Y-m-d',strtotime($stdate));
    if($date[1]==""){
        $enddate = "";
    }
        $endate = $date[1];
    
    
    $endDate = date('Y-m-d',strtotime($endate));
    if($_SESSION['hotel_email']==''){
        echo 'Please Login to the system';
    }
    //call the function.php to access relevant functions
    //echo $roomid;
    if($roomname == ''){
        $res = $log->return_unreserved_room($_SESSION['hotel_email'], $startDate, $endDate);
    }
    else{
    $res = $log->unreserved_room($roomname, $startDate, $endDate, $_SESSION['hotel_email']);
    }
}
 
}

?> 
    
<head>
    <!-- importing relevant libraries -->
  <title>Manual Selection</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
  <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<!--insertion of the Pagination--> 

<script>
    $.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage: 3,
            showPrevNext: false,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);
    
    var listElement = $this;
    var perPage = settings.perPage; 
    var children = listElement.children();
    var pager = $('.pager');
    
    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }
    
    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }
    
    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }
    
    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }
    
    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
  	pager.children().eq(1).addClass("active");
    
    children.hide();
    children.slice(0, perPage).show();
    
    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });
    
    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }
    
    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        
        children.css('display','none').slice(startAt, endOn).show();
        
        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }
        
        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }
        
        pager.data("curr",page);
      	pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");
    
    }
};

$(document).ready(function(){
    
  $('#myTable').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:7});
    
});</script>

<!-- Insertion of the date range picker -->
<script type="text/javascript">
$(function() {

  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
      var startDate=$startDate.val();
      document.getElementById('demo').innerHTML='<p>'+startDate+'</p>';
      
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
</script>
<script>
 $(document).ready(function(){
  $("#tags").autocomplete("autocomplete.php", {
        selectFirst: true
  });
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
    
<!-- Import the nav bar -->
 <nav class="navbar navbar-default">
	<div class="container-fluid">
    <div class="navbar-header">
    <ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
		</ul>
        </div>
    <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
	<ul class="nav nav-pills navbar-right">
           
            <li><a href=<?php echo "Hotel-profile.php?hotel_id=".$_SESSION['hotel_id'].""?>><span class="glyphicon glyphicon-arrow-left"><b>
              <font size="4" color="#FFF" face="calibri light"> Back</font>
                </b></a></li>
                                <li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#FFF" face="calibri light"> AboutUs</font></b></a></li>
					
    			
  	</div>
	</nav>

<!-- Insert the date range picker-->
    <h2 align = "center">Reservation details of the hotel</h2>  
    <form class="navbar-form" role="search"align = "center"  action="<?php  htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <input type="text" name="datefilter" value="" class="form-control" placeholder="checkin - checkout" required/>
            <input type="text" align = "right" class="form-control" id="roomid" name = "roomname" placeholder=" Room Name"/>
        </div> 
	<button type="submit" class="btn btn-default">
            Search
	</button>					
    </form>
     
  
<!-- By here this code will contain by a container class -->
<div class="container">
    <?php 
        if ($res != NULL){
            echo '<form name="room" action="manual_reser_form.php" method="post" role="form">';
        }
    ?>
	<div class="row">
      <div class="table-responsive">
        <table class="table table-hover">
    <thead>
      <tr>
        <!-- Table headings are here -->
        <th>Room Name</th>
        <th>Room Type</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th> </th>
        
      </tr>
    </thead>
    <tbody id="myTable">
        <!-- Access data through the database using php -->
                <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ohrms";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        //select data from the database
        $sql = "SELECT * FROM  hotel_room left join reservation on  hotel_room.Room_id= reservation.RoomID WHERE  hotel_room.Hotel_email = '".$_SESSION['hotel_email']."'";
        //echo $sql;
        $result = $conn->query($sql);
          
        
        //$conn->close();
        ?>
        <tr>
          <?php
          //echo the table 
          if ($res != NULL ){
              if( mysql_num_rows($res) != 0 ){
                  $j = 0;
              while ($row = mysql_fetch_array($res)){
                  echo "<tr><td>".$row["Room_name"]."</td><td>".$row["Room_type"]."</td><td>".$startDate."</td><td>".$endDate."</td><td><input type='checkbox' name=room[] value='".$row['Room_id']."' onclick='chkcontrol($j)' ></td>";
                  //<a href="manual_reser_form.php" class="btn btn-success btn-lg">sign</a>
                  //$arr = array('room_id'=>$row["Room_id"],'Room_type'=>$row["Room_type"], 'check_in' => $startDate, 'check_out'=> $endDate );
                  //$con = http_build_query($arr);
                  $j++;
                  //echo "<td><a href='manual_reser_form.php?$con' class='btn btn-success btn-lg'>Reserve Now!</td>"  ;
                //echo "<td><button class='btn btn-success' type='button' id='fire' action = 'manual_reser_form.php' ><i class='icon-ok'></i> Reserve Now!</button></td>";
              }
          
              
          }
          // if reservations done in selected dates this will be printed
          else{echo "Sorry! You have a reservation the room for the selected dates";}
              }
              else {
            if ($result!= NULL) {
                
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //echo "<tr><td>".$row["roomid"]."</td>";
                echo "<tr><td>".$row["Room_name"]."</td><td>".$row["Room_type"]."</td>"."<td>".$row["Checkin"]."</td>"."<td>".$row["Checkout"]."</td>";
    
                //echo ("<td><button class='btn btn-success' type='button' id='fire' ><i class='icon-ok'></i> Reserve Now!</button></td>");
                //echo ("<td><button class='btn btn-danger' type='button'><i class='icon-warning-sign'></i> <a href='delete.php?email=".$row['email']."'>Delete</a></button></td> </tr>");

            }
                //echo "id:" . $row["email"]. " - Name: " . $row["username"]. " " . $row["Hotel_Name"]. "<br>";
            }else{
            echo "0 results";
            }
        }
            
          ?>
    </tr>
      
    </tbody>
  </table>
    <?php if ($res != NULL ){
        echo "<input type='hidden' name='check_in' value='$startDate'><input type='hidden' name='check_out' value='$endDate'>";
                    echo '<button type="submit" class="btn btn-primary">Reserve Now</button>';
                    print "</form>";
    } ?>
</div>
            <!-- Including Pagination -->
<div class="col-md-12 text-center">
      <ul class="pagination pagination-lg pager" id="myPager"></ul>
      </div>
            
</div>
</div>
    <!--Footer-->
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
