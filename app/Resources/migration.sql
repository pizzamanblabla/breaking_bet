CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(11) NOT NULL auto_increment,
  `code` char(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ;

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL auto_increment,
  `sport_id` int(11) NOT NULL,
  `code` char(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)