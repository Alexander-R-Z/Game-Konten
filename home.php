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
</main>
<?php
    require_once("assets/footer/footer.php");
?>