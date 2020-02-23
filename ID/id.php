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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <script src="//cdn.daxy.in/html2pdf.js"></script>

    <script>
      function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("ID");
        // Choose the element and save the PDF for our user.
        html2pdf()
          .set({ filename: 'ELGAAR-ID.pdf',html2canvas: { scale: 1.5 } })
          .from(element)
          .save();
      }
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700|Roboto:400,500,700&display=swap"
        rel="stylesheet">
    <title> <?php echo strtoupper($row3['fname'])?> ELGAAR ID</title>
    <style type="text/css">
        .p{
            margin-top: 12px !important;
            margin-bottom: 0rem !important;
        }
        .pi{
            margin-bottom: 0rem !important;
        }
        #ID {
            height: 3.375in ;
            position: relative ;
            left: 50% ;
            transform: translateX(-50%) ;
        }

        .front,
        .back {
            margin: 100px 10px !important;
            width: 2.125in !important;
            height: 3.375in !important;
            position: relative !important;
            float: left !important;
            border: 2px solid black !important;
            border-radius: 10px !important;
        }

        #header {
            margin-top: 10px !important;
            width: 200px !important;
            border-bottom: 1.5px solid black !important;
            position: relative !important;
            left: 50%!important;
            transform: translateX(-50%)!important;
        }


        #photo {
            margin: 15px auto!important;
            width: 70px!important;
            position: relative!important;
            left: 50%!important;
            transform: translateX(-50%)!important;
            border: 1px solid black!important;
        }

        body {
            font-family: "Roboto"!important;
            font-size: 12px!important;
            margin-left: 10px!important;
            color: #313191!important;
            font-weight: 500!important;

        }

        #name,
        #post,
        #address,
        #aadhar,
        #mobile,
        #issue,
        #validity {
            margin-left: 15px !important;
        }

        .sign {
            width: 50px!important;
            position: fixed !important;
            top: 370px!important;
            left: 150px!important;
        }

        #foot {
            /*bottom: -15px!important;*/
            width: 80%!important;
            font-size: 8px!important;
            position: relative!important;
            left: 50%!important;
            transform: translateX(-50%)!important;
        }

        .red {
            color: red!important;
        }

        .bold {
            font-weight: 800!important;
        }

        #signature {
            position: fixed!important;
            top: 380px!important;
            left: 150px!important;
        }
    </style>
</head>

<body>



    <div class="row" >
    <div class="col-md-4"></div>
    <div class="col-md-4" id="">
    <div id="ID">
        <div class="front">
            <img id='header' src="header.png">
            <img id="photo" src="../img/profiles/<?php echo $row3['profile'];?>">
            <p id="post"><span class='p bold'>ID No : </span><?php echo $row3['kid'];?></p>
            <p id="name"><span class='p bold'>Name : </span><?php echo $row3['fname'].' '.$row3['mname'].' '.$row3['lname']; ?></p>
            <p id="post"><span class='p bold'>POST : </span><?php echo $row3['post'];?></p>
            
            
            <p id='signature' class='p bold'>President</p>
            <img class='sign' src='sign.png'>
        </div>
        <div class='back'>
            <img id='header' src="header.png">
            <p id="address"><span class='p bold'>Address : </span> <?php echo $row3['address'].', '.$row3['state'].', '.$row3['pincode'];?></p>
            <p id="aadhar"><span class='p bold'>Aadhar : </span><?php echo $row3['aadhar'];?></p>
            <p id="mobile"><span class='p bold'>Mobile : </span><?php echo $row3['phone'];?></p>
            <p id="issue"><span class='p bold'>Issue Date : </span><?php echo $row3['date'];?></p>
            <p id='validity'><span class='p bold'>Validity : </span> 5 years</p>
            <div id='foot'>
                <p class="pi">National Office : <span class='red'>6/15, Milind Nagar, Mhada Colony, J V Link Road, Powai,
                        Mumbai-400072.</span>
                </p>
                <p>Contact : <span class='p red'>+91-9819211067</span></p>
            </div>
        </div>

    </div>
    <div class="text-center">
     <button type="button" class="btn btn-primary" onclick="generatePDF()">Download as PDF</button>
 </div>
    </div>
    <div class="col-md-4"></div>
</div>
    
       
    
</body>


</html>
