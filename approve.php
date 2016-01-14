<?php 

require('function.php');
$db = new dbConnect();
$Email=$_GET['email'];

$que = "Update hotel set Approve=1 where email='$Email'";
mysql_query($que);

$to      = $Email;
$subject = 'The Confirmation mail';
$message = 'We have approved your request. Now you can login to the system using your password';
$headers = 'From: ohrms2015@gmail.com' . "\r\n" .
    'Reply-To: ohrms2015@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

header("location:admin_account.php");


?>