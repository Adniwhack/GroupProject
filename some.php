<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['datefilter'])){
    echo $_POST['datefilter'];
    $date = explode(' - ',$_POST['datefilter'] );
     //$sql = "SELECT * FROM log WHERE call_date >= DATE_FORMAT('" . $from . "', '%Y%m%d') AND call_date <=  DATE_FORMAT('" . $to . "', '%Y%m%d')";
    $stdate = $date[0];
    ;
    $startDate = date('Y-m-d',strtotime($stdate));
    $endate = $date[1];
    $endDate = date('Y-m-d',strtotime($endate));
    
}

