DROP TABLE IF EXISTS `#__basiclunch`;

CREATE TABLE `#__basiclunch` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`size` varchar(25) NOT NULL,
	PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__basiclunch` (`size`) VALUES
	('only 2 persons'),
	('small group with 3 to 4 persons'),
	('big group with 5 to 6 persons');
