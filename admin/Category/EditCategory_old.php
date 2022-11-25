<?php
include '../includes/header.php';
$category_id = $_GET['category_id'];
$get_category_detail = get_category_detail($category_id);
$name = $get_category_detail['name'];
$no_of_parts = $get_category_detail['no_of_parts'];
$class_icon=$get_category_detail['class_icon'];
function get_category_image_base_64($image)
{
   $dir='CategoryImage/';

    if(!is_dir($dir))
    {
     mkdir( 'CategoryImage/',0777,true);
    }

    $image_name = uniqid().'_'.time().'.png';

    $image   = str_replace('data:image/png;base64,', '', $image); 
    $image   = str_replace(' ', '+', $image);
    $data  = base64_decode($image);
    $file  = 'CategoryImage/'.$image_name;
    $success = file_put_contents($file, $data);
    return $success ? $image_name : 'some problem occured';
}
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
if(isset($_POST['submit']))
{

	$name = $_POST['name'];
    $no_of_parts = $_POST['no_of_parts'];
    $category_id = $_POST['category_id'];
    $class_icon=$_POST['class_icon'];
	$check_category_existance = check_category_existance($category_id,$name);
	$category_name = strtolower($check_category_existance['name']);
    $part_name=$_POST['part_name'];
    $creation_time=time();
    $part_no=$_POST['part_no'];
    // $a=explode(';base64,', $class_icon); 
    // if ($class_icon != "")
    // {
    // $class_icon = get_category_image_base_64($a[1]);
 
    // $update_image = $class_icon;
    // }
    // else{
    // $update_image=$get_category_detail['class_icon'];  
    // }
	if($category_name==strtolower($name))
	{
		$error = 'This Category Name Is Already Exists';
	}
    else
    {
        $edit_category = edit_category($name,$category_id,$no_of_parts,$class_icon);
        if($edit_category)
        {
             delete_part_name($category_id);
             foreach ($part_name as $key => $value) {
           $part_no_val=$part_no[$key];
           add_category_part_name($category_id,$value,$creation_time,$part_no_val);
        }
       
            echo "<script>window.location.href='index.php';</script>";
            exit();
        }
        else
        {
            $error = 'There is someting wrong while editing category';
        }
    }
}
?>
<style type="text/css">
    .act{
            /*border: 0;*/
    /*background: 0 0;*/
    border-bottom: 3px solid #da3732 !important ;
    }
     #icon {
  margin: 0 0 10px;
}

.chosen-container {
  text-align: left; // overrides body text-align
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-yaml/3.6.0/js-yaml.min.js"></script>
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
                        <a class="nav-link"  href="AddCategory.php" ><i class="icon icon-plus-circle"></i> Add Course Category</a>
                    </li>
                    <li>
                        <a class="nav-link act"  href="#" ><i class="icon icon-pencil iconspace"></i> Edit Course Category</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form action="EditCategory.php" method="POST">
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label for="name" class="col-form-label s-12">Course Category Name</label>
                                            <input name="name" placeholder="Enter Category Name" class="form-control r-0 light s-12 " type="text" value="<?php echo $name;?>">
                                            <input name="category_id" class="form-control r-0 light s-12" value="<?php echo $category_id;?>" type="hidden">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label for="no_of_parts" class="col-form-label s-12">Number Of Parts</label>
                                            <input name="no_of_parts" id='no_of_parts' placeholder="Enter Number Of Parts Here" class="form-control r-0 light s-12 " type="number" value="<?php echo $no_of_parts;?>">
                                        </div>
                                    </div>
                                </div>
                                 <div id='PartS'> <?php if($no_of_parts){
                                    $parts=intval($no_of_parts);
                                    $data=get_category_part_detail($_REQUEST['category_id']);
                                   
                                     for ($i=0; $i <$parts ; $i++) {
                                    
                                     $name=$data[$i]['name'];
                                    
                                     $a=$i+1; 
                                     //      # code...
                                     //  } ?>
                                     <div class="form-row"><div class="col-md-8"><div class="form-group m-0"><label for="name" class="col-form-label s-12">Part <?php echo $a;?>  Name</label><input name="part_name[]" placeholder="Enter Part <?php echo $a;?> Name" class="form-control r-0 light s-12 " type="text"  value="<?php echo $name;?>" required><input type="hidden" name="part_no[]" value='<?php echo $a;?>'></div></div></div>
                                     <?php } } ?></div>

                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label for="class_icon" class="col-form-label s-12">Icon</label>
                                            <!-- <div id="icon"></div> -->
                                           <select id="select" name="class_icon" class="form-control r-0 light s-12 " value="<?php echo $class_icon;?>"></select>
                                            <!-- <input name="class_icon" placeholder="Enter icon class" class="form-control r-0 light s-12 " type="text" value="<?php echo $class_icon;?>"> -->
                                        </div>
                                    </div>
                                </div>
                               <!--  <div class="col-md-3 offset-md-1">
                                        <input hidden id="file" name="class_icon"/>
                                        <div class="dropzone dropzone-file-area pt-4 pb-4" id="fileUpload" style="margin-top: -76px;padding:0px;">
                                            <div class="dz-default dz-message">
                                                <?php if($class_icon){?>
                                                <span> <img src="<?php echo BASE_URL.'/FahrschuleStarWebSite/admin/Category/CategoryImage/'.$class_icon;?>"></span><?php }else{?>
                                                <span>Drop A passport size icon of category</span>
                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div> -->
                                <!-- </div> -->
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
    $.get('https://raw.githubusercontent.com/FortAwesome/Font-Awesome/fa-4/src/icons.yml', function(data) {
  var parsedYaml = jsyaml.load(data);
  var class_icon='<?php echo $class_icon;?>';
    $.each(parsedYaml.icons, function(index, icon){
        var optionval='fa fa-' + icon.id;
     
        if(optionval==class_icon){
            $('#select').append('<option value="fa-' + icon.id + '" selected >' + icon.id + '</option>');
        }else{
    $('#select').append('<option value="fa-' + icon.id + '" >' + icon.id + '</option>');
}
  });
  
  $("#select").chosen({
    enable_split_word_search: true,
        search_contains: true 
  });
    $("#icon").html('<i class="fa fa-2x ' + $('#select').val() + '"></i>');
});

/* Detect any change of option*/
$("#select").change(function(){
  var icono = $(this).val();
    $("#icon").html('<i class="fa fa-2x ' + icono + '"></i>');
});
</script>

<script type="text/javascript">
    $(document).ready(function(){
        
        $('#no_of_parts').on('keyup change',function(){
          var no_of_parts = $(this).val();
          console.log(no_of_parts);
          var category_id='<?php echo $_GET['category_id'];?>';
          console.log(category_id);
           $.ajax({
            type: "GET",
            url: "GetCategoryPartDetail.php?category_id="+category_id,
            async: false,
            success: function(text) {
                 var data = jQuery.parseJSON(text);
             
          $('#PartS').empty();
          for (var i = 0; i < no_of_parts; i++) {
              var a=i+1;
              if(data[i]){
              var name=data[i]['name'];
              }else{
                var name="";
              }
              
              $('#PartS').append('<div class="form-row"><div class="col-md-8"><div class="form-group m-0"><label for="name" class="col-form-label s-12">Part '+a+' Name</label><input name="part_name[]" placeholder="Enter Part '+a+' Name" class="form-control r-0 light s-12 " type="text" value="'+name+'" required><input type="hidden" name="part_no[]" value='+a+'></div></div></div>')
          }
          }
        });

        });
    // });
    });
</script>