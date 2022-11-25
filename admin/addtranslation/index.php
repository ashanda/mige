
<style type="text/css">
    form#form-three {
    background-color: #fff;
}

form#form-two {
    background-color: #fff;
}
form#form-one {
    background-color: #fff;
}

form#form-three .form-row {
    margin-right: 15px;
}
form#form-two .form-row {
    margin-right: 15px;
}
form#form-three .form-row {
    margin-right: 15px;
}
div#showHide-4 {
    background-color: #fff;
    
}
div#showHide-5 {
    background-color: #fff;
   
}
div#showHide-6 {
    background-color: #fff;
  
}
div#showHide-18 {
    background-color: #fff;
  
}
div#showHide-21 {
    background-color: #fff;
  
}

</style>
<?php
include '../includes/header.php';

$value = $_GET['url'];

$value2 = $_GET['url_page'];

//print_r($value2);


if($value2 =='Login'){
  $query = "SELECT * FROM page_content_translation WHERE selected_page='Login'"; 
//print_r($query); die;
 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
$inenglish = array_column($result, 'inenglish');
$ingerman = array_column($result, 'ingerman');

// print_r($alias);


}
$welcome = $alias[0];
$desc = $alias[1];
$registration = $alias[2];
$contact = $alias[3];
$more = $alias[4];
$image = $alias[5];
$signup_email_title = $alias[6];
$signup_form_title = $alias[7];
$signup_password_title = $alias[10];

// print_r($alias[7]);
$welcome_inenglish = $inenglish[0];
$desc_inenglish = $inenglish[1];
$reg_inenglish = $inenglish[2];
$contact_inenglish = $inenglish[3];
$more_inenglish = $inenglish[4];
$image_inenglish = $inenglish[5];
$signup_email_title_inenglish = $inenglish[6];
$signup_form_title_inenglish = $inenglish[7];
$signup_password_title_inenglish = $inenglish[10];

$welcome_ingerman = $ingerman[0];
$desc_ingerman = $ingerman[1];
$reg_ingerman = $ingerman[2];
$contact_ingerman = $ingerman[3];
$more_ingerman = $ingerman[4];
$image_ingerman = $ingerman[5];
$signup_email_title_ingerman = $ingerman[6];
$signup_form_title_ingerman = $ingerman[7];
$signup_password_title_ingerman = $ingerman[10];





if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  
  $image = $_FILES['image']['name'];
    $target_dir='images/';
    $targetFilePath = $target_dir . basename($_FILES['image']['name']);
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 $allowTypes = array('jpg','png','jpeg','gif','pdf');

 
     
  for($i=0;$i<$count;$i++){
      $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

      $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
      echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=Login';</script>";

 
 if ($conn->query($update) === TRUE) {
}



  } //for loop end
  

  

}
  
}
elseif($value2 =='Vku_page'){
  
    
  $query = "SELECT * FROM page_content_translation WHERE selected_page='Vku_page'"; 


//print_r($query); die;

 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
$inenglish = array_column($result, 'inenglish');
$ingerman = array_column($result, 'ingerman');



}

/*print_r($alias);echo " alias <br> ";
print_r($inenglish);echo " inenglish <br> ";
print_r($ingerman);echo " ingerman <br> ";

die;
*/


/*$Vku_desc_heading_inenglish = $inenglish[0];
$Course_Part_1_inenglish = $inenglish[1];
$Danger_theory_inenglish = $inenglish[2];
$Functions_of_the_sensory_organs_inenglish = $inenglish[3];
$Course_Part_2_inenglish = $inenglish[4];
$Partner_customer_inenglish = $inenglish[5];
$Street_customer_inenglish = $inenglish[6];
$weather_inenglish = $inenglish[7];
$Times_inenglish = $inenglish[8];
$Course_Part_3_inenglish = $inenglish[9];
$Condition_of_the_vehicle_inenglish = $inenglish[10];
$Forces_when_driving_inenglish = $inenglish[11];
$Traffic_movement_theory_inenglish = $inenglish[12];
$Course_Part_4_inenglish = $inenglish[13];
$Driveability_inenglish = $inenglish[14];
$Environmentally_conscious_inenglish = $inenglish[15];
$driving_inenglish = $inenglish[16];
$Traffic_Studies_inenglish = $inenglish[17];
$desc_inenglish = $inenglish[18];

$Button_BOOK_VKU_1_inenglish = $inenglish[19];
$Button_BOOK_VKU_2_inenglish = $inenglish[20];
$Button_BOOK_VKU_3_inenglish= $inenglish[21];
$Button_BOOK_VKU_4_inenglish= $inenglish[22];

*/

$Vku_banner_title_alias = $alias[0];
$vku_banner_description_part_1_alias = $alias[1];
$vku_banner_description_part_2_alias = $alias[2];
$vku_banner_description_part_3_alias = $alias[3];

$Course_Part_1_alias = $alias[4];
$Danger_theory = $alias[5];
$Functions_of_the_sensory_organs = $alias[6];
$BookVku1_inalias = $alias[24];

$Course_Part_2 = $alias[7];
$Partner_customer = $alias[8];
$Street_customer = $alias[9];
$weather = $alias[10];
$Times = $alias[11];
$BookVku2_inalias = $alias[25];


$Course_Part_3 = $alias[12];
$Condition_of_the_vehicle = $alias[13];
$Forces_when_driving = $alias[14];
$Traffic_movement_theory = $alias[15];
$BookVku3_inalias = $alias[26];

$Course_Part_4 = $alias[16];
$Driveability = $alias[17];
$Environmentally_conscious = $alias[18];
$driving = $alias[19];
$BookVku4_inalias = $alias[27];

$vku_footer_part1_alias = $alias[20];
$vku_footer_part2_alias = $alias[21];
$vku_footer_part3_alias = $alias[28];




$Vku_banner_title_inenglish = $inenglish[0];
$vku_banner_description_part_1_inenglish = $inenglish[1];
$vku_banner_description_part_2_inenglish = $inenglish[2];
$vku_banner_description_part_3_inenglish = $inenglish[3];

$Course_Part_1_inenglish = $inenglish[4];
$Danger_theory_inenglish = $inenglish[5];
$Functions_of_the_sensory_organs_inenglish = $inenglish[6];
$BookVku1_inenglish = $inenglish[24];

$Course_Part_2_inenglish = $inenglish[7];
$Partner_customer_inenglish = $inenglish[8];
$Street_customer_inenglish = $inenglish[9];
$weather_inenglish = $inenglish[10];
$Times_inenglish = $inenglish[11];
$BookVku2_inalias_inenglish = $inenglish[25];


$Course_Part_3_inenglish = $inenglish[12];
$Condition_of_the_vehicle_inenglish = $inenglish[13];
$Forces_when_driving_inenglish = $inenglish[14];
$Traffic_movement_theory_inenglish = $inenglish[15];
$BookVku3_inalias_inenglish = $inenglish[26];

$Course_Part_4_inenglish = $inenglish[16];
$Driveability_inenglish = $inenglish[17];
$Environmentally_conscious_inenglish = $inenglish[18];
$driving_inenglish = $inenglish[19];
$BookVku4_inenglish = $inenglish[27];


$vku_footer_part1_inenglish = $inenglish[20];
$vku_footer_part2_inenglish = $inenglish[21];
$vku_footer_part3_inenglish = $inenglish[28];




$Vku_banner_title_ingerman = $ingerman[0];
$vku_banner_description_part_1_ingerman = $ingerman[1];
$vku_banner_description_part_2_ingerman = $ingerman[2];
$vku_banner_description_part_3_ingerman = $ingerman[3];

$Course_Part_1_ingerman = $ingerman[4];
$Danger_theory_ingerman = $ingerman[5];
$Functions_of_the_sensory_organs_ingerman = $ingerman[6];
$BookVku1_ingerman = $ingerman[24];

$Course_Part_2_ingerman = $ingerman[7];
$Partner_customer_ingerman = $ingerman[8];
$Street_customer_ingerman = $ingerman[9];
$weather_ingerman = $ingerman[10];
$Times_ingerman = $ingerman[11];
$BookVku2_inalias_ingerman = $ingerman[25];


$Course_Part_3_ingerman = $ingerman[12];
$Condition_of_the_vehicle_ingerman = $ingerman[13];
$Forces_when_driving_ingerman = $ingerman[14];
$Traffic_movement_theory_ingerman = $ingerman[15];
$BookVku3_inalias_ingerman = $ingerman[26];

$Course_Part_4_ingerman = $ingerman[16];
$Driveability_ingerman = $ingerman[17];
$Environmentally_conscious_ingerman = $ingerman[18];
$driving_ingerman = $ingerman[19];
$BookVku4_ingerman = $ingerman[27];


$vku_footer_part1_ingerman = $ingerman[20];
$vku_footer_part2_ingerman = $ingerman[21];
$vku_footer_part3_ingerman = $ingerman[28];


/*
$Vku_desc_heading_ingerman = $ingerman[0];
$Course_Part_1_ingerman = $ingerman[1];
$Danger_theory_ingerman = $ingerman[2];
$Functions_of_the_sensory_organs_ingerman = $ingerman[3];
$Course_Part_2_ingerman = $ingerman[4];
$Partner_customer_ingerman = $ingerman[5];
$Street_customer_ingerman = $ingerman[6];
$weather_ingerman = $ingerman[7];
$Times_ingerman = $ingerman[8];
$Course_Part_3_ingerman = $ingerman[9];
$Condition_of_the_vehicle_ingerman = $ingerman[10];
$Forces_when_driving_ingerman = $ingerman[11];
$Traffic_movement_theory_ingerman = $ingerman[12];
$Course_Part_4_ingerman = $ingerman[13];
$Driveability_ingerman = $ingerman[14];
$Environmentally_conscious_ingerman = $ingerman[15];
$driving_ingerman = $ingerman[16];
$Traffic_Studies_ingerman = $ingerman[17];
$desc_ingerman = $ingerman[18];
$Button_BOOK_VKU_1_ingerman= $ingerman[19];
$Button_BOOK_VKU_2_ingerman = $ingerman[20];
$Button_BOOK_VKU_3_ingerman = $ingerman[21];
$Button_BOOK_VKU_4_ingerman = $ingerman[22];*/

 // print_r($desc_inenglish);die;



if(isset($_POST['submit']))
{
    

  $alias_name = $_POST['alias_name'];
  $inenglish = $_POST['inenglish']; 
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  //print_r($_POST); 
  
    $image = $_FILES['image']['name'];
    $target_dir='images/';
    $targetFilePath = $target_dir . basename($_FILES['image']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');

 
     
  for($i=0;$i<$count;$i++){
      $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
      $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
      $update_alias=$alias_name[$i];

      $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
      //echo $update.'<br>'.'next';
      //echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=Vku_page';</script>";
      $conn->query($update);

  } //for loop end
  

    echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=Vku_page';</script>";

}
  
}

elseif($value2 =='Footer_page_all'){

 $query = "SELECT * FROM page_content_translation WHERE selected_page='Footer_page_all'"; 
 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
$inenglish = array_column($result, 'inenglish');
$ingerman = array_column($result, 'ingerman');


}


$Address_in_footer_page=$alias[0];
$Address_in_footer_page_inenglish=$inenglish[0];
$Address_in_footer_page_ingerman=$ingerman[0];

$phone_number_footer_page=$alias[1];
$phone_number_footer_page_inenglish=$inenglish[1];
$phone_number_footer_page_ingerman=$ingerman[1];

$Contact_in_footer_page=$alias[2];
$Contact_in_footer_page_inenglish=$inenglish[2];
$Contact_in_footer_page_ingerman=$ingerman[2];

$footer_partner_image_title=$alias[3];
$Image_title_footer_English=$inenglish[3];
$Image_title_footer_ingerman=$ingerman[3];


$Title_In_image_changes=$alias[4];
$Title_In_image_changes_inenglish=$inenglish[4];
$Title_In_image_changes_ingerman=$ingerman[4];


if(isset($_POST['submit']))
{
    $alias_name = $_POST['alias_name'];
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);

    for($i=0;$i<$count;$i++){
      $update_inenglish=mysqli_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_escape_string($conn,$ingerman[$i]);
       $update_alias=mysqli_escape_string($conn,$alias_name[$i]);
$created=time();
// echo $update_alias.'<br>'.'next';
// echo $update_inenglish.'<br>'.'next';
// echo $update_ingerman.'<br>'.'next';
  $query = "SELECT * FROM page_content_translation WHERE alias='$update_alias'"; 

 $run=mysqli_query($conn,$query);
$rowCount = mysqli_num_rows($run);

   $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
   $conn->query($update);


  }
    echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=Footer_page_all';</script>"; 
}

}
elseif($value2 =='first_aid_page'){
  
    
  $query = "SELECT * FROM page_content_translation WHERE selected_page='first_aid_page'";


//print_r($query); die;

 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
   while ($row = mysqli_fetch_assoc($run))
  {
    $result[] = $row;
    $alias = array_column($result, 'alias');
    $inenglish = array_column($result, 'inenglish');
    $ingerman = array_column($result, 'ingerman');
  }
/*    [0] => _First_Aid_Course_Aargau_Title_
    [1] => _Study_Show_Over_title_
    [2] => _Aid_course_prerequisite_title_
    [3] => _first_aid_page_Important_Title_
    [4] => _first_aid_course_online_Title_
    [5] => We_offer_the_first_aid_title_
    [6] => _first_aid_learn_how_to_provide_title_
    [7] => first_aid_we_Say_title_
    [8] => _first_aid_if_you_taking_course_title_
    [9] => _first_aid_easily_online_title_
    [10] => _First_Aid_Page_Title_
    [11] => _First_Aid_Page_banner_desc
    [12] => First_Aid_Page_Submit_Button
    [13] => First_Aid_Page_file_upload
    [14] => First_Aid_Page_image_content
    [15] => _first_aid_dusty_first_aid_course_Title_*/

  $firstaid_banner_title_alias = $alias[0];
  $firstaid_study_desc_alias = $alias[1];

  $firstaid_banner_part_1_alias = $alias[5];
  $firstaid_banner_part_2_alias = $alias[1];
  $firstaid_banner_part_3_alias = $alias[2];

  $firstaid_image_part_1_alias = $alias[15];
  $firstaid_image_part_2_alias = $alias[6];
  $firstaid_image_part_3_alias = $alias[3];

  $firstaid_footer_part_1_alias = $alias[4];
  $firstaid_footer_part_2_alias = $alias[9];
  $firstaid_footer_part_3_alias = $alias[12];







 // $easily_online_title = $alias[2];
 // $Banner_title = $alias[3];
 // $Banner_desc = $alias[4];



  $firstaid_banner_title_alias_inenglish = $inenglish[0];
  $firstaid_study_desc_alias_inenglish = $inenglish[1];

  $firstaid_banner_part_1_alias_inenglish = $inenglish[5];
  $firstaid_banner_part_2_alias_inenglish = $inenglish[1];
  $firstaid_banner_part_3_alias_inenglish = $inenglish[2];

  $firstaid_image_part_1_alias_inenglish = $inenglish[15];
  $firstaid_image_part_2_alias_inenglish = $inenglish[6];
  $firstaid_image_part_3_alias_inenglish = $inenglish[3];

  $firstaid_footer_part_1_alias_inenglish = $inenglish[4];
  $firstaid_footer_part_2_alias_inenglish = $inenglish[9];
  $firstaid_footer_part_3_alias_inenglish = $inenglish[12];



  $firstaid_banner_title_alias_ingerman = $ingerman[0];
  $firstaid_study_desc_alias_ingerman = $ingerman[1];
  $firstaid_banner_part_1_alias_ingerman = $ingerman[5];
  $firstaid_banner_part_2_alias_ingerman = $ingerman[1];
  $firstaid_banner_part_3_alias_ingerman = $ingerman[2];

  $firstaid_image_part_1_alias_ingerman = $ingerman[15];
  $firstaid_image_part_2_alias_ingerman = $ingerman[6];
  $firstaid_image_part_3_alias_ingerman = $ingerman[3];

  $firstaid_footer_part_1_alias_ingerman = $ingerman[4];
  $firstaid_footer_part_2_alias_ingerman = $ingerman[9];
  $firstaid_footer_part_3_alias_ingerman = $ingerman[12];




/*
  $firstaid_banner_title_inenglish = $inenglish[0];
  $Easily_Online_Title_inenglish = $inenglish[1];
  $easily_online_title_inenglish = $inenglish[2];
  $Banner_title_inenglish = $inenglish[3];

  $Banner_desc_part_1_inenglish = $inenglish[4];
  $Banner_desc_part_2_inenglish = $inenglish[1];
  $Banner_desc_part_3_inenglish = $inenglish[2];

  $Image_below_desc_inenglish = $inenglish[5];

  $First_Aid_Page_Submit_Button_inenglish =$inenglish[5];
  $First_Aid_Page_file_upload_inenglish=$inenglish[6];
  $First_Aid_Page_image_content_inenglish=$inenglish[7];



   $firstaid_banner_title_ingerman = $ingerman[0];
  $Easily_Online_Title_ingerman = $ingerman[1];
  $easily_online_title_ingerman = $ingerman[2];
  $Banner_title_ingerman = $ingerman[3];
  $Banner_desc_ingerman = $ingerman[4];
  $Image_below_desc_ingerman = $ingerman[5];
  $First_Aid_Page_Submit_Button_ingerman =$ingerman[5];
  $First_Aid_Page_file_upload_ingerman=$ingerman[6];
  $First_Aid_Page_image_content_ingerman=$ingerman[7];

*/

 /* print_r($alias);
  echo "++++++++";
  print_r($inenglish);
  print_r($ingerman);
die;
*/

 



if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  $inenglish = $_POST['inenglish']; 
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  
  $image = $_FILES['image']['name'];
  $target_dir='images/';
  $targetFilePath = $target_dir . basename($_FILES['image']['name']);
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

  $allowTypes = array('jpg','png','jpeg','gif','pdf');

 
     
  for($i=0;$i<$count;$i++){
       $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

       $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";

       $conn->query($update);
  } //for loop end
   echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=first_aid_page';</script>";
}
  
}
elseif($value2 =='Footer_page'){
  
    
  $query = "SELECT * FROM page_content_translation WHERE selected_page='Footer_page'";


// print_r($query); die;

 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
$inenglish = array_column($result, 'inenglish');
$ingerman = array_column($result, 'ingerman');




}
$firstaid_banner_title = $alias[0];
$Easily_Online_Title = $alias[1];


$firstaid_banner_title_inenglish = $inenglish[0];
$Easily_Online_Title_inenglish = $inenglish[1];



$firstaid_banner_title_ingerman = $ingerman[0];
$Easily_Online_Title_ingerman = $ingerman[1];



if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  $inenglish = $_POST['inenglish']; 
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  
  $image = $_FILES['image']['name'];
    $target_dir='images/';
    $targetFilePath = $target_dir . basename($_FILES['image']['name']);
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 $allowTypes = array('jpg','png','jpeg','gif','pdf');

 
     
  for($i=0;$i<$count;$i++){
      $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

 

 $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
//echo $update.'<br>'.'next';


  } //for loop end
  

    echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=first_aid_page';</script>";


}
  
}
elseif($value2 =='process'){
  
  
  $query = "SELECT * FROM page_content_translation WHERE selected_page='process'"; 


//print_r($query); die;

 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
// print_r($alias);
$inenglish = array_column($result, 'inenglish');
// print_r($inenglish);
$ingerman = array_column($result, 'ingerman');


}


//print_r($inenglish); 


$_Our_process_Title_ = $alias[0];
$_driving_school_title_ = $alias[1];
$_Requirement_learning_title_ = $alias[2];
$_Learning_driving_license_title_ = $alias[3];
$_download_forms_title_ = $alias[4];
$_Trial_lesson_title_ = $alias[5];
$_Arrange_trial_lesson_title_ = $alias[6];
$_Double_lessons_accompany_title_ = $alias[7];
$_Driving_Lessons_title_ = $alias[8];
$_driving_school_agrgur_title_ = $alias[9];
$_advanced_training_title_ = $alias[10];
$_book_now_title_ = $alias[11];
$process_course_title = $alias[12];
$First_Aid_Course_Title_ = $alias[13];
$VKU = $alias[14];
$button1 = $alias[15];
$button2 = $alias[16];
$button3 = $alias[17];
$button4 = $alias[18];
$button5 = $alias[19];
$button6 = $alias[20];


$_Our_process_Title_inenglish = $inenglish[0];
$_driving_school_title_inenglish = $inenglish[1];
$_Requirement_learning_title_inenglish = $inenglish[2];
$_Learning_driving_license_title_inenglish = $inenglish[3];
$_download_forms_title_inenglish = $inenglish[4];
$_Trial_lesson_title_inenglish = $inenglish[5];
$_Arrange_trial_lesson_title_inenglish = $inenglish[6];
$_Double_lessons_accompany_title_inenglish = $inenglish[7];
$_Driving_Lessons_title_inenglish = $inenglish[8];
$_driving_school_agrgur_title_inenglish = $inenglish[9];
$_advanced_training_title_inenglish = $inenglish[10];
$_book_now_title_inenglish = $inenglish[11];
$process_course_title_inenglish = $inenglish[12];
$First_Aid_Course_Title_inenglish = $inenglish[13];
$VKU_inenglish = $inenglish[14];
$button1_inenglish = $inenglish[15];
$button2_inenglish = $inenglish[16];
$button3_inenglish = $inenglish[17];
$button4_inenglish = $inenglish[18];
$button5_inenglish = $inenglish[19];
$button6_inenglish = $inenglish[20];


$_Our_process_Title_ingerman = $ingerman[0];
$_driving_school_title_ingerman = $ingerman[1];
$_Requirement_learning_title_ingerman = $ingerman[2];
$_Learning_driving_license_title_ingerman = $ingerman[3];
$_download_forms_title_ingerman = $ingerman[4];
$_Trial_lesson_title_ingerman = $ingerman[5];
$_Arrange_trial_lesson_ingerman = $ingerman[6];
$_Double_lessons_accompany_ingerman = $ingerman[7];
$_Driving_Lessons_title_ingerman = $ingerman[8];
$_driving_school_agrgur_title_ingerman = $ingerman[9];
$_advanced_training_title_ingerman = $ingerman[10];
$_book_now_title_ingerman = $ingerman[11];
$process_course_title_ingerman = $ingerman[12];
$First_Aid_Course_Title_ingerman = $ingerman[13];
$VKU_ingerman = $ingerman[14];
$button1_ingerman = $ingerman[15];
$button2_ingerman = $ingerman[16];
$button3_ingerman = $ingerman[17];
$button4_ingerman = $ingerman[18];
$button5_ingerman = $ingerman[19];
$button6_ingerman = $ingerman[20];



if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  
  $image = $_FILES['image']['name'];
    $target_dir='images/';
    $targetFilePath = $target_dir . basename($_FILES['image']['name']);
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 $allowTypes = array('jpg','png','jpeg','gif','pdf');

 
     
  for($i=0;$i<$count;$i++){
       $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

 

 $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
  echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=process';</script>";

 
 if ($conn->query($update) === TRUE) {
}



  } //for loop end
  

  

}
  
}

elseif($value2 =='price'){

 $query = "SELECT * FROM page_content_translation WHERE selected_page='price'"; 


 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
$inenglish = array_column($result, 'inenglish');
$ingerman = array_column($result, 'ingerman');

// print_r($alias);


}
foreach ($alias as $key => $value) {
 // print_r($value.'oooo'.$key);
}

$titleInAlias=$alias[0];
$titleInEnglish=$inenglish[0];
$titleInGerman = $ingerman[0];

$driveInAlias=$alias[34];
$driveInEnglish=$inenglish[34];
$driveInGerman = $ingerman[34];

$payInAlias=$alias[1];
$payInEnglish=$inenglish[1];
$payInGerman = $ingerman[1];

$descInAlias=$alias[36];
$descInEnglish=$inenglish[36];
$descInGerman = $ingerman[36];




if(isset($_POST['submit']))
{
    $alias_name = $_POST['alias_name'];
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);

    for($i=0;$i<$count;$i++){
      $update_inenglish=mysqli_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_escape_string($conn,$ingerman[$i]);
       $update_alias=mysqli_escape_string($conn,$alias_name[$i]);
$created=time();
// echo $update_alias.'<br>'.'next';
// echo $update_inenglish.'<br>'.'next';
// echo $update_ingerman.'<br>'.'next';
  $query = "SELECT * FROM page_content_translation WHERE alias='$update_alias'"; 

 $run=mysqli_query($conn,$query);
$rowCount = mysqli_num_rows($run);
if ($rowCount==0) {
     $insert =  "INSERT INTO `page_content_translation`(`selected_page`, `selected_section`, `pageid`, `alias`, `inenglish`, `ingerman`, `created`) VALUES ('price','','8','$update_alias','$update_inenglish','$update_ingerman','$created')";
   $conn->query($insert);
}else{
   $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
   $conn->query($update);
}

  }
    echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=price';</script>";
}

}
//  <!------ ABOUT US PAGE ------>

elseif($value2 =='about_us_page'){
  
  
  $query = "SELECT * FROM page_content_translation WHERE selected_page='about_us_page'"; 


//print_r($query); die;

 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
// print_r($alias);
$inenglish = array_column($result, 'inenglish');
// print_r($inenglish);
$ingerman = array_column($result, 'ingerman');


}
/*
print_r($alias);
print_r($inenglish);
print_r($ingerman);
die;*/

$about_us_page_Title = $alias[0];
$heading_1_title = $alias[1];
//print_r(); die;

$heading_1_desc = $alias[2];
$heading_2_title = $alias[3];
$heading_2_desc = $alias[4];

$mige_name_title = $alias[5];
$mige_name_desc = $alias[6];
$mige_email = $alias[27];
$mige_phone_no = $alias[28];
$mige_photo = $alias[49];

$gianni_name_title = $alias[7];
$gianni_name_desc = $alias[8];
$gianni_email = $alias[29];
$gianni_phone_no = $alias[30];
$gianni_photo = $alias[50];

$franky_name_title = $alias[9];
$franky_name_desc = $alias[10];
$franky_email = $alias[31];
$franky_phone_no = $alias[32];
$franky_photo = $alias[51];

$mateen_name_title = $alias[11];
$mateen_name_desc = $alias[12];
$mateen_email = $alias[33];
$mateen_phone_no = $alias[34];
$mateen_photo = $alias[52];

$nidi_name_title = $alias[13];
$nidi_name_desc = $alias[14];
$nidi_email = $alias[35];
$nidi_phone_no = $alias[36];
$nidi_photo = $alias[53];

$andrea = $alias[15];
$andrea_desc = $alias[16];
$andrea_email = $alias[37];
$andrea_phone_no = $alias[38];
$andrea_photo = $alias[54];

$barol = $alias[17];
$barol_desc = $alias[18];
$barol_email = $alias[39];
$barol_phone_no = $alias[40];
$barol_photo = $alias[55];

