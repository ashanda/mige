<?php
include('../Config/Connection.php');
include('../includes/Functions.php');
 //echo json_encode(array('data'=>$_POST));die;
if(isset($_POST['type'])&& !empty($_POST['type']))
{
    global $conn;
    $type = $_POST['type'];

	if($type=='getsubcategorylist')
	{
		$category_id = $_POST['category_id'];
		$get_subcategories_by_category_id = get_subcategories_by_category_id($category_id);
		$get_category_detail = get_category_detail($category_id);
		$no_of_parts = $get_category_detail['no_of_parts'];
		if($get_subcategories_by_category_id)
		{
			echo json_encode(array('status'=>1,'data'=>$get_subcategories_by_category_id,'no_of_parts'=>$no_of_parts));
			exit();
		}
		elseif($no_of_parts)
		{
			echo json_encode(array('status'=>2,'no_of_parts'=>$no_of_parts));
			exit();
		}
		else
		{
			echo json_encode(array('status'=>0));
			exit();
		}
	}
	elseif($type=="getsubcategorypartlist")
	{
	
		$id=$_POST['id'];
		$get_subcategories_by_category_id = get_subcategory_detail($id);
		$no_of_parts=$get_subcategories_by_category_id['no_of_parts'];
		if($get_subcategories_by_category_id)
		{
			echo json_encode(array('status'=>1,'no_of_parts'=>$no_of_parts));
			exit();
		}

	}
	elseif($type=='geteditsubcategorylist')
	{
		$category_id = $_POST['category_id'];
		$sub_category_id=$_POST['sub_category_id'];
		$get_subcategories_by_category_id = get_subcategories_by_category_id($category_id);
		if($sub_category_id==""){
		$get_category_detail = get_category_detail($category_id);
	    }else{
		// var_dump($get_category_detail);
		$get_category_detail= get_subcategory_detail($sub_category_id);
	    }
		$no_of_parts = $get_category_detail['no_of_parts'];
		// if($no_of_parts=="" || $no_of_parts=='0'){
		// 	$parts=$get_subcategory_detail['no_of_parts'];
		// }
		// else{
		// 	$parts= $get_category_detail['no_of_parts'];
		// }
		if($get_subcategories_by_category_id)
		{
			echo json_encode(array('status'=>11,'data'=>$get_subcategories_by_category_id,'no_of_parts'=>$no_of_parts));
			exit();
		}
		elseif($no_of_parts)
		{
			echo json_encode(array('status'=>22,'no_of_parts'=>$no_of_parts));
			exit();
		}
		else
		{
			echo json_encode(array('status'=>00));
			exit();
		}
	}

	elseif($type=='payment_status')
	{
		// var_dump($_POST);
		$payment_status=$_POST['payment_status'];
		$id=$_POST['id'];
		$course_id=$_POST['course_id'];
	    $query="update booked_course_history set payment_status='$payment_status' where course_id='$course_id' and id='$id'";
		$row=mysqli_query($conn,$query);
		if($row){
			// echo 1;
				echo json_encode(array('status'=>1));
			exit();
		}
		else{
				echo json_encode(array('status'=>0));
			exit();
		}
	}
	elseif($type=="attendance_status"){
		// var_dump($_POST);
		$attendance_status=$_POST['attendance_status'];
		$id=$_POST['id'];
		$course_id=$_POST['course_id'];
	    $query="update booked_course_history set attendance_status='$attendance_status' where course_id='$course_id' and id='$id'";
		$row=mysqli_query($conn,$query);
		if($row){
			// echo 1;
				echo json_encode(array('status'=>1));
			exit();
		}
		else{
				echo json_encode(array('status'=>0));
			exit();
		}
	}
}