<?php
include '../includes/header.php';
global $conn;

if(isset($_GET['remove'])){
	$id=mysqli_real_escape_string($conn,$_GET['remove']);
	$exam_id=mysqli_real_escape_string($conn,$_GET['exam_id']);
	if(mysqli_query($conn,"DELETE FROM lms_mcq_questions WHERE id='$id'")){
		header("location:q_list.php?exam_id=$exam_id");
	}
}

$exam_id=mysqli_real_escape_string($conn,$_GET['exam_id']);
$q_qury=mysqli_query($conn,"SELECT * FROM lms_exam_details WHERE lms_exam_id='$exam_id'");
$q_resalt=mysqli_fetch_assoc($q_qury);

$mcq_qury=mysqli_query($conn,"SELECT COUNT(*) total_mcq FROM lms_mcq_questions WHERE exam_id='$exam_id'");
$mcq_resalt=mysqli_fetch_assoc($mcq_qury);
?>

<div class="page  has-sidebar-left height-full">
 
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">		
        <!--**********************************
            Content body start
        ***********************************-->

            <!-- row -->
            <div class="container-fluid">
				    

				
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Fragenliste</h4>
								<?php if($q_resalt['lms_exam_question']<=$mcq_resalt['total_mcq']){}else{ ?><a href="add_question_new.php?exam_id=<?php echo $_GET['exam_id']; ?>" class="btn btn-dark">New questions</a><?php } ?>
							</div>
							<div class="card-body">
						
							<?php if(isset($_GET['added_success'])){ ?><div class="alert alert-success alert-dismissible alert-alt solid fade show"><strong>Erfolg!</strong> New Frage Added Successfully.</div><?php } ?>
							<?php if(isset($_GET['question_empty'])){ ?><div class="alert alert-danger alert-dismissible alert-alt solid fade show"><strong>Fail!</strong> Please enter your question.</div><?php } ?>

Fragen: <?php echo $q_resalt['lms_exam_question']; ?>/<?php echo $mcq_resalt['total_mcq']; ?>
								
<?php if($q_resalt['lms_exam_question']<=$mcq_resalt['total_mcq']){ ?><br><em class="text-success">Alle Fragen sind für die Prüfung abgeschlossen.</em><?php }else{ ?><br><em class="text-danger">All questions are not completed for the exam.</em><?php } ?>
								
<table class="table">
<tbody>
<tr>
<td>#No</td>
<td>Aktion</td>
<td>Fragen</td>
</tr>
	
<?php 
$q_count=0;
$q_list_qury=mysqli_query($conn,"SELECT * FROM lms_mcq_questions WHERE exam_id='$_GET[exam_id]' ORDER BY exam_id");
while($q_list_resalt=mysqli_fetch_assoc($q_list_qury)){
$q_count++;
?>
<tr>
<td><?php echo $q_count; ?></td>
<td style="white-space: nowrap;">
<a href="add_question_new.php?id=<?php echo $q_list_resalt['id']; ?>&exam_id=<?php echo $_GET['exam_id']; ?>" class="btn btn-dark btn-sm"><i class="fa fa-edit"></i></a>
<a href="q_list.php?remove=<?php echo $q_list_resalt['id']; ?>&exam_id=<?php echo $_GET['exam_id']; ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure to remove this question?');"><i class="fa fa-trash"></i></a>
</td>
<td><?php echo $q_list_resalt['question']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>

								
							</div>
						</div>
					</div>
				</div>
				
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

<?php
include '../includes/footer.php';
?>