<?php
include('function.php');
        $Hotel_email = $_SESSION['hotel_email'];


        include_once('function.php');
        $log = new dbSearch();
        $Hotel = $log->return_hotel();
        $Hotel_data = mysql_fetch_array($Hotel);
        $Hotel_name = $Hotel_data['Hotel_Name'];
        $Room_res = $log->return_room($Hotel_email);

        if($_SERVER['REQUEST_METHOD'] == "POST"){


        }


?>


<!DOCTYPE html>



<!DOCTYPE html>

<html lang="en">
<!--  Adding bootstrap !-->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>


<body>

<!-- Navigation bar which is in the top of the page -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <nav class="navbar navbar-default" role="navigation" >


                <div class="navbar-header">
                    <button type="button" class="btn btn-primary btn-md">


                        <span class="glyphicon glyphicon-home"></span> Home
                    </button>

                    <button type="button" class="btn btn-primary btn-md">

                        <span class="glyphicon glyphicon-chevron-left"></span> Back
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <button type="submit" class="btn btn-primary btn-md">
                            <span class=" glyphicon glyphicon-log-in"></span> Login as

                        </button>

                        <button type="submit" class="btn btn-primary btn-md">
                            <span class=" glyphicon glyphicon-thumbs-up"></span> About us

                        </button>

                    </ul>
                </div>

            </nav>
        </div></div>
    <div class="row">
        <div class="col-md-18">
            <h3 class="text-primary" align = "center" ><b><?php echo $Hotel_name; ?></b></h3>
        </div>
    </div>
    <div class="container-fluid">


        <!--Create account for hotel -->
        <div class="col-md-6">
            <!--  Create the form horizontally !-->
            <br><br>
            <form name = "reservation" class="form-horizontal col-md-10 col-md-offset-1" role="form" align = "left" >
                <legend>Enter reservation details for Rooms:</legend>
                <div class="form-group" align="center">
                    <label for="room" id="room">Room Name:</label>
                        <select name="room">
                            <?php
                                while ($data == mysql_fetch_array($Room_res)){
                                    $room_name = $data['Room_name'];
                                    echo "<option>".$room_name."</option>";
                                }
                            ?>
                        </select>

                </div>
                <div class="form-group" align = "center">
                    <label for="first_name" class="col-md-4 control-label">
                        First name
                    </label>
                    <div class="col-md-8">
                        <input type="inputName" class="form-control" id="inputName" name = "First_Name" />
                    </div>
                </div>

                <div class="form-group" align = "center">
                    <label for="inputName" class="col-md-4 control-label">
                        Last name
                    </label>
                    <div class="col-md-8">
                        <input type="inputName" class="form-control" id="inputName"  name = "Last_Name" />
                    </div>
                </div>
                <!--
                                <div class="form-group" align = "center">
                                    <label for="inputName" class="col-md-4 control-label" >
                                        Gender
                                    </label>
                                    <select name="Gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>

                -->

                <div class="form-group">
                    <label for="inputAddress" class="col-md-4 control-label">
                        Address
                    </label>

                    <div class="col-md-8">
                        <input type="inputAddress" class="form-control" id="inputAddress" placeholder="No 10, Down Street, Colombo 10" name = "Address"/>
                    </div>
                </div>

                <div class="form-group" align = "center">
                    <label for="inputName" class="col-md-4 control-label">
                        Country
                    </label>
                    <input id="inputName" name="Country">
                </div>

                <div class="form-group">
                    <label for="inputNumber" class="col-md-4 control-label">
                        Contact No
                    </label>

                    <div class="col-md-8">
                        <input type="inputNumber" class="form-control" id="inputNumber" placeholder="00947777123456" name= "Contact"/>
                    </div>
                </div>

                <div class="form-group" align = "center">
                    <label for="inputName" class="col-md-4 control-label">
                        Check in
                    </label>
                    <div class="col-md-8">

                        <input type="date" id="for" class="form-control" name = "Checkin">
                    </div>
                </div>

                <div class="form-group" align = "center">
                    <label for="inputName" class="col-md-4 control-label">
                        Check out
                    </label>
                    <div class="col-md-8">

                        <input type="date" id="for" class="form-control" name = "Checkout">
                    </div>
                </div>





                <div class="form-group">
                    <div class="captcha">
                        <div id="recaptcha_image"></div>
                    </div>
                </div>
                <div class="form-group" align = "right">
                    <div class="col-sm-offset-2 col-sm-10">

                        <button type="submit" class="btn btn-default" type="submit">

                            Save
                        </button>


                    </div>
                </div>




        </div>
    </div>




</div>

</body>
</html>