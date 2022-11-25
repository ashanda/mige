<?php
// session_start();
 include 'header.php';

// include '../Config/Connection.php';
// include '../includes/Functions.php';
$id = $_SESSION['id'];
?>
<div class="page  has-sidebar-left height-full">
    <main>
        <div id="primary" class="p-t-b-100 height-full ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mx-md-auto">
                        <div class="text-center">
                            <img src="../assets/img/myweb/logo.png" alt="" style="max-height: 150px;">
                            <h3 class="mt-2">Change Password</h3>
                        </div>
                        <form action="https://xvelopers.com/demos/html/paper-panel/dashboard2.html">
                            <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                <input type="password" class="form-control form-control-lg"
                                    placeholder="Enter New Password" id="password" name="password">
                                <span id="empty_password" style="color: #dc3545; display: none;" ></span>
                            </div>
                            
                            <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                <input type="password" class="form-control form-control-lg"
                                    placeholder="ReEnter New Password" id="new_password">
                                <span id="password_verify" style="color: #dc3545; display: none;" ></span>
                            </div>
                            <span id="email_message" style="color: #27ba4e; display: none;" >Password Changed Successfully</span>
                            <button type="button" class="btn btn-primary btn-lg btn-block continue_button" onclick="change_password('<?php echo $id;?>')" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #primary -->
    </main>
</div>


<?php include '../includes/footer.php';?>
<script type="text/javascript">
 $("#new_password").click(function() {
        $('#password_verify').css("display", "none");
    });
    $("#password").click(function() {
        $('span#empty_password').css("display", "none");
    });

    $('#password').keypress(function (e) {
        $('span#empty_password').css("display", "none");
    });
    $('#new_password').keypress(function (e) {
        $('span#password_verify').css("display", "none");
    });
    $("#new_password").click(function() {
        var password = $('#password').val();
        var new_password = $('#new_password').val();
        if(password=='')
        {
            $('span#empty_password').text('Password cannot be blank');
            $('span#empty_password').css("display", "block");
            //alert('Please enter the password');
            $('#password').focus();
        }
        else
        {
            count = password.length;
            //alert(count);
            if(count<'6')
            {
                $('span#empty_password').text('Password cannot be less than 6 characters');
                $('span#empty_password').css("display", "block");
                //alert('Please enter minimum 4 digit password');
                $('#password').focus();
            }
        }
    });
    function change_password(id)
    {
        if(id=='')
        {
            window.location.href="../index.php";
        }
        else
        {
            var password = $('#password').val();
            var new_password = $('#new_password').val();
            if(password=='')
            {
                $('span#empty_password').css("display", "block");
                $('span#empty_password').text('Password cannot be blank');
                $('#password').focus();
            }
            else if(new_password=='')
            {
                $('span#password_verify').css("display", "block");
                $('span#password_verify').text('Please enter confirm password');
                //alert('Please enter the password again');
                $('#new_password').focus();
            }
            else
            {
                count = password.length;
                //alert(count);
                if(count<'6')
                {
                    $('span#empty_password').css("display", "block");
                    $('span#empty_password').text('Password cannot be less than 6 characters');
                    //alert('Please enter minimum 4 digit password');
                    $('#password').focus();
                }
                else
                {
                    if(password!=new_password)
                    {
                        $('#password_verify').css("display", "block");
                        $('span#password_verify').text('New Password and Confirm Password must be the same.');
                        $('#new_password').focus();
                    }
                    else
                    {
                        $('#password_verify').css("display", "none");
                        $.ajax({
                            url : '../UpdateInstructorPassword.php',
                            type: "POST",
                            data: {id:id,password:password},
                            dataType: "JSON",

                            success: function(data)
                            {
                                if(data.status==1)
                                {  
                                    $('#password').val('');
                                    $('#new_password').val('');
                                    // $('span#email_message').css('display','block');
                                     alert('Password Changed Successfully');
                                }
                                
                                if(data.status==0) 
                                {
                                    alert('Failed to change the password');
                                }
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert('Error while changing the password');
                            }
                        });
                    }
                }
            }
        }
    }
</script>