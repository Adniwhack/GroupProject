<?php 
    require_once('function.php');
    $log_obj = new dbFunction();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = $password;
        //echo $password;
        //echo "/n";
        $user = $log_obj->admin_log($username, $password);
        
        if ($user == TRUE){
            echo "<script>alert('You have successfully logged in')</script>";
            header("Location:admin.php");
        }
        else{
            echo "<script>alert('Username and passwords do not match')</script>";
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
form {
    border:1px solid black;
    background-color:#eeeeee;
    padding:150px;
    
    margin: 0 auto;
    margin-top: 20px;
    margin-bottom: 20px;
    margin-right: 100px;
    margin-left: 400px;
    float:left;
    text-align:left;
}
     
footer {
    background-color:grey;
    color:white;
    clear:both;
    padding:20px;
    margin-top: bottom;
}
</style>
</head>
    
<body>

    <header>
    <h1>Online Hotel Reservation Management System - Administrator Portal</h1>
    </header>

    <div id="container"> 

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br> <br> 

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>

            <div id="lower"> 
                <input type="checkbox"><label for="checkbox">Keep me logged in</label><br> <br>
                <input type="submit" value="Login">
            </div><!--/ lower-->

        </form>
    </div>
     <footer>
        </footer>    
</body>
</html>
