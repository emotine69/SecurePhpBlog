<?php
    include 'blog_post.php';
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <nav class="navigation-bar">
        <a href="./index.php">Home</a>
        <a href="./guestbook.php">Guestbook</a>
        <a href="./upload.php">Blog</a>
        <div style="float:right;">
            <a href="./login.php">Sign in/Sign up</a>
<?php        if(isset($_SESSION['user_id']) || isset($_SESSION['logged in'])){ ?>
                <a class="active" href="#">You logged in with: <?php echo $_SESSION['username']?></a>
                <a href="logout.php">Log Out</a>
<?php        } ?>
        </div>
    </nav>
    <div class="container mt-5">
    <?php
        $conn_2=mysqli_connect('localhost','root','','blog_post');
        if(!$conn_2){
            echo "<h3 class='container bg-dark text-center p-3 text-warning rounded-lg mt-5'>Not able establish Database connection</h3>";
        }
        $sql="SELECT id,tittle,LEFT(content,10) as content FROM data";
        $query= mysqli_query($conn_2,$sql);    
    ?>  
    <div class="row">
        <?php foreach($query as $q) { ?>
            <div class="col-4 d-flex justify-content-center align-items-center">
                <div class="card text-white bg-dark mt-5">
                    <div class="card-body" style="width:18rem;">
                        <h5 class="card-tittle"><?php echo $q['tittle'];?></h5>
                        <p class="card-text"><?php echo $q['content'];?></p>
                        <a href="view.php?id=<?php echo $q['id'];?>" class="btn btn-light">Read more<span class="text-danger">&rarr;</span></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


    </div>
</body>

</html>