<style>
   .new-footer {
    background: #2f2e2e;
    padding: 2rem;
    color: #fff;
    
  }
    .nav-title {
    font-size: 21px;
    margin-bottom: 1rem;
    font-weight: 500;
  }
.new-footer a {
    color: #fffefe;
}
div#footer-bottom {
    color: #000;
    padding: 10px 0;
    text-align: center;
}
div#footer-bottom a {
    color: #e90616;
    font-weight: 500;
}
.image-block img {
    height: 82px;
    width: 87px;
    object-fit: contain;
}
.new-footer a:hover , div#footer-bottom a:hover{
    color: #e51e23;
}
@media screen and (max-width: 768px) {
  .image-block img {
      height: 70px;
      width: 70px;
  }
  div#copyright {
    line-height: 18px;
    font-size: 14px;
}
  .nav-title {
      font-size: 19px;
      margin-bottom: 8px;
      margin-top: 10px;
  }

}
</style>
<section>
<div class="new-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 mb-2">
                <div class="nav-ffoter-links">
                <div class="nav-title">Unser Angebot</div>
                <ul  class="menu-new-footer">
                    <li class="menu-item"><a href="<?=$config['base_url']?>/about/">Fahrschule</a></li>
                    <li class="menu-item "><a href="<?=$config['base_url']?>/nothilfekurs">Nothelferkurs (NHK)</a></li>
                    <li class="menu-item "><a href="<?=$config['base_url']?>/verkehrskundeunterricht">Verkehrskundeunterricht (VKU)</a></li>
                    <li class="menu-item "><a href="<?=$config['base_url']?>/grundkurs">Motorrad</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-4 col-sm-12 mb-2">  
               <div class="nav-title">Offizielle Partner</div>
                <div class="image-block">
                    <p><a href="/ducati-partner.php">
                      <img loading="lazy" class="alignnone wp-image-7164" src="<?=$config['base_url']?>/images/ducati-logo.png" alt="" /></a>
                      <a href="#">
                      <img loading="lazy" class="alignright wp-image-7789" src="<?=$config['base_url']?>/images/mobility_logo.png" alt="" width="100px" height="100px" />
                    </a>
                  </p> 
              </div>
            </div>
            <div class="col-md-4 col-sm-12 mb-2">
             <div class="nav-title">Folge uns!</div>
                <div class="wpex-fa-social-widget clr textleft">
                  <div style="font-size:26px; display: flex; ">
                    <div><a href="https://www.facebook.com/starfahrschule/" title="Facebook" class=" " target="_blank" ><i class="fa fa-facebook" aria-hidden="true"></i>
                    </div>
                    <div><a href="https://www.instagram.com/fahrschulestar.ch" title="Instagram" class=" " target="_blank"><i class="fa fa-instagram" aria-hidden="true" style="margin-left: 20px; "></i> </a>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div id="footer-bottom" class="clr textcenter">
  <div class="container">   
    <div id="copyright" class="clr">
        Copyright 2020 - Alle Rechte vorbehalten von Fahrschule Star |<a href="<?=$config['base_url']?>/terms-condition.php"> AGB </a>|<a href="<?=$config['base_url']?>/legal.php"> Impressum</a> |<a href="<?=$config['base_url']?>/privacy.php"> Datenschutz</a> | </div><!-- #copyright -->
       <!--  <div id="footer-bottom-menu" class="clr"><div class="menu-footer-container">
          <ul id="menu-footer" class="menu">
              <li id="menu-item-4711" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4711"><a href="https://www.fahrschule-star.ch/news/">News</a></li>
              <li id="menu-item-4712" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4712"><a href="https://www.fahrschule-star.ch/shop/">Shop</a></li>
            </ul>
        </div>
      </div> -->

      <!-- #footer-bottom-menu -->
    </div><!-- #footer-bottom-inner -->
</div><!-- #footer-bottom -->
</section>
<!-----------scripts-------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="<?=$config['base_url']?>/js/custom.js"></script>
<script type="text/javascript" src="<?=$config['base_url']?>/js/anim.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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

