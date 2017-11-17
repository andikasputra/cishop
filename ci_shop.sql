-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 17 Nov 2017 pada 21.53
-- Versi Server: 5.6.36
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address_prov` varchar(100) NOT NULL,
  `address_kab` varchar(100) NOT NULL,
  `address_kec` varchar(100) NOT NULL,
  `address_kel` varchar(100) NOT NULL,
  `address_alamat` varchar(150) NOT NULL,
  `address_pos` varchar(5) NOT NULL,
  `address_phone` varchar(20) NOT NULL,
  `address_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `address_prov`, `address_kab`, `address_kec`, `address_kel`, `address_alamat`, `address_pos`, `address_phone`, `address_nama`) VALUES
(6, 17, '', 'Kabupaten Bantul', 'Pajangan', 'Guwosari', 'Prigngading', '55751', '098909', 'Andika Saputra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_logo` varchar(255) NOT NULL,
  `brand_description` varchar(255) NOT NULL,
  `brand_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_logo`, `brand_description`, `brand_slug`) VALUES
(1, 'Adidas', 'adidas1.png', 'deskripsi adidas', 'adidas'),
(2, 'Cardinal', 'default.jpg', 'deskripsi cardinal', 'cardinal'),
(3, 'Eiger', 'eiger.jpg', 'deskripsi eiger', 'eiger'),
(11, 'New Era', 'new-era.png', 'Produk yang sangat berkualitas', 'new-era'),
(13, 'Brand Asik', 'brand-asik.jpg', 'Deskripsi brand yang masih asik', 'brand-asik'),
(14, 'Brand Baru', 'brand-baru.JPG', 'Deskripsi', 'brand-baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `category_slug`) VALUES
(1, 'Sepatu', 'data sepatu', 'sepatu'),
(2, 'Tas', 'data tas', 'tas'),
(3, 'Pakaian Pria', 'Macam macam pakaian pria', 'pakaian-pria'),
(4, 'Pakaian Wanita', 'Macam-macam pakaian wanita', 'pakaian-wanita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `preferences`
--

CREATE TABLE `preferences` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `preferences`
--

INSERT INTO `preferences` (`id`, `type`, `name`, `value`) VALUES
(1, 'site', 'site_name', 'CiShop'),
(2, 'site', 'site_description', 'Online Shop dengan Codeigniter'),
(3, 'email', 'smtp_host', 'ssl://smtp.gmail.com'),
(4, 'email', 'smtp_port', '465'),
(5, 'email', 'smtp_user', 'cishopcodeigniter@gmail.com'),
(6, 'email', 'smtp_pass', 'codeignitershop');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_purchasing_price` double NOT NULL,
  `product_selling_price` double NOT NULL,
  `product_stock` int(11) NOT NULL DEFAULT '0',
  `product_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_description`, `product_purchasing_price`, `product_selling_price`, `product_stock`, `product_slug`) VALUES
(20, 3, 1, 'test baru lagi', 'deskripsi baru test', 120000, 135000, 0, 'test-baru-lagi'),
(21, 1, 14, 'bisa baru', 'bisa aja', 90000, 120000, 0, 'bisa-baru'),
(22, 1, 3, 'testing produk', 'testing lagi produk', 90000, 93000, 0, 'testing-produk'),
(23, 4, 13, 'Kaos Pink', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 40000, 45000, 0, 'kaos-pink'),
(24, 4, 14, 'Kemeja Wanita Hijau', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 60000, 66000, 10, 'kemeja-wanita-hijau'),
(25, 3, 14, 'Kaos Merah Ngejreng', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 54000, 54500, 5, 'kaos-merah-ngejreng'),
(26, 3, 2, 'Kemeja Kotak Kotak', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 80000, 89000, 8, 'kemeja-kotak-kotak'),
(27, 4, 13, 'Kemeja Pink Kotak Wanita', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 84500, 86000, 1, 'kemeja-pink-kotak-wanita'),
(28, 4, 2, 'Kemeja Lengan Ra Cukup', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 82300, 90000, 3, 'kemeja-lengan-ra-cukup'),
(29, 2, 1, 'Anggap Saja Ini Tas', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 121000, 124000, 21, 'anggap-saja-ini-tas'),
(30, 1, 11, 'Semoga Ini Jadi Sepatu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 121500, 160000, 12, 'semoga-ini-jadi-sepatu'),
(31, 2, 1, 'Lihat Tas Saja', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 12000, 13100, 4, 'lihat-tas-saja'),
(32, 2, 13, 'Ternyata Banyak Tas', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 15000, 120000, 6, 'ternyata-banyak-tas'),
(33, 2, 3, 'Tas Bonus Kacamata', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 80000, 88000, 8, 'tas-bonus-kacamata'),
(34, 1, 11, 'Kentekan Gambar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 130000, 129000, 9, 'kentekan-gambar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_photos`
--

CREATE TABLE `product_photos` (
  `photo_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `photo_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `product_photos`
--

INSERT INTO `product_photos` (`photo_id`, `product_id`, `photo_name`) VALUES
(4968, 20, 'test-baru-lagi-0.jpg'),
(4969, 21, 'bisa-baru-0.JPG'),
(4970, 21, 'bisa-baru-01.jpg'),
(4971, 21, 'bisa-baru-02.JPG'),
(4972, 21, 'bisa-baru-0.jpeg'),
(4973, 21, 'bisa-baru-01.jpeg'),
(4974, 22, 'testing-produk-0.JPG'),
(4975, 22, 'testing-produk-01.JPG'),
(4976, 22, 'testing-produk-02.JPG'),
(4977, 23, 'kaos-pink-0.jpg'),
(4978, 24, 'kemeja-wanita-hijau-0.jpg'),
(4979, 25, 'kaos-merah-ngejreng-0.jpg'),
(4980, 26, 'kemeja-kotak-kotak-0.jpg'),
(4981, 27, 'kemeja-pink-kotak-wanita-0.jpg'),
(4982, 28, 'kemeja-lengan-ra-cukup-0.jpg'),
(4983, 29, 'anggap-saja-ini-tas-0.jpg'),
(4984, 30, 'semoga-ini-jadi-sepatu-0.jpg'),
(4985, 31, 'lihat-tas-saja-0.jpg'),
(4986, 31, 'lihat-tas-saja-01.jpg'),
(4987, 32, 'ternyata-banyak-tas-0.jpg'),
(4988, 32, 'ternyata-banyak-tas-01.jpg'),
(4989, 32, 'ternyata-banyak-tas-02.jpg'),
(4990, 33, 'tas-bonus-kacamata-0.jpg'),
(4991, 33, 'tas-bonus-kacamata-01.jpg'),
(4992, 34, 'kentekan-gambar-0.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `tran_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `tran_date` date NOT NULL,
  `tran_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`tran_id`, `address_id`, `tran_date`, `tran_cost`) VALUES
(4, 6, '2017-11-17', 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_items`
--

CREATE TABLE `transaction_items` (
  `item_id` int(11) NOT NULL,
  `tran_id` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `item_count` int(11) NOT NULL,
  `item_purchasing_price` int(11) NOT NULL,
  `item_selling_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaction_items`
--

INSERT INTO `transaction_items` (`item_id`, `tran_id`, `product_id`, `item_count`, `item_purchasing_price`, `item_selling_price`) VALUES
(1, 4, 33, 2, 0, 88000),
(2, 4, 30, 1, 0, 160000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_alias` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_alias`, `user_email`, `user_password`, `user_photo`) VALUES
(1, 'user', 'John Doe', 'example@example.com', '12dea96fec20593566ab75692c9949596833adc9', 'user.jpg'),
(2, 'andika', 'Andika Saputra', 'andika@andika.com', 'ed707f833673d415aef303411d5bfc9edba113aa', 'andika.jpg'),
(14, 'Nika', 'Nika MS', 'nikarahman572@gmail.com', '4812a96a443e06667fa8995eb38ef60477ccc3d2', ''),
(15, 'mia', 'Wa M Hasanah', 'wmhasanah@gmail.com', 'cdef115fbae1284c5040e7501cef819a5f730c81', ''),
(17, 'andikas', 'Andika Saputra', 'andikasputra@outlook.com', 'ed707f833673d415aef303411d5bfc9edba113aa', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `unique_brand_slug` (`brand_slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `unique_category_slug` (`category_slug`),
  ADD UNIQUE KEY `unique_cateogry_id` (`category_id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `unique_product_id` (`product_id`),
  ADD UNIQUE KEY `unique_product_slug` (`product_slug`),
  ADD KEY `index_category_id` (`category_id`),
  ADD KEY `index_brand_id` (`brand_id`);

--
-- Indexes for table `product_photos`
--
ALTER TABLE `product_photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tran_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `tran_id` (`tran_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_user_id` (`user_id`),
  ADD UNIQUE KEY `unique_user_name` (`user_name`),
  ADD UNIQUE KEY `unique_user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `product_photos`
--
ALTER TABLE `product_photos`
  MODIFY `photo_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4993;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `lnk_brands_products` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lnk_categories_products` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_photos`
--
ALTER TABLE `product_photos`
  ADD CONSTRAINT `product_photos_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD CONSTRAINT `transaction_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `transaction_items_ibfk_3` FOREIGN KEY (`tran_id`) REFERENCES `transactions` (`tran_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
