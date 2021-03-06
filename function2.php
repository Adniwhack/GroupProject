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
        $db = new dbConnect2();
    }
    function __destruct(){}

    public function admin_log($username,$password, $db){
        //$password = password_hash($password, PASSWORD_BCRYPT);

        $QUE = "SELECT * FROM admin WHERE email= '".$username."' ";
        //echo $QUE;

        $res = mysqli_query($this->$db,$QUE) ; // NEED TO FILL ACCORDING TO TABLE
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
    public function create_admin( $email,$password, $db){
        // This is a temporary function, && will be deleted once admins are made
        if ($_SESSION['admin_login'] == TRUE){

            $password = password_hash($password, PASSWORD_BCRYPT);
            $res = mysqli_query($this->$db,"INSERT INTO admin(email, password) values ('".$email."','".$password."');") or die(mysql_error());;
            return $res;
        }
    }
    public function create_hotel($username, $email, $password, $address, $city, $country, $contact, $hotel_name){

        $password = password_hash($password, PASSWORD_BCRYPT);
        $Hotel_ID = md5($hotel_name);
        $resx = $this->check_hotel($email);
        if ($resx != false) {
            $que = "INSERT INTO hotel(username, email, password, address, telephone_number, City,  Hotel_ID, Hotel_Name) values ('" . $username . "','" . $email . "','" . $password . "','" . $address . "','" . $contact . "','" . $city . "','" . $Hotel_ID . "','" . $hotel_name . "');";
            //echo $que;
            $res = mysqli_query($this->$db,$que) or die(mysql_error());;
            echo "<script>alert('You have been inserted into system.')</script>";
            return $res;
        }
        else{
            echo "<script>alert('Email already taken')</script>";
        }
    }

    public function create_custom_user($FirstName, $Lastname,$Address, $Contact, $Country){
        $ID = md5($FirstName . $Lastname);
        $QUE = "INSERT INTO customer(Customer_ID, Customer_address, Customer_FirstName, Customer_Contact, Customer_LastName, Customer_Country) VALUES ('".$ID."', '".$Address."','".$FirstName."', '".$Contact."', '".$Lastname."', '".$Country."')";
        $RES = mysqli_query($this->$db,$QUE);
        return $ID;
    }
    public function create_reg_user($FirstName, $Lastname,$Address, $Contact, $Country, $email, $password, $username, $gender, $dob){
        $ID = md5($FirstName . $Lastname);
        $password_hashed = password_hash($password, PASSWORD_BCRYPT);
        $QUE = "INSERT INTO customer(Customer_ID, Customer_address, Customer_FirstName, Customer_Contact, Customer_LastName, Customer_Country) VALUES ('".$ID."', '".$Address."','".$FirstName."', '".$Contact."', '".$Lastname."', '".$Country."')";
        echo $QUE;
        $RES = mysqli_query($this->$db,$QUE);
        $QUE = "INSERT INTO registered_customer(Customer_ID, Customer_email, Customer_password, Customer_username, Gender, Customer_DOB) VALUES ('".$ID."','".$email."','".$password_hashed."', '".$username."', '".$gender."', '".$dob."')";
        echo $QUE;
        $RES = mysqli_query($this->$db,$QUE);
        /*$password_hashed = password_hash($password, PASSWORD_BCRYPT);
        $email_hashed = md5($email);
        $res1 = mysqli_query($this->$db,"INSERT INTO customer(Customer_ID, Customer_Name, Customer_address) VALUES ('".$email_hashed."','".$Name."','".$address."')");
        $res2 = mysqli_query($this->$db,"INSERT INTO registered_customer(Customer_ID, Customer_email, Customer_password, Customer_username) VALUES ('".$email_hashed."','".$email."','".$password_hashed."', '".$username."','".$gender."','".$DOB."')");
        return $res2;
        */

        return $RES;

    }

    public function hotel_login($email, $password){
        $QUE = "SELECT * FROM hotel WHERE email = '".$email."'" ;
        //echo $QUE;

        $res = mysqli_query($this->$db,$QUE) ; // NEED TO FILL ACCORDING TO TABLE
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

        $res = mysqli_query($this->$db,$QUE) ; // NEED TO FILL ACCORDING TO TABLE
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
        $res = mysqli_query($this->$db,"SELECT email FROM hotel WHERE email = '".$hotel_email."'");
        $no_rows = mysql_num_rows($res);
        if($no_rows == 0){
            return true;
        }
        else{return false;}

    }

    public function check_customer($customer_username){
        $res = mysqli_query($this->$db,"Select Customer_ID from registered_customer WHERE Customer_username='".$customer_username."'");
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
        $db = new dbConnect2();;
    }
    function __destruct(){}

    public function return_hotel(){
        $QUE = "SELECT * FROM hotel";
        $RES = mysqli_query($this->$db,$QUE);
        return $RES;

    }

    public function search_hotel_city($City){
        $QUE = "SELECT * FROM hotel where City = '".$City."'";
        $RES = mysqli_query($this->$db,$QUE);
        return $RES;
    }

    public function search_hotel_less_price($Cost){
        $QUE = "SELECT email, Hotel_Name, City FROM hotel INNER JOIN hotel_room on hotel.email = hotel_room.Hotel_email where Cost_per_unit <= '".$Cost."'";
        $RES = mysqli_query($this->$db,$QUE);
        return $RES;
    }

    public function	search_hotel_name($Hotel_Name){
        $QUE = "Select * From hotel where Hotel_Name LIKE '".$Hotel_Name."' ";
        $Res = mysqli_query($this->$db,$QUE);
        return $Res;
    }

    public function search_hotel_city_name($City, $Name){
        $QUE = "Select * FROM hotel where Hotel_Name LIKE '%".$Name."%', City = ".$City."";
    }

    public function return_room($Hotel_email){
        $QUE = "SELECT * FROM hotel_room WHERE hotel_email='".$Hotel_email."'";
        $res = mysqli_query($this->$db,$QUE);
        return $res;
    }

    public function return_sorted_room($Hotel_email){
        $QUE = "SELECT * FROM hotel_room WHERE hotel_email='".$Hotel_email."' order by Room_weight DESC";
        $res = mysqli_query($this->$db,$QUE);
        return $res;
    }

    public function return_unreserved_room($hotel_email, $Check_in, $Check_out){
        //Return unreserved rooms
        $QUE = "SELECT * FROM reservation INNER JOIN hotel_room on hotel_room.hotel_email = reservation.Hotel_email WHERE (Hotel_email = '".$hotel_email."' && reservation.CheckIn < '".$Check_in."' && reservation.Checkout > '".$Check_out."'";
        $res = mysqli_query($this->$db,$QUE);
        return $res;
    }

    public function return_room_options($Room_ID){
        $Res = mysqli_query($this->$db,"Select Room_Option from room_options where Room_ID='".$Room_ID."'");
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
    public function adv_search($Price, $City, $Options, $Seaview, $MtnView, $GndFlr){

        echo $Options;
        echo $Seaview;
        echo $MtnView;
        echo $GndFlr;

        $optc = ""; $seac = ""; $mtnc = ""; $gndc = "";
        if ($Price == 0){
            if($City == ""){
                if (($Options == null) && ($Seaview == null) && ($MtnView = null) && ($GndFlr = null)){
                    echo 0;
                    return null;  //return nothing
                }
                else{
                    echo 1;
                    return mysqli_query($this->$db,"SELECT * FROM hotel_room inner join hotel on hotel.email = hotel_room.Hotel_email inner join room_options on hotel_room.Room_id = room_options.Room_ID where Room_Option = '".$Options."' "); //Query 1
                }
            }
            else{
                if ($Options == null && $Seaview == null && $MtnView = null && $GndFlr = null){
                    return mysqli_query($this->$db,"Select * from hotel where City = '".$City."'");
                }
                else{
                    if ($Options != ""){
                        $optc = "Room_Option = '".$Options."',";
                    }
                    if ($Seaview != ""){
                        $seac = "Sea_View = 'A',";
                    }
                    if ($MtnView != ""){
                        $seac = "Mountain_View = 'A',";
                    }
                    if ($GndFlr != ""){
                        $seac = "Ground_Floor = 'A',";
                    }
                    $Que = "SELECT * FROM hotel inner join hotel_room on hotel.email = hotel_room.Hotel_email inner join room_options on hotel_room.Room_id = room_options.Room_ID WHERE".$optc."".$seac."".$mtnc."".$gndc." hotel.City = '".$City."'";
                    echo $Que;
                    return mysqli_query($this->$db,$Que);
                }
            }
        }
        else{
            if($City == ""){
                if ($Options == null && $Seaview == null && $MtnView = null && $GndFlr = null){
                    return mysqli_query($this->$db,"SELECT * FROM hotel_room inner join hotel on hotel.email = hotel_room.Hotel_email where Cost_per_unit <= ".$Price."");
                }
                else{
                    if ($Options != ""){
                        $optc = "Room_Option = '".$Options."''";
                    }
                    if ($Seaview != ""){
                        $seac = "Sea_View = 'A'";
                    }
                    if ($MtnView != ""){
                        $seac = "Mountain_View = 'A'";
                    }
                    if ($GndFlr != ""){
                        $seac = "Ground_Floor = 'A'";
                    }
                    $Que = "SELECT * FROM hotel_room inner join hotel on hotel.email = hotel_room.Hotel_email inner join room_options on hotel_room.Room_id = room_options.Room_ID WHERE".$optc.",".$seac.",".$mtnc.",".$gndc.",  Cost_per_unit <= ".$Price."";
                    return mysqli_query($this->$db,$Que);
                }
            }
            else{
                if ($Options == null && $Seaview == null && $MtnView = null && $GndFlr = null){
                    return mysqli_query($this->$db,"SELECT * FROM hotel_room inner join hotel on hotel.email = hotel_room.Hotel_email where Cost_per_unit <= ".$Price." ,  city LIKE '%".$City."'%");
                }
                else{
                    if ($Options != ""){
                        $optc = "Room_Option = '".$Options."''";
                    }
                    if ($Seaview != ""){
                        $seac = "Sea_View = 'A'";
                    }
                    if ($MtnView != ""){
                        $seac = "Mountain_View = 'A'";
                    }
                    if ($GndFlr != ""){
                        $seac = "Ground_Floor = 'A'";
                    }
                    $Que = "SELECT * FROM hotel_room inner join hotel on hotel.email = hotel_room.Hotel_email inner join room_options on hotel_room.Room_id = room_options.Room_ID WHERE".$optc.",".$seac.",".$mtnc.",".$gndc.",  Cost_per_unit <= ".$Price.", city LIKE '%".$City."'%";
                    return mysqli_query($this->$db,$Que);
                }
            }
        }


    }
}




class dbHotel{
    //getters && setters

    function __construct(){
        $db = new dbConnect2();;
    }
    function __destruct(){}

    public function hotel_create_room($Hotel_email ,$Room_Name, $Room_Number, $Room_type,  $Room_Photo, $Room_desc,$Room_photo_loc, $Cost_per_stay, $OptionsArray,$Room_weight){
        $Room_ID = md5($Room_Name . " " . strval($Room_Number));
        //echo $Hotel_email, $Room_ID;
        $QUE = "INSERT INTO hotel_room(Room_id,Room_name, Room_number, Hotel_email,Room_type,  Room_description, Cost_per_unit, Room_photo_id, Room_photo_location, Room_weight) VALUES ('" . $Room_ID . "','" . $Room_Name . "','" . $Room_Number . "','" . $Hotel_email . "','" . $Room_type . "', '" . $Room_desc . "','" . $Cost_per_stay . "','" . $Room_Photo . "', '" . $Room_photo_loc . "', '".$Room_weight."') ";
        //echo $QUE;
        $res = mysqli_query($this->$db,$QUE);
        foreach($OptionsArray as $Option ){
            echo $Option;
            $res2 = mysqli_query($this->$db,"INSERT INTO room_options(Room_ID, Room_Option) VALUES ('" . $Room_ID . "', '" . $Option . "')");
        }
        $res3 = mysqli_query($this->$db,"ALTER TABLE hotel_room ORDER BY Hotel_email ASC, Room_weight DESC");
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
            $res = mysqli_query($this->$db,$QUE);
            foreach($OptionsArray as $Option ){
                echo $Option;
                $res2 = mysqli_query($this->$db,"INSERT INTO room_options(Room_ID, Room_Option) VALUES ('" . $Room_ID . "', '" . $Option . "')");
            }
            $res3 = mysqli_query($this->$db,"ALTER TABLE hotel_room ORDER BY Hotel_email ASC, Room_weight DESC");
        }



    }

    public function hotel_belongs_room($Hotel_email, $room_id){
        $QUE = "SELECT $room_id FROM hotel_room WHERE (Hotel_email ='".$Hotel_email."' && Room_id = '".$room_id."' ";
        $res = mysqli_query($this->$db,$QUE);
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
        $res = mysqli_query($this->$db,$QUE) or die(mysql_error());
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
        $res = mysqli_query($this->$db,$QUE);
        $results = mysql_num_rows($res);

        if($results >= 1){
            echo "<script>alert('Cannot Reserve. Room is not available')</script>";

        }
        else{
            $User_ID = md5($First_Name.$Last_Name);
            $res = mysqli_query($this->$db,"Select Customer_ID from	customer where Customer_ID = '".$User_ID."'");
            $num = mysql_num_rows($res);
            if ($num == 0){
                $res = mysqli_query($this->$db,"INSERT INTO customer(Customer_ID, Customer_address, Customer_FirstName, Customer_Contact, Customer_Country) VALUES ('".$User_ID."', '".$Address."','".$First_Name."', '".$Contact."', '".$Last_Name."','".$Country."')");
            }
            $QUE = "INSERT INTO reservation(UserID, HotelID, RoomID, Checkin, Checkout, Status) VALUES ('".$User_ID."')";
            $res = mysqli_query($this->$db,$QUE);
            echo "<script>alert('New reservation made successfully')</script>";
        }

    }

    public function get_hotel_rooms($Hotel_email){
        return mysqli_query($this->$db,"SELECT * FROM hotel_room WHERE Hotel_email = '".$Hotel_email."'");
    }

    public function return_room_options($Room_ID){
        $Res = mysqli_query($this->$db,"Select Room_Option from room_options where Room_ID='".$Room_ID."'");
        return $Res;
    }


    public function return_room($Room_ID){
        $Res = mysqli_query($this->$db,"SELECT * FROM hotel_room where Room_id = '".$Room_ID."'");
        return mysql_fetch_array($Res);
    }
}


