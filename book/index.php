<?php
include '../header.php';
include '../Functions.php';

$get_all_categories = get_all_categories();
$get_location_list = get_location_list();

function get_location_list_by_id()
{
	global $conn;
	$q['query'] = "SELECT * FROM tbl_location WHERE id='1' ORDER BY creation_time ASC";
	$q['run'] = $conn->query($q['query']);
    $q['result'] = array();
    $i = 0;
    while ($c=$q['run']->fetch_assoc()) 
    {
    	$i = ++$i;
    	$c['s_num'] = $i;
    	array_push($q['result'], $c);
    }
    return $q['result'];
}
?>  
  <!--Contact info-->
  <section class="contact-info">
      <div class="row no-margin">  
            
  		<div class="col-md-12 no-padding">
           <div class="register-image banner-regitration"><h2><?php echo $translation['_Resgistration_Title_']?></h2></div>
        </div>  
      </div>
  </section> 
  <!--/Contact info-->

  <!--Contact form-->
  <section class="contact-form">
	<div class="container">
      <div class="row">
  		<div class="col-md-12 col-sm-12 no-padding animatedParent">
            <!--Contact text wrapper-->
        	<div class="contact-text-wrapper" style="padding:90px; padding-bottom:0px;" id="rgster">
                <!--Contact text-->
                <div class="text contact-text">
                    <h2><?php echo $translation['_BooK_Your_course_Title_']?></h2>
                </div>
                <!--/Contact text-->
				<div id="register-form">
					<form class="registration-form">
						<div class="top-active-tabs">
							<ul>
								<li class="active" id="sh-step1"><a href="#"><span class="count">1</span><span><?php echo $translation['_Course_Category_Title_']?></span></a></li>
								<li id="sh-step2"><a href="#"><span class="count">2</span><span><?php echo $translation['_Course_Location_Title_']?></span></a></li>
								<li id="sh-step3" ><a href="#"><span class="count">3</span><span><?php echo $translation['_Courses_Title_']?></span></a></li>
								<li id="sh-step4" ><a href="#"><span class="count">4</span><span><?php echo $translation['_Review_Title_']?></span></a></li>
								<!--li id="sh-step5" ><a href="#"><span class="count">5</span><span>Booking</span></a></li-->
							</ul>
						</div>
						<div id="step1" class="active">
							<h4><?php echo $translation['_Select_Course_Title_']?></h4>
							<div class="cate">
								<ul>
									<?php foreach ($get_all_categories as $key) 
									{
										?>
										<li id="category<?php echo $key['category_id'];?>" type="button" value="<?php echo $key['category_id'];?>" ><span><i class="<?php echo $key['class_icon'];?>" aria-hidden="true"></i><?php echo $key['name'];?></span></li>
										<?php
									}
									?>
								</ul>
							</div>
							<div class="motor-cate animated bounceInLeft slow" id="sub_cat_div">
							</div>
						</div>
						
						<div id="step2" class="animated bounceInRight slow">
							<h4><?php echo $translation['_2_select_title_']?></h4>
							  <div  class="adress" id="all_location">
							<ul class="locationul"></ul>
							</div>
							<!-- <div class="adress">
								<ul>
									<?php foreach ($get_location_list as $key) 
									{
										?>
										<li id="location<?php echo $key['id'];?>" value="<?php echo $key['id'];?>">
											<h5><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $key['location_detail'];?></h5>
											<p><?php echo $key['location_name'];?></p>
										</li>
										<?php
									}
									?>
								</ul>
							</div> -->
							<div class="bottom-buttons">
								<a type="button" class="btns back-button" type="button" id="back-category"><?php echo $translation['_back_title_']?></a>
								<a type="button" class="btns next-button adddisable" type="button"  id="location-done"><?php echo $translation['_continue_Title_']?></a>
							</div>
						</div>
						<div id="step3" class="animated growIn slow">
							<h4><?php echo $translation['_3_choose_your_title_']?></h4>
							<div class="couses-sel" id="courses_div">
								<input type="hidden" name="page_no" id='page_no' value="1">
								<input type="hidden" name="per_page" id='per_page' value="2">
							</div>
							<div class="bottom-buttons">
								<a href="#" class="btns back-button" id="back-location" type="button" ><?php echo $translation['_back_title_']?></a>
								<a href="#" class="btns next-button adddisable" style="display: none;" id="course-done"><?php echo $translation['_continue_Title_']?></a>
							</div>							
						</div>
						<div id="step4" class="animated bounceInRight slow">
							<h4><?php echo $translation['_4_review_title_']?></h4>
							<div class="booking-details">
								<div class="book-det" id="review_div1">
								</div>
								<div class="book-det" id="review_div2">
								</div>
								<div class="book-det" id="review_div3">
									<h5><?php echo $translation['_3_you_cour_tile_']?></h5>
								</div>
							</div>
							<div class="bottom-buttons">
								<a href="#" class="btns back-button" id="back-course" type="button" ><?php echo $translation['_back_title_']?></a>
								<a href="<?=$config['base_url']?>/booking-page-form.php" class="btns next-button adddisable" id="review-done" type="button" ><?php echo $translation['_continue_Title_']?></a>
							</div>
						</div>
						<!--div id="step5" class="animated bounceInRight slow">
							<h4>Billing Details</h4>
							<div class="booking-details">
								<div class="book-det for0-m">
									<div class="form-group">
										<h5>First name <span>*</span> </h5>
										<p><input class="form-control" type="text"></p>
									</div>
									<div class="form-group">
										<h5>Surname <span>*</span> </h5>
										<p><input class="form-control" type="text"></p>
									</div>
									<div class="form-group">
										<h5>Company name  (optional)</h5>
										<p><input class="form-control" type="text"></p>
									</div>
									<div class="form-group">
										<h5>Country <span>*</span></h5>
										<p><input class="form-control" type="text" placeholder="Switzerland" disabled></p>
									</div>
									<div class="form-group">
										<h5>Postcode <span>*</span> </h5>
										<p><input class="form-control" type="text" placeholder=""></p>
									</div>
									<div class="form-group">
										<h5>Phone <span>*</span> </h5>
										<p><input class="form-control" type="text" placeholder=""></p>
									</div>
									<div class="form-group w-full">
										<h5>Street <span>*</span> </h5>
										<p><input class="form-control" type="text" placeholder="Street name and house number"></p>
									</div>
									<div class="form-group">
										<h5>Email address <span>*</span> </h5>
										<p><input class="form-control" type="email" placeholder=""></p>
									</div>
									<div class="form-group">
										<h5>Create account passsword <span>*</span> </h5>
										<p><input class="form-control" type="password" placeholder=""></p>
									</div>
								</div>

							</div>
							<h4>Additional information</h4>
							<div class="booking-details">
								<div class="book-det for0-m">
									<div class="form-group w-full">
										<h5>Notes on the order  (optional)</h5>
										<p><textarea  class="form-control"  placeholder="comment on your order, e.g special instructions for delivery" class="st-textarea"></textarea></p>
									</div>
								</div>

							</div>
							<div class="bottom-buttons">
								<a href="#" class="btns back-button" id="back-review">Back</a>
								<a href="#" class="btns next-button adddisable">Book</a>
							</div>
						</div-->
					</form>					
				</div>
            </div>
            <!--/Contact text wrapper-->                                 
        </div>
        </div>
      </div>
  </section> 
  <!--Contact form-->
       
