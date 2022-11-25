<?php
include '../includes/header.php';
$category_id = $_REQUEST['category_id'];
$get_subcategories_by_category_id = get_subcategories_by_category_id($category_id);
$count = count($get_subcategories_by_category_id);
include('../includes/pagination.php');
$records=array_slice($get_subcategories_by_category_id, $start,$limit);

?>
<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-apps"></i>
                        Sub Course Category
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
                                            <th>Sub Course Category Name</th>
                                            <th>Description</th>
                                            <th>Number Of Parts</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($records as $key) 
                                        {
                                            $s_num = $key['s_num'];
                                            $name = $key['name'];
                                            $description = $key['description'];
                                            $id = $key['id'];
                                            ?>
                                            <tr>
                                                <td><?php echo $s_num;?></td>
                                                <td><?php echo $name;?></td>
                                                <td><?php if(strlen($description) > 170) { $description = substr($description, 0, 170) . '...'; } echo $description;?></td>
                                                 <td><?php echo $key['no_of_parts'];?></td>
                                                <td>
                                                    <a href="EditSubCategory.php?id=<?php echo $id;?>"><i class="icon-pencil iconspace"></i></a>
                                                    <a onclick="delete_record('<?php echo $id;?>')" href="#"><i class="icon-trash mr-3 iconspace"></i></a>
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
function delete_record(id)
{
    if(confirm('Are You Sure?'))
    {
      var url;
      url = "Delete.php";
         
     // ajax adding data to database
      $.ajax({
        url : url,
        type: "POST",
        data: {id:id,type:'subcategory'},
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
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