<?php
session_start();
header('location:login.php');
?>

<?php
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
    echo "<script LANGUAGE='javascript'>
    window.alert('Username already taken');
    window.location.href='index.php';
    </script>";
} else {
    if(preg_match('/^[a-z\d_]{3,20}$/i', $name)) { 
    $t=$con->prepare('INSERT INTO usertable(name,password) value (?,?)');
    $t->bind_param('ss',$name,$pass_hash);
    $t->execute();
    echo "<script LANGUAGE='javascript'>
    window.alert('Registered successful');
    window.location.href='login.php';
    </script>";
    $t->close();
    } else {
        echo "<script LANGUAGE='javascript'>
    window.alert('Wrong format, try again');
    window.location.href='login.php';
    </script>";
    }
} 
?>