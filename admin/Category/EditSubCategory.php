<?php
include '../includes/header.php';
$id = $_REQUEST['id'];
$get_subcategory_detail = get_subcategory_detail($id);
// var_dump($get_subcategory_detail);
$get_all_categories = get_all_categories();
$name=$get_subcategory_detail['name'];

$no_of_parts = $get_subcategory_detail['no_of_parts'];

if(isset($_POST['submit']))
{
  $id = $_GET['id'];
    // var_dump($_POST); die('ihcjf');
  $name = $_POST['name'];
  $no_of_parts=$_POST['no_of_parts'];
  $category_id = $_POST['category_id'];
  $description = $_POST['description'];
  
  //var_dump($no_of_parts);
  $part_no=$_POST['part_no'];
  $part_name=$_POST['part_name'];
    $creation_time = time();
    $check_subcategory_existance = check_subcategory_existance($id,$name);
    $category_name = strtolower($check_subcategory_existance['name']);
    
     $alias=$_POST['alias_name'];
     $german=$_POST['name_ingerman'];
     $description_german=$_POST['description_german'];
    
     $parts_name_ingerman= $_POST['parts_name_ingerman'];
     $part_name_alias=$_POST['part_name_alias'];

       if($category_name==strtolower($name))
      {
       
        $error = 'This Sub Category Name Is Already Exists';
        
      }
      else
       {
        
        $edit_subcategory = edit_subcategory_new($id,$category_id,$name,$no_of_parts,$description,$creation_time,$alias_name,$german,$description_german);
// edit_subcategory_new($id,$category_id,$name,$no_of_parts,$description,$creation_time,$alias_name,$german,$description_german)


       // print_r($edit_subcategory); die("fdd");

           if($edit_subcategory) 
            {
             delete_sub_category_part_name($id);

             $q['query'] = "UPDATE  tbl_subcategory set `alias_name`='_subcategory_".$id."_' WHERE id ='$id'";

              $q['run'] = $conn->query($q['query']);
            foreach ($part_name as $key => $value) {
                               $part_name_val = $value;
                $parts_name_ingerman_val = $parts_name_ingerman[$key];
                $part_no_val=$part_no[$key];
                
                add_subcategory_part_name_new($id,$part_name_val,$part_no_val,$creation_time,$parts_name_ingerman_val,$part_name_alias);
 $part_id=$conn->insert_id;
             
           $q['query'] = " UPDATE `tbl_subcategory_part_name`  SET  `part_name_alias`='_subcategory_".$id."_parts_".$part_no_val."_' WHERE id =$part_id";
              $q['run'] = $conn->query($q['query']);

            }
            echo "<script type='text/javascript'>
            var category_id = '".$category_id."';
            window.location.href='SubCategoryList.php?category_id='+category_id;</script>";
            exit();
        }
        else
        {
            $error = 'There is someting wrong while editing sub category';
        }
    }
}
?>
<div class="page has-sidebar-left  height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-apps"></i>
                        Course Category
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link"  href="index.php"><i class="icon icon-home2"></i>All Course Categories</a>
                    </li>
                    <li>
                        <a class="nav-link active"  href="#" ><i class="icon icon-plus-circle"></i> Edit Sub Course Category</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form action="EditSubCategory.php?id=<?php echo $id;?>" method="POST">
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-14">
                                        <div class="form-group m-0">
                                            
                                            <label for="name" class="col-form-label s-12">Course Category Name</label>
                                            <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="category_id">
                                                <option required>Choose...</option>
                                            <?php foreach ($get_all_categories as $key) 
                                            {
                                                ?>
                                                <option <?php if($key['category_id']==$get_subcategory_detail['category_id']){ echo "selected"; }?> value="<?php echo $key['category_id'];?>"><?php echo $key['name'];?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="form-group">

</div>
                                             <div class="form-group col-5 ml-3 mb-3">
                                            <label for="name" class="col-form-label s-12">Sub Course Category Name In English</label>
                                            <input name="name" placeholder="Enter Sub Category Name" class="form-control r-0 light s-12 " type="text" value="<?php echo $get_subcategory_detail['name'];?>" required>
                                        </div>
                                        <div class="col-md-5 ml-4">
                                    <label for="dob" class="col-form-label s-12 ml-1"> Sub Course Category Name In German</label>
                                                <input class="form-control r-0 light s-12 datePicker" placeholder="Enter Text Please" data-time-picker="false"
                                                    type="text" name="name_ingerman" value="<?php echo $get_subcategory_detail['name_ingerman'];?>">
                                </div>
                                        </div>
                                        
                                        
                                        <div class="form-row">
                                    <div class="col-md-11 ml-3">
                                        <div class="form-group m-0">
                                            <label for="no_of_parts" class="col-form-label s-12">Number Of Parts</label>
                                            <input name="no_of_parts" id='no_of_parts' placeholder="Enter Number Of Parts Here" class="form-control r-0 light s-12 " type="number" value="<?php echo $get_subcategory_detail['no_of_parts'];?>">
                                           
                                        </div>
                                    </div>
                                </div>

                                <div id='PartS'>
                                            <?php if($get_subcategory_detail['no_of_parts']){
                                    $parts=intval($get_subcategory_detail['no_of_parts']);
                                    $data=get_subcategory_part_detail($_GET['id']);
// var_dump($data);
                                     for ($i=0; $i <$parts ; $i++) {
                                    
                                     $name=$data[$i]['name'];
                                  $parts_ingerman=$data[$i]['parts_name_ingerman'];
                                     $a=$i+1;    
                                      //      # code...
                                     //  } ?>
                                 <!--     <div class="form-row">
                                        <div class="col-md-8 ml-3">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">Part <?php echo $a;?>  Name</label>
                                                <input name="part_name[]" placeholder="Enter Part <?php echo $a;?> Name" class="form-control r-0 light s-12 " type="text"  value="<?php echo $name;?>" required>
                                                <input type="hidden" name="part_no[]" value='<?php echo $a;?>'>
                                            </div>
                                        < -->
                                
                                    <div class="col-md-15 form-row ml-3"><div class></div><div class="col-md-5"><label for="name" class="col-form-label s-12">Part <?php echo $a;?> Name In English</label><input name="part_name[]" placeholder="Enter Part <?php echo $a;?> Name" class="form-control r-0 light s-12 " type="text" value="<?php echo $name;?>" required=""></div>
                                    <div class="col-md-5 ml-5"><label for="name" class="col-form-label s-12">Part <?php echo $a;?> Name In German</label><input name="parts_name_ingerman[]" placeholder="Enter Part <?php echo $a;?> Name" class="form-control r-0 light s-12 " type="text"  value="<?php echo $parts_ingerman;?>" required="">
                                        <input type="hidden" name="part_no[]" value='<?php echo $a;?>'></div></div>

                                     <?php } } ?>

                                      </div>
                                        
                                          <div class="form-group col-5 ml-3 ">
                                            <label for="description" class="col-form-label s-12 p-2">Description In English</label>
                                            <textarea class="form-col-6" name="description" placeholder="Description..." rows="7" required=""
                                             style="width: 500px;"><?php echo $get_subcategory_detail['description'];?></textarea>
                                          </div>
                                          <div class="form-group col-5 ml-3 ">
                                            <label for="description" class="col-form-label s-12 p-2">Description In German</label>
                                            <textarea class="form-col-6" name="description_german" placeholder="Description..." rows="7"  required="" 
                                              style=" width: 500px;"><?php echo $get_subcategory_detail['description_german'];?></textarea>
                                        </div>

                                    
                                </div>
                            </div>
                            <hr>
                            <span style="color: red;" id="error"><?php if(isset($error)) { echo $error;}?></span>
                            <div class="card-body">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../includes/footer.php';
?>
<script type="text/javascript">
    $("input").click(function() {
        $('#error').css("display", "none");
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('#no_of_parts').on('keyup change',function(){
          // alert("dd");
          var no_of_parts = $(this).val();
          console.log(no_of_parts);
          var id='<?php echo $_GET['id'];?>';
          console.log(id);
           $.ajax({
            type: "GET",
            url: "GetSubCategoryPartDetail.php?id="+id,
            async: false,
             dataType: "json",
            success: function(text) {
                 var data = jQuery.parseJSON(text);
                 console.log(data);
             
          $('#PartS').empty();
          if(data){
          for (var i = 0; i < no_of_parts; i++) {
              var a=i+1;
              if(data[i]){
              var name=data[i]['name'];
              }else{
                var name="";
              }
              
              $('#PartS').append('<div id="PartS"><div class="col-md-14 form-row"><div class></div><div class="col-md-5 ml-3"><label for="name" class="col-form-label s-12">Part '+a+' Name In English</label><input name="part_name[]" placeholder="Enter Part '+a+' Name" class="form-control r-0 light s-12 " type="text" required=""></div><div class="col-md-5 ml-4"><label for="name" class="col-form-label s-12">Part '+a+' Name In German</label><input name="parts_name_ingerman[]" placeholder="Enter Part '+a+' Name" class="form-control r-0 light s-12 " type="text" required=""><input type="hidden" name="part_no[]" value="1"></div></div></div>')
          }
          }else if(data=='1'){
              for (var i = 0; i < no_of_parts; i++) {
                 var a=i+1;
              $('#PartS').append('<div id="PartS"><div class="col-md-14 form-row"><div class></div><div class="col-md-5 ml-3"><label for="name" class="col-form-label s-12">Part '+a+' Name In English</label><input name="part_name[]" placeholder="Enter Part '+a+' Name" class="form-control r-0 light s-12 " type="text" required=""></div><div class="col-md-5 ml-4"><label for="name" class="col-form-label s-12">Part '+a+' Name In German</label><input name="parts_name_ingerman[]" placeholder="Enter Part '+a+' Name" class="form-control r-0 light s-12 " type="text" required=""><input type="hidden" name="part_no[]" value="1"></div></div></div>')
          }
          }
          }
        });

        });
    // });
    });
</script>