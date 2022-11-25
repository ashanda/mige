<?php 
session_start();
include_once 'Functions.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'phpmailer/autoload.php';




$name=$_POST['name'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$phone_no=$_POST['phone_no'];
$trial_lesson=$_POST['trial_lesson'];
$trial_category=$_POST['trial_category'];
$trial_time_slot=$_POST['trial_time_slot'];
$trial_weekday=$_POST['trial_weekday'];
$message=$_POST['message'];

 if ( isset ($_GET['language']) )
 {
    $_SESSION['language'] = $_GET['language'];
 } 
 elseif($_SESSION['language'])
 {
 	$_SESSION['language'] =  $_SESSION['language'];
 }

 else
 {
 	$_SESSION['language'] = 'ge';
 }

$translations['_enter_name_'] = ['Please enter name.','Bitte Namen eingeben.'] ;
$translations['_enter_email_'] = ['Please enter email.','Bitte E-Mail eingeben.'] ;
$translations['_enter_dob_'] = ['Please select dob.','Bitte wählen Sie dob.'] ;
$translations['_enter_phone_'] = ['Please enter phone number.','Bitte Telefonnummer eingeben.'] ;
$translations['_enter_lesson_'] = ['Please select lesson.','Bitte Lektion auswählen.'] ;
$translations['_enter_category_'] = ['Please select category.','Bitte Kategorie auswählen.'] ;
$translations['_enter_time_'] = ['Please select available time.','Bitte wählen Sie die verfügbare Zeit aus.'] ;
$translations['_enter_weekly_'] = ['Please select weekly day.','Bitte Wochentag auswählen.'] ;
$translations['_enter_message_'] = ['Please enter message.','Bitte Nachricht eingeben.'] ;
$translations['_success_message_'] = ['Your request have been submitted.','Ihre Anfrage wurde übermittelt.'] ;
$translations['_error_message_'] = ['Failed to send mail, please try again later.','E-Mail konnte nicht gesendet werden. Bitte versuchen Sie es später erneut.'] ;

if($_SESSION['language']=='ge'){

$translations['request_trial_name'] = 'Name';
$translations['request_trial_email'] = 'Email';
$translations['request_trial_dob'] = 'Geburtsdatum';
$translations['request_trial_telephone'] = 'Telefonnummer';
$translations['request_trial_lesson'] = 'Wo du fährst';
$translations['request_trial_category'] = 'Zeitlich';
$translations['request_trial_available_time'] = 'Wochentage';
$translations['request_trial_weekdays'] = 'Weekdays';
}else{

$translations['request_trial_name'] = 'Name';
$translations['request_trial_email'] = 'Email';
$translations['request_trial_dob'] = 'Geburtsdatum';
$translations['request_trial_telephone'] = 'Telefonnummer';
$translations['request_trial_lesson'] = 'Trial Lesson';
$translations['request_trial_category'] = 'Trial Category';
$translations['request_trial_available_time'] = 'Available Time';
$translations['request_trial_weekdays'] = 'Weekdays';
}

if($name=="")
{
	if($_SESSION['language']=='en'){
		echo json_encode(array('message'=>$translations['_enter_name_'][0]));
	}else{
		echo json_encode(array('message'=>$translations['_enter_name_'][1]));
	}
}
elseif($email=="")
{
	if($_SESSION['language']=='en'){
		echo json_encode(array('message'=>$translations['_enter_email_'][0]));
	}else{
		echo json_encode(array('message'=>$translations['_enter_email_'][1]));
	}
}
elseif($dob=="")
{

	if($_SESSION['language']=='en'){
		echo json_encode(array('message'=>$translations['_enter_dob_'][0]));
	}else{
		echo json_encode(array('message'=>$translations['_enter_dob_'][1]));
	}
}
elseif($phone_no=="")
{
	if($_SESSION['language']=='en'){
		echo json_encode(array('message'=>$translations['_enter_phone_'][0]));
	}else{
		echo json_encode(array('message'=>$translations['_enter_phone_'][1]));
	}
}
/*elseif(strlen($phone_no)!='10')
{
echo json_encode(array('message'=>'Please enter valid phone number.'));
}*/
elseif($trial_lesson=="")
{
	if($_SESSION['language']=='en'){
		echo json_encode(array('message'=>$translations['_enter_lesson_'][0]));
	}else{
		echo json_encode(array('message'=>$translations['_enter_lesson_'][1]));
	}
}
elseif($trial_category=="")
{
	if($_SESSION['language']=='en'){
		echo json_encode(array('message'=>$translations['_enter_category_'][0]));
	}else{
		echo json_encode(array('message'=>$translations['_enter_category_'][1]));
	}
}
elseif($trial_time_slot=="")
{
	if($_SESSION['language']=='en'){
		echo json_encode(array('message'=>$translations['_enter_time_'][0]));
	}else{
		echo json_encode(array('message'=>$translations['_enter_time_'][1]));
	}
}
elseif($trial_weekday=="")
{
	if($_SESSION['language']=='en'){
		echo json_encode(array('message'=>$translations['_enter_weekly_'][0]));
	}else{
		echo json_encode(array('message'=>$translations['_enter_weekly_'][1]));
	}
}
elseif($message=="")
{
	if($_SESSION['language']=='en'){
		echo json_encode(array('message'=>$translations['_enter_message_'][0]));
	}else{
		echo json_encode(array('message'=>$translations['_enter_message_'][1]));
	}
}

else{
// die();
	// var_dump($trial_time_slot);
$trial_lesson_value_detail=get_trial_lesson_detail_from_location($trial_lesson);
$trial_lesson_value=$trial_lesson_value_detail[0]['location_detail'];
$trial_category_value_detail=get_trial_category_detail_by_id($trial_category);
$trial_category_value=$trial_category_value_detail[0]['name'];
	$course_id_arrayss = explode(',', $trial_time_slot);
	// var_dump($trial_lesson_value);
	// var_dump($trial_category_value);
foreach ($trial_time_slot as $key => $value) {
$trial_time_slot_value_detail=get_trial_time_slot_detail_by_id($value['id']);
$trial_time_slot_value[]=$trial_time_slot_value_detail[0]['day'].'('.$trial_time_slot_value_detail[0]['start_time'].'-'.$trial_time_slot_value_detail[0]['end_time'].')';

}
$trial_time_slot_values=implode(',', $trial_time_slot_value);
foreach ($trial_weekday as $key => $value) {
$trial_weekday_value_detail=get_trial_weekday_detail_by_id($value['id']);
$trial_weekday_value[]=$trial_weekday_value_detail[0]['week_name'];

}
$trial_weekday_value=implode(',', $trial_weekday_value);
// var_dump($trial_time_slot_value);

// $trial_time_slot_value_detail=get_trial_time_slot_detail_by_id($id);
$trial_time_slot_value=$trial_time_slot_value_detail[0]['date'].'('.$trial_time_slot_value_detail[0]['start_time'].'-'.$trial_time_slot_value_detail[0]['end_time'.''];
$weekdays=implode(',', $trial_weekday);
// var_dump($weekday);
$time_slots=implode(',', $trial_time_slot);
// var_dump($weekday);


	$add_request=create_request_trial_lesson($name,$email,$dob,$phone_no,$trial_lesson,$trial_category,$time_slots,$weekdays,$message);
	if($add_request){
		$request_id=$conn->insert_id;
		 // $email=$user_detail[0]['email'];
            // var_dump($email);
		/*$recipients = array(
		"dharmaniz.partha@gmail.com",
		$trial_lesson_value_detail[0]['email'],
		);*/
		$recipients = array(
		"dharmaniz.mandeepsharma@gmail.com",
		"info@fahrschule-star.ch",
		"roman.zuber@fahrschulestar.com",
		);
		// $email_to = implode(',', $recipients); 
		
		foreach ($recipients as $key => $value) {
	
		  $to = $value;
       
        $subject = "Request A Trial Lesson Now";
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        $headers .= "From: info@fahrschule-star.ch";

        $email_message = '<!DOCTYPE html>

		<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
		<head>
		<title>Emailer</title>
		<meta charset="UTF-8"> 
		  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		    <meta name="viewport" content="width=device-width,initial-scale=1" />
		    <meta name="x-apple-disable-message-reformatting" />
		    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
		  <meta content="telephone=no" name="format-detection"> 
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css"/>
		<style>
			    {
					box-sizing: border-box;
				}
                .ii a[href] {
    color: #000 !important;
    text-decoration: none !important;
}
				body {
					margin: 0;
					padding: 0;
				}
		        table{

		        }
				a[x-apple-data-detectors] {
					color: #000000 !important;
					text-decoration: inherit !important;
				}

				#MessageViewBody a {
					color: #000000 !important;
					text-decoration: !important;
				}
				td a{
					color: #000000 !important;
					text-decoration: !important;
				}
		        .box-order {
		    max-width: 530px;
		    margin: auto;
		    background: white;
		    padding: 1rem 2rem;
		    box-shadow: 2px 4px 3px 5px #f1f8fd;
		    margin-top: -2rem;
		}
				p {
					line-height: inherit
				}

				@media (max-width:670px) {
					table{
						width:100% !important;
					}
					.icons-inner {
						text-align: center;
					}
					.box-order {
		    padding: 1rem 1rem;
		    box-shadow: 0 0;
		    margin-top: 0rem;
		}
		.column{
			width:100% !important;
		}
		         
					.icons-inner td {
						margin: 0 auto;
					}

					.row-content {
						width: 100% !important;
					}

					.mobile_hide {
						display: none;
					}

					.stack .column {
						width: 100%;
						display: block;
					}

					.mobile_hide {
						min-height: 0;
						max-height: 0;
						max-width: 0;
						overflow: hidden;
						font-size: 0px;
					}
				}
			</style>
		</head>
		<body style="background-color: #ffffff; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-image: url('.$config['base_url'].'/emailerimages/banner-img-email.jpg); background-position: top center; background-repeat: no-repeat; color: #000000; width: 650px;" width="650">
		<tbody>
		<tr>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 10px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
		<div class="spacer_block" style="height:0px;line-height:0px;font-size:1px;"> </div>
		<div class="spacer_block mobile_hide" style="height:30px;line-height:30px;font-size:1px;"> </div>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tr>
		<td style="width:100%;padding-right:0px;padding-left:0px;">
		<div align="center" style="line-height:10px"><img alt="Alternate text" src="'.$config['base_url'].'/emailerimages/logo.png" style="display: block; height: auto; border: 0; width: 128px; max-width: 100%;" title="Alternate text" width="128"/></div>
		</td>
		</tr>
		</table>
		<table align="center" border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td>
		<div style="font-family: sans-serif">
		<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2; font-family: Ubuntu, Tahoma, Verdana, Segoe, sans-serif;">
		<p style="margin: 0; font-size: 22px; text-align: center;"><span style="font-size:22px;"><span style="color:#ffffff;">Trial Lesson Request</strong></span></p>
		</div>
		</div>
		</td>
		</tr>
		<table align="center" border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td>
		<div style="font-family: Tahoma, Verdana, sans-serif">
		<div style="font-size: 12px; mso-line-height-alt: 18px; color: #555555; line-height: 1.5; font-family: Tahoma, Verdana, Segoe, sans-serif;">
		<p style="margin: 0; font-size: 12px; mso-line-height-alt: 18px;"> </p>
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

		<!-- custom table -->
		<table align="center" width="100%">
		<tbody><tr>
		<td>
		<center><h2 style="font-size: 26px;color: #003150;line-height: 1.2;font-family: Arial,Helvetica,sans-serif;"><strong>Trial Lessons Request Details</strong></h2></center>
		<table align="center" width="390px" style="margin: 0 auto;">
		<tbody style="vertical-align: top;">
			<tr>
		<th style="width: 50%;text-align:left;font-size: 14px;color: #003150;"><strong>'.$translations['request_trial_name'].'</strong></th>
		<td style="width: 50%;font-size: 14px;color: #040404;">'.$name.'</td>
		</tr>
		<tr>
		<th style="width: 50%;text-align:left;font-size: 14px;color: #003150;"><strong>'.$translations['request_trial_email'].'</strong></th>
		<td style="width: 50%;font-size: 14px;color: #040404 !important; text-decoration:none !important;"><a style="color: #000 !important; text-decoration: none !important;" href="mailto:'.$email.'" >'.$email.'</a></td>
		</tr>
		<tr>
		<th style="width: 50%;text-align:left;font-size: 14px;color: #003150;"><strong>'.$translations['request_trial_dob'].'</strong></th>
		<td style="width: 50%;font-size: 14px;color: #040404;">'.$dob.'</td>
		</tr>
		<tr>
		<th style="width: 50%;text-align:left;font-size: 14px;color: #003150;"><strong>'.$translations['request_trial_telephone'].'</strong></th>
		<td style="width: 50%;font-size: 14px;color: #040404;">'.$phone_no.'</td>
		</tr>
		<tr>
		<th style="width: 50%;text-align:left;font-size: 14px;color: #003150;"><strong>'.$translations['request_trial_lesson'].'</strong></th>
		<td style="width: 50%;font-size: 14px;color: #040404;">'.$trial_lesson_value.'</td>
		</tr>
		<tr>
		<th style="width: 50%;text-align:left;font-size: 14px;color: #003150;"><strong>'.$translations['request_trial_category'].'</strong></th>
		<td style="width: 50%;font-size: 14px;color: #040404;">'.$trial_category_value.'</td>
		</tr>
		
		<tr>
		<th style="width: 50%;text-align:left;font-size: 14px;color: #003150;"><strong>'.$translations['request_trial_available_time'].'</strong></th>
		<td style="width: 50%;font-size: 14px;color: #040404;">'.$trial_time_slot_values.'</td>
		</tr>
		<tr>
		<th style="width: 50%;text-align:left;font-size: 14px;color: #003150;"><strong>'.$translations['request_trial_weekdays'].'</strong></th>
		<td style="width: 50%;font-size: 14px;color: #040404;">'.$trial_weekday_value.'</td>
		</tr>
		<tr>
		<th style="width: 50%;text-align:left;font-size: 14px;color: #003150;"><strong>Messages</strong></th>
		<td style="width: 50%;font-size: 14px;color: #040404;">'.$message.'</td>
		</tr>


		<tr>
		<th style="width:100%" colspan="2">
		<center>
		<hr style="width: 150px;margin-top: 15px;border-color: #003150;background: #003150;border: 0px;border-top: 1px solid #003150;">
		</center>
		</th>
		</tr>
		</tbody>
		</table>

		<center><em><h2 style="width: 440px;font-size: 20px;color: #003150;line-height: 1.2;font-family: Arial,Helvetica,sans-serif;"><strong>For more lessons visit our website below is the lesson</strong></h2></em></center>
		<table align="center" border="0" cellpadding="10" cellspacing="0" class="button_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tr>
		<td>
		<div align="center"><a href="https://fahrschule-star.ch/" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#cc0103;border-radius:4px;width:auto;border-top:1px solid #cc0103;border-right:1px solid #cc0103;border-bottom:1px solid #cc0103;border-left:1px solid #cc0103;padding-top:5px;padding-bottom:5px;font-family:Ubuntu, Tahoma, Verdana, Segoe, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;" target="_blank"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;letter-spacing:normal;"><span style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;">Learn More</span></span></a>

		</div>
		</td>
		</tr>
		</table>
		</td>
		</tr>
		</tbody>
		</table>


		<table align="center"  align="center" border="0" cellpadding="0" cellspacing="0"  role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;display:none; max-width: 530px;
		    margin: auto;
		    background: white;
		    padding: 1rem 2rem;
		    box-shadow: 2px 4px 3px 5px #f1f8fd; margin-top: -2rem; -webkit-box-shadow: 1px 3px 62px 25px rgba(223,231,232,1);
		-moz-box-shadow: 1px 3px 62px 25px rgba(223,231,232,1);
		box-shadow: 1px 3px 62px 25px rgba(223,231,232,1);"class="box-order">
		<tbody>
		<tr>
		<td>

		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; ">
		<tbody>
		<tr>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
		<table align="center" border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td>
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #003150; line-height: 1.2; font-family: Arial, Helvetica, sans-serif;">
		<p style="margin: 0; font-size: 12px; text-align: center;"><span style="font-size:26px;"><strong>Trial Lessons Request Details</strong></span></p>
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

		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row-content" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000;" width="100%">
		<tbody>
		<tr>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #1c1a1a; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><strong><span style="font-size:14px;">Name</span></strong></p>
		</div>
		</div>
		</td>
		</tr>
		</table>
		</td>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="66.66666666666667%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial,Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #040404; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><span style="font-size:14px;">Vijunu</span></p>
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
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row-content" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000;" width="100%" >
		<tbody>
		<tr>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial,Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #1c1a1a; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><strong><span style="font-size:14px;">Email</span></strong></p>
		</div>
		</div>
		</td>
		</tr>
		</table>
		</td>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="66.66666666666667%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #040404; line-height: 1.2;">		</div>
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
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row-content" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; " width="100%">
		<tbody>
		<tr>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial,Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #1c1a1a; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><strong><span style="font-size:14px;">DOB</span></strong></p>
		</div>
		</div>
		</td>
		</tr>
		</table>
		</td>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="66.66666666666667%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #040404; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><span style="font-size:14px;">09-10-1994</span></p>
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
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row-content" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000;" width="100%">
		<tbody>
		<tr>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #1c1a1a; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><strong><span style="font-size:14px;">Trial Lesson</span></strong></p>
		</div>
		</div>
		</td>
		</tr>
		</table>
		</td>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="66.66666666666667%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #040404; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><span style="font-size:14px;">Withengen</span></p>
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
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row row-7" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row-content" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000;" width="100%">
		<tbody>
		<tr>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #1c1a1a; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><strong><span style="font-size:14px;">Trial Category</span></strong></p>
		</div>
		</div>
		</td>
		</tr>
		</table>
		</td>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="66.66666666666667%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #040404; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><span style="font-size:14px;">Auto-switched</span></p>
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
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row row-8" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row-content" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000;"  width="100%">
		<tbody>
		<tr>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #1c1a1a; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><strong><span style="font-size:14px;">Phone No.</span></strong></p>
		</div>
		</div>
		</td>
		</tr>
		</table>
		</td>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="66.66666666666667%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #040404; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><span style="font-size:14px;">8989896865</span></p>
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
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row row-9" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row-content" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000;"  width="100%">
		<tbody>
		<tr>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #1c1a1a; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><strong><span style="font-size:14px;">Available Time</span></strong></p>
		</div>
		</div>
		</td>
		</tr>
		</table>
		</td>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="66.66666666666667%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #040404; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><span style="font-size:14px;">Evening(05:00 - 07:00)</span></p>
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
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row row-10" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row-content" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000;"  width="100%" >
		<tbody>
		<tr>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" >
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #1c1a1a; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><strong><span style="font-size:14px;">Weekdays</span></strong></p>
		</div>
		</div>
		</td>
		</tr>
		</table>
		</td>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="66.66666666666667%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial,Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #040404; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><span style="font-size:14px;">Monday, Tuesday & Thursday</span></p>
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
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row row-11" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row-content" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; "  width="100%">
		<tbody>
		<tr>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #1c1a1a; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><strong><span style="font-size:14px;">Messages</span></strong></p>
		</div>
		</div>
		</td>
		</tr>
		</table>
		</td>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="66.66666666666667%">
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:5px;padding-bottom:5px;">
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial,Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #040404; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px;"><span style="font-size:14px;">Learn Lessons more</span></p>
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
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row row-12" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000;  width=100%">
		<tbody>
		<tr>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
		<table align="center" border="0" cellpadding="10" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tr>
		<td>
		<div align="center">
		<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="35%">
		<tr>
		<td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #646262;"><span> </span></td>
		</tr>
		</table>
		</div>
		</td>
		</tr>
		</table>
		<table align="center" border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td>
		<div style="font-family: Arial, sans-serif">
		<div style="font-size: 12px; font-family: Arial,Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #000000; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px; text-align: center;"><span style="font-size:20px;"><em><strong>For more lessons visit our website below is the lesson</strong></em></span></p>
		</div>
		</div>
		</td>
		</tr>
		</table>
		<table align="center" border="0" cellpadding="10" cellspacing="0" class="button_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tr>
		<td>
		<div align="center"><a href="https://fahrschule-star.ch/" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#cc0103;border-radius:4px;width:auto;border-top:1px solid #cc0103;border-right:1px solid #cc0103;border-bottom:1px solid #cc0103;border-left:1px solid #cc0103;padding-top:5px;padding-bottom:5px;font-family:Ubuntu, Tahoma, Verdana, Segoe, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;" target="_blank"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;letter-spacing:normal;"><span style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;">Learn More</span></span></a>

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
		<!---------table-content-------------------->
		</td>
		</tr>
		</tbody>
		</table>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row row-13" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 650px;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
		<tbody>
		<tr>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
		<div class="spacer_block" style="height:35px;line-height:35px;font-size:1px;"> </div>
		</td>
		</tr>
		</tbody>
		</table>
		</td>
		</tr>
		</tbody>
		</table>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row row-14" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #04293d;  width: 650px;" width="100%">
		<tbody>
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
		<tbody>
		<tr>
		<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 20px; padding-bottom: 20px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
		<table align="center" border="0" cellpadding="10" cellspacing="0" class="social_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tr>
		<td>
		<table align="center" align="center" border="0" cellpadding="0" cellspacing="0" class="social-table" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="184px">
		<tr>
		<td style="padding:0 7px 0 7px;"><a href="http://fahrchule-star.ch" target="_blank"><img alt="Facebook" height="32" src="'.$config['base_url'].'/emailerimages/facebook2x.png" style="display: block; height: auto; border: 0;" title="Facebook" width="32"/></a></td>
		<td style="padding:0 7px 0 7px;"><a href="http://fahrchule-star.ch" target="_blank"><img alt="Twitter" height="32" src="'.$config['base_url'].'/emailerimages/twitter2x.png" style="display: block; height: auto; border: 0;" title="Twitter" width="32"/></a></td>
		<td style="padding:0 7px 0 7px;"><a href="http://fahrchule-star.ch" target="_blank"><img alt="Instagram" height="32" src="'.$config['base_url'].'/emailerimages/instagram2x.png" style="display: block; height: auto; border: 0;" title="Instagram" width="32"/></a></td>
		<td style="padding:0 7px 0 7px;"><a href="http://fahrchule-star.ch" target="_blank"><img alt="LinkedIn" height="32" src="'.$config['base_url'].'/emailerimages/linkedin2x.png" style="display: block; height: auto; border: 0;" title="LinkedIn" width="32"/></a></td>
		</tr>
		</table>
		</td>
		</tr>
		</table>
		<table align="center" border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td>
		<div style="font-family: sans-serif">
		<div style="font-size: 14px; mso-line-height-alt: 25.2px; color: #ffffff; line-height: 1.8; font-family: Ubuntu, Tahoma, Verdana, Segoe, sans-serif;">
		<p style="margin: 0; font-size: 14px; text-align: center;"><a href="fahrchule-star.ch" rel="noopener" style="text-decoration: none; color: #ffffff;" target="_blank">www.fahrchule-star.ch</a></p>
		<p style="margin: 0; font-size: 14px; text-align: center;"><strong><span style="font-size:22px;">Fahrchule Star</span></strong></p>
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
		</table>
		</body>
		</html>';

		        $success = mail($to,$subject,$email_message,$headers);
		        		# code...
			
        $success = mail($to,$subject,$email_message,$headers);
        		# code...
		}
		
		    if($success)
		    {
		    	// Return Success - Valid Emailur email

				if($_SESSION['language']=='en'){
					$msg = $translations['_success_message_'][0];
				}else{
					$msg = $translations['_success_message_'][1];
				}
		    	//http_response_code(401);
				$json_message = array("status"=>1,"message"=>$msg,'mail'=>$success,'color'=>'green');
				send_response($json_message);
				exit;
		    }
		    else
		    {
		    	if($_SESSION['language']=='en'){
					$msg = $translations['_error_message_'][0];
				}else{
					$msg = $translations['_error_message_'][1];
				}
		    	echo json_encode(array('status'=>0,'message'=>$msg,'success'=>$e,'color'=>'red'));
		  		exit();
		    }
		    
	
	}
	else{
		    	if($_SESSION['language']=='en'){
					$msg = $translations['_error_message_'][0];
				}else{
					$msg = $translations['_error_message_'][1];
				}
		echo json_encode(array('status'=>0,'message'=>$msg,'success'=>$e,'color'=>'red'));
        exit();
	}
}