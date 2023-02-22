<?php

if(!isset($_SESSION)){session_start();}

if (isset($_POST['submit'])) {
    $username = strtolower(strip_tags(trim($_POST['uid'])));
    $displayname = strip_tags(trim($_POST['displayname']));
    $pw = strip_tags(trim($_POST['pw']));
    $newPwHash = NULL;

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if (emptyImputSignup($username, $displayname, $pw) !== false) {
        header("location: ../../../signup.php?error=emptyimput");
        exit();
    }
    if (invalidUid($username) === true) {
        header("location: ../../../signup.php?error=invalidusername");
        exit();
    }
    if (newPwdHash($pw) === true) {
        header("location: ../../../signup.php?error=pwdhashfail");
        exit();
    } else {$newPwHash = newPwdHash($pw);}
    
    if (invalidPwHash($pw, $newPwHash) !== false) {
        header("location: ../../../signup.php?error=invalidPwHash");
        exit();
    }
    if (uidExists($db, $username) !== false) {
        header("location: ../../../signup.php?error=usernametaken");
        exit();
    }

    createUser($db, $username, $displayname, $newPwHash);
}
else {
    header("location: ../../../signup.php");
    exit();
}