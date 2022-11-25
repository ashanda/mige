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

    $totalParts = count($_POST['instructor_id']);

    for ($i=0; $i <$totalParts ; $i++) {
            

                $instructor_id = $_POST['instructor_id'][$i];
                $course_time = strtotime($_POST['course_time'][$i]);
                $course_end_time = strtotime($_POST['course_end_time'][$i]);
                $price = $_POST['price'][$i];
                $part = $_POST['part'][$i];
                $daytime = $_POST['weekly_day'][$i];
                $creation_time = time();
                $course_date = $_POST['course_date'][$i];
                $course_end_date = $_POST['course_end_date'][$i];
                $course_title_eng = $_POST['course_title_eng'][$i];
                $course_title_ger = $_POST['course_title_ger'][$i];
                $course_id="";
                $slots = $_POST['slots'][$i];
                $weekly_day=$_POST['weekly_day'][$i];
                $flexible_payment=$_POST['flexible_payment'][$i];
                $week_differ=$_POST['week_differ'][$i];
                $course_start_date=strtotime($course_date);
                $course_end_dates=strtotime($course_end_date);
                $course_room=rand().uniqid();
                $sub_part_no=$_POST['sub_part_no'][$i];
               /* print_r($sub_part_no); echo " sub_part_no ";
                print_r($part); echo " parts ";*/
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
                $add_course = add_coursev2($category_id,$sub_category_id,$location_id,$c_date,$course_time,$course_end_time,$price,$part,'',$creation_time,$instructor_id,$slots,$day_name,$course_id,$course_room,$flexible_payment,$week_differ,$course_start_date,$course_end_dates,$sub_part_no,1,$course_title_eng,$course_title_ger);
                }



            }
            //die;
            /*for all multiple courses*/

              /*  if($add_course)
                {
                    echo "<script type='text/javascript'>
                    window.location.href='index.php';</script>";
                    exit();
                }
                else
                {
                    $error = 'There is someting wrong while adding new course';
                }*/
        }
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


 function getDateForSpecificDayBetweenDates($startDate,$endDate,$day_number,$week_differ){
    $endDate = strtotime($endDate);
    $days=array('1'=>'Monday','2' => 'Tuesday','3' => 'Wednesday','4'=>'Thursday','5' =>'Friday','6' => 'Saturday','7'=>'Sunday');
    for($i = strtotime($days[$day_number], strtotime($startDate)); $i <= $endDate; $i = strtotime('+'.$week_differ.' week', $i))
    $date_array[]=date('Y-m-d',$i);

    return $date_array;
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
                        <a class="nav-link act"  href="#" ><i class="icon icon-plus-circle"></i>Add Multiple Courses</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-12  offset-md-2">
                    <form  method="POST">
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-8">
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

                                        <div id="appendPartsDiv">
                                            
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
                         
             
                    } 
                    if(data.status==2)
                    {
                         var url = 'getPartTabs.php';
                        $.ajax({
                            url : url,
                            type: "POST",
                            data: {partsCount:data.no_of_parts,partType:'1'},
                            dataType: "html",
                            success: function(data)
                            {
                              console.log(data);

                              $('#appendPartsDiv').html(data);
                               
                                
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert('Something went wrong, please try again later.');
                            }
                        });
                      

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
                  //console.log(data);

                    var url = 'getPartTabs.php';
                        $.ajax({
                            url : url,
                            type: "POST",
                            data: {partsCount:data.no_of_parts,partType:'2'},
                            dataType: "html",
                            success: function(data)
                            {
                             // console.log(data);

                              $('#appendPartsDiv').html(data);
                               
                                
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert('Something went wrong, please try again later.');
                            }
                        });
                  
                    
                },
            });
        }

}
    
</script>
