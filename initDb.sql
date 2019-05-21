
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;


INSERT INTO `users` (`id`, `name`) VALUES
(1, 'Jon'),
(2, 'Steve'),
(3, 'Kikim');

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN key  (user_id) REFERENCES user(id)
) ENGINE=MyISAM;



INSERT INTO `books` (`id`, `title`, `user_id`) VALUES
(1, 'Just do it ..', 1),
(2, 'The best way ...', 1),
(3,'Marketing 4.0',3);
