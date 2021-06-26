<?php 
    $table = "web";
    $db= mysqli_connect('localhost','root','','website');
    if($db->connect_errno > 0){
        die('Unable connect to database [' . $db->connect_error . ']');
    }
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $sql_commands = "INSERT INTO $table(name,comment) VALUES ('$name','$comment')";
        if(mysqli_query($db,$sql_commands)){
            echo 'Inserted successfully';
        }
        else {
            echo mysqli_error($db);
        }
        header("location:guestbook.php");
    }
?>