<!DOCTYPE html>
<?php 
	include_once('function.php');
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $nameErr = $passErr = $emailErr= $contErr = $addrErr = $passcErr = "";
    $username = $email = $address = $contact = $password = $passwordc = "";
    
	if($_POST['welcome']){
		// remove all session variables
		session_unset(); 

		// destroy the session 
		session_destroy();
	}
	if(!($_SESSION)){
		header("Location:login.php");
	}
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST['username'])){
            $nameErr = "This field is required";
        }else{
            $username = test_input($_POST['username']);
        }
        
        if (empty($_POST["password"])){
            $passErr = "This field is required";
        }else{
            $password = test_input($_POST['password']);
        }
        
        if (empty($_POST['email'])){
            $emailErr = "This field is required";
        }else{        
            $email = test_input($_POST['email']);
        }
        
        if (empty($_POST["passwordc"])){
            $passcErr = "This field is required";
        }else{
            $passwordc = test_input($_POST['passwordc']);
        }
        
        if (empty($_POST["contact"])){
            $contErr = "This field is required";
        }else{
            $contact = test_input($_POST['contact']);
        }
        
        if (empty($_POST["address"])){
            $addrErr = "This field is required";
        }else{
            $address = test_input($_POST['address']);
        }
        
        if($password != $passwordc){
            echo "<script>alert('password mismatch')</script>";
        }
        else{
            if($nameErr == "" and $passErr == "" and $emailErr== "" and $contErr == "" and $addrErr == "" and $passcErr == ""){
            $log_obj = new dbFunction();
            $user = $log_obj->create_hotel($username, $password, $email, $address, $contact);
            echo "<script>alert('Done')</script>";
            header("Location:admin.php");
            }
        }
    }
?>
<html>
<head>
    
<style>
    
header {
    background-color:grey;
    color:black;
    text-align:center;
    padding:5px;	 
}
    
footer {
    background-color:grey;
    color:white;
    clear:both;
    padding:20px;
    margin-top: bottom;
}
#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:300px;
    width:200px;
    float:left;
    padding:5px;	      
}

ul#menu {
    padding: 0;
}

ul#menu li {
    display: inline;
}

ul#menu li a {
    background-color: black;
    color: white;
    padding:  10px 20px;
    text-decoration: none;
    border-radius: 10px 10px 10px 10px;
}

ul#menu li a:hover {
    background-color: orange;
}

.btn {
    width:100px;
    position:relative;
    line-height:50px;
    align-content: center;
    
}

.notification {
    position:absolute;
    right:-7px;
    top:-7px;
    background-color:red;
    line-height:20px;
    width:20px;
    height:20px;
    border-radius:10px;
}
    </style>
</head>
    
<body>
    <header>
    <h1>Online Hotel Reservation Management System - Administrator Portal</h1>
    </header>
    
    <div id="nav">
        <ul id="menu">
          <li><a href="/html/default.asp">Account Management</a></li> <br><br>
          <li><a href="/html/default.asp">System Management</a></li> <br><br>
          <li><a href="/html/default.asp">Issue Response</a></li> <br><br>
          <li><a href="/html/default.asp">Message Portal</a></li> <br><br>
        </ul> 
    </div>
    <div style="float:left; width:80%; margin-left:10px;">
        <form name="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1>Create Account</h1>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value = "<?php echo $username; ?>"><br> <br> 

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br> 
        <label for="passwordc">ConfirmPassword:</label><br>
        <input type="password" id="passwordc" name="passwordc"><br><br>
        <label for="email" id = "email" name = "email" >Email Address:</label><br>
        <input type="text" id="email" name="email" value = "<?php echo $email; ?>"><br><br>
        <label for="address" id = "address" name = "address">Address:</label><br>
        <input type="text" id="address" name="address" value = "<?php echo $address; ?>"><br><br>
        <label for="contact" id = "contact" name = "contact">Contact Number:</label><br>
        <input type="text" id="contact" name="contact" value = "<?php echo $contact; ?>"><br><br>                       
        <input type="submit" value="Register">
        </form>
    <footer>
    </footer>    
</body>
</html>