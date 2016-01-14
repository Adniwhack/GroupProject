<?php 
require('function.php');

$db = new dbConnect();
 if (isset($_GET['email'])) {
                $del = $_GET['email'];
                //SQL query for deletion.
                $que = "delete from hotel where email='$del'";
                echo $que;
                $query1 = mysql_query($que);
                header("location:admin_account.php");
                }


?>