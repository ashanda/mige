<?php
include 'header.php';
include 'Functions.php';
$user_id = $_SESSION['user_id'];

$get_history_details = get_history_details($user_id);
 

?> 
<style>
div#main
{
	padding-top:85px !important;
}
@media (max-width:768px)
{
div#main {
    padding-top: 65px !important;
}
}
#no_history p{
	font-size: 30px;
    text-align: center;
}
</style>
</head>

<body>
 
<section class="profile-background" style="background : url(https://webdesign-finder.com/edlane/wp-content/uploads/2019/04/slide01.jpg);">
<div class="container">
<div class="emp-profile">
<div class="col-lg-12 col-md-12">
						<div class="table-responsive mt-30">
							<table id="example" class="table table-bordered" style="margin-top: 10px;">
<thead>
<tr>
<th>Take</th>
<th>Prüfung Name</th>
<th>Kurs ID</th>
<th>Time</th>
<th>Fragen</th>
<th>Time Details</th>
</tr>
</thead>
<tbody>
<?php
$sub_arrey=array();
	
//print_r($_SESSION);
$reg_qury=mysqli_query($conn,"SELECT * FROM booked_course_history WHERE user_id='$user_id'");
$reg_resalt=mysqli_fetch_array($reg_qury);
	

	


$join_str="lms_exam_details INNER JOIN booked_course_history ON lms_exam_details.lms_exam_course=booked_course_history.course_id INNER JOIN tbl_course
ON booked_course_history.course_id = tbl_course.course_id";
$exam_qury=mysqli_query($conn,"SELECT * FROM $join_str WHERE user_id='$user_id'");

while($exam_resalt=mysqli_fetch_array($exam_qury)){

?>

<tr style="text-transform: capitalize;">
<td style="white-space: nowrap;">
<?php
$check_exam=mysqli_query($conn,"SELECT * FROM lms_exam_report r WHERE r.exam_report_user='$user_id' AND r.exam_report_paper='$exam_resalt[lms_exam_id]'");
if(mysqli_num_rows($check_exam)>0){
?>
<script src="js/jquery-3.3.1.min.js"></script>

<a href="#" class="btn btn-success btn-sm">AllReady Take</a>
	
<?php if($exam_resalt['lms_exam_end_time']<date("Y-m-d H:i:s")){ ?>	
<a href="results.php?view=<?php echo $exam_resalt['lms_exam_id']; ?>" style="color: white;" class="btn btn-success btn-sm">Aussicht</a>
<?php }else{ ?>
<a href="" style="color: white;" class="btn btn-success btn-sm">Waiting...</a>
<?php } ?>
	
<?php }else{ ?>
	
	<a href="exam.php?exam_id=<?php echo $exam_resalt['lms_exam_id']; ?>" class="btn btn-success btn-sm">Take Prüfung</a>
<?php } ?>
</td>


<td><?php echo $exam_resalt['lms_exam_name']; ?></td>
<td><?php echo $exam_resalt['course_title_eng']; ?></td>
<td><?php echo $exam_resalt['lms_exam_time_duration']."Min"; ?></td>
<td><?php echo $exam_resalt['lms_exam_question']; ?></td>
<td style="white-space: nowrap; font-weight: normal;">

Start: <?php echo date("Y-m-d h:i:s A",strtotime($exam_resalt['lms_exam_start_time'])); ?><br>
End: <?php echo date("Y-m-d h:i:s A",strtotime($exam_resalt['lms_exam_end_time'])); ?>
</td>
</tr>
<?php

}
?>
</tbody>
</table>
            </div>
						</div>
</div>
</section>
</div>
</div>
<!-- /Main content -->


<?php include 'footer-new.php';?> 


</body>
</html>
