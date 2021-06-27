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


    <?php if(isset($_REQUEST['info'])) {?>
        <?php if($_REQUEST['info'] == "added") {?>
            <div class="alert alert-success" role="alert">Post has been added successfully
            </div>
        <?php } ?>
    <?php } ?>
    <?php        if(isset($_SESSION['user_id']) || isset($_SESSION['logged in'])){ ?>
        <div class="container mt-5">
            <div class="text-center">
                <a href="createPost.php" class="btn btn-outline-dark">Create a new post</a>
            </div>
        </div>
    <?php } else { ?>
        <script LANGUAGE='javascript'>
            window.alert('You must log in first');
            window.location.href='login.php';
        </script>;
    <?php } ?>
   

</body>

</html>