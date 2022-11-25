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
	<link rel="stylesheet" href="include/css/style.css">
	<link rel="stylesheet" href="include/css/responsive.css"> 
	<link rel="stylesheet" href="include/css/font/stylesheet.css">
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link type="image/ico" href="include/images/favicon.png" rel="Shortcut Icon">
	<link rel="stylesheet" type="text/css" href="include/css/fullpage.css"/>
	<title>Fahrshule Star</title>
</head>
<body>
	<div class="container-fluid custom_1">
		<div class="d-flex justify-content-between w-100">
			<div class="header-designed"><img alt="image" class="img-fluid" src="include/images/logo.png"></div>
			<div class="mid_menu">
			<nav>
				<ul id="menu">
					<a href="#Home">Home</a>
					<a href="#Drive">Drive</a>
					<a href="#First-Aid">First Aid</a>
					<a href="#VKU">VKU</a>
					<a href="#Moto">Moto</a>
					<a href="#Price">Price</a>
					<a href="#Contact">Contact</a>
						<div class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Change Language
							</a>
							<div class="dropdown-menu creative-ce0o" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#"><img alt="image" class="img-fluid flag-oi" src="include/images/english.jpg"> English</a>
								<a class="dropdown-item" href="#"><img alt="image" class="img-fluid flag-oi" src="include/images/german.jpg"> German</a>
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
							Change Language
						</a>
						<div class="dropdown-menu creative-ce0o" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#"><img alt="image" class="img-fluid flag-oi" src="include/images/english.jpg"> English</a>
							<a class="dropdown-item" href="#"><img alt="image" class="img-fluid flag-oi" src="include/images/german.jpg"> German</a>
						</div>
					</div>
			        <a class="select_li" href="first-aid-course.php"><li>First Aid</li></a>
					<a class="select_li" href="vku.php"><li>VKU</li></a>
					<a class="select_li" href="motorcycle.php"><li>Moto</li></a>
					<a class="select_li" href="pricing.php"><li>Pricing</li></a>
					<a class="select_li" href="about.php"><li>About Us</li></a>
					<a class="select_li" href="registration-form.php"><li >Registration</li></a>
					<a class="select_li" href="process.php"><li>Process</li></a>
					<a class="select_li" href="contact.php"><li>Contact Us</li></a>
					<a class="select_li" href="request-trial.php"><li>Request a trial Lesson now</li></a>
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
			            <a class="select_li" href="Logout.php"><li>Logout</li></a>
			            <?php
			          }
			          ?>
				</ul>
			</nav>
		</div>
	</div>
	<!-----------header end--------->
