<?php 
    $table = "web";
    $db= mysqli_connect('localhost','root','','website');
    if($db->connect_errno > 0){
        die('Unable connect to database [' . $db->connect_error . ']');
    }
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $name_after=filter_var($name,FILTER_SANITIZE_STRING);
        $comment_after=filter_var($comment,FILTER_SANITIZE_STRING);
        $r = $db->prepare('INSERT INTO web(name,comment) VALUES (?,?)');
        $r->bind_param('ss',$name_after,$comment_after);
        if($r->execute()) {
            echo 'Insert successfully';
        }
        else {
            echo mysqli_error($db);
        }
        header("location:guestbook.php");
    }
?>