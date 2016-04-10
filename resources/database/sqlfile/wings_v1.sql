-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2016 at 05:04 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wings_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircraft`
--

CREATE TABLE IF NOT EXISTS `aircraft` (
  `aircraft_id` int(11) NOT NULL,
  `aircraft_model` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aircraft_owner` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `number_of_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aircraft_status`
--

CREATE TABLE IF NOT EXISTS `aircraft_status` (
  `aircraft_status_id` int(11) NOT NULL,
  `aircraft_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE IF NOT EXISTS `airports` (
  `airport_id` int(11) NOT NULL,
  `airport_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` int(11) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `company_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flight_requests`
--

CREATE TABLE IF NOT EXISTS `flight_requests` (
  `flight_request_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  `aircraft_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `flight_request_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flight_request_status`
--

CREATE TABLE IF NOT EXISTS `flight_request_status` (
  `flight_request_statusID` int(11) NOT NULL,
  `flight_request_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flight_schedules`
--

CREATE TABLE IF NOT EXISTS `flight_schedules` (
  `flight_schedule_id` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `day` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `airport_id` int(11) NOT NULL,
  `aircraft_id` int(11) NOT NULL,
  `aircraft_status_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE IF NOT EXISTS `instructors` (
  `instructor_id` int(11) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_flight_review_date` date NOT NULL,
  `medical_class` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `medical_class_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE IF NOT EXISTS `licenses` (
  `license_id` int(11) NOT NULL,
  `license_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `license_description` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `license_renters_instructors`
--

CREATE TABLE IF NOT EXISTS `license_renters_instructors` (
  `license_renters_instructors_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `expiration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2013_04_11_233631_orchestra_memory_create_options_table', 1),
('2013_04_12_000836_orchestra_auth_create_users_table', 2),
('2013_04_12_012833_orchestra_auth_create_user_meta_table', 2),
('2013_04_12_013023_orchestra_auth_create_roles_table', 2),
('2013_04_12_013201_orchestra_auth_create_user_role_table', 2),
('2013_04_23_132623_orchestra_auth_basic_roles', 2),
('2013_05_27_062915_orchestra_auth_create_password_reminders_table', 2),
('2014_04_16_043555_orchestra_auth_add_remember_token_to_users_table', 2),
('2013_05_24_091711_orchestra_control_seed_acls', 3),
('2013_06_20_040924_orchestra_story_make_contents_table', 4),
('2013_06_22_042506_orchestra_story_seed_acl', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orchestra_options`
--

CREATE TABLE IF NOT EXISTS `orchestra_options` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orchestra_options`
--

INSERT INTO `orchestra_options` (`id`, `name`, `value`) VALUES
(1, 'site', 'a:2:{s:4:"name";s:5:"Wings";s:5:"theme";a:2:{s:8:"frontend";s:7:"default";s:7:"backend";s:8:"adminlte";}}'),
(2, 'email', 'a:8:{s:6:"driver";s:4:"smtp";s:4:"host";s:11:"mailtrap.io";s:4:"port";s:4:"2525";s:4:"from";a:2:{s:4:"name";s:5:"Wings";s:7:"address";s:19:"kabir12k4@gmail.com";}s:10:"encryption";N;s:8:"username";N;s:8:"password";N;s:8:"sendmail";s:22:"/usr/sbin/sendmail -bs";}'),
(3, 'acl_orchestra', 'a:3:{s:3:"acl";a:4:{s:3:"1:0";b:1;s:3:"1:1";b:1;s:3:"1:2";b:1;s:3:"1:3";b:1;}s:7:"actions";a:4:{i:0;s:16:"manage-orchestra";i:1;s:12:"manage-users";i:2;s:12:"manage-roles";i:3;s:10:"manage-acl";}s:5:"roles";a:3:{i:0;s:5:"guest";i:1;s:13:"administrator";i:2;s:6:"member";}}'),
(4, 'extensions', 'a:2:{s:9:"available";a:2:{s:17:"orchestra/control";a:7:{s:4:"path";s:25:"vendor::orchestra/control";s:11:"source-path";s:25:"vendor::orchestra/control";s:4:"name";s:7:"Control";s:6:"config";a:0:{}s:8:"autoload";a:0:{}s:8:"provides";a:1:{i:0;s:40:"Orchestra\\Control\\ControlServiceProvider";}s:6:"plugin";s:31:"Orchestra\\Control\\ControlPlugin";}s:15:"orchestra/story";a:7:{s:4:"path";s:23:"vendor::orchestra/story";s:11:"source-path";s:23:"vendor::orchestra/story";s:4:"name";s:9:"Story CMS";s:6:"config";a:1:{s:7:"handles";s:3:"cms";}s:8:"autoload";a:0:{}s:8:"provides";a:3:{i:0;s:36:"Orchestra\\Story\\StoryServiceProvider";i:1;s:35:"Orchestra\\Story\\AuthServiceProvider";i:2;s:38:"Orchestra\\Facile\\FacileServiceProvider";}s:6:"plugin";s:27:"Orchestra\\Story\\StoryPlugin";}}s:6:"active";a:2:{s:17:"orchestra/control";a:7:{s:4:"path";s:25:"vendor::orchestra/control";s:11:"source-path";s:25:"vendor::orchestra/control";s:4:"name";s:7:"Control";s:6:"config";a:0:{}s:8:"autoload";a:0:{}s:8:"provides";a:1:{i:0;s:40:"Orchestra\\Control\\ControlServiceProvider";}s:6:"plugin";s:31:"Orchestra\\Control\\ControlPlugin";}s:15:"orchestra/story";a:7:{s:4:"path";s:23:"vendor::orchestra/story";s:11:"source-path";s:23:"vendor::orchestra/story";s:4:"name";s:9:"Story CMS";s:6:"config";a:1:{s:7:"handles";s:3:"cms";}s:8:"autoload";a:0:{}s:8:"provides";a:3:{i:0;s:36:"Orchestra\\Story\\StoryServiceProvider";i:1;s:35:"Orchestra\\Story\\AuthServiceProvider";i:2;s:38:"Orchestra\\Facile\\FacileServiceProvider";}s:6:"plugin";s:27:"Orchestra\\Story\\StoryPlugin";}}}'),
(5, 'extension_orchestra/control', 'a:3:{s:9:"localtime";b:0;s:10:"admin_role";i:1;s:11:"member_role";i:2;}'),
(6, 'acl_orchestra/story', 'a:3:{s:3:"acl";a:14:{s:3:"1:0";b:1;s:3:"1:1";b:1;s:3:"1:2";b:1;s:3:"1:4";b:1;s:3:"1:5";b:1;s:3:"1:6";b:1;s:3:"2:0";b:1;s:3:"2:1";b:1;s:3:"2:2";b:1;s:3:"2:3";b:1;s:3:"2:4";b:1;s:3:"2:5";b:1;s:3:"2:6";b:1;s:3:"2:7";b:1;}s:7:"actions";a:8:{i:0;s:11:"create-post";i:1;s:11:"update-post";i:2;s:11:"delete-post";i:3;s:11:"manage-post";i:4;s:11:"create-page";i:5;s:11:"update-page";i:6;s:11:"delete-page";i:7;s:11:"manage-page";}s:5:"roles";a:3:{i:0;s:5:"guest";i:1;s:6:"member";i:2;s:13:"administrator";}}'),
(7, 'extension_orchestra/story', 'a:5:{s:14:"default_format";N;s:12:"default_page";N;s:8:"per_page";N;s:14:"page_permalink";N;s:14:"post_permalink";N;}');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `renters`
--

CREATE TABLE IF NOT EXISTS `renters` (
  `renter_id` int(11) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_flight_review_date` date NOT NULL,
  `medical_class` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `medical_class_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `renter_schedules`
--

CREATE TABLE IF NOT EXISTS `renter_schedules` (
  `renters_schedule_id` int(11) NOT NULL,
  `flight_schedule_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  `number_of_passengers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', '2016-04-07 23:55:29', '2016-04-07 23:55:29', NULL),
(2, 'Member', '2016-04-07 23:55:29', '2016-04-07 23:55:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `story_contents`
--

CREATE TABLE IF NOT EXISTS `story_contents` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `format` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'markdown',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'post',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `story_contents`
--

INSERT INTO `story_contents` (`id`, `user_id`, `slug`, `title`, `content`, `format`, `type`, `status`, `created_at`, `updated_at`, `published_at`, `deleted_at`) VALUES
(1, 1, '_post_/test', 'Test', 'Hello', 'markdown', 'post', 'publish', '2016-04-08 05:46:56', '2016-04-08 05:46:56', '2016-04-08 11:46:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `group_id`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kabir12k4@gmail.com', '$2y$10$yab12hMOyHzPSzMKswWoBuyazPIbGXo9QymPoGPW294yBjXCD4FRy', 'Administrator', 0, 1, 'fzBPrPRgKfRXHL0FzKzUb1FylutM0yT88lX3mnxL6c2I1GjaT8Zvy8p2msPv', '2016-04-07 23:55:42', '2016-04-10 08:43:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE IF NOT EXISTS `user_meta` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2016-04-07 23:55:42', '2016-04-07 23:55:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aircraft`
--
ALTER TABLE `aircraft`
  ADD PRIMARY KEY (`aircraft_id`);

--
-- Indexes for table `aircraft_status`
--
ALTER TABLE `aircraft_status`
  ADD PRIMARY KEY (`aircraft_status_id`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`airport_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `flight_requests`
--
ALTER TABLE `flight_requests`
  ADD PRIMARY KEY (`flight_request_id`),
  ADD KEY `renter_id` (`renter_id`),
  ADD KEY `aircraft_id` (`aircraft_id`),
  ADD KEY `instructor_id` (`instructor_id`) USING BTREE,
  ADD KEY `flight_request_status_id` (`flight_request_status_id`);

--
-- Indexes for table `flight_request_status`
--
ALTER TABLE `flight_request_status`
  ADD PRIMARY KEY (`flight_request_statusID`);

--
-- Indexes for table `flight_schedules`
--
ALTER TABLE `flight_schedules`
  ADD PRIMARY KEY (`flight_schedule_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `airport_id` (`airport_id`),
  ADD KEY `aircraft_status_id` (`aircraft_status_id`),
  ADD KEY `instructor_id` (`instructor_id`),
  ADD KEY `aircraft_id` (`aircraft_id`) USING BTREE;

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`license_id`);

--
-- Indexes for table `license_renters_instructors`
--
ALTER TABLE `license_renters_instructors`
  ADD PRIMARY KEY (`license_renters_instructors_id`),
  ADD KEY `renter_id` (`renter_id`),
  ADD KEY `instructor_id` (`instructor_id`),
  ADD KEY `license_id` (`license_id`);

--
-- Indexes for table `orchestra_options`
--
ALTER TABLE `orchestra_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orchestra_options_name_unique` (`name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `renters`
--
ALTER TABLE `renters`
  ADD PRIMARY KEY (`renter_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `renter_schedules`
--
ALTER TABLE `renter_schedules`
  ADD PRIMARY KEY (`renters_schedule_id`),
  ADD KEY `flight_schedule_id` (`flight_schedule_id`),
  ADD KEY `renter_id` (`renter_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `story_contents`
--
ALTER TABLE `story_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `story_contents_user_id_index` (`user_id`),
  ADD KEY `story_contents_slug_index` (`slug`),
  ADD KEY `story_contents_format_index` (`format`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_meta_user_id_name_unique` (`user_id`,`name`),
  ADD KEY `user_meta_user_id_index` (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_user_id_role_id_index` (`user_id`,`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aircraft`
--
ALTER TABLE `aircraft`
  MODIFY `aircraft_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aircraft_status`
--
ALTER TABLE `aircraft_status`
  MODIFY `aircraft_status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `airport_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `flight_requests`
--
ALTER TABLE `flight_requests`
  MODIFY `flight_request_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `flight_request_status`
--
ALTER TABLE `flight_request_status`
  MODIFY `flight_request_statusID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `flight_schedules`
--
ALTER TABLE `flight_schedules`
  MODIFY `flight_schedule_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `licenses`
--
ALTER TABLE `licenses`
  MODIFY `license_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `license_renters_instructors`
--
ALTER TABLE `license_renters_instructors`
  MODIFY `license_renters_instructors_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orchestra_options`
--
ALTER TABLE `orchestra_options`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `renters`
--
ALTER TABLE `renters`
  MODIFY `renter_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `renter_schedules`
--
ALTER TABLE `renter_schedules`
  MODIFY `renters_schedule_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `story_contents`
--
ALTER TABLE `story_contents`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `flight_requests`
--
ALTER TABLE `flight_requests`
  ADD CONSTRAINT `flight_requests_ibfk_1` FOREIGN KEY (`renter_id`) REFERENCES `renters` (`renter_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_requests_ibfk_2` FOREIGN KEY (`aircraft_id`) REFERENCES `aircraft` (`aircraft_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_requests_ibfk_3` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_requests_ibfk_4` FOREIGN KEY (`flight_request_status_id`) REFERENCES `flight_request_status` (`flight_request_statusID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flight_schedules`
--
ALTER TABLE `flight_schedules`
  ADD CONSTRAINT `flight_schedules_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_schedules_ibfk_2` FOREIGN KEY (`airport_id`) REFERENCES `airports` (`airport_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_schedules_ibfk_3` FOREIGN KEY (`aircraft_id`) REFERENCES `aircraft` (`aircraft_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_schedules_ibfk_4` FOREIGN KEY (`aircraft_status_id`) REFERENCES `aircraft_status` (`aircraft_status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_schedules_ibfk_5` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `license_renters_instructors`
--
ALTER TABLE `license_renters_instructors`
  ADD CONSTRAINT `license_renters_instructors_ibfk_1` FOREIGN KEY (`renter_id`) REFERENCES `renters` (`renter_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `license_renters_instructors_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `license_renters_instructors_ibfk_3` FOREIGN KEY (`license_id`) REFERENCES `licenses` (`license_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `renters`
--
ALTER TABLE `renters`
  ADD CONSTRAINT `renters_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `renter_schedules`
--
ALTER TABLE `renter_schedules`
  ADD CONSTRAINT `renter_schedules_ibfk_1` FOREIGN KEY (`flight_schedule_id`) REFERENCES `flight_schedules` (`flight_schedule_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `renter_schedules_ibfk_2` FOREIGN KEY (`renter_id`) REFERENCES `renters` (`renter_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
