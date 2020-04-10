<?php
 // session_start();
// error_reporting(0);
// ini_set('display_errors', 0);
require('config.php');
include_once('connect.php');
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";
$id=$_POST['shopping_order_id'];
$sql3="SELECT * from member where id=".$id;
$result3= mysqli_query($conn,$sql3);
$row3= mysqli_fetch_array($result3);

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $row3['payment_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
  $mydate=getdate(date("U"));
$date="$mydate[mday] $mydate[month], $mydate[year]";
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
             $sql1="UPDATE `member` SET `status`= 1,`date`='".$date."',`payment_id` = '".$_POST['razorpay_payment_id']."' WHERE id=".$id;
                       mysqli_query($conn, $sql1) or die(mysqli_error($conn));


                       $sql="SELECT * From member WHERE id=".$id;
                       $result= mysqli_query($conn,$sql);
                       $row= mysqli_fetch_array($result);
                        
                        //copying the verified id to new table
        $fname = $row['fname'];
        $mname = $row['mname'];
        $lname = $row['lname'];
        $address =$row['address'];
        $dob =  $row['dob'];
        $phone =  $row['phone'];
        $pincode =  $row['pincode'];
        $tow =  $row['tow'];
        $gen=$row['Gender'];
        $post=$row['post'];
        $aadhar =  $row['aadhar'];
        $district =  $row['district'];
        $state =  $row['state'];
        $email =  $row['email'];
        $status =  $row['status'];
        $profileimage =  $row['profile'];
        $payment_id =  $row['payment_id'];
        $date =  $row['date'];
        
        
        $file='profiles/'.$profileimage;
        chmod($file, 0755); 
        $sql5="SELECT * From verified ORDER BY id DESC LIMIT 1";
        $result5= mysqli_query($conn,$sql5);
        $row5= mysqli_fetch_array($result5);
        $nid=$row5['id']+1;
        $prod='id'.$nid;        

$filename=$file;

$extension=end(explode(".", $filename));
$newfilename=$prod .".".$extension;
rename($filename, 'profiles/'.$newfilename);
copy('profiles/'.$newfilename, 'verified/'.$newfilename);

echo $file;
 $sql1="INSERT INTO `verified`(`fname`, `mname`, `lname`, `dob`, `Gender`, `phone`, `email`, `address`, `pincode`, `aadhar`, `district`, `state`, `status`,`profile`,`tow`,`post`,`payment_id`,`date`) VALUES ('$fname','$mname','$lname','$dob','$gen','$phone','$email','$address','$pincode','$aadhar','$district','$state','$status','$profileimage','$tow','$post','$payment_id','$date');";
                mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                $id = $conn->insert_id;

$c='';
                    $n=strlen($id);
                    $c=7-$n;
                    $b='';
                    while ($c!=0) { 
                        $b=$b.'0';
                        $c--;
                    }
                    
                    $nid=$b.$id;

 $sql3="UPDATE `verified` SET kid='$nid' WHERE id=".$id;
 mysqli_query($conn, $sql3) or die(mysqli_error($conn));


}

// $sql8="SELECT * From verified WHERE id=".$id;
//                        $result8= mysqli_query($conn,$sql8);
//                        $row8= mysqli_fetch_array($result8);


//                        $message=urlencode('Payment successful! '.$row8['fname'].' '.$row8['lname'].' we have received your registration form. Our Team will contact you soon.');
//                        $url='http://text.daxy.in/http-api.php?username=daxy&password=Karan@7&senderid=ELGAAR&route=2&number='.$row8['phone'].'&message='.$message.'';
//                        $ch = curl_init();

//                         // set URL and other appropriate options
//                         curl_setopt($ch, CURLOPT_URL, $url);
//                         curl_setopt($ch, CURLOPT_HEADER, 0);

//                         // grab URL and pass it to the browser
//                         curl_exec($ch);

//                         // close cURL resource, and free up system resources
//                         curl_close($ch);
//                         //echo $url;
//                        // header("Location:ID/id.php?id=".$id);
//                        // exit();
//                         session_start();
//   session_unset();
//   session_destroy();
//   echo "<script>window.open('ver.php?stat=v&id=".$id."','_self')</script>";
//    // echo "<script>window.open('form/index.php?stat=reg','_self')</script>";
// }
// else
// {
//   session_start();
//   session_unset();
//   session_destroy();
//     $html = "<p>Your payment failed</p>
//              <p>{$error}</p>";
//              $sql1="UPDATE `member` SET `status`= 2,`payment_id` = '".$error."' WHERE id=".$id;
//                        mysqli_query($conn, $sql1) or die(mysqli_error($conn));
//                        // header("Location:form/index.php?stat=f");
//                        // exit();
//                        echo "<script>window.open('form/index.php?stat=f','_self')</script>";
// }


// // Your registration ID is '.$row['kid'].'
