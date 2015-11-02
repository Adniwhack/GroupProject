<?php
$to      = 'sandaminihimashi@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: ohrms2015@gmail.com' . "\r\n" .
    'Reply-To: ohrms2015@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?> 