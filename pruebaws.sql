-- phpMiniAdmin dump 1.9.160630
-- Datetime: 2016-10-01 04:35:05
-- Host: 
-- Database: pruebaws

/*!40030 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

DROP TABLE IF EXISTS `actores`;
CREATE TABLE `actores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `actores` DISABLE KEYS */;
INSERT INTO `actores` VALUES ('1','scarlett johansson','111','cll 111'),('2','leonardo dicaprio','222','cll 222'),('3','Robert Downey Jr','333','cll 333'),('4','emma watson','444','cll 444'),('5','chris evans','555','cll 555'),('6','Kate Winslet','777','cll 777');
/*!40000 ALTER TABLE `actores` ENABLE KEYS */;

DROP TABLE IF EXISTS `actores_has_peliculas`;
CREATE TABLE `actores_has_peliculas` (
  `actores_id` int(11) NOT NULL,
  `peliculas_id` int(11) NOT NULL,
  PRIMARY KEY (`actores_id`,`peliculas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `actores_has_peliculas` DISABLE KEYS */;
INSERT INTO `actores_has_peliculas` VALUES ('1','2'),('1','4'),('1','6'),('2','1'),('2','3'),('3','2'),('3','4'),('3','6'),('4','5'),('5','2'),('5','4'),('6','1');
/*!40000 ALTER TABLE `actores_has_peliculas` ENABLE KEYS */;

DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `peliculas` DISABLE KEYS */;
INSERT INTO `peliculas` VALUES ('1','titanic'),('2','advengers'),('3','django'),('4','civil war'),('5','harry potter'),('6','Iron Man');
/*!40000 ALTER TABLE `peliculas` ENABLE KEYS */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;


-- phpMiniAdmin dump end
