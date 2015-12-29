<?php 

require('function.php');
$db = new dbConnect();
$Email=$_GET['email'];

$que = "Update hotel set Approve=1 where email='$Email'";
mysql_query($que);
header("location:admin_account.php");
/*
 if (isset($_GET['email'])) {
                $del = $_GET['email'];
                //SQL query for deletion.
                $que = "delete  from hotel where email='$del'";
                echo $que;
                $query1 = mysql_query($que);
                //header("location:admin_account.php");
                }
                */

?>