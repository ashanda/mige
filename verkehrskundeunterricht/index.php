<?php include '../header.php';
include '../index_v2.php';

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
                .book-on-blue {
                    background: #e90616;
                    border: none;
                    border-radius: 40px;
                    width: 200px;
                    height: 40px;
                    line-height: 32px;
                    color: #fff;
                    border: 1px solid #e90616;
                }
                .book-on-blue:hover {
                    background: #fff;
                    color: #e90616;
                }
                pre {
                    white-space: initial;
                    line-height: normal;
                    margin: 9px;
                    font-size: 15px;
                    font-family: 'Lato', sans-serif;
                    color: #86827F;
                    font-weight: 500;
                }
                .col-md-3.btn-side-form {
                margin-top: 2rem;
                margin-bottom: ;
            }
            </style>
            <!--About-->
            <section class="banner" id="vku-box">
                <div class="container"><h2><?php echo $translation['_traffic_vku_title_']?></h2></div>
            </section>
            <section class="team animatedParent" style="padding-bottom: 50px; background: #f2f2f2;">
                <div class="container">
                    <div class="row main-cont-box">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="about-page-text">
                                 <h4 class="about-small" style="color: #e90616;"><?php echo $translation['_Traffic_Customer_Education_Title_']?></h4> 
                                <!-- <pre>
                                    <?php echo $translation['Vku_page_desc']?>
                                    
                                </pre> -->
                               <p><?php echo $translation['_Compulsory_Traffic_Science_Title_']?></p>
                                <p><?php echo $translation['_Customer_Lessons_Title_']?></p>
                                <p><?php echo $translation['_Legal_Reasons_Title_']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row animated bounceInRight slow course-items">
                        <div class="col-md-3 col-sm-6 col-xs-12 mars">
                            <div class="service-content">
                                <span class="icon"><i class="fa fa-road" aria-hidden="true"></i></span>
                                <h3><?php echo $translation['_Course_part_title_']?></h3>
                                <pre>
                                    <?php echo $translation['_Danger_Theory_Title_']?>
                                </pre>
                                <pre>
                                    <?php echo $translation['_Finctions_Sensory_Title_']?>
                                </pre>
                           <div class="col-md-3 btn-side-form"><a href="<?=$config['base_url']?>/book"><button type="submit" class="book-on-blue"><?php echo $translation['Button_BOOK_VKU_1']?></button></a></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 mars">
                            <div class="service-content">
                                <span class="icon"><i class="fa fa-road" aria-hidden="true"></i></span>
                                <h3><?php echo $translation['_course_Part2_title_']?></h3>
                                <pre><?php echo $translation['_Partner_Customer_Title_']?></pre>
                                <pre><?php echo $translation['_Street_Customer_Title_']?></pre>
                                <pre><?php echo $translation['_weather_Title_']?></pre>
                                <pre><?php echo $translation['_Times_Title_']?></pre>
                                <div class="col-md-3 btn-side-form"><a href=" <?=$config['base_url']?>/book"><button type="submit" class="book-on-blue"><?php echo $translation['Button_BOOK_VKU_2']?></button></a></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 mars">
                            <div class="service-content">
                                <span class="icon"><i class="fa fa-road" aria-hidden="true"></i></span>
                                <h3><?php echo $translation['_course_Part3_title_']?></h3>
                                <pre><?php echo $translation['_Condition_Vehicle_Title_']?></pre>
                                <pre><?php echo $translation['_Forces_Driving_Title_']?></pre>
                                <pre><?php echo $translation['_Traffic_Movement_Title_']?></pre>
                            <div class="col-md-3 btn-side-form"><a href="<?=$config['base_url']?>/book"><button type="submit" class="book-on-blue"><?php echo $translation['Button_BOOK_VKU_3']?></button></a></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 mars">
                            <div class="service-content">
                                <span class="icon"><i class="fa fa-road" aria-hidden="true"></i></span>
                                <h3><?php echo $translation['_Course _Part_ 4_title_']?></h3>
                                <pre><?php echo $translation['_Driveability_title_']?></pre>
                                <p><?php echo $translation['_Environmentally_Conscious_Title_']?></p>
                                <p><?php echo $translation['_driving_title_']?></p>
                                 <div class="col-md-3 btn-side-form"><a href="   <?=$config['base_url']?>/book"><button type="submit" class="book-on-blue"><?php echo $translation['Button_BOOK_VKU_4']?></button></a></div>
                            </div>
                        </div>
                    </div> 
                </div>
            </section>
            <section class="animatedParent service-form-bot" style="background: #e90616;">
                <div class="container">
                    <div class="row form-bokking animated bounceInRight slow" style="padding-top: 0px;">
                        <div class="col-md-9">
                            <h3 style="margin-top: 30px; color: #fff;"><?php echo $translation['_BooK_VKU_Online_Now_Title_']?></h3>
                            <p style="color: #fff;"><?php echo $translation['_easlily_Book_Traffice_Title_']?></p>
                        </div>
                        <div class="col-md-3 btn-side-form"><a href="<?=$config['base_url']?>/book"><button type="submit" class="btn-primary book-on-red"><?php echo $translation['_book_vku_button_']?></button></a></div>
                        <!-- <div class="col-md-3 btn-side-form"><a href="book"><button type="submit" class="btn-primary book-on-red"><?php echo $translation['_submit_title_']?></button></a></div> -->
                    </div>
                </div>
            </section>
        </div>
<?php
include '../footer-new.php';
?>