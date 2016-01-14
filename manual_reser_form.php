<?php
include "function.php";
/*
if (isset($_GET['room_id'])){
	
	$Room_id = $_GET['room_id'];
        
	$log = new dbHotel();
	
	$room_data = $log->return_room($Room_id);
        $Hotel_id = $_SESSION['hotel_id'];
        $log=new dbHotel();
        $data = $log->get_hotel_data($_SESSION['hotel_id']);
        $name = $data['Hotel_Name'];
        $checkin = $_GET['check_in'];
        $checkout = $_GET['check_out'];
}
*/
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $log = new dbHotel();
    $hotel_id = $_SESSION['hotel_id'];
    $rooms = $_POST['room'];
    $Room_id = 'Multiple';
    $room_data = array('Room_name' => 'Multiple Rooms');
    $data = $log->get_hotel_data($_SESSION['hotel_id']);
    $name = $data['Hotel_Name'];
    $checkin = $_POST['check_in'];
    $checkout = $_POST['check_out'];
    $_SESSION['fdata_rooms']= $rooms;
    
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Manual Reservation</title>

    <!-- Bootstrap and other relevant libraries are including-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>  
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>
   




   </head>

    <body background="">
	<!-- Navigation bar which is in the top of the page -->
<!-- navbar -->
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

<nav class="navbar navbar-default responsive">
    <div class="container-fluid">
          <div class="navbar-header">
              <ul class="nav navbar-nav navbar-left">
                
                <li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li>
          </ul>
          <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
          </div>
    <div>
                <ul class="nav nav-pills navbar-right">
                  <li><a href="manual_reserve.php"><span class="glyphicon glyphicon-arrow-left"><b>
                    <font size="4" color="#FFF" face="calibri light"> Back</font>
                        </b></a></li>
                <li><a href=<?php echo "Hotel-profile.php?hotel_id=".$_SESSION['hotel_id'].""?>><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></span></a></li>
              <li><a href="hotel_logout.php"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#FFF" face="calibri light">Logout</font></b></a></li></ul>
          
    </div>
    </div>
