<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OHRMS Home Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		
    <![endif]-->
	
<style>
img {
  
    margin-bottom:20px;
}


</style>	
	
<script>
function validatedate(inputText)
  {  
  var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;  
  // Match the date format through regular expression  
  if(inputText.value.match(dateformat))  
  {  
  document.form1.checkin.focus();  
  //Test which seperator is used '/' or '-'  
  var opera1 = inputText.value.split('/');  
  var opera2 = inputText.value.split('-');  
  lopera1 = opera1.length;  
  lopera2 = opera2.length;  
  // Extract the string into month, date and year  
  if (lopera1>1)  
  {  
  var pdate = inputText.value.split('/');  
  }  
  else if (lopera2>1)  
  {
  var pdate = inputText.value.split('-');  
  }  
  var dd = parseInt(pdate[0]);  
  var mm  = parseInt(pdate[1]);  
  var yy = parseInt(pdate[2]);  
  // Create list of days of a month [assume there is no leap year by default]  
  var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];  
  if (mm==1 || mm>2)  
  {  
  if (dd>ListofDays[mm-1])  
  {  
  alert('Invalid date format!');  
  return false;  
  }  
  }
 if (mm==2)  
  {
  var lyear = false;  
  if ( (!(yy % 4) && yy % 100) || !(yy % 400))
{  
  lyear = true;  
  }  
  if ((lyear==false) && (dd>=29))  
  {  
  alert('Invalid date format!');  
  return false;  
  }  
  if ((lyear==true) && (dd>29))  
  {  
  a
lert('Invalid date format!');  
  return false;  
  }  
  }  
  }  
  else  
  {  
  alert("Invalid date format!");  
  document.form1.checkin.focus();  
  return false;  
  }  
  } 
  </script>
  
  <script>
