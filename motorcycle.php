<?php include_once 'header.php';
include_once 'Functions.php';


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
            <!--/Menu-->
            <style type="text/css">
			div#main
			{
				padding-top:85px !important;
			}
			div#google_translate_element {
				display: none;
			}
			@media (max-width: 768px){
			div#main {
				padding-top: 62px !important;
			}
			}
			            pre {
                    white-space: initial;
                    line-height: normal;
                    margin: 9px;
                    font-size: 15px;
                    font-family: 'Lato', sans-serif;
                    color: #86827F;
                    font-size: 20px;
                    font-weight: 500;
                }
                .col-md-3.btn-side-form {
    margin-top: 2rem;
    margin-bottom: ;
}
  
			</style>
            <!--About-->
            <section class="banner" id="motor-box">
                <div class="container"><h2><?php echo $translation['_Moto_Title_Page']?></h2></div>
            </section>
            <section class="team animatedParent" style="padding-bottom: 50px; background: #f2f2f2;">
                <div class="container">
                    <div class="row main-cont-box">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="about-page-text">
                                <h4 class="about-small" style="color: #e90616;"><?php echo $translation['_Motorycle_ Aarau_Title_']?></h4>
                                <p>
                                	<?php echo $translation['Moto_shot_above_desc']?>
                                    
                                </p>
                                <!-- <p>
                                <?php echo $translation['_Underestimate_Title_']?></p>
                                <p>
                                	<?php echo $translation['_ practice_ the _course_ goals_Title_']?> -->
                                    
                                </p>
                            </div>
                            <div class="service-video animatedParent">
                                <iframe src="https://www.youtube.com/embed/MCABhYXoYrI?autoplay=1&amp;feature=oembed" width="100%" height="450px" frameborder="0" allowfullscreen="1" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="services-list animatedParent" id="motor-sourses">
				<div class="container">
					<div class="row animated growIn slow">
						<div class="col-md-4 col-sm-12 marg">
							<div class="service-content">
								<span class="icon"><i class="fa fa-motorcycle"></i></span>
								<h3><?php echo $translation['_Motorbike_trial_course_title_']?></h3>
								<!-- <p><?php echo $translation['_mptprcycling_title_']?></p>
								<p><?php echo $translation['_ability _to_ move_title_']?></p>
								<p><?php echo $translation['_Combine_Theory_Title_']?></p> -->
								<p><?php echo $translation['moto_plan_desc_1']?></p>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 marg">
							<div class="service-content">
								<span class="icon"><i class="fa fa-motorcycle"></i></span>
								<h3><?php echo $translation['_Basic_motorcycle_Title_']?></h3>
								<!-- <p>
									<?php echo $translation['_in_categories_title_']?>
									
								</p>
								<p><?php echo $translation['_with_learning_title_']?>
								</p> -->
								<p><?php echo $translation['moto_plan_desc_2']?></p>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 marg">
							<div class="service-content">
								<span class="icon"><i class="fa fa-motorcycle"></i></span>
								<h3><?php echo $translation['_Motorcycle_Training_Title_']?></h3>
								<!-- <p><?php echo $translation['_Cornering_Right_Tehcnology_title_']?>
									
									
								</p>
								<p><?php echo $translation['_high_tech_and_know_how_ttile_']?></p> -->
								<p><?php echo $translation['moto_plan_desc_3']?></p>
							</div>
						</div>
					</div>
				</div>
            </section>
            <section class="motorcycle-cloth animatedParent" style="background: #fff;">
				<div class="container">
					<h3><?php echo $translation['_Test_requirments_title_']?></h3>
					<h4 style="margin-top: 20px; color: #e90616;"><?php echo $translation['_Clothing_title_']?></h4>
					<div class="arr-box animated bounceInLeft slow">
						<div class="table-item">
							<h5><?php echo $translation['_Category_A1_Title_']?></h5>
							<ul>
								<li><?php echo $translation['_Motorcycle_helmet_Title_']?></li>
								<li><?php echo $translation['_Motorcycle_gloves_Title_']?></li>
								<li><?php echo $translation['_robist_Jacket_trousers_title_']?></li>
								<li><?php echo $translation['_Motorbike_boots_ankle_title_']?></li>
							</ul>
							<p><?php echo $translation['clothing_category_desc_1']?>.</p>
						</div>
						<div class="table-item">
							<h5><?php echo $translation['_Category_A_A_Limited_Title_']?></h5>
							<ul>
								<li><?php echo $translation['_Motorcycle_helmet_Title_2']?></li>
								<li><?php echo $translation['_Motorcycle_gloves_Title_2']?></li>
								<li><?php echo $translation['_jacket_title_']?></li>
								<li><?php echo $translation['_pants_title_']?></li>
								<li><?php echo $translation['_Motorbike_boots_ankle_title_2']?></li>
							</ul>
							<p><?php echo $translation['clothing_category_desc_2']?>.</p>
						</div>
					</div>

					<h4 style="margin-top: 20px; color: #e90616;"><?php echo $translation['_Moto_Title_Categoty']?></h4>
					<div class="arr-box animated bounceInRight slow">
						<div class="table-item">
							<h5><?php echo $translation['_Vehicle_cat_title_']?></h5>
							<p><?php echo $translation['A-2_wheeled_title_']?></p>
						</div>
						<div class="table-item">
							<h5><?php echo $translation['_vehicle_cat_title_']?></h5>
							<p><?php echo $translation['_motorcycle_sidecar_title_']?></p>
						</div>
						<div class="table-item">
							<h5><?php echo $translation['_vehicle_category_A1_title_']?></h5>
							<p>
								<?php echo $translation['_two_wheel_motorcycle_title_']?>
							</p>
						</div>
					</div>
				</div>
            </section>
            <section class="rentbike">
				<div class="container">
					<div class="row animatedParent">
						<div class="col-md-9 animated bounceInLeft slow">
							<h3 style="margin-bottom: 10px;"><?php echo $translation['_Rent_motorcycle_title_']?></h3>
							<!-- <p><?php echo $translation['_own_motorcycle_yet_title_']?></p>
							<p><?php echo $translation['_reservation_request_title_']?></p> -->
							<pre><?php echo $translation['Rent_Motorcycle_desc']?></pre>
							
						</div>
						<div class="col-md-3 animated bounceInRight slow">
							<img src="images/Partner_Hauptlin.png" />
						</div>
					</div>
				</div>
            </section>
            <section class="animatedParent service-form-bot" style="background: #e90616;">
				<div class="container">
					<div class="row form-bokking animated growIn slow" style="padding-top: 0px;">
						<div class="col-md-9">
							<h3 style="margin-top: 0px; color: #fff;"><?php echo $translation['_boo_motorcycle_course_title_']?></h3>
							<p style="color: #fff;"><?php echo $translation['_esaily_book_motorcycle_course_title_']?></p>
						</div>
						<div class="col-md-3 btn-side-form"><a href="registration-form.php"><button type="submit" class="btn-primary book-on-red"><?php echo $translation['Moto_Book_course_Button']?></button></a></div>
					</div>
				</div>
            </section>
            <!--Services list-->
            <section class="trial-lesson animatedParent">
				<div class="container">
					<h2><?php echo $translation['request_trial_menu_page_title']?></h2>
					<form class="trial-less animated growIn slow"  method="post">
						<div class="form-group">
							<label for="name"><?php echo $translation['_Name_Title_']?></label>
							<input type="text" class="form-control" name="name" id="name" placeholder="<?php echo $translation['_Name_Title_']?>" />
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1"><?php echo $translation['_trial-email_title_']?></label>
							<input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $translation['_trial-email_title_']?>" />
						</div>
						<div class="form-group">
							<label for="DOB"><?php echo $translation['_trial_Date_Of_Birth_title_']?></label>
							<input type="date" class="form-control" id="DOB" placeholder="<?php echo $translation['_trial_Date_Of_Birth_title_']?>" name="dob" />
						</div>
						<div class="form-group">
							<label for="phone"><?php echo $translation['_Phone_title_']?></label>
							<input type="tel" class="form-control" id="number" maxlength="20"   name="phone_no" min="0" />
						</div>
						<div class="form-group">
							<label for="where-go"><?php echo $translation['_Please _select_Title_']?> </label>
                              <select name='trial_lesson' >
								<option value="" selected="selected"><?php echo $translation['Please_select_title']?></option>
								<?php $trial_lesson=get_trial_lesson_detail();
								foreach ($trial_lesson as $key => $value) {
									?>
									<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
								<?php }
								?>
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
							</select>
						</div>
						<div class="form-group">
							<label for="where-go"><?php echo $translation['_am_available_title_']?></label>
							<ul class="multi-select">

                               <li class="s-all"><input type="checkbox" class="checkall" id="select"/> <?php echo $translation['_Select_all_title_']?></li>
								<?php $trial_time_slot=get_trial_time_slot_detail();
								foreach ($trial_time_slot as $key => $value) { ?>
								 <li><input type="checkbox" class="s-ava" name="trial_time_slot[]"  value="<?php echo $value['id'];?>"/> <?php echo $value['result'].'('. $value['start_time'].'-'.$value['end_time'].')'?></li>
								 <?php
								 } ?>

								
							</ul>
						</div>
						<div class="form-group">
							<label for="where-go"><?php echo $translation['_select_day_title_']?></label>
							<ul class="multi-select select-day">

									<li><input type="checkbox" class="s-all1" id="select-all" /><?php echo $translation['_Select_all_title_']?></li> 
								<?php $trial_weekday=get_trial_weekday_detail();
								foreach ($trial_weekday as $key => $value){

								 ?>
								<li><input type="checkbox" class="s-ava1" name="trial_weekday[]" value="<?php echo $value['id'];?>"><?php echo $value['result'];?>
							</li>
						       <?php } ?>
								
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

<?php
include 'footer-new.php';
?>


<script>
	$('#select-all').change(function () {
    $('.s-ava1').prop('checked',this.checked);
});

$('.s-ava1').change(function () {
 if ($('.s-ava1:checked').length == $('.s-ava1').length){
  $('#select-all').prop('checked',true);
 }
 else {
  $('#select-all').prop('checked',false);
 }
});

	
	
	
	// For 2nd select all option
	
		$('#select').change(function () {
    $('.s-ava').prop('checked',this.checked);
});

$('.s-ava').change(function () {
 if ($('.s-ava:checked').length == $('.s-ava').length){
  $('#select').prop('checked',true);
 }
 else {
  $('#select').prop('checked',false);
 }
});

$('form.trial-less').on('submit',function(e){
// alert("dfsdg");
     e.preventDefault();  
        var formData = new FormData(this);
         console.log(formData);
          $.ajax({
            type: 'post',
            url: 'AddRequestTrial.php',
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