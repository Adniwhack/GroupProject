<?php
include('function.php');
if(!$_SESSION['hotel_login']){
    header("Location:hotel_login.php");
}
else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Hotel_email = $_SESSION['hotel_email'];
        //echo $Hotel_email;
        $Room_Name = $_POST['Room_Name'];
        //echo $Room_Name;
        $Room_Cost = $_POST['Room_Cost'];
        //echo $Room_Cost;
        $Room_Type = $_POST['Room_Type'];
        //echo $Room_Type;
        $Room_AC =$_POST['Room_AC'];
        //echo $Room_AC;
        $Room_Desc = $_POST['Room_Description'];
        //echo $Room_Desc;
        $Room_photo = $_FILES['Room_photo']['name'];
        //echo $Room_photo;
        //echo $Room_photo;
        $Photo = $_FILES['Room_photo']['tmp_name'];
        //echo $Photo;
        $target = 'images/';
        $target = $target.basename($Room_photo);
        //echo $target;
        move_uploaded_file($_FILES['Room_photo']['tmp_name'], $target);
        //echo "<img src=images/".$Room_photo.">";

        //$Hotel = $_SESSION['hotel_email'];

        //$hotel = new dbHotel();
        //$hotel->hotel_create_room($Room_Name, $Room_Desc, $Room_Price,$Hotel);
        $log = new dbHotel();

        $log->hotel_create_room($Hotel_email, $Room_Name, $Room_Type, $Room_AC, $Room_photo, $Room_Desc, $target, $Room_Cost);
    }
}
?>

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
    <!-- Adding recaptcha file in to the page -->
    <style>
        .captcha, #recaptcha_image, #recaptcha_image img {
            width:100% !important;
        }

    </style>
</head>

<body>

<div class="container-fluid">



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
                        <span class=" glyphicon glyphicon-log-in"></span> Login
                    </button>
                    <button type="submit" class="btn btn-primary btn-md">
                        <span class=" glyphicon glyphicon-thumbs-up"></span> About us

                    </button>

                </ul>

            </div>

        </nav>
    </div>
    <form name = "Room_create" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  enctype="multipart/form-data">
        <h2>Create New Room</h2>
        <div class="form-group">
            <label for="Room_Name" id="Room_Name" >Room Name</label>
            <input type="text" id = "Room_Name" name="Room_Name" required>
        </div>
        <div class="form-group">
            <label for="Room_Type" id="Room_Type">Room Type</label>
            <select name="Room_Type" >
                <option>Single</option>
                <option>Double</option>
                <option>Triple</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Room_Cost" id="Room_Cost">Cost per stay</label>
            <input type="text" id="Room_Cost" name="Room_Cost" required>
        </div>
        <div class="form-group">
            <label for="Room_Description" id="Room_Description">Room Description</label>
            <textarea name="Room_Description" rows="5" cols="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label><input type="radio" name="Room_AC" value="A">Air Conditioning available</label><br>
            <label><input type="radio" name="Room_AC" value = "N/A">Air Conditioning not available</label>
        </div>
        <div class="form-group">
            <label for="Room_photo" id="Room_photo">Room Photo</label>
            <input type="file" name="Room_photo" accept="image/*">
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>