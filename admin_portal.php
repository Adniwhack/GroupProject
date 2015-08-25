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
    
    <body>
        
        <div class="container-fluid">
            
	<!-- Adding the image to the page and align it -->
    <div class="row">
		<div class="col-md-12">
			<div class="page-header" align = "center">
                <img alt="Bootstrap Image Preview" src="E:\Downloads\logo.jpg" align = "left" width="150" height="150" /> 
				<h1>
					Online Hotel Reservation Management System - Admin portal
				</h1>
			</div>
		</div> 
	</div>
            
        <!-- Adding the buttons -->    
        <div class="col-md-3" >
          <ul class="nav nav-pills nav-stacked">
                <p> </p>
                  <li button type="button" class="btn btn-primary btn-lg" href="admin_account.php">
                        Account Management
                  </button>  </li>
                <p> </p>  
                <li button type="button" class="btn btn-primary btn-lg"> 
                        System Management
                  </button>  </li>
                <p> </p>
                <li button type="button" class="btn btn-primary btn-lg"> 
                        Issue Response
                  </button>  </li>
                <p> </p>
                <li button type="button" class="btn btn-primary btn-lg"> 
                        Message Portal
                  </button>  </li>
          </ul>
    </div >
            <div class = "col-lg-3"></div>
            <style>
                /* white color data labels */
                .jqplot-data-label{color:white;}
            </style>
            <div id="chart" style="width:40%; min-width:450px;">
                <?php echo $out; ?>
            </div>

        </div>

</body>
    </html>