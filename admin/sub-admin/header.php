<?php
session_start();
$login_check=$_SESSION['role'];

if ($login_check!='sub-admin' || !$login_check)  
{
  header("location: ../index.php"); 
}
include '../Config/Connection.php';
include '../includes/Functions.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from xvelopers.com/demos/html/paper-panel/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2019 11:24:13 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
    <link rel="icon" href="../assets/img/myweb/favicon.png" type="image/x-icon">
    <title>FahrschuleStar</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #272c33;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }

        .iconspace {
            margin: 5px;
        }
        .act{
            background-color: blue;
        }

    .a{   
    border-bottom: 5px solid #da3732;  
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
<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
     <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
            <img src="../assets/img/myweb/logo.png" alt="">
        </div>
        
        <ul class="sidebar-menu">
            <li class="treeview"><a href="dashboad.php">
                <i class="icon icon-sailing-boat-water s-18"></i> 
                <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview"><a href="#"><i class="icon icon-apps s-18"></i>
            <span>Course</span><i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="PastCourse2.php"><i class="icon icon-circle-o"></i>
                    <span>All past Course</span></a>
                    </li>
                     <li><a href="PresentCourse2.php"><i class="icon icon-circle-o"></i>
                    <span>All Present Course</span></a>
                    </li>
                     <li><a href="FutureCourse2.php"><i class="icon icon-circle-o"></i>
                    <span>All Future Course</span></a>
                    </li>
                   
                </ul>
            </li>
            <li class="treeview">
                <a href="ChangePassword.php">
                    <i class="icon icon-security s-18"></i>
                    <span>Change Password</span>
                </a>
              
            </li>

            <li class="treeview">
                 <a href="../logout.php">
                    <i class="icon icon-sign-out s-18"></i>
                    <span>Logout</span>
                 </a>
            </li>


        </ul>
    </section>
</aside>
<!--Sidebar End-->
<div class="has-sidebar-left">
    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
                <div class="search-bar">
                    <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text"
                           placeholder="start typing...">
                </div>
                <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
                   aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
            </div>
        </div>
    </div>
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                    <i></i>
                </a>
            </div>
        </div>
    </div>
</div>