<?php
include_once 'connect.php';
// include_once 'header.php';
$id=$_GET['id'];
$sql3="UPDATE `verified` SET status=3 WHERE id=".$id;
 mysqli_query($conn, $sql3) or die(mysqli_error($conn));

 // header("Location:send.php?stat=v&id=".$id);
 //        exit();
 echo "<script>window.open('send.php?stat=v&id=".$id."','_self')</script>";


?>