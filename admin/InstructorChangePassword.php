<?php
session_start();
include 'Config/Connection.php';
include 'includes/Functions.php';
$id = $_SESSION['id'];
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
    <title>FahrschuleStar</title>
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
                <div class="col-lg-4 mx-md-auto">
                    <div class="text-center">
                        <img src="assets/img/myweb/logo.png" alt="" style="max-height: 150px;">
                        <h3 class="mt-2">Change Password</h3>
                    </div>
                    <form method="POST">
                        <div class="form-group has-icon"><i class="icon-user-secret"></i>
                            <input type="password" class="form-control form-control-lg" placeholder="Enter New Password" name="password" id="password">
                            <span id="newPassword" style="color: #dc3545; display: none;"></span>
                        </div>
                        <div class="form-group has-icon"><i class="icon-user-secret"></i>
                            <input type="password" class="form-control form-control-lg" placeholder="Re-Enter New Password" id="ConfirmPassword">
                            <span id="Confirm_Password" style="color: #dc3545; display: none;"></span>
                        </div>
                        <!-- <span style="color: red;" id="error"><?php if(isset($error)) { echo $error;}?></span> -->
                         <button type="button" class="btn btn-primary btn-lg btn-block continue_button" onclick="change_password('<?php echo $id;?>')" name="submit">Submit</button>
                        
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

<script type="text/javascript">

    $("#ConfirmPassword").click(function() {
        var password = $('#password').val();
        var ConfirmPassword = $('#ConfirmPassword').val();
        if(password=='')
        {
            $('span#newPassword').text('Password cannot be blank');
            $('span#newPassword').css("display", "block");
            //alert('Please enter the password');
            $('#password').focus();
        }
        else
        {
            count = password.length;
            //alert(count);
            if(count<'6')
            {
                $('span#newPassword').text('Password cannot be less than 6 characters');
                $('span#newPassword').css("display", "block");
                //alert('Please enter minimum 4 digit password');
                $('#password').focus();
            }
        }
    });

    function change_password(id)
    {
        if(id=='')
        {
            window.location.href="../index.php";
        }
        else
        {
            var password = $('#password').val();
            var ConfirmPassword = $('#ConfirmPassword').val();
            // alert(password);
            // alert(ConfirmPassword);
            if(password=='')
            {
                $('span#newPassword').css("display", "block");
                $('span#newPassword').text('Password cannot be blank');
                $('#password').focus();
            }
            else if(ConfirmPassword=='')
            {
                $('span#Confirm_Password').css("display", "block");
                $('span#Confirm_Password').text('Please enter confirm password');
                //alert('Please enter the password again');
                $('#ConfirmPassword').focus();
            }
            else
            {
                count = password.length;
                //alert(count);
                if(count<'6')
                {
                    $('span#newPassword').css("display", "block");
                    $('span#newPassword').text('Password cannot be less than 6 characters');
                    //alert('Please enter minimum 4 digit password');
                    $('#password').focus();
                }
                else
                {
                    if(password!=ConfirmPassword)
                    {
                        $('span#Confirm_Password').css("display", "block");
                        $('span#Confirm_Password').text('New Password and Confirm Password must be the same.');
                        $('span#newPassword').focus();
                    }
                    else
                    {
                        $('span#Confirm_Password').css("display", "none");
                        $.ajax({
                            url : 'UpdateInstructorPassword.php',
                            type: "POST",
                            data: {id:id,password:password},
                            dataType: "JSON",

                            success: function(data)
                            {
                                // console.log(data);
                                if(data.status==1)
                                {  
                                    // $('#password').val('');
                                    // $('#new_password').val('');
                                    alert('Password Changed Successfully');
                                     window.location.href= 'sub-admin/dashboad.php';
                                }
                                
                                if(data.status==0) 
                                {
                                    alert('Failed to change the password');
                                }
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert('Error while changing the password');
                            }
                        });
                    }
                }
            }
        }
    }
</script>


<!--
--- Footer Part - Use Jquery anywhere at page.
--- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
-->
<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>
<!-- <script type="text/javascript">
    $("input").click(function() {
        $('span').css("display", "none");
    });
</script> -->
</body>

<!-- Mirrored from xvelopers.com/demos/html/paper-panel/login-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2019 11:25:22 GMT -->
</html>