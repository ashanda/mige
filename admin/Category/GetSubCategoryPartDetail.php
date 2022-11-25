<?php 
include '../Config/Connection.php';
// var_dump($_REQUEST['category_id']);
function get_subcategorys_part_detail($id)
{
    global $conn;
    $q['query'] = "SELECT * FROM tbl_subcategory_part_name WHERE subcategory_id='$id'order by part_no asc";
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
$id=$_REQUEST['id'];
$data=get_subcategorys_part_detail($id);

if($data){
// $data['result'] = $data;
echo json_encode($data);	
}
else{
 echo json_encode(1);      
}