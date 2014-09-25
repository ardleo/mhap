DROP DATABASE IF EXISTS mhap;
CREATE DATABASE mhap;
use mhap;

CREATE TABLE usergroups(
	id INT(11) NOT NULL AUTO_INCREMENT,
    group_name VARCHAR( 255 ),
	role_id int(11),
	PRIMARY KEY ( id ),
    UNIQUE KEY ( role_id )
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
	FOREIGN KEY (usergroup_id) REFERENCES usergroups(role_id) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = INNODB;



CREATE TABLE posts(
    id INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR( 255 ),
    content VARCHAR( 255 ),
    date_created DATETIME,
	date_modified DATETIME,
	last_modified_by_id INT,
	hit INT,
	allow_comment TINYINT,
	post_type ENUM( 'post', 'page' ),
	user_id INT,
	permission_usergroup int(11),
	permission_user int(11),
    PRIMARY KEY ( id ),
	FOREIGN KEY (user_id) REFERENCES accounts(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY (permission_usergroup) REFERENCES usergroups(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY (permission_user) REFERENCES accounts(id) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = INNODB;

CREATE TABLE menu(
    id INT(11) NOT NULL AUTO_INCREMENT,
    label VARCHAR( 255 ) NOT NULL,
    external_url VARCHAR( 255 ),
    internal_url VARCHAR( 255 ),
	target ENUM( '_self', '_blank', '_parent' ),
	priority int(3),
	parent_id int(11) DEFAULT NULL,
	position ENUM( 'top', 'side' ),
    PRIMARY KEY ( id ),
	FOREIGN KEY (parent_id) REFERENCES menu(id) ON DELETE SET NULL
) ENGINE = INNODB;

CREATE TABLE map(
    id INT(11) NOT NULL AUTO_INCREMENT,
    map_name VARCHAR( 255 ) NOT NULL,
    description TEXT,
    PRIMARY KEY ( id )
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

CREATE TABLE files_category(
	id INT(11) NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL,
	PRIMARY KEY ( id ),
	UNIQUE KEY(title)
) ENGINE = INNODB;

CREATE TABLE files(
    id INT(11) NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL,
	description TEXT,
	location varchar(255),
	downloaded int(11),
	date_created DATETIME,
	uploader int(11),
	file_category varchar(255) NOT NULL,
	permission_usergroup int(11),
	permission_user int(11),
    PRIMARY KEY ( id ),
	FOREIGN KEY (uploader) REFERENCES accounts(id) ON DELETE SET NULL ON UPDATE CASCADE,	
	FOREIGN KEY (permission_usergroup) REFERENCES usergroups(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY (permission_user) REFERENCES accounts(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY (file_category) REFERENCES files_category(title) ON UPDATE CASCADE
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
	module varchar(255) NOT NULL,
	code varchar(255) NOT NULL,
	name varchar(255),
	description TEXT,
	value varchar(255),
	PRIMARY KEY ( module, code )    
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
    SELECT * FROM posts LEFT JOIN accounts ON accounts.id = posts.user_id WHERE posts.id=_id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE getAllPost(IN offset int, IN page_size int)
BEGIN
    SELECT * FROM posts LEFT JOIN accounts ON accounts.id = posts.user_id GROUP BY posts.id ASC LIMIT offset, page_size;
END //
DELIMITER ;


INSERT INTO usergroups ( group_name, role_id ) VALUES ("admin", 1);
INSERT INTO usergroups ( group_name, role_id ) VALUES ("user", 0);
INSERT INTO accounts ( username, pwd , email, usergroup_id ) VALUES ("user1", "raw1", "email", 1);
INSERT INTO accounts ( username, pwd , email, usergroup_id ) VALUES ("raw2", "raw2", "email2", 0);
INSERT INTO menu ( label, parent_id, position ) VALUES ("Document", NULL, "side");
INSERT INTO menu ( label, parent_id, position ) VALUES ("News Feed", NULL, "side");
INSERT INTO menu ( label, parent_id, position ) VALUES ("Event & Info",NULL, "side");
INSERT INTO menu ( label, parent_id, position ) VALUES ("Inbox", NULL, "top");
INSERT INTO menu ( label, parent_id, position ) VALUES ("Profile", 1, "top");
INSERT INTO menu ( label, parent_id, position ) VALUES ("Edit", 1, "top");
INSERT INTO posts ( title, content , user_id, post_type ) VALUES ("title1", "content1", "1", "page");
INSERT INTO posts ( title, content , user_id ) VALUES ("title2", "content2", "1");
INSERT INTO themes ( themes_name , themes_type ) VALUES ("default", "front");
INSERT INTO themes ( themes_name , themes_type ) VALUES ("admin", "admin");
INSERT INTO settings ( module , code, name, description, value ) VALUES ("web", "web_name", "Web Name", "Your website name", "mDMS");
INSERT INTO settings ( module , code, name, description, value ) VALUES ("web", "web_domain", "Web Domain", "Your website domain", "http://localhost");
INSERT INTO settings ( module , code, name, description, value ) VALUES ("web", "web_theme_path", "Themes Path", "Location of your themes", "./theme");
INSERT INTO settings ( module , code, name, description, value ) VALUES ("web", "web_front_theme", "Front theme", "Front theme", "default");
INSERT INTO settings ( module , code, name, description, value ) VALUES ("web", "web_base_path", "BASE PATH", "Base Path", "/mhap");
INSERT INTO settings ( module , code, name, description, value ) VALUES ("dashboard", "dashboard_main_panel", "Main Panel", "Main Panel", "files.php");
INSERT INTO files_category ( title  ) VALUES ( "important");
INSERT INTO files ( title , uploader, file_category  ) VALUES ("test", 1, "important");