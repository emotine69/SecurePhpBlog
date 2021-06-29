<?php
    $conn=mysqli_connect('localhost','root','','blog_post');
    if(!$conn){
        echo "<h3 class='container bg-dark text-center p-3 text-warning rounded-lg mt-5'>Not able establish Database connection</h3>";
    }
    $sql="Select * from data";
    $query=mysqli_query($conn,$sql);
    if(isset($_REQUEST["new_post"])){
        $tittle=$_REQUEST["tittle"];
        $content=$_REQUEST["content"];
        $tittle_filter=filter_var($tittle,FILTER_SANITIZE_STRING);
        $content_filter=filter_var($content,FILTER_SANITIZE_STRING);
        $r = $conn->prepare('INSERT INTO data(tittle,content) VALUES (?,?)');
        $r->bind_param('ss',$tittle_filter,$content_filter);
        $r->execute();
        header("location:upload.php?info=added");
        exit();
    }

    if(isset($_REQUEST['id'])) {
        $id=$_REQUEST['id'];

        $sql="SELECT * FROM data WHERE id=$id";
        $query=mysqli_query($conn,$sql);
    }
?>