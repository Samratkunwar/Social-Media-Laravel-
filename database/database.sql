DROP TABLE IF EXISTS posts;
CREATE TABLE posts (
post_id     integer not null primary key autoincrement,
comment_no  int,
username    VARCHAR(20),
title       VARCHAR(10),
message     VARCHAR(30),
date        char,
pst_pic     image,
pro_pic     image
);

DROP TABLE IF EXISTS comments;
CREATE TABLE comments  (
comment_id  integer not null primary key autoincrement,
post_id     VARCHAR(20) ,
username    VARCHAR(20),
p_comments  VARCHAR(220)
/*FOREIGN KEY (post_id) REFERENCES posts(post_id)*/
);

Drop table if exists users;
create table users (
user_id     VARCHAR(20),
username    VARCHAR(20),
pro_pic     image,
post_id     integer,
foreign key (post_id) references posts(post_id)
);

INSERT INTO posts VALUES (null, 3, "Siri", "Cosplay Time", "It'll blow your mind.", "27 August 2019", "siricosplay.jpg", "siri.jpg");
INSERT INTO posts VALUES (null, 0, "Harry", "Night light", "The Night Brings out the color of life.", "26 August 2019", "night-lights.png", "harry.jpg");
INSERT INTO posts VALUES (null, 0, "Alexandra", "Mood", "Blu eyes make the ocean look pale.", "27 August 2019", "alexandra(p1).jpg", "alexandra.jpg");

INSERT INTO comments VALUES(null, "1", "harry","Nice outfit");
INSERT INTO comments VALUES(null, "1", "alexandra","Looks great.");
INSERT INTO comments VALUES(null, "1", "siri","Beautiful");

Insert into users values (1, "Siri", "siri.jpg", null);
Insert into users values (2, "Harry", "harry.jpg", null);
Insert into users values (3, "Alexandra", "alexandra.jpg", null);
