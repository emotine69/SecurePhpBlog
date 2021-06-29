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
    <title>Upload blog</title>
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
        <form method="POST">
            <input type="text" required="" name="tittle" placeholder="Post Tittle" class="form-control bg-dark text-white my-3 text-center">
            <textarea type="text" required="" name="content" class="form-control bg-dark text-white my-3 rounded-0" id="exampleFormControlTextarea1" rows="20"></textarea>
            <button name="new_post" class="btn btn-dark">Add post</button>
        </form>
    </div>


</body>

</html>