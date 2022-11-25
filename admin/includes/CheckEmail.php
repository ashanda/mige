<?php 
include '../Config/Connection.php';
include 'Functions.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'phpmailer/autoload.php';
$_SESSION['language'] = 'en';
if($_SESSION['language']=='en'){
	$translations['_course_already_booked_'] = ['This course is already booked for today.'] ;
	$translations['_new_user_success_'] = ['New User Signed Up Successfully.'] ;
	$translations['_new_user_failed_'] = ['Failed to signup as user, please try again later.'] ;
	$translations['_signup_success_'] = ['You have successfully Signed Up!'] ;
	$translations['_login_success_'] = ['Logged in successfully.'] ;
	$translations['_email_exists_with_us_'] = ["Your email is not registered with us."] ;
	$translations['_login_fail_'] = ['Email or password is incorrect.'];
	$translations['_query_success_'] = ['Your query has been submitted. Thank You for contacting us.'];
	$translations['_query_failed_'] = ['Failed to send mail.'];
	$translations['_email_exists_'] = ['This email is already registered with us.'];
	$translations['_profile_update_success_'] = ['Profile updated successfully.'];
	$translations['_profile_update_failed_'] = ['Failed to update profile.'];
	$translations['_password_change_success_'] = ['Password updated successfully.'];
	$translations['_password_change_failed_'] = ['Failed to update password.'];
}else{
	$translations['_course_already_booked_'] = ['Dieser Kurs ist bereits für heute gebucht.'] ;
	$translations['_new_user_success_'] = ['Neuer Benutzer erfolgreich registriert.'] ;
	$translations['_new_user_failed_'] = ['Anmeldung als Benutzer fehlgeschlagen. Bitte versuchen Sie es später erneut.'] ;
	$translations['_signup_success_'] = ['Sie haben sich erfolgreich registriert!'] ;
	$translations['_login_success_'] = ['Erfolgreich eingeloggt.'] ;
	$translations['_email_exists_with_us_'] = ["Ihre E-Mail ist bei uns registriert."] ;
	$translations['_login_fail_'] = ['Email oder Passwort ist falsch.'];
	$translations['_query_success_'] = ['Ihre Anfrage wurde gesendet. Danke, dass Sie uns kontaktiert haben.'];
	$translations['_query_failed_'] = ['E-Mail konnte nicht gesendet werden.'];
	$translations['_email_exists_'] = ['Diese E-Mail ist bereits bei uns registriert.'];
	$translations['_profile_update_success_'] = ['Profil erfolgreich aktualisiert.'];
	$translations['_profile_update_failed_'] = ['Profil konnte nicht aktualisiert werden.'];
	$translations['_password_change_success_'] = ['Passwort erfolgreich aktualisiert.'];
	$translations['_password_change_failed_'] = ['Passwort konnte nicht aktualisiert werden.'];

}
	

	if($_SESSION['language'] =='en')
    {
      $run="SELECT `id`, `pageid`, `alias`, `inenglish` as detail FROM `page_content_translation` WHERE selected_page='emailer_templates'";
    }
    else
    {
      $run="SELECT `id`, `pageid`, `alias`, `ingerman` as detail FROM `page_content_translation` WHERE selected_page='emailer_templates'";
     
    }
   $result=$conn->query($run);
   while($row = mysqli_fetch_array($result))
   {
     $translations[$row['alias']]=$row['detail'];
  // echo "<pre>";  print_r($translation[$row['alias']]=$row['detail']);
               
   } 


 $email = $_REQUEST['email'];
 $get_user_detail = get_instructor_login_details_by_email($email);

if($get_user_detail) 
{
	$session_token = md5(time());
	$new_password = trim($get_user_detail['username'].rand(1,99999));
    $q['query'] = "UPDATE tbl_instructor set password_session_token = '$session_token',password='$new_password' WHERE email = '$email'";
    $q['run'] = $conn->query($q['query']);
  //  print_r($q['query']);die;
    $subject = 'New Password Requested';

    $mail_message= '<!DOCTYPE html>
		<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
		<head>
		<title></title>
		<meta charset="utf-8"/>
		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
		<style>
		{
			box-sizing: border-box;
		}

		body {
			margin: 0;
			padding: 0;
		}

		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: inherit !important;
		}

		#MessageViewBody a {
			color: inherit;
			text-decoration: none;
		}

		p {
			line-height: inherit
		}

		@media (max-width:670px) {
			.icons-inner {
				text-align: center;
			}

			.icons-inner td {
				margin: 0 auto;
			}

			.row-content {
				width: 100% !important;
			}

			.stack .column {
				width: 100%;
				display: block;
			}
		}
	</style>
