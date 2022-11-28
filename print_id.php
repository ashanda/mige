<?php 
include 'header.php';
global $conn;
$user_id =$_GET['user_id'];

$reg_qury=mysqli_query ( $conn,"SELECT * FROM user JOIN booked_course_history ON user.user_id = booked_course_history.user_id JOIN tbl_course ON tbl_course.course_id = booked_course_history.course_id WHERE user.user_id = $user_id"); 
$course_name ;
$first_name ;
$email;
$last_name ;
$start_date ;
$end_date;
while($reg_resalt=mysqli_fetch_array($reg_qury)){
    $course_name =$reg_resalt['course_title_eng'];
    $first_name =$reg_resalt['firstname'];
    $last_name =$reg_resalt['lastname'];
    $email = $reg_resalt['email'];
    $end_time =$reg_resalt['course_end_time'];
    $strat_time = $reg_resalt['course_start_date'];
    $start_date = date("d/M/Y H:i:s", $strat_time);
    $end_date = date("d/M/Y H:i:s", $end_time);
}



require("phpToPDF.php");

//PUTYOURHTMLINAVARIABLE
$my_html ='<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <!-- custom css -->
    
    <title>Print</title>
</head>

<body>
<style>
/* common styles */

    .text-left {
        text-align: left;
    }

    .text-right {
        text-align: right;
    }

    body {
        margin: 0;
        width: 100%;
        height: auto;
        font-family: "IBM Plex Sans", sans-serif;
    }

    tr {
        line-height: 1vw;
    }

    span {
        font-size: 15px;
    }
    .top-img {
        text-align: center;
    }

    .top-img img {
        width: 100%;
        height: auto;
    }

    .content {
        width: 100%;
        margin: auto;
        margin-bottom: 5%;
    }

    .content .caption {
        margin-top: 2cm;
        margin-bottom: 1cm;
    }

    .content .bottom-img .td-main {
        background-repeat: no-repeat;
        background-size: contain;
        height: 27vw;
    }

    .content .cut {
        display: none;
    }

    .content .cut-img {
        width: 2cm;
    }

    .content .cut-rotate {
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
    }

    .sec .header {
        color: #079bd8;
        line-height: 0;
        font-size: 20px;
    }

    .sec .description {
        font-size: 12px;
        margin-top: 0;
    }

    .sec .title {
        color: #079bd8;
        padding-right: 20px;
    }

    .sec .data,
    .sec .title {
        font-weight: bold;
    }

    .sec .cards {
        width: 200px;
    }

    .card-1 .top {
        padding-left: 8%;
    }

    .card-1 .qr {
        text-align: right;
        margin-top: -60px;
        padding-right: 8%;
    }

    .card-1 .qr img {
        width: 8vw;
    }

    .card-1 .middle {
        padding-left: 8%;
        margin-top: 4vw;
    }

    .card-1 .bottom {
        padding-top: 4%;
        padding-right: 8%;
    }

    .card-1 .bottom table {
        margin-left: auto;
    }

    .card-2 .bottom tr {
        line-height: 1.8vw;
    }

    .card-2 .top {
        padding-top: 14%;
        padding-left: 8%;
    }

    .card-2 .top .description {
        margin-bottom: 1vw;
    }

    .card-2 .middle {
        padding-left: 8%;
    }

    .card-2 .signature-img {
        width: 40px;
        padding-left: 8%;
    }

    .card-2 .bottom {
        padding-top: 0;
        padding-left: 8%;
    }

    .card-2 .bottom .data {
        display: block;
    }

    .card-2 .bottom table {
        width: 100%;
    }

    .cards {
        display: flex;
    }

    .main-td {
        width: 50%;
    }

    .content .cut {
        display: block;
    }

    table.main-table {
        width: 100%;
    }

    td.td-main {
        width: 50%;
    }
    </style>
    <div class="top-img">
        <img src="https://yogeemedia.xyz/websites/licensen-lms/super_admin/pdf/inc/img/top-img.png" alt="">
    </div>
    <div class="content">
        <div class="caption">
            <p class="name">Lieber/liebe (asd)</p>
            <p class="description">Im Anhang erhältst du deinen Nothelferausweis:</p>
        </div>
        <div class="cut text-right hide">
            <img class="cut-img" src="https://yogeemedia.xyz/websites/licensen-lms/super_admin/pdf/inc/img/cut1.png" alt="">
        </div>
        <div class="bottom-img">
            <table class="main-table">
                <tr>
                    <td class="td-main" style="background-image: url("https://yogeemedia.xyz/websites/licensen-lms/super_admin/pdf/inc/img/back.jpg");">
                        <div class="sec card-1">
                            <div class="top">
                                <h2 class="header"> '.$course_name.' </h2>
                                
                            </div>
                            <div class="middle">
                                <table>
                                    <tr>
                                        <td><span class="title">Name</span></td>
                                        <td><span class="data">'.$first_name.' '.$last_name.'</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="title">Username</span></td>
                                        <td><span class="data">'.$email.'</span></td>
                                    </tr>
                                    
                                </table>
                            </div>
                            <div class="qr">
                                <img src="https://yogeemedia.xyz/websites/licensen-lms/super_admin/images/qr.png" alt="">
                            </div>
                            <div class="bottom">
                                <table>
                                    <tr>
                                        <td><span class="title">Start Datum</span></td>
                                        <td><span class="data">'.$start_date.'</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="title">End Datum</span></td>
                                        <td><span class="data">'.$end_date.'</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </td>
                    <td class="td-main" style="background-image: url("https://yogeemedia.xyz/websites/licensen-lms/super_admin/pdf/inc/img/front.jpg");">
                        <div class="sec card-2">
                            <div class="top">
                                <h2 class="header">'.$course_name.'</h2>
                                
                            </div>
                            <div class="middle">
                                <table>
                                    <tr>
                                        <td><span class="title">Name</span></td>
                                        <td><span class="data">'.$first_name.' '.$last_name.'</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="title">Username</span></td>
                                        <td><span class="data">'.$email.'</span></td>
                                    </tr>

                                </table>
                            </div>

                            <img class="signature-img" src="https://yogeemedia.xyz/websites/licensen-lms/super_admin/pdf/inc/img/Signature.png" alt="">

                            <div class="bottom">
                                <table>
                                    <tr>
                                        <td>
                                            <span class="title">Sample name</span>

                                            <span class="data">position</span>
                                        </td>
                                        <td>
                                            <span class="title">Sample name</span>

                                            <span class="data">position</span>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>

        </div>
        <div class="cut text-left hide">
            <img class="cut-img cut-rotate" src="https://yogeemedia.xyz/websites/licensen-lms/super_admin/pdf/inc/img/cut1.png" alt="">
        </div>
    </div>

