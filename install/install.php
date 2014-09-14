DROP DATABASE IF EXISTS mhap;
CREATE DATABASE mhap;
use mhap;

CREATE TABLE usergroups(
	id INT(11) NOT NULL AUTO_INCREMENT,
    group_name VARCHAR( 255 ),
	PRIMARY KEY ( id ),
    UNIQUE KEY ( group_name )
) ENGINE = INNODB;

CREATE TABLE accounts(
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR( 255 ) NOT NULL,
    pwd VARCHAR( 255 ) NOT NULL,
    role ENUM( 'admin', 'user' ),
	usergroup_id int(11),
	email VARCHAR( 255 ),
	pic VARCHAR( 255 ),
    PRIMARY KEY ( id ),
	FOREIGN KEY (usergroup_id) REFERENCES usergroup(id) ON DELETE SET NULL ON UPDATE CASCADE,
) ENGINE = INNODB;




CREATE TABLE access_level(
	id INT(11) NOT NULL AUTO_INCREMENT,
    access_name VARCHAR( 255 ),
    access_condition VARCHAR( 255 ),
	PRIMARY KEY ( id ),
    UNIQUE KEY ( access_name )
) ENGINE = INNODB;

CREATE TABLE posts(
    id INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR( 255 ),
    content VARCHAR( 255 ),
    date_created DATETIME,
	date_modified DATETIME,
	last_modified_by_id INT,
	hit INT,
	access_name varchar(255),
	allow_comment TINYINT,
	post_type ENUM( 'post', 'page' ),
	user_id INT,
    PRIMARY KEY ( id ),
	FOREIGN KEY (user_id) REFERENCES accounts(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY (access_name) REFERENCES access_level(access_name) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = INNODB;

CREATE TABLE menu(
    id INT(11) NOT NULL AUTO_INCREMENT,
    label VARCHAR( 255 ) NOT NULL,
    external_url VARCHAR( 255 ),
    internal_url VARCHAR( 255 ),
	target ENUM( '_self', '_blank', '_parent' ),
	priority int(3),
	parent_id int(11) DEFAULT NULL,
    PRIMARY KEY ( id ),
	FOREIGN KEY (parent_id) REFERENCES menu(id) ON DELETE SET NULL
) ENGINE = INNODB;

CREATE TABLE map(
    id INT(11) NOT NULL AUTO_INCREMENT,
    map_name VARCHAR( 255 ) NOT NULL,
    description TEXT,
    access_name varchar(255),
    PRIMARY KEY ( id ),
	FOREIGN KEY (access_name) REFERENCES access_level(access_name) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = INNODB;

CREATE TABLE region(
    id INT(11) unsigned NOT NULL AUTO_INCREMENT,
    region_name VARCHAR( 255 ) NOT NULL,
    map_id int(11),
	geom TEXT,
	description TEXT,
    PRIMARY KEY ( id ),
	FOREIGN KEY (map_id) REFERENCES map(id) ON DELETE CASCADE
) ENGINE = INNODB;

CREATE TABLE comments(
    id INT(11) unsigned NOT NULL AUTO_INCREMENT,
    title VARCHAR( 255 ),
    user_id int(11) NOT NULL,
	post_id int(11) NOT NULL,
	content TEXT,
	date_created DATETIME,
	date_modified DATETIME,
    PRIMARY KEY (id),
	FOREIGN KEY (user_id) REFERENCES accounts(id) ON DELETE CASCADE,
	FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
) ENGINE = INNODB;

CREATE TABLE files(
    id INT(11) NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL,
	description TEXT,
	location varchar(255),
	downloaded int(11),
	access_name varchar(255),
	date_created DATETIME,
	uploader int(11),
    PRIMARY KEY ( id ),
	FOREIGN KEY (uploader) REFERENCES accounts(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY (access_name) REFERENCES access_level(access_name) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = INNODB;


CREATE TABLE like_dislike(
    id INT(11) NOT NULL AUTO_INCREMENT,
    user_id int(11) ,
	post_id int(11) ,	
	comment_id int(11) unsigned,
	vote enum("up","down"),
	file_id int(11),
    PRIMARY KEY (id),
	FOREIGN KEY (user_id) REFERENCES accounts(id) ON DELETE CASCADE,
	FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
	FOREIGN KEY (comment_id) REFERENCES comments(id) ON DELETE CASCADE,
	FOREIGN KEY (file_id) REFERENCES files(id) ON DELETE CASCADE
) ENGINE = INNODB;

CREATE TABLE themes(
    id INT(11) NOT NULL AUTO_INCREMENT,
    themes_name varchar(255),
	themes_type enum('admin','front'),
    PRIMARY KEY (id),
	UNIQUE KEY ( themes_name )
) ENGINE = INNODB;

CREATE TABLE settings(
    id INT(11) NOT NULL AUTO_INCREMENT,
    web_name varchar(255) NOT NULL,
	front_themes varchar(255),
	admin_themes varchar(255),
	themes_path varchar(255),
	PRIMARY KEY (id),
	FOREIGN KEY (front_themes) REFERENCES themes(themes_name) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (admin_themes) REFERENCES themes(themes_name) ON DELETE CASCADE ON UPDATE CASCADE
    
) ENGINE = INNODB;


CREATE VIEW getPosts AS SELECT accounts.*, posts.title FROM accounts LEFT JOIN posts ON accounts.id = posts.user_id;

DELIMITER //
CREATE PROCEDURE getAllUsers(IN _offset int, IN _page_size int)
BEGIN
    select * from accounts LIMIT _offset, _page_size;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE getUser(IN _id int)
BEGIN
    select * from accounts WHERE id=_id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE getPost(IN _id int)
BEGIN
    select * from getPosts WHERE id=_id;
END //
DELIMITER ;


INSERT INTO accounts ( username, pwd , email ) VALUES ("raw1", "raw1", "email");
INSERT INTO accounts ( username, pwd , email ) VALUES ("raw2", "raw2", "email2");
INSERT INTO menu ( label ) VALUES ("career");
INSERT INTO menu ( label, parent_id ) VALUES ("apply", 1);
INSERT INTO access_level ( access_name ) VALUES ("user");
INSERT INTO access_level ( access_name ) VALUES ("user_condition");
INSERT INTO access_level ( access_name ) VALUES ("admin");
INSERT INTO posts ( title, content , user_id, post_type ) VALUES ("title1", "content1", "1", "page");
INSERT INTO posts ( title, content , user_id, access_name ) VALUES ("title2", "content2", "1", "admin");
INSERT INTO themes ( themes_name , themes_type ) VALUES ("default", "front");
INSERT INTO themes ( themes_name , themes_type ) VALUES ("admin", "admin");
INSERT INTO settings ( web_name , front_themes, admin_themes,themes_path ) VALUES ("mDMS", "default", "admin", "./themes");