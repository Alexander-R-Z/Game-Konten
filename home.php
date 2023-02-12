<?php

$title = "Home";
$navHeader = "Game Accounts";
require_once('assets/header/header.php');

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
                    // require_once(BASE_PATH . '/assets/includes/db.inc.php');
                    // require_once(BASE_PATH . '/assets/includes/account-data.inc.php');
                    // $games = GameDbEntrys($db);
                    // var_dump($games);
                    // $count = countAccountDbEntrys($db, $gameId);
                    $count = 0;
                    for ($i = 0; $i < $count; $i++) { ?>

                    <div class="account-login-data">
                        <form>
                            <div class="lable-input">
                                <label for="username">Username</label>
                                <input type="text" name="username" placeholder="Username" required="required" <?php echo "value=\"$username\";"?>/>
                            </div>
                            <div class="lable-input">
                                <label for="password">Password</label>
                                <input type="text" name="password" placeholder="Password" required="required" <?php echo "value=\"$password\";"?>/>
                            </div>
                            <div class="lable-input">
                                <label for="displayname">Displayname</label>
                                <input type="text" name="displayname" placeholder="Displayname" <?php echo "value=\"$displayname\";"?>/>
                            </div>
                            <div class="lable-input">
                                <label for="tag">Tag</label>
                                <input type="text" name="tag" placeholder="7FJ3D" <?php echo "value=\"$tag\";"?>/>
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
    require_once(BASE_PATH . '/assets/footer/footer.php');
?>