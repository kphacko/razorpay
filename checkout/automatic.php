<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style.css">
<style type="text/css">
  #pay,#pay2{
    font-size: 15px;
    position: relative;
    margin-left:20px;
  }
  .bold{
    font-weight: 700;
  }

</style>
<!--  The entire list of Checkout fields is available at
 https://docs.razorpay.com/docs/checkout-form#checkout-fields -->
<div class="container" style="margin-top: 25px;">
  <div class="row">
  <div class="col-md-4 mob"></div>
 <div class="col-md-4 "> 
<div class="card">
  <div class="card-header text-center">
    Confirm Payment Details
  </div>
  <img src="img/elgaar.png" style="width: 85%; margin: 10px auto;">
  <div class="card-body">
    <h5 id='pay2' class="card-title">Name : <span class="bold"><?php echo $data['prefill']['name']?></span></h5>
    <h5 id='pay2' class="card-title">Phone : <span class="bold"><?php echo $data['prefill']['contact']?></span></h5>
    <h5 id='pay2' class="card-title">E-mail : <span class="bold"><?php echo $data['prefill']['email']?></span></h5>

 
      <table class="table table-striped">
    <thead>
      <tr>
        <th>Particular</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Sangathana Registration</td>
        <td>130 ₹</td>
    
      </tr>
      <tr>
        <td>ID Generation</td>
        <td>20 ₹</td>
        
      </tr>
      <tr class="bold">
        <td>Total Amount</td>
        <td>150 ₹</td>
    
      </tr>
    </tbody>
  </table>
    <form class='text-center' style="margin-top: 20px;" action="verify.php" method="POST">
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount']?>"
    data-currency="INR"
    data-name="<?php echo $data['name']?>"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.name="<?php echo $data['prefill']['name']?>"
    data-prefill.email="<?php echo $data['prefill']['email']?>"
    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
    data-notes.shopping_order_id="<?php echo $orderData['receipt']?>"
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script>
  <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="shopping_order_id" value="<?php echo $orderData['receipt']?>">
</form>
  </div>
  <div class="card-footer text-muted">
    @Working with <a href="//daxy.in" target="_blank">Daxy.in</a>
</div>

</div>
<div class="col-md-4 mob"></div>
</div>
</div>
</div>