</nav>
        
			<div class="panel panel-primary"
                <div class="panel-heading">
                                <h3 class="text-center"><?php echo "Hotel name: ".$data['Hotel_Name'] ."<br>"."Room name: ". $room_data['Room_name']?></h3>  
		</div>
			</div>
			<br>
                    <!--Entering in to the container class -->    
            <div class="container">
                
			
			<div class="row">
                         <div class="col-md-2">
                          </div>
			<div class="col-md-10">
                    <!--  Create the form horizontally !-->
                    <br><br>

                    <!-- Creating a form and use the form action to the manresact.php -->
                    <form class="form-horizontal col-md-8" data-toggle="validator" role="form" align = "center" action="manresact.php" method="post" id="contactForm" >
					   <legend>Reservation Details</legend>
                        <div class="jumbotron">
                        <div class="form-group" align = "center">
                            <label for="finame" class="col-md-4 control-label" >
				First Name:
       			    </label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Kamal" class="form-control" name="fname" required />
                            </div>
			</div>

			<div class="form-group" align = "center">
                            <label for="laname" class="col-md-4 control-label" >
				Last Name:
                            </label>
                        <div class="col-md-8">
                            <input type="text" placeholder="Abeywardene" class="form-control" name="lname" required />
                        </div>
                        </div>			
				<div class="form-group" align = "center">
						
						</div>		
						<div class="form-group" align = "center">
							<label for="add" class="col-md-4 control-label" >Address:</label>
                                        <div class="col-md-8">
                                <textarea class="form-control" placeholder="No:107, Naotunna Rd, Kottagoda" rows="5"  name="address" required /></textarea>
							</div>
						</div>

						<div class="form-group" align = "center">
							<label for="country" class="col-md-4 control-label" >
								Country:
							</label>
                                                    <div class="form-group col-md-5">
                                
								<select name="Country">
                                                                    
									<option value="AF">Afghanistan</option>
                                                                        <option value="AX">Åland Islands</option>
                                                                        <option value="AL">Albania</option>
                                                                        <option value="DZ">Algeria</option>
                                                                        <option value="AS">American Samoa</option>
                                                                        <option value="AD">Andorra</option>
                                                                        <option value="AO">Angola</option>
                                                                        <option value="AI">Anguilla</option>
                                                                        <option value="AQ">Antarctica</option>
                                                                        <option value="AG">Antigua and Barbuda</option>
                                                                        <option value="AR">Argentina</option>
                                                                        <option value="AM">Armenia</option>
                                                                        <option value="AW">Aruba</option>
                                                                        <option value="AU">Australia</option>
                                                                        <option value="AT">Austria</option>
                                                                        
                                                                        <option value="BR">Brazil</option>

                                                                        <option value="BN">Brunei Darussalam</option>
                                                                        <option value="BG">Bulgaria</option>
                                                                        <option value="BF">Burkina Faso</option>
                                                                        <option value="BI">Burundi</option>
                                                                        <option value="KH">Cambodia</option>
                                                                        <option value="CM">Cameroon</option>
                                                                        <option value="CA">Canada</option>
                                                                        <option value="CV">Cape Verde</option>
                                                                        <option value="KY">Cayman Islands</option>
                                                                        <option value="CF">Central African Republic</option>
                                                                        <option value="TD">Chad</option>
                                                                        <option value="CL">Chile</option>
                                                                        <option value="CN">China</option>
                                                                        <option value="CX">Christmas Island</option>
                                                                        <option value="CC">Cocos (Keeling) Islands</option>
                                                                        <option value="CO">Colombia</option>
                                                                        <option value="KM">Comoros</option>
                                                                        <option value="CG">Congo</option>

                                                                      
                                                                        <option value="GL">Greenland</option>
                                                                        <option value="GD">Grenada</option>
                                                                        <option value="GP">Guadeloupe</option>
                                                                        <option value="GU">Guam</option>
                                                                        <option value="GT">Guatemala</option>
                                                                        <option value="GG">Guernsey</option>
                                                                        <option value="GN">Guinea</option>
                                                                        <option value="GW">Guinea-bissau</option>
                                                                        <option value="GY">Guyana</option>
                                                                        <option value="HT">Haiti</option>

                                                                        <option value="VA">Holy See (Vatican City State)</option>
                                                                        <option value="HN">Honduras</option>
                                                                        <option value="HK">Hong Kong</option>
                                                                        <option value="HU">Hungary</option>
                                                                        <option value="IS">Iceland</option>
                                                                        <option value="IN">India</option>
                                                                        <option value="ID">Indonesia</option>
                                                                        <option value="IR">Iran, Islamic Republic of</option>
                                                                        <option value="IQ">Iraq</option>
                                                                        <option value="IE">Ireland</option>
                                                                        <option value="IM">Isle of Man</option>
                                                                        <option value="IL">Israel</option>
                                                                        <option value="IT">Italy</option>
                                                                        <option value="JM">Jamaica</option>
                                                                        <option value="JP">Japan</option>
                                                                        <option value="JE">Jersey</option>
                                                                        <option value="JO">Jordan</option>
                                                                        <option value="KZ">Kazakhstan</option>
                                                                        <option value="KE">Kenya</option>
                                                                        <option value="KI">Kiribati</option>

                                                                        <option value="KR">Korea, Republic of</option>
                                                                        <option value="KW">Kuwait</option>
                                                                        <option value="KG">Kyrgyzstan</option>
                                                                        <option value="LA">Lao People's Democratic Republic</option>
                                                                        <option value="LV">Latvia</option>
                                                                        <option value="LB">Lebanon</option>
                                                                        <option value="LS">Lesotho</option>
                                                                        <option value="LR">Liberia</option>
                                                                        <option value="LY">Libyan Arab Jamahiriya</option>
                                                                        <option value="LI">Liechtenstein</option>
                                                                        <option value="LT">Lithuania</option>
                                                                        <option value="LU">Luxembourg</option>
                                                                        <option value="MO">Macao</option>

                                                                        <option value="MG">Madagascar</option>
                                                                        <option value="MW">Malawi</option>
                                                                        <option value="MY">Malaysia</option>
                                                                        <option value="MV">Maldives</option>
                                                                        <option value="ML">Mali</option>
                                                                        <option value="MT">Malta</option>
                                                                        <option value="MH">Marshall Islands</option>
                                                                        <option value="MQ">Martinique</option>
                                                                        <option value="MR">Mauritania</option>
                                                                        <option value="MU">Mauritius</option>
                                                                        <option value="YT">Mayotte</option>
                                                                        <option value="MX">Mexico</option>
                                                                       
                                                                        <option value="NF">Norfolk Island</option>
                                                                        <option value="MP">Northern Mariana Islands</option>
                                                                        <option value="NO">Norway</option>
                                                                        <option value="OM">Oman</option>
                                                                        <option value="PK">Pakistan</option>
                                                                        <option value="PW">Palau</option>
                                                                        <option value="PS">Palestinian Territory, Occupied</option>
                                                                        <option value="PA">Panama</option>
                                                                        <option value="PG">Papua New Guinea</option>
                                                                        <option value="PY">Paraguay</option>
                                                                        <option value="PE">Peru</option>
                                                                        <option value="PH">Philippines</option>
                                                                        <option value="PN">Pitcairn</option>
                                                                        <option value="PL">Poland</option>
                                                                        <option value="PT">Portugal</option>
                                                                        <option value="PR">Puerto Rico</option>
                                                                        <option value="QA">Qatar</option>
                                                                        <option value="RE">Reunion</option>
                                                                        <option value="RO">Romania</option>
                                                                        <option value="RU">Russian Federation</option>
                                                                        <option value="RW">Rwanda</option>
                                                                        <option value="SH">Saint Helena</option>
                                                                        <option value="KN">Saint Kitts and Nevis</option>
                                                                        <option value="LC">Saint Lucia</option>
                                                                        <option value="PM">Saint Pierre and Miquelon</option>
                                                                        <option value="VC">Saint Vincent and The Grenadines</option>
                                                                        <option value="WS">Samoa</option>
                                                                        <option value="SM">San Marino</option>
                                                                        <option value="ST">Sao Tome and Principe</option>
                                                                        <option value="SA">Saudi Arabia</option>
                                                                        <option value="SN">Senegal</option>
                                                                        <option value="RS">Serbia</option>
                                                                        <option value="SC">Seychelles</option>
                                                                        <option value="SL">Sierra Leone</option>
                                                                        <option value="SG">Singapore</option>
                                                                        <option value="SK">Slovakia</option>
                                                                        <option value="SI">Slovenia</option>
                                                                        <option value="SB">Solomon Islands</option>
                                                                        <option value="SO">Somalia</option>
                                                                        <option value="ZA">South Africa</option>

                                                                        <option value="ES">Spain</option>
                                                                        <option value="LK">Sri Lanka</option>
                                                                        <option value="SD">Sudan</option>
                                                                        <option value="SR">Suriname</option>
                                                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                                                        <option value="SZ">Swaziland</option>
                                                                        
                                                                        <option value="TR">Turkey</option>
                                                                        <option value="TM">Turkmenistan</option>
                                                                        <option value="TC">Turks and Caicos Islands</option>
                                                                        <option value="TV">Tuvalu</option>
                                                                        <option value="UG">Uganda</option>
                                                                        <option value="UA">Ukraine</option>
                                                                        <option value="AE">United Arab Emirates</option>
                                                                        <option value="GB">United Kingdom</option>
                                                                        <option value="US">United States</option>
                                                                        <option value="UY">Uruguay</option>
                                                                        <option value="UZ">Uzbekistan</option>
                                                                        <option value="VU">Vanuatu</option>
                                                                        <option value="VE">Venezuela</option>
                                                                        <option value="VN">Vietnam</option>
                                                                        <option value="VG">Virgin Islands, British</option>
                                                                        <option value="VI">Virgin Islands, U.S.</option>
                                                                        <option value="WF">Wallis and Futuna</option>
                                                                        <option value="EH">Western Sahara</option>
                                                                        <option value="YE">Yemen</option>
                                                                        <option value="ZM">Zambia</option>
                                                                        <option value="ZW">Zimbabwe</option>

								</select>
							</div>
						</div>
                                                
                                                <div class="form-group">
                                                    <label for="inputEmail" class="col-md-4 control-label" align = "right"> 
                                                        <font color=" #000">Email</font>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input type="email" class="form-control" id="inputEmail3" placeholder="abc@xyz.com" name = "email" required />
                                                    </div>
                                                </div>
                                                
						<div class="form-group" align = "center">
							<label for="number" class="col-md-4 control-label" >Contact Number:</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="cnumber" type="tel" pattern="^[\s()+-]*([0-9][\s()+-]*){6,20}$" placeholder="+94719783950" >
						
                                                </div>
						</div>
                                                
                                                

						
						<div class="form-group">
							<input type="hidden" value="<?php echo $Room_id;?>" name="room_id">
							<input type="hidden" value="<?php echo $hotel_id;?>" name="hotel_id">
                                                        <input type="hidden" value="<?php echo $checkin;?>" name="checkin">
                                                        <input type="hidden" value="<?php echo $checkout;?>" name="checkout">
						</div>
						
						
                                                <div class="form-group">
                                                    <div class="col-md-9 col-md-offset-3">
                                                        <div id="messages"></div>
                                                    </div>
                                                </div>
						 <div class="col-sm-offset-8 col-sm-3">
						<button type="submit" class="btn btn-success btn-lg" >Continue</button>
                                                 </div>
                                           </div>
                                                </form>	
                        </div>  </div></div>
					
     <!-- Including ajax validation steps -->                   
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
                    fname: {
                        validators: {
                            notEmpty: { 
                                message: 'The first name cannot be empty'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z]+$/,
                                message: 'The first name can only consist of alphabetic values'
                            }
                        }
                    },
                    lname: {
                        validators: {
                            notEmpty: {
                                message: 'The last name cannot be empty'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z]+$/,
                                message: 'The last name can only consist of alphabetic values'
                            }
                        }
                    },
                    address: {
                        validators: {
                            notEmpty: {
                                message: 'The address cannot be empty'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.,' ']+$/,
                                message: 'The address can only consist of alphabetical, number and underscore'
                            }
                        }
                    },
                    cnumber: {
                        validators: {
                            notEmpty: { 
                                message: 'The number cannot be empty'
                            }
                        }
                    }




                }
            });
        });
        </script>
        </div>
    </div>		
</div>
</body>
</html>
                        