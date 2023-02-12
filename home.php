<?php

$title = "Home";
$navHeader = "Game Accounts";
require_once("assets/header/header.php");

?>
<main>
    <?php
        if(!isset($_SESSION)){session_start();}

        echo "<h1>".$_SESSION['displayname']."</h1>";
    ?>
    <button id="dark-mode-toggle" class="dark-mode-toggle" aria-label="toggle Dark Mode "><i class="icon ion-md-moon"></i></button>
</main>
<?php
    require_once("assets/footer/footer.php");
?>