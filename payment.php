

<?php
    include 'function.php';
    $pay = 0;
    $log = new dbHotel();
    if (isset($_SESSION['hotel_login'])){
        $room = $_SESSION['formdata']['roomid'];
       if ($room == "Multiple"){
           $rooms = $_SESSION['fdata_rooms'];
           $conditionarray = array();
           foreach ($rooms as $room){
               $conditionarray[] = "Room_id='$room'";
           }
           $que = "SELECT * FROM hotel_room WHERE ". implode(" OR ", $conditionarray);
           $res = mysql_query($que);
           while ($data=mysql_fetch_array($res)){
               $roomc = $data['Cost_per_unit'];
               $pay += $roomc;
           }
           
       }else{
           $que = "SELECT * FROM hotel_room WHERE Room_id = $room";
           $res = mysql_query($que);
           $data=mysql_fetch_array($res);
           $pay = $data['Cost_per_unit'];
           
       }
       $checkin = $_SESSION['formdata']['checkin'];
       $checkout = $_SESSION['formdata']['checkout'];
       $day1 = date_create($checkin);
       $day2 = date_create($checkout);
       $diff = date_diff($day1, $day2, TRUE);
       $days = $diff->days;
       
       $payx = $pay * $days;
       
    }
    else{
        header("location:index.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Manual Payment</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>  
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>
	
   </head>
    
    <body background="">
        
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
                  
              <li><a href=""><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></span></a></li>
              <li><a href="hotel_logout.php"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#FFF" face="calibri light">Logout</font></b></a></li></ul>
          
      </div>
    
    
    
      </div>
  </nav>
			<div class="container">
                
			
			<div class="row">
                         <div class="col-md-2">
                          </div>
			<div class="col-md-9">
                    <!--  Create the form horizontally !-->
                    <br><br>
                    
                    
                    <form id="contactForm" class="form-horizontal col-md-10 col-md-offset-1" data-toggle="validator" role="form" align = "center" method="post" action="result.php" >
					   <legend>Manual Payment Details</legend>
                        <div class="jumbotron">
                        <div class="form-group" align = "center">
                            <label for="invoicenumber" class="col-md-4 control-label" >
				Invoice Number:
                            </label>
                            <div class="col-md-8">
				<input type="text" class="form-control" name="invoice" />
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
								Amount($):
							</label>
                                                        <div class="col-md-8">
                                                                <input type="number" class="form-control" min="0" name="amount" value="<?php echo $payx;?>" required />
							</div>
						</div>
						
						<div class="form-group" align = "center">
							<label for="Discount" class="col-md-4 control-label" >
								Discount(%):
							</label>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control" max="100" min="0" name="discount" required />
                                                                
							</div>
						</div>
						<br>
						<div class="form-group">
                                                    <div class="col-md-9 col-md-offset-3">
                                                        <div id="messages"></div>
                                                    </div>
                                                </div>
						
						 <div class="col-sm-offset-9 col-sm-3">
                                                    
						<button type="submit" class="btn btn-success btn-lg">Submit</button>
                                                 </div>
                                                
                        </div>
					</form>	
						
				</div>
                        </div>
				</div>
				
 
    <script type="text/javascript">
$(document).ready(function() {
    $('#contactForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            invoice: {
                validators: {
                    notEmpty: {
                        message: 'The invoice number cannot be empty'
                    }
                }
            },
            discount: {
                validators: {
                    notEmpty: {
                        message: 'The discount is required and cannot be empty'
                    },
                    numberLength: {
                        max: 100,
                        message: 'The discount must be less than 100 characters long'
                    }
                }
            }
            
            
        }
    });
});
</script>
    
  </body>

</html>
                        