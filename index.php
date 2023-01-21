<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
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
                <a href="#" id="login-btn" style="display: block;">Login</a>
                <a href="#" id="logout-btn" style="display: none;">Logout</a>
              </div>
            </nav>
          </header>
          
        <main>
            <div class="container">
                <form method="POST" action="assets/php/sqlite/login.inc.php">
                    <div class="segment">
                        <h1>Login</h1>
                    </div>

                    <label></label>
                        <input type="text" name="username" placeholder="Username" required="required"/>
                    
                    <label></label>
                        <input type="password" name="password" placeholder="Password" required="required"/>
                    
                    <?php
					    //checking if the session 'error' is set. Erro session is the message if the 'Username' and 'Password' is not valid.
					    if(ISSET($_SESSION['error'])){
				    ?>
				    <!-- Display Login Error message -->
					<div class="alert alert-danger"><?php echo $_SESSION['error']?></div>
				    <?php
					    //Unsetting the 'error' session after displaying the message. 
					    unset($_SESSION['error']);
					    }
				    ?>
                    <button class="red" name="login"><i class="icon ion-md-lock"></i>Login</button>
                </form>
                <button id="dark-mode-toggle" class="dark-mode-toggle" aria-label="toggle Dark Mode ">Dark Mode</button>
            </div>
 
        </main>
    </body>
</html>