class dbUser{
    function __construct(){
        $db = new dbConnect2();;
    }
    function __destruct(){}

    public function registered_get_details($UserID){
        $QUE = "SELECT * FROM registered_customer INNER JOIN customer ON customer.Customer_ID = registered_customer.Customer_ID WHERE customer.Customer_ID = '".$UserID."'";
        $RES = mysqli_query($this->$db,$QUE);

    }


    public function user_reserve($HotelID, $UserID, $Room_ID, $Check_In, $Check_out, $notes){
        $QUE = "SELECT * FROM reservation WHERE not Checkin > ".$Check_In." and RoomID = '".$Room_ID."' or  not Checkout < ".$Check_out." and RoomID = '".$Room_ID."'";
        $res = mysqli_query($this->$db,$QUE);
        $results = mysql_num_rows($res);

        if($results >= 1){
            header("location:reservation.php?room_id=".$Room_ID."&hotel_id=".$HotelID."");
            echo "<script>alert('Cannot Reserve. Room is not available')</script>";
            exit();


        }
        else {
            $QUERY = "INSERT INTO reservation(UserID, HotelID, RoomID, Checkin, Checkout, Status, Notes) VALUES ('" . $UserID . "','" . $HotelID . "','" . $Room_ID . "','" . $Check_In . "','" . $Check_out . "','NCNF' , '".$notes."')";
            $res = mysqli_query($this->$db,$QUERY);


        }
    }

    public function user_reserve_cancel($ReservationID){
        $QUERY = "UPDATE reservation SET Status='CNCL' WHERE ReservationID='".$ReservationID."'";
        $RES = mysqli_query($this->$db,$QUERY);//Update
        return $RES;
    }

    public function user_pay_reservation($ReservationID){

    }

}



?>