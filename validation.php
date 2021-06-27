<?php

session_start();

$con = mysqli_connect('localhost','root','','userregistration');

if(isset($_POST['log'])){
    $name=$_POST['user'];
    $pass=$_POST['password'];
}
$s = $con->prepare('SELECT * FROM usertable WHERE name= ?');
$s->bind_param('s',$name);
$s->execute();
$result=$s->get_result();
$num= mysqli_num_rows($result);
if($num == 1){
    while($row=$result->fetch_assoc()) {
        if(password_verify($pass,$row['password'])) {
            $_SESSION['username'] = $name;
            $_SESSION['logged in'] = time();
            echo "<script LANGUAGE='javascript'>
    window.alert('Logged in successful');
    window.location.href='index.php';
    </script>";
            die();
        }
        else {
            echo "<script LANGUAGE='javascript'>
    window.alert('Wrong username/password, try again');
    window.location.href='login.php';
    </script>";
    die();
        }
    }
}
else {
    echo "<script LANGUAGE='javascript'>
    window.alert('This account does not exist');
    window.location.href='login.php';
    </script>";
    die();
}
?>