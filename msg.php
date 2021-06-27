<?php 
    $table = "web";
    $db= mysqli_connect('localhost','root','','website');
    if($db->connect_errno > 0){
        die('Unable connect to database [' . $db->connect_error . ']');
    }
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $r = $db->prepare('INSERT INTO web(name,comment) VALUES (?,?)');
        $r->bind_param('ss',$name,$comment);
        if($r->execute()) {
            echo 'Insert successfully';
        }
        else {
            echo mysqli_error($db);
        }
        header("location:guestbook.php");
    }
?>