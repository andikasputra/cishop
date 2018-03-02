/*
SQLyog Community v12.4.2 (64 bit)
MySQL - 5.6.36 : Database - ci_shop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ci_shop` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ci_shop`;

/*Table structure for table `address` */

DROP TABLE IF EXISTS `address`;

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `address_prov` varchar(100) NOT NULL,
  `address_kab` varchar(100) NOT NULL,
  `address_kec` varchar(100) NOT NULL,
  `address_kel` varchar(100) NOT NULL,
  `address_alamat` varchar(150) NOT NULL,
  `address_pos` varchar(5) NOT NULL,
  `address_phone` varchar(20) NOT NULL,
  `address_nama` varchar(100) NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `address` */

insert  into `address`(`address_id`,`user_id`,`address_prov`,`address_kab`,`address_kec`,`address_kel`,`address_alamat`,`address_pos`,`address_phone`,`address_nama`) values 
(6,17,'','Kabupaten Bantul','Pajangan','Guwosari','Prigngading','55751','098909','Andika Saputra'),
(7,17,'','Kota Bekasi','Kecamatan','Kelurahan','Alamat lengkap','87979','67890987','Andika Saputra'),
(8,17,'','Kota Bekasi','Kecamatan','Kelurahan','Alamat lengkap','87979','67890987','Andika Saputra'),
(9,17,'','Kabupaten Kebumen','Kecamatan','Kelurahan','Jln Jalan','89789','0978675','Andika Saputra'),
(10,17,'','Kabupaten Kediri','Kecamatan','Kelurahan','Alamat Jalan','99879','0897876','Andika Saputra'),
(11,17,'','Kabupaten Kendal','Kecamatan','Kelurahan','Alamat Jalan','99879','0897876','Andika Saputra'),
(12,17,'','Kota Kediri','Kecamatan','Kelurahan','Alamat Jalan','99879','0897876','Andika Saputra'),
(13,17,'','Kabupaten Kediri','Kecamatan','Kelurahan','Alamat Jalan','99879','0897876','Andika Saputra'),
(14,17,'Jawa Barat','Kota Bandung','Kecamatan','Kelurahan','Alamat Jalan','99879','0897876','Andika Saputra'),
(15,19,'','Kota Pekalongan','hgjkl','jkl','jauh','67889','09876','nganu');

/*Table structure for table `brands` */

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `brand_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_logo` varchar(255) NOT NULL,
  `brand_description` varchar(255) NOT NULL,
  `brand_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `unique_brand_slug` (`brand_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `brands` */

