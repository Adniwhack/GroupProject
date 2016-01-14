<?php
include('function.php');
if(!$_SESSION['hotel_login']){
    header("Location:hotel_login.php");
}   

$Room_ID=$_GET['room_id'];
$Hotel_ID=$_SESSION['hotel_id'];
$Hotel_email=$_SESSION['hotel_email'];

$log= new dbHotel();

$data = $log->get_room_data($Room_ID);
$photos = $log->get_room_photo($Room_ID);

$SeaView = $data['SeaView'];
$MountainView = $data['MountainView'];
$GroundFloor = $data['GroundFloor'];
$Room_AC = $data['Room_AC'];
$wifi = $data['wifi'];
$pool = $data['pool'];
$park = $data['parking'];
$Room_Type = $data['Room_type'];
//echo $Room_Type;


$Room_Name=$Room_photo="";
$costErr="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    
   // $Room_Name = $_POST['Room_Name'];
    
    if(!empty($_POST['Room_Cost'])){
        $Room_Cost = $_POST['Room_Cost'];
    }
    else{
        $costErr = "Fill this field";
    }
    
    $Room_Type = $_POST['Room_Type'];
           
    $Room_AC = $_POST['Room_AC'];
    $Room_Number = 0;
    $Room_weight= 0;
    $view = $_POST["view"];
    $Seaview = 0;
    $MTnView = 0;
    $GndFlr = 0;
    
    if (isset($_POST['gndflr'])){
        $GndFlr = 1;
        }
        //$GndFlr = $_POST["gndflr"];
    if ($view == "SeaView"){
        $Seaview = 1;
        $MTnView = 0;
        } 
    else{
        if ($view == "Mountain"){
            $Seaview = 0;
            $MTnView = 1;
            }
        else{
            $Seaview = 0;
            $MTnView = 0;
            }
        }
    
    $single= $double= $triple = 0;
    if ($Room_Type == "Single"){$single = 1; $double = 0; $triple=0;}
    else{if($Room_Type == "Double"){$single = 0; $double = 1; $triple=0;} else{$single = 0; $double = 0; $triple=1;}}
    
    if (isset($_POST['wifi'])){$wifi= $_POST['wifi'];}
    if (isset($_POST['pool'])){$pool= $_POST['pool'];}
    if (isset($_POST['park'])){$park= $_POST['park'];}
        
    
    
    
  
    $Room_description = $_POST['Room_description'];
    
   // if(!preg_match("/^[0-9]*$/",$Room_Cost)){
     //   $costErr = "Only numbers allowed";
    //}
    
function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }
    echo $costErr;
   // echo $roomACErr;
    if($costErr == ""){
        $log = new dbHotel();
        $res = $log->edit_room_data($Room_ID, $Room_Cost, $Room_Type, $Room_description, $Room_AC, $Room_photo, $SeaView, $MTnView , $GndFlr, $wifi, $pool, $park);
    
                /*$id = $_GET['room_id'];
                if (!empty($_FILES)) {
                    //$file_ary = reArrayFiles($_FILES);
                    $filepath = "images/".$id;
                    if (!file_exists($filepath)){
                        $fl = mkdir($filepath);}
                
                    }*/
                    $extarray = array("jpeg","jpg","png","gif");
                    
                    $filepath = 'imsges/'.$Hotel_ID;
                    if(!file_exists($filepath)){
                        $f1 = mkdir($filepath);
                        }
                    
                    //mkdir($filepath);
                    $filepath = 'images/'.$Hotel_ID.'/'.$Room_Name;
                    if(!file_exists($filepath)){
                        $f1 = mkdir($filepath);
                        }
                    
                    //mkdir($filepath);
                    
                    if(!empty($_FILES)){
                    foreach($_FILES["Room_photo"]["tmp_name"] as $key=>$tmp_name){
                        $Room_photo = $_FILES['Room_photo']['name'][$key];
                        //echo $Room_photo;
                        $Photo = $_FILES['Room_photo']['tmp_name'][$key];
                        $ext = pathinfo($Room_photo, PATHINFO_EXTENSION);
                        if(in_array($ext, $extarray)){
                            $target = $filepath.$Room_photo;
                            echo $filepath;
                            echo "<br>";
                            echo $target;
                            
                            move_uploaded_file($_FILES['Room_photo']['tmp_name'][$key],$target);
                            $Que = "Insert into room_photo(room_id, photo_name, photo_location) VALUES ('$Room_ID','$Room_photo','$target')";
                            echo $Que;
                            $res = mysql_query($Que);
                            }
                    
                        }
                    }
                        
                        //header("location:rooms_all.php?room_id=$Room_ID");
                        //exit();
                }
}
              //  header("Location:mapmark.php?hotel_id=".$id."");
    
      //  if($nameErr == "" and $costErr == "" and $typeErr == "" and $descErr == "" and $optionsErr == "" and $photoErr == ""){
            
       // }
    
