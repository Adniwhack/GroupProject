<?php
include('function.php');
if(!$_SESSION['hotel_login']){
	header('Location:hotel_login.php');
}
else{
	$Hotel_ID = $_SESSION['hotel_id'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (!empty($_POST['room_create1'])) {
			$Hotel_email = $_SESSION['hotel_email'];
			$Room_Name = $_POST['number1'];
			$Room_Type = $_POST['roomtype'];
			$Room_AC = $_POST['optradio1'];

			$Room_Desc = $_POST['description1'];
			$Room_Cost = $_POST['amount1'];
			$Room_ID = md5($Room_Name);


			$Room_Photo_name = $_FILES['image1']['name'];
			$Room_Photo = $_FILES['image1']['tmp_name'];

			$target = 'images/hotel';
			$target = $target . basename($Hotel_ID);
			echo $target;
			$target = $target . basename('/rooms/');
			echo $target;
			$target = $target . basename($Room_Photo_name);

			move_uploaded_file($Room_Photo, $target);
			ECHO $target;
			echo "<img src='".$target.">";
			$log = new dbHotel();

			$log->hotel_create_room($Hotel_email, $Room_Name, $Room_Type, $Room_AC, $Room_Photo_name, $Room_Desc, $target, $Room_Cost);
		}

		else {
			if (!empty($_POST['room_create2'])) {
				$Hotel_email = $_SESSION['hotel_email'];
				$Room_Name = $_POST['number2'];
				$Room_Type = $_POST['roomtype'];
				$Room_AC = $_POST['optradio2'];

				$Room_Desc = $_POST['description2'];
				$Room_Cost = $_POST['amount2'];
				$Room_ID = md5($Room_Name);


				$Room_Photo_name = $_FILES['image2']['name'];
				$Room_Photo = $_FILES['image2']['tmp_name'];

				$target = 'images/hotel';
				$target = $target . basename($Hotel_ID);
				$target = $target . basename('/rooms/');
				$target = $target . basename($Room_Photo_name);

				move_uploaded_file($Room_Photo, $target);

				$log = new dbHotel();

				$log->hotel_create_room($Hotel_email, $Room_Name, $Room_Type, $Room_AC, $Room_Photo_name, $Room_Desc, $target, $Room_Cost);
			}
		}
	}
}
?>


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
  <body style="background-color:#B8DB4D">
  
  <nav class="navbar navbar-default">
		<div class="container-fluid">
    			<div class="navbar-header">
      				<ul class="nav navbar-nav navbar-left"><li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li>
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
	<div class="table-responsive">
	<table class="table" border="1">
	 <pre><legend>                                 Room Details-Add/Edit</legend></pre>
                        
	<thead>
	<tr class="active">
			<th>Room Number</th>
			<th>Room Type</th>
			<th>A/C or Non A/C</th>
			<th>Image</th>
			<th>Description</th>
			<th>Cost per unit stay</th>
			<th>Submit</th>
	</tr>
	</thead>
	<tbody>
	 <form name="room_create1" class= "form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
	<tr>
	<td>
	<div class="form-group">
	<input type="text" class="form-control" name="number1">
	</div>
	</td>
	<td>
	<div class="form-group">
	<select class="form-control" name="roomtype">
	<option>Single</option>
	<option>Double</option>
	<option>Triple</option>
	</select>
	</div>
	</td>
	<td>
	<div class="form-group">
	<div class="radio">
	<label><input type="radio" name="optradio1">A/C</label><br>
	</div>
	<div class="radio">
	<label><input type="radio" name="optradio1">Non A/C</label>
	</div>

	</div>
	</td>
	<td>
	<div class="form-group">
	<input type="file" name="image1" accept="image/*">

	</div>
	</td>
	<td>
	<div class="form-group">
	 <textarea class="form-control" rows="5"  name="description1"></textarea>
	</div>
	</td>
	<td>
	<div class="form-group">
	<input type="number" class="form-control" name="amount1"  step="0.01" min="0" required />
	</div>
	</td>
	<td>
	<div class="form-group">
	<div class="btn-group-horizontal">
   <button type="submit" class="btn btn-default" value="submit" onSubmit="alert('Room details were successfully entered')">Submit</button>
   </div>
   </div>
   </td>
   </tr>
   </form>
    <form class= "form-horizontal" name="room_create2" role="form" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<tr>
	<td>
	<div class="form-group">
	<input type="text" class="form-control" name="number2">
	</div>
	</td>
	<td>
	<div class="form-group">
	<select class="form-control" name="roomtype">
	<option>Single</option>
	<option>Double</option>
	<option>Triple</option>
	</select>
	</div>
	</td>
	<td>
	<div class="form-group">
	<div class="radio">
	<label><input type="radio" name="optradio2">A/C</label>
	</div>
	<div class="radio">
	<label><input type="radio" name="optradio2">Non A/C</label>
	</div>

	</div>
	</td>
	<td>
	<div class="form-group">
	<input type="file" name="image2" accept="image/*">
	</div>
	</td>
	<td>
	<div class="form-group">
	<textarea class="form-control" rows="5"  name="description2"></textarea>
	</div>
	</td>
	<td>
	<div class="form-group">
	<input type="number" class="form-control" name="amount2"  min="0" step="0.01" required />
	</div>
	</td>
	<td>
	<div class="form-group">
	<div class="btn-group-horizontal">
   <button type="submit" class="btn btn-default" value="submit" >Submit</button>
   </div>
   </div>
   </td>
   </tr>
   
   </form>
   </tbody>
   </table>
   </div>
   
  
	
   
			
			
			
			
			
			
			
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>