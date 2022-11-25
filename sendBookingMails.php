<?php
session_start();
include 'Config/Connection.php';
include 'Functions.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'phpmailer/autoload.php';

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



		$course_id = $_REQUEST['course_ids'];
		$user_id = $_REQUEST['user_id'];
		$total_price = $_REQUEST['total_price'];


		$userdetail = get_user_detail($user_id);
		//$email = $userdetail['email'];
		$email = 'dharmaniz.mandeepsharma@gmail.com';
		$firstname = $userdetail['firstname'];
		$lastname = $userdetail['lastname'];
		$company_name = $userdetail['company_name'];
		$country = $userdetail['country'];
		$city = $userdetail['city'];
		$street = $userdetail['street'];
		$postcode = $userdetail['postcode'];
		$phone = $userdetail['phone'];

		$name = $firstname?$firstname.' '.$lastname:$company_name;

		$course_id_arrayss = explode(',', $course_id);

		$get_detail = get_multiple_course_detail($course_id);
		$coursetab =  get_course_detail($course_id);
		
		$cat_id = $coursetab['category_id'];
		
		$moto_alias = 'Moto_background_image';
		
		$Firstaid_alias = 'Firstaid_background_image';
		
		$vku_alias = 'vku_background_image';
		
		$moto_detail = getDataFromTable('page_content_translation','*',['alias'=>$moto_alias],'')[0]; 
		
		$Firstaid_detail = getDataFromTable('page_content_translation','*',['alias'=>$Firstaid_alias],'')[0]; 
		
		$vku_detail = getDataFromTable('page_content_translation','*',['alias'=>$vku_alias],'')[0]; 
		
		
		$coursedetail = get_category_detail($cat_id);
			
			$coursename = $coursedetail['name'];
		
		$moto_image = $config['base_url'].'/admin/addtranslation/images/'.$moto_detail['inenglish'];
		
		$Firstaid_image = $config['base_url'].'/admin/addtranslation/images/'.$Firstaid_detail['inenglish'];
		
		$vku_image = $config['base_url'].'/admin/addtranslation/images/'.$vku_detail['inenglish'];
		
		
		if($cat_id == "3"){
			
			$img = $vku_image;
		}
		elseif($cat_id == "2"){
			
			$img = $Firstaid_image;
		}
		elseif($cat_id == "1"){
			
			$img = $moto_image;
		}
		else{
			$img = $config['base_url'].'/admin/addtranslation/images/img110.jpg618122f529079.jpg'; 
		}
		
		 $email_html = "";
	foreach($get_detail as $key => $val){
		
					     $new = email_array();
						 
						 
				 $email_html .=  "<table align='center' border=
			'0' cellpadding=
			'0' cellspacing=
			'0' class=
			'row row-7' role=
			'presentation' style=
			'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
			'100%'>
			<tbody>
			<tr>
			<td>
			<table align='center' border=
			'0' cellpadding=
			'0' cellspacing=
			'0' class=
			'row-content stack' role=
			'presentation' style=
			'mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000;' width=
			'700'>
			<tbody>
			<tr>
			<td class='column' style=
			'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-bottom: 1px solid #E8E8E8; border-left: 3px solid #E8E8E8; border-right: 1px solid #E8E8E8; border-top: 1px solid #E8E8E8;' width=
			'66.66666666666667%'>
			<table border='0' cellpadding=
			'0' cellspacing=
			'0' class=
			'text_block' role=
			'presentation' style=
			'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
			'100%'>
			<tr>
			<td style='padding-bottom:25px;padding-left:35px;padding-right:10px;padding-top:10px;'>
			<div style='font-family: sans-serif'>
			<div style='font-size: 12px; mso-line-height-alt: 18px; color: #555555; line-height: 1.5; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
			<p id='css_cs_cursor' style=
			'margin: 0; font-size: 18px; mso-line-height-alt: 27px;'><span id='css_cs_cursor' style=
			'font-size:18px;'>".$val['course_detail']." ".$new['_course_part_']." ".$val['course_no']." ".$val['course_day']." ".$new['_course2_']."</span></p>
			<p id='css_cs_cursor' style=
			'margin: 0; font-size: 18px; mso-line-height-alt: 27px;'><span id='css_cs_cursor' style=
			'font-size:18px;'>".$val['c_date']. " @ " .$val['c_time']. " - " .$val['c_end_time']."</span></p>
			<p id='css_cs_cursor' style=
			'margin: 0; font-size: 18px; mso-line-height-alt: 27px;'><span id='css_cs_cursor' style=
			'font-size:18px;'>".$val['place']."</span></p>
			</div>
			</div>
			</td>
			</tr>
			</table>
			</td>
			<td class='column' style=
			'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 2px solid #E8E8E8; border-right: 2px solid #E8E8E8; border-bottom: 1px solid #E8E8E8; border-left: 1px solid #E8E8E8;' width=
			'33.333333333333336%'>
			<table border='0' cellpadding=
			'0' cellspacing=
			'0' class=
			'text_block' role=
			'presentation' style=
			'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
			'100%'>
			<tr>
			<td style='padding-top:15px;padding-right:10px;padding-bottom:15px;padding-left:10px;'>
			<div style='font-family: sans-serif'>
			<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #555555; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
			<p id='css_cs_cursor' style=
			'margin: 0; font-size: 14px;'><span style='font-size:22px;'>".$val['price']."</span></p>
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
			</table>"; 
					
				}


		$mail = new PHPMailer(true);
		try{
		    //Server settings
		    $mail->isHTML(true);  
		    $mail->CharSet = 'UTF-8';
		    $mail->Encoding = 'base64';
		    $mail->SMTPDebug = 0; 
		    $mail->setFrom("info@fahrschule-star.ch",'Fahrschule STAR');
		    $mail->addAddress($email,"");     // Add a recipient
		   
		    $mail->Subject = 'New Mail From Fahrschule STAR';
		   
		    $content = "<!DOCTYPE html>

					<html lang='en' xmlns:o=
					'urn:schemas-microsoft-com:office:office' xmlns:v=
					'urn:schemas-microsoft-com:vml'>
					<head>
					<title></title>
					<meta charset='utf-8'/>
					<meta content='width=device-width, initial-scale=1.0' name=
					'viewport'/>
					<!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
					<style>
							* {
								box-sizing: border-box;
							}

							body {
								margin: 0;
								padding: 0;
							}

							/*th.column{
						padding:0
					}*/

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

							@media (max-width:720px) {
								.icons-inner {
									text-align: center;
								}

								.icons-inner td {
									margin: 0 auto;
								}

								.row-content {
									width: 100% !important;
								}

								.image_block img.big {
									width: auto !important;
								}

								.stack .column {
									width: 100%;
									display: block;
								}
							}
						</style>
					</head>
					<body style='background-color: #fbfbfb; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;'>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'nl-container' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fbfbfb;' width=
					'100%'>
					<tbody>
					<tr>
					<td>
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row row-1' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'100%'>
					<tbody>
					<tr>
					<td>
					<table align='center' border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row-content stack' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000;' width=
					'700'>
					<tbody>
					<tr>
					<td class='column' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width=
					'100%'>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'image_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'100%'>
					<tr>
					<td style='width:100%;padding-right:0px;padding-left:0px;padding-top:20px;padding-bottom:20px;'>
					<div align='center' style=
					'line-height:10px'><img alt='Alternate text' src=
					'".$config['base_url']."/images/logo_1.png' style=
					'display: block; height: auto; border: 0; width: 140px; max-width: 100%;' title=
					'Alternate text' width=
					'140'/></div>
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
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row row-2' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'100%'>
					<tbody>
					<tr>
					<td>
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row-content stack' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #4ba7ff; color: #000000;' width=
					'700'>
					<tbody>
					<tr>
					<td class='column' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width=
					'100%'>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'image_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'100%'>
					<tr>
					<td style='width:100%;padding-right:0px;padding-left:0px;'>
					<div align='center' style=
					'line-height:10px'><img alt='Alternate text' class=
					'big' src=
					'$img' style=
					'display: block; height: auto; border: 0; width: 700px; max-width: 100%;' title=
					'Alternate text' width=
					'700'/></div>
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
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row row-3' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'100%'>
					<tbody>
					<tr>
					<td>
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row-content stack' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f4f4f4; color: #000000;' width=
					'700'>
					<tbody>
					<tr>
					<td class='column' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width=
					'100%'>
					<table border='0' cellpadding='10' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td>
					<div style='font-family: sans-serif'>
					<div style='font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p id='css_cs_cursor' style=
					'margin: 0; font-size: 14px;'><span id='css_cs_cursor' style='font-size:28px;'>  <span id='css_cs_cursor' style='font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;
					    font-size: 20px;
					    font-weight: bold;
					   '>Hi ".$name.",</span></span></p>
					</div>
					</div>
					</td>
					</tr>
					</table>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td style='padding-bottom:10px;padding-left:25px;padding-right:10px;padding-top:0px;'>
					<div style='font-family: sans-serif'>
					<div style='font-size: 12px; mso-line-height-alt: 18px; color: #555555; line-height: 1.5; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p id='css_cs_cursor' style=
					'margin: 0; font-size: 14px; mso-line-height-alt: 27px;'><span id='css_cs_cursor' style=
					'font-size:18px;'>Thank you for your purchase through FahrschuleStar. Here is an overview of your recent purchase:</span></p>
					<p id='css_cs_cursor' style=
					'margin: 0; font-size: 14px; mso-line-height-alt: 42px;'><span style='font-size:28px;'><strong><span id=
					'css_cs_cursor' style=
					'
					'>".$coursename."</span></strong></span></p>
					<p id='css_cs_cursor' style=
					'margin: 0; font-size: 14px; mso-line-height-alt: 25.5px;'><span style='font-size:17px;'><span id='css_cs_cursor' style=
					' ><img src=
					'".$config['base_url']."/images/location.png' style=
					'
					    width: 20px;
					    margin-top: 3px;
					    vertical-align: bottom;
					    margin-right: 10px;
					'>".$val['location_name']."</span></span></p>
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
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row row-4' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'100%'>
					<tbody>
					<tr>
					<td>
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row-content stack' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f4f4f4; color: #000000;' width=
					'700'>
					<tbody>
					<tr>
					<td class='column' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width=
					'50%'>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td style='padding-bottom:00px;padding-left:25px;padding-right:10px;padding-top:0px;'>
					<div style='font-family: sans-serif'>
					<div style='font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #232323; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p id='css_cs_cursor' style=
					'margin: 0; font-size: 14px;'><strong><span id=
					'css_cs_cursor' style=
					'font-size:17px;'>Invoiced to:</span></strong></p>
					</div>
					</div>
					</td>
					</tr>
					</table>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td style='padding-left:25px;padding-right:10px;padding-top:5px;'>
					<div style='font-family: sans-serif'>
					<div style='font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #848484; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p style='margin: 0; font-size: 14px;'><span style='font-size:15px;'>".$name."</span></p>
					</div>
					</div>
					</td>
					</tr>
					</table>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td style='padding-left:25px;padding-right:10px;padding-top:5px;'>
					<div style='font-family: sans-serif'>
					<div style='font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #848484; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p style='margin: 0; font-size: 14px;'><span style='font-size:15px;'>".$street."</span></p>
					</div>
					</div>
					</td>
					</tr>
					</table>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td style='padding-left:25px;padding-right:10px;padding-top:5px;'>
					<div style='font-family: sans-serif'>
					<div style='font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #848484; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p style='margin: 0; font-size: 14px;'><span style='font-size:15px;'>".$postcode."</span></p>
					</div>
					</div>
					</td>
					</tr>
					</table>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td style='padding-left:25px;padding-right:10px;padding-top:5px;'>
					<div style='font-family: sans-serif'>
					<div style='font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #848484; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p style='margin: 0; font-size: 14px;'><span style='font-size:15px;'>".$country."</span></p>
					</div>
					</div>
					</td>
					</tr>
					</table>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td style='padding-left:25px;padding-right:10px;padding-top:5px;padding-bottom:5px;'>
					<div style='font-family: sans-serif'>
					<div style='font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #848484; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p style='margin: 0; padding-bottom: 	10px; font-size: 14px;'><span style='font-size:15px;'>VAT No: FR12345678</span></p>
					</div>
					</div>
					</td>
					</tr>
					</table>
					</td>
					<td class='column' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width=
					'50%'>
					<div class='spacer_block' style=
					'height:75px;line-height:5px;font-size:1px;'> </div>
					</td>
					</tr>
					</tbody>
					</table>
					</td>
					</tr>
					</tbody>
					</table>
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row row-5' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'100%'>
					<tbody>
					<tr>
					<td>
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row-content stack' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000;' width=
					'700'>
					<tbody>
					<tr>
					<td class='column' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width=
					'100%'>
					<table border='0' cellpadding=
					'10' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td>
					<div style='font-family: sans-serif'>
					<div style='font-size: 12px; mso-line-height-alt: 18px; color: #555555; line-height: 1.5; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p id='css_cs_cursor' style=
					'margin: 0; font-size: 14px;'><strong><span id=
					'css_cs_cursor' style=
					'font-size:22px;'>Your Product: ".$coursename."</span></strong></p>
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
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row row-6' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'100%'>
					<tbody>
					<tr>
					<td>
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row-content stack' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f1f5fa; color: #000000;' width=
					'700'>
					<tbody>
					<tr>
					<td class='column' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-bottom: 0px solid #E8E8E8; border-left: 0px solid #E8E8E8; border-right: 0px solid #E8E8E8; border-top: 0px solid #E8E8E8;' width=
					'66.66666666666667%'>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>	
					<td style='padding-bottom:25px;padding-left:35px;padding-right:10px;padding-top:10px;'>
					<div style='font-family: sans-serif'>
					<div style='font-size: 12px; mso-line-height-alt: 18px; color: #555555; line-height: 1.5; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p id='css_cs_cursor' style=
					'margin: 0; font-size: 14px;'><strong><span id=
					'css_cs_cursor' style=
					'font-size:22px;'>Product</span></strong></p>
					</div>
					</div>
					</td>
					</tr>
					</table>
					</td>

					<td class='column' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-bottom: 0px solid #E8E8E8; border-left: 0px solid #E8E8E8; border-right: 0px solid #E8E8E8; border-top: 0px solid #E8E8E8;' width=
					'33.333333333333336%'>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td style='padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;'>
					<div style='font-family: sans-serif'>
					<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #555555; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p id='css_cs_cursor' style=
					'margin: 0; font-size: 14px;'><span style='font-size:22px;'><strong id='css_cs_cursor'>Subtotal</strong></span></p>
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
					".$email_html." 
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row row-9' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'100%'>
					<tbody>
					<tr>
					<td>
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row-content stack' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000;' width=
					'700'>
					<tbody>
					<tr>
					<td class='column' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-bottom: 2px solid #E8E8E8; border-left: 2px solid #E8E8E8; border-right: 0px solid #E8E8E8; border-top: 1px solid #E8E8E8;' width=
					'66.66666666666667%'>
					<table border='0' cellpadding=
					'20' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td>
					<div style='font-family: sans-serif'>
					<div style='font-size: 12px; mso-line-height-alt: 18px; color: #555555; line-height: 1.5; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p id='css_cs_cursor' style=
					'margin: 0; font-size: 14px; mso-line-height-alt: 30px;'><span style='font-size:20px;'><strong id='css_cs_cursor'>Subtotal</strong></span></p>
					</div>
					</div>
					</td>
					</tr>
					</table>
					</td>
					<td class='column' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-bottom: 2px solid #E8E8E8; border-left: 2px solid #E8E8E8; border-right: 2px solid #E8E8E8; border-top: 1px solid #E8E8E8;' width=
					'33.333333333333336%'>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td style='padding-top:15px;padding-right:10px;padding-bottom:15px;padding-left:10px;'>
					<div style='font-family: sans-serif'>
					<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #555555; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p id='css_cs_cursor' style=
					'margin: 0; font-size: 14px;'><span id='css_cs_cursor' style=
					'font-size:22px;'>".$total_price."</span></p>
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
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row row-10' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'100%'>
					<tbody>
					<tr>
					<td>
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row-content stack' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000;' width=
					'700'>
					<tbody>
					<tr>
					<td class='column' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-bottom: 2px solid #E8E8E8; border-left: 2px solid #E8E8E8; border-right: 0px solid #E8E8E8; border-top: 0px solid #E8E8E8;' width=
					'66.66666666666667%'>
					<table border='0' cellpadding=
					'20' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td>
					<div style='font-family: sans-serif'>
					<div style='font-size: 12px; mso-line-height-alt: 18px; color: #555555; line-height: 1.5; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p id='css_cs_cursor' style=
					'margin: 0; font-size: 14px; mso-line-height-alt: 30px;'><span style='font-size:20px;'><strong id='css_cs_cursor'>Total</strong></span></p>
					</div>
					</div>
					</td>
					</tr>
					</table>
					</td>
					<td class='column' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-bottom: 2px solid #E8E8E8; border-left: 2px solid #E8E8E8; border-right: 2px solid #E8E8E8; border-top: 0px solid #E8E8E8;' width=
					'33.333333333333336%'>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td style='padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;'>
					<div style='font-family: sans-serif'>
					<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #555555; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p id='css_cs_cursor' style=
					'margin: 0; font-size: 14px;'><strong><span id=
					'css_cs_cursor' style=
					'font-size:20px;'>".$total_price."</span></strong></p>
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
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row row-11' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'100%'>
					<tbody>
					<tr>
					<td>
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row-content stack' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000;' width=
					'700'>
					<tbody>
					<tr>
					<td class='column' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width=
					'100%'>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'image_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'100%'>
					<tr>
					<td style='width:100%;padding-right:0px;padding-left:0px;'>
					<div align='center' style=
					'line-height:10px'><img alt='I'm an image' src=
					'".$config['base_url']."/images/logo_1.png' style=
					'display: block; height: auto; border: 0; width: 140px; max-width: 100%;' title=
					'I'm an image' width=
					'140'/></div>
					</td>
					</tr>
					</table>
					<table border='0' cellpadding=
					'10' cellspacing=
					'0' class=
					'social_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'100%'>
					<tr>
					<td>
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'social-table' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'168px'>
					<tr>
					<td style='padding:0 5px 0 5px;'><a href='https://www.facebook.com/' target=
					'_blank'><img alt='Facebook' height=
					'32' src=
					'".$config['base_url']."/images/facebook2x.png' style=
					'display: block; height: auto; border: 0;' title=
					'Facebook' width=
					'32'/></a></td>
					<td style='padding:0 5px 0 5px;'><a href='https://twitter.com/' target=
					'_blank'><img alt='Twitter' height=
					'32' src=
					'".$config['base_url']."/images/twitter2x.png' style=
					'display: block; height: auto; border: 0;' title=
					'Twitter' width=
					'32'/></a></td>
					<td style='padding:0 5px 0 5px;'><a href='https://instagram.com/' target=
					'_blank'><img alt='Instagram' height=
					'32' src=
					'".$config['base_url']."/images/instagram2x.png' style=
					'display: block; height: auto; border: 0;' title=
					'Instagram' width=
					'32'/></a></td>
					<td style='padding:0 5px 0 5px;'><a href='https://www.linkedin.com/' target=
					'_blank'><img alt='LinkedIn' height=
					'32' src=
					'".$config['base_url']."/images/linkedin2x.png' style=
					'display: block; height: auto; border: 0;' title=
					'LinkedIn' width=
					'32'/></a></td>
					</tr>
					</table>
					</td>
					</tr>
					</table>
					<table border='0' cellpadding=
					'0' cellspacing=
					'0' class=
					'text_block' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width=
					'100%'>
					<tr>
					<td style='padding-bottom:5px;padding-left:10px;padding-right:10px;padding-top:10px;'>
					<div style='font-family: sans-serif'>
					<div style='font-size: 12px; mso-line-height-alt: 18px; color: #555555; line-height: 1.5; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
					<p id='css_cs_cursor' style=
					'margin: 0; font-size: 14px; text-align: center;'>Landstrasse 20, 5430 Wettingen / Phone: 056 611 99 77 / Contact</p>

						<div style=
					'font-size: 12px; mso-line-height-alt: 18px; color: #555555; line-height: 1.5; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;
					'>
					<p id='css_cs_cursor' style=
					'margin-top	: 10; font-size: 14px; text-align: center;'>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>

					</div>
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
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row row-12' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width=
					'100%'>
					<tbody>
					<tr>
					<td>
					<table align='center' border=
					'0' cellpadding=
					'0' cellspacing=
					'0' class=
					'row-content stack' role=
					'presentation' style=
					'mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000;' width=
					'700'>
					<!--  -->
					</table>
					</td>
					</tr>
					</tbody>
					</table><!-- End -->
					</body>
					</html>";




    	    $mail->Body=$content;

		    $success = $mail->send();
}
catch (Exception $e) {
		     
		  echo json_encode(array('status'=>0,'message'=>'Failed','success'=>$e,'color'=>'red'));
		  exit();
}



?>