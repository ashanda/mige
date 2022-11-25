<?php
include '../header.php';

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
                <img src="<?=$config['base_url']?>/images/team_new/<?=$translation['_Team1_photo_']?>" alt="" />
                <div class="hover-team-item">
                    <h3> <?php echo $translation['_Team1_Title_']?></h3>
                    <p>Mige, Entschuldigung, Captain Mige ist ein waschechter Seeräuber. Er sieht nicht nur aus wie ein Pirat, er spricht auch so. Dies liegt nicht daran, dass er einen Sprachfehler hat, sondern daran, dass er mehrere Sprachen spricht und diese immer wieder durcheinander bringst.
Wenn er nicht gerade in der Karibik auf Schatzsuche ist fährt er mit seiner Black Perl durchs Prüfungsgebiet und foltert seine Schüler.
</p>
                    <ul class="social">
                     <li><a href="tel:+41797886699"><i class="fa fa-phone"></i><span class="desk-mail">+41 79 788 66 99</span></a></li>
                      <li><a href="mailto:mige@fahrschule-star.ch"><i class="fa fa-envelope"></i><span class="desk-mail">mige@fahrschule-star.ch</span></a></li>
                    </ul>
                </div>                
            </div>
            <!--/Team item-->
            
            <!--Team item-->
            <div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
                <img src="<?=$config['base_url']?>/images/team_new/<?=$translation['_Team2_photo_']?>" alt="" />
               <div class="hover-team-item">
                    <h3> <?php echo $translation['_Team2_Title_']?></h3>
                    <p>Im Sommer rennt er vielfach im rosaroten Outfit über den Fussballplatz, und im Winter pflegt er seinen Bart, okay, eigentlich macht er das das ganze Jahr. Wenn er nicht gerade im Fitness oder mit Kosmetikprodukten beschäftigt ist, plant er kleine Attentate auf seine Schüler und treibt sie mit Messer und Machete und einer grossen Portion Humor zur Prüfung.
Und jaaaa, er ist der von TikTok/Instagram</p>
                     <ul class="social">
                     <li><a href="tel:+41796018888"><i class="fa fa-phone"></i><span class="desk-mail">+41 79 601 88 88</span></a></li>
                      <li><a href="mailto:mateen@fahrschule-star.ch"><i class="fa fa-envelope"></i><span class="desk-mail">mateen@fahrschule-star.ch</span></a></li>
                    </ul>
                   
                </div>                  
            </div>
            <!--/Team item-->
            
            <!--Team item-->
            <div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
                <img src="<?=$config['base_url']?>/images/team_new/<?=$translation['_Team3_photo_']?>" alt="" />
                <div class="hover-team-item">
                    <h3> Birol</h3>
                    <p> Ein Kanake der in Berlin lebte und in der Schweiz Fahrlehrer ist, was für eine kombination.