$desiree = $alias[19];
$desiree_desc = $alias[20];
$desiree_email = $alias[41];
$desiree_phone_no = $alias[42];
$desiree_photo = $alias[56];

$mateen2 = $alias[21];
$mateen2_desc = $alias[22];
$mateen2_email = $alias[43];
$mateen2_phone_no = $alias[44];
$mateen2_photo = $alias[57];

$roman1 = $alias[23];
$roman1_desc = $alias[25];
$roman1_email = $alias[45];
$roman1_phone_no = $alias[46];
$roman1_photo = $alias[58];

$roman2 = $alias[24];
$roman2_desc = $alias[26];
$roman2_email = $alias[47];
$roman2_phone_no = $alias[48];
$roman2_photo = $alias[59];


$man = $alias[60];
$man_desc = $alias[61];
$man_email = $alias[62];
$man_phone_no = $alias[63];
$man_photo = $alias[64];

$girl = $alias[65];
$girl_desc = $alias[66];
$girl_email = $alias[67];
$girl_phone_no = $alias[68];
$girl_photo = $alias[69];




$about_us_page_Title_inenglish = $inenglish[0];
$heading_1_title_inenglish = $inenglish[1];
$heading_1_desc_inenglish = $inenglish[2];
$heading_2_title_inenglish = $inenglish[3];
$heading_2_desc_inenglish = $inenglish[4];

$mige_name_title_inenglish = $inenglish[5];
$mige_name_desc_inenglish = $inenglish[6];
$mige_email_inenglish = $inenglish[27];
$mige_phone_no_inenglish = $inenglish[28];
$mige_photo_inenglish = $inenglish[49];

$gianni_name_title_inenglish = $inenglish[7];
$gianni_name_desc_inenglish = $inenglish[8];
$gianni_email_inenglish = $inenglish[29];
$gianni_phone_no_inenglish = $inenglish[30];
$gianni_photo_inenglish = $inenglish[50];

$franky_name_title_inenglish = $inenglish[9];
$franky_name_desc_inenglish = $inenglish[10];
$franky_email_inenglish = $inenglish[31];
$franky_phone_no_inenglish = $inenglish[32];
$franky_photo_inenglish = $inenglish[51];

$mateen_name_title_inenglish = $inenglish[11];
$mateen_name_desc_inenglish = $inenglish[12];
$mateen_email_inenglish = $inenglish[33];
$mateen_phone_no_inenglish = $inenglish[34];
$mateen_photo_inenglish = $inenglish[52];

$nidi_name_title_inenglish = $inenglish[13];
$nidi_name_desc_inenglish = $inenglish[14];
$nidi_email_inenglish = $inenglish[35];
$nidi_phone_no_inenglish = $inenglish[36];
$nidi_photo_inenglish = $inenglish[53];

$andrea_inenglish = $inenglish[15];
$andrea_desc_inenglish = $inenglish[16];
$andrea_email_inenglish = $inenglish[37];
$andrea_phone_no_inenglish = $inenglish[38];
$andrea_photo_inenglish = $inenglish[54];

$barol_inenglish = $inenglish[17];
$barol_desc_inenglish = $inenglish[18];
$barol_email_inenglish = $inenglish[39];
$barol_phone_no_inenglish = $inenglish[40];
$barol_photo_inenglish = $inenglish[55];

$desiree_inenglish = $inenglish[19];
$desiree_desc_inenglish = $inenglish[20];
$desiree_email_inenglish = $inenglish[41];
$desiree_phone_no_inenglish = $inenglish[42];
$desiree_photo_inenglish = $inenglish[56];

$mateen2_inenglish = $inenglish[21];
$mateen2_desc_inenglish = $inenglish[22];
$mateen2_email_inenglish = $inenglish[43];
$mateen2_phone_no_inenglish = $inenglish[44];
$mateen2_photo_inenglish = $inenglish[57];

$roman1_inenglish = $inenglish[23];
$roman1_desc_inenglish = $inenglish[25];
$roman1_email_inenglish = $inenglish[45];
$roman1_phone_no_inenglish = $inenglish[46];
$roman1_photo_inenglish = $inenglish[58];

$roman2_inenglish = $inenglish[24];
$roman2_desc_inenglish = $inenglish[26];
$roman2_email_inenglish = $inenglish[47];
$roman2_phone_no_inenglish = $inenglish[48];
$roman2_photo_inenglish = $inenglish[59];


$man_inenglish = $inenglish[60];
$man_desc_inenglish = $inenglish[61];
$man_email_inenglish = $inenglish[62];
$man_phone_no_inenglish = $inenglish[63];
$man_photo_inenglish = $inenglish[64];

$girl_inenglish = $inenglish[65];
$girl_desc_inenglish = $inenglish[66];
$girl_email_inenglish = $inenglish[67];
$girl_phone_no_inenglish = $inenglish[68];
$girl_photo_inenglish = $inenglish[69];





$about_us_page_Title_ingerman = $ingerman[0];
$heading_1_title_ingerman = $ingerman[1];
$heading_1_desc_ingerman = $ingerman[2];
$heading_2_title_ingerman = $ingerman[3];
$heading_2_desc_ingerman = $ingerman[4];

$mige_name_title_ingerman = $ingerman[5];
$mige_name_desc_ingerman = $ingerman[6];
$mige_email_ingerman = $ingerman[27];
$mige_phone_no_ingerman = $ingerman[28];
$mige_photo_ingerman = $ingerman[49];

$gianni_name_title_ingerman = $ingerman[7];
$gianni_name_desc_ingerman = $ingerman[8];
$gianni_email_ingerman = $ingerman[29];
$gianni_phone_no_ingerman = $ingerman[30];
$gianni_photo_ingerman = $ingerman[50];

$franky_name_title_ingerman = $ingerman[9];
$franky_name_desc_ingerman = $ingerman[10];
$franky_email_ingerman = $ingerman[31];
$franky_phone_no_ingerman = $ingerman[32];
$franky_photo_ingerman = $ingerman[51];

$mateen_name_title_ingerman = $ingerman[11];
$mateen_name_desc_ingerman = $ingerman[12];
$mateen_email_ingerman = $ingerman[33];
$mateen_phone_no_ingerman = $ingerman[34];
$mateen_photo_ingerman = $ingerman[52];

$nidi_name_title_ingerman = $ingerman[13];
$nidi_name_desc_ingerman = $ingerman[14];
$nidi_email_ingerman = $ingerman[35];
$nidi_phone_no_ingerman = $ingerman[36];
$nidi_photo_ingerman = $ingerman[53];

$andrea_ingerman = $ingerman[15];
$andrea_desc_ingerman = $ingerman[16];
$andrea_email_ingerman = $ingerman[37];
$andrea_phone_no_ingerman = $ingerman[38];
$andrea_photo_ingerman = $ingerman[54];

$barol_ingerman = $ingerman[17];
$barol_desc_ingerman = $ingerman[18];
$barol_email_ingerman = $ingerman[39];
$barol_phone_no_ingerman = $ingerman[40];
$barol_photo_ingerman = $ingerman[55];

$desiree_ingerman = $ingerman[19];
$desiree_desc_ingerman = $ingerman[20];
$desiree_email_ingerman = $ingerman[41];
$desiree_phone_no_ingerman = $ingerman[42];
$desiree_photo_ingerman = $ingerman[56];

$mateen2_ingerman = $ingerman[21];
$mateen2_desc_ingerman = $ingerman[22];
$mateen2_email_ingerman = $ingerman[43];
$mateen2_phone_no_ingerman = $ingerman[44];
$mateen2_photo_ingerman = $ingerman[57];

$roman1_ingerman = $ingerman[23];
$roman1_desc_ingerman = $ingerman[25];
$roman1_email_ingerman = $ingerman[45];
$roman1_phone_no_ingerman = $ingerman[46];
$roman1_photo_ingerman = $ingerman[58];

$roman2_ingerman = $ingerman[24];
$roman2_desc_ingerman = $ingerman[26];
$roman2_email_ingerman = $ingerman[47];
$roman2_phone_no_ingerman = $ingerman[48];
$roman2_photo_ingerman = $ingerman[59];

$man_ingerman = $ingerman[60];
$man_desc_ingerman = $ingerman[61];
$man_email_ingerman = $ingerman[62];
$man_phone_no_ingerman = $ingerman[63];
$man_photo_ingerman = $ingerman[64];

$girl_ingerman = $ingerman[65];
$girl_desc_ingerman = $ingerman[66];
$girl_email_ingerman = $ingerman[67];
$girl_phone_no_ingerman = $ingerman[68];
$girl_photo_ingerman = $ingerman[69];




if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  


 if($_FILES['_Team1_photo_']['name']){
   // print_r($_FILES);die;
    $target_dir='../../images/team_new/';
    $targetFilePath = $target_dir . basename($_FILES['_Team1_photo_']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    move_uploaded_file($_FILES["_Team1_photo_"]["tmp_name"], $targetFilePath);
    $update_alias = '_Team1_photo_';
    $update_inenglish = basename($_FILES['_Team1_photo_']['name']);
    $update_ingerman = basename($_FILES['_Team1_photo_']['name']);
    $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
     $conn->query($update);

   }

   if($_FILES['_Team2_photo_']['name']){
    $target_dir='../../images/team_new/';
    $targetFilePath = $target_dir . basename($_FILES['_Team2_photo_']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["_Team2_photo_"]["tmp_name"], $targetFilePath);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    $update_alias = '_Team2_photo_';
    $update_inenglish = basename($_FILES['_Team2_photo_']['name']);
    $update_ingerman = basename($_FILES['_Team2_photo_']['name']);
    $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
     $conn->query($update);

   }
   if($_FILES['_Team3_photo_']['name']){
    $target_dir='../../images/team_new/';
    $targetFilePath = $target_dir . basename($_FILES['_Team3_photo_']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["_Team3_photo_"]["tmp_name"], $targetFilePath);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    $update_alias = '_Team3_photo_';
    $update_inenglish = basename($_FILES['_Team3_photo_']['name']);
    $update_ingerman = basename($_FILES['_Team3_photo_']['name']);
    $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
     $conn->query($update);
    
   }
   if($_FILES['_Team4_photo_']['name']){
    $target_dir='../../images/team_new/';
    $targetFilePath = $target_dir . basename($_FILES['_Team4_photo_']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["_Team4_photo_"]["tmp_name"], $targetFilePath);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    $update_alias = '_Team4_photo_';
    $update_inenglish = basename($_FILES['_Team4_photo_']['name']);
    $update_ingerman = basename($_FILES['_Team4_photo_']['name']);
    $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
     $conn->query($update);
    
   }
   if($_FILES['_Team5_photo_']['name']){
    
    $target_dir='../../images/team_new/';
    $targetFilePath = $target_dir . basename($_FILES['_Team5_photo_']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["_Team5_photo_"]["tmp_name"], $targetFilePath);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    $update_alias = '_Team5_photo_';
    $update_inenglish = basename($_FILES['_Team5_photo_']['name']);
    $update_ingerman = basename($_FILES['_Team5_photo_']['name']);
    $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
     $conn->query($update);
   }
   if($_FILES['_Team6_photo_']['name']){
    $target_dir='../../images/team_new/';
    $targetFilePath = $target_dir . basename($_FILES['_Team6_photo_']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["_Team6_photo_"]["tmp_name"], $targetFilePath);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    $update_alias = '_Team6_photo_';
    $update_inenglish = basename($_FILES['_Team6_photo_']['name']);
    $update_ingerman = basename($_FILES['_Team6_photo_']['name']);
    $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
     $conn->query($update);
    
   }
   if($_FILES['_Team7_photo_']['name']){
    $target_dir='../../images/team_new/';
    $targetFilePath = $target_dir . basename($_FILES['_Team7_photo_']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["_Team7_photo_"]["tmp_name"], $targetFilePath);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    $update_alias = '_Team7_photo_';
    $update_inenglish = basename($_FILES['_Team7_photo_']['name']);
    $update_ingerman = basename($_FILES['_Team7_photo_']['name']);
    $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
     $conn->query($update);
    
   }
   if($_FILES['_Team8_photo_']['name']){
    $target_dir='../../images/team_new/';
    $targetFilePath = $target_dir . basename($_FILES['_Team8_photo_']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["_Team8_photo_"]["tmp_name"], $targetFilePath);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    $update_alias = '_Team8_photo_';
    $update_inenglish = basename($_FILES['_Team8_photo_']['name']);
    $update_ingerman = basename($_FILES['_Team8_photo_']['name']);
    $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
     $conn->query($update);
    
   }
   if($_FILES['_Team9_photo_']['name']){
    $target_dir='../../images/team_new/';
    $targetFilePath = $target_dir . basename($_FILES['_Team9_photo_']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["_Team9_photo_"]["tmp_name"], $targetFilePath);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    $update_alias = '_Team9_photo_';
    $update_inenglish = basename($_FILES['_Team9_photo_']['name']);
    $update_ingerman = basename($_FILES['_Team9_photo_']['name']);
    $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
     $conn->query($update);
    
   }
   if($_FILES['_Team10_photo_']['name']){
    $target_dir='../../images/team_new/';
    $targetFilePath = $target_dir . basename($_FILES['_Team10_photo_']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["_Team10_photo_"]["tmp_name"], $targetFilePath);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    $update_alias = '_Team10_photo_';
    $update_inenglish = basename($_FILES['_Team10_photo_']['name']);
    $update_ingerman = basename($_FILES['_Team10_photo_']['name']);
    $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
     $conn->query($update);
    
   }if($_FILES['_Team11_photo_']['name']){
    $target_dir='../../images/team_new/';
    $targetFilePath = $target_dir . basename($_FILES['_Team11_photo_']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["_Team11_photo_"]["tmp_name"], $targetFilePath);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    $update_alias = '_Team11_photo_';
    $update_inenglish = basename($_FILES['_Team11_photo_']['name']);
    $update_ingerman = basename($_FILES['_Team11_photo_']['name']);
    $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
     $conn->query($update);
   }



if($_FILES['_Team12_photo_']['name']){
    $target_dir='../../images/team_new/';
    $targetFilePath = $target_dir . basename($_FILES['_Team12_photo_']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["_Team12_photo_"]["tmp_name"], $targetFilePath);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    $update_alias = '_Team12_photo_';
    $update_inenglish = basename($_FILES['_Team12_photo_']['name']);
    $update_ingerman = basename($_FILES['_Team12_photo_']['name']);
    $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
     $conn->query($update);
   }

if($_FILES['_Team13_photo_']['name']){
    $target_dir='../../images/team_new/';
    $targetFilePath = $target_dir . basename($_FILES['_Team13_photo_']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["_Team13_photo_"]["tmp_name"], $targetFilePath);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    $update_alias = '_Team13_photo_';
    $update_inenglish = basename($_FILES['_Team13_photo_']['name']);
    $update_ingerman = basename($_FILES['_Team13_photo_']['name']);
    $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
     $conn->query($update);
   }



 
     $update_inenglish = "";
     $update_ingerman = "";
     $update_alias = "";
      for($i=0;$i<$count;$i++){


       $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

    

         $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
         /*if($update_alias=='_Team1_phone_no_'){
            print_r($update);die;
        }*/
         $conn->query($update);



  } //for loop end

   echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=about_us_page';</script>";
}
  
}
elseif($value2 =='contact'){
  
 $query = "SELECT * FROM page_content_translation WHERE selected_page='contact'"; 


//print_r($query); die;

 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
// print_r($alias);
$inenglish = array_column($result, 'inenglish');
// print_r($inenglish);
$ingerman = array_column($result, 'ingerman');
// print_r($ingerman);


}/*
print_r($alias);
print_r($inenglish);die;*/
$email4 = $alias[0];
$_Hauptlin_Ducati_title_ = $alias[1];
$_Zurich_title_ = $alias[2];
$_Wettingen_title_ = $alias[3];
$_contact_Title_ = $alias[4];
$email1 = $alias[5];
$email2 = $alias[6];
$email3 = $alias[7];
$contact_no_1 = $alias[8];
$contact_no_2 = $alias[9];
$contact_no_3 = $alias[10];
$contact_no_4 = $alias[11];
$_website_ = $alias[12];
$text_contact_ = $alias[13];
$_contact_sub_Title_ = $alias[14];

$_Contact_Name_Title_ = $alias[15];
$_Contact_email_title_ = $alias[16];
$_Contact_Subject_Title_ = $alias[17];
$_Contact_Phone_Number_Title_ = $alias[18];
$_Contact_Message_Title_ = $alias[19];
$_Contact_Send_messages_title_ = $alias[20];



$email4_inenglish = $inenglish[0];
$_Hauptlin_Ducati_title_inenglish = $inenglish[1];
$_Zurich_title_inenglish = $inenglish[2];
$_Wettingen_title_inenglish = $inenglish[3];
$_contact_Title_inenglish = $inenglish[4];
$email1_inenglish = $inenglish[5];
$email2_inenglish = $inenglish[6];
$email3_inenglish = $inenglish[7];
$contact_no_1_inenglish = $inenglish[8];
$contact_no_2_inenglish = $inenglish[9];
$contact_no_3_inenglish = $inenglish[10];
$contact_no_4_inenglish = $inenglish[11];
$_website_inenglish = $inenglish[12];
$text_contact_inenglish = $inenglish[13];
$_contact_sub_Title_inenglish = $inenglish[14];

$_Contact_Name_Title_inenglish = $inenglish[15];
$_Contact_email_title_inenglish = $inenglish[16];
$_Contact_Subject_Title_inenglish = $inenglish[17];
$_Contact_Phone_Number_Title_inenglish = $inenglish[18];
$_Contact_Message_Title_inenglish = $inenglish[19];
$_Contact_Send_messages_title_inenglish = $inenglish[20];



$email4_ingerman = $ingerman[0];
$_Hauptlin_Ducati_title_ingerman = $ingerman[1];
$_Zurich_title_ingerman = $ingerman[2];
$_Wettingen_title_ingerman = $ingerman[3];
$_contact_Title_ingerman = $ingerman[4];
$email1_ingerman = $ingerman[5];
$email2_ingerman = $ingerman[6];
$email3_ingerman = $ingerman[7];
$contact_no_1_ingerman = $ingerman[8];
$contact_no_2_ingerman = $ingerman[9];
$contact_no_3_ingerman = $ingerman[10];
$contact_no_4_ingerman = $ingerman[11];
$_website_ingerman = $ingerman[12];
$text_contact_ingerman = $ingerman[13];
$_contact_sub_Title_ingerman = $ingerman[14];


$_Contact_Name_Title_ingerman = $ingerman[15];
$_Contact_email_title_ingerman = $ingerman[16];
$_Contact_Subject_Title_ingerman = $ingerman[17];
$_Contact_Phone_Number_Title_ingerman = $ingerman[18];
$_Contact_Message_Title_ingerman = $ingerman[19];
$_Contact_Send_messages_title_ingerman = $ingerman[20];


if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);

 
     
  for($i=0;$i<$count;$i++){
      $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

 

 $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
// print_r($update);
  echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=contact';</script>";

 
 if ($conn->query($update) === TRUE) {
}



  } 

}
  
}

elseif($value2 =='moto'){

 $query = "SELECT * FROM page_content_translation WHERE selected_page='moto_page'"; 


 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
$inenglish = array_column($result, 'inenglish');
$ingerman = array_column($result, 'ingerman');


}


$titleInAlias=$alias[22];
$titleInEnglish=$inenglish[22];
$titleInGerman = $ingerman[22];

$shortInAlias=$alias[0];
$shortInEnglish=$inenglish[0];
$shortInGerman = $ingerman[0];

$descInAlias=$alias[23];
$descInEnglish=$inenglish[23];
$descInGerman = $ingerman[23];

$RentTitleInAlias=$alias[18];
$RentTitleInEnglish=$inenglish[18];
$RentTitleInGerman = $ingerman[18];

$RentDescInAlias=$alias[33];
$RentDescInEnglish=$inenglish[33];
$RentDescInGerman = $ingerman[33];

$bookCourseTitleInAlias=$alias[19];
$bookCourseTitleInEnglish=$inenglish[19];
$bookCourseTitleInGerman = $ingerman[19];

$bookCourseDescInAlias=$alias[20];
$bookCourseDescInEnglish=$inenglish[20];
$bookCourseDescInGerman = $ingerman[20];

$bookCourseButtonInAlias=$alias[34];
$bookCourseButtonInEnglish=$inenglish[34];
$bookCourseButtonInGerman = $ingerman[34];




if(isset($_POST['submit']))
{
  $alias_name = $_POST['alias_name'];
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);

    for($i=0;$i<$count;$i++){
        $update_inenglish=mysqli_escape_string($conn,$inenglish[$i]);
        $update_ingerman=mysqli_escape_string($conn,$ingerman[$i]);
        $update_alias=mysqli_escape_string($conn,$alias_name[$i]);
        $created=time();
        // echo $update_alias.'<br>'.'next';
        // echo $update_inenglish.'<br>'.'next';
        // echo $update_ingerman.'<br>'.'next';
        $query = "SELECT * FROM page_content_translation WHERE alias='$update_alias'"; 

        $run=mysqli_query($conn,$query);
        $rowCount = mysqli_num_rows($run);

        $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
        $conn->query($update);

   //print_r($update); echo "\n";
  }

  //die;
    echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=moto';</script>"; 
}

}

elseif($value2 =='term_and_condition'){

 $query = "SELECT * FROM page_content_translation WHERE selected_page='term_and_condition'"; 


 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
$inenglish = array_column($result, 'inenglish');
$ingerman = array_column($result, 'ingerman');


}

// print_r($alias);
// print_r($inenglish);



 foreach ($ingerman as $key2 => $value2) {
 // echo $value2 .'<br>';
 // echo $key2 .'<br>';
}


$titleInAlias=$alias[0];
$titleInEnglish=$inenglish[0];
$titleInGerman = $ingerman[0];



if(isset($_POST['submit']))
{
    $alias_name = $_POST['alias_name'];
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);

    for($i=0;$i<$count;$i++){
      $update_inenglish=mysqli_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_escape_string($conn,$ingerman[$i]);
       $update_alias=mysqli_escape_string($conn,$alias_name[$i]);
$created=time();
// echo $update_alias.'<br>'.'next';
// echo $update_inenglish.'<br>'.'next';
// echo $update_ingerman.'<br>'.'next';
  $query = "SELECT * FROM page_content_translation WHERE alias='$update_alias'"; 

 $run=mysqli_query($conn,$query);
$rowCount = mysqli_num_rows($run);
if ($rowCount==0) {
     $insert =  "INSERT INTO `page_content_translation`(`selected_page`, `selected_section`, `pageid`, `alias`, `inenglish`, `ingerman`, `created`) VALUES ('term_and_condition','','0','$update_alias','$update_inenglish','$update_ingerman','$created')";
   $conn->query($insert);
}else{
   $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
   $conn->query($update);
}



  }
    echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=term_and_condition';</script>"; 
}

}
elseif($value2 =='Privacy_page')
{

  $query = "SELECT * FROM page_content_translation WHERE selected_page='Privacy_page'"; 


 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
$inenglish = array_column($result, 'inenglish');
$ingerman = array_column($result, 'ingerman');


}
 
$privacy_title=$alias[0];
//print_r($privacy_title);die;
$desc_title = $alias[1];
$Privacy_Description= $alias[2];
// // $contact = $alias[3];
// // $more = $alias[4];
// // $image = $alias[5];
// $welcome_inenglish = $inenglish[0];
// $desc_inenglish = $inenglish[1];
// $reg_inenglish = $inenglish[2];
// $contact_inenglish = $inenglish[3];
// $more_inenglish = $inenglish[4];
// $image_inenglish = $inenglish[5];
$privacy_title_inenglish=$inenglish[0];
$desc_title_inenglish=$inenglish[1];
$Privacy_Description_inenglish=$inenglish[2];

// $welcome_ingerman = $ingerman[0];
// $desc_ingerman = $ingerman[1];
// $reg_ingerman = $ingerman[2];
// $contact_ingerman = $ingerman[3];
// $more_ingerman = $ingerman[4];
// $image_ingerman = $ingerman[5];
$privacy_title_ingerman=$ingerman[0];
$desc_title_ingerman=$ingerman[1];
$Privacy_Description_ingerman=$ingerman[2];

if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  //print_r($alias_name); die;
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  
  $image = $_FILES['image']['name'];
    $target_dir='images/';
    $targetFilePath = $target_dir . basename($_FILES['image']['name']);
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 $allowTypes = array('jpg','png','jpeg','gif','pdf');
 
 if($image){
      $img_value=$image . uniqid().'.jpg';
  }
 // print_r($img_value); die;


     
  for($i=0;$i<$count;$i++){
      $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

 if($update_alias=="vku_background_image")
 {
 if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$img_value)){  
       
   
   $update =  "UPDATE page_content_translation set inenglish='$img_value',ingerman='$img_value' WHERE alias='vku_background_image'";
 
   }else{
     
            $statusMsg = "Sorry, there was an error uploading your file.";
        }  

//var_dump($update_image); die;
//$a = mysqli_query($conn,$update_image);  
 }
else{
 $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
  echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=Privacy_page';</script>";
}
 
 if ($conn->query($update) === TRUE) {
}



  } //for loop end
  

  

}
    
}
elseif($value2 =='legal_page')
{

  $query = "SELECT * FROM page_content_translation WHERE selected_page='legal_page'"; 


 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
$inenglish = array_column($result, 'inenglish');
$ingerman = array_column($result, 'ingerman');


}
// print_r($alias);
//  print_r($inenglish);die;

$legal_page_title=$alias[0];
$legal_page_title_label=$alias[1];
$legal_page_address_label=$alias[2];
$legal_page_phone=$alias[3];
$legal_page_texts=$alias[4];
$legal_page_email=$alias[11];
$legal_page_title2=$alias[5];
$legal_page_title5=$alias[12];
$legal_page_address2=$alias[6];
$legal_page_title3=$alias[7];
$legal_page_description3=$alias[8];
$legal_page_title4=$alias[9];
$legal_page_description4=$alias[10];

$legal_page_title_inenglish=$inenglish[0];
$legal_page_title_label_inenglish=$inenglish[1];

$legal_page_address_label_inenglish=$inenglish[2];
$legal_page_phone_inenglish=$inenglish[3];
$legal_page_texts_inenglish=$inenglish[4];
$legal_page_email_inenglish=$inenglish[11];
$legal_page_title2_inenglish=$inenglish[5];
$legal_page_title5_inenglish=$inenglish[12];
$legal_page_address2_inenglish=$inenglish[6];
$legal_page_title3_inenglish=$inenglish[7];
$legal_page_description3_inenglish=$inenglish[8];
$legal_page_title4_inenglish=$inenglish[9];
$legal_page_description4_inenglish=$inenglish[10];

$legal_page_title_ingerman=$ingerman[0];
 $legal_page_title_label_ingerman=$ingerman[1];
