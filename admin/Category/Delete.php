<?php
include '../includes/Functions.php';
include('../Config/Connection.php');
 //echo json_encode(array('data'=>$_POST));die;

if(isset($_POST['type'])&& !empty($_POST['type']))
{
    global $conn;
    $type = $_POST['type'];
    if($type=='category')
    {
         $category_id=$_POST['category_id'];
        $sql="SELECT * FROM `tbl_subcategory` WHERE category_id='$category_id' and disable='0'";
        $q['run'] = $conn->query($sql);
        $q['result'] = $q['run']->fetch_assoc();

        $category_ids =  $q['result']['category_id'];
       $sql="select * FROM tbl_course where category_id='$category_id' and disable='0'";
        $q['run'] = $conn->query($sql);
        $q['result'] = $q['run']->fetch_assoc();
        $category =  $q['result']['category_id'];
        if($category_ids)
        {
           echo json_encode(array('status'=>'2','message'=>'Please delete sub-category for this category.'));
                    exit(); 
        }
        elseif($category){
             echo json_encode(array('status'=>'2','message'=>'Please delete courses for this category.'));
                    exit();
        }else{
        $q['query'] = "UPDATE tbl_category set disable='1' WHERE category_id='$category_id'";
        $q['run'] = mysqli_query($conn,$q['query']);
        if($q['run'])
        {

            echo json_encode(array('status'=>'1','message'=>'Deleted Successfully'));
            exit();
        }
        else
        {
            echo json_encode(array('status'=>'0','message'=>'Failed to delete'));
            exit();
        }
    }
    }
    if($type=='subcategory')
    {
        $id=$_POST['id'];

        $sql="select * FROM tbl_course where sub_category_id='$id' and disable='0'";
        $q['run'] = $conn->query($sql);
        $q['result'] = $q['run']->fetch_assoc();
        $sub_category_id =  $q['result']['course_id'];
        // var_dump($sub_category_id);
        if($sub_category_id){
                echo json_encode(array('status'=>'2','message'=>'Please delete courses for this sub-category.'));
                    exit();
        }
        else{
        $q['query'] = "UPDATE tbl_subcategory set disable='1' WHERE id='$id'";
        $q['run'] = mysqli_query($conn,$q['query']);
        if($q['run'])
        {
            echo json_encode(array('status'=>'1','message'=>'Deleted Successfully'));
            exit();
        }
        else
        {
            echo json_encode(array('status'=>'0','message'=>'Failed to delete'));
            exit();
        }
    }
    }
    if($type=='location')
    {
        $id=$_POST['id'];
        $q['query'] = "DELETE FROM tbl_location WHERE id='$id'";
        $q['run'] = mysqli_query($conn,$q['query']);
        if($q['run'])
        {
            echo json_encode(array('status'=>'1','message'=>'Deleted Successfully'));
            exit();
        }
        else
        {
            echo json_encode(array('status'=>'0','message'=>'Failed to delete'));
            exit();
        }
    }
    if($type=='course')
    {
        $course_id=$_POST['course_id'];
        $q1['query'] = "UPDATE booked_course_history set isRemoved='1' WHERE course_id='$course_id'";
        $q1['run'] = mysqli_query($conn,$q1['query']);

        $q['query'] = "UPDATE tbl_course set disable='1', refund='1',refund_time='".time()."' WHERE course_id='$course_id'";
        $q['run'] = mysqli_query($conn,$q['query']);
        if($q['run'])
        {
             $booked_course_detail=get_booked_course_detail_by_course_id($course_id);
        // var_dump($booked_course_detail);
        // foreach ($booked_course_detail as $key => $value) {
        //     // var_dump($value);
        //     $user_id=$value['user_id'];
        //     $user_detail=get_user_detail_by_id($user_id);
        //     // var_dump($user_detail);
        //     $email=$user_detail[0]['email'];
        //     // var_dump($email);
        //      $email_message = "your course has been deleted.";

        // $to = $email;
       
        // $subject = "Course deleted";
        
        // $headers  = 'MIME-Version: 1.0' . "\r\n";
        
        // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        // $headers .= "From: info@fahrschule-star.ch";

        // $success = mail($to,$subject,$email_message,$headers);
        // //     # code...
        // }
            echo json_encode(array('status'=>'1','message'=>'Deleted Successfully'));
            exit();
        }
        else
        {
            echo json_encode(array('status'=>'0','message'=>'Failed to delete'));
            exit();
        }
    }
    if($type=='instructor')
    {
        $instructor_id=$_POST['instructor_id'];
        $q['query'] = "DELETE FROM tbl_instructor WHERE instructor_id='$instructor_id'";
        $q['run'] = mysqli_query($conn,$q['query']);
        if($q['run'])
        {
            echo json_encode(array('status'=>'1','message'=>'Deleted Successfully'));
            exit();
        }
        else
        {
            echo json_encode(array('status'=>'0','message'=>'Failed to delete'));
            exit();
        }
    }
}
?>