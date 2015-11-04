<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
   
  </head>
  <body style="background-color:#EBFFD6">
  <nav class="navbar navbar-default">
		<div class="container-fluid">
    			<div class="navbar-header">
      				<ul class="nav navbar-nav navbar-left"><li><img src="hotelimages/logo.jpg" height=50px width=50px align="left"></li>
					</ul>
    			</div>
		<div>

    		
      				<ul class="nav navbar-nav">
        
        				<li><a href="#"><span class="glyphicon glyphicon-modal-window"><b><font size="4">Rooms</font></b></span></a></li>
        				<li><a href="#"><span class="glyphicon glyphicon-user"><b><font size="4">Profile</font></b></span></a></li>
        				<li><a href="#"><span class="glyphicon glyphicon-file"><b><font size="4">Reports</font></b></span></a></li>
			  		<li><a href="#"><span class="glyphicon glyphicon-cog"><b><font size="4">Settings</font></b></a></li>
					<li><a href="#"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4">AboutUs</font></b></a></li>
      				<li><a href="#"><span class="glyphicon glyphicon-log-out"><b><font size="4">Logout</font></b></a></li></ul>
					
    			</div>
  		</div>
	</nav>
	
	<table class="table" border="1">
	<caption>Rooms-Add/Edit Details</caption>
	<thead>
	<tr>
			<th>Room Number</th>
			<th>Image</th>
			<th>Description</th>
			<th>Cost per unit stay</th>
			
	</tr>
	</thead>
	<tbody>
	<tr>
	<td>
	
	<?php echo $_POST ["number1"]; ?>
	</td>
	<td>
	<?php if(isset($_POST ["image1"])){
        echo $_FILES["image1"]["Image"];
    }; ?>
	</td>
	<td>
	<?php
	if(isset($_POST['description1'])){echo $_POST ["description1"]; }?>
	</td>
	<td>
	<?php echo $_POST ["amount1"]; ?>
	</td>
	</tr>
	<tr>
	<td>
	
	<?php echo $_POST ["number2"]; ?>
	</td>
	<td>
	<?php echo $_POST ["image2"]; ?>
	</td>
	<td>
	<?php
	if(isset($_POST['description2'])){echo $_POST ["description2"]; }?>
	</td>
	<td>
	<?php
	    $_POST ["amount2"];
    ?>
	</td>
	</tr>
	</tbody>
	</table>
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>
	