<?php
include '../includes/header.php';
$get_all_categories = get_all_categories();
$get_location_list = get_location_list();
$get_all_insructors = get_all_insructors();
$course_id=$_REQUEST['id'];
$get_course_detail=get_course_detail_by_couse_id($course_id);
// var_dump($get_course_detail);
$date_course=date('Y-m-d',$get_course_detail[0]['course_date']);
$start_course=date('H:i ',$get_course_detail[0]['course_time']);
$end_course=date('H:i ',$get_course_detail[0]['course_end_time']);
// var_dump($start_course);
if(isset($_POST['submit']))
{
    $category_id = $_POST['category_id'];
    $sub_category_id = $_POST['sub_category_id'];
    $location_id = $_POST['location_id'];
    $instructor_id = $_POST['instructor_id'];
    $course_time = strtotime($_POST['course_time']);
    $course_end_time = strtotime($_POST['course_end_time']);
    $price = $_POST['price'];
    $part = $_POST['part'];
     $sub_part_no = $_POST['sub_part_no'];
    $daytime = $_POST['daytime'];
    $creation_time = time();
    $course_date = $_POST['course_date'];
    $slots = $_POST['slots'];
   
    $weekly_day=$_POST['weekly_day'];
    $flexible_payment=$_POST['flexible_payment'];
    $course_title_ger=$_POST['course_title_ger'];
    $course_title_eng=$_POST['course_title_eng'];
    if($sub_part_no){
       $part = "";  
    }
    else{
         $part =  $_POST['part'];  
    }
// var_dump($_POST['course_time']);
    if(!preg_match('/^[0-9]*$/', $slots))
    {
    $slot_error='Please enter valid numeric value.';
    }
    else{
      $day=  date('l', strtotime($course_date));
      
   if($get_course_detail[0]['course_date']==strval(strtotime($course_date)) && strval($course_time)== $get_course_detail[0]['course_time'] && strval($course_end_time)== $get_course_detail[0]['course_end_time'])
   {
   
     $query="UPDATE tbl_course set category_id='$category_id',sub_category_id='$sub_category_id',location_id='$location_id',course_date='".strtotime($course_date)."',course_time='$course_time',price='$price',part='$part',daytime='$daytime',instructor_id='$instructor_id',slots='$slots',course_end_time='$course_end_time',weekly_day='$weekly_day',course_room='$course_room',flexible_payment='$flexible_payment',sub_part_no='$sub_part_no',course_title_eng='$course_title_eng',course_title_ger='$course_title_ger' WHERE course_id='$course_id'";
    $q['run'] = $conn->query($query);
    if($q['run'] ){
    echo "<script type='text/javascript'>
window.location.href='index.php?course_type=3';</script>";
exit();
}
   }
   else{

 $query="UPDATE tbl_course set category_id='$category_id',sub_category_id='$sub_category_id',location_id='$location_id',course_date='".strtotime($course_date)."',course_time='$course_time',price='$price',part='$part',daytime='$daytime',instructor_id='$instructor_id',slots='$slots',course_end_time='$course_end_time',weekly_day='$day',course_room='$course_room',refund='1',refund_time='".time()."',flexible_payment='$flexible_payment',sub_part_no='$sub_part_no',course_title_eng='$course_title_eng',course_title_ger='$course_title_ger' WHERE course_id='$course_id'";
    $q['run'] = $conn->query($query);
    if($q['run'] ){
     /*    $booked_course_detail=get_booked_course_detail_by_course_id($course_id);
        
        foreach ($booked_course_detail as $key => $value) {
            $user_id=$value['user_id'];
            $user_detail=get_user_detail_by_id($user_id);
            // var_dump($user_detail);
            $email=$user_detail[0]['email'];
            // var_dump($email);
             $email_message = "your course has been deleted.";

            $to = $email;
           
            $subject = "Course deleted";
            
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            $headers .= "From: support@dharmani.com";

            $success = mail($to,$subject,$email_message,$headers);
    }*/
     echo "<script type='text/javascript'>
             window.location.href='index.php?course_type=3';</script>";
            exit();
}
   }
    
//    function displayDates($date1, $date2, $format = 'Y-m-d' ) {
//       $dates = array();
//       $current = strtotime($date1);
//       $date2 = strtotime($date2);
//       $stepVal = '+1 day';
//       while( $current <= $date2 ) {
//          $dates[] = date($format, $current);
//          $current = strtotime($stepVal, $current);
//       }
//       return $dates;
//    }
//    // yyyy-mm-dd
//    $dateFrom=date('Y-m-d');
//    // var_dump($dateFrom);
//    // var_dump($course_date);
//    $date = displayDates($dateFrom, $course_date);
//    // var_dump($date);
//    $a=array();
//    foreach ($date as $key => $value) {
//  $day=strtotime($value);
//  $date = date('l', $day);
//  // var_dump($date);
//  if($date==$weekly_day){
//     $a[]=$value;
// // array_push($a, $value);
//  }
//    }
//    $course_room=uniqid();
//    if($date_course==$course_date){
//     // echo"11";
//      $add_course = add_course($category_id,$sub_category_id,$location_id,$course_date,$course_time,$course_end_time,$price,$part,$daytime,$creation_time,$instructor_id,$slots,$weekly_day,$course_id,$course_room);
    
//    }
//    elseif($date_course<$course_date){
//     // echo"22";
//     $ids="";
//     // delete_course_id($course_id);
//      foreach ($a as $key => $value) {
   
//     $add_course = add_course($category_id,$sub_category_id,$location_id,$value,$course_time,$course_end_time,$price,$part,$daytime,$creation_time,$instructor_id,$slots,$weekly_day,$ids,$course_room);
//     // var_dump($add_course);
//        }
//   }
//   elseif($date_course>$course_date){
//     // echo"33";
//      $ids="";
//     $course_to=$get_course_detail[0]['course_date'];
//     $course_from=strtotime($course_date);
//     $course_rooms=$get_course_detail[0]['course_room'];
// $delete_course=delete_course_detail_by_room_id($course_from,$course_to,$course_rooms);

//  foreach ($a as $key => $value) {
   
//     $add_course = add_course($category_id,$sub_category_id,$location_id,$value,$course_time,$course_end_time,$price,$part,$daytime,$creation_time,$instructor_id,$slots,$weekly_day,$ids,$course_room);
//     // var_dump($add_course);
//        }
//   }
//     if($add_course || $delete_course)
//     {
    //      $booked_course_detail=get_booked_course_detail_by_course_id($course_id);
        // var_dump($booked_course_detail);
        // foreach ($booked_course_detail as $key => $value) {
        //     // var_dump($value);
        //     $user_id=$value['user_id'];
        //     $user_detail=get_user_detail_by_id($user_id);
        //     // var_dump($user_detail);
        //     $email=$user_detail[0]['email'];
        //     // var_dump($email);
        //      $email_message = "your course has been deleted.";

        // $to = $email;
       
        // $subject = "Course deleted";
        
        // $headers  = 'MIME-Version: 1.0' . "\r\n";
        
        // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        // $headers .= "From: support@dharmani.com";

        // $success = mail($to,$subject,$email_message,$headers);
        // //     # code...
        // }
       
        // echo "<script type='text/javascript'>
        // window.location.href='index.php';</script>";
        // exit();
    // }
    // else
    // {
    //     $error = 'There is someting wrong while editing course';
    // }
}
}
?>
<style type="text/css">
    .act{
            /*border: 0;*/
    /*background: 0 0;*/
    border-bottom: 3px solid #da3732 !important ;
    }