<div id="fullpage">
	<div class="slide img_background_1 section" id="Home_1">
		<div class="intro">
			<div class="middle-1-de d-flex align-content-between flex-wrap">
			 <div class="w-100 text-center aos-item aos_bg">
			  
				<h1>WELCOME TO FAHRSHULE STAR</h1>
				<h6>We Learn To Drive Easy</h6>
				<a href="about.php" id="more-info"><button class="but-diff more-info mob-h-show">MORE</button></a>
			</div>
			  <div class="w-100 d-flex justify-content-center" id="adjust-more-info">
				<a href="https://www.dharmani.com/FahrschuleStarWebSite/registration-form.php"><button class="but-red">REGISTRATION</button></a>
				<a href="#Contact"><button class="but-diff">CONTACT US</button></a>
				<a href="about.php" id="more-info"><button class="but-diff more-info mob-h-hide">MORE</button></a>
			  </div>
			</div>
			<div class="imgandbutton">
				<button class="im1_btn btt-1t"></button>
				<button class="im2_btn btt-2t"></button>
				<button class="im3_btn btt-3t"></button>
				<button class="im4_btn btt-4t"></button>
				<img class="img-fluid" src="include/images/pole.png" alt="">
			</div>
		</div>
	</div>

	<div class="slide img_background_2 section" id="Drive_1">
		<div class="intro">
			<div class="middle-1-de d-flex align-content-between flex-wrap">
			 <div class="w-100 text-center aos-item aos_bg">
			  <!-- <h4>Driving</h4> -->
			  <h1 class="white">Learn driving and Traffic rules.</h1>
			  <h6 class="white">Super driving instructor for super learner drivers</h6>
			  <a href="request-trial.php" id="more-info"><button class="but-diff more-info mob-h-show">MORE</button></a>
			</div>
			<div class="w-100 d-flex justify-content-center"  id="adjust-more-info">
				<a href="https://www.dharmani.com/FahrschuleStarWebSite/registration-form.php"><button class="but-red">REGISTRATION</button></a>
				<a href="#Contact"><button class="but-diff">CONTACT US</button></a>
				<a href="request-trial.php" id="more-info"><button class="but-diff more-info mob-h-hide">MORE</button></a>
			  </div>
			</div>
			  
		</div>
	</div>

    <div class="slide img_background_3 section" id="First-Aid_1">
		<div class="intro">
			<div class="middle-1-de d-flex align-content-between flex-wrap">
			 <div class="w-100 text-center aos-item aos_bg">
			  <h1 class="white">First aid</h1>
			  <h6 class="white">Book Your First Aid Course Online Now</h6>
			  <a href="first-aid-course.php" id="more-info"><button class="but-diff more-info mob-h-show">MORE</button></a>
				<!-- <p class="mx-auto mt-3">You can easily book your first aid course online</p> -->
			</div>
			<div class="w-100 d-flex justify-content-center" id="adjust-more-info">
				<a href="https://www.dharmani.com/FahrschuleStarWebSite/registration-form.php?id=2"><button class="but-red">REGISTRATION</button></a>
				<a href="#Contact"><button class="but-diff">CONTACT US</button></a>
				<a href="first-aid-course.php" id="more-info"><button class="but-diff more-info mob-h-hide">MORE</button></a>
			  </div>
			</div>
			  
		</div>
	</div>

	<div class="slide img_background_4 section" id="VKU_1">
		<div class="intro">
			<div class="middle-1-de d-flex align-content-between flex-wrap">
			 <div class="w-100 text-center aos-item aos_bg">
				<h1 class="white">VKU</h1>
				<h6 class="white">Traffic studies (VKU) in the Baden region</h6>
				<a href="vku.php" id="more-info"><button class="but-diff more-info mob-h-show">MORE</button></a>
			</div>
			<div class="w-100 d-flex justify-content-center" id="adjust-more-info">
				<a href="https://www.dharmani.com/FahrschuleStarWebSite/registration-form.php?id=3"><button class="but-red">REGISTRATION</button></a>
				<a href="#Contact"><button class="but-diff">CONTACT US</button></a>
				<a href="vku.php" id="more-info"><button class="but-diff more-info mob-h-hide">MORE</button></a>
		    </div>
			</div>
			  
		</div>
	</div>

	<div class="slide img_background_5 section" id="Moto_1">
		<div class="intro">
			<div class="middle-1-de d-flex align-content-between flex-wrap">
			 <div class="w-100 text-center aos-item aos_bg" >
				<h1>MOTO</h1>
				<h6>Motorcycle course for the Aarau, Baden and Zurich region.</h6>
				<a href="motorcycle.php" id="more-info"><button class="but-diff more-info mob-h-show">MORE</button></a>
			</div>
			<div class="w-100 d-flex justify-content-center" id="adjust-more-info">
				<a href="https://www.dharmani.com/FahrschuleStarWebSite/registration-form.php?id=1"><button class="but-red">REGISTRATION</button></a>
				<a href="#Contact"><button class="but-diff">CONTACT US</button></a>
				<a href="motorcycle.php" id="more-info"><button class="but-diff more-info mob-h-hide">MORE</button></a>
			  </div>
			</div>
			  
		</div>
	</div>

			
	<div class="slide img_background_6 section" id="Price_1">
		<div class="intro">
			<div class="middle-1-de d-flex align-content-between flex-wrap">
			 <div class="w-100 text-center aos-item aos_bg">
			  
				<h1 class="white">Price</h1>
				<h6>Drive today - pay tomorrow</h6>
				<a href="pricing.php" id="more-info"><button class="but-diff more-info mob-h-show">MORE</button></a>
			</div>
			<div class="w-100 d-flex justify-content-center" id="adjust-more-info">
				<a href="https://www.dharmani.com/FahrschuleStarWebSite/registration-form.php"><button class="but-red">REGISTRATION</button></a>
				<a href="#Contact"><button class="but-diff">CONTACT US</button></a>
				<a href="pricing.php" id="more-info"><button class="but-diff more-info mob-h-hide">MORE</button></a>
			  </div>
			</div>
			  
		</div>
	</div>

	<div class="slide img_background_7 section" id="Contact_1">
		<div class="intro">
			<div class="middle-2-de d-flex flex-column">
			 <div class="w-100 text-center aos-item aos_bg">
			  
				<h1>Contact</h1>
			</div>
			  <div class="mt-4">
				
				<form id="contact-form" method="POST" action="GetPhpData.php">
				  <input type="text" class="input_design" required name="name" placeholder="Full Name">
				  <input type="text" class="input_design" required name="email" placeholder="Email Address">
				  <input type="text" class="input_design" required name="subject" placeholder="Subject">
				  <input type="number" class="input_design" required name="phone" placeholder="Phone Number">
				  <textarea class="input_design" required name="message" placeholder="Message"></textarea>
				  <div class="w-100 d-flex justify-content-center">
				  <button class="but-red" name="type" id="contactus_submit" value="contactus">Send</button>
				</div>
				</form>
				
			  </div>
			</div>
			  
		</div>
	</div>


