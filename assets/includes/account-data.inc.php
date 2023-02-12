<?php

function GameDbEntrys($db) {
    // $sql = "SELECT COUNT(*) as count FROM AccountData WHERE gameId = :gameId;";
    $sql = "SELECT gameName FROM Game;";
    $stmt = $db->prepare($sql);
    if (!$stmt) {
        header('location: ../../home.php?error=stmtfailed');
        exit();
    }
    // $stmt->execute();
    // $row = $stmt->fetch();

    // $count = $row['count'];
    // if($count > 0){
    //     header('location:home.php');
    // }else{
    //     $_SESSION['error'] = "Invalid username or password";
    //     header('location:login.php');
    // }
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
function countAccountDbEntrys($db, $gameId) {
    // $sql = "SELECT COUNT(*) as count FROM AccountData WHERE gameId = :gameId;";
    $sql = "SELECT userName FROM AccountData WHERE gameId = :gameId;";
    $stmt = $db->prepare($sql);
    if (!$stmt) {
        header('location: ../../home.php?error=stmtfailed');
        exit();
    }

    $stmt->bindParam(':gameId', $gameId);
    // $stmt->execute();
    // $row = $stmt->fetch();

    // $count = $row['count'];
    // if($count > 0){
    //     header('location:home.php');
    // }else{
    //     $_SESSION['error'] = "Invalid username or password";
    //     header('location:login.php');
    // }
    $resultDB = $stmt->execute();
    var_dump($resultDB->fetchArray(SQLITE3_ASSOC));
    $row = $resultDB->fetchArray(SQLITE3_ASSOC);
    $count = 0;
    while ($row = $resultDB->fetchArray(SQLITE3_ASSOC)) {
        $count += 1;
    }
    return $count;
    $stmt->close();
}
function emptyAccountData($username, $password, $gameId) {
    $result = true;
    if (!empty($username)) {
        $result = false;
    }
    if (!empty($password)) {
        $result = false;
    }
    if (!empty($gameId)) {
        $result = false;
    }
    return $result;
}
function emptyDisplayname($displayname) {
    $result = true;
    if (!empty($displayname)) {
        $result = false;
    } else {
        $result = "NULL";
    }
    return $result;
}
function emptyTagline($tagline) {
    $result = true;
    if (!empty($tagline)) {
        $result = false;
    } else {
        $result = "NULL";
    }
    return $result;
}
function createNewAccountData($db, $username, $password, $displayname, $tagline, $gameId) {
    $sql = "INSERT INTO AccountData (userName, password, displayname, tagline, createDate, createdBy, changeDate, changedBy, gameId)
    VALUES (:username, :password, :displayname, :tagline, datetime('now'), :createdBy, datetime('now'), :changedBy, :gameId);";
    $stmt = $db->prepare($sql);
    if (!$stmt) {
        header('location: ../../home.php?error=stmtfailed');
        exit();
    }

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':displayname', $displayname);
    $stmt->bindParam(':tagline', $tagline);
    $stmt->bindParam(':createdBy', $_SESSION['uid']);
    $stmt->bindParam(':changedBy', $_SESSION['uid']);
    $stmt->bindParam(':gameId', $gameId);
    $stmt->execute();
    header('location: ../../home.php?error=none');
    $stmt->close();
    exit();
}