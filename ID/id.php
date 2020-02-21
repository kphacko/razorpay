<?php
include_once('../connect.php');
if(isset($_POST['submit'])){
$id=$_POST['id'];    
}elseif ($_GET['id']!=NULL) {
$id=$_GET['id'];    
}else{
    header("Location:../form/index.php?stat=id");
                       exit();
}

$sql3="SELECT * from member where id=".$id;
$result3= mysqli_query($conn,$sql3);
$row3= mysqli_fetch_array($result3); 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700|Roboto:400,500,700&display=swap"
        rel="stylesheet">
    <title>ID</title>
    <style type="text/css">
        #ID {
            height: 3.375in;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
        }

        .front,
        .back {
            margin: 100px 10px;
            width: 2.125in;
            height: 3.375in;
            position: relative;
            float: left;
            border: 2px solid black;
            border-radius: 10px;
        }

        #header {
            margin-top: 10px;
            width: 200px;
            border-bottom: 1.5px solid black;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
        }


        #photo {
            margin: 15px auto;
            width: 70px;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            border: 1px solid black;
        }

        body {
            font-family: "Roboto";
            font-size: 12px;
            margin-left: 10px;
            color: #313191;
            font-weight: 500;

        }

        #name,
        #post,
        #address,
        #aadhar,
        #mobile,
        #issue,
        #validity {
            margin-left: 15px;
        }

        .sign {
            width: 50px;
            position: fixed;
            top: 370px;
            left: 150px;
        }

        #foot {
            bottom: -15px;
            width: 80%;
            font-size: 8px;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
        }

        .red {
            color: red;
        }

        .bold {
            font-weight: 800;
        }

        #signature {
            position: fixed;
            top: 380px;
            left: 150px;
        }
    </style>
</head>

<body>
    <div id="ID">
        <div class="front">
            <img id='header' src="header.png">
            <img id="photo" src="../img/profiles/<?php echo $row3['profile'];?>">
            <p id="name"><span class='bold'>Name : </span><?php echo $row3['fname'].' '.$row3['mname'].' '.$row3['lname']; ?></p>
            <p id="post"><span class='bold'>POST : </span><?php echo $row3['post'];?></p>
            <p id="post"><span class='bold'>ID No : </span><?php echo $row3['id'];?></p>
            
            <p id='signature' class='bold'>President</p>
            <img class='sign' src='sign.png'>
        </div>
        <div class='back'>
            <img id='header' src="header.png">
            <p id="address"><span class='bold'>Address : </span> <?php echo $row3['address'].','.$row3['state'].','.$row3['pincode'];?></p>
            <p id="aadhar"><span class='bold'>Aadhar : </span><?php echo $row3['aadhar'];?></p>
            <p id="mobile"><span class='bold'>Mobile : </span><?php echo $row3['phone'];?></p>
            <p id="issue"><span class='bold'>Issue Date : </span><?php echo $row3['date'];?></p>
            <p id='validity'><span class='bold'>Validity : </span> 5 years</p>
            <div id='foot'>
                <p>National Office : <span class='red'>6/15, Milind Nagar, Mhada Colony, J V Link Road, Powai,
                        Mumbai-400072.</span>
                </p>
                <p>Contact : <span class='red'>+91-9819211067</span></p>
            </div>
        </div>

    </div>
</body>
</html>

  