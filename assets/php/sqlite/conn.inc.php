<?php
	//check if the database file exists and create a new if not
	if(!is_file('../../db/game_konten.sqlite3')){
		file_put_contents('./../db/game_konten.sqlite3', null);
	}
	// connecting the database
	$conn = new PDO('sqlite:./../db/game_konten.sqlite3');
	//Setting connection attributes
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//Query for creating reating the user table in the database if not exist yet.
	$query = "CREATE TABLE IF NOT EXISTS users (username TEXT NOT NULL PRIMARY KEY, displayname TEXT NOT NULL, password TEXT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP);";
	//Executing the query
	$conn->exec($query);
