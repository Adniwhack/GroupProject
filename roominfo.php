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

    echo $str;
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
        $GndFlr = $_POST["gndflr"];
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
        
        
        $RoomOptionsMain = array();
        if($Room_AC == "A"){
            array_push($RoomOptionsMain, "A/C");
            $Room_weight += 1;
        }

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

        $log->hotel_create_room($Hotel_email, $Room_Name, "0", $Room_Type, $Room_photo, $Room_Desc, $target, $Room_Cost,  $Room_weight, 0, $Seaview, $MTnView, $GndFlr, $single, $double, $triple, $Room_AC);
         $extarray = array("jpeg","jpg","png","gif");
        $filepath = 'images/'.$Hotel_ID.'/'.$Room_Name;
        mkdir($filepath);
        
        foreach ($_FILES['Room_photo']['tmp_name'] as $key=>$tmp_name){
            $Room_photo = $_FILES['Room_photo']['name'][$key];
             //echo $Room_photo;
            $Photo = $_FILES['Room_photo']['tmp_name'][$key];
            $ext = pathinfo($Room_photo, PATHINFO_EXTENSION);
            if(in_array($ext, $extarray)){
                
                $target = $filepath."/".$file_name;
                //$target = $target.basename($file_tmp = $_FILES['Room_photo']['tmp_name'][$key]);
                
                move_uploaded_file($_FILES['Room_photo']['tmp_name'][$key], $target);
                $que = "";
                $res = mysql_query();
                
                }
            
            
            
        }
        
       

            
        header("Location:Hotel-profile.php?hotel_id=".$Hotel_ID."");
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
        .ui-autocomplete {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            float: left;
            display: none;
            min-width: 160px;
            _width: 160px;
            padding: 4px 0;
            margin: 2px 0 0 0;
            list-style: none;
            background-color: #ffffff;
            border-color: #ccc;
            border-color: rgba(0, 0, 0, 0.2);
            border-style: solid;
            border-width: 1px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -webkit-background-clip: padding-box;
            -moz-background-clip: padding;
            background-clip: padding-box;
            *border-right-width: 2px;
            *border-bottom-width: 2px;

        .ui-menu-item > a.ui-corner-all {
            display: block;
            padding: 3px 15px;
            clear: both;
            font-weight: normal;
            line-height: 18px;
            color: #555555;
            white-space: nowrap;

        &.ui-state-hover, &.ui-state-active {
                               color: #ffffff;
                               text-decoration: none;
                               background-color: #0088cc;
                               border-radius: 0px;
                               -webkit-border-radius: 0px;
                               -moz-border-radius: 0px;
                               background-image: none;
                           }
        }
        }
</style>

    <script>
        $(function() {
            var availableTags = [
                <?php
                echo $str;

                ?>
            ];
            function split( val ) {
                return val.split( /,\s*/ );
            }
            function extractLast( term ) {
                return split( term ).pop();
            }

            $( "#options" )
                // don't navigate away from the field on tab when selecting an item
                .bind( "keydown", function( event ) {
                    if ( event.keyCode === $.ui.keyCode.TAB &&
                        $( this ).autocomplete( "instance" ).menu.active ) {
                        event.preventDefault();
                    }
                })
                .autocomplete({
                    minLength: 0,
                    source: function( request, response ) {
                        // delegate back to autocomplete, but extract the last term
                        response( $.ui.autocomplete.filter(
                            availableTags, extractLast( request.term ) ) );
                    },
                    focus: function() {
                        // prevent value inserted on focus
                        return false;
                    },
                    select: function( event, ui ) {
                        var terms = split( this.value );
                        // remove the current input
                        terms.pop();
                        // add the selected item
                        terms.push( ui.item.value );
                        // add placeholder to get the comma-and-space at the end
                        terms.push( "" );
                        this.value = terms.join( ", " );
                        return false;
                    }
                });
        });
    </script>
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
	
    <form name = "Room_create" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  enctype="multipart/form-data" />
        <legend><h2 align="center">Create New Room</h2></legend>
        <div class="form-group">
            <label for="Room_Name" id="Room_Name" >Room Name</label>
            <input type="text" id = "Room_Name" name="Room_Name">
        </div>
        <div class="form-group">
            <label for="Room_Type" id="Room_Type">Room Type</label>
            <select name="Room_Type">
                <option >Single</option>
                <option >Double</option>
                <option >Triple</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Room_Cost" id="Room_Cost">Cost per stay</label>
            <input type="text" id="Room_Cost" name="Room_Cost">
        </div>
        <div class="form-group">
            <label for="Room_Description" id="Room_Description">Room Description</label>
            <textarea name="Room_Description" rows="5" cols="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label><input type="radio" name="Room_AC" value=1>Air Conditioning available</label><br>
            <label><input type="radio" name="Room_AC" value = 0>Air Conditioning not available</label>
        </div>
        <div class="form_group">
            <label for="basic_options">Basic Options</label><br>
            <label><input type="radio" name="view" value="SeaView">Sea view &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <label><input type="checkbox" name="gndflr" value = 1>Ground Floor</label><br>
            <label><input type="radio" name="view" value = "Mountain">Mountain view</label><br>
            <label><input type="radio" name="view" value = "N/A">Not Applicable</label><br>
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
            <label for="Room_photo" id="Room_photo">Room Photo</label>

            <input type="file" name="Room_photo[]" id="Room_photo" accept="image/*" multiple/>
                </div>
        
        <button type="submit" class="btn btn-default" value="submit" >Submit</button>
        </div>
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


