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
        <?php foreach($query as $q) {?>
            <div class="text-white bg-dark text-center">
                <p style="font-size:100px; text-align:center;"><?php echo $q['tittle'];?></p>
            </div>
            <pre><?php echo $q['content'];?></pre>
        <?php } ?>
    </div>
</body>

</html>