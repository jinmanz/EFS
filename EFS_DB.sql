
CREATE TABLE contributor (
contributorid tinyint unsigned NOT NULL auto_increment PRIMARY KEY,
firstname varchar(100),
surname varchar(100),
email varchar(100),
phone varchar(100),
contributortype varchar(100)
);

CREATE TABLE administrator (
administratorid tinyint unsigned NOT NULL auto_increment PRIMARY KEY,
firstname varchar(100),
surname varchar(100),
email varchar(100),
login varchar(100),
password varchar(100),
phone varchar(100)
);

CREATE TABLE news (
newsid tinyint unsigned NOT NULL auto_increment PRIMARY KEY,
headline varchar(200), 
synopsis varchar(2000),
comments varchar(2500),
contributorid tinyint,
administratorid tinyint, 
copyrightinfo varchar(2000),
newssource varchar(2000),
contactfirstname varchar(100),
contactsurname varchar(100),
contactemail varchar(100),
contactphone varchar(100),
newswebsite varchar(100),
submissionfile varchar(2000),
status varchar(200),
submissiondate timestamp,
submissionumber int   
);

CREATE TABLE event (
eventid tinyint unsigned NOT NULL auto_increment PRIMARY KEY,
tittle varchar(2000),
synopsis varchar(2000),
eventdate date,
eventime varchar(2000),
location varchar(2000),  
comments varchar(2500),
contributorid tinyint,
administratorid tinyint,
copyrightinfo varchar(2000),
contactfirstname varchar(100),
contactsurname varchar(100),
contactemail varchar(100),
contactphone varchar(100),
submissionfile varchar(2000),
status varchar(200),
submissiondate timestamp,
submissionumber int   
);




CREATE TABLE event_mediavenue (
eventid tinyint,
mvid tinyint
);


CREATE TABLE news_mediavenue (
newsid tinyint,
mvid tinyint
);


CREATE TABLE mediavenue (
mvid tinyint unsigned NOT NULL auto_increment PRIMARY KEY,
mvname varchar(100),
contactname varchar(100),
contactsurname varchar(100),
contactemail varchar(100),
contactphone varchar(100)

);


