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
  #legal-page {
    background: url(images/banner-terms.jpg);
    background-position:right;

}
  .address li {
    list-style-type: none;
    margin: 0;
    font-size: 18px;
    color: #86827F;
    line-height: 29px;
    font-weight: 400;
    font-family: 'Lato', sans-serif;
}
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
<section class="banner" id="legal-page">
  <div class="container">                               
    <h2><?php echo $translation['term_and_condition_heading_title']; ?></h2>
  </div>
</section>
  <section class="team" style="padding-bottom:50px;">
  <div class="container">
      <div class="row no-margin main-cont-box">
      <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
      <div class="about-page-text">
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_1']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_1']; ?></p>
        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_2']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_2']; ?></p>
        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_3']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_3']; ?></p>

         <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_4']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_4']; ?></p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_5']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_5']; ?></p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_6']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_6']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_7']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_7']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_8']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_8']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_9']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_9']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_10']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_10']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_11']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_11']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_12']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_12']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_13']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_13']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_14']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_14']; ?> 
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_15']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_15']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_16']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_16']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_17']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_17']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_18']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_18']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_19']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_19']; ?>

        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_20']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_20']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_21']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_21']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_22']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_22']; ?>
        </p>

         <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_23']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_23']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_24']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_24']; ?></p>
          
      

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_25']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_25']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_26']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_26']; ?>
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_27']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_27']; ?>. 
        </p>

        <hr>
        <h4 class="about-small"><?php echo $translation['term_and_condition_title_28']; ?></h4>
        <p><?php echo $translation['term_and_condition_description_28']; ?>
        </p>

      </div>
    </div>
   </div>
  </div>
</section>        
</div>
<!-- /Main content -->
<?php
include 'footer.php';
?> 
