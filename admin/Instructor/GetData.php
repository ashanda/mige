<?php
include '../Config/Connection.php';
include '../includes/Functions.php';
// var_dump($_POST);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    //$category_id = $_POST['category_id'];
    // $category_id = '';
    $about = mysqli_real_escape_string($conn,$_POST['about']);
    $creation_time = time();
    $password=random_strings(6);

    // if($email){
        $query="SELECT * from tbl_instructor  where email='$email'";
       $result = $conn->query($query);
// if($id==""){
if($result->num_rows>0 ) {
echo"1";
}

    // }
    else{

    $add_instructor = add_instructor($username,$email,$password,$creation_time,$category_id,$about);
    if($add_instructor)
    {
       
        // $email_message="Hello ".$username" ,Please check below credentials to access and update student details.<br>
        // Email:\n\n $email \n\npassword:\n\n $password \n\n <br> url: click here <br> Note: This is one time password, use these credentials to change password.<br>Thank you & Regard<br>Team FahrschuleStar"
        $email_message="Hello ".$username.",\nPlease check below credentials to access your instructor details.\nEmail: $email \npassword: $password\nurl: <a href='https://www.fahrschule-star.ch/admin/' target='_blank'>click here</a>\n\nNote: This is one time password, use these credentials to change password.\nThank you & Regard\nTeam FahrschuleStar";
        
        $message=nl2br($email_message);
        $to= $email;
        // $to="dharmaniz.komal@gmail.com";
        $subject = "Account Information For ".$username;
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: info@fahrschule-star.ch";


        $success = mail($to,$subject,$message,$headers);  
        if($success){
      echo"2";
        // echo "<script>window.location.href='index.php';</script>";
        exit();
    }
    }
    else
    {
        echo "3";
        // $error = 'There is someting wrong while adding new category';
    }
}