insert  into `brands`(`brand_id`,`brand_name`,`brand_logo`,`brand_description`,`brand_slug`) values 
(1,'Adidas','adidas1.png','deskripsi adidas','adidas'),
(2,'Cardinal','default.jpg','deskripsi cardinal','cardinal'),
(3,'Eiger','eiger.jpg','deskripsi eiger','eiger'),
(11,'New Era','new-era.png','Produk yang sangat berkualitas','new-era'),
(13,'Brand Asik','brand-asik.jpg','Deskripsi brand yang masih asik','brand-asik'),
(14,'Brand Baru','brand-baru.JPG','Deskripsi','brand-baru');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `unique_category_slug` (`category_slug`),
  UNIQUE KEY `unique_cateogry_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `categories` */

insert  into `categories`(`category_id`,`category_name`,`category_description`,`category_slug`) values 
(1,'Sepatu','data sepatu','sepatu'),
(2,'Tas','data tas','tas'),
(3,'Pakaian Pria','Macam macam pakaian pria','pakaian-pria'),
(4,'Pakaian Wanita','Macam-macam pakaian wanita','pakaian-wanita');

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `tran_id` int(11) NOT NULL,
  `payment_name` varchar(50) NOT NULL,
  `payment_total` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_attachment` varchar(15) NOT NULL,
  `payment_status` enum('waiting','done') NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `tran_id` (`tran_id`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`tran_id`) REFERENCES `transactions` (`tran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `payments` */

insert  into `payments`(`payment_id`,`tran_id`,`payment_name`,`payment_total`,`payment_date`,`payment_attachment`,`payment_status`) values 
(3,11,'Andika',120000,'2017-12-22','11.png','done'),
(4,12,'Andika',120000,'2017-12-22','12.png','waiting'),
(5,10,'Andika',130000,'2018-01-08','10.png','done');

/*Table structure for table `preferences` */

DROP TABLE IF EXISTS `preferences`;

CREATE TABLE `preferences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `preferences` */

insert  into `preferences`(`id`,`type`,`name`,`value`) values 
(1,'site','site_name','CiShop'),
(2,'site','site_description','Online Shop dengan Codeigniter'),
(3,'email','smtp_host','ssl://smtp.gmail.com'),
(4,'email','smtp_port','465'),
(5,'email','smtp_user','cishopcodeigniter@gmail.com'),
(6,'email','smtp_pass','codeignitershop');

/*Table structure for table `product_photos` */

DROP TABLE IF EXISTS `product_photos`;

CREATE TABLE `product_photos` (
  `photo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `photo_name` varchar(100) NOT NULL,
  PRIMARY KEY (`photo_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_photos_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4993 DEFAULT CHARSET=utf8;

/*Data for the table `product_photos` */

insert  into `product_photos`(`photo_id`,`product_id`,`photo_name`) values 
(4968,20,'test-baru-lagi-0.jpg'),
(4969,21,'bisa-baru-0.JPG'),
(4970,21,'bisa-baru-01.jpg'),
(4971,21,'bisa-baru-02.JPG'),
(4972,21,'bisa-baru-0.jpeg'),
(4973,21,'bisa-baru-01.jpeg'),
(4974,22,'testing-produk-0.JPG'),
(4975,22,'testing-produk-01.JPG'),
(4976,22,'testing-produk-02.JPG'),
(4977,23,'kaos-pink-0.jpg'),
(4978,24,'kemeja-wanita-hijau-0.jpg'),
(4979,25,'kaos-merah-ngejreng-0.jpg'),
(4980,26,'kemeja-kotak-kotak-0.jpg'),
(4981,27,'kemeja-pink-kotak-wanita-0.jpg'),
(4982,28,'kemeja-lengan-ra-cukup-0.jpg'),
(4983,29,'anggap-saja-ini-tas-0.jpg'),
(4984,30,'semoga-ini-jadi-sepatu-0.jpg'),
(4985,31,'lihat-tas-saja-0.jpg'),
(4986,31,'lihat-tas-saja-01.jpg'),
(4987,32,'ternyata-banyak-tas-0.jpg'),
(4988,32,'ternyata-banyak-tas-01.jpg'),
(4989,32,'ternyata-banyak-tas-02.jpg'),
(4990,33,'tas-bonus-kacamata-0.jpg'),
(4991,33,'tas-bonus-kacamata-01.jpg'),
(4992,34,'kentekan-gambar-0.jpg');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_purchasing_price` double NOT NULL,
  `product_selling_price` double NOT NULL,
  `product_stock` int(11) NOT NULL DEFAULT '0',
  `product_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `unique_product_id` (`product_id`),
  UNIQUE KEY `unique_product_slug` (`product_slug`),
  KEY `index_category_id` (`category_id`),
  KEY `index_brand_id` (`brand_id`),
  CONSTRAINT `lnk_brands_products` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lnk_categories_products` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

/*Data for the table `products` */

insert  into `products`(`product_id`,`category_id`,`brand_id`,`product_name`,`product_description`,`product_purchasing_price`,`product_selling_price`,`product_stock`,`product_slug`) values 
(20,3,1,'test baru lagi','deskripsi baru test',120000,135000,0,'test-baru-lagi'),
(21,1,14,'bisa baru','bisa aja',90000,120000,0,'bisa-baru'),
(22,1,3,'testing produk','testing lagi produk',90000,93000,0,'testing-produk'),
(23,4,13,'Kaos Pink','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',40000,45000,8,'kaos-pink'),
(24,4,14,'Kemeja Wanita Hijau','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',60000,66000,10,'kemeja-wanita-hijau'),
(25,3,14,'Kaos Merah Ngejreng','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',54000,54500,5,'kaos-merah-ngejreng'),
(26,3,2,'Kemeja Kotak Kotak','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',80000,89000,8,'kemeja-kotak-kotak'),
(27,4,13,'Kemeja Pink Kotak Wanita','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',84500,86000,12,'kemeja-pink-kotak-wanita'),
(28,4,2,'Kemeja Lengan Ra Cukup','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',82300,90000,9,'kemeja-lengan-ra-cukup'),
(29,2,1,'Anggap Saja Ini Tas','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',121000,124000,21,'anggap-saja-ini-tas'),
(30,1,11,'Semoga Ini Jadi Sepatu','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',121500,160000,8,'semoga-ini-jadi-sepatu'),
(31,2,1,'Lihat Tas Saja','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',12000,13100,4,'lihat-tas-saja'),
(32,2,13,'Ternyata Banyak Tas','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',15000,120000,6,'ternyata-banyak-tas'),
(33,2,3,'Tas Bonus Kacamata','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',80000,88000,4,'tas-bonus-kacamata'),
(34,1,11,'Kentekan Gambar','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',130000,129000,9,'kentekan-gambar');

/*Table structure for table `transaction_items` */

DROP TABLE IF EXISTS `transaction_items`;

CREATE TABLE `transaction_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `tran_id` int(11) NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `item_count` int(11) NOT NULL,
  `item_purchasing_price` int(11) NOT NULL,
  `item_selling_price` int(11) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `tran_id` (`tran_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `transaction_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  CONSTRAINT `transaction_items_ibfk_3` FOREIGN KEY (`tran_id`) REFERENCES `transactions` (`tran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `transaction_items` */

insert  into `transaction_items`(`item_id`,`tran_id`,`product_id`,`item_count`,`item_purchasing_price`,`item_selling_price`) values 
(1,4,33,2,0,88000),
(2,4,30,1,0,160000),
(5,6,33,1,80000,88000),
(6,6,30,2,121500,160000),
(7,7,28,1,82300,90000),
(8,7,27,1,84500,86000),
(9,8,28,1,82300,90000),
(10,8,27,1,84500,86000),
(11,9,28,1,82300,90000),
(12,9,27,1,84500,86000),
(13,10,28,1,82300,90000),
(14,10,27,1,84500,86000),
(15,11,28,1,82300,90000),
(16,11,27,1,84500,86000),
(17,12,28,1,82300,90000),
(18,12,27,1,84500,86000),
(19,13,33,2,80000,88000);

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `tran_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_id` int(11) NOT NULL,
  `tran_date` date NOT NULL,
  `tran_cost` int(11) NOT NULL,
  `tran_expired` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`tran_id`),
  KEY `address_id` (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `transactions` */

insert  into `transactions`(`tran_id`,`address_id`,`tran_date`,`tran_cost`,`tran_expired`) values 
(4,6,'2017-11-17',8000,'no'),
(6,8,'2017-11-22',20000,'no'),
(7,9,'2017-11-24',20000,'yes'),
(8,10,'2017-11-24',42000,'yes'),
(9,11,'2017-11-24',29000,'no'),
(10,12,'2017-11-24',42000,'no'),
(11,13,'2017-11-24',42000,'no'),
(12,14,'2017-11-24',20000,'no'),
(13,15,'2017-12-11',16000,'no');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_alias` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `unique_user_id` (`user_id`),
  UNIQUE KEY `unique_user_name` (`user_name`),
  UNIQUE KEY `unique_user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`user_id`,`user_name`,`user_alias`,`user_email`,`user_password`,`user_photo`) values 
(1,'user','John Doe','example@example.com','12dea96fec20593566ab75692c9949596833adc9','user.jpg'),
(2,'andika','Andika Saputra','andika@andika.com','ed707f833673d415aef303411d5bfc9edba113aa','andika.jpg'),
(14,'Nika','Nika MS','nikarahman572@gmail.com','4812a96a443e06667fa8995eb38ef60477ccc3d2',''),
(15,'mia','Wa M Hasanah','wmhasanah@gmail.com','cdef115fbae1284c5040e7501cef819a5f730c81',''),
(17,'andikas','Andika Saputra','andikasputra@outlook.com','ed707f833673d415aef303411d5bfc9edba113aa',''),
(18,'asaputra','andika','putra9512@gmail.com','ed707f833673d415aef303411d5bfc9edba113aa',''),
(19,'nganu','nganu','andikasaputra.id@gmail.com','80f4227a9f6d1baac1e7675e515541a37d0aa1a1','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
