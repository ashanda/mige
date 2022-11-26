<?php
include '../includes/header.php';
global $conn;
date_default_timezone_set("Asia/Colombo");

if(isset($_POST['update_bt'])){
	
	$lms_exam_id=mysqli_real_escape_string($conn,$_GET['lms_exam_id']);
	$lms_exam_name=mysqli_real_escape_string($conn,$_POST['lms_exam_name']);
	$lms_exam_course=mysqli_real_escape_string($conn,$_POST['lms_exam_course']);
	$lms_exam_question=mysqli_real_escape_string($conn,$_POST['lms_exam_question']);
	$lms_exam_time_duration=mysqli_real_escape_string($conn,$_POST['lms_exam_time_duration']);
	$lms_exam_start_time=mysqli_real_escape_string($conn,$_POST['lms_exam_start_time']);
	$lms_exam_end_time=mysqli_real_escape_string($conn,$_POST['lms_exam_end_time']);
	
	
	if(mysqli_query($conn,"UPDATE lms_exam_details SET lms_exam_name='$lms_exam_name',lms_exam_course='$lms_exam_course',lms_exam_question='$lms_exam_question',lms_exam_start_time='$lms_exam_start_time',lms_exam_end_time='$lms_exam_end_time',lms_exam_time_duration='$lms_exam_time_duration' WHERE lms_exam_id='$lms_exam_id'")){
		echo "<script>window.location='new_exam.php?update&lms_exam_id=$lms_exam_id';</script>";
	}
	else{
		echo "<script>window.location='new_exam.php?update_fail&lms_exam_id=$lms_exam_id';</script>";
	}
}

if(isset($_POST['add_bt'])){
	$lms_exam_name=mysqli_real_escape_string($conn,$_POST['lms_exam_name']);
	$lms_exam_course=mysqli_real_escape_string($conn,$_POST['lms_exam_course']);
	
	$lms_exam_question=mysqli_real_escape_string($conn,$_POST['lms_exam_question']);
	$lms_exam_time_duration=mysqli_real_escape_string($conn,$_POST['lms_exam_time_duration']);
	$lms_exam_start_time=mysqli_real_escape_string($conn,$_POST['lms_exam_start_time']);
	$lms_exam_end_time=mysqli_real_escape_string($conn,$_POST['lms_exam_end_time']);
	
	$lms_exam_system_id=time();
	$lms_exam_add_time=date("Y-m-d H:i:s");
	
	if(mysqli_query($conn,"INSERT INTO
	lms_exam_details(lms_exam_course, lms_exam_system_id, lms_exam_name, lms_exam_question, lms_exam_time_duration, lms_exam_start_time, lms_exam_end_time, lms_exam_add_time)
	VALUES ('$lms_exam_course','$lms_exam_system_id','$lms_exam_name','$lms_exam_question','$lms_exam_time_duration','$lms_exam_start_time','$lms_exam_end_time','$lms_exam_add_time')")){
		echo "<script>window.location='Exam.php?success';</script>";
	}
	else{
		echo "<script>window.location='New_exam.php?fail';</script>";
	}
}

if(isset($_GET['lms_exam_id'])){
	$lms_exam_id=mysqli_real_escape_string($conn,$_GET['lms_exam_id']);
	
	$edit_qury=mysqli_query($conn,"SELECT * FROM lms_exam_details WHERE lms_exam_id='$lms_exam_id'");
	$edit_resalt=mysqli_fetch_array($edit_qury);
}

?>
<div class="page  has-sidebar-left height-full">
 
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
				<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				    
                
				
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Add New Prüfung</h4>
							</div>
							<div class="card-body">
							<?php if(isset($_GET['update'])){ ?>
							<div class="alert alert-success alert-dismissible alert-alt solid fade show">
							<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
							<strong>Erfolg!</strong> Prüfungsdetails Updated Successfully..
							</div>
							<?php

							}

							?>
								<form method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Prüfung Name</label>
												<input name="lms_exam_name" type="text" class="form-control" value="<?php if(isset($_GET['lms_exam_id'])){echo $edit_resalt['lms_exam_name'];} ?>" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Kurs ID</label>
												 <select name="lms_exam_course" class="form-control" required>
		  <?php 
		  $tec_qury=mysqli_query($conn,"SELECT * FROM tbl_course ORDER BY course_id");
		  while($tec_resalt=mysqli_fetch_array($tec_qury)){
		  ?>
        <option value="<?php echo $tec_resalt['course_id']; ?>"><?php echo $tec_resalt['course_title_eng']; ?></option>
		  <?php 
		  }
		  ?>
      </select>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
												<label class="form-label">Time Duration (Enter in minutes)</label>
												<input name="lms_exam_time_duration" type="text" class="form-control" pattern="\d*" value="<?php if(isset($_GET['lms_exam_id'])){echo $edit_resalt['lms_exam_time_duration'];} ?>" required>
										</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Fragen Per Paper</label>
												<input name="lms_exam_question" type="text" class="form-control" pattern="\d*" value="<?php if(isset($_GET['lms_exam_id'])){echo $edit_resalt['lms_exam_question'];} ?>" required>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Startzeit</label>
												<input name="lms_exam_start_time" type="datetime-local" required class="form-control" id="lms_exam_start_time" pattern="\d*" value="<?php if(isset($_GET['lms_exam_id'])){echo date("Y-m-d\TH:i:s",strtotime($edit_resalt['lms_exam_start_time']));} ?>">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
										  <div class="form-group">
											<label class="form-label">Endzeit</label>
											  <input name="lms_exam_end_time" type="datetime-local" required class="form-control" id="lms_exam_end_time" pattern="\d*" value="<?php if(isset($_GET['lms_exam_id'])){echo date("Y-m-d\TH:i:s",strtotime($edit_resalt['lms_exam_end_time']));} ?>">
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button name="<?php if(isset($_GET['lms_exam_id'])){echo "update_bt";}else{echo "add_bt";} ?>" type="submit" class="btn btn-primary"><?php if(isset($_GET['lms_exam_id'])){echo "Aktualisieren Prüfung";}else{echo "Add Prüfung";} ?></button>
											<a class="btn btn-light" href="exam.php"><i class="fa fa-times"></i> Cancel</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
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
<script type="text/javascript">
function delete_record(id)
{
    if(confirm('Are You Sure?'))
    {
      var url;
      url = "../Category/Delete.php";
         
     // ajax adding data to database
      $.ajax({
        url : url,
        type: "POST",
        data: {id:id,type:'location'},
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
            alert(textStatus);
          alert('Error while Deleting');
        }
      });
    }
}
</script>