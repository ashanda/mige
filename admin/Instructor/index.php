<?php
include '../includes/header.php';
$get_all_insructors = get_all_insructors();

?>
<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-account_box"></i>
                        Instructors
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <form>
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                        <tr class="no-b">
                                            <th>SNo</th>
                                            <th>Instructor Name</th>
                                            <th>Email</th>
                                            <!-- <th>Image</th> -->
                                            <th>About</th>
                                            <!-- <th>Category</th> -->
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($get_all_insructors as $key) 
                                        {
                                            $s_num = $key['s_num'];
                                            $instructor_id = $key['instructor_id'];
                                            $username = $key['username'];
                                            $email = $key['email'];
                                            $profile_photo = $key['profile_photo'];
                                            $about = $key['about'];
                                            /*$category_id = $key['category_id'];
                                            $get_category_detail = get_category_detail($category_id);
                                            $category_name = $get_category_detail['name'];*/
                                            ?>
                                            <tr>
                                                <td><?php echo $s_num;?></td>
                                                <td><?php echo $username;?></td>
                                                <td><?php echo $email;?></td>
                                                <!-- <td><?php if($profile_photo) { ?> <img src="<?php echo BASE_URL.$profile_photo;?>"> <?php } ?></td> -->
                                                <td><?php echo $about;?></td>
                                                <!-- <td><?php echo $category_name;?></td> -->
                                                <td>
                                                    <a href="EditInstructor.php?instructor_id=<?php echo $instructor_id;?>"><i class="icon-pencil iconspace"></i></a>
                                                    <!--<a href="ViewInstructor.php?instructor_id=<?php echo $instructor_id;?>"><i class="icon-eye iconspace"></i></a> -->
                                                    <a onclick="delete_record('<?php echo $instructor_id;?>')" href="#"><i class="icon-trash mr-3 iconspace"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>                                        
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <nav class="my-3" aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav> -->
            </div>
        </div>
    </div>
</div>
<?php
include '../includes/footer.php';
?>
<script type="text/javascript">
function delete_record(instructor_id)
{
    if(confirm('Are You Sure?'))
    {
      var url;
      url = "../Category/Delete.php";
         
     // ajax adding data to database
      $.ajax({
        url : url,
        type: "POST",
        data: {instructor_id:instructor_id,type:'instructor'},
        dataType: "JSON",
        success: function(data)
        {
          if(data.status==1)
          {
            alert('Deleted Successfully');
            window.location.reload();
          }
          if(data.status==0) 
          {
           alert(data.message);
          }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error while Deleting');
        }
      });
    }
}
</script>