</head>
<body style="background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
	<table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="100%">
		<tbody>
			<tr>
				<td>
					<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff9f5;" width="100%">
						<tbody>
							<tr>
								<td>
									<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fdfdfd; background-image: url('.$config['base_url'].'/emailerimages/banner-img-email.jpg); background-repeat: no-repeat; color: #000000; width: 650px;" width="650">
										<tbody>
											<tr>
												<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 25px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
													<table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
														<tr>
															<td style="width:100%;padding-right:0px;padding-left:0px;">
																<div align="center" style="line-height:10px"><img src="'.$config['base_url'].'/emailerimages/logo.png" style="display: block; height: auto; border: 0; width: 163px; max-width: 100%;" width="163"/></div>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
														<tr>
															<td>
																<div style="font-family: sans-serif">
																	<div style="font-size: 14px; mso-line-height-alt: 16.8px; color: #ffffff; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
																		<p style="margin: 0; font-size: 12px; text-align: center;"><span style="font-size:38px;"><strong>New Password Request !!!</strong></span></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
														<tr>
															<td style="padding-bottom:20px;padding-left:20px;padding-right:20px;">
																<div style="font-family: sans-serif">
																	<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #ffffff; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
																		<p style="margin: 0; font-size: 12px; mso-line-height-alt: 14.399999999999999px;"> </p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff9f5;" width="100%">
						<tbody>
							<tr>
								<td>
									<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fdfdfd; background-position: center top; color: #000000; width: 650px;" width="650">
										<tbody>
											<tr>
												<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 35px; padding-bottom: 45px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
													<table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
														<tr>
															<td>
																<div style="font-family: sans-serif">
																	<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #030303; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
																		<p style="margin: 0; font-size: 12px; text-align: center;"><span style="font-size:22px;"><strong><span style="">Hi '.$get_user_detail['username'].',</span></strong></span></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
														<tr>
															<td style="padding-bottom:10px;padding-left:40px;padding-right:40px;">
																<div style="font-family: sans-serif">
																	<div style="font-size: 14px; mso-line-height-alt: 16.8px; color: #393939; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
																		<p style="margin: 0; font-size: 14px; text-align: center;">Your new password is : '.$new_password.'</p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff9f5;" width="100%">
						<tbody>
							<tr>
								<td>
									<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #04293f; color: #000000; min-width: 650px;" width="650">
										<tbody>
											<tr>
												<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 20px; padding-bottom: 15px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
													<table border="0" cellpadding="10" cellspacing="0" class="social_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
														<tr>
															<td>
																<table align="center" border="0" cellpadding="0" cellspacing="0" class="social-table" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="144px">
																	<tr>
																		<td style="padding:0 2px 0 2px;"><a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" height="32" src="'.$config['base_url'].'/emailerimages/facebook2x.png" style="display: block; height: auto; border: 0;" title="Facebook" width="32"/></a></td>
																		<td style="padding:0 2px 0 2px;"><a href="https://twitter.com/" target="_blank"><img alt="Twitter" height="32" src="'.$config['base_url'].'/emailerimages/twitter2x.png" style="display: block; height: auto; border: 0;" title="Twitter" width="32"/></a></td>
																		<td style="padding:0 2px 0 2px;"><a href="https://instagram.com/" target="_blank"><img alt="Instagram" height="32" src="'.$config['base_url'].'/emailerimages/instagram2x.png" style="display: block; height: auto; border: 0;" title="Instagram" width="32"/></a></td>
																		<td style="padding:0 2px 0 2px;"><a href="https://www.linkedin.com/" target="_blank"><img alt="LinkedIn" height="32" src="'.$config['base_url'].'/emailerimages/linkedin2x.png" style="display: block; height: auto; border: 0;" title="LinkedIn" width="32"/></a></td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="0" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
														<tr>
															<td style="padding-bottom:15px;padding-left:5px;padding-right:5px;">
																<div align="center">
																	<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="85%">
																		<tr>
																			<td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #C5C5C5;"><span> </span></td>
																		</tr>
																	</table>
																</div>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
														<tr>
															<td>
																<div style="font-family: sans-serif">
																	<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #fff; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
																		<a href="https://fahrschule-star.ch/"><p style="margin: 0; font-size: 12px; text-align: center;">Fahrchule-star.ch</p></a>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table><!-- End -->
</body>
</html>';


 		$mail = new PHPMailer(true);
		try{
		    //Server settings
		  
		    $mail->isHTML(true);  
		    $mail->CharSet = 'UTF-8';
		    $mail->Encoding = 'base64';
		    $mail->SMTPDebug = 0;                                        // TCP port to connect to
		  
		    //Recipients
		    $mail->setFrom("info@fahrschule-star.ch",'Fahrschule STAR');
		    $mail->addAddress($email,"");     // Add a recipient
		   

		    $mail->Subject = $subject;
		    $mail->Body    = $mail_message;

		    $success = $mail->send();

		    
		    if($success)
		    {
		    	echo json_encode(array("status"=>1,"message"=>$translations['_password_change_success_'][0],"user_id"=>$user_id,"session_token"=>$session_token));
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
	}
	else 
	{
		echo json_encode(array("status"=>0,"message"=>$translations['_email_exists_with_us_'][0]));
	    exit();
	}

?>