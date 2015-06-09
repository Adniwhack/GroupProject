<!DOCTYPE html>
<?php 
	include_once('function.php');
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
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $email = $_POST['email'];
        $passwordc = $_POST['passwordc'];
        
        
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        
        if($password != $passwordc){
            echo "<script>alert('password mismatch')</script>";
        }
        else{
            $log_obj = new dbFunction();
            $user = $log_obj->create_hotel($username, $password, $email, $address, $contact);
            echo "<script>alert('Done')</script>";
            header("Location:admin.php");
            
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
        <input type="text" id="username" name="username"><br> <br> 

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br> 
        <label for="passwordc">ConfirmPassword:</label><br>
        <input type="password" id="passwordc" name="passwordc"><br><br>
        <label for="email" id = "email" name = "email">Email Address:</label><br>
        <input type="text" id="email" name="email"><br><br>
        <label for="address" id = "address" name = "address">Address:</label><br>
        <input type="text" id="address" name="address"><br><br>
        <label for="contact" id = "contact" name = "contact">Contact Number:</label><br>
        <input type="text" id="contact" name="contact"><br><br>                       
        <input type="submit" class="btn" value="Register">
        <input name="back" type="submit" class="btn" id="back" formaction="admin.php" value="Back">
        
        <input name="Submit" type="submit" class="btn" id="button" value="View profiles" formaction="delete.php">
        
        </form>
    <footer>
    </footer>    
</body>
</html>