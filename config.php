<?php

include_once('connect.php');
$sqlm="SELECT * from admin where id=2";
$resultm= mysqli_query($conn,$sqlm);
$rowm= mysqli_fetch_array($resultm);
$keyId = $rowm['key_id'];
$keySecret = $rowm['key_secret'];
$displayCurrency = 'INR';


//These should be commented out in production
// This is for error reporting
// Add it to config.php to report any errors
error_reporting(0);
ini_set('display_errors', 0);
