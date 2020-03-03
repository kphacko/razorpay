<?php
// error_reporting(0);
// ini_set('display_errors', 0);
include_once 'connect.php';
include_once 'header.php';

$stat=$_GET['stat'];

if($stat=='v'){
  $id=$_GET['id'];
$sql="SELECT * From member where id=".$id;
$result= mysqli_query($conn,$sql);
$row= mysqli_fetch_array($result);
$n=3; 
function getName($n) { 
  $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz'; 
  $randomString = ''; 

  for ($i = 0; $i < $n; $i++) { 
    $index = rand(0, strlen($characters) - 1); 
    $randomString .= $characters[$index]; 
  }
  $randomString='el'.$randomString; 

  return $randomString; 
} 

$ran= getName($n);
// echo $ran.'<br>';
// $ran='google';
function urlcheck($ran){
$url='www.google.com';

$api_url = 'http://dx7.in/yourls-api.php?shorturl='.$ran.'&action=url-stats&username=daxy&password=Karan@7&format=json&url='.$url;
$arr_output = json_decode(file_get_contents($api_url), true);
$surl = $arr_output;
if (is_null($arr_output)) {
  return true;
}else{

  return false;

}
}
while(true){
  if (urlcheck($ran)) {
    echo 'true';
    break;
  }
}

// echo $ran;
// print_r($api_url);
//__________________________________****************************_____________________________  
//create shorturl
$timestamp = time();
$signature = md5( $timestamp . '6e578fd37e' ); 
$url='https://elgaar.com/reg/ID/index.php?id='.$id;
$url = urlencode($url);
$api_url = 'http://dx7.in/yourls-api.php?keyword='.$ran.'&action=shorturl&username=daxy&password=Karan@7&format=json&url='.$url;
$arr_output = json_decode(file_get_contents($api_url), true);
$surl = $arr_output["shorturl"];
// echo $surl;
$message=urlencode('Congratulations, '.$row['fname'].' '.$row['lname'].'! we have verified your details and your ID is '.$row['kid'].'.  you can download it via the link below '.$surl.'');
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
                       // echo $k."<br>"; 
                       while ($row= mysqli_fetch_array($result)) {
                          $nmsg=str_replace("&&",$row['fname'],$msg);
                       $nmsg=str_replace("||",$row['lname'],$nmsg);
                          $message=urlencode(''.$nmsg.'');
                       $url='http://text.daxy.in/http-api.php?username=daxy&password=Karan@7&senderid=ELGAAR&route=2&number='.$row['phone'].'&message='.$message.'';
                          // $url='192.168.0.106/test/test.php';
                       // echo $url.'<br>';
                       // echo "greater than 50 ";
                       $ch = curl_init();

                        // set URL and other appropriate options
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HEADER, 0);

                        // grab URL and pass it to the browser
                        curl_exec($ch);

                        // close cURL resource, and free up system resources
                        curl_close($ch); 
                    
                    
                         
                        }//end of main while
                       
                         header("Location:send.inc.php?stat=s");
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