</div>
<input type="hidden" name="final_category_id" id="final_category_id">
<input type="hidden" name="final_subcategory_id" id="final_subcategory_id">
<input type="hidden" name="final_location_id[]" id="final_location_id">
<input type="hidden" name="final_course_id" id="final_course_id">
<input type="hidden" name="select_course_type" id="select_course_type">
<input type="hidden" name="nextDateEnabled" id="nextDateEnabled">
<input type="hidden" name="totalPartsForSeeMore" id="totalPartsForSeeMore">
<?php include '../footer-new.php';?>

<script type="text/javascript">
var page_no;
var per_page;
$(document).ready(function(){
	sessionStorage.setItem("final_course_id",'');
});

var location_arr = new Array();
var course_arr = {};

jQuery(".cate li").click(function(){
    jQuery(this).addClass("active").siblings().removeClass("active");
	
});

$(".sub-cate , .cate li").click(function(){
	var category = $(this).attr('id');
	var category_id = $('#'+category).val();

	$('#final_category_id').val(category_id);
	jQuery(".motor-cate").removeClass("show");
	var url = '<?=$config['base_url']?>/GetPhpData.php';
    $.ajax({
		url : url,
		type: "POST",
		data: {id:category_id,type:'get_sub_category'},
		dataType: "JSON",
		success: function(data)
		{
		//alert(data);
		// console.log(data);
		    if(data.status==1)
		    {
		    	jQuery(".motor-cate").addClass("show");

				$('#sub_cat_div').html('');
		    	$.each(data.data, function(key, value) {
		    		$(".motor-cate").append('<div class="sub-cate" id="sub_category'+value.id+'" value="'+value.id+'"><div class="img-side subcat-icon"><i class="'+value['subcat_icon']+'" aria-hidden="true"></i></div><div class="mot-des"><h5>'+value.name+'</h5><p>'+value.description+'</p></div></div>');
		    	});
		    	$(".sub-cate").click(function(){
						var subcategory = $(this).attr('id');
						var subcategory_id = document.getElementById(subcategory).getAttribute("value");
						// console.log('kkkk'+subcategory_id);
						$('#final_subcategory_id').val(subcategory_id);
						$(this).addClass("active").siblings().removeClass("active");
						  $('div#step2').removeClass();
						$('div#step2').addClass("cat_"+category_id);
					    var step2=$("div#step2").show();
					    if(step2){
			    	     step2s();
			             }
						$("div#step1").hide();
						$("li#sh-step2").addClass("active");
					});
		    }
		    else
		    {
		    	$('#subcategory_id').val('');
		    	$('#final_subcategory_id').val('');
		    	$(this).addClass("active");
		    	    $('div#step2').removeClass();
                $('div#step2').addClass("cat_"+category_id);
			    var step2= $("div#step2").show();
			    if(step2){
			    	step2s();
			    }
				$("div#sub_cat_div").removeClass("show");
				$("div#step3").hide();
				$("div#step4").hide();
				$("div#step1").hide();
				$("div#step5").hide();
				$("li#sh-step2").addClass("active");
		    }
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		  alert(textStatus);
		}
	});
});


