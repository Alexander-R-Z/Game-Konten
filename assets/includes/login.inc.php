<?php

if(!isset($_SESSION)){session_start();}

if (isset($_POST['submit'])) {
    $username = strtolower(strip_tags(trim($_POST['uid'])));
    $pw = strip_tags(trim($_POST['pw']));
    $newPwHash = NULL;

    if (empty($username.$pw)){
        header("location: ../../index.php?error=emptyimputTest");
        exit();
    }

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyImputLogin($username, $pw) !== false) {
        header("location: ../../index.php?error=emptyimput");
        exit();
    }
    if (invalidUid($username) == true) {
        header("location: ../../index.php?error=invaliduid");
        exit();
    }
    

    loginUser($db, $username, $pw);
}
else {
    header("location: ../../index.php");
    exit();
}