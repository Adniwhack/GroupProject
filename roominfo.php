<?php
include('function.php');
if(!$_SESSION['hotel_login']){
    header("Location:hotel_login.php");
}
else {

    $db= new dbConnect();

    $res = mysql_query("SELECT DISTINCT Room_Option FROM room_options ");

    $str = "";

    while($data = mysql_fetch_row($res) ){
        if ($data[0] != ""){
            if ($str == ""){
                $str = '"'.$data[0];
            }
            else{
                $str = $str.'","'.$data[0];
            }

        }
    }
    $str = $str.'"';

   // echo $str;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $Hotel_ID=$_SESSION['hotel_id'];
    $Hotel_email = $_SESSION['hotel_email'];
        $Room_Name = $_POST['Room_Name'];
        $Room_Cost = $_POST['Room_Cost'];
        $Room_Type = $_POST['Room_Type'];
        $Room_AC =$_POST['Room_AC'];
        $Room_Number = 0;
        $Room_weight= 0;
        $view = $_POST["view"];
        $Seaview = 0;
        $MTnView = 0;
        $GndFlr = 0;
        $wifi= 0;
        $pool = 0;
        $park = 0;
        if (isset($_POST['gndflr'])){
            $GndFlr = 1;
        }
        if (isset($_POST['wifi'])){
            $wifi = 1;
        }
        if (isset($_POST['pool'])){
            $pool = 1;
        }
        if (isset($_POST['park'])){
            $park = 1;
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
        
        
        

        //$Room_Option = $_POST['basic_options'];

        /*if($Room_Option != "N/A"){
            $RoomOptionsMain = array($Room_Option);
            $Room_weight += 1;
        }

        elseif($Room_Option == "N/A"){


        }
         * 
         
        $Room_GndFlr = "N/A";
        if(isset($_POST['GndFlr'])){
            array_push($RoomOptionsMain, "GndFlr");
            $Room_GndFlr = "A";
            $Room_weight += 1;
        }

        $RoomOtherOptions = $_POST['options'];
        $RoomOptionArray = explode(",", $RoomOtherOptions);
        $len = count($RoomOptionArray);
        $arr = array();
        for ($i = 0; $i < $len; $i++){
            $RoomOptionArray[$i] = trim($RoomOptionArray[$i]);
            if (!in_array($RoomOptionArray[$i], $arr) ){
                array_push($arr, $RoomOptionArray[$i]);
            }
            //echo $arry[$i];
        }
        $RoomOptionArray = $arr;
        if (isset($_POST['options'])){
            $Room_weight += count($RoomOptionArray);
        }
        $RoomOptionArray = array_merge($RoomOptionArray, $RoomOptionsMain);
*/
        $Room_Desc = $_POST['Room_Description'];
        //echo $_POST[
        //
       
        
        //echo "<img src=images/".$Room_photo.">";

        //$Hotel = $_SESSION['hotel_email'];
        //echo $RoomOptionsMain;
        //$hotel = new dbHotel();
        //$hotel->hotel_create_room($Room_Name, $Room_Desc, $Room_Price,$Hotel);
        $log = new dbHotel();

        
         $extarray = array("jpeg","jpg","png","gif");
         
         $filepath = 'images/'.$Hotel_ID;
         if (!file_exists($filepath)){
         mkdir($filepath);
         }
        $Room_ID = md5($Room_Name . " " . strval("0"));
        $filepath = 'images/'.$Hotel_ID.'/'.$Room_ID;
        mkdir($filepath);
        $target = "";
        foreach ($_FILES['Room_photo']['tmp_name'] as $key=>$tmp_name){
            $Room_photo = $_FILES['Room_photo']['name'][$key];
             //echo $Room_photo;
            $Photo = $_FILES['Room_photo']['tmp_name'][$key];
            $ext = pathinfo($Room_photo, PATHINFO_EXTENSION);
            if(in_array($ext, $extarray)){
                
                $target = $filepath."/".$Room_photo;
                //$target = $target.basename($file_tmp = $_FILES['Room_photo']['tmp_name'][$key]);
                
                move_uploaded_file($_FILES['Room_photo']['tmp_name'][$key], $target);
                $que = "INSERT INTO room_photo VALUES ('$Room_ID', '$Room_photo', '$target')";
                $res = mysql_query($que);
                
                }
            
            
            
        }
        $log->hotel_create_room($Hotel_email, $Room_Name, "0", $Room_Type, $Room_photo, $Room_Desc, $target, $Room_Cost,  $Room_weight, 0, $Seaview, $MTnView, $GndFlr, $single, $double, $triple, $Room_AC, $wifi, $pool, $park);
       

         header("Location:rooms_all.php");   
        //header("Location:Hotel-profile.php?hotel_id=".$Hotel_ID."");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<!--  Adding bootstrap !-->


    <head>
         <link href="css/bootstrap.min.css" rel="stylesheet">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>  
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>
	


    
    
</head>

<body>
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
           color: #A7A79B;
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

    
<!-- Building the nav bar of the page-->

	<nav class="navbar navbar-default">
		<div class="container-fluid">
    			<div class="navbar-header">
      				<ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li></ul>
                        </div>
                        <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
                        <ul class="nav nav-pills navbar-right">
                            <li><a href="rooms_all.php"><span class="glyphicon glyphicon-arrow-left"><b><font size="4" color="#FFF" face="calibri light" >Back</font></b></span></a></li>
                            <li><a href="hotel_logout.php"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#FFF" face="calibri light"> Logout</font></b></a></li>
                        </ul>
  		</div>
	</nav>
	

    <div class="container">
	<div class="col-sm-8">
	<legend><h2 align="left">Create New Room</h2></legend>
        <form id="contactForm" name = "Room_create"  method="post" class="form-horizontal col-md-12 col-md-offset-1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  enctype="multipart/form-data">
      
	  <div class="jumbotron">

	  <div class="form-group">
            <label for="Room_Name" id="Room_Name"  class="col-md-4 control-label"  >Room Name</label>
			<div class="col-md-8">
            <input type="text"  name="Room_Name" class="form-control">
			</div>
        </div>
      
	  <div class="form-group">
            <label for="Room_Type" id="Room_Type" class="col-md-4 control-label">Room Type</label>
            <div class="col-md-8">
			<select name="Room_Type" class="form-control">
                <option >Single</option>
                <option >Double</option>
                <option >Triple</option>
            </select>
        </div>
		</div>
		
        <div class="form-group">
            <label for="Room_Cost" id="Room_Cost" class="col-md-4 control-label">Cost per stay($)</label>
            <div class="col-md-8">
                <input type="number" id="Room_Cost" name="Room_Cost" class="form-control">
			</div>
			</div>
        
		<div class="form-group">
            <label for="Room_Description" id="Room_Description" class="col-md-4 control-label">Room Description</label>
			<div class="col-md-8">
            <input type="text" id="Room_Description" name="Room_Description" rows="4" cols="4" class="form-control">
			</div>
			</div>
		
        <div class="form-group">
			<label for="AC" id="AC" class="col-md-4 control-label">A/C Facility</label>
            <div class="col-md-8">
			<br>
			<input type="radio" name="Room_AC" value=1>Air Conditioning available<br>
            <input type="radio" name="Room_AC" value = 0>Air Conditioning not available
			</div>
			</div>
        <br>
		<div class="form_group">
            <label for="basic_options" class="col-md-4 control-label" >Basic Options</label><br>
            
            <div class="col-md-8">
			<label class="radio-inline">
			<input type="radio" name="view" value="SeaView">Sea view 
			   </label>
			<label class="radio-inline">
            <input type="radio" name="view" value = "Mountain">Mountain view
			   </label>
			<label class="radio-inline">
            <input type="radio" name="view" value = "N/A">Not Applicable
			   </label>
			<br><br>
			<p><font size="2" color="red"><b>*You can select multiple features bellow</b></font></p>
			
			<input type="checkbox" name="gndflr" value = "YES">Ground Floor<br>
            <input name="wifi" type="checkbox" value="YES">Free Wifi<br>
            <input name="pool" type="checkbox" value="YES">Pool<br>
            <input name="park" type="checkbox" value="YES">Parking<br> <br><br>
			</div>
           
        </div>
        
       
        <div class="form-group">
            <label for="Room_photo" id="Room_photo" class="col-md-4 control-label">Room Photo</label>
			<div class="col-md-8">
            <input type="file" name="Room_photo[]" id="Room_photo" accept="image/*" multiple/>
            </div>    
			</div>
			
			
		             
           <div class="form-group">
		<div class="col-md-9 col-md-offset-3">
			<div id="messages"></div>
			</div>
            </div>					
            
        <div class="form-group" align = "right">
        <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" value="submit" >Submit</button>
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
            Room_Name: {
                validators: {
                    notEmpty: {
                        message: 'The room number cannot be empty'
                    }
                }
            },
            Room_Cost: {
                validators: {
                    notEmpty: {
                        message: 'The Room_Cost is required and cannot be empty'
                    },
                    numberLength: {
                        max: 50000,
                        message: 'The discount must be less than 100 characters long'
                    }
                }
            },
            Room_Description: {
                validators: {
                    notEmpty: {
                        message: 'The Room Description cannot be empty'
                    }
                }
            }
            
            
        }
    });
});
</script>	
    </form>
        

        </div>
        
	
	
	</div>

	
<!--footer start here-->

<!--description before footer-->
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

</style> 

<!--footer end here>		
 	
	

	
  </body>
 </html>


