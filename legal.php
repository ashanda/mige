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
    background: url(images/banner-legal.jpg);
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
    <h2><?php echo $translation['_legal_page_title_']?></h2>
  </div>
</section>
  <section class="team" style="padding-bottom:50px;">
  <div class="container">
      <div class="row no-margin main-cont-box">
      <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
      <div class="about-page-text">
        <h4 class="about-small"><?php echo $translation['_legal_page_title_label_']?></h4>
        <ul class="address">
            <li><?php echo $translation['_legal_page_address_label_']?>
            </li>
            <li><?php echo $translation['_legal_page_phone_']?></li>
            <li><?php echo $translation['_legal_page_email_']?></li>
            <li><?php echo $translation['_legal_page_texts_']?></li>
        </ul>
        <hr>
        <h4 class="about-small"><?php echo $translation['_legal_page_title2_']?></h4>
        <h6><?php echo $translation['_legal_page_title5_']?></h6>
        <p><?php echo $translation['_legal_page_address2_']?></p>
        <hr>
        <h4 class="about-small"><?php echo $translation['_legal_page_title3_']?></h4>
        <p><?php echo $translation['_legal_page_description3_']?></p>
        <hr>
        <h4 class="about-small"><?php echo $translation['_legal_page_title4_']?></h4>
        <p><?php echo $translation['_legal_page_description4_']?></p>
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
