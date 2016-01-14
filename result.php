<?php
    include 'function.php';
    
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      @import url(http://fonts.googleapis.com/css?family=Bree+Serif);
      body, h1, h2, h3, h4, h5, h6{
      font-family: 'Bree Serif', serif;
      }
    </style>
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
    <div>

        
              <ul class="nav nav-pills navbar-right">
                  <li><a href="manual_reserve.php"><span class="glyphicon glyphicon-arrow-left"><b>
              <font size="4" color="#FFF" face="calibri light"> Back</font>
                </b></a></li>
              <li><a href=<?php echo "Hotel-profile.php?hotel_id=".$_SESSION['hotel_id'].""?>><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></span></a></li>
              <li><a href="hotel_logout.php"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#FFF" face="calibri light">Logout</font></b></a></li></ul>
          
      </div>
    
    
    
      </div>
  </nav>
      <?php
                require_once('mysqli_connection.php');
		//$nameErr = $descErr = $priceErr = $qtyErr = "";
  		$invoice = $date = $amount = $discount= "";

  		
                
		$isValid = array(False, False, False, False);
                
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        
			if (empty($_POST["invoice"])) {
				$isValid[0] = False;
			} else {
				$invoice = test_input($_POST["invoice"]);
				$isValid[0] = True;
			}

			if (empty($_POST["date"])) {
				
				$isValid[1] = False;
			} else {
				$date = test_input($_POST["date"]);
				$isValid[1] = True;
			}

			if (empty($_POST["amount"])) {
				$isValid[2] = False;
			} else {
				$amount = test_input($_POST["amount"]);
				$isValid[2] = True;
			}

			if (empty($_POST["discount"])) {
				
				$isValid[3] = False;
			
			} else {
				$discount = test_input($_POST["discount"]);
				$isValid[3] = True;
			}
                        $_SESSION['formdata'];
                        $resformdata = $_SESSION['formdata'];
                        $log = new dbHotel();
                        $data1 = $log->get_hotel_data($resformdata['hotel_id']);
                        $room = $resformdata['roomid'];
                        if ($room = 'Multiple'){
                            $rooms = $_SESSION['fdata_rooms'];
                            foreach ($rooms as $room){
                                $rid = $log->create_new_reservation($resformdata['hotel_id'], $room, $resformdata['fname'], $resformdata['lname'], $resformdata['country'], $resformdata['address'], $resformdata['checkin'], $resformdata['checkout'], "CNF", $resformdata['contact']);
                                $reserid = "SELECT ReservationID FROM reservation ORDER BY ReservationID DESC LIMIT 1";
                                $res = mysql_query($reserid);
                                $data = mysql_fetch_array($res);
                                $reservaID = $data['ReservationID'];
                                if(count(array_keys($isValid, True)) == count($isValid)){
                                        
                                        $roomdata= $log->get_room_data($room);
                                        $pay = $roomdata['Cost_per_unit'];
                                        $query = "insert into payment 
                                                (invoiceid, reservationid, paydate, amount, discount) 
                                                values ('".$_POST['invoice']."','".$data['ReservationID']."', '".$_POST['date']."', '".$pay."', '".$_POST['discount']."')";
                                           //echo $query;
                                        if (mysqli_query($dbconn, $query)) {
                                            //echo "New record added successfully";
                                            
                                        } else {
                                            echo "Error: " . $query . "<br>" . mysqli_error($dbconn);
                                        }

                                        //mysqli_close($dbconn);
                                }
                            }
                        }
                        
                }
	?>
    <div class="container">
      <div class="row">
        <div class="col-xs-6">
          <h1>
            
              <img src="hotelimages/1.jpg">
          
            </a>
          </h1>
        </div>
        <div class="col-xs-6 text-right">
            
            
            <h1>INVOICE <?php if(isset($_POST['invoice'])){echo $_POST ["invoice"]; }?></h1>
            

          <h1><link rel="stylesheet" type="text/css" media="print" href="print.css"></h1>
                       <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
        </div>
          
          <div class="container" id="box">
	</div>
        </div>
          <script>
              function myFunction() {
              window.print();}
          </script>
          <br>
      
      <div class="row">
        <div class="col-xs-5">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>From : <a href="#"><?php if(isset($data1['Hotel_Name'])){echo $data1['Hotel_Name']; }?></a></h4>
            </div>
            <div class="panel-body">
              <p>
                Address :  <?php if(isset($data1['address'])){echo $data1['address']; }?> <br>
                Email : <?php if(isset($data1['email'])){echo $data1['email']; }?> <br>
                Contact No : <?php if(isset($data1['telephone_number'])){echo $data1['telephone_number']; }?> <br>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xs-5 col-xs-offset-2 text-left">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>To : <a href="#"><?php if(isset($resformdata['fname'])){echo $resformdata['fname']." ".$resformdata['lname']; }?></a></h4>
            </div>
            <div class="panel-body">
              <p>
                Address : <?php if(isset($resformdata['address'])){echo $resformdata['address']; }?> <br>
                Email : <?php if(isset($resformdata['email'])){echo $resformdata['email']; }?> <br>
                
                Contact No : <?php if(isset($resformdata['contact'])){echo $resformdata['contact']; }?> <br>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- / end client details section -->
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>
        <h4 class="text-center">Room Name</h4>
            </th>
            <th>
              <h4 class="text-center">Check in</h4>
            </th>
            <th>
              <h4 class="text-center">Check out</h4>
            </th>
            <th>
              <h4 class="text-center">Discount (%)</h4>
            </th>
            <th>
              <h4 class="text-center">Sub Total</h4>
            </th>
          </tr>
        </thead>
        <tbody>
            <?php 
                if (isset($_SESSION['fdata_rooms'])){
                    $rooms = $_SESSION['fdata_rooms'];
                    $roomcharges = array();
                    $checkin = $_SESSION['formdata']['checkin'];
                    $checkout = $_SESSION['formdata']['checkout'];
                    $day1 = date_create($checkin);
                    $day2 = date_create($checkout);
                    $diff = date_diff($day1, $day2, TRUE);
                    $days = $diff->days;
                    $total = 0;
                    $discount = 0;
                    if (isset($_POST['discount'])){$discount = $_POST['discount'];}
                    foreach ($rooms as $room){
                        $data = $log->get_room_data($room);
                        $room_name = $data["Room_name"];
                        $room_charge = $data['Cost_per_unit'];
                        $charge = $room_charge*$days;
                        $roomcharges["$room_name"] = $charge;
                        $total += $charge;
                        echo "<tr>"
                        . "<td class='text-right'>".$room_name."</td>"
                        . "<td class='text-right'>".$checkin."</td>"
                                . "<td class='text-right'>".$checkout."</td>"
                                . "<td class='text-right'>".$discount."</td>"
                                . "<td class='text-right'>".$charge."</td>"
                                . "</tr>";
                    }
                }
                
                
            ?>
          
          <!--
          <tr>
            <td>Development</td>
            <td><a href="#">WordPress Blogging theme</a></td>
            <td class="text-right">5</td>
            <td class="text-right">50.00</td>
            <td class="text-right">$250.00</td>
          </tr>-->
        </tbody>
      </table>
      <div class="row text-right">
        <div class="col-xs-2 col-xs-offset-8">
          <p>
            <strong>
            
            Total : <br>
            </strong>
          </p>
        </div>
        <div class="col-xs-2">
          <strong>
          
         
           <?php if(isset($_POST["amount"])&&($_POST["discount"]))
						{
                                                    echo $net=$_POST["amount"]-($_POST["amount"]*$_POST["discount"])/100;}
                                                else{
                                                    echo $_POST["amount"];
                                                }
						?><br>
          </strong>
        </div>
      </div>
      <div class="row">
        
        <div class="container">
          <div class="span7">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h4>Terms and Conditions</h4>
              </div>
              <div class="panel-body">
                <p>
                  The owner will want to negotiate the terms of the agreement and introduce some balance, giving the owner rights and remedies if the hotel business experiences financial concerns. The scope to add balance to a hotel management agreement may depend on the allure of the hotel to the operator – if it is a prestigious hotel, in a good location, the operator will be more likely to negotiate.
                </p>
                <h4>Signature of the customer : </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  
</html>
