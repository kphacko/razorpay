<?php
include_once 'connect.php';
include_once 'header.php';

$stat=$_GET['stat'];

if($stat=='v'){
  $id=$_GET['id'];
$sql="SELECT * From member where id=".$id;
$result= mysqli_query($conn,$sql);
$row= mysqli_fetch_array($result);
$timestamp = time();
// actual value: $time = 1582820727
$signature = md5( $timestamp . '6e578fd37e' ); 
$url='https://elgaar.com/reg/ID/id.php?id='.$id;
$url = urlencode($url);
$api_url = 'http://techmylife.in/yourls-api.php?action=shorturl&username=karan&password=karan@7&format=json&url='.$url;
$arr_output = json_decode(file_get_contents($api_url), true);
$surl = $arr_output["shorturl"];
// echo $surl;
$message=urlencode('Thank you! '.$row['fname'].' '.$row['lname'].', for joining Elgaar. Your registration ID is '.$row['kid'].' & get your id here '.$surl.'');
                       $url='http://text.daxy.in/http-api.php?username=daxy&password=Karan@7&senderid=ELGAAR&route=2&number='.$row['phone'].'&message='.$message.'';
                       $ch = curl_init();

                        // set URL and other appropriate options
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HEADER, 0);

                        // grab URL and pass it to the browser
                        curl_exec($ch);

                        // close cURL resource, and free up system resources
                        curl_close($ch);
                        // echo $url;
                        header("Location:admin.php?stat=v");
                        exit();

}elseif ($stat=='s') {  
                       $msg=$_POST['text'];
                       $sql="SELECT * From member";
                       $result= mysqli_query($conn,$sql);
                       $check1=mysqli_num_rows($result);
                       $phone='';
                       $phone1='';
                       $y = 50;
                       $cal = fmod($check1,$y);
                       $cal1= $check1 / $y;
                       $k=round($cal1,0,PHP_ROUND_HALF_DOWN);
                       // echo $k."<br>"; 
                       while ($row= mysqli_fetch_array($result)) {
                        if ($k==0) {
                          while ($cal!=0) {

                            $phone1=$row['phone'].','.$phone1;
                            $cal--;
                          }

                          $message=urlencode('Thank you! '.$row['fname'].' '.$row['lname'].', for joining Elgaar. Your registration ID is '.$row['kid'].'');
                       $url='http://texti.daxy.in/http-api.php?username=daxy&password=Karan@7&senderid=ELGAAR&route=2&number='.$phone1.'&message='.$message.'';
                          // $url='192.168.0.106/test/test.php';
                       $ch = curl_init();

                        // set URL and other appropriate options
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HEADER, 0);

                        // grab URL and pass it to the browser
                        curl_exec($ch);

                        // close cURL resource, and free up system resources
                        curl_close($ch); 
                        }
                        while($k!=0) {
                          $c=0;
                          while ($c<$y) {
                            $phone=$phone.','.$row['phone'];
                            $c++;
                          }
                          

                          $message=urlencode('Thank you! '.$row['fname'].' '.$row['lname'].', for joining Elgaar. Your registration ID is '.$row['kid'].'');
                       $url='http://texti.daxy.in/http-api.php?username=daxy&password=Karan@7&senderid=ELGAAR&route=2&number='.$phone.'&message='.$message.'';
                          // $url='http://192.168.0.106/test/test.php';
                       $ch = curl_init();

                        // set URL and other appropriate options
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HEADER, 0);

                        // grab URL and pass it to the browser
                        curl_exec($ch);

                        // close cURL resource, and free up system resources
                        curl_close($ch);  
                        $c=0;
                        $k--;
                           
                         }//end of while 
                         
                        }//end of main while
                       
                         header("Location:admin.php?stat=s");
                        exit();

                      }//end of elseif
               
               // echo $cal1;       
// echo 'less than 50 "<br>" ';
//  // echo $phone1;
// echo substr_count($phone1,"8169157715");

                       
                       
                       


//                         echo 'greater than 50 "<br>"';
//                          // echo $phone;
// echo substr_count($phone,"8169157715");

                        ?>