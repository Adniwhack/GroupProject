<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <style>
      .captcha, #recaptcha_image, #recaptcha_image img {
    width:100% !important;
}
.navbar {
    color: #FFFFFF;
    background-color: #161640;
}

/* OR*/

.nav {
    color: #FFFFFF;
    background-color: #161640;
  
.nav-pills > li > a {
  color: #A7A79Bf;
  font-family: 'Oswald', sans-serif;
  font-size: 0.8em ;
  padding: 1px 1px 1px ;
}



      </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script><xp:panel id="dynamicPanel">
  <xp:button id="dynamicButton1">
    <xp:this.styleClass>
      <![CDATA[#{javascript:
        if (viewScope.get("dynamicButton1") == "set") {
          return "btn btn-success";
        } else {
          return "btn btn-primary";
        }
      }]]>
    </xp:this.styleClass>
    <xp:this.value>
      <![CDATA[#{javascript:
        if (viewScope.get("dynamicButton1") == "set") {
          return " Sent successfully!";
        } else {
          return " Send message";
        }
      }]]>
    </xp:this.value>
    <xp:text id="dynamicIcon1" tagName="i">
      <xp:this.styleClass>
        <![CDATA[#{javascript:
          if(viewScope.get("dynamicButton1") == "set") {
            return "icon-ok";
          } else {
            return "icon-envelope";
          }
        }]]>
      </xp:this.styleClass>
    </xp:text>
    <xp:eventHandler event="onclick" submit="true" refreshMode="partial" refreshId="dynamicPanel">
      <xp:this.action>
        <![CDATA[#{javascript:
          if(viewScope.get("dynamicButton1") != "set") {
            viewScope.put("dynamicButton1", "set");
          } else {
            viewScope.put("dynamicButton1", "");
          }
        }]]>
      </xp:this.action>
    </xp:eventHandler>
  </xp:button>
</xp:panel></script>
  
  <script>
  $('#fire').on('click', function (e) {

     
<xp:panel id="dynamicPanel">
  <xp:button id="dynamicButton1">
    <xp:this.styleClass>
      <![CDATA[#{javascript:
        if (viewScope.get("dynamicButton1") == "set") {
          return "btn btn-success";
        } else {
          return "btn btn-primary";
        }
      }]]>
    </xp:this.styleClass>
    <xp:this.value>
      <![CDATA[#{javascript:
        if (viewScope.get("dynamicButton1") == "set") {
          return " Sent successfully!";
        } else {
          return " Send message";
        }
      }]]>
    </xp:this.value>
    <xp:text id="dynamicIcon1" tagName="i">
      <xp:this.styleClass>
        <![CDATA[#{javascript:
          if(viewScope.get("dynamicButton1") == "set") {
            return "icon-ok";
          } else {
            return "icon-envelope";
          }
        }]]>
      </xp:this.styleClass>
    </xp:text>
    <xp:eventHandler event="onclick" submit="true" refreshMode="partial" refreshId="dynamicPanel">
      <xp:this.action>
        <![CDATA[#{javascript:
          if(viewScope.get("dynamicButton1") != "set") {
            viewScope.put("dynamicButton1", "set");
          } else {
            viewScope.put("dynamicButton1", "");
          }
        }]]>
      </xp:this.action>
    </xp:eventHandler>
  </xp:button>
</xp:panel>

})</script>
</head>
<nav class="navbar navbar-default">
    <div class="container-fluid">
          <div class="navbar-header">
              <ul class="nav navbar-nav navbar-left">
                
                <li><img src="images/logo.png" height=50px width=50px align="left"></li>
              </ul>
          </div>
          <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
          <ul class="nav nav-pills navbar-right">
            <li><a href="admin_portal.php"><span class="glyphicon glyphicon-arrow-left"><b><font size="4" color="#FFF" face="calibri light"> Back</font>
                </b></a></li>
          <li><a href="index.html"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font>
          </b></a></li>
          <li><a href="admin_logout.php"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#FFF" face="calibri light">Logout</font></b></a></li>
          </ul>
          
          
      </div>
  </nav>
<body>

