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
	 <pre><legend>                                    Room Details-Add/Edit</legend></pre>
                        
	<thead>
	<tr>
			<th>Room Number</th>
			<th>Image</th>
			<th>Description</th>
			<th>Cost per unit stay</th>
			<th>Submit</th>
	</tr>
	</thead>
	<tbody>
	<form class= "form-forizontal" action="roomview.php" method="POST">
	<tr>
	<td>
	<div class="form-group">
	<input type="text" class="form-control" name="number1">
	</div>
	</td>
	<td>
	<div class="form-group">
	  <input type="file" name="image1" accept="image/*">
	</div>
	</td>
	<td>
	<div class="form-group">
	<textarea name="descrption1" rows="5" cols="8" placeholder="enter room descrption" class="form-control">Room description</textarea>
	</div>
	</td>
	<td>
	<div class="form-group">
	<input type="number" class="form-control" name="amount1"  step="0.01" required />
	</div>
	</td>
	<td>
	<div class="form-group">
	<div class="btn-group-horizontal">
   <button type="submit" class="btn btn-default">Submit</button>
   </div>
   </div>
   </td>
   </tr>
   </form>
    <form class= "form-forizontal" action="roomview.php" method="POST">
	<tr>
	<td>
	<div class="form-group">
	<input type="text" class="form-control" name="number2">
	</div>
	</td>
	<td>
	<div class="form-group">
	  <input type="file" name="image2" accept="image/*">
	</div>
	</td>
	<td>
	<div class="form-group">
	<textarea name="descrption2" rows="5" cols="8" placeholder="enter room descrption" class="form-control">Room description</textarea>
	</div>
	</td>
	<td>
	<div class="form-group">
	<input type="number" class="form-control" name="amount2"  step="0.01" required />
	</div>
	</td>
	<td>
	<div class="form-group">
	<div class="btn-group-horizontal">
   <button type="submit" class="btn btn-default" name="submit">Submit</button>
   </div>
   </div>
   </td>
   </tr>
   
   </form>
   </tbody>
   </table>
   
  
	
   
			
			
			
			
			
			
			
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>