<?php 
session_start();
include_once "connect.inc.php";
if(isset($_POST['submit'])) {
    $email=$_POST['email'];
    $pass=$_POST['pass'];  
    if(empty($email) || empty($pass)) {
      header("Location: ../login.php?login=empty");
      exit(); 
    }
    else{
        $sql="SELECT * FROM admin WHERE username='$email';"; 
        $result=mysqli_query($conn,$sql)or die("connection failed");

        if($row = mysqli_fetch_assoc($result)) {
            // Dehashing the password
            $hashedPassCheck = password_verify($pass, $row['pass']);
            if($hashedPassCheck == true) {
                $_SESSION['privilege'] = "admin";
                $_SESSION['id'] = $row['id'];
                header("Location: ../admin.php");
                exit();

                }else{
                    header("Location: ../login.php?login=error");
                    exit();
                }
    

    	}

?>