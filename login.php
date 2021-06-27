<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login and Registration</title>
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
    <div class="container">
        <div class="login-box">
        <div class="row">
            <div class="col-md-6 login-left">
                <h2>Login Here</h2>
                    <form action="validation.php" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="log"> Log in </button>
                    </form>

            </div>

            <div class="col-md-6 login-right">
                <h2>Register Here</h2>
                    <form action="registration.php" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="reg"> Register </button>

                    </form>
            
            </div>
        </div>

        
        </div>


</div>




</body>
</html>
