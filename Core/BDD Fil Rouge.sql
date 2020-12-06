DROP TABLE IF EXISTS user_answer;
DROP TABLE IF EXISTS poll_entry;
DROP TABLE IF EXISTS poll_answer;
DROP TABLE IF EXISTS poll;
DROP TABLE IF EXISTS user;

CREATE TABLE `user`
(
    `user_id`       int(30) PRIMARY KEY AUTO_INCREMENT,
    `first_name`    varchar(200),
    `last_name`     varchar(200),
    `email`         varchar(200) UNIQUE NOT NULL,
    `username`      varchar(200) UNIQUE NOT NULL,
    `password`      varchar(200)        NOT NULL,
    `CREATION_DATE` datetime            NOT NULL DEFAULT NOW()
) ENGINE INNODB;

CREATE TABLE `poll`
(
    `poll_id`       int(30) PRIMARY KEY AUTO_INCREMENT,
    `creator_id`    int(30)      NOT NULL,
    `title`         varchar(500) NOT NULL,
    `category_id`   int(11)      NOT NULL,
    `END_DATE`      datetime     NOT NULL,
    `CREATION_DATE` datetime     NOT NULL DEFAULT NOW()
) ENGINE INNODB;

CREATE TABLE `poll_answer`
(
    `answer_id`  int(30) PRIMARY KEY AUTO_INCREMENT,
    `poll_id`    int(30)      NOT NULL,
    `title`      varchar(500) NOT NULL,
    `is_correct` boolean      NOT NULL
) ENGINE INNODB;

CREATE TABLE `poll_entry`
(
    `entry_id` int(30) PRIMARY KEY AUTO_INCREMENT,
    `poll_id`  int(30) NOT NULL,
    `user_id`  int(30) NOT NULL,
    `score`    int(10) DEFAULT 0
) ENGINE INNODB;

CREATE TABLE `user_answer`
(
    `answer_id`      int(30) PRIMARY KEY AUTO_INCREMENT,
    `entry_id`       int(30) NOT NULL,
    `poll_answer_id` int(30) NOT NULL
) ENGINE INNODB;

CREATE TABLE `category`
(
    `category_id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `name`        varchar(100) UNIQUE NOT NULL
) ENGINE INNODB;

ALTER TABLE poll ADD FOREIGN KEY (creator_id) REFERENCES user (user_id);

ALTER TABLE poll ADD FOREIGN KEY (category_id) REFERENCES category (category_id);

ALTER TABLE poll_answer ADD FOREIGN KEY (poll_id) REFERENCES poll (poll_id);

ALTER TABLE poll_entry ADD FOREIGN KEY (poll_id) REFERENCES poll (poll_id);

ALTER TABLE poll_entry ADD FOREIGN KEY (user_id) REFERENCES user (user_id);

ALTER TABLE user_answer ADD FOREIGN KEY (entry_id) REFERENCES poll_entry (entry_id);

ALTER TABLE user_answer ADD FOREIGN KEY (poll_answer_id) REFERENCES poll_answer (answer_id);
