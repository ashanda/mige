<?php
session_start();
include 'Config/Connection.php';
include 'includes/Functions.php';

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
                        <h3 class="mt-2">Enter Email Here</h3>
                    </div>
                    <form action="ForgetPasswordEmail.php" method="POST">
                        <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                            <input type="email" class="form-control form-control-lg" id="email" placeholder="Email Address" name="email">
                        </div>
                        <span id="email_message" style="color: #27ba4e; display: none;" >Please check your email. We've sent you a new temporary password you can change it later on.</span>
                       <span id="email_not_registered" style="color: #dc3545; display: none;" ></span>

                          <button type="button" class="btn btn-primary btn-lg btn-block" id="submitButton" onclick="check_email()" name="submit">Submit</button>

                        <a href="<?=$config['base_url']?>/admin"> <button style="display: none;" type="button" class="btn btn-primary btn-lg btn-block" id="goBackButton" name="submit">Go Back</button></a>
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
    $("#email").click(function(){

    $('#email_sent').css("display", "none");
    $('#email_not_registered').css("display", "none");

  });
  function check_email()
  {
    var email = $('#email').val();
    if(email=='')
    {
      $('span.email_message').css("display", "block");
      $('span.email_message').css("display", "block");
      $('span.email_message').text('Email cannot be blank');
      //alert('Please fill your email');
      $('#email').focus();
    }
    else
    {
      $.ajax({
        url : 'includes/CheckEmail.php',
        type: "POST",
        data: {email:email},
        dataType: "JSON",

        success: function(data)
        {
            //console.log(data);
            if(data.status==1)
            {

              $('#email_message').css("display", "block");
              $('#goBackButton').css("display", "block");
              $('#submitButton').css("display", "none");
            }
            else{
                alert(data.message);
                $('#goBackButton').css("display", "none");
                $('#submitButton').css("display", "block");
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error while submitting the email');
        }
      });
    }
  }
</script>
</body>

<!-- Mirrored from xvelopers.com/demos/html/paper-panel/login-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2019 11:25:22 GMT -->
</html>