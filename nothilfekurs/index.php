<?php include '../header.php';


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
				@media (max-width: 768px){
				div#main {
					padding-top: 62px !important;
				}
				}
				</style>
            <!--About-->
            <section class="banner" id="first-aid-box">
                <div class="container"><h2><?php echo $translation['_First_Aid_Title_']?></h2></div>
            </section>
            <section class="team" style="padding-bottom: 50px; background:#f2f2f2;">
                <div class="container">
                    <div class="row main-cont-box">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="about-page-text">
                                <h4 class="about-small" style="color:#e90616;"><?php echo $translation['_First_Aid_Course_Aargau_Title_']?></h4>
                                <p><?php echo $translation['We_offer_the_first_aid_title_']?></p>
                                <p><?php echo $translation['_Study_Show_Over_title_']?></p>
                                <p><?php echo $translation['_Aid_course_prerequisite_title_']?></p> 
								
								<!-- <pre><?php echo $translation['_First_Aid_Page_banner_desc']?></pre> -->
                            </div>
							<div class="service-video animatedParent">
								<iframe class="animated fadeInLeft slow go" src="https://www.youtube.com/embed/uLESrpuNsIs?autoplay=1&amp;feature=oembed" width="100%" height="550px" frameborder="0" allowfullscreen="1" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"></iframe>
							</div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="course-video">
				<div class="container">
					<div class="row animatedParent">
						<div class="col-md-7 text-side-mobile-img animated bounceInLeft slow">
							<p><?php echo $translation['_first_aid_dusty_first_aid_course_Title_']?></p>
							<p>
								<?php echo $translation['_first_aid_learn_how_to_provide_title_']?>
							</p>
							<p><?php echo $translation['first_aid_we_Say_title_']?></p>
							<p><?php echo $translation['_first_aid_if_you_taking_course_title_']?></p>
							<p style="margin-top: 20px; margin-bottom: 20px;">
								<img src="<?=$config['base_url']?>/images/appstore_logo.png" /> 
								<img src="<?=$config['base_url']?>/images/google-play-store-logo.png" />
							</p>
							<p>
							<?php echo $translation['_first_aid_page_Important_Title_']?>  <a href="#"><b>info@ucademy.ch</b></a>
							</p>  
							<!-- <pre><?php echo $translation['First_Aid_Page_image_content']?></pre>
							 <p><?php echo $translation['_First_Aid_Page_video_desc']?></p> -->
						<!-- <pre>ghfvbuygnihbutfgynhmupoinytfgyui</pre> -->
						</div>
						<div class="col-md-5 phone-image animated bounceInRight slow">
							<img src="<?=$config['base_url']?>/images/ucademy-3D-animation-low.gif" />
						</div>
					</div>
				</div>
            </section>
            <section class="animatedParent service-form-bot" style="background: #e90616;">
				<div class="container">
					<img class="animated bounceInLeft slow" src="<?=$config['base_url']?>/images/uss-img.png" style="width: 100%;" />
					<div class="row form-bokking animated bounceInRight slow">
						<div class="col-md-9">
							<h3 style="margin-top: 30px; color: #fff;"><?php echo $translation['_first_aid_course_online_Title_']?></h3>
							<p style="color: #fff;"><?php echo $translation['_first_aid_easily_online_title_']?></p>
						</div>
						<div class="col-md-3 btn-side-form"><a href="<?=$config['base_url']?>/book"><button type="submit" class="btn-primary book-on-red"><?php echo $translation['First_Aid_Page_Submit_Button']?></button></a></div>
					</div>
				</div>
            </section>
            <!--Services list-->
        </div>
        <!-- /Main content -->

<?php
include '../footer-new.php';
?>