<?php
include_once '../header.php';
include_once '../Functions.php';
include_once '../Config/Connection.php';
 
      if ( $_SESSION['language'] =='en')
      {
        $run="SELECT `id`, `pageid`, `alias`, `inenglish` as detail FROM `page_content_translation`";

      }
      else
      {
        $run="SELECT `id`, `pageid`, `alias`, `ingerman` as detail FROM `page_content_translation`";
       
      }
     $result=$conn->query($run);
     $translation = array();
     while($row = mysqli_fetch_array($result))
    {
       $translation[$row['alias']]=$row['detail'];
    // echo "<pre>";  print_r($translation[$row['alias']]=$row['detail']);
                 
     }
?>
<!-- <!DOCTYPE html>
<html>
    <head>
        <meta charset="euc-jp" />
        <meta name="description" content="FAHRSCHULE STAR responsive multipurpose template" />
        <meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap, Parallax" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>FAHRSCHULE STAR</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="css/ani-1.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="css/color-schemes/default.css" id="style-colors" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet" />
        <link type="image/ico" href="images/favicon.png" rel="Shortcut Icon" />
    </head>
    <body>
        <div id="loader-container">
            <div class="loader-content"><div class="loader">Loading...</div></div>
        </div>
        <div id="main" class="no-padding">
            <header id="header" class="">
                <div class="container" id="cont-header">
                    <div class="logo">
                        <a href="index.html" target="_parent"> <img src="images/logo.png" alt="" /> </a>
                    </div>
                    <div id="add-trans">
                        <div id="google_translate_element"></div>
                        <div id="btn-menu"><span class="title">Menu</span> <span class="line line1"></span> <span class="line line2"></span> <span class="line line3"></span></div>
                    </div>
                </div>
            </header>
            <nav class="menu text-right subfont">
                <div class="btn-menu-close"><i class="fa fa-times"></i></div>
                <div class="menu-content">
                    <ul class="menu-list">
                        <li><a class="menu-title" href="profile.html">Profile</a></li>
                        <li><a class="menu-title" href="about.html">About Us</a></li>
                        <li><a class="menu-title" href="registration-form.php">Registration</a></li>
                        <li><a class="menu-title" href="pricing.html">Pricing</a></li>
                        <li><a class="menu-title" href="process.html">Process</a></li>
                        <li><a href="contact.html" class="menu-title">Contact Us</a></li>
                        <li><a href="request-trial.html" class="menu-title">Request a trial Lesson now</a></li>
                        <li><a href="#log-out.html" class="menu-title">Log Out</a></li>
                    </ul>
                    <ul class="menu-social">
                        <li>
                            <a href="https://www.facebook.com/starFAHRSCHULE STAR/"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/FAHRSCHULE STARstar.ch/"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
                /Menu content
            </nav> -->
            <!--/Menu-->
            <style type="text/css">
				div#main
				{
					padding-top:85px !important;
				}
				div#google_translate_element {
					display: none;
				}
				input[type=number]::-webkit-inner-spin-button,
				input[type=number]::-webkit-outer-spin-button { 
					-webkit-appearance: none;
				}
				@media (max-width: 768px){
					div#main {
						padding-top: 62px !important;
					}
                }
            </style> 
            <section class="trial-lesson">
				<div class="container">
					<h2><?php echo $translation['request_trial_menu_page_title']?></h2>
					<form class="trial-less" method="post">
						<div class="form-group">
							<label for="name"><?php echo $translation['_Name_Title_']?></label>
							<input type="text" class="form-control" id="name" placeholder="<?php echo $translation['_Name_Title_']?>" name="name"  />
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1"><?php echo $translation['_trial-email_title_']?> </label>
							<input type="email" class="form-control" id="email" placeholder="<?php echo $translation['_trial-email_title_']?>" name="email"  />
						</div>
						<div class="form-group">
							<label for="DOB"><?php echo $translation['_trial_Date_Of_Birth_title_']?></label>
							<input type="date" class="form-control" id="DOB" placeholder="<?php echo $translation['_trial_Date_Of_Birth_title_']?>" name="dob" />
						</div>
						<div class="form-group">
							<label for="phone"><?php echo $translation['_Phone_title_']?></label>
							<input type="tel" class="form-control" id="number" placeholder="<?php echo $translation['_Phone_Number_Title_'];?>" maxlength="20" name="phone_no" min="0" oninput="validity.valid||(value='');" />
						</div>
					<div class="form-group">
							<label for="where-go"><?php echo $translation['_Please _select_Title_']?></label>
							<select name='trial_lesson' >
								<option value="" selected="selected"><?php echo $translation['Please_select_title']?></option>
								<?php $trial_lesson=get_trial_lesson_detail();
								foreach ($trial_lesson as $key => $value) {
									?>
									<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
								<?php }
								?>
								<!-- <option>Aarau driving lessons</option>
								<option>Driving lessons bathing</option>
								<option>Driving lessons Wettingen</option> 
								<option>Driving lessons Zurich</option> -->
							</select>
						</div>
					<div class="form-group">
							<label for="where-go"><?php echo $translation['_Category_title_']?></label>
							<select name="trial_category" >
								<option value='' selected="selected"><?php echo $translation['Please_select_title']?></option>
								<?php $trial_category=get_trial_category_detail();
								foreach ($trial_category as $key => $value) {
									?>
									<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
								<?php }
								?>
								<!-- <option>Auto - switched</option>
								<option>Auto - automat</option>
								<option>Pendant</option>
								<option>Motorcycle</option> -->
							</select>
						</div>
						<div class="form-group">
							<label for="where-go"><?php echo $translation['_am_available_title_']?></label>
							<ul class="multi-select">
								<li class="s-all"><input type="checkbox" class="checkall" id="select_all"/> <?php echo $translation['_Select_all_title_']?></li>
								<?php $trial_time_slot=get_trial_time_slot_detail();
								foreach ($trial_time_slot as $key => $value) { ?>
								 <li><input type="checkbox" class="s-ava" name="trial_time_slot[]"  value="<?php echo $value['id'];?>"/> <?php echo $value['result'].'('. $value['start_time'].'-'.$value['end_time'].')'?></li>
								 <?php
								 } ?>
								<!-- <li><input type="checkbox" class="s-ava" /> Morning (08.00-12.00)</li>
								<li><input type="checkbox" class="s-ava" /> Afternoon (12.00-17.00)</li>
								<li><input type="checkbox" class="s-ava" /> Evening (17.00-21.00)</li> -->
							</ul>
						</div>
						<div class="form-group">
							<label for="where-go"><?php echo $translation['_select_day_title_']?></label>
							<ul class="multi-select select-day" >
								<li><input type="checkbox" class="s-all1" id="select_all1" /><?php echo $translation['_Select_all_days_title_']?></li> 
								<?php $trial_weekday=get_trial_weekday_detail();
								foreach ($trial_weekday as $key => $value){

								 ?>
								<li><input type="checkbox" class="s-ava1" name="trial_weekday[]"value="<?php echo $value['id'];?>"><?php echo $value['result'];?>
							</li>
								 <?php
								 } ?>
								<!-- <li><input type="checkbox" class="s-all1" /> Select All</li>
								<li><input type="checkbox" class="s-ava1" /> Monday</li>
								<li><input type="checkbox" class="s-ava1" /> Tuesday</li>
								<li><input type="checkbox" class="s-ava1" /> Wednesday</li>
								<li><input type="checkbox" class="s-ava1" /> Thursday</li>
								<li><input type="checkbox" class="s-ava1" /> Friday</li>
								<li><input type="checkbox" class="s-ava1" /> Saturday</li>
								<li><input type="checkbox" class="s-ava1" /> Sunday</li> -->
							</ul>
						</div>
						<div class="form-group full-width">
							<label for="msg"><?php echo $translation['_Nachricht_title_']?></label>
							<textarea name="message" ></textarea>
						</div>
					<button type="submit" class="btn-primary"><?php echo $translation['_einreichen_title_']?></button>
					</form>
				</div>
            </section>
        </div>
        <!-- /Main content -->

