<?php
include 'header.php';
include 'Functions.php';
//$user_id = $_SESSION['user_id'];

include 'Config/Connection.php';


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



if($_SESSION['language']=='en'){
    $translations['_email_not_blank_'] = ['Email cannot be blank.'];
    $translations['_email_exists_'] = ['This email is already registered with us.'];
    $translations['_email_not_exists_'] = ['This email is not registered with us.'];
    $translations['_forget_mail_failed_'] = ['Failed to send mail.'];
    $translations['_forget_mail_success_'] = ['Your query has been submitted. Thank You for contacting us.'];
   
}else{
    $translations['_email_not_blank_'] = ['E-Mail darf nicht leer sein.'];
    $translations['_email_not_exists_'] = ['Diese E-Mail ist nicht bei uns registriert.'];
    $translations['_login_success_'] = ['Erfolgreich eingeloggt.'] ;
    $translations['_email_exists_'] = ['Diese E-Mail ist bereits bei uns registriert.'];
    $translations['_forget_mail_failed_'] = ['E-Mail konnte nicht gesendet werden.'];;
    $translations['_login_fail_'] = ['Email oder Passwort ist falsch.'];
   
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
</style>
<!--/Menu-->

<section class="team log-forms" style="background: url(https://webdesign-finder.com/edlane/wp-content/uploads/2019/04/slide01.jpg);">
    <div class="container">
        <div class="row no-margin forms-account">
            <div class="col-md-6 animatedParent forms-backgr" id="login">
                <div id="login-form" class="form-acc">
                    <h3><?php echo $translation['_login_title_'];?></h3>
                    <form id="login_form" method="post" action="GetPhpData.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo $translation['_Username_title_'];?></label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><?php echo $translation['_password_title_'];?></label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" required />
                        </div>
                        <input type="hidden" class="form-control" name="type" value="Login" />
                        <div class="form-group form-check">
                            <!-- <span class=""><input type="checkbox" class="form-check-input" id="exampleCheck1" /> <label class="form-check-label" for="exampleCheck1">Remain signed in</label></span> -->
                            <span class="forgot-pass" id="forgot-pass"><a href="#"><?php echo $translation['_Forgot_Password_title_'];?></a></span>
                        </div>
                        <button type="submit" class="read-more-btn"><?php echo $translation['_login_title_'];?></button>
                    </form>
                </div>
                <div class="forgot-form">
                    <h3><?php echo $translation['_Forgot_Password_title_'];?></h3>
                    <span class="forgot-pass"><?=$translation['_forgot_password_description_']?></span>
                    <form id="forgot_form" method="post" action="GetPhpData.php">
                        <div class="form-group">
                            <label for="exampleInputEmail2"><?php echo $translation['_email_title_'];?></label>
                            <input type="email" class="form-control" name="email1" id="email1" aria-describedby="emailHelp" required />
                            <span id="email_sent" style=" display: none;" ><?php echo $translation['_reset_password_description_'];?><!-- Please check your email. We've emailed you a link to reset your password. --></span>
                            <span id="email_not_registered" style="display: none;" ></span>
                        </div>
                       
                        <input type="hidden" class="form-control" name="type" value="forgot-password" />
                        <div class="form-group form-check">
                            <!-- <span class=""><input type="checkbox" class="form-check-input" id="exampleCheck1" /> <label class="form-check-label" for="exampleCheck1">Remain signed in</label></span> -->
                            <span class="forgot-pass" id="login-div"><a href="#"><?php echo $translation['_loginback_title_'];?></a></span>
                        </div>
                        <button type="button" onclick="check_email()" class="read-more-btn continue_button"><?php echo $translation['_forget_submit_title_'];?></button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 animatedParent forms-backgr" id="create">
                <form method="POST" id="signup_form" action="GetPhpData.php">
                <div id="register-form" class="form-acc">
                    <h3><?php echo $translation['_New_customer_title_'];?> </h3>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo $translation['_email_title_'];?></label>
                            <input type="email" required class="form-control" id="email" name="email" aria-describedby="emailHelp" />
                            <span id="error"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><?php echo $translation['_signup_password_title_'];?></label>
                            <input type="password" class="form-control" id="password" name="password" required />
                        </div>
                        <div class="form-group form-check">
                            <p><?php echo $translation[' _personal_data_to_carry_out_title_ '];?>
                               </a>.
                            </p>
                        </div>
                        <input type="hidden" name="type" id="type" value="signup">
                        <button type="submit" class="read-more-btn"><?php echo $translation['_Create_Account_title_'];?></button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
</div>
<!-- /Main content -->
<?php include_once 'footer-new.php';?> 

<script type="text/javascript">
$(document).ready(function(){

    $('#login_form').submit(function(e){
       e.preventDefault();

        $.ajax({
            url : 'GetPhpData.php',
            type: "POST",
            data: $('#login_form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                alert(data.message);
                if(data.status==1)
                {
                    window.location.href = 'book/';
                }
                else
                {
                    $('#exampleInputEmail1').val('');
                    $('#exampleInputEmail1').focus();
                    $('#exampleInputPassword1').val('');
                } 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert(errorThrown);
            }
        });
    });

    function submitHandler(){
        var email = $('#email').val();
        $.ajax({
            url : 'GetPhpData.php',
            type: "POST",
            data: {email:email,type:'check_user'},
            dataType: "JSON",
            success: function(data)
            {
                console.log(data);
                if(data.status==1)
                {
                    $('#email').val('');    
                    $('#password').val('');    
                    $('#error').css('color','red');
                    $('#error').text(data.message);
                    return false;
                }
                else
                {

                    $("#signup_form").unbind('submit').submit();
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert(textStatus);
            }
        });
        return false;//This will prevent the form to submit
    };

    $("#signup_form").submit(submitHandler);
});
$('span#forgot-pass').click(function(){
    $('div#login-form').hide();
     $('.forgot-form').show();
});

$('span#login-div').click(function(){
    $('div#login-form').show();
     $('.forgot-form').hide();
});

$("#email1").click(function(){

    $('#email_sent').css("display", "none");
    $('#email_not_registered').css("display", "none");

  });
function check_email()
{
    var email = $('#email1').val();
    if(email=='')
    {
      $('#email_not_registered').css("display", "block");
      $('span#email_not_registered').text('<?=$translations["_email_not_blank_"]?>');
      //alert('Please fill your email');
      $('#email1').focus();
    }
    else
    {
      $.ajax({
        url : 'GetPhpData.php',
        type: "POST",
        data: {email:email,type:'forgot-password'},
        dataType: "JSON",

        success: function(data)
        {
            if(data.status==1)
            {
              $('#email_sent').css("display", "block");
             // $(".continue_button").hide();
              //window.location.href="confirm_password.php?token="+data.session_token;
            }
          
            if(data.status==0) 
            {
              $('#email_not_registered').css("display", "block");
              $('span#email_not_registered').text('<?=$translations['_email_exists_'][0]?>');
              //$(".continue_button").hide();
             // window.location.href="forget_password_email.php?error=1";  
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('<?=$translations["_forget_mail_failed_"][0]?>');
        }
      });
    }
}
</script>