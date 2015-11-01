<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 8/27/2015
 * Time: 11:06 PM
 *
 *
 */

require_once('function.php');

$search = new dbSearch();
$res = $search->return_hotel();


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

    <div class="col-md-6 col-lg-6">
        <?php
         while($data = mysql_fetch_array($res)){
             $ID = $data['Hotel_ID'];
             $name = $data['Hotel_Name'];
             echo '<a href="Hotel-profile.php?hotel_id='.$ID.'">'.$name.'</a>';
         }
        ?>
    </div>
    </div>
        </div>
    </body>
</html>