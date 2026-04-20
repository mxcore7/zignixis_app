-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 20 avr. 2026 à 11:25
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zygnixis_laravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-global_settings', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:11:{s:9:\"site_name\";O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:1;s:3:\"key\";s:9:\"site_name\";s:5:\"value\";s:10:\"\"Zygnixis\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:7:\"general\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:1;s:3:\"key\";s:9:\"site_name\";s:5:\"value\";s:10:\"\"Zygnixis\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:7:\"general\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"type\";i:3;s:5:\"group\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:9:\"site_logo\";O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:2;s:3:\"key\";s:9:\"site_logo\";s:5:\"value\";s:10:\"\"logo.png\"\";s:4:\"type\";s:5:\"image\";s:5:\"group\";s:7:\"general\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:2;s:3:\"key\";s:9:\"site_logo\";s:5:\"value\";s:10:\"\"logo.png\"\";s:4:\"type\";s:5:\"image\";s:5:\"group\";s:7:\"general\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"type\";i:3;s:5:\"group\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:12:\"site_favicon\";O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:3;s:3:\"key\";s:12:\"site_favicon\";s:5:\"value\";s:13:\"\"favicon.ico\"\";s:4:\"type\";s:5:\"image\";s:5:\"group\";s:7:\"general\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:3;s:3:\"key\";s:12:\"site_favicon\";s:5:\"value\";s:13:\"\"favicon.ico\"\";s:4:\"type\";s:5:\"image\";s:5:\"group\";s:7:\"general\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"type\";i:3;s:5:\"group\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:13:\"contact_email\";O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:4;s:3:\"key\";s:13:\"contact_email\";s:5:\"value\";s:22:\"\"contact@zygnixis.com\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:7:\"contact\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:4;s:3:\"key\";s:13:\"contact_email\";s:5:\"value\";s:22:\"\"contact@zygnixis.com\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:7:\"contact\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"type\";i:3;s:5:\"group\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:13:\"contact_phone\";O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:5;s:3:\"key\";s:13:\"contact_phone\";s:5:\"value\";s:18:\"\"+237 600 000 000\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:7:\"contact\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:5;s:3:\"key\";s:13:\"contact_phone\";s:5:\"value\";s:18:\"\"+237 600 000 000\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:7:\"contact\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"type\";i:3;s:5:\"group\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:15:\"contact_address\";O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:6;s:3:\"key\";s:15:\"contact_address\";s:5:\"value\";s:18:\"\"Douala, Cameroun\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:7:\"contact\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:6;s:3:\"key\";s:15:\"contact_address\";s:5:\"value\";s:18:\"\"Douala, Cameroun\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:7:\"contact\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"type\";i:3;s:5:\"group\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:15:\"social_facebook\";O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:7;s:3:\"key\";s:15:\"social_facebook\";s:5:\"value\";s:31:\"\"https://facebook.com/zygnixis\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:6:\"social\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:7;s:3:\"key\";s:15:\"social_facebook\";s:5:\"value\";s:31:\"\"https://facebook.com/zygnixis\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:6:\"social\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"type\";i:3;s:5:\"group\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:15:\"social_linkedin\";O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:8;s:3:\"key\";s:15:\"social_linkedin\";s:5:\"value\";s:39:\"\"https://linkedin.com/company/zygnixis\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:6:\"social\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:8;s:3:\"key\";s:15:\"social_linkedin\";s:5:\"value\";s:39:\"\"https://linkedin.com/company/zygnixis\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:6:\"social\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"type\";i:3;s:5:\"group\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:14:\"social_twitter\";O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:9;s:3:\"key\";s:14:\"social_twitter\";s:5:\"value\";s:30:\"\"https://twitter.com/zygnixis\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:6:\"social\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:9;s:3:\"key\";s:14:\"social_twitter\";s:5:\"value\";s:30:\"\"https://twitter.com/zygnixis\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:6:\"social\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"type\";i:3;s:5:\"group\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:18:\"footer_description\";O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:10;s:3:\"key\";s:18:\"footer_description\";s:5:\"value\";s:162:\"{\"en\": \"Your trusted partner for digital transformation and security.\", \"fr\": \"Votre partenaire de confiance pour la transformation numérique et la sécurité.\"}\";s:4:\"type\";s:17:\"translatable_text\";s:5:\"group\";s:6:\"footer\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:10;s:3:\"key\";s:18:\"footer_description\";s:5:\"value\";s:162:\"{\"en\": \"Your trusted partner for digital transformation and security.\", \"fr\": \"Votre partenaire de confiance pour la transformation numérique et la sécurité.\"}\";s:4:\"type\";s:17:\"translatable_text\";s:5:\"group\";s:6:\"footer\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"type\";i:3;s:5:\"group\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:11:\"footer_copy\";O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:11;s:3:\"key\";s:11:\"footer_copy\";s:5:\"value\";s:40:\"\"© 2024 Zygnixis. All rights reserved.\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:6:\"footer\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:11;s:3:\"key\";s:11:\"footer_copy\";s:5:\"value\";s:40:\"\"© 2024 Zygnixis. All rights reserved.\"\";s:4:\"type\";s:4:\"text\";s:5:\"group\";s:6:\"footer\";s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"type\";i:3;s:5:\"group\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1776687142),
('laravel-cache-global_contact_info', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:5:{s:15:\"email_principal\";O:22:\"App\\Models\\ContactInfo\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:12:\"contact_info\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:1;s:3:\"key\";s:15:\"email_principal\";s:5:\"value\";s:22:\"\"contact@zygnixis.com\"\";s:4:\"icon\";s:8:\"envelope\";s:4:\"type\";s:5:\"email\";s:5:\"order\";i:1;s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:1;s:3:\"key\";s:15:\"email_principal\";s:5:\"value\";s:22:\"\"contact@zygnixis.com\"\";s:4:\"icon\";s:8:\"envelope\";s:4:\"type\";s:5:\"email\";s:5:\"order\";i:1;s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"icon\";i:3;s:4:\"type\";i:4;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:13:\"email_support\";O:22:\"App\\Models\\ContactInfo\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:12:\"contact_info\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:2;s:3:\"key\";s:13:\"email_support\";s:5:\"value\";s:22:\"\"support@zygnixis.com\"\";s:4:\"icon\";s:8:\"envelope\";s:4:\"type\";s:5:\"email\";s:5:\"order\";i:2;s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:2;s:3:\"key\";s:13:\"email_support\";s:5:\"value\";s:22:\"\"support@zygnixis.com\"\";s:4:\"icon\";s:8:\"envelope\";s:4:\"type\";s:5:\"email\";s:5:\"order\";i:2;s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"icon\";i:3;s:4:\"type\";i:4;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:15:\"phone_principal\";O:22:\"App\\Models\\ContactInfo\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:12:\"contact_info\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:3;s:3:\"key\";s:15:\"phone_principal\";s:5:\"value\";s:19:\"\"+237 6XX XX XX XX\"\";s:4:\"icon\";s:5:\"phone\";s:4:\"type\";s:5:\"phone\";s:5:\"order\";i:3;s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:3;s:3:\"key\";s:15:\"phone_principal\";s:5:\"value\";s:19:\"\"+237 6XX XX XX XX\"\";s:4:\"icon\";s:5:\"phone\";s:4:\"type\";s:5:\"phone\";s:5:\"order\";i:3;s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"icon\";i:3;s:4:\"type\";i:4;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:16:\"phone_secondaire\";O:22:\"App\\Models\\ContactInfo\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:12:\"contact_info\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:4;s:3:\"key\";s:16:\"phone_secondaire\";s:5:\"value\";s:19:\"\"+237 6XX XX XX XX\"\";s:4:\"icon\";s:5:\"phone\";s:4:\"type\";s:5:\"phone\";s:5:\"order\";i:4;s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:4;s:3:\"key\";s:16:\"phone_secondaire\";s:5:\"value\";s:19:\"\"+237 6XX XX XX XX\"\";s:4:\"icon\";s:5:\"phone\";s:4:\"type\";s:5:\"phone\";s:5:\"order\";i:4;s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"icon\";i:3;s:4:\"type\";i:4;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:7:\"address\";O:22:\"App\\Models\\ContactInfo\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:12:\"contact_info\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:5;s:3:\"key\";s:7:\"address\";s:5:\"value\";s:64:\"{\"en\": \"Akwa, Douala, Cameroon\", \"fr\": \"Akwa, Douala, Cameroun\"}\";s:4:\"icon\";s:7:\"map-pin\";s:4:\"type\";s:7:\"address\";s:5:\"order\";i:5;s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:5;s:3:\"key\";s:7:\"address\";s:5:\"value\";s:64:\"{\"en\": \"Akwa, Douala, Cameroon\", \"fr\": \"Akwa, Douala, Cameroun\"}\";s:4:\"icon\";s:7:\"map-pin\";s:4:\"type\";s:7:\"address\";s:5:\"order\";i:5;s:10:\"created_at\";s:19:\"2026-01-03 17:09:23\";s:10:\"updated_at\";s:19:\"2026-01-03 17:09:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:5:\"value\";s:5:\"array\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:4:\"icon\";i:3;s:4:\"type\";i:4;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1776687142);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` json NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"Odoo ERP\", \"fr\": \"Odoo ERP\"}', 'odoo-erp', '{\"en\": \"Everything about Odoo suite\", \"fr\": \"Tout sur la suite Odoo\"}', '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(2, '{\"en\": \"Digital Transformation\", \"fr\": \"Transformation Digitale\"}', 'digital-transformation', '{\"en\": \"Digital strategies\", \"fr\": \"Stratégies digitales\"}', '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(3, '{\"en\": \"Security\", \"fr\": \"Sécurité\"}', 'security', '{\"en\": \"Cybersecurity and physical protection\", \"fr\": \"Cybersécurité et protection physique\"}', '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(4, '{\"en\": \"News\", \"fr\": \"Actualités\"}', 'news', '{\"en\": \"Zygnixis News\", \"fr\": \"Nouvelles de Zygnixis\"}', '2026-01-03 16:09:23', '2026-01-03 16:09:23');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact_info`
--

DROP TABLE IF EXISTS `contact_info`;
CREATE TABLE IF NOT EXISTS `contact_info` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` json NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contact_info_key_unique` (`key`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact_info`
--

INSERT INTO `contact_info` (`id`, `key`, `value`, `icon`, `type`, `order`, `created_at`, `updated_at`) VALUES
(1, 'email_principal', '\"contact@zygnixis.com\"', 'envelope', 'email', 1, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(2, 'email_support', '\"support@zygnixis.com\"', 'envelope', 'email', 2, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(3, 'phone_principal', '\"+237 6XX XX XX XX\"', 'phone', 'phone', 3, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(4, 'phone_secondaire', '\"+237 6XX XX XX XX\"', 'phone', 'phone', 4, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(5, 'address', '{\"en\": \"Akwa, Douala, Cameroon\", \"fr\": \"Akwa, Douala, Cameroun\"}', 'map-pin', 'address', 5, '2026-01-03 16:09:23', '2026-01-03 16:09:23');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED DEFAULT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoices_number_unique` (`number`),
  KEY `invoices_user_id_foreign` (`user_id`),
  KEY `invoices_project_id_foreign` (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `project_id`, `number`, `issue_date`, `due_date`, `amount`, `status`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'INV-2026-739', '2026-01-12', '2026-02-11', 50000.00, 'unpaid', NULL, '2026-01-12 08:58:25', '2026-01-12 08:58:25');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `leads`
--

DROP TABLE IF EXISTS `leads`;
CREATE TABLE IF NOT EXISTS `leads` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'website',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `estimated_value` decimal(10,2) DEFAULT NULL,
  `probability` int NOT NULL DEFAULT '10',
  `assigned_to` bigint UNSIGNED DEFAULT NULL,
  `last_contacted_at` timestamp NULL DEFAULT NULL,
  `qualified_at` timestamp NULL DEFAULT NULL,
  `won_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leads_assigned_to_foreign` (`assigned_to`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `leads`
--

INSERT INTO `leads` (`id`, `name`, `email`, `phone`, `company`, `source`, `status`, `notes`, `estimated_value`, `probability`, `assigned_to`, `last_contacted_at`, `qualified_at`, `won_at`, `created_at`, `updated_at`) VALUES
(1, 'Blondeau MOUKAM HOMENI', 'denzoduplex3@gmail.com', '697624219', 'FullSoft', 'direct', 'new', NULL, 5000.00, 10, NULL, '2026-01-12 08:59:08', NULL, NULL, '2026-01-12 08:58:59', '2026-01-12 08:59:12');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `uploaded_by` bigint UNSIGNED DEFAULT NULL,
  `alt_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_uploaded_by_foreign` (`uploaded_by`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `name`, `filename`, `path`, `type`, `mime_type`, `size`, `category`, `uploaded_by`, `alt_text`, `caption`, `created_at`, `updated_at`) VALUES
(2, 'sync', 'sync_1768212531.jpeg', 'media/sync_1768212531.jpeg', 'image', 'image/jpeg', 85400, 'projects', 1, NULL, NULL, '2026-01-12 09:08:51', '2026-01-12 09:08:51'),
(3, 'sync', 'sync_1768213363.jpeg', 'media/sync_1768213363.jpeg', 'image', 'image/jpeg', 85400, 'general', 1, NULL, NULL, '2026-01-12 09:22:43', '2026-01-12 09:22:43'),
(5, 'passport', 'passport_1768219199.jpg', 'media/passport_1768219199.jpg', 'image', 'image/jpeg', 127092, 'general', 1, NULL, NULL, '2026-01-12 11:00:00', '2026-01-12 11:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_01_01_000001_create_blog_tables', 1),
(5, '2024_01_01_000002_create_projects_table', 1),
(6, '2024_01_01_000003_create_general_tables', 1),
(7, '2025_12_30_125043_create_partners_table', 1),
(8, '2025_12_30_125045_create_team_members_table', 1),
(9, '2025_12_30_125047_create_odoo_modules_table', 1),
(10, '2025_12_30_125049_change_settings_value_to_json', 1),
(11, '2025_12_30_130333_create_realizations_table', 1),
(12, '2025_12_30_130335_create_contact_info_table', 1),
(13, '2025_12_30_130337_add_permissions_to_users_table', 1),
(14, '2025_12_30_130339_add_is_active_to_partners_table', 1),
(15, '2026_01_03_153042_add_profile_photo_to_users_table', 1),
(16, '2026_01_03_161658_create_notifications_table', 1),
(26, '2026_01_03_161840_create_media_table', 3),
(18, '2026_01_03_161928_create_leads_table', 1),
(19, '2026_01_03_162500_add_missing_columns_to_users_table', 1),
(20, '2026_01_03_164656_add_client_id_and_status_to_projects_table', 1),
(21, '2026_01_03_165120_create_invoices_table', 1),
(22, '2026_01_03_165305_create_tickets_table', 1),
(23, '2026_01_03_165604_create_ticket_replies_table', 1),
(24, '2026_01_03_170447_create_newsletter_campaigns_table', 1),
(25, '2026_01_03_170926_create_pages_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter_campaigns`
--

DROP TABLE IF EXISTS `newsletter_campaigns`;
CREATE TABLE IF NOT EXISTS `newsletter_campaigns` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `scheduled_at` timestamp NULL DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `recipients_count` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `newsletter_campaigns`
--

INSERT INTO `newsletter_campaigns` (`id`, `subject`, `content`, `status`, `scheduled_at`, `sent_at`, `recipients_count`, `created_at`, `updated_at`) VALUES
(1, 'service', '<p>dire test</p>', 'sent', NULL, '2026-01-12 08:57:09', 1, '2026-01-12 08:56:58', '2026-01-12 08:57:09');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `odoo_modules`
--

DROP TABLE IF EXISTS `odoo_modules`;
CREATE TABLE IF NOT EXISTS `odoo_modules` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` json NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` json NOT NULL,
  `features` json DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `odoo_modules`
--

INSERT INTO `odoo_modules` (`id`, `name`, `icon`, `description`, `features`, `link`, `order`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"CRM\", \"fr\": \"CRM\"}', 'users', '{\"en\": \"Manage your sales pipeline and opportunities efficiently.\", \"fr\": \"Gérez votre pipeline de ventes et vos opportunités efficacement.\"}', '[\"Pipeline visuel\", \"Automatisation des leads\", \"Rapports précis\"]', 'https://odoo.com/app/crm', 0, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(2, '{\"en\": \"Sales\", \"fr\": \"Ventes\"}', 'shopping-cart', '{\"en\": \"From quote to invoice in a few clicks.\", \"fr\": \"De la devis à la facture en quelques clics.\"}', '[\"Outil de devis\", \"Signature électronique\", \"Paiement en ligne\"]', 'https://odoo.com/app/sales', 0, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(3, '{\"en\": \"Accounting\", \"fr\": \"Comptabilité\"}', 'calculator', '{\"en\": \"Integrated analytic and general accounting.\", \"fr\": \"Une comptabilité analytique et générale intégrée.\"}', '[\"Facturation\", \"Réconciliation bancaire\", \"Rapports dynamiques\"]', 'https://odoo.com/app/accounting', 0, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(4, '{\"en\": \"Inventory\", \"fr\": \"Inventaire\"}', 'archive', '{\"en\": \"Optimize your stock and logistics.\", \"fr\": \"Optimisez vos stocks et votre logistique.\"}', '[\"Traçabilité double entrée\", \"Dropshipping\", \"Multi-entrepôts\"]', 'https://odoo.com/app/inventory', 0, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(5, '{\"en\": \"Manufacturing (MRP)\", \"fr\": \"Fabrication (MRP)\"}', 'cog', '{\"en\": \"Plan, launch, and track your production orders.\", \"fr\": \"Planifiez, lancez et suivez vos ordres de production.\"}', '[\"Nomenclatures\", \"Ordres de travail\", \"PLM\"]', 'https://odoo.com/app/mrp', 0, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(6, '{\"en\": \"Website\", \"fr\": \"Site Web\"}', 'globe', '{\"en\": \"Create a professional website without coding.\", \"fr\": \"Créez un site web professionnel sans coder.\"}', '[\"Éditeur glisser-déposer\", \"eCommerce intégré\", \"SEO Ready\"]', 'https://odoo.com/app/website', 0, '2026-01-03 16:09:23', '2026-01-03 16:09:23');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` json NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` json NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `meta_title` json DEFAULT NULL,
  `meta_description` json DEFAULT NULL,
  `meta_keywords` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `partners`
--

DROP TABLE IF EXISTS `partners`;
CREATE TABLE IF NOT EXISTS `partners` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `partners`
--

INSERT INTO `partners` (`id`, `name`, `logo`, `website`, `order`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'Odoo', 'partners/da9TLQLa21FqwM0dQJkzA8JWQBcGakWwnd2dgP2J.jpg', 'https://odoo.com', 0, '2026-01-03 16:09:23', '2026-01-12 10:11:09', 1),
(2, 'Hikvision', 'partners/DZ9qJenMkWAv7a4IBSEFUk1Hkbb9ZiUHaQ2WR9Oy.jpg', 'https://hikvision.com', 0, '2026-01-03 16:09:23', '2026-04-20 10:15:58', 1),
(3, 'AWS', 'partners/aws.png', 'https://aws.amazon.com', 0, '2026-01-03 16:09:23', '2026-01-03 16:09:23', 1),
(4, 'Microsoft', 'partners/microsoft.png', 'https://microsoft.com', 0, '2026-01-03 16:09:23', '2026-01-03 16:09:23', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` json NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` json DEFAULT NULL,
  `content` json NOT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `views_count` bigint UNSIGNED NOT NULL DEFAULT '0',
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_category_id_foreign` (`category_id`),
  KEY `posts_author_id_foreign` (`author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `excerpt`, `content`, `featured_image`, `category_id`, `author_id`, `published_at`, `views_count`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"Why migrate to Odoo 17?\", \"fr\": \"Pourquoi migrer vers Odoo 17 ?\"}', 'pourquoi-migrer-vers-odoo-17', '{\"en\": \"Discover the revolutionary new features of the latest Odoo version and how they can transform your business.\", \"fr\": \"Découvrez les nouvelles fonctionnalités révolutionnaires de la dernière version d\'Odoo et comment elles peuvent transformer votre entreprise.\"}', '{\"en\": \"<p>Odoo 17 brings a redesigned interface and increased performance. Major new features include: a new Material Design, improved accounting module with advanced multi-currency management, and native integration with major African payment platforms.</p>\", \"fr\": \"<p>Odoo 17 apporte une interface repensée et des performances accrues. Parmi les nouveautés majeures : un nouveau design Material Design, l\'amélioration du module comptable avec la gestion multi-devises avancée, et l\'intégration native avec les principales plateformes de paiement africaines.</p><p>Les entreprises camerounaises bénéficient particulièrement de ces améliorations grâce à une meilleure adaptation aux spécificités locales, notamment la gestion de la TVA et les rapports OHADA.</p>\"}', NULL, 1, 1, '2026-01-03 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(2, '{\"en\": \"How to choose the right Odoo modules for your business\", \"fr\": \"Comment choisir les modules Odoo adaptés à votre entreprise\"}', 'choisir-modules-odoo', '{\"en\": \"Complete guide to selecting Odoo modules that truly match your organization\'s needs.\", \"fr\": \"Guide complet pour sélectionner les modules Odoo qui correspondent réellement aux besoins de votre organisation.\"}', '{\"en\": \"<p>Choosing Odoo modules is crucial for your ERP project success. Start with core modules: Sales, CRM, Accounting. For manufacturing, add Manufacturing and Inventory. Services particularly benefit from Project and Timesheets.</p>\", \"fr\": \"<p>Le choix des modules Odoo est crucial pour la réussite de votre projet ERP. Commencez par les modules de base : Ventes, CRM, Comptabilité. Pour les industries, ajoutez Fabrication et Inventaire. Les services bénéficient particulièrement de Projet et Feuilles de temps.</p><p>Évitez l\'erreur classique de vouloir tout activer d\'un coup. Une approche progressive permet une meilleure adoption par vos équipes.</p>\"}', NULL, 1, 1, '2025-12-31 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(3, '{\"en\": \"Odoo vs SAP vs Sage: Comparison for African SMEs\", \"fr\": \"Odoo vs SAP vs Sage : Comparatif pour PME africaines\"}', 'odoo-vs-sap-vs-sage', '{\"en\": \"Comparative analysis of the 3 main ERP solutions for growing African businesses.\", \"fr\": \"Analyse comparative des 3 principales solutions ERP pour les entreprises africaines en croissance.\"}', '{\"en\": \"<p>For African SMEs, Odoo stands out for its excellent value and flexibility. Unlike SAP (high cost, complexity) and Sage (limited features), Odoo offers a complete and scalable solution.</p>\", \"fr\": \"<p>Pour les PME africaines, Odoo se distingue par son excellent rapport qualité-prix et sa flexibilité. Contrairement à SAP (coût élevé, complexité) et Sage (fonctionnalités limitées), Odoo offre une solution complète et évolutive.</p><p>Le coût moyen d\'implémentation d\'Odoo est 5 fois inférieur à SAP, avec une mise en place 3 fois plus rapide. La communauté active garantit un support réactif et des mises à jour régulières.</p>\"}', NULL, 1, 1, '2025-12-27 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(4, '{\"en\": \"Odoo integration with Mobile Money: Practical guide\", \"fr\": \"Intégration Odoo avec Mobile Money : Guide pratique\"}', 'integration-odoo-mobile-money', '{\"en\": \"Connect your Odoo ERP to the most popular mobile payment platforms in Africa.\", \"fr\": \"Connectez votre ERP Odoo aux plateformes de paiement mobile les plus populaires en Afrique.\"}', '{\"en\": \"<p>Odoo integration with Orange Money, MTN Mobile Money and Moov Money is now simplified thanks to modules specifically developed for Francophone Africa.</p>\", \"fr\": \"<p>L\'intégration d\'Odoo avec Orange Money, MTN Mobile Money et Moov Money est désormais simplifiée grâce aux modules développés spécifiquement pour l\'Afrique francophone.</p><p>Les avantages sont multiples : réconciliation automatique des paiements, suivi en temps réel des transactions, et génération automatique des factures. Une solution indispensable pour toute entreprise souhaitant faciliter les paiements de ses clients.</p>\"}', NULL, 1, 1, '2025-12-24 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(5, '{\"en\": \"5 steps to successful digital transformation\", \"fr\": \"Les 5 étapes d\'une transformation digitale réussie\"}', '5-etapes-transformation-digitale', '{\"en\": \"Proven methodology to digitize your business without losing your teams along the way.\", \"fr\": \"Méthodologie éprouvée pour digitaliser votre entreprise sans perdre vos équipes en route.\"}', '{\"en\": \"<p>1. Current state audit: Map your current processes. 2. Vision definition: Where do you want to be in 3 years? 3. Tool selection: Prioritize solutions adapted to your context. 4. Intensive training: 80% of success comes from user adoption. 5. Continuous improvement: Transformation is never finished.</p>\", \"fr\": \"<p>1. Audit de l\'existant : Cartographiez vos processus actuels. 2. Définition de la vision : Où voulez-vous être dans 3 ans ? 3. Choix des outils : Priorisez les solutions adaptées à votre contexte. 4. Formation intensive : 80% du succès vient de l\'adoption utilisateur. 5. Amélioration continue : La transformation n\'est jamais finie.</p><p>Chez Zygnixis, nous accompagnons nos clients sur ces 5 étapes avec une approche personnalisée adaptée au marché camerounais.</p>\"}', NULL, 2, 1, '2026-01-01 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(6, '{\"en\": \"Cloud or On-Premise: Which hosting for your ERP?\", \"fr\": \"Cloud ou On-Premise : Quel hébergement pour votre ERP ?\"}', 'cloud-vs-on-premise-erp', '{\"en\": \"Analysis of the pros and cons of each option for African businesses.\", \"fr\": \"Analyse des avantages et inconvénients de chaque option pour les entreprises africaines.\"}', '{\"en\": \"<p>Cloud offers flexibility and predictable costs, ideal for growing SMEs. On-Premise guarantees total control and compliance, suitable for large structures with IT teams.</p>\", \"fr\": \"<p>Le Cloud offre flexibilité et coûts prévisibles, idéal pour les PME en croissance. L\'On-Premise garantit contrôle total et conformité, adapté aux grandes structures avec équipes IT.</p><p>Au Cameroun, nous recommandons souvent une approche hybride : données sensibles en local, applications métier dans le cloud. Cette configuration optimise sécurité et performance tout en maîtrisant les coûts.</p>\"}', NULL, 2, 1, '2025-12-20 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(7, '{\"en\": \"Process automation: ROI and use cases\", \"fr\": \"Automatisation des processus : ROI et cas d\'usage\"}', 'automatisation-processus-roi', '{\"en\": \"Discover how automation can reduce your operating costs by 40%.\", \"fr\": \"Découvrez comment l\'automatisation peut réduire vos coûts opérationnels de 40%.\"}', '{\"en\": \"<p>Automating repetitive tasks frees your teams for higher value-added activities. Concrete examples: automatic invoicing (saving 15h/month), scheduled customer reminders, report generation.</p>\", \"fr\": \"<p>L\'automatisation des tâches répétitives libère vos équipes pour des activités à plus forte valeur ajoutée. Exemples concrets : facturation automatique (gain de 15h/mois), relances clients programmées, génération de rapports.</p><p>Le retour sur investissement typique : 6-12 mois pour des gains mesurables. Un de nos clients a réduit son temps de clôture comptable de 15 à 3 jours grâce à l\'automatisation Odoo.</p>\"}', NULL, 2, 1, '2025-12-16 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(8, '{\"en\": \"Electronic document management: goodbye to paper\", \"fr\": \"Gestion documentaire électronique : adieu au papier\"}', 'ged-gestion-electronique-documents', '{\"en\": \"How to implement an effective EDM and say goodbye to overflowing binders.\", \"fr\": \"Comment mettre en place une GED efficace et dire adieu aux classeurs qui débordent.\"}', '{\"en\": \"<p>Electronic Document Management (EDM) radically transforms organization. With Odoo Documents, centralize invoices, contracts, HR in a secure space accessible 24/7.</p>\", \"fr\": \"<p>La Gestion Électronique de Documents (GED) transforme radicalement l\'organisation. Avec Odoo Documents, centralisez factures, contrats, RH dans un espace sécurisé et accessible 24/7.</p><p>Bénéfices immédiats : recherche instantanée, partage sécurisé, workflows d\'approbation automatiques, et sauvegarde transparente. Une PME moyenne économise 50 000 FCFA/mois en frais d\'impression et archivage.</p>\"}', NULL, 2, 1, '2025-12-13 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(9, '{\"en\": \"The Importance of Cybersecurity in 2025\", \"fr\": \"L\'importance de la cybersécurité en 2025\"}', 'importance-cybersecurite-2025', '{\"en\": \"Threats evolve, so should your protections. Here is what you need to know to protect your business.\", \"fr\": \"Les menaces évoluent, vos protections aussi. Voici ce qu\'il faut savoir pour protéger votre entreprise.\"}', '{\"en\": \"<p>Digital transformation exposes companies to new risks: ransomware, phishing, data breaches. In 2025, 43% of cyberattacks target African SMEs, often less protected than large companies.</p>\", \"fr\": \"<p>La transformation digitale expose les entreprises à de nouveaux risques : ransomwares, phishing, fuites de données. En 2025, 43% des cyberattaques ciblent les PME africaines, souvent moins protégées que les grandes entreprises.</p><p>Les fondamentaux : authentification à deux facteurs, sauvegardes automatiques quotidiennes, formation continue des équipes, et firewall de nouvelle génération. Un audit de sécurité annuel est désormais indispensable.</p>\"}', NULL, 3, 1, '2025-12-29 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(10, '{\"en\": \"IP vs Analog CCTV: 2025 Guide\", \"fr\": \"Vidéosurveillance IP vs Analogique : Guide 2025\"}', 'videosurveillance-ip-vs-analogique', '{\"en\": \"Detailed comparison to choose the right CCTV system for your business.\", \"fr\": \"Comparatif détaillé pour choisir le système de vidéosurveillance adapté à votre entreprise.\"}', '{\"en\": \"<p>IP cameras offer superior image quality (up to 4K), intelligent video analysis (intrusion detection, people counting), and deployment flexibility. Analog remains relevant for small budgets or existing system extensions.</p>\", \"fr\": \"<p>Les caméras IP offrent une qualité d\'image supérieure (jusqu\'à 4K), analyse vidéo intelligente (détection d\'intrusion, comptage de personnes), et flexibilité de déploiement. L\'analogique reste pertinent pour les petits budgets ou extensions de systèmes existants.</p><p>Notre recommandation : IP pour les nouvelles installations, avec stockage NVR local + cloud backup. Budget type : 1,5M FCFA pour 8 caméras 2MP avec installation.</p>\"}', NULL, 3, 1, '2025-12-22 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(11, '{\"en\": \"Biometric access control: technologies and ROI\", \"fr\": \"Contrôle d\'accès biométrique : technologies et ROI\"}', 'controle-acces-biometrique', '{\"en\": \"Fingerprints, facial recognition or iris: which technology to choose?\", \"fr\": \"Empreintes digitales, reconnaissance faciale ou iris : quelle technologie choisir ?\"}', '{\"en\": \"<p>Biometrics revolutionizes access control by eliminating lost badges and forgotten codes. Fingerprints: reliable and affordable. Facial recognition: contactless, ideal post-COVID. Iris: ultra-secure for sensitive areas.</p>\", \"fr\": \"<p>La biométrie révolutionne le contrôle d\'accès en éliminant badges perdus et codes oubliés. Empreintes digitales : fiable et abordable. Reconnaissance faciale : sans contact, idéal post-COVID. Iris : ultra-sécurisé pour zones sensibles.</p><p>ROI typique : élimination des badges (200 000 FCFA/an), réduction des intrusions (95%), et traçabilité parfaite pour audits. Intégration native avec Odoo pour gestion RH et pointage.</p>\"}', NULL, 3, 1, '2025-12-18 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(12, '{\"en\": \"GDPR and data protection in Cameroon\", \"fr\": \"RGPD et protection des données au Cameroun\"}', 'rgpd-protection-donnees-cameroun', '{\"en\": \"What Cameroonian companies need to know about personal data regulations.\", \"fr\": \"Ce que les entreprises camerounaises doivent savoir sur la réglementation des données personnelles.\"}', '{\"en\": \"<p>Although GDPR is European, Cameroon has adopted similar laws. Any company processing personal data must: obtain explicit consent, ensure data security, allow access and deletion on request.</p>\", \"fr\": \"<p>Bien que le RGPD soit européen, le Cameroun a adopté des lois similaires. Toute entreprise traitant des données personnelles doit : obtenir le consentement explicite, garantir la sécurité des données, permettre l\'accès et la suppression sur demande.</p><p>Odoo intègre nativement des fonctionnalités de conformité : anonymisation des données, export RGPD, et logs d\'accès. Un audit de mise en conformité prend généralement 2-3 semaines.</p>\"}', NULL, 3, 1, '2025-12-14 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(13, '{\"en\": \"Zygnixis certified Official Odoo Partner 2025\", \"fr\": \"Zygnixis certifié Partenaire Officiel Odoo 2025\"}', 'zygnixis-partenaire-odoo-2025', '{\"en\": \"We are proud to announce our certification as an official Odoo partner for Central Africa.\", \"fr\": \"Nous sommes fiers d\'annoncer notre certification en tant que partenaire officiel Odoo pour l\'Afrique Centrale.\"}', '{\"en\": \"<p>This certification demonstrates our technical expertise and commitment to our clients. As an official partner, we benefit from priority access to Odoo support, advanced training, and participate in the development program.</p>\", \"fr\": \"<p>Cette certification témoigne de notre expertise technique et de notre engagement envers nos clients. En tant que partenaire officiel, nous bénéficions d\'un accès prioritaire au support Odoo, des formations avancées, et participons au programme de développement.</p><p>Concrètement pour nos clients : garantie de qualité, mises à jour prioritaires, et tarifs préférentiels sur les licences Enterprise. Nous sommes un des 5 partenaires certifiés au Cameroun.</p>\"}', NULL, 4, 1, '2026-01-02 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(14, '{\"en\": \"New Zygnixis showroom in Bonanjo\", \"fr\": \"Nouveau showroom Zygnixis à Bonanjo\"}', 'nouveau-showroom-bonanjo', '{\"en\": \"Come discover our solutions in our new demonstration space in the heart of Douala.\", \"fr\": \"Venez découvrir nos solutions dans notre nouvel espace de démonstration au cœur de Douala.\"}', '{\"en\": \"<p>Our new 150m² showroom welcomes you Monday to Friday for personalized Odoo demonstrations, security installation tours, and training workshops.</p>\", \"fr\": \"<p>Notre nouveau showroom de 150m² vous accueille du lundi au vendredi pour des démonstrations personnalisées d\'Odoo, visites de nos installations de sécurité, et ateliers de formation.</p><p>Espace dédié avec : 6 postes de démonstration Odoo, salle de formation pour 12 personnes, exposition de matériel de vidéosurveillance et contrôle d\'accès. Réservez votre créneau dès maintenant !</p>\"}', NULL, 4, 1, '2025-12-26 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(15, '{\"en\": \"Free webinar: \\\"Getting started with Odoo\\\"\", \"fr\": \"Webinaire gratuit : \\\"Démarrer avec Odoo\\\"\"}', 'webinaire-demarrer-odoo', '{\"en\": \"Join our monthly webinar to discover Odoo in 90 minutes flat.\", \"fr\": \"Participez à notre webinaire mensuel pour découvrir Odoo en 90 minutes chrono.\"}', '{\"en\": \"<p>Every last Thursday of the month, our team hosts a free Odoo discovery webinar. Program: general presentation, key modules demonstration, Q&A session, and special offer for participants.</p>\", \"fr\": \"<p>Chaque dernier jeudi du mois, notre équipe anime un webinaire gratuit de découverte d\'Odoo. Au programme : présentation générale, démonstration des modules clés, session Q&R, et offre spéciale pour les participants.</p><p>Format interactif avec démonstration live et possibilité de poser vos questions. Inscription obligatoire, places limitées à 50 participants. Prochain webinaire : 30 janvier 2025 à 14h GMT+1.</p>\"}', NULL, 4, 1, '2025-12-30 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(16, '{\"en\": \"Zygnixis is hiring: 3 Odoo consultant positions\", \"fr\": \"Zygnixis recrute : 3 postes de consultants Odoo\"}', 'zygnixis-recrute-consultants-odoo', '{\"en\": \"Join a passionate team and participate in the digital transformation of Cameroonian companies.\", \"fr\": \"Rejoignez une équipe passionnée et participez à la transformation digitale des entreprises camerounaises.\"}', '{\"en\": \"<p>We are looking for 3 Odoo consultants (Junior, Confirmed, Senior) to support our growth. Desired profile: IT/management training, passion for ERPs, excellent interpersonal skills.</p>\", \"fr\": \"<p>Nous recherchons 3 consultants Odoo (Junior, Confirmé, Senior) pour accompagner notre croissance. Profil recherché : formation informatique/gestion, passion pour les ERP, excellent relationnel.</p><p>Ce que nous offrons : formation Odoo certifiée, projets variés (industrie, services, retail), évolution rapide, et package attractif. Expérience Odoo appréciée mais débutants motivés bienvenus. Candidatures à envoyer avant le 15 février.</p>\"}', NULL, 4, 1, '2025-12-28 16:09:23', 0, NULL, NULL, '2026-01-03 16:09:23', '2026-01-03 16:09:23');

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `title` json NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sector` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` json NOT NULL,
  `solution` json DEFAULT NULL,
  `results` json DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `deadline` date DEFAULT NULL,
  `testimonial` text COLLATE utf8mb4_unicode_ci,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` json DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_slug_unique` (`slug`),
  KEY `projects_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `title`, `slug`, `client_name`, `sector`, `description`, `solution`, `results`, `status`, `deadline`, `testimonial`, `featured_image`, `images`, `published_at`, `created_at`, `updated_at`) VALUES
(1, NULL, '{\"en\": \"Odoo ERP Deployment for Industries S.A.\", \"fr\": \"Déploiement ERP Odoo pour Industries S.A.\"}', 'deploiement-erp-industries-sa', 'Industries S.A.', 'Industrie', '{\"en\": \"Full implementation of Manufacturing, Inventory, and Sales modules for a processing plant.\", \"fr\": \"Mise en place complète des modules Fabrication, Stock et Ventes pour une usine de transformation.\"}', '{\"en\": \"Odoo Enterprise v17 with IoT connectors.\", \"fr\": \"Odoo Enterprise v17 avec connecteurs IoT.\"}', '{\"en\": \"30% reduction in raw material losses.\", \"fr\": \"Réduction de 30% des pertes de matières premières.\"}', 'pending', NULL, NULL, 'projects/2xk63YpCTDr1si0S71FJLbpykODouJT9BgaFj2xA.png', NULL, '2026-01-02 23:00:00', '2026-01-03 16:09:23', '2026-04-20 10:17:43'),
(2, NULL, '{\"en\": \"Security for Banque Atlantique HQ\", \"fr\": \"Sécurisation Siège Banque Atlantique\"}', 'securisation-banque-atlantique', 'Banque Atlantique', 'Finance', '{\"en\": \"Installation of 50 IP cameras and biometric access control system.\", \"fr\": \"Installation de 50 caméras IP et système de contrôle d\'accès biométrique.\"}', '{\"en\": \"Hikvision AI Cameras + ZKTeco Access Control.\", \"fr\": \"Hikvision AI Cameras + ZKTeco Access Control.\"}', '{\"en\": \"100% site coverage and access traceability.\", \"fr\": \"Couverture 100% du site et traçabilité des accès.\"}', 'pending', NULL, NULL, 'projects/security.png', NULL, '2025-12-03 16:09:23', '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(3, NULL, '{\"en\": \"Logistique Express Client Portal\", \"fr\": \"Portail Client Logistique Express\"}', 'portail-logistique-express', 'Logistique Express', 'Transport', '{\"en\": \"Development of a web application for real-time parcel tracking.\", \"fr\": \"Développement d\'une application web pour le suivi des colis en temps réel.\"}', '{\"en\": \"Laravel + Vue.js\", \"fr\": \"Laravel + Vue.js\"}', '{\"en\": \"Client satisfaction improved by 40%.\", \"fr\": \"Satisfaction client améliorée de 40%.\"}', 'pending', NULL, NULL, 'projects/logistics.png', NULL, '2025-11-03 16:09:23', '2026-01-03 16:09:23', '2026-01-03 16:09:23');

-- --------------------------------------------------------

--
-- Structure de la table `realizations`
--

DROP TABLE IF EXISTS `realizations`;
CREATE TABLE IF NOT EXISTS `realizations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` json DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `realizations`
--

INSERT INTO `realizations` (`id`, `title`, `description`, `image`, `details`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"Complete Odoo ERP Deployment\", \"fr\": \"Déploiement Odoo ERP Complet\"}', '{\"en\": \"Implementation of a complete Odoo ERP system for an industrial company, including manufacturing, inventory, sales, and accounting modules.\", \"fr\": \"Mise en place d\'un système ERP Odoo complet pour une entreprise industrielle, incluant les modules de fabrication, inventaire, ventes et comptabilité.\"}', 'realizations/erp_deployment.png', '{\"Client\": \"Industries S.A.\", \"Durée\": \"6 mois\", \"Modules\": \"12\"}', 1, 1, '2026-01-03 16:09:23', '2026-01-03 16:09:23');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` json NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` json NOT NULL,
  `full_description` json DEFAULT NULL,
  `features` json DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `icon`, `short_description`, `full_description`, `features`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"Odoo Integration\", \"fr\": \"Intégration Odoo\"}', 'integration-odoo', 'server', '{\"en\": \"Full ERP deployment\", \"fr\": \"Déploiement complet de votre ERP\"}', NULL, NULL, 1, 1, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(2, '{\"en\": \"Electronic Security\", \"fr\": \"Sécurité Électronique\"}', 'security-electronic', 'shield-check', '{\"en\": \"CCTV and Access Control\", \"fr\": \"Vidéosurveillance et Contrôle d\'accès\"}', NULL, NULL, 2, 1, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(3, '{\"en\": \"Web Development\", \"fr\": \"Développement Web\"}', 'web-development', 'code', '{\"en\": \"Custom applications\", \"fr\": \"Applications sur mesure\"}', NULL, NULL, 3, 1, '2026-01-03 16:09:23', '2026-01-03 16:09:23');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dFvuTiX01zsvX3rXxtPxqNgowwrEcNZ4BTmqPEHU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibGt4eGNSS1dwWEhobGJlVHZiSlAxVjI3UWM0YUdxQk9adVFZb0g3cSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wYXJ0bmVycyI7czo1OiJyb3V0ZSI7czoyMDoiYWRtaW4ucGFydG5lcnMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1768221007),
('HGYjbb8FvVAD2cEebFFRuvqvvtB614XiLwCdvjH0', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3phRnRtYW5EeUJTb0RrVGk2OFViaU1SZVk4R1A2OGhzUWltOXM5dCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768330059),
('mhHxi8laHQNUSiJFNRZ12FFbNiNSdPPNGAxv1Kjj', NULL, '192.168.137.210', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicmxQYjJKRUlyRWlSMjdJSkp2ZUtia1llcjk2SVNOQUk3MkZVSGtJaCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xOTIuMTY4LjEzNy4xOjgwMDAvcHJvamVjdHMiO3M6NToicm91dGUiO3M6ODoicHJvamVjdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6ImxvY2FsZSI7czoyOiJlbiI7fQ==', 1768216609),
('ZdP2pohud3f4ZD7IRGd8ljIowKm5R3HuZgWW78Vi', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibDBFanpSam5SR0pHS1ZwTW85RHhEMlF0dFhBWkIyZjRqbGd2c2JiWiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjQ1OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWRtaW4vbWVkaWE/c2VhcmNoPXN5bmMiO3M6NToicm91dGUiO3M6MTc6ImFkbWluLm1lZGlhLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1768220524),
('bSd10DpCJahc6n3romcEZ8buueXQRUvwm9SMvMR0', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 Edg/147.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZXlIOFRQa3Z1Z2ZuRnJ6RTdMaWJqZjNLQWZHZDRYSGVzTWpoOTJZbSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1776683869);

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` json NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `group`, `created_at`, `updated_at`) VALUES
(1, 'site_name', '\"Zygnixis\"', 'text', 'general', '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(2, 'site_logo', '\"logo.png\"', 'image', 'general', '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(3, 'site_favicon', '\"favicon.ico\"', 'image', 'general', '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(4, 'contact_email', '\"contact@zygnixis.com\"', 'text', 'contact', '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(5, 'contact_phone', '\"+237 600 000 000\"', 'text', 'contact', '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(6, 'contact_address', '\"Douala, Cameroun\"', 'text', 'contact', '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(7, 'social_facebook', '\"https://facebook.com/zygnixis\"', 'text', 'social', '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(8, 'social_linkedin', '\"https://linkedin.com/company/zygnixis\"', 'text', 'social', '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(9, 'social_twitter', '\"https://twitter.com/zygnixis\"', 'text', 'social', '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(10, 'footer_description', '{\"en\": \"Your trusted partner for digital transformation and security.\", \"fr\": \"Votre partenaire de confiance pour la transformation numérique et la sécurité.\"}', 'translatable_text', 'footer', '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(11, 'footer_copy', '\"© 2024 Zygnixis. All rights reserved.\"', 'text', 'footer', '2026-01-03 16:09:23', '2026-01-03 16:09:23');

-- --------------------------------------------------------

--
-- Structure de la table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscribers_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `verified_at`, `status`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'denzoduplex3@gmail.com', '2026-01-03 16:22:14', 'active', 1, '2026-01-03 16:22:14', '2026-01-03 16:22:14'),
(2, 'ferrynoubissi@gmail.com', '2026-01-12 09:14:47', 'active', 1, '2026-01-12 09:14:47', '2026-01-12 09:14:47');

-- --------------------------------------------------------

--
-- Structure de la table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
CREATE TABLE IF NOT EXISTS `team_members` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` json NOT NULL,
  `bio` json DEFAULT NULL,
  `social_links` json DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `photo`, `role`, `bio`, `social_links`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Jean Dupont', 'team/jean.jpg', '{\"en\": \"CEO\", \"fr\": \"Directeur Général\"}', '{\"en\": \"Digital transformation expert with 15 years of experience.\", \"fr\": \"Expert en transformation digitale avec 15 ans d\'expérience.\"}', '{\"twitter\": \"https://twitter.com\", \"linkedin\": \"https://linkedin.com\"}', 0, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(2, 'Sophie Martin', 'team/sophie.jpg', '{\"en\": \"Technical Project Manager\", \"fr\": \"Cheffe de Projet Technique\"}', '{\"en\": \"Certified Odoo Specialist.\", \"fr\": \"Spécialiste Odoo certifiée.\"}', '{\"linkedin\": \"https://linkedin.com\"}', 0, '2026-01-03 16:09:23', '2026-01-03 16:09:23'),
(3, 'Marc Dubreuil', 'team/marc.jpg', '{\"en\": \"Security Manager\", \"fr\": \"Responsable Sécurité\"}', '{\"en\": \"Advanced security systems engineer.\", \"fr\": \"Ingénieur en systèmes de sécurité avancés.\"}', '{\"linkedin\": \"https://linkedin.com\"}', 0, '2026-01-03 16:09:23', '2026-01-03 16:09:23');

-- --------------------------------------------------------

--
-- Structure de la table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'low',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tickets_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ticket_replies`
--

DROP TABLE IF EXISTS `ticket_replies`;
CREATE TABLE IF NOT EXISTS `ticket_replies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_replies_ticket_id_foreign` (`ticket_id`),
  KEY `ticket_replies_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permissions` json DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `last_login_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile_photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `permissions`, `is_active`, `last_login_at`) VALUES
(1, 'Admin Zygnixis', 'admin@zygnixis.com', NULL, '2026-01-03 16:09:23', '$2y$12$9cMAwLIja330FT0J0jp4J.7R5k1JZcNZywSEmVIfuOSVeSqhZ3VW2', 'anFq4TdBE8', '2026-01-03 16:09:23', '2026-01-03 16:09:23', '[\"admin\"]', 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
