<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'phpmailer/autoload.php';
    $mail = new PHPMailer(true);
    try{
        //Server settings
        $mail->isHTML(true);  
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
       /* $mail->SMTPDebug = 1;                                       
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.mail.hostpoint.ch';  
        $mail->SMTPAuth   = false;                                   
        $mail->Username   = 'support@fahrschule-star.ch';                 
        $mail->Password   = 'mige@fahrschule-star.ch';
        $mail->SMTPSecure = 'ssl';                                  
        $mail->Port       = 143;   */                                 // TCP port to connect to
      
        //Recipients
       // $mail->setFrom("info@fahrschule-star.ch",'Fahrschule STAR');
        $mail->setFrom("support@fahrschule-star.ch",'Fahrschule STAR');
        $mail->addAddress('dharmaniz.mandeepsharma@gmail.com');     // Add a recipient
       

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      
        // Content
        // Set email format to HTML
        $mail->Subject = 'New Mail From Fahrschule STAR';
        $mail->Body= " test mail ";


        $success = $mail->send();
        if($success)
        {
          // Return Success - Valid Emailur email
          //$msg = 'Your query has been submitted. Thank You for contacting us. ';
          $msg = $translations['_query_success_'][0];
          //http_response_code(401);
        // $json_message = array("status"=>1,"message"=>$msg,'mail'=>$success,'color'=>'green');
        //send_response($json_message);
        //echo json_encode(array("status"=>1,"message"=>$msg,'mail'=>$success,'color'=>'green'));
      //    exit();
        //exit;
        }
        else
        {
          echo json_encode(array('status'=>0,'message'=>$translations['_query_failed_'][0],'success'=>$e,'color'=>'red'));
          exit();
        }
        
        
    } catch (Exception $e) {
         
      echo json_encode(array('status'=>0,'message'=>$translations['_query_failed_'][0],'success'=>$e,'color'=>'red'));
      exit();
    }

       $email_message="Please click on this link below to verify your account.";

       $email_message.="<a href='".'ak.com'."'>verify</a>";

        $to = 'dharmaniz.mandeepsharma@gmail.com';

        $subject = "Account Verification For ".'abhi'.' '.'chauahan';

        $headers  = 'MIME-Version: 1.0' . "\r\n";

        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $headers .= "From: support@fahrschule-star.ch";





        $success = mail($to,$subject,$email_message,$headers); 

        print_r($success); 

 ?>