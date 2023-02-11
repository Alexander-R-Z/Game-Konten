<!DOCTYPE html>
<?php
    //starting the session if not started yet
    if(!isset($_SESSION)){session_start();}
    if (empty($_SESSION['uid'])) {
        header('location: index.php?error=notloggedin');
    }
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SignUp</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link id="stylesheet" rel="stylesheet" href="assets/scss/dark-login.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <script src="assets/js/main.js"></script>
        <script src="assets/js/darkmode.js" defer></script>
        <script src="assets/js/nav-login.out.js" defer></script>
    </head>
    <body>
        <header>
            <nav>
                <h2>Game Accounts</h2>
                <ul>
                    <li><a href="#"><span aria-hidden="true">01</span>Option 1</a></li>
                    <li><a href="#"><span aria-hidden="true">01</span>Option 2</a></li>
                    <li><a href="#"><span aria-hidden="true">01</span>Option 3</a></li>
                </ul>
                <div class="login-section">
                <?php 
                if (empty($_SESSION['uid'])) {
                    echo '<a href="assets\includes\login.inc.php" id="login-btn">Login</a';
                } else {
                    ?><a href="#" id="logout-btn">Logout</a><?php
                }?>
                </div>
            </nav>
        </header>
        <main>
            <?php
                if(!isset($_SESSION)){session_start();}

                echo "<h1>".$_SESSION['displayname']."</h1>";
            ?>
        </main>
    </body>
</html>
