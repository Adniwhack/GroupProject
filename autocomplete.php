<!DOCTYPE html>
<html>
    <head>
        <script>
            $(function() {
 
    $("#topic_title").autocomplete({
        source: "/path/to/ajax_autocomplete.php",
        minLength: 2,
        select: function(event, ui) {
            var url = ui.item.id;
            if(url != '#') {
                location.href = '/blog/' + url;
            }
        },
 
        html: true, // optional (jquery.ui.autocomplete.html.js required)
 
      // optional (if other layers overlap autocomplete list)
        open: function(event, ui) {
            $(".ui-autocomplete").css("z-index", 1000);
        }
    });
 
});
        </script>
    </head>
<?php
$q = trim($_GET['term']);
        $my_data=mysql_real_escape_string($q);
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
        
        $sql = "SELECT roomid FROM reservation where roomid LIKE '%$my_data%' ORDER BY roomid";
        $result = $conn->query($sql);

 if($result)
 {
  while($row=mysqli_fetch_array($result))
  {
   echo $row['roomid']."\n";
  }
 }
?>
