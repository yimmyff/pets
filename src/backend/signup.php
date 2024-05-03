<?php
include ('../../config/database.php');
 $fullname = $_POST['fname'];
 $email = $_POST['email'];
 $passwd = $_POST['passwd'];
$enc_pass = md5 ($passwd);


$sql_validate_email =" SELECT * FROM users WHERE email = '$email'";
$result = pg_query($conn,$sql_validate_email);
$total = pg_num_rows($result);
if ($total > 0){
    
    echo "<script>alert('email already exists')</script>";
    header("refresh:0;url=../signup.html");
} else {

    $sql="INSERT INTO  users (fullname,email,password) VALUES ('$fullname', '$email','$enc_pass')";
    $ans = pg_query($conn,$sql);
    if ($ans){
        echo "<script>alert('user has been registered')</script>";
        header("refresh:0;url=../index.html");

    }else {
        echo"error".pg_last_error();
    }
}

pg_close($conn);
 //echo "email :" .$email. "<br>" ;
 //echo "passwd :" .$passwd ; 
 //echo "your password enc :". $enc_pass;
?>