$legal_page_address_label_ingerman=$ingerman[2];
$legal_page_phone_ingerman=$ingerman[3];
$legal_page_texts_ingerman=$ingerman[4];
$legal_page_email_ingerman=$ingerman[11];
$legal_page_title2_ingerman=$ingerman[5];
$legal_page_title5_ingerman=$ingerman[12];
$legal_page_address2_ingerman=$ingerman[6];
$legal_page_title3_ingerman=$ingerman[7];
$legal_page_description3_ingerman=$ingerman[8];
$legal_page_title4_ingerman=$ingerman[9];
$legal_page_description4_ingerman=$ingerman[10];

if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  //print_r($alias_name); die;
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  
  $image = $_FILES['image']['name'];
    $target_dir='images/';
    $targetFilePath = $target_dir . basename($_FILES['image']['name']);
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 $allowTypes = array('jpg','png','jpeg','gif','pdf');
 
 if($image){
      $img_value=$image . uniqid().'.jpg';
  }
 // print_r($img_value); die;


     
  for($i=0;$i<$count;$i++){
      $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

 if($update_alias=="vku_background_image")
 {
 if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$img_value)){  
       
   
   $update =  "UPDATE page_content_translation set inenglish='$img_value',ingerman='$img_value' WHERE alias='vku_background_image'";
 
   }else{
     
            $statusMsg = "Sorry, there was an error uploading your file.";
        }  

//var_dump($update_image); die;
//$a = mysqli_query($conn,$update_image);  
 }
else{
 $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
  echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=legal_page';</script>";
}
 
 if ($conn->query($update) === TRUE) {
}



  } //for loop end
  

  

}
    
}
elseif($value2 =='menu_option'){
  
  
  $query = "SELECT * FROM page_content_translation WHERE selected_page='menu'"; 


//print_r($query); die;

 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
// print_r($alias);
$inenglish = array_column($result, 'inenglish');
// print_r($inenglish);
$ingerman = array_column($result, 'ingerman');


}


// print_r($alias);


$about_us_page_Title = $alias[0];
$heading_1_title = $alias[1];
//print_r(); die;

$heading_1_desc = $alias[2];
$heading_2_title = $alias[3];
$heading_2_desc = $alias[4];
$mige_name_title = $alias[5];
$mige_name_desc = $alias[6];
$gianni_name_title = $alias[7];
$gianni_name_desc = $alias[8];
$franky_name_title = $alias[9];
$franky_name_desc = $alias[10];
$mateen_name_title = $alias[11];
$mateen_name_desc = $alias[12];
$nidi_name_title = $alias[13];
$nidi_name_desc = $alias[14];
$andrea = $alias[15];
$contact = $alias[16];







$about_us_page_Title_inenglish = $inenglish[0];
$heading_1_title_inenglish = $inenglish[1];
$heading_1_desc_inenglish = $inenglish[2];
$heading_2_title_inenglish = $inenglish[3];
$heading_2_desc_inenglish = $inenglish[4];
$mige_name_title_inenglish = $inenglish[5];
$mige_name_desc_inenglish = $inenglish[6];
$gianni_name_title_inenglish = $inenglish[7];
$gianni_name_desc_inenglish = $inenglish[8];
$franky_name_title_inenglish = $inenglish[9];
$franky_name_desc_inenglish = $inenglish[10];
$mateen_name_title_inenglish = $inenglish[11];
$mateen_name_desc_inenglish = $inenglish[12];
$nidi_name_title_inenglish = $inenglish[13];
$nidi_name_desc_inenglish = $inenglish[14];
$andrea_inenglish = $inenglish[15];
$contact_inenglish = $inenglish[16];






$about_us_page_Title_ingerman = $ingerman[0];
$heading_1_title_ingerman = $ingerman[1];
$heading_1_desc_ingerman = $ingerman[2];
$heading_2_title_ingerman = $ingerman[3];
$heading_2_desc_ingerman = $ingerman[4];
$mige_name_title_ingerman = $ingerman[5];
$mige_name_desc_ingerman = $ingerman[6];
$gianni_name_title_ingerman = $ingerman[7];
$gianni_name_desc_ingerman = $ingerman[8];
$franky_name_title_ingerman = $ingerman[9];
$franky_name_desc_ingerman = $ingerman[10];
$mateen_name_title_ingerman = $ingerman[11];
$mateen_name_desc_ingerman = $ingerman[12];
$nidi_name_title_ingerman = $ingerman[13];
$nidi_name_desc_ingerman = $ingerman[14];
$andrea_ingerman = $ingerman[15];
$contact_ingerman = $ingerman[16];





if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  
  $image = $_FILES['image']['name'];
    $target_dir='images/';
    $targetFilePath = $target_dir . basename($_FILES['image']['name']);
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 $allowTypes = array('jpg','png','jpeg','gif','pdf');

 
     
  for($i=0;$i<$count;$i++){
       $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

 

 $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
  $conn->query($update);
 //echo $update.'<br>'.'next';
 
  echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=menu_option';</script>";

 


  } //for loop end
  

  

}
  
}

elseif($value2 =='Trial'){




if(isset($_POST['submit']))
{
       // print_r($_POST);die;
  $alias_name = $_POST['alias'];
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];

   $cat_alias_name = $_POST['where_do_you_alias_name'];
  $cat_inenglish = $_POST['where_to_go_inenglish'];
  $cat_ingerman = $_POST['where_to_go_ingerman'];

  $day_alias_name = $_POST['day_alias_name'];
  $day_inenglish = $_POST['day_inenglish'];
  $day_ingerman = $_POST['day_ingerman'];

 
  $slot_alias_name = $_POST['slot_alias_name'];
  $slot_inenglish = $_POST['slot_inenglish'];
  $slot_ingerman = $_POST['slot_ingerman'];
  // $stat_slot= $_POST['start_time'];
  // $$end_slot = $_POST['end_time'];

  $category_alias_name = $_POST['category_alias_name'];
  $category_inenglish = $_POST['category_inenglish'];
  $category_ingerman = $_POST['category_ingerman'];


  $count = count($_POST['alias']);
  $catcount=count($_POST['where_do_you_alias_name']);
  $daycount=count($_POST['day_alias_name']);
  $categorycount=count( $_POST['category_alias_name']);
  $slotcount=count( $_POST['slot_alias_name']);
// print_r(expression)
  $image = $_FILES['image']['name'];
  $target_dir='images/';
  $targetFilePath = $target_dir . basename($_FILES['image']['name']);
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

  $allowTypes = array('jpg','png','jpeg','gif','pdf');

 
     
  for($i=0;$i<$count;$i++){
       $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

       $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";  
       $conn->query($update);
  } //for loop end
  
   
  for($y=0;$y<$catcount;$y++){
       $update_inenglish1=mysqli_real_escape_string($conn,$cat_inenglish[$y]);
       $update_ingerman1=mysqli_real_escape_string($conn,$cat_ingerman[$y]);
       $update_alias1=$cat_alias_name[$y];
 
        $update2 =  "UPDATE trial_lesson set name='$update_inenglish1',german='$update_ingerman1' WHERE alias_name='$update_alias1'"; 
         // print_r('211');die;
        $conn->query($update2);
}


for($x=0;$x<$slotcount;$x++){
       $slot_inenglish_1=mysqli_real_escape_string($conn,$slot_inenglish[$x]);
       $slot_ingerman_1=mysqli_real_escape_string($conn,$slot_ingerman[$x]);
       $slot_alias_1=$slot_alias_name[$x];
 
      $upto =  "UPDATE trial_time_slot set day='$slot_inenglish_1',german='$slot_ingerman_1' WHERE alias='$slot_alias_1'"; 
       // print_r($upto);die;
      $conn->query($upto);
}




for($a=0;$a<$categorycount;$a++){
       $category_up1=mysqli_real_escape_string($conn,$category_inenglish[$a]);
       $category_up2=mysqli_real_escape_string($conn,$category_ingerman[$a]);
       $category_up3=$category_alias_name[$a];
 
$update2 =  "UPDATE trial_category set name='$category_up1',german='$category_up2' WHERE alias='$category_up3'"; 
 // print_r('211');die;
 $conn->query($update2);
}

for($z=0;$z<$daycount;$z++){
       $day_inenglish1=mysqli_real_escape_string($conn,$day_inenglish[$z]);
       $day_ingerman1=mysqli_real_escape_string($conn,$day_ingerman[$z]);
       $day_alias1=$day_alias_name[$z];
 // print_r($update3);die();
    $update3 =  "UPDATE trial_weekday set week_name='$day_inenglish1',week_german='$day_ingerman1' WHERE alias='$day_alias1'"; 
// print_r('fsfsf');die;
  $conn->query($update3);
 
}


  //for loop end
  
   echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url_page=Trial';</script>";

 

}



 $query = "SELECT * FROM page_content_translation WHERE selected_page='Trial'"; 

 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
  $result[] = $row;
  $alias = array_column($result, 'alias');
  $inenglish = array_column($result, 'inenglish');
  $ingerman = array_column($result, 'ingerman');
 // print_r($inenglish);
}


//print_r($alias);die;

$que= "SELECT * FROM trial_time_slot WHERE selected_page='Trial'"; 
 $runs=mysqli_query($conn,$que);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row5 = mysqli_fetch_assoc($runs))
{

 $res[] = $row5;
 $aliasslot = array_column($res,'alias');
 $inenglishslot = array_column($res,'day');
 $ingermanslot = array_column($res,'german');
}
// print_r($result3);


$query3 = "SELECT * FROM trial_weekday WHERE selected_page='Trial'"; 
// print_r($query3);

 $run3=mysqli_query($conn,$query3);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row3 = mysqli_fetch_assoc($run3))
{
 $result3[] = $row3;
 $aliasday = array_column($result3,'alias');
 $inenglishday = array_column($result3,'week_name');
 $ingermanday = array_column($result3,'week_german');
}


 $query1 = "SELECT * FROM trial_lesson WHERE selected_page='Trial'"; 


 $run1=mysqli_query($conn,$query1);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row1 = mysqli_fetch_assoc($run1))
{
 
 $result1[] = $row1;
 $aliasCat = array_column($result1,'alias_name');
 $inenglishCat = array_column($result1,'name');
 $ingermanCat = array_column($result1,'german');
}

 $que = "SELECT * FROM trial_category WHERE selected_page='Trial'"; 


 $runss=mysqli_query($conn,$que);
 
 //$row = mysqli_fetch_assoc($run);
 while ($rowss = mysqli_fetch_assoc($runss))
{
 
 $result4[] = $rowss;
 $aliasCategory = array_column($result4,'alias');
 $inenglishCategory = array_column($result4,'name');
 $ingermanCategory = array_column($result4,'german');

// print_r($inenglishCategory);


}



$title_name_in_english = $inenglish[27]; //mail title name of trial page
$name_title_in_english = $inenglish[7]; 
$email_title_in_english = $inenglish[15];
$phone_title_in_english = $inenglish[6];
$DOB_title_in_english = $inenglish[9];
$Place_to_go_title_In_English = $inenglish[3]; // titel of where do  you want
$Place_to_go_Option_1_title_In_English=$inenglish[31]; //select please option
$Place_to_go_Option_2_title_In_English=$inenglishCat[2];// option 1 of where do you want
$Place_to_go_Option_3_title_In_English=$inenglishCat[0];//option 2 of where do you want
$Place_to_go_Option_4_title_In_English=$inenglishCat[1];//option 3 of where do you want
$Place_to_go_Option_5_title_In_English=$inenglishCat[3];//option 4 of where do you want
$Category_title_In_English = $inenglish[4]; //category title
$Category_Option_1_title_In_English=$inenglish[31];//select all options in category
$Category_Option_2_title_In_English=$inenglishCategory[0];//1 option
$Category_Option_3_title_In_English=$inenglishCategory[1];//2 option
$Category_Option_4_title_In_English=$inenglishCategory[2];// 3 option
$Category_Option_5_title_In_English=$inenglishCategory[3];// 4 option
$Available_title_In_English = $inenglish[30];
$Select_days_title_In_English = $inenglish[13]; //select day
$Message_title_In_English = $inenglish[28];
$Available_Timings_Option_1_title_In_English= $inenglish[33]; // all slot select option

$Available_Timings_Option_2_title_In_English = $inenglishslot[0];// slot 1 option
$Available_Timings_Option_3_title_In_English = $inenglishslot[1];// slot 2 option
$Available_Timings_Option_4_title_In_English = $inenglishslot[2];// slot 3 option

$Select_Days_Option_1_title_In_English = $inenglish[36];//select all day option
$Select_Days_Option_2_title_In_English = $inenglishday[0];//monday option
$Select_Days_Option_3_title_In_English = $inenglishday[1];//tuesday option
$Select_Days_Option_4_title_In_English = $inenglishday[2];//wednesday option
$Select_Days_Option_5_title_In_English = $inenglishday[3];//thursday option
$Select_Days_Option_6_title_In_English = $inenglishday[4];//friday option
$Select_Days_Option_7_title_In_English = $inenglishday[5];//saturday option
$Select_Days_Option_8_title_In_English = $inenglishday[6];//sunday option
$submit_title_In_English = $inenglish[32];



$title_name_in_german = $ingerman[27];//mail title name of trial page
$name_title_in_german = $ingerman[7];
$email_title_in_german = $ingerman[15];
$phone_title_in_german = $ingerman[6];
$DOB_title_in_german = $ingerman[9];
$Place_to_go_title_In_german = $ingerman[3];// titel of where do  you want
$Place_to_go_Option_1_title_In_german= $ingerman[31];//select please option
$Place_to_go_Option_2_title_In_german= $ingermanCat[2];// option 1 of where do you want
$Place_to_go_Option_3_title_In_german= $ingermanCat[0];// option 2 of where do you want
$Place_to_go_Option_4_title_In_german= $ingermanCat[1];// option 3 of where do you want
$Place_to_go_Option_5_title_In_german= $ingermanCat[3];// option 4 of where do you want
$Category_title_In_german = $ingerman[4];//category title
$Category_Option_1_title_In_german=$ingerman[31];//select all options in category
$Category_Option_2_title_In_german=$ingermanCategory[0];//1 option
$Category_Option_3_title_In_german=$ingermanCategory[1];//2 option
$Category_Option_4_title_In_german=$ingermanCategory[2];//3 option
$Category_Option_5_title_In_german=$ingermanCategory[3];//4 option
$Available_title_In_german = $ingerman[30];
$Select_days_title_In_german = $ingerman[13];//select day
$Message_title_In_german = $ingerman[28];
$Available_Timings_Option_1_title_In_german= $ingerman[33];// all slot select option

$Available_Timings_Option_2_title_In_german = $ingermanslot[0];// slot 1 option
$Available_Timings_Option_3_title_In_german = $ingermanslot[1];// slot 2 option
$Available_Timings_Option_4_title_In_german = $ingermanslot[2];// slot 3 option


$Select_Days_Option_1_title_In_german = $ingerman[36];//select all day option
$Select_Days_Option_2_title_In_german = $ingermanday[0];//monday option
$Select_Days_Option_3_title_In_german = $ingermanday[1];//tuesday option
$Select_Days_Option_4_title_In_german = $ingermanday[2];//wednesday option
$Select_Days_Option_5_title_In_german = $ingermanday[3];//thursday option
$Select_Days_Option_6_title_In_german = $ingermanday[4];//friday option
$Select_Days_Option_7_title_In_german = $ingermanday[5];//saturday option
$Select_Days_Option_8_title_In_german = $ingermanday[6];//sunday option
$submit_title_In_german = $ingerman[32];




$title_name_in = $alias[27];//mail title name of trial page
// print_r($alias);die();
$name_title_in = $alias[7];
$email_title_in = $alias[15];
$phone_title_in = $alias[6];
$DOB_title_in = $alias[9];


$Place_to_go_title_In = $alias[3];// titel of where do  you want
$Place_to_go_Option_1_title_In =$alias[31];//select please option
$Place_to_go_Option_2_title_In =$aliasCat[2];// option 1 of where do you want
$Place_to_go_Option_3_title_In =$aliasCat[0];// option 2 of where do you want
$Place_to_go_Option_4_title_In =$aliasCat[1];// option 3 of where do you want
$Place_to_go_Option_5_title_In =$aliasCat[3];// option 4 of where do you want

$Category_title_In = $alias[4];//category title
$Category_Option_1_title_In=$alias[31];//select all options in category
$Category_Option_2_title_In=$aliasCategory[0];//1 option
$Category_Option_3_title_In=$aliasCategory[1];//2 option
$Category_Option_4_title_In=$aliasCategory[2];//3 option
$Category_Option_5_title_In=$aliasCategory[3];//4 option

$Select_days_title_In = $alias[13];
$Message_title_In = $alias[28];
$Available_title_In = $alias[30];

$Available_Timings_Option_1_title_In= $alias[33];// all slot select option


$Available_Timings_Option_2_title_In_alias = $aliasslot[0];// slot 1 option
$Available_Timings_Option_3_title_In_alias = $aliasslot[1];// slot 2 option
$Available_Timings_Option_4_title_In_alias = $aliasslot[2];// slot 3 option

$Select_Days_Option_1_title_In = $alias[36];//select all day option
$Select_Days_Option_2_title_In = $aliasday[0];//monday option
$Select_Days_Option_3_title_In = $aliasday[1];//tuesday option
$Select_Days_Option_4_title_In = $aliasday[2];//wednesday option
$Select_Days_Option_5_title_In = $aliasday[3];//thursday option
$Select_Days_Option_6_title_In = $aliasday[4];//friday option
$Select_Days_Option_7_title_In = $aliasday[5];//saturday option
$Select_Days_Option_8_title_In = $aliasday[6];//sunday option
$submit_title_In = $alias[32];

  
}








if($value =='home'){

 $query = "SELECT * FROM page_content_translation WHERE selected_page='home'"; 


 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
$inenglish = array_column($result, 'inenglish');
$ingerman = array_column($result, 'ingerman');


}
$welcome = $alias[0];
$desc = $alias[1];
$registration = $alias[2];
$contact = $alias[3];
$more = $alias[4];
$image = $alias[5];


$welcome_inenglish = $inenglish[0];
$desc_inenglish = $inenglish[1];
$reg_inenglish = $inenglish[2];
$contact_inenglish = $inenglish[3];
$more_inenglish = $inenglish[4];
$image_inenglish = $inenglish[5];

$welcome_ingerman = $ingerman[0];
$desc_ingerman = $ingerman[1];
$reg_ingerman = $ingerman[2];
$contact_ingerman = $ingerman[3];
$more_ingerman = $ingerman[4];
$image_ingerman = $ingerman[5];




if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  
  $image = $_FILES['image']['name'];
    $target_dir='images/';
    $targetFilePath = $target_dir . basename($_FILES['image']['name']);
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 $allowTypes = array('jpg','png','jpeg','gif','pdf');
 
 if($image){
      $img_value=$image . uniqid().'.jpg';
  }
 // print_r($img_value); die;

 if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$img_value)){  
       
   $update_image =  "UPDATE page_content_translation set inenglish='$img_value',ingerman='$img_value' WHERE alias='Home_background_image'";
//var_dump($update_image); 
mysqli_query($conn,$update_image);
 
   }else{
     
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
     
  for($i=0;$i<$count;$i++){
       $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];
 

 $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
  echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php';</script>";

 
 if ($conn->query($update) === TRUE) {
}



  } //for loop end
  

  

}

}
elseif($value =='drive'){
  
    $query = "SELECT * FROM page_content_translation WHERE selected_page='drive'"; 


 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
$inenglish = array_column($result, 'inenglish');
$ingerman = array_column($result, 'ingerman');


}
$welcome = $alias[0];
$desc = $alias[1];
$registration = $alias[2];
$contact = $alias[3];
$more = $alias[4];
$image = $alias[5];
$welcome_inenglish = $inenglish[0];
$desc_inenglish = $inenglish[1];
$reg_inenglish = $inenglish[2];
$contact_inenglish = $inenglish[3];
$more_inenglish = $inenglish[4];
$image_inenglish = $inenglish[5];

$welcome_ingerman = $ingerman[0];
$desc_ingerman = $ingerman[1];
$reg_ingerman = $ingerman[2];
$contact_ingerman = $ingerman[3];
$more_ingerman = $ingerman[4];
$image_ingerman = $ingerman[5];




if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  //print_r($alias_name); die;
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  
  $image = $_FILES['image']['name'];
    $target_dir='images/';
    $targetFilePath = $target_dir . basename($_FILES['image']['name']);
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 $allowTypes = array('jpg','png','jpeg','gif','pdf');
 
 if($image){
      $img_value=$image . uniqid().'.jpg';
  }
 // print_r($img_value); die;


     
  for($i=0;$i<$count;$i++){
       $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

 if($update_alias=="Drive_background_image")
 {
 if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$img_value)){  
       
   
   $update =  "UPDATE page_content_translation set inenglish='$img_value',ingerman='$img_value' WHERE alias='Drive_background_image'";
 
   }else{
     
            $statusMsg = "Sorry, there was an error uploading your file.";
        }  

//var_dump($update_image); die;
//$a = mysqli_query($conn,$update_image);  
 }
else{
 $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
  echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php';</script>";
}
 
 if ($conn->query($update) === TRUE) {
}



  } //for loop end
  

  

}
}


/* For First Aid Section */

elseif($value =='firstaid'){
    
    $query = "SELECT * FROM page_content_translation WHERE selected_page='firstaid'"; 


 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
$inenglish = array_column($result, 'inenglish');
$ingerman = array_column($result, 'ingerman');


}
$welcome = $alias[0];
$desc = $alias[1];
$registration = $alias[2];
$contact = $alias[3];
$more = $alias[4];
$image = $alias[5];
$welcome_inenglish = $inenglish[0];
$desc_inenglish = $inenglish[1];
$reg_inenglish = $inenglish[2];
$contact_inenglish = $inenglish[3];
$more_inenglish = $inenglish[4];
$image_inenglish = $inenglish[5];

$welcome_ingerman = $ingerman[0];
$desc_ingerman = $ingerman[1];
$reg_ingerman = $ingerman[2];
$contact_ingerman = $ingerman[3];
$more_ingerman = $ingerman[4];
$image_ingerman = $ingerman[5];




if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  //print_r($alias_name); die;
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  
  $image = $_FILES['image']['name'];
    $target_dir='images/';
    $targetFilePath = $target_dir . basename($_FILES['image']['name']);
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 $allowTypes = array('jpg','png','jpeg','gif','pdf');
 
 if($image){
      $img_value=$image . uniqid().'.jpg';
  }
 // print_r($img_value); die;


     
  for($i=0;$i<$count;$i++){
       $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

 if($update_alias=="Firstaid_background_image")
 {
 if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$img_value)){  
       
   
   $update =  "UPDATE page_content_translation set inenglish='$img_value',ingerman='$img_value' WHERE alias='Firstaid_background_image'";
 
   }else{
     
            $statusMsg = "Sorry, there was an error uploading your file.";
        }  

//var_dump($update_image); die;
//$a = mysqli_query($conn,$update_image);  
 }
else{
 $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
  echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php';</script>";
}
 
 if ($conn->query($update) === TRUE) {
}



  } //for loop end
  

  

}
    
}
elseif($value =='vku'){
  $query = "SELECT * FROM page_content_translation WHERE selected_page='vku'"; 


 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
$inenglish = array_column($result, 'inenglish');
$ingerman = array_column($result, 'ingerman');

}

$welcome = $alias[0];
$desc = $alias[1];
$registration = $alias[2];
$contact = $alias[3];
$more = $alias[4];
$image = $alias[5];
$welcome_inenglish = $inenglish[0];
$desc_inenglish = $inenglish[1];
$reg_inenglish = $inenglish[2];
$contact_inenglish = $inenglish[3];
$more_inenglish = $inenglish[4];
$image_inenglish = $inenglish[5];

$welcome_ingerman = $ingerman[0];
$desc_ingerman = $ingerman[1];
$reg_ingerman = $ingerman[2];
$contact_ingerman = $ingerman[3];
$more_ingerman = $ingerman[4];
$image_ingerman = $ingerman[5];




if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  //print_r($alias_name); die;
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  
  $image = $_FILES['image']['name'];
    $target_dir='images/';
    $targetFilePath = $target_dir . basename($_FILES['image']['name']);
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 $allowTypes = array('jpg','png','jpeg','gif','pdf');
 
 if($image){
      $img_value=$image . uniqid().'.jpg';
  }
 // print_r($img_value); die;


     
  for($i=0;$i<$count;$i++){
      $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

 if($update_alias=="vku_background_image")
 {
 if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$img_value)){  
       
   
   $update =  "UPDATE page_content_translation set inenglish='$img_value',ingerman='$img_value' WHERE alias='vku_background_image'";
 
   }else{
     
            $statusMsg = "Sorry, there was an error uploading your file.";
        }  

//var_dump($update_image); die;
//$a = mysqli_query($conn,$update_image);  
 }
else{
 $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
  echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php';</script>";
}
 
 if ($conn->query($update) === TRUE) {
}



  } //for loop end
  

  

}
    
}
elseif($value =='moto'){
  $query = "SELECT * FROM page_content_translation WHERE selected_page='moto'"; 


 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
  $result[] = $row;
  $alias = array_column($result, 'alias');
  $inenglish = array_column($result, 'inenglish');
  $ingerman = array_column($result, 'ingerman');
// print_r($alias);

}
$welcome = $alias[0];
$desc = $alias[2];
$registration = $alias[1];
$contact = $alias[5];
$more = $alias[5];
$image = $alias[4];
$welcome_inenglish = $inenglish[0];
$desc_inenglish = $inenglish[2];
$reg_inenglish = $inenglish[1];
$contact_inenglish = $inenglish[5];
$more_inenglish = $inenglish[5];
$image_inenglish = $inenglish[4];

$welcome_ingerman = $ingerman[0];
$desc_ingerman = $ingerman[2];
$reg_ingerman = $ingerman[1];
$contact_ingerman = $ingerman[5];
$more_ingerman = $ingerman[5];
$image_ingerman = $ingerman[4];




if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  //print_r($alias_name); die;
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  
    $image = $_FILES['image']['name'];
    $target_dir='images/';
    $targetFilePath = $target_dir . basename($_FILES['image']['name']);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 $allowTypes = array('jpg','png','jpeg','gif','pdf');
 
 if($image){
      $img_value=$image . uniqid().'.jpg';
  }
 // print_r($img_value); die;


     
  for($i=0;$i<$count;$i++){
      $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

 if($update_alias=="Moto_background_image")
 {
 if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$img_value)){  
       
   
   $update =  "UPDATE page_content_translation set inenglish='$img_value',ingerman='$img_value' WHERE alias='Moto_background_image'";
 
   }else{
     
            $statusMsg = "Sorry, there was an error uploading your file.";
        }  

//var_dump($update_image); die;
//$a = mysqli_query($conn,$update_image);  
 }