</body>

</html>';

// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'html',
  "source" => $my_html,
  "action" => 'save',
  "save_directory" => '',
  "file_name" => 'ID.pdf');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

// (A) EMAIL SETTINGS
$mailTo = $email;
$mailSubject = "ID Attachment";
$mailMessage = "<strong>Test Message</strong>";
$mailAttach = "ID.pdf";

// (B) GENERATE RANDOM BOUNDARY TO SEPARATE MESSAGE & ATTACHMENTS
// https://www.w3.org/Protocols/rfc1341/7_2_Multipart.html
$mailBoundary = md5(time());
$mailHead = implode("\r\n", [
  "MIME-Version: 1.0",
  "Content-Type: multipart/mixed; boundary=\"$mailBoundary\""
]);

// (C) DEFINE THE EMAIL MESSAGE
$mailBody = implode("\r\n", [
  "--$mailBoundary",
  "Content-type: text/html; charset=utf-8",
  "",
  $mailMessage
]);

// (D) MANUALLY ENCODE & ATTACH THE FILE
$mailBody .= implode("\r\n", [
  "",
  "--$mailBoundary",
  "Content-Type: application/octet-stream; name=\"". basename($mailAttach) . "\"",
  "Content-Transfer-Encoding: base64",
  "Content-Disposition: attachment",
  "",
  chunk_split(base64_encode(file_get_contents($mailAttach))),
  "--$mailBoundary--"
]);

// (E) SEND
echo mail($mailTo, $mailSubject, $mailBody, $mailHead)
  ? "OK" : "ERROR" ;
?>