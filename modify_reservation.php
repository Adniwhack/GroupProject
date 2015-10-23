<?php


include "function.php";

if ($_GET['rid']){
    $rid = $_GET['rid'];
    $res = mysql_query("SELECT * from reservation WHERE ReservationID = '".$rid."'");
    $data = mysql_fetch_array($res);
    $checkin = $data['Checkin'];
    $checkout = $data['Checkout'];
    $status = $data['status'];

}

?>

<html>
    <body>
    <form name="modify" method="post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="date" name="Checkin" value="<?php echo $checkin ?>">
        <input type="date" name="Checkout" value="<?php echo $checkout?>">
        <select >

        </select>
    </form>
    </body>
</html>
