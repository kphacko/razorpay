<link rel="stylesheet"  href="css/style.css">
<?php
error_reporting(0);
ini_set('display_errors', 0);

require('config.php');
require('razorpay-php/Razorpay.php');
include_once('connect.php');

// session_start();

// Create the Razorpay Order
if (isset($_POST['submit']))
    {

        $fname =ucfirst(mysqli_real_escape_string($conn, $_POST['first_name']));
        $mname = ucfirst(mysqli_real_escape_string($conn, $_POST['middle_name']));
        $lname = ucfirst(mysqli_real_escape_string($conn, $_POST['last_name']));
        $address = ucfirst(mysqli_real_escape_string($conn, $_POST['address']));
        $dob = mysqli_real_escape_string($conn, $_POST['birth_date']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
        $tow = mysqli_real_escape_string($conn, $_POST['tow']);
        
        if ($_POST['gender']==='on') {

           $gen = "male";
        }
        else{
          $gen = "female";
        }
        // $marital = mysqli_real_escape_string($conn, $_POST['']);
        $aadhar = mysqli_real_escape_string($conn, $_POST['aadhar']);
        // $blood = mysqli_real_escape_string($conn, $_POST['']);
        // $place = mysqli_real_escape_string($conn, $_POST['']);
        // $date = mysqli_real_escape_string($conn, $_POST['']);
        $district = mysqli_real_escape_string($conn, $_POST['district']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        // $photo = mysqli_real_escape_string($conn, $_POST['form_fields[field_19]']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        // $pro = mysqli_real_escape_string($conn, $_POST['photo']);




        // photograph validation
         // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["file-input"]["tmp_name"])) {
        $response = array(
            "type" => "error",
            "message" => "Choose image file to upload."
        );
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
        $response = array(
            "type" => "error",
            "message" => "Upload valiid images. Only PNG and JPEG are allowed.",
            "status"=>"vs"
        );
        echo $result;
    }    // Validate image file size
    else if (($_FILES["file-input"]["size"] > 250000)) {
        $response = array(
            "type" => "error",
            "message" => "Image size exceeds 2MB",
            "status"=> "size"
        );
    }    // Validate image file dimension
     else if ($width > "300" || $height > "200") {
        $response = array(
            "type" => "error",
            "message" => "Image dimension should be within 300X200",
            "status"=> "dim"
        );
    }
    else {

$profileimage = $_FILES['file-input']['name'];
      $profiletarget = "img/profiles/".basename($profileimage);
      

        // $target = "img/profiles" . basename($_FILES["file-input"]["name"]);
      // move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)
        if (move_uploaded_file($_FILES['file-input']['tmp_name'], $profiletarget)) {
            $response = array(
                "type" => "success",
                "message" => "Image uploaded successfully.",
                "status"=> "suc"
            );
        } else {
            $response = array(
                "type" => "error",
                "message" => "Problem in uploading image files.",
                "status"=> "err"
            );
        }
    }

        // end
      }
      else {
        header("Location:form/index.php?stat=fm");
        exit();

      }
      if($response["status"]!='suc'){
        header("Location:form/index.php?stat=".$response["status"]);
        exit();

      }
     
      // $sql="DELETE FROM `member` WHERE STATUS=0";
      // mysqli_query($conn, $sql) or die(mysqli_error($conn));
      // $sql1="INSERT INTO `member`(`fname`, `mname`, `lname`, `dob`, `Gender`, `martial`, `phone`, `email`, `address`, `pincode`, `aadhar`, `blood`, `place`, `date`, `district`, `state`, `status`,'profile') VALUES ('$fname','$mname','$lname','$dob','$gen','$martial','$phone','$email','$address','$pincode','$aadhar','$blood','$place','$date','$district','$state',0,'$pro');";
      //           mysqli_query($conn, $sql1) or die(mysqli_error($conn));
      //           $id = $conn->insert_id;
      // mysqli_query($conn, $sql) or die(mysqli_error($conn));
      $sql1="INSERT INTO `member`(`fname`, `mname`, `lname`, `dob`, `Gender`, `phone`, `email`, `address`, `pincode`, `aadhar`, `district`, `state`, `status`,`profile`,`tow`) VALUES ('$fname','$mname','$lname','$dob','$gen','$phone','$email','$address','$pincode','$aadhar','$district','$state',0,'$profileimage','$tow');";
                mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                $id = $conn->insert_id;
                // echo $id;


use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => $id,
    'amount'          => 150 * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

// $_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

// if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
// {
//     $checkout = $_GET['checkout'];
// }

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Elgaar Union",
    "description"       => "Union fees",
    "image"             => "https://elgaar.com/wp-content/uploads/2019/07/cropped-Capture223.png",
    "prefill"           => [
    "name"              => $fname.' '.$lname,
    "email"             => $email,
    "contact"           => $phone,
    ],
    "notes"             => [
    "address"           => $address,

    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);
$sql2="UPDATE `member` SET payment_id='$razorpayOrderId' WHERE id=".$id;
 mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                    $c='';
                    $n=strlen($id);
                    $c=7-$n;
                    $b='';
                    while ($c!=0) { 
                        $b=$b.'0';
                        $c--;
                    }
                    
                    $nid=$b.$id;

 $sql3="UPDATE `member` SET kid='$nid' WHERE id=".$id;
 mysqli_query($conn, $sql3) or die(mysqli_error($conn));
 // echo $sql2;

require("checkout/{$checkout}.php");
