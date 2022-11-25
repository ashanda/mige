<?php
session_start();
$login_check=$_SESSION['role'];
if ($login_check!='admin') 
{
  header("location: index.php"); 
}

include 'includes/Functions.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from xvelopers.com/demos/html/paper-panel/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2019 11:24:13 GMT -->
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
            background-color: #272c33;
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
<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
            <img src="assets/img/myweb/logo.png" alt="">
        </div>
        <!----------------div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
               aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="assets/img/dummy/u2.png" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1">Admin</h6>
                        <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="Config/ChangePassword.php" class="list-group-item list-group-item-action"><i class="mr-2 icon-security text-purple"></i><span>Change Password</span></a>
                        <a href="logout.php" class="list-group-item list-group-item-action"><i class="mr-2 icon-sign-out text-yellow"></i><span>Logout</span></a>
                    </div>
                </div>
            </div>
        </div----------------------->
        <ul class="sidebar-menu">
            <li class="treeview"><a href="">
                <i class="icon icon-sailing-boat-water s-18"></i> 
                <span>Dashboard</span>
                </a>
            </li>
			
				<li class="treeview">
            
                    <a href="Page/index.php"><i class="icon icon-apps s-18"></i>
                    <span>Pages</span></a>
               
            </li>
			<li class="treeview">
            
                    <a href="addtranslation/index.php"><i class="icon icon-plus-circle s-18"></i>
                    <span>Add Translation</span></a>
               
            </li>
			
			
			
            <li class="treeview"><a href="#"><i class="icon icon-apps s-18"></i>
            <span>Course Category</span><i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="Category/index.php"><i class="icon icon-circle-o"></i>
                    <span>All Course Categories</span></a>
                    </li>
                    <li><a href="Category/AddCategory.php"><i class="icon icon-add"></i><span>Add Course Category</span></a>
                    </li>
                    <li><a href="Category/AddSubCategory.php"><i class="icon icon-add"></i>
                    <span>Add Sub Course Category</span></a>
                    </li>
                </ul>
            </li>
            <li class="treeview"><a href="#"><i class="icon icon-th-list"></i>
            <span>Courses</span><i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="Course/index.php"><i class="icon icon-circle-o"></i>
                    <span>Active Courses</span></a>
                    </li>
                     <li><a href="Course/CancelCourse.php"><i class="icon icon-circle-o"></i>
                    <span>Cancel Courses</span></a>
                    </li>
                    <li><a href="Course/AddCourse.php"><i class="icon icon-add"></i>
                    <span>Add Course</span></a>
                    </li>
                    <li><a href="../Course/AddMultipleCourse.php"><i class="icon icon-add"></i>
                    <span>Add Multiple Courses</span></a>
                    </li>
                </ul>
            </li>
            <li class="treeview"><a href="#">
                <i class="icon icon-map-marker s-18"></i>
                <span>Location</span><i class="icon icon-angle-left s-18 pull-right"></i>
            </a>
                <ul class="treeview-menu">
                    <li><a href="Location/index.php"><i class="icon icon-circle-o"></i>
                    <span>Location Listing</span></a>
                    </li>
                    <li><a href="Location/AddLocation.php"><i class="icon icon-add"></i>
                    <span>Add Location</span></a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview"><a href="#">
                <i class="icon icon-account_box s-18"></i>
                <span>Instructors</span><i class="icon icon-angle-left s-18 pull-right"></i>
            </a>
                <ul class="treeview-menu">
                    <li><a href="Instructor/index.php"><i class="icon icon-circle-o"></i>
                    <span>All Instructors</span></span></a>
                    </li>
                    <li><a href="Instructor/AddInstructor.php"><i class="icon icon-add"></i>
                    <span>Add Instructor</span></a>
                    </li>
                    <!-- <li><a href=""><i class="icon icon-circle-o"></i><span>Manage Instructor</span></a>
                    </li> -->
                </ul>
            </li>
             <li class="treeview">
            
                    <a href="User/index.php"><i class="icon icon-users s-18"></i>
                    <span>Users</span></a>
               
            </li>
            <li class="treeview">
                <a href="Config/ChangePassword.php">
                    <i class="icon icon-security s-18"></i>
                    <span>Change Password</span>
                </a>
              
            </li>

            <li class="treeview">
                 <a href="logout.php">
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


<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-sailing-boat-water"></i>
                        Dashboard
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <h1>Welcome</h1>
    </div>
</div>


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
</body>

<!-- Mirrored from xvelopers.com/demos/html/paper-panel/login-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2019 11:25:22 GMT -->
</html>