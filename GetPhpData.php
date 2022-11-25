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


if($_SESSION['language']=='en'){
	$translations['_course_already_booked_'] = ['This course is already booked for this user.'] ;
	$translations['_course_slot_full_'] = ['These course slots are full.'] ;
	$translations['_new_user_success_'] = ['New User Signed Up Successfully.'] ;
	$translations['_new_user_failed_'] = ['Failed to signup as user, please try again later.'] ;
	$translations['_signup_success_'] = ['You have successfully Signed Up!'] ;
	$translations['_login_success_'] = ['Logged in successfully.'] ;
	$translations['_email_exists_with_us_'] = ["Your email is registered with us."] ;
	$translations['_login_fail_'] = ['Email or password is incorrect.'];
	$translations['_query_success_'] = ['Your query has been submitted. Thank You for contacting us.'];
	$translations['_query_failed_'] = ['Failed to send mail.'];
	$translations['_email_exists_'] = ['This email is already registered with us.'];
	$translations['_profile_update_success_'] = ['Profile updated successfully.'];
	$translations['_profile_update_failed_'] = ['Failed to update profile.'];
	$translations['_password_change_success_'] = ['Password updated successfully.'];
	$translations['_password_change_failed_'] = ['Failed to update password.'];
	$translations['forgot_password_title'] = ['Reset password'];
	$translations['_password_change_failed_'] = ['Please click on the link below and reset your password.'];
	$translations['_course_cancel_failed_'] = ['Failed to cancel course, Please try again later.'];
	$translations['_course_cancel_success_'] = ['Course cancelled successfully.'];
}else{
	$translations['_course_already_booked_'] = ['Dieser Kurs ist für diesen Benutzer bereits gebucht.'] ;
	$translations['_new_user_success_'] = ['Neuer Benutzer erfolgreich registriert.'] ;
	$translations['_course_slot_full_'] = ['Diese Kursplätze sind ausgebucht.'] ;
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
	$translations['forgot_password_title'] = ['Zurücksetzen des passworts'];
	$translations['forgot_password_message'] = ['Bitte klicken sie auf den unten stehenden link und setzen sie lhr passwort zuruck.'];
	$translations['_course_cancel_failed_'] = ['Der Kurs konnte nicht storniert werden. Bitte versuchen Sie es später erneut.'];
	$translations['_course_cancel_success_'] = ['Kurs erfolgreich abgebrochen.'];

}

/*echo json_encode(array('status'=>0,'message'=>'Failed to send mail','success'=>$e,'color'=>'red','data'=>$_POST));
  		exit();*/
