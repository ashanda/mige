<?php
include '../includes/header.php';
$category_id = $_GET['category_id'];
//var_dump($category_id);die();
$get_category_detail = get_category_detail($category_id);
$name = $get_category_detail['name'];
$name_ingerman = $get_category_detail['name_ingerman'];
//print_r($parts_ingerman);die;
$no_of_parts = $get_category_detail['no_of_parts'];
$class_icon=$get_category_detail['class_icon'];
function get_category_image_base_64($image)
{
   $dir='CategoryImage/';

    if(!is_dir($dir))
    {
     mkdir( 'CategoryImage/',0777,true);
    }

    $image_name = uniqid().'_'.time().'.png';

    $image   = str_replace('data:image/png;base64,', '', $image); 
    $image   = str_replace(' ', '+', $image);
    $data  = base64_decode($image);
    $file  = 'CategoryImage/'.$image_name;
    $success = file_put_contents($file, $data);
    return $success ? $image_name : 'some problem occured';
}
function get_category_part_detail($category_id)
{
    global $conn;
    $q['query'] = "SELECT * FROM tbl_part_name WHERE category_id='$category_id'order by id asc";
    //var_dump($q['query']);
    $q['run'] = $conn->query($q['query']);
    $q['result'] = array();
    $i = 0;
    while ($c=$q['run']->fetch_assoc()) 
    {
        //var_dump( ($c=$q['run']->fetch_assoc()) );
        $i = ++$i;
        $c['s_num'] = $i;
        array_push($q['result'], $c);
    }
    return $q['result'];
}
if(isset($_POST['submit']))
{
    
    $name = $_POST['name'];
    //var_dump($name);
    $no_of_parts = $_POST['no_of_parts'];
    
    $category_id = $_GET['category_id'];

    $class_icon=$_POST['class_icon'];
    $check_category_existance = check_category_existance($category_id,$name);
    $category_name = strtolower($check_category_existance['name']);
    $part_name=$_POST['part_name'];
    $creation_time=time();
    $part_no=$_POST['part_no'];
    $alias=$_POST['alias_name'];
    $german=$_POST['name_ingerman'];
     $alias_inname=$_POST['alias_name_parts'];
     $parts_ingerman=$_POST['parts_name_ingerman'];
    // $a=explode(';base64,', $class_icon); 
    // if ($class_icon != "")
    // {
    // $class_icon = get_category_image_base_64($a[1]);
 
    // $update_image = $class_icon;
    // }
    // else{
    // $update_image=$get_category_detail['class_icon'];  
    // }

    if($category_name==strtolower($name))
     
    {
       
    
        $error = 'This Category Name Is Already Exists';
    }
    else
    {
        
        
        $class_icon = 'fa '.$class_icon;

        $edit_category = edit_categorysss($name,$category_id,$no_of_parts,$class_icon,$alias,$german);        
                if($edit_category)
                    
                    {

             delete_part_name($category_id);
            

             $q['query'] = "UPDATE tbl_category set `alias_name`='_category_".$category_id."_' WHERE category_id ='$category_id'";
    //print_r($q['query']);die();
    $q['run'] = $conn->query($q['query']);
  
             foreach ($part_name as $key => $value) {
           $part_no_val=$part_no[$key];
           $parts_ingerman_val=$parts_ingerman[$key];

           add_category_part_namess($category_id,$value,$creation_time,$part_no_val, $alias_inname,$parts_ingerman_val);
          $part_id=$conn->insert_id;
           $q['query'] = "UPDATE `tbl_part_name` SET `alias_name_parts`='_category_".$category_id."_parts_".$part_no_val."_' WHERE id =$part_id";
          $q['run'] = $conn->query($q['query']);

        }
       
            echo "<script>window.location.href='index.php';</script>";
            exit();
        }
        else
        {
            $error = 'There is someting wrong while editing category';
        }
    }
}
?>
<style type="text/css">
    .act{
            /*border: 0;*/
    /*background: 0 0;*/
    border-bottom: 3px solid #da3732 !important ;
    }
     #icon {
  margin: 0 0 10px;
}

