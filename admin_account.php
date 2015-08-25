<?php

?>

<!DOCTYPE html>
<html lang="en">
    <!--  Adding bootstrap !-->
  <head>
   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
    </div>
            <div class="col-md-9">
                <form name="login" method="post" action=" htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h1>Create New Hotel Account</h1><br><br>
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" value="<?php echo $username;?>">
                <label for="password">Password:</label></br>
                <
                </form>
            </div>

</div>

</body>
    </html>