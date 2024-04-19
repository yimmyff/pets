<?php
include ('../../config/database.php');
 $fullname = $_POST['fname'];
 $email = $_POST['email'];
 $passwd = $_POST['passwd'];
$enc_pass = md5 ($passwd);

$sql="INSERT INTO  users (fullname,email,password) VALUES ('$fullname', '$email','$passwd')";

$ans = pg_query($conn,$sql);
if ($ans){
    echo "user has been created successfully";

}else {
    echo"error".pg_last_error();
}
pg_close($conn);
 //echo "email :" .$email. "<br>" ;
 //echo "passwd :" .$passwd ; 
 //echo "your password enc :". $enc_pass;
?>
