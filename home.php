<?php

$title = "Home";
$navHeader = "Game Accounts";
require_once("assets/header/header.php");

?>
<main>
    <?php
        if(!isset($_SESSION)){session_start();}

        echo "<h3>".$_SESSION['displayname']."</h3>";
    ?>
    <div class="game-accounts">
    <h1>Accounts</h1>
            <section>
                <h2>Valorant</h2>

                
                <?php
                    include_once("assets/includes/db.inc.php");
                    
                    $count = 3;
                    for ($i = 0; $i < $count; $i++) { ?>

                    <div class="account-login-data">
                        <form>
                            <div class="lable-input">
                                <label for="username">Username</label>
                                <input type="text" name="username" placeholder="Username" required="required" value="<?php echo $username;?>"/>
                            </div>
                            <div class="lable-input">
                                <label for="password">Password</label>
                                <input type="text" name="password" placeholder="Password" required="required" value="<?php echo $password;?>"/>
                            </div>
                            <div class="lable-input">
                                <label for="displayname">Displayname</label>
                                <input type="text" name="displayname" placeholder="Displayname" value="<?php echo $displayname;?>"/>
                            </div>
                            <div class="lable-input">
                                <label for="tag">Tag</label>
                                <input type="text" name="tag" placeholder="7FJ3D" value="<?php echo $tag;?>"/>
                            </div>
                        </form>
                    </div>
                       
                    <?php
                    }
                ?>
            </section>
        <?php

        ?>
    </div>

    <button id="dark-mode-toggle" class="dark-mode-toggle" aria-label="toggle Dark Mode "><i class="icon ion-md-moon"></i></button>
</main>
<?php
    require_once("assets/footer/footer.php");
?>