else{
 $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
  echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php';</script>";
}
 
 if ($conn->query($update) === TRUE) {
}



  } //for loop end
  

  

}
   
  
  
}
elseif($value =='home_price'){
  
  
   $query = "SELECT * FROM page_content_translation WHERE selected_page='home_price'"; 


 $run=mysqli_query($conn,$query);
 
 //$row = mysqli_fetch_assoc($run);
 while ($row = mysqli_fetch_assoc($run))
{
 
 $result[] = $row;
$alias = array_column($result, 'alias');
$inenglish = array_column($result, 'inenglish');
$ingerman = array_column($result, 'ingerman');


}
$welcome = $alias[0];
$desc = $alias[1];
$registration = $alias[2];
$contact = $alias[3];
$more = $alias[4];
$image = $alias[5];



$welcome_inenglish = $inenglish[0];
$desc_inenglish = $inenglish[1];
$reg_inenglish = $inenglish[2];
$contact_inenglish = $inenglish[3];
$more_inenglish = $inenglish[4];
$image_inenglish = $inenglish[5];

$welcome_ingerman = $ingerman[0];
$desc_ingerman = $ingerman[1];
$reg_ingerman = $ingerman[2];
$contact_ingerman = $ingerman[3];
$more_ingerman = $ingerman[4];
$image_ingerman = $ingerman[5];




if(isset($_POST['submit']))
{
    

 //   print_r($_POST);die;
  $alias_name = $_POST['alias_name'];
  //print_r($alias_name); die;
  $inenglish = $_POST['inenglish'];
  $ingerman = $_POST['ingerman'];
  $count = count($_POST['alias_name']);
  
  
  $image = $_FILES['image']['name'];
    $target_dir='images/';
    $targetFilePath = $target_dir . basename($_FILES['image']['name']);
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 $allowTypes = array('jpg','png','jpeg','gif','pdf');
 
 if($image){
      $img_value=$image . uniqid().'.jpg';
  }
 // print_r($img_value); die;


     
  for($i=0;$i<$count;$i++){
       $update_inenglish=mysqli_real_escape_string($conn,$inenglish[$i]);
       $update_ingerman=mysqli_real_escape_string($conn,$ingerman[$i]);
       $update_alias=$alias_name[$i];

 if($update_alias=="Price_background_image")
 {
 if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$img_value)){  
       
   
   $update =  "UPDATE page_content_translation set inenglish='$img_value',ingerman='$img_value' WHERE alias='Price_background_image'";
 
   }else{
     
            $statusMsg = "Sorry, there was an error uploading your file.";
        }  

//var_dump($update_image); die;
//$a = mysqli_query($conn,$update_image);  
 }
else{
 $update =  "UPDATE page_content_translation set inenglish='$update_inenglish',ingerman='$update_ingerman' WHERE alias='$update_alias'";
  echo "<script>window.location.href='".$config['base_url']."/admin/addtranslation/index.php';</script>";
}
 
 if ($conn->query($update) === TRUE) {
}



  } //for loop end
  

  

}
  
  
}
else{
  
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
              
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                  
                    <li>
                        <a class="nav-link act "  href="#" ><i class="icon icon-plus-circle"></i> Add Translation</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-8  offset-md-2 ">
                  
                        <div class="card no-b  no-r">
                            <div class="card-body"> 
                             
                                
                             <div class="form-row">
                                    <div class="col-md-10 ml-3">
                                        <div class="form-group m-0">
                                        <form action="index.php" method="GET">
                                             <label for="" class="col-form-label s-12" onchange="this.form.submit()">Select Page</label>
                                           <select id="select_page" name="url_page" class="form-control r-0 light s-12">
                                            <option value="">--Please choose an option--</option>

                                    
                                           <option id="" <?php if($value2=='menu_option'){echo 'selected';}?> value="menu_option">Menu Option</option>
                                            <option id="" <?php if($value2=='home_page'){echo 'selected';}?> value="home_page">Home</option>                                       
                                             <option id="" <?php if($value2=='first_aid_page'){echo 'selected';}?> value="first_aid_page">First Aid</option>
                                             <option id="" <?php if($value2=='Vku_page'){echo 'selected';}?> value="Vku_page">VKU</option>                       
                                             <option id="" <?php if($value2=='moto'){echo 'selected';}?> value="moto">MOTO</option>
                                             <option id="" <?php if($value2=='price'){echo 'selected';}?> value="price">Pricing</option> </a>
                                             <option id="" <?php if($value2=='about_us_page'){echo 'selected';}?> value="about_us_page">About Us</option> </a>
                                              <option id="" <?php if($value2=='Footer_page_all'){echo 'selected';}?> value="Footer_page_all">Footer</option>
                                              
                                              <!--  <option id="" value="Registation_page">Registration</option>  -->
                                            <!-- <option id="" <?php if($value2=='process'){echo 'selected';}?> value="process">Process</option> </a> -->
                                             <option id="" <?php if($value2=='contact'){echo 'selected';}?> value="contact">Contact Us</option> </a>
                                             <!--   <option id="" value="Trial_page">Request Trial Page</option>  -->                                              
                                             <option id="" <?php if($value2=='Login'){echo 'selected';}?> value="Login">Login</option> 
                                             <option id="" <?php if($value2=='Trial'){echo 'selected';}?> value="Trial">Request A Trial Page</option> 
                                             <option id="" <?php if($value2=='term_and_condition'){echo 'selected';}?> value="term_and_condition">Term And Condition</option>
                                              <option id="" <?php if($value2=='legal_page'){echo 'selected';}?> value="legal_page">legal</option>  
                                             <option id="" <?php if($value2=='Privacy_page'){echo 'selected';}?> value="Privacy_page">Privacy</option> 
                                              </a>    
                                           </select>
                                         <section id="section_select">
                       
                                            <label for="" class="col-form-label s-12">Select Section</label>
                                           <select id="select" name="url" class="form-control r-0 light s-12" onchange="this.form.submit()">
                                                <option value="">--Please choose an option--</option>
                                                <option id="" <?php if($value=='home'){echo 'selected';}?> value="home">Home</option>
                                                <option id="" <?php if($value=='drive'){echo 'selected';}?> value="drive">Drive</option>
                                                <option id="" <?php if($value=='firstaid'){echo 'selected';}?> value="firstaid">First Aid</option>
                                                <option id="" <?php if($value=='vku'){echo 'selected';}?> value="vku">VKU</option>
                                                <option id="" <?php if($value=='moto'){echo 'selected';}?> value="moto">MOTO</option>
                                                <option id="" <?php if($value=='home_price'){echo 'selected';}?> value="home_price">Price</option>
                                           </select>
                                           </section>
                                           </form>
                                             <div id="icon"></div>
                                         
                                        </div>
                                    </div>
                                </div>
                                
                           <!-- Title 1 Row -->
                            <div class="showHideForm" id="showHide-1">
                                  <form id="form-one" action="" method="POST" enctype="multipart/form-data">
                
                                           <div class="form-row" >
                                                 <div class="form-group col-1 mb-3">
                                             <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $welcome;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                               <label for="dob" class="col-form-label s-12">Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $welcome_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $welcome_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            </div>
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $desc;?>">
                                                    
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Short Description In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $desc_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Short Description In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $desc_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            <!-- Button 1 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $registration;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button1 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $reg_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button1 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $reg_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              <!-- Button 2 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $contact;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button2 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="z" name="inenglish[]" value="<?php  echo $contact_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button2 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $contact_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              <!-- Button 3 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $more;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button3 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $more_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button3 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $more_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            
                                              <!-- Image Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $image;?>">
                                            </div>
                                            
                                            <!-- <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Content In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $image_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Content In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $image_ingerman;?>">
                                            </div> -->
                                                    
                                            </div> 
                                             <div class="form-group col-4 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Upload</label>
                                               <input type="file" class="form-control"  name="image" id="photo"  style="width: 382px">
                                            </div>
                                                  <div class="card-body">
                  <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                </div>
                </div>
                
                    </form>     
                    </div> 
                 <div class="showHideForm" id="showHide-2">
                                <form id="form-two" action="" method="POST" enctype="multipart/form-data">
                             
                                             <div class="form-row" >
                                                 <div class="form-group col-1 mb-3">
                                             <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $welcome;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                               <label for="dob" class="col-form-label s-12">Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $welcome_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $welcome_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            </div>
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $desc;?>">
                                                    
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Short Description In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $desc_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Short Description In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $desc_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            <!-- Button 1 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $registration;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button1 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $reg_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button1 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $reg_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              <!-- Button 2 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $contact;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button2 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $contact_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button2 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $contact_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              <!-- Button 3 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $more;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button3 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $more_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button3 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $more_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            
                                              <!-- Image Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $image;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Content In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $image_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Content In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $image_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                             <div class="form-group col-4 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Upload</label>
                                               <input type="file" class="form-control"  name="image" id="photo"  style="width: 382px">
                                            </div>
                                                  <div class="card-body">
                  <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                </div>
                </div>
                        
                  </form>  
                  
                </div>





                 <div class="showHideForm" id="showHide-3">
              <form id="form-three" action="" method="POST" enctype="multipart/form-data">
                                             <div class="form-row" >
                                                 <div class="form-group col-1 mb-3">
                                             <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $welcome;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                               <label for="dob" class="col-form-label s-12">Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $welcome_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $welcome_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            </div>
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $desc;?>">
                                                    
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Short Description In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $desc_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Short Description In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $desc_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            <!-- Button 1 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $registration;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button1 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $reg_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button1 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $reg_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              <!-- Button 2 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $contact;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button2 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $contact_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button2 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $contact_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              <!-- Button 3 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $more;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button3 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $more_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button3 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $more_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            
                                              <!-- Image Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $image;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Content In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $image_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Content In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $image_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                             <div class="form-group col-4 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Upload</label>
                                               <input type="file" class="form-control"  name="image" id="photo"  style="width: 382px">
                                            </div>
                                                  <div class="card-body">
                  <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                </div>
                </div>
                </form> 
                      
             
          
            <div class="showHideForm" id="showHide-4">
          <form id="form-four" action="" method="POST" enctype="multipart/form-data">
                                             <div class="form-row" >
                                                 <div class="form-group col-1 mb-3">
                                             <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $welcome;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                               <label for="dob" class="col-form-label s-12">Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $welcome_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $welcome_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            </div>
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $desc;?>">
                                                    
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Short Description In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $desc_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Short Description In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $desc_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            <!-- Button 1 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $registration;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button1 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $reg_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button1 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $reg_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              <!-- Button 2 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $contact;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button2 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $contact_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button2 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $contact_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              <!-- Button 3 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $more;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button3 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $more_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button3 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $more_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            
                                              <!-- Image Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $image;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Content In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $image_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Content In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $image_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                             <div class="form-group col-4 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Upload</label>
                                               <input type="file" class="form-control"  name="image" id="photo"  style="width: 382px">
                                            </div>
                                                  <div class="card-body">
                  <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                </div>
              
                                          
          
                    </form> 
            </div>
          
          
            
                 <div class="showHideForm" id="showHide-5">
          
                <form id="form-five" action="" method="POST" enctype="multipart/form-data">
                                              <div class="form-row" >
                                                 <div class="form-group col-1 mb-3">
                                             <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $welcome;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                               <label for="dob" class="col-form-label s-12">Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $welcome_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $welcome_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            </div>
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $desc;?>">
                                                    
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Short Description In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $desc_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Short Description In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $desc_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            <!-- Button 1 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $registration;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button1 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $reg_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button1 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $reg_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              <!-- Button 2 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $contact;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button2 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $contact_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button2 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $contact_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              <!-- Button 3 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $more;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button3 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $more_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button3 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $more_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            
                                              <!-- Image Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $image;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Content In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $image_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Content In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $image_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                             <div class="form-group col-4 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Upload</label>
                                               <input type="file" class="form-control"  name="image" id="photo"  style="width: 382px">
                                            </div>
                                                  <div class="card-body">
                  <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                </div>
                
              </form>
                        </div> 
          
          
          
          
          
          
          
                 <div class="showHideForm" id="showHide-6">
                    <form id="form-six" action="" method="POST" enctype="multipart/form-data">
                                             <div class="form-row" >
                                                 <div class="form-group col-1 mb-3">
                                             <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $welcome;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                               <label for="dob" class="col-form-label s-12">Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $welcome_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $welcome_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            </div>
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $desc;?>">
                                                    
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Short Description In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $desc_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Short Description In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $desc_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            <!-- Button 1 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $registration;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button1 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $reg_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button1 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $reg_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              <!-- Button 2 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $contact;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button2 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $contact_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button2 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $contact_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              <!-- Button 3 Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $more;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button3 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $more_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Button3 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $more_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            
                                              <!-- Image Row -->
                                            <div class="form-row">
                                                 <div class="form-group col-1 mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $image;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Content In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $image_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-5 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Content In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $image_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                             <div class="form-group col-4 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Upload</label>
                                               <input type="file" class="form-control"  name="image" id="photo"  style="width: 382px">
                                            </div>
                                                  <div class="card-body">
                  <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                </div>
                
                          
                </form>
                          </div> 
                    
          </div>
</section>


<div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort go">
            <div class="row">
                <div class="col-md-8  offset-md-2 ">
                  
                        <div class="card no-b  no-r">
                            <div id="login_card" class="card-body">
                             
                                
                             <div class="form-row">
                                    <div class="col-md-10 ml-3">
                                        <div class="form-group m-0">
                    
                 <div class="showHideForm" id="showHide-7">
                                    <form id="Login_form" action="" method="POST" enctype="multipart/form-data">
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                             <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $welcome;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <label for="dob" class="col-form-label s-12">Login Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $welcome_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Login Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $welcome_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            </div>
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $desc;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Username Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $desc_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Username Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $desc_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            <!-- Button 1 Row -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $registration;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Password Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $reg_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Password Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $reg_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              <!-- Button 2 Row -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $contact;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Forgot Password Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $contact_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Forgot Password Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $contact_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              <!-- Button 3 Row -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $more;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Signup Button Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $more_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Signup Button Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $more_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            
                                              <!-- Image Row -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $image;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Signup Description In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $image_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Signup Description In German</label>
                                               <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $image_ingerman;?></textarea>
                                            </div>
                      
                      <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $signup_email_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Signup Email Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $signup_email_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Signup Email Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $signup_email_title_ingerman;?>">
                                            </div>

                                            
                                            <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $signup_password_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Signup Password Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $signup_password_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Signup Password Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $signup_password_title_ingerman;?>">
                                            </div>
                      
                      
                                           <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $signup_form_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Signup Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $signup_form_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Signup Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $signup_form_title_ingerman;?>">
                                            </div>
                                                    
                                            </div> 
                                           <!--  <div class="form-group col-4 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Upload</label>
                                               <input type="file" class="form-control"  name="image" id="photo"  style="width: 382px">
                                            </div> -->
                                                  
                        </div> <div class="card-body">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                            </div>
                    </form>
          </div>
      
            <!--Footer page form -->
           <div class="showHideForm" id="showHide-17">
                                  <form id="Footer_form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                      <div class="form-row">
                                             <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $Address_in_footer_page;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Footer Address In  English</label>
                                                 <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $Address_in_footer_page_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Footer Address In German </label>
                                                <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $Address_in_footer_page_inenglish;?></textarea>
                                            </div>  
                                          </div>

                                             <!-- <div class="form-row"> -->
                                               <!-- <div class="card-body"> 
                                                 <div class="form-group mb-3">
                                             
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $Address_in_footer_page;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <label for="dob" class="col-form-label s-12">Address in English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $Address_in_footer_page_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $Address_in_footer_page_ingerman;?>">
                                            </div>
                                                    
                                            </div> -->

                                            
                                                <!-- Short Description 1 Row -->
                                               <!--  <div class="form-row">
                                                 <div class="form-group mb-3">
                                                
                                               
                                            </div>
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $phone_number_footer_page;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Phone number In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $phone_number_footer_page_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Phone number In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $phone_number_footer_page_ingerman?>">
                                            </div>
                                                    
                                            </div> -->
                                            
                                            <!-- Button 1 Row -->
                                            <!-- <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $Contact_in_footer_page;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Contact In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $Contact_in_footer_page_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Contact  In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $Contact_in_footer_page_ingerman;?>">
                                            </div>
                                                    
                                            </div> -->

                                              <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $footer_partner_image_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Footer Partner Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $Image_title_footer_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Footer Partner Title  In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $Image_title_footer_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $Title_In_image_changes;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Footer Patner Image Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $Title_In_image_changes_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">  Footer Patner Image Title  In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $Title_In_image_changes_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                    
                                           <!--  <div class="form-group col-4 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Upload</label>
                                               <input type="file" class="form-control"  name="image" id="photo"  style="width: 382px">
                                            </div> -->
                                                  
                        </div> 
                        <div class="card-body">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                            </div>
                             </div>
                    </form>
          </div>
     </div>
          
          <!-- VKU Page Form -->
          
          
                 <div class="showHideForm" id="showHide-8">
                                <form id="Vku_form" action="" method="POST" enctype="multipart/form-data">
                              <div class="form-row">
                                   <div class="form-group mb-3">
                               <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="hidden" name="alias_name[]" value="<?php  echo $Vku_banner_title_alias;?>">
                              </div>
                              
                               <div class="form-group col-6 mb-3">
                                 <label for="dob" class="col-form-label s-12">Descprition Title In English</label>
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="text" name="inenglish[]" value="<?php  echo $Vku_banner_title_inenglish;?>">
                              </div>
                              
                               <div class="form-group col-6 mb-3">
                                  <label for="dob" class="col-form-label s-12">Descprition Title In German</label>
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="text" name="ingerman[]" value="<?php  echo $Vku_banner_title_ingerman;?>">
                              </div>
                                      
                              </div>

                           <div class="form-row">   
                         <div class="form-group mb-3">
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="hidden" name="alias_name[]" value="<?php  echo $vku_banner_description_part_1_alias;?>">
                          </div>
                          
                           <div class="form-group col-6 mb-3">
                              <label for="dob" class="col-form-label s-12">Banner Description (part 1) In English</label>
                               <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="inenglish[]" value=""><?php  echo $vku_banner_description_part_1_inenglish;?></textarea>
                          </div>
                          
                           <div class="form-group col-6 mb-3">
                              <label for="dob" class="col-form-label s-12">Description In (part 1)  German</label>
                              <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="ingerman[]" value=""><?php  echo $vku_banner_description_part_1_ingerman;?></textarea>
                            </div>  
                          </div>
                           <div class="form-row">   
                         <div class="form-group mb-3">
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="hidden" name="alias_name[]" value="<?php  echo $vku_banner_description_part_2_alias;?>">
                          </div>
                          
                           <div class="form-group col-6 mb-3">
                              <label for="dob" class="col-form-label s-12">Banner Description (part 2) In English</label>
                               <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="inenglish[]" value=""><?php  echo $vku_banner_description_part_2_inenglish;?></textarea>
                          </div>
                          
                           <div class="form-group col-6 mb-3">
                              <label for="dob" class="col-form-label s-12">Description In (part 2)  German</label>
                              <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="ingerman[]" value=""><?php  echo $vku_banner_description_part_2_ingerman;?></textarea>
                            </div>  
                          </div>
                           <div class="form-row">   
                         <div class="form-group mb-3">
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="hidden" name="alias_name[]" value="<?php  echo $vku_banner_description_part_3_alias;?>">
                          </div>
                          
                           <div class="form-group col-6 mb-3">
                              <label for="dob" class="col-form-label s-12">Banner Description (part 3) In English</label>
                               <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="inenglish[]" value=""><?php  echo $vku_banner_description_part_3_inenglish;?></textarea>
                          </div>
                          
                           <div class="form-group col-6 mb-3">
                              <label for="dob" class="col-form-label s-12">Description In (part 3)  German</label>
                              <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="ingerman[]" value=""><?php  echo $vku_banner_description_part_3_ingerman;?></textarea>
                            </div>  
                          </div>
                              
                                  <!-- Short Description 1 Row -->
                                  <div class="form-row">
                                   <div class="form-group mb-3">
                                    <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                 
                              </div>
                               <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="hidden" name="alias_name[]"  value="<?php  echo $Course_Part_1_alias;?>">
                                      
                               <div class="form-group col-6 mb-3">
                                  <label for="dob" class="col-form-label s-12">Course 1 Title In English</label>
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="text" name="inenglish[]" value="<?php  echo $Course_Part_1_inenglish;?>">
                              </div>
                              
                               <div class="form-group col-6 mb-3">
                                  <label for="dob" class="col-form-label s-12">Course 1 Title In German</label>
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="text" name="ingerman[]" value="<?php  echo $Course_Part_1_ingerman;?>">
                              </div>
                                      
                              </div>
                              
                              <!-- Button 1 Row -->
                              <div class="form-row">
                                   <div class="form-group mb-3">
                                   <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="hidden" name="alias_name[]" value="<?php  echo $Danger_theory;?>">
                              </div>
                              
                               <div class="form-group col-6 mb-3">
                                  <label for="dob" class="col-form-label s-12">Course 1 card 1 In English</label>
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="text" name="inenglish[]" value="<?php  echo $Danger_theory_inenglish;?>">
                              </div>
                              
                               <div class="form-group col-6 mb-3">
                                  <label for="dob" class="col-form-label s-12">Course 1 card 1 In German</label>
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="text" name="ingerman[]" value="<?php  echo $Danger_theory_ingerman;?>">
                              </div>
                                      
                              </div>
                              
                                <!-- Button 2 Row -->
                              <div class="form-row">
                                   <div class="form-group mb-3">
                                   <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="hidden" name="alias_name[]" value="<?php  echo $Functions_of_the_sensory_organs;?>">
                              </div>
                              
                               <div class="form-group col-6 mb-3">
                                  <label for="dob" class="col-form-label s-12">Course 1 card 2 In English</label>
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="text" name="inenglish[]" value="<?php  echo $Functions_of_the_sensory_organs_inenglish;?>">
                              </div>
                              
                               <div class="form-group col-6 mb-3">
                                  <label for="dob" class="col-form-label s-12">Course 1 card 2 In German</label>
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="text" name="ingerman[]" value="<?php  echo $Functions_of_the_sensory_organs_ingerman;?>">
                              </div>
                                      
                              </div>

                                  <div class="form-row">
                                   <div class="form-group mb-3">
                                   <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="hidden" name="alias_name[]" value="<?php  echo
                                                            $BookVku1_inalias;?>">
                              </div>
                              
                               <div class="form-group col-6 mb-3">
                                  <label for="dob" class="col-form-label s-12">Book Vku Button 1 In English</label>
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="text" name="inenglish[]" value="<?php  echo 
                                      $BookVku1_inenglish ;?>">
                              </div>
                              
                               <div class="form-group col-6 mb-3">
                                  <label for="dob" class="col-form-label s-12">Book Vku Button 1 In German</label>
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="text" name="ingerman[]" value="<?php  echo $BookVku1_ingerman;?>">
                              </div>      
                              </div> 
                              
                                <!-- Button 3 Row -->
                              <div class="form-row">
                                   <div class="form-group mb-3">
                                    <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="hidden" name="alias_name[]" value="<?php  echo $Course_Part_2;?>">
                              </div>
                              
                               <div class="form-group col-6 mb-3">
                                  <label for="dob" class="col-form-label s-12">Course 2 Title In English</label>
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="text" name="inenglish[]" value="<?php  echo $Course_Part_2_inenglish;?>">
                              </div>
                              
                               <div class="form-group col-6 mb-3">
                                  <label for="dob" class="col-form-label s-12">Course 2 Title In German</label>
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="text" name="ingerman[]" value="<?php  echo $Course_Part_2_ingerman;?>">
                              </div>
                                      
                              </div>
                              
                              
                                <!-- Image Row -->
                              <div class="form-row">
                                   <div class="form-group mb-3">
                                   <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="hidden" name="alias_name[]" value="<?php  echo $Partner_customer;?>">
                              </div>
                              
                               <div class="form-group col-6 mb-3">
                                  <label for="dob" class="col-form-label s-12">Course 2 card 1 In English</label>
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="text" name="inenglish[]" value="<?php  echo $Partner_customer_inenglish;?>">
                              </div>
                              
                               <div class="form-group col-6 mb-3">
                                  <label for="dob" class="col-form-label s-12">Course 2 card 1 In German</label>
                                  <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                      type="text" name="ingerman[]" value="<?php  echo $Partner_customer_ingerman;?>">
                              </div>
                      
                            <div class="form-row">
                                 <div class="form-group mb-3">
                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                    type="hidden" name="alias_name[]" value="<?php  echo $Street_customer;?>">
                            </div>
                            
                             <div class="form-group col-6 mb-3">
                                <label for="dob" class="col-form-label s-12">Course 2 card 2 In English</label>
                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                    type="text" name="inenglish[]" value="<?php  echo $Street_customer_inenglish;?>">
                            </div>
                            
                             <div class="form-group col-6 mb-3">
                                <label for="dob" class="col-form-label s-12">Course 2 card 2 In German</label>
                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                    type="text" name="ingerman[]" value="<?php  echo $Street_customer_ingerman;?>">
                            </div>
                      
                      
                         <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="hidden" name="alias_name[]" value="<?php  echo $weather;?>">
                          </div>
                          
                           <div class="form-group col-6 mb-3">
                              <label for="dob" class="col-form-label s-12">Course 2 card 3 In English</label>
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="inenglish[]" value="<?php  echo $weather_inenglish;?>">
                          </div>
                          
                           <div class="form-group col-6 mb-3">
                              <label for="dob" class="col-form-label s-12">Course 2 card 3 In German</label>
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="ingerman[]" value="<?php  echo $weather_ingerman;?>">
                          </div>
                    
                      
                       <div class="form-group mb-3">
                               <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="hidden" name="alias_name[]" value="<?php  echo $Times;?>">
                          </div>
                          
                           <div class="form-group col-6 mb-3">
                              <label for="dob" class="col-form-label s-12">Course 2 card 4 In English</label>
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="inenglish[]" value="<?php  echo $Times_inenglish;?>">
                          </div>
                          
                           <div class="form-group col-6 mb-3">
                              <label for="dob" class="col-form-label s-12">Course 2 card 4 In German</label>
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="ingerman[]" value="<?php  echo $Times_ingerman;?>">
                          </div>
                             <div class="form-group mb-3">
                               <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="hidden" name="alias_name[]" value="<?php  echo
                                                        $BookVku2_inalias;?>">
                          </div>
                          
                           <div class="form-group col-6 mb-3">
                              <label for="dob" class="col-form-label s-12">Book Vku Button 2  In English</label>
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="inenglish[]" value="<?php  echo 
                                 $BookVku2_inalias_inenglish;?>">
                          </div>
                          
                           <div class="form-group col-6 mb-3">
                              <label for="dob" class="col-form-label s-12">Book Vku Button 2 In German</label>
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="ingerman[]" value="<?php  echo $BookVku2_inalias_ingerman;?>">
                          </div>      
                   
    
    
    
    
                        <div class="form-group mb-3">
                               <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="hidden" name="alias_name[]" value="<?php  echo $Course_Part_3;?>">
                          </div>
                          
                           <div class="form-group col-6 mb-3">
                              <label for="dob" class="col-form-label s-12">Course 3 Title In English</label>
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="inenglish[]" value="<?php  echo $Course_Part_3_inenglish;?>">
                          </div>
                          
                           <div class="form-group col-6 mb-3">
                              <label for="dob" class="col-form-label s-12">Course 3 Title In German</label>
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="ingerman[]" value="<?php  echo $Course_Part_3_ingerman;?>">
                          </div>
    
                    
                      
                       <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="hidden" name="alias_name[]" value="<?php  echo $Condition_of_the_vehicle;?>">
                        </div>
                        
                         <div class="form-group col-6 mb-3">
                            <label for="dob" class="col-form-label s-12">Course 3 card 1 In English</label>
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="text" name="inenglish[]" value="<?php  echo $Condition_of_the_vehicle_inenglish;?>">
                        </div>
                        
                         <div class="form-group col-6 mb-3">
                            <label for="dob" class="col-form-label s-12">Course 3 card 1 In German</label>
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="text" name="ingerman[]" value="<?php  echo $Condition_of_the_vehicle_ingerman;?>">
                        </div>
  
                      
                  
                      
                       <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                          <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                              type="hidden" name="alias_name[]" value="<?php  echo $Forces_when_driving;?>">
                      </div>
                      
                       <div class="form-group col-6 mb-3">
                          <label for="dob" class="col-form-label s-12">Course 3 card 2 In English</label>
                          <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                              type="text" name="inenglish[]" value="<?php  echo $Forces_when_driving_inenglish;?>">
                      </div>
                      
                       <div class="form-group col-6 mb-3">
                          <label for="dob" class="col-form-label s-12">Course 3 card 2 In German</label>
                          <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                              type="text" name="ingerman[]" value="<?php  echo $Forces_when_driving_ingerman;?>">
                      </div>
                      
                      
                      <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="hidden" name="alias_name[]" value="<?php  echo $Traffic_movement_theory;?>">
                        </div>
                        
                         <div class="form-group col-6 mb-3">
                            <label for="dob" class="col-form-label s-12">Course 3 card 3 In English</label>
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="text" name="inenglish[]" value="<?php  echo $Traffic_movement_theory_inenglish;?>">
                        </div>
                        
                         <div class="form-group col-6 mb-3">
                            <label for="dob" class="col-form-label s-12">Course 3 card 3 In German</label>
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="text" name="ingerman[]" value="<?php  echo $Traffic_movement_theory_ingerman;?>">
                        </div>

                        <div class="form-group mb-3">
                             <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="hidden" name="alias_name[]" value="<?php  echo
                                                      $BookVku3_inalias;?>">
                        </div>
                        
                         <div class="form-group col-6 mb-3">
                            <label for="dob" class="col-form-label s-12">Book Vku Button 3  In English</label>
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="text" name="inenglish[]" value="<?php  echo 
                              $BookVku3_inalias_inenglish;?>">
                        </div>
                        
                         <div class="form-group col-6 mb-3">
                            <label for="dob" class="col-form-label s-12">Book Vku Button 3 In German</label>
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="text" name="ingerman[]" value="<?php  echo $BookVku3_inalias_ingerman;?>">
                        </div>      
  
                      
                       <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="hidden" name="alias_name[]" value="<?php  echo $Course_Part_4;?>">
                        </div>
                        
                         <div class="form-group col-6 mb-3">
                            <label for="dob" class="col-form-label s-12">Course 4 Title In English</label>
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="text" name="inenglish[]" value="<?php  echo $Course_Part_4_inenglish;?>">
                        </div>
                        
                         <div class="form-group col-6 mb-3">
                            <label for="dob" class="col-form-label s-12">Course 4 Title In German</label>
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="text" name="ingerman[]" value="<?php  echo $Course_Part_4_ingerman;?>">
                        </div>
                      
                      
                      
                       <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="hidden" name="alias_name[]" value="<?php  echo $Driveability;?>">
                        </div>
                        
                         <div class="form-group col-6 mb-3">
                            <label for="dob" class="col-form-label s-12">Course 4 card 1 In English</label>
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="text" name="inenglish[]" value="<?php  echo $Driveability_inenglish;?>">
                        </div>
                        
                         <div class="form-group col-6 mb-3">
                            <label for="dob" class="col-form-label s-12">Course 4 card 1 In German</label>
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="text" name="ingerman[]" value="<?php  echo $Driveability_ingerman;?>">
                        </div>
  
                      
                       <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="hidden" name="alias_name[]" value="<?php  echo $Environmentally_conscious;?>">
                        </div>
                        
                         <div class="form-group col-6 mb-3">
                            <label for="dob" class="col-form-label s-12">Course 4 card 2 In English</label>
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="text" name="inenglish[]" value="<?php  echo $Environmentally_conscious_inenglish;?>">
                        </div>
                        
                         <div class="form-group col-6 mb-3">
                            <label for="dob" class="col-form-label s-12">Course 4 card 2 In German</label>
                            <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                type="text" name="ingerman[]" value="<?php  echo $Environmentally_conscious_ingerman;?>">
                        </div>
                      
                       <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                          <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                              type="hidden" name="alias_name[]" value="<?php  echo $driving;?>">
                      </div>
                      
                       <div class="form-group col-6 mb-3">
                          <label for="dob" class="col-form-label s-12">Course 4 card 3 In English</label>
                          <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                              type="text" name="inenglish[]" value="<?php  echo $driving_inenglish;?>">
                      </div>
                      
                       <div class="form-group col-6 mb-3">
                          <label for="dob" class="col-form-label s-12">Course 4 card 3 In German</label>
                          <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                              type="text" name="ingerman[]" value="<?php  echo $driving_ingerman;?>">
                      </div>

                      <div class="form-group mb-3">
                           <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                          <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                              type="hidden" name="alias_name[]" value="<?php  echo $BookVku4_inalias;?>">
                      </div>
                      
                       <div class="form-group col-6 mb-3">
                          <label for="dob" class="col-form-label s-12">Book Vku Button 4 In English</label>
                          <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                              type="text" name="inenglish[]" value="<?php  echo 
                           $BookVku4_inenglish;?>">
                      </div>
                      
                       <div class="form-group col-6 mb-3">
                          <label for="dob" class="col-form-label s-12">Book Vku Button 4 In German</label>
                          <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                              type="text" name="ingerman[]" value="<?php  echo $BookVku4_ingerman;?>">
                      </div>   
                              
                         
                           <div class="form-group mb-3">
                                                  
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="hidden" name="alias_name[]" value="<?php  echo $vku_footer_part1_alias;?>">
                             </div>
                          
                              <div class="form-group col-6 mb-3">
                                <label for="dob" class="col-form-label s-12">Footer Banner (part 1) In English</label>
                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="inenglish[]" value="<?php  echo $vku_footer_part1_inenglish;?>">
                              </div>
                          
                              <div class="form-group col-6 mb-3">
                                <label for="dob" class="col-form-label s-12">Footer Banner (part 1) In German</label>
                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="ingerman[]" value="<?php  echo $vku_footer_part1_ingerman;?>">
                              </div>  
                           <div class="form-group mb-3">
                                                  
                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="hidden" name="alias_name[]" value="<?php  echo $vku_footer_part2_alias;?>">
                             </div>
                          
                              <div class="form-group col-6 mb-3">
                                <label for="dob" class="col-form-label s-12">Footer Banner (part 2) In English</label>
                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="inenglish[]" value="<?php  echo $vku_footer_part2_inenglish;?>">
                              </div>
                          
                              <div class="form-group col-6 mb-3">
                                <label for="dob" class="col-form-label s-12">Footer Banner (part 2) In German</label>
                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="ingerman[]" value="<?php  echo $vku_footer_part2_ingerman;?>">
                              </div>
                             <div class="form-group mb-3">
                                                  
                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="hidden" name="alias_name[]" value="<?php  echo $vku_footer_part3_alias;?>">
                             </div>
                          
                              <div class="form-group col-6 mb-3">
                                <label for="dob" class="col-form-label s-12">Footer Banner (part 3) In English</label>
                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="inenglish[]" value="<?php  echo $vku_footer_part3_inenglish;?>">
                              </div>
                          
                              <div class="form-group col-6 mb-3">
                                <label for="dob" class="col-form-label s-12">Footer Banner (part 3) In German</label>
                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                  type="text" name="ingerman[]" value="<?php  echo $vku_footer_part3_ingerman;?>">
                              </div>

                      
                      


                        <!--  <div class="form-group col-4 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Upload</label>
                                               <input type="file" class="form-control"  name="image" id="photo"  style="width: 382px">
                                            </div> -->
                                                  
                    </div> 
                    <div class="card-body">
                      <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                    </div>
                    </form>
          </div>
          </div>
          
          
            <div class="showHideForm" id="showHide-9">
                 <form id="firstaid_page_form" action="" method="POST" enctype="multipart/form-data">
                               <div class="form-row">
                                    <div class="form-group mb-3">
                                     <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                        <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                            type="hidden" name="alias_name[]" value="<?php  echo $firstaid_banner_title_alias;?>">
                                    </div>
                                    
                                     <div class="form-group col-6 mb-3">
                                       <label for="dob" class="col-form-label s-12">Banner Heading In English</label>
                                        <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                            type="text" name="inenglish[]" value="<?php  echo $firstaid_banner_title_alias_inenglish;?>">
                                    </div>
                                    
                                     <div class="form-group col-6 mb-3">
                                        <label for="dob" class="col-form-label s-12">Banner Heading In German</label>
                                        <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                            type="text" name="ingerman[]" value="<?php  echo $firstaid_banner_title_alias_ingerman;?>">
                                    </div>
                                                    
                                </div>
                                            
                                           
                                              <!-- Button 3 Row -->
                                  <div class="form-row">
                                       <div class="form-group mb-3">
                                        <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                      <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="hidden" name="alias_name[]" value="<?php echo $firstaid_banner_part_1_alias;  ?>">
                                  </div>
                                  
                                   <div class="form-group col-6 mb-3">
                                      <label for="dob" class="col-form-label s-12">Banner Desc (Part 1) In English</label>
                                      <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                          type="text" name="inenglish[]" value=""><?php  echo $firstaid_banner_part_1_alias_inenglish;?></textarea>
                                  </div>
                                  
                                   <div class="form-group col-6 mb-3">
                                      <label for="dob" class="col-form-label s-12">Banner Desc (Part 1) In German</label>
                                      <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                          type="text" name="ingerman[]" value=""><?php  echo $firstaid_banner_part_1_alias_ingerman;?></textarea>
                                  </div>
                                          
                                  </div> 
                                  <div class="form-row">
                                       <div class="form-group mb-3">
                                        <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                      <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                          type="hidden" name="alias_name[]" value="<?=$firstaid_banner_part_2_alias?>">
                                  </div>
                                  
                                   <div class="form-group col-6 mb-3">
                                      <label for="dob" class="col-form-label s-12">Banner Desc (Part 2) In English</label>
                                      <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                          type="text" name="inenglish[]" value=""><?php  echo $firstaid_banner_part_2_alias_inenglish;?></textarea>
                                  </div>
                                  
                                   <div class="form-group col-6 mb-3">
                                      <label for="dob" class="col-form-label s-12">Banner Desc (Part 2) In German</label>
                                      <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                          type="text" name="ingerman[]" value=""><?php  echo $firstaid_banner_part_2_alias_ingerman;?></textarea>
                                  </div>
                                          
                                  </div> 
                                  <div class="form-row">
                                       <div class="form-group mb-3">
                                        <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                      <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                          type="hidden" name="alias_name[]" value="<?=$firstaid_banner_part_3_alias?>">
                                  </div>
                                  
                                   <div class="form-group col-6 mb-3">
                                      <label for="dob" class="col-form-label s-12">Banner Desc (Part 3) In English</label>
                                      <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                          type="text" name="inenglish[]" value=""><?php echo $firstaid_banner_part_3_alias_inenglish;?></textarea>
                                  </div>
                                  
                                   <div class="form-group col-6 mb-3">
                                      <label for="dob" class="col-form-label s-12">Banner Desc (Part 3) In German</label>
                                      <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                          type="text" name="ingerman[]" value=""><?php echo $firstaid_banner_part_3_alias_ingerman;?></textarea>
                                  </div>
                                          
                                  </div> 
                                            
                                            
                                              <!-- Image Row -->
                                      <div class="form-row">
                                           <div class="form-group mb-3">
                                           <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                          <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                              type="hidden" name="alias_name[]" value="<?php echo $firstaid_image_part_1_alias;?>">
                                      </div>
                                      
                                       <div class="form-group col-6 mb-3">
                                          <label for="dob" class="col-form-label s-12">Image Section Desc (part 1) In English</label>
                                          <textarea rows="5" cols="90"  class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                              type="text" name="inenglish[]" value=""><?php echo $firstaid_image_part_1_alias_inenglish;?></textarea>
                                      </div>
                                      
                                       <div class="form-group col-6 mb-3">
                                          <label for="dob" class="col-form-label s-12">Image Section Desc (part 1) In German</label>
                                          <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                              type="text" name="ingerman[]" value=""><?php echo $firstaid_image_part_1_alias_ingerman;?></textarea>
                                      </div>
                
                                      </div>  
                                      <div class="form-row">
                                           <div class="form-group mb-3">
                                           <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                          <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                              type="hidden" name="alias_name[]" value="<?php echo $firstaid_image_part_2_alias;?>">
                                      </div>
                                      
                                       <div class="form-group col-6 mb-3">
                                          <label for="dob" class="col-form-label s-12">Image Section Desc (part 2) In English</label>
                                          <textarea rows="5" cols="90"  class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                              type="text" name="inenglish[]" value=""><?php echo $firstaid_image_part_2_alias_inenglish;?></textarea>
                                      </div>
                                      
                                       <div class="form-group col-6 mb-3">
                                          <label for="dob" class="col-form-label s-12">Image Section Desc (part 2) In German</label>
                                          <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                              type="text" name="ingerman[]" value=""><?php echo $firstaid_image_part_2_alias_ingerman;?></textarea>
                                      </div>
                
                                      </div>  
                                      <div class="form-row">
                                           <div class="form-group mb-3">
                                           <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                          <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                              type="hidden" name="alias_name[]" value="<?php echo $firstaid_image_part_3_alias;?>">
                                      </div>
                                      
                                       <div class="form-group col-6 mb-3">
                                          <label for="dob" class="col-form-label s-12">Image Section Desc (part 3) In English</label>
                                          <textarea rows="5" cols="90"  class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                              type="text" name="inenglish[]" value=""><?php echo $firstaid_image_part_3_alias_inenglish;?></textarea>
                                      </div>
                                      
                                       <div class="form-group col-6 mb-3">
                                          <label for="dob" class="col-form-label s-12">Image Section Desc (part 3) In German</label>
                                          <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                              type="text" name="ingerman[]" value=""><?php echo $firstaid_image_part_3_alias_ingerman;?></textarea>
                                      </div>
                
                                      </div>  
                                               <!-- Short Description 1 Row -->
                        
                                          <div class="form-row">
                                            <div class="form-group mb-3">
                                            </div>
                                             <input class="form-control light s-12 datePicker" placeholder="" data-time-picker="false" type="hidden" name="alias_name[]"  value="<?php  echo $firstaid_footer_part_1_alias;?>">     
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Footer Heading In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $firstaid_footer_part_1_alias_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Footer Heading In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $firstaid_footer_part_1_alias_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            <!-- Button 1 Row -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $firstaid_footer_part_2_alias;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Footer Short Desc title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $firstaid_footer_part_2_alias_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Footer Short Desc title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $firstaid_footer_part_2_alias_ingerman;?>">
                                            </div>
                                                    
                                            </div>



                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $firstaid_footer_part_3_alias;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Footer Submit Button  title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $firstaid_footer_part_3_alias_inenglish ;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Footer Button title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $firstaid_footer_part_3_alias_ingerman ;?>">
                                            </div>
                                             <div class="card-body">
                                                <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                                              </div>
                                            </div>
                                            

                                           <!--  <div class="form-group col-4 mb-3">
                                                <label for="dob" class="col-form-label s-12">Image Upload</label>
                                               <input type="file" class="form-control"  name="image" id="photo"  style="width: 382px">
                                            </div> -->
                                                  
                    </div> 
                           
                    </form>
          
          
          
          
          </div>
          
          
          <div class="showHideForm" id="showHide-10">
          <form id="our_process_form" action="" method="POST" enctype="multipart/form-data">
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                             <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_Our_process_Title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <label for="dob" class="col-form-label s-12">Process Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $_Our_process_Title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Process Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $_Our_process_Title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            </div>
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $_driving_school_title_ ;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Process Description In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $_driving_school_title_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Process Description In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $_driving_school_title_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            
                                            <!-- Card 1 -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $First_Aid_Course_Title_ ;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 1 Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $First_Aid_Course_Title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 1 Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $First_Aid_Course_Title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_Requirement_learning_title_ ;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 1 Description In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $_Requirement_learning_title_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 1 Description In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $_Requirement_learning_title_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            
                                           <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $button1;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 1 Button In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $button1_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 1 Button In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $button1_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                              
                                            <!-- Card 2 -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_Learning_driving_license_title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 2 Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $_Learning_driving_license_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 2 Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $_Learning_driving_license_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                             
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_download_forms_title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 2 Description In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $_download_forms_title_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 2 Description In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $_download_forms_title_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $button2;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 2 Button In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $button2_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 2 Button In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $button2_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- Card 3 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_Trial_lesson_title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 3 Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $_Trial_lesson_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 3 Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $_Trial_lesson_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- Button 6 -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_Arrange_trial_lesson_title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 3 Description In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $_Arrange_trial_lesson_title_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 3 Description In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $_Arrange_trial_lesson_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>


                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $button3;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 3 Button In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $button3_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 3 Button In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $button3_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- Button 7 -->
                                            
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $VKU;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 4 Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $VKU_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 4 Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $VKU_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- Button 8 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_Double_lessons_accompany_title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 4 Description In English</label>
                                                <textarea rows="5" cols="90"t class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $_Double_lessons_accompany_title_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 4 Description In German</label>
                                              <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $_Double_lessons_accompany_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $button4;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 4 Button In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $button4_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 4 Button In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $button4_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- button 9 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_Driving_Lessons_title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 5 Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $_Driving_Lessons_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 5 Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $_Driving_Lessons_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- button 10 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_driving_school_agrgur_title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 5 Description In English</label>
                                               <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $_driving_school_agrgur_title_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 5 Description In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $_driving_school_agrgur_title_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $button5;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 5 Button In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $button5_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 5 Button In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $button5_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- Button 11 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $process_course_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 6 Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $process_course_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 6 Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $process_course_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- button 12 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_advanced_training_title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 6 Description In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $_advanced_training_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 6 Description In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $_advanced_training_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $button6;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 6 Button In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $button6_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Card 6 Button In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $button6_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                                  <div class="card-body">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                            </div>
                        </div> 
                    </form>
          
          
          
            <div class="showHideForm" id="showHide-11">
                                              <form id="pricingForm" action="" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                             <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $titleInAlias;?>">
                                            <!-- </div> -->
                                            
                                             <div class="form-group col-6 mb-3">
                                               <label for="dob" class="col-form-label s-12">Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $titleInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $titleInGerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $driveInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Drive Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" required data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $driveInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Drive Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder=""  required data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $driveInGerman;?>">
                                            </div>
                                                    
                                            </div>

                                                     <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $payInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Pay Comfortably In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $payInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Pay Comfortably In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $payInGerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                     <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $descInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Description In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" required data-time-picker="false"
                                                    type="text" name="inenglish[]">
                                                    <?php  echo trim($descInEnglish);?>
                                                  </textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Description In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" required data-time-picker="false"
                                                    type="text" name="ingerman[]">
                                                    <?php  echo trim($descInGerman);?>
                                                  </textarea>
                                            </div>
                                                    
                                            </div>
                                            <?php for ($i=1; $i < 7; $i++) { 
                                              if ($i==1) {
                                                $planTitleInAlias=$alias[7];
                                            $planTitleInEnglish=$inenglish[7];
                                            $planTitleInGerman = $ingerman[7];

                                            $planDescInAlias=$alias[37];
                                            $planDescInEnglish=$inenglish[37];
                                            $planDescInGerman = $ingerman[37];


                                            $planButtonInAlias=$alias[43];
                                            $planButtonInEnglish=$inenglish[43];
                                            $planButtonInGerman = $ingerman[43];
                                              }if ($i==2) {
                                                $planTitleInAlias=$alias[13];
                                            $planTitleInEnglish=$inenglish[13];
                                            $planTitleInGerman = $ingerman[13];

                                            $planDescInAlias=$alias[38];
                                            $planDescInEnglish=$inenglish[38];
                                            $planDescInGerman = $ingerman[38];

                                            $planButtonInAlias=$alias[44];
                                            $planButtonInEnglish=$inenglish[44];
                                            $planButtonInGerman = $ingerman[44];
                                              }if ($i==3) {
                                                $planTitleInAlias=$alias[18];
                                            $planTitleInEnglish=$inenglish[18];
                                            $planTitleInGerman = $ingerman[18];

                                            $planDescInAlias=$alias[39];
                                            $planDescInEnglish=$inenglish[39];
                                            $planDescInGerman = $ingerman[39];

                                             $planButtonInAlias=$alias[45];
                                            $planButtonInEnglish=$inenglish[45];
                                            $planButtonInGerman = $ingerman[45];
                                              }if ($i==4) {
                                                $planTitleInAlias=$alias[24];
                                            $planTitleInEnglish=$inenglish[24];
                                            $planTitleInGerman = $ingerman[24];

                                            $planDescInAlias=$alias[25];
                                            $planDescInEnglish=$inenglish[25];
                                            $planDescInGerman = $ingerman[25];

                                             $planButtonInAlias=$alias[46];
                                            $planButtonInEnglish=$inenglish[46];
                                            $planButtonInGerman = $ingerman[46];
                                              }if ($i==5) {
                                               $planTitleInAlias=$alias[31];
                                            $planTitleInEnglish=$inenglish[31];
                                            $planTitleInGerman = $ingerman[31];

                                            $planDescInAlias=$alias[41];
                                            $planDescInEnglish=$inenglish[41];
                                            $planDescInGerman = $ingerman[41];

                                             $planButtonInAlias=$alias[47];
                                            $planButtonInEnglish=$inenglish[47];
                                            $planButtonInGerman = $ingerman[47]; 
                                              }if ($i==6) {
                                                $planTitleInAlias=$alias[32];
                                            $planTitleInEnglish=$inenglish[32];
                                            $planTitleInGerman = $ingerman[32];

                                            $planDescInAlias=$alias[42];
                                            $planDescInEnglish=$inenglish[42];
                                            $planDescInGerman = $ingerman[42];

                                             $planButtonInAlias=$alias[48];
                                            $planButtonInEnglish=$inenglish[48];
                                            $planButtonInGerman = $ingerman[48];
                                              }
                                            

                                            

                                            

                                            

                                            

                                            
                                              ?>
                                              
                                            
                                           <h4 class="">Plan <?php echo $i; ?></h4> 
                                            <div class="form-row mt-4">

                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $planTitleInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Plan Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $planTitleInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Plan Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $planTitleInGerman;?>">
                                            </div>
                                                    
                                            </div>

                                                  <div class="form-row">
                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $planDescInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Plan Description In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $planDescInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Plan Description In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $planDescInGerman;?>">
                                            </div>
                                                    
</div>                                                 
<div class="form-row">
                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $planButtonInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Plan Button <?php echo $i; ?> In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $planButtonInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Plan Button <?php echo $i; ?> In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $planButtonInGerman;?>">
                                            </div>
                                                    
                                      </div>

                                      <div class="form-row">
                                        
                                                     
                                       <?php 
                                       if ($i==1) {
                                         $count=5;


                                       }elseif ($i==2) {
                                        $count=5;
                                       }elseif ($i==3) {
                                         $count=6;
                                       }elseif ($i==4) {
                                         $count=5;
                                       }elseif ($i==5) {
                                         $count=0;
                                       }else{
                                          $count=0;
                                        }
                                        
                                         for ($j=1; $j < $count; $j++) { 
                                          if ($i==1) {
                                        if ($j==1) {
                              $planOtionInAlias=$alias[9];
                              $planOptionInEnglish=$inenglish[9];
                               $planOptionInGerman = $ingerman[9];
                                          }if ($j==2) {
                             $planOtionInAlias=$alias[10];
                             $planOptionInEnglish=$inenglish[10];
                             $planOptionInGerman = $ingerman[10];
                                          }if ($j==3) {
                             $planOtionInAlias=$alias[11];
                             $planOptionInEnglish=$inenglish[11];
                             $planOptionInGerman = $ingerman[11];
                                          }if ($j==4) {
                             $planOtionInAlias=$alias[12];
                             $planOptionInEnglish=$inenglish[12];
                             $planOptionInGerman = $ingerman[12];
                                          }
                                         }     

                                         if ($i==2) {
                                        if ($j==1) {
                              $planOtionInAlias=$alias[14];
                              $planOptionInEnglish=$inenglish[14];
                               $planOptionInGerman = $ingerman[14];
                                          }if ($j==2) {
                             $planOtionInAlias=$alias[15];
                             $planOptionInEnglish=$inenglish[15];
                             $planOptionInGerman = $ingerman[15];
                                          }if ($j==3) {
                             $planOtionInAlias=$alias[16];
                             $planOptionInEnglish=$inenglish[16];
                             $planOptionInGerman = $ingerman[16];
                                          }if ($j==4) {
                             $planOtionInAlias=$alias[17];
                             $planOptionInEnglish=$inenglish[17];
                             $planOptionInGerman = $ingerman[17];
                                          }
                                         }   

                                                     if ($i==3) {
                                        if ($j==1) {
                              $planOtionInAlias=$alias[19];
                              $planOptionInEnglish=$inenglish[19];
                               $planOptionInGerman = $ingerman[19];
                                          }if ($j==2) {
                             $planOtionInAlias=$alias[20];
                             $planOptionInEnglish=$inenglish[20];
                             $planOptionInGerman = $ingerman[20];
                                          }if ($j==3) {
                             $planOtionInAlias=$alias[21];
                             $planOptionInEnglish=$inenglish[21];
                             $planOptionInGerman = $ingerman[21];
                                          }if ($j==4) {
                             $planOtionInAlias=$alias[22];
                             $planOptionInEnglish=$inenglish[22];
                             $planOptionInGerman = $ingerman[22];
                                          }if ($j==5) {
                             $planOtionInAlias=$alias[23];
                             $planOptionInEnglish=$inenglish[23];
                             $planOptionInGerman = $ingerman[23];
                                          }
                                         }                    

                                         if ($i==4) {
                                        if ($j==1) {
                              $planOtionInAlias=$alias[26];
                              $planOptionInEnglish=$inenglish[26];
                               $planOptionInGerman = $ingerman[26];
                                          }if ($j==2) {
                             $planOtionInAlias=$alias[27];
                             $planOptionInEnglish=$inenglish[27];
                             $planOptionInGerman = $ingerman[27];
                                          }if ($j==3) {
                             $planOtionInAlias=$alias[28];
                             $planOptionInEnglish=$inenglish[28];
                             $planOptionInGerman = $ingerman[28];
                                          }if ($j==4) {
                             $planOtionInAlias=$alias[29];
                             $planOptionInEnglish=$inenglish[29];
                             $planOptionInGerman = $ingerman[29];
                                          }
                                         } 

                                   
                                             

                                            

                                           

                                        
                                       ?>           

                                   <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php echo $planOtionInAlias; ?>">
                                                 
                                                  
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Plan Option<?php echo $j; ?> In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $planOptionInEnglish;?>">
                                            </div>
                                               <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Plan Option<?php echo $j; ?> In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $planOptionInGerman;?>">
                                            </div>
                                          <?php } ?>
                                          <?php if ( $i==1 || $i==2 || $i==3|| $i==4 || $i==5 || $i==6) { 


                                                           if ($i==1) {
                                                      
                                                            
                                                 $planOtionDescInAlias=$alias[49];
                                              $planOptionDescInEnglish=$inenglish[49];
                                              $planOptionDescInGerman = $ingerman[49];
                                                            
                                                           
                                                          }
                                                           if ($i==2) {
                                                          
                                                            
                                               $planOtionDescInAlias=$alias[50];
                                              $planOptionDescInEnglish=$inenglish[50];
                                              $planOptionDescInGerman = $ingerman[50];
                                                            
                                                           
                                                          }
                                                     if ($i==3) {
                                                          
                                                            
                                            $planOtionDescInAlias=$alias[51];
                                              $planOptionDescInEnglish=$inenglish[51];
                                              $planOptionDescInGerman = $ingerman[51];
                                                            
                                                           
                                                          }
                                                  if ($i==4) {
                                         
                                           
                                             
                                           $planOtionDescInAlias=$alias[30];
                             $planOptionDescInEnglish=$inenglish[30];
                             $planOptionDescInGerman = $ingerman[30];
                                           
                                          
                                         }if ($i==5) {
                                           $planOtionDescInAlias=$alias[35];
                             $planOptionDescInEnglish=$inenglish[35];
                             $planOptionDescInGerman = $ingerman[35];
                                         }if ($i==6) {
                                           $planOtionDescInAlias=$alias[33];
                             $planOptionDescInEnglish=$inenglish[33];
                             $planOptionDescInGerman = $ingerman[33];
                                         }
                                            ?>
                                                         <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $planOtionDescInAlias;?>">
                                                 
                                                  
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Plan Option description In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value=""><?php  echo $planOptionDescInEnglish;?></textarea>
                                            </div>
                                               <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Plan Option description In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value=""><?php  echo $planOptionDescInGerman;?></textarea>
                                            </div>

                                              <?php } ?>   
                                            </div>

                                            <?php } ?>
                                            
                                                  <div class="card-body">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                            </div>
                        
                    </form>
          </div>
          
          
          
          <div class="showHideForm" id="showHide-12">
          <form id="about_us_page" action="" method="POST" enctype="multipart/form-data">
                                         <div class="form-row">
                                                 <div class="form-group mb-3">
                                             <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $about_us_page_Title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <label for="dob" class="col-form-label s-12">About Us In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $about_us_page_Title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">About Us Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $about_us_page_Title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            </div>
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $heading_1_title;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Heading In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $heading_1_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Heading In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $heading_1_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            <!-- Card 1 -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $heading_1_desc ;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Heading Desc In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $heading_1_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Heading Desc In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $heading_1_desc_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            
                                              
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $heading_2_title ;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Paragraph Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $heading_2_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Paragraph Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $heading_2_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                           <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $heading_2_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Paragraph Desc In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $heading_2_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Paragraph Desc In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $heading_2_desc_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                              
                                            <div class="row">
                                                  <h5>Team Member 1 Details</h5><hr>  
                                            </div>
                                            <!-- Card 2 -->
                                            <div class="form-row">
                                            <div class="form-group mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member Photo</label>
                                               
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false"
                                                    type="file" name="_Team1_photo_" value="<?php echo $mige_photo;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <img src="<?=$config['base_url']?>/images/team_new/<?php echo $mige_photo_inenglish;?>" style='height: 250px;width: 250px;'>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mige_name_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 1 Name In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $mige_name_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 1 Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $mige_name_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                             
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mige_name_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 1 Description In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $mige_name_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 1 Description In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $mige_name_desc_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mige_email;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 1 Email In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $mige_email_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 1 Email In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $mige_email_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mige_phone_no;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 1 Phone No. In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" name="inenglish[]" value=""><?php  echo $mige_phone_no_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 1 Phone No. In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" name="ingerman[]" value=""><?php  echo $mige_phone_no_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <div class="row">
                                                  <h5>Team Member 2 Details</h5><hr>  
                                            </div>

                                            <div class="form-row">
                                            <div class="form-group mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member Photo</label>
                                               
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false"
                                                    type="file" name="_Team2_photo_" value="<?php echo $gianni_photo;?>">
                                            </div>
                                            
                                            
                                             <div class="form-group col-6 mb-3">
                                               <img src="<?=$config['base_url']?>/images/team_new/<?php echo $gianni_photo_inenglish;?>" style='height: 250px;width: 250px;'>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $gianni_name_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 2 Name In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $gianni_name_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 2 Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $gianni_name_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- Card 3 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $gianni_name_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 2 Desc In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php echo $gianni_name_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 2 Desc In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $gianni_name_desc_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $gianni_email;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 2 Email In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php echo $gianni_email_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 2 Email In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $gianni_email_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $gianni_phone_no;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 2 Phone No. In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php echo $gianni_phone_no_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 2 Phone No. In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $gianni_phone_no_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <div class="row">
                                                  <h5>Team Member 3 Details</h5><hr>  
                                            </div>
                                            <!-- Button 6 -->
                                            <div class="form-row">
                                            <div class="form-group mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member Photo</label>
                                                
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false"
                                                    type="file" name="_Team3_photo_" value="<?php echo $franky_photo;?>">
                                            </div>
                                            
                                            
                                             <div class="form-group col-6 mb-3">
                                               <img src="<?=$config['base_url']?>/images/team_new/<?php echo $franky_photo_inenglish;?>" style='height: 250px;width: 250px;'>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $franky_name_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 3 Name In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $franky_name_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 3 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $franky_name_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>


                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $franky_name_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 3 Desc In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $franky_name_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 3 Desc In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $franky_name_desc_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php echo $franky_email;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 3 Mail In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php  echo $franky_email_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 3 Mail In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $franky_email_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php echo $franky_phone_no;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 3 Phone No. In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php  echo $franky_phone_no_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 3 Phone No. In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $franky_phone_no_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <!-- Button 7 -->
                                            
                                            <div class="row">
                                                  <h5>Team Member 4 Details</h5><hr>  
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member Photo</label>
                                               
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false"
                                                    type="file" name="_Team4_photo_" value="<?php echo $mateen_photo;?>">
                                            </div>
                                            
                                            
                                             <div class="form-group col-6 mb-3">
                                               <img src="<?=$config['base_url']?>/images/team_new/<?php echo $mateen_photo_inenglish;?>" style='height: 250px;width: 250px;'>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mateen_name_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 4 Name In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $mateen_name_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 4 Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $mateen_name_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- Button 8 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mateen_name_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 4 Desc In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $mateen_name_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 4 desc In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $mateen_name_desc_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mateen_email;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 4 Email In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $mateen_email_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 4 Email In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $mateen_email_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mateen_phone_no;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 4 Phone No. In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php  echo $mateen_phone_no_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 4 Phone No. In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $mateen_phone_no_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <div class="row">
                                                  <h5>Team Member 5 Details</h5><hr>  
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member Photo</label>
                                                
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false"
                                                    type="file" name="_Team5_photo_" value="<?php echo $nidi_photo;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <img src="<?=$config['base_url']?>/images/team_new/<?php echo $nidi_photo_inenglish;?>" style='height: 250px;width: 250px;'>
                                            </div>
                                            
                                           
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $nidi_name_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 5 Name In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $nidi_name_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 5 Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $nidi_name_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- button 9 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $nidi_name_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 5 Desc In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $nidi_name_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 5 Desc In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $nidi_name_desc_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $nidi_email;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 5 Email In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php  echo $nidi_email_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 5 Email In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"  type="text" name="ingerman[]" value=""><?php  echo $nidi_email_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $nidi_phone_no;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 5 Phone No. In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php  echo $nidi_phone_no_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 5 Phone No. In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"  type="text" name="ingerman[]" value=""><?php  echo $nidi_phone_no_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <!-- button 10 -->

                                            <div class="row">
                                                  <h5>Team Member 6 Details</h5><hr>  
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member Photo</label>
                                               
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false"
                                                    type="file" name="_Team6_photo_" value="<?php echo $andrea_photo;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <img src="<?=$config['base_url']?>/images/team_new/<?php echo $andrea_photo_inenglish;?>" style='height: 250px;width: 250px;'>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $andrea;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 6 Name In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $andrea_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 6 Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $andrea_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $andrea_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 6 Desc In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $andrea_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 6 Desc In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $andrea_desc_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $andrea_email;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 6 Email In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php  echo $andrea_email_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 6 Email In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $andrea_email_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $andrea_phone_no;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 6 Phone No. In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php  echo $andrea_phone_no_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 6 Phone No. In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $andrea_phone_no_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <!-- Button 11 -->
                                            <div class="row">
                                                  <h5>Team Member 7 Details</h5><hr>  
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member Photo</label>
                                               
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false"
                                                    type="file" name="_Team7_photo_" value="<?php echo $barol_photo;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <img src="<?=$config['base_url']?>/images/team_new/<?php echo $barol_photo_inenglish;?>" style='height: 250px;width: 250px;'>
                                            </div>
                                                    
                                            </div>

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $barol;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 7 Name In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $barol_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 7 Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $barol_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- button 12 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $barol_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 7 Desc In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $barol_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 7 Desc In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $barol_desc_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $barol_email;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 7 Email In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $barol_email_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 7 Email In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $barol_email_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $barol_phone_no;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 7 Phone No. In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $barol_phone_no_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 7 Phone No. In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $barol_phone_no_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <div class="row">
                                                  <h5>Team Member 8 Details</h5><hr>  
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member Photo</label>
                                             
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false"
                                                    type="file" name="_Team8_photo_" value="<?php echo $desiree_photo;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <img src="<?=$config['base_url']?>/images/team_new/<?php echo $desiree_photo_inenglish;?>" style='height: 250px;width: 250px;'>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $desiree;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 8 Name In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $desiree_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 8 Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $desiree_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                      
                      
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $desiree_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 8 Desc In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $desiree_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 8 Desc In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $desiree_desc_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $desiree_email;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 8 Email In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php  echo $desiree_email_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 8 Email In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"  type="text" name="ingerman[]" value=""><?php  echo $desiree_email_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $desiree_phone_no;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 8 Phone No. In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php  echo $desiree_phone_no_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 8 Phone No. In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"  type="text" name="ingerman[]" value=""><?php  echo $desiree_phone_no_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                      
                      
                                            <div class="row">
                                                  <h5>Team Member 9 Details</h5><hr>  
                                            </div>
                      
                                            <div class="form-row">
                                            <div class="form-group mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member Photo</label>
                                              
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false"
                                                    type="file" name="_Team9_photo_" value="<?php echo $mateen2_photo;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <img src="<?=$config['base_url']?>/images/team_new/<?php echo $mateen2_photo_inenglish;?>" style='height: 250px;width: 250px;'>
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                   <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mateen2;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 9 Name In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $mateen2_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 9 Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $mateen2_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                      
                      
                      
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mateen2_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 9 Desc In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $mateen2_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 9 Desc In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $mateen2_desc_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mateen2_email;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 9 Email In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php  echo $mateen2_email_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 9 Email In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $mateen2_email_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                      
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mateen2_phone_no;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 9 Phone No. In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php  echo $mateen2_phone_no_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 9 Phone No. In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $mateen2_phone_no_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                      
                      
                                            <div class="row">
                                                  <h5>Team Member 10 Details</h5><hr>  
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member Photo</label>
                                              
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false"
                                                    type="file" name="_Team10_photo_" value="<?php echo $roman1_photo;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <img src="<?=$config['base_url']?>/images/team_new/<?php echo $roman1_photo_inenglish;?>" style='height: 250px;width: 250px;'>
                                            </div>
                                                    
                                            </div>
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $roman1;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 10 Name In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $roman1_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 10 Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $roman1_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                      
                      
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $roman1_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 10 Desc In English</label>

                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $roman1_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 10 Desc In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $roman1_desc_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                      
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $roman1_email;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 10 Email In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php  echo $roman1_email_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 10 Desc In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"  type="text" name="ingerman[]" value=""><?php  echo $roman1_email_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $roman1_phone_no;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 10 Phone No. In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value=""><?php  echo $roman1_phone_no_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 10 Phone No. In German</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"  type="text" name="ingerman[]" value=""><?php  echo $roman1_phone_no_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                      
                                            <div class="row">
                                                  <h5>Team Member 11 Details</h5><hr>  
                                            </div>
                      
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member Photo</label>
                                                
                                             
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false"
                                                    type="file" name="_Team11_photo_" value="<?php echo $roman2_photo;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <img src="<?=$config['base_url']?>/images/team_new/<?php echo $roman2_photo_inenglish;?>" style='height: 250px;width: 250px;'>
                                            </div>
                                                    
                                            </div> 
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $roman2;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 11 Name In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $roman2_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 11 Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $roman2_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                      
                      
                      
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $roman2_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 11 Desc In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $roman2_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 11 Desc In German</label>
                                               <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $roman2_desc_ingerman;?></textarea>
                                            </div>
                       
                                            </div>
                      
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $roman2_email;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 11 Email In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"  type="text" name="inenglish[]" value=""><?php  echo $roman2_email_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 11 Email In German</label>
                                               <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $roman2_email_ingerman;?></textarea>
                                            </div>
                       
                                            </div>
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $roman2_phone_no;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 11 Phone No. In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"  type="text" name="inenglish[]" value=""><?php  echo $roman2_phone_no_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 11 Phone No. In German</label>
                                               <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $roman2_phone_no_ingerman;?></textarea>
                                            </div>
                       
                                            </div>


                                            
                                            <div class="row">
                                                  <h5>Team Member 12 Details</h5><hr>  
                                            </div>
                      
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member Photo</label>
                                                
                                             
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false"
                                                    type="file" name="_Team12_photo_" value="<?php echo $man_photo;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <img src="<?=$config['base_url']?>/images/team_new/<?php echo $man_photo_inenglish;?>" style='height: 250px;width: 250px;'>
                                            </div>
                                                    
                                            </div> 
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $man;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 12 Name In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $man_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 12 Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $man_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                      
                      
                      
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $man_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 12 Desc In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $man_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 12 Desc In German</label>
                                               <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $man_desc_ingerman;?></textarea>
                                            </div>
                       
                                            </div>
                      
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $man_email;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 12 Email In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"  type="text" name="inenglish[]" value=""><?php  echo $man_email_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 12 Email In German</label>
                                               <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $man_email_ingerman;?></textarea>
                                            </div>
                       
                                            </div>
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $roman2_phone_no;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 12 Phone No. In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"  type="text" name="inenglish[]" value=""><?php  echo $man_phone_no_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 12 Phone No. In German</label>
                                               <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $man_phone_no_ingerman;?></textarea>
                                            </div>
                       
                                            </div>
                                            <div class="row">
                                                  <h5>Team Member 13 Details</h5><hr>  
                                            </div>
                      
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member Photo</label>
                                                
                                             
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false"
                                                    type="file" name="_Team13_photo_" value="<?php echo $girl_photo;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <img src="<?=$config['base_url']?>/images/team_new/<?php echo $girl_photo_inenglish;?>" style='height: 250px;width: 250px;'>
                                            </div>
                                                    
                                            </div> 
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $girl;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 13 Name In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $girl_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 13 Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $girl_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                      
                      
                      
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $girl_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 13 Desc In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value=""><?php  echo $girl_desc_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 13 Desc In German</label>
                                               <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value=""><?php  echo $girl_desc_ingerman;?></textarea>
                                            </div>
                       
                                            </div>
                      
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $girl_email;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 13 Email In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"  type="text" name="inenglish[]" value=""><?php  echo $girl_email_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 13 Email In German</label>
                                               <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $girl_email_ingerman;?></textarea>
                                            </div>
                       
                                            </div>
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $girl_phone_no;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 13 Phone No. In English</label>
                                                <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"  type="text" name="inenglish[]" value=""><?php  echo $girl_phone_no_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Team Member 13 Phone No. In German</label>
                                               <textarea rows="1" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value=""><?php  echo $girl_phone_no_ingerman;?></textarea>
                                            </div>
                       
                                            </div>

                                <div class="card-body">
                                  <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                                </div>
                        
                        
                    </form>
          
           </div>
           <div class="showHideForm" id="showHide-13">
           <!----------------------------------- Contact Us ----------------------------------------------------->
                    <form id="our_contact_us_form" action="" method="POST" enctype="multipart/form-data">
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                             <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_contact_Title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <label for="dob" class="col-form-label s-12">Contact Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php echo $_contact_Title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Contact Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $_contact_Title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            </div>
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $_Wettingen_title_ ;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 1 In English</label>
                                                <textarea class="form-control r-0 light s-12 datePicker" rows="4" cols="50" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $_Wettingen_title_inenglish;?>"><?php  echo $_Wettingen_title_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 1 In German</label>
                                                <textarea class="form-control r-0 light s-12 datePicker" rows="4" cols="50" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $_Wettingen_title_ingerman;?>"><?php  echo $_Wettingen_title_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                            
                                            <!-- Card 1 -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $email1 ;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 1 Email In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $email1_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 1 Email In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $email1_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $contact_no_1 ;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 1 Telephone In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $contact_no_1_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 1 Telephone In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $contact_no_1_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                           <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_Hauptlin_Ducati_title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 2 In English</label>
                                                <textarea class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" rows="4" cols="50"
                                                    type="text" name="inenglish[]" value="<?php  echo $_Hauptlin_Ducati_title_inenglish;?>"><?php  echo $_Hauptlin_Ducati_title_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 2 In German</label>
                                                <textarea class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" rows="4" cols="50"
                                                    type="text" name="ingerman[]" value="<?php  echo $_Hauptlin_Ducati_title_ingerman;?>"><?php  echo $_Hauptlin_Ducati_title_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                              
                                            <!-- Card 2 -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $email2;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 2 Email In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $email2_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 2 Email In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $email2_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                             
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $contact_no_2;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 2 Telephone In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $contact_no_2_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 2 Telephone In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $contact_no_2_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_Zurich_title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 3 In English</label>
                                                <textarea class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" rows="4" cols="50"
                                                    type="text" name="inenglish[]" value="<?php  echo $_Zurich_title_inenglish;?>"><?php  echo $_Zurich_title_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 3 In German</label>
                                                <textarea class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" rows="4" cols="50"
                                                    type="text" name="ingerman[]" value="<?php  echo $_Zurich_title_ingerman;?>"><?php  echo $_Zurich_title_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <!-- Card 3 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $email3;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 3 Email In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $email3_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 3 Email In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $email3_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- Button 6 -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $contact_no_3;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 3 Telephone In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $contact_no_3_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Address 3 Telephone In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $contact_no_3_ingerman;?>">
                                            </div>
                                                    
                                            </div>


                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_contact_sub_Title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Sub Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $_contact_sub_Title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Sub Title Button In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $_contact_sub_Title_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- Button 7 -->
                                            
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $text_contact_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Sub Title Description In English</label>
                                                <textarea class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" rows="8" cols="50"
                                                    type="text" name="inenglish[]" value="<?php  echo $text_contact_inenglish;?>"><?php  echo $text_contact_inenglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Sub Title Description In German</label>
                                                <textarea class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" rows="8" cols="50"
                                                    type="text" name="ingerman[]" value="<?php  echo $text_contact_ingerman;?>"><?php  echo $text_contact_ingerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $email4;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Sub Title Email Description In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $email4_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Sub Title Email Description In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $email4_ingerman;?>">
                                            </div>
                                                    
                                            </div>


                                            <!-- Button 8 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $contact_no_4;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Sub Title Telephone Description In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $contact_no_4_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Sub Title Telephone Description In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $contact_no_4_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $_website_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Website In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $_website_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Website In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $_website_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <h3>Contact Form</h3>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="hidden" name="alias_name[]" value="<?php  echo $_Contact_Name_Title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Name In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value="<?php  echo $_Contact_Name_Title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value="<?php  echo $_Contact_Name_Title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="hidden" name="alias_name[]" value="<?php  echo $_Contact_email_title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Email In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value="<?php  echo $_Contact_email_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Email In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value="<?php  echo $_Contact_email_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="hidden" name="alias_name[]" value="<?php  echo $_Contact_Subject_Title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Subject In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value="<?php  echo $_Contact_Subject_Title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Subject In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value="<?php  echo $_Contact_Subject_Title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="hidden" name="alias_name[]" value="<?php  echo $_Contact_Phone_Number_Title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Phone Number In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value="<?php  echo $_Contact_Phone_Number_Title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Phone Number In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value="<?php  echo $_Contact_Phone_Number_Title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="hidden" name="alias_name[]" value="<?php  echo $_Contact_Message_Title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Message In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value="<?php  echo $_Contact_Message_Title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Message In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="ingerman[]" value="<?php  echo $_Contact_Message_Title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="hidden" name="alias_name[]" value="<?php  echo $_Contact_Send_messages_title_;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Submit Button In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="text" name="inenglish[]" value="<?php  echo $_Contact_Send_messages_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Submit Button In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"  type="text" name="ingerman[]" value="<?php  echo $_Contact_Send_messages_title_ingerman;?>">
                                             </div>
                                                    
                                            </div>
                                            
                            <div class="card-body">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                            </div>
                       
                    </form>
           </div>
            <div class="showHideForm" id="showHide-14">
            
             <form id="motoForm" action="" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                             <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $titleInAlias;?>">
                                            <!-- </div> -->
                                            
                                             <div class="form-group col-6 mb-3">
                                               <label for="dob" class="col-form-label s-12">Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $titleInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $titleInGerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $shortInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Short Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" required data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $shortInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Short Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder=""  required data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $shortInGerman;?>">
                                            </div>
                                                    
                                            </div>

      
                                            
                                                     <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $descInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Description In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" required data-time-picker="false"
                                                    type="text" name="inenglish[]">
                                                    <?php  echo trim($descInEnglish);?>
                                                  </textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Description In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" required data-time-picker="false"
                                                    type="text" name="ingerman[]">
                                                    <?php  echo trim($descInGerman);?>
                                                  </textarea>
                                            </div>
                                                    
                                            </div>
                                            <?php for ($i=1; $i < 4; $i++) { 
                                              if ($i==1) {
                                                $planTitleInAlias=$alias[1];
                                                $planTitleInEnglish=$inenglish[1];
                                                $planTitleInGerman = $ingerman[1];

                                                $planDescInAlias=$alias[24];
                                                $planDescInEnglish=$inenglish[24];
                                                $planDescInGerman = $ingerman[24];

                                              }if ($i==2) {
                                                $planTitleInAlias=$alias[2];
                                                $planTitleInEnglish=$inenglish[2];
                                                $planTitleInGerman = $ingerman[2];

                                                $planDescInAlias=$alias[25];
                                                $planDescInEnglish=$inenglish[25];
                                                $planDescInGerman = $ingerman[25];

                                              }if ($i==3) {
                                                $planTitleInAlias=$alias[3];
                                                $planTitleInEnglish=$inenglish[3];
                                                $planTitleInGerman = $ingerman[3];

                                                $planDescInAlias=$alias[26];
                                                $planDescInEnglish=$inenglish[26];
                                                $planDescInGerman = $ingerman[26];

                                              }

                                              ?>
                                              
                                            
                                           <h4 class="">Course <?php echo $i; ?></h4> 
                                            <div class="form-row mt-4">

                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $planTitleInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Course Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $planTitleInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Course Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $planTitleInGerman;?>">
                                            </div>
                                                    
                                            </div>
                                              <div class="form-row">
                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $planDescInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Course Description In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value=""><?php  echo $planDescInEnglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Course Description In German</label>
                                               <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value=""><?php  echo $planDescInGerman;?></textarea>
                                            </div>
                                                    
                                          </div>                                                 


                                            <?php } ?>

                                           <h4 class="">Motorcycle Test Requirements</h4> 


                                            <div class="form-row mt-4">

                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $alias[38];?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Main Title Description In English</label>
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $inenglish[38];?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Main Title Description In German</label>
                                                <input class="form-control r-0 light s-12" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $ingerman[38];?>">
                                            </div>

                                                </div> 


                                                  <?php for ($i=1; $i < 3; $i++) {
                                                  if ($i==1) {
                                                  $testTitle='Clothing';
                                                  $requirementShortInAlias=$alias[4];
                                                  $requirementShortInEnglish=$inenglish[4];
                                                  $requirementShortInGerman = $ingerman[4];
                                                  }
                                                  if ($i==2) {
                                                  $testTitle='Moto';
                                                  $requirementInAlias=$alias[27];
                                                  $requirementInEnglish=$inenglish[27];
                                                  $requirementInGerman = $ingerman[27];
                                                  }
                                                   ?>
                                            <div class="form-row mt-4">

                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $requirementShortInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12"><?php echo $testTitle;?> Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $requirementShortInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12"><?php echo $testTitle;?> Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $requirementShortInGerman;?>">
                                            </div>

                                                </div> 
                                                <?php 
                                                if ($i==1) {
                                                  $count1=3;
                                                }elseif ($i==2) {
                                                  $count1=4;
                                                }
                                                for ($c=1; $c < $count1; $c++) { 
                                                  if ($i==1) {
                                                  if ($c==1) {
                                                    $categoryTitleInAlias=$alias[5];
                                                    $categoryTitleInEnglish=$inenglish[5];
                                                    $categoryTitleInGerman = $ingerman[5]; 

                                                    $categoryDescInAlias=$alias[28];
                                                    $categoryDescInEnglish=$inenglish[28];
                                                    $categoryDescInGerman = $ingerman[28];

                                                  }
                                                  if ($c==2) {
                                                    $categoryTitleInAlias=$alias[10];
                                                    $categoryTitleInEnglish=$inenglish[10];
                                                    $categoryTitleInGerman = $ingerman[10];

                                                    $categoryDescInAlias=$alias[29];
                                                    $categoryDescInEnglish=$inenglish[29];
                                                    $categoryDescInGerman = $ingerman[29];
                                                  }
                                                   
                                                  }
                                                  if ($i==2) {
                                                    if ($c==1) {
                                                      $categoryTitleInAlias=$alias[35];
                                                      $categoryTitleInEnglish=$inenglish[35];
                                                      $categoryTitleInGerman = $ingerman[35];

                                                      $categoryDescInAlias=$alias[14];
                                                      $categoryDescInEnglish=$inenglish[14];
                                                      $categoryDescInGerman = $ingerman[14];
                                                    }
                                                    if ($c==2) {
                                                       $categoryTitleInAlias=$alias[36];
                                                       $categoryTitleInEnglish=$inenglish[36];
                                                       $categoryTitleInGerman = $ingerman[36];

                                                       $categoryDescInAlias=$alias[17];
                                                       $categoryDescInEnglish=$inenglish[17];
                                                       $categoryDescInGerman = $ingerman[17];
                                                    }
                                                    if ($c==3) {
                                                       $categoryTitleInAlias=$alias[15];
                                                       $categoryTitleInEnglish=$inenglish[15];
                                                       $categoryTitleInGerman = $ingerman[15];

                                                       $categoryDescInAlias=$alias[16];
                                                       $categoryDescInEnglish=$inenglish[16];
                                                       $categoryDescInGerman = $ingerman[16];
                                                    }
                                                    
                                                  }
                                                 ?>   <h4 class="">Category <?php echo $c; ?></h4>     
                                                   <div class="form-row">

                                                 <!-- <div class="form-group col-4 mb-3"> -->
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            <!-- </div> -->
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="hidden" name="alias_name[]" value="<?php  echo $categoryTitleInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Category <?php echo $c; ?> Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required type="text" name="inenglish[]" value="<?php  echo $categoryTitleInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Category <?php echo $c; ?> Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required type="text" name="ingerman[]" value="<?php  echo $categoryTitleInGerman;?>">
                                            </div>
                                           </div> 


                                              <?php 

                                               

                                              if ($c==1) {
                                                $count=5;
                                              }elseif ($c==2) {
                                                $count=6;
                                              }

                                              if ($i==1) {

                                              for ($j=1; $j < $count; $j++) {  
                                              if ($c==1) {
                                               if ($j==1) {
                                                 $categoryOptionInAlias=$alias[6];
                                                 $categoryOptionInEnglish=$inenglish[6];
                                                 $categoryOptionInGerman = $ingerman[6];
                                               }
                                               if ($j==2) {
                                                    $categoryOptionInAlias=$alias[7];
                                                 $categoryOptionInEnglish=$inenglish[7];
                                                 $categoryOptionInGerman = $ingerman[7];
                                               }
                                               if ($j==3) {
                                                    $categoryOptionInAlias=$alias[8];
                                                 $categoryOptionInEnglish=$inenglish[8];
                                                 $categoryOptionInGerman = $ingerman[8];
                                               }
                                               if ($j==4) {
                                                   $categoryOptionInAlias=$alias[9];
                                                 $categoryOptionInEnglish=$inenglish[9];
                                                 $categoryOptionInGerman = $ingerman[9];
                                               }
                                              }
                                              if ($c==2) {
                                                if ($j==1) {
                                                 $categoryOptionInAlias=$alias[30];
                                                 $categoryOptionInEnglish=$inenglish[30];
                                                 $categoryOptionInGerman = $ingerman[30];
                                               }
                                               if ($j==2) {
                                                    $categoryOptionInAlias=$alias[31];
                                                 $categoryOptionInEnglish=$inenglish[31];
                                                 $categoryOptionInGerman = $ingerman[31];
                                               }
                                               if ($j==3) {
                                                    $categoryOptionInAlias=$alias[11];
                                                 $categoryOptionInEnglish=$inenglish[11];
                                                 $categoryOptionInGerman = $ingerman[11];
                                               }
                                               if ($j==4) {
                                                   $categoryOptionInAlias=$alias[12];
                                                 $categoryOptionInEnglish=$inenglish[12];
                                                 $categoryOptionInGerman = $ingerman[12];
                                               } 
                                               if ($j==5) {
                                                   $categoryOptionInAlias=$alias[32];
                                                 $categoryOptionInEnglish=$inenglish[32];
                                                 $categoryOptionInGerman = $ingerman[32];
                                               }
                                              }


                                                ?>

                                            <div class="form-row">
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $categoryOptionInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option <?php echo $j; ?> In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $categoryOptionInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option <?php echo $j; ?> Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $categoryOptionInGerman;?>">
                                            </div>
                                                    
                                            </div>
                                          <?php } }?>

                                            <div class="form-row">
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $categoryDescInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option Description In English</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value=""><?php  echo $categoryDescInEnglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option Description In German</label>
                                                <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value=""><?php  echo $categoryDescInGerman;?></textarea>
                                            </div>
                                                    
                                            </div>
                                       


                                          <?php } }?>

                                          <h4>Rent A Motorcycle</h4>
                                            <div class="form-row">
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $RentTitleInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Rent Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $RentTitleInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Rent Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $RentTitleInGerman;?>">
                                            </div>
                                                    
                                            </div>

                                                              <div class="form-row">
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $RentDescInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Rent Description In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $RentDescInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Rent Description In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $RentDescInGerman;?>">
                                            </div>
                                                    
                                            </div>                     


                                            <h4>Book MotorCycle Course</h4>
                                            <div class="form-row">
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $bookCourseTitleInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Book Course Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $bookCourseTitleInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Book Course Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $bookCourseTitleInGerman;?>">
                                            </div>
                                                    
                                            </div>

                                                              <div class="form-row">
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $bookCourseDescInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Book Course Description In English</label>
                                               <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value=""><?php  echo $bookCourseDescInEnglish;?></textarea>
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Book Course Description In German</label>
                                               <textarea rows="5" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value=""><?php  echo $bookCourseDescInGerman;?></textarea>
                                            </div>
                                                    
                                            </div>

                                              <div class="form-row">
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $bookCourseButtonInAlias;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Book Course Button In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="inenglish[]" value="<?php  echo $bookCourseButtonInEnglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Book Course Button In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" required
                                                    type="text" name="ingerman[]" value="<?php  echo $bookCourseButtonInGerman;?>">
                                            </div>
                                                    
                                            </div>

                                            
                                                  <div class="card-body">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                            </div>
                        </div>
                    </form>

          
<div class="showHideForm" id="showHide-15">
          <form id="menu_option_page" action="" method="POST" enctype="multipart/form-data">
          <div><h2>Home Menu</h2></div>
                                             <div class="form-row">
                    
                                                 <div class="form-group mb-3">
                                             <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $about_us_page_Title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <label for="dob" class="col-form-label s-12">Option 1 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $about_us_page_Title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 1 Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $about_us_page_Title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            </div>
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]"  value="<?php  echo $heading_1_title;?>">
                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 2 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $heading_1_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 2 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $heading_1_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            <!-- Card 1 -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $heading_1_desc ;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 3 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $heading_1_desc_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 3 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $heading_1_desc_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $heading_2_title ;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 4 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $heading_2_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 4 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $heading_2_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                           <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $heading_2_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 5 In English</label>
                                                 <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $heading_2_desc_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 5 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $heading_2_desc_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                              
                                            <!-- Card 2 -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mige_name_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 6 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $mige_name_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 6 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $mige_name_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                             
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mige_name_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 7 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $mige_name_desc_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 7 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $mige_name_desc_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                      
                      
                          <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $andrea;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 8 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $andrea_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 8 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $andrea_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                          <div class="mt-3"><h2>Sidebar Menu</h2></div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $gianni_name_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 1 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $gianni_name_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 1 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $gianni_name_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- Card 3 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $gianni_name_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 2 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $gianni_name_desc_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 2 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $gianni_name_desc_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- Button 6 -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $franky_name_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 3 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $franky_name_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 3 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $franky_name_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>


                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $franky_name_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 4 In English</label>
                                                 <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $franky_name_desc_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 4 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $franky_name_desc_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- Button 7 -->
                                            
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mateen_name_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 5 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $mateen_name_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 5 Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $mateen_name_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>



                                              <!-- <div class="form-row">
                                                 <div class="form-group mb-3">
                                                    <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <!--<input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $mateen_name_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 6 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $mateen_name_desc_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 6 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $mateen_name_desc_ingerman;?>">
                                            </div>
                                                    
                                            </div> -->

                                            <!-- Button 8 -->
                                              <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $contact;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 6 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $contact_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 6 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $contact_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                        

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $nidi_name_title;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 7 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $nidi_name_title_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 7 In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $nidi_name_title_ingerman;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- button 9 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias_name[]" value="<?php  echo $nidi_name_desc;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 8 In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php  echo $nidi_name_desc_inenglish;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 8 In German</label> 
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php  echo $nidi_name_desc_ingerman;?>">
                                            </div>
                                                    
                                            </div>
                                             <!-- button 10 -->
                                              <!--  -->
                      



                                        


                                                  <div class="card-body">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                            </div>
                        
                    </form>
          
           </div>
                    <!-- moto form -->
          <!-- Request A Trial Lesson Now -->
           <div class="showHideForm" id="showHide-16">
          <form id="trial_page" action="" method="POST" enctype="multipart/form-data">
         <!--  <div><h2>Page Name</h2></div> -->
                                             <div class="form-row">
                    
                                                 <div class="form-group mb-3">
                                             <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias[]" value="<?php echo $title_name_in;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                               <label for="dob" class="col-form-label s-12">Title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]"value="<?php  echo $title_name_in_english;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php echo $title_name_in_german;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                                <!-- Short Description 1 Row -->
                                                <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Short Description Alias Name</label>  -->
                                               
                                            </div>
                                             <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias[]" value="<?php echo $name_title_in;?>">                                                    
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Name title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php echo $name_title_in_english;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Name title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]"value="<?php echo $name_title_in_german;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            <!-- Card 1 -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias[]" value="<?php echo $email_title_in;?>" >
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Email title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php echo $email_title_in_english;?>" >
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Email title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php echo $email_title_in_german;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                              
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Button2 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias[]" value="<?php echo $DOB_title_in;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">D.O.B title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php echo $DOB_title_in_english;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">D.O.B title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php echo $DOB_title_in_german;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                           <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias[]" value="<?php echo $phone_title_in;?>" >
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Phone title In English</label>
                                                 <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php echo $phone_title_in_english;?>">
                                            </div>
                                            


                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Phone title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php echo $phone_title_in_german;?>">
                                            </div>
                                                    
                                            </div>
                                              
                                            <!-- Card 2 -->
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias[]" value="<?php echo $Place_to_go_title_In;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Place to go title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php echo $Place_to_go_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Place to go title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php echo $Place_to_go_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                            <div><h2>Where do you want to go Select</h2></div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias[]"value="<?php echo $Place_to_go_Option_1_title_In;?>">
                                            </div>
                                                <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 1 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php echo $Place_to_go_Option_1_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 1 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php echo $Place_to_go_Option_1_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="where_do_you_alias_name[]" value="<?php echo $Place_to_go_Option_2_title_In;?>">
                                            </div>
                                                  <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 2 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="where_to_go_inenglish[]" value="<?php echo $Place_to_go_Option_2_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 2 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="where_to_go_ingerman[]" value="<?php echo $Place_to_go_Option_2_title_In_german;?>">
                                            </div>
                                                    
                                            </div> 
                                         
                                                    <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="where_do_you_alias_name[]" value="<?php echo $Place_to_go_Option_3_title_In;?>">
                                            </div>
                                               <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 3 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="where_to_go_inenglish[]" value="<?php echo $Place_to_go_Option_3_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 3 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="where_to_go_ingerman[]" value="<?php echo $Place_to_go_Option_3_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                          <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="where_do_you_alias_name[]" value="<?php echo $Place_to_go_Option_4_title_In;?>">
                                            </div>
                                                         <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 4 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="where_to_go_inenglish[]"value="<?php echo $Place_to_go_Option_4_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 4 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="where_to_go_ingerman[]" value="<?php echo $Place_to_go_Option_4_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                               <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="where_do_you_alias_name[]" value="<?php echo $Place_to_go_Option_5_title_In;?>">
                                            </div>
                                                         <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 5 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="where_to_go_inenglish[]"value="<?php echo $Place_to_go_Option_5_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 5 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="where_to_go_ingerman[]" value="<?php echo $Place_to_go_Option_5_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias[]" value="<?php echo $Category_title_In;?>" >
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Category title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php echo $Category_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Category title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php echo $Category_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                            <div><h2>Category Select</h2></div>
                                                <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="category_alias_name[]"value="<?php echo $Category_Option_1_title_In;?>">
                                            </div>
                                                <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 1 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="category_inenglish[]" value="<?php echo $Category_Option_1_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 1 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="category_ingerman[]" value="<?php echo $Category_Option_1_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="category_alias_name[]" value="<?php echo $Category_Option_2_title_In;?>">
                                            </div>
                                                  <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 2 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="category_inenglish[]" value="<?php echo $Category_Option_2_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 2 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="category_ingerman[]" value="<?php echo $Category_Option_2_title_In_german;?>">
                                            </div>
                                                    
                                            </div> 
                                         
                                                    <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="category_alias_name[]" value="<?php echo $Category_Option_3_title_In;?>">
                                            </div>
                                               <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 3 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="category_inenglish[]" value="<?php echo $Category_Option_3_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 3 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="category_ingerman[]" value="<?php echo $Category_Option_3_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                          <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="category_alias_name[]" value="<?php echo $Category_Option_4_title_In;?>">
                                            </div>
                                                         <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 4 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="category_inenglish[]"value="<?php echo $Category_Option_4_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 4 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="category_ingerman[]" value="<?php echo $Category_Option_4_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                               <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="category_alias_name[]" value="<?php echo $Category_Option_5_title_In;?>">
                                            </div>
                                                         <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 5 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="category_inenglish[]"value="<?php echo $Category_Option_5_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 5 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="category_ingerman[]" value="<?php echo $Category_Option_5_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                      

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias[]" value="<?php echo $Available_title_In;?>" >
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Available title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php echo $Available_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Available title  In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php echo $Available_title_In_german;?>">
                                            </div>
                                                    
                                            </div>

                                            <!-- Card 3 -->

                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias[]"value="<?php echo $Select_days_title_In;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Select days title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php echo $Select_days_title_In_English;?>" >
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Select days title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php echo $Select_days_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                            
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias[]" value="<?php echo $Message_title_In;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Message title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php echo $Message_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Message title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php echo $Message_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                      
                      
            

                                            <!-- Button 8 -->
                                            <div><h2>Available Timings</h2></div>
                                                <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias[]"value="<?php echo $Available_Timings_Option_1_title_In;?>">
                                            </div>
                                                <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 1 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php echo $Available_Timings_Option_1_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 1 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php echo $Available_Timings_Option_1_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="slot_alias_name[]" value="<?php echo $Available_Timings_Option_2_title_In_alias;?>">
                                            </div>
                                                  <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 2 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="slot_inenglish[]" value="<?php echo $Available_Timings_Option_2_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 2 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="slot_ingerman[]" value="<?php echo $Available_Timings_Option_2_title_In_german;?>">
                                            </div>
                                                    
                                            </div> 
                                         
                                                    <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="slot_alias_name[]" value="<?php echo $Available_Timings_Option_3_title_In_alias;?>">
                                            </div>
                                               <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 3 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="slot_inenglish[]" value="<?php echo $Available_Timings_Option_3_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 3 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="slot_ingerman[]" value="<?php echo $Available_Timings_Option_3_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                          <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="slot_alias_name[]" value="<?php echo $Available_Timings_Option_4_title_In_alias;?>">
                                            </div>
                                                         <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 4 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="slot_inenglish[]"value="<?php echo $Available_Timings_Option_4_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 4 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="slot_ingerman[]" value="<?php echo $Available_Timings_Option_4_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                        
                                            <div><h2>Select Days</h2></div>
                                              <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias[]" value="<?php echo $Select_Days_Option_1_title_In;?>">
                                            </div>
                                               <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 1 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php echo $Select_Days_Option_1_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 1 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php echo $Select_Days_Option_1_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                             <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="day_alias_name[]" value="<?php echo $Select_Days_Option_2_title_In;?>">
                                            </div>
                                               <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 2 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="day_inenglish[]" value="<?php echo $Select_Days_Option_2_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 2 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="day_ingerman[]" value="<?php echo $Select_Days_Option_2_title_In_german;?>">
                                            </div>
                                                    
                                            </div> 
                                        
                                                <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="day_alias_name[]" value="<?php echo $Select_Days_Option_3_title_In;?>">
                                            </div>
                                               <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 3 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="day_inenglish[]" value="<?php echo $Select_Days_Option_3_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 3 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="day_ingerman[]" value="<?php echo $Select_Days_Option_3_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="day_alias_name[]" value="<?php echo $Select_Days_Option_4_title_In;?>">
                                            </div>
                                                   <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 4 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="day_inenglish[]" value="<?php echo $Select_Days_Option_4_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 4 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="day_ingerman[]" value="<?php echo $Select_Days_Option_4_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="day_alias_name[]" value="<?php echo $Select_Days_Option_5_title_In;?>">
                                            </div>
                                            <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 5 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="day_inenglish[]" value="<?php echo $Select_Days_Option_5_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 5 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="day_ingerman[]" value="<?php echo $Select_Days_Option_5_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                          <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="day_alias_name[]" value="<?php echo $Select_Days_Option_6_title_In;?>">
                                            </div>
                                               <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 6 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="day_inenglish[]" value="<?php echo $Select_Days_Option_6_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 6 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="day_ingerman[]" value="<?php echo $Select_Days_Option_6_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                               <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="day_alias_name[]" value="<?php echo $Select_Days_Option_7_title_In;?>">
                                            </div>
                                              <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 7 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="day_inenglish[]" value="<?php echo $Select_Days_Option_7_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 7 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="day_ingerman[]" value="<?php echo $Select_Days_Option_7_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="day_alias_name[]" value="<?php echo $Select_Days_Option_8_title_In;?>" >
                                            </div>
                                               <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 8 title  In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="day_inenglish[]" value="<?php echo $Select_Days_Option_8_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Option 8 title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="day_ingerman[]" value="<?php echo $Select_Days_Option_8_title_In_german;?>">
                                            </div>
                                                    
                                            </div>
                                            <div class="form-row">
                                                 <div class="form-group mb-3">
                                                  <!--   <label for="dob" class="col-form-label s-12">Button3 Alias Name</label>  -->
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="hidden" name="alias[]" value="<?php echo $submit_title_In;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Submit title In English</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="inenglish[]" value="<?php echo $submit_title_In_English;?>">
                                            </div>
                                            
                                             <div class="form-group col-6 mb-3">
                                                <label for="dob" class="col-form-label s-12">Submit title In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                    type="text" name="ingerman[]" value="<?php echo $submit_title_In_german;?>">
                                            </div>
                                                    
                                            </div>

                                                  <div class="card-body">
                                              <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                            </div>
                        
                    </form>
          
           </div>
          <!-- Trial Page --->
          

         <!-- term and condition start -->

                      <div class="showHideForm" id="showHide-18">
                                             <form id="term_and_condition_form" action="" method="POST" enctype="multipart/form-data">
                                               <div class="card-body" id="dynamic_field">

                                                 <div class="form-row">
                                                 <div class="form-group mb-3">
                                                 <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                                 <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                 type="hidden" name="alias_name[]" value="term_and_condition_heading_title">
                                                 </div>



                                                 <div class="form-group col-6 mb-3">
                                                 <label for="dob" class="col-form-label s-12">Heading Title In English</label>
                                                 <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                 type="text" name="inenglish[]" value="<?php echo $titleInEnglish; ?>">
                                                 </div>


                                                 <div class="form-group col-6 mb-3">
                                                 <label for="dob" class="col-form-label s-12">Heading Title In German</label>
                                                 <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                 type="text" name="ingerman[]" value="<?php echo $titleInGerman; ?>">
                                                 </div>

                                                
                                                 <!--    <div class="form-group col-2 mb-3" style="margin: auto;">
                                                 <button>Add More</button>
                                                 </div>  -->
                                                 </div>




                     <?php for ($i=1; $i <= 28; $i++) { 
                     if ($i==1) {
                       $titleInAlias=$alias[1];
                       $titleInGerman=$ingerman[1];
                       $titleInEnglish=$inenglish[1];

                       $descriptionInAlias=$alias[2];
                       $descriptionInGerman=$ingerman[2];
                       $descriptionInEnglish=$inenglish[2];
                     }if ($i==2) {
                       $titleInAlias=$alias[3];
                       $titleInGerman=$ingerman[3];
                       $titleInEnglish=$inenglish[3];

                       $descriptionInAlias=$alias[4];
                       $descriptionInGerman=$ingerman[4];
                       $descriptionInEnglish=$inenglish[4];
                     }if ($i==3) {
                       $titleInAlias=$alias[5];
                       $titleInGerman=$ingerman[5];
                       $titleInEnglish=$inenglish[5];

                       $descriptionInAlias=$alias[6];
                       $descriptionInGerman=$ingerman[6];
                       $descriptionInEnglish=$inenglish[6];
                     }if ($i==4) {
                       $titleInAlias=$alias[7];
                       $titleInGerman=$ingerman[7];
                       $titleInEnglish=$inenglish[7];

                       $descriptionInAlias=$alias[8];
                       $descriptionInGerman=$ingerman[8];
                       $descriptionInEnglish=$inenglish[8];
                     }if ($i==5) {
                       $titleInAlias=$alias[9];
                       $titleInGerman=$ingerman[9];
                       $titleInEnglish=$inenglish[9];

                       $descriptionInAlias=$alias[10];
                       $descriptionInGerman=$ingerman[10];
                       $descriptionInEnglish=$inenglish[10];
                     }if ($i==6) {
                       $titleInAlias=$alias[11];
                       $titleInGerman=$ingerman[11];
                       $titleInEnglish=$inenglish[11];

                       $descriptionInAlias=$alias[12];
                       $descriptionInGerman=$ingerman[12];
                       $descriptionInEnglish=$inenglish[12];
                     }if ($i==7) {
                       $titleInAlias=$alias[13];
                       $titleInGerman=$ingerman[13];
                       $titleInEnglish=$inenglish[13];

                       $descriptionInAlias=$alias[14];
                       $descriptionInGerman=$ingerman[14];
                       $descriptionInEnglish=$inenglish[14];
                     }if ($i==8) {
                       $titleInAlias=$alias[15];
                       $titleInGerman=$ingerman[15];
                       $titleInEnglish=$inenglish[15];

                       $descriptionInAlias=$alias[16];
                       $descriptionInGerman=$ingerman[16];
                       $descriptionInEnglish=$inenglish[16];
                     }if ($i==9) {
                       $titleInAlias=$alias[17];
                       $titleInGerman=$ingerman[17];
                       $titleInEnglish=$inenglish[17];

                       $descriptionInAlias=$alias[18];
                       $descriptionInGerman=$ingerman[18];
                       $descriptionInEnglish=$inenglish[18];
                     }if ($i==10) {
                       $titleInAlias=$alias[19];
                       $titleInGerman=$ingerman[19];
                       $titleInEnglish=$inenglish[19];

                       $descriptionInAlias=$alias[20];
                       $descriptionInGerman=$ingerman[20];
                       $descriptionInEnglish=$inenglish[20];
                     }if ($i==11) {
                       $titleInAlias=$alias[21];
                       $titleInGerman=$ingerman[21];
                       $titleInEnglish=$inenglish[21];

                       $descriptionInAlias=$alias[22];
                       $descriptionInGerman=$ingerman[22];
                       $descriptionInEnglish=$inenglish[22];
                     }if ($i==12) {
                       $titleInAlias=$alias[23];
                       $titleInGerman=$ingerman[23];
                       $titleInEnglish=$inenglish[23];

                       $descriptionInAlias=$alias[24];
                       $descriptionInGerman=$ingerman[24];
                       $descriptionInEnglish=$inenglish[24];
                     }if ($i==13) {
                       $titleInAlias=$alias[25];
                       $titleInGerman=$ingerman[25];
                       $titleInEnglish=$inenglish[25];

                       $descriptionInAlias=$alias[26];
                       $descriptionInGerman=$ingerman[26];
                       $descriptionInEnglish=$inenglish[26];
                     }if ($i==14) {
                       $titleInAlias=$alias[27];
                       $titleInGerman=$ingerman[27];
                       $titleInEnglish=$inenglish[27];

                       $descriptionInAlias=$alias[28];
                       $descriptionInGerman=$ingerman[28];
                       $descriptionInEnglish=$inenglish[28];
                     }if ($i==15) {
                       $titleInAlias=$alias[29];
                       $titleInGerman=$ingerman[29];
                       $titleInEnglish=$inenglish[29];

                       $descriptionInAlias=$alias[30];
                       $descriptionInGerman=$ingerman[30];
                       $descriptionInEnglish=$inenglish[30];
                     }if ($i==16) {
                       $titleInAlias=$alias[31];
                       $titleInGerman=$ingerman[31];
                       $titleInEnglish=$inenglish[31];

                       $descriptionInAlias=$alias[32];
                       $descriptionInGerman=$ingerman[32];
                       $descriptionInEnglish=$inenglish[32];
                     }if ($i==17) {
                       $titleInAlias=$alias[33];
                       $titleInGerman=$ingerman[33];
                       $titleInEnglish=$inenglish[33];

                       $descriptionInAlias=$alias[34];
                       $descriptionInGerman=$ingerman[34];
                       $descriptionInEnglish=$inenglish[34];
                     }if ($i==18) {
                       $titleInAlias=$alias[35];
                       $titleInGerman=$ingerman[35];
                       $titleInEnglish=$inenglish[35];

                       $descriptionInAlias=$alias[36];
                       $descriptionInGerman=$ingerman[36];
                       $descriptionInEnglish=$inenglish[36];
                     }if ($i==19) {
                       $titleInAlias=$alias[37];
                       $titleInGerman=$ingerman[37];
                       $titleInEnglish=$inenglish[37];

                       $descriptionInAlias=$alias[38];
                       $descriptionInGerman=$ingerman[38];
                       $descriptionInEnglish=$inenglish[38];
                     }if ($i==20) {
                       $titleInAlias=$alias[39];
                       $titleInGerman=$ingerman[39];
                       $titleInEnglish=$inenglish[39];

                       $descriptionInAlias=$alias[40];
                       $descriptionInGerman=$ingerman[40];
                       $descriptionInEnglish=$inenglish[40];
                     }if ($i==21) {
                       $titleInAlias=$alias[41];
                       $titleInGerman=$ingerman[41];
                       $titleInEnglish=$inenglish[41];

                       $descriptionInAlias=$alias[42];
                       $descriptionInGerman=$ingerman[42];
                       $descriptionInEnglish=$inenglish[42];
                     }if ($i==22) {
                       $titleInAlias=$alias[43];
                       $titleInGerman=$ingerman[43];
                       $titleInEnglish=$inenglish[43];

                       $descriptionInAlias=$alias[44];
                       $descriptionInGerman=$ingerman[44];
                       $descriptionInEnglish=$inenglish[44];
                     }if ($i==23) {
                       $titleInAlias=$alias[45];
                       $titleInGerman=$ingerman[45];
                       $titleInEnglish=$inenglish[45];

                       $descriptionInAlias=$alias[46];
                       $descriptionInGerman=$ingerman[46];
                       $descriptionInEnglish=$inenglish[46];
                     }if ($i==24) {
                       $titleInAlias=$alias[47];
                       $titleInGerman=$ingerman[47];
                       $titleInEnglish=$inenglish[47];

                       $descriptionInAlias=$alias[48];
                       $descriptionInGerman=$ingerman[48];
                       $descriptionInEnglish=$inenglish[48];
                     }if ($i==25) {
                       $titleInAlias=$alias[49];
                       $titleInGerman=$ingerman[49];
                       $titleInEnglish=$inenglish[49];

                       $descriptionInAlias=$alias[50];
                       $descriptionInGerman=$ingerman[50];
                       $descriptionInEnglish=$inenglish[50];
                     }if ($i==26) {
                       $titleInAlias=$alias[51];
                       $titleInGerman=$ingerman[51];
                       $titleInEnglish=$inenglish[51];

                       $descriptionInAlias=$alias[52];
                       $descriptionInGerman=$ingerman[52];
                       $descriptionInEnglish=$inenglish[52];
                     }if ($i==27) {
                       $titleInAlias=$alias[53];
                       $titleInGerman=$ingerman[53];
                       $titleInEnglish=$inenglish[53];

                       $descriptionInAlias=$alias[54];
                       $descriptionInGerman=$ingerman[54];
                       $descriptionInEnglish=$inenglish[54];
                     }if ($i==28) {
                       $titleInAlias=$alias[55];
                       $titleInGerman=$ingerman[55];
                       $titleInEnglish=$inenglish[55];

                       $descriptionInAlias=$alias[56];
                       $descriptionInGerman=$ingerman[56];
                       $descriptionInEnglish=$inenglish[56];
                     }




                       ?>


                                                 <div class="form-row">
                                                        <div class="form-group mb-3">
                                                            <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                                           <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                               type="hidden" name="alias_name[]" value="term_and_condition_title_<?php echo $i; ?>">
                                                       </div>
                                                       
                                                       <div class="form-group col-6 mb-3">
                                                                    <label for="dob" class="col-form-label s-12">Option Title <?php echo $i; ?> In English</label>
                                                       <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                       type="text" name="inenglish[]" value="<?php  echo $titleInEnglish;?>">
                                                                </div>


                                                        <div class="form-group col-6 mb-3">
                                                           <label for="dob" class="col-form-label s-12">Option Title <?php echo $i; ?> In German</label>
                                                           <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                     type="text" name="ingerman[]" value="<?php  echo $titleInGerman;?>">
                                                       </div>
                                                       
                                                     
                                                     <!--    <div class="form-group col-2 mb-3" style="margin: auto;">
                                                           <button>Add More</button>
                                                       </div>  -->
                                                     </div>

                                           <div class="form-row">
                                                  <div class="form-group mb-3">
                                                      <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                                     <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                         type="hidden" name="alias_name[]" value="term_and_condition_description_<?php echo $i; ?>">
                                                 </div>
                                                 

                                                  <div class="form-group col-6 mb-3">
                                                     <label for="dob" class="col-form-label s-12">Option Description <?php echo $i; ?> In English</label>
                                                     <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                         type="text" name="inenglish[]" value=""><?php  echo $descriptionInEnglish;?></textarea>
                                                 </div>

                                                  <div class="form-group col-6 mb-3">
                                                     <label for="dob" class="col-form-label s-12">Option Description <?php echo $i; ?> In German</label>
                                                      <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                         type="text" name="ingerman[]" value=""><?php  echo $descriptionInGerman;?></textarea>
                                                 </div>
                                                 
                                                  
                                               </div> 
                                               <?php } ?>           
                                                             
                                   
                                   <div class="card-body">
                                           <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                                       </div>
                                    </div>    
                               </form>
                     </div>
                   
                     <!-- term and condtion end -->
          
          <!-- Privacy page   -->

                          <div class="showHideForm" id="showHide-20">
                                         <form id="Privacy_form" action="" method="POST" enctype="multipart/form-data">
                                             <div class="form-row">
                                            <div class="form-group mb-3">
                                        <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                           <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                               type="hidden" name="alias_name[]" value="<?php  echo $privacy_title;?>">
                                       </div>
                                       
                                        <div class="form-group col-6 mb-3">
                                          <label for="dob" class="col-form-label s-12"> Title In English</label>
                                           <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                               type="text" name="inenglish[]" value="<?php  echo $privacy_title_inenglish;?>">
                                       </div>
                                       
                                        <div class="form-group col-6 mb-3">
                                           <label for="dob" class="col-form-label s-12"> Title In German</label>
                                           <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                               type="text" name="ingerman[]" value="<?php  echo $privacy_title_ingerman;?>">
                                       </div>
                                               
                                       </div>
                                       <div class="form-row">
                                            <div class="form-group mb-3">
                                        <!--    <label for="dob" class="col-form-label s-12">Title Alias Name</label>  -->
                                           <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                               type="hidden" name="alias_name[]" value="<?php  echo $desc_title;?>">
                                       </div>
                                       
                                        <div class="form-group col-6 mb-3">
                                          <label for="dob" class="col-form-label s-12">Privacy Descprition Title In English</label>
                                           <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                               type="text" name="inenglish[]" value="<?php  echo $desc_title_inenglish;?>">
                                       </div>
                                       
                                        <div class="form-group col-6 mb-3">
                                           <label for="dob" class="col-form-label s-12">Privacy Descprition Title In German</label>
                                           <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                               type="text" name="ingerman[]" value="<?php  echo $desc_title_ingerman;?>">
                                       </div>
                                               
                                       </div>

                                    <div class="form-row">   
                                  <div class="form-group mb-3">
                                       <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                           type="hidden" name="alias_name[]" value="<?php  echo $Privacy_Description;?>">
                                   </div>
                                   
                                    <div class="form-group col-6 mb-3">
                                       <label for="dob" class="col-form-label s-12">Privacy Description  In English</label>
                                        <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                           type="text" name="inenglish[]" value=""><?php  echo $Privacy_Description_inenglish;?></textarea>
                                   </div>
                                   
                                    <div class="form-group col-6 mb-3">
                                       <label for="dob" class="col-form-label s-12">Privacy Description In   German</label>
                                       <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                           type="text" name="ingerman[]" value=""><?php  echo $Privacy_Description_ingerman;?></textarea>
                                     </div>  
                                   </div>
                                 
          <div class="card-body">
                               <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                             </div>
                             </form>
                             </div> 
                            
                   </div>
                   </div>
                   <!-- end -->

                        <!-- Legal-->
                         <div class="showHideForm" id="showHide-21">
                                                <form id="Footer_form" action="" method="POST" enctype="multipart/form-data">
                                                  <div class="card-body">
                                                    <div class="form-row">
                                                           <div class="form-group mb-3">
                                                               <!--    <label for="dob" class="col-form-label s-12">Image Alias Name</label>  -->
                                    <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false" type="hidden" name="alias_name[]" value="<?php  echo $legal_page_title;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12">Title In English </label>
                                                               <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="inenglish[]" value="<?php  echo $legal_page_title_inenglish;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12">Title In German </label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="ingerman[]" value="<?php  echo $legal_page_title_ingerman;?>">
                                                          </div>  
                                                        </div>
                                                         <div class="form-row">
                                                               <div class="form-group mb-3">
                                                               <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="hidden" name="alias_name[]" value="<?php  echo $legal_page_title_label;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Title (label 1) In English</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="inenglish[]" value="<?php  echo $legal_page_title_label_inenglish;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Title (label 2) In German</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="ingerman[]" value="<?php  echo $legal_page_title_label_ingerman;?>">
                                                          </div>
                                                                  
                                                          </div>
                                                            <div class="form-row">
                                                               <div class="form-group mb-3">
                                                               <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="hidden" name="alias_name[]" value="<?php  echo $legal_page_address_label;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Address  In English</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="inenglish[]" value="<?php  echo $legal_page_address_label_inenglish;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Address  In German</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="ingerman[]" value="<?php  echo $legal_page_address_label_ingerman;?>">
                                                          </div>
                                                                  
                                                          </div>
                                                           <div class="form-row">
                                                               <div class="form-group mb-3">
                                                               <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="hidden" name="alias_name[]" value="<?php  echo $legal_page_phone;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Number  In English</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="inenglish[]" value="<?php  echo $legal_page_phone_inenglish;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Number  In German</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="ingerman[]" value="<?php  echo $legal_page_phone_ingerman;?>">
                                                          </div>
                                                                  
                                                          </div>
                                                             <div class="form-row">
                                                               <div class="form-group mb-3">
                                                               <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="hidden" name="alias_name[]" value="<?php  echo $legal_page_email;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Email  In English</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="inenglish[]" value="<?php  echo $legal_page_email_inenglish;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Email  In German</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="ingerman[]" value="<?php  echo $legal_page_email_ingerman;?>">
                                                          </div>
                                                                  
                                                          </div>
                                                           <div class="form-row">
                                                               <div class="form-group mb-3">
                                                               <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="hidden" name="alias_name[]" value="<?php  echo $legal_page_texts;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Title (text) In English</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="inenglish[]" value="<?php  echo $legal_page_texts_inenglish;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Title (text) In German</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="ingerman[]" value="<?php  echo $legal_page_texts_ingerman;?>">
                                                          </div>
                                                                  
                                                          </div>
                                                           <div class="form-row">
                                                               <div class="form-group mb-3">
                                                               <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="hidden" name="alias_name[]" value="<?php  echo $legal_page_title2;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Title (label 1) In English</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="inenglish[]" value="<?php  echo $legal_page_title2_inenglish;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Title (label 1) In German</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="ingerman[]" value="<?php  echo $legal_page_title2_ingerman;?>">
                                                          </div>
                                                                  
                                                          </div>
                                                            <div class="form-row">
                                                               <div class="form-group mb-3">
                                                               <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="hidden" name="alias_name[]" value="<?php  echo $legal_page_title5;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Address (label 2) In English</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="inenglish[]" value="<?php  echo $legal_page_title5_inenglish;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Address (label 2) In German</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="ingerman[]" value="<?php  echo $legal_page_title5_ingerman;?>">
                                                          </div>
                                                                  
                                                          </div>
                                                          <div class="form-row">
                                                               <div class="form-group mb-3">
                                                               <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="hidden" name="alias_name[]" value="<?php  echo $legal_page_address2;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Text (label 2) In English</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="inenglish[]" value="<?php  echo $legal_page_address2_inenglish;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Text (label 2) In German</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="ingerman[]" value="<?php  echo $legal_page_address2_ingerman;?>">
                                                          </div>
                                                                  
                                                          </div>
                                                          
                                                           <div class="form-row">
                                                               <div class="form-group mb-3">
                                                               <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="hidden" name="alias_name[]" value="<?php  echo $legal_page_title3;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Title (label 3) In English</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="inenglish[]" value="<?php  echo $legal_page_title3_inenglish;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Title (label 3) In German</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="ingerman[]" value="<?php  echo $legal_page_title3_ingerman;?>">
                                                          </div>
                                                                  
                                                          </div>


                                                            <div class="form-row">
                                                               <div class="form-group mb-3">
                                                               <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="hidden" name="alias_name[]" value="<?php  echo $legal_page_description3;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12">legal Description In English</label>
                                                               <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="inenglish[]" value=""><?php  echo $legal_page_description3_inenglish;?></textarea>
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12">legal Description In German</label>
                                                               <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="ingerman[]" value=""><?php  echo $legal_page_description3_ingerman;?></textarea>
                                                          </div>
                                                                  
                                                          </div>
                                                           <div class="form-row">
                                                               <div class="form-group mb-3">
                                                               <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="hidden" name="alias_name[]" value="<?php  echo $legal_page_title4;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12">Title (label 4) In English</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="inenglish[]" value="<?php  echo $legal_page_title4_inenglish;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12"> Title (label 4) In German</label>
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="ingerman[]" value="<?php  echo $legal_page_title4_ingerman;?>">
                                                          </div>
                                                                  
                                                          </div>
                                                           <div class="form-row">
                                                               <div class="form-group mb-3">
                                                               <!--    <label for="dob" class="col-form-label s-12">Button1 Alias Name</label>  -->
                                                              <input class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="hidden" name="alias_name[]" value="<?php  echo $legal_page_description4;?>">
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12">legal Description (label 2) In English</label>
                                                               <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="inenglish[]" value=""><?php  echo $legal_page_description4_inenglish;?></textarea>
                                                          </div>
                                                          
                                                           <div class="form-group col-6 mb-3">
                                                              <label for="dob" class="col-form-label s-12">legal Description Description (label 2) In German</label>
                                                               <textarea rows="10" cols="90" class="form-control r-0 light s-12 datePicker" placeholder="" data-time-picker="false"
                                                                  type="text" name="ingerman[]" value=""><?php  echo $legal_page_description4_ingerman;?></textarea>
                                                          </div>
                                                                  
                                                          </div>
                                                  
                                                      
                                                                
                                      </div> 
                                      <div class="card-body">
                                              <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                                          </div>
                                           </div>
                                  </form>
                        </div>
                   </div>
            <!-- end -->
            </div>
           
           
           
           
           </div>
          
          
          
          
                                    </div>
                                </div>





                    
                                            </div>
                                           <!-- class="fa-select"  -->
                                           <!--  <input name="class_icon" placeholder="Enter icon class" class="form-control r-0 light s-12 " type="text" required=""> -->
                                      
                                  
                            
                                 <!-- <div class="form-row"> -->
                                  <!-- <div class="col-md-3 offset-md-1">
                                        <input hidden id="file" name="class_icon"/>
                                        <div class="dropzone dropzone-file-area pt-4 pb-4" id="fileUpload" style="margin-top: -76px;padding:0px;">
                                            <div class="dz-default dz-message">
                                                <span>Drop A passport size icon of category</span>
                                                 <div>You can click to open file browser</div> -->
                                            <!-- </div>
                                        </div>
                                    </div> -- -->
                                     <!-- </div> -->

                            </div>
                            <hr>
                            <span style="color: red;" id="error"><?php if(isset($error)) { echo $error;}?></span>
                         
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../includes/footer.php';
?>