<?php include '../footer-new.php'; ?>
<script >
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.s-ava').each(function(){
                this.checked = true;
            });
        }else{
             $('.s-ava').each(function(){
                this.checked = false;
            });
        }
    });
    $('.s-ava').on('click',function(){
        if($('.s-ava:checked').length == $('.s-ava').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
$(document).ready(function(){
    $('#select_all1').on('click',function(){
        if(this.checked){
            $('.s-ava1').each(function(){
                this.checked = true;
            });
        }else{
             $('.s-ava1').each(function(){
                this.checked = false;
            });
        }
    });
    $('.s-ava1').on('click',function(){
        if($('.s-ava1:checked').length == $('.s-ava1').length){
            $('#select_all1').prop('checked',true);
        }else{
            $('#select_all1').prop('checked',false);
        }
    });
});
</script>
<script type="text/javascript">
	$('form.trial-less').on('submit',function(e){
// alert("dfsdg");
     e.preventDefault();  
        var formData = new FormData(this);
         console.log(formData);
          $.ajax({
            type: 'post',
            url: '<?=$config['base_url']?>/AddRequestTrial.php',
            // data: formData,
            //  cache:false,
          data :formData ,
          contentType : false, // you can also use multipart/form-data replace of false
          processData: false,
            success: function (data) {
                // console.log(data);
                     data = $.parseJSON(data);
                     console.log(data);
                // alert(data.message);
                if(data.status==1){
                	  alert(data.message);
                	  location.reload();
                }
                else{
                	   alert(data.message);
                }                
            }
          });
	});

</script>