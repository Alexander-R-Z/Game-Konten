-- control + shift + p -> SQL: Run SQL File

/* 
Old SQLite Tables
CREATE TABLE IF NOT EXISTS User (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    displayname TEXT NOT NULL,
    password TEXT NOT NULL,
    createDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    changeDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    lastLoginDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    CHECK (length(username) <= 50),
    CHECK (length(displayname) <= 50),
    CHECK (length(password) <= 2000)
);

CREATE TABLE IF NOT EXISTS Role (
    rolename TEXT NOT NULL,
    createDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    createdBy TEXT NOT NULL,
    changeDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    changedBy TEXT,
    PRIMARY KEY (rolename),
    CHECK (length(rolename) <= 20)
);

CREATE TABLE IF NOT EXISTS UserRole (
    usernameId INT NOT NULL,
    rolename TEXT NOT NULL,
    PRIMARY KEY (usernameId, rolename),
    FOREIGN KEY (usernameId) REFERENCES User (id),
    FOREIGN KEY (rolename) REFERENCES Role (rolename)
);

CREATE TABLE IF NOT EXISTS Game (
    gamename TEXT NOT NULL,
    createDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    createdBy TEXT NOT NULL,
    changeDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    changedBy TEXT,
    PRIMARY KEY (gamename),
    CHECK (length(gamename) <= 50)
);

CREATE TABLE IF NOT EXISTS AccountData (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    password TEXT NOT NULL,
    displayname TEXT,
    tagline TEXT,
    gamename TEXT NOT NULL,
    createDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    createdBy TEXT NOT NULL,
    changeDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    changedBy TEXT,
    FOREIGN KEY (gamename) REFERENCES Game(gamename),
    CHECK (length(username) <= 50),
    CHECK (length(password) <= 50),
    CHECK (length(tagline) <= 10)
);

CREATE TABLE IF NOT EXISTS RoleAccountData (
    rolename TEXT NOT NULL REFERENCES Role(rolename),
    accountId INT NOT NULL REFERENCES AccountData(id),
    PRIMARY KEY (rolename, accountId)
);
Old SQLite Tables
*/


/*
-- Drop the existing tables
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Role;
DROP TABLE IF EXISTS UserRole;
DROP TABLE IF EXISTS Game;
DROP TABLE IF EXISTS AccountData;
DROP TABLE IF EXISTS RoleAccountData;

-- Create the new User table
CREATE TABLE IF NOT EXISTS User (
id INTEGER PRIMARY KEY AUTOINCREMENT,
username TEXT NOT NULL UNIQUE,
displayname TEXT NOT NULL,
password TEXT NOT NULL,
createDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
changeDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
lastLoginDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
CHECK (length(username) <= 50),
CHECK (length(displayname) <= 50),
CHECK (length(password) <= 2000)
);

-- Create the new Role table
CREATE TABLE IF NOT EXISTS Role (
id INTEGER PRIMARY KEY AUTOINCREMENT,
rolename TEXT NOT NULL UNIQUE,
createDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
createdBy TEXT NOT NULL,
changeDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
changedBy TEXT,
CHECK (length(rolename) <= 20)
);

-- Create the new Game table
CREATE TABLE IF NOT EXISTS Game (
id INTEGER PRIMARY KEY AUTOINCREMENT,
gamename TEXT NOT NULL UNIQUE,
createDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
createdBy TEXT NOT NULL,
changeDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
changedBy TEXT,
CHECK (length(gamename) <= 50)
);

-- Create the new AccountData table
CREATE TABLE IF NOT EXISTS AccountData (
id INTEGER PRIMARY KEY AUTOINCREMENT,
username TEXT NOT NULL UNIQUE,
password TEXT NOT NULL,
displayname TEXT,
tagline TEXT,
gamenameId INT NOT NULL,
createDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
createdBy TEXT NOT NULL,
changeDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
changedBy TEXT,
FOREIGN KEY (gamenameId) REFERENCES Game (id) ON DELETE CASCADE,
CHECK (length(username) <= 50),
CHECK (length(password) <= 2000),
CHECK (length(tagline) <= 10)
);

-- Create the new RoleAccountData table
CREATE TABLE IF NOT EXISTS RoleAccountData (
roleId INT NOT NULL,
accountDataId INT NOT NULL,
PRIMARY KEY (roleId, accountDataId),
FOREIGN KEY (roleId) REFERENCES Role (id) ON DELETE CASCADE,
FOREIGN KEY (accountDataId) REFERENCES AccountData (id) ON DELETE CASCADE
);

-- Create the new UserRole table
CREATE TABLE IF NOT EXISTS UserRole (
userId INT NOT NULL,
roleId INT NOT NULL,
PRIMARY KEY (userId, roleId),
FOREIGN KEY (userId) REFERENCES User (id) ON DELETE CASCADE,
FOREIGN KEY (roleId) REFERENCES Role (id) ON DELETE CASCADE
);

-- Create indexes to improve query performance
CREATE INDEX idx_user_username ON User(username);
CREATE INDEX idx_role_rolename ON Role(rolename);
CREATE INDEX idx_game_gamename ON Game(gamename);
*/

