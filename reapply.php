<?php
include 'header.php';

$user_id = $_SESSION['user_id'];
$qury=mysqli_query($conn,"SELECT * FROM user WHERE user_id='$user_id'"); 	
$row = mysqli_fetch_array($qury);
$qury1=mysqli_query($conn,"SELECT * FROM booked_course_history WHERE user_id='$user_id'");
$row1 = mysqli_fetch_array($qury1);
$qury2=mysqli_query($conn,"SELECT * FROM lmsreapply WHERE userid='$user_id'");
$row2 = mysqli_fetch_array($qury2);
if(isset($_POST['add_class_bt'])){

	
	$user_id=mysqli_real_escape_string($conn,$user_id);
	$classid=mysqli_real_escape_string($conn,$row1['course_id']);
	


	date_default_timezone_set("Asia/Colombo");
	
	
   mysqli_query($conn,"INSERT INTO lmsreapply(userid, classid) VALUES ('$user_id','$classid')");
   
	echo "<script>window.location='reapply.php?added';</script>";
	
	


}
 


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

								<div class="card">
									<div class="card-body">
									<?php if(isset($_GET['added'])){ ?>

									<div class="alert alert-success alert-dismissible alert-alt solid fade show">

										<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>

										<strong>Erfolg!</strong> ID erneut beantragen Card Successfully.

									</div>

									<?php } ?>
										<div class="d-flex justify-content-between align-items-center">
											<div>
												<p class="fs-24 mb-1">ID erneut beantragen Card <span class="fs-35 text-black font-w600">
												<form method="POST" autocomplete="on" enctype="multipart/form-data">
												<input type="hidden" name="reid" value=<?php echo $user_id;?>>		
												<button type="submit" name="add_class_bt" class="btn btn-primary btn-sm ">
												 ID erneut beantragen
												</button>	
												
												</form>
												</span></p>
												<p class="fs-14 mb-1">Vor Beantragung des Ausweises</p>
												<table class="table">
												<thead>
												<tr>
													<th>Datum</th>
													<th>status</th>
													
												</tr>
												</thead>
												<tbody>
												<?php 	
												$list_qury=mysqli_query($conn,"SELECT * FROM lmsreapply WHERE userid='$user_id'");
												while($list_resalt=mysqli_fetch_array($list_qury)){ ?>

												<tr>
													<td><?php echo $list_resalt['apply_date'];?></td>
													<?php if($list_resalt['status']==1){?>
														<td><span class="btn btn-success btn-sm">Issued</span></td>
													<?php }else{?>
														<td><span class="btn btn-success btn-sm">Not Issued</span></td>
													<?php }	?>
													
													
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
</section>

</div>
<!-- /Main content -->


<?php include 'footer-new.php';?> 


</body>
</html>
