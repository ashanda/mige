<?php

include 'Config/Connection.php';

function send_response($message)
{
    $message = utf8_converter($message);
     echo json_encode($message);
}

  if ( isset ($_GET['language']) )
 {
    $_SESSION['language'] = $_GET['language'];
 } 
 elseif($_SESSION['language'])
 {
 	$_SESSION['language'] =  $_SESSION['language'];
 }

 else
 {
 	$_SESSION['language'] = 'en';
 }
 
 
       if ( $_SESSION['language'] =='en')
      {
       function email_array()
{
    global $conn;
    $run="SELECT `id`, `pageid`, `alias`, `inenglish` as detail FROM `translations`";
	//print_r($run); die;
     $result=$conn->query($run);
     $translation = array();
     while($row = mysqli_fetch_array($result))
    {
       $translation[$row['alias']]=$row['detail'];    
                  
     } 
    return $translation;
}

      }
      else
      {
		  
    function email_array()
{
    global $conn;
    $run="SELECT `id`, `pageid`, `alias`, `ingerman` as detail FROM `translations`";
     $result=$conn->query($run);
     $translation = array();
     while($row = mysqli_fetch_array($result))
    {
       $translation[$row['alias']]=$row['detail'];    
                  
     } 
    return $translation;
}
       
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

function login_user($email,$password)
{
    global $conn;
    $q['query'] = "SELECT * FROM user WHERE email='$email' AND password=BINARY '$password'";
    // var_dump($q['query']);
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function check_user_existance($email)
{
    global $conn;
    $q['query'] = "SELECT * FROM user WHERE email='$email'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}
function check_courses_exists_by_user($user_id,$booked_courses)
{
    global $conn;
    $q['query'] = "SELECT * FROM billing_details WHERE user_id='$user_id' AND course_id='$booked_courses' AND remove_course_ids=''";
   // print_r($q['query']);die;
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function get_user_detail($user_id)
{
    global $conn;
    $q['query'] = "SELECT * FROM user WHERE user_id='$user_id' and disable='0'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function get_billing_details_by_user_id($user_id)
{ 
    global $conn;
    $q['query'] = "SELECT * FROM billing_details WHERE user_id = '$user_id'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    
    return $q['result'];
}

function get_billing_details_by_transaction_id($transaction_id)
{ 
    global $conn;
    $q['query'] = "SELECT * FROM billing_details WHERE transaction_id = '$transaction_id'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    
    return $q['result'];
}

function create_user($firstname,$lastname,$email,$password,$phone)
{
    global $conn;
    $creation_date = time();
    $q['query'] = "INSERT into user (firstname,lastname,email,password,phone,creation_date)VALUES('$firstname','$lastname','$email','$password','$phone','$creation_date')";
   // print_r($q['query']);die;
    $q['run'] = $conn->query($q['query']);
    return $q['run'];
}

function insert_billing_details($user_id,$firstname,$lastname,$company_name,$postcode,$phone,$street,$description,$payment_type,$course_id,$total_price,$payment_status,$booked_courses,$transaction_id)
{
    global $conn;
    $creation_date = time();
    $q['query'] = "INSERT into billing_details (user_id,firstname,lastname,company_name,postcode,phone,street,description,payment_type,course_id,total_price,payment_status,creation_date,booked_course_ids,transaction_id)VALUES('$user_id','$firstname','$lastname','$company_name','$postcode','$phone','$street','$description','$payment_type','$course_id','$total_price','$payment_status','$creation_date','$booked_courses','$transaction_id')";
    $q['run'] = $conn->query($q['query']);
    return $q['run'];
}

function insert_billing_details_v2($user_id,$firstname,$lastname,$company_name,$postcode,$phone,$street,$description,$payment_type,$course_id,$total_price,$payment_status,$booked_courses,$transaction_id,$complete_history,$city)
{
    global $conn;
    $creation_date = time();
    $q['query'] = "INSERT into billing_details (user_id,firstname,lastname,company_name,postcode,phone,street,description,payment_type,course_id,total_price,payment_status,creation_date,booked_course_ids,transaction_id,twint_complete_history,city)VALUES('$user_id','$firstname','$lastname','$company_name','$postcode','$phone','$street','$description','$payment_type','$course_id','$total_price','$payment_status','$creation_date','$booked_courses','$transaction_id','$complete_history','$city')";
    $q['run'] = $conn->query($q['query']);
    return $q['run'];
}

function update_billing_detail($transaction_id,$id)
{
    global $conn;
    $q['query'] = "Update billing_details set payment_status='1', transaction_id='$transaction_id' WHERE id='$id'";
    $q['run'] = $conn->query($q['query']);
    return  $q['run'];
}
function book_course($user_id,$course_id)
{
    global $conn;
    $creation_time = time();
    $q['query'] = "INSERT into booked_course_history (user_id,course_id,creation_time)VALUES('$user_id','$course_id','$creation_time')";
    $q['run'] = $conn->query($q['query']);
    return $q['run'];
}

function get_category_detail($category_id)
{
    global $conn;
     if ( $_SESSION['language'] =='en')
      {
        $q['query'] = "SELECT *,`name` as name FROM tbl_category WHERE category_id='$category_id'";
      }else{

        $q['query'] = "SELECT *,`name_ingerman` as name FROM tbl_category WHERE category_id='$category_id'";
      }   
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function get_categories_part_name($category_id)
{
    global $conn;
     if ( $_SESSION['language'] =='en')
      {
        
        $q['query'] = "SELECT * ,`name` as name FROM tbl_part_name WHERE category_id='$category_id'";

      }
      else
      {
       $q['query'] = "SELECT * ,`parts_name_ingerman` as name FROM tbl_part_name WHERE category_id='$category_id'";
       }
      
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
function get_subcategories_part_name($subcategory_id)
{
    global $conn;
    if ( $_SESSION['language'] =='en')
      {
        $q['query'] = "SELECT * ,`name`as name FROM tbl_subcategory_part_name WHERE subcategory_id='$subcategory_id' order by part_no asc";
      }
      else
      {
         $q['query'] = "SELECT * ,`parts_name_ingerman` as name FROM tbl_subcategory_part_name WHERE subcategory_id='$subcategory_id' order by part_no asc";
      }
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


function getDataFromTable($table_name,$get,$where,$order_by)
{
    if(!empty($where))
    {
         foreach ($where as $key => $value) {
           $whereQuery[] = ' '.$key."='".$value."'";
        }

        $where = implode('AND ',$whereQuery);
        $where = "WHERE ".$where;
    } 


    global $conn;
    $q['query'] = "SELECT $get FROM $table_name $where $order_by  "; 
       // print_r($q['query']); die;
    $q['run'] = $conn->query($q['query']);
    //$q['result'] =$q['run']->fetch_assoc();
    $q['result'] = array();
    while($c=$q['run']->fetch_assoc())
    {
        array_push($q['result'], $c);
    }
	
	//print_r($q['result']); die;

    return $q['result'];

}



function get_subcategory_detail($id)
{
    global $conn;
    if ( $_SESSION['language'] =='en')
      {
 
    $q['query'] = "SELECT *,`name` as name,`description`as description FROM tbl_subcategory WHERE id='$id'";
}
else
{
  $q['query'] = "SELECT *,`name_ingerman` as name,`description_german`as description FROM tbl_subcategory WHERE id='$id'";  
}
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function add_subcategory($category_id,$name,$no_of_parts,$description,$creation_time, $alias_name,$german_name,$description_german)
{
    global $conn;
    $q['query'] = "INSERT into tbl_subcategory(`category_id`, `name`, `no_of_parts`, `description`, `creation_time`, `alias_name`, `name_ingerman`, `description_german`)VALUES('$category_id','$name','$no_of_parts','$description','$creation_time', '$alias_name','$german_name','$description_german')'";
    //var_dump($q['query']);die();
    $q['run'] = $conn->query($q['query']);
    return $q['run'];
}
function get_location_detail($id)
{
    global $conn;
    $q['query'] = "SELECT * FROM tbl_location WHERE id='$id'";
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

function get_multiple_course_detail($course_id)
{
    global $conn;
    $q['query'] = "SELECT * FROM tbl_course WHERE course_id IN ($course_id) ORDER BY course_date ASC";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = array();
    $total_price = '0';
    while ($key=$q['run']->fetch_assoc()) 
    {
        $course_id = $key['course_id'];
        $category_id = $key['category_id'];
        $sub_category_id = $key['sub_category_id'];
        $location_id = $key['location_id'];
        $course_date = $key['course_date'];
        $course_time = $key['course_time'];
        $course_end_time = $key['course_end_time'];
        $price = $key['price'];
        $daytime = $key['daytime'];
        $part = $key['part'];
        $total_price = $total_price+$price;

        $get_category_detail = get_category_detail($category_id);
        $course_category = $get_category_detail['name'];

        if($sub_category_id)
        {
            $get_subcategory_detail = get_subcategory_detail($sub_category_id);
            $sub_category_name = $get_subcategory_detail['name'];
        }
        else
        {
            $sub_category_name = '';
        }
        
        $get_location_detail = get_location_detail($location_id);
        $location_name = $get_location_detail['location_name'];
        $location_detail = $get_location_detail['location_detail'];
       // $place = explode(',', $location_name);
        $place = $location_name;
        //$last_word = array_pop($place);

        if($part=="" || $part=="0")
        {
         $no=$key['sub_part_no'];
        }
        else{
         $no=$key['part'];
        }
         //$course_detail = $course_category.' course part'.$no.' '.$daytime.' course';
         $course_detail = $course_category;
         $course_daytime = $daytime;
         $course_no = $no;
         $c_date = date('d/m/Y',$course_date);
         $c_time = date('H:i',$course_time);
         $c_end_time = date('H:i',$course_end_time);
         $date_time = $c_date.' '.$c_time;

        if(!$key['course_title_eng']){
               $key['course_title'] =  $course_detail.' '.$course_no.' '.$course_daytime;
        }
        else{
            if($_SESSION['language']=='en'){
                 $key['course_title'] =  $key['course_title_eng'];
            }else{
                 $key['course_title'] =  $key['course_title_ger'];
            }
        }
        $key['price'] = $price;
        $key['course_detail'] = $course_detail;
        $key['course_category'] = $course_category;
        $key['sub_category_name'] = $sub_category_name;
        $key['c_date'] = $c_date;
        $key['c_time'] = $c_time;
        $key['c_end_time'] = $c_end_time;
        $key['date_time'] = $date_time;
        $key['location_name'] = $location_name;
        $key['location_detail'] = $location_detail;
        $key['total_price'] = $total_price;
        $key['place'] = $location_name;
        $key['course_day'] =$course_daytime;
        $key['course_no'] = $course_no;
        
        array_push($q['result'], $key);
    }
    return $q['result'];
}

function check_subcategory_existance($id,$name)
{
    global $conn;
    if($id)
    {
        $q['query'] = "SELECT * FROM tbl_subcategory WHERE name ='$name' and id!='$id'";
    }
    else
    {
        $q['query'] = "SELECT * FROM tbl_subcategory WHERE name ='$name'";
    }
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}
function add_category($name,$image,$no_of_parts,$creation_time,$alias,$german)
{

    global $conn;
    $icon="fa ".$image;
    $q['query'] = "INSERT INTO tbl_category(name, class_icon, no_of_parts, creation_time,alias_name, name_ingerman ) VALUES ('$name','$icon','$no_of_parts','$creation_time','$alias','$german')";
    // var_dump($q['query']); die("ddd");
    $q['run'] = $conn->query($q['query']);
    return $q['run'];
}

function add_category_part_name($category_id,$name,$part_no,$creation_at,$alias_inname,$parts_ingerman)
{
  global $conn;
  $q['query'] = "INSERT into tbl_part_name(`category_id`, `name`, `part_no`, `creation_at`, `alias_name_parts`, `parts_name_ingerman`)VALUES('$category_id','$name','$part_no','$creation_at','$alias_inname','$parts_ingerman')";
  $q['run'] = $conn->query($q['query']);
  return $q['run'];
}
function add_subcategory_part_name($subcategory_id,$name,$part_no,$creation_at,$parts_name_ingerman,$part_name_alias)
{
  global $conn;
  $q['query'] = "INSERT into tbl_subcategory_part_name(subcategory_id,name,part_no,creation_at,parts_name_ingerman,part_name_alias)VALUES($subcategory_id,'$name','$part_no','$creation_at','$parts_name_ingerman','$part_name_alias')";
        $q['run'] = $conn->query($q['query']);

        print_r($q['query']);die;

  return $q['run'];

}


function get_all_categories()
{
    global $conn;
      if ( $_SESSION['language'] =='en')
      {
       $q['query']="SELECT * ,`name` as name FROM `tbl_category` WHERE disable=0 ORDER BY creation_time ASC";

             }
      else
      {
       $q['query'] = "SELECT * ,`name_ingerman` as name FROM `tbl_category` WHERE disable=0 ORDER BY creation_time ASC";
      
      }
    
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
    $q['query'] = "SELECT * FROM tbl_course WHERE 1 ORDER BY creation_time ASC";
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
    $q['query'] = "SELECT * FROM tbl_instructor WHERE 1 ORDER BY creation_time ASC";
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
     if ( $_SESSION['language'] =='en')
      {

       $q['query']="SELECT *,`name` as name,`description`as description FROM tbl_subcategory WHERE category_id='$category_id' and disable='0' ORDER BY creation_time ASC";

             }
      else
      {
       $q['query'] = "SELECT *,`name_ingerman` as name,`description_german`as description FROM tbl_subcategory WHERE category_id='$category_id' and disable='0' ORDER BY creation_time ASC";
      
      }

//     $q['query'] = "SELECT * FROM tbl_subcategory WHERE category_id='$category_id' and disable='0' ORDER BY creation_time ASC";
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
// function get_subcategories_by_category_id($category_id)
// {
//  global $conn;
//  $q['query'] = "SELECT * FROM tbl_subcategory WHERE category_id='$category_id' and disable='0' ORDER BY creation_time ASC";
//  $q['run'] = $conn->query($q['query']);
//     $q['result'] = array();
//     $i = 0;
//     while ($c=$q['run']->fetch_assoc()) 
//     {
//      $i = ++$i;
//      $c['s_num'] = $i;
//      array_push($q['result'], $c);
//     }
//     return $q['result'];
// }

function get_location_list()
{
    global $conn;
    $q['query'] = "SELECT * FROM tbl_location WHERE 1 ORDER BY creation_time ASC";
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

function get_location_by_category_id($category_id,$sub_category_id)
{
   global $conn;
   $current_time=time();
    $q['query'] = "SELECT * FROM  tbl_location where id in(SELECT location_id FROM tbl_course where category_id='$category_id' and course_date>'$current_time' and sub_category_id='$sub_category_id' and disable=0) and disable=0 ORDER BY creation_time ASC";
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

function get_total_location_by_category_id($category_id,$sub_category_id)
{
   global $conn;
    $current_time=time();
    $q['query'] = "SELECT count(*)as total FROM  tbl_location where id in(SELECT location_id FROM tbl_course where category_id='$category_id' and course_date>'$current_time' and sub_category_id='$sub_category_id' and disable=0) and disable=0 ORDER BY creation_time ASC";
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

// function get_all_filtered_courses($category_id,$sub_category_id,$location_id)
// {
//     $current_time = time();
//     global $conn;
//     $q['query'] = "SELECT * FROM tbl_course WHERE category_id='$category_id' AND sub_category_id='$sub_category_id' AND location_id IN (".$location_id.") ORDER BY creation_time ASC";
//     var_dump($q['query']);
//     $q['run'] = $conn->query($q['query']);
//     $q['result'] = array();
//     $i = 0;
//     $class = '';
//     while ($key=$q['run']->fetch_assoc()) 
//     {
//         $i = ++$i;
//         $s_num = $key['s_num'];
//         $course_id = $key['course_id'];
//         $category_id = $key['category_id'];
//         $location_id = $key['location_id'];
//         $part = $key['part'];
//         $course_date = $key['course_date'];
//         $course_time = $key['course_time'];
//         $course_end_time = $key['course_end_time'];
//         $daytime = $key['daytime'];
//         $slots = $key['slots'];

//         if($current_time<$course_date)
//         {
//             //$class = 'adddisable';
//             $booked_slot_count = get_booked_slot_counts_by_course_id($course_id);
//             if($booked_slot_count)
//             {
//                 $slots = $slots-$booked_slot_count;
//             }
//             $get_category_detail = get_category_detail($category_id);
//             $category_name = $get_category_detail['name'];
//             $no_of_parts = $get_category_detail['no_of_parts'];

//             $get_location_detail = get_location_detail($location_id);
//             $location_name = $get_location_detail['location_name'];

//             $course_category = $category_name.' course part'.$part.' '.$daytime.' course';
//             $date_time = date('m/d/Y',$course_date).' '.date('h:i a',$course_time).'-'.date('h:i a',$course_end_time);

//             // if($part>'1')
//             // {
//             //     $class = 'adddisable';
//             // }
            
//             if($slots=='0')
//             {
//                 $class = 'adddisable';
//             }

//             $key['class'] = $class;
//             $key['s_num'] = $i;
//             $key['course_category'] = $course_category;
//             $key['date_time'] = $date_time;
//             $key['slots'] = $slots;
//             $key['no_of_parts'] = $no_of_parts;
//             $key['booked_slot_count'] = $booked_slot_count;
//             $key['location_name'] = $location_name;
//             array_push($q['result'], $key);
//             $class = '';
//         }
//     }
//     return $q['result'];
// }
function get_all_filtered_courses($user_id,$category_id,$sub_category_id,$location_id,$part,$offset,$per_page)
{
     // LIMIT  $offset , $per_page
    $current_time = strtotime(date('Y-m-d'));
    $start=strtotime(date('d-m-Y 00:00:00'));
    $end=strtotime(date('d-m-Y 11:59:00'));
    // var_dump($start);var_dump($end);

    global $conn;
   /* if(!$user_id){
    $q['query'] = "SELECT * FROM tbl_course WHERE category_id='$category_id' AND sub_category_id='$sub_category_id' AND location_id IN (".$location_id.") and part='$part' and course_date>='$current_time' and disable='0' or category_id='$category_id' AND sub_category_id='$sub_category_id' AND location_id IN (".$location_id.") and sub_part_no='$part' and course_date>'$current_time' and disable='0' ORDER BY course_date ASC LIMIT  $offset , $per_page";
    }else{
    $q['query'] = "SELECT * FROM tbl_course WHERE category_id='$category_id' AND sub_category_id='$sub_category_id' AND location_id IN (".$location_id.") and part='$part'  and course_date>='$current_time' and disable='0' and course_id not IN (SELECT course_id FROM `booked_course_history` where user_id='$user_id' and creation_time between $start and $end) or category_id='$category_id' AND sub_category_id='$sub_category_id' AND location_id IN (".$location_id.") and sub_part_no='$part'  and course_date>'$current_time' and disable='0' and course_id not IN (SELECT course_id FROM `booked_course_history` where user_id='$user_id' and creation_time between $start and $end) ORDER BY course_date ASC LIMIT  $offset , $per_page";    
    }*/

    if(!$user_id){
        $q['query'] = "SELECT tbl_course.*, (Select count(*) as count from booked_course_history WHERE course_id=tbl_course.course_id AND isRemoved=0) as total_count FROM tbl_course LEFT JOIN booked_course_history ON booked_course_history.course_id=tbl_course.course_id WHERE ((tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.part='$part' and tbl_course.course_date>='$current_time' and tbl_course.disable='0') or (tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.sub_part_no='$part' and tbl_course.course_date>='$current_time' and disable='0')) GROUP BY tbl_course.course_id HAVING tbl_course.slots>total_count ORDER BY tbl_course.course_date ASC LIMIT $offset,$per_page";
         }else{
        $q['query'] = "SELECT tbl_course.*, (Select count(*) as count from booked_course_history WHERE course_id=tbl_course.course_id AND isRemoved=0) as total_count FROM tbl_course LEFT JOIN booked_course_history ON booked_course_history.course_id=tbl_course.course_id WHERE ((tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.part='$part' and tbl_course.course_date>='$current_time' and tbl_course.disable='0') or (tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.sub_part_no='$part' and tbl_course.course_date>='$current_time' and disable='0')) AND tbl_course.course_id not IN (SELECT course_id FROM `booked_course_history` where user_id='$user_id' and creation_time between $start and $end AND isRemoved=0) GROUP BY tbl_course.course_id HAVING tbl_course.slots>total_count ORDER BY tbl_course.course_date ASC LIMIT $offset,$per_page";    
        }
        /*AND course_id not IN (SELECT course_id FROM `booked_course_history` where user_id='$user_id' and creation_time between $start and $end) */
/*
     var_dump($q['query']); die;*/
    $q['run'] = $conn->query($q['query']);
    $q['result'] = array();
    $i = 0;
    $class = '';
    while ($key=$q['run']->fetch_assoc()) 
    {
        $i = ++$i;
        $s_num = $key['s_num'];
        $course_id = $key['course_id'];
        $category_id = $key['category_id'];
        $location_id = $key['location_id'];
        $part = $key['part'];
        $course_date = $key['course_date'];
        $course_time = $key['course_time'];
        $course_end_time = $key['course_end_time'];
        $daytime = $key['daytime'];
        $slots = $key['slots'];

        // if($current_time<$course_date)
        // {
            //$class = 'adddisable';
            $booked_slot_count = get_booked_slot_counts_by_course_id($course_id);
            if($booked_slot_count)
            {
                $slots = $slots-$booked_slot_count;
            }
            $get_category_detail = get_category_detail($category_id);
            $category_name = $get_category_detail['name'];
            $no_of_parts = $get_category_detail['no_of_parts'];

            $get_location_detail = get_location_detail($location_id);
            $location_name = $get_location_detail['location_name'];
            if($part=="" || $part=="0")
            {
             $no=$key['sub_part_no'];
            }
            else{
             $no=$key['part'];
            }
            // $course_category = $category_name.' course part'.$no.' '.$daytime.' course';
            $course_category = $category_name;
            $course_no = $no;
            $course_daytime = $daytime;
            $date_time = date('d/m/Y',$course_date).' '.date('H:i',$course_time).'-'.date('H:i',$course_end_time);
           
            // if($part>'1')
            // {
            //     $class = 'adddisable';
            // }
            
            if($slots<=0)
            {
                $class = 'adddisable';
            }



            if(!$key['course_title_eng']){
               $key['course_title'] =  $course_category.' '.$course_no.' '.$course_daytime;
            }
            else{
                if($_SESSION['language']=='en'){
                     $key['course_title'] =  $key['course_title_eng'];
                }else{
                     $key['course_title'] =  $key['course_title_ger'];
                }
            }

            $key['class'] = $class;
            $key['s_num'] = $i;
            $key['course_category'] = $course_category;
            $key['date_time'] = $date_time;
            $key['slots'] = $slots;
            $key['no_of_parts'] = $no_of_parts;
            $key['booked_slot_count'] = $booked_slot_count;
            $key['location_name'] = $location_name;
            $key['course_no'] = $course_no;
            $key['course_daytime'] = $course_daytime;
            array_push($q['result'], $key);
            $class = '';
        // }
    }
    return $q['result'];
}

function get_all_next_enabled_courses($user_id,$category_id,$sub_category_id,$location_id,$part,$offset,$per_page,$course_type,$start,$end)
{
     $current_time = strtotime(date('Y-m-d'));
    
    global $conn;
   if(!$user_id){
    $q['query'] = "SELECT tbl_course.*, (Select count(*) as count from booked_course_history WHERE course_id=tbl_course.course_id AND isRemoved=0) as total_count FROM tbl_course LEFT JOIN booked_course_history ON booked_course_history.course_id=tbl_course.course_id WHERE ((tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.part='$part' and tbl_course.course_date>='$start' and tbl_course.disable='0') or (tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.sub_part_no='$part' and tbl_course.course_date>='$start' and disable='0')) AND tbl_course.course_type='$course_type' GROUP BY tbl_course.course_id HAVING tbl_course.slots>total_count ORDER BY tbl_course.course_date ASC LIMIT $offset,$per_page";
     }else{
    $q['query'] = "SELECT tbl_course.*, (Select count(*) as count from booked_course_history WHERE course_id=tbl_course.course_id  AND isRemoved=0) as total_count FROM tbl_course LEFT JOIN booked_course_history ON booked_course_history.course_id=tbl_course.course_id WHERE ((tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.part='$part' and tbl_course.course_date>='$start' and tbl_course.disable='0') or (tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.sub_part_no='$part' and tbl_course.course_date>='$start' and disable='0')) AND tbl_course.course_type='$course_type' AND tbl_course.course_id not IN (SELECT course_id FROM `booked_course_history` where user_id='$user_id' and creation_time between $start and $end AND isRemoved=0) AND tbl_course.course_id not IN (SELECT course_id FROM `booked_course_history` where user_id='$user_id' and creation_time between $start and $end AND isRemoved=0) GROUP BY tbl_course.course_id HAVING tbl_course.slots>total_count ORDER BY tbl_course.course_date ASC LIMIT $offset,$per_page";    

        /*AND course_id not IN (SELECT course_id FROM `booked_course_history` where user_id='$user_id' and creation_time between $start and $end AND isRemoved=0)
        */

        
  //  $q['query'] = "SELECT * FROM tbl_course WHERE category_id='$category_id' AND sub_category_id='$sub_category_id' AND location_id IN (".$location_id.") and part='$part' and course_date>'$current_time' and disable='0' and course_id not IN (SELECT course_id FROM `booked_course_history` where user_id='$user_id' and creation_time between $start and $end) or category_id='$category_id' AND sub_category_id='$sub_category_id' AND location_id IN (".$location_id.") and sub_part_no='$part' and course_date>'$current_time' and disable='0' and course_id not IN (SELECT course_id FROM `booked_course_history` where user_id='$user_id' and creation_time between $start and $end) ORDER BY course_date ASC LIMIT  $offset , $per_page";    
    }
   // var_dump($q['query']); die;
    $q['run'] = $conn->query($q['query']);
    $q['result'] = array();
    $i = 0;
    $class = '';
    while ($key=$q['run']->fetch_assoc()) 
    {
        $i = ++$i;
        $s_num = $key['s_num'];
        $course_id = $key['course_id'];
        $category_id = $key['category_id'];
        $location_id = $key['location_id'];
        $part = $key['part'];
        $course_date = $key['course_date'];
        $course_time = $key['course_time'];
        $course_end_time = $key['course_end_time'];
        $daytime = $key['daytime'];
        $slots = $key['slots'];

        // if($current_time<$course_date)
        // {
            //$class = 'adddisable';

        $booked_slot_count = get_booked_slot_counts_by_course_id($course_id);
        if($booked_slot_count)
        {
            $slots = $slots-$booked_slot_count;
        }
        $get_category_detail = get_category_detail($category_id);
        $category_name = $get_category_detail['name'];
        $no_of_parts = $get_category_detail['no_of_parts'];

        $get_location_detail = get_location_detail($location_id);
        $location_name = $get_location_detail['location_name'];

        if($part=="" || $part=="0")
        {
         $no=$key['sub_part_no'];
        }
        else{
         $no=$key['part'];
        }
        // $course_category = $category_name.' course part'.$no.' '.$daytime.' course';
        $course_category = $category_name;
        $course_daytime =$daytime;
        $course_no = $no;
        $date_time = date('d/m/Y',$course_date).' '.date('H:i',$course_time).'-'.date('H:i',$course_end_time);
       
        // if($part>'1')
        // {
        //     $class = 'adddisable';
        // }
        
        if($slots=='0')
        {
            $class = 'adddisable';
        }
        
        if(!$key['course_title_eng']){
           $key['course_title'] =  $course_category.' '.$course_no.' '.$course_daytime;
        }
        else{
            if($_SESSION['language']=='en'){
                 $key['course_title'] =  $key['course_title_eng'];
            }else{
                 $key['course_title'] =  $key['course_title_ger'];
            }
        }

        $key['class'] = $class;
        $key['s_num'] = $i;
        $key['course_category'] = $course_category;
        $key['date_time'] = $date_time;
        $key['slots'] = $slots;
        $key['no_of_parts'] = $no_of_parts;
        $key['booked_slot_count'] = $booked_slot_count;
        $key['location_name'] = $location_name;
        $key['course_daytime'] =$course_daytime;
        $key['course_no'] = $course_no;
        array_push($q['result'], $key);
        $class = '';
        // }
    }
    return $q['result'];
}

function get_user_buy_course_by_id($user_id)
{
    global $conn;
    $q['query'] = "select course_id,creation_date from billing_details where user_id='$user_id'";
    // var_dump($q['query']);
    $q['run'] = $conn->query($q['query']);
    $q['result'] = array();
    $i = 0;
    $class = '';
    while ($key=$q['run']->fetch_assoc()) 
    {
        $i = ++$i;
        $s_num = $key['s_num'];
        
            array_push($q['result'], $key);
           
    }
    return $q['result'];
}

function get_all_filtered_coursesss($user_id,$category_id,$sub_category_id,$location_id,$part,$offset,$per_page,$course_type,$type)
{
    $current_time = strtotime(date('Y-m-d'));
    $start=strtotime(date('d-m-Y 00:00:00'));
    $end=strtotime(date('d-m-Y 11:59:00'));
    global $conn;

    if($type==1){

       if(!$user_id){
        $q['query'] = "SELECT tbl_course.*, (Select count(*) as count from booked_course_history WHERE course_id=tbl_course.course_id AND isRemoved=0) as total_count FROM tbl_course LEFT JOIN booked_course_history ON booked_course_history.course_id=tbl_course.course_id WHERE ((tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.part='$part' and tbl_course.course_date>='$current_time' and tbl_course.disable='0') or (tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.sub_part_no='$part' AND tbl_course.course_type='$course_type' and tbl_course.course_date>='$current_time' and disable='0')) GROUP BY tbl_course.course_id HAVING tbl_course.slots>total_count ORDER BY tbl_course.course_date ASC LIMIT $offset,$per_page";
         }else{
        $q['query'] = "SELECT tbl_course.*, (Select count(*) as count from booked_course_history WHERE course_id=tbl_course.course_id AND isRemoved=0) as total_count FROM tbl_course LEFT JOIN booked_course_history ON booked_course_history.course_id=tbl_course.course_id WHERE ((tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.part='$part' and tbl_course.course_date>='$current_time' and tbl_course.disable='0') or (tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.sub_part_no='$part' and tbl_course.course_date>='$current_time' and disable='0')) AND tbl_course.course_type='$course_type' AND tbl_course.course_id not IN (SELECT course_id FROM `booked_course_history` where user_id='$user_id' and creation_time between $start and $end AND isRemoved=0) GROUP BY tbl_course.course_id HAVING tbl_course.slots>total_count ORDER BY tbl_course.course_date ASC LIMIT $offset,$per_page";  
        /*AND course_id not IN (SELECT course_id FROM `booked_course_history` where user_id='$user_id' and creation_time between $start and $end)*/  
        }
    }else{

       if(!$user_id){
        $q['query'] = "SELECT tbl_course.*, (Select count(*) as count from booked_course_history WHERE course_id=tbl_course.course_id AND isRemoved=0) as total_count FROM tbl_course LEFT JOIN booked_course_history ON booked_course_history.course_id=tbl_course.course_id WHERE ((tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.part='$part' and tbl_course.course_date>='$current_time' and tbl_course.disable='0') or (tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.sub_part_no='$part' and tbl_course.course_date>='$current_time' and disable='0')) GROUP BY tbl_course.course_id HAVING tbl_course.slots>total_count ORDER BY tbl_course.course_date ASC LIMIT $offset,$per_page";
         }else{
        $q['query'] = "SELECT tbl_course.*, (Select count(*) as count from booked_course_history WHERE course_id=tbl_course.course_id AND isRemoved=0) as total_count FROM tbl_course LEFT JOIN booked_course_history ON booked_course_history.course_id=tbl_course.course_id WHERE ((tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.part='$part' and tbl_course.course_date>='$current_time' and tbl_course.disable='0') or (tbl_course.category_id='$category_id' AND tbl_course.sub_category_id='$sub_category_id' AND tbl_course.location_id IN (".$location_id.") and tbl_course.sub_part_no='$part' and tbl_course.course_date>='$current_time' and disable='0')) GROUP BY tbl_course.course_id HAVING tbl_course.slots>total_count ORDER BY tbl_course.course_date ASC LIMIT $offset,$per_page";  

        /* AND course_id not IN (SELECT course_id FROM `booked_course_history` where user_id='$user_id' and creation_time between $start and $end)*/  
        }
    }
/*
    var_dump($q['query']);die;*/
    $q['run'] = $conn->query($q['query']);
    $q['result'] = array();
    $i = 0;
    $class = '';
    while ($key=$q['run']->fetch_assoc()) 
    {
        $i = ++$i;
        $s_num = $key['s_num'];
        $course_id = $key['course_id'];
        $category_id = $key['category_id'];
        $location_id = $key['location_id'];
        $part = $key['part'];
        $course_date = $key['course_date'];
        $course_time = $key['course_time'];
        $course_end_time = $key['course_end_time'];
        $daytime = $key['daytime'];
        $slots = $key['slots'];

        // if($current_time<$course_date)
        // {
            //$class = 'adddisable';

        $booked_slot_count = get_booked_slot_counts_by_course_id($course_id);
        if($booked_slot_count)
        {
            $slots = $slots-$booked_slot_count;
        }
        $get_category_detail = get_category_detail($category_id);
        $category_name = $get_category_detail['name'];
        $no_of_parts = $get_category_detail['no_of_parts'];

        $get_location_detail = get_location_detail($location_id);
        $location_name = $get_location_detail['location_name'];

        if($part=="" || $part=="0")
        {
         $no=$key['sub_part_no'];
        }
        else{
         $no=$key['part'];
        }
        // $course_category = $category_name.' course part'.$no.' '.$daytime.' course';
        $course_category = $category_name;
        $course_daytime =$daytime;
        $course_no = $no;
        $date_time = date('d/m/Y',$course_date).' '.date('H:i a',$course_time).'-'.date('H:i a',$course_end_time);
       
        // if($part>'1')
        // {
        //     $class = 'adddisable';
        // }
        
        if($slots=='0')
        {
            $class = 'adddisable';
        }
        
        if(!$key['course_title_eng']){
           $key['course_title'] =  $course_category.' '.$course_no.' '.$course_daytime;
        }
        else{
            if($_SESSION['language']=='en'){
                 $key['course_title'] =  $key['course_title_eng'];
            }else{
                 $key['course_title'] =  $key['course_title_ger'];
            }
        }

        $key['class'] = $class;
        $key['s_num'] = $i;
        $key['course_category'] = $course_category;
        $key['date_time'] = $date_time;
        $key['slots'] = $slots;
        $key['no_of_parts'] = $no_of_parts;
        $key['booked_slot_count'] = $booked_slot_count;
        $key['location_name'] = $location_name;
        $key['course_daytime'] =$course_daytime;
        $key['course_no'] = $course_no;
        array_push($q['result'], $key);
        $class = '';
        // }
    }
    return $q['result'];
}

function get_booked_slot_counts_by_course_id($course_id)
{
    global $conn;
    $q['query'] = "SELECT count(*) as booked_slot_count FROM booked_course_history WHERE course_id='$course_id' AND isRemoved=0 HAVING booked_slot_count>0";

    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result']['booked_slot_count'];
}

function get_course_counts($category_id,$sub_category_id,$location_id,$part)
{
    $current_time=time();
    global $conn;
    $q['query'] = "SELECT count(*) as course_count FROM tbl_course WHERE category_id='$category_id' AND sub_category_id='$sub_category_id' AND location_id IN (".$location_id.") and part='$part' and course_date>'$current_time' and disable='0' or category_id='$category_id' AND sub_category_id='$sub_category_id' AND location_id IN (".$location_id.") and sub_part_no='$part' and course_date>'$current_time' and disable='0'";
// var_dump($q['query']);
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function get_billing_details($billing_id)
{ 
    global $conn;
    $q['query'] = "SELECT * FROM billing_details WHERE id = '$billing_id'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    
    return $q['result'];
}
function get_user_buy_course_by_date($user_id)
{ 
    $current_time=time();
     $start=strtotime(date('d-m-Y 00:00:00'));
    $end=strtotime(date('d-m-Y 11:59:00'));
    global $conn;
    $q['query'] = "SELECT course_id FROM tbl_course WHERE course_id IN (SELECT course_id FROM `booked_course_history` where user_id='$user_id' and isRemoved=0 and creation_time between $start and $end)";
    // var_dump($q['query']);
    $q['run'] = $conn->query($q['query']);
    $q['result'] = array();
    $i = 0;
    while ($key=$q['run']->fetch_assoc()) 
    {
        $course_id = $key['course_id'];
        //$get_multiple_course_detail = get_multiple_course_detail($course_id);
        array_push($q['result'], $key['course_id']);
    }
    
    return $q['result'];
}

function get_history_details($user_id)
{ 
    global $conn;
    $q['query'] = "SELECT * FROM billing_details WHERE user_id = '$user_id' AND remove_course_ids='' order by id desc";

   // print_r($q['query']);die;
    $q['run'] = $conn->query($q['query']);
    $q['result'] = array();
    $i = 0;
    while ($key=$q['run']->fetch_assoc()) 
    {
        $course_id = $key['course_id'];
        $course_details = get_course_detail($course_id);
        $key['course_start_date'] = strtotime(date('Y-m-d',$course_details['course_date']),date('H:i A',$course_details['course_time']));
        array_push($q['result'], $key);
    }
    
    return $q['result'];
}

function delete_book_course($id)
{
    global $conn;
    $q['query'] = "DELETE FROM booked_course_history WHERE id = '$id'";
    $q['run'] = $conn->query($q['query']);
    return true;
}

function get_latest_plan($user_id)
{
    global $conn;
    $q['query'] = "SELECT * FROM booked_course_history WHERE user_id = '$user_id' ORDER BY creation_time DESC LIMIT 1";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    $get_course_detail = get_course_detail($q['result']['course_id']);
    $category_id = $get_course_detail['category_id'];
    $get_category_detail = get_category_detail($category_id);
    $course_category = $get_category_detail['name'];
    return $course_category;
}

function get_course_detail($course_id)
{
    global $conn;
    $q['query'] = "SELECT * FROM tbl_course WHERE course_id='$course_id'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    return $q['result'];
}

function upload_profile_pic($image)
{

    $target_dir = 'Profile_Pic/';
    if(!is_dir($target_dir))
    {
        //Directory does not exist, so lets create it.
        mkdir($target_dir);
    }
    

    $image  = str_replace('data:image/png;base64,', '', $image);
    $image  = str_replace('data:image/jpeg;base64,', '', $image);
    $image  = str_replace(' ', '+', $image);
    $data   = base64_decode($image);
    $file = $target_dir.uniqid().'.png';
    $success = file_put_contents($file, $data);
    return $success ? $file : "error";
}

function edit_user_profile($firstname,$lastname,$profile_pic,$phone,$user_id)
{
    global $conn;
    $q['query'] = "UPDATE user set firstname='$firstname', lastname='$lastname',profile_pic='$profile_pic',phone='$phone' WHERE user_id='$user_id'";
    $q['run'] = $conn->query($q['query']);
    return $q['run'];
}

function update_customer_id($user_id,$customer_id)
{
    global $conn;
    $q['query'] = "UPDATE user set customer_id='$customer_id' WHERE user_id='$user_id'";
    $q['run'] = $conn->query($q['query']);
    return $q['run'];
}

function add_edit_stripe_detail($charge_id,$customer_id,$object,$amount,$created,$currency,$description,$payment_method,$payment_method_type,$receipt_url,$status,$user_id,$token,$balance_transaction)
{
     global $conn;
    $q['query'] = "INSERT INTO stripe(charge_id,customer_id,object,amount,created,currency,description,user_id, stripeToken,    payment_method, payment_method_type,receipt_url,status,balance_transaction) VALUES ('$charge_id','$customer_id','$object','$amount','$created','$currency','$description','$user_id','$token','$payment_method','$payment_method_type','$receipt_url','$status','$balance_transaction')";
    // var_dump($q['query']);
    $q['run'] = $conn->query($q['query']);
    return $q['run']; 
}

function update_billing_history_by_id($id,$payment_status)
{
    global $conn;
    $q['query'] = "UPDATE booked_course_history set payment_status='$payment_status' WHERE id='$id'";
    $q['run'] = $conn->query($q['query']);
    return $q['run'];
}



function get_trial_lesson_detail()
{
    global $conn;
  
    $q['query']="SELECT *,`location_detail` as name FROM `tbl_location`";

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
}/*
function get_trial_lesson_detail()
{
    global $conn;
     if ( $_SESSION['language'] =='en')
      {

         $q['query']="SELECT *,`name` as name FROM `trial_lesson`";

      }
      else
      {
       
         $q['query']="SELECT *,`german`as name FROM `trial_lesson`";
         
      }
    
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
}*/

function get_trial_category_detail()
{
    global $conn;
     if ( $_SESSION['language'] =='en')
      {

         $q['query']="SELECT *,`name` as name FROM `trial_category`";
//var_dump($q['query']);die();
      }
      else
      {
       
         $q['query']="SELECT *,`german` as name FROM `trial_category`";
         //var_dump($q['query']);die();
      }
    
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

function get_trial_time_slot_detail()
{
    global $conn;
     if ( $_SESSION['language'] =='en')
      {

         $q['query']="SELECT `id`,`start_time`,`end_time`,`day` as result FROM `trial_time_slot`";
//var_dump($q['query']);die();
      }
      else
      {
       
         $q['query']="SELECT `id`,`start_time`,`end_time`,`german` as result FROM `trial_time_slot`";
         //var_dump($q['query']);die();
      }
    
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
    //var_dump($q['result']);die();
}
function get_trial_weekday_detail()
{

    global $conn;
    if ( $_SESSION['language'] =='en')
      {

         $q['query']="SELECT `id`,`week_name` as result FROM `trial_weekday`";
//var_dump($q['query']);die();
      }
      else
      {
       
         $q['query']="SELECT `id`,`week_german` as result FROM `trial_weekday`";
         //var_dump($q['query']);die();
      }
   //var_dump($q['query']);die();
    $q['run'] = $conn->query($q['query']);
    $q['result'] = array();
      
    
    $i = 0;
    while ($c=$q['run']->fetch_assoc()) 
    {
        $i = ++$i;
        $c['s_num'] = $i;
        array_push($q['result'], $c);
    }
    //var_dump($q['result']);die();
    return $q['result'];
    
}


function create_request_trial_lesson($name,$email,$dob,$phone_no,$trial_lesson,$trial_category,$trial_time_slot,$trial_weekday,$message)
{
    global $conn;
    $creation_date = time();
    $q['query'] = "INSERT into tbl_request_trial_lesson (name,email,dob,phone_no,trial_lesson,trial_category,trial_time_slot,trial_weekday,message,creation_at
)VALUES('$name','$email','$dob','$phone_no','$trial_lesson','$trial_category','$trial_time_slot','$trial_weekday','$message','".time()."')";
    // var_dump($q['query']);
    $q['run'] = $conn->query($q['query']);
    return $q['run'];
}

function get_trial_lesson_detail_by_id($id)
{
    global $conn;
     if($_SESSION['language']=='en')
      {
       $q['query'] = "SELECT *,name as name FROM trial_lesson where id='$id'";
      }else{

       $q['query'] = "SELECT *,german as name FROM trial_lesson where id='$id'";
      }
    //$q['query'] = "SELECT * FROM trial_lesson where id='$id'";
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

function get_trial_lesson_detail_from_location($id)
{
    global $conn;
    
    $q['query'] = "SELECT * FROM tbl_location where id='$id'";
     
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


function get_trial_category_detail_by_id($id)
{
    global $conn;

     if($_SESSION['language']=='en')
      {
       $q['query'] = "SELECT *,name as name FROM trial_category where id='$id'";
      }else{

       $q['query'] = "SELECT *,german as name FROM trial_category where id='$id'";
      }
    //$q['query'] = "SELECT * FROM trial_category where id='$id'";
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
function get_trial_time_slot_detail_by_id($id)
{
     global $conn;
     if($_SESSION['language']=='en')
      {
       $q['query'] = "SELECT *,day as day FROM trial_time_slot where id='$id'";
      }else{

       $q['query'] = "SELECT *,german as day FROM trial_time_slot where id='$id'";
      }
    //$q['query'] = "SELECT * FROM trial_time_slot where id='$id'";
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
function get_trial_weekday_detail_by_id($id)
{
     global $conn;
       if($_SESSION['language']=='en')
      {
       $q['query'] = "SELECT *,week_name as week_name FROM trial_weekday where id='$id'";
      }else{

       $q['query'] = "SELECT *,week_german as week_name FROM trial_weekday where id='$id'";
      }
   // $q['query'] = "SELECT * FROM trial_weekday where id='$id'";
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


function getDataFromTableGroupBy($table_name,$get,$where,$order_by,$condition,$groupBy)
{
    if(!empty($where))
    {
         foreach ($where as $key => $value) {
           $whereQuery[] = ' '.$key."='".$value."'";
        }

        $where = implode(' '.$condition.' ',$whereQuery);
    }
    else
    {
      $where = 1;
    }
    
    if(!empty($order_by))
    {
         foreach ($order_by as $key => $value) {
           $OrderByQuery[] = ' '.$key." ".$value." ";
        }

        $order_by = 'ORDER BY '.implode('',$OrderByQuery);
    }
    if(!empty($groupBy))
    {
        
        $groupBy = 'GROUP BY '.implode(',',$groupBy);
    }

    global $conn;
    $q['query'] = "SELECT $get FROM $table_name  WHERE $where $order_by $groupBy "; 
    //print_r($q['query']);die;
    $q['run'] = $conn->query($q['query']);
    //$q['result'] =$q['run']->fetch_assoc();
    $q['result'] = array();
    while($c=$q['run']->fetch_assoc())
    {
        array_push($q['result'], $c);
    }

    return $q['result'];

}

function getDataFromTableGroupByPagination($table_name,$get,$where,$order_by,$condition,$groupBy,$pagination)
{
    if(!empty($where))
    {
         foreach ($where as $key => $value) {
           $whereQuery[] = ' '.$key."='".$value."'";
        }

        $where = implode(' '.$condition.' ',$whereQuery);
    }
    else
    {
      $where = 1;
    }
    
    if(!empty($order_by))
    {
         foreach ($order_by as $key => $value) {
           $OrderByQuery[] = ''.$key." ".$value."";
        }

        $order_by = 'ORDER BY '.implode($condition.' ',$OrderByQuery);
    }
    if(!empty($groupBy))
    {
        
        $groupBy = 'GROUP BY '.implode(',',$groupBy);
    }
    if(!empty($pagination))
    {
      $pagination = "limit ".$pagination['limit']." offset ".$pagination['offset'];
    }

    global $conn;
    $q['query'] = "SELECT $get FROM $table_name  WHERE $where $groupBy $order_by  $pagination "; 
   //print_r($q['query']);die;
    $q['run'] = $conn->query($q['query']);
    //$q['result'] =$q['run']->fetch_assoc();
    $q['result'] = array();
    while($c=$q['run']->fetch_assoc())
    {
        array_push($q['result'], $c);
    }

    return $q['result'];

}


function updateDataTable($table_name,$where,$data)
{
  global $conn;
   if(!empty($where))
    {
         foreach ($where as $key => $value) {
           $whereQuery[] = ' '.$key."='".$value."'";
        }

        $where = implode(' AND ',$whereQuery);
    }
    if(!empty($data))
    {
         foreach ($data as $key => $value) {
           $dataQuery[] = ' '.$key."='".$value."'";
        }

        $data = implode(', ',$dataQuery);
    }
   

    $q['query'] = "UPDATE $table_name set $data where $where";
    //print_r($q['query']);echo " \n";
    $q['run'] = $conn->query($q['query']);
    return $q['run'];
}
function insertDataTable($table_name,$data)
{
  //print_r($data);die;
  global $conn;
  
    if(!empty($data))
    {
         foreach ($data as $key => $value) {
          $fields[] = $key; 
          $values[] = '"'.$value.'"'; 
        }

        $fields = implode(', ',$fields);
        $values = implode(', ',$values);
    }
   
   
    $q['query'] = "INSERT INTO $table_name  ($fields) VALUES ($values)";

    //print_r($q['query']);

    $q['run'] = $conn->query($q['query']);
    return $conn->insert_id;
}
function deleteDataTable($table_name,$where)
{
  global $conn;
   if(!empty($where))
    {
         foreach ($where as $key => $value) {
           $whereQuery[] = ' '.$key."='".$value."'";
        }

        $where = implode(' AND ',$whereQuery);
        $where = "WHERE ".$where;
    }
 
    $q['query'] = "DELETE FROM $table_name $where";
     //print_r($q['query']);die;
    $q['run'] = $conn->query($q['query']);
    return $q['run'];
}
?>