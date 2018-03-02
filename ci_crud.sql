/*
SQLyog Community v12.4.2 (64 bit)
MySQL - 5.6.36 : Database - ci_crud
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ci_crud` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ci_crud`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `barang_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `barang_nama` varchar(100) DEFAULT NULL,
  `barang_harga` int(11) DEFAULT NULL,
  `barang_stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `barang` */

insert  into `barang`(`barang_id`,`barang_nama`,`barang_harga`,`barang_stok`) values 
(1,'Sepatu Baru',120000,5),
(2,'Paket Seragam SMP',115000,10),
(3,'Baju Kebesaran',80000,4),
(4,'Sandal Murah',8500,12),
(5,'Baru',20000,7);

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT,
  `mahasiswa_nim` char(10) NOT NULL,
  `mahasiswa_nama` varchar(100) NOT NULL,
  `mahasiswa_jurusan` enum('informatika','manajemen','akuntansi','geografi','pertanian') NOT NULL,
  `mahasiswa_alamat` varchar(150) NOT NULL,
  PRIMARY KEY (`mahasiswa_id`),
  UNIQUE KEY `mahasiswa_nim` (`mahasiswa_nim`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `mahasiswa` */

insert  into `mahasiswa`(`mahasiswa_id`,`mahasiswa_nim`,`mahasiswa_nama`,`mahasiswa_jurusan`,`mahasiswa_alamat`) values 
(1,'16.21.0957','Andika Saputra','informatika','Indonesia'),
(3,'9809','test lagi','informatika','dfsfd'),
(4,'953984','9879u','manajemen','34543');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
