/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:8889
 Source Schema         : donate

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 17/01/2021 09:25:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for donaturs
-- ----------------------------
DROP TABLE IF EXISTS `donaturs`;
CREATE TABLE `donaturs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_donatur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` bigint(30) NOT NULL,
  `tgl_donasi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of donaturs
-- ----------------------------
BEGIN;
INSERT INTO `donaturs` VALUES (4, 'Kurniawan Robi', 100000, '2021-01-17', '2021-01-16 21:13:26', '2021-01-16 21:16:54');
INSERT INTO `donaturs` VALUES (5, 'Randi', 900000, '2021-01-18', '2021-01-16 21:13:51', '2021-01-16 22:35:34');
INSERT INTO `donaturs` VALUES (6, 'Aulia Apriliani', 1500000, '2021-01-17', '2021-01-16 23:27:28', '2021-01-16 23:27:28');
INSERT INTO `donaturs` VALUES (7, 'Irhandi', 200000, '2021-01-01', '2021-01-16 23:29:17', '2021-01-16 23:29:17');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_01_16_124055_create_slides_table', 2);
INSERT INTO `migrations` VALUES (6, '2021_01_16_203735_create_donaturs_table', 3);
INSERT INTO `migrations` VALUES (7, '2021_01_16_223131_create_pengaturans_table', 4);
INSERT INTO `migrations` VALUES (8, '2021_01_17_005002_create_pengeluarans_table', 5);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for pengaturans
-- ----------------------------
DROP TABLE IF EXISTS `pengaturans`;
CREATE TABLE `pengaturans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `norek` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `an_bank` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pengaturans
-- ----------------------------
BEGIN;
INSERT INTO `pengaturans` VALUES (1, 'Peduli Gempa Sulawesi Barat', 'Kami mengajak kepada masyarakat semua untuk peduli dengan saudara kita yang ada di sulawesi barat', 'BPPAUD DIKMAS Sulawesi Selatan - Jl. Adiyaksa No.2, Pandang, Kec. Panakkukang, Kota Makassar, Sulawesi Selatan 90231', '0841 40774632', '1610842199252-peduli-sulbar-logo.png', '1234 5678 12334', 'BRI', 'Robi Kurniawan', '2021-01-17 07:02:39', '2021-01-17 00:10:25');
COMMIT;

-- ----------------------------
-- Table structure for pengeluarans
-- ----------------------------
DROP TABLE IF EXISTS `pengeluarans`;
CREATE TABLE `pengeluarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pengeluarans
-- ----------------------------
BEGIN;
INSERT INTO `pengeluarans` VALUES (3, 'Beli Popok', 500000, '2021-01-17', NULL, '2021-01-17 01:10:20', '2021-01-17 01:10:20');
COMMIT;

-- ----------------------------
-- Table structure for slides
-- ----------------------------
DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of slides
-- ----------------------------
BEGIN;
INSERT INTO `slides` VALUES (4, '1610801943827-screen-shot-2021-01-16-at-20.29.58.png', '2021-01-16 12:59:03', '2021-01-16 12:59:03');
INSERT INTO `slides` VALUES (5, '1610840447757-screen-shot-2021-01-17-at-07.40.37.png', '2021-01-16 23:40:47', '2021-01-16 23:40:47');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('superadmin','admin','komisi','pimpinan','kabid','kasubag') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_role` enum('komisi_a','komisi_b','komisi_c','komisi_d','komisi_e','ketua','wakil_ketua') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'Robi Kurniawan', '', 'robikurniawan.it@gmail.com', NULL, '$2y$10$DE1I3OvcEhv9XN3u4EF4YuSpngjhympBJyYGiGdWJq.CSh64FuiPi', 'superadmin', NULL, NULL, '2021-01-16 08:44:49', '2021-01-16 08:44:49');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
