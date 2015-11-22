<!DOCTYPE html>
<html lang="en">
    
    <?php

include ('function.php');
$res = NULL;
$log = new dbSearch();

if ($_SERVER['REQUEST_METHOD']=="POST"){
    if (isset($_POST['datefilter'])){
     $_POST['datefilter'];
    $date = explode(' - ',$_POST['datefilter'] );
     //$sql = "SELECT * FROM log WHERE call_date >= DATE_FORMAT('" . $from . "', '%Y%m%d') AND call_date <=  DATE_FORMAT('" . $to . "', '%Y%m%d')";
    $stdate = $date[0];
    $roomid=$_POST['roomid'];
    
    $roomid=$_POST['roomid'];
    $startDate = date('Y-m-d',strtotime($stdate));
    if($date[1]==""){
        $enddate = "";
    }
        $endate = $date[1];
    
    
    $endDate = date('Y-m-d',strtotime($endate));
    if($_SESSION['hotel_email']==''){
        echo 'Please Login to the system';
    }
    //echo $roomid;
    if($roomid == ''){
        $res = $log->return_unreserved_room($_SESSION['hotel_email'], $startDate, $endDate);
    }
    else{
    $res = $log->unreserved_room($roomid, $startDate, $endDate, $_SESSION['hotel_email']);
    }
}
 
}

?> 
    
<head>

  <title>Manual Selection</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  
  <script><xp:panel id="dynamicPanel">
  <xp:button id="dynamicButton1">
    <xp:this.styleClass>
      <![CDATA[#{javascript:
        if (viewScope.get("dynamicButton1") == "set") {
          return "btn btn-success";
        } else {
          return "btn btn-primary";
        }
      }]]>
    </xp:this.styleClass>
    <xp:this.value>
      <![CDATA[#{javascript:
        if (viewScope.get("dynamicButton1") == "set") {
          return " Sent successfully!";
        } else {
          return " Send message";
        }
      }]]>
    </xp:this.value>
    <xp:text id="dynamicIcon1" tagName="i">
      <xp:this.styleClass>
        <![CDATA[#{javascript:
          if(viewScope.get("dynamicButton1") == "set") {
            return "icon-ok";
          } else {
            return "icon-envelope";
          }
        }]]>
      </xp:this.styleClass>
    </xp:text>
    <xp:eventHandler event="onclick" submit="true" refreshMode="partial" refreshId="dynamicPanel">
      <xp:this.action>
        <![CDATA[#{javascript:
          if(viewScope.get("dynamicButton1") != "set") {
            viewScope.put("dynamicButton1", "set");
          } else {
            viewScope.put("dynamicButton1", "");
          }
        }]]>
      </xp:this.action>
    </xp:eventHandler>
  </xp:button>
</xp:panel></script>
  
  <script>
  $('#fire').on('click', function (e) {

     <?php
$to      = 'sandaminihimashi@gmail.com';
$subject = 'The Confirmation';
$message = 'We have approved your request. Please go through the below link and login using your password';
$headers = 'From: ohrms2015@gmail.com' . "\r\n" .
    'Reply-To: ohrms2015@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>
<xp:panel id="dynamicPanel">
  <xp:button id="dynamicButton1">
    <xp:this.styleClass>
      <![CDATA[#{javascript:
        if (viewScope.get("dynamicButton1") == "set") {
          return "btn btn-success";
        } else {
          return "btn btn-primary";
        }
      }]]>
    </xp:this.styleClass>
    <xp:this.value>
      <![CDATA[#{javascript:
        if (viewScope.get("dynamicButton1") == "set") {
          return " Sent successfully!";
        } else {
          return " Send message";
        }
      }]]>
    </xp:this.value>
    <xp:text id="dynamicIcon1" tagName="i">
      <xp:this.styleClass>
        <![CDATA[#{javascript:
          if(viewScope.get("dynamicButton1") == "set") {
            return "icon-ok";
          } else {
            return "icon-envelope";
          }
        }]]>
      </xp:this.styleClass>
    </xp:text>
    <xp:eventHandler event="onclick" submit="true" refreshMode="partial" refreshId="dynamicPanel">
      <xp:this.action>
        <![CDATA[#{javascript:
          if(viewScope.get("dynamicButton1") != "set") {
            viewScope.put("dynamicButton1", "set");
          } else {
            viewScope.put("dynamicButton1", "");
          }
        }]]>
      </xp:this.action>
    </xp:eventHandler>
  </xp:button>
