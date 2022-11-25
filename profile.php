<?php
include 'header.php';
include 'Functions.php';
$user_id = $_SESSION['user_id'];

$get_history_details = get_history_details($user_id);
 

if($_SESSION['language']=='en'){
    $translations['_enter_first_name_'] = ['Please enter first name.'];
    $translations['_enter_last_name_'] = ['Please enter last name.'];
    $translations['_enter_valid_phone_'] = ['Please enter Valid 10 Digit Phone Number.'];
    $translations['_enter_valid_alpha_'] = ['Please enter alphabet.'];
   
   
}else{
    $translations['_enter_first_name_'] = ['Bitte Vornamen eingeben.'];
    $translations['_enter_last_name_'] = ['Bitte Nachnamen eingeben.'];
    $translations['_enter_valid_phone_'] = ['Bitte geben Sie eine gültige 10-stellige Telefonnummer ein.'];
    $translations['_enter_valid_alpha_'] = ['Bitte Alphabet eingeben.'];
   
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
    <form method="post" id="edit_profile" action="GetPhpData.php" method="post" enctype="multipart/form-data">
    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>">
    	<input type="hidden" name="profile_pic" id="profile_pic">
    	<input type="hidden" name="image_type" id="image_type">
        <div class="row">
            <div class="col-md-3 show-on-desk">
                <div class="profile-img">
					<div class="midd-profile-09">
						<img id="image" alt="" />
					</div>
					<div class="file btn-lg btn-primary">
                        <?php echo $translation['_Change_Image_']?>
					    <input type="file" name="image_file" onchange="readURL(this);"  disabled/>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-head">
					<div class="show-on-mobile">
						<div class="profile-img">	
							<img id="image" alt="" />			
							<div class="file btn-lg btn-primary">
								<?php echo $translation['_Change_Image_']?>
								<input type="file" name="image_file"/  onchange="readURL(this);" >
							</div>
						</div>
						<div class="relative">
							<h5 id="username">
							<span class="profile-edit-btn dis_again"><i class="fa fa-edit" aria-hidde="true"></i></span>
							</h5>
							<h6 id='latest_plan'></h6>
							<span class="profile-edit-btn dis_again" id="show-m"> <i class="fa fa-edit"></i> </span>
						</div>
					</div>
					<div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $translation['_First_Name_']?></label>
									<input class="form-control" name="firstname" id="firstname" type="text" required>
								</div>
                            </div>
							<div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $translation['_Last_Name_']?></label>
									<input class="form-control" type="text" name="lastname" id="lastname" required>
								</div>
                            </div>
							<div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $translation['_Firmenname_']?></label>
									<input class="form-control" type="text" name="company_name" id="company_name" required>
								</div>
                            </div>
							<div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $translation['_email_title_']?></label>
									<input class="form-control" type="email" name="email" id="email" required>
								</div>
                            </div>
							<div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $translation['_Phone_title_']?></label>
									<input class="form-control" type="text" name="phone" id="phone" required>
								</div>
                            </div>
							<div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $translation['_Country_']?></label>
									<input class="form-control" type="text"  placeholder="Switzerland" value='Switzerland' name="country" disabled id="country" required>
								</div>
                            </div>
							<div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $translation['_Postleitzahl_']?></label>
									<input class="form-control" type="text" placeholder="" id="postcode" name="postcode"  required>
								</div>
                            </div>
							<div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $translation['_Street_']?></label>
									<input class="form-control" type="text" placeholder="<?php echo $translation['_Stree_house_number_']?>" name="street" id="street" required>
								</div>
                            </div>
							<div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $translation['_city_']?></label>
									<input class="form-control" type="text" placeholder="<?php echo $translation['_city_']?>" name="city" id="city" required>
								</div>
                            </div>
							<!-- <div class="col-sm-6">
								<div class="form-group">
									<label>Course Category</label>
									<input class="form-control" type="text" value="Motorcycle" disabled="">
								</div>
                            </div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Course Location</label>
									<input class="form-control" type="text" value="Resslimattstrasse 46, 5033 Buchs" disabled="">
								</div>
                            </div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Booking Date</label>
									<input class="form-control" type="text" value="11/07/2020" disabled="">
								</div>
                            </div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>$10/week</label>
									<input class="form-control" type="text" value="$10/week" disabled="">
								</div>
							</div> -->
							<div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
								<button class="save_custom_button" type="button" name="type" id="submit_form" value="edit_profile"><?php echo $translation['_save_changes_']?></button>
							</div>
                        </div>           
                    </div>
                </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</section>
<section class="TT8">
	<div class="container">
		<div class="emp-profile">
			<div class="d-flex justify-content-between flex-column inner-c-0">
				<h2><?php echo $translation['_Bookin_History_']?></h2>
				<?php if($get_history_details)
				{
					$current_time = time();


					?>
					<div class="table-cunst-01" id="history_detail">
						<?php foreach ($get_history_details as $key) 
						{
							//print_r($key);
							//print_r($key['course_start_date']);
							$course_start_date = $key['course_start_date'];
							$diff_course_start_date = strtotime('-2 day',$course_start_date);
						    //echo $current_time.' current_time ';
							//echo " ".$diff_course_start_date.' diff_course_start_date ';
							?>
							<div class="dyn-sec">
								<h6><?php echo $translation['_Transaktions_']?> <span><?php echo $key['transaction_id'];?></span> 
									<?php if($current_time<=$diff_course_start_date && !$key['remove_course_ids']){ ?>
								   <span class='btn-danger cancel' style="padding:5px 5px;margin:5px 5px;" id="<?=$key['id']?>">Cancel</span>
								</h6> 
								
								<?php } ?>
								<table>
									<tbody>
										<tr>
											<th><?php echo $translation['_Product_']?></th>
											<th><?php echo $translation['_Total2_']?></th>
											<th><?php echo $translation['_Cancel_Course_Action_']?></th>
										</tr>
										<?php 
										if($key['deleted_course_id'])
										{
											$course_id=$key['course_id'].','.$key['deleted_course_id'];
										}
										else
										{
											$course_id=$key['course_id'];
										}
										// var_dump($course_id);
										$get_multiple_course_detail = get_multiple_course_detail($course_id);
										foreach ($get_multiple_course_detail as $course_key) 
										{
											?>
											<tr>
												<td><?php echo $course_key['course_detail'];?> | <?php echo $course_key['c_date'];?> @ <?php echo $course_key['c_time'];?> - <?php echo $course_key['c_end_time'];?> | <?php echo $course_key['place'];?> × 1</td>
												<td>CHF <?php echo $course_key['price'];?></td>
												<!-- <?php if($current_time<=$diff_course_start_date){ ?>
												  <td><a class='btn-danger cancel' style="padding:10px 10px;" href="#" id="<?=$course_key['course_id']?>">Cancel</a></td>
											    <?php }else{
											    	?>
											    	 <td>N/A</td>
											    	<?php 
											    } ?> -->
											</tr>
											<?php
										}
										?>
										
									</tbody>
								</table>
							</div>
							<?php
						}
						?>
					</div>
					<?php
				}
				else 
				{
					?>
					<div class="table-cunst-01" id="no_history">
						<p><?php echo $translation['_Es_mussen_keine_']?></p>
					</div>
					<?php
				}
				?>

				
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