<!-- <script>

// $("#section_select").show(); 
              
              
        $('#select_page').on('change', function () {  
        alert('hello');
         var url_page = $(this).val(); 
       alert(url_page);
      if(url_page=='home_page'){ 
      
      $("#section_select").show();
      // bind change event to select
      $('#select').on('change', function () {
              
    
          
          var url = $(this).val(); 
      console.log(url);

          
       //   var newurl ='".$config['base_url']."/admin/addtranslation/index.php?url='+url;
      var newurl ='".$config['base_url']."/admin/addtranslation/index.php?url_page=home_page&url='+url;

      window.history.pushState({ path: newurl }, '', newurl);


        //   window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url='+url;

      
      
    
          
    });
      }
      else if(url_page=='first_aid_page'){ 
      
      $("#section_select").hide();
      
      
      // bind change event to select
    
              
    
          
          var url = $(this).val(); 
      console.log(url);

          
       //   var newurl ='".$config['base_url']."/admin/addtranslation/index.php?url='+url;
      var newurl ='".$config['base_url']."/admin/addtranslation/index.php?url_page=first_aid_page;

      window.history.pushState({ path: newurl }, '', newurl);


        //   window.location.href='".$config['base_url']."/admin/addtranslation/index.php?url='+url;

      
      
    
          
    
      }
      
      });

  $('.showHideForm').hide();
