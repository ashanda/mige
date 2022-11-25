<?php
include '../includes/header.php';
$get_all_categories = get_all_categories();
$get_location_list = get_location_list();
$get_all_insructors = get_all_insructors();

if(isset($_POST['submit']))
{
    // var_dump($_POST);
    $category_id = $_POST['category_id'];
    $sub_category_id = $_POST['sub_category_id'];
    $location_id = $_POST['location_id'];
    $course_title_eng = $_POST['course_title_eng'];
    $course_title_ger = $_POST['course_title_ger'];
    $instructor_id = $_POST['instructor_id'];
    $course_time = strtotime($_POST['course_time']);
    $course_end_time = strtotime($_POST['course_end_time']);
    $price = $_POST['price'];
    $part = $_POST['part'];
    $daytime = $_POST['weekly_day'];
      $creation_time = time();
    $course_date = $_POST['course_date'];
    $course_end_date = $_POST['course_end_date'];
    $course_id="";
    $slots = $_POST['slots'];
    $weekly_day=$_POST['weekly_day'];
    $flexible_payment=$_POST['flexible_payment'];
    $week_differ=$_POST['week_differ'];
    $course_start_date=strtotime($course_date);
    $course_end_dates=strtotime($course_end_date);
    $course_room=rand().uniqid();
    $sub_part_no=$_POST['sub_part_no'];
   
   if($course_start_date > $course_end_dates){
      $error1="End date must be greater than start date.";
    }else{
    if(!preg_match('/^[0-9]*$/', $slots))
    {
      $slot_error='Please enter valid numeric value.';
    }
    
    else{
      $course_dates=date('d-m-Y',strtotime($course_date));
      $course_end=date('d-m-Y',strtotime($course_end_date));

function getDateForSpecificDayBetweenDates($startDate,$endDate,$day_number,$week_differ){
    $endDate = strtotime($endDate);
    $days=array('1'=>'Monday','2' => 'Tuesday','3' => 'Wednesday','4'=>'Thursday','5' =>'Friday','6' => 'Saturday','7'=>'Sunday');
    for($i = strtotime($days[$day_number], strtotime($startDate)); $i <= $endDate; $i = strtotime('+'.$week_differ.' week', $i))
    $date_array[]=date('Y-m-d',$i);

    return $date_array;
 }


$datess=getDateForSpecificDayBetweenDates($course_dates,$course_end,$weekly_day,$week_differ);
$a=array();
foreach ($datess as $key => $value) {
$a[]=$value;
}
if($weekly_day=='1'){
  $day_name="Monday";
}
elseif($weekly_day=='2'){
  $day_name="Tuesday";
}
elseif($weekly_day=='3'){
   $day_name="Wednesday";
}
elseif($weekly_day=='4'){
   $day_name="Thursday";
}
elseif($weekly_day=='5'){
   $day_name="Friday";
}
elseif($weekly_day=='6'){
   $day_name="Saturday";
}
elseif($weekly_day=='7'){
   $day_name="Sunday";
}

    foreach ($a as $key => $value) {
    $c_date=date('Y-m-d',strtotime($value));
    $add_course = add_coursev2($category_id,$sub_category_id,$location_id,$c_date,$course_time,$course_end_time,$price,$part,'',$creation_time,$instructor_id,$slots,$day_name,$course_id,$course_room,$flexible_payment,$week_differ,$course_start_date,$course_end_dates,$sub_part_no,0,$course_title_eng,$course_title_ger);
    }

    if($add_course)
    {
        echo "<script type='text/javascript'>
        window.location.href='index.php?course_type=3';</script>";
        exit();
    }
    else
    {
        $error = 'There is someting wrong while adding new course';
    }
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
</style>
<!-- <link rel="stylesheet" href="../assets/css/datepickernew.css">  -->


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
                        <a class="nav-link act"  href="#" ><i class="icon icon-plus-circle"></i>Add New Course</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
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
                                                    <option  value="<?php echo $key['category_id'];?>"><?php echo $key['name'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- onchange="show_location(this.value) -->
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
                                                    <option value="<?php echo $key['id'];?>"><?php echo $key['location_name'];?></option>
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
                                                            <option value="<?php echo $key['instructor_id'];?>"><?php echo $key['username'];?></option>
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
                                                        <option value="0">One-to-one</option>
                                                        <option  value="1">Together</option>
                                                    </select>
                                                </div>
                                            </div>
                                         
                                        </div>
                                         <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                   <label for="course_date" class="col-form-label s-12">Start Date</label>
                                            <input name="course_date" placeholder="Enter Course Date" class="form-control r-0 light s-12 date" type="text" id="datepicker1" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                    <label for="course_date" class="col-form-label s-12">End Date</label>
                                            <input name="course_end_date" placeholder="Enter Course Date" class="form-control r-0 light s-12 date" type="text" id="datepicker2" autocomplete="off" required>
                                           <span style="color: red;" id="error"><?php if(isset($error1)) { echo $error1;}?></span>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-row">
                                             <div class="col-md-6">
                                                <div class="form-group m-0">
                                                   <label for="course_title_eng" class="col-form-label s-12">Course Title(In English)</label>
                                                   <input name="course_title_eng" placeholder="Course Title(In English)" class="form-control r-0 light s-12" type="text" id="course_title_eng" autocomplete="off" required>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group m-0">
                                                   <label for="course_title_ger" class="col-form-label s-12">Course Title(In German)</label>
                                                   <input name="course_title_ger" placeholder="Course Title(In German)" class="form-control r-0 light s-12" type="text" id="course_title_ger" autocomplete="off" required>
                                                </div>
                                            </div>
                                         </div>
                                         <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                <label for="category_id" class="col-form-label s-12">Weekly Day</label>
                                              <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="weekly_day"  required>
                                               <option value="">Choose weekly day.</option>
                                               <option  value="1">Monday</option>
                                               <option  value="2">Tuesday</option>
                                               <option  value="3">Wednesday</option>
                                               <option  value="4">Thrusday</option>
                                               <option  value="5">Friday</option>
                                               <option  value="6">Saturday</option>
                                               <option  value="7">Sunday</option>
                                            </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                <label for="category_id" class="col-form-label s-12">Select Week or month</label>
                                              <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="week_differ"  required>
                                               <option value="">Choose week or month.</option>
                                               <option  value="1">Every week</option>
                                               <option  value="2">Every 2nd week</option>
                                               <option  value="3">Every 3rd week </option>
                                               <option  value="4">Once a Month</option>
                                              
                                              </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  <div class="form-group m-0">
                                            <label for="course_date" class="col-form-label s-12">Upto Course Date</label>
                                            <input name="course_date" placeholder="Enter Course Date" class="form-control r-0 light s-12 date" type="text" id="datepicker" autocomplete="off" required>
                                        </div> -->
                                         <!-- <div class="form-group m-0">
                                            <label for="category_id" class="col-form-label s-12">Weekly Day</label>
                                            <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="weekly_day"  required>
                                               <option value="">Choose weekly day.</option>
                                               <option  value="Sunday">Sunday</option>
                                               <option  value="Monday">Monday</option>
                                               <option  value="Tuesday">Tuesday</option>
                                               <option  value="Wednesday">Wednesday</option>
                                               <option  value="Thrusday">Thrusday</option>
                                               <option  value="Friday">Friday</option>
                                               <option  value="Saturday">Saturday</option>
                                            </select>
                                        </div> -->
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                    <label for="course_time" class="col-form-label s-12">Course Start Time</label>
                                                    <input name="course_time" placeholder="Enter Course Time" class="form-control r-0 light s-12 " type="time" required autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                    <label for="course_end_time" class="col-form-label s-12">Course End Time</label>
                                                    <input name="course_end_time" placeholder="Enter Course End Time" class="form-control r-0 light s-12 " type="time" required autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                    <label for="price" class="col-form-label s-12">Price</label>
                                                    <input name="price" placeholder="Enter Price Here" class="form-control r-0 light s-12 " type="text" required autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                    <label for="slots" class="col-form-label s-12">Slots</label>
                                                    <input name="slots" placeholder="Enter Slots Here" class="form-control r-0 light s-12 " type="text" required>
                                                    <span class="error" style="color: red"><?php if($slot_error){echo $slot_error;}?></span>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-row">
                                           <!--  <div class="col-md-6">
                                                <div class="form-group m-0">
                                                    <label for="daytime" class="col-form-label s-12">DayTime</label>
                                                    <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="daytime" required>
                                                        <option value="">Choose...</option>
                                                        <option  value="morning">Morning</option>
                                                        <option  value="afternoon">Afternoon</option>
                                                        <option  value="evening">Evening</option>
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

    function get_subcategory_list(id)
    {
        if(id!='')
        {
            var url = 'GetData.php';
            $.ajax({
                url : url,
                type: "POST",
                data: {category_id:id,type:'getsubcategorylist'},
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status==1)
                    {
                        $('#sub_category_id').attr('required',true);
                        $('#sub_category_div').css('display','block');
                        $('#sub_category_id').html('');
                        $('#sub_category_id').append($("<option ></option>").attr("value",'').text('Select Sub Category'));
                        $.each(data.data, function(key, value) { 
                        $('#sub_category_id').append($("<option ></option>").attr("value",value.id).text(value.name)); 
                        });
                         
             
                        // $('#part').html('');
                        // $('#part').append($("<option></option>").attr("value",'').text('Select Parts'));
                        // for (var i = '1'; i <= data.no_of_parts; i++) {
                        //     $('#part').append($("<option></option>").attr("value",i).text(i));
                        // }
                    } 
                    if(data.status==2)
                    {
                          $('#part').attr('required',true);
                        $('#part').html('');
                        $('#part').append($("<option></option>").attr("value",'').text('Select Parts'));
                        for (var i = '1'; i <= data.no_of_parts; i++) {
                            $('#part').append($("<option></option>").attr("value",i).text(i));
                        }
                    } 
                    if(data.status==0) 
                    {
                        $('#part').attr('required',true);
                        $('#sub_category_id').attr('required',false);
                        $('#sub_category_id').attr('value','');
                        /*$('#location_id').attr('required',true);
                        $('#location_div').css('display','block');*/
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
                        // $('#part').html('');
                        $('#sub_part_no').append($("<option></option>").attr("value",'').text('Select Parts'));
                        for (var i = '1'; i <= data.no_of_parts; i++) {
                            $('#sub_part_no').append($("<option></option>").attr("value",i).text(i));
                        }
                    } 
                    
                },
                // error: function (jqXHR, textStatus, errorThrown)
                // {
                //     alert('Error getting data');
                // }
            });
        }

}
    /*function show_location(id)
    {
        if(id)
        {
            $('#location_id').attr('required',true);
            $('#location_div').css('display','block');
        }
        else
        {
            $('#sub_category_id').focus();
        }
    }*/

    /*$('.date').datepicker({
      multidate: true,
        format: 'dd-mm-yyyy'
    });*/  
// function populateEndDate() {
//   var date2 = $('#datepicker').datepicker('getDate');
//   // date2.setDate(date2.getDate() + 1);
//   // $('#datepicker1').datepicker('setDate', date2);
//   // $("#datepicker1").datepicker("option", "minDate", date2);
//   $('#datepicker1').datepicker({ minDate: date2});
// }

    // $( function() {
    //     var dateToday = new Date()
    //     dateToday.setDate(dateToday.getDate() + 1)
    //     //var dateToday = "<?php echo time();?>";
    //     var dates = $( "#datepicker1" ).datepicker({
    //         startDate: new Date(),
    //         // multidate: true,
    //         format: "yyyy-mm-dd",
    //         datesDisabled: ['31/08/2017'],
    //         language: 'en'
    //     }).on('changeDate', function(e) {
    //       // populateEndDate();
    //           //console.log('xcvb');
    //             // `e` here contains the extra attributes
    //             $(this).find('.input-group-addon .count').text(' ' + e.dates.length);
    //         });;
    //   } );

    //    $( function() {
    //     var dateToday = new Date()
    //     dateToday.setDate(dateToday.getDate() + 1)
    //     //var dateToday = "<?php echo time();?>";
    //     var dates = $( "#datepicker2" ).datepicker({
    //         startDate: new Date(),
    //         // multidate: true,
    //         format: "yyyy-mm-dd",
    //         datesDisabled: ['31/08/2017'],
    //         language: 'en'
    //     }).on('changeDate', function(e) {
    //           //console.log('xcvb');
    //             // `e` here contains the extra attributes
    //             $(this).find('.input-group-addon .count').text(' ' + e.dates.length);
    //         });;
    //   } );
</script>
<script type="text/javascript">
    
 // $( function() {
 //    $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
 //    $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
 
 //  });
//   var dateToday = $('#datepicker1').val();

// var dates = $("#datepicker1,#datepicker2").datepicker({
//     dateFormat: 'yy-mm-dd',
//     minDate: "+1",
//     onSelect: function(selectedDate) {
//         var option = this.id == "datepicker1" ? "minDate" : "maxDate",
//             instance = $(this).data("datepicker"),
//             date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
//         dates.not(this).datepicker("option", option, date);
//     }
// }); 

     /*   $(function () {
    $("#datepicker1").datepicker({
        // numberOfMonths: 2,
        dateFormat: 'mm-dd-yy',
         minDate: "+0", firstDay: 1,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() + 1);
            $("#datepicker2").datepicker("option", "minDate", dt);
        }
    });
    $("#datepicker2").datepicker({
        // numberOfMonths: 2,
        dateFormat: 'mm-dd-yy',
          minDate: "+0", firstDay: 1,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#datepicker1").datepicker("option", "maxDate", dt);
        }
    });
});

*/

  var dateToday = $('#datepicker1').val();
  var dates = $("#datepicker1,#datepicker2").datepicker({
    dateFormat: 'dd-mm-yy',
    minDate: dateToday,
    changeMonth: true,
    firstDay: 1,
    changeYear: true,
    onSelect: function(selectedDate) {
        var option = this.id == "datepicker1" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                        if(option == "minDate"){
                            //var selectedDate = new Date(date);
                            var msecsInADay = 86400000;
                             date = new Date(date.getTime() + msecsInADay);
                        }
        dates.not(this).datepicker("option", option, date);
    }
});
</script>