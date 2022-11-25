<?php
include 'header.php';
$id=$_SESSION['id'];
$date=strtotime(date('d-m-Y'));
$get_all_courses = get_all_present_course_detailv2($id,$date,0);
$count = count($get_all_courses);
include('../includes/pagination.php');
$records=array_slice($get_all_courses, $start,$limit);
$_SESSION['SetTab']=2;
?>
<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-th-list"></i>
                        Courses
                    </h4>
                </div>
            </div>
             <!-- <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li class="<?php if($_SESSION['SetTab']==1){echo 'a';}?>">
                        <a class="nav-link"  href="PastCourse2.php"><i class="icon icon-circle-o"></i>Past Courses</a>
                    </li>
                    <li class="<?php if($_SESSION['SetTab']==2){echo 'a';}?>">
                        <a class="nav-link active"  href="#" ><i class="icon icon-circle-o"></i>Present  Course</a>
                    </li>
                    <li class="<?php if($_SESSION['SetTab']==3){echo 'a';}?>">
                        <a class="nav-link active"  href="FutureCourse2.php" ><i class="icon icon-circle-o"></i>Future  Course</a>
                    </li>
                </ul>
            </div> -->
             <div class="row justify-content-between">
                <ul class="d-flex" style="overflow-x: scroll;">
                    <li style="min-width: 160px;"  class="<?php if($_SESSION['SetTab']==1){echo 'a';}?>">
                        <a class="nav-link"  href="PastCourse2.php"><i class="icon icon-circle-o"></i>Past Courses</a>
                    </li>
                    <li style="min-width: 160px;"  class="<?php if($_SESSION['SetTab']==2){echo 'a';}?>">
                        <a class="nav-link active"  href="#" ><i class="icon icon-circle-o"></i>Present Courses</a>
                    </li>
                    <li style="min-width: 160px;"  class="<?php if($_SESSION['SetTab']==3){echo 'a';}?>">
                        <a class="nav-link active"  href="FutureCourse2.php" ><i class="icon icon-circle-o"></i>Future Courses</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
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
                                            <!-- <th>Student Name</th>
                                             <th>Phone No.</th>
                                            
                                               <th>Total Price</th>
                                                <th>Payment Status</th>
                                                <th>Payme nt process</th>-->
                                            <th>DateTime</th>
                                            <!-- <th>Number Of Slots</th> -->
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($records as $key) 
                                        {
                                            $s_num = $key['s_num'];
                                            $course_id = $key['course_id'];
                                            // $sub_category_id = $key['sub_category_id'];
                                            // $category_id = $key['category_id'];
                                            // $location_id = $key['location_id'];
                                            // $part = $key['part'];
                                            // $course_date = $key['course_date'];
                                            // $course_time = $key['course_time'];
                                            // $daytime = $key['daytime'];
                                            // $disable = $key['disable'];
                                            // $slots = $key['slots'];
                                            $course_detail=get_course_detail_by_couse_id($course_id);

                                            $category_id=$course_detail[0]['category_id'];
                                            $part = $course_detail[0]['part'];
                                            $course_date = $course_detail[0]['course_date'];
                                            $course_time = $course_detail[0]['course_time'];
                                            $daytime = $course_detail[0]['daytime'];
                                            $disable = $course_detail[0]['disable'];
                                            $get_category_detail = get_category_detail($category_id);
                                            $category_name = $get_category_detail['name'];
                                             $location_id = $course_detail[0]['location_id'];
                                            $get_location_detail = get_location_detail($location_id);
                                            $location_name = $get_location_detail['location_name'];

                                            if($key['course_title_eng']){
                                                $course_category = $key['course_title_eng'];
                                            }else{
                                              $course_category = $category_name.' course part'.$part.' '.$daytime.' course';
                                            }
                                            $date_time = date('d-m-Y',$course_date).' '.date('H:i',$course_time);
                                            // $student_detail=get_student_detail_by_couse_id($course_id);
                                            // var_dump($student_detail);
                                            ?>
                                            <tr>
                                                <td><?php echo $s_num;?></td>
                                                <td><?php echo $course_category;?></td>
                                                <td><?php echo $location_name;?></td>
                                                <!-- td><?php echo $key['firstname'].' '. $key['lastname'] ;?></td>
                                                <td><?php echo $key['phone'];?></td>
                                                  <td><?php echo $key['total_price'];?></td>
                                                 <td><?php echo $key['payment_type'];?></td>
                                                  <td><?php if($key['payment_status']==0) {echo "pending";} elseif($key['payment_status']==1){echo "paid";}?></td> -->
                                                <td><?php echo $date_time;?></td> 
                                                <td><a href="student.php?course_id=<?php echo $course_id;?>"><i class="icon icon-users"></i></a></td>
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