$(document).ready(function(){
	
	var category ='<?php echo $_REQUEST['id'];?>';
if(category!=""){
	var category_id = $('#'+category).val();
	$('#final_category_id').val(category);
	jQuery(".motor-cate").removeClass("show");
	var url = '<?=$config['base_url']?>/GetPhpData.php';
    $.ajax({
		url : url,
		type: "POST",
		data: {id:category,type:'get_sub_category'},
		dataType: "JSON",
		success: function(data)
		{		
		    if(data.status==1)
		    {
		    	jQuery(".motor-cate").addClass("show");

				$('#sub_cat_div').html('');
				  jQuery('.cate ul li#category'+category).addClass("active");
		    	$.each(data.data, function(key, value) {
		    		$(".motor-cate").append('<div class="sub-cate" id="sub_category'+value.id+'" value="'+value.id+'"><div class="img-side subcat-icon"><i class="'+value['subcat_icon']+'" aria-hidden="true"></i></div><div class="mot-des"><h5>'+value.name+'</h5><p>'+value.description+'</p></div></div>');
		    	});
		    	$(".sub-cate").click(function(){
						var subcategory = $(this).attr('id');
						var subcategory_id = document.getElementById(subcategory).getAttribute("value");
						$('#final_subcategory_id').val(subcategory_id);
						$(this).addClass("active").siblings().removeClass("active");
						  // $('div#step2').removeClass();
						$('div#step2').addClass("cat_"+category);
					    var step2=$("div#step2").show();
					    if(step2){
			    	    step2s();
			            }
						$("div#step1").hide();
						$("li#sh-step2").addClass("active");
					});
		    }
		    else
		    {
		    	$('#subcategory_id').val('');
		    	// $(this).addClass("active");
		    	  jQuery('.cate ul li#category'+category).addClass("active");
		    	    // $('div#step2').removeClass();
		    	$('div#step2').addClass("cat_"+category);
			    var step2= $("div#step2").show();
			    if(step2){
		    	    step2s();
		        }
				$("div#sub_cat_div").removeClass("show");
				$("div#step3").hide();
				$("div#step4").hide();
				$("div#step1").hide();
				$("div#step5").hide();
				$("li#sh-step2").addClass("active");
		    }
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		  alert(textStatus);
		}
	});
}
});


		    	
//   $(".adress li").click(function(){
// 	$(this).toggleClass("active");
// 	var location = $(this).attr('id');
// 	var location_id = $('#'+location).val();
	
