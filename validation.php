<?php

session_start();

$con = mysqli_connect('localhost','root','','userregistration');

// mysqli_select_db($con,'userregistration');

if(isset($_POST['log'])){
    $name=$_POST['user'];
    $pass=$_POST['password'];
}

$sth = $con->prepare("select * from user_table where name = ?");
$sth->bind_param("s", $name);
$sth->execute();

$result = $sth->get_result();
$num = $sth->num_rows;

if($num == 1){
    while($row=mysqli_fetch_assoc($result))  {
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

$sth->close();
$con->close();
?>