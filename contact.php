<?php include('header.php'); 


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
  <!--/Menu-->
<style type="text/css">
div#main
{
	padding-top:85px !important;
}
div#google_translate_element {
    display: none;
}
pre#pre {
    margin: 0;
    font-size: 18px;
    color: #86827F;
    line-height: 38px;
    font-weight: 400;
    font-family: 'Lato', sans-serif;
}
@media (max-width: 768px){
div#main {
    padding-top: 62px !important;
}
p.contact-information {
    margin-bottom:30px;
}
}
@media (min-width:768px) and (max-width:992px)
{
p.contact-information {
    font-size: 16px;
}

}
</style>
  <!--About-->
<section class="banner" id="about-box">
	<div class="container">
		<h2><?php echo $translation['contact_Title'];?></h2>
	</div>
</section>
<section class="addresses">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4">
				
					<pre id="pre"><?php  echo $translation['_Wettingen_title_'];?><br></pre>
				<p class="contact-information"> E-mail: <a href="mailto:info@fahrschule-star.ch" class="highlight"><strong><?php echo $translation['_info@fahrschule-star._title_1'];?></strong></a><br/>
					<?php echo $translation['_4156_title_'];?> <strong><a href="tel:056 611 99 77"><?php echo $translation['contact_no_1']; ?></a></strong>
				</p>
			</div>
			<div class="col-md-4 col-sm-4">
				
					<pre id="pre"><?php echo $translation['_Hauptlin_Ducati_title_'];?><br></pre>
			<p class="contact-information">
					E-mail: <a href="mailto:info@fahrschule-star.ch" class="highlight"><strong><?php echo $translation['_info@fahrschule-star._title_2'];?></strong></a><br/>
					<?php echo $translation['_telephone_title_'];?> <strong><a href="tel:056 611 99 77"><?php echo $translation['contact_no_2']; ?></a></strong><br/>
				</p>
			</div>
			<div class="col-md-4 col-sm-4">
				
					<pre id="pre"><?php echo $translation['_Zurich_title_'];?><br></pre>
					<p class="contact-information">
					E-mail: <a href="mailto:info@fahrschule-star.ch" class="highlight"><strong><?php echo $translation['_info@fahrschule-star._title_3'];?></strong></a><br/>
					<?php echo $translation['_telephone_title_'];?> <strong><a href="tel:044 611 99 77"><?php echo $translation['contact_no_3']; ?></a></strong><br/>
				</p>
			</div>
		</div>
	</div>
</section>
 <section class="contact-info">
      <div class="row no-margin row-same-height">     
  		<div class="col-md-12 no-padding col-full-height">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2697.0643738595736!2d8.316525915503064!3d47.469174979175726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47906cd100bcd627%3A0xd76602dda1ba1c1b!2sLandstrasse%2020%2C%205430%20Wettingen%2C%20Switzerland!5e0!3m2!1sen!2sin!4v1592831974614!5m2!1sen!2sin" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
       </div>  
      </div>
  </section> 
	<section class="contact-form" id="contact-sec">
		<div class="container">	
		  <div class="row no-margin animatedParent">
			<div class="col-md-5 col-sm-12 animated bounceInLeft slow">
				<!--Contact text wrapper-->
				<div class="contact-text-wrapper">
					<!--Contact text-->
					<div class="text contact-text">
						<h2><?php echo $translation['contact_sub_Title'];?></h2>
						<p><?php  echo $translation['text_contact_'];?><br/><br/></p>
						<p class="contact-information">
							E-mail: <a href="mailto:info@fahrschule-star.ch" class="highlight"><strong><?php echo $translation['_info@fahrschule-star._title_4'];?></strong></a><br/>
							<?php echo $translation['_telephone_title_'];?><strong><a href="tel:056 611 99 77"><?php echo $translation['contact_no_4']; ?></a></strong><br/>
							<?php echo $translation['_web_title_'];?> <a href="fahrschule-star.ch" class="highlight"><strong><?php echo $translation['_website_']; ?></strong></a>
						</p>
					</div>
					<!--/Contact text-->
				</div>
				<!--/Contact text wrapper-->                                 
			</div>
			
			<div class="col-md-7 col-sm-12 animated bounceInRight slow">
				<!-- Contact form -->
				<div class="form">
					<form id="contactform" method="POST" action="GetPhpData.php">
					   <div class="row">
						<div class="col-md-6 no-padding">
							<div class="col-md-12">
							  <input id="name" class="subfont" type="text" placeholder="<?php echo $translation['_Name_title_'];?>" name="name">
							</div>
							<div class="col-md-12">
							  <input id="email" class="subfont" type="email" placeholder="<?php echo $translation['_email_title_'];?>" name="email">
							</div>
							<div class="col-md-12">
							  <input id="subject" class="subfont" type="text" placeholder="Subject" name="<?php echo $translation['_Subject_Title_'] ?>">
							</div>
							<div class="col-md-12">
							  <input id="phone" class="subfont" type="text" placeholder="<?php echo $translation['_Phone_Number_Title_'];?>" name="phone">
							  <input id="type" class="subfont" type="hidden" value="contactus" placeholder="<?php echo $translation['_Phone_Number_Title_'];?>" name="type">
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<textarea id="message" class="subfont form-control" placeholder="<?php echo $translation['_Message_Title_'];?>" cols="40" name="message"></textarea>
						</div>               
					   </div>
					   
					   <div class="row">                
						<div class="col-md-12 col-xs-12">
						  <button id="contactus_submit" class="btn dark pull-right"><span><?php echo $translation['_Send_messages_title_'];?></span> <span class="icon-arrow"></span></button>
						</div>
					   </div>
					   
					   <div class="row">                
						<div class="col-md-12 col-xs-12">
						  <div class="notification"><span class="highlight"><i class="fa fa-check-circle"></i> </span></div>
						</div>
					   </div>                                  
				   </form>
			   </div>
			</div>
		  </div>
	  </div>
  </section> 
        
</div>
<!-- /Main content -->


<!--Footer-->
<?php include('footer.php'); ?>
