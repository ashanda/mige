<?php
include '../includes/header.php';
//$get_all_categories = get_all_categories();
$get_instructor_detail = get_instructor_detail($_GET['instructor_id']);

if(isset($_POST['submit']))
{
	$instructor_id = $_POST['instructor_id'];
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    //$category_id = $_POST['category_id'];
    $category_id = '';
    $about = mysqli_real_escape_string($conn,$_POST['about']);
	
    $edit_instructor = edit_instructor($username,$category_id,$about,$instructor_id);
    if($edit_instructor)
    {
        echo "<script>window.location.href='index.php';</script>";
        exit();
    }
    else
    {
        $error = 'There is someting wrong while editing instructor';
    }
}
?>
<style type="text/css">
    .act{
            /*border: 0;*/
    /*background: 0 0;*/
    border-bottom: 3px solid #da3732 !important ;
    }
</style>
<div class="page has-sidebar-left  height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-account_box"></i>
                        Instructor
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link"  href="index.php"><i class="icon icon-home2"></i>All Instructors</a>
                    </li>
                    <li>
                        <a class="nav-link act"  href="#" ><i class="icon icon-plus-circle"></i>Edit Instructor</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form action="EditInstructor.php" method="POST">
                        <div class="card no-b  no-r">
                            <input name="instructor_id" placeholder="Enter User Name" class="form-control r-0 light s-12 " type="hidden" value="<?php echo $_GET['instructor_id'];?>" required>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label for="username" class="col-form-label s-12">User Name</label>
                                            <input name="username" placeholder="Enter User Name" class="form-control r-0 light s-12 " type="text" value="<?php echo $get_instructor_detail['username'];?>" required>
                                        </div>
                                         <div class="form-group m-0">
                                            <label for="Email" class="col-form-label s-12">Email</label>
                                            <input name="email" placeholder="Enter Email" class="form-control r-0 light s-12 " type="email" value="<?php echo $get_instructor_detail['email'];?>"required disabled>
                                        </div>
                                      <!--    <div class="form-group m-0">
                                            <label for="password" class="col-form-label s-12">Password</label>
                                            <input name="password" placeholder="Enter Password" class="form-control r-0 light s-12 " type="text" required>
                                        </div> -->
                                        <!-- <div class="form-group m-0">
                                            <label for="category_id" class="col-form-label s-12">Category Name</label>
                                            <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="category_id">
                                                <option required>Choose...</option>
                                                <?php foreach ($get_all_categories as $key) 
                                                {
                                                    ?>
                                                    <option <?php if($key['category_id']==$get_instructor_detail['category_id']){ echo "selected"; }?> value="<?php echo $key['category_id'];?>"><?php echo $key['name'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div> -->
                                        <div class="form-group m-0">
                                            <label for="about" class="col-form-label s-12">About</label>
                                            <textarea class="form-control" name="about" placeholder="About..." rows="7" required><?php echo $get_instructor_detail['about'];?></textarea>
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