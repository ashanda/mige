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
</style>
  <!--About-->
<section class="banner" id="process-image">
  <div class="container">
    <h2><?php echo $translation['_Our_process_Title_']?></h2>
  </div>
</section> 
<section class="team" style="padding-bottom:50px;">
  <div class="container">
      <div class="row no-margin main-cont-box">
      <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
       <div class="">
        <p><?php echo $translation['_driving_school_title_']?></p>
      </div>
        </div>
   </div>
  </div>
    <section class="services-list" id="serv-list">
    <div class="container">
    <div class="row">

          <!--Service-->
          <div class="col-md-4 col-sm-6 col-xs-12 service-content">
      <div class="process-item">
                <span class="icon"><i class="fa fa-medkit"></i></span>
                <h3><?php echo $translation['First_Aid_Course_Title_']?></h3>
                <p><?php echo $translation['_Requirement_learning_title_']?></p>
        <a href="registration-form.php" class="form-book-now"><?php echo $translation['button_1']?></a>
      </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 service-content">
      <div class="process-item">
              <span class="icon"><i class="fa fa-camera-retro"></i></span>
                <h3><?php echo $translation['_Learning_driving_license_title_']?></h3>
                <p><?php echo $translation['_download_forms_title_']?></p>    
        <a href="registration-form.php" class="form-book-now"><?php echo $translation['button_2']?></a>
      </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 service-content">
      <div class="process-item">
                <span class="icon"><i class="fa fa-leanpub"></i></span>
                <h3><?php echo $translation['_Trial_lesson_title_']?></h3>
                <p><?php echo $translation['_Arrange_trial_lesson_title_']?></p>   
        <a href="request-trial.php" class="form-book-now"><?php echo $translation['button_3']?></a>
      </div>
          </div>
          <!--/Service-->
      <div class="col-md-4 col-sm-6 col-xs-12 service-content">
      <div class="process-item">
                <span class="icon"><i class="fa fa-medkit"></i></span>
                <h3><?php echo $translation['process_page_vku']?></h3>
                <p><?php echo $translation['_Double_lessons_accompany_title_']?></p>
        <a href="registration-form.php" class="form-book-now"><?php echo $translation['button_4']?></a>
      </div>
          </div>
      
      <div class="col-md-4 col-sm-6 col-xs-12 service-content">
      <div class="process-item">
                <span class="icon"><i class="fa fa-medkit"></i></span>
                <h3><?php echo $translation['_Driving_Lessons_title_']?></h3>
                <p><?php echo $translation['_driving_schoo;_agrgur_title_']?></p>
        <a href="registration-form.php" class="form-book-now"><?php echo $translation['button_5']?></a>
      </div>
          </div>
      
      <div class="col-md-4 col-sm-6 col-xs-12 service-content">
      <div class="process-item">
                <span class="icon"><i class="fa fa-medkit"></i></span>
                <h3><?php echo $translation['process_course_title']?> </h3>
                <p><?php echo $translation['_advanced_training_title_']?></p>
        <a href="registration-form.php" class="form-book-now"><?php echo $translation['button_6']?></a>
      </div>
          </div>
     </div>
     </div>
  </section> 
</section>       
</div>
<?php include 'footer-new.php'; ?>