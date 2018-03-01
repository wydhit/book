
CREATE TABLE IF NOT EXISTS `ip_count` (
  `ip` char(15) NOT NULL,
  `count` smallint(5) unsigned NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `ip_count`
  ADD UNIQUE KEY `ip` (`ip`);

