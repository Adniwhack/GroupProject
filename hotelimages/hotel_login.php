<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 8/31/2015
 * Time: 2:41 PM
 */
include ('function.php');
if ($_SERVER['REQUEST_METHOD']=="POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $log = new dbFunction();
    $res = $log->hotel_login($email, $password);

    if ($res == true){
        header("Location:hotel_welcome_page.php");
    }
    else{
        echo "<script>alert('Username and password do not match')</script>";
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
                <form name="hotel_login" class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

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

