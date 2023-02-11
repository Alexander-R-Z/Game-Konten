<?php

$title = "SignUp";
$navHeader = "Game Accounts";
require_once("assets/header/header.php");

?>
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
<?php
    require_once("assets/footer/footer.php");
?>