// 	if($(this).hasClass("active"))
// 	{
// 		location_arr.push(location_id);
// 	}
// 	else
// 	{
// 		location_arr = jQuery.grep(location_arr, function(value) {
// 		  return value != location_id;
// 		});
// 	}
// 	// console.log(location_arr);
// 	if(location_arr.length==0)
// 	{
// 		$('#location-done').addClass("adddisable");
// 	}
// 	else
// 	{
// 		$('#location-done').removeClass("adddisable");
// 	}
// 	$('#final_location_id').val(location_arr);
// 	//$("li#sh-step3").addClass("active");
// });

$(document).ready(function(){


	$(".couses-sel").delegate(".table-item", "click", function(event) {

    var final_category_id = $('#final_category_id').val();
	var final_subcategory_id = $('#final_subcategory_id').val();
	var final_location_id = $('#final_location_id').val();
	var user_id='<?php echo $_SESSION['user_id'];?>';

	var course = $(this).attr('id');
			
	var course_id = document.getElementById(course).getAttribute("value");
	var part_id = $(this).parent().parent().attr("id");

	/*console.log(part_id+' part_id ');
	console.log(course_id+' course_id ');*/
	var selected_course_date = $(this).children('input#hidden_course_date').val();
	var hidden_course_position = $(this).children('input#hidden_course_position').val();

	//console.log(hidden_course_position+' hidden_course_position ');

	var course_type = $(this).children('input#course_type').val();
	if($(this).parent().parent().next().attr("id")){
       var next_part_id = $(this).parent().parent().next().attr("id").replace('part','');
	}


   	
    $(this).toggleClass("active").siblings().removeClass("active");

    //console.log({course_id:course_id,type:'get_next_course_only',part_id:next_part_id,location_id:final_location_id,user_id:'',position:hidden_course_position});

    var url = '<?=$config['base_url']?>/GetPhpData.php';
   $.ajax({
	url : url,
	type: "POST",
	data: {course_id:course_id,type:'get_next_course_only',part_id:next_part_id,location_id:final_location_id,user_id:'',position:hidden_course_position},
	dataType: "JSON",
	success: function(data)
	{
		if(next_part_id)
		{
		    $("#part"+next_part_id+' .arr-box').empty();
			$.each(data.data, function(key, value) {
				
				//console.log(value+' value');
			if(value.part==""){
				var parts=value.sub_part_no;
			}
			else{
				var parts=value.part;
			}
				/*console.log(parts+' parts ');
				console.log(value.course_id+' value.course_id ');
				console.log(value.class+' value.class ');
				*/
			$("#part"+parts+' .arr-box').append('<div class="table-item '+value.class+' " id="course'+value.course_id+'" value="'+value.course_id+'"><input type="hidden" id="hidden_course_date" value="'+value.course_date+'" ><input type="hidden" id="partNo" value="'+parts+'" ><input type="hidden" id="course_type" value="'+value.course_type+'" ><input type="hidden" id="hidden_slot" value="'+value.slots+'" ><h5>'+value.course_title+'</h5><p><b>'+value.location_name+'</b></p><p><b>'+value.date_time+'</b></p><p><b>'+value.slots+' <?php echo $translation['_available_']?></b></p></div>');

		      	
	       });
		}
	   

       // console.log('part id '+ $(this).parent().parent().attr("id"));
		
			function lookup( name ) {
                for(var j = 0, len = Object.keys(course_arr).length; j < len; j++) {
                    if( Object.keys(course_arr)[j] === name )
                        return true;
                }
                return false;
            }
       /* console.log(data.no_of_parts+' no_of_parts ');
        console.log(Object.keys(course_arr).length+' length ');
        console.log($('#'+course).hasClass("active")+' active ');*/
		if($('#'+course).hasClass("active"))
		{
			//console.log(' has active ');
			if(!lookup(part_id)) {
			  //  console.log(' has part id ');
				course_arr[part_id] = course_id;
				/*console.log(part_id+' part ids ');
				console.log(course_arr[part_id]);
				*/
				if(data.no_of_parts== Object.keys(course_arr).length)
				{
			    //console.log('  data.no_of_parts ');
					sessionStorage.setItem("final_course_id", Object.values(course_arr));
					$('#final_course_id').val(Object.values(course_arr));
					$('#course-done').removeClass('adddisable');
					$('#course-done').click();
				}
				else
				{
					var container = $('html, body'),
				    scrollTo = $('div#part'+next_part_id);
					
			   // console.log(scrollTo);
					container.animate({
					    scrollTop: scrollTo.offset().top - container.offset().top
					});
				}
			}
			else
			{

				delete course_arr[part_id];
				course_arr[part_id] = course_id;
				
			   /* console.log(course_arr);
			    console.log(data.no_of_parts);*/
				if(data.no_of_parts== Object.keys(course_arr).length)
				{
			   //console.log('  data.no_of_parts 2');
					sessionStorage.setItem("final_course_id", Object.values(course_arr));
					$('#final_course_id').val(Object.values(course_arr));
					$('#course-done').removeClass('adddisable');
					
					$('#course-done').click();
				}
				else
				{
			   // console.log('  scrollTo top 2');
					var container = $('html, body'),
				    scrollTo = $('div#part'+next_part_id);
					
					container.animate({
					    scrollTop: scrollTo.offset().top - container.offset().top
					});
				}
			}
		}
		else
		{
			   // console.log('  no active ');
			  //  console.log(' part_id '+ part_id);
			var all_next_elements = $('#'+part_id).nextAll();
			$.each(all_next_elements, function(key, value) {
				var child_element = $('#'+$(this).attr("id")).children('div.arr-box').children('div.table-item');
				delete course_arr[$(this).attr("id")];	
				$.each(child_element, function(key, value) {
					//$(this).addClass('adddisable');
					$(this).removeClass('active');
				});
			});
			$('#course-done').addClass('adddisable');
			delete course_arr[part_id];		
		}

		$('#final_course_id').val(Object.values(course_arr));

		//console.log(course_arr);
		//console.log($('#final_course_id').val());
		if(Object.keys(course_arr).length != 0)
		{
			if(lookup(part_id))
			{
				if($('#'+part_id).next())
				{/*
					var date = '<?php echo time();?>';
					var element = $('#'+part_id).next().children('div.arr-box').children('div.table-item');
					$.each(element, function(key, value) {
						var hidden_course_date = $(this).children('input#hidden_course_date').val();
						var hidden_slot = $(this).children('input#hidden_slot').val();
						if(selected_course_date<hidden_course_date&&hidden_slot!='0'&&date<hidden_course_date)
						{
							$(this).removeClass('adddisable');
						}
						else
						{
							$(this).addClass('adddisable');
						}
					});
				*/}
				else
				{
					sessionStorage.setItem("final_course_id", Object.values(course_arr));
					$('#course-done').removeClass("adddisable");
					$('#course-done').click();
				}
			}
		}
		else
		{
			$('#course-done').addClass("adddisable");
		}


		//console.log(Object.values(course_arr));

	}

    });


	});



	$(".couses-sel").delegate(".see_m_button", "click", function(event) {
	var id=event.target.id;
	var buton_val=event.target.value;
    var no= parseInt(buton_val);
	
	var page_no=no+1;;
	$('#'+id).val(page_no);
		
    var final_category_id = $('#final_category_id').val();
	var final_subcategory_id = $('#final_subcategory_id').val();
	var final_location_id = $('#final_location_id').val();
	var user_id='<?php echo $_SESSION['user_id'];?>';
	
	var id=event.target.id;
	var arr=id.split('e');
	var part_id=arr[1] ;
	var page= parseInt($('#per_page').val());

	var per_page=4;
	$('#per_page').val(per_page);

	var totalPartsForSeeMore = $('#totalPartsForSeeMore').val();

	for (let part_id = 1; part_id <= totalPartsForSeeMore; part_id++) {
		/*console.log({user_id:user_id,category_id:final_category_id,sub_category_id:final_subcategory_id,location_id:final_location_id,type:'get_part_courses',page_no:page_no,per_page:per_page,part_id:part_id});*/
	var url = '<?=$config['base_url']?>/GetPhpData.php';
    $.ajax({
		url : url,
		type: "POST",
		data: {user_id:user_id,category_id:final_category_id,sub_category_id:final_subcategory_id,location_id:final_location_id,type:'get_part_courses',page_no:page_no,per_page:per_page,part_id:part_id},
		dataType: "JSON",
		success: function(data)
		{
			//console.log(data);

		 if(data.status==1)
		    {

                if(data.last_page==true){

                 	$('#partpage'+part_id).css("display","none");
                }
		    	$.each(data.data, function(key, value) {
		    		// .couses-sel 
		    		if(value.part==""){
		    			var parts=value.sub_part_no;
		    		}
		    		else{
		    			var parts=value.part;
		    		}
		    		if(parts>1){

			    		$("#part"+parts+' .arr-box').append('<div class="table-item items '+value.class+' adddisable" id="course'+value.course_id+'" value="'+value.course_id+'"><input type="hidden" id="hidden_course_date" value="'+value.course_date+'" ><input type="hidden" id="course_type" value="'+value.course_type+'" ><input type="hidden" id="hidden_slot" value="'+value.slots+'" ><h5>'+value.course_title+'</h5><p><b>'+value.location_name+'</b></p><p><b>'+value.date_time+'</b></p><p><b>'+value.slots+' <?php echo $translation['_available_']?></b></p></div>');
			    	}else{

			    		$("#part"+parts+' .arr-box').append('<div class="table-item items '+value.class+'" id="course'+value.course_id+'" value="'+value.course_id+'"><input type="hidden" id="hidden_course_date" value="'+value.course_date+'" ><input type="hidden" id="course_type" value="'+value.course_type+'" ><input type="hidden" id="hidden_slot" value="'+value.slots+'" ><h5>'+value.course_title+'</h5><p><b>'+value.location_name+'</b></p><p><b>'+value.date_time+'</b></p><p><b>'+value.slots+' <?php echo $translation['_available_']?></b></p></div>');
			    	}
		    	});
		    
		    	
					
		    }
		}
		
	}); 
  
  }
/* load next courses also for next parts per page.*/
});
	
});



