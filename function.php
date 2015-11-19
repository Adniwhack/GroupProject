<?php
	require_once 'server_access.php';

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
			public function create_hotel($username, $email, $password, $address, $city, $country, $contact, $hotel_name){

				$password = password_hash($password, PASSWORD_BCRYPT);
				$Hotel_ID = md5($hotel_name);
                    $resx = $this->check_hotel($email);
                    if ($resx != false) {
						$que = "INSERT INTO hotel(username, email, password, address, telephone_number, City,  Hotel_ID, Hotel_Name) values ('" . $username . "','" . $email . "','" . $password . "','" . $address . "','" . $contact . "','" . $city . "','" . $Hotel_ID . "','" . $hotel_name . "');";
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
                $QUE = "SELECT * FROM reservation INNER JOIN hotel_room on hotel_room.Room_id= reservation.RoomID WHERE hotel_room.Hotel_email = $hotel_email and not ((Checkin< $Check_in and Checkout > $Check_out) or (Checkin <$Check_out and Checkout > $Check_out) or (Checkin > $Check_in and Check_out < $Check_out))";
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
                        function unreserved_room($Room_id, $Check_in , $Check_out){
                            $QUE = "Select * FROM hotel_room inner join reservation on hotel_room.Room_id= reservation.RoomID where hotel_room.Room_id = '$Room_id' and ((Checkin<= '$Check_in' and Checkout >= '$Check_out') or (Checkin <='$Check_out' and Checkout >= '$Check_out') or (Checkin >= '$Check_in' and Checkout <= '$Check_out'))";
                            
                            $res = mysql_query($QUE);
                            $count = mysql_num_rows($res);
                            
                            if ($count == 0){
                                $que = "SELECT * FROM hotel_room where Room_id = '$Room_id'";
                                
                                $res = mysql_query($que);
                                return $res;
                            }
                            else{
                                return NULL;
                            }
                        }
			public function adv_search($Price, $City, $Options){


			}
			function advanced_search($hotel_name, $city, $options, $checkin, $checkout){
                                
				$ConditionArray = array();
				if ($hotel_name != '') $ConditionArray[] = "(Hotel_Name LIKE '%$hotel_name%')";
				if ($city != '') $ConditionArray[] = "hotel.City = '$city'";
				if ($options != []) {
					foreach($options as $option) {
						$ConditionArray[] = "Room_Option = '$option'";
					}
				};
				if ($checkin != '' && $checkout != ''){
                                    if ($checkin < $checkout){
                                        $ConditionArray[] = " ((Checkin > $checkin and Checkout < $checkout) or (Checkin < $checkin and Checkout > $checkin) or (Checkin < $checkout and Checkout > $checkout))";
                                    }
                                } //code checkin and checkout

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

		}




class dbHotel{
    //getters && setters

    function __construct(){
        $db = new dbConnect();;
    }
    function __destruct(){}

    public function hotel_create_room($Hotel_email ,$Room_Name, $Room_Number, $Room_type,  $Room_Photo, $Room_desc,$Room_photo_loc, $Cost_per_stay, $OptionsArray,$Room_weight){
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

	public function get_hotel_room($Hotel_ID){
		$Res = $this->get_hotel_data($Hotel_ID);
		$email = $Res['email'];
		$resx = $this->get_hotel_rooms($email);
		return $resx;

	}
	public function create_new_reservation($HotelID, $Room_ID, $First_Name, $Last_Name, $Country, $Address, $Check_in, $Check_out, $Status, $Contact){
		$QUE = "SELECT FROM reservation WHERE Checkin = '".$Check_in."' && Checkout = '".$Check_out."'";
		$res = mysql_query($QUE);
		$results = mysql_num_rows($res);

		if($results >= 1){
			header("location:reservation_not_available.php");


		}
		else{
			$User_ID = md5($First_Name.$Last_Name);
			$res = mysql_query("Select Customer_ID from	customer where Customer_ID = '".$User_ID."'");
			$num = mysql_num_rows($res);
			if ($num == 0){
				$res = mysql_query("INSERT INTO customer(Customer_ID, Customer_address, Customer_FirstName, Customer_Contact, Customer_Country) VALUES ('".$User_ID."', '".$Address."','".$First_Name."', '".$Contact."', '".$Last_Name."','".$Country."')");
			}
			$QUE = "INSERT INTO reservation(UserID, HotelID, RoomID, Checkin, Checkout, Status) VALUES ('".$User_ID."')";
			$res = mysql_query($QUE);
			echo "<script>alert('New reservation made successfully')</script>";
		}

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
					header("location:reservation_not_available.php");
					exit();


				}
				else {
					$QUERY = "INSERT INTO reservation(UserID, HotelID, RoomID, Checkin, Checkout, Status, Notes) VALUES ('" . $UserID . "','" . $HotelID . "','" . $Room_ID . "','" . $Check_In . "','" . $Check_out . "','NCNF' , '".$notes."')";
					$res = mysql_query($QUERY);
					$QUERY = "SELECT email ,Hotel_Name hotel where Hotel_ID='".$HotelID."'";
					$email = mysql_fetch_array(mysql_query($QUERY))['email'];
					$name = mysql_fetch_array(mysql_query($QUERY))['Hotel_Name'];
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

		}



?>