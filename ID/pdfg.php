<?php
require_once 'Mail.php';
require_once 'Mail/mime.php';
include_once('../connect.php');
// if(isset($_POST['fileDataURI'])){
// $id=$_POST['id'];
$data='';
$to='karan2000patil@gmail.com';

$content = '<html>jsfj</html>';

require_once('pdf/html2pdf.class.php');


    $orientation = 'P'; // portrait
    $page_size = 'A4';
    $display_mode = 'fullpage';

    // First pass (calculating the number of pages)
 
    $html2pdf = new HTML2PDF($orientation, $page_size, 'en', true, 'UTF-8', 0);
    $html2pdf->pdf->SetDisplayMode($display_mode);
    // $html2pdf->_isCalculationPass = true;
    $html2pdf->writeHTML($content);

    $firstPages = $html2pdf->_firstPageInSet;
    $maxPage = $html2pdf->_maxPage;

    $html2pdf->Output($out_filename, 'F');
    print "Saved PDF to $out_filename\n";



$sql3="SELECT * from member where id=".$id;
$result3= mysqli_query($conn,$sql3);
$row3= mysqli_fetch_array($result3); 
$attachment='kp.pdf';
$b64file        = trim( str_replace( 'data:application/pdf;base64,', '', $data ) );
    $b64file        = str_replace( ' ', '+', $b64file );
    $decoded_pdf    = base64_decode( $b64file );
    file_put_contents( $attachment, $decoded_pdf );




$from    = "yash@daxy.in,karan@daxy.in";  
$subject = "Certificates"; 
$body="";
$headers = array ('From' => $from,'To' => $to,'Subject' => $subject);
$mime = new Mail_mime();
$mime->setHTMLBody($body);
$mime->addAttachment($attachment, 'application/pdf');
$body = $mime->get();
$headers = $mime->headers($headers);
$smtpinfo["host"] = "mail.elgaar.com";  
    $smtpinfo["port"] = "587";  
    $smtpinfo["auth"] = true;  
    $smtpinfo["username"] = "admin@elgaar.com";  
    $smtpinfo["password"] = "ZEM1CAKWYI";  
      
      
    $smtp = Mail::factory('smtp', $smtpinfo );
    $mail = $smtp->send($to, $headers, $body);
     if (PEAR::isError($mail)) {
         echo "<p>" . $mail->getMessage() . "</p>";
     } else {
         echo "<p>Message successfully sent!</p>";
     }

?>