<?php
require_once('function.php');
$log_obj = new dbFunction();
//$log_obj->create_admin("kayman@gmail.com","lol");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['email'];
    $password = $_POST['password'];
    //echo $username;
    $user = $log_obj->customer_login($username, $password);

    if ($user == TRUE){
        echo "<script>alert('You have successfully logged in')</script>";


        if ($_SESSION['Reservation'] == true){
            header("Location:Reservations.php");
            exit();
        }
        header("Location:home.html");
    }
    else{
        echo "<script>alert('Username and passwords do not match')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<!-- Adding bootstrap !-->
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Create the image view !-->
        <div class="col-md-12">
            <img alt="Bootstrap Image Preview" src="E:\Downloads\logo.jpg" class="center-block" />
        </div>
        <!-- Create the form which contains the name and password, md can be changed to sm etc !-->
        <div class="row">
            <div class="col-md-4" >
            </div>

            <div class="col-md-4">
                <!-- Create the form horizontally !-->
                <form class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">
                            Email
                        </label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email"/>
                        </div>
                    </div>
                    <!-- Input for the password !-->
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">
                            Password
                        </label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password"/>
                        </div>
                    </div>
                    <!-- Input for the check box !-->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" /> Remember me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" >
                                Login
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>