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
     // echo $translation['_change_Title_Privacy_']; die;
    ?> 
<style type="text/css">
 #privacy-policy {
    background: url(images/banner-priv.jpg);
    background-position: right;
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
<section class="banner" id="privacy-policy">
  <div class="container">                               
    <h2><?php echo $translation['_change_Title_Privacy_']?></h2>
  </div>
</section>
  <section class="team" style="padding-bottom:50px;">
  <div class="container">
      <div class="row no-margin main-cont-box">
      <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
      <div class="about-page-text">
        <h4 class="about-small"><?php echo $translation['_Privacy_desc_title_']?></h4>
        <p><?php echo $translation['_Privacy_Description_']?></p>
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