</script> -->

<script>

  $("#section_select").hide();
  
$("#select_page").change(function() {
  
  
  
    //get the selected value
    var selectedValue = this.value;
//alert(selectedValue);
   
  
  if(selectedValue=='home_page'){
    
    
    $("#section_select").show();  
  }
  else{
    
  $("#section_select").hide();
  
  if(selectedValue=='first_aid_page') {
    
    window.location.href='<?=$config['base_url']?>/admin/addtranslation/index.php?url_page='+selectedValue;
  }
  else if(selectedValue=='Vku_page'){
    
      window.location.href='<?=$config['base_url']?>/admin/addtranslation/index.php?url_page='+selectedValue;
      
  }
  else if(selectedValue=='moto'){
    
    window.location.href='<?=$config['base_url']?>/admin/addtranslation/index.php?url_page='+selectedValue;
      
  }
  else if(selectedValue=='price'){
    
    window.location.href='<?=$config['base_url']?>/admin/addtranslation/index.php?url_page='+selectedValue;
      
  }
  else if(selectedValue=='about_us_page'){
    
    window.location.href='<?=$config['base_url']?>/admin/addtranslation/index.php?url_page='+selectedValue;
      
  }
  else if(selectedValue=='process'){
    
    window.location.href='<?=$config['base_url']?>/admin/addtranslation/index.php?url_page='+selectedValue;
      
  }
  else if(selectedValue=='contact'){
    
    window.location.href='<?=$config['base_url']?>/admin/addtranslation/index.php?url_page='+selectedValue;
      
  }
  else if(selectedValue=='Login'){
    
    window.location.href='<?=$config['base_url']?>/admin/addtranslation/index.php?url_page='+selectedValue;
      
  }
  else if(selectedValue=='menu_option'){
    
    window.location.href='<?=$config['base_url']?>/admin/addtranslation/index.php?url_page='+selectedValue;
      
  }
else if(selectedValue=='Trial'){
    
    window.location.href='?url_page='+selectedValue;
      
  } 
  else if(selectedValue=='Footer_page_all'){
    
    window.location.href='<?=$config['base_url']?>/admin/addtranslation/index.php?url_page='+selectedValue;
      
  } 
  else if(selectedValue=='term_and_condition'){
    
    window.location.href='<?=$config['base_url']?>/admin/addtranslation/index.php?url_page='+selectedValue;
      
  }
   else if(selectedValue=='Privacy_page'){
    
      window.location.href='<?=$config['base_url']?>/admin/addtranslation/index.php?url_page='+selectedValue;
      
  }
    else if(selectedValue=='legal_page'){
    
      window.location.href='<?=$config['base_url']?>/admin/addtranslation/index.php?url_page='+selectedValue;
      
  } 
  } // --- Else end ----

  
    
});

