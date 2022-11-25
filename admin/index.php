<?php
session_start();
include 'Config/Connection.php';
include 'includes/Functions.php';
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $get_login_details = get_login_details($email,$password);
    $get_instructor_login_detail=get_instructor_login_details($email,$password);
    if($get_login_details && $get_instructor_login_detail=="")
    {
        $_SESSION['id'] = $get_login_details['id'];
        $_SESSION['email'] = $get_login_details['email'];
        $_SESSION['role'] = $get_login_details['role'];
        header("location: dashboard.php");
    }
    elseif($get_instructor_login_detail && $get_login_details ==""){
        $_SESSION['id'] = $get_instructor_login_detail['instructor_id'];
        $_SESSION['email'] = $get_instructor_login_detail['email'];
        $_SESSION['role'] = 'sub-admin';
        $password_generate=$get_instructor_login_detail['password_generate'];
        if($password_generate==0){
        header("location: InstructorChangePassword.php");
        }
        else{
        header("location: sub-admin/dashboad.php");
        }
    }
    else 
    {
        $error = "Your Login Name or Password is invalid";
    }
}
// if(isset($_POST['submit']))
// {
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $get_login_details = get_login_details($email,$password);
//     if($get_login_details)
//     {
//         $_SESSION['id'] = $get_login_details['id'];
//         $_SESSION['email'] = $get_login_details['email'];
//         $_SESSION['role'] = $get_login_details['role'];
//         header("location: dashboard.php");
//     }
//     else 
//     {
//         $error = "Your Login Name or Password is invalid";
//     }
// }
?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from xvelopers.com/demos/html/paper-panel/login-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2019 11:25:22 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/myweb/favicon.png" type="image/x-icon">
    <title>Fahrschule Star</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
    <!-- Js -->
    <!--
    --- Head Part - Use Jquery anywhere at page.
    --- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
    -->
    <script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<main>
    <div id="primary" class="p-t-b-100 height-full">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto paper-card">
                    <div class="text-center">
                        <img src="assets/img/myweb/logo.png" alt="" style="max-height: 150px;">
                        <h3 class="mt-2">Welcome to Fahrschule Star</h3>
                    </div>
                    <form action="index.php" method="POST">
                        <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                            <input type="text" class="form-control form-control-lg" placeholder="Email Address" name="email">
                        </div>
                        <div class="form-group has-icon"><i class="icon-user-secret"></i>
                            <input type="password" class="form-control form-control-lg" placeholder="Password" name="password">
                        </div>
                        <span style="color: red;" id="error"><?php if(isset($error)) { echo $error;}?></span>
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Log In" name="submit">
                        <p class="forget-pass"><a href='ForgetPasswordEmail.php'>Are you instructor and forgot your password ??</a></p> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>




<!--
--- Footer Part - Use Jquery anywhere at page.
--- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
-->
<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>
<script type="text/javascript">
    $("input").click(function() {
        $('span').css("display", "none");
    });
</script>
</body>

<!-- Mirrored from xvelopers.com/demos/html/paper-panel/login-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2019 11:25:22 GMT -->
</html>