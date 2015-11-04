<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
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

     <?php
$to      = 'sandaminihimashi@gmail.com';
$subject = 'The Confirmation';
$message = 'We have approved your request. Please go through the below link and login using your password';
$headers = 'From: ohrms2015@gmail.com' . "\r\n" .
    'Reply-To: ohrms2015@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>
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
<body>

<div class="container">
    
    
    
  <h2>Hotel Details of the System</h2>
              
  <table class="table">
    <thead>
      <tr>
        <th>Email</th>
        <th>User Name</th>
        <th>Hotel Name</th>
        <th>City</th>
        <th>Address</th>
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

        $sql = "SELECT * FROM hotel";
        $result = $conn->query($sql);
          
        
        //$conn->close();
        ?>
      <tr class="success">
          <?php
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["email"]."</td>"."<td>".$row["username"]."</td>"."<td>".$row["Hotel_Name"]."</td>"."<td>".$row["City"]."</td>"."<td>".$row["address"]."</td>";
                echo ("<td><button class='btn btn-success' type='button' id='fire' ><i class='icon-ok'></i> Send Email</button></td>");
                echo ("<td><button class='btn btn-danger' type='button'><i class='icon-warning-sign'></i> <a href='delete.php?email=".$row['email']."'>Delete</a></button></td> </tr>");

            }
                //echo "id:" . $row["email"]. " - Name: " . $row["username"]. " " . $row["Hotel_Name"]. "<br>";
            
        } else {
            echo "0 results";
        }
            
          ?>
    </tr>
      
    </tbody>
  </table>
</div>

</body>
</html>