//echo $Room_Type;
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
   

      <nav class="navbar navbar-default">
		<div class="container-fluid">
    			<div class="navbar-header">
      				<ul class="nav navbar-nav navbar-left"><li><img src="hotelimages/logotra.png" height=50 width=50 align="left"></li>
					</ul>
    			</div>
		<div>
            <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
    		
      				<ul class="nav nav-pills navbar-right">
        
                                    <li><a href="rooms_all.php"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#A7A79B" face="calibri light">Back</font></b></span></a></li>
                                    
                                    
                                    
                                    <li><a href="Hotel-profile.php"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#A7A79B" face="calibri light">Home</font></b></a></li>
                                    
					
    	</div>
  		</div>
	</nav>
	<div class="container">
	
	<div class="col-sm-10">

	<form role="form" align="center" class="form-horizontal col-md-10 col-md-offset-1" data-toggle="validator" onSubmit="return validate();" id ="form2"action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"><!--changed-->

			<p><h4><b><legend>  Edit Room Details</legend></b></h4></p><!--changed-->
			<br>
		<div class="row">
			<div class="jumbotron">
        
			<div class="form-group">
				<label for="Room_Name" class="col-md-4 control-label" id="Room_Name" >Room Name</label>
				<div class="col-md-8">
					<input type="text" class="form-control" id = "Room_Name" name="Room_Name" disabled="disabled" value="<?php echo $data['Room_name'];?>"  />
				</div>    
			</div>
        
			<div class="form-group">
				<label for="Room_Type" class="col-md-4 control-label" id="Room_Type">Room Type</label>
				<div class="col-md-8">
					<select name="Room_Type" class="form-control">
						<option <?php if ($Room_Type=="Single"){echo "selected";}?> >Single</option>
						<option <?php if ($Room_Type=="Double"){echo "selected";}?> >Double</option>
						<option <?php if ($Room_Type=="Triple"){echo "selected";}?> >Triple</option>
					</select>
				</div>
			</div>
        
			<div class="form-group">
				<label for="Room_Cost" class="col-md-4 control-label" id="Room_Cost">Cost per stay($)</label>
				<div class="col-md-8">
					
					<input type="number" class="form-control" id="Room_Cost" name="Room_Cost" value="<?php echo $data['Cost_per_unit'];?>"/>
					<?php
						if(!empty($costErr)){
							echo '<div class="alert alert-warning">'.$costErr.'</div>';
						}
					?>
				</div>
			</div>
        
			<div class="form-group">
				<label for="Room_description" class="col-md-4 control-label" id="Room_description">Room Description</label>
				<div class="col-md-8">
					<input type="text" id="Room_description" name="Room_description" rows="4" cols="4" class="form-control" values="<?php echo $data['Room_description'];?>">
				</div>
			</div>
        
			<div class="form-group">
			<label for="AC" id="AC" class="col-md-4 control-label">A/C Facility</label>
            <div class="col-md-8">
			<br>
				<input type="radio" name="Room_AC" value=1 <?php if($Room_AC==1){echo 'checked="checked"';}?> />Air Conditioning available<br>
				<input type="radio" name="Room_AC" value = 0 <?php if($Room_AC==0){echo 'checked="checked"';}?> />Air conditioning not available
			</div>
			</div>
			<br>
			
			<div class="form_group">
				<label for="basic_options" class="col-md-4 control-label" >Basic Options</label><br>
					<div class="col-md-8">
						<label class="radio-inline"><input type="radio" name="view" value="SeaView" <?php if($SeaView==1) {echo 'checked="checked"';}?> />Sea view &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						
						<label class="radio-inline"><input type="radio" name="view" value = "Mountain" <?php if($MountainView==1) {echo 'checked="checked"';}?> />Mountain view</label>
						<label class="radio-inline"><input type="radio" name="view" value = "N/A" <?php if($SeaView==0 and $MountainView==0) {echo 'checked="checked"';}?> />Not Applicable</label>
						<br><br>
						<p><font size="2" color="red"><b>*You can select multiple features bellow</b></font></p>
						
           
					
						<input type="checkbox" name="gndflr" value = "1" <?php if($wifi==1) {echo 'checked="checked"';}?> />Ground Floor<br>
						<input name="wifi" type="checkbox" value="1" <?php if($wifi==1) {echo 'checked="checked"';}?> />Free Wifi</br>
						<input name="pool" type="checkbox" value="1" <?php if($pool==1) {echo 'checked="checked"';}?>/>Pool</br>
						<input name="park" type="checkbox" value="1" <?php if($park==1) {echo 'checked="checked"';}?>/>Parking</br>
					</div>
				<br><br>
			</div>
        <!--
        <div class="form-group" id="options">
            <label for="options">Other options:</label>
            <a href="#" onclick="javascript:void window.open('instructions.html','1443469567306','width=700,height=500,toolbar=0,menubar=0,location=0,status=0,scrollbars=0,resizable=0,left=0,top=0');return false;">How do I use this?</a>
            <input id="options" name="options" size="100" class="form-control" >
        </div>
