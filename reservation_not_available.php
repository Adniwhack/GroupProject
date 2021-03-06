<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 11/2/2015
 * Time: 8:23 PM
 */?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style>
        .navbar {
            color: #FFFFFF;
            background-color: #161640;
        }

        /* OR*/

        .nav {
            color: #FFFFFF;
            background-color: #161640;

        .nav-pills > li > a {
            color: #A7A79BF6;
            font-family: 'Oswald', sans-serif;
            font-size: 0.8em ;
            padding: 1px 1px 1px ;
        }
    </style>
    <!--script>
            function phonenumber(cnumber)
    {
      var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
      if((cnumber.value.match(phoneno))
            {
          return true;
            }
          else
            {
            alert("Invalid Phone Number");
            return false;
            }
    }
    </script-->

</head>

<body background="images/back2.jpg">
<!-- Navigation bar which is in the top of the page -->

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <ul class="nav navbar-nav navbar-left"><li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li>
            </ul>
        </div>

        <div>
            <ul class="nav nav-pills navbar-left">
                <li><a href="#"><span class="glyphicon glyphicon-home"><b><font size="4" color="#A7A79B">Home</font></b></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-chevron-left"><b><font size="4" color="#A7A79B">Back</font></b></span></a></li>

                <li><form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Hotel, Guest house etc" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-md">
                            Search
                        </button>
                    </form></li>
            </ul>
            </ul>
        </div>
        <div>
            <ul class="nav nav-pills navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-log-in"><b><font size="4" color="#A7A79B">Login</font></b></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#A7A79B">AboutUs</font></b></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#A7A79B">Rooms</font></b></span></a></li>



        </div>

        <!--button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button-->
    </div>

    <!--div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav">

            <li >

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Price Range<strong class="caret" ></strong></a>
            </li>

            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">City<strong class="caret" ></strong></a>
            </li>

        </ul-->

    <!--form class="navbar-form navbar-left" role="search">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Hotel, Guest house etc" />
    </div>
    <button type="submit" class="btn btn-primary btn-md">
        Search
    </button>
</form-->
    <!--ul class="nav navbar-nav navbar-right">
        <button type="submit" class="btn btn-primary btn-md">
            <span class=" glyphicon glyphicon-log-in"></span> Login
        </button>
        <button type="submit" class="btn btn-primary btn-md">
            <span class=" glyphicon glyphicon-thumbs-up"></span> About us

        </button>
        <button type="submit" class="btn btn-primary btn-md">
            <span class=" glyphicon glyphicon-modal-window"></span> Rooms

        </button>

    </ul-->
    </div>

</nav>
<div class="container">
    <div class="jumbotron">
        <div class="row">
            <p>Your reservation could not be made for the given time period due to an existing reservation within the time period. Please review your time period.</p>
            </div>
        </div>
    </div>
</body>
</html>
