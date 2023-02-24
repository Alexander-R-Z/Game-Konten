<?php

if(!isset($_SESSION)){session_start();}

if(!is_file('assets/db/game_konten.sqlite3')){
	file_put_contents('assets/db/game_konten.sqlite3', null);
}
class SQLite extends SQLite3
{
    function __construct()
    {
        $filename = 'assets/db/game_konten.sqlite3';
        SQLite3::open($filename, $flags = SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);
    }
}

$db = new SQLite();
if(!$db){
    echo $db->lastErrorMsg();
}