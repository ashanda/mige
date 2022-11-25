<?php session_start();
include 'Config/Connection.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= $config['base_url'] ?>/include/css/style.css">
	<link rel="stylesheet" href="<?= $config['base_url'] ?>/include/css/responsive.css">
	<link rel="stylesheet" href="<?= $config['base_url'] ?>/include/css/font/stylesheet.css">
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link type="image/ico" href="<?= $config['base_url'] ?>/include/images/favicon.png" rel="Shortcut Icon">
	<link rel="stylesheet" type="text/css" href="<?= $config['base_url'] ?>/include/css/fullpage.css" />

	<?php include_once 'gtag.php'; ?>
	<title>Fahrschule Star</title>
</head>
<?php
if (isset($_GET['language'])) {
	$_SESSION['language'] = $_GET['language'];
} elseif ($_SESSION['language']) {
	$_SESSION['language'] =  $_SESSION['language'];
} else {
	$_SESSION['language'] = 'ge';
}

// print_r($_SESSION['language']);die;
//$lag = $_SESSION['language'];


if ($_SESSION['language'] == 'en') {
	$translations['_logout_title_'] = 'Are you sure you want to logout?';
	$run = "SELECT `id`, `pageid`, `alias`, `inenglish` as detail FROM `page_content_translation`";
} else {
	$translations['_logout_title_'] = 'Möchten Sie sich wirklich abmelden?';
	$run = "SELECT `id`, `pageid`, `alias`, `ingerman` as detail FROM `page_content_translation`";
}
$result = $conn->query($run);
$translation = array();
while ($row = mysqli_fetch_array($result)) {
	$translation[$row['alias']] = $row['detail'];
	// echo "<pre>";  print_r($translation[$row['alias']]=$row['detail']);

}

include 'cookie.php';
?>

