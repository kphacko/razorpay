<?php
include_once 'connect.php';
$sql="SELECT * From member where status=1";
$result= mysqli_query($conn,$sql);
$count=0;
$c=0;
$k=date("j F, Y");
while ($row= mysqli_fetch_array($result)) {
                        if ($row['status']==1) {
                        	$count=$count+1;
                        }
                        if ($row['date']==$k) {
                        	$c=$c+1;
                        }
                    }
$d=date("d/m/y");
echo $count.'<br>';
echo $c;

// echo $surl;
$message=urlencode('Date '.$d.'\n'.$c.' New Registration\n'.$count.' Pending Verification ');
                       $url='http://text.daxy.in/http-api.php?username=daxy&password=Karan@7&senderid=ELGAAR&route=2&number=9322244007&message='.$message.'';
                       $ch = curl_init();

                        // set URL and other appropriate options
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HEADER, 0);

                        // grab URL and pass it to the browser
                        curl_exec($ch);

                        // close cURL resource, and free up system resources
                        curl_close($ch);
?>