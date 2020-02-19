<link rel="stylesheet"  href="css/style.css">
<?php

require('config.php');
require('razorpay-php/Razorpay.php');
include_once('connect.php');

session_start();

// Create the Razorpay Order
if (isset($_POST['submit']))
    {

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $address = mysqli_real_escape_string($conn, $_POST['addr']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $pincode = mysqli_real_escape_string($conn, $_POST['pin']);
      }
      else {
        header("Location:index.php?stat=f");
        exit();

      }
      $sql1="INSERT INTO member (`name`, `email`,`phone`,`address`, `pincode`)
                VALUES ('$name','$email',$phone,'$address','$pincode');";
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
