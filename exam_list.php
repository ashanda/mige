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
<!-- /Main content -->


<?php include 'footer-new.php';?> 

<script>
var url = 'GetPhpData.php';
function readURL(input) {
var url = input.value;
var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#img').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
}
else{
     $('#img').attr('src', 'images/profile.jpg');
  }
}

$(document).ready(function(){ 

	$('.cancel').on('click',function(){
		  var stat = confirm('Are you sure you want to cancel this course?');
		  if(stat==true){
		  	 var billing_id = $(this).attr('id');

		  	 $.ajax({
		        url : 'GetPhpData.php',
		        type: "POST",
		        data: {billing_id:billing_id,type:'user_cancel_course'},
		        dataType: "JSON",
		        success: function(data)
		        {
		        	if(data.status==1)
		        	{
		        		alert(data.message);
		        		location.reload();
		        	}
		        	else
		        	{
		        		alert(data.message);
						
		        	}
		        },
		        error: function (jqXHR, textStatus, errorThrown)
		        {
		          window.location.href = 'profile.php';
		        }
		    });
		  }
	});

    //$('#user_id').val(sessionStorage.getItem("user_id"));
    var user_id = $('#user_id').val();
    if(user_id)
    {
	    $.ajax({
	        url : url,
	        type: "POST",
	        data: {user_id:user_id,type:'get_user_detail'},
	        dataType: "JSON",
	        success: function(data)
	        {
	            if(data.status==1)
	            {
	            	$('#firstname').val(data.data.firstname);
	            	$('#lastname').val(data.data.lastname);
	            	$('#email').val(data.data.email);
	            	$('#phone').val(data.data.phone);
	            	$('#image_type').val('image');
	            	$('#profile_pic').val(data.data.profile_pic);
	            	
	            	$('#postcode').val(data.data.postcode);
	            	$('#company_name').val(data.data.company_name);
	            	$('#phone').val(data.data.phone);
	            	$('#city').val(data.data.city);
	            	$('#country').val(data.data.country);
	            	$('#street').val(data.data.street);

	            	$('#country').prop('disabled',true);

	            	if(data.data.profile_pic)
	            	{
	            		$('#image').attr('src',data.data.profile_pic);
	            	}
	            	else
	            	{
	            		$('#image').attr('src','images/no_image_available.png');
	            	}
	            	$('#username').text(data.data.firstname+' '+data.data.lastname);
	            	$('#latest_plan').text('<?php echo $translation['_My_Plan_']?> : '+data.latest_plan);
	            }
	            else
	            {
	            	$('#firstname').val('');
	            	$('#lastname').val('');
	            	$('#email').val('');
	            	$('#phone').val('');
	            	$('#profile_pic').val(data.data.profile_pic);
	            	$('#image').attr('src','images/no_image_available.png');
	            	$('#username').text('');
	            }
	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	          window.location.href = 'login.php';
	        }
	    });
    }
    else
    {
    	window.location.href = 'login.php';
    }


    $('#submit_form').click(function(){
		var phone = $('#phone').val();
		var firstname = $('#firstname').val();
		var lastname = $('#lastname').val();
		var profile_pic = $('#profile_pic').val();
		var company_name = $('#company_name').val();
		var postcode = $('#postcode').val();
		var city = $('#city').val();
		var street = $('#street').val();

		var image_type = $('#image_type').val();
	    var filter = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

	    if(firstname==''||lastname=='')
	    {
	    	if(firstname=='')
			{
				alert('<?=$translations["_enter_first_name_"][0]?>');
				$('#firstname').focus(); 
			}
			else if(lastname=='')
			{
				alert('<?=$translations["_enter_last_name_"][0]?>');
				$('#firstname').focus(); 
			}
	    }
	    else if(!phone.match(filter))
	    {
	    	alert('<?=$translations["_enter_valid_phone_"][0]?>');
	    	$('#phone').focus(); 
	    }
	    else 
	    {
	    	$( "button, .file" ).hide();
		    $.ajax({
		        url : url,
		        type: "POST",
		        data: {firstname:firstname,lastname:lastname,image_type:image_type,profile_pic:profile_pic,user_id:user_id,phone:phone,company_name:company_name,postcode:postcode,city:city,street:street,type:'edit_profile'},
		        dataType: "JSON",
		        success: function(data)
		        {
		        	alert(data.message);
		        	if(data.status==1)
		        	{
		        		$( "input" ).prop('disabled',true).css( "cursor","not-allowed");
		        		$('.profile-edit-btn').addClass('dis_again');
		        	}
		        	else
		        	{
						$( "button, .file" ).show();
		        	}
		        },
		        error: function (jqXHR, textStatus, errorThrown)
		        {
		            alert(textStatus);
		            $( "button, .file" ).show();
		        }
		    });
	    }
	});
});
$('#firstname').keypress(function (e) {
    //var regex = new RegExp("^[a-zA-Z]+$");
    var regex = new RegExp("^[a-zA-Z ]*$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    else
    {
    e.preventDefault();
    alert('<?=$translations["_enter_valid_alpha_"][0]?>');
    return false;
    }
});
//Validate last name as charcater
$('#lastname').keypress(function (e) {
    //var regex = new RegExp("^[a-zA-Z]+$");
    var regex = new RegExp("^[a-zA-Z ]*$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    else
    {
    e.preventDefault();
    alert('<?=$translations["_enter_valid_alpha_"][0]?>');
    return false;
    }
});



</script>


<script>
	$( "button, .file" ).hide();
	$( "input" ).prop('disabled',true).css( "cursor","not-allowed");
	 $('.profile-edit-btn').click(function(){ // click to
            
			if($('.profile-edit-btn').hasClass('dis_again'))
			{
				$('.form-control, input').prop('disabled',false).css("cursor","pointer"); // removing disabled in this class
				$('input#email').prop('disabled',true).css({"cursor":"not-allowed"});
				$('input#country').prop('disabled',true).css({"cursor":"not-allowed"});
				$( "button, .file" ).show();
				$('.profile-edit-btn').removeClass('dis_again')
			}
			else
			{
				$('.form-control, input').prop('disabled',true).css({"cursor":"not-allowed"}); // removing disabled in this class
				//$( "button, .file" ).prop( "disabled", true ).css({"opacity":".5", "cursor":"not-allowed"});
				$( "button, .file" ).hide();
				$('.profile-edit-btn').addClass('dis_again');
			}
			
	 });

	 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image')
                    .attr('src', e.target.result)
                    .height(200);
                $('#profile_pic').val(e.target.result);
                $('#image_type').val('base64');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
	 /*$('.dis_again').click(function(){
		$('.form-control').prop('disabled',true).css("cursor","not-allowed"); 
		$('.profile-edit-btn').removeClass('dis_again');
	 });*/
</script>
</body>
</html>
