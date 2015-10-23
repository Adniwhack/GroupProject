<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online payment</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	
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
.myBackground {
  background-color: rgba(255,255,255, 0.5);
  color: inherit;
}


</style>
   </head>
    
    <body background="hotelimages/water.jpg">
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
						<li><a href="onlinepay.php"><span class="glyphicon glyphicon-chevron-left"><b><font size="4" color="#A7A79B">Back</font></b></span></a></li>
						
						<li><form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Hotel, Guest house etc" />
						</div> 
						<button type="submit" class="btn btn-primary btn-md">
							Search
						</button>
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
            
			
			<div class="row">
			
			<div class="col-sm-offset-2 col-sm-6">
                    <!--  Create the form horizontally !-->
                    <br></br>
                    
                    
                    <form class="form-horizontal col-md-10 col-md-offset-1" data-toggle="validator" role="form" align = "center"  >
					   <legend><font color=#00003D> Online Payment Details </font></legend>
					   
					   
					   
					   <div class="jumbotron myBackground">
					   	<div class="form-group" align = "center">
							<label for="CardHolder_name" class="col-md-4 control-label">
							<font color = #fff> Card Holder's name: </font>
							</label>
							<div class="col-md-8">
                            <?php if(isset($_POST["CardHolder_name"])){echo $_POST ["CardHolder_name"]; }?>
							</div>
						</div>
						<div class="form-group" align = "center">
							<label for="Expire_date" class="col-md-4 control-label" >
							<font color = #fff>	Expiration Date:</font>
							</label></label>
							<div class="col-md-8">
                            <?php if(isset($_POST["Expire_date"])){echo $_POST ["Expire_date"]; }?>
						</div>
						</div>
					<div class="form-group" align = "center">
							<label for="country" class="col-md-4 control-label">
							<font color = #fff>	Country</font>
							</label></label>
								<div class="col-md-8">
							<?php if(isset($_POST["country"])){echo $_POST ["country"]; }?>
						</div>
						</div>
                        
						<div class="form-group" align = "center">
							<label for="Amount" class="col-md-4 control-label" >
							<font color = #fff>	Amount(Rs):</font>
							</label>
							</label>
							<div class="col-md-8">
                            <?php if(isset($_POST['amount'])){echo $_POST ["amount"]; }?>
						</div>
						</div>
                                               
						
						
						<?php
                require_once('mysqli_connection.php');
		//$nameErr = $descErr = $priceErr = $qtyErr = "";
  		$holdername = $expdate = $country = $amount="";

  		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
                
                
		$isValid = array(False, False, False, False);
                
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        
			if (empty($_POST["CardHolder_name"])) {
				$isValid[0] = False;
			} else {
				$holdername= test_input($_POST["CardHolder_name"]);
				$isValid[0] = True;
			}
                        if (empty($_POST["Expire_date"])) {
				
				$isValid[1] = False;
			} else {
				$expdate = test_input($_POST["Expire_date"]);
				$isValid[1] = True;
			}
                        if (empty($_POST["country"])) {
				
				$isValid[2] = False;
			
			} else {
				$counrty = test_input($_POST["country"]);
				$isValid[2] = True;
			}
                        
			if (empty($_POST["amount"])) {
				$isValid[3] = False;
			} else {
				$amount = test_input($_POST["amount"]);
				$isValid[3] = True;
			}
                        
			 
                         //echo count($isValid);
                        //echo count(array_keys($isValid, True)) ;
			
                                
                                require_once('mysqli_connection.php');
                                  
				$query = "insert into payment 
					(reserid, holdername, expdate, country, amount) 
					values ( 'aa','".$_POST['CardHolder_name']."', '".$_POST['Expire_date']."', '".$_POST['country']."', '".$_POST['amount']."')";
                                   //echo $query;
				if (mysqli_query($dbconn, $query)) {
				    //echo "New record added successfully";
				    $holdername = $expdate = $country = $amount="";
				} else {
				    echo "Error: " . $query . "<br>" . mysqli_error($dbconn);
				}

				//mysqli_close($dbconn);
                        }
                
	?>
						 
					</form>	
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
                        