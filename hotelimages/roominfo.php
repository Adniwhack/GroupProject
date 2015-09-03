<?php
include('function.php');
if(!$_SESSION['hotel_login']){
    header("Location:hotel_login.php");
}
else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Hotel_email = $_SESSION['hotel_email'];
        $Room_Name = $_POST['Room_Name'];
        $Room_Cost = $_POST['Room_Cost'];
        $Room_Type = $_POST['Room_Type'];
        $Room_AC =$_POST['Room_AC'];
        $Room_Desc = $_POST['Room_Description'];
        $Room_photo = $_FILES['Room_photo']['name'];
        //echo $Room_photo;
        $Photo = $_FILES['Room_photo']['tmp_name'];
        $target = 'images/';
        $target = $target.basename($Room_photo);
        move_uploaded_file($_FILES['Room_photo']['tmp_name'], $target);
        //echo "<img src=images/".$Room_photo.">";

        //$Hotel = $_SESSION['hotel_email'];

        //$hotel = new dbHotel();
        //$hotel->hotel_create_room($Room_Name, $Room_Desc, $Room_Price,$Hotel);
        $log = new dbHotel();

        $log->hotel_create_room($Hotel_email, $Room_Name, $Room_Type, $Room_AC, $Room_photo, $Room_Desc, $target, $Room_Cost);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<!--  Adding bootstrap !-->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Adding recaptcha file in to the page -->
    <style>
        .captcha, #recaptcha_image, #recaptcha_image img {
            width:100% !important;
        }
		 
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

.background {
    width: 100%;
    height:auto;
    top: 0px;
    left: 40px;
    z-index: -1;
    position: absolute;

}
  
}

.jumbotron {
    padding-left: 40px;
    padding-top: 50px;
    padding-bottom: 50px;
	padding-right: 40px;
}
</style>
    
</head>

<body background="hotelimages/pic3.jpg">





    

      <nav class="navbar navbar-default">
		<div class="container-fluid">
    			<div class="navbar-header">
      				<ul class="nav navbar-nav navbar-left"><li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li>
					</ul>
    			</div>
		<div>

    		
      				<ul class="nav nav-pills navbar-right">
        
        				<li><a href="hotel_rooms.php"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#A7A79B">Rooms</font></b></span></a></li>
        				<!--li><a href="#"><span class="glyphicon glyphicon-user"><b><font size="4" color="#A7A79B">Profile</font></b></span></a></li-->
        				<li><a href="#"><span class="glyphicon glyphicon-file"><b><font size="4" color="#A7A79B">Reports</font></b></span></a></li>
			  		<!--li><a href="#"><span class="glyphicon glyphicon-cog"><b><font size="4" color="#A7A79B">Settings</font></b></a></li-->
					<li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#A7A79B">AboutUs</font></b></a></li>
      				<li><a href="#"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#A7A79B">Logout</font></b></a></li></ul>
					
    			</div>
  		</div>
	</nav>
    <div class="container">
	<div class="col-sm-8">
	<div class="jumbotron">
    <form name = "Room_create" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  enctype=" multipart/form-data ">
        <legend><h2 align="center">Create New Room</h2></legend>
        <div class="form-group">
            <label for="Room_Name" id="Room_Name" >Room Name</label>
            <input type="text" id = "Room_Name" name="Room_Name">
        </div>
        <div class="form-group">
            <label for="Room_Type" id="Room_Type">Room Type</label>
            <select name="Room_Type">
                <option>Single</option>
                <option>Double</option>
                <option>Triple</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Room_Cost" id="Room_Cost">Cost per stay</label>
            <input type="text" id="Room_Cost" name="Room_Cost">
        </div>
        <div class="form-group">
            <label for="Room_Description" id="Room_Description">Room Description</label>
            <textarea name="Room_Description" rows="5" cols="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label><input type="radio" name="Room_AC" value="A">Air Conditioning available</label><br>
            <label><input type="radio" name="Room_AC" value = "N/A">Air Conditioning not available</label>
        </div>
        <div class="form-group">
            <label for="Room_photo" id="Room_photo">Room Photo</label>
            <input type="file" name="Room_photo" accept="image/*">
        </div>
        <button type="submit" class="btn btn-default" value="submit" >Submit</button>
    </form>
	</div>
	</div>
	</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
  </body>
 </html>


