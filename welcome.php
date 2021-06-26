<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

?>

<?php
    include 'blog_post.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home Page </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navigation-bar">
        <a class="active" href="./index.php">Home</a>
        <a href="./login.php">Sign in/Sign up</a>
        <a href="./guestbook.php">Guestbook</a>
        <a href="./upload.php">Blog</a>
        <a href="./welcome.php">Session</a>
<?php        if(isset($_SESSION['user_id']) || isset($_SESSION['logged in'])){ ?>
                <a href="logout.php">Log Out</a>
<?php        } ?>
    </nav>
    <div class="container">
    <!-- <a href="logout.php">Log Out</a> -->
    <h1>Hello <?php echo $_SESSION['username']; ?></h1>

    </div>
</body>
</html>