$("a#location-done").click(function(){
	// console.log("oo");
	// var id=e.target.id;
	// console.log(id);

	sessionStorage.setItem("final_course_id",'');
	$('#final_course_id').val('');
	course_arr = {};
	$('li#sh-step3').addClass("active");
	$("div#step2").hide();
	var final_category_id = $('#final_category_id').val();
	var final_subcategory_id = $('#final_subcategory_id').val();

	var final_location_id = $('#final_location_id').val();
	var user_id='<?php echo $_SESSION['user_id'];?>'
	// newpage();
	/*console.log('user_id'+user_id);
	console.log('sub_category_id'+final_subcategory_id);
	console.log('location_id'+final_location_id);
	console.log('category_id'+final_category_id);
	console.log('type'+get_courses);*/
	 // page_no = _$('#pageno').val();
	 // per_page=$('#per_page').val();
	// console.log('no'+page_no);
	// console.log('per_page'+per_page);
	var url = '<?=$config['base_url']?>/GetPhpData.php';
    $.ajax({
		url : url,
		type: "POST",
		data: {user_id:user_id,category_id:final_category_id,sub_category_id:final_subcategory_id,location_id:final_location_id,type:'get_courses',page_no:1,per_page:4},
		dataType: "JSON",
		success: function(data)
		{
		    if(data.status==1)
		    {
		    	$("div#step3").show();

				$('#courses_div').html('');
				$('.couses-sel').html('<input type="hidden" name="page_no" id="page_no" value="1"><input type="hidden" name="per_page" id="per_page" value="2">');
				$('#totalPartsForSeeMore').val(data.no_of_parts);
				for(var i=1; i<=data.no_of_parts; i++)
				{
					var a= i-1;
                    if(data.total_course[a]['course_count']>4){
                    $(".couses-sel").append('<div class="tabel-box fir" id="part'+i+'"><h4>'+data.part_name[a]['name']+'</h4><div class="arr-box"></div><div class="text-right w-100"><button class="see_m_button" type="button"  id="partpage'+i+'" value="1" ><?php echo $translation['_See_More_']?></button></div></div>');
                    }else{
                    $(".couses-sel").append('<div class="tabel-box fir" id="part'+i+'"><h4>'+data.part_name[a]['name']+'</h4><div class="arr-box"></div></div>');	
                    }
                   
				}
				
		    	$.each(data.data, function(key, value) {

		    		var pos =1;
		    		$.each(value, function(key, value) {
		    		if(value.part==""){
		    			var parts=value.sub_part_no;
		    		}
		    		else{
		    			var parts=value.part;
		    		}

				    		if(parts>1){
				    		$("#part"+parts+' .arr-box').append('<div class="table-item '+value.class+' adddisable" id="course'+value.course_id+'" value="'+value.course_id+'"><input type="hidden" id="hidden_course_date" value="'+value.course_date+'" ><input type="hidden" id="hidden_course_position" value="'+pos+'" ><input type="hidden" id="partNo" value="'+parts+'" ><input type="hidden" id="course_type" value="'+value.course_type+'" ><input type="hidden" id="hidden_slot" value="'+value.slots+'" ><h5>'+value.course_title+'</h5><p><b>'+value.location_name+'</b></p><p><b>'+value.date_time+'</b></p><p><b>'+value.slots+' <?php echo $translation['_available_']?></b></p></div>');

				    		}else{

				    		$("#part"+parts+' .arr-box').append('<div class="table-item '+value.class+'" id="course'+value.course_id+'" value="'+value.course_id+'"><input type="hidden" id="hidden_course_date" value="'+value.course_date+'" ><input type="hidden" id="hidden_course_position" value="'+pos+'" ><input type="hidden" id="partNo" value="'+parts+'" ><input type="hidden" id="course_type" value="'+value.course_type+'" ><input type="hidden" id="hidden_slot" value="'+value.slots+'" ><h5>'+value.course_title+'</h5><p><b>'+value.location_name+'</b></p><p><b>'+value.date_time+'</b></p><p><b>'+value.slots+' <?php echo $translation['_available_']?></b></p></div>');
				    		}
		    		

				    		 pos++;
		    	        });
		    	});
		    		
		  }
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		  alert(textStatus);
		}
	});
});
var loc=new Array();
function step2s(){

    var className = $("div#step2").attr("class");
    var  category = className.split('_');
    var category_id =category[1];
    // console.log(category_id);
    	var sub_category_id=$('#final_subcategory_id').val();
    // alert(sub_category_id);
       var url = '<?=$config['base_url']?>/GetPhpData.php';
       $.ajax({
		url : url,
		type: "POST",
		data: {id:category_id,type:'get_location',sub_category_id:sub_category_id},
		dataType: "JSON",
		success: function(data)
		{
			// console.log("location_arr"+location_arr);
			// console.log("len"+location_arr.length);
			for (var i = 0; i <=location_arr.length; i++) {
				var inp=location_arr[i];
				   // console.log("inp"+inp);
				   // inp.pop();
				   location_arr.pop(inp);
				}
	
			$('#location-done').addClass("adddisable");

			// console.log("pop"+location_arr.pop());
		
			$('ul.locationul').empty('');
		    for (var i = 0; i < data.total; i++) {
				$('ul.locationul').append('<li id="location'+data.data[i]['id']+'" value="'+data.data[i]['id']+'"><h5><i class="fa fa-map-marker" aria-hidden="true"></i>'+data.data[i]['location_detail']+'</h5><p>'+data.data[i]['location_name']+'</p></li>');
		    }
			    	
		  $(".adress li").click(function(){

			$(this).toggleClass("active");
			var location = $(this).attr('id');
			var location_id = $('#'+location).val();
			// console.log("location_id"+location_id);

			if($(this).hasClass("active"))
			{
				location_arr.push(location_id);
			}
			else
			{
				location_arr = jQuery.grep(location_arr, function(value) {
				  return value != location_id;
				});
			}
			// console.log(location_arr);
			if(location_arr.length==0)
			{
				$('#location-done').addClass("adddisable");
			}
			else
			{
				$('#location-done').removeClass("adddisable");
			}
			$('#final_location_id').val(location_arr);
			//$("li#sh-step3").addClass("active");
		});
					
		}
	});
}


