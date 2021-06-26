<?php

session_start();
header('location:login.php');

$con = mysqli_connect('localhost','root','','userregistration');

if(isset($_POST['reg'])){
    $name=$_POST['user'];
    $pass=$_POST['password'];
}
$pass_hash= password_hash($pass,PASSWORD_DEFAULT);
$s = "SELECT * FROM usertable WHERE name = '$name'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);
if($num == 1){
    echo '<script language="javascript">';
    echo 'alert("Username already taken")';
    echo '</script>';
}
else{
    $reg= "insert into usertable(name,password) value ('$name','$pass_hash')";
    mysqli_query($con, $reg);
    echo "<script>alert('.Registration Successful.')</script>";
} 
?>
