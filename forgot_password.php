<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 9/27/2015
 * Time: 12:02 PM
 */

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body  background="images/logit.jpg">
    <nav class="navbar navbar-default" >
        <div class="navbar-header">
            <ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
            </ul>
            <a class="navbar-brand" href="#">Online Hotel Reservation and Management System </a>
        </div>
    </nav>
    <div class="container" >

        <div class="col-md-4 col-md-offset-8 text-center">

            <div class="jumbotron">
                <form name="forgot_password" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ; ?> " >
                    <p>Type your email to recover your password</p>
                    <div class="form-group">
                        <label for="email">
                            E mail address
                        </label>
                        <input type="email" name="email">
                    </div>
                    <button type="submit" class = "btn btn-primary">Recover password</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
