<?php
require_once("db_con.php");
mysql_select_db("ohrms",$con);
$username = $_GET["username"];
mysql_query("DELETE FROM hotel where username = '$username'");
echo "The selected record delete successfully";
mysql_close($con);
?>