<?php
include_once 'connect.php';
include_once 'header.php';
                       $sql="SELECT * From member";
                       $result= mysqli_query($conn,$sql);
                       
                       while ($row= mysqli_fetch_array($result)) {
                         
                       }
                       
                       $message=urlencode('Thank you! '.$row['fname'].' '.$row['lname'].', for joining Elgaar. Your registration ID is '.$row['kid'].'');
                       $url='http://text.daxy.in/http-api.php?username=daxy&password=Karan@7&senderid=ELGAAR&route=2&number='.$row['phone'].'&message='.$message.'';
                       $ch = curl_init();

                        // set URL and other appropriate options
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HEADER, 0);

                        // grab URL and pass it to the browser
                        curl_exec($ch);

                        // close cURL resource, and free up system resources
                        curl_close($ch);

                        ?>