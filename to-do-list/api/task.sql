DROP TABLE IF EXISTS `todo`;
CREATE TABLE IF NOT EXISTS `todo` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `todo` (`id`, `nom`, `date`) VALUES
(1, 'Tondre la pelouse', '2021-10-19 10:42:52'),
(2, 'Acheter de la dinde', '2021-10-19 10:43:28');
COMMIT;
