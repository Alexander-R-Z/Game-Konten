<?php

$title = "Home";
$navHeader = "Game Accounts";
require_once('assets/header/header.php');

?>
<main class="home">
    <div class="game-accounts">
        <section>
            <div class="game-accounts-head">
                <svg class="valorant game-header-2" width="20em" viewBox="0 0 690 98.9" xmlns="http://www.w3.org/2000/svg">
                    <path id="valo" d="M615.11 19.15h24.69l.08 75.59c0 .97.79 1.77 1.77 1.77l14.14-.01c.98 0 1.77-.79 1.77-1.77l-.08-75.58h30.96c.91 0 1.43-1.06.85-1.77l-10.6-13.26a4.68 4.68 0 0 0-3.65-1.76h-59.93c-.98 0-1.77.79-1.77 1.77v13.26c0 .96.79 1.76 1.77 1.76M19.25 94.75 91.67 4.13c.57-.71.06-1.77-.85-1.77H72.71c-1.42 0-2.77.65-3.65 1.76L17.68 68.4V4.12c0-.98-.79-1.77-1.77-1.77H1.77C.79 2.35 0 3.14 0 4.12v90.62c0 .98.79 1.77 1.77 1.77H15.6c1.42 0 2.76-.65 3.65-1.76m51.06 0 24.91-31.17 24.91 31.17a4.685 4.685 0 0 0 3.66 1.76h13.83c.98 0 1.77-.79 1.77-1.77V4.12c0-.97-.79-1.77-1.77-1.77h-11.6c-2.84 0-5.53 1.29-7.31 3.51L47.69 94.73c-.57.71-.06 1.77.85 1.77h18.11c1.43.01 2.77-.64 3.66-1.75m51.39-66.21v41.75l-16.68-20.87 16.68-20.88zm404.37 66.19L453.65 4.11A4.68 4.68 0 0 0 450 2.35h-13.84c-.98 0-1.77.79-1.77 1.77v90.62c0 .98.79 1.77 1.77 1.77h13.83c1.42 0 2.77-.65 3.65-1.76l24.91-31.17 24.91 31.17a4.68 4.68 0 0 0 3.65 1.76h18.11c.91 0 1.42-1.06.85-1.78m-57.33-45.31L452.05 70.3V28.54l16.69 20.88zM269.45 0c-27.3 0-49.43 22.13-49.43 49.43s22.13 49.43 49.43 49.43 49.43-22.13 49.43-49.43C318.89 22.13 296.75 0 269.45 0m0 82.06c-17.54 0-31.75-14.61-31.75-32.63 0-18.02 14.21-32.64 31.75-32.64S301.2 31.4 301.2 49.43c.01 18.02-14.21 32.63-31.75 32.63M583.38 4.12V68.4L532 4.11a4.68 4.68 0 0 0-3.65-1.76H514.5c-.97 0-1.77.79-1.77 1.77v43.67c0 1.06.36 2.09 1.03 2.92l14.71 18.41c.65.81 1.95.35 1.95-.68v-38l51.39 64.31a4.68 4.68 0 0 0 3.65 1.76h13.83c.98 0 1.77-.79 1.77-1.77V4.12c0-.97-.79-1.77-1.77-1.77h-14.14c-.98 0-1.77.8-1.77 1.77M410.62 23.76V4.12c0-.98-.79-1.77-1.77-1.77h-72.37c-.98 0-1.77.79-1.77 1.77v90.62c0 .98.79 1.77 1.77 1.77h14.14c.98 0 1.77-.79 1.77-1.77V19.16h40.55l-27.37 34.26c-.51.64-.51 1.56 0 2.21l31.27 39.13a4.68 4.68 0 0 0 3.65 1.76h18.11c.91 0 1.42-1.06.85-1.77l-32.14-40.21 22.28-27.84c.66-.85 1.03-1.88 1.03-2.94M162.39 96.51h41.96c1.42 0 2.77-.65 3.65-1.76l10.6-13.27c.57-.71.06-1.77-.85-1.77H178.3V4.12c0-.98-.79-1.77-1.77-1.77h-14.14c-.98 0-1.77.79-1.77 1.77v90.62c0 .97.8 1.77 1.77 1.77"></path>
                </svg>
            </div>
            <div class="account-login-data grid-container">
                <?php
                    require_once('assets/includes/home/db.inc.php');
                    require_once('assets/includes/home/account-data.inc.php');
                    // $gamenameId = 1;
                    $game = retrieveGameDbEntrys($db);
                    // var_dump($game);
                    $row = null;
                    $count = 0;
                    $test = 0;
                    $gamenameId = $game;
                    $resultDB = retrieveAccountDbEntrys($db, $gamenameId);
                    $count = countAccountDataForGame($db, $gamenameId);
                    $count = 5;
                    for ($i = 1; $i <= $count; $i++) { 
                        while ($row = $resultDB->fetchArray(SQLITE3_ASSOC)) {
                            ?>
                            
                            <!-- method="post" action="edit.php" -->
                            <form class="account-login-data-form grid-item" onsubmit="handleSubmit(event)">
                                <div class="account-login-data-div">
                                    <button data-modal-target="#modal-account-login-data-form-edit" class="edit-button"><img src="assets/img/edit.png" alt=""></button>
                                    <div class="lable-input">
                                        <label for="username">Username</label>
                                        <div class="copy-to-clipboard-helper">
                                            <input class="account-data-input" type="text" name="username" placeholder="Username" required="required" value="<?php echo $row['username']; ?>" readonly/>
                                            <div class="input-copy">
                                                <button class="button-copy" type="button" onclick="copyToClipboard('test')">
                                                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lable-input">
                                        <label for="password">Password</label>
                                        <div class="copy-to-clipboard-helper">
                                            <input class="account-data-input" type="text" name="password" placeholder="Password" required="required" value="<?php echo $row['password']; ?>" readonly/>
                                            <div class="input-copy">
                                                <button class="button-copy" type="button" onclick="copyToClipboard('test')">
                                                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lable-input" style="display: none;">
                                        <label for="displayname">Displayname</label>
                                        <div class="copy-to-clipboard-helper">
                                            <input class="account-data-input" type="text" name="displayname" placeholder="Displayname" value="<?php echo $row['displayname']; ?>" readonly/>
                                            <div class="input-copy">
                                                <button class="button-copy" type="button" onclick="copyToClipboard('test')">
                                                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lable-input" style="display: none;">
                                        <label for="tagline">Tag</label>
                                        <div class="copy-to-clipboard-helper">
                                            <input class="account-data-input" type="text" name="tagline" placeholder="EUW00" value="<?php echo $row['tagline']; ?>" readonly/>
                                            <div class="input-copy">
                                                <button class="button-copy" type="button" onclick="copyToClipboard('test')">
                                                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <?php
                        }
                    ?>
                    
                    
                    <?php
                    }
                ?>
            </div>
        </section>
    </div>
    <div class="theme">
        <button id="theme-toggle" class="dark-mode-toggle" aria-label="toggle Dark Mode "><i class="icon ion-md-moon"></i></button>
    </div>
    <div class="modal-account-login-data-form-edit" id="modal-account-login-data-form-edit">
        <div class="modal-account-login-data-form-edit-container account-login-data-div">
            <button data-close-button="close-button" class="close-button"><img src="assets/img/close.png" alt=""></button>
            <div class="lable-input">
                <label for="username">Username</label>
                <div class="copy-to-clipboard-helper">
                    <input class="account-data-input" type="text" name="username" placeholder="Username" required="required" value="<?php echo $row['username']; ?>"/>
                    <div class="input-copy">
                        <button class="button-copy" type="button" onclick="copyToClipboard('test')">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="lable-input">
                <label for="password">Password</label>
                <div class="copy-to-clipboard-helper">
                    <input class="account-data-input" type="text" name="password" placeholder="Password" required="required" value="<?php echo $row['password']; ?>"/>
                    <div class="input-copy">
                        <button class="button-copy" type="button" onclick="copyToClipboard('test')">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="lable-input">
                <label for="displayname">Displayname</label>
                <div class="copy-to-clipboard-helper">
                    <input class="account-data-input" type="text" name="displayname" placeholder="Displayname" value="<?php echo $row['displayname']; ?>"/>
                    <div class="input-copy">
                        <button class="button-copy" type="button" onclick="copyToClipboard('test')">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="lable-input">
                <label for="tagline">Tag</label>
                <div class="copy-to-clipboard-helper">
                    <input class="account-data-input" type="text" name="tagline" placeholder="EUW00" value="<?php echo $row['tagline']; ?>"/>
                    <div class="input-copy">
                        <button class="button-copy" type="button" onclick="copyToClipboard('test')">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="overlay"></div>
    
</main>
<?php
    require_once('assets/footer/footer.php');
?>
<script>
    function copyToClipboard(text) {
        const button = event.target;
        const input = button.closest('.copy-to-clipboard-helper').querySelector('input');
        input.select();
        document.execCommand('copy');
    }
</script>
<script src="assets/js/modal-edit.js"></script>
<script>
function handleSubmit(event) {
  // Verhindern, dass das Formular neu geladen wird
  event.preventDefault();
  
  // Hier kannst du den Code schreiben, der beim Klicken auf den Button ausgeführt werden soll
}
</script>