<?php

if(!isset($_SESSION)){session_start();}

function emptyImputSignup($username, $displayname, $pw) {
    $result = true;
    if (empty($username) || empty($displayname) || empty($pw)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyImputLogin($username, $pw) {
    $result = true;
    if (empty($username) || empty($pw)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result = true;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function newPwdHash($pw) {
    $result = true;
    if (empty($pw)) {
        $result = true;
    }
    else {
        $newPwHash = password_hash($pw, PASSWORD_DEFAULT);
        $result = $newPwHash;
    }
    return $result;
}

function invalidPwHash($pw, $newPwHash) {
    $result = true;
    if ($pw == $newPwHash) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($db, $username) {

    $db = new MyDB();
    if(!$db){
        echo $db->lastErrorMsg();
    } else {
        echo "Opened database successfully\n";
    }

    $sql = "SELECT * FROM `user` WHERE `username` = :username";
    $stmt = $db->prepare($sql);
    if (!$stmt) {
        header('location: ../../signup.php?error=stmtfailed');
        exit();
    }

    $stmt->bindParam(':username', $username);

    $resultDB = $stmt->execute();
    var_dump($resultDB->fetchArray(SQLITE3_ASSOC));
    $row = $resultDB->fetchArray(SQLITE3_ASSOC);
    
    if ($row = $resultDB->fetchArray(SQLITE3_ASSOC)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    $stmt->close();
}

function createUser($db, $username, $displayname, $newPwHash) {
    $sql = "INSERT INTO `user` (username, displayname, password) VALUES (:username, :displayname, :password)";
    $stmt = $db->prepare($sql);
    if (!$stmt) {
        header('location: ../../signup.php?error=stmtfailed');
        exit();
    }

    $stmt->bindParam(':username', $username);
	$stmt->bindParam(':displayname', $displayname);
	$stmt->bindParam(':password', $newPwHash);
    $stmt->execute();
    $_SESSION['uid'] = $username;
    $_SESSION['displayname'] = $displayname;
    header('location: ../../home.php?error=none');
    exit();
}

function loginUser($db, $username, $pw) {
    $uidExists = uidExists($db, $username);

    if ($uidExists === false) {
        header('location: ../../index.php?error=wrongloginuid'.$uidExists);
        exit();
    }

    $pwHashed = $uidExists['password'];
    $checkPwd = password_verify($pw, $pwHashed);

    if ($checkPwd === false) {
        header('location: ../../index.php?error=wrongloginpw');
        exit();
    }
    if ($checkPwd === true) {
        session_start();
        $_SESSION['uid'] = $uidExists['username'];
        $_SESSION['displayname'] = $uidExists['displayname'];
        header('location: ../../home.php');
        exit();
    }
}