<link rel="stylesheet"  href="css/style.css">
<?php

require('config.php');
require('razorpay-php/Razorpay.php');
include_once('connect.php');

session_start();

// Create the Razorpay Order
if (isset($_POST['submit']))
    {

        $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
        $mname = mysqli_real_escape_string($conn, $_POST['middle_name']);
        $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $dob = mysqli_real_escape_string($conn, $_POST['birth_date']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
        $gen = mysqli_real_escape_string($conn, $_POST['gender']);
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
      }
      else {
        header("Location:index.php?stat=f");
        exit();

      }
      $profileimage = $_FILES['photo']['first_name'];
      $profiletarget = "img/profiles/".basename($profileimage);

      $sql="DELETE FROM `member` WHERE STATUS=0";
      // mysqli_query($conn, $sql) or die(mysqli_error($conn));
      // $sql1="INSERT INTO `member`(`fname`, `mname`, `lname`, `dob`, `Gender`, `martial`, `phone`, `email`, `address`, `pincode`, `aadhar`, `blood`, `place`, `date`, `district`, `state`, `status`,'profile') VALUES ('$fname','$mname','$lname','$dob','$gen','$martial','$phone','$email','$address','$pincode','$aadhar','$blood','$place','$date','$district','$state',0,'$pro');";
      //           mysqli_query($conn, $sql1) or die(mysqli_error($conn));
      //           $id = $conn->insert_id;
      mysqli_query($conn, $sql) or die(mysqli_error($conn));
      $sql1="INSERT INTO `member`(`fname`, `mname`, `lname`, `dob`, `Gender`, `phone`, `email`, `address`, `pincode`, `aadhar`, `district`, `state`, `status`,'profile') VALUES ('$fname','$mname','$lname','$dob','$gen','$phone','$email','$address','$pincode','$aadhar','$district','$state',0,'$pro');";
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
