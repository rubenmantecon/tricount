DROP DATABASE IF EXISTS `tricount`;
CREATE DATABASE `tricount`;
USE `tricount`;

DROP TABLE IF EXISTS `TRAVELS`;

/*Maybe in TRAVELS there should be a check
to see if arrival_date > depart_date.

We can't timetravel yet.
Also, depart and arrival must be different.It has been agreed
to filter this in the PHP server logic, not the backend itself*/

CREATE TABLE `TRAVELS` (
`id` int(3) PRIMARY KEY AUTO_INCREMENT
, `id_owner` int(3) NOT NULL
, `name` varchar(30) NOT NULL
, `description` varchar(30)
, `currency` varchar(10)
, `arrival` varchar(30) NOT NULL
, `depart_date` date NOT NULL
, `arrival_date` date NOT NULL
);

DROP TABLE IF EXISTS `USERS`;

CREATE TABLE `USERS` (
`id` int(3) PRIMARY KEY AUTO_INCREMENT
,`name` varchar(20) NOT NULL	
,`surname` varchar(20) NOT NULL
, `email` varchar(30) NOT NULL
,`username` varchar(20) NOT NULL
,`password` varchar(255) NOT NULL
);

DROP TABLE IF EXISTS `EXPENDITURES`;

CREATE TABLE `EXPENDITURES` (
`id` int(3) PRIMARY KEY AUTO_INCREMENT
, `user_id` int(3) NOT NULL
, `travel_id` int(3) NOT NULL
, `amount` decimal(13,2) NOT NULL
, `emission_date` date NOT NULL
);

DROP TABLE IF EXISTS `USERS-USERS`;

CREATE TABLE `USERS-USERS` (
`id_user1` int(3)
, `id_user2` int(3)
, CONSTRAINT `fk_user_user1` FOREIGN KEY (`id_user1`) REFERENCES `USERS`(`id`)
, CONSTRAINT `fk_user_user2` FOREIGN KEY (`id_user2`) REFERENCES `USERS`(`id`)
);

DROP TABLE IF EXISTS `USERS-EXPENDITURES`;

CREATE TABLE `USERS-EXPENDITURES` (
`id_user` int(3)
, `id_expenditure` int(3)
, CONSTRAINT `fk_user_expenditure` FOREIGN KEY (`id_user`) REFERENCES EXPENDITURES(id)
, CONSTRAINT `fk_expenditure_user` FOREIGN KEY (`id_expenditure`) REFERENCES USERS(id)
);

DROP TABLE IF EXISTS `USERS-TRAVELS`;

CREATE TABLE `USERS-TRAVELS`(
`id_user` int(3)
, `id_travel` int(3)
, CONSTRAINT `fk_user_travel` FOREIGN KEY (id_user) REFERENCES TRAVELS(id)
, CONSTRAINT `fk_travel_user` FOREIGN KEY (id_travel) REFERENCES USERS(id)
);
