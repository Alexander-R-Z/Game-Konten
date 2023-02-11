<!DOCTYPE html>
<?php
    //starting the session if not started yet
    if(!isset($_SESSION)){session_start();}
    if (isset($_SESSION['uid'])) {
        header('location: home.php?error=loggedin');
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
                    echo '<a href="index.php" id="login-btn">Login</a';
                } else {
                    echo '<a href="assets\includes\logout.inc.php" id="logout-btn">Logout</a>';
                }?>
                </div>
            </nav>
        </header>

        <main>
            <div class="container">
                <form method="POST" action="assets/includes/signup.inc.php">
                    <div class="segment">
                        <h1>SignUp</h1>
                    </div>

                    <label></label>
                        <input type="text" name="uid" placeholder="Username" required="required"/>

                    <label></label>
                        <input type="text" name="displayname" placeholder="Displayname" required="required"/>
                    
                    <label></label>
                        <input type="password" name="pw" placeholder="Password" required="required"/>
                    
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
                    <button type="submit" class="red" name="submit"><i class="icon ion-md-lock"></i>SignUp</button>
                </form>
                <button id="dark-mode-toggle" class="dark-mode-toggle" aria-label="toggle Dark Mode">Dark Mode</button>
                <button id="login-page" class="login-page-button" aria-label="login page button link">Login</button>

                <?php
                    if (isset($_GET['error'])) {
                        switch ($_GET['error']) {
                            case 'emptyimput':
                                echo "<p class=\"signup_error_p\">Fill in all fields</p>";
                                break;

                            case 'invalidusername':
                                echo "<p class=\"signup_error_p\">Username not corect</p>";
                                break;

                            case 'invalidpwd':
                                echo "<p class=\"signup_error_p\">Password is not valid</p>";
                                break;

                            case 'pwdhashfail':
                                echo "<p class=\"signup_error_p\">Hashing password failed. Please contact us</p>";
                                break;

                            case 'invalidPwHash':
                                echo "<p class=\"signup_error_p\">Hashing password error. Please contact us</p>";
                                break;

                            case 'usernametaken':
                                echo "<p class=\"signup_error_p\">Username already exists</p>";
                                break;
                            
                            case 'stmtfailed':
                                echo "<p class=\"signup_error_p\">Somting went wrong, please try again</p>";
                                break;

                            case 'none':
                                echo "<p class=\"signup_error_p\">Signup successfully</p>";
                                break;
                                
                            default:
                                echo "<p class=\"signup_error_p\">Unknown error</p>";
                                break;
                        }
                    }
                ?>
            </div>
        </main>
    </body>
</html>