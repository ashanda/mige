<?php
include 'header.php';
$current_time=time();
$id=$_SESSION['id'];
$cid=$_REQUEST['course_id'];
$get_all_courses =  get_billing_course_detailv2($cid);
//var_dump($get_all_courses);
// $attendance_detail=get_student_attendance_detail_by_course_id($cid,$get_all_courses[0]['user_id']);
// var_dump($attendance_detail);
$count = count($get_all_courses);
include('../includes/pagination.php');
$records=array_slice($get_all_courses, $start,$limit);

?>
<style type="text/css">
    body{font-size: 14px;font-weight: 300;}
  /*.stuid{
  display: inline;
  color:black;
  position: relative;
  top:200px;
}*/

/*.stuid:hover:after{
    background: grey;
    border-radius: 5px;
    color: #fff;
    content: attr(title);
    left: 20%;
    padding: 5px 15px;
    position: absolute;
    top: -53px;
    width: 163px;
}*/

/*.stuid:hover:before{
  border:solid;
  border-color: #333 transparent;
  border-width: 6px 6px 0px 6px;
  bottom: 20px;
  content: "";
  left: 50%;
  position: absolute;
  z-index: 99;
}*/

body {
  font: 14px/20px 'Helvetica Neue', Helvetica, Arial, sans-serif;
  color: #404040;
  background: white;
  font-weight:300;
}

.container {
  margin: 50px auto;
  width: 280px;
  text-align: center;
}
.container > .switch {
  display: block;
  margin: 12px auto;
}

