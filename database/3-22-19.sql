-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.31-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table excel.student_info
CREATE TABLE IF NOT EXISTS `student_info` (
  `student_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `roll` int(11) DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `contact` int(11) DEFAULT '0',
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Dumping data for table excel.student_info: ~4 rows (approximately)
DELETE FROM `student_info`;
/*!40000 ALTER TABLE `student_info` DISABLE KEYS */;
INSERT INTO `student_info` (`student_id`, `name`, `roll`, `email`, `contact`) VALUES
	(25, 'Ashraf', 0, 'a@mail.com', 0),
	(26, 'riyad', 0, 'b@mail.com', 0),
	(27, 'Ashraf Islam', 0, 'masud@gmail.com', 0),
	(28, 'Riyad Islam', 0, 'pavel@gmail.com', 0),
	(29, 'Ashraf', 0, 'a@mail.com', 0),
	(30, 'riyad', 0, 'b@mail.com', 0),
	(31, 'Ashraf Islam', 0, 'masud@gmail.com', 0),
	(32, 'Riyad Islam', 0, 'pavel@gmail.com', 0);
/*!40000 ALTER TABLE `student_info` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