.chosen-container {
  text-align: left; // overrides body text-align
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-yaml/3.6.0/js-yaml.min.js"></script>
<div class="page has-sidebar-left  height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-apps"></i>
                        Course Category
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link"  href="index.php"><i class="icon icon-home2"></i>All Course Categories</a>
                    </li>
                     <li>
                        <a class="nav-link"  href="AddCategory.php" ><i class="icon icon-plus-circle"></i> Add Course Category</a>
                    </li>
                    <li>
                        <a class="nav-link act"  href="#" ><i class="icon icon-pencil iconspace"></i> Edit Course Category</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-8  offset-md-2 ">
                    <form action="" method="POST">
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <div class="form-row mt-4">
                                           <!--  <div class="form-group ">


</div> -->
                                             <div class="form-group col-4 ml-3 mb-3">
                                                 <label for="name" class="col-form-label s-12">Course Category Name In English</label>
                                            <input name="name" placeholder="Enter Category Name" class="form-control r-0 light s-12 " type="text" value="<?php echo $name;?>">
                                            <input name="category_id" class="form-control r-0 light s-12" value="<?php echo $category_id;?>" type="hidden">

                                                    
                                            </div>
                                            <div class="form-group col-md-4 ml-3">
                                    <label for="dob" class="col-form-label s-12 ">Course Category Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="Enter Text Please" data-time-picker="false" value="<?=$name_ingerman?>" type="text" name="name_ingerman">
                                </div>
                                       <!--  </div>
                                            <label for="name" class="col-form-label s-12">Course Category Name</label>
                                            <input name="name" placeholder="Enter Category Name" class="form-control r-0 light s-12 " type="text" value="<?php echo $name;?>">
                                            <input name="category_id" class="form-control r-0 light s-12" value="<?php echo $category_id;?>" type="hidden">
                                        </div> -->
                                    
                                </div>
                                <div class="form-row">
                                    <div class="col-md-10 ml-2">
                                        <div class="form-group m-0">
                                            <label for="no_of_parts" class="col-form-label s-12">Number Of Parts</label>
                                            <input name="no_of_parts" id='no_of_parts' placeholder="Enter Number Of Parts Here" class="form-control r-0 light s-12 " type="number" value="<?php echo $no_of_parts;?>">

                                        </div>
                                    </div>
                                </div>

                                 <div id='PartS'> <?php if($no_of_parts){
                                    $parts=intval($no_of_parts);
                                    $data=get_category_part_detail($_REQUEST['category_id']);
                                   
                                     for ($i=0; $i <$parts ; $i++) {
                                    
                                     $name=$data[$i]['name'];
                                     $parts_ingerman=$data[$i]['parts_name_ingerman'];
                                    //var_dump($parts_ingerman);
                                     $a=$i+1; 
                                     //      # code...
                                     //  } ?>
                                 <!--     <div class="form-row">
                                        <div class="col-md-8 ml-3">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">Part <?php echo $a;?>  Name</label>
                                                <input name="part_name[]" placeholder="Enter Part <?php echo $a;?> Name" class="form-control r-0 light s-12 " type="text"  value="<?php echo $name;?>" required>
                                                <input type="hidden" name="part_no[]" value='<?php echo $a;?>'>
                                            </div>
                                        < -->

                                
                                    <div class="col-md-14 form-row ml-2"><div class></div><div class="col-md-5"><label for="name" class="col-form-label s-12">Part <?php echo $a;?> Name In English</label><input name="part_name[]" placeholder="Enter Part <?php echo $a;?> Name" class="form-control r-0 light s-12 " type="text" value="<?php echo $name;?>" required=""></div>
                                    <div class="col-md-5 m4"><label for="name" class="col-form-label s-12">Part <?php echo $a;?> Name In German</label><input name="parts_name_ingerman[]" placeholder="Enter Part <?php echo $a;?> Name" class="form-control r-0 light s-12 " type="text"  value="<?php echo $parts_ingerman;?>" required="">
                                        <input type="hidden" name="part_no[]" value='<?php echo $a;?>'></div></div>

                                     <?php } } ?>

                                     </div>

                                <div class="form-row">
                                    <div class="col-md-10 ml-3">
                                        <div class="form-group m-0">
                                            <label for="class_icon" class="col-form-label s-12">Icon</label>
                                            <!-- <div id="icon"></div> -->
                                           <select id="select" name="class_icon" class="form-control r-0 light s-12 " value="<?php echo $class_icon;?>">
                                                <?php $icons = ["fa-500px", "fa-address-book", "fa-address-book-o", "fa-address-card", "fa-address-card-o", "fa-adjust", "fa-adn", "fa-align-center", "fa-align-justify", "fa-align-left", "fa-align-right", "fa-amazon", "fa-ambulance", "fa-american-sign-language-interpreting", "fa-anchor", "fa-android", "fa-angellist", "fa-angle-double-down", "fa-angle-double-left", "fa-angle-double-right", "fa-angle-double-up", "fa-angle-down", "fa-angle-left", "fa-angle-right", "fa-angle-up", "fa-apple", "fa-archive", "fa-area-chart", "fa-arrow-circle-down", "fa-arrow-circle-left", "fa-arrow-circle-o-down", "fa-arrow-circle-o-left", "fa-arrow-circle-o-right", "fa-arrow-circle-o-up", "fa-arrow-circle-right", "fa-arrow-circle-up", "fa-arrow-down", "fa-arrow-left", "fa-arrow-right", "fa-arrow-up", "fa-arrows", "fa-arrows-alt", "fa-arrows-h", "fa-arrows-v", "fa-asl-interpreting", "fa-assistive-listening-systems", "fa-asterisk", "fa-at", "fa-audio-description", "fa-automobile", "fa-backward", "fa-balance-scale", "fa-ban", "fa-bandcamp", "fa-bank", "fa-bar-chart", "fa-bar-chart-o", "fa-barcode", "fa-bars", "fa-bath", "fa-bathtub", "fa-battery", "fa-battery-0", "fa-battery-1", "fa-battery-2", "fa-battery-3", "fa-battery-4", "fa-battery-empty", "fa-battery-full", "fa-battery-half", "fa-battery-quarter", "fa-battery-three-quarters", "fa-bed", "fa-beer", "fa-behance", "fa-behance-square", "fa-bell", "fa-bell-o", "fa-bell-slash", "fa-bell-slash-o", "fa-bicycle", "fa-binoculars", "fa-birthday-cake", "fa-bitbucket", "fa-bitbucket-square", "fa-bitcoin", "fa-black-tie", "fa-blind", "fa-bluetooth", "fa-bluetooth-b", "fa-bold", "fa-bolt", "fa-bomb", "fa-book", "fa-bookmark", "fa-bookmark-o", "fa-braille", "fa-briefcase", "fa-btc", "fa-bug", "fa-building", "fa-building-o", "fa-bullhorn", "fa-bullseye", "fa-bus", "fa-buysellads", "fa-cab", "fa-calculator", "fa-calendar", "fa-calendar-check-o", "fa-calendar-minus-o", "fa-calendar-o", "fa-calendar-plus-o", "fa-calendar-times-o", "fa-camera", "fa-camera-retro", "fa-car", "fa-caret-down", "fa-caret-left", "fa-caret-right", "fa-caret-square-o-down", "fa-caret-square-o-left", "fa-caret-square-o-right", "fa-caret-square-o-up", "fa-caret-up", "fa-cart-arrow-down", "fa-cart-plus", "fa-cc", "fa-cc-amex", "fa-cc-diners-club", "fa-cc-discover", "fa-cc-jcb", "fa-cc-mastercard", "fa-cc-paypal", "fa-cc-stripe", "fa-cc-visa", "fa-certificate", "fa-chain", "fa-chain-broken", "fa-check", "fa-check-circle", "fa-check-circle-o", "fa-check-square", "fa-check-square-o", "fa-chevron-circle-down", "fa-chevron-circle-left", "fa-chevron-circle-right", "fa-chevron-circle-up", "fa-chevron-down", "fa-chevron-left", "fa-chevron-right", "fa-chevron-up", "fa-child", "fa-chrome", "fa-circle", "fa-circle-o", "fa-circle-o-notch", "fa-circle-thin", "fa-clipboard", "fa-clock-o", "fa-clone", "fa-close", "fa-cloud", "fa-cloud-download", "fa-cloud-upload", "fa-cny", "fa-code", "fa-code-fork", "fa-codepen", "fa-codiepie", "fa-coffee", "fa-cog", "fa-cogs", "fa-columns", "fa-comment", "fa-comment-o", "fa-commenting", "fa-commenting-o", "fa-comments", "fa-comments-o", "fa-compass", "fa-compress", "fa-connectdevelop", "fa-contao", "fa-copy", "fa-copyright", "fa-creative-commons", "fa-credit-card", "fa-credit-card-alt", "fa-crop", "fa-crosshairs", "fa-css3", "fa-cube", "fa-cubes", "fa-cut", "fa-cutlery", "fa-dashboard", "fa-dashcube", "fa-database", "fa-deaf", "fa-deafness", "fa-dedent", "fa-delicious", "fa-desktop", "fa-deviantart", "fa-diamond", "fa-digg", "fa-dollar", "fa-dot-circle-o", "fa-download", "fa-dribbble", "fa-drivers-license", "fa-drivers-license-o", "fa-dropbox", "fa-drupal", "fa-edge", "fa-edit", "fa-eercast", "fa-eject", "fa-ellipsis-h", "fa-ellipsis-v", "fa-empire", "fa-envelope", "fa-envelope-o", "fa-envelope-open", "fa-envelope-open-o", "fa-envelope-square", "fa-envira", "fa-eraser", "fa-etsy", "fa-eur", "fa-euro", "fa-exchange", "fa-exclamation", "fa-exclamation-circle", "fa-exclamation-triangle", "fa-expand", "fa-expeditedssl", "fa-external-link", "fa-external-link-square", "fa-eye", "fa-eye-slash", "fa-eyedropper", "fa-fa", "fa-facebook", "fa-facebook-f", "fa-facebook-official", "fa-facebook-square", "fa-fast-backward", "fa-fast-forward", "fa-fax", "fa-feed", "fa-female", "fa-fighter-jet", "fa-file", "fa-file-archive-o", "fa-file-audio-o", "fa-file-code-o", "fa-file-excel-o", "fa-file-image-o", "fa-file-movie-o", "fa-file-o", "fa-file-pdf-o", "fa-file-photo-o", "fa-file-picture-o", "fa-file-powerpoint-o", "fa-file-sound-o", "fa-file-text", "fa-file-text-o", "fa-file-video-o", "fa-file-word-o", "fa-file-zip-o", "fa-files-o", "fa-film", "fa-filter", "fa-fire", "fa-fire-extinguisher", "fa-firefox", "fa-first-order", "fa-flag", "fa-flag-checkered", "fa-flag-o", "fa-flash", "fa-flask", "fa-flickr", "fa-floppy-o", "fa-folder", "fa-folder-o", "fa-folder-open", "fa-folder-open-o", "fa-font", "fa-font-awesome", "fa-fonticons", "fa-fort-awesome", "fa-forumbee", "fa-forward", "fa-foursquare", "fa-free-code-camp", "fa-frown-o", "fa-futbol-o", "fa-gamepad", "fa-gavel", "fa-gbp", "fa-ge", "fa-gear", "fa-gears", "fa-genderless", "fa-get-pocket", "fa-gg", "fa-gg-circle", "fa-gift", "fa-git", "fa-git-square", "fa-github", "fa-github-alt", "fa-github-square", "fa-gitlab", "fa-gittip", "fa-glass", "fa-glide", "fa-glide-g", "fa-globe", "fa-google", "fa-google-plus", "fa-google-plus-circle", "fa-google-plus-official", "fa-google-plus-square", "fa-google-wallet", "fa-graduation-cap", "fa-gratipay", "fa-grav", "fa-group", "fa-h-square", "fa-hacker-news", "fa-hand-grab-o", "fa-hand-lizard-o", "fa-hand-o-down", "fa-hand-o-left", "fa-hand-o-right", "fa-hand-o-up", "fa-hand-paper-o", "fa-hand-peace-o", "fa-hand-pointer-o", "fa-hand-rock-o", "fa-hand-scissors-o", "fa-hand-spock-o", "fa-hand-stop-o", "fa-handshake-o", "fa-hard-of-hearing", "fa-hashtag", "fa-hdd-o", "fa-header", "fa-headphones", "fa-heart", "fa-heart-o", "fa-heartbeat", "fa-history", "fa-home", "fa-hospital-o", "fa-hotel", "fa-hourglass", "fa-hourglass-1", "fa-hourglass-2", "fa-hourglass-3", "fa-hourglass-end", "fa-hourglass-half", "fa-hourglass-o", "fa-hourglass-start", "fa-houzz", "fa-html5", "fa-i-cursor", "fa-id-badge", "fa-id-card", "fa-id-card-o", "fa-ils", "fa-image", "fa-imdb", "fa-inbox", "fa-indent", "fa-industry", "fa-info", "fa-info-circle", "fa-inr", "fa-instagram", "fa-institution", "fa-internet-explorer", "fa-intersex", "fa-ioxhost", "fa-italic", "fa-joomla", "fa-jpy", "fa-jsfiddle", "fa-key", "fa-keyboard-o", "fa-krw", "fa-language", "fa-laptop", "fa-lastfm", "fa-lastfm-square", "fa-leaf", "fa-leanpub", "fa-legal", "fa-lemon-o", "fa-level-down", "fa-level-up", "fa-life-bouy", "fa-life-buoy", "fa-life-ring", "fa-life-saver", "fa-lightbulb-o", "fa-line-chart", "fa-link", "fa-linkedin", "fa-linkedin-square", "fa-linode", "fa-linux", "fa-list", "fa-list-alt", "fa-list-ol", "fa-list-ul", "fa-location-arrow", "fa-lock", "fa-long-arrow-down", "fa-long-arrow-left", "fa-long-arrow-right", "fa-long-arrow-up", "fa-low-vision", "fa-magic", "fa-magnet", "fa-mail-forward", "fa-mail-reply", "fa-mail-reply-all", "fa-male", "fa-map", "fa-map-marker", "fa-map-o", "fa-map-pin", "fa-map-signs", "fa-mars", "fa-mars-double", "fa-mars-stroke", "fa-mars-stroke-h", "fa-mars-stroke-v", "fa-maxcdn", "fa-meanpath", "fa-medium", "fa-medkit", "fa-meetup", "fa-meh-o", "fa-mercury", "fa-microchip", "fa-microphone", "fa-microphone-slash", "fa-minus", "fa-minus-circle", "fa-minus-square", "fa-minus-square-o", "fa-mixcloud", "fa-mobile", "fa-mobile-phone", "fa-modx", "fa-money", "fa-moon-o", "fa-mortar-board", "fa-motorcycle", "fa-mouse-pointer", "fa-music", "fa-navicon", "fa-neuter", "fa-newspaper-o", "fa-object-group", "fa-object-ungroup", "fa-odnoklassniki", "fa-odnoklassniki-square", "fa-opencart", "fa-openid", "fa-opera", "fa-optin-monster", "fa-outdent", "fa-pagelines", "fa-paint-brush", "fa-paper-plane", "fa-paper-plane-o", "fa-paperclip", "fa-paragraph", "fa-paste", "fa-pause", "fa-pause-circle", "fa-pause-circle-o", "fa-paw", "fa-paypal", "fa-pencil", "fa-pencil-square", "fa-pencil-square-o", "fa-percent", "fa-phone", "fa-phone-square", "fa-photo", "fa-picture-o", "fa-pie-chart", "fa-pied-piper", "fa-pied-piper-alt", "fa-pied-piper-pp", "fa-pinterest", "fa-pinterest-p", "fa-pinterest-square", "fa-plane", "fa-play", "fa-play-circle", "fa-play-circle-o", "fa-plug", "fa-plus", "fa-plus-circle", "fa-plus-square", "fa-plus-square-o", "fa-podcast", "fa-power-off", "fa-print", "fa-product-hunt", "fa-puzzle-piece", "fa-qq", "fa-qrcode", "fa-question", "fa-question-circle", "fa-question-circle-o", "fa-quora", "fa-quote-left", "fa-quote-right", "fa-ra", "fa-random", "fa-ravelry", "fa-rebel", "fa-recycle", "fa-reddit", "fa-reddit-alien", "fa-reddit-square", "fa-refresh", "fa-registered", "fa-remove", "fa-renren", "fa-reorder", "fa-repeat", "fa-reply", "fa-reply-all", "fa-resistance", "fa-retweet", "fa-rmb", "fa-road", "fa-rocket", "fa-rotate-left", "fa-rotate-right", "fa-rouble", "fa-rss", "fa-rss-square", "fa-rub", "fa-ruble", "fa-rupee", "fa-s15", "fa-safari", "fa-save", "fa-scissors", "fa-scribd", "fa-search", "fa-search-minus", "fa-search-plus", "fa-sellsy", "fa-send", "fa-send-o", "fa-server", "fa-share", "fa-share-alt", "fa-share-alt-square", "fa-share-square", "fa-share-square-o", "fa-shekel", "fa-sheqel", "fa-shield", "fa-ship", "fa-shirtsinbulk", "fa-shopping-bag", "fa-shopping-basket", "fa-shopping-cart", "fa-shower", "fa-sign-in", "fa-sign-language", "fa-sign-out", "fa-signal", "fa-signing", "fa-simplybuilt", "fa-sitemap", "fa-skyatlas", "fa-skype", "fa-slack", "fa-sliders", "fa-slideshare", "fa-smile-o", "fa-snapchat", "fa-snapchat-ghost", "fa-snapchat-square", "fa-snowflake-o", "fa-soccer-ball-o", "fa-sort", "fa-sort-alpha-asc", "fa-sort-alpha-desc", "fa-sort-amount-asc", "fa-sort-amount-desc", "fa-sort-asc", "fa-sort-desc", "fa-sort-down", "fa-sort-numeric-asc", "fa-sort-numeric-desc", "fa-sort-up", "fa-soundcloud", "fa-space-shuttle", "fa-spinner", "fa-spoon", "fa-spotify", "fa-square", "fa-square-o", "fa-stack-exchange", "fa-stack-overflow", "fa-star", "fa-star-half", "fa-star-half-empty", "fa-star-half-full", "fa-star-half-o", "fa-star-o", "fa-steam", "fa-steam-square", "fa-step-backward", "fa-step-forward", "fa-stethoscope", "fa-sticky-note", "fa-sticky-note-o", "fa-stop", "fa-stop-circle", "fa-stop-circle-o", "fa-street-view", "fa-strikethrough", "fa-stumbleupon", "fa-stumbleupon-circle", "fa-subscript", "fa-subway", "fa-suitcase", "fa-sun-o", "fa-superpowers", "fa-superscript", "fa-support", "fa-table", "fa-tablet", "fa-tachometer", "fa-tag", "fa-tags", "fa-tasks", "fa-taxi", "fa-telegram", "fa-television", "fa-tencent-weibo", "fa-terminal", "fa-text-height", "fa-text-width", "fa-th", "fa-th-large", "fa-th-list", "fa-themeisle", "fa-thermometer", "fa-thermometer-0", "fa-thermometer-1", "fa-thermometer-2", "fa-thermometer-3", "fa-thermometer-4", "fa-thermometer-empty", "fa-thermometer-full", "fa-thermometer-half", "fa-thermometer-quarter", "fa-thermometer-three-quarters", "fa-thumb-tack", "fa-thumbs-down", "fa-thumbs-o-down", "fa-thumbs-o-up", "fa-thumbs-up", "fa-ticket", "fa-times", "fa-times-circle", "fa-times-circle-o", "fa-times-rectangle", "fa-times-rectangle-o", "fa-tint", "fa-toggle-down", "fa-toggle-left", "fa-toggle-off", "fa-toggle-on", "fa-toggle-right", "fa-toggle-up", "fa-trademark", "fa-train", "fa-transgender", "fa-transgender-alt", "fa-trash", "fa-trash-o", "fa-tree", "fa-trello", "fa-tripadvisor", "fa-trophy", "fa-truck", "fa-try", "fa-tty", "fa-tumblr", "fa-tumblr-square", "fa-turkish-lira", "fa-tv", "fa-twitch", "fa-twitter", "fa-twitter-square", "fa-umbrella", "fa-underline", "fa-undo", "fa-universal-access", "fa-university", "fa-unlink", "fa-unlock", "fa-unlock-alt", "fa-unsorted", "fa-upload", "fa-usb", "fa-usd", "fa-user", "fa-user-circle", "fa-user-circle-o", "fa-user-md", "fa-user-o", "fa-user-plus", "fa-user-secret", "fa-user-times", "fa-users", "fa-vcard", "fa-vcard-o", "fa-venus", "fa-venus-double", "fa-venus-mars", "fa-viacoin", "fa-viadeo", "fa-viadeo-square", "fa-video-camera", "fa-vimeo", "fa-vimeo-square", "fa-vine", "fa-vk", "fa-volume-control-phone", "fa-volume-down", "fa-volume-off", "fa-volume-up", "fa-warning", "fa-wechat", "fa-weibo", "fa-weixin", "fa-whatsapp", "fa-wheelchair", "fa-wheelchair-alt", "fa-wifi", "fa-wikipedia-w", "fa-window-close", "fa-window-close-o", "fa-window-maximize", "fa-window-minimize", "fa-window-restore", "fa-windows", "fa-won", "fa-wordpress", "fa-wpbeginner", "fa-wpexplorer", "fa-wpforms", "fa-wrench", "fa-xing", "fa-xing-square", "fa-y-combinator", "fa-y-combinator-square", "fa-yahoo", "fa-yc", "fa-yc-square", "fa-yelp", "fa-yen", "fa-yoast", "fa-youtube", "fa-youtube-play", "fa-youtube-square"];

                                                  $class_icon_split = explode('-', $class_icon);     
                                                  
                                                foreach ($icons as $key => $value) { 

                                                
                                                 ?>
                                                <option value='<?=$value?>' <?php if($value=='fa-'.$class_icon_split){echo "selected";} ?>> <?=$value?> </option>
                                                <?php } ?>
                                           </select>

                                             <div id="icon"><i class="icon icon-<?=str_replace('fa fa-','',$class_icon)?>"  style="font-size:55px"></i></div>
                                            <!-- <input name="class_icon" placeholder="Enter icon class" class="form-control r-0 light s-12 " type="text" value="<?php echo $class_icon;?>"> -->

                                        </div>
                                    </div>
                                </div>
                               <!--  <div class="col-md-3 offset-md-1">
                                        <input hidden id="file" name="class_icon"/>
                                        <div class="dropzone dropzone-file-area pt-4 pb-4" id="fileUpload" style="margin-top: -76px;padding:0px;">
                                            <div class="dz-default dz-message">
                                                <?php if($class_icon){?>
                                                <span> <img src="<?php echo BASE_URL.'/FahrschuleStarWebSite/admin/Category/CategoryImage/'.$class_icon;?>"></span><?php }else{?>
                                                <span>Drop A passport size icon of category</span>
                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div> -->
                                <!-- </div> -->
                            
                            <hr>
                            <span style="color: red;" id="error"><?php if(isset($error)) { echo $error;}?></span>
                            <div class="card-body">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save ml-3"></i>Save Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../includes/footer.php';
?>
<script type="text/javascript">
    $("input").click(function() {
        $('#error').css("display", "none");
    });
</script>
<script type="text/javascript">
  /*  $.get('https://raw.githubusercontent.com/FortAwesome/Font-Awesome/fa-4/src/icons.yml', function(data) {
  var parsedYaml = jsyaml.load(data);
  var class_icon='<?php echo $class_icon;?>';
    $.each(parsedYaml.icons, function(index, icon){
        var optionval='fa fa-' + icon.id;
     
        if(optionval==class_icon){
            $('#select').append('<option value="fa-' + icon.id + '" selected >' + icon.id + '</option>');
        }else{
    $('#select').append('<option value="fa-' + icon.id + '" >' + icon.id + '</option>');
}
  });
  
  $("#select").chosen({
    enable_split_word_search: true,
        search_contains: true 
  });
    $("#icon").html('<i class="fa fa-2x ' + $('#select').val() + '"></i>');
});*/

/* Detect any change of option*/
$("#select").change(function(){
  var icono = $(this).val();

  var icono = icono.replace('fa','icon');
 
   $("#icon").html('<i class="icon ' + icono + '" style="font-size:55px"></i>');
});
</script>

<script type="text/javascript">
    $(document).ready(function(){
        
        $('#no_of_parts').on('keyup change',function(){
          var no_of_parts = $(this).val();
          console.log(no_of_parts);
          var category_id='<?php echo $_GET['category_id'];?>';
          console.log(category_id);
           $.ajax({
            type: "GET",
            url: "GetCategoryPartDetail.php?category_id="+category_id,
            async: false,
            success: function(text) {
                 var data = jQuery.parseJSON(text);
             
          $('#PartS').empty();
          for (var i = 0; i < no_of_parts; i++) {
              var a=i+1;
              if(data[i]){
              var name=data[i]['name'];
              }else{
                var name="";
              }
              
              $('#PartS').append('<div id="PartS"><div class="col-md-10 form-row"><div class></div><div class="col-md-4"><label for="name" class="col-form-label s-12">Part '+a+' Name In English</label><input name="part_name[]" placeholder="Enter Part '+a+' Name" class="form-control r-0 light s-12 " type="text" required=""></div><div class="col-md-4"><label for="name" class="col-form-label s-12">Part '+a+' Name In German</label><input name="parts_name_ingerman[]" placeholder="Enter Part '+a+' Name" class="form-control r-0 light s-12 " type="text" required=""><input type="hidden" name="part_no[]" value="1"></div></div></div>')
          }
          }
        });

        });
    // });
    });
</script>