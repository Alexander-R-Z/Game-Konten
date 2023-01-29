<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $_SESSION['uid'] ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../scss/dark-login.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" />
        <script src="assets/js/background.js" defer></script>
        <script src="../js/main.js"></script>
    </head>
    <body>
        <main>
            <div class="user-profile">
                <h1><?php if(isset($_SESSION['uid'])) {echo $_SESSION['uid'];} else {echo 'Please Log-In';}?></h1>
            </div>
            <a href="../html/home.html"><button class="blue" type="button"><i class="icon ion-md-home"></i>Home</button></a>
        </main>
    </body>
</html>