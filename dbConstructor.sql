CREATE DATABASE PHP_APSL;

use PHP_APSL;

CREATE TABLE _User (
	_email VARCHAR(50) NOT NULL PRIMARY KEY,
	_password CHAR(32) NOT NULL
);

CREATE TABLE _UserHash (
	_email VARCHAR(50) NOT NULL,
	_hash CHAR(32) NOT NULL,
	_createdTime  DATETIME,
	FOREIGN KEY (_email) REFERENCES _User(_email) ON DELETE CASCADE
);

INSERT INTO _User (_email, _password) VALUES 
	('john@example.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
	('jane@example.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
	('peter@example.com', '6d7fce9fee471194aa8b5b6e47267f03'),
	('susan@example.com', '8e6d3c6bfda3f9aebf8ea1d3163beebb'),
	('michael@example.com', 'd1d1c9b7f0ecf75714e7d5d77124c2b3'),
	('amy@example.com', 'c20ad4d76fe97759aa27a0c99bff6710'),
	('brad@example.com', 'e10adc3949ba59abbe56e057f20f883e'),
	('lisa@example.com', '8e6d3c6bfda3f9aebf8ea1d3163beebb'),
	('chris@example.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
	('jessica@example.com', 'e99a18c428cb38d5f260853678922e03')
;