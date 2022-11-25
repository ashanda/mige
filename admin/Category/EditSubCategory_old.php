<?php
include '../includes/header.php';
$id = $_REQUEST['id'];
$get_subcategory_detail = get_subcategory_detail($id);
$get_all_categories = get_all_categories();


if(isset($_POST['submit']))
{
	$id = $_GET['id'];
  $name = $_POST['name'];
  $category_id = $_POST['category_id'];
  $description = $_POST['description'];
  $no_of_parts=$_POST['no_of_parts'];
  $part_no=$_POST['part_no'];
  $part_name=$_POST['part_name'];
	$creation_time = time();
	$check_subcategory_existance = check_subcategory_existance($id,$name);
	$category_name = strtolower($check_subcategory_existance['name']);
	if($category_name==strtolower($name))
	{
		$error = 'This Sub Category Name Is Already Exists';
	}
    else
    {
        $edit_subcategory = edit_subcategory($name,$id,$category_id,$description,$no_of_parts);
        if($edit_subcategory)
        {
             delete_sub_category_part_name($id);
            foreach ($part_name as $key => $value) {
                $part_no_val=$_POST['part_no'][$key];
               
             add_subcategory_part_name($id,$value,$part_no_val,$creation_time);
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
                                    <div class="col-md-8">
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
                                        <div class="form-group m-0">
                                            <label for="name" class="col-form-label s-12">Sub Course Category Name</label>
                                            <input name="name" placeholder="Enter Sub Category Name" class="form-control r-0 light s-12 " type="text" value="<?php echo $get_subcategory_detail['name'];?>" required>
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="no_of_parts" class="col-form-label s-12">Number Of Parts</label>
                                            <input name="no_of_parts" placeholder="Enter Number Of Parts Here" class="form-control r-0 light s-12 " type="number"  id="no_of_parts" value="<?php echo $get_subcategory_detail['no_of_parts'];?>" required>
                                        </div>
                                        <div id='PartS'>
                                            <?php if($get_subcategory_detail['no_of_parts']){
                                    $parts=intval($get_subcategory_detail['no_of_parts']);
                                    $data=get_subcategory_part_detail($_GET['id']);
// var_dump($data);
                                     for ($i=0; $i <$parts ; $i++) {
                                    
                                     $name=$data[$i]['name'];
                                    
                                     $a=$i+1; 
                                     //      # code...
                                     //  } ?>
                                     <div class="form-group m-0"><label for="name" class="col-form-label s-12">Part <?php echo $a;?>  Name</label><input name="part_name[]" placeholder="Enter Part <?php echo $a;?> Name" class="form-control r-0 light s-12 " type="text"  value="<?php echo $name;?>" required>
                                        <input type="hidden" name="part_no[]" value='<?php echo $a;?>'></div>
                                     <?php } } ?>
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="description" class="col-form-label s-12">Description</label>
                                            <textarea class="form-control" name="description" placeholder="Description..." rows="7" required><?php echo $get_subcategory_detail['description'];?></textarea>
                                        </div>
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
              
              $('#PartS').append('<div class="form-group m-0"><label for="name" class="col-form-label s-12">Part '+a+' Name</label><input name="part_name[]" placeholder="Enter Part '+a+' Name" class="form-control r-0 light s-12 " type="text" value="'+name+'" required><input type="hidden" name="part_no[]" value='+a+'></div>')
          }
          }else if(data=='1'){
              for (var i = 0; i < no_of_parts; i++) {
                 var a=i+1;
              $('#PartS').append('<div class="form-group m-0"><label for="name" class="col-form-label s-12">Part '+a+' Name</label><input name="part_name[]" placeholder="Enter Part '+a+' Name" class="form-control r-0 light s-12 " type="text" value="'+name+'" required><input type="hidden" name="part_no[]" value='+a+'></div>')
          }
          }
          }
        });

        });
    // });
    });
</script>