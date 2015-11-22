<?php 
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    
    $rid = $_GET['rid'];
}
else{
    header("location:index.html");
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manual Payment</title>

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
						<li><a href="#"><span class="glyphicon glyphicon-chevron-left"><b><font size="4" color="#A7A79B">Back</font></b></span></a></li>
						
						<li><form class="navbar-form navbar-left" role="search">
						
						
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
                    
                    
                    <form class="form-horizontal col-md-10 col-md-offset-1" data-toggle="validator" role="form" align = "center" method="post" action="result.php" >
					   <legend>Manual Payment Details</legend>
                        
                        <div class="form-group" align = "center">
							<label for="invoicenumber" class="col-md-4 control-label" >
								Invoice Number:
							</label>
                            <div class="col-md-8">
								<input type="text" class="form-control" name="invoice" required />
							</div>
						</div>
						
						<div class="form-group" align = "center">
							<label for="Paydate" class="col-md-4 control-label" >Payment Date:</label>
                            <div class="col-md-8">
								<input type="date" class="form-control" name="date" placeholder="2015/08/08" required />
							</div>
						</div>
						
						<div class="form-group" align = "center">
							<label for="Amount" class="col-md-4 control-label" >
								Amount(Rs):
							</label>
                            <div class="col-md-8">
								<input type="number" class="form-control" name="amount"  step="0.01" required />
							</div>
						</div>
						
						<div class="form-group" align = "center">
							<label for="Discount" class="col-md-4 control-label" >
								Discount(%):
							</label>
                            <div class="col-md-8">
								<input type="number" class="form-control" name="discount"  step="0.01" required />
                                                                <input type ="hidden" name="rid" value="<?php echo $rid;?>"
							</div>
						</div>
						<br>
						
						
						 <div class="col-sm-offset-9 col-sm-3">
                                                     <br>
						<button type="submit" class="btn btn-success btn-md">Submit</button></div>
					</form>	
						
				</div>
				</div>
				
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>

</html>
                        