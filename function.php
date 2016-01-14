<?php
	require_once 'server_access.php';
        error_reporting(E_ALL ^ E_DEPRECATED);
    function test_input($data) {

        //$data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}

	session_start();


		class dbFunction {
			function __construct(){
				$db = new dbConnect();
			}
			function __destruct(){}

			public function admin_log($username,$password){
				//$password = password_hash($password, PASSWORD_BCRYPT);

				$QUE = "SELECT * FROM admin WHERE email= '".$username."' ";
				//echo $QUE;

				$res = mysql_query($QUE) ; // NEED TO FILL ACCORDING TO TABLE
				$admin_data =mysql_fetch_array($res);

				$no_rows = mysql_num_rows($res);

				//echo $no_rows;
				if ($no_rows==1 ){
					//echo  $admin_data['password'];
					$hash = $admin_data['password'];
					echo $hash;
					if(password_verify($password, $hash )){
					$_SESSION['admin_login'] = true;
					$_SESSION['admin_username'] = $admin_data['email'];


					return TRUE;
				}
				}
				else{
					return FALSE;
				}
			}
			public function create_admin( $email,$password){
				// This is a temporary function, && will be deleted once admins are made
				if ($_SESSION['admin_login'] == TRUE){

					$password = password_hash($password, PASSWORD_BCRYPT);
					$res = mysql_query("INSERT INTO admin(email, password) values ('".$email."','".$password."');") or die(mysql_error());;
					return $res;
				}
			}
			public function create_hotel($description, $email, $password, $address, $city, $contact, $hotel_name){

				$password = password_hash($password, PASSWORD_BCRYPT);
				$Hotel_ID = md5($hotel_name);
                    $resx = $this->check_hotel($email);
                    if ($resx != false) {
						$que = "INSERT INTO hotel(Hotel_Description, email, password, address, telephone_number, City,  Hotel_ID, Hotel_Name) values ('" . $description . "','" . $email . "','" . $password . "','" . $address . "','" . $contact . "','" . $city . "','" . $Hotel_ID . "','" . $hotel_name . "');";
						echo $que;
                        $res = mysql_query($que) or die(mysql_error());;
                        echo "<script>alert('You have been inserted into system.')</script>";
                        return $res;
                    }
                    else{
                        echo "<script>alert('Email already taken')</script>";
						return null;
                    }
				}
                          
			public function create_custom_user($FirstName, $Lastname,$Address, $Contact, $Country){
				$ID = md5($FirstName . $Lastname);
				$QUE = "INSERT INTO customer(Customer_ID, Customer_address, Customer_FirstName, Customer_Contact, Customer_LastName, Customer_Country) VALUES ('".$ID."', '".$Address."','".$FirstName."', '".$Contact."', '".$Lastname."', '".$Country."')";
				$RES = mysql_query($QUE);
				return $ID;
			}
			public function create_reg_user($FirstName, $Lastname,$Address, $Contact, $Country, $email, $password, $username, $gender, $dob){
				$ID = md5($FirstName . $Lastname);
				$password_hashed = password_hash($password, PASSWORD_BCRYPT);
				$QUE = "INSERT INTO customer(Customer_ID, Customer_address, Customer_FirstName, Customer_Contact, Customer_LastName, Customer_Country) VALUES ('".$ID."', '".$Address."','".$FirstName."', '".$Contact."', '".$Lastname."', '".$Country."')";
				echo $QUE;
				$RES = mysql_query($QUE);
				$QUE = "INSERT INTO registered_customer(Customer_ID, Customer_email, Customer_password, Customer_username, Gender, Customer_DOB) VALUES ('".$ID."','".$email."','".$password_hashed."', '".$username."', '".$gender."', '".$dob."')";
				echo $QUE;
				$RES = mysql_query($QUE);
				/*$password_hashed = password_hash($password, PASSWORD_BCRYPT);
				$email_hashed = md5($email);
				$res1 = mysql_query("INSERT INTO customer(Customer_ID, Customer_Name, Customer_address) VALUES ('".$email_hashed."','".$Name."','".$address."')");
				$res2 = mysql_query("INSERT INTO registered_customer(Customer_ID, Customer_email, Customer_password, Customer_username) VALUES ('".$email_hashed."','".$email."','".$password_hashed."', '".$username."','".$gender."','".$DOB."')");
                return $res2;
				*/

				return $RES;

			}
            
            

            public function admin_forget_password($admin_email, $admin_Password){
                            $new_pass = password_hash($admin_Password, PASSWORD_BCRYPT);
                            $query = "UPDATE admin SET password = '$new_pass' WHERE email = '$admin_email'";
                            $res = mysql_query($query);
                            
                        }

			public function hotel_login($email, $password){
				$QUE = "SELECT * FROM hotel WHERE email = '".$email."'" ;
				//echo $QUE;

				$res = mysql_query($QUE) ; // NEED TO FILL ACCORDING TO TABLE
				$hotel_data =mysql_fetch_array($res);

				$no_rows = mysql_num_rows($res);

				//echo $no_rows;
				if ($no_rows==1 ){
					//echo  $admin_data['password'];
					$hash = $hotel_data['password'];

					if(password_verify($password, $hash )){
						$_SESSION['hotel_login'] = true;
						$_SESSION['hotel'] = $hotel_data['Hotel_Name'];
						$_SESSION['hotel_id'] =$hotel_data['Hotel_ID'];
						$_SESSION['hotel_email'] = $hotel_data['email'];
					echo "<script>alert('You have been logged in')</script>";
					return TRUE;
				}
				}
				else{
					return FALSE;
				}
			}

			public function customer_login($username, $password){
				$QUE = "SELECT * FROM registered_customer WHERE Customer_email = '".$username."' ";
				//echo $QUE;

				$res = mysql_query($QUE) ; // NEED TO FILL ACCORDING TO TABLE
				$customer_data =mysql_fetch_array($res);

				$no_rows = mysql_num_rows($res);

				//echo $no_rows;
				if ($no_rows==1 ){
					//echo  $admin_data['password'];
					$hash = $customer_data['Customer_password'];

					if(password_verify($password, $hash )){
					$_SESSION['customer_login'] = true;
					$_SESSION['customer_username'] = $customer_data['Customer_username'];
                                        $_SESSION['customer_ID'] = $customer_data['Customer_ID'];

					return TRUE;
				}
				}
				else{
					return FALSE;
				}
			}

                        public function hotel_forget_password($Hotel_email, $Hotel_Password){
                            $new_pass = password_hash($Hotel_Password, PASSWORD_BCRYPT);
                            $query = "UPDATE hotel SET password = '$new_pass' WHERE email = '$Hotel_email'";
                            $res = mysql_query($query);
                            
                        }

			public function user_logout(){
				session_destroy();
				header('home.php');
				exit();

			}

			public function check_admin($email){


			}

			public function check_hotel($hotel_email){
                $res = mysql_query("SELECT email FROM hotel WHERE email = '".$hotel_email."'");
                $no_rows = mysql_num_rows($res);
                if($no_rows == 0){
                    return true;
                }
                else{return false;}

			}

			public function check_customer($customer_username){
                $res = mysql_query("Select Customer_ID from registered_customer WHERE Customer_username='".$customer_username."'");
                $no_rows = mysql_num_rows($res);
                if ($no_rows == 1){
                    $rdata = mysql_fetch_array($res);
                    $id = $rdata['Customer_ID'];
                    return $id;
                }
                else{
                    return false;
                }
			}



		}


		class dbSearch{
			function __construct(){
				$db = new dbConnect();;
			}
			function __destruct(){}

			public function return_hotel(){
				$QUE = "SELECT * FROM hotel";
				$RES = mysql_query($QUE);
				return $RES;

			}

			public function search_hotel_city($City){
				$QUE = "SELECT * FROM hotel where City = '".$City."'";
				$RES = mysql_query($QUE);
				return $RES;
			}

			public function search_hotel_less_price($Cost){
				$QUE = "SELECT email, Hotel_Name, City FROM hotel INNER JOIN hotel_room on hotel.email = hotel_room.Hotel_email where Cost_per_unit <= '".$Cost."'";
				$RES = mysql_query($QUE);
				return $RES;
			}

			public function	search_hotel_name($Hotel_Name){
				$QUE = "Select * From hotel where Hotel_Name LIKE '".$Hotel_Name."' ";
				$Res = mysql_query($QUE);
				return $Res;
			}

			public function search_hotel_city_name($City, $Name){
				$QUE = "Select * FROM hotel where Hotel_Name LIKE '%".$Name."%', City = ".$City."";
			}
                        
                        
                        

            public function return_room($Hotel_email){
                $QUE = "SELECT * FROM hotel_room WHERE hotel_email='".$Hotel_email."'";
                $res = mysql_query($QUE);
                return $res;
            }

			public function return_sorted_room($Hotel_email){
				$QUE = "SELECT * FROM hotel_room WHERE hotel_email='".$Hotel_email."' order by Room_weight DESC";
				$res = mysql_query($QUE);
				return $res;
			}

			public function return_unreserved_room($hotel_email, $Check_in, $Check_out){
				//Return unreserved rooms
                            $QUE = "SELECT * FROM hotel_room WHERE Hotel_email='".$hotel_email."' AND Room_Name NOT IN (SELECT Room_name FROM hotel_room INNER JOIN reservation ON hotel_room.Room_id = reservation.RoomID WHERE ((reservation.Checkin = '".$Check_in."' and reservation.Checkout = '".$Check_out."') or (reservation.Checkin >= '".$Check_in."' and reservation.Checkin <= '".$Check_out."') or (reservation.Checkout >= '".$Check_in."' and reservation.Checkout <= '".$Check_out."') or (reservation.Checkin <= '".$Check_in."' and reservation.Checkout >= '".$Check_out."')))";
                            //echo $QUE;
                            $res = mysql_query($QUE);
                            return $res;
			}

			public function return_room_options($Room_ID){
				$Res = mysql_Query("Select Room_Option from room_options where Room_ID='".$Room_ID."'");
				return $Res;
			}

			public function simple_search($Price, $City, $Option, $Name){

				$Optionc = "";
				$Namec = "";

				if ($Option == "SeaView"){

				}
                elseif($Option == "MountainView"){

                }
                else{

                }

				if ($Name != null){
					$Namec = ", hotel.Hotel_Name = '".$Name."'";

				}

				$QUE = "SELECT hotel.email, hotel.Hotel_Name, hotel.City, hotel.address from hotel inner join hotel_room on hotel.email = hotel_room.Hotel_email WHERE hotel.City='".$City."', hotel_room.Cost_per_unit < ".$Price."  ".$Optionc." ".$Namec." ";

			}


			/**
			 * @param $Price
			 * @param $City
			 * @param $Options
			 * @param $Seaview
			 * @param $MtnView
			 * @param $GndFlr
             * @return null|resource
             */         
                        function unreserved_room($Room_name, $Check_in , $Check_out, $hotel_email){
                        //$QUE = "Select * FROM hotel_room inner join reservation on hotel_room.Room_id= reservation.RoomID where hotel_room.Room_id = '$Room_id' and ('$Check_out'>=Checkin>= '$Check_in') or ('$Check_out'<=Checkout<= '$Check_in') or (Checkin >= '$Check_in' and Checkout <= '$Check_out') and hotel_room.Hotel_email = '$hotel_email'";
                            $sql = "SELECT * FROM hotel_room WHERE Room_name = '".$Room_name."' AND Hotel_email='".$hotel_email."' AND Room_Name NOT IN (SELECT Room_name FROM hotel_room INNER JOIN reservation ON hotel_room.Room_id = reservation.RoomID WHERE ((reservation.Checkin = '".$Check_in."' and reservation.Checkout = '".$Check_out."') or (reservation.Checkin >= '".$Check_in."' and reservation.Checkin <= '".$Check_out."') or (reservation.Checkout >= '".$Check_in."' and reservation.Checkout <= '".$Check_out."') or (reservation.Checkin <= '".$Check_in."' and reservation.Checkout >= '".$Check_out."')))";    
                            //$QUE = "Select * FROM hotel_room inner join reservation on hotel_room.Room_id= create_new_reservation.RoomID where hotel_room.Room_id = '$Room_id' and NOT((Checkin<= '$Check_in' and Checkout >= '$Check_out') or (Checkin <='$Check_out' and Checkout >= '$Check_out') or (Checkin >= '$Check_in' and Checkout <= '$Check_out')or (Checkin >= '$Check_in' and Checkout >= '$Check_out')) and hotel_room.Hotel_email = '$hotel_email'";
                            //echo $sql;
                            $res = mysql_query($sql);
                            $count = mysql_num_rows($res);
                            //echo $count;
                            if($count == 0){
                                //echo "We don't have rooms in selected dates";
                                return $res;
                            }
                            
                            else{
                                return $res;
                            }
                        }
			public function adv_search($hotel_name="",  $city="", $checkin="", $checkout="",$seaview="0", $MtnView="0", $GndFlr="0", $AC="0", $single="0", $double="0", $triple="0", $wifi="0", $pool="0", $parking="0"){
                            $ConditionArray =  array();
                            $features = 0;
                            $que = "";
                            $qarray = array();
                            $res = NULL;
                            
                            if ($hotel_name != ''){ $ConditionArray[] = "hotel.Hotel_Name LIKE '%$hotel_name%'";}
                            if ($city != '') {$ConditionArray[] = "hotel.City = '$city'";}
				
                            if ($checkin != '' && $checkout != ''){
                                if ($checkin < $checkout){
                                    $ConditionArray[] = "Room_id NOT IN (SELECT Room_id FROM hotel_room INNER JOIN reservation ON hotel_room.Room_id = reservation.RoomID WHERE (reservation.Checkin > $checkin and reservation.Checkout < $checkout) or (reservation.Checkin < $checkin and reservation.Checkout > $checkin) or (reservation.Checkin < $checkout and reservation.Checkout > $checkout))";
                                    
                                    
                                }
                            }
                            
                                if ($seaview == "1"){$ConditionArray[] = "SeaView = '1'";$features += 1;}
                                if ($MtnView =="1"){$ConditionArray[] = "MountainView = '1'";$features += 1;}
                                if ($AC == "1"){$ConditionArray[] = "Room_AC = '1'";$features += 1;}
                                if ($GndFlr == "1"){$ConditionArray[] = "GroundFloor = '1'";$features += 1;}
                                
                                    if ($single == "1"){$ConditionArray[] = "SingleBed = '1'";$features += 1;}
                                    if ($double == "1"){$ConditionArray[] = "DoubleBed= '1'";$features += 1;}
                                    if ($triple == "1"){$ConditionArray[] = "TripleBed = '1'";$features += 1;}
                               
                                if ($wifi == "1"){$ConditionArray[] = "wifi = '1'";$features += 1;}
                                if ($parking == "1"){$ConditionArray[] = "parking = '1'";$features += 1;}
                                if ($pool == "1"){$ConditionArray[] = "pool = '1'";$features += 1;}
                                //echo $features;
                                
                                $c = count($ConditionArray);
                                
                                if ($features <= 7){
                                        $que = "SELECT DISTINCT Hotel_ID, Hotel_Name, address, Hotel_Lat, Hotel_Lng, Num_features  FROM sevenfeatrooms INNER JOIN hotel on hotel.email = sevenfeatrooms.Hotel_email WHERE ".implode(' AND ', $ConditionArray);
                                        $qarray[] = $que;
                                        
                                }
                                if ($features <= 6){
                                        $que = "SELECT DISTINCT Hotel_ID, Hotel_Name, address, Hotel_Lat, Hotel_Lng , Num_features FROM sixfeatrooms INNER JOIN hotel on hotel.email = sixfeatrooms.Hotel_email WHERE ".implode(' AND ', $ConditionArray);
                                        $qarray[] = $que;
                                        }
                                if ($features <= 5){
                                        $que = "SELECT DISTINCT Hotel_ID, Hotel_Name, address, Hotel_Lat, Hotel_Lng, Num_features FROM fivefeatrooms INNER JOIN hotel on hotel.email = fivefeatrooms.Hotel_email WHERE ".implode(' AND ', $ConditionArray);
                                        $qarray[] = $que;
                                        }
                                if ($features <= 4){
                                        $que = "SELECT DISTINCT Hotel_ID, Hotel_Name, address, Hotel_Lat, Hotel_Lng , Num_features FROM fourfeatrooms INNER JOIN hotel on hotel.email = fourfeatrooms.Hotel_email WHERE ".implode(' AND ', $ConditionArray);
                                        $qarray[] = $que;
                                        }
                                if ($features <= 3){
                                        $que = "SELECT DISTINCT Hotel_ID, Hotel_Name, address, Hotel_Lat, Hotel_Lng, Num_features FROM threefeatrooms INNER JOIN hotel on hotel.email = threefeatrooms.Hotel_email WHERE ".implode(' AND ', $ConditionArray);
                                        $qarray[] = $que;
                                        }    
                                if ($features <= 2){
                                        $que = "SELECT DISTINCT Hotel_ID, Hotel_Name, address, Hotel_Lat, Hotel_Lng, Num_features FROM twofeatrooms INNER JOIN hotel on hotel.email = twofeatrooms.Hotel_email WHERE ".implode(' AND ', $ConditionArray);
                                        $qarray[] = $que;
                                        }
                                        
                                if ($features <= 1){
                                        $que = "SELECT DISTINCT Hotel_ID, Hotel_Name, address, Hotel_Lat, Hotel_Lng, Num_features FROM onefeatrooms INNER JOIN hotel on hotel.email = onefeatrooms.Hotel_email WHERE ".implode(' AND ', $ConditionArray);
                                        $qarray[] = $que;
                                        }
                                else{
                                        if ($features== 0){
                                            $que = "SELECT DISTINCT Hotel_ID, Hotel_Name, address, Hotel_Lat, Hotel_Lng , Num_features FROM hotel_room INNER JOIN hotel on hotel.email = hotel_room.Hotel_email WHERE ".implode(' AND ', $ConditionArray);
                                            $qarray[] = $que;
                                            
                                        
                                        }
                                }
                                        
                                
                                $big_query = implode(" UNION ", $qarray) . " ORDER BY Num_features LIMIT 100";
                                if ($c == 0){
                                    $big_query = "SELECT DISTINCT Hotel_ID, Hotel_Name, address, Hotel_Lat, Hotel_Lng FROM hotel";
                                }
                                else{
                                    $big_query = "SELECT Hotel_ID, Hotel_Name, address, Hotel_Lat, Hotel_Lng FROM ($big_query) AS T3 GROUP BY Hotel_ID";
                                }
                                
                                //echo $big_query;
                                $res = mysql_query($big_query);
                                return $res;
                                    
                                
                                
                                
                                
                                
                                
			}
			function advanced_search($hotel_name="", $city="", $options="", $checkin="", $checkout="", $seaview="0", $mtnview="0", $AC="0", $GndFlr="0", $type=""){
                                
				$ConditionArray = array();
				if ($hotel_name != '') $ConditionArray[] = "hotel.Hotel_Name LIKE '%$hotel_name%'";
				if ($city != '') $ConditionArray[] = "hotel.City = '$city'";
				
				if ($checkin != '' && $checkout != ''){
                                    if ($checkin < $checkout){
                                        $ConditionArray[] = "hotel_room.Room_id NOT IN (SELECT Room_id FROM hotel_room INNER JOIN reservation ON hotel_room.Room_id = reservation.RoomID WHERE (reservation.Checkin > $checkin and reservation.Checkout < $checkout) or (reservation.Checkin < $checkin and reservation.Checkout > $checkin) or (reservation.Checkin < $checkout and reservation.Checkout > $checkout))";
                                    }
                                } //code checkin and checkout
                                if ($seaview == "1"){$ConditionArray[] = "SeaView = '1'";}
                                if ($mtnview =="1"){$ConditionArray[] = "MountainView = '1'";}
                                if ($AC == "1"){$ConditionArray[] = "Room_AC = '1'";}
                                if ($GndFlr == "1"){$ConditionArray[] = "GroundFloor = '1'";}
                                if ($type != ""){
                                    if ($type == "Single"){$ConditionArray[] = "GroundFloor = '1'";}
                                    if ($type == "Double"){$ConditionArray[] = "GroundFloor = '1'";}
                                    if ($type == "Triple"){$ConditionArray[] = "GroundFloor = '1'";}
                                }
				if (count($ConditionArray) > 0 and $checkin != '' and $checkout != '' )
				{
					$query = "SELECT  * FROM hotel INNER JOIN hotel_room on hotel.email = hotel_room.Hotel_email INNER join Room_Options on hotel_room.Room_id = Room_Options.Room_ID INNER JOIN reservation on hotel_room.Room_id = reservation.RoomID WHERE ".implode(' AND ', $ConditionArray);
					//echo $query;
                                        $res = mysql_query($query);
                                        $hotel_array = array();
                                        while ($data = mysql_fetch_array($res)){
                                            $hotel_array[] = "NOT hotel.email= '".$data['email']."'";
                                            
                                        }
                                        $QUE = "SELECT DISTINCT Hotel_ID, Hotel_Name, address, Hotel_Lat, Hotel_Lng FROM hotel WHERE City = '$city' and ". implode(" OR ", $hotel_array);
                                        //echo $QUE;
                                        $res = mysql_query($QUE);
                                        
					return $res;
				}
                                else{
                                    if(count($ConditionArray) > 0){
                                        $query = "SELECT DISTINCT Hotel_ID, Hotel_Name, address, Hotel_Lat, Hotel_Lng  FROM hotel INNER JOIN hotel_room on hotel.email = hotel_room.Hotel_email INNER join Room_Options on hotel_room.Room_id = Room_Options.Room_ID INNER JOIN reservation on hotel_room.Room_id = reservation.RoomID WHERE ".implode(' AND ', $ConditionArray);
					//echo $query;
                                        $res = mysql_query($query);
                                        return $res;
                                    }
                                    else{
					$res = mysql_query("SELECT DISTINCT Hotel_ID, Hotel_Name, address, Hotel_Lat, Hotel_Lng  FROM hotel");
					return $res;
                                }
                                
                                }
			}
                        
                        
                        public function simplified_search($Hotel_Name = "", $City = ""){
                            $Conditionarray = array();
                            if ($Hotel_Name != ""){
                                $string = "Hotel_name like '%$Hotel_Name%'";
                                $Conditionarray[] = $string;
                            }
                            if ($City != ""){
                                $string = "city = '$City'";
                                $Conditionarray[] = $string;
                            }
                            
                            $que = "SELECT * FROM hotel WHERE ". implode(' AND ', $Conditionarray);
                            $res = mysql_query($que);
                            return $res;
                            
                        }
                        
                        
                        public function secondary_search($Hotel_Name="", $City="", $Check_in="", $Check_out=""){
                            $Conditionarray = array();
                            if ($Hotel_Name != ""){
                                $string = "Hotel_name like '%$Hotel_Name%'";
                                $Conditionarray[] = $string;
                            }
                            if ($City != ""){
                                $string = "city = '$City'";
                                $Conditionarray[] = $string;
                            }
                            if ($Check_in != '' && $Check_out != ''){
                                    if ($Check_in < $Check_out){
                                        $ConditionArray[] = "hotel_room.Room_id NOT IN (SELECT Room_name FROM hotel_room INNER JOIN reservation ON hotel_room.Room_id = reservation.RoomID WHERE ((reservation.Checkin = '".$Check_in."' and reservation.Checkout = '".$Check_out."') or (reservation.Checkin >= '".$Check_in."' and reservation.Checkin <= '".$Check_out."') or (reservation.Checkout >= '".$Check_in."' and reservation.Checkout <= '".$Check_out."') or (reservation.Checkin <= '".$Check_in."' and reservation.Checkout >= '".$Check_out."')))";
                                    }
                                } 
                            
                            $query =  "SELECT * FROM hotel WHERE ". implode(' AND ', $Conditionarray);
                            $res = mysql_query($query);
                            return $res;
                        }
		}




class dbHotel{
    //getters && setters

    function __construct(){
        $db = new dbConnect();;
    }
    function __destruct(){}

    public function hotel_create_room($Hotel_email ,$Room_Name, $Room_Number, $Room_type,  $Room_Photo, $Room_desc,$Room_photo_loc, $Cost_per_stay, $Room_weight,$Discount, $SeaView, $MtnView, $GndFlr, $Single, $Double, $Triple, $AC, $wifi, $pool, $parking){
			$Room_ID = md5($Room_Name . " " . strval($Room_Number));
		//echo $Hotel_email, $Room_ID;
                        $Signature = "";
                        if ($SeaView == 1){$Signature .= "1";} else{$Signature .= "0";}
                        if ($MtnView == 1){$Signature .= "1";} else{$Signature .= "0";}
                        if ($GndFlr == 1){$Signature .= "1";} else{$Signature .= "0";}
                        if ($Single == 1){$Signature .= "1";} else{$Signature .= "0";}
                        if ($Double == 1) {$Signature .= "1";} else{$Signature .= "0";}
                        if ($Triple == 1){$Signature .= "1";} else{$Signature .= "0";}
                        if ($AC == 1){$Signature .= "1";} else{$Signature .= "0";}
                        if ($wifi == 1 ){$Signature .= "1";} else{$Signature .= "0";}
                        if ($pool == 1 ){$Signature .= "1";} else{$Signature .= "0";}
                        if ($parking == 1 ){$Signature .= "1";} else{$Signature .= "0";}
                        //echo $Signature;
                        $signature2 = intval($Signature, 2);
                        //echo $signature2;
                        $features = $AC + $SeaView + $MtnView + $GndFlr + $Single + $Double + $Triple + $wifi + $parking + $pool ;
                        
			$QUE = "INSERT INTO hotel_room(Room_id,Room_name, Room_number, Hotel_email,Room_type,  Room_description, Cost_per_unit, Room_photo_id, Room_photo_location, Room_weight, Discount, Signature, SeaView, MountainView, GroundFloor, SingleBed, DoubleBed, TripleBed, Room_AC, wifi, pool, parking, Num_features) VALUES "
                                . "('" . $Room_ID . "','" . $Room_Name . "','" . $Room_Number . "','" . $Hotel_email . "','" . $Room_type . "', '" . $Room_desc . "','" . $Cost_per_stay . "','" . $Room_Photo . "', '" . $Room_photo_loc . "', '".$Room_weight."', ".$Discount.",$signature2, ".$SeaView.", ".$MtnView.", ".$GndFlr.", ".$Single." , ".$Double." , ".$Triple." , ".$AC." ,'$wifi', '$pool', '$parking' , '$features')  ";
			//echo $QUE;
			$res = mysql_query($QUE);
                        
                        /*
			foreach($OptionsArray as $Option ){
				echo $Option;
				$res2 = mysql_query("INSERT INTO room_options(Room_ID, Room_Option) VALUES ('" . $Room_ID . "', '" . $Option . "')");
				}*/
			$res3 = mysql_query("ALTER TABLE hotel_room ORDER BY Hotel_email ASC, Room_weight DESC");
			return $res;

    }

	public function hotel_create_rooms($Hotel_email ,$Room_Name, $Room_Numbers, $Room_type,  $Room_Photo, $Room_desc,$Room_photo_loc, $Cost_per_stay, $OptionsArray,$Room_weight){
		// Add multi rooms
		$Room_IDs  = array();
		foreach($Room_Numbers as $Room_Number){
			$Room_ID = md5($Room_Name . " " . strval($Room_Number));
			//echo $Hotel_email, $Room_ID;
			$QUE = "INSERT INTO hotel_room(Room_id,Room_name, Room_number, Hotel_email,Room_type,  Room_description, Cost_per_unit, Room_photo_id, Room_photo_location, Room_weight) VALUES ('" . $Room_ID . "','" . $Room_Name . "','" . $Room_Number . "','" . $Hotel_email . "','" . $Room_type . "', '" . $Room_desc . "','" . $Cost_per_stay . "','" . $Room_Photo . "', '" . $Room_photo_loc . "', '".$Room_weight."') ";
			//echo $QUE;
			$res = mysql_query($QUE);
			foreach($OptionsArray as $Option ){
				echo $Option;
				$res2 = mysql_query("INSERT INTO room_options(Room_ID, Room_Option) VALUES ('" . $Room_ID . "', '" . $Option . "')");
			}
			$res3 = mysql_query("ALTER TABLE hotel_room ORDER BY Hotel_email ASC, Room_weight DESC");
		}



	}

	public function hotel_belongs_room($Hotel_email, $room_id){
		$QUE = "SELECT $room_id FROM hotel_room WHERE (Hotel_email ='".$Hotel_email."' && Room_id = '".$room_id."' ";
		$res = mysql_query($QUE);
		$num = mysql_num_rows($res);
		if ($num != 1){
			return false;
		}
		else{
			return true;
		}
	}
        
        

    public function hotel_update_room(){}

    public function hotel_update(){}

    public function get_hotel_data($Hotel_ID){
        $QUE = "SELECT * from hotel where Hotel_ID = '".$Hotel_ID."'";
        $res = mysql_query($QUE) or die(mysql_error());
        $hotel_data = mysql_fetch_array($res);

        return $hotel_data;

    }
    
    
    public function get_hotel_photo($Hotel_email){
        $QUE = "SELECT * FROM hotel_photo where email='$Hotel_email'";
        $res = mysql_query($QUE);
        return $res;
    }
    
    public function get_featured_photo($Hotel_email){
        $QUE = "SELECT * FROM hotel_photo where email='$Hotel_email' AND featured = '1'";
        $res = mysql_query($QUE);
        return $res;
    }
    
    public function delete_hotel_photo($Photo_ID, $Hotel_email){
        $QUE = "DELETE FROM hotel_photo WHERE email = '$Hotel_email' AND photo_id='$Photo_ID'";
        $res= mysql_query($QUE);
        return $res;
    }
    
    public function set_featured_photo($Photo_ID, $Hotel_email){
        $QUE = "UPDATE hotel_photo SET featured=1 WHERE email = '$Hotel_email' AND photo_id='$Photo_ID'";
        echo $QUE;
        $res= mysql_query($QUE);
        return $res;
    }

	public function get_hotel_room($Hotel_ID){
		$Res = $this->get_hotel_data($Hotel_ID);
		$email = $Res['email'];
		$resx = $this->get_hotel_rooms($email);
		return $resx;

	}
	public function create_new_reservation($HotelID, $Room_ID, $First_Name, $Last_Name, $Country, $Address, $Check_in, $Check_out, $Status, $Contact){
		
			$User_ID = md5($First_Name.$Last_Name);
			$res = mysql_query("Select Customer_ID from	customer where Customer_ID = '".$User_ID."'");
			$num = mysql_num_rows($res);
			if ($num == 0){
				$res = mysql_query("INSERT INTO customer(Customer_ID, Customer_address, Customer_FirstName, Customer_Contact, Customer_Country) VALUES ('".$User_ID."', '".$Address."','".$First_Name."', '".$Contact."', '".$Last_Name."','".$Country."')");
			}
                        $QUE = "INSERT INTO reservation(UserID, HotelID, RoomID, Checkin, Checkout, Status) VALUES ('".$User_ID."', '".$HotelID."' , '".$Room_ID."', '".$Check_in."', '".$Check_out."', 'CNF')";
                        //echo $QUE;
                        $res = mysql_query($QUE);
			echo "<script>alert('New reservation made successfully')</script>";
		}

	

	public function get_hotel_rooms($Hotel_email){
		return mysql_query("SELECT * FROM hotel_room WHERE Hotel_email = '".$Hotel_email."'");
	}

	public function return_room_options($Room_ID){
		$Res = mysql_query("Select Room_Option from room_options where Room_ID='".$Room_ID."'");
		return $Res;
	}


	public function return_room($Room_ID){
		$Res = mysql_query("SELECT * FROM hotel_room where Room_id = '".$Room_ID."'");
		return mysql_fetch_array($Res);
	}
        
        
        public function edit_data($email, $address="", $city="", $contact="", $lat="", $lng="", $desc=""){
            $value_array = array();
            
            if ($address != ""){$value_array[] = "address = '$address'";}
            if ($city != ""){$value_array[] = "City = '$city'";}
            if ($contact != ""){$value_array[] = "telephone_number = '$contact'";}
            if ($lat != "" and $lng != "" ){$value_array[] = "Hotel_Lat = '$lat' , Hotel_Lng = '$lng'";}
            if ($desc != ""){$value_array[] = "Hotel_Description = '$desc'";}
            
            
            $Query = "UPDATE hotel SET ".implode(" , ", $value_array). " WHERE email = '$email'";
            echo $Query;
            $res = mysql_query($Query);
        }
        
        public function get_room_data($Room_ID){
             $QUE = "SELECT * from hotel_room where Room_ID = '".$Room_ID."'";
             $res = mysql_query($QUE) or die(mysql_error());
             $room_data = mysql_fetch_array($res);

        return $room_data;
        }
        
        public function get_room_photo($Room_ID){
             $QUE = "SELECT * FROM room_photo where Room_ID='$Room_ID'";
             $res = mysql_query($QUE);
             return $res;
        }
        
        public function edit_room_data($Room_ID, $Room_Cost="", $Room_Type="", $Room_description="", $Room_AC="", $Room_photo="", $Seaview = "", $MtnView="", $GndFlr="", $wifi="", $pool="", $park=""){
             $value_array = array();
            
            if ($Room_Cost != ""){$value_array[] = "Cost_per_unit = '$Room_Cost'";}
            if ($Room_Type != "")
                {
                    $value_array[] = "Room_type = '$Room_Type'";
                    if ($Room_Type=="Single"){$value_array[] = "SingleBed = '1', DoubleBed='0', TripleBed='0'";}
                    elseif ($Room_Type=="Double"){$value_array[] ="SingleBed = '0', DoubleBed ='1', TripleBed='0'";}
                    elseif ($Room_Type=="Triple") {$value_array[] ="SingleBed = '0', DoubleBed ='0', TripleBed='1'";}
                }
            
            
//if ($Room_option != ""){$value_array[] = "Room_option = '$Room_option'";}
            if ($Room_description != ""){$value_array[] = "Room_description = '$Room_description'";}
            if($Room_AC !="")
            {
                $value_array[] = "Room_AC = '$Room_AC'";
                
            }
            if ($park!= ""){$value_array[] = "parking='$park'";}
            if ($pool != ""){$value_array[] = "pool='$pool'";}
            if ($wifi != ""){$value_array[] = "wifi='$wifi'";}
            if ($Seaview != ""){$value_array[] = "SeaView = '$Seaview'";}
            if ($MtnView != ""){$value_array="MountainView = '$MtnView'";}
            if ($GndFlr != ""){$value_array="GroundFloor = '$MtnView'";}
            
            $Query = "UPDATE hotel_room SET ".implode(" , ", $value_array). " WHERE room_id = '$Room_ID'";
            echo $Query;
            $res = mysql_query($Query);
        }
        


        public function delete_room_photo($Photo_Name, $Room_ID){
                $QUE = "DELETE FROM room_photo WHERE room_id = '$Room_ID' AND photo_name = '$Photo_Name'";
                $res = mysql_query($QUE);
                return $res;
            }

}


		class dbUser{
			function __construct(){
				$db = new dbConnect();;
			}
			function __destruct(){}

			public function registered_get_details($UserID){
				$QUE = "SELECT * FROM registered_customer INNER JOIN customer ON customer.Customer_ID = registered_customer.Customer_ID WHERE customer.Customer_ID = '".$UserID."'";
				$RES = mysql_query($QUE);

			}


			public function user_reserve($HotelID, $UserID, $Room_ID, $Check_In, $Check_out, $notes){
				$QUE = "SELECT * FROM reservation WHERE ((Checkin >= '".$Check_In."' and Checkin <= '".$Check_out."') or   (Checkout >= '".$Check_In."' and Checkout <= '".$Check_out."' ) or ( Checkin <= '".$Check_In."' and Checkout >= '".$Check_out."')) and RoomID = '".$Room_ID."'";
				$res = mysql_query($QUE);
				$results = mysql_num_rows($res);

				if($results >= 1){
					//header("location:reservation.php?room_id=".$Room_ID."&hotel_id=".$HotelID."");
					//echo $QUE;
					echo "<script>alert('Cannot Reserve. Room is not available')</script>";
					//header("location:reservation_not_available.php");
					//exit();


				}
				else {
                                        $QUERY = "SELECT email ,Hotel_Name FROM hotel where Hotel_ID='".$HotelID."'";
					$email = mysql_fetch_array(mysql_query($QUERY))['email'];
					$name = mysql_fetch_array(mysql_query($QUERY))['Hotel_Name'];
					$QUERY = "INSERT INTO reservation(UserID, HotelID, RoomID, Checkin, Checkout, Status, Notes) VALUES ('" . $UserID . "','" . $HotelID . "','" . $Room_ID . "','" . $Check_In . "','" . $Check_out . "','NCNF' , '".$notes."')";
					$res = mysql_query($QUERY);
					
					$to = $email;
					$subject = "New Reservation";

					$message = "
					<html>
					<head>
					<title>New Reservation</title>
					</head>
					<body>
					<p>You have successfully made a new reservation at ".$name." for the dates ".$Check_In." to ".$Check_out.". Please do payment in order to get your reservation confirmed.</p>
					</body>
					</html>
					";


					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= 'From: <ohrms2015@gmail.com>' . "\r\n";
					

					mail($to,$subject,$message,$headers);
				}
			}

			public function user_reserve_cancel($ReservationID){
				$QUERY = "UPDATE reservation SET Status='CNCL' WHERE ReservationID='".$ReservationID."'";
				$RES = mysql_query($QUERY);//Update
				return $RES;
			}

			public function user_pay_reservation($ReservationID){

			}
                        
                        public function user_add_comment($user_id, $hotel_id){}
		}



?>