</xp:panel>

})</script>
  
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
 

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
   .captcha, #recaptcha_image, #recaptcha_image img {
    width:100% !important;
}
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
 <nav class="navbar navbar-default">
	<div class="container-fluid">
    <div class="navbar-header">
    <ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
		</ul>
        </div>
    <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
	<ul class="nav nav-pills navbar-right">
        
        		<!--<li><a href="#"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#A7A79B">Rooms</font></b></span></a></li>-->
        		<!--li><a href="#"><span class="glyphicon glyphicon-user"><b><font size="4" color="#A7A79B">Profile</font></b></span></a></li-->
        		<!--<li><a href="#"><span class="glyphicon glyphicon-file"><b><font size="4" color="#A7A79B">Reports</font></b></span></a></li>-->
                <li><a href="#"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></a></li>
				<li><a href="#"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#FFF" face="calibri light"> AboutUs</font></b></a></li>
				<li><a href="#"><span class="glyphicon glyphicon-phone-alt"><b><font size="4" color="#FFF" face="calibri light"> ContactUs</font></b></a></li></ul>
					
    			
  	</div>
	</nav>
     <h2 align = "center">Room Details of the System</h2>  
     <form class="navbar-form" role="search"align = "center"  action="<?php  htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<div class="form-group">
                                                    <input type="text" name="datefilter" value="" class="form-control"/>

                                                    <input type="text" align = "right" class="form-control" id="roomid" name = "roomid" placeholder="Category Name, Room ID"/>
         
						</div> 
						<button type="submit" class="btn btn-default">
							Search
						</button>
					</form>
     
  

<div class="container">
  
  <table class="table">
    <thead>
      <tr>
        <th>Room ID</th>
        <th>Room Name</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th> </th>
        
      </tr>
    </thead>
    <tbody>
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
     
        $sql = "SELECT * FROM  hotel_room left join reservation on  hotel_room.Room_id= reservation.RoomID WHERE  hotel_room.Hotel_email = '".$_SESSION['hotel_email']."'";
        //echo $sql;
        $result = $conn->query($sql);
          
        
        //$conn->close();
        ?>
      <tr class="success">
          <?php
          
          if ($res != NULL ){
              if( mysql_num_rows($res) != 0 ){
              while ($row = mysql_fetch_array($res)){
                  echo "<tr><td>".$row["Room_id"]."</td><td>".$row["Room_name"]."</td><td>".$startDate."</td><td>".$endDate."</td>";
                  //<a href="manual_reser_form.php" class="btn btn-success btn-lg">sign</a>
                  $arr = array('room_id'=>$row["Room_id"], 'check_in' => $startDate, 'check_out'=> $endDate );
                  $con = http_build_query($arr);
                  
                  echo "<td><a href='manual_reser_form.php?$con' class='btn btn-success btn-lg'>Reserve Now!</td>"  ;
                //echo "<td><button class='btn btn-success' type='button' id='fire' action = 'manual_reser_form.php' ><i class='icon-ok'></i> Reserve Now!</button></td>";
              }
          
          /*
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["roomid"]."</td>"."<td>".$row["checkin"]."</td>"."<td>".$row["checkout"]."</td>";
                    
                echo ("<td><button class='btn btn-success' type='button' id='fire' ><i class='icon-ok'></i> Reserve Now!</button></td>");
                //echo ("<td><button class='btn btn-danger' type='button'><i class='icon-warning-sign'></i> <a href='delete.php?email=".$row['email']."'>Delete</a></button></td> </tr>");

            }
                //echo "id:" . $row["email"]. " - Name: " . $row["username"]. " " . $row["Hotel_Name"]. "<br>";
            */
              
          }
          else{echo "No results";}
              }
              else {
            if ($result!= NULL) {
                
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //echo "<tr><td>".$row["roomid"]."</td>";
                echo "<tr><td>".$row["Room_id"]."</td>"."<td>".$row["Room_name"]."</td><td>".$row["Checkin"]."</td>"."<td>".$row["Checkout"]."</td>";
    
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
    
</div>

</body>
</html>
