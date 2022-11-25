<?php

function send_response($message)
{
    $message = utf8_converter($message);
	 echo json_encode($message);
}

function utf8_converter($array)
{
    array_walk_recursive($array, function(&$item, $key){
        if(!mb_detect_encoding($item, 'utf-8', true)){
                $item = utf8_encode($item);
        }
    });
 
    return $array;
}

function get_login_details($email,$password)
{
	global $conn;
	$q['query'] = "SELECT * FROM admin_login WHERE email ='$email' and password =BINARY '$password'";
	$q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function get_category_detail($category_id)
{
	global $conn;
	$q['query'] = "SELECT * FROM tbl_category WHERE category_id='$category_id'";
	$q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function edit_categorysss($name,$category_id,$no_of_parts,$class_icon,$alias,$german)

{
    global $conn;
     $icon="fa ".$class_icon;
    $q['query'] = "UPDATE tbl_category set name = '$name',no_of_parts='$no_of_parts',class_icon='$icon',alias_name='$alias',name_ingerman='$german' WHERE category_id ='$category_id'";
   // print_r($q['query']);die();
    $q['run'] = $conn->query($q['query']);
    return $q['run'];

         
}

function get_subcategory_detail($id)
{
	global $conn;
	$q['query'] = "SELECT * FROM tbl_subcategory WHERE id='$id'";
	$q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}
function get_subcategory_part_detail($subcategory_id)
{
    global $conn;
    $q['query'] = "SELECT * FROM tbl_subcategory_part_name WHERE subcategory_id='$subcategory_id'order by part_no asc";
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
function get_location_detail($id)
{
	global $conn;
	$q['query'] = "SELECT * FROM tbl_location WHERE id='$id'";
	$q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function get_booked_course_detail($id)
{
    global $conn;
    $q['query'] = "SELECT count(*)as booked_slot FROM `booked_course_history` where course_id='$id' ";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}
function get_booked_course_detailv3($course_id,$isRemoved)
{
    global $conn;
    $q['query'] = "SELECT count(*) as booked_slot FROM `booked_course_history` where course_id='$course_id' AND isRemoved='$isRemoved'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}
function get_booked_course_detailv2($course_id)
{
    global $conn;
    $q['query'] = "SELECT count(*)as booked_slot FROM `billing_details` where FIND_IN_SET('$course_id',course_id) AND  !FIND_IN_SET('$course_id',remove_course_ids) AND  !FIND_IN_SET('$course_id',deleted_course_id)";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}
function get_instructor_detail($instructor_id)
{
	global $conn;
	$q['query'] = "SELECT * FROM tbl_instructor WHERE instructor_id='$instructor_id'";
	$q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function check_category_existance($id,$name)
{
	global $conn;
	if($id)
	{
		$q['query'] = "SELECT * FROM tbl_category WHERE name ='$name' and category_id!='$id' AND disable=1";
	}
	else
	{
		$q['query'] = "SELECT * FROM tbl_category WHERE name ='$name' AND disable=1";
	}
	$q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function check_subcategory_existance($id,$name)
{
	global $conn;
	if($id)
	{
		$q['query'] = "SELECT * FROM tbl_subcategory WHERE name ='$name' and id!='$id' AND disable=1";
	}
	else
	{
		$q['query'] = "SELECT * FROM tbl_subcategory WHERE name ='$name' AND disable=1";
	}
	$q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function add_category($name,$creation_time,$no_of_parts,$image)
{
	global $conn;
    $icon="fa ".$image;
	$q['query'] = "INSERT into tbl_category(name,creation_time,no_of_parts,class_icon)VALUES('$name','$creation_time','$no_of_parts','$icon')";
	$q['run'] = $conn->query($q['query']);
	return $q['run'];
}

function add_category_part_name($category_id,$name,$creation_at,$part_no)
{
  global $conn;
  $q['query'] = "INSERT into tbl_part_name(category_id,name,creation_at,part_no)VALUES('$category_id','$name','$creation_at','$part_no')";
  $q['run'] = $conn->query($q['query']);
  return $q['run'];
}

function add_category_part_namess($category_id,$name,$creation_at,$part_no,$alias_inname,$parts_ingerman)
{
  global $conn;
  $q['query'] = "INSERT into tbl_part_name(category_id,name,creation_at,part_no,alias_name_parts,parts_name_ingerman)VALUES('$category_id','$name','$creation_at','$part_no','$alias_inname','$parts_ingerman')";
  $q['run'] = $conn->query($q['query']);
  return $q['run'];
}

function add_subcategory_part_name($subcategory_id,$name,$part_no,$creation_at,$parts_name_ingerman,$part_name_alias)
{
  global $conn;
  // $q['query'] = "INSERT into tbl_subcategory_part_name(subcategory_id,name,part_no,creation_at)VALUES('$subcategory_id','$name','$part_no','$creation_at')";

  $q['query'] = "INSERT INTO `tbl_subcategory_part_name`(`subcategory_id`, `name`, `part_no`, `creation_at`, `parts_name_ingerman`, `part_name_alias`) VALUES ('$subcategory_id','$name','$part_no','$creation_at','$parts_name_ingerman','$part_name_alias')";
  // var_dump($q['query']);die;
  $q['run'] = $conn->query($q['query']);
  return $q['run'];
}

function delete_sub_category_part_name($id)
{
  global $conn;
  $q['query'] = "DELETE from tbl_subcategory_part_name  WHERE subcategory_id='$id'";
  $q['run'] = $conn->query($q['query']);
  return $q['run'];
}

function add_subcategory($name,$creation_time,$category_id,$description,$no_of_parts)
{
	global $conn;
	$q['query'] = "INSERT into tbl_subcategory(name,creation_time,description,category_id,no_of_parts)VALUES('$name','$creation_time','$description','$category_id','$no_of_parts')";
	$q['run'] = $conn->query($q['query']);
	return $q['run'];
}

function add_location($location,$latitude,$longitude,$location_detail,$creation_time)
{
	global $conn;
	$q['query'] = "INSERT into tbl_location(location_name,latitude,longitude,location_detail,creation_time)VALUES('$location','$latitude','$longitude','$location_detail','$creation_time')";
	$q['run'] = $conn->query($q['query']);
	return $q['run'];
}

function edit_category($name,$category_id,$no_of_parts,$image)
{
	global $conn;
     $icon="fa ".$image;
	$q['query'] = "UPDATE tbl_category set name = '$name',no_of_parts='$no_of_parts',class_icon='$icon' WHERE category_id='$category_id'";
	$q['run'] = $conn->query($q['query']);
	return $q['run'];
}

function edit_subcategory($name,$id,$category_id,$description,$no_of_parts)
{
	global $conn;
	$q['query'] = "UPDATE tbl_subcategory set name = '$name',category_id='$category_id',description='$description',no_of_parts='$no_of_parts' WHERE id='$id'";
	$q['run'] = $conn->query($q['query']);
	return $q['run'];
}

function edit_subcategory_new($id,$category_id,$name,$no_of_parts,$description,$creation_time,$alias_name,$german,$description_german)
{
    global $conn;
    $q['query'] ="UPDATE `tbl_subcategory` SET `category_id`='$category_id',`name`='$name',`no_of_parts`='$no_of_parts',`description`='$description',`creation_time`='$creation_time',`alias_name`='$alias_name',`name_ingerman`='$german',`description_german`='$description_german' WHERE id ='$id'";
    // var_dump($q['query'])
    $q['run'] = $conn->query($q['query']);
    // var_dump($q['query']);
    return $q['run'];
}

function add_subcategory_part_name_new($id,$name,$part_no,$creation_at, $parts_name_ingerman, $part_name_alias)
{
  global $conn;
  $q['query'] = "INSERT into tbl_subcategory_part_name(subcategory_id,name,part_no,creation_at,parts_name_ingerman,part_name_alias)VALUES('$id','$name','$part_no','$creation_at','$parts_name_ingerman','$part_name_alias')";
        $q['run'] = $conn->query($q['query']);

  return $q['run'];

}

function edit_location($location,$latitude,$longitude,$location_detail,$id)
{
	global $conn;
	$q['query'] = "UPDATE tbl_location set location_name = '$location',latitude='$latitude',longitude='$longitude',location_detail='$location_detail' WHERE id='$id'";
	$q['run'] = $conn->query($q['query']);
	return $q['run'];
}

function get_all_categories()
{
	global $conn;
	$q['query'] = "SELECT * FROM tbl_category WHERE disable=0 ORDER BY creation_time DESC";
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

function get_all_courses()
{
	global $conn;
	$q['query'] = "SELECT * FROM tbl_course WHERE disable='0' ORDER BY course_date ASC";
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

function get_all_courses_v2($course_type)
{
    global $conn;
    $q['query'] = "SELECT * FROM tbl_course WHERE disable='0' AND course_type='$course_type' ORDER BY course_date ASC";
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

function get_all_cancel_courses()
{
    global $conn;
    $q['query'] = "SELECT * FROM tbl_course WHERE disable='1' ORDER BY refund_time DESC";
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

function get_all_insructors()
{
	global $conn;
	$q['query'] = "SELECT * FROM tbl_instructor WHERE 1 ORDER BY creation_time DESC";
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

function get_subcategories_by_category_id($category_id)
{
	global $conn;
	$q['query'] = "SELECT * FROM tbl_subcategory WHERE category_id='$category_id' and disable='0' ORDER BY creation_time DESC";
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

function get_location_list()
{
	global $conn;
	$q['query'] = "SELECT * FROM tbl_location WHERE 1 ORDER BY creation_time DESC";
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

function add_instructor($username,$email,$password,$creation_time,$category_id,$about)
{
	global $conn;
	$q['query'] = "INSERT into tbl_instructor(username,email,password,creation_time,about,category_id)VALUES('$username','$email','$password','$creation_time','$about','$category_id')";
	$q['run'] = $conn->query($q['query']);
	return $q['run'];
}

function add_course($category_id,$sub_category_id,$location_id,$course_date,$course_time,$course_end_time,$price,$part,$daytime,$creation_time,$instructor_id,$slots,$weekly_day,$course_id,$course_room,$flexible_payment,$week_differ,$course_start_date,$course_end_date,$sub_part_no)
{
	global $conn;
	// $course_date = explode(',', $course_date);
	// foreach ($course_date as $key) 
	// {
		$c_date = strtotime($course_date);
        if(!$course_id){
		$q['query'] = "INSERT into tbl_course(category_id,sub_category_id,location_id,course_date,course_time,price,part,daytime,creation_time,instructor_id,slots,course_end_time,weekly_day,course_room,flexible_payment,week_differ,course_start_date,course_end_date,sub_part_no)VALUES('$category_id','$sub_category_id','$location_id','$c_date','$course_time','$price','$part','$daytime','$creation_time','$instructor_id','$slots','$course_end_time','$weekly_day','$course_room','$flexible_payment','$week_differ','$course_start_date','$course_end_date','$sub_part_no')";
        }else
        {
         $q['query'] = "UPDATE tbl_course set category_id='$category_id',sub_category_id='$sub_category_id',location_id='$location_id',course_date='$c_date',course_time='$course_time',price='$price',part='$part',daytime='$daytime',instructor_id='$instructor_id',slots='$slots',course_end_time='$course_end_time',weekly_day='$weekly_day',refund='1',course_room='$course_room' WHERE course_id='$course_id'";   
        }
        // var_dump($q['query']); 
		$q['run'] = $conn->query($q['query']);
	// }
	return $q['run'];
}


function add_coursev2($category_id,$sub_category_id,$location_id,$course_date,$course_time,$course_end_time,$price,$part,$daytime,$creation_time,$instructor_id,$slots,$weekly_day,$course_id,$course_room,$flexible_payment,$week_differ,$course_start_date,$course_end_date,$sub_part_no,$course_type,$course_title_eng,$course_title_ger)
{
    global $conn;
    // $course_date = explode(',', $course_date);
    // foreach ($course_date as $key) 
    // {
        $c_date = strtotime($course_date);
        if(!$course_id){
        $q['query'] = "INSERT into tbl_course (category_id,sub_category_id,location_id,course_date,course_time,price,part,daytime,creation_time,instructor_id,slots,course_end_time,weekly_day,course_room,flexible_payment,week_differ,course_start_date,course_end_date,sub_part_no,course_type,course_title_eng,course_title_ger) VALUES ('$category_id','$sub_category_id','$location_id','$c_date','$course_time','$price','$part','$daytime','$creation_time','$instructor_id','$slots','$course_end_time','$weekly_day','$course_room','$flexible_payment','$week_differ','$course_start_date','$course_end_date','$sub_part_no','$course_type','$course_title_eng','$course_title_ger')";
        }else
        {
         $q['query'] = "UPDATE tbl_course set category_id='$category_id',sub_category_id='$sub_category_id',location_id='$location_id',course_date='$c_date',course_time='$course_time',price='$price',part='$part',daytime='$daytime',instructor_id='$instructor_id',slots='$slots',course_end_time='$course_end_time',weekly_day='$weekly_day',refund='1',course_room='$course_room',course_type='$course_type',course_title_eng='$course_title_eng',course_title_ger='$course_title_ger' WHERE course_id='$course_id'";   
        }
        // var_dump($q['query']); 
        $q['run'] = $conn->query($q['query']);
    // }
    return $q['run'];
}

function edit_instructor($username,$category_id,$about,$instructor_id)
{
	global $conn;
	$q['query'] = "UPDATE tbl_instructor set username = '$username',category_id='$category_id',about='$about' WHERE instructor_id='$instructor_id'";
	$q['run'] = $conn->query($q['query']);
	return $q['run'];
}

function get_instructor_login_details($email,$password)
{
	global $conn;
	$q['query'] = "SELECT * FROM tbl_instructor WHERE email ='$email' and password ='$password'";
	$q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function get_instructor_login_details_by_email($email)
{
    global $conn;
    $q['query'] = "SELECT * FROM tbl_instructor WHERE email='$email'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function get_all_past_course_detail($instructor_id,$current_time)
{
     global $conn;
    $q['query'] = "SELECT * FROM `tbl_course` where course_date<'$current_time' and instructor_id='$instructor_id' order by course_date ASC"; 
    // var_dump($q['query']);
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
function get_all_past_course_detailv2($instructor_id,$current_time,$disable)
{
     global $conn;
    $q['query'] = "SELECT * FROM `tbl_course` where course_date<'$current_time' and instructor_id='$instructor_id' and disable='$disable' order by course_date ASC"; 
    // var_dump($q['query']);
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

function get_all_present_course_detail($instructor_id,$current_time)
{
     global $conn;
    $q['query'] = "SELECT * FROM `tbl_course` where course_date='$current_time' and instructor_id='$instructor_id' order by course_date ASC"; 
    // var_dump($q['query']);
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

function get_all_present_course_detailv2($instructor_id,$current_time,$disable)
{
     global $conn;
    $q['query'] = "SELECT * FROM `tbl_course` where course_date='$current_time' and instructor_id='$instructor_id' and disable='$disable' order by course_time desc"; 
    // var_dump($q['query']);
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

function get_all_future_course_detail($instructor_id,$date,$time)
{
     global $conn;
    
    $q['query'] = "SELECT * FROM `tbl_course` where course_date>'$date' and instructor_id='$instructor_id' order by course_date ASC";
    // var_dump($q['query']);
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

function get_all_future_course_detailv2($instructor_id,$date,$time,$disable)
{
     global $conn;
    
    $q['query'] = "SELECT * FROM `tbl_course` where course_date>'$date' and instructor_id='$instructor_id' and disable='$disable' order by course_date ASC";
    // var_dump($q['query']);
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

function get_course_detail_by_couse_id($course_id)
{

     global $conn;
    $q['query'] = "SELECT * FROM `tbl_course` where course_id='$course_id'"; 
    // var_dump($q['query']);
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

function get_billing_course_detail($c_id)
{
     global $conn;
    $q['query'] = "SELECT * FROM billing_details "; 
    $q['run'] = $conn->query($q['query']);
     $all_details =array();

    if ($q['run']->num_rows > 0)
    {
    	$i = 0;
        while ($q['result'] = $q['run']->fetch_assoc())
        {  
    
    	
    	// var_dump($result['course_id']);
            $course_id=explode(',',$q['result']['course_id']);
// var_/dump($q['result']['course_id']);

// $course_detail=$cid;
// echo"course";var_dump($course_detail);
    		foreach ($course_id as $key => $id) {
    			// echo"id";var_dump($id);
    			// echo"sss";var_dump($c_id);
    			 // $cou=$id;
    			 if($c_id==$id){
    			 	// echo "komal";
    			 	// $all_data[]=$q['result'];
    			 	$i = ++$i;
    	            $q['result']['s_num'] = $i;
    			 	$q['result']['c_id']=$id;
    			 	$cor_detail=get_course_detail_by_couse_id($id);
    			 	$date=date('Y-m-d',$cor_detail[0]['course_date']);
    			 	$time=date('H:i:s',$cor_detail[0]['course_time']);

    			 	$q['result']['course_date'] = date('Y-m-d H:i:s',strtotime("$date $time"));
    			// var_dump($q['result']);die("pl");
    			 	array_push($all_details, $q['result']);

    			 }


    			
    		}
            // array_push($all_details, $q['result']);
        }

    }
    $creation_time = array();						
	foreach ($all_details as $key => $row)
	{
	    $creation_time[$key] = $row['course_date'];
	    
	}
	array_multisort($creation_time, SORT_DESC, $all_details);
    return $all_details;


}
function get_billing_course_detailv2($c_id)
{
     global $conn;
    $q['query'] = "SELECT * FROM billing_details where FIND_IN_SET('$c_id',course_id) AND !FIND_IN_SET('$c_id',remove_course_ids)"; 
    $q['run'] = $conn->query($q['query']);
     $all_details =array();

    if ($q['run']->num_rows > 0)
    {
        $i = 0;
        while ($q['result'] = $q['run']->fetch_assoc())
        {  
    
        
        // var_dump($result['course_id']);
            $course_id=explode(',',$q['result']['course_id']);
// var_/dump($q['result']['course_id']);

// $course_detail=$cid;
// echo"course";var_dump($course_detail);
            foreach ($course_id as $key => $id) {
                // echo"id";var_dump($id);
                // echo"sss";var_dump($c_id);
                 // $cou=$id;
                 if($c_id==$id){
                    // echo "komal";
                    // $all_data[]=$q['result'];
                    $i = ++$i;
                    $q['result']['s_num'] = $i;
                    $q['result']['c_id']=$id;
                    $cor_detail=get_course_detail_by_couse_id($id);
                    $date=date('Y-m-d',$cor_detail[0]['course_date']);
                    $time=date('H:i:s',$cor_detail[0]['course_time']);

                    $q['result']['course_date'] = date('Y-m-d H:i:s',strtotime("$date $time"));
                // var_dump($q['result']);die("pl");
                    array_push($all_details, $q['result']);

                 }


                
            }
            // array_push($all_details, $q['result']);
        }

    }
    $creation_time = array();                       
    foreach ($all_details as $key => $row)
    {
        $creation_time[$key] = $row['course_date'];
        
    }
    array_multisort($creation_time, SORT_DESC, $all_details);
    return $all_details;


}

function get_student_attendance_detail_by_course_id($course_id,$id)
{

     global $conn;
    $q['query'] = "SELECT * FROM `booked_course_history` where course_id='$course_id' and user_id='$id'"; 
    // var_dump($q['query']);
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

function random_strings($length_of_string) 
{ 
  
    // String of all alphanumeric character 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
  
    // Shufle the $str_result and returns substring 
    // of specified length 
    return substr(str_shuffle($str_result),  
                       0, $length_of_string); 
}

function get_all_user()
{
    global $conn;
    $q['query'] = "SELECT * FROM user WHERE 1 ORDER BY user_id DESC";
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

function delete_part_name($category_id)
{
  global $conn;
  $q['query'] = "DELETE from tbl_part_name  WHERE category_id='$category_id'";
  $q['run'] = $conn->query($q['query']);
  return $q['run'];
}

function delete_course_id($course_id)
{
  global $conn;
  $q['query'] = "DELETE from tbl_course  WHERE course_id='$course_id'";
  $q['run'] = $conn->query($q['query']);
  return $q['run'];
}

function get_booked_course_detail_by_course_id($course_id)
{

    global $conn;
    $q['query'] = "SELECT * FROM `booked_course_history` where course_id='$course_id' "; 
    // var_dump($q['query']);
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

function get_user_detail_by_id($user_id)
{
    global $conn;
    $q['query'] = "SELECT * FROM user WHERE user_id='$user_id'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = array();
    $i = 0;
    // print_r($q);
    while ($c=$q['run']->fetch_assoc()) 
    {
        $i = ++$i;
        $c['s_num'] = $i;
        array_push($q['result'], $c);
    }
    return $q['result'];
}

function get_transaction_id_by_booked_course_id($booking_id)
{
    global $conn;
    $q['query'] =" SELECT * FROM `billing_details` where FINd_IN_SET('$booking_id',course_id)";
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

function add_refund_detail($user_id,$course_id,$refund_id,$object,$amount,$balance_transaction,$charge,$created,$currency,$status,$creation_at)
{
    global $conn;
    $q['query'] = "INSERT into tbl_stripe_refund(user_id,course_id,refund_id,object,amount,balance_transaction,charge,created,currency,status,creation_at)VALUES('$user_id','$course_id','$refund_id','$object','$amount','$balance_transaction','$charge','$created','$currency','$status','$creation_at')";
    $q['run'] = $conn->query($q['query']);
    return $q['run'];
}

function get_refund_detail_by_id($user_id,$course_id){
    global $conn;
    $q['query'] =" SELECT * FROM `tbl_stripe_refund` where user_id='$user_id' and course_id='$course_id'";
    $q['run'] = $conn->query($q['query']);
    $c=$q['run']->fetch_assoc();
    return $c;
}

function get_billing_details($course_id,$user_id)
{
    global $conn;
    $q['query'] ="SELECT * FROM `billing_details` where FINd_IN_SET('$course_id',course_id) or FINd_IN_SET('$course_id',deleted_course_id) and user_id='$user_id'";
    // var_dump($q['query']);
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
function get_billing_details_by_id($course_id,$user_id,$id)
{
    global $conn;
    $q['query'] ="SELECT * FROM `billing_details` where id='$id' and FINd_IN_SET('$course_id',course_id)  or  id='$id' and FINd_IN_SET('$course_id',deleted_course_id) and user_id='$user_id' ";
    // var_dump($q['query']);
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

function delete_course_detail_by_room_id($course_from,$course_to,$course_room)
{

     global $conn;
    $q['query'] = "UPDATE `tbl_course` set disable='1' where course_date>'$course_from' and course_date<='$course_to' and course_room='$course_room'"; 
   $q['run'] = $conn->query($q['query']);
    return $q['run'];
}


function delete_course_id_in_billing_detail($course_id,$booking_id,$deleted_course_id,$user_id)
{

     global $conn;
    $q['query'] = "UPDATE `billing_details` set deleted_course_id='$deleted_course_id', course_id = REPLACE(course_id, '$course_id,', '') ,  course_id = REPLACE(course_id, ',$course_id', ''),booked_course_ids=REPLACE(booked_course_ids,',$booking_id',''),booked_course_ids=REPLACE(booked_course_ids,'$booking_id,','')  where FIND_IN_SET('$course_id',course_id) and user_id='$user_id'"; 
    // var_dump($q['query']);
   $q['run'] = $conn->query($q['query']);
    return $q['run'];
}
function update_booking_history($id)
{
       global $conn;
    $q['query'] = "UPDATE `booked_course_history` set  amount_refund ='1' where id='$id'"; 
    // var_dump($q['query']);
   $q['run'] = $conn->query($q['query']);
    return $q['run']; 
}
function get_removed_course_details_by_id($course_id,$user_id,$id,$remove_course_ids)
{
    global $conn;
    $q['query'] ="SELECT * FROM `billing_details` where FIND_IN_SET('$course_id',course_id) and user_id='$user_id' and id='$id' and FIND_IN_SET('$remove_course_ids',remove_course_ids) ";
    // $q['query']="SELECT * FROM `billing_details` where FIND_IN_SET('$course_id',course_id) and user_id='$user_id' and id='$id' or  user_id='$user_id' and id='$id' and FIND_IN_SET('$remove_course_ids',remove_course_ids)";
    // var_dump($q['query']);
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

function get_billing_detail_by_booked_id($id)
{
   global $conn;
    $q['query'] ="SELECT * FROM `billing_details` where FIND_IN_SET('$id',booked_course_ids)";
    // var_dump($q['query']);
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
function get_all_billing_users($course_id)
{
   global $conn;
    $q['query'] ="SELECT * FROM `billing_details` where FIND_IN_SET('$course_id',course_id) AND  !FIND_IN_SET('$course_id',remove_course_ids) AND  !FIND_IN_SET('$course_id',deleted_course_id)";
    // var_dump($q['query']);
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
function get_booked_detail_by_id($id)
{
   global $conn;
    $q['query'] ="SELECT * FROM `booked_course_history` where id='$id'";
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
function get_payment_staus_by_course_id($user_id,$course_id)
{
   global $conn;
    $q['query'] ="SELECT * FROM `booked_course_history` where user_id='$user_id' and course_id='$course_id' and payment_status='1'";
    // var_dump($q['query']);
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

function update_billing_payment_status($billing_id)
{
       global $conn;
    $q['query'] = "UPDATE `billing_details` set  payment_status ='1' where FIND_IN_SET('$billing_id',booked_course_ids)"; 
    // var_dump($q['query']);
   $q['run'] = $conn->query($q['query']);
    return $q['run']; 
}

function get_billing_detail_by_user_id($user_id)
{
   global $conn;
    $q['query'] ="SELECT * FROM `billing_details` where user_id='$user_id' order by id desc";
    // var_dump($q['query']);
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