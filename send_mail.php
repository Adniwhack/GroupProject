<?php
require('function.php');
$db = new dbConnect();

$to= $_POST['to'];
echo $to;
echo ("<br>");
$subject = $_POST['subject'];
echo $subject;
echo ("<br>");
$massage = $_POST['content'];
echo $massage;
echo ("<br>");
$headers = 'From: ohrms2015@gmail.com' . "\r\n" .
    'Reply-To: ohrms2015@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();




//$que1 = "Update massage set reply_mail='$massage' where H_email='$to'";
//$que2 = "Update massage set Reply=1 where H_email='$to'";
//mysql_query($que1);
//mysql_query($que2);

//mail($to, $subject, $message, $headers);
//header("location:massageportal.php");
?>