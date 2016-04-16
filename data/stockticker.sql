DROP TABLE IF EXISTS `movements`;
CREATE TABLE IF NOT EXISTS `movements` (
  `Seq` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Datetime` varchar(19) NOT NULL,
  `Code` varchar(11) NOT NULL,
  `Action` varchar(4) NOT NULL,
  `Amount` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `Player` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` varchar(20) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `Cash` int(4) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `ci_sessions`;
# create the sessions storage file
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (id),
  KEY `ci_sessions_timestamp` (`timestamp`)
);

INSERT INTO `players` (`Player`, `password`, `role`, `avatar`, `Cash`) VALUES
('Mickey', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'player', '/uploads/zephyr5.png', 5000),
('Donald', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'admin', '/uploads/admin.jpg', 10000),
('George', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'player', '/uploads/Ven_Lucifer_av_1.png', 5000),
('Henry', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'player', '/uploads/group1.png', 6500);

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
  `Code` varchar(32) NOT NULL PRIMARY KEY,
  `Name` varchar(255) DEFAULT NULL,
  `Category` varchar(1) DEFAULT NULL,
  `Value` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `Seq` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `DateTime` varchar(19) DEFAULT NULL,
  `Player` varchar(6) DEFAULT NULL,
  `Stock` varchar(32) DEFAULT NULL,
  `Trans` varchar(4) DEFAULT NULL,
  `Quantity` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `certificates`;
CREATE TABLE IF NOT EXISTS `certificates` (
  `token` varchar(8) NOT NULL PRIMARY KEY,
  `stock` varchar(32) NOT NULL,
  `player` varchar(64) NOT NULL,
  `amount` int(11) NOT NULL,
  `datetime` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
