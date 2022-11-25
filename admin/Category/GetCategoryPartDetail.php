<?php 
include '../Config/Connection.php';
// var_dump($_REQUEST['category_id']);
function get_category_part_detail($category_id)
{
    global $conn;
    $q['query'] = "SELECT * FROM tbl_part_name WHERE category_id='$category_id'order by id asc";
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
$category_id=$_REQUEST['category_id'];
$data=get_category_part_detail($category_id);

if($data){
// $data['result'] = $data;
echo json_encode($data);	
}