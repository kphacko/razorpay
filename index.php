<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

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
                    <img src="images/2.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" action="pay.php" class="register-form"
                        id="register-form">
                        <h2>Registration form</h2>
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
                                <input type="radio" name="gender" id="male" checked>
                                <label for="male">Male</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" id="female">
                                <label for="female">Female</label>
                                <span class="check"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone :</label>
                            <input type="number" name="phone" id="phone" required />
                        </div>

                        <div class="form-group">
                            <label for="address">Address :</label>
                            <input type="text" name="address" id="address" required />
                        </div>


                        <div class="form-row">
                            <div class="form-group">
                                <label for="state">State :</label>
                                <div class="form-select">
                                    <select name="state" id="state">
                                        <option value=""></option>
                                        <option value="us">America</option>
                                        <option value="uk">English</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city">District :</label>
                                <div class="form-select">
                                    <select name="district" id="city">
                                        <option value=""></option>
                                        <option value="losangeles">Los Angeles</option>
                                        <option value="washington">Washington</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pincode">Pincode :</label>
                            <input type="text" name="pincode" id="pincode">
                        </div>

                        <div class="form-group">
                            <label for="birth_date">DOB :</label>
                            <input type="date" name="birth_date" id="birth_date" style="text-transform: uppercase">
                        </div>


                        <div class="form-group">
                            <label for="email">Email ID :</label>
                            <input type="email" name="email" id="email" />
                        </div>

                        <div class="form-group">
                            <label for="aadhar">Aadhar :</label>
                            <input type="text" name="aadhar" id="aadhar" />
                        </div>

                        <div class="form-group">
                            <label for="place">Place :</label>
                            <input type="text" name="place" id="place" />
                        </div>

                        <!-- <div class="form-group">
                            <label for="photograph">Photograph :</label>
                            <input type="file" name="photo" id="photograph" />
                        </div> -->

                        <div class="form-submit">
                            <input type="submit" value="Reset All" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Submit Form" class="submit" name="submit" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>