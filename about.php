<?php
include 'header.php';

include 'Config/Connection.php';


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
</style>
<section class="banner" id="about-box">
	<div class="container">
		<h2><?php echo $translation['_About_us_Title_']?></h2>
	</div>
</section>
  
  <!--Our team-->
  <section class="team" style="padding-bottom:50px;">
	<div class="container">
      <div class="row no-margin main-cont-box">
  		<div class="col-md-12 col-sm-12 col-xs-12 no-padding">
			<div class="about-page-text">
				<h4 class="about-small"> <?php echo $translation['_super_Driving_instructor_title_']?></h4>
				<p> <?php echo $translation['_Star_driving_School_Title']?></p>	
			</div>
		   <div class="animated">
                <h2> <?php echo $translation['Our_ Creative _Team_title_']?></h2>
                <p> <?php echo $translation['_Lorem_ipsum_dolor_Title_']?></p>
            </div>
            <!--/Team text-->
        </div>
	 </div>
     <div class="row no-margin animatedParent">          
  		<div class="col-md-12 col-sm-12 col-xs-12 no-padding animated growIn slow">
            <!--Team item-->
			<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
            	<img src="images/team_new/IMG_2247.jpg" alt="" />
                <div class="hover-team-item">
                	<h3> <?php echo $translation['_MIGE_Title_']?></h3>
                    <p> <?php echo $translation['_BlackPearl_Seas_Title_']?></p>
                    <ul class="social">
                      <li><a href="#"><i class="fa fa-phone"></i></a></li>
                      <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>                
            </div>
            <!--/Team item-->
            
            <!--Team item-->
			<div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
            	<img src="images/team_new/IMG_2248.jpg" alt="" />
                <div class="hover-team-item">
                	<h3> <?php echo $translation['_GIANNI_Title_']?></h3>
                    <p> <?php echo $translation['_Dwayne_The_Rock_Johnson_Title']?></p>
                    <ul class="social">
                      <li><a href="#"><i class="fa fa-phone"></i></a></li>
                      <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>                
            </div>
            <!--/Team item-->
            
            <!--Team item-->
			<div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
            	<img src="images/team_new/IMG_2250.jpg" alt="" />
                <div class="hover-team-item">
                	<h3> <?php echo $translation['_FRANKY_Title_']?></h3>
                    <p> <?php echo $translation['_Frankydundee_lives_Title_']?></p>
                    <ul class="social">
                      <li><a href="#"><i class="fa fa-phone"></i></a></li>
                      <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>                
            </div>
            <!--/Team item-->
            
            <!--Team item-->
			<div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
            	<img src="images/team_new/IMG_2251.jpg" alt="" />
                <div class="hover-team-item">
                	<h3> <?php echo $translation['_MATEEN_Title_']?></h3>
                    <p> <?php echo $translation['_around_the_football_Title_']?></p>
                    <ul class="social">
                      <li><a href="#"><i class="fa fa-phone"></i></a></li>
                      <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>                  
            </div>
            <!--/Team item-->

			<div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
            	<img src="images/team_new/IMG_2252.jpg" alt="" />
                <div class="hover-team-item">
                	<h3> <?php echo $translation['_NIDI_Title_']?></h3>
                    <p> <?php echo $translation['_Nidi_Name_Title_']?></p>
                    <ul class="social">
                      <li><a href="#"><i class="fa fa-phone"></i></a></li>
                      <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>                  
            </div>
			
			<div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
            	<img src="images/team_new/IMG_2253.jpg" alt="" />
                <div class="hover-team-item">
                	<h3> <?php echo $translation['_ANDREA_Title_']?></h3>
                    <p> <?php echo $translation['_Andrea_Electrifying_Title_']?></p>
                    <ul class="social">
                      <li><a href="#"><i class="fa fa-phone"></i></a></li>
                      <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>                  
            </div>
			
			<div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
            	<img src="images/team_new/IMG_2254.jpg" alt="" />
                <div class="hover-team-item">
                	<h3> <?php echo $translation['_BAROL_Title_']?></h3>
                    <p> <?php echo $translation['_Birol_Ake_Barol_Title_']?> </p>
                    <ul class="social">
                      <li><a href="#"><i class="fa fa-phone"></i></a></li>
                      <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>                  
            </div>
			
			<div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
            	<img src="images/team_new/IMG_2255.jpg" alt="" />
                <div class="hover-team-item">
                	<h3> <?php echo $translation['_DESIREE_Title_']?></h3>
                    <p> <?php echo $translation['_Open_Collegial_Outgoing_Title_']?></p>
                    <ul class="social">
                      <li><a href="#"><i class="fa fa-phone"></i></a></li>
                      <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>                  
            </div>
			
			<div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
            	<img src="images/team_new/IMG_2311.jpg" alt="" />
                <div class="hover-team-item">
                	<h3> <?php echo $translation['_MATEEN_two_Title_']?></h3>
                    <p> <?php echo $translation['_fitness_cosmetic_products_Title_']?></p>
                    <ul class="social">
                      <li><a href="#"><i class="fa fa-phone"></i></a></li>
                      <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>                  
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
            	<img src="images/team_new/IMG1.jpeg" alt="" />
                <div class="hover-team-item">
                	<h3> <?php echo $translation['_Roman_Title_']?></h3>
                    <p> <?php echo $translation['_fitness_two_cosmetic_products_Title_']?></p>
                    <ul class="social">
                      <li><a href="#"><i class="fa fa-phone"></i></a></li>
                      <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>                  
            </div>

             <div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
              <img src="images/team_new/IMG.jpeg" alt="" />
                <div class="hover-team-item">
                  <h3> <?php echo $translation['_Roman_two_Title_']?></h3>
                    <p> <?php echo $translation['_fitness_three_cosmetic_products_Title_']?></p>
                    <ul class="social">
                      <li><a href="#"><i class="fa fa-phone"></i></a></li>
                      <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>                  
            </div>

        </div>
        </div>
      </div>
	  </div>
  </section> 
  <!--/Our team-->
         
</div>
<!-- /Main content -->


<?php
include 'footer-new.php';
?> 
