<?php
include 'function.php';

$log = new dbSearch();
$res = $log->adv_search(0,'',null,null,null,null) or die(mysql_error()) ;

while($dATA = mysql_fetch_array($res)){
    echo $dATA['email'];
}

?>

