<?php
include '../includes/header.php';
$get_all_categories = get_all_categories();
$count = count($get_all_categories);
include('../includes/pagination.php');
$records=array_slice($get_all_categories, $start,$limit);

?>
<div class="page  has-sidebar-left height-full">
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
                                            <th>Course Category Name</th>
                                            <th>Number Of Parts</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($records as $key) 
                                        {
                                            $s_num = $key['s_num'];
                                            $name = $key['name'];
                                            $no_of_parts = $key['no_of_parts'];
                                            $category_id = $key['category_id'];
                                            ?>
                                            <tr>
                                                <td><?php echo $s_num;?></td>
                                                <td><?php echo $name;?></td>
                                                <td><?php echo $no_of_parts;?></td>
                                                <td>
                                                    <a href="EditCategory.php?category_id=<?php echo $category_id;?>"><i class="icon-pencil iconspace"></i></a>
                                                    <a href="SubCategoryList.php?category_id=<?php echo $category_id;?>"><i class="icon-eye iconspace"></i></a>

                                                    <a onclick="delete_record('<?php echo $category_id;?>')" href="#"><i class="icon-trash mr-3 iconspace"></i></a>
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

                <nav class="my-3" aria-label="Page navigation" style="display: flex;justify-content: center;">
                    <ul class="pagination">
                        <?php echo $pagination;?>
                        <!-- <li class="page-item"><a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">Next</a>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php
include '../includes/footer.php';
?>
<script type="text/javascript">
function delete_record(category_id)
{

    if(confirm('Are You Sure?'))
    {
      var url;
      url = "Delete.php";
         
     // ajax adding data to database
      $.ajax({
        url : url,
        type: "POST",
        data: {category_id:category_id,type:'category'},
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
          if(data.status==2)
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