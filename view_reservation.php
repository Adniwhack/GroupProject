<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 10/18/2015
 * Time: 8:40 PM
 */
include "function.php";

$user_id = $_SESSION["customer_ID"];
$res = mysql_query("SELECT * FROM reservation WHERE UserID = '".$user_id."'");



?>



<html>
<body>
<?php
    $i = 1;
    while($data = mysql_fetch_array($res)){
        echo '<a href="modify_reservation.php?rid='.$data['ReservationID'].'>Reservation '.$i.'</a>';
    }
?>
</body>
</html>

