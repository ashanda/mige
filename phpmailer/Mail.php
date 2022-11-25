

<?php



error_reporting(1);

ini_set('display_errors', 'On');

set_error_handler("var_dump");


use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;



require 'autoload.php';



$mail = new PHPMailer;



                              
                                     

$mail->isSMTP();                                           

$mail->SMTPDebug = 1;  
$mail->SMTPAuth   = true; 
$mail->Host       = 'radarhostapp.com';                                    
$mail->Username   = 'support@radarhostapp.com';                   
$mail->Password   = 'b9p@11LbbOT~';                              
$mail->SMTPSecure = 'ssl';                                   
$mail->Port       = 465;    

$mail->From = 'support@radarhostapp.com';

$mail->FromName = 'RadarApp Team';

$mail->addAddress('dharmaniz.mandeepsharma@gmail.com');     // Add a recipient

                                 // Set email format to HTML


// $mail->IsHTML(true); 
$mail->Subject = 'Here is the subject test';

$mail->Body    = 'This is the HTML message body <b>in bold!</b>';

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients ';



if(!$mail->send()) {

    echo 'Message could not be sent.';

    echo 'Mailer Error: ' . $mail->ErrorInfo;

} else {

    echo 'Message has been sent';

}




/*$email_message="test";

$to = "dharmaniz.mandeepsharma@gmail.com";
$subject = "Account Verification";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: support@radarhostapp.com";


$success = mail($to,$subject,$email_message,$headers);   
echo "success ".$success;*/
?>