</div>
<style>
	button#getqutob {
		position: fixed;
		z-index: 999;
		width: auto;
		right: 0px;
		bottom: 20px;
		background:#0b509f;
		transition-duration: 1s;
		padding-left: 20px;
		border:none;
	}
	button#getqutob h6.gttext {
		font-size: 0px;
		position:relative;
		margin-bottom:0px;
		height:30px;
		transition-duration:1s;
		color:#fff;
		line-height:30px;
		padding:0px 5px;
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
		border:2px solid #fff;
		transition-duration:1s;
	}
	button#getqutob span.gtimg img
	{
		width:30px;
	}
	button#getqutob:hover , button#getqutob:hover span.gtimg
	{
		background:#e90616;
	}
	button#getqutob:hover h6.gttext
	{
		font-size:14px;
		transition-duration:1s;
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
<script type="text/javascript" src="include/js/fullpage.js"></script>
<script type="text/javascript">
		   var myFullpage = new fullpage('#fullpage', {
			anchors: ['Home', 'Drive', 'First-Aid', 'VKU', 'Moto', 'Price', 'Contact'],
       		menu: '#menu',
			  scrollingSpeed: 500
		  });
	  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>


<script type="text/javascript">
	function googleTranslateElementInit() {
	new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



<script type="text/javascript">
	$(window).on('load',function(){
		$('#id0q').modal('show');
		$('.slides-container').css("position","sticky")

        $('select.goog-te-combo').change(function(){
            $('#id0q').hide();
             data = $(this).val();
             // console.log(data);
             $('#lang').val(data);
             asyncLoad();
            $($(this).val()).hide();
			$('.slides-container').css("position","");
			
        });
	});
	$(document).ready(function(){
    $(document).click(function(e){
       if(e.target.className == 'modal-content')
       {
		$('.slides-container').css("position","sticky")
		console.log('helo world');
       }
       else(e.target.class == 'id0q')
       {
		$('.slides-container').css("position","")  
       }
    })
})
  </script>
<script>
$(".header-designed-2, .select_li, .creative-ce0o .dropdown-item").click(function(){
	$(".fp-completely").toggleClass('active');
	$(".slide-right-animation").toggleClass('slide_left_to_right');
	$(".header-designed-2").toggleClass('change');
	$('body').removeClass('slide_left_to_right');
	$('div#fullpage').toggleClass('on-touch-sc');
});
</script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="//code.tidio.co/kv1vnt7x2umavhousd0xxop5ooq9leos.js" async></script>
<script type='text/javascript'>document.tidioChatCode = "kv1vnt7x2umavhousd0xxop5ooq9leos";

// (function() {
  function asyncLoad() {
  	// var data = document.getElementById('google_translate_element').value;
// var a = document.querySelector("#google_translate_element select");
//     alert(a);
   var lang = document.getElementById('lang').value;
   console.log('language'+lang);
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
	rules:{
		name:"required",
		subject:"required",
		message:"required",
		email:{email: true,required: true},
		phone:{required : true,minlength:10},

	},

	messages: {
		name:"Please fill name",
		subject:"Please fill subject",
		message:"Please fill message",
		email:{email:"Enter Valid Email!",
			required:"Enter Email!"
			},
		phone:{minlength:"Please enter Valid Mobile No.",
			required:"Please enter Mobile No."
			},
	},

	submitHandler: function(form){
		$.ajax({
			url: form.action,
			type: form.method,
			data: $(form).serialize(),
			dataType: "JSON",
			success: function(response) {
				form.reset();
				alert(response.message);
			},
			error: function (jqXHR, textStatus, errorThrown)
	        {
	        	alert('Error while sending mail');
	        }            
      	});		
	}
});

</script>

</body>
</html>
