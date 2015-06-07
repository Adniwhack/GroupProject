<?php
	require_once 'server_access.php';
	
	session_start();
	
	
		class dbFunction {
			function __construct(){
				$db = new dbConnect();;
			}
			function __destruct(){}
			
			public function admin_log($username,$password){
				$password = md5($password);
				$QUE = "SELECT * FROM admin WHERE username = '".$username."' and password = '".$password."'";
				//echo $QUE;
				
				$res = mysql_query($QUE) ; // NEED TO FILL ACCORDING TO TABLE
				$admin_data =mysql_fetch_array($res);
				
				$no_rows = mysql_num_rows($res);
				
				//echo $no_rows;
				if ($no_rows==1){
					$_SESSION['login'] = true;
					$_SESSION['username'] = $admin_data['username'];
					$_SESSION['email'] = $admin_data['emailid'];
					echo $_SESSION['email'];
					return TRUE;
				}
				else{
					return FALSE;
				}
			}
			public function create_admin($username, $password, $email){
				
				$password = md5($password);
				$res = mysql_query("INSERT INTO admin(username, emailid, password) values ('".$username."','".$email."','".$password."');") or die(mysql_error());;
				return $res;
				
			}
			public function create_hotel($username, $password, $email, $address, $contact_no){
				if ($_SESSION != NULL){
				$password = md5($password);
				$res = mysql_query("INSERT INTO hotel(username, email, passwd, address, telephone_number) values ('".$username."','".$email."','".$password."','".$address."','".$contact_no."');") or die(mysql_error());;
				return $res;
				}
			}
			
			public function user_login(){}
			public function user_logout(){}
		}
?>