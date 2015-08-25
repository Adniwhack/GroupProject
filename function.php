<?php
	require_once 'server_access.php';
	
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
				if ($_SESSION['admin_login']  == TRUE){
				$password = password_hash($password, PASSWORD_BCRYPT);
				$Hotel_ID = password_hash($email, PASSWORD_BCRYPT);
				$res = mysql_query("INSERT INTO hotel(username, email, password, address, telephone_number, City, Country, Hotel_ID, Hotel_Name) values ('".$username."','".$email."','".$password."','".$address."','".$contact."','".$city."', '".$country."','".$Hotel_ID."','".$hotel_name."');") or die(mysql_error());;
				return $res;
				}
			}

			public function hotel_login($username, $password){
				$QUE = "SELECT * FROM hotel WHERE = '".$username."' ";
				//echo $QUE;

				$res = mysql_query($QUE) ; // NEED TO FILL ACCORDING TO TABLE
				$hotel_data =mysql_fetch_array($res);

				$no_rows = mysql_num_rows($res);

				//echo $no_rows;
				if ($no_rows==1 ){
					//echo  $admin_data['password'];
					$hash = $hotel_data['password'];
					echo $hash;
					if(password_verify($password, $hash )){
					$_SESSION['hotel_login'] = true;
					$_SESSION['hotel_username'] = $hotel_data['email'];


					return TRUE;
				}
				}
				else{
					return FALSE;
				}
			}

			public function customer_login($username, $password){
				$QUE = "SELECT * FROM registered_customer WHERE customer_email = '".$username."' ";
				//echo $QUE;
				
				$res = mysql_query($QUE) ; // NEED TO FILL ACCORDING TO TABLE
				$customer_data =mysql_fetch_array($res);
				
				$no_rows = mysql_num_rows($res);
				
				//echo $no_rows;
				if ($no_rows==1 ){
					//echo  $admin_data['password'];
					$hash = $customer_data['password'];
					echo $hash;
					if(password_verify($password, $hash )){
					$_SESSION['customer_login'] = true;
					$_SESSION['customer_username'] = $customer_data['email'];
					
					
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

			}

			
			
		}


		class dbSearch{

			public function search(){

			}
		}




		class dbHotel{
			//getters and setters


			public function hotel_create_room($Room, $Room_Type, $Room_Price){}

			public function hotel_update_room(){}

			public function hotel_update(){}

			public function get_hotel_data($Hotel_ID){
				$QUE = "SELECT Hotel_Name, from hotel where Hotel_ID = '".$Hotel_ID."' ;";
				$res = mysql_query($QUE);
                $hotel_data = mysql_fetch_array($res);

				return $hotel_data;

			}






		}


		class dbUser{

			public function user_reserve($Room_ID, $Check_In, $Check_out){


			}

		}



?>