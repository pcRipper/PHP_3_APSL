CREATE DATABASE PHP_APSL
go

use PHP_APSL
go

CREATE TABLE _User (
	_email VARCHAR(50) NOT NULL PRIMARY KEY,
	_password CHAR(32) NOT NULL
)
go

CREATE TABLE _UserHash (
	_email VARCHAR(50) NOT NULL FOREIGN KEY REFERENCES _User(_email) ON DELETE CASCADE,
	_hash CHAR(32) NOT NULL,
	_createdTime  DATETIME
)
go