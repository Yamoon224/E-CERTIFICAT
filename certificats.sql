-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
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


-- Dumping database structure for certificat_biometrique_gn
CREATE DATABASE IF NOT EXISTS `certificat_biometrique_gn` /*!40100 DEFAULT CHARACTER SET utf32 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `certificat_biometrique_gn`;

-- Dumping structure for table certificat_biometrique_gn.areas
DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `district_id` int NOT NULL,
  `city_id` int NOT NULL,
  `department_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `department_city` (`department_id`) USING BTREE,
  KEY `city_district` (`city_id`) USING BTREE,
  KEY `district_areas` (`district_id`),
  CONSTRAINT `city_areas` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `department_areas` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `district_areas` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32 ROW_FORMAT=DYNAMIC;

-- Dumping data for table certificat_biometrique_gn.areas: ~0 rows (approximately)
INSERT INTO `areas` (`id`, `name`, `district_id`, `city_id`, `department_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Secteur I', 17, 7, 2, '2024-10-05 12:18:43', '2024-10-05 12:18:44', NULL);

-- Dumping structure for table certificat_biometrique_gn.certificates
DROP TABLE IF EXISTS `certificates`;
CREATE TABLE IF NOT EXISTS `certificates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `living_from` varchar(50) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `expired_at` date NOT NULL,
  `destinator` varchar(50) DEFAULT NULL,
  `reason` varchar(150) NOT NULL,
  `duplicata` int NOT NULL DEFAULT '0',
  `citizen_id` int NOT NULL,
  `area_id` int NOT NULL,
  `district_id` int NOT NULL,
  `city_id` int NOT NULL,
  `department_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `created_by` int NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `department_city` (`department_id`) USING BTREE,
  KEY `city_district` (`city_id`) USING BTREE,
  KEY `district_areas` (`district_id`) USING BTREE,
  KEY `area_certificates` (`area_id`),
  KEY `citizen_certificates` (`citizen_id`),
  KEY `creator_certificates` (`created_by`),
  CONSTRAINT `area_certificates` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `citizen_certificates` FOREIGN KEY (`citizen_id`) REFERENCES `citizens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `city_certificates` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `creator_certificates` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `department_certificates` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `district_certificates` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 ROW_FORMAT=DYNAMIC;

-- Dumping data for table certificat_biometrique_gn.certificates: ~0 rows (approximately)
INSERT INTO `certificates` (`id`, `living_from`, `expired_at`, `destinator`, `reason`, `duplicata`, `citizen_id`, `area_id`, `district_id`, `city_id`, `department_id`, `created_at`, `created_by`, `updated_at`, `deleted_at`) VALUES
	(2, 'Janvier 2005', '2024-10-05', 'JAGUAR SECURITY SERVICES SARL', 'Complement de dossier administratif', 0, 1, 1, 17, 7, 2, '2024-10-05 13:03:53', 7, '2024-10-05 13:03:53', NULL);

-- Dumping structure for table certificat_biometrique_gn.cities
DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `department_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `department_city` (`department_id`),
  CONSTRAINT `department_city` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf32 ROW_FORMAT=DYNAMIC;

-- Dumping data for table certificat_biometrique_gn.cities: ~8 rows (approximately)
INSERT INTO `cities` (`id`, `name`, `department_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Kaloum', 2, '2024-09-15 16:26:48', '2024-09-15 16:26:48', NULL),
	(2, 'Ratoma', 2, '2024-09-15 16:45:15', '2024-09-15 16:45:15', NULL),
	(3, 'Lambangny', 2, '2024-09-15 16:45:39', '2024-09-15 16:45:39', NULL),
	(4, 'Sonfonia', 2, '2024-09-15 16:45:54', '2024-09-15 16:45:54', NULL),
	(5, 'Gbessia', 2, '2024-09-15 16:46:19', '2024-09-15 16:46:19', NULL),
	(6, 'Matoto', 2, '2024-09-15 16:46:33', '2024-09-15 16:46:33', NULL),
	(7, 'Tombolia', 2, '2024-09-15 16:46:45', '2024-09-15 16:46:45', NULL),
	(8, 'Dixinn', 2, '2024-09-15 16:47:17', '2024-09-15 16:47:17', NULL),
	(9, 'Matam', 2, '2024-09-15 16:47:28', '2024-09-15 16:47:28', NULL);

-- Dumping structure for table certificat_biometrique_gn.citizens
DROP TABLE IF EXISTS `citizens`;
CREATE TABLE IF NOT EXISTS `citizens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` enum('M','F') NOT NULL DEFAULT 'M',
  `birthday` date NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `phone` char(9) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `profession` varchar(80) NOT NULL,
  `role` varchar(80) DEFAULT NULL,
  `father` varchar(80) NOT NULL,
  `mother` varchar(150) NOT NULL,
  `citizenship` varchar(80) NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`),
  KEY `citizen_creator` (`created_by`),
  CONSTRAINT `citizen_creator` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32;

-- Dumping data for table certificat_biometrique_gn.citizens: ~0 rows (approximately)
INSERT INTO `citizens` (`id`, `firstname`, `name`, `gender`, `birthday`, `birthplace`, `phone`, `email`, `profession`, `role`, `father`, `mother`, `citizenship`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Richala', 'Tchatagba', 'F', '1997-02-01', 'Conakry', '621568790', 'bbnehemie@gmail.com', 'Ingenieure', 'Comptable', 'Bakala', 'Celine', 'Guinéenne', 7, '2024-10-02 05:54:53', '2024-10-02 05:54:53', NULL);

-- Dumping structure for table certificat_biometrique_gn.departments
DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf32;

-- Dumping data for table certificat_biometrique_gn.departments: ~8 rows (approximately)
INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Boké', '2024-09-15 15:33:29', '2024-09-21 23:51:42', NULL),
	(2, 'Conakry', '2024-09-15 15:35:26', '2024-09-15 15:35:26', NULL),
	(3, 'Faranah', '2024-09-15 15:35:53', '2024-09-15 15:35:53', NULL),
	(4, 'Kankan', '2024-09-15 15:36:11', '2024-09-15 15:36:52', NULL),
	(5, 'Kindia', '2024-09-15 15:36:18', '2024-09-15 15:37:01', NULL),
	(6, 'Labé', '2024-09-15 15:37:08', '2024-09-15 15:37:08', NULL),
	(7, 'Mamou', '2024-09-15 15:37:15', '2024-09-15 15:37:15', NULL),
	(8, 'N\'Zérekoré', '2024-09-15 15:37:30', '2024-09-15 15:37:30', NULL);

-- Dumping structure for table certificat_biometrique_gn.districts
DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `city_id` int NOT NULL,
  `department_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `department_city` (`department_id`) USING BTREE,
  KEY `city_district` (`city_id`),
  CONSTRAINT `city_district` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `department_district` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf32 ROW_FORMAT=DYNAMIC;

-- Dumping data for table certificat_biometrique_gn.districts: ~73 rows (approximately)
INSERT INTO `districts` (`id`, `name`, `city_id`, `department_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Taouyah', 2, 2, '2024-09-15 16:50:46', '2024-09-15 16:50:46', NULL),
	(2, 'Ratoma Dispensaire', 2, 2, '2024-09-15 16:52:04', '2024-09-15 16:52:04', NULL),
	(3, 'Ratoma Centre', 2, 2, '2024-09-15 16:52:20', '2024-09-15 16:52:20', NULL),
	(4, 'Kaporo Rails', 2, 2, '2024-09-15 16:52:41', '2024-09-15 16:52:41', NULL),
	(5, 'Hamdallaye 1', 2, 2, '2024-09-15 16:53:00', '2024-09-15 16:53:00', NULL),
	(6, 'Hamdallaye 2', 2, 2, '2024-09-15 16:53:16', '2024-09-15 16:53:16', NULL),
	(7, 'Koloma Soloprimo', 2, 2, '2024-09-15 16:53:34', '2024-09-15 16:53:34', NULL),
	(8, 'Kipé', 2, 2, '2024-09-15 16:53:48', '2024-09-15 16:53:48', NULL),
	(9, 'Kaporo Centre', 2, 2, '2024-09-15 16:54:07', '2024-09-15 16:54:07', NULL),
	(10, 'Kobayah', 4, 2, '2024-09-15 16:54:40', '2024-09-15 16:54:40', NULL),
	(11, 'Yattaya Fossidet', 4, 2, '2024-09-15 16:54:59', '2024-09-15 16:54:59', NULL),
	(12, 'Yattaya centre', 4, 2, '2024-09-15 16:55:17', '2024-09-15 16:55:17', NULL),
	(13, 'Sonfonia Gare 1', 4, 2, '2024-09-15 16:55:36', '2024-09-15 16:55:36', NULL),
	(14, 'Sonfonia Gare 2', 4, 2, '2024-09-15 16:55:59', '2024-09-15 16:55:59', NULL),
	(15, 'Sonfonia Centre 1', 4, 2, '2024-09-15 16:56:13', '2024-09-15 16:56:13', NULL),
	(16, 'Sonfonia Centre 2', 4, 2, '2024-09-15 16:56:27', '2024-09-15 16:56:27', NULL),
	(17, 'Enta Marché', 7, 2, '2024-09-15 16:57:02', '2024-09-15 16:57:02', NULL),
	(18, 'Enta Fassa', 7, 2, '2024-09-15 16:57:17', '2024-09-15 16:57:17', NULL),
	(19, 'Tombolia', 7, 2, '2024-09-15 16:57:38', '2024-09-15 16:57:38', NULL),
	(20, 'Tombolia Plateau', 7, 2, '2024-09-15 16:57:58', '2024-09-15 16:58:23', NULL),
	(21, 'Dabompa Village', 7, 2, '2024-09-15 16:58:48', '2024-09-15 16:58:48', NULL),
	(22, 'Dabompa Plateau', 7, 2, '2024-09-15 16:59:10', '2024-09-15 16:59:10', NULL),
	(23, 'Lansanayah', 7, 2, '2024-09-15 16:59:33', '2024-09-15 16:59:33', NULL),
	(24, 'Matato Centre', 6, 2, '2024-09-15 17:00:52', '2024-09-15 17:00:52', NULL),
	(25, 'Simbaya 2', 6, 2, '2024-09-15 17:01:14', '2024-09-15 17:01:14', NULL),
	(26, 'Simbaya Ecole', 6, 2, '2024-09-15 17:01:47', '2024-09-15 17:01:47', NULL),
	(27, 'Matoto Marché', 6, 2, '2024-09-15 17:02:12', '2024-09-15 17:02:12', NULL),
	(28, 'Matoto Khabitaya', 6, 2, '2024-09-15 17:02:34', '2024-09-15 17:02:34', NULL),
	(29, 'Sangoyah Mosqué', 6, 2, '2024-09-15 17:02:58', '2024-09-15 17:02:58', NULL),
	(30, 'Sangoyah Marché', 6, 2, '2024-09-15 17:03:18', '2024-09-15 17:03:18', NULL),
	(31, 'Kissosso', 6, 2, '2024-09-15 17:03:37', '2024-09-15 17:03:37', NULL),
	(32, 'Kissosso Plateau', 6, 2, '2024-09-15 17:03:59', '2024-09-15 17:03:59', NULL),
	(33, 'Marché Enco 5', 6, 2, '2024-09-15 17:04:23', '2024-09-15 17:04:23', NULL),
	(34, 'Wanindara Dispensaire', 6, 2, '2024-09-15 17:04:51', '2024-09-15 17:04:51', NULL),
	(35, 'Wanindara Marché', 6, 2, '2024-09-15 17:05:17', '2024-09-15 17:05:17', NULL),
	(36, 'Nongo Centre', 3, 2, '2024-09-15 17:07:16', '2024-09-15 17:07:16', NULL),
	(37, 'Nongo Taady', 3, 2, '2024-09-15 17:07:35', '2024-09-15 17:07:35', NULL),
	(38, 'Lambagny', 3, 2, '2024-09-15 17:07:52', '2024-09-15 17:07:52', NULL),
	(39, 'Yembeya', 3, 2, '2024-09-15 17:08:16', '2024-09-15 17:08:16', NULL),
	(40, 'Waréah', 3, 2, '2024-09-15 17:08:34', '2024-09-15 17:08:34', NULL),
	(41, 'Simbaya Gare', 3, 2, '2024-09-15 17:08:59', '2024-09-15 17:08:59', NULL),
	(42, 'Yattaya centre', 3, 2, '2024-09-15 17:09:24', '2024-09-15 17:09:24', NULL),
	(43, 'Nassouroulaye', 3, 2, '2024-09-15 17:09:47', '2024-09-15 17:09:47', NULL),
	(44, 'Bantounka 1', 3, 2, '2024-09-15 17:10:05', '2024-09-15 17:10:05', NULL),
	(45, 'Bantounka 2', 3, 2, '2024-09-15 17:10:20', '2024-09-15 17:10:20', NULL),
	(46, 'Soumambossia', 3, 2, '2024-09-15 17:10:35', '2024-09-15 17:10:35', NULL),
	(47, 'Wanindara', 3, 2, '2024-09-15 17:10:50', '2024-09-15 17:10:50', NULL),
	(48, 'Wanindara Rails', 3, 2, '2024-09-15 17:11:07', '2024-09-15 17:11:07', NULL),
	(49, 'Kinifi', 3, 2, '2024-09-15 17:11:23', '2024-09-15 17:11:23', NULL),
	(50, 'Dabondy 1', 5, 2, '2024-10-02 06:27:09', '2024-10-02 06:27:10', NULL),
	(51, 'Dabondy 2', 5, 2, '2024-10-02 06:27:35', '2024-10-02 06:27:39', NULL),
	(52, 'Dabondy 3', 5, 2, '2024-10-02 06:28:02', '2024-10-02 06:28:04', NULL),
	(53, 'Dabondy Ecole', 5, 2, '2024-10-02 06:28:38', '2024-10-02 06:28:40', NULL),
	(54, 'Dabondy Rails', 5, 2, '2024-10-02 06:29:00', '2024-10-02 06:29:01', NULL),
	(55, 'Gbessia Cité 1', 5, 2, '2024-10-02 06:29:35', '2024-10-02 06:29:36', NULL),
	(56, 'Gbessia Cité 2', 5, 2, '2024-10-02 06:29:56', '2024-10-02 06:29:57', NULL),
	(57, 'Gbessia Cité 3', 5, 2, '2024-10-02 06:30:21', '2024-10-02 06:30:22', NULL),
	(58, 'Gbessia Ecole', 5, 2, '2024-10-02 06:30:38', '2024-10-02 06:30:37', NULL),
	(59, 'Gbessia Centre', 5, 2, '2024-10-02 06:31:15', '2024-10-02 06:31:17', NULL),
	(60, 'Gbessia Port 1', 5, 2, '2024-10-02 06:31:23', '2024-10-02 06:31:22', NULL),
	(61, 'Gbessia Port 2', 5, 2, '2024-10-02 06:31:55', '2024-10-02 06:31:56', NULL),
	(62, 'Dar-Es-Salam', 5, 2, '2024-10-02 06:32:16', '2024-10-02 06:32:15', NULL),
	(63, 'Cité de l\'Air', 5, 2, '2024-10-02 06:32:55', '2024-10-02 06:32:56', NULL),
	(64, 'Béhanzin', 5, 2, '2024-10-02 06:33:02', '2024-10-02 06:33:01', NULL),
	(65, 'Tanéné Marché', 5, 2, '2024-10-02 06:33:46', '2024-10-02 06:33:47', NULL),
	(66, 'Tanéné Mosqué', 5, 2, '2024-10-02 06:33:53', '2024-10-02 06:33:51', NULL),
	(67, 'Yimbaya Ecole', 5, 2, '2024-10-02 06:34:35', '2024-10-02 06:34:36', NULL),
	(68, 'Yimbaya Permanence', 5, 2, '2024-10-02 06:34:42', '2024-10-02 06:34:41', NULL),
	(69, 'Yimbaya Port', 5, 2, '2024-10-02 06:35:26', '2024-10-02 06:35:27', NULL),
	(70, 'Yimbaya Tannerie', 5, 2, '2024-10-02 06:35:47', '2024-10-02 06:35:45', NULL),
	(71, 'Hamdallaye Mosqué', 5, 2, '2024-10-02 06:36:45', '2024-10-02 06:36:47', NULL),
	(72, 'Simbaya 1', 5, 2, '2024-10-02 06:37:05', '2024-10-02 06:37:04', NULL),
	(73, 'Koloma 1', 5, 2, '2024-10-02 06:37:41', '2024-10-02 06:37:42', NULL),
	(74, 'Koloma 2', 5, 2, '2024-10-02 06:37:47', '2024-10-02 06:37:46', NULL),
	(75, 'Nassouroulaye', 5, 2, '2024-10-02 06:38:26', '2024-10-02 06:38:27', NULL);

-- Dumping structure for table certificat_biometrique_gn.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf32 ROW_FORMAT=DYNAMIC;

-- Dumping data for table certificat_biometrique_gn.groups: ~6 rows (approximately)
INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2024-09-15 15:10:14', '2024-09-15 15:10:15'),
	(2, 'department admin', '2024-09-28 13:21:08', '2024-09-28 13:21:10'),
	(3, 'city admin', '2024-09-28 13:21:08', '2024-09-28 13:21:10'),
	(4, 'district admin', '2024-09-28 13:21:08', '2024-09-28 13:21:10'),
	(5, 'area admin', '2024-09-28 13:21:08', '2024-09-28 13:21:10'),
	(6, 'citizen', '2024-09-28 13:21:08', '2024-09-28 13:21:10');

-- Dumping structure for table certificat_biometrique_gn.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf32 ROW_FORMAT=DYNAMIC;

-- Dumping data for table certificat_biometrique_gn.migrations: ~0 rows (approximately)

-- Dumping structure for table certificat_biometrique_gn.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf32 ROW_FORMAT=DYNAMIC;

-- Dumping data for table certificat_biometrique_gn.password_resets: ~0 rows (approximately)

-- Dumping structure for table certificat_biometrique_gn.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf32 ROW_FORMAT=DYNAMIC;

-- Dumping data for table certificat_biometrique_gn.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table certificat_biometrique_gn.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `abilities` text CHARACTER SET utf32 COLLATE utf32_general_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`) USING BTREE,
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf32 ROW_FORMAT=DYNAMIC;

-- Dumping data for table certificat_biometrique_gn.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table certificat_biometrique_gn.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `phone` varchar(30) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf32 COLLATE utf32_general_ci DEFAULT NULL,
  `locale` char(4) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL DEFAULT 'fr',
  `group_id` int NOT NULL DEFAULT '6',
  `department_id` int DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `district_id` int DEFAULT NULL,
  `area_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `user_group` (`group_id`) USING BTREE,
  KEY `department_users` (`department_id`),
  KEY `city_users` (`city_id`),
  KEY `district_users` (`district_id`),
  KEY `area_users` (`area_id`),
  CONSTRAINT `area_users` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `city_users` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `department_users` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `district_users` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `group_users` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf32 ROW_FORMAT=DYNAMIC;

-- Dumping data for table certificat_biometrique_gn.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `email_verified_at`, `remember_token`, `locale`, `group_id`, `department_id`, `city_id`, `district_id`, `area_id`, `created_at`, `updated_at`, `deleted_at`, `logout_at`) VALUES
	(3, 'Yamoussa KEITA', '2250565855202', 'yamooon664@gmail.com', '$2y$12$CpmlKLPQ02a46ghO1W6ig.Yi8ndk3dKhScVZLX/mqxqUqX7Puciey', '2024-09-15 15:27:24', NULL, 'fr', 1, NULL, NULL, NULL, NULL, '2024-09-15 15:27:43', '2024-09-15 15:27:44', NULL, NULL),
	(7, 'Richala Tchatagba', '621568790', 'bbnehemie@gmail.com', '$2y$12$CpmlKLPQ02a46ghO1W6ig.Yi8ndk3dKhScVZLX/mqxqUqX7Puciey', NULL, NULL, 'fr', 6, NULL, NULL, NULL, NULL, '2024-10-02 05:54:53', '2024-10-02 05:54:53', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
