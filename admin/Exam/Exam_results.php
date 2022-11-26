<?php
include '../includes/header.php';
global $conn;


if(isset($_GET['remove'])){
	$lms_report_id=mysqli_real_escape_string($conn,$_GET['remove']);
	if(mysqli_query($conn,"DELETE FROM lms_exam_report WHERE lms_report_id='$lms_report_id'")){
		header("location:exam_results.php");
	}
}




?>
<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        
                        List Of Exams
                    </h4>
                </div>
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
<form method="post" class="mb-2">
<table>
<tbody>
<tr>
<td>
<select name="exam_report_paper" required="required" class="form-control" id="exam_report_paper">
<option value="All">Alle Prüfungen</option>
<?php 
$ex_qury=mysqli_query($conn,"SELECT * FROM lms_exam_details ORDER BY lms_exam_id DESC");
while($ex_resalt=mysqli_fetch_assoc($ex_qury)){
?>
<option <?php if(isset($_POST['exam_report_paper'])){if($_POST['exam_report_paper']==$ex_resalt['lms_exam_id']){echo "selected";}} ?> value="<?php echo $ex_resalt['lms_exam_id']; ?>"><?php echo $ex_resalt['lms_exam_name']; ?></option>
<?php } ?>
</select>
</td>
<td><button name="filter" type="submit" class="btn btn-sm btn-success ml-2">Filter</button></td>
</tr>
</tbody>
</table>
</form>
										<div class="table-responsive">
<table id="example3" class="table table-bordered">
<thead>
<tr>
<th>Aktion</th>
<th>Prüfung/Subject</th>
<th>Studentin</th>

<th>Vollständige Zeit</th>
</tr>
</thead>
<tbody>
<?php
if(isset($_POST['filter'])){
$r_qury=mysqli_query($conn,"SELECT er.*,ed.lms_exam_name,r.firstname,r.lastname,ed.lms_exam_question
FROM lms_exam_report er INNER JOIN lms_exam_details ed ON er.exam_report_paper=ed.lms_exam_id
INNER JOIN user r ON er.exam_report_user=r.user_id
WHERE er.exam_report_paper='$_POST[exam_report_paper]'
ORDER BY er.lms_report_id DESC");
}
else{
$r_qury=mysqli_query($conn,"SELECT er.*,ed.lms_exam_name,r.firstname,r.lastname,ed.lms_exam_question
FROM lms_exam_report er INNER JOIN lms_exam_details ed ON er.exam_report_paper=ed.lms_exam_id
INNER JOIN user r ON er.exam_report_user=r.user_id
ORDER BY er.lms_report_id DESC");
}
while($r_esalt=mysqli_fetch_assoc($r_qury)){
?>
<tr>
<td><a href="exam_results.php?remove=<?php echo $r_esalt['lms_report_id']; ?>" class="btn btn-sm btn-danger" onClick="return confirm('Are you sure to remove this exam result?');">Remove</a></td>
<td><?php echo $r_esalt['lms_exam_name']; ?></td>
<td><?php echo $r_esalt['firstname']; ?></td>


<td><?php echo date("Y-m-d h:i:s A",strtotime($r_esalt['exam_report_complet_time'])); ?></td>
</tr>
<?php
}
?>
</tbody>
</table>
										</div>
									</div>
                                </div>
                            </div>

						</div>
					</div>
				</div>
				
            </div>
        </div>
<?php
include '../includes/footer.php';
?>
