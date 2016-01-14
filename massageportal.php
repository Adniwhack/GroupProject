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
    </head>
<!-- Adding nav bar !-->
     <nav class="navbar navbar-default">
    <div class="container-fluid">
          <div class="navbar-header">
              <ul class="nav navbar-nav navbar-left">
                <li><a href="admin_portal.php"><span class="glyphicon glyphicon-arrow-left"><b><font size="4" color="#FFF" face="calibri light"> Back</font>
                </b></a></li>
                <li><img src="images/logo.png" height=50px width=50px align="left"></li>
              </ul>
          </div>
          <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
          <ul class="nav nav-pills navbar-right">
        
                <!--<li><a href="#"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#A7A79B">Rooms</font></b></span></a></li>-->
                <!--li><a href="#"><span class="glyphicon glyphicon-user"><b><font size="4" color="#A7A79B">Profile</font></b></span></a></li-->
                <!--<li><a href="#"><span class="glyphicon glyphicon-file"><b><font size="4" color="#A7A79B">Reports</font></b></span></a></li>-->
          <li><a href="index.html"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font>
          </b></a></li>
          <li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#FFF" face="calibri light"> AboutUs</font></b></a>
          </li>
          </ul>    
      </div>
  </nav>
  <body>
    <div class="container">
    
    
    
  <h2>Recieved emails</h2>
              
  <table class="table">
    <thead>
      <tr>
        <th>Hotel</th>
        <th>Date</th>
        <th>content</th>
        <th>Confirmation</th>
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

        $sql = "SELECT * FROM massage";
        $result = $conn->query($sql);
          
        
        //$conn->close();
        ?>
      <tr class="success">
          <?php
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["H_email"]."</td>"."<td>".$row["Date"]."</td>"."<td>".$row["Content"]."</td>";
                //echo ("<td><button class='btn btn-success' type='button' id='fire' ><i class='icon-ok'></i> Send Email</button></td>");
                if($row["Reply"]==0){
                echo ("<td><button class='btn btn-success' data-toggle='modal' data-target='#modalCompose' >
                      <i class='icon-ok'></i> 
                      Reply</button></td>
                      ");
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
                  <div class='col-sm-10'><input class='form-control' name='subject'id='inputSubject' placeholder='subject' type='text'></div>
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
                /*echo "<div class='modal fade' id='myModal' role='dialog'>
                <div class='modal-dialog modal-m'>
                <div class='modal-content'>
                <div class='modal-body' style='background-color:black'>
                <p align='center'> <font size='6' color='white' >  Are  you  sure  to  apprrove ?</font></p>
                </div>
                <div class='modal-footer' style='background-color:black'>
                <button type='button' class='btn btn-info btn-lg' id='fire'><a href='approve.php?email=".$row['email']."'>  Ok </a></button>
                <button type='button' class='btn btn-danger btn-lg' data-dismiss='modal'>Cancel</button>
                </div>
                </div>
                </div>
                </div>" ; */
                
                
            }
          }
                //echo "id:" . $row["email"]. " - Name: " . $row["username"]. " " . $row["Hotel_Name"]. "<br>";
            
        } else {
            echo "0 results";
        }
       
         //<!-- Adding the modle -->  
     
          ?>
    </tr>
      
    </tbody>
  </table>
</div>
  </body>

  <!-- /.modal compose message 
    <div class="modal show" id="modalCompose">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Compose Message</h4>
          </div>
          <div class="modal-body">
            <form role="form" class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-2" for="inputTo">To</label>
                  <div class="col-sm-10"><input class="form-control" id="inputTo" placeholder="comma separated list of recipients" type="email"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2" for="inputSubject">Subject</label>
                  <div class="col-sm-10"><input class="form-control" id="inputSubject" placeholder="subject" type="text"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12" for="inputBody">Message</label>
                  <div class="col-sm-12"><textarea class="form-control" id="inputBody" rows="18"></textarea></div>
                </div>
            </form>
          </div><a href="http://www.bootply.com/HjRwM57g5x#myModal" role="button" class="btn btn-default" data-toggle="modal">Launch demo modal</a>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>
</div>
</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button> 
            <button type="button" class="btn btn-warning pull-left">Save Draft</button>
            <button type="button" class="btn btn-primary ">Send <i class="fa fa-arrow-circle-right fa-lg"></i></button>
            
          </div>
        </div><!-- /.modal-content 
      </div> <!-- /.modal-dialog 
    </div> <!-- /.modal compose message --> 
  </html>