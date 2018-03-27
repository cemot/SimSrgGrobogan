-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 06:49 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petani`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(191) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_penulis` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '0' COMMENT '0 = pending, 1 = published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `tanggal`, `id_penulis`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test Update1', 'ini boy isinyaa', '2018-03-17 00:00:00', 1, 0, '2018-03-14 16:17:43', '2018-03-15 00:38:46'),
(2, 'Ubah judul bosq', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-08 00:00:00', 1, 1, '2018-03-14 16:20:11', '2018-03-18 16:54:53'),
(3, 'asd', 'asdas', '2018-03-20 00:00:00', 1, NULL, '2018-03-18 16:07:27', '2018-03-18 16:07:27'),
(4, 'sadasdd', 'sadasdsad', '2018-03-21 00:00:00', 1, 1, '2018-03-18 16:08:05', '2018-03-18 16:08:05'),
(6, 'sadasds', 'sadas', '2018-03-15 00:00:00', 1, NULL, '2018-03-19 02:23:57', '2018-03-19 02:23:57'),
(7, 'Artikel Baruu cuuyyyy', '<p style=\"text-align: left;\"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</strong></p>\r\n<p style=\"text-align: left;\"><strong>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</strong></p>\r\n<p style=\"text-align: left;\"><strong>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</strong></p>\r\n<p style=\"text-align: left;\"><strong>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</strong></p>\r\n<p style=\"text-align: left;\"><strong>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</strong></p>\r\n<p style=\"text-align: left;\"><strong>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</strong></p>\r\n<p style=\"text-align: right;\"><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</em></p>\r\n<p style=\"text-align: right;\"><em>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</em></p>\r\n<p style=\"text-align: right;\"><em>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</em></p>\r\n<p style=\"text-align: right;\"><em>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</em></p>\r\n<p style=\"text-align: right;\"><em>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</em></p>\r\n<p style=\"text-align: right;\"><em>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</em></p>\r\n<p style=\"text-align: center;\"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</strong></p>\r\n<p style=\"text-align: center;\"><strong>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</strong></p>\r\n<p style=\"text-align: center;\"><strong>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</strong></p>\r\n<p style=\"text-align: center;\"><strong>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</strong></p>\r\n<p style=\"text-align: center;\"><strong>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</strong></p>\r\n<p style=\"text-align: center;\"><strong>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</strong></p>\r\n<p style=\"text-align: justify;\"><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&nbsp;</em><em>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&nbsp;</em><em>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&nbsp;</em><em>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&nbsp;</em><em>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&nbsp;</em><em>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</em></p>', NULL, 8, 1, '2018-03-23 15:49:20', '2018-03-23 15:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `berat_barang` int(11) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `id_petani` int(11) NOT NULL,
  `id_pengelola` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `berat_barang`, `jenis_barang`, `id_petani`, `id_pengelola`, `tgl_pengajuan`) VALUES
(1, 'Update Barang test', 3, '', 1, 7, '2018-03-15'),
(2, 'Padi Karawitan 2', 4, '', 1, 7, '2018-03-15'),
(3, 'Padi Karawitan 2 Lalalalalalala', 80, 'Beras', 10, 9, '2018-03-15'),
(4, 'Gabah Bersih cuyyyy', 69, 'Beras', 10, 9, '2018-03-22'),
(5, 'jagung bakar', 15, 'Jagung', 10, 9, '2018-03-22'),
(6, 'barang yuk', 1400, 'Beras', 10, 9, '2018-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `id_pengujian` int(11) NOT NULL,
  `isi_catatan` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '	0 = pending, 1 = published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `id_pengujian`, `isi_catatan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'bagus', 1, NULL, NULL),
(4, 5, '<p>ijknklsndlanklsan</p>', 2, '2018-03-22 08:12:19', '2018-03-22 08:12:19'),
(9, 10, '<p>sdsadsadsad</p>', 1, '2018-03-22 18:08:07', '2018-03-22 18:08:07'),
(11, 12, '<p>sadsadsadas</p>', 1, '2018-03-22 18:17:11', '2018-03-22 18:17:11'),
(16, 17, '<p>dsdasadasd</p>', 0, '2018-03-23 14:07:43', '2018-03-23 14:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'Petani', 'Pokoknya petani lah');

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` int(11) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `kapasitas` int(11) NOT NULL DEFAULT '1500',
  `id_pengelola` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `nama`, `kapasitas`, `id_pengelola`) VALUES
(1, 'Update Gudang test Enjoy', 156, 7),
(2, 'Gudang coba 2', 123, 3),
(3, 'Halooow', 1, 7),
(4, 'Gudang Sukabirus', 170, 7),
(25, 'sasasa', 89, 7),
(26, 'Gudang 1', 1500, 9);

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(11) NOT NULL,
  `id_pengujian` int(11) NOT NULL,
  `satuan_barang` varchar(15) NOT NULL,
  `harga_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `id_pengujian`, `satuan_barang`, `harga_barang`) VALUES
(1, 5, 'kg', 9000),
(6, 10, 'kg', 7000),
(8, 12, 'kg', 5000),
(9, 17, 'kg', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengujian`
--

CREATE TABLE `pengujian` (
  `id_pengujian` int(11) NOT NULL,
  `id_pengelola` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_gudang` int(11) DEFAULT NULL,
  `tgl_pengujian` date NOT NULL,
  `hsl_pengujian` varchar(191) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengujian`
--

INSERT INTO `pengujian` (`id_pengujian`, `id_pengelola`, `id_barang`, `id_gudang`, `tgl_pengujian`, `hsl_pengujian`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, '2018-03-16', 'Mantab Bro Edit', 1, NULL, NULL, NULL),
(5, 9, 4, 26, '2018-03-22', 'Diterima', 9, NULL, NULL, NULL),
(10, 9, 6, 26, '2018-03-23', 'Diterima', 9, NULL, NULL, NULL),
(12, 9, 3, NULL, '2018-03-23', 'Ditolak', 9, NULL, NULL, NULL),
(17, 9, 5, 26, '2018-03-23', 'Diterima', 9, NULL, '2018-03-23 14:07:43', '2018-03-23 14:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `role` tinyint(4) NOT NULL COMMENT '0 = admin, 1 = pengelola, 2 = pegawai dinas, 3 = petani',
  `tmpt_lahir` varchar(191) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text,
  `no_tlp` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `email`, `jabatan`, `role`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `no_tlp`, `created_at`, `updated_at`) VALUES
(1, 'fakhrifauzan', '5f4dcc3b5aa765d61d8327deb882cf99', 'Fakhri Fauzan', 'fazan697@gmail.com', '', 0, 'Jakarta', '2018-03-01', 'BPI F16/3', '08567018044', NULL, '2018-03-17 16:58:19'),
(2, 'Fauzan', '', 'Fakhri', 'dexterhack@gmail.com', '', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Nurliah', '', 'Nurliah Awaliah', 'nurliaha@gmail.com', '', 0, NULL, NULL, NULL, '085670180442', NULL, '2018-03-19 01:38:14'),
(6, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo', 'demo@demo.com', NULL, 0, 'Jakarta', '2018-06-06', 'Pamulang', '08567018044', '2018-03-16 15:08:23', '2018-03-16 15:12:19'),
(7, 'demo1', '5f4dcc3b5aa765d61d8327deb882cf99', 'Demo Pengelola', 'demo1@m.c', NULL, 1, 'Jakarta', '2018-03-08', 'Gudang', '09878', '2018-03-19 09:03:50', '2018-03-19 09:03:50'),
(8, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@fazan.my.id', NULL, 0, 'Jakarta', '2018-03-20', 'Antamulya No 2', '08567018044', '2018-03-20 02:10:59', '2018-03-20 02:10:59'),
(9, 'pengelola', '3c7913bc17671596a43dcb4581992bdf', 'Pengelola', 'pengelola@fazan.my.id', NULL, 1, 'Jakarta', '2018-03-20', 'Antamulya No 2', '08567018045', '2018-03-20 02:12:11', '2018-03-20 02:12:11'),
(10, 'petani', 'd180e8e96956e056f23a05fadda0e2bd', 'Petani', 'petani@gmail.com', NULL, 4, 'Bandung', '2018-03-16', 'Antamulya No 2', '09878', '2018-03-22 03:44:57', '2018-03-22 03:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `usersion`
--

CREATE TABLE `usersion` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersion`
--

INSERT INTO `usersion` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', 'oW8MgYmQGqOEY9-dzWhdXu7553f15d590a15db39', 1520225030, NULL, 1268889823, 1521121887, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'sda@gmail.com', '$2y$08$YjriBpvWClDKaS/7vfhPd.Qrf3nOpiWHZ2dpvmNFetKJ3CRocrj4C', NULL, 'sda@gmail.com', NULL, NULL, NULL, NULL, 1520212504, 1520225195, 1, 'sdad', 'sadsad', 'asadsa', '21321132'),
(3, '::1', 'fakhrifauzan@telkomuniversity.ac.id', '$2y$08$JafTSbDs.rkYObSGNf7INePxaNk8FFyDkFhz5YxatSyTQj1e3iFuO', NULL, 'fakhrifauzan@telkomuniversity.ac.id', NULL, NULL, NULL, NULL, 1521060731, NULL, 1, 'Fakhri', 'Fauzan', 'fazanID', '08567018044');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(5, 3, 2),
(6, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `artikel_penulis_FK` (`id_penulis`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `barang_petani_FK` (`id_petani`),
  ADD KEY `barang_pengelola_FK` (`id_pengelola`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `catatan_pengujian_FK` (`id_pengujian`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`),
  ADD KEY `gudang_pengelola_FK` (`id_pengelola`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`),
  ADD KEY `harga_pengujian_FK` (`id_pengujian`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengujian`
--
ALTER TABLE `pengujian`
  ADD PRIMARY KEY (`id_pengujian`),
  ADD KEY `pengujian_barang_FK` (`id_barang`),
  ADD KEY `pengujian_pengelola_FK` (`id_pengelola`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `usersion`
--
ALTER TABLE `usersion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengujian`
--
ALTER TABLE `pengujian`
  MODIFY `id_pengujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usersion`
--
ALTER TABLE `usersion`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_penulis_FK` FOREIGN KEY (`id_penulis`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_pengelola_FK` FOREIGN KEY (`id_pengelola`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_petani_FK` FOREIGN KEY (`id_petani`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catatan`
--
ALTER TABLE `catatan`
  ADD CONSTRAINT `catatan_pengujian_FK` FOREIGN KEY (`id_pengujian`) REFERENCES `pengujian` (`id_pengujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gudang`
--
ALTER TABLE `gudang`
  ADD CONSTRAINT `gudang_pengelola_FK` FOREIGN KEY (`id_pengelola`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `harga`
--
ALTER TABLE `harga`
  ADD CONSTRAINT `harga_pengujian_FK` FOREIGN KEY (`id_pengujian`) REFERENCES `pengujian` (`id_pengujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengujian`
--
ALTER TABLE `pengujian`
  ADD CONSTRAINT `pengujian_barang_FK` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengujian_pengelola_FK` FOREIGN KEY (`id_pengelola`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `usersion` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;