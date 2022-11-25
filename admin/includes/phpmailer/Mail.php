

<?php


$mail = new PHPMailer(true);
try{
//Server settings
$mail->isHTML(true);  
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';
$mail->SMTPDebug = 1;                                        // TCP port to connect to

//Recipients
$mail->setFrom("info@fahrschule-star.ch",'Fahrschule STAR');
$mail->addAddress($email,"");     // Add a recipient


$mail->Subject = $subject;
$mail->Body    = $mail_message;

$success = $mail->send();



if($success)
{
    echo json_encode(array("status"=>1,"message"=>$translations['_email_exists_with_us_'][0],"user_id"=>$user_id,"session_token"=>$session_token));
    exit();
    // Return Success - Valid Emailur email

}
else
{
    echo json_encode(array('status'=>2,'message'=>$translations['_query_failed_'][0],'success'=>$e));
    exit();
}


} catch (Exception $e) {
 
echo json_encode(array('status'=>2,'message'=>$translations['_query_failed_'][0],'success'=>$e));
exit();
}
?>