</style>
<link rel="stylesheet" href="../assets/css/datepickernew.css"> 
<div class="page has-sidebar-left  height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-th-list"></i>
                        Courses
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link"  href="index.php?course_type=3"><i class="icon icon-home2"></i>All Courses</a>
                    </li>
                    <li>
                        <a class="nav-link act"  href="AddCourse.php" ><i class="icon icon-plus-circle"></i>Add New Course</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-10  offset-md-1">
                    <form  method="POST">
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group m-0">
                                            <label for="category_id" class="col-form-label s-12">Course Category Name</label>
                                            <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="category_id" onchange="get_subcategory_list(this.value)" required>
                                                <option value="">Choose...</option>
                                                <?php foreach ($get_all_categories as $key) 
                                                {
                                                    ?>
                                                    <option  value="<?php echo $key['category_id'];?>" <?php if($key['category_id']==$get_course_detail[0]['category_id']){echo  "selected";}?>><?php echo $key['name'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                     
                                        <div class="form-group m-0" id="sub_category_div">
                                            <label for="category_id" class="col-form-label s-12">Course Sub Category Name</label>
                                            <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="sub_category_id" id='sub_category_id' onchange="show_parts(this.value)">
                                            </select>
                                        </div>

                                        <div class="form-group m-0" id="location_div">
                                            <label for="category_id" class="col-form-label s-12">Location</label>
                                            <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="location_id" id="location_id" required>
                                                <option value="" >Choose Location</option>
                                                <?php foreach ($get_location_list as $key) 
                                                {
                                                    ?>
                                                    <option value="<?php echo $key['id'];?>"  <?php if($key['id']==$get_course_detail[0]['location_id']){echo  "selected";}?>><?php echo $key['location_name'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                    <label for="category_id" class="col-form-label s-12">Instructor</label>
                                                    <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="instructor_id" id="instructor_id" >
                                                        <option value="" >Select Instructor</option>
                                                        <?php foreach ($get_all_insructors as $key) 
                                                        {
                                                            ?>
                                                            <option value="<?php echo $key['instructor_id'];?>"  <?php if($key['instructor_id']==$get_course_detail[0]['instructor_id']){echo  "selected";}?>><?php echo $key['username'];?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                    <label for="Flexible_payment" class="col-form-label s-12">Flexible Payment</label>
                                                    <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="flexible_payment"  required>
                                                        <option value="">Select flexible payment</option>
                                                        <option value="0" <?php if($get_course_detail[0]['flexible_payment']=='0'){echo  "selected";}?> >One-to-one</option>
                                                        <option  value="1" <?php if($get_course_detail[0]['flexible_payment']=='1'){echo  "selected";}?> >Together</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-row">
                                            <div class="col-md-6">
                                              <div class="form-group m-0">
                                                     <label for="course_date" class="col-form-label s-12">Course Date</label>
                                                     <input name="course_date" placeholder="Enter Course Date" class="form-control r-0 light s-12 date" type="text" id="datepicker" autocomplete="off" value="<?php echo date('d-m-Y',$get_course_detail[0]['course_date']);?>"required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                 <div class="form-group m-0">
                                                    <label for="category_id" class="col-form-label s-12">Weekly Day</label>
                                                    <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="weekly_day"  required>
                                                       <option value="">Choose weekly day.</option>
                                                     
                                                       <option  value="Monday" <?php if($get_course_detail[0]['weekly_day']=='Monday'){echo"selected";}?> >Monday</option>
                                                       <option  value="Tuesday" <?php if($get_course_detail[0]['weekly_day']=='Tuesday'){echo"selected";}?> >Tuesday</option>
                                                       <option  value="Wednesday" <?php if($get_course_detail[0]['weekly_day']=='Wednesday'){echo"selected";}?> >Wednesday</option>
                                                       <option  value="Thrusday" <?php if($get_course_detail[0]['weekly_day']=='Thrusday'){echo"selected";} elseif($get_course_detail[0]['weekly_day']=='Thursday'){echo"selected";}?> >Thrusday</option>
                                                       <option  value="Friday" <?php if($get_course_detail[0]['weekly_day']=='Friday'){echo"selected";}?> >Friday</option>
                                                       <option  value="Saturday" <?php if($get_course_detail[0]['weekly_day']=='Saturday'){echo"selected";}?> >Saturday</option> 
                                                       <option  value="Sunday" <?php if($get_course_detail[0]['weekly_day']=='Sunday'){echo"selected";}?> >Sunday</option>
                                                    </select>
                                                </div>
                                              </div>
                                            </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                    <label for="course_time" class="col-form-label s-12">Course Start Time</label>
                                                    <input name="course_time" placeholder="Enter Course Time" class="form-control r-0 light s-12 " type="time" required autocomplete="off" value="<?php echo date('H:i',$get_course_detail[0]['course_time']);?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                    <label for="course_end_time" class="col-form-label s-12">Course End Time</label>
                                                    <input name="course_end_time" placeholder="Enter Course End Time" class="form-control r-0 light s-12 " type="time" required autocomplete="off" value="<?php echo date('H:i',$get_course_detail[0]['course_end_time']);?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                             <div class="col-md-6">
                                                <div class="form-group m-0">
                                                   <label for="course_title_eng" class="col-form-label s-12">Course Title(In English)</label>
                                                   <input name="course_title_eng" placeholder="Course Title(In English)" class="form-control r-0 light s-12" type="text" id="course_title_eng" value="<?=$get_course_detail[0]['course_title_eng']?$get_course_detail[0]['course_title_eng']:''?>" autocomplete="off" required>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group m-0">
                                                   <label for="course_title_ger" class="col-form-label s-12">Course Title(In German)</label>
                                                   <input name="course_title_ger" placeholder="Course Title(In German)" class="form-control r-0 light s-12" type="text" id="course_title_ger" value="<?=$get_course_detail[0]['course_title_ger']?$get_course_detail[0]['course_title_ger']:''?>" autocomplete="off" required>
                                                </div>
                                            </div>
                                         </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                    <label for="price" class="col-form-label s-12">Price</label>
                                                    <input name="price" placeholder="Enter Price Here" class="form-control r-0 light s-12 " type="text" required autocomplete="off" value="<?php echo $get_course_detail[0]['price']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                    <label for="slots" class="col-form-label s-12">Slots</label>
                                                    <input name="slots" placeholder="Enter Slots Here" class="form-control r-0 light s-12 " type="text" required value="<?php echo $get_course_detail[0]['slots'];?>">
                                                    <span class="error" style="color: red"><?php if($slot_error){echo $slot_error;}?></span>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-row">
                                           <!--  <div class="col-md-6">
                                                <div class="form-group m-0">
                                                    <label for="daytime" class="col-form-label s-12">DayTime</label>
                                                    <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="daytime" required >
                                                        <option value="">Choose...</option>
                                                        <option  value="morning" <?php if($get_course_detail[0]['daytime']=='morning'){echo"selected";}?>>Morning</option>
                                                        <option  value="afternoon"<?php if($get_course_detail[0]['daytime']=='afternoon'){echo"selected";}?>>Afternoon</option>
                                                        <option  value="evening"<?php if($get_course_detail[0]['daytime']=='evening'){echo"selected";}?>>Evening</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                             <div class="col-md-6" id="sub_parts">
                                                <div class="form-group m-0">
                                                    <label for="part" class="col-form-label s-12">Parts</label>
                                                    <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="sub_part_no" id='sub_part_no' >
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="parts">
                                                <div class="form-group m-0">
                                                    <label for="part" class="col-form-label s-12">Part</label>
                                                    <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="part" id='part'>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span style="color: red;" id="error"><?php if(isset($error)) { echo $error;}?></span>
                            <div class="card-body">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
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

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script> -->
<script type="text/javascript">
    $("input").click(function() {
        $('#error').css("display", "none");
    });

    $(document).ready(function(){
        $('#sub_category_div').css('display','none');
          $('#sub_parts').css('display','none');
        //$('#location_div').css('display','none');
    });
     $(document).ready(function(){
           var sub_category_id=   '<?php echo $get_course_detail[0]['category_id'];?>';
           get_subcategory_list(sub_category_id);
           var sub_category='<?php echo $get_course_detail[0]['sub_category_id'];?>';
           show_parts(sub_category);
    });

    function get_subcategory_list(id)
    {
        if(id!='')
        {
            var part_no='<?php echo $get_course_detail[0]['part'];?>';
            var sub_category_id='<?php echo $get_course_detail[0]['sub_category_id'];?>';
            var url = 'GetData.php';
            $.ajax({
                url : url,
                type: "POST",
                data: {category_id:id,type:'getsubcategorylist'},
                dataType: "JSON",
                success: function(data)
                {
                    console.log(data);
                    if(data.status==1)
                    {
                        $('#sub_category_id').attr('required',true);
                        $('#sub_category_div').css('display','block');
                        $('#sub_category_id').html('');
                        $('#sub_category_id').append($("<option ></option>").attr("value",'').text('Select Sub Category'));
                        $.each(data.data, function(key, value) { 
                            // console.log(sub_category_id);console.log(value.id);
                            if(sub_category_id==value.id){
                        $('#sub_category_id').append($("<option ></option>").attr("value",value.id).attr('selected','selected').text(value.name)); 
                        }else{
                        $('#sub_category_id').append($("<option ></option>").attr("value",value.id).text(value.name));    
                        }
                        });

                    } 
                    if(data.status==2)
                    {
                        $('#part').attr('required',true);
                        $('#part').html('');
                        $('#part').append($("<option></option>").attr("value",'').text('Select Parts'));

                        for (var i = '1'; i <= data.no_of_parts; i++) {
                               if(part_no==i){
                            $('#part').append($("<option></option>").attr("value",i).attr('selected','selected').text(i));
                             }else{
                            $('#part').append($("<option></option>").attr("value",i).text(i));
                            }
                        }
                    } 
                    if(data.status==0) 
                    {
                        $('#part').attr('required',true);
                        $('#sub_category_id').attr('required',false);
                        $('#sub_category_id').attr('value','');
                        $('#sub_category_div').css('display','none');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error getting data');
                }
            });
        }
    }
function show_parts(id)
{
  if(id!='')
        {
             var part_no='<?php echo $get_course_detail[0]['sub_part_no'];?>';
            var url = 'GetData.php';
            $.ajax({
                url : url,
                type: "POST",
                data: {id:id,type:'getsubcategorypartlist'},
                dataType: "JSON",
                success: function(data)
                {
                  console.log(data);
                    if(data.status==1)
                    {   

                        $('#parts').css('display','none');
                        $('#sub_parts').attr('required',true);
                        $('#sub_parts').css('display','block');
                        $('#sub_part_no').html(''); 
                        $('#sub_part_no').append($("<option></option>").attr("value",'').text('Select Parts'));
                        for (var i = '1'; i <= data.no_of_parts; i++) {
                              if(part_no==i){
                            $('#sub_part_no').append($("<option></option>").attr("value",i).attr('selected','selected').text(i));
                             }else{
                            $('#sub_part_no').append($("<option></option>").attr("value",i).text(i));
                            } 
                        }
                    } 
                    
                },
               
            });
        }

}
   

    $("#datepicker").datepicker({
        // numberOfMonths: 2,
        dateFormat: 'dd-mm-yy',
          minDate: "+0", firstDay: 1,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#datepicker").datepicker("option", "maxDate", dt);
        }
    });
    /*$( function() {
       
        var dateToday = new Date()
        dateToday.setDate(dateToday.getDate() + 1)
        //var dateToday = "<?php echo time();?>";
        var dates = $( "#datepicker" ).datepicker({
            startDate: new Date(),
            // multidate: true,
            format: "dd-mm-yy",
            firstday: 1,
            datesDisabled: ['31/08/2017'],
            language: 'en'
        }).on('changeDate', function(e) {
              //console.log('xcvb');
                // `e` here contains the extra attributes
                $(this).find('.input-group-addon .count').text(' ' + e.dates.length);

                // $('#weekly_day').val();
            });;
      } );*/
</script>