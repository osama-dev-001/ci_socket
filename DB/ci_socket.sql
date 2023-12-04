-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for test
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test`;

-- Dumping structure for table test.tbl_msg
CREATE TABLE IF NOT EXISTS `tbl_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` longtext DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_msg: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_msg` DISABLE KEYS */;
INSERT INTO `tbl_msg` (`id`, `msg`, `date`, `status`) VALUES
	(1, 'Hi', '2023-12-04 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Hi', '2023-12-04 00:00:00', '0000-00-00 00:00:00'),
	(3, 'hi', '2023-12-04 00:00:00', '0000-00-00 00:00:00'),
	(4, 'hi', '2023-12-04 00:00:00', '0000-00-00 00:00:00'),
	(5, 'hi', '2023-12-04 00:00:00', '0000-00-00 00:00:00'),
	(18, 'gfgfdgfdgf', '2023-12-04 00:00:00', '0000-00-00 00:00:00'),
	(19, 'Hello this is me, osama', '2023-12-04 00:00:00', '0000-00-00 00:00:00'),
	(20, 'fgfdgfdg', '2023-12-04 00:00:00', '0000-00-00 00:00:00'),
	(21, 'ddfdfdf', '2023-12-04 00:00:00', '0000-00-00 00:00:00'),
	(22, 'ahuhbnucdhbnh', '2023-12-04 00:00:00', '0000-00-00 00:00:00'),
	(23, 'ahuhbnucdhbnh', '2023-12-04 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_msg` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
