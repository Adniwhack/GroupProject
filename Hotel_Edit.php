<?php

include_once('function.php');

if (!isset($_SESSION['hotel_id'])){
    header("Location:homepage.php");
}

$Hotel_ID=$_SESSION['hotel_id'];
$Hotel_email = $_SESSION['hotel_email'];

$log= new dbHotel();

$data = $log->get_hotel_data($Hotel_ID);
$photos = $log->get_hotel_photo($Hotel_email);


    /*if($_POST['welcome']){
        // remove all session variables
        session_unset(); 

        // destroy the session 
        session_destroy();
    }
*/
$Hotel_name= $Hotel_address= $Hotel_city= $Hotel_Country= $Hotel_contact= $Hotel_Username= $Hotel_Password= $Hotel_PasswordCon = "";
$nameErr = $addressErr = $cityErr = $CountryErr = $emailErr = $contactErr = $usererr =$passerr  = $conpasserr = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){

        
        if (!empty($_POST['address'])){
            $Hotel_address = $_POST['address'];
        }
        else{
            $addressErr = "Fill this field";
        }

        if (!empty($_POST['city'])){
            $Hotel_city = $_POST['city'];
        }
        else{
            $cityErr = "Fill this field";
        }
        if (!empty($_POST['Country'])){
            $Hotel_Country = $_POST['Country'];
        }
        else{
            $CountryErr = "Fill this field";
        }

       
        if (!empty($_POST['contact'])){
            $Hotel_contact = $_POST['contact'];
        }
        else{
            $contactErr = "Fill this field";
        }
        
       
        $desc = $_POST['description'];
        
       
    if (!preg_match("/^[0-9_]*$/",$Hotel_contact)) {
        $contactErr = "Only numbers and underscore allowed";
    }

    

    




        if($nameErr == "" and $addressErr == "" and $cityErr == "" and $CountryErr == "" and  $emailErr == "" and  $contactErr == "" and  $usererr =="" and $passerr  == "" and  $conpasserr == ""){
            $log = new dbHotel();
            $res = $log->edit_data($Hotel_email, $Hotel_address, $Hotel_city, $Hotel_contact, $lat="", $lng="", $desc);
            
            
                $id = $_SESSION['hotel_id'];
                if (!empty($_FILES)) {
                    //$file_ary = reArrayFiles($_FILES);
                    $filepath = "images/".$id;
                    if (!file_exists($filepath)){
                        $fl = mkdir($filepath);}
                
                    }
                    $extarray = array("jpeg","jpg","png","gif");
                    
                    foreach($_FILES["pic"]["tmp_name"] as $key=>$tmp_name){
                        $file_name= $_FILES["pic"]["name"][$key];
                        $file_tmp = $_FILES["pic"]["tmp_name"][$key];
                        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                        if(in_array($ext, $extarray)){
                        $target = $filepath."/".$file_name;
                        move_uploaded_file($file_tmp= $_FILES["pic"]["tmp_name"][$key],$target);
                        $Que = "Insert into hotel_photo(email, photo_id, photo_address) VALUES ('$Hotel_email','$file_name','$target')";
                        echo $Que;
                        $res = mysql_query($Que);
                        
                        }
                        
                        }
                        
                        header("location:Hotel-Profile.php?hotel_id=$Hotel_ID");
                        exit();
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


</style>
</head>
    
<body>

    <nav class="navbar navbar-default">
		<div class="container-fluid">
    			<div class="navbar-header">
      				<ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
					</ul>
                        </div>
                    <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
				<ul class="nav nav-pills navbar-right">
                                    
                                    <li><a href=<?php echo "Hotel-profile.php?hotel_id=".$_SESSION['hotel_id'].""?>><span class="glyphicon glyphicon-arrow-left"><b><font size="4" color="#FFF" face="calibri light"> Back</font></b></a></li>
                
                                    <li><a href="aboutus.html"><span class="glyphicon glyphicon-phone-alt"><b><font size="4" color="#FFF" face="calibri light"> About Us</font></b></a></li></ul>
					
    			
  		</div>
	</nav>

        
 <!--Create account for hotel -->
                
	<div class="container">
    <div class="col-md-10">
                        
 <!--  Create the form horizontally !-->
    <br><br>
					  
			<form name = "hotel_edit" class="form-horizontal col-md-10 col-md-offset-1" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                      
	            <legend> <font color=" #000" size="5"> <b>Modify details here </b></font> 
				</legend>

				<br><br>
				<a href="map_edit.php" class="btn btn-info" role="button">Edit Map Location</a>
              
                        
				<div class="jumbotron">
						
						<div class="form-group">
                            <label for="inputName" class="col-md-4 control-label"> 
                            Hotel name 
                            </label>
                            <div class="col-md-8">
                            <input type="text" class="form-control" id="inputName" value="<?php echo $data['Hotel_Name'];?>" name ="hotel_name" disabled="disabled" />
                            </div>
                        </div>
						
                        <div class="form-group">
                        <label for="inputAddress" class="col-md-4 control-label"> 
                        Address
                        </label>
                        <div class="col-md-8">
                        <input type="text" class="form-control" id="inputAddress"  value="<?php echo $data['address'];?>" placeholder="No 10, Down Street, Colombo 10" name = "address"/>
                        </div>
                        </div>
						
                        <?php
                        if(!empty($addressErr)){
                            echo '<div class="alert alert-warning">'.$addressErr.'</div>';
                        }
                        ?>
                        
                        <div class="form-group" >
                        <label for="inputName" class="col-md-4 control-label"> 
                        City 
                        </label>
                        <div class="col-md-8">
                        <input type="text" class="form-control" id="inputName"  value="<?php echo $data['City'];?>" name = "city"/>
                        </div>
                        </div>
						
                        <?php
                        if(!empty($cityErr)){
                            echo '<div class="alert alert-warning">'.$cityErr.'</div>';
                        }
                        ?>

                        <div class="form-group" align = "center">
                        <label for="inputName" class="col-md-4 control-label" >
                        Country
                        </label>
                        <div class="col-md-8">
                            <select class="form-control" name="Country">
                                <option>Sri Lanka</option>
                                <option>India</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label" > 
                            Email ID 
                            </label>
                            
                            <div class="col-md-8">
                            <input type="email" class='form-control' id="inputEmail3" value="<?php echo $data['email'];?>" name = "email" disabled="disabled" />
                            </div>
                        </div>
						
                        <?php
                        if(!empty($emailErr)){
                            echo '<div class="alert alert-warning">'.$emailErr.'</div>';
                        }
                        ?>

                        <div class="form-group">
                            <label for="inputNumber" class="col-md-4 control-label"> 
                            Contact No 
                            </label>
                            
                            <div class="col-md-8">
                            <input type="number" pattern =^\d{10}$ class="form-control" id="inputNumber" value="<?php echo $data['telephone_number'];?>"  placeholder="00947777123456" name = "contact"  />
                            </div>
                        </div>
						
                        <?php
                        if(!empty($contactErr)){
                            echo '<div class="alert alert-warning">'.$contactErr.'</div>';
                        }
                        ?>
                        
                       
                        <?php
                        if(!empty($conpasserr)){
                            echo '<div class="alert alert-warning">'.$conpasserr.'</div>';
                        }
                        ?>
    
    
                        <div class='form-group'>
                        <label for='description' class='col-md-4 control-label'>Description</label><br>
						<div class="col-md-8">
                        <textarea name='description' placeholder="Add description here" class="form-control"></textarea>
                        </div>
						</div>
                        
						
						<div class="form-group" >
							
                            <label class="col-md-4 control-label">Delete Photos:</label>
							<div class="col-md-8">
                           
                            <?php 
                                
                                while ($photo = mysql_fetch_array($photos)){
                                    echo "<div class='col-md-4'>"
                                    . "<a href='delete_photo.php?photo=".$photo['photo_id']."' ><img src='".$photo['photo_address']."' height='100' width='100'></a> "
                                    . "</div>";
                                }
                            ?>
                         
							</div>
							</div>
                            <br>
							
							<div class="form-group" >
                            <label class="col-md-4 control-label">Set Photo As Featured:</label>
                            <br>
                            <div class="col-md-8">
                            <?php 
                                $photos = $log->get_hotel_photo($Hotel_email);
                                while ($photo = mysql_fetch_array($photos)){
                                    echo "<div class='col-md-4'>"
                                    . "<a href='set_photo_featured.php?photo=".$photo['photo_id']."' ><img src='".$photo['photo_address']."' height='100' width='100'></a> "
                                    . "</div>";
                                }
                            ?>
							
                            </div>
							</div>
							
							<div class="form-group" >
                            <label class="col-md-4 control-label">Add more photos:</label><br>
                            <div class="col-md-8">
                            <input type="file" name="pic[]" accept="image/*" multiple>
							</div>
							</div>
							
                        
                        
                                        
        
                        
                       
                        
                        
                        <div class="form-group" align = "right">
                            <div class="col-sm-offset-2 col-sm-10">
                                
                                <button type="Submit" class="btn btn-success">
                                    
                                    Done
                                </button>
                            
                                
                            </div>
                        </div>
						</div>
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

<!--footer end here-->	

   </body>
	
	</html>