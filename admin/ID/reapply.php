<?php

session_start();
$login_check=$_SESSION['role'];
if ($login_check!='admin') 
{
  header("location: index.php"); 
}


include '../includes/header.php';
global $conn;



if(isset($_GET['status'])&&isset($_GET['type'])){
	$status=mysqli_real_escape_string($conn,$_GET['status']);
	$type=mysqli_real_escape_string($conn,$_GET['type']);
	
	if($type==1){
		$update=0;
	}
	if($type==0){
		$update=1;
	}
	
	mysqli_query($conn,"UPDATE lmsreapply SET status='$update' WHERE userid='$status'");
	
	echo "<script>window.location='reapply.php';</script>";
}

?>

            
        <!--**********************************
            Sidebar end
        ***********************************-->
		
        <!--**********************************
            Content body start
        ***********************************-->
		<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        
					ID erneut beantragen
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
														<th>#</th>
														
														<th>Name</th>
                                                        <th>Issued ID</th>
														<th>Ausgestellt / Nicht ausgestellt</th>
														
													
													</tr>
												</thead>
												<tbody>
												<?php
												$count=0;
                                                 
												$tec_qury=mysqli_query($conn,"SELECT user.user_id, user.firstname, user.lastname, user.email, lmsreapply.status FROM user INNER JOIN lmsreapply ON user.user_id = lmsreapply.userid;");
												
												while($tec_resalt=mysqli_fetch_array($tec_qury)){
												$count++;
												?>
													<tr>
													<td><?php echo number_format($count,0); ?></td>

<td style="text-transform: capitalize;"><?php echo $tec_resalt['firstname']; ?>  <?php echo $tec_resalt['lastname']; ?></td>

<td style="white-space: nowrap">
<?php if($tec_resalt['status']==1){?>
    all ready issued

<?php }else{ ?>
    <a href="reapply.php?status=<?php echo $tec_resalt['user_id']; ?>&type=<?php echo $tec_resalt['status']; ?>" title="Issued ID" style="margin-right: 5px;" onClick="JavaScript:return confirm('Are you sure Issued ID?');" class="btn btn-sm btn-secondary"><i class="fa fa-lg fa-print" style="color: black;"></i></a>

<?php }  ?>
</td>
<td align="center">
<?php
if($tec_resalt['status']==1){
?>
<span class="btn btn-success btn-sm">Re Issued</span>
<?php
}
if($tec_resalt['status']==0){
?>
<span class="btn btn-primary btn-sm">Not Issued</span>
<?php
}
?>	
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