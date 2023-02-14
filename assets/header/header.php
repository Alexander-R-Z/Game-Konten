<!DOCTYPE html>
<?php
    //starting the session if not started yet
    if(!isset($_SESSION)){session_start();}
    if ($title == 'Login' || $title == 'SignUp') {
        if (isset($_SESSION['uid'])) {
            header('location: home.php?error=loggedin');
        } 
    }
    else if (empty($_SESSION['uid'])) {
        header('location: index.php?error=notloggedin');
    }
    $linkToTheFolderGameKontenAlex = 'D:/VSCode/Game-Konten';
    define('BASE_PATH', $linkToTheFolderGameKontenAlex);
    // $linkToTheFolderGameKontenMax = '';
    // define('BASE_PATH', $linkToTheFolderGameKontenMax);
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link id="stylesheet" rel="stylesheet" href="assets/scss/theme-light-neomorphic.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <script src="assets/js/main.js"></script>
        <script src="assets/js/theme.js" defer></script>
        <script src="assets/js/nav-login.out.js" defer></script>
    </head>
    <body>
        <header class="primary-header flex">
            <h2 class="nav-header"><?php echo $navHeader; ?></h2>
            <nav class="flex">
                <?php
                if (!empty($_SESSION['uid'])) {
                    ?>
                    <ul class="primary-navigation flex">
                        <li class="active"><a href="#"><span aria-hidden="true">00</span>Home</a></li>
                        <li><a href="#"><span aria-hidden="true">01</span>Roles</a></li>
                        <li><a href="#"><span aria-hidden="true">02</span>Games</a></li>
                        <li><a href="#"><span aria-hidden="true">03</span>User</a></li>
                    </ul>
                    <?php
                }
                ?>
            </nav>
            <div class="login-section">
                <?php 
                if (empty($_SESSION['uid'])) {
                    if ($title == "Login") {
                        echo '<a href="signup.php"  id="login-btn" class="button-login-signup-logout">SignUp</a';
                    } else if ($title == "SignUp") {
                        echo '<a href="index.php" id="login-btn" class="button-login-signup-logout">Login</a';
                    } else {
                        echo '<a href="index.php" id="login-btn" class="button-login-signup-logout">Login</a';
                    }
                } else {
                    echo "<h3 class=\"h3-username\">".$_SESSION['displayname']."</h3>";
                    ?><a href="#" id="logout-btn" class="button-login-signup-logout">Logout</a><?php
                }?>
            </div>
        </header>
        <div class="header-helper">
        </div>