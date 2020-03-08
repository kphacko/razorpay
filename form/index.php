<?php 
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (strpos($url, "stat=f") !== false) {
  echo '<script>
  alert("Payment Failed");
</script>';
}
elseif (strpos($url, "stat=fm") !== false) {
  echo '<script>
  alert("Invalid form");
</script>';
}
elseif (strpos($url, "stat=ims") !== false) {
  echo '<script>
  alert("Image size should be less than 250 Kb");
</script>';
}
elseif (strpos($url, "stat=err") !== false) {
  echo '<script>
  alert("Upload valid images.");
</script>';
}
elseif (strpos($url, "stat=vs") !== false) {
  echo '<script>
  alert("Upload valid images. Only PNG and JPEG are allowed.");
</script>';
}
elseif (strpos($url, "stat=size") !== false) {
  echo '<script>
  alert("Image size should be less than 250 Kb");
</script>';
}
elseif (strpos($url, "stat=dim") !== false) {
  echo '<script>
  alert("Image dimension should be within 300X200");
</script>';
}
elseif (strpos($url, "stat=reg") !== false) {
  echo '<script>
  alert("Registered sucessfully");
</script>';
}elseif (strpos($url, "stat=ref") !== false) {
  echo '<script>
  alert("Payment time Out");
</script>';
}elseif (strpos($url, "stat=pho") !== false) {
    echo '<script>
    alert("Phone Number is already exist!");
  </script>';
  }
else{

 
}
?>
<!DOCTYPE html>
<html lang="en">

<head><meta charset="windows-1252">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration - ELGAAR</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/cities.js"></script>
</head>

<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/3.jpg" style='height: 99.5%;object-fit: cover;' alt="">
                </div>
                <div class="signup-form">
                    <form name="myForm" method="POST" action="../pay.php" class="register-form"
                        id="register-form" enctype="multipart/form-data" onsubmit="return validateForm()">
                        <img src="images/header.png" alt="">


                        <script type="text/javascript">
                            function googleTranslateElementInit() {
                                new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE }, 'google_translate_element');
                            }
                        </script>

                        <script type="text/javascript"
                            src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                        <h2 style="padding-top: 20px">Kamgar Registration form <div style='float: right;'
                                id="google_translate_element">
                            </div>
                        </h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">First Name :</label>
                                <input type="text" name="first_name" id="name" required />
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Middle Name :</label>
                                <input type="text" name="middle_name" id="middle_name" required />
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name :</label>
                                <input type="text" name="last_name" id="last_name" required />
                            </div>
                        </div>
                        <div class="form-radio">
                            <label for="gender" class="radio-label">Gender :</label>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" id="male" value="male" checked>
                                <label for="male">Male</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" id="female" value="female"> 
                                <label for="female">Female</label>
                                <span class="check"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone :</label>
                            <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" minlength="10" maxlength="10"
                                required />
                        </div>

                        <div class="form-group">
                            <label for="address">Address :</label>
                            <input type="text" name="address" id="address" required />
                        </div>




                        <div class="form-row">
                            <div class="form-group">
                                <label for="state">State :</label>
                                <div class="form-select">
                                    <select onchange="print_city('state', this.selectedIndex);" id="sts" name="state"
                                        class="form-control" required></select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city">District :</label>
                                <div class="form-select">
                                    <select id="state" class="form-control" name="district" required></select>
                                    <script language="javascript">print_state("sts");</script>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pincode">Pincode :</label>
                            <input type="number" name="pincode" id="pincode" required>
                        </div>

                        <div class="form-group">
                            <label for="birth_date">DOB :</label>
                            <input type="date" name="birth_date" id="birth_date" style="text-transform: uppercase" required>
                        </div>


                        <div class="form-group">
                            <label for="email">Email ID :</label>
                            <input type="email" name="email" id="email" required/>
                        </div>

                        <div class="form-group">
                            <label for="aadhar">Aadhar :</label>
                            <input type="tel" pattern="[0-9]{12}" name="aadhar" id="aadhar" minlength='12' maxlength='12' required/>
                        </div>

                        <div class="form-group">
                            <label for="tow">Type of work :</label>
                            <input type="text" name="tow" id="aadhar" required/>
                        </div>
                        
                        <div class="form-radio">
                            <label for="post" class="radio-label">Post :</label>
                            <div class="form-radio-item">
                                <input type="radio" name="post" id="member" value="member" checked>
                                <label for="member">Member</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="post" id="unionworker" value="worker">
                                <label for="unionworker">Union Worker</label>
                                <span class="check"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="photo">Your Photo :</label>
                            <p style='text-transform: uppercase; font-family: Montserrat;'>Note : Image size should be less then 250 KB</p>
                            <p style='text-transform: uppercase; font-family: Montserrat;'>Image Dimensions Should be within 420 PX * 530 PX</p>
                            <input type="file" name="file-input" id="photo" required/>
                        </div>

                        <p style="font-family: Montserrat" for="accept">By submitting the form, I certify that I have read,
                            understand, and adhere to all
                            applicable guidelines and agreements as stated.</p>
                       

                        <div class="form-submit">
                            <input type="submit" value="Reset All" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Submit Form" class="submit" name="submit" id="submit" />
                        </div>


                    </form>
                    <p style="font-family: Montserrat; bottom: 0; font-weight: 500; text-align: center;">
                        with full energy, <a style="text-decoration: none;color: blue;" href="//daxy.in"
                            target="_blank">Team
                            Daxy ðŸš•</a></p>
                </div>
            </div>
        </div>

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
<!-- form validation  -->
<script>
function validateForm() {
    document.getElementById("myRadio").required = true;
    document.getElementById("myRadio").required = true;
  var x = document.forms["myForm"]["phone"].value;
   var phoneno = /^\d{10}$/;
  if((inputtxt.value.match(phoneno))
        {
      // return true;
        }
      else
        {
        alert("Enter valid number");
        return false;
        }
</script>


</body>

</html>