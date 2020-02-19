<?php
error_reporting(0);
ini_set('display_errors', 0);
require('config.php');

session_start();
include_once('connect.php');
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";
$id=$_POST['shopping_order_id'];

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
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
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
             $sql1="UPDATE `member` SET `status`= 1,`payment_id` = '".$_POST['razorpay_payment_id']."' WHERE id=".$id;
                       mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                       $sql="SELECT * From member WHERE id=".$id;
                       $result= mysqli_query($conn,$sql);
                       $row= mysqli_fetch_array($result);
                       $nu='0';
                       if(strlen($row['id'])<4){
                         $n=strlen($row['id']);
                         while($n!=0){

                        $cid=$cid.$nu;
                        $n=$n-1;
                        }
                        $cid=$cid.$row['id'];
                       }
                       $message=urlencode('Thank you! '.$row['name'].', for joining Elgaar. Your registration ID is '.$cid.'');
                       $url='http://text.daxy.in/http-api.php?username=daxy&password=Karan@7&senderid=ELGAAR&route=2&number='.$row['phone'].'&message='.$message.'';
                       $ch = curl_init();

                        // set URL and other appropriate options
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HEADER, 0);

                        // grab URL and pass it to the browser
                        curl_exec($ch);

                        // close cURL resource, and free up system resources
                        curl_close($ch);
                        echo $url;
                       header("Location:index.php?stat=ps");
                       exit();
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
             $sql1="UPDATE `member` SET `status`= 2,`payment_id` = '".$error."' WHERE id=".$id;
                       mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                       header("Location:index.php?stat=pf");
                       exit();
}

//echo $html;
