<?php
include 'header.php';
include 'Functions.php';
//$user_id = $_SESSION['user_id'];

$password_session_token = $_GET['token'];
$q['query'] = "SELECT * FROM user WHERE password_session_token ='$password_session_token'";
$q['run'] = $conn->query($q['query']);
$q['result'] = $q['run']->fetch_assoc();
$user_id = $q['result']['user_id'];

if($user_id==NULL)
{
    echo "<script type='text/javascript'>
          alert('This link is expired');  
          window.location.href='login.php';
        </script>";
    exit();
}

 if ( $_SESSION['language'] =='en')
      {
        $run="SELECT `id`, `pageid`, `alias`, `inenglish` as detail FROM `page_content_translation`";

      }
      else
      {
        $run="SELECT `id`, `pageid`, `alias`, `ingerman` as detail FROM `page_content_translation`";
       
      }
     $result=$conn->query($run);
     $translation = array();
     while($row = mysqli_fetch_array($result))
    {
       $translation[$row['alias']]=$row['detail'];
    // echo "<pre>";  print_r($translation[$row['alias']]=$row['detail']);
                 
     }
?> 
<!--/Menu-->
<style type="text/css">
div#main
{
	padding-top:85px !important;
}
div#google_translate_element {
	display: none;
}
.form-group.form-check span input {
	height: 12px;
}
@media (max-width: 768px){
div#main {
	padding-top: 62px !important;
}
}


/*********************************success*****************/
.thank-you-msg {
    width: 100%;
    padding: 20px;
    text-align: center;
    max-width: 550px;
    margin: 40px auto;
}
.thank-you-msg img{
    width:76px;
    height:auto;
    margin:0 auto;
    display:block;
    margin-bottom:25px;
}

.thank-you-msg h1{
    font-size: 42px;
    margin-bottom: 25px;
    color:#5C5C5C;
}
.thank-you-msg p{
    font-size: 20px;
    margin-bottom: 27px;
    color:#5C5C5C;
}
.thank-you-msg h3.cupon-pop{
    font-size: 25px;
    margin-bottom: 40px;
    color:#222;
    display:inline-block;
    text-align:center;
    padding:10px 20px;
    border:2px dashed #ff6701;
    clear:both;
    font-weight:normal;
}
.thank-you-msg h3.cupon-pop span{
    color:#ff6701;
}
.thank-you-msg a{
    display: inline-block;
    margin: 0 auto;
    padding: 9px 20px;
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
    background-color: #8BC34A;
    border-radius: 17px;
}
.thank-you-msg a i{
    margin-right:5px;
    color:#fff;
}
</style>
<!--/Menu-->

<section class="team log-forms" style="background: url(https://webdesign-finder.com/edlane/wp-content/uploads/2019/04/slide01.jpg);">
    <div class="container">
        <div class="row no-margin forms-account justify-content-center">
            <div class="col-md-6 animatedParent forms-backgr" id="create">
                <div class="thank-you-msg" id="card-detail-change" style="display: none;">
                    <div class="succ-in">
                        <img src="images/success.png" alt="" style="max-width:80px;">
                        <p style="color:#48ad44;font-weight:bold;"><?=$translation['_password_changed_success_']?></p>    
                    </div>
                </div>
                <div id="change-password-form" class="form-acc">
                    <h3><?=$translation['_change_password_title_']?></h3>
                    <form method="POST" id="change_password_form">
                        <div class="form-group">
                            <label for="exampleInputPassword1"><?=$translation['_change_new_password_title_']?></label>
                            <input type="password" class="form-control" id="password" name="n-password" placeholder="********" required="required" autocomplete="off" />
                            <span id="empty_password" style=" display: none;" ></span>
                        </div>
						<div class="form-group">
                            <label for="exampleInputPassword1"><?=$translation['_change_confirm_new_password_title_']?></label>
                            <input type="password" class="form-control" id="new_password" name="c-password" placeholder="********" required="required" autocomplete="off" />
                            <span id="password_verify" style=" display: none;" ></span>
                        </div>
                        <p style="color:red"><?=$translation['_change_password_hint_']?></p>
                        <button onclick="change_password('<?php echo $user_id;?>')" type="button" class="read-more-btn">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- /Main content -->
<?php include 'footer-new.php';?> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$("#password").click(function() {
        $('span#empty_password').css("display", "none");
        $('#card-detail-change').css("display", "none");
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

    function change_password(user_id)
    {
        if(user_id=='')
        {
            window.location.href="login.php";
        }
        else
        {
            var password = $('#password').val();
            var new_password = $('#new_password').val();
            var token = '<?php echo $_GET['token'];?>';
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
                            url : 'GetPhpData.php',
                            type: "POST",
                            data: {user_id:user_id,password:password,token:token,type:"reset_password"},
                            dataType: "JSON",

                            success: function(data)
                            {
                                if(data.status==1)
                                {
                                    $('#card-detail-change').css("display","block");
                                    $('#change-password-form').css("display","none");
                                }
                                
                                if(data.status==0) 
                                {
                                    alert('Failed to change the password');
                                    window.location.reload(); 
                                }
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert('Error while changing the password')
                            }
                        });
                    }
                }
            }
        }
    }
</script>