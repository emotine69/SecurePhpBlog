<?php

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'userregistration');

if(isset($_POST['log'])){
    $name=$_POST['user'];
    $pass=$_POST['password'];
}
$s = "select * from usertable where name = '$name'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);

if($num == 1){
    while($row=mysqli_fetch_assoc($result)) {
        if(password_verify($pass,$row['password'])){
    $_SESSION['username'] = $name;
    $_SESSION['logged in']=time();

    header('location:welcome.php');
    die();
        }    
    }
}
else{
    header('location:login.php');
    die();
}
?>