</script>

<?php if($_GET['url_page']=='' && $_GET['url']==''){ ?>
<script>
$('#select_section').hide();
 $('#showHide-17').hide();
  $('#showHide-1').hide(); $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();
  $('#showHide-7').hide();$('#showHide-16').hide();
  $('#showHide-8').hide(); $('#showHide-9').hide(); $('#showHide-10').hide(); $('#showHide-11').hide(); $('#showHide-12').hide(); $('#showHide-13').hide();
  $('#showHide-14').hide(); $('#showHide-15').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>

<?php if($_GET['url_page']=='home_page' && $_GET['url']=='home'){ ?>
<script>
$('#section_select').show(); $("#login_card").hide();
 $('#showHide-17').hide();
  $('#showHide-1').show(); $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();
  $('#showHide-7').hide();$('#showHide-14').hide();$('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-8').hide(); $('#showHide-9').hide(); $('#showHide-10').hide(); $('#showHide-11').hide();$('#showHide-12').hide(); $('#showHide-13').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>


<?php if($_GET['url_page']=='home_page' && $_GET['url']=='drive'){ ?>
<script>
$('#section_select').show(); $("#login_card").hide();
  $('#showHide-2').show();
   $('#showHide-17').hide();
  $('#showHide-1').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();
  $('#showHide-7').hide();$('#showHide-14').hide();$('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-8').hide(); $('#showHide-9').hide(); $('#showHide-10').hide(); $('#showHide-11').hide();$('#showHide-12').hide(); $('#showHide-13').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>


<?php if($_GET['url_page']=='home_page' && $_GET['url']=='firstaid'){ ?>
<script>
$('#section_select').show(); $("#login_card").hide();
  $('#showHide-3').show();
  $('#showHide-2').hide(); $('#showHide-1').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();
  $('#showHide-7').hide();$('#showHide-14').hide();$('#showHide-15').hide();
  $('#showHide-8').hide(); $('#showHide-9').hide();  $('#showHide-10').hide(); $('#showHide-11').hide();$('#showHide-12').hide(); $('#showHide-13').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>


<?php if($_GET['url_page']=='home_page' && $_GET['url']=='vku'){ ?>
<script>
$('#section_select').show(); $("#login_card").hide();
  $('#showHide-4').show();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-1').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();
  $('#showHide-7').hide();$('#showHide-14').hide();$('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-8').hide(); $('#showHide-9').hide();  $('#showHide-10').hide();  $('#showHide-11').hide();$('#showHide-12').hide(); $('#showHide-13').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>


<?php if($_GET['url_page']=='home_page' && $_GET['url']=='moto'){ ?>
<script>
$('#section_select').show(); $("#login_card").hide();
  $('#showHide-5').show();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-1').hide(); $('#showHide-6').hide();
  $('#showHide-7').hide();$('#showHide-14').hide(); $('#showHide-12').hide();$('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-8').hide(); $('#showHide-9').hide();  $('#showHide-10').hide(); $('#showHide-11').hide(); $('#showHide-13').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>


<?php if($_GET['url_page']=='home_page' && $_GET['url']=='home_price'){ ?>
<script>
$('#section_select').show(); $("#login_card").hide();
  $('#showHide-6').show();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-1').hide();
  $('#showHide-7').hide();$('#showHide-14').hide();$('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-8').hide(); $('#showHide-9').hide();  $('#showHide-10').hide(); $('#showHide-11').hide();$('#showHide-12').hide(); $('#showHide-13').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>


<?php if($_GET['url_page']=='Login' ){ ?>
<script>
  $('#showHide-7').show();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();
  $('#showHide-1').hide(); $('#showHide-14').hide();$('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-8').hide(); $('#showHide-9').hide(); $('#showHide-10').hide(); $('#showHide-11').hide();$('#showHide-12').hide(); $('#showHide-13').hide();
  $('#showHide-18').hide();
  $('#showHide-14').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>



<?php if($_GET['url_page']=='Vku_page' ){ ?>
<script>
  $('#showHide-8').show();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();$('#showHide-14').hide();
  $('#showHide-7').hide(); $('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-1').hide(); $('#showHide-9').hide();  $('#showHide-10').hide(); $('#showHide-11').hide();$('#showHide-12').hide(); $('#showHide-13').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>


<?php if($_GET['url_page']=='first_aid_page' ){ ?>
<script>
  $('#showHide-9').show();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();$('#showHide-14').hide();
  $('#showHide-7').hide();$('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-1').hide(); $('#showHide-8').hide(); $('#showHide-10').hide(); $('#showHide-11').hide();$('#showHide-12').hide(); $('#showHide-13').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>
<?php if($_GET['url_page']=='process' ){ ?>
<script>
  $('#showHide-10').show();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();$('#showHide-14').hide();
  $('#showHide-7').hide();$('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-1').hide(); $('#showHide-8').hide(); $('#showHide-9').hide();  $('#showHide-11').hide();$('#showHide-12').hide(); $('#showHide-13').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>

<?php if($_GET['url_page']=='price' ){ ?>
<script>
  $('#showHide-11').show();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();$('#showHide-14').hide();
  $('#showHide-7').hide();$('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-1').hide(); $('#showHide-8').hide(); $('#showHide-9').hide();$('#showHide-10').hide(); $('#showHide-12').hide(); $('#showHide-13').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>


<?php if($_GET['url_page']=='about_us_page' ){ ?>
<script>
  $('#showHide-12').show();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();$('#showHide-14').hide();
  $('#showHide-7').hide();$('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-1').hide(); $('#showHide-8').hide(); $('#showHide-9').hide();$('#showHide-10').hide(); $('#showHide-11').hide(); $('#showHide-13').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>


<?php if($_GET['url_page']=='contact' ){ ?>
<script>
  $('#showHide-13').show();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();$('#showHide-14').hide();
  $('#showHide-7').hide();$('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-1').hide(); $('#showHide-8').hide(); $('#showHide-9').hide();$('#showHide-10').hide(); $('#showHide-11').hide(); $('#showHide-12').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>

<?php if($_GET['url_page']=='moto' ){ ?>
<script>
  $('#showHide-14').show();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();$('#showHide-13').hide();
  $('#showHide-7').hide();$('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-1').hide(); $('#showHide-8').hide(); $('#showHide-9').hide();$('#showHide-10').hide(); $('#showHide-11').hide(); $('#showHide-12').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>

<?php if($_GET['url_page']=='menu_option' ){ ?>
<script>
  $('#showHide-15').show();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();$('#showHide-13').hide();
  $('#showHide-7').hide();$('#showHide-14').hide();$('#showHide-16').hide();
  $('#showHide-1').hide(); $('#showHide-8').hide(); $('#showHide-9').hide();$('#showHide-10').hide(); $('#showHide-11').hide(); $('#showHide-12').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>


<?php if($_GET['url_page']=='Trial' ){ ?>
<script>
  $('#showHide-16').show();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();$('#showHide-13').hide();
  $('#showHide-7').hide();$('#showHide-14').hide();$('#showHide-15').hide();
  $('#showHide-1').hide(); $('#showHide-8').hide(); $('#showHide-9').hide();$('#showHide-10').hide(); $('#showHide-11').hide(); $('#showHide-12').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>

<!--footer add-->
<?php if($_GET['url_page']=='Footer_page_all'){ ?>
<script>
  $('#showHide-17').show();
   $('#showHide-7').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();
  $('#showHide-1').hide(); $('#showHide-14').hide();$('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-8').hide(); $('#showHide-9').hide(); $('#showHide-10').hide(); $('#showHide-11').hide();$('#showHide-12').hide(); $('#showHide-13').hide();
  $('#showHide-14').hide();
  $('#showHide-18').hide();
  $('#showHide-20').hide();
  $('#showHide-21').hide();
</script>
<?php } ?>

<?php if($_GET['url_page']=='term_and_condition' ){ ?>
<script>
  $('#showHide-18').show();
   $('#showHide-16').hide();
   $('#showHide-20').hide();
   $('#showHide-21').hide();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();$('#showHide-13').hide();
  $('#showHide-7').hide();$('#showHide-14').hide();$('#showHide-15').hide();
  $('#showHide-1').hide(); $('#showHide-8').hide(); $('#showHide-9').hide();$('#showHide-10').hide(); $('#showHide-11').hide(); $('#showHide-12').hide();
</script>
<?php } ?>

<?php if($_GET['url_page']=='Privacy_page' ){ ?>
<script>
  $('#showHide-20').show();
    $('#showHide-21').hide();
  $('#showHide-8').hide();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();$('#showHide-14').hide();
  $('#showHide-7').hide(); $('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-1').hide(); $('#showHide-9').hide();  $('#showHide-10').hide(); $('#showHide-11').hide();$('#showHide-12').hide(); $('#showHide-13').hide();$('#showHide-18').hide();
</script>
<?php } ?>

<?php if($_GET['url_page']=='legal_page' ){ ?>
<script>
 
  $('#showHide-8').hide();
    $('#showHide-20').hide();
   $('#showHide-17').hide();
  $('#showHide-2').hide(); $('#showHide-3').hide(); $('#showHide-4').hide(); $('#showHide-5').hide(); $('#showHide-6').hide();$('#showHide-14').hide();
  $('#showHide-7').hide(); $('#showHide-15').hide();$('#showHide-16').hide();
  $('#showHide-1').hide(); $('#showHide-9').hide();  $('#showHide-10').hide(); $('#showHide-11').hide();$('#showHide-12').hide(); $('#showHide-13').hide();$('#showHide-18').hide(); $('#showHide-21').show();
</script>
<?php } ?>