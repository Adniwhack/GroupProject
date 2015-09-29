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
				$db = new dbConnect();;
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
				// This is a temporary function, and will be deleted once admins are made
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
						$que = "INSERT INTO hotel(username, email, password, address, telephone_number, City, Country, Hotel_ID, Hotel_Name) values ('" . $username . "','" . $email . "','" . $password . "','" . $address . "','" . $contact . "','" . $city . "', '" . $country . "','" . $Hotel_ID . "','" . $hotel_name . "');";
						//echo $que;
                        $res = mysql_query($que) or die(mysql_error());;
                        echo "<script>alert('You have been inserted into system.')</script>";
                        return $res;
                    }
                    else{
                        echo "<script>alert('Email already taken')</script>";
                    }
				}


			public function create_reg_user($email, $password, $Name, $address, $username, $gender, $DOB){
				$password_hashed = password_hash($password, PASSWORD_BCRYPT);
				$email_hashed = md5($email);
				$res1 = mysql_query("INSERT INTO customer(Customer_ID, Customer_Name, Customer_address) VALUES ('".$email_hashed."','".$Name."','".$address."')");
				$res2 = mysql_query("INSERT INTO registered_customer(Customer_ID, Customer_email, Customer_password, Customer_username) VALUES ('".$email_hashed."','".$email."','".$password_hashed."', '".$username."','".$gender."','".$DOB."')");
                return $res2;
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
					$hash = $customer_data['password'];

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
                $QUE = "SELECT * FROM reservation INNER JOIN hotel_room on hotel_room.hotel_email = reservation.Hotel_email WHERE (Hotel_email = '".$hotel_email."' AND reservation.CheckIn < '".$Check_in."' AND reservation.Checkout > '".$Check_out."'";
                $res = mysql_query($QUE);
                return $res;
			}

			public function return_room_options($Room_ID){
				$Res = mysql_Query("Select Room_Option from room_options where Room_ID='".$Room_ID."'");
				return $Res;
			}
		}




class dbHotel{
    //getters and setters

    function __construct(){
        $db = new dbConnect();;
    }
    function __destruct(){}

    public function hotel_create_room($Hotel_email ,$Room_ID, $Room_type, $Room_AC, $Room_Photo, $Room_desc,$Room_photo_loc, $Cost_per_stay, $SeaView, $MtnView , $Gndflr, $OptionsArray,$Room_weight){

			$QUE = "INSERT INTO hotel_room(Room_id, Hotel_email,Room_type, Room_AC, Room_description, Cost_per_unit, Room_photo_id, Room_photo_location, Sea_View, Mountain_View, Ground_Floor, Room_weight) VALUES ('" . $Room_ID . "','" . $Hotel_email . "','" . $Room_type . "','" . $Room_AC . "', '" . $Room_desc . "','" . $Cost_per_stay . "','" . $Room_Photo . "', '" . $Room_photo_loc . "', '".$SeaView."', '".$MtnView."', '".$Gndflr."', '".$Room_weight."') ";
			//echo $QUE;
			$res = mysql_query($QUE);
			foreach($OptionsArray as $Option ){
				echo $Option;
					$res2 = mysql_query("INSERT INTO room_options(Room_ID, Room_Option) VALUES ('" . $Room_ID . "', '" . $Option . "')");
				}
			$res3 = mysql_query("ALTER TABLE hotel_room ORDER BY Hotel_email ASC, Room_weight DESC");
			return $res;

    }

	public function hotel_belongs_room($Hotel_email, $room_id){
		$QUE = "SELECT $room_id FROM hotel_room WHERE (Hotel_email ='".$Hotel_email."' AND Room_id = '".$room_id."' ";
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

	public function create_new_reservation($HotelID, $Room_ID, $First_Name, $Last_Name, $Country, $Address, $Check_in, $Check_out, $Status, $Contact){
		$QUE = "SELECT FROM reservation WHERE Checkin = '".$Check_in."' and Checkout = '".$Check_out."'";
		$res = mysql_query($QUE);
		$results = mysql_num_rows($res);

		if($results >= 1){
			echo "<script>alert('Cannot Reserve. Room is not available')</script>";

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



	public function return_room_options($Room_ID){
		$Res = mysql_Query("Select Room_Option from room_options where Room_ID='".$Room_ID."'");
		return $Res;
	}


}


		class dbUser{
			function __construct(){
				$db = new dbConnect();;
			}
			function __destruct(){}


			public function user_reserve($HotelID, $UserID, $Room_ID, $Check_In, $Check_out, $FirstName, $LastName, $Gender, $Country, $Status){

				$RES = mysql_query("INSERT INTO reservation(UserID, HotelID, RoomID, FirstName, LastName, Gender, Country, Checkin, Checkout, Status) VALUES ('".$UserID."','".$HotelID."','".$Room_ID."','".$FirstName."','".$LastName."','".$Gender."','".$Country."','".$Check_In."','".$Check_out."','".$Status."')");
				return $RES;
			}

			public function user_reserve_cancel($ReservationID){}

		}



?>