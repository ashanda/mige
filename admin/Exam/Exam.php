<?php
include '../includes/header.php';
global $conn;
if(isset($_GET['remove'])){
	$remove=mysqli_real_escape_string($conn,$_GET['remove']);
	if(mysqli_query($conn,"DELETE FROM lms_exam_details WHERE lms_exam_id='$remove'")){
		echo "<script>window.location='exam.php?removed';</script>";
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
											<table id="example3" class="table table-bordered">
												<thead>
													<tr>
														<th>Aktion</th>
                                                        <th>PRÜFUNG</th>
                                                        <th>Kurs ID</th>
                                                        <th>ZEITDAUER</th>
                                                        <th>FRAGEN AUF PAPIER</th>
                                                        <th>ZEIT HINZUFÜGEN</th>
													</tr>
												</thead>
												<tbody>
								<?php 
//$join_str="lms_exam_details INNER JOIN lmssubject ON lms_exam_details.lms_exam_subject=lmssubject.sid";
$exam_qury=mysqli_query($conn,"SELECT * FROM lms_exam_details INNER JOIN tbl_course ON lms_exam_details.lms_exam_course = tbl_course.course_id  ORDER BY lms_exam_id DESC");
while($exam_resalt=mysqli_fetch_array($exam_qury)){
?>
                    <tr>
						<td style="white-space: nowrap;">
<a href="q_list.php?exam_id=<?php echo $exam_resalt['lms_exam_id']; ?>" class="btn btn-sm btn-success" title="Frage hinzufügen">Frage hinzufügen</a>
<a href="new_exam.php?lms_exam_id=<?php echo $exam_resalt['lms_exam_id']; ?>" class="btn btn-sm btn-primary" title="Test Prüfung"><i class="fa fa-edit"></i></a>
<a href="exam.php?remove=<?php echo $exam_resalt['lms_exam_id']; ?>" class="btn btn-sm btn-danger" title="Test Prüfung" onClick="JavaScript:return confirm('Are your sure remove this exam?');">
<i class="fa fa-trash-o"></i></a>

						</td>
						<td><?php echo $exam_resalt['lms_exam_name']; ?></td>
						
                        <td><?php echo $exam_resalt['course_title_eng']; ?></td>
					
						<td><?php echo $exam_resalt['lms_exam_time_duration']."Min"; ?></td>
						<td><?php echo $exam_resalt['lms_exam_question']; ?></td>
						<td><?php echo date_format(date_create($exam_resalt['lms_exam_add_time']),"M d, Y - h:i:s A"); ?></td>										
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