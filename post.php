<?php
$id=$_GET['id'];
$p=$_POST['post'];
echo $p;
include 'connect.php';
$sql3="UPDATE `member` SET post='$p' WHERE id=".$id;
 mysqli_query($conn, $sql3) or die(mysqli_error($conn));

 header("Location:admin.php?stat=c");
        exit();

?>