-- control + shift + p -> SQL: Run SQL File

/* 
CREATE TABLE IF NOT EXISTS User (
    username TEXT NOT NULL,
    displayname TEXT NOT NULL,
    password TEXT NOT NULL,
    createDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    changeDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    lastLoginDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    PRIMARY KEY (username),
    CHECK (length(username) <= 50),
    CHECK (length(displayname) <= 50),
    CHECK (length(password) <= 2000)
);

CREATE TABLE IF NOT EXISTS Role (
    roleName TEXT NOT NULL,
    createDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    createdBy TEXT NOT NULL,
    changeDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    changedBy TEXT,
    PRIMARY KEY (roleName),
    CHECK (length(roleName) <= 20)
);

CREATE TABLE IF NOT EXISTS UserRole (
    username TEXT NOT NULL,
    roleName TEXT NOT NULL,
    PRIMARY KEY (username, roleName),
    FOREIGN KEY (username) REFERENCES User (username),
    FOREIGN KEY (roleName) REFERENCES Role (roleName)
);

CREATE TABLE IF NOT EXISTS Game (
    gameName TEXT NOT NULL,
    createDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    createdBy TEXT NOT NULL,
    changeDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    changedBy TEXT,
    PRIMARY KEY (gameName),
    CHECK (length(gameName) <= 50)
);

CREATE TABLE IF NOT EXISTS AccountData (
    userName TEXT NOT NULL,
    password TEXT NOT NULL,
    displayname TEXT,
    tagline TEXT,
    gameName TEXT NOT NULL,
    createDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    createdBy TEXT NOT NULL,
    changeDate TEXT NOT NULL DEFAULT (datetime('now','localtime')),
    changedBy TEXT,
    PRIMARY KEY (userName),
    FOREIGN KEY (gameName) REFERENCES Game(gameName),
    CHECK (length(userName) <= 50),
    CHECK (length(password) <= 50),
    CHECK (length(tagline) <= 10)
);

CREATE TABLE IF NOT EXISTS RoleAccountData (
    roleName TEXT NOT NULL REFERENCES Role(roleName),
    userName TEXT NOT NULL REFERENCES AccountData(userName),
    PRIMARY KEY (roleName, userName)
);
*/

/* 
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Role;
DROP TABLE IF EXISTS UserRole;
DROP TABLE IF EXISTS Game;
DROP TABLE IF EXISTS AccountData;
DROP TABLE IF EXISTS RoleAccountData;
*/

/* 
INSERT INTO User (username, displayname, password, createDate, changeDate, lastLoginDate)
VALUES ('user1', 'User One', 'password123', datetime('now'), datetime('now'), datetime('now'));

INSERT INTO Role (roleName, createDate, createdBy, changeDate, changedBy)
VALUES ('Admin', DATETIME('now'), 'User1', DATETIME('now'), 'User1');

INSERT INTO Game (gameName, createDate, createdBy, changeDate, changedBy)
VALUES ('Game1', DATETIME('now'), 'User1', DATETIME('now'), 'User1');

INSERT INTO AccountData (userName, password, displayname, tagline, createDate, createdBy, changeDate, changedBy, gameId, roleId)
VALUES ('User1', 'password1', 'Display Name 1', 'Tagline 1', DATETIME('now'), 'User1', DATETIME('now'), 'User1', 1, 1);
*/


