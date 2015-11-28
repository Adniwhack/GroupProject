<?php
include("lib/inc/chartphp_dist.php");
$freespace = disk_free_space("E:");
$totalspace = disk_total_space("E:");
$usedspace = $totalspace - $freespace;

$p = new chartphp();

$p->data = array(array(array('Free space',$freespace),array('Used space', $usedspace)));
$p->chart_type = "pie";

// Common Options
$p->title = "Pie Chart";

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
    
    <body background="green.jpg">
        
        <div class="container-fluid">
            
	<!-- Adding the image to the page and align it -->
    <div class="row">
		<div class="col-md-12">
			<div class="page-header" align = "center">
                <img alt="Bootstrap Image Preview" src="logotra.png" align = "left" width="150" height="150" /> 
				<h1>
					Online Hotel Reservation Management System - Admin portal
				</h1>
			</div>
		</div> 
	</div>
         <div class="container-fluid">
        <!-- Adding the buttons -->    
        <div class="col-md-3" >
          <ul class="nav nav-pills nav-stacked">
                <p> </p>
                <li><a class="btn btn-primary btn-lg" button type="button"  href="admin_account.php" role="button">Account Management</a></li>
               
                <p> </p>  
                <li><a class="btn btn-primary btn-lg" button type="button"  href="under_cons.php" role="button">System Management</a></li>
                <p> </p>
                <li><a class="btn btn-primary btn-lg" button type="button"  href="under_cons.php" role="button">Issue Response</a></li>
      
                <p> </p>
                <li><a class="btn btn-primary btn-lg" button type="button"  href="under_cons.php" role="button">Message Portal</a></li>

          </ul>
            </div >
             <div class="col-md-3"></div><!--Space to insert notification system here-->
            <div class = "col-md-3">
            <style>
                /* white color data labels */
                .jqplot-data-label{color:white;}
            </style>
            <div id="chart" style="width:40%; min-width:350px;">
                <?php echo $out; ?>
            </div>
            </div>

        </div>
</div>
</body>
    </html>