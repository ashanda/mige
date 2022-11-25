<?php
include '../includes/header.php';

if( isset($_GET['course_type']) && $_GET['course_type']==3  ){

$get_all_courses = get_all_courses();

}else{
$get_all_courses = get_all_courses_v2($_GET['course_type']);

}
$count = count($get_all_courses);
include('../includes/pagination.php');
$records=array_slice($get_all_courses, $start,$limit);

?>
<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-th-list"></i>
                       Active Courses
                    </h4>
                </div>
               
            </div>
        </div>
    </header>
     <form action="" method="GET" id="chooseType">
        <select class="custom-select my-1 mr-sm-2 form-control r-0 light col-sm-3" name="course_type" onchange="$('#chooseType').submit()">
            <option value="3" <?php if(!$_GET['course_type'] || $_GET['course_type']==3){echo "selected";} ?> >All Courses </option>
            <option value="0" <?php if($_GET['course_type']==0){echo "selected";} ?>>Normal Courses </option>
            <option value="1" <?php if($_GET['course_type']==1){echo "selected";} ?>>Fixed Courses </option>
        </select>
       <!--  <select class="custom-select my-1 mr-sm-2 form-control r-0 light col-sm-3" name="course_time" onchange="$('#chooseType').submit()">
            <option value="3" <?php if(!$_GET['course_time'] || $_GET['course_time']==3){echo "selected";} ?> >All Time </option>
            <option value="0" <?php if($_GET['course_time']==0){echo "selected";} ?>>Past Courses </option>
            <option value="1" <?php if($_GET['course_time']==1){echo "selected";} ?>>Future Courses </option>
        </select> -->
    </form>
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <form>
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                        <tr class="no-b">
                                            <th>SNo</th>
                                            <th>Course Category Name</th>
                                            <th>Location</th>
                                            <th>DateTime</th>
                                            <th>Number Of Slots</th>
                                            <th>Booked Slots</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($records as $key) 
                                        {
                                            $s_num = $key['s_num'];
                                            $course_id = $key['course_id'];
                                            $sub_category_id = $key['sub_category_id'];
                                            $category_id = $key['category_id'];
                                            $location_id = $key['location_id'];
                                            $part = $key['part'];
                                            $course_date = $key['course_date'];
                                            $course_time = $key['course_time'];
                                            $daytime = $key['daytime'];
                                            $disable = $key['disable'];
                                            $slots = $key['slots'];
                                            $get_category_detail = get_category_detail($category_id);
                                            $category_name = $get_category_detail['name'];

                                            $get_location_detail = get_location_detail($location_id);
                                            $location_name = $get_location_detail['location_name'];
                                            if($part==""){
                                                $no=$key['sub_part_no'];
                                            }
                                            else{
                                                $no=$key['part'];
                                            }

                                            
                                            if($key['course_title_eng']){
                                                $course_category = $key['course_title_eng'];
                                            }else{
                                              $course_category = $category_name.' course part'.$no.' '.$daytime.' course';
                                            }
                                            $date_time = date('d-m-Y',$course_date).' '.date('H:i',$course_time);
                                            $Booked_slot=get_booked_course_detailv3($course_id,0);
                                            
                                            ?>
                                            <tr>
                                                <td><?php echo $s_num;?></td>
                                                <td><?php echo $course_category;?></td>
                                                <td><?php echo $location_name;?></td>
                                                <td><?php echo $date_time;?></td>
                                                <td><?php echo $slots;?></td>
                                                <td><?php echo $Booked_slot['booked_slot'];?></td>
                                                <td>
                                                    <a  href="refund.php?id=<?php echo $course_id;?>"><i class="icon-users mr-3 iconspace"></i></a>
                                                    <a  href="EditCourse.php?id=<?php echo $course_id;?>"><i class="icon-pencil mr-3 iconspace"></i></a>
                                                    <a onclick="delete_record('<?php echo $course_id;?>')" href="#"><i class="icon-trash mr-3 iconspace"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>                                        
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <nav class="my-3" aria-label="Page navigation" style="display: flex;justify-content: center;">
                    <ul class="pagination">
                        <?php echo $pagination;?>
                        <!-- <li class="page-item"><a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">Next</a>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php
include '../includes/footer.php';
?>
<script type="text/javascript">
function delete_record(course_id)
{
    if(confirm('Are You Sure?'))
    {
      var url;
      url = "../Category/Delete.php";
         
     // ajax adding data to database
      $.ajax({
        url : url,
        type: "POST",
        data: {course_id:course_id,type:'course'},
        dataType: "JSON",
        success: function(data)
        {
          if(data.status==1)
          {
            alert('Deleted Successfully');
            window.location.reload();
          }
          if(data.status==0) 
          {
           alert(data.message);
          }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error while Deleting');
        }
      });
    }
}
</script>