Warum Birol sich Bärol nennt habe etwas mit einem Bären zu tun, was genau wissen wir nicht vielleicht weil er genau so gefährlich ist?!
Für uns ist er eher zu vergleichen mit einer Pistazie (Zutat für Baklava) aussen hart innen sau lecker.</p>
                    <ul class="social">
                     <li><a href="tel:+41763445544"><i class="fa fa-phone"></i><span class="desk-mail">+41 76 344 55 44</span></a></li>
                      <li><a href="mailto:birol@fahrschule-star.ch"><i class="fa fa-envelope"></i><span class="desk-mail">birol@fahrschule-star.ch</span></a></li>
                    </ul>
                </div>                
            </div>
            <!--/Team item-->
            
            <!--Team item-->
            <div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
                <img src="<?=$config['base_url']?>/images/team_new/<?=$translation['_Team4_photo_']?>" alt="" />
                <div class="hover-team-item">
                    <h3> <?php echo $translation['_Team4_Title_']?></h3>
                    <p> Andi, der Auswanderer. Als es für ihn auf den Philippinen keine Herausforderungen mehr gab und er sich unter den Palmen an dem kristallklaren, türkisfarbenen Meer nur noch langweilte, kam er auf die grandiose Idee, in die Schweiz zurückzukehren, um hier zu arbeiten. Ja, wir dachten das Gleiche: Der Gestörte tauscht Paradies gegen, naja, dem Platz neben dir.</p>
                    <ul class="social">
                     <li><a href="tel:<+41784032387"><i class="fa fa-phone"></i><span class="desk-mail">+41 78 403 23 87</span></a></li>
                      <li><a href="mailto:andy@fahrschule-star.ch"><i class="fa fa-envelope"></i><span class="desk-mail">andy@fahrschule-star.ch</span></a></li>
                    </ul>
                </div>                   
            </div>
            <!--/Team item-->

            <div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
                <img src="<?=$config['base_url']?>/images/team_new/<?=$translation['_Team5_photo_']?>" alt="" />
              <div class="hover-team-item">
                    <h3> <?php echo $translation['_Team5_Title_']?></h3>
                    <p> Ja, Nidi ist sein Name. Wie es zu diesem Namen kam, weiss nicht mal er selbst. In seinem alten Beruf hat er etwas zu viel an den Pneus gerochen, ansonsten können wir es uns nicht erklären, warum er Fahrlehrer werden wollte.</p>
                     <ul class="social">
                     <li><a href="tel:+41762266944"><i class="fa fa-phone"></i><span class="desk-mail">+41 76 226 69 44</span></a></li>
                      <li><a href="mailto:nidi@fahrschule-star.ch"><i class="fa fa-envelope"></i><span class="desk-mail">nidi@fahrschule-star.ch</span></a></li>
                    </ul>
                </div>                    
            </div>
            
            <!-- <div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
                <img src="<?=$config['base_url']?>/images/team_new/<?=$translation['_Team6_photo_']?>" alt="" />
                <div class="hover-team-item">
                    <h3> <?php echo $translation['_Team6_Title_']?></h3>
                    <p> <?php echo $translation['_Team6_description_']?></p>
                    <ul class="social">
                     <li><a href="tel:<?=$translation['_Team6_phone_no_']?>"><i class="fa fa-phone"></i><span class="desk-mail"><?=$translation['_Team6_phone_no_']?></span></a></li>
                      <li><a href="mailto:<?=$translation['_Team6_email_']?>"><i class="fa fa-envelope"></i><span class="desk-mail"><?=$translation['_Team6_email_']?></span></a></li>
                    </ul>
                </div>                    
            </div> -->
            
            <div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
                <img src="<?=$config['base_url']?>/images/team_new/<?=$translation['_Team7_photo_']?>" alt="" />
              <div class="hover-team-item">
                    <h3> <?php echo $translation['_Team7_Title_']?></h3>
                    <p> Gianni sieht zwar aus wie ein Grizzlybär, doch eigentlich ist er eher ein Teddybär. Man kann ihn als «menschliche Leinwand» ansehen: Etwas Farbe da, etwas Farbe dort, da kann es schon mal passieren, dass ein paar Farbtupfer im Gesicht landen. Wenn du die Prüfung beim ersten Mal bestehst, darfst du bestimmt auch noch etwas Farbe anbringen.</p>
                    <ul class="social">
                     <li><a href="tel:+41793802929"><i class="fa fa-phone"></i><span class="desk-mail">+41 79 380 29 29</span></a></li>
                      <li><a href="mailto:gianni@fahrschule-star.ch"><i class="fa fa-envelope"></i><span class="desk-mail">gianni@fahrschule-star.ch</span></a></li>
                    </ul>
                </div>                  
            </div>
            
            <div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
                <img src="<?=$config['base_url']?>/images/team_new/<?=$translation['_Team8_photo_']?>" alt="" />
               <div class="hover-team-item">
                    <h3> <?php echo $translation['_Team8_Title_']?></h3>
                    <p> Frankydundee lebte einige Zeit im Busch, und wenn er nicht gerade von Schlangen gebissen oder von Krokodilen gejagt wird, reitet er auf seinem Motorrad durch den wilden Aargau oder bringt seine Autofahrschüler anhand abenteuerlicher Beispiele rasch durch die Prüfung.</p>
                    <ul class="social">
                     <li><a href="tel:+41798552866"><i class="fa fa-phone"></i><span class="desk-mail">+41 79 855 28 66</span></a></li>
                      <li><a href="mailto:franky@fahrschule-star.ch"><i class="fa fa-envelope"></i><span class="desk-mail">franky@fahrschule-star.ch</span></a></li>
                    </ul>
                </div>                   
            </div>
            
            <div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
                <img src="<?=$config['base_url']?>/images/team_new/<?=$translation['_Team9_photo_']?>" alt="" />
               <div class="hover-team-item">
                    <h3> <?php echo $translation['_Team9_Title_']?></h3>
                    <p> Sie wollten ihn nicht mehr in Deutschland, da kam er halt in die Schweiz. Wenn es für das Deutschsein im Duden ein Foto gäbe, wäre es bestimmt Michaels Porträt. Korrekt, pünktlich, genau – wie wir Schweizer es mögen. Doch wie sagt man noch so schön: Der Weg ist das Ziel</p>
                    <ul class="social">
                     <li><a href="tel:+41792895104"><i class="fa fa-phone"></i><span class="desk-mail">+41 79 289 51 04</span></a></li>
                      <li><a href="mailto:michael@fahrschule-star.ch"><i class="fa fa-envelope"></i><span class="desk-mail">michael@fahrschule-star.ch</span></a></li>
                    </ul>
                </div>                  
            </div>
            <!-- <div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
                <img src="<?=$config['base_url']?>/images/team_new/<?=$translation['_Team10_photo_']?>" alt="" />
                <div class="hover-team-item">
                    <h3> <?php echo $translation['_Team10_Title_']?></h3>
                    <p> <?php echo $translation['_Team10_description_']?></p>
                    <ul class="social">
                     <li><a href="tel:<?=$translation['_Team10_phone_no_']?>"><i class="fa fa-phone"></i><span class="desk-mail"><?=$translation['_Team10_phone_no_']?></span></a></li>
                      <li><a href="mailto:<?=$translation['_Team10_email_']?>"><i class="fa fa-envelope"></i><span class="desk-mail"><?=$translation['_Team10_email_']?></span></a></li>
                    </ul>
                </div>                 
            </div> -->

             <div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
              <img src="<?=$config['base_url']?>/images/team_new/<?=$translation['_Team11_photo_']?>" alt="" />
               <div class="hover-team-item">
                    <h3> <?php echo $translation['_Team11_Title_']?></h3>
                    <p> Fro, Furkan, ja wie denn nun?! Ach komm ... «Der Türke» war im früheren Leben Fitnessinstruktor. Jetzt nervt er hier rum und verkauft uns Proteinshakes und gesunde Sachen. Ich weiss nicht, was der will, aber das passt nicht zum Fahrlehrersein - wir sind faul und dick.</p>
                    <ul class="social">
                     <li><a href="tel:+41768305516"><i class="fa fa-phone"></i><span class="desk-mail">+41 76 830 55 16</span></a></li>
                      <li><a href="mailto:fro@fahrschule-star.ch"><i class="fa fa-envelope"></i><span class="desk-mail">fro@fahrschule-star.ch</span></a></li>
                    </ul>
                </div>                   
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
                <img src="<?=$config['base_url']?>/images/team_new/<?=$translation['_Team12_photo_']?>" alt="" />
                <div class="hover-team-item">
                    <h3> <?php echo $translation['_Team12_Title_']?></h3>
                    <p> Wenn er nicht gerade im Bentley durch die Normandie fährt und Louis Vuitton Taschen verkauft dann hängt er in seinem viel zu engem Spiderman-Kostüm am Eifelturm.