if(isset($_POST['type']))
{
	global $conn;
	$type = $_POST['type'];

	if($type=='get_sub_category')
	{
		
		
		$category_id = $_POST['id'];
		$get_subcategories_by_category_id = get_subcategories_by_category_id($category_id);
		if($get_subcategories_by_category_id)
		{
			echo json_encode(array('status'=>1,'data'=>$get_subcategories_by_category_id));
			//exit();
		}
		else
		{
			echo json_encode(array('status'=>0,'data'=>''));
			exit();
		}
	}
	if($type=='get_location')
	{
		
		$category_id = $_POST['id'];
		$sub_category_id=$_POST['sub_category_id'];
		$get_location_by_category_id = get_location_by_category_id($category_id,$sub_category_id);
		if($get_location_by_category_id)
		{
			$total=get_total_location_by_category_id($category_id,$sub_category_id);
			echo json_encode(array('status'=>1,'data'=>$get_location_by_category_id,'total'=>$total[0]['total']));
			// exit();
		}
		else
		{
			echo json_encode(array('status'=>0,'data'=>''));
			exit();
		}
	}
	if($type=='get_user_detail')
	{
	
		$user_id = $_POST['user_id'];
		$get_user_detail = get_user_detail($user_id);
		$get_latest_plan = get_latest_plan($user_id);

		if($get_user_detail)
		{
			echo json_encode(array('status'=>1,'data'=>$get_user_detail,'latest_plan'=>$get_latest_plan));
			// exit();
		}
		else
		{
			echo json_encode(array('status'=>0,'data'=>'No such user found'));
			exit();
		}
	}
	if($type=='get_courses')
	{
	
		// var_dump($_POST);
		/*$category_id = '3';
		$sub_category_id = '5';
		$location_id = '2,3';*/
		$user_id=$_POST['user_id'];
		$category_id = $_POST['category_id'];
		$sub_category_id = $_POST['sub_category_id'];
		$location_id = $_POST['location_id'];
		$page_no=$_POST['page_no'];
		$per_page=$_POST['per_page'];
		// var_dump($_POST);
		// $per_page=2;	
        $offset = ($page_no-1) * $per_page; 
        if($sub_category_id==""){
		    $get_category_detail = get_category_detail($category_id);
        $no_of_parts = $get_category_detail['no_of_parts'];
        $part_name=get_categories_part_name($category_id);
        }else{
        $get_category_detail = 	get_subcategory_detail($sub_category_id);
         $no_of_parts = $get_category_detail['no_of_parts'];
        $part_name=get_subcategories_part_name($sub_category_id);
        }
        for ($i=1; $i <= $no_of_parts; $i++) { 
        	$get_all_filtered_courses[] = get_all_filtered_courses($user_id,$category_id,$sub_category_id,$location_id,$i,$offset,$per_page);
        	//$get_all_filtered_courses[] = get_all_filtered_coursesss($user_id,$category_id,$sub_category_id,$location_id,$i,$offset,$per_page,'','');

          //$total_course[]= get_course_counts($category_id,$sub_category_id,$location_id,$i);
          $total['course_count'] =  count(get_all_filtered_courses($user_id,$category_id,$sub_category_id,$location_id,$i,0,100));
          $total_course[]= $total;

        }

       
       
		
		// var_dump($part_name);
		
		if($no_of_parts)
		{

			echo json_encode(array('status'=>1,'data'=>$get_all_filtered_courses,'no_of_parts'=>$no_of_parts,'part_name'=>$part_name,'total_course'=>$total_course));
			// exit();
		}
		else
		{
			echo json_encode(array('status'=>0,'data'=>''));
			exit();
		}
	}


		if($type=='get_part_courses')
	{
		// var_dump($_POST);
		/*$category_id = '3';
		$sub_category_id = '5';
		$location_id = '2,3';*/
		$user_id=$_POST['user_id'];
		$category_id = $_POST['category_id'];
		$sub_category_id = $_POST['sub_category_id'];
		$location_id = $_POST['location_id'];
		$page_no=$_POST['page_no'];
		$per_page=$_POST['per_page'];
		$part_id=$_POST['part_id'];
		//{user_id:user_id,category_id:final_category_id,sub_category_id:final_subcategory_id,location_id:final_location_id,type:'get_part_courses',page_no:page_no,per_page:per_page,part_id:part_id}


		// var_dump($page_no);
		// $per_page=2;	
    $offset = ($page_no-1) * $per_page; 
		$get_category_detail = get_category_detail($category_id);
		$no_of_parts = $get_category_detail['no_of_parts'];
		$part_name=get_categories_part_name($category_id);


    
	 	$get_all_filtered_courses = get_all_filtered_coursesss($user_id,$category_id,$sub_category_id,$location_id,$part_id,$offset,$per_page,$course_type,$type);
        	// var_dump($get_all_filtered_courses);

		//get_all_next_enabled_courses($user_id,$category_id,$sub_category_id,$location_id,$part_id,$offset,$per_page,$course_type,$start,$end)

        // }
		$total_course=count($get_all_filtered_courses);
		if($total_course<6){
			$last_page=true;
		}
		else{
			$last_page=false;
		}
		// var_dump($get_all_filtered_courses);
		
		if($no_of_parts)
		{
		
			echo json_encode(array('status'=>1,'data'=>$get_all_filtered_courses,'no_of_parts'=>$no_of_parts,'part_name'=>$part_name,'last_page'=>$last_page));
			// exit();
		}
		else
		{
			echo json_encode(array('status'=>0,'data'=>''));
			exit();
		}
	}
	if($type=='get_next_course_only')
	{
		$user_id=$_POST['user_id'];
		$course_id=$_POST['course_id'];
		$part_id = $_POST['part_id'];
		$location_id = $_POST['location_id'];
		$position = $_POST['position'];
		$page_no = 1;
		$per_page = 4;
		
		$course_details = getDataFromTable('tbl_course','*',['course_id'=>$course_id],'')[0];
	//	print_r($course_details);die;
		$category_id = $course_details['category_id'];
		$sub_category_id = $course_details['sub_category_id'];
		$course_start_date = $course_details['course_date'];
		$course_end_date = $course_details['course_end_date'];
		$course_type = $course_details['course_type'];

    $offset = ($page_no-1) * $per_page; 
    $get_category_detail = get_category_detail($category_id);
    $no_of_parts = $get_category_detail['no_of_parts'];
    $part_name=get_categories_part_name($category_id);
    $part_id=$_POST['part_id'];
    // for ($i=1; $i <= $no_of_parts; $i++) { 
		if($course_type==1){
    	$per_page = 1;
    	$offset = ($page_no-1) * $per_page; 
    }
    $get_all_filtered_courses = get_all_next_enabled_courses($user_id,$category_id,$sub_category_id,$location_id,$part_id,$offset,$per_page,$course_type,$course_start_date,$course_end_date);
     
		$total_course=count($get_all_filtered_courses);
		if($total_course<6){
			$last_page=true;
		}
		else{
			$last_page=false;
		}
		// var_dump($get_all_filtered_courses);
		
		if($no_of_parts)
		{
			echo json_encode(array('status'=>1,'data'=>$get_all_filtered_courses,'no_of_parts'=>$no_of_parts,'part_name'=>$part_name,'last_page'=>$last_page));
			// exit();
		}
		else
		{
			echo json_encode(array('status'=>0,'data'=>''));
			exit();
		}
	}
	if($type=='review')
	{
				
		
		$course_id = $_POST['course_id'];
		$get_multiple_course_detail = get_multiple_course_detail($course_id);
		$last_index = count($get_multiple_course_detail)-1;
		$total_price = $get_multiple_course_detail[$last_index]['total_price'];
		$get_multiple_course_detail = array_reverse($get_multiple_course_detail);
		if($get_multiple_course_detail)
		{
			echo json_encode(array('status'=>1,'total_price'=>$total_price,'data'=>$get_multiple_course_detail));
			// exit();
		}
		else
		{
			echo json_encode(array('status'=>0,'data'=>''));
			exit();
		}
	}
	if($type=='Login')
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$login_user = login_user($email,$password);
		if($login_user)
		{
			$user_id = $login_user['user_id'];
			$get_user_detail = get_user_detail($user_id);
			$_SESSION['user_id'] = $user_id;
			echo json_encode(array('status'=>1,'message'=>$translations['_login_success_'][0],'user_id'=>$user_id,'data'=>$get_user_detail));
			// exit();
		}
		else
		{
			echo json_encode(array('status'=>0,'message'=>$translations['_login_fail_'][0]));
			exit();
		}
	}
	if($type=='submit_order')
	{
 			//print_r($_POST);die;
		 $new = email_array();
	
		$user_id = $_SESSION['user_id'];
		
		$userdetail = get_user_detail($user_id);

    $email_to = $userdetail['email'];
		
		$booked_array = array();
		$user_id = $_POST['user_id'];
		$firstname = $_POST['firstname']?$_POST['firstname']:$userdetail['firstname'];
		$lastname = $_POST['lastname']?$_POST['lastname']:$userdetail['lastname'];
		$company_name = $_POST['company_name']?$_POST['company_name']:$userdetail['company_name'];
		$postcode = $_POST['postcode']?$_POST['postcode']:$userdetail['postcode'];
		$phone = $_POST['phone']?$_POST['phone']:$userdetail['phone'];
		$street = $_POST['street']?$_POST['street']:$userdetail['street'];
		$city = $_POST['city']?$_POST['city']:$userdetail['city'];
		$email = $_POST['email']?$_POST['email']:$email_to;
	 
		$name = $firstname?$firstname.' '.$lastname:$company_name;
		
	//	print_r($email);die;
		$password = $_POST['password'];
		$description = $_POST['description'];
		$payment_type = $_POST['payment_type'];
		$course_id = $_POST['course_id'];
		$total_price = $_POST['total_price'];
		$signup = $_POST['signup'];
		
		$course_id_arrayss = explode(',', $course_id);
		
		$get_detail = get_multiple_course_detail($course_id);
		 
		$coursetab =  get_course_detail($course_id);
		
		$cat_id = $coursetab['category_id'];
		
		//print_r($cat_id); die;
		
		$totalBookings = getDataFromTable('billing_details','count(*) as total',['course_id'=>$course_id,'remove_course_ids'=>''],'')[0]; 

		if($get_detail[0]['slots']>$totalBookings['total'])
		{
		 


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



	/*
		$recipients = array(
		"dharmaniz.mandeepsharma@gmail.com",
		"info@fahrschule-star.ch",
		"roman.zuber@fahrschulestar.com"
		);
		foreach ($recipients as $key => $value) {
	
		    $to2 = $value;
       
        $subject2 = "New Booking received by ".$firstname.' '.$lastname;
        
        $headers2  = 'MIME-Version: 1.0' . "\r\n";
        
        $headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        $headers2 .= "From: info@fahrschule-star.ch";

    
        $success2 = mail($to2,$subject2,$email_html,$headers2);
        	
		}
*/



		foreach ($course_id_arrayss as $key => $value) {
	   $course_id_arraysss[]=$value;	
		}
			


    if($signup=='1')
		{
			$userExists = check_user_existance($email);


			if(empty($userExists)){
				$create_user = insertDataTable('user',['firstname'=>$firstname,'lastname'=>$lastname,'company_name'=>$company_name,'email'=>$email,'password'=>$password,'phone'=>$phone,'street'=>$street,'city'=>$city]);
				//$create_user = create_user($firstname,$lastname,$email,$password,$phone);
				$user_id = $conn->insert_id;
			}else{
				$user_id = $userExists['user_id'];
				updateDataTable('user',['user_id'=>$user_id],['firstname'=>$firstname,'lastname'=>$lastname,'company_name'=>$company_name,'email'=>$email,'password'=>$password,'phone'=>$phone,'street'=>$street,'city'=>$city]);
			}
			
		}

		$buy_course= get_user_buy_course_by_date($user_id);
	
		$data=array_intersect($buy_course,$course_id_arrayss);
		$userAlreadyBooked = check_courses_exists_by_user($user_id,$_POST['course_id']);

		/*print_r($user_id);echo ' user_id \n';
		print_r($course_id_arrayss);echo ' course_id_arrayss \n ';
		print_r($buy_course);echo ' buy_course \n ';
		print_r($data);echo ' data \n ';
		print_r($_POST['course_id']);echo ' course_id \n ';
		print_r($userAlreadyBooked);echo ' userAlreadyBooked \n ';die();
		*/

		if($data){
			  echo"<script type='text/javascript'>alert('".$translations['_course_already_booked_'][0]."')</script>";
				echo "<script>window.location.href='book';</script>";
				exit();
		}elseif(!empty($userAlreadyBooked)){
			  echo"<script type='text/javascript'>alert('".$translations['_course_already_booked_'][0]."')</script>";
				echo "<script>window.location.href='book';</script>";
				exit();
		}
		else{
			
		$course_id_array = explode(',', $course_id);
		foreach ($course_id_array as $key) 
		{
			$book_course = book_course($user_id,$key);
			$booked_id = $conn->insert_id;
			array_push($booked_array, $booked_id);
		}
		if($payment_type=='cash')
		{
			$payment_status = '0';
			$transaction_id = 'Cash-'.uniqid(time());
		}
		elseif($payment_type=='stripe'){

			$payment_status='0';
			$transaction_id = "";
		}
		else
		{
			$payment_status='1';
			$transaction_id = $_POST['transaction_id'];
		}
		
		$booked_courses = implode(',', $booked_array);


		$insert_billing_details = insert_billing_details_v2($user_id,$firstname,$lastname,$company_name,$postcode,$phone,$street,$description,$payment_type,$course_id,$total_price,$payment_status,$booked_courses,$transaction_id,0,$city);
		//print_r($insert_billing_details);die;
		if($insert_billing_details)
		{



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
					'font-size:18px;'>Herzlichen Dank für deine Buchung. Wir freuen uns, dich bald bei uns begrüssen zu dürfen.
					</p>	


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
					<p style='margin: 0; font-size: 14px;'><span style='font-size:15px;'>".$city."</span></p>
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


						<p id='css_cs_cursor' style='margin: 0; font-size: 14px; mso-line-height-alt: 27px;width:100%;'><span id='css_cs_cursor' style=
						'font-size:18px;'>Um einen reibungslosen Ablauf gewährleisten zu können, bitten wir dich, folgende Unterlagen mitzubringen:
						</p>
						<p id='css_cs_cursor' style='margin: 0; font-size: 14px; mso-line-height-alt: 27px;width:100%;'><span id='css_cs_cursor' style=
						'font-size:18px;'>Nothelfer:
						</p>
						<p id='css_cs_cursor' style='margin: 0; font-size: 14px; mso-line-height-alt: 27px;width:100%;'><span id='css_cs_cursor' style=
						'font-size:18px;'>
						- ID/Pass</span></p>

						<p id='css_cs_cursor' style='margin: 0; font-size: 14px; mso-line-height-alt: 27px;width:100%;'><span id='css_cs_cursor' style=
						'font-size:18px;'>Verkehrskundeunterricht:
						</p>
						<p id='css_cs_cursor' style='margin: 0; font-size: 14px; mso-line-height-alt: 27px;width:100%;'><span id='css_cs_cursor' style=
						'font-size:18px;'>
						- Lernfahrausweis</span></p>

						<p id='css_cs_cursor' style='margin: 0; font-size: 14px; mso-line-height-alt: 27px;width:100%;'><span id='css_cs_cursor' style=
						'font-size:18px;'>Motorradgrundkurs:
						</p>
						<p id='css_cs_cursor' style='margin: 0; font-size: 14px; mso-line-height-alt: 27px;width:100%;'><span id='css_cs_cursor' style=
						'font-size:18px;'>
						- Lernfahrausweis</span></p>

							<p id='css_cs_cursor' style='margin-top	: 10; font-size: 14px; text-align: center;width:100%;'>Bei uns erhältst du die Möglichkeit, den Kurs mit deinem erstellten Account selbst zu stornieren oder zu verschieben. Die Stornierung bzw. Verschiebung ist bis 48 Stunden vor Kursbeginn möglich. Wir bitten dich um Verständnis dafür, dass der Kurs danach nicht mehr storniert oder verschoben werden kann und bei Nichterscheinen die vollen Kurskosten verrechnet werden. Gegen Vorweisen eines Arztzeugnisses ist eine Abmeldung natürlich auch nach Ablauf der Frist möglich.</p>

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
		    if($success)
		    {
		    	$msg = $translations['_query_success_'][0];
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
		
		$recipients = array(
		"dharmaniz.mandeepsharma@gmail.com",
		"info@fahrschule-star.ch",
		"roman.zuber@fahrschulestar.com",
		);

		foreach ($recipients as $key => $value) {
			// code...
				$adminmail = new PHPMailer(true);
				try{
				    //Server settings
				    $adminmail->isHTML(true);  
				    $adminmail->CharSet = 'UTF-8';
				    $adminmail->Encoding = 'base64';
				    $adminmail->SMTPDebug = 0;                                       
				    //$mail->isSMTP();                                           
				  /*  $mail->Host       = 'dharmani.com';  
				    $mail->SMTPAuth   = true;                                   
				    $mail->Username   = 'info@fahrschule-star.ch';                 
				    $mail->Password   = 'F&n-hh^R@2S_';
				    $mail->SMTPSecure = 'ssl';                                  
				    $mail->Port       = 465;            */                        // TCP port to connect to
				  
				    //Recipients
				   // $mail->setFrom("info@fahrschule-star.ch",'Fahrschule STAR');
				    $adminmail->setFrom("info@fahrschule-star.ch",'Fahrschule STAR');
				    $adminmail->addAddress($value,"");     // Add a recipient
				   

				    // Attachments
				    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
				  
				    // Content
				    // Set email format to HTML
				    $adminmail->Subject = 'New booking by '.$firstname.' '.$lastname;
		    	  $adminmail->Body=$content;

				    $adminmail->send();

				  }
				  catch (Exception $e) {
				     
				 
				}	
		}


			if($payment_type=='stripe'){
            $_SESSION['user_id'] = $user_id;
			$billing_id = $conn->insert_id;
			echo "<script type='text/javascript'>
			var billing_id = '" . $billing_id ."';
			var user_id = '" . $user_id ."';
			var total_price ='".$total_price."';
			
			window.location.href='stripe-payment.php?amount='+total_price+'&id='+billing_id;</script>";
			}
			else{
			$_SESSION['user_id'] = $user_id;
			$billing_id = $conn->insert_id;

			//print_r($billing_id);die;
			echo "<script type='text/javascript'>
			var billing_id = '" . $billing_id ."';
			var user_id = '" . $user_id ."';
			sessionStorage.setItem('billing_id', billing_id);
			sessionStorage.setItem('user_id', user_id);
			window.location.href='thankyou.php';</script>";
	        exit();
	        }
		}
		else
		{
			foreach ($booked_array as $key) 
			{
				$delete_book_course = delete_book_course($key);
			}
			echo "<script type='text/javascript'>
			sessionStorage.setItem('billing_id', '0');
			
			window.location.href='thankyou.php';</script>";
	        exit();
		}
	}

	}//if slots not full else
		else{
			 echo"<script type='text/javascript'>alert('".$translations['_course_slot_full_'][0]."')</script>";
			echo "<script>window.location.href='book';</script>";
			exit();
		}




	}
	if($type=='order_detail')
	{
		$billing_id = $_POST['billing_id'];

		$get_billing_details = get_billing_details($billing_id);
		$course_id = $get_billing_details['course_id'];
		$transaction_id=$get_billing_details['transaction_id'];
		$get_multiple_course_detail = get_multiple_course_detail($course_id);
		$last_index = count($get_multiple_course_detail)-1;
		$total_price = $get_multiple_course_detail[$last_index]['total_price'];

		if($get_multiple_course_detail)
		{
			echo json_encode(array('status'=>1,'total_price'=>$total_price,'transaction_id'=>$transaction_id,'data'=>$get_multiple_course_detail));
			// exit();
		}
		else
		{
			echo json_encode(array('status'=>0,'data'=>''));
			exit();
		}
	}

	if($type=='check_user')
	{
		$email = $_POST['email'];

		$check_user_existance = check_user_existance($email);
		
		if($check_user_existance)
		{
			echo json_encode(array('status'=>1,'message'=>$translations['_email_exists_'][0]));
			exit();
		}
		else
		{
			echo json_encode(array('status'=>0,'data'=>''));
			exit();
		}
	}

	if($type=='signup')
	{
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		$firstname = '';
		$lastname = '';
		$phone = '';

		$create_user = create_user($firstname,$lastname,$email,$password,$phone);
	//	print_r($create_user);die;
		if($create_user)
		{
			$user_id = $conn->insert_id;
			$_SESSION['user_id'] = $user_id;
			echo "<script type='text/javascript'>
			var user_id = '" . $user_id ."';
			sessionStorage.setItem('user_id', user_id);
			window.location.href='registration-form.php';
			alert('".$translations['_new_user_success_'][0]."');
			</script>";
	        exit();
			/*echo json_encode(array('status'=>1,'message'=>'New User Signed Up Successfully'));
			exit();*/
		}
		else
		{
			echo "<script type='text/javascript'>
			window.location.href='login.php';
			alert('".$translations['_new_user_failed_'][0]."');
			</script>";
	        exit();
			/*echo json_encode(array('status'=>0,'data'=>'Failed to Sign Up. Please try again.'));
			exit();*/
		}
	}
	if($type=='edit_profile')
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone = $_POST['phone'];
		$user_id = $_POST['user_id'];
		$profile_pic = $_POST['profile_pic'];
		$image_type = $_POST['image_type'];
		$company_name = $_POST['company_name'];
		$postcode = $_POST['postcode'];
		$city = $_POST['city'];
		$street = $_POST['street'];


		if ($image_type=='base64')
		{
			$profile_pic = upload_profile_pic($profile_pic);
		}
		elseif($image_type=='image')
		{
		    $profile_pic = $_POST['profile_pic'];
		}
		else
		{
			$profile_pic = '';
		}

		//$edit_profile = edit_user_profile($firstname,$lastname,$profile_pic,$phone,$user_id);

		$edit_profile = updateDataTable('user',['user_id'=>$user_id],['firstname'=>$firstname,'lastname'=>$lastname,'profile_pic'=>$profile_pic,'phone'=>$phone,'company_name'=>$company_name,'postcode'=>$postcode,'city'=>$city,'street'=>$street]);


		if($edit_profile)
		{
			updateDataTable('billing_details',['user_id'=>$user_id],['firstname'=>$firstname,'lastname'=>$lastname,'phone'=>$phone,'company_name'=>$company_name,'postcode'=>$postcode,'city'=>$city,'street'=>$street]);

			echo json_encode(array('status'=>1,'message'=>$translations['_profile_update_success_'][0]));
			// exit();
		}
		else
		{
			echo json_encode(array('status'=>0,'message'=>$translations['_profile_update_failed_'][0]));
			exit();
		}
	}
	if($type=='contactus')
	{
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
		
		$to_email = 'info@fahrschule-star.ch';
		//$to_email = 'ljp.pickersgill@gmail.com';
		$mail_message = '
		Name: '.$name.'<br>
		Email: '.$email.'<br>
		Subject: '.$subject.'<br>
		Phone No: '.$phone.'<br>
		Message: '.$message.'<br>
		';

		$mail = new PHPMailer(true);
		try{
		    //Server settings
		    $mail->isHTML(true);  
		    $mail->CharSet = 'UTF-8';
		    $mail->Encoding = 'base64';
		    $mail->SMTPDebug = 0;                                       
		    //$mail->isSMTP();                                           
		   /* $mail->Host       = 'dharmani.com';  
		    $mail->SMTPAuth   = true;                                   
		    $mail->Username   = 'info@fahrschule-star.ch';                 
		    $mail->Password   = 'F&n-hh^R@2S_';
		    $mail->SMTPSecure = 'ssl';                                  
		    $mail->Port       = 465;          */                          // TCP port to connect to
		  
		    //Recipients
		    $mail->setFrom("info@fahrschule-star.ch",'Fahrschule STAR');
		    $mail->addAddress('roman.zuber@fahrschulestar.com',"");     // Add a recipient
		    $mail->addAddress($to_email,"");     // Add a recipient
		   

		    // Attachments
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		  
		    // Content
		    // Set email format to HTML
		    $mail->Subject = 'New Mail From Fahrschule STAR';
		    $mail->Body    = $mail_message;
		  
		    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $success = $mail->send();
		    if($success)
		    {
		    	// Return Success - Valid Emailur email
		    	
		    	//http_response_code(401);
		    	  echo "<script>alert('".$translations['_query_success_'][0]."')</script>";
		    	  $url = '/contact';
		    	  echo "<script>window.location='/contact';</script>";
			/*	$json_message = array("status"=>1,"message"=>$translations['_query_success_'][0],'mail'=>$success,'color'=>'green');
				send_response($json_message);*/
				// exit;
		    }
		    else
		    {
		     echo "<script>alert('".$translations['_query_failed_'][0]."')</script>";
		    	  $url = '/contact';
		    	  echo "<script>window.location='/contact>';</script>";
		    /*	echo json_encode(array('status'=>0,'message'=>$translations['_query_failed_'][0],'success'=>$e,'color'=>'red'));
		  		exit();*/
		    }
		    
		    
		} catch (Exception $e) {
		     
		     echo "<script>alert('".$translations['_query_failed_'][0]."')</script>";
		    	  $url = '/contact';
		    	  echo "<script>window.location='/contact';</script>";
		   
		 /* echo json_encode(array('status'=>0,'message'=>$translations['_query_failed_'][0],'success'=>$e,'color'=>'red'));
		  exit();*/
		}
	}

	if($type=='forgot-password')
	{
		$email = $_POST['email'];

		$get_user_detail = check_user_existance($email);
		$user_id = $get_user_detail['user_id'];
		$session_token = md5(time());
		if($user_id) 
		{
		    $q['query'] = "UPDATE user set password_session_token = '$session_token' WHERE email = '$email'";
		    $q['run'] = $conn->query($q['query']);

		    $subject = "Fahrschule | Reset Password";
		   // $mail_message = "Please click the button to reset your password. <br><br>";
		    $link = "<a href='".$config['base_url']."/change-password.php?token=".$session_token."' target='_blank'  style=' background-color: #e90616;border: none;color: white;padding: 8px 8px;text-align: center;text-decoration: none;display: inline-block;font-size: 12px;'> Reset password
		                            </a>";



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
		<p style="margin: 0; font-size: 22px; text-align: center;"><span style="font-size:22px;"><span style="color:#ffffff;">'.$translations["forgot_password_title"][0].'</strong></span></p>
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
		<tbody>
		
		

		<tr>
		<th style="width:100%" colspan="2">
		<center>
		<hr style="width: 150px;margin-top: 15px;border-color: #003150;background: #003150;border: 0px;border-top: 1px solid #003150;">
		</center>
		</th>
		</tr>
		</tbody>
		</table>

		<center><em><h2 style="width: 440px;font-size: 16px;color: #000;line-height: 1.2;font-family: Arial,Helvetica,sans-serif;"><strong>'.$translations["forgot_password_message"][0].'</strong></h2></em></center>
		<table align="center" border="0" cellpadding="10" cellspacing="0" class="button_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tr>
		<td>
		<div align="center"><a href="'.$config['base_url'].'/change-password.php?token='.$session_token.'" target="_blank" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#cc0103;border-radius:4px;width:auto;border-top:1px solid #cc0103;border-right:1px solid #cc0103;border-bottom:1px solid #cc0103;border-left:1px solid #cc0103;padding-top:5px;padding-bottom:5px;font-family:Ubuntu, Tahoma, Verdana, Segoe, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;" target="_blank"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;letter-spacing:normal;"><span style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;">Reset</span></span></a>

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
			
		    $mail = new PHPMailer(true);
			try{
			    //Server settings
			    $mail->isHTML(true);  
			    $mail->CharSet = 'UTF-8';
			    $mail->Encoding = 'base64';
			    $mail->SMTPDebug = 0;                                       
			    /*$mail->isSMTP();                                           
			    $mail->Host       = 'dharmani.com';  
			    $mail->SMTPAuth   = true;                                   
			    $mail->Username   = 'info@fahrschule-star.ch';                 
			    $mail->Password   = 'F&n-hh^R@2S_';
			    $mail->SMTPSecure = 'ssl';                                  
			    $mail->Port       = 465;    */                                // TCP port to connect to
			  
			    //Recipients
			    $mail->setFrom("info@fahrschule-star.ch",'Fahrschule STAR');
			    $mail->addAddress($email,"");     // Add a recipient
			   

			    // Attachments
			    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			  
			    // Content
			    // Set email format to HTML
			    $mail->Subject = 'New Mail From Fahrschule STAR';
			    $mail->Body    = $email_message;
			  
			    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

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
		}
		else 
		{
			echo json_encode(array("status"=>0,"message"=>$translations['_email_exists_with_us_'][0]));
		    exit();
		}
	}
	if($type=='reset_password')
	{
		$user_id = $_POST['user_id'];
		$password = $_POST['password'];

		$q['query'] = "UPDATE user set password='$password',password_session_token='' WHERE user_id ='$user_id'";
		$q['run'] = $conn->query($q['query']);

		if($q['run']) 
		{   
			echo json_encode(array("status"=>1,"message"=>$translations['_password_change_success_'][0]));
		    // exit();
		    
		}
		else 
		{
			echo json_encode(array("status"=>0,"message"=>$translations['_password_change_failed_'][0]));
		    exit();
		}
	}


	if($type=='user_cancel_course')
	{
		$billing_id = $_REQUEST['billing_id'];



		$billingDetails = getDataFromTable('billing_details','*',['id'=>$billing_id],'');


		


		$booking_ids = $billingDetails[0]['booked_course_ids'];
		$course_ids = $billingDetails[0]['course_id'];

		$booking_ids = explode(',',$booking_ids);
		//print_r($booking_ids);echo "<br>\n";
		foreach ($booking_ids as $key => $value) {
			  $p['query'] = "UPDATE booked_course_history set isRemoved='1' WHERE id='$value'";
				$p['run'] = $conn->query($p['query']);

				//echo " 1 "; 
		}

		//print_r($course_ids);

		$q['query'] = "UPDATE billing_details set remove_course_ids='$course_ids' WHERE id='$billing_id'";
		$q['run'] = $conn->query($q['query']);
		//echo " 2 ";
		if($q['run']) 
		{   
			echo json_encode(array("status"=>1,"message"=>$translations['_course_cancel_success_'][0]));
		    // exit();
		    
		}
		else 
		{
			echo json_encode(array("status"=>0,"message"=>$translations['_course_cancel_failed_'][0]));
		    exit();
		}
	}
	

}
?>