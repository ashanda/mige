<?php
include '../header.php';
// include 'index_v2.php';

include '../Config/Connection.php';


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
.pricing-plan .plan-button a {
	background: #e90616 !important;
	color: #ffffff !important;
}
.pricing-plan .plan-button a:hover{
	color:#000 !important;
}
.pricing-plan .plan-button a {
	background: #e90616;
	color: #fff;
}
@media (max-width: 768px){
div#main {
    padding-top: 62px !important;
}
}
</style>
  <!--About-->
<section class="banner" id="pricing-image">
	<div class="container">
		<h2><?php echo $translation['_Pricing_Plan_title_']?></h2>
	</div>
</section>
  <!--/About--> 
<section class="team" style="padding-bottom:50px;">
	<div class="container">
      <div class="row no-margin main-cont-box">
  		<div class="col-md-12 col-sm-12 col-xs-12 no-padding">
		   <div class="">
				<h4 class="about-small" style="color:#e90616;"><?php echo $translation['drive_today_pay_title_']?></h4>
                <h2><?php echo $translation['_pay_comfortably_title_']?></h2>
				<!-- <p><?php echo $translation['_ almost_mandatory_title_']?>
				<br><?php echo $translation['_financial_situation_title_']?></p>
				<p><b><?php echo $translation['_offer_fair_title_']?></b></p>
				<p><?php echo $translation['Request_driving_lessons_online_title_ ']?></p>
				<p><b><?php echo $translation['_Lesson_prices_title_']?></b></p> -->
				<p><?php echo $translation['pricing_plan_desc']?></p>
			</div>
            <!--/Team text-->
        </div>
	 </div>
	</div>
	<section id="pricing-plan" class="animatedParent pricing-page-plan">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="pricing-plan box-shadow">
						<div class="plan-name">
							<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_prices_car_title_']?></font></font></h3>
						</div>
						<div class="price-wrap color-main">
							<span class="plan-price"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['plan_card_desc_1']?></font></font></span>
						</div>
						<div class="plan-features">
							<ul class="list-styled-caret">
								<li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_Individual_title_']?></font></font></li>
								<li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_Double_lesson_title_']?></font></font></li>
								<li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_Subscription_title_']?></font></font></li>
								<li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_20_subscription_title_']?></font></font></li>
							</ul>
						</div>
						<div class="plan-button">
							<a href="<?=$config['base_url']?>/fahrlektionen" class="btn btn-outline-darkgrey"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['plan_button_1']?></font></font></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

					<div class="pricing-plan box-shadow">
						<div class="plan-name">
							<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_price_control_title_']?></font></font></h3>
						</div>
						<div class="price-wrap color-main">
							<span class="plan-price"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['plan_card_desc_2']?></font></font></span>
						</div>
						<div class="plan-features">
							<ul class="list-styled-caret">
								<li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_Individual_lesson_title_']?></font></font></li>
								<li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_Double_lesson_CHF_170_titlte_']?></font></font></li>
								<li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_Subscription_CHF-800_title_']?></font></font></li>
								<li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_Subscription_CHF-1500_title_']?></font></font></li>
							</ul>
						</div>
						<div class="plan-button">
							<a href="<?=$config['base_url']?>/fahrlektionen" class="btn btn-outline-darkgrey"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['plan_button_2']?></font></font></a>
						</div>
					</div>

				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

					<div class="pricing-plan box-shadow">
						<div class="plan-name">
							<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_PRICE_ MOTORCYCLE_title_']?></font></font></h3>
						</div>
						<div class="price-wrap color-main">
							<span class="plan-price"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['plan_card_desc_3']?></font></font></span>
						</div>
						<div class="plan-features">
							<ul class="list-styled-caret">
								<li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_Cat_Driving_lesson_45min_title_']?></font></font></li>
								<li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_Cat_Driving_lesson_60min_title_']?></font></font></li>
								<li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_A1_driving_lesson_45min_CHE70_title_']?></font></font></li>
								<li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_cat_test_drive_60min_CHE90_title_']?></font></font></li>
								<li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_basic_motorcycle_course_Per_Cours_title_']?></font></font></li>
							</ul>
						</div>
						<div class="plan-button">
							<a href="<?=$config['base_url']?>/fahrlektionen" class="btn btn-outline-darkgrey"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['plan_button_3']?></font></font></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="pricing-plan box-shadow">
						<div class="plan-name">
							<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_Preise_auto_title_']?></font></font></h3>
						</div>
						<div class="price-wrap color-main">
							<span class="plan-price"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_social_MEDIA_title_']?></font></font></span>
						</div>
						<div class="plan-features">
							<ul class="list-styled-caret">
								<li><?php echo $translation['_Individual_lesson_CHF80_title_']?></li>
								<li><?php echo $translation['_Double_lesson_CHF_160_titlte_']?></li>
								<li><?php echo $translation['_10_subscription_CHF -75._title_']?></li>
								<li><?php echo $translation['_Subscription_CHF-1400_title_']?></li>
								<p><?php echo $translation['_Before_after_lesson_title_']?></p>
							</ul>
						</div>
						<div class="plan-button">
							<a href="<?=$config['base_url']?>/book" class="btn btn-outline-darkgrey"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['plan_button_4']?></font></font></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="pricing-plan box-shadow">
						<div class="plan-name">
							<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_price_emergency_course_title_']?></font></font></h3>
						</div>
						<div class="price-wrap color-main">
							<span class="plan-price"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['plan_card_desc_5']?></font></font></span>
						</div>
						<div class="plan-features">
							<ul class="list-styled-caret">
								<p><?php echo $translation['_we_ooffer_first_title_']?>.</p>
							</ul>
						</div>
						<div class="plan-button">
							<a href="<?=$config['base_url']?>/book" class="btn btn-outline-darkgrey"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['plan_button_5']?></font></font></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="pricing-plan box-shadow">
						<div class="plan-name">
							<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['_price_travel_title_']?></font></font></h3>
						</div>
						<div class="price-wrap color-main">
							<span class="plan-price"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['plan_card_desc_6']?> </font></font></span>
						</div>
						<div class="plan-features">
							<ul class="list-styled-caret">
								<p><?php echo $translation['_Traffic_in_the_Baden_title_']?></p>
							</ul>
						</div>
						<div class="plan-button">
							<a href="<?=$config['base_url']?>/book" class="btn btn-outline-darkgrey"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $translation['plan_button_6']?></font></font></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> 
</section>  
</div>
<?php include '../footer-new.php';?>