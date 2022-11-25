<?php

include '../includes/header.php';

function get_all_translation()
{
    global $conn;
    $q['query'] = "SELECT * FROM translations ORDER BY id ASC";
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

$get_all_user = get_all_translation();
$count = count($get_all_user);
include('../includes/pagination.php');
$records=array_slice($get_all_user,$start,$limit);


?>



<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-apps"></i>
                        Translation
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
                                             <th>Id</th>
                                            <th>Alias</th>
                                            <th>In English</th>
                                            <th>In German</th>
                                            <!-- <th>Image</th> -->
                                           <!--  <th>Phone No.</th>
                                            <th>Address</th> -->
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($records as $key) 
                                        {
                                            // var_dump($key);
                                            $id = $key['id'];
                                            $alias = $key['alias'];
                                            $inenglish = $key['inenglish'];
                                            $ingerman=$key['ingerman'];
                                            
                                          
                                            ?>
                                            <tr>
                                                <td><?php echo $id;?></td>
                                                <td><?php echo $alias;?></td>
                                                <td><?php echo $inenglish;?></td>
                                                <td><?php echo $ingerman;?></td>
                                               
                                                
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