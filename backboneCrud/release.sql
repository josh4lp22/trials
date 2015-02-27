/*
SQLyog Ultimate v9.01 
MySQL - 5.5.24-log : Database - company
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `releases` */

DROP TABLE IF EXISTS `releases`;

CREATE TABLE `releases` (
  `release_id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` bigint(20) DEFAULT NULL,
  `release_name` varchar(765) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `genre_id` tinyint(3) DEFAULT NULL,
  `c_line` varchar(765) DEFAULT NULL,
  `release_status` char(57) DEFAULT NULL,
  PRIMARY KEY (`release_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1173095 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
