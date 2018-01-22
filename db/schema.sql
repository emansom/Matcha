/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `catalogue_items`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogue_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_code` varchar(255) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 3,
  `definition_id` int(11) DEFAULT NULL,
  `item_specialspriteid` int(11) NOT NULL DEFAULT 0,
  `package_name` varchar(255) DEFAULT NULL,
  `package_description` varchar(255) DEFAULT NULL,
  `is_package` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=514 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `catalogue_packages`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogue_packages` (
  `salecode` varchar(255) DEFAULT NULL,
  `definition_id` int(11) DEFAULT NULL,
  `special_sprite_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `catalogue_pages`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogue_pages` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `min_role` int(11) DEFAULT NULL,
  `name_index` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `layout` varchar(255) DEFAULT NULL,
  `image_headline` varchar(255) DEFAULT NULL,
  `image_teasers` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `label_pick` varchar(255) DEFAULT NULL,
  `label_extra_s` varchar(255) DEFAULT NULL,
  `label_extra_t` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `items`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT 0,
  `definition_id` int(11) NOT NULL,
  `x` varchar(255) DEFAULT '0',
  `y` varchar(255) DEFAULT '0',
  `z` varchar(255) DEFAULT '0',
  `wall_position` varchar(255) NOT NULL DEFAULT '',
  `rotation` int(11) DEFAULT 0,
  `custom_data` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `items_definitions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items_definitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sprite` varchar(255) DEFAULT NULL,
  `colour` varchar(255) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `top_height` double DEFAULT NULL,
  `behaviour` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=416 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `items_moodlight_presets`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items_moodlight_presets` (
  `item_id` int(11) NOT NULL,
  `current_preset` int(11) NOT NULL DEFAULT 1,
  `preset_1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1,#000000,255',
  `preset_2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1,#000000,255',
  `preset_3` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1,#000000,255',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `items_teleporter_links`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items_teleporter_links` (
  `item_id` int(11) NOT NULL,
  `linked_id` int(11) NOT NULL,
  UNIQUE KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `messenger_friends`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_friends` (
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `messenger_messages`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `unread` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `date` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `messenger_requests`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_requests` (
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rank_badges`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rank_badges` (
  `rank` tinyint(1) unsigned NOT NULL DEFAULT 1,
  `badge` char(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rank_fuserights`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rank_fuserights` (
  `min_rank` int(11) NOT NULL,
  `fuseright` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rooms`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` varchar(11) NOT NULL,
  `category` int(11) DEFAULT 2,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `ccts` varchar(255) DEFAULT '',
  `wallpaper` int(4) DEFAULT 0,
  `floor` int(4) DEFAULT 0,
  `showname` tinyint(1) DEFAULT 1,
  `superusers` tinyint(1) DEFAULT 0,
  `accesstype` tinyint(3) DEFAULT 0,
  `password` varchar(255) DEFAULT '',
  `visitors_now` int(11) DEFAULT 0,
  `visitors_max` int(11) DEFAULT 25,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1057 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rooms_categories`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `isnode` int(11) DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `public_spaces` int(11) DEFAULT 0,
  `allow_trading` int(11) DEFAULT 0,
  `minrole_access` int(11) DEFAULT 1,
  `minrole_setflatcat` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rooms_models`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms_models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` varchar(255) NOT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `door_x` int(11) NOT NULL DEFAULT 0,
  `door_y` int(11) NOT NULL DEFAULT 0,
  `door_z` double NOT NULL,
  `door_dir` int(11) DEFAULT 2,
  `heightmap` text NOT NULL,
  `usertype` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rooms_rights`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms_rights` (
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `schema_migrations`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schema_migrations` (
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `settings`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `setting` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `site_menu`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_menu` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `parent_id` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `order_id` tinyint(3) unsigned NOT NULL,
  `caption` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `controller` varchar(70) NOT NULL,
  `action` varchar(70) NOT NULL,
  `icon` varchar(70) NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `soundmachine_playlists`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soundmachine_playlists` (
  `item_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  KEY `machineid` (`item_id`),
  KEY `songid` (`song_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `soundmachine_songs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soundmachine_songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `length` int(3) NOT NULL DEFAULT 0,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `burnt` tinyint(1) NOT NULL DEFAULT 0,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `soundmachine_tracks`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soundmachine_tracks` (
  `soundmachine_id` int(11) NOT NULL,
  `track_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `figure` varchar(255) NOT NULL,
  `pool_figure` varchar(255) NOT NULL,
  `sex` char(1) NOT NULL DEFAULT 'M',
  `motto` varchar(100) NOT NULL DEFAULT 'de kepler whey',
  `credits` int(11) NOT NULL DEFAULT 200,
  `tickets` int(11) NOT NULL DEFAULT 0,
  `film` int(11) NOT NULL DEFAULT 0,
  `rank` tinyint(1) unsigned NOT NULL DEFAULT 1,
  `console_motto` varchar(100) NOT NULL DEFAULT 'I''m a new user!',
  `last_online` int(11) NOT NULL DEFAULT 0,
  `sso_ticket` varchar(255) NOT NULL DEFAULT '',
  `club_subscribed` bigint(11) NOT NULL DEFAULT 0,
  `club_expiration` bigint(11) NOT NULL DEFAULT 0,
  `badge` char(3) NOT NULL DEFAULT '',
  `badge_active` tinyint(1) NOT NULL DEFAULT 1,
  `allow_stalking` tinyint(1) NOT NULL DEFAULT 1,
  `sound_enabled` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users_badges`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_badges` (
  `user_id` int(11) NOT NULL,
  `badge` char(3) NOT NULL,
  KEY `users_badges_users_FK` (`user_id`),
  CONSTRAINT `users_badges_users_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users_room_favourites`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_room_favourites` (
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users_room_votes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_room_votes` (
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping routines for database 'kepler'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed

--
-- Dbmate schema migrations
--

LOCK TABLES `schema_migrations` WRITE;
INSERT INTO `schema_migrations` (version) VALUES
  ('20180605202455'),
  ('20180605202822'),
  ('20180605203204'),
  ('20180605204755'),
  ('20180605205011'),
  ('20180605205211'),
  ('20180605205405'),
  ('20180605205543'),
  ('20180605205848'),
  ('20180605210028'),
  ('20180605210128'),
  ('20180605210255'),
  ('20180605210408'),
  ('20180605210538'),
  ('20180605210815'),
  ('20180605210848'),
  ('20180605210954'),
  ('20180605211041'),
  ('20180605211154'),
  ('20180605211259'),
  ('20180605211518'),
  ('20180605211722'),
  ('20180606130528'),
  ('20180606163724'),
  ('20180606171138'),
  ('20180609193613'),
  ('20180609193620'),
  ('20180609193627'),
  ('20180610045026'),
  ('20180610071051'),
  ('20180610084935'),
  ('20180610105026'),
  ('20180616170631'),
  ('20180622105649'),
  ('20180711162341'),
  ('20180712082530'),
  ('20180713174348'),
  ('20180714163106'),
  ('20180714164734');
UNLOCK TABLES;
