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
                       
                       $message=urlencode('Payment successful & Thank you! '.$row['fname'].' '.$row['lname'].', we have received your registration form. Our Team will contact you soon.');
                       $url='http://text.daxy.in/http-api.php?username=daxy&password=Karan@7&senderid=ELGAAR&route=2&number='.$row['phone'].'&message='.$message.'';
                       $ch = curl_init();

                        // set URL and other appropriate options
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HEADER, 0);

                        // grab URL and pass it to the browser
                        curl_exec($ch);

                        // close cURL resource, and free up system resources
                        curl_close($ch);
                        //echo $url;
                       // header("Location:ID/id.php?id=".$id);
                       // exit();
                        session_start();
  session_unset();
  session_destroy();
                        echo "<script>window.open('form/index.php?stat=reg','_self')</script>";
}
else
{
  session_start();
  session_unset();
  session_destroy();
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
             $sql1="UPDATE `member` SET `status`= 2,`payment_id` = '".$error."' WHERE id=".$id;
                       mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                       header("Location:form/index.php?stat=f");
                       exit();
}


// Your registration ID is '.$row['kid'].'