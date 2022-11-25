<?php
include '../includes/header.php';
$course_id=$_REQUEST['id'];
function get_booked_course_detail_by_course_ids($course_id,$isRemoved)
{

    global $conn;
    $q['query'] = "SELECT * FROM `booked_course_history` WHERE course_id='$course_id' AND isRemoved='$isRemoved'"; 
    $q['run'] = $conn->query($q['query']);
     $all_details =array();
    if ($q['run']->num_rows > 0)
    {
        $i = 0;
        while ($q['result'] = $q['run']->fetch_assoc())
        {  
    
        $i = ++$i;
        $q['result']['s_num'] = $i;
           
            array_push($all_details, $q['result']);
        }
    }
    return $all_details;

}
$booked_course=get_booked_course_detail_by_course_ids($course_id,0);
 $count = count($booked_course);
include('../includes/pagination.php');
/*$start = 1;
$limit = 20;*/
$records=array_slice($booked_course, $start,$limit);
$course_detail=get_course_detail_by_couse_id($course_id);
$Amount=$course_detail[0]['price'];

?>
<style type="text/css">
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
}

article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section {
  display: block;
}

body {
  line-height: 1;
}

ol, ul {
  list-style: none;
}

blockquote, q {
  quotes: none;
}

blockquote:before, blockquote:after,
q:before, q:after {
  content: '';
  content: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

.about {
  margin: 70px auto 40px;
  padding: 8px;
  width: 260px;
  font: 10px/18px 'Lucida Grande', Arial, sans-serif;
  color: #bbb;
  text-align: center;
  text-shadow: 0 -1px rgba(0, 0, 0, 0.3);
  background: #383838;
  background: rgba(34, 34, 34, 0.8);
  border-radius: 4px;
  background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3));
  background-image: -moz-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3));
  background-image: -o-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3));
  background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3));
  -webkit-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.2), 0 0 6px rgba(0, 0, 0, 0.4);
  box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.2), 0 0 6px rgba(0, 0, 0, 0.4);
}
.about a {
  color: #eee;
  text-decoration: none;
  border-radius: 2px;
  -webkit-transition: background 0.1s;
  -moz-transition: background 0.1s;
  -o-transition: background 0.1s;
  transition: background 0.1s;
}
.about a:hover {
  text-decoration: none;
  background: #555;
  background: rgba(255, 255, 255, 0.15);
}

.about-links {
  height: 30px;
}
.about-links > a {
  float: left;
  width: 50%;
  line-height: 30px;
  font-size: 12px;
}

.about-author {
  margin-top: 5px;
}
.about-author > a {
  padding: 1px 3px;
  margin: 0 -1px;
}

