<?php session_start();
include 'Config/Connection.php';?>
<!DOCTYPE html>
<html>
<head><meta charset="euc-jp">

<meta name="description" content="FAHRSCHULE STAR responsive multipurpose template">
<meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap, Parallax">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FAHRSCHULE STAR</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="style1.css" rel="stylesheet" type="text/css">
<link href="css/ani-1.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="css/color-schemes/default.css" id="style-colors" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
<link type="image/ico" href="images/favicon.png" rel="Shortcut Icon">
</head>

<body>
<div id="loader-container">
  <div class="loader-content">
    <div class="loader">Loading...</div>
  </div>
</div>
<div id="main" class="no-padding">
  <header id="header" class="">
	<div class="container" id="cont-header">
    <div class="logo">
      <a href="index.php" target="_parent">
          <img src="images/logo.png" alt="">
      </a>
    </div>
	<div id="add-trans">
	<div id="google_translate_element"></div>
    <div id="btn-menu">
      <span class="title">Menu</span>
      <span class="line line1"></span>
      <span class="line line2"></span>
      <span class="line line3"></span>
    </div>  
	</div> 
	</div>
  </header>

  <nav class="menu text-right subfont">
    <div class="btn-menu-close">
        <i class="fa fa-times"></i>
    </div>
    <div class="menu-content">
        <ul class="menu-list">
          <?php
          if($_SESSION['user_id']=='')
          {
            ?>
      			<li><a class="menu-title" href="login.php">Login</a></li>
            <?php
          }
          else
          {
            ?>
            <li><a class="menu-title" href="profile.php">Profile</a></li>
            <?php
          }
          ?>
      			<li><a class="menu-title" href="about.php">About Us</a></li>
      			<li><a class="menu-title" href="registration-form.php">Registration</a></li>
      			<li><a class="menu-title" href="pricing.php">Pricing</a></li>
            <li><a class="menu-title" href="process.php">Process</a></li>
            <li><a class="menu-title" href="contact.php">Contact Us</a></li>
            <li><a class="menu-title" href="request-trial.php">Request a trial Lesson now</a></li>
          <?php
          if($_SESSION['user_id']!='')
          {
            ?>
            <li><a href="Logout.php" class="menu-title">Log Out</a></li>
            <?php
          }
          ?> 
        </ul>
        <ul class="menu-social">
           <li><a href="https://www.facebook.com/starFAHRSCHULE STAR/"><i class="fa fa-facebook"></i></a></li>
		   <li><a href="https://www.instagram.com/FAHRSCHULE STARstar.ch/"><i class="fa fa-instagram"></i></a></li>
        </ul>
    </div>
    <!--/Menu content-->
               
  </nav>  
  <!--/Menu--> 