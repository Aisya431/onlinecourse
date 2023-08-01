-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.9.2-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for smartclean
CREATE DATABASE IF NOT EXISTS `smartclean` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */;
USE `smartclean`;

-- Dumping structure for table smartclean.inventory
CREATE TABLE IF NOT EXISTS `inventory` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table smartclean.inventory: ~4 rows (approximately)
INSERT INTO `inventory` (`id_barang`, `nama_barang`) VALUES
	(1, 'sapu'),
	(2, 'pel-pelan'),
	(3, 'vacum'),
	(4, 'pengki');

-- Dumping structure for table smartclean.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_order` date DEFAULT NULL,
  `waktu_order` time DEFAULT NULL,
  `alamat` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_order`) USING BTREE,
  KEY `id_customer` (`id_customer`),
  KEY `id_service` (`id_service`),
  CONSTRAINT `FK_order_reg_customer_2` FOREIGN KEY (`id_customer`) REFERENCES `register` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_order_service` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table smartclean.orders: ~5 rows (approximately)
INSERT INTO `orders` (`id_order`, `tanggal_order`, `waktu_order`, `alamat`, `id_service`, `id_customer`) VALUES
	(41, '2023-06-09', '17:19:00', 'jl.samudra', 1, 2),
	(42, '2023-06-11', '19:29:00', 'jl.samudra', 1, 16),
	(45, '2023-06-11', '22:11:00', 'dimana aja', 1, 16),
	(46, '2023-06-06', '07:56:00', 'sunan drajat', 1, 15),
	(47, '2023-06-12', '10:51:00', 'jl.samudra', 1, 16);

-- Dumping structure for table smartclean.payment
CREATE TABLE IF NOT EXISTS `payment` (
  `id_payment` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_payment` date DEFAULT NULL,
  `time_payment` time DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL,
  `file` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `status` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_payment`),
  KEY `id_order` (`id_order`),
  KEY `id_service` (`id_service`),
  CONSTRAINT `FK_payment_order` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_payment_orders` FOREIGN KEY (`id_service`) REFERENCES `orders` (`id_service`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table smartclean.payment: ~0 rows (approximately)

-- Dumping structure for table smartclean.register
CREATE TABLE IF NOT EXISTS `register` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `password` varchar(100) COLLATE armscii8_bin DEFAULT NULL,
  `alamat` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `no_telepon` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `FK_register_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table smartclean.register: ~4 rows (approximately)
INSERT INTO `register` (`id_user`, `username`, `email`, `password`, `alamat`, `no_telepon`, `id_role`) VALUES
	(1, 'admin', 'sasa@gmail.com', 'f45731e3d39a1b2330bbf93e9b3de59e', 'jl.samudra', '0702786', 1),
	(2, 'muti', 's@gmail.com', '20c1a26a55039b30866c9d0aa51953ca', 'uin', '6124', 2),
	(15, 'sasa', 'aisyag209@gmail.com', 'f45731e3d39a1b2330bbf93e9b3de59e', 'jl.samudra', '001652', 2),
	(16, 'heny', 'heny@gmail.com', '1824201c22c2e63933e18a75dda1e466', 'jl.samudra', '0728652', 2);

-- Dumping structure for table smartclean.review
CREATE TABLE IF NOT EXISTS `review` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `isi_review` text COLLATE armscii8_bin DEFAULT NULL,
  `waktu_review` datetime DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `id_payment` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_review`),
  KEY `id_payment` (`id_payment`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `FK2_review_payment` FOREIGN KEY (`id_payment`) REFERENCES `payment` (`id_payment`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_review_reg_customer` FOREIGN KEY (`id_customer`) REFERENCES `register` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table smartclean.review: ~0 rows (approximately)

-- Dumping structure for table smartclean.role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table smartclean.role: ~3 rows (approximately)
INSERT INTO `role` (`id_role`, `nama_role`) VALUES
	(1, 'Admin'),
	(2, 'Customer'),
	(3, 'Cleaner');

-- Dumping structure for table smartclean.schedule
CREATE TABLE IF NOT EXISTS `schedule` (
  `id_schedule` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_schedule` date DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `id_cleaner` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_schedule`),
  KEY `id_cleaner` (`id_cleaner`),
  KEY `id_barang` (`id_barang`),
  CONSTRAINT `FK_schedule_inventory` FOREIGN KEY (`id_barang`) REFERENCES `inventory` (`id_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_schedule_reg_customer` FOREIGN KEY (`id_cleaner`) REFERENCES `register` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table smartclean.schedule: ~1 rows (approximately)
INSERT INTO `schedule` (`id_schedule`, `tanggal_schedule`, `waktu_mulai`, `waktu_selesai`, `id_cleaner`, `id_barang`) VALUES
	(1, '2023-06-11', '08:31:25', '10:31:26', 16, 4);

-- Dumping structure for table smartclean.service
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_service` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `harga` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table smartclean.service: ~3 rows (approximately)
INSERT INTO `service` (`id_service`, `jenis_service`, `harga`) VALUES
	(1, 'kamar tidur', '20000'),
	(2, 'Dapur', '18000'),
	(3, 'ruang tamu', '25000');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