Wärend den Fahrstunden jagt er seine Schüler mit dem Baguette durch den Verkehr und singt auf seiner albanischen Ukulele „ale le bleu“</p>
                    <ul class="social">
                     <li><a href="tel:+41791018080"><i class="fa fa-phone"></i><span class="desk-mail">+41 79 101 80 80</span></a></li>
                      <li><a href="mailto:joel@fahrschule-star.ch"><i class="fa fa-envelope"></i><span class="desk-mail">joel@fahrschule-star.ch</span></a></li>
                    </ul>
                </div>                 
            </div>

             <div class="col-md-4 col-sm-6 col-xs-12 no-padding team-item">
              <img src="<?=$config['base_url']?>/images/team_new/<?=$translation['_Team13_photo_']?>" alt="" />
               <div class="hover-team-item">
                    <h3> <?php echo $translation['_Team13_Title_']?></h3>
                    <p> Spieglein Spieglein an der Wand, wer ist die schönste Fahrlehrerin im ganzen Land? Tettin vo Prishtin 👐🏼
Nach der Misswahl zur Miss Prishtina wechselte sie ihren job und wurde Käserin oder so etwas in der Art.
Kurzes kleid, high heels und roter lippenstift, Bei ihr weiss man nie ob sie gerade am arbeiten ist oder an eine Modenshow geht.
Bei Ihr bist du auf der sicheren Seite, denn kein Experte kann „nein“ zu tettina sagen</p>
                    <ul class="social">
                     <li><a href="tel:+41796470518"><i class="fa fa-phone"></i><span class="desk-mail">+41 79 647 05 18</span></a></li>
                      <li><a href="mailto:tettina@fahrschule-star.ch"><i class="fa fa-envelope"></i><span class="desk-mail">tettina@fahrschule-star.ch</span></a></li>
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
include '../footer-new.php';
?> 
