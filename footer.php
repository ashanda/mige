 <?php 
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


 <div class="container">
<div class="row">
<div class="col-xs-12 col-md-8 col-sm-8">

</div>
</div>
</div>

<footer>
  
  <div class="container">   
    <div class="row">

      <div class="col-xs-12 col-md-8 col-sm-8">
           <p class="subfont"><?php echo $translation['Address_in_footer_page'];?>
      </div>
      <div class="col-xs-12 col-md-4 col-sm-4 footer-r-side">
        <button class="change-language" data-toggle="modal" data-target="#language-modal"><img src="<?=$config['base_url']?>/images/globe.png"> <span class="lang-text"><?php echo $translation['Image_title_footer'];?></span></button>
        <ul class="official-part">
          <li><b><?php echo $translation['Title_In_image_changes'];?>:</b> </li>
          <li class="offi"><a href="ducati-partner.php"><img src="<?=$config['base_url']?>/images/p-logo.png"></a></li>
        </ul>
    
  
  
      </div>

  
    </div>
  </div>
</footer>






<!-- Modal -->
<!-- <div class="modal fade show" id="language-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose a language</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <ul class="translation-links">
      <li class="active"><a href="#" class="english" data-lang="English">English</a></li>
      <li><a href="#" class="german" data-lang="German">German</a></li>
      <li><a href="#" class="spanish" data-lang="Spanish">Spanish</a></li>
    </ul>
    <div id="google_translate_element"></div>
      </div>
    </div>
  </div>
</div> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="<?=$config['base_url']?>/js/custom.js"></script>
<script type="text/javascript" src="<?=$config['base_url']?>/js/anim.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- js for cookie popup -->

<!-- <script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
  }
</script> -->
<!-- <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
 -->
<!-- Flag click handler -->
<!-- <script type="text/javascript">
    $('.translation-links a').click(function() {
      var lang = $(this).data('lang');
      var $frame = $('.goog-te-menu-frame:first');
      if (!$frame.size()) {
        alert("Error: Could not find Google translate frame.");
        return false;
      }
      $frame.contents().find('.goog-te-menu2-item span.text:contains('+lang+')').get(0).click();
      return false;
    });
</script> -->
<script>
$(".header-designed-2, .select_li, .creative-ce0o .mobile-lang").click(function(){
  $('body').toggleClass('disable-scroll');
  $(".slide-right-animation").toggleClass('slide_left_to_right');
  $(".header-designed-2").toggleClass('change');
});
$('a.german').click(function(){
    $('span.lang-text').text('German');
});
$('a.english').click(function(){
    $('span.lang-text').text('English');
}); 
$('a.spanish').click(function(){
    $('span.lang-text').text('Spanish');
}); 
</script>
    
<script src="//code.tidio.co/kv1vnt7x2umavhousd0xxop5ooq9leos.js" async></script>
<script type='text/javascript'>document.tidioChatCode = "kv1vnt7x2umavhousd0xxop5ooq9leos";
(function() {
  function asyncLoad() {
    var tidioScript = document.createElement("script");
    tidioScript.type = "text/javascript";
    tidioScript.async = true;
    tidioScript.src = "//code.tidio.co/kv1vnt7x2umavhousd0xxop5ooq9leos.js";
    document.body.appendChild(tidioScript);
  }
  if (window.attachEvent) {
    window.attachEvent("onload", asyncLoad);
  } else {
    window.addEventListener("load", asyncLoad, false);
  }
})();
</script>
</body>
</html>