$("#back-category").on('click',function(){
	$("div#step2").hide();
	$("div#step1").show();
	$('#final_location_id').val('');
	$("li#sh-step2").removeClass("active");
});
$("#back-location").click(function(){
	$("div#step3").hide();
	$("div#step2").show();
	$("li#sh-step3").removeClass("active");
});
// var course_ids=array();
$("#back-course").click(function(){
	$("div#step4").hide();
	$("div#step3").show();

	$('#final_course_id').val('');

	sessionStorage.setItem("final_course_id",'');
	$('a#location-done').click();
	$("li#sh-step4").removeClass("active");
});

$('#course-done').click(function(){
	$('li#sh-step4').addClass("active");
	$("div#step4").show();
	$("div#step3").hide();
	
	var final_course_id = $('#final_course_id').val();
	var url = '<?=$config['base_url']?>/GetPhpData.php';
    $.ajax({
		url : url,
		type: "POST",
		data: {course_id:final_course_id,type:'review'},
		dataType: "JSON",
		success: function(data)
		{
		    if(data.status==1)
		    {
		    	console.log(data.data);
				$('#review_div1,#review_div2').html('');
				$('#review_div3 p, #review_div3 b').remove();
				$(".book-det#review_div1").append('<h5>1. <?php echo $translation['_Kurskategorie_']?> </h5><p><i class="fa fa-list" aria-hidden="true"></i> <b>'+data.data[0].course_category+'</b> '+data.data[0].sub_category_name+'</p>');
				$(".book-det#review_div2").append('<h5>2.<?php echo $translation['_Course_location_']?> </h5><p><i class="fa fa-map-marker" aria-hidden="true"></i> <b>'+data.data[0].location_detail+'</b></p><p>'+data.data[0].location_name+'</p>');

		    	$.each(data.data, function(key, value) {
		    		$('#review_div3 h5').after('<p><i class="fa fa-certificate" aria-hidden="true"></i> <b>'+value.course_title+'</b></p><p>'+value.date_time+'</p>');
		    	});
		    	$('#review-done').removeClass('adddisable');
		    }
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		  alert(textStatus);
		}
	});
});
/*$("#review-done").click(function(){
	$("div#step4").hide();
	$("div#step5").show();
	$('li#sh-step5').addClass("active");
});*/


</script>