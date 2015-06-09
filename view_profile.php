<?php 
    require_once('function.php');
    $log_obj = new dbFunction();
    //$log_obj->create_admin("KAYMAN","haha","lol");
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
