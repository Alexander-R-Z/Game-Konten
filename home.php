<?php

$title = "Home";
$navHeader = "Game Accounts";
require_once('assets/header/header.php');

?>
<main>
    <div class="game-accounts">
    <h1>Accounts</h1>
        <section>
            <h2>Valorant</h2>
            <div class="account-login-data grid-container">
                <?php
                    // require_once(BASE_PATH . '/assets/includes/db.inc.php');
                    // require_once(BASE_PATH . '/assets/includes/account-data.inc.php');
                    // $games = GameDbEntrys($db);
                    // var_dump($games);
                    // $count = countAccountDbEntrys($db, $gameId);
                    $count = 9;
                    for ($i = 0; $i < $count; $i++) { ?>

                    <form class="account-login-data-form grid-item">
                        <div class="account-login-data-div">
                            <div class="lable-input">
                                <label for="username">Username</label>
                                <div class="input-copy">
                                    <input type="text" name="username" placeholder="Username" required="required" <?php #echo "value=\"$username\";"?>/>
                                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                    </svg>
                                </div>
                            </div>
                            <div class="lable-input">
                                <label for="password">Password</label>
                                <input type="text" name="password" placeholder="Password" required="required" <?php #echo "value=\"$password\";"?> >
                                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                    </svg>
                                </input>
                            </div>
                            <!-- <div class="lable-input">
                                <label for="displayname">Displayname</label>
                                <input type="text" name="displayname" placeholder="Displayname" <?php #echo "value=\"$displayname\";"?>/>
                            </div>
                            <div class="lable-input">
                                <label for="tag">Tag</label>
                                <input type="text" name="tag" placeholder="7FJ3D" <?php #echo "value=\"$tag\";"?>/>
                            </div> -->
                        </div>
                    </form>

                    <?php
                    }
                ?>
            </div>
        </section>
    </div>
    <div class="theme">
        <button id="theme-toggle" class="dark-mode-toggle" aria-label="toggle Dark Mode "><i class="icon ion-md-moon"></i></button>
    </div>
</main>
<?php
    require_once(BASE_PATH . '/assets/footer/footer.php');
?>