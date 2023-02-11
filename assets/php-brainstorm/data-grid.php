<?php
    //starting the session if not started yet
    if(!isset($_SESSION)){session_start();}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link id="stylesheet" rel="stylesheet" href="../scss/dark-login.css" />
        <!-- Latest compiled and minified CSS -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
                <a href="#" id="login-btn" style="display: block;">Login</a>
                <a href="#" id="logout-btn" style="display: none;">Logout</a>
              </div>
            </nav>
          </header>
          
        <main>
            <h1>Accounts</h1>
            <article>
                <h2>Valorant</h2>
                <?php
                    $count = 3;
                    echo "<ul class=\"valoDataGrid\">
                        <li class=\"create-new-entety\"><div class=\"col-sm-3\"><p>p-test-create</p><form>form-test-create...</form></div></li>";
                    for ($i = 0; $i < $count; $i++) {
                        echo "<li class=\"create-new-entety\"><div class=\"col-sm-3\"><p>p-test-dynamic...</p><form>form-test-dynamic...</form></div></li>";
                    }
                    echo "</ul>";
                ?>
            </article>
            
 
        </main>
    </body>
</html>