function validatedate(inputText)
  {  
  var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;  
  // Match the date format through regular expression  
  if(inputText.value.match(dateformat))  
  {  
  document.form1.checkout.focus();  
  //Test which seperator is used '/' or '-'  
  var opera1 = inputText.value.split('/');  
  var opera2 = inputText.value.split('-');  
  lopera1 = opera1.length;  
  lopera2 = opera2.length;  
  // Extract the string into month, date and year  
  if (lopera1>1)  
  {  
  var pdate = inputText.value.split('/');  
  }  
  else if (lopera2>1)  
  {
  var pdate = inputText.value.split('-');  
  }  
  var dd = parseInt(pdate[0]);  
  var mm  = parseInt(pdate[1]);  
  var yy = parseInt(pdate[2]);  
  // Create list of days of a month [assume there is no leap year by default]  
  var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];  
  if (mm==1 || mm>2)  
  {  
  if (dd>ListofDays[mm-1])  
  {  
  alert('Invalid date format!');  
  return false;  
  }  
  }
 if (mm==2)  
  {
  var lyear = false;  
  if ( (!(yy % 4) && yy % 100) || !(yy % 400))
{  
  lyear = true;  
  }  
  if ((lyear==false) && (dd>=29))  
  {  
  alert('Invalid date format!');  
  return false;  
  }  
  if ((lyear==true) && (dd>29))  
  {  
  a
lert('Invalid date format!');  
  return false;  
  }  
  }  
  }  
  else  
  {  
  alert("Invalid date format!");  
  document.form1.checkout.focus();  
  return false;  
  }  
  } 
  </script>
  

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <!--button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button-->
				<ul class="nav navbar-nav navbar-left"><li><img src="hotelimages/logotra.png" height=100px width=100px align="left"></li></ul>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <!--i class="fa fa-play-circle"></i-->  <!--span class="light">Online Hotel Reservation and Management System</span--> 
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					<li>
                        <a class="page-scroll" href="#search">Search</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#loginsignup">Login & Sign up</a>
                    </li>
                    
                
                  
					<li>
                        <a class="page-scroll" href="#Explore Sri Lanka">Gallery</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact Us</a>
                    </li>
				
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!--h1 class="brand-heading">OHRMS </h1-->
                        <p class="intro-text"><font color="white" size="50"><b> Online Hotel Reservation and Management System</b></font> <br> <br>Let's get started for your next vacation!</p>
                        <a href="#search" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- search Section -->
    <section id="search" class="container content-section text-center" >
      <h2><font color="black">Search</font></h2>
				<!--form-->
		<form action="hotel_list-on-search.php" name="search" method="post">
  			<div class="form-group">
				<!--searchin city-->
				<label for="searchin"><font size="4" color="black" ><b>Search in:</b></font></label><br>
				
				<select class="form-control" name="city" >
					
					<option value="Colombo">Colombo</option>
					<option value="Galle">Galle</option>
					<option value="Hikkaduwa">Hikkaduwa</option>
					<option value="Unawatuna">Unawatuna</option>
				</select>
        <br>
       
    
				
				<!--for destination type-->
				<label for="for"><font size="4" color="black"><b>For:</b></font></label><br>
				<input type="text" id="for" class="form-control" name="hotelname" placeholder="hotels,guesthouses,etc." >
				
			
				
				
				
				<!--checkin-->
				<!--label for="checkin"><font size="4" color="black"><b>Check in <span class="glyphicon glyphicon-calendar"></span>:</b></font></label>
				<input type="date" id="checkin" name="checkin" class="form-control" placeholder="dd/mm/yyyy or dd-mm-yyyy" onmouseout="validatedate(document.form1.checkin)">
				<!--checkout-->
				<!--label for="checkout"><font size="4" color="black"><b>Check out <span class="glyphicon glyphicon-calendar"></span>:</b></font></label>
				<input type="date" id="checkout" name="checkout" class="form-control" placeholder="dd/mm/yyyy or dd-mm-yyyy" onmouseout= "validatedate(document.form1.checkout)"--!>
			
				<br><br>
				<!--submit button-->
				<button type="submit" class="btn btn-default pull-right"><font size="4" color="black"><b>Check</b></font></button>
		
				
				
			</div>
		</form>
		</section>
		<!-- login sign up Section -->
	<section id="loginsignup" class="container content-section text-center" >
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
               <h2><font color="black">login and Sign Up</font></h2>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="hotel_login.php" class="btn btn-default btn-lg"><span class="network-name"><b>Hotel</b></span></a>
                    </li>
                    <li>
                        <a href="user_login.php" class="btn btn-default btn-lg"><span class="network-name"><b>Visitor</b></span></a>
                    </li>
                    
                </ul>
            </div>
        </div>
		
    </section>

		<!-- Gallery Section -->
		<section id="Explore Sri Lanka" class="container content-section text-center">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<h1><font color="black">Explore Sri Lanka</font></h1>
				</div>
			</div>
		<hr>
			<div class="container">
	<div class="row">
		<div class="col-md-4 col-sm-6 col-xs-12"><img class="img-responsive" src="image1/jaffna.png" /></div>
        <div class="col-md-4 col-sm-6 col-xs-12"><img class="img-responsive" src="image1/picture2.jpg" /></div>
        <div class="col-md-4 col-sm-6 col-xs-12"><img class="img-responsive" src="image1/kandy.png" /></div>
        <div class="col-md-4 col-sm-6 col-xs-12"><img class="img-responsive" src="image1/picture1.jpg" /></div>
		 <div class="col-md-4 col-sm-6 col-xs-12"><img class="img-responsive" src="image1/picture5.jpg" /></div>
    	<div class="col-md-4 col-sm-6 col-xs-12"><img class="img-responsive" src="image1/upcountry.png" /></div>
        <div class="col-md-4 col-sm-6 col-xs-12"><img class="img-responsive" src="image1/yala.jpg" /></div>
	    <div class="col-md-4 col-sm-6 col-xs-12"><img class="img-responsive" src="image1/picture3.jpg" /></div>
        <div class="col-md-4 col-sm-6 col-xs-12"><img class="img-responsive" src="image1/mirissa.png" /></div>
    </div>
</div>
			
		</section>
		
	
    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2><font color="black">Contact Us</font></h2>
                <p><font color="black">Feel free to contact us!</font></p>
                <p><a href="mailto:ohrms2015@gmail.com">ohrms2015@gmail.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="#" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                    <li>
                        <a href="#" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <!--li>
                        <a href="#" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li!-->
                    <li>
                        <a href="#" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>
            </div>
        </div>
		</div>
    </section>

    <!-- Map Section -->
    <!--div id="map"></div-->

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; OHRMS 2015</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

</body>

</html>
