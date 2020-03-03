<?php
include_once('../connect.php');
if(isset($_POST['submit'])){
$id=$_POST['id'];    
}elseif ($_GET['id']!=NULL) {
$id=$_GET['id'];    
}else{
    // header("Location:../form/index.php?stat=id");
    //                    exit();
 echo "<script>window.open('../form/index.php?stat=id','_self')</script>";

}

$sql3="SELECT * from member where id=".$id;
$result3= mysqli_query($conn,$sql3);
$row3= mysqli_fetch_array($result3); 
?>



<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <script src="https://cdn.daxy.in/html2pdf.js"></script>

    <script>
      function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.querySelector(".wrapper");
        // Choose the element and save the PDF for our user.
        html2pdf()
          .set({ filename: 'ELGAAR-ID.pdf',html2canvas: { scale: 1.5 } })
          .from(element)
          .save();

          html2pdf().from(element).toPdf().output('datauristring').then(function (pdfAsString) {console.log(pdfAsString);});
      }
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700|Roboto:400,500,700&display=swap"
        rel="stylesheet">
    <title> <?php echo strtoupper($row3['fname'])?> ELGAAR ID</title>
    <style type="text/css">
        #ID {
            display: flex;
            justify-content: center;
        }

        #print{
            width: 500px;

        }
        .wrapper{
            /* height: 3.375in; */
            display: flex;
            /* width: 4.5in; */
            margin: 100px auto;
            /* width: 600px; */
        }

        .front,
        .back {
            margin-left: 0.125in;
            min-width: 2.125in;
            max-width:2.125in;
            height: 3.375in;
            position: relative;
            border: 2px solid black;
            border-radius: 10px;
        }

        .front{
            flex: 0 0 47%;
        }

        .back{
            flex: 1;
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
            max-height: 90px;
            /* object-fit: cover; */
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            border: 1px solid black;
        }

        #stamp{
            height: 50px;
            position: relative;
            top: 40px;
            left: 35%;
            transform: translateX(-35%);
        }

        body {
            font-family: "Roboto";
            /* font-family: "Open Sans"; */
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

        .sig{
            width: 50px;
            height: 50px;
            display: flex;
            flex-wrap: wrap;
            float:right;
            margin-right: 10px;
            position: relative;
            bottom: 30px
        }

        #signature {
            margin: 0px auto;
            float: right;
        }
        .sign {
            float:right;
            width: 50px;
            position: relative;
            bottom: -8px;
        }

        #foot {
            /* bottom: -15px; */
            width: 160px;
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

        button{
            position: relative; 
            top: 80px; 
            left: 45%; 
            transform: translateX(-45%);
            height: 40px;
            padding: 10px;
            border: 2px solid green;
            background-color: white;
            border-radius: 3em;
            text-transform: uppercase;
            font-weight: 600;
            font-family: "Open Sans";
            transition: 0.3s;
        }

        button:hover{
            color:white;
            background-color: green;
        }

       
    </style>
</head>

<body>
        
   
    <div id="ID">
        
        
        <div id="print">
        <button onclick="generatePDF()">Download as PDF!</button>
        <div class="wrapper">
        <div class="front">
            <img id='header' src="header.png">
            <img id="photo" src="../img/profiles/<?php echo $row3['profile'];?>">
            <img id="stamp" src="stamp.png">
            <p id="post"><span class='bold'>ID No : </span><?php echo $row3['kid'];?></p>
            <p id="name"><span class='bold'>Name : </span><?php echo $row3['fname'].' '.$row3['mname'].' '.$row3['lname']; ?></p>
            <p id="post"><span class='bold'>POST : </span><?php echo $row3['post'];?></p>
            
            <div class='sig'>
            <img class='sign' src='sign.png'>
            <p id='signature' class='bold'>President</p>
            </div>
        </div>
        <div class='back'>
            <img id='header' src="header.png">
            <p id="address"><span class='bold'>Address : </span><span id='addtext'> <?php echo $row3['address'].', '.$row3['state'].', '.$row3['pincode'];?>.</span></p>
            <p id="aadhar"><span class='bold'>Aadhar : </span><?php echo $row3['aadhar'];?></p>
            <p id="mobile"><span class='bold'>Mobile : </span><?php echo $row3['phone'];?></p>
            <p id="issue"><span class='bold'>Issue Date : </span><?php echo $row3['date'];?></p>
            <p id='validity'><span class='bold'>Validity : </span> 5 years</p>
            <div id='foot'>
                <p>National Office : <span class='red'>6/15, Milind Nagar, Mhada Colony, J V Link Road, Powai,
                        Mumbai-400072.</span>
                </p>
                <p>Contact : <span class='red bold'>ELGAAR.COM / 919211067</span>
                </p>
            </div>
        </div>
        </div>
        </div>

    </div>
    <script>
        let add = document.querySelector('#addtext'),
            n   = add.innerText.length;

            if(n>60){
                add.style.fontSize = "10px";
            }

    </script>
</body>
</html>