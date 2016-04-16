DROP TABLE IF EXISTS `movements`;
CREATE TABLE IF NOT EXISTS `movements` (
  `Seq` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Datetime` varchar(19) NOT NULL,
  `Code` varchar(11) NOT NULL,
  `Action` varchar(4) NOT NULL,
  `Amount` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `movements` (`Datetime`, `Code`, `Action`, `Amount`) VALUES
('2016.02.01-09:01:00', 'BOND', 'down', 5),
('2016.02.01-09:01:02', 'IND', 'div', 5),
('2016.02.01-09:01:04', 'OIL', 'down', 10),
('2016.02.01-09:01:06', 'GOLD', 'div', 5),
('2016.02.01-09:01:08', 'BOND', 'up', 20),
('2016.02.01-09:01:10', 'GOLD', 'div', 5),
('2016.02.01-09:01:12', 'GOLD', 'down', 20),
('2016.02.01-09:01:14', 'IND', 'div', 10),
('2016.02.01-09:01:16', 'OIL', 'up', 20),
('2016.02.01-09:01:18', 'BOND', 'down', 5),
('2016.02.01-09:01:20', 'BOND', 'up', 5),
('2016.02.01-09:01:22', 'BOND', 'div', 20),
('2016.02.01-09:01:24', 'BOND', 'div', 20),
('2016.02.01-09:01:26', 'GOLD', 'div', 20),
('2016.02.01-09:01:28', 'IND', 'up', 20),
('2016.02.01-09:01:30', 'OIL', 'down', 20),
('2016.02.01-09:01:32', 'GRAN', 'down', 20),
('2016.02.01-09:01:34', 'BOND', 'up', 5),
('2016.02.01-09:01:36', 'GOLD', 'down', 20),
('2016.02.01-09:01:38', 'GOLD', 'down', 20),
('2016.02.01-09:01:40', 'TECH', 'down', 20),
('2016.02.01-09:01:42', 'TECH', 'up', 5),
('2016.02.01-09:01:44', 'OIL', 'up', 20),
('2016.02.01-09:01:46', 'BOND', 'up', 5),
('2016.02.01-09:01:48', 'GOLD', 'div', 10),
('2016.02.01-09:01:50', 'GOLD', 'down', 5),
('2016.02.01-09:01:52', 'GOLD', 'up', 20),
('2016.02.01-09:01:54', 'IND', 'down', 10),
('2016.02.01-09:01:56', 'GOLD', 'div', 20);

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

INSERT INTO `stocks` (`Code`, `Name`, `Category`, `Value`) VALUES
('BOND', 'Bonds', 'B', 66),
('GOLD', 'Gold', 'B', 110),
('GRAN', 'Grain', 'B', 113),
('IND', 'Industrial', 'B', 39),
('OIL', 'Oil', 'B', 52),
('TECH', 'Tech', 'B', 37);

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `Seq` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `DateTime` varchar(19) DEFAULT NULL,
  `Player` varchar(6) DEFAULT NULL,
  `Stock` varchar(32) DEFAULT NULL,
  `Trans` varchar(4) DEFAULT NULL,
  `Quantity` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `transactions` (`DateTime`, `Player`, `Stock`, `Trans`, `Quantity`) VALUES
('2016.02.01-09:01:00', 'Donald', 'BOND', 'buy', 100),
('2016.02.01-09:01:05', 'Donald', 'TECH', 'sell', 1000),
('2016.02.01-09:01:10', 'Henry', 'TECH', 'sell', 1000),
('2016.02.01-09:01:15', 'Donald', 'IND', 'sell', 1000),
('2016.02.01-09:01:20', 'George', 'GOLD', 'sell', 100),
('2016.02.01-09:01:25', 'George', 'OIL', 'buy', 500),
('2016.02.01-09:01:30', 'Henry', 'GOLD', 'sell', 100),
('2016.02.01-09:01:35', 'Henry', 'GOLD', 'buy', 1000),
('2016.02.01-09:01:40', 'Donald', 'TECH', 'buy', 100),
('2016.02.01-09:01:45', 'Donald', 'OIL', 'sell', 100),
('2016.02.01-09:01:50', 'Donald', 'TECH', 'sell', 100),
('2016.02.01-09:01:55', 'George', 'OIL', 'buy', 100),
('2016.02.01-09:01:60', 'George', 'IND', 'buy', 100);

DROP TABLE IF EXISTS `certificates`;
CREATE TABLE IF NOT EXISTS `certificates` (
  `token` varchar(8) NOT NULL PRIMARY KEY,
  `stock` varchar(32) NOT NULL,
  `player` varchar(64) NOT NULL,
  `amount` int(11) NOT NULL,
  `datetime` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `certificates` (`token`, `stock`, `player`, `amount`, `datetime`) VALUES
('17b5c', 'GOLD', 'Donald', 10, '2016.02.29-09:01:00'),
('1cff5', 'GOLD', 'Donald', 10, '2016.02.29-09:01:00'),
('37f5c', 'GOLD', 'Donald', 10, '2016.02.29-09:01:00'),
('83651', 'GOLD', 'Donald', 10, '2016.02.29-09:01:00'),
('96cab', 'GOLD', 'Donald', 10, '2016.02.29-09:01:00'),
('ABCD1234', 'GOLD', 'Mickey', 100, '2016.02.29-09:01:00'),
('d16d4', 'GOLD', 'Donald', 1000, '2016.02.29-09:01:00');