/*
 * Copyright (c) 2013 Thibaut Courouble
 * http://www.cssflow.com
 *
 * Licensed under the MIT License:
 * https://www.opensource.org/licenses/mit-license.php
 */
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
  left: 40px;
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
                       Student Details
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
                                <form method="post">
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                        <tr class="no-b">
                                            <th>SNo</th>
                                            <th>Username</th>
                                            <th>Phone No.</th>
                                            <th>Payment Type</th>
                                            <th>Payment Status</th>
                                            <th>Attendance</th>
                                            <th>Amount</th>
                                            <?php// if($course_detail[0]['refund']=='1'){?>
                                            <th>Action</th>
                                        <?php //}?>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($records as $key) 
                                        {   
                                            $id=$key['id'];
                                          //  print_r($key);die;
                                            $s_num = $key['s_num'];
                                            $user_id=$key['user_id'];
                                            $user_detail=get_user_detail_by_id($user_id);
                                            if($user_detail[0]['firstname']==""){
                                                $Username=$user_detail[0]['email'];
                                            }
                                            else{
                                               $Username= $user_detail[0]['firstname'].' '.$user_detail[0]['lastname'];
                                            }
                                            // var_dump($user_detail);
                                            $billing_detail=get_billing_detail_by_booked_id($id);
                                            $phone=$user_detail[0]['phone'];
                                            $billing_id=$billing_detail[0]['id'];
                                            $transaction_id=$billing_detail[0]['transaction_id'];
                                            $refund_detail=get_refund_detail_by_id($user_id,$course_id);
                                            $payment_type=$billing_detail[0]['payment_type'];
                                            $remove_array=get_removed_course_details_by_id($course_id,$user_id,$billing_id,$course_id);
                                           
                                            ?>
                                            <tr>
                                                <td><?php echo $s_num;?></td>
                                                <td><?php echo $Username;?></td>
                                                <td><?php echo $phone;?></td>
                                                <td>
                                                    <?php echo $payment_type;?></td>
                                                     <!-- <td><?php if($key['payment_status']==0) {echo "pending";} elseif($key['payment_status']==1){echo "paid";}?></td> -->
                                                     <td>  <label class="switch">
                                                  <input type="checkbox" class="switch-input stuid"  id="<?php echo $id;?>"  name="payment_status"  data-toggle="toggle" data-on="On" data-off="Off" <?php if($key['payment_status']=='1'){echo 'checked';}?>/>
                                                     <span class="switch-label" data-on="<?php if($key['payment_status']=='1'){echo 'paid';}?>"/></span>
                                                   <span class="switch-handle"></span>
                                                    </label></td>
                                                  
                                                    <td> <label class="switch">
                                                  <input type="checkbox" class="switch-input user_id"  id="<?php echo $id;?>" name="attendance_status" data-toggle="toggle" data-on="On" data-off="Off" <?php if($key['attendance_status']=='1'){echo 'checked';}?>/>
                                                     <span class="switch-label" data-on="<?php if($key['attendance_status']=='1'){echo 'presenr';}?>"/></span>
                                                   <span class="switch-handle"></span>
                                                    </label></td>
                                                <td><?php echo $Amount;?></td>
                                                
                                                <td>
                                                  <?php
                                                
                                                  if($remove_array[0]['remove_course_ids']==""){?>
                                                   <!-- <button class="btn btn-primary" type="button" id="remove" onclick="remove_course('<?php echo $user_id;?>','<?php echo $course_id;?>','<?php echo $billing_id;?>')"><i class="icon icon-remove" alt="remove" ></i></button> -->

                                                    <a href="#" id="remove" title="Remove user from course" onclick="remove_course('<?php echo $user_id;?>','<?php echo $course_id;?>','<?php echo $billing_id;?>')"><i class="icon-user-times mr-3 iconspace"></i></a>
                                                    <?php }else{ ?>
                                                     <a href="#" id="remove" title="Remove user from course" onclick="return alert('This course is currently active you cannot remove this user.')" disabled=""><i class="icon-user-times mr-3 iconspace"></i></a>
                                                  <!--  <button  class="btn btn-primary" type="button" id="remove" onclick="return alert('This course is currently active you cannot remove this user.')" disabled=""><i class="icon icon-remove" alt="remove" ></i></button> -->
                                                 <?php } ?>
                                              
                                                    <?php

                                                     $refund_detail=get_refund_detail_by_id($user_id,$course_id);
                                                 /*  <a href="#" id="refund" title="Refund" onclick="refund_amount('<?php echo $transaction_id?>','<?php echo $Amount;?>','<?php echo $user_id;?>','<?php echo $course_id;?>');"><i class="icon-settings_backup_restore"></i></a>*/

                                                    if($key['amount_refund']==1){
                                                      ?>

                                                     <!--  <a href="#" id="refund" title="Refund" onclick="refund_amount('<?php echo $transaction_id?>','<?php echo $Amount;?>','<?php echo $user_id;?>','<?php echo $course_id;?>','<?=$key["id"]?>');"><i class="icon-settings_backup_restore"></i></a> -->
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
  function remove_course(user_id,course_id,id){
     if(confirm('Are you sure to remove this user?'))
    {
       $.ajax({
        url : 'Remove.php',
        type: "POST",
        data: {user_id:user_id,course_id:course_id,id:id},
        // dataType: "JSON",
        success: function(data)
        {
            // console.log(data);
            if(data==1){
                  location.reload();  

                alert('User removed for this course!');

            }
            else{
                alert('Something went wrong!')
            }
        
        }
      });
   }

  }
    function refund_amount(transaction_id,Amount,user_id,course_id,id){
    
   
    var url = "https://fahrschulestar.ch/sendPaymentWithTwint.php";
    $.ajax({
          url : url,
          type: "POST",
          data: {'amount':Amount,'url':"admin"},
          dataType: "JSON",
          success: function(data)
          {
              console.log(data.transactionID);
              console.log(id);

              var url = "course_twint_refund.php";
              $.ajax({
                    url : url,
                    type: "POST",
                    data: {'id':id,'transaction_id':data.transactionID},
                    dataType: "JSON",
                    success: function(newdata)
                    {
                        window.open('https://pay.datatrans.com/v1/start/'+data.transactionID,'_blank');  
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                      alert('Something went wrong, please try again later.');
                    }
                    })



             
             
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
             alert('Something went wrong, please try again later.');
          }
          })


    }
</script>
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
  var course_id = '<?php echo $_REQUEST['id'];?>';
  var id = $(this).attr('id');
  
        $.ajax({
           url: 'GetData.php',
           type: 'POST',
           data: {course_id:course_id,id:id,payment_status:payment_status,type:"payment_status"},
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
                // alert('Something went wrong!')
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
  var course_id = '<?php echo $_REQUEST['id'];?>';
  var id = $(this).attr('id');
  
        $.ajax({
           url: 'GetData.php',
           type: 'POST',
           data: {course_id:course_id,id:id,attendance_status:attendance_status,type:"attendance_status"},
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