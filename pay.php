<link rel="stylesheet"  href="css/style.css">
<?php

require('config.php');
require('razorpay-php/Razorpay.php');
include_once('connect.php');

session_start();

// Create the Razorpay Order
if (isset($_POST['submit']))
    {

        $fname = mysqli_real_escape_string($conn, $_POST['form_fields[field_27]']);
        $mname = mysqli_real_escape_string($conn, $_POST['form_fields[field_3]']);
        $lname = mysqli_real_escape_string($conn, $_POST['form_fields[field_2]']);
        $address = mysqli_real_escape_string($conn, $_POST['form_fields[field_17]']);
        $dob = mysqli_real_escape_string($conn, $_POST['form_fields[field_9]']);
        $phone = mysqli_real_escape_string($conn, $_POST['form_fields[field_10]']);
        $pincode = mysqli_real_escape_string($conn, $_POST['form_fields[field_18]']);
        $gen = mysqli_real_escape_string($conn, $_POST['form_fields[field_16]']);
        $marital = mysqli_real_escape_string($conn, $_POST['form_fields[field_30]']);
        $aadhar = mysqli_real_escape_string($conn, $_POST['form_fields[field_15]']);
        $blood = mysqli_real_escape_string($conn, $_POST['form_fields[field_1]']);
        $place = mysqli_real_escape_string($conn, $_POST['form_fields[field_14]']);
        $date = mysqli_real_escape_string($conn, $_POST['form_fields[field_25]']);
        $district = mysqli_real_escape_string($conn, $_POST['stt']);
        $state = mysqli_real_escape_string($conn, $_POST['form_fields[field_4]']);
        // $photo = mysqli_real_escape_string($conn, $_POST['form_fields[field_19]']);
        $email = mysqli_real_escape_string($conn, $_POST['form_fields[field_78]']);
        $pro = mysqli_real_escape_string($conn, $_POST['form_fields[field_78]']);
      }
      else {
        header("Location:index.php?stat=f");
        exit();

      }
      $profileimage = $_FILES['form_fields[field_19]']['form_fields[field_27]'];
      $profiletarget = "img/profiles/".basename($profileimage);

      $sql="DELETE FROM `member` WHERE STATUS=0";
      mysqli_query($conn, $sql) or die(mysqli_error($conn));
      $sql1="INSERT INTO `member`(`fname`, `mname`, `lname`, `dob`, `Gender`, `martial`, `phone`, `email`, `address`, `pincode`, `aadhar`, `blood`, `place`, `date`, `district`, `state`, `status`,'profile') VALUES ('$fname','$mname','$lname','$dob','$gen','$martial','$phone','$email','$address','$pincode','$aadhar','$blood','$place','$date','$district','$state',0,'$pro');";
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
    'amount'          => 149 * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

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
    "name"              => "Karan Patil",
    "description"       => "Union fees",
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => $name,
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

require("checkout/{$checkout}.php");
