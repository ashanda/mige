<?php session_start();
include_once 'Config/Connection.php';?>
<?php
//$conn=new mysqli("localhost","root","","dharmani_fahrschuleweb") or die ("database not connected");  
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

      


       if ( $_SESSION['language'] =='en')
      {

      	$translations['_logout_title_'] = 'Are you sure you want to logout?';
		$translations['_exam_title_'] = 'Exam';
        $run="SELECT `id`, `pageid`, `alias`, `inenglish` as detail FROM `page_content_translation`";

      }
      else
      {
      	$translations['_logout_title_'] = 'Möchten Sie sich wirklich abmelden?';
		$translations['_exam_title_'] = 'Exam';
        $run="SELECT `id`, `pageid`, `alias`, `ingerman` as detail FROM `page_content_translation`";
       
      }
     $result=$conn->query($run);
     $translation = array();
     while($row = mysqli_fetch_array($result))
    {
       $translation[$row['alias']]=$row['detail'];    
       // array_push($all , $row);             
     } 






?>
     
               
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link type="image/ico" href="<?=$config['base_url']?>/include/images/favicon.png" rel="Shortcut Icon">
	<link href="<?=$config['base_url']?>/style1.css" rel="stylesheet" type="text/css">
	<link href="<?=$config['base_url']?>/css/ani-1.css" rel="stylesheet" type="text/css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<title>Fahrschule Star</title> 
	<?php include_once 'gtag.php'; ?>
	<style>

		.header-designed-2 {
			right: 30px;
			z-index: 9999999;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			height: 80px;
			cursor: pointer;
			width: 100px;
		}
		.header-designed {
			padding: 0px 20px;
			top: 20px;
			left: 10px;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 80px;
			width: 100px;
		}
		.bar1, .bar2, .bar3 {
			width: 28px;
			height: 3px;
			background-color: #373a27;
			margin: 2.3px 0;
			transition: .5s;
		}
		.change .bar1 {
			-webkit-transform: rotate(-40deg) translate(6px, -7px);
			transform: rotate(40deg) translate(6px, -7px);
			width: 17px;
			height: 2px;
			background-color: #fff;
		}
		.change .bar2 {
			opacity: 1;
			-webkit-transform: rotate(-40deg) translate(4px, 8px);
			transform: rotate(-40deg) translate(4px, 8px);
			width: 17px;
			height: 2px;
			background-color: #fff;
		}
		.change .bar3 {
			-webkit-transform: rotate(0deg) translate(1px, -9px);
			transform: rotate(0deg) translate(1px, -9px);
			width: 30px;
			height: 2.2px;
			background-color: #fff;
		}
		.slide-right-animation {
			height: 100vh;
			background-color: #414141;
			width: 320px;
			right: -350px;
			position: absolute;
			transition: all .4s;
			top: 0;
			display: none;
			box-shadow: -1px 1px 10px 3px #0000004a;
			z-index: 999999;
			overflow-y:scroll;
		}
		.slide-right-animation::-webkit-scrollbar
		{
			display:none;
		}
		.slide_left_to_right {
			right: 0px;
			position: fixed;
			display: block;
		}
		.slide-right-animation ul {
			list-style: none;
			padding-inline-start: 0px;
			padding-top: 80px;
			padding-bottom:35px; 
		}
		a.select_li {
			text-decoration: none;
		}
		.slide-right-animation ul li {
			line-height: 4;
			padding: 0px 30px;
			border-bottom: 1px solid #ffffff3d;
			color: #fff;
		}
		.slide-right-animation.slide_left_to_right ul li:hover {
			background-color: #ffffff;
			color: #414141;
			cursor: pointer;
			transition: all 0.7s;
		}
		.header-designed-2.change {
			position: fixed;
			right: 15px;
		}

	</style>