.switch {
  position: relative;
  display: inline-block;
  vertical-align: top;
  width: 56px;
  height: 20px;
  padding: 3px;
  background-color: white;
  border-radius: 18px;
  box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
  cursor: pointer;
  background-image: -webkit-linear-gradient(top, #eeeeee, white 25px);
  background-image: -moz-linear-gradient(top, #eeeeee, white 25px);
  background-image: -o-linear-gradient(top, #eeeeee, white 25px);
  background-image: linear-gradient(to bottom, #eeeeee, white 25px);
}

.switch-input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.switch-label {
  position: relative;
  display: block;
  height: inherit;
  font-size: 10px;
  text-transform: uppercase;
  background: #272c33;
  border-radius: inherit;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
  -webkit-transition: 0.15s ease-out;
  -moz-transition: 0.15s ease-out;
  -o-transition: 0.15s ease-out;
  transition: 0.15s ease-out;
  -webkit-transition-property: opacity background;
  -moz-transition-property: opacity background;
  -o-transition-property: opacity background;
  transition-property: opacity background;
}
.switch-label:before, .switch-label:after {
  position: absolute;
  top: 50%;
  margin-top: -.5em;
  line-height: 1;
  -webkit-transition: inherit;
  -moz-transition: inherit;
  -o-transition: inherit;
  transition: inherit;
}
.switch-label:before {
  content: attr(data-off);
  right: 11px;
  color: #aaa;
  text-shadow: 0 1px rgba(255, 255, 255, 0.5);
}
.switch-label:after {
  content: attr(data-on);
  left: 11px;
  color: white;
  text-shadow: 0 1px rgba(0, 0, 0, 0.2);
  opacity: 0;
}
.switch-input:checked ~ .switch-label {
  background: #da3732;
  width: 80px;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
}
.switch-input:checked ~ .switch-label:before {
  opacity: 0;
}
.switch-input:checked ~ .switch-label:after {
  opacity: 1;
}

.switch-handle {
  position: absolute;
  top: 4px;
  left: 4px;
  width: 18px;
  height: 18px;
  background: white;
  border-radius: 10px;
  box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
  background-image: -webkit-linear-gradient(top, white 40%, #f0f0f0);
  background-image: -moz-linear-gradient(top, white 40%, #f0f0f0);
  background-image: -o-linear-gradient(top, white 40%, #f0f0f0);
  background-image: linear-gradient(to bottom, white 40%, #f0f0f0);
  -webkit-transition: left 0.15s ease-out;
  -moz-transition: left 0.15s ease-out;
  -o-transition: left 0.15s ease-out;
  transition: left 0.15s ease-out;
}
.switch-handle:before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -6px 0 0 -6px;
  width: 12px;
  height: 12px;
  background: #f9f9f9;
  border-radius: 6px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
  background-image: -webkit-linear-gradient(top, #eeeeee, white);
  background-image: -moz-linear-gradient(top, #eeeeee, white);
  background-image: -o-linear-gradient(top, #eeeeee, white);
  background-image: linear-gradient(to bottom, #eeeeee, white);
}
.switch-input:checked ~ .switch-handle {
  left: 65px;
  box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
}

.switch-green > .switch-input:checked ~ .switch-label {
  background: #da3732;
}
</style>
<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-th-list"></i>
                       Student Detail
                    </h4>
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
                                             <th>Student Name</th>
                                             <th>Phone No.</th>
                                             <th>Total Price</th>
                                             <th>Payment Type</th>
                                             <th>Payment Status</th>
                                             <th>Attendance</th>
                                            
                                            <!-- <th>Number Of Slots</th> -->
                                           <!--  <th>Action</th> -->
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($records as $key) 
                                        {
                                            $id=$key['id'];
                                            $s_num = $key['s_num'];
                                            $attendance_detail=get_student_attendance_detail_by_course_id($cid,$key['user_id']);
                                        ?>

                                            <tr class="user_detail" >
                                            <!-- <input type="hidden" id="stuid" value="<?php echo $key['id'];?>"> -->
                                               <td><?php echo $s_num;?></td>
                                                 <!-- <td><?php echo $key['user_id'];?></td> -->
                                               <td><?php echo $key['firstname'].' '. $key['lastname'] ;?></td>
                                               <td><?php echo $key['phone'];?></td>
                                               <td><?php echo $key['total_price'];?></td>
                                               <td><?php echo $key['payment_type'];?></td>
                                              <!--  <td><?php if($key['payment_status']==0) {echo "pending";} elseif($key['payment_status']==1){echo "paid";}?></td> 
                                               <td><?php if($attendance_detail[0]['attendance_status']==0) {echo "--";} elseif($attendance_detail[0]['attendance_status']==1){echo "Present";}elseif($attendance_detail[0]['attendance_status']==2){echo "Absent";}?></td> 
                                              
                                               -->
                                                <td>  <label class="switch">
                                                  <input type="checkbox" class="switch-input stuid"  id="<?php echo $id;?>-<?php echo $key['user_id']?>"  name="payment_status"  data-toggle="toggle" data-on="On" data-off="Off" <?php if($attendance_detail[0]['payment_status']=='1'){echo 'checked';}?>/>
                                                     <span class="switch-label" data-on="<?php if($attendance_detail[0]['payment_status']=='1'){echo 'paid';}?>"/></span>
                                                   <span class="switch-handle"></span>
                                                    </label></td>
                                                  
                                                    <td> <label class="switch">
                                                  <input type="checkbox" class="switch-input user_id"  id="<?php echo $id;?>-<?php echo $key['user_id']?>" name="attendance_status" data-toggle="toggle" data-on="On" data-off="Off" <?php if($attendance_detail[0]['attendance_status']=='1'){echo 'checked';}?>/>
                                                     <span class="switch-label" data-on="<?php if($attendance_detail[0]['attendance_status']=='1'){echo 'presenr';}?>"/></span>
                                                   <span class="switch-handle"></span>
                                                    </label></td>
                                         <!--   <td>
                                                 <a href="#" title="Update Payment"  data-toggle="modal" data-target="#myModal" class="stuid" id="<?php echo $key['id'];?>"><i class="icon-payment mr-3 iconspace"></i></a>


                                                 <a href="#" title="Update Attendance"  data-toggle="modal" data-target="#attendanceModal" class="user_id" id="<?php echo $key['user_id'];?>"><i class="icon-clipboard-edit2 mr-3 iconspace"></i></a>
                                             
                                             </td>  -->
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
                      
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- 
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Edit Payment Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
        <form method="post">
           <input type="hidden"  id="test4">
       <p style="color: black">Select Payment Status: </p>
        Paid <input type="radio" name="payment_status" id="payment_status" value="1">
        Pending <input type="radio" name="payment_status" id="payment_status" value="0">
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-lg" id="submitBtn" data-dismiss="modal">Submit</button>
      </div>
    </div>

  </div>
</div>


<div id="attendanceModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Edit Student Attendance</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
        <form method="post">
          <input type="hidden" name="user_id" id="test3">
       <p style="color: black">Mark Attendance: </p>
        Present <input type="radio" name="attendance_status" id="attendance_status" value="1">
        Absent <input type="radio" name="attendance_status" id="attendance_status" value="2">
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-lg" id="attendanceBtn" data-dismiss="modal">Submit</button>
      </div>
    </div>

  </div>
</div> -->
<?php
include '../includes/footer.php';
?>

<script type="text/javascript">
  $(document).ready(function(){
   $('.stuid').click(function(){
  
  var mode= $(this).prop('checked');
  if(mode==true)
  {
    var payment_status='1';
    // $('.switch-label').attr('data-on',"Paid");
  }
  else if(mode==false){
     var payment_status='0';
     // $('.switch-label').attr('data-off',"N/A");
  }
  var course_id = '<?php echo $_REQUEST['course_id'];?>';
  var booked_id = $(this).attr('id');
 
   var ids = booked_id.split('-');
   var booked_id = ids[0];
    var student_id = ids[1];
    
   // console.log(id+' id ');
  /*  console.log(student_id+' student_id ');
    console.log(booked_id+' booked_id ');
    console.log(course_id+' course_id ');
    console.log(payment_status+' payment_status ');
*/


       $.ajax({
       url: 'EditPayment.php',
       type: 'POST',
       data: {payment_status:payment_status,course_id:course_id,booked_id:booked_id,student_id:student_id,type:1},
       // dataType:"JSON",
       success: function(data) {
        console.log(data);
         var json = $.parseJSON(data);
           console.log(json.status);
       if(json.status==1){
              location.reload();  
            // alert('payment status update successfully!');

        }
        else{
          alert('Something went wrong!')
        }
        
        }
        });
  });  
  $('.user_id').click(function(){
  var mode= $(this).prop('checked');
  if(mode==true)
  {
    var attendance_status='1';
    // $('.switch-label').attr('data-on',"P");
  }
  else if(mode==false){
     var attendance_status='2';
     // $('.switch-label').attr('data-off',"A");
  }
  // console.log('attendance'+attendance_status);
 
  var course_id = '<?php echo $_REQUEST['course_id'];?>';
  var booked_id = $(this).attr('id');
 
   var ids = booked_id.split('-');
   var booked_id = ids[0];
    var student_id = ids[1];
 
         $.ajax({
           url: 'EditPayment.php',
           type: 'POST',
           data: {attendance_status: attendance_status,course_id:course_id,student_id:student_id,type:2},
           // dataType:"JSON",
           success: function(data) {
           var json = $.parseJSON(data);
        if(json.status==1){
                  location.reload();  
                  // alert('Attendance marked successfully!');

            }
            else{
                // alert('Something went wrong!')
            }
            
            }
  });
});
});

</script>