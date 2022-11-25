<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require_once '../../phpmailer/autoload.php';
include_once '../includes/header.php';

function delete_user_account_permanent($user_id)
{

    global $conn;
    $q['query_user'] = "DELETE FROM `user` WHERE user_id='$user_id'"; 
    $q['run_user'] = $conn->query($q['query_user']);

    $q['query_billing'] = "DELETE FROM `billing_details` WHERE user_id='$user_id'"; 
    $q['run_billing'] = $conn->query($q['query_billing']);

    $q['query_booking'] = "DELETE FROM `booked_course_history` WHERE user_id='$user_id'"; 
    $q['run_booking'] = $conn->query($q['query_booking']);
    return $q['run_user'];
}



if($_GET['remove']){
    //billing_details , booked_course_history,  user
    $get_user_detail = get_user_detail_by_id($_GET['id']);

    $to_email = $get_user_detail[0]['email'];

    //$to_email = "dharmaniz.mandeepsharma@gmail.com";
    
    $delete = delete_user_account_permanent($_GET['id']);

    $mail = new PHPMailer(true);
        try{
            //Server settings
            $mail->isHTML(true);  
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->SMTPDebug = 0;                                       
            //$mail->isSMTP();                                           
          /*  $mail->Host       = 'dharmani.com';  
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'info@fahrschule-star.ch';                 
            $mail->Password   = 'F&n-hh^R@2S_';
            $mail->SMTPSecure = 'ssl';                                  
            $mail->Port       = 465;            */                        // TCP port to connect to
          
            //Recipients
           // $mail->setFrom("info@fahrschule-star.ch",'Fahrschule STAR');
            $mail->setFrom("info@fahrschule-star.ch",'Fahrschule STAR');
            $mail->addAddress($to_email,"");     // Add a recipient
           

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          
            // Content
            // Set email format to HTML
            $mail->Subject = 'Account alert!!!';

              $mail_message = '<!DOCTYPE html>
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
<p style="margin: 0; font-size: 12px; text-align: center;"><span style="font-size:38px;"><strong>Account alert!!!</strong></span></p>
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
<p style="margin: 0; font-size: 12px; text-align: center;"><em><span style="font-size:16px;">Your account has been removed.</span></em></p>
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
<p style="margin: 0; font-size: 12px; text-align: center;"><span style="font-size:22px;"><strong><span style="">Hi '.$get_user_detail[0]['firstname'].' '.$get_user_detail[0]['lastname'].',</span></strong></span></p>
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
<p style="margin: 0; font-size: 14px; text-align: center;">Your account has been removed by admin. Which results in removal from user and our system. You can register back anytime. </p>
<p style="margin: 0; font-size: 14px; text-align: center;">If any query please contact info@fahrschule-star.ch.  </p>
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
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #04293f; color: #000000; width: 650px;" width="650">
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
           
            $mail->Body=$mail_message;

            $success = $mail->send();
           
           }
        catch (Exception $e) {
             
         
        }
        

}

$get_all_user = get_all_user();
$count = count($get_all_user);
include_once('../includes/pagination.php');
$records=array_slice($get_all_user,$start,$limit);


?>
<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-users"></i>
                        Users
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <form>
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                        <tr class="no-b">
                                             <th>SNo</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <!-- <th>Image</th> -->
                                            <th>Phone No.</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($records as $key) 
                                        {
                                            // var_dump($key);
                                            $s_num = $key['s_num'];
                                            $user_id = $key['user_id'];
                                            $firstname = $key['firstname'];
                                            $lastname=$key['lastname'];
                                            $email = $key['email'];
                                            $profile_pic = $key['profile_pic'];
                                            $phone = $key['phone'];
                                            $detail=get_billing_detail_by_user_id($user_id);
                                            if($detail[0]['street'])
                                            {
                                            $Address=$detail[0]['street'].','.$detail[0]['postcode'];
                                            }
                                            else{
                                            $Address="N/A";   
                                            }
                                           
                                            ?>
                                            <tr>
                                                <td><?php echo $s_num;?></td>
                                                <td><?php echo $firstname;?></td>
                                                <td><?php echo $lastname;?></td>
                                                <td><?php echo $email;?></td>
                                               
                                                <td><?php echo $phone;?></td>
                                                <td><?php echo $Address;?></td>
                                                <td><a href="index.php?remove=1&id=<?=$key['user_id']?>&page=<?=$_GET['page']?>" onclick="return confirm('Are you sure you want to delete? This user will be removed from courses etc.')"><i class="icon-trash mr-3 iconspace"></i></a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>                                          
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <nav class="my-3" aria-label="Page navigation" style="display: flex;justify-content: center;">
                    <ul class="pagination">
                        <?php echo $pagination;?>
                        <!-- <li class="page-item"><a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">Next</a>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php
include '../includes/footer.php';
?>