<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
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
    <div id="guestbook" style="text-align: center;">
        <h2 class="display-1 text-white"><b><i>Welcome to the Guestbook</i></b></h2><br>
        <form action="msg.php" class="d-flex justify-content-center align-items-center container" method="POST">
            <div class="row">
                <div class="col-12 col-6">
                    <div class="form-group fl_icon">
                        <div class="icon"><i class="fa fa-user"></i></div>
                            <input class="form-input" required="" type="text" placeholder="Your name" name="name">
                    </div>
                    <div class="col-12">	
                        <div class="form-group">
					        <textarea class="form-input" type="text" required="" name="comment" placeholder="Your comment" rows="5" cols="40"></textarea>
				        </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary pull-right" value="SEND">
                </div>
            </div>
        </form>
    </div>
    
	
    <div>
        <table class="col-6 ml-5 align-items-center text-white">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php include 'comments.php'?>
                </tr>
            </tbody>

            
        </table>
    </div>

</body>
</html>