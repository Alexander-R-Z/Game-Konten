<?php
// define('BASE_PATH', 'D:/VSCode/Game-Konten'); // Path to the folder Game-Konten

//starting the session if not started yet
if(!isset($_SESSION)){session_start();}
//check if the database file exists and create a new if not
if(!is_file('../../assets/db/game_konten.sqlite3')){
	file_put_contents('../../assets/db/game_konten.sqlite3', null);
}
// connecting the database
// $conn = new MyDB('sqlite:../db/game_konten.sqlite3');
class SQLite extends SQLite3
{
    function __construct()
    {
        $filename = '../../assets/db/game_konten.sqlite3';
        SQLite3::open($filename, $flags = SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);
        // $this->open('mysqlitedb.db');
    }
}

$db = new SQLite();
if(!$db){
    echo $db->lastErrorMsg();
} else {
    echo "Opened database successfully\n";
}

// $db = new SQLite('game_konten.sqlite3');
// if(!$db){
//     echo $db->lastErrorMsg();
// } else {
//     echo "Opened database successfully\n";
// }

// $result = $db->query('SELECT * FROM `user` WHERE `username` = "admin" AND `password` = "1";');
// var_dump($result->fetchArray(SQLITE3_ASSOC));
//check if the connection is successful


//Setting connection attributes
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// //Query for creating reating the user table in the database if not exist yet.
// $query = "CREATE TABLE IF NOT EXISTS users (username TEXT NOT NULL PRIMARY KEY, displayname TEXT NOT NULL, password TEXT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP);";
// //Executing the query
// $conn->exec($query);

// $sql = $conn->prepare("SELECT * FROM `user` WHERE `username` = :username AND `password` = :pw");