</head>
<body>
<div class="container-fluid custom_1">
		<div class="d-flex justify-content-between w-100">
			<div class="header-designed"><a href="<?=$config['base_url']?>"><img alt="image" class="img-fluid" src="<?=$config['base_url']?>/include/images/logo.png"></a></div>

			<div class="header-designed-2" onclick="myFunction(this)">
			<div class="bar1"></div>
			<div class="bar2"></div>
			<div class="bar3"></div>
			</div>
		</div>
	
		<div class="slide-right-animation">
			<nav>
				<ul>
                  <div class="nav-item dropdown ab-mob09ofh">
							<a class="nav-link dropdown-toggle style-custom"href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $translation['_chnge_lag_title_'];?>
							</a>
							<div class="dropdown-menu creative-ce0o" aria-labelledby="navbarDropdown">
								<a class="dropdown-item mobile-lang" href="?language=en"><img alt="image" class="img-fluid flag-oi" src="<?=$config['base_url']?>/include/images/english.jpg"><?php echo $translation['_English_title_'];?> </a>
								<a class="dropdown-item mobile-lang" href="?language=ge"><img alt="image" class="img-fluid flag-oi" src="<?=$config['base_url']?>/include/images/german.jpg"> <?php echo $translation['_German_title_'];?></a>
							</div>
						</div>

					<a class="select_li" href="<?=$config['base_url']?>/nothilfekurs"><li><?php echo $translation['firstaid_menu_page_title']?></li></a>
					<a class="select_li" href="<?=$config['base_url']?>/verkehrskundeunterricht"><li><?php echo $translation['vku_menu_page_title'];?></li></a>
					<a class="select_li" href="<?=$config['base_url']?>/grundkurs"><li><?php echo $translation['moto_menu_page_title'];?></li></a>
					<a class="select_li" href="<?=$config['base_url']?>/preise"><li><?php echo $translation['pricing_menu_page_title'];?></li></a>
					<a class="select_li" href="<?=$config['base_url']?>/about"><li><?php echo $translation['about_menu_page_title']?></li></a>
					<!-- <a class="select_li" href="registration-form.php"><li><?php echo $translation['_Resgistration_Title_'];?></li></a> -->
				<!--	<a class="select_li" href="process.php"><li><?php echo $translation['_Process_title_'];?></li></a> -->
					<a class="select_li" href="<?=$config['base_url']?>/contact"><li><?php echo $translation['new_contact'];?></li></a>
					<a class="select_li" href="<?=$config['base_url']?>/fahrlektionen"><li><?php echo $translation['request_trial_menu_page_title'];?></li></a>
					<?php
			          if($_SESSION['user_id']=='')
			          {
			            ?>
			            	<a class="select_li" href="<?=$config['base_url']?>/login.php"><li><?php echo $translation['login_menu_page_title'];?></li></a>
			            <?php
			          }
			          else
			          {
			            ?>
						<a class="select_li" href="<?=$config['base_url']?>/profile.php"><li><?php echo $translations['_exam_title_'];?></li></a>
			            <a class="select_li" href="<?=$config['base_url']?>/profile.php"><li><?php echo $translation['_Profile_title_'];?></li></a>
			            <a class="select_li" onclick="return confirm('<?=$translations['_logout_title_']?>')" href="<?=$config['base_url']?>/Logout.php"><li><?php echo $translation['_logout_title_'];?></li></a>
			            <?php
			          }
			          ?>
				</ul>
			</nav>
		</div>
	</div>
	<!-- <div class="container-fluid custom_1">
		<div class="d-flex justify-content-between w-100">
			<div class="header-designed"><img alt="image" class="img-fluid" src="include/images/logo.png"></div>
			<div class="mid_menu">
			<nav>
				<ul id="menu">
					<li><a href="#Home">Home</a></li>
					<li><a href="#Drive">Drive</a></li>
					<li><a href="#First-Aid">First Aid</a></li>
					<li><a href="#VKU">VKU</a></li>
					<li><a href="#Moto">Moto</a></li>
					<li><a href="#Price">Price</a></li>
					<li><a href="#Contact">Contact</a></li>
				</ul>

				
			</nav>
			</div>
			<div class="header-designed-2" onclick="myFunction(this)">
			<div class="bar1"></div>
			<div class="bar2"></div>
			<div class="bar3"></div>
			</div>
		</div>
	
		<div class="slide-right-animation">
			<nav>
				<ul>
					<?php
			          if($_SESSION['user_id']=='')
			          {
			            ?>
			            	<a class="select_li" href="login.php"><li>Login</li></a>
			            <?php
			          }
			          else
			          {
			            ?>
			            <a class="select_li" href="profile.php"><li>Profile</li></a>
			            <?php
			          }
			          ?>
					<a class="select_li" href="about.php"><li>About Us</li></a>
					<a class="select_li" href="registration-form.php"><li >Registration</li></a>
					<a class="select_li" href="pricing.php"><li>Pricing</li></a>
					<a class="select_li" href="process.php"><li>Process</li></a>
					<a class="select_li" href="contact.php"><li>Contact Us</li></a>
					<a class="select_li" href="request-trial.php"><li>Request a trial Lesson now</li></a>
				</ul>
			</nav>
		</div>
	</div> -->
	<!-----------header end--------->