<body>
	<div class="container-fluid custom_1">
		<div class="d-flex justify-content-between w-100">
			<div class="header-designed"><img alt="image" class="img-fluid" src="<?= $config['base_url'] ?>/include/images/logo.png"></div>
			<div class="mid_menu">
				<nav>
					<ul id="menu">
						<a href="#Home"><?php echo $translation['home_menu_section_title']; ?></a>
						<a href="#fahrschule"><?php echo $translation['drive_menu_section_title']; ?></a>
						<a href="#nothelfer"><?php echo $translation['firstaid_menu_section_title']; ?></a>
						<!-- <a href="book?id=2">First Aid</a> -->
						<!-- <a href="book?id=3">VKU</a>
					<a href="book?id=1">Moto</a></li> -->
						<a href="#VKU"><?php echo $translation['vku_menu_section_title']; ?></a>
						<a href="#motorrad"><?php echo $translation['moto_menu_section_title']; ?></a></li>
						<a href="#günstig"><?php echo $translation['price_menu_section_title']; ?></a></li>
						<a href="#gutscheine">GUTSCHEINE</a></li>
						<!--<a href="#Contact"><?php echo $translation['contact_menu_section_title']; ?></a> -->

						<div class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo $translation['change_language_title']; ?>
							</a>

							<div class="dropdown-menu creative-ce0o" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="?language=en"><img alt="image" class="img-fluid flag-oi" src="include/images/english.jpg"> <?php echo $translation['_English_title_']; ?></a>
								<a class="dropdown-item" href="?language=ge"><img alt="image" class="img-fluid flag-oi" src="include/images/german.jpg"> <?php echo $translation['_German_title_']; ?></a>
							</div>
						</div>
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
					<div class="nav-item dropdown ab-mob09ofh">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $translation['_chnge_lag_title_']; ?>
						</a>
						<div class="dropdown-menu creative-ce0o" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="?language=en"><img alt="image" class="img-fluid flag-oi" src="<?= $config['base_url'] ?>/include/images/english.jpg"> <?php echo $translation['_English_title_']; ?></a>
							<a class="dropdown-item" href="?language=ge"><img alt="image" class="img-fluid flag-oi" src="<?= $config['base_url'] ?>/include/images/german.jpg"><?php echo $translation['_German_title_']; ?></a>
						</div>
						<!-- <div class="dropdown-menu creative-ce0o" aria-labelledby="navbarDropdown">
								<a class="dropdown-item mobile-lang" href="?language=en"><img alt="image" class="img-fluid flag-oi" src="include/images/english.jpg"> English</a>
								<a class="dropdown-item mobile-lang" href="?language=ge"><img alt="image" class="img-fluid flag-oi" src="include/images/german.jpg"> German</a>
							</div> -->
					</div>


					<a class="select_li" href="<?= $config['base_url'] ?>/nothilfekurs">
						<li><?php echo $translation['firstaid_menu_page_title']; ?></li>
					</a>
					<a class="select_li" href="<?= $config['base_url'] ?>/verkehrskundeunterricht">
						<li><?php echo $translation['vku_menu_page_title']; ?></li>
					</a>
					<a class="select_li" href="<?= $config['base_url'] ?>/grundkurs">
						<li><?php echo $translation['moto_menu_page_title']; ?></li>
					</a>
					<a class="select_li" href="<?= $config['base_url'] ?>/preise">
						<li><?php echo $translation['pricing_menu_page_title']; ?></li>
					</a>
					<a class="select_li" href="<?= $config['base_url'] ?>/about">
						<li><?php echo $translation['about_menu_page_title'] ?></li>
					</a>
					<!--<a class="select_li" href="book"><li><?php echo $translation['_Resgistration_Title_']; ?></li></a> --->
					<!--<a class="select_li" href="process.php"><li><?php echo $translation['process_menu_page_title']; ?></li></a>  -->
					<!--<a class="select_li" href="contact.php"><li><?php echo $translation['_contact_Title_']; ?></li></a> -->
					<a class="select_li" href="<?= $config['base_url'] ?>/contact">
						<li><?php echo $translation['new_contact']; ?></li>
					</a>
					<a class="select_li" href="<?= $config['base_url'] ?>/fahrlektionen">
						<li><?php echo $translation['request_trial_menu_page_title']; ?></li>
					</a>

					<?php
					if ($_SESSION['user_id'] == '') {
					?>
						<a class="select_li" href="<?= $config['base_url'] ?>/login.php">
							<li><?php echo $translation['login_menu_page_title']; ?></li>
						</a>
					<?php
					} else {
					?>
						<a class="select_li" href="<?= $config['base_url'] ?>/profile.php">
							<li><?php echo $translation['_Profile_title_']; ?></li>
						</a>
						<a class="select_li" onclick="return confirm('<?= $translations['_logout_title_'] ?>')" href="<?= $config['base_url'] ?>/Logout.php">
							<li><?php echo $translation['_logout_title_']; ?></li>
						</a>
					<?php
					}
					?>
				</ul>
			</nav>
		</div>
	</div>

	<!-----------header end--------->

	<div id="fullpage">
		<div class="slide section img_background_1" id="Home_1" style="background-image: url(<?php echo $config['base_url'] . '/admin/addtranslation/images/' . $translation['Home_background_image']; ?>);">
			<div class="intro">
				<div class="middle-1-de d-flex align-content-between flex-wrap">
					<div class="w-100 text-center aos-item aos_bg">

						<h1><?php echo $translation['Home_Welcome_Title_']; ?></h1>
						<h6><?php echo $translation['Home_Learn_Title_']; ?></h6>
						<a href="about.php" id="more-info"><button class="but-diff more-info mob-h-show"><?php echo $translation['_more_Title_']; ?></button></a>
					</div>
					<div class="w-100 d-flex justify-content-center" id="adjust-more-info">
						<a href="<?= $config['base_url'] ?>/fahrlektionen"><button class="but-red"><?php echo $translation['Home_button1_Title_']; ?></button></a>
						<!-- <a href="#Contact"><button class="but-diff"><?php echo $translation['Home_button2_Title_']; ?></button></a> -->
						<a href="<?= $config['base_url'] ?>/about" id="more-info"><button class="but-diff more-info mob-h-hide"><?php echo $translation['Home_button3_Title_']; ?></button></a>
						<div class="scrool-down-arrow arrow bounce ">
							<i class="fa fa-angle-down"></i>
						</div>
					</div>

				</div>

				<div class="imgandbutton">
					<button class="im1_btn btt-1t"></button>
					<button class="im2_btn btt-2t"></button>
					<button class="im3_btn btt-3t"></button>
					<button class="im4_btn btt-4t"></button>
					<img class="img-fluid" src="<?= $config['base_url'] ?>/include/images/pole.png" alt="">
				</div>
			</div>
		</div>

		<div class="slide img_background_2 section" id="Drive_1" style="background-image: url(<?php echo $config['base_url'] . '/admin/addtranslation/images/' . $translation['Drive_background_image']; ?>);">
			<div class="intro">
				<div class="middle-1-de d-flex align-content-between flex-wrap">
					<div class="w-100 text-center aos-item aos_bg">
						<!-- <h4>Driving</h4> -->
						<h1 class="white"><?php echo $translation['_Lerane_Title']; ?></h1>
						<h6 class="white"><?php echo $translation['_super_Driving_Title']; ?></h6>
						<a href="<?= $config['base_url'] ?>/fahrlektionen" id="more-info"><button class="but-diff more-info mob-h-show"><?php echo $translation['_more_Title_']; ?></button></a>
					</div>
					<div class="w-100 d-flex justify-content-center" id="adjust-more-info">
						<a href="<?= $config['base_url'] ?>/fahrlektionen"><button class="but-red"><?php echo $translation['Drive_button1_Title_']; ?></button></a>
						<!-- <a href="#Contact"><button class="but-diff"><?php echo $translation['Drive_button2_Title_']; ?></button></a> -->
						<a href="<?= $config['base_url'] ?>/fahrlektionen" id="more-info"><button class="but-diff more-info mob-h-hide"><?php echo $translation['Drive_button3_Title_']; ?></button></a>
					</div>
				</div>
			</div>
		</div>
		<div class="slide img_background_3 section" id="First-Aid_1" style="background-image: url(<?php echo $config['base_url'] . '/admin/addtranslation/images/' . $translation['Firstaid_background_image']; ?>);">
			<div class="intro">
				<div class="middle-1-de d-flex align-content-between flex-wrap">
					<div class="w-100 text-center aos-item aos_bg">
						<h1 class="white"><?php echo $translation['_First_Aid_Title_']; ?></h1>
						<h6 class="white"><?php echo $translation['_Book_First_Aid_Title']; ?></h6>
						<a href="<?= $config['base_url'] ?>/nothilfekurs" id="more-info"><button class="but-diff more-info mob-h-show"><?php echo $translation['_more_Title_']; ?></button></a>
						<!-- <p class="mx-auto mt-3">You can easily book your first aid course online</p> -->
					</div>
					<div class="w-100 d-flex justify-content-center" id="adjust-more-info">
						<a href="<?= $config['base_url'] ?>/book"><button class="but-red"><?php echo $translation['Firstaid_button1_Title_']; ?></button></a>
						<!-- <a href="#Contact"><button class="but-diff"><?php echo $translation['Firstaid_button2_Title_']; ?></button></a> -->
						<a href="<?= $config['base_url'] ?>/nothilfekurs" id="more-info"><button class="but-diff more-info mob-h-hide"><?php echo $translation['Firstaid_button3_Title_']; ?></button></a>
					</div>
				</div>

			</div>
		</div>

		<div class="slide img_background_4 section" id="VKU_1" style="background-image: url(<?php echo $config['base_url'] . '/admin/addtranslation/images/' . $translation['vku_background_image']; ?>);">
			<div class="intro">
				<div class="middle-1-de d-flex align-content-between flex-wrap">
					<div class="w-100 text-center aos-item aos_bg">
						<h1 class="white"><?php echo $translation['_VKU_Title_']; ?></h1>
						<h6 class="white"><?php echo $translation['_Traffic_Studies_Title_']; ?></h6>
						<a href="<?= $config['base_url'] ?>/verkehrskundeunterricht" id="more-info"><button class="but-diff more-info mob-h-show"><?php echo $translation['_more_Title_']; ?></button></a>
					</div>
					<div class="w-100 d-flex justify-content-center" id="adjust-more-info">
						<a href="<?= $config['base_url'] ?>/book"><button class="but-red"><?php echo $translation['vku_button1_Title_']; ?></button></a>
						<!-- <a href="#Contact"><button class="but-diff"><?php echo $translation['vku_button2_Title_']; ?></button></a> -->
						<a href="<?= $config['base_url'] ?>/verkehrskundeunterricht" id="more-info"><button class="but-diff more-info mob-h-hide"><?php echo $translation['vku_button3_Title_']; ?></button></a>
					</div>
				</div>

			</div>
		</div>

		<div class="slide img_background_5 section" id="Moto_1" style="background-image: url(<?php echo $config['base_url'] . '/admin/addtranslation/images/' . $translation['Moto_background_image']; ?>);">
			<div class="intro">
				<div class="middle-1-de d-flex align-content-between flex-wrap">
					<div class="w-100 text-center aos-item aos_bg">
						<h1><?php echo $translation['_Moto_Title_']; ?></h1>
						<h6><?php echo $translation['_Motorycle_12_']; ?></h6>
						<a href="<?= $config['base_url'] ?>/grundkurs" id="more-info"><button class="but-diff more-info mob-h-show"><?php echo $translation['_more_Title_']; ?></button></a>
					</div>
					<div class="w-100 d-flex justify-content-center" id="adjust-more-info">
						<!-- <a href="<?= $config['base_url'] ?>/book"><button class="but-red"><?php echo $translation['Moto_button1_Title_']; ?></button></a> -->
						<a href="<?= $config['base_url'] ?>/book"><button class="but-red">MEHR</button></a>
						<!-- <a href="#Contact"><button class="but-diff"><?php echo $translation['Moto_button2_Title_']; ?></button></a> -->
						<a href="<?= $config['base_url'] ?>/grundkurs" id="more-info"><button class="but-diff more-info mob-h-hide"><?php echo $translation['_more_12_title_']; ?></button></a>
					</div>
				</div>
			</div>
		</div>


		<div class="slide img_background_6 section" id="Price_1" style="background-image: url(<?php echo $config['base_url'] . '/admin/addtranslation/images/' . $translation['Price_background_image']; ?>);">
			<div class="intro">
				<div class="middle-1-de d-flex align-content-between flex-wrap">
					<div class="w-100 text-center aos-item aos_bg">
						<h1 class="white"><?php echo $translation['_Price_Title_']; ?></h1>
						<h6><?php echo $translation['_Deive_Pey_Tommorrow_Title']; ?></h6>
						<a href="<?= $config['base_url'] ?>/preise" id="more-info"><button class="but-diff more-info mob-h-show"><?php echo $translation['_more_Title_']; ?></button></a>
					</div>
					<div class="w-100 d-flex justify-content-center" id="adjust-more-info">
						<a href="<?= $config['base_url'] ?>/fahrlektionen"><button class="but-red"><?php echo $translation['Price_button1_Title_']; ?></button></a>
						<!-- <a href="#Contact"><button class="but-diff"><?php echo $translation['Price_button2_Title_']; ?></button></a> -->
						<a href="<?= $config['base_url'] ?>/preise" id="more-info"><button class="but-diff more-info mob-h-hide"><?php echo $translation['Price_button3_Title_']; ?></button></a>
					</div>
				</div>

			</div>
		</div>


		<div class="slide img_background_7 section" id="Sample" style="background-image: url(https://fahrschule-star.ch/admin/addtranslation/images/voucher.jpg);">
			<div class="intro">
				<div class="middle-1-de d-flex align-content-between flex-wrap">
					<div class="w-100 text-center aos-item aos_bg">
						<h1 class="white">Gutscheine</h1>
						<h6>Gutscheine bequem online kaufen</h6>
						<a href="https://fahrschule-star-shop.ch/" id="more-info"><button class="but-diff more-info mob-h-show"><?php echo $translation['_more_Title_']; ?></button></a>
					</div>
					<div class="w-100 d-flex justify-content-center" id="adjust-more-info">
						<a href="https://fahrschule-star-shop.ch/"><button class="but-red">KAUFE JETZT</button></a>
						<a href="https://fahrschule-star-shop.ch/" id="more-info"><button class="but-diff more-info mob-h-hide"><?php echo $translation['Price_button3_Title_']; ?></button></a>
					</div>
				</div>

			</div>

			<div class="footer-sticky">
				<nav class="nav-list">
					<ul data-region="footer" class="tds-footer-meta tds--align_center tds-list tds-list--horizontal tcl-site-footer">
						<li class="tds-footer-item">
							Copyright 2020 - Alle Rechte vorbehalten von Fahrschule Star
						</li>
						<li class="tds-footer-item" style="color: #e90616 !important;font-weight: 500">
							<a href="<?= $config['base_url'] ?>/terms-condition.php" class="tds-link">AGB</a>
						</li>
						<li class="tds--hide_on_mobile tds-footer-item" style="color: #e90616;font-weight: 500">
							<a href="<?= $config['base_url'] ?>/legal.php" class="tds-link">Impressum</a>
						</li>
						<li class="tds-footer-item" style="color: #e90616 !important;font-weight: 500">
							<a href="<?= $config['base_url'] ?>/privacy.php" class="tds-link">Datenschutz</a>
						</li>

					</ul>
				</nav>
			</div>

		</div>
	</div>

	<style>
		.fp-tableCell {
			display: block !important;

		}

		.intro {
			top: 4px;
		}

		.middle-1-de {
			opacity: 0;
			transition: 2s;

		}

		.middle-1-de h1 {
			color: #313131;
		}

		.active .middle-1-de {
			opacity: 1;
			transition: 2s;
		}

		/***********New Css******************/
		.scrool-down-arrow {
			text-align: center;
			margin: auto;
			display: none;
			width: 100%;
			margin-bottom: 0rem;
		}

		.scrool-down-arrow .fa {
			font-size: 35px;
			text-align: center;
			color: #fff;
			margin: auto;
			-webkit-animation: arrow 0.5s 1s infinite ease-out
		}

		.arrow {
			text-align: center;
		}

		.bounce {
			-moz-animation: bounce 3s infinite;
			-webkit-animation: bounce 4s infinite;
			animation: bounce 3s infinite;
		}

		@keyframes bounce {

			0%,
			20%,
			50%,
			80%,
			100% {
				transform: translateY(0);
			}

			40% {
				transform: translateY(2px);
			}

			60% {
				transform: translateY(15px);
			}
		}

		li.tds-footer-item {
			color: #fff;
			font-weight: 400;
			font-size: 15px;
		}

		.footer-sticky {
			position: absolute;
			width: 100%;
			left: 0;
			height: 50px;
			bottom: 36px;
			text-align: center;
		}

		/* #Price_1 {
			position: relative;
		} */

		.footer-sticky ul li a {
			color: #ffffff;
			padding: 10px;
		}

		.footer-sticky ul {
			list-style: none;
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 13px;
			flex-wrap: wrap !important;

		}

		button#getqutob {
			position: fixed;
			z-index: 999;
			width: auto;
			right: 0px;
			bottom: 20px;
			background: #0b509f;
			transition-duration: 1s;
			padding-left: 20px;
			border: none;
		}

		button#getqutob h6.gttext {
			font-size: 0px;
			position: relative;
			margin-bottom: 0px;
			height: 30px;
			transition-duration: 1s;
			color: #fff;
			line-height: 30px;
			padding: 0px 5px;
		}

		button#getqutob span.gtimg {
			display: flex;
			width: 60px;
			height: 60px;
			position: absolute;
			border-radius: 50%;
			top: -15px;
			left: -66px;
			background: #0b509f;
			align-items: center;
			justify-content: center;
			border: 2px solid #fff;
			transition-duration: 1s;
		}

		button#getqutob span.gtimg img {
			width: 30px;
		}

		button#getqutob:hover,
		button#getqutob:hover span.gtimg {
			background: #e90616;
		}

		button#getqutob:hover h6.gttext {
			font-size: 14px;
			transition-duration: 1s;
		}

		div#adjust-more-info {
			margin-bottom: 3rem;
		}

		@media screen and (max-width: 768px) {
			div#adjust-more-info {
				margin-bottom: 0rem;

			}

			.fp-tableCell {
				display: table-cell !important;
			}

			.img_background_6 div#adjust-more-info {
				margin-bottom: 4rem !important;
				margin-top: 4rem !important;
			}

			li.tds-footer-item {
				line-height: 16px;
				width: 100%;
				font-size: 13px;

			}

			.scrool-down-arrow {
				display: block;
			}

			.footer-sticky {
				position: absolute;
				width: 100%;
				left: 0;
				height: 83px;
				bottom: 20px;
				text-align: center;
				margin: 0;
				padding: 0;
			}

			.footer-sticky ul li a {

				font-weight: 400;
			}

			.imgandbutton {

				bottom: 28%;
			}

		}

		@media screen and (max-width: 551px) {
			.footer-sticky{
				padding-top: 20px;
			}
			.footer-sticky ul {
				flex-flow: column;
			}

			.middle-1-de h1 {
				font-size: 26px;
				letter-spacing: -0.6px;
				text-transform: capitalize;
				line-height: 1.5;
				line-height: 29px;
				margin-top: 1rem;
				margin-bottom: 7px;
			}

			.img_background_2 div#adjust-more-info,
			.img_background_3 div#adjust-more-info,
			.img_background_4 div#adjust-more-info,
			.img_background_5 div#adjust-more-info {
				margin-bottom: 2.5rem;
			}

			.cate li.active,
			.cate li:hover,
			.cate li:active,
			.cate li:focus {
				background: #e90616 !important;
				color: #fff;
				border-radius: 0 !important;
			}

			.ab-mob09ofh a {
				height: calc(7vh - 13px);

			}

			.w-100.text-center.aos-item.aos_bg h6 {
				padding: 3px 35px;
				font-size: 13px;
			}

			.imgandbutton {

				bottom: 26% !important;
			}

			.middle-1-de .w-100 {
				margin-top: 4rem;
			}
			div#adjust-more-info{
				margin-bottom: 3rem;
			}
		}
	</style>
	<style>
		button#getqutob {
			position: fixed;
			z-index: 999;
			width: auto;
			right: 0px;
			bottom: 20px;
			background: #0b509f;
			transition-duration: 1s;
			padding-left: 20px;
			border: none;
		}

		button#getqutob h6.gttext {
			font-size: 0px;
			position: relative;
			margin-bottom: 0px;
			height: 30px;
			transition-duration: 1s;
			color: #fff;
			line-height: 30px;
			padding: 0px 5px;
		}

		button#getqutob span.gtimg {
			display: flex;
			width: 60px;
			height: 60px;
			position: absolute;
			border-radius: 50%;
			top: -15px;
			left: -66px;
			background: #0b509f;
			align-items: center;
			justify-content: center;
			border: 2px solid #fff;
			transition-duration: 1s;
		}

		button#getqutob span.gtimg img {
			width: 30px;
		}

		button#getqutob:hover,
		button#getqutob:hover span.gtimg {
			background: #e90616;
		}

		button#getqutob:hover h6.gttext {
			font-size: 14px;
			transition-duration: 1s;
		}
	</style>
	<!-- 	<button class="bt getquto" id="getqutob" type="button">
		<h6 class="gttext">
			<span class="gtimg">
				<img src="include/images/chat-icon.png">
			</span> 
			<span class="gtget">
				Chat Now
			</span> 
		</h6>
	</button> -->

	<!--div id="id0q" class="modal">
		<div class="modal-content">
			<div class="lang">
				<h2>Select Language<button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button></h2> 
				<div id="google_translate_element"></div> 
			 </div>
		  </div>  
	  </div-->

	<input type="hidden" id="lang">
	<script type="text/javascript" src="<?= $config['base_url'] ?>/include/js/fullpage.js"></script>
	<script type="text/javascript">
		var myFullpage = new fullpage('#fullpage', {
			anchors: ['Home', 'fahrschule', 'nothelfer', 'VKU', 'motorrad', 'günstig', 'gutscheine'],
			menu: '#menu',
			scrollingSpeed: 600
		});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<!-- 