<div class="container">
    
    
    
  <h2 align="center"><b>Registered hotel details of the System</b></h2>
              
  <table class="table">
    <thead>
      <tr>
        <th>Email</th>
        <th>Hotel Name</th>
        <th>City</th>
        <th>Address</th>
        <th>Message</th>
        
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
                <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ohrms";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT email,Hotel_Name,City,address FROM hotel where Approve=1";
        $result = $conn->query($sql);
          
        
        //$conn->close();
        ?>
      <tr class="success">
          <?php
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["email"]."</td>"."<td>".$row["Hotel_Name"]."</td>"."<td>".$row["City"]."</td>"."<td>".$row["address"]."</td>";
                //echo ("<td><button class='btn btn-success' type='button' id='fire' ><i class='icon-ok'></i> Send Email</button></td>");
                echo ("<td><button class='btn btn-success' data-toggle='modal' data-target='#modalCompose' ><i class='icon-ok'></i>Send</button></td>
                      ");
                // Adding modal
                echo("<div class='modal fade' id='modalCompose'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
            <h4 class='modal-title'>Compose Message</h4>
          </div>
          <div class='modal-body'>
            <form role='form' method='post' action='send_mail.php' class='form-horizontal'>
                <div class='form-group'>
                  <label class='col-sm-2' for='inputTo'>To</label>
                  <div class='col-sm-10'><input class='form-control' placeholder='comma separated list of recipients' name='to' id='inputTo' type='email'>
                  </div>
                </div>
                <br>
                <div class='form-group'>
                  <label class='col-sm-2' for='inputSubject'>Subject</label>
                  <div class='col-sm-10'><input class='form-control' name='subject' id='inputSubject' placeholder='subject' type='text'></div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-12' for='inputBody'>Message</label>
                  <div class='col-sm-12'><textarea class='form-control' name='content' id='inputBody' rows='18'></textarea></div>
                </div>
                <br><br>
                <div class='form-group' align = 'right'>
                 <input type='button' class='btn btn-danger btn-md' data-dismiss='modal' value='Cancel' >
                 <input class='btn btn-primary' type='submit' value='Send' >
                </div>
                
            </form>
          </div>

        </div>
      </div> 
    </div>");
               
                echo ("<td><button class='btn btn-danger' data-toggle='modal' data-target='#myModal2'>
                      <i class='icon-warning-sign'></i>
                       Delete</a></button></td> </tr>");
                echo "<div class='modal fade' id='myModal2' role='dialog'>
                <div class='modal-dialog modal-m'>
                <div class='modal-content'>
                <div class='modal-body' style='background-color:black'>
                <p align='center'> <font size='6' color='white' >  Are you sure to delete the hotel ?</font></p>
                </div>
                <div class='modal-footer' style='background-color:black'>
                <button type='button' class='btn btn-info btn-lg' id='fire'><a href='delete_hotel.php?email=".$row['email']."'>  Ok </a></button>
                <button type='button' class='btn btn-danger btn-lg' data-dismiss='modal'>Cancel</button>
                </div>
                </div>
                </div>
                </div>" ;
            }
            
            
        } else {
            echo "0 results";
        }
       
         //<!-- Adding the modle -->  
     
          ?>
    </tr>
      
    </tbody>
  </table>
</div>
<div class="col-md-4" ></div>

<div class="col-md-4" >
<a class="btn btn-primary btn-lg" button type="button" href="admin_account.php" role="button">Login to Email</a>
</div>
</body>
<!--footer start here-->
<!--description before footer-->
<br><br><br>
<div class="container">
<div class="col-sm-8 col-sm-offset-2 text-center">
<h4>
<a href="homepage.php">OHRMS</a>
</h4>
<p><b><font color="#161640">"Smarter choice for your business and vacation plans in Sri Lanka"</font></b></p>
<hr>
<!-- starting of facebook icons-->
<p> Join Us On </p>
<ul class="list-inline center-block">
<li><a href="#"><img src="hotelimages/facebook.png"></a></li>
<li><a href="#"><img src="hotelimages/twitter.png"></a></li>
<li><a href="#"><img src="hotelimages/google.png"></a></li>
<li><a href="#"><img src="hotelimages/youtube.png"></a></li>
</ul>

</div><!--/col-->
</div><!--/container-->
<!-- scroll up button-->
<ul class="nav pull-right scroll-top">
<li><a href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
</ul>
<script>
$('.scroll-top').click(function(){
$('body,html').animate({scrollTop:0},1000);
})
</script>
<!--footer-->
<div id="footer">
<div class="container">
<div class="row">
<div class="col-sm-4">
<p><a href="homepage.php"> Online Hotel Reservation and Management System</a></p>
</div> 
<div class="col-sm-4">
</div>
<div class="col-sm-4">
<font color="#fff">© 2016 All Rights Reserved</font>
</div>
</div>
</div>


</div>
<!--footer end-->
<style>
#footer {
height: 80px;
background-color: #161640;
margin-top:50px;
padding-top:20px;


}
#footer {
background-color:#161640;
}
#footer a {
color:#efefef;
}
#footer > .container {

}
</style>
<!--footer end here-->
</html>
