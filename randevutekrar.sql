-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 03 Kas 2021, 12:15:49
-- Sunucu sürümü: 10.4.10-MariaDB
-- PHP Sürümü: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `randevutekrar`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_16_210602_randevu', 1),
(6, '2021_10_16_210851_saat', 1),
(7, '2021_10_20_065221_user', 2),
(8, '2021_11_01_215653_create_randevunots_table', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevunots`
--

DROP TABLE IF EXISTS `randevunots`;
CREATE TABLE IF NOT EXISTS `randevunots` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `randevu_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `randevunots`
--

INSERT INTO `randevunots` (`id`, `randevu_id`, `text`, `created_at`, `updated_at`) VALUES
(1, 39, 'das', NULL, NULL),
(2, 40, 'dada', '2021-11-01 19:13:30', '2021-11-01 19:13:30'),
(3, 40, 'dada', '2021-11-01 19:13:52', '2021-11-01 19:13:52'),
(4, 40, 'a', '2021-11-01 19:14:42', '2021-11-01 19:14:42'),
(5, 40, 'sdada', '2021-11-01 19:17:40', '2021-11-01 19:17:40'),
(6, 40, 'saa', '2021-11-01 19:19:02', '2021-11-01 19:19:02'),
(7, 40, 'naber', '2021-11-01 19:19:09', '2021-11-01 19:19:09'),
(8, 40, 's', '2021-11-01 19:19:25', '2021-11-01 19:19:25'),
(9, 40, 'fatik', '2021-11-01 19:20:04', '2021-11-01 19:20:04'),
(10, 40, 'selam', '2021-11-01 19:23:46', '2021-11-01 19:23:46'),
(11, 41, 'sessf', '2021-11-02 17:21:30', '2021-11-02 17:21:30'),
(12, 41, 'seres', '2021-11-02 17:21:32', '2021-11-02 17:21:32'),
(13, 41, 'ad', '2021-11-02 17:22:28', '2021-11-02 17:22:28'),
(14, 41, 'test', '2021-11-02 17:23:26', '2021-11-02 17:23:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevus`
--

DROP TABLE IF EXISTS `randevus`;
CREATE TABLE IF NOT EXISTS `randevus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `workingHour` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isAktive` int(11) NOT NULL DEFAULT 0,
  `isSend` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `randevus`
--

INSERT INTO `randevus` (`id`, `fullname`, `phone`, `email`, `date`, `workingHour`, `text`, `code`, `notification_type`, `created_at`, `updated_at`, `isAktive`, `isSend`) VALUES
(40, 'fatih', '90-553-110-52-00', '66fatihavci@gmail.com', '2021-10-30', 91, NULL, '', 0, '2021-11-01 15:47:00', '2021-11-01 15:54:37', 2, 0),
(39, 'fatih', '90-553-110-52-00', '66fatihavci@gmail.com', '2021-11-01', 89, NULL, '', 0, '2021-11-01 07:35:07', '2021-11-01 16:03:25', 1, 0),
(41, 'adas', '03-334-522-52-8', 'paragonteknoloi@gmail.com', '2021-11-08', 91, NULL, 'cf9404', 1, '2021-11-02 16:01:26', '2021-11-02 16:01:26', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `saats`
--

DROP TABLE IF EXISTS `saats`;
CREATE TABLE IF NOT EXISTS `saats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `day` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `saats`
--

INSERT INTO `saats` (`id`, `day`, `hours`, `created_at`, `updated_at`) VALUES
(89, '1', '7', '2021-11-01 15:46:42', '2021-11-01 15:46:42'),
(90, '1', '12', '2021-11-01 15:46:42', '2021-11-01 15:46:42'),
(91, '1', '20.00-21.00', '2021-11-01 15:46:42', '2021-11-01 15:46:42'),
(92, '3', '11', '2021-11-01 15:46:42', '2021-11-01 15:46:42'),
(93, '3', '12', '2021-11-01 15:46:42', '2021-11-01 15:46:42'),
(94, '4', '11.00-12.00', '2021-11-01 15:46:42', '2021-11-01 15:46:42'),
(95, '4', '15.38-16.00', '2021-11-01 15:46:42', '2021-11-01 15:46:42'),
(96, '5', '6', '2021-11-01 15:46:42', '2021-11-01 15:46:42'),
(97, '6', '3', '2021-11-01 15:46:42', '2021-11-01 15:46:42'),
(98, '6', '4', '2021-11-01 15:46:42', '2021-11-01 15:46:42'),
(99, '6', '5', '2021-11-01 15:46:42', '2021-11-01 15:46:42'),
(100, '7', '1', '2021-11-01 15:46:42', '2021-11-01 15:46:42'),
(101, '7', '2', '2021-11-01 15:46:42', '2021-11-01 15:46:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Fatih', 'fatih@test.com', NULL, '$2y$10$J7GO7ihR8xadGQDtg8RS6enhdTDNxrpqmbx8V1eCnJYcK.xQAIvMO', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
