<?php
    include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Result</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
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
    
    <body background="">
	<!-- Navigation bar which is in the top of the page -->
               
        <nav class="navbar navbar-default">
		<div class="container-fluid">
				<div class="navbar-header">
					<ul class="nav navbar-nav navbar-left"><li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li>
					</ul>
				</div>
		
		<div>
					 <ul class="nav nav-pills navbar-left">
                        <li><a href="#"><span class="glyphicon glyphicon-home"><b><font size="4" color="#A7A79B">Home</font></b></span></a></li>  
						<li><a href="payment.php"><span class="glyphicon glyphicon-chevron-left"><b><font size="4" color="#A7A79B">Back</font></b></span></a></li>
						
						<li><form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Hotel, Guest house etc" />
						</div> 
						
					</form></li>		
					</ul>
                     </ul>
				</div>
				<div>
						<ul class="nav nav-pills navbar-right">
						   
						 <li><a href="#"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#A7A79B">AboutUs</font></b></span></a></li>
						 <li><a href="#"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#A7A79B">Rooms</font></b></span></a></li>
				
				
				
				</div>
                                    
				</div>
				
				</div>
				
			</nav>
                    <div class="container jumbotron">
			
			<div class="col-sm-offset-2 col-sm-6">
                    <!--  Create the form horizontally !-->
                    <br></br>
                    
                    
                    <form class="form-horizontal col-md-10 col-md-offset-1" data-toggle="validator" role="form" align = "center"  >
					   <legend>Manual Payment Details</legend>
                        
                        <div class="form-group" align = "center">
							<label for="invoicenumber" class="col-md-4 control-label" >
								Invoice Number:
							</label>
                            <?php if(isset($_POST['invoice'])){echo $_POST ["invoice"]; }?>
						</div>
						
						<div class="form-group" align = "center">
							<label for="Paydate" class="col-md-4 control-label" >Payment Date:</label>
                            <?php if(isset($_POST['date'])){echo $_POST ["date"]; }?>
						</div>
						
						<div class="form-group" align = "center">
							<label for="Amount" class="col-md-4 control-label" >
								Amount(Rs):
							</label>
                            <?php if(isset($_POST['amount'])){echo $_POST ["amount"]; }?>
						</div>
						
						
						<div class="form-group" align = "center">
							<label for="Discount" class="col-md-4 control-label" >
								Discount(%):
							</label>
                            <?php if(isset($_POST['discount'])){echo $_POST ["discount"]; }?>
						</div>
						
						<div class="form-group" align = "center">
							<label for="Net" class="col-md-4 control-label" >
								Net Amount(Rs):
							</label>
                                                <?php if(isset($_POST["amount"])&&($_POST["discount"]))
						{
                                                    echo $net=$_POST["amount"]-($_POST["amount"]*$_POST["discount"])/100;}
                                                else{
                                                    echo $_POST["amount"];
                                                }
						?>
                                                </div>
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
                        $rid = $log->create_new_reservation($resformdata['hotel_id'], $resformdata['roomid'], $resformdata['fname'], $resformdata['lname'], $resformdata['country'], $resformdata['address'], $resformdata['checkin'], $resformdata['checkout'], "CNF", $resformdata['contact']);
                        //$que_reservation= "insert into payment (hotel_id, roomid, fname, lname, country, address, checkin, checkout, "CNF", contact) values ('".$_POST['invoice']."', '".$_POST['date']."', '".$_POST['amount']."', '".$_POST['discount']."')";
                        
                        $reserid = "SELECT ReservationID FROM reservation ORDER BY ReservationID DESC LIMIT 1";
                        $res = mysql_query($reserid);
                        $data = mysql_fetch_array($res);
                        $reservaID = $data['ReservationID'];
                        
                        
                        
                        
                        //echo count(array_keys($isValid, True)) ;
			if(count(array_keys($isValid, True)) == count($isValid)){
                                require_once('mysqli_connection.php');
                                
				$query = "insert into payment 
					(invoiceid, reservationid, paydate, amount, discount) 
					values ('".$_POST['invoice']."','".$data['ReservationID']."', '".$_POST['date']."', '".$_POST['amount']."', '".$_POST['discount']."')";
                                   //echo $query;
				if (mysqli_query($dbconn, $query)) {
				    //echo "New record added successfully";
				    $invoice = $date = $amount = $discount= "";
				} else {
				    echo "Error: " . $query . "<br>" . mysqli_error($dbconn);
				}

				//mysqli_close($dbconn);
                        }
                }
	?>
						</form>	
						</div>
						<br>
                        
					
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
                        