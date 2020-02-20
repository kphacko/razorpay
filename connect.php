<?php

$dbServername= "localhost";
// $dbUsername= strtolower('ELGAARCO_DB1');
// $dbPassword= "KDEKI04V46";
// $dbName= strtolower('ELGAARCO_DB1');

$dbUsername= 'root';
$dbPassword='' ;
$dbName= 'payment';


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Connection failed");

?>