-->
        
        <div class="form-group">
            <label for="Room_photo" id="Room_photo" class="col-md-4 control-label">Room Photo</label>
			<div class="col-md-8">
				<input type="file" name="Room_photo[]" multiple/>
			</div>
		</div>
        <div class="form-group">    
            <label for="Room_photo" id="Room_photo" class="col-md-4 control-label">Delete Photos</label>
            <?php 
                                
                while ($photo = mysql_fetch_array($photos)){
                    echo "<div class='col-md-4'>"."<a href='delete_room_photo.php?photo=".$photo['Photo_Name']."&room_id=".$Room_ID."' ><img src='".$photo['Photo_Location']."' height='100' width='100'></a> ". "</div>";
                    }
            ?>
            <br>

           <!-- <div class="col-md-8">
                <input type="file" name="Room_photo[]" id="Room_photo" accept="image/*" multiple/>
            </div> -->
        </div>
        
			<div class="form-group" align="right">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-success" value="submit" >Submit</button>
				</div>
			</div>
			</div>
		</div>
	</form>
			
	</div>
	</div>
	<br><br><br>
<div class="container">
<div class="col-sm-8 col-sm-offset-2 text-center">
<h4>
<a href="homepage.php">OHRMS</a>
</h4>
<p><b><font color="#161640">"Smarter choice for your business and vacation plans in Sri Lanka"</font></b></p>
<hr>
<!-- starting of facebook icons-->
<p> Join Us On </p>
<ul class="list-inline center-block">
<li><a href="#"><img src="hotelimages/facebook.png"></a></li>
<li><a href="#"><img src="hotelimages/twitter.png"></a></li>
<li><a href="#"><img src="hotelimages/google.png"></a></li>
<li><a href="#"><img src="hotelimages/youtube.png"></a></li>
</ul>

</div><!--/col-->
</div><!--/container-->

<!-- scroll up button-->

<ul class="nav pull-right scroll-top">
<li><a href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
</ul>

<script>
$('.scroll-top').click(function(){
$('body,html').animate({scrollTop:0},1000);
})

</script>
<!--footer-->

<div id="footer">
<div class="container">
<div class="row">
<div class="col-sm-4">
<p><a href="homepage.php"> Online Hotel Reservation and Management System</a></p>
</div>
<div class="col-sm-4">
</div>
<div class="col-sm-4">
<font color="#fff">© 2016 All Rights Reserved</font>
</div>
</div>
</div>


</div>
<!--footer end-->

	<style>
		#footer {
		height: 80px;
		background-color: #161640;
		margin-top:50px;
		padding-top:20px;


		}
		#footer {
		background-color:#161640;
		}

		#footer a {
		color:#efefef;
		}
		#footer > .container {

		}

	</style>

	
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
  </body>
 </html>


