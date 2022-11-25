<?php
include '../includes/header.php';
//$get_all_categories = get_all_categories();

if(isset($_POST['submit']))
{
	$username = $_POST['username'];
    $email = $_POST['email'];
    //$category_id = $_POST['category_id'];
    $category_id = '';
    $about = $_POST['about'];
	$creation_time = time();
	$password=random_strings(6);

    // if($email){
    //     $query="SELECT * from tbl_instructor  where email='$email'";
    //     $res=mysqli_query($conn,$query);
    //     $row=mysqli_num_rows($res);
    //     // var_dump($row);
    // }
    // else{

    $add_instructor = add_instructor($username,$email,$password,$creation_time,$category_id,$about);
    if($add_instructor)
    {
       
        // $email_message="Hello ".$username" ,Please check below credentials to access and update student details.<br>
        // Email:\n\n $email \n\npassword:\n\n $password \n\n <br> url: click here <br> Note: This is one time password, use these credentials to change password.<br>Thank you & Regard<br>Team FahrschuleStar"
        $email_message="Hello komal,\nPlease check below credentials to access and update student details.\nEmail:$email \npassword:$password\nurl: <a href='https://www.dharmani.com/FahrschuleStarWebSite/admin/' target='_blank'>click here</a>\n\nNote: This is one time password, use these credentials to change password.\nThank you & Regard\nTeam FahrschuleStar";
        
        $message=nl2br($email_message);
        $to= $email;
        // $to="dharmaniz.komal@gmail.com";
        $subject = "Account Information For ".$username;
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: support@dharmani.com";


        $success = mail($to,$subject,$message,$headers);  
        if($success){
      
        echo "<script>window.location.href='index.php';</script>";
        exit();
    }
    }
    else
    {
        $error = 'There is someting wrong while adding new category';
    }
   // }
}
?>
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
                        <a class="nav-link active"  href="#" ><i class="icon icon-plus-circle"></i>Add New Instructor</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form action="AddInstructor.php" method="POST" autocomplete="off">
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <?php echo $result; ?>    
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="username" class="col-form-label s-12">User Name</label>
                                            <input name="username" placeholder="Enter User Name" class="form-control r-0 light s-12 " type="text" required>
                                        </div>
                                         <div class="form-group m-0">
                                            <label for="Email" class="col-form-label s-12">Email</label>
                                            <input name="email" placeholder="Enter Email" class="form-control r-0 light s-12 " type="email" required>
                                        </div>
                                        <!--  <div class="form-group m-0">
                                            <label for="password" class="col-form-label s-12">Password</label>
                                            <input name="password" placeholder="Enter Password" class="form-control r-0 light s-12 " type="text" required>
                                        </div> -->
                                        <!-- <div class="form-group m-0">
                                            <label for="category_id" class="col-form-label s-12">Category Name</label>
                                            <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="category_id">
                                                <option selected required>Choose...</option>
                                                <?php foreach ($get_all_categories as $key) 
                                                {
                                                    ?>
                                                    <option value="<?php echo $key['category_id'];?>"><?php echo $key['name'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div> -->
                                        <div class="form-group m-0">
                                            <label for="about" class="col-form-label s-12">About</label>
                                            <textarea class="form-control" name="about" placeholder="About..." rows="7" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <span style="color: red;" id="error"><?php if(isset($error)) { echo $error;}?></span>
                            <div class="card-body">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>

                                <!-- <div class="alert alert-success" id="alert">
                               <strong>Success!</strong>Instructor added successfully. Credentials sent over mail to the provided email.
                               </div> -->
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

    $('#submit').click(function(){
        alert("Instructor added successfully. Credentials sent over mail to the provided email.");
    })
</script>