/* 
INSERT INTO User (username, displayname, password) VALUES ('john_doe', 'John Doe', 'mypassword');
-- Fügt einen neuen Benutzer hinzu, der sich als 'john_doe' mit dem Anzeigenamen 'John Doe' und dem Passwort 'mypassword' registriert hat.

INSERT INTO Role (rolename, createdBy) VALUES ('Admin', 'System');
-- Fügt eine neue Rolle mit dem Namen 'Admin' und dem Ersteller 'System' hinzu.

INSERT INTO Game (gamename, createdBy) VALUES ('Chess', 'System');
-- Fügt ein neues Spiel mit dem Namen 'Chess' und dem Ersteller 'System' hinzu.

INSERT INTO AccountData (username, password, gamenameId, createdBy) VALUES ('john_doe', 'mypassword', 1, 'System');
-- Fügt neue Kontodaten für einen Benutzer mit dem Benutzernamen 'john_doe', dem Passwort 'mypassword' und dem Spiel mit der ID 1 hinzu.

INSERT INTO RoleAccountData (roleId, accountDataId) VALUES (1, 1);
-- Fügt eine Zuordnung zwischen der Rolle mit der ID 1 und den Kontodaten mit der ID 1 hinzu.

INSERT INTO UserRole (userId, roleId) VALUES (1, 1);
-- Fügt eine Zuordnung zwischen dem Benutzer mit der ID 1 und der Rolle mit der ID 1 hinzu.
*/

/*
SELECT * FROM User WHERE id = 1;
-- Gibt alle Spalten und Zeilen der User-Tabelle zurück, wo die id 1 ist.

SELECT * FROM Role WHERE rolename = 'Admin';
-- Gibt alle Spalten und Zeilen der Role-Tabelle zurück, wo das rolename 'Admin' ist.

SELECT * FROM Game WHERE gamename = 'Chess';
-- Gibt alle Spalten und Zeilen der Game-Tabelle zurück, wo das gamename 'Chess' ist.

SELECT * FROM AccountData WHERE username = 'john_doe';
-- Gibt alle Spalten und Zeilen der AccountData-Tabelle zurück, wo der username 'john_doe' ist.

SELECT * FROM RoleAccountData WHERE roleId = 1;
-- Gibt alle Spalten und Zeilen der RoleAccountData-Tabelle zurück, wo die roleId 1 ist.

SELECT * FROM UserRole WHERE userId = 1;
-- Gibt alle Spalten und Zeilen der UserRole-Tabelle zurück, wo die userId 1 ist.
*/

/* 
INSERT INTO Role (rolename, createdBy) VALUES ('Admin', 'System') ON CONFLICT DO NOTHING;
-- Fügt eine neue Rolle mit dem Namen 'Admin' und dem Ersteller 'System' hinzu.

INSERT INTO UserRole (userId, roleId) VALUES (1, 1) ON CONFLICT DO NOTHING;
-- Fügt eine Zuordnung zwischen dem Benutzer mit der ID 1 und der Rolle mit der ID 1 hinzu.

INSERT INTO UserRole (userId, roleId) VALUES (3, 1) ON CONFLICT DO NOTHING;
-- Fügt eine Zuordnung zwischen dem Benutzer mit der ID 1 und der Rolle mit der ID 1 hinzu.
*/

/* 
INSERT INTO Game (gamename, createDate, createdBy, changeDate, changedBy) VALUES ('VALORANT', datetime('now'), 'System', datetime('now'), 'System');
-- Fügt ein neues Spiel mit dem Namen 'Chess' und dem Ersteller 'System' hinzu.

INSERT INTO AccountData (username, password, displayname, tagline, gamenameId, changeDate, createdBy, changeDate, changedBy) VALUES ('06012022normal', 'hgt/196/kd?', 'dfnaguishadio', '3453s', 1, datetime('now'), 'System', datetime('now'), 'System');
-- Fügt neue Kontodaten für einen Benutzer mit dem Benutzernamen 'john_doe', dem Passwort 'mypassword' und dem Spiel mit der ID 1 hinzu.
*/

/*
INSERT INTO RoleAccountData (roleId, accountDataId) VALUES (1, 1);
-- Fügt eine Zuordnung zwischen der Rolle mit der ID 1 und den Kontodaten mit der ID 1 hinzu.
*/