<?php
$password = password_hash("lol", PASSWORD_BCRYPT);
$hash = '$2y$10$kR3g2cE0kE2XIMV/tXu0IegwR0zR.B9z6SOBxTY/p4n3khKfsUpJq';
$Resx = password_verify("lol", $hash);
$res = password_verify("lol", $password);


echo $Resx == 0;
 ?>