<script type="text/javascript">
	function googleTranslateElementInit() {
	new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

 -->

	<script type="text/javascript">
		$(window).on('load', function() {
			$('#id0q').modal('show');
			$('.slides-container').css("position", "sticky")

			$('select.goog-te-combo').change(function() {
				$('#id0q').hide();
				data = $(this).val();
				// console.log(data);
				$('#lang').val(data);
				asyncLoad();
				$($(this).val()).hide();
				$('.slides-container').css("position", "");

			});
		});
		$(document).ready(function() {
			$(document).click(function(e) {
				if (e.target.className == 'modal-content') {
					$('.slides-container').css("position", "sticky")
					console.log('helo world');
				} else(e.target.class == 'id0q') {
					$('.slides-container').css("position", "")
				}
			})
		})
	</script>
	<script>
		$(".header-designed-2, .select_li, .creative-ce0o .mobile-lang").click(function() {
			$(".fp-completely").toggleClass('active');
			$(".slide-right-animation").toggleClass('slide_left_to_right');
			$(".header-designed-2").toggleClass('change');
			$('body').removeClass('slide_left_to_right');
			$('div#fullpage').toggleClass('on-touch-sc');
		});
	</script>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="//code.tidio.co/kv1vnt7x2umavhousd0xxop5ooq9leos.js" async></script>
	<script type='text/javascript'>
		document.tidioChatCode = "kv1vnt7x2umavhousd0xxop5ooq9leos";

		// (function() {
		function asyncLoad() {
			// var data = document.getElementById('google_translate_element').value;
			// var a = document.querySelector("#google_translate_element select");
			//     alert(a);
			var lang = document.getElementById('lang').value;
			console.log('language' + lang);
			var tidioScript = document.createElement("script");
			tidioScript.type = "text/javascript";
			tidioScript.async = true;
			tidioScript.src = "//code.tidio.co/kv1vnt7x2umavhousd0xxop5ooq9leos.js";
			document.body.appendChild(tidioScript);
			document.tidioChatLang = lang;
		}
		if (window.attachEvent) {
			window.attachEvent("onload", asyncLoad);
		} else {
			window.addEventListener("load", asyncLoad, false);
		}
		// })();

		$("#contact-form").validate({
			rules: {
				name: "required",
				subject: "required",
				message: "required",
				email: {
					email: true,
					required: true
				},
				phone: {
					required: true,
					minlength: 10
				},

			},

			messages: {
				name: "Please fill name",
				subject: "Please fill subject",
				message: "Please fill message",
				email: {
					email: "Enter Valid Email!",
					required: "Enter Email!"
				},
				phone: {
					minlength: "Please enter Valid Mobile No.",
					required: "Please enter Mobile No."
				},
			},

			submitHandler: function(form) {
				$.ajax({
					url: form.action,
					type: form.method,
					data: $(form).serialize(),
					dataType: "JSON",
					success: function(response) {
						form.reset();
						alert(response.message);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error while sending mail');
					}
				});
			}
		});
	</script>

</body>

</html>