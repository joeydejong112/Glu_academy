-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2020 at 10:06 AM
-- Server version: 5.5.14
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u529521_glu`
--

-- --------------------------------------------------------

--
-- Table structure for table `formulier`
--

CREATE TABLE `formulier` (
  `id` int(11) NOT NULL,
  `uitleg` varchar(255) NOT NULL,
  `vraag1` varchar(255) NOT NULL,
  `vraag2` varchar(255) NOT NULL,
  `vraag3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formulier`
--

INSERT INTO `formulier` (`id`, `uitleg`, `vraag1`, `vraag2`, `vraag3`) VALUES
(1, 'Je kunt met dit formulier aanmelden voor een training van de GLU Academy. Bij akkoord van je teamleider en bij voldoende deelname is je inschrijving definitief en ontvang je twee weken voorafgaand aan de training een uitnodiging per mail.', 'Voor welke training schrijf jij je in? ', 'Is je leidinggevende op de hoogte van je inschrijving? indien ja, geeft hij/zij akkoord?', 'Bijzonderheden');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_18_100407_create_roles_table', 1),
(3, '2019_12_18_100632_create_role_user_table', 1),
(4, '2020_03_10_092618_create_klas_table', 1),
(5, '2020_03_19_233802_create_admin_control', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, NULL),
(2, 'user', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nogniet',
  `studentnummer` int(50) NOT NULL,
  `ophoogte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bijzonderheden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `klas`, `status`, `studentnummer`, `ophoogte`, `bijzonderheden`, `training`, `email_verified_at`, `updated_at`, `created_at`) VALUES
(1, 'joey', 'joeydejong1112@gmail.com', '$2y$10$TWTxclH4YOhYmLqZ1zNGJOsPwMWf1onSgojcS9q2Q3CqNdsIVEZOC', '32md', 'nogniet', 43242, 'ja, mijn leidinggevende Vivian is op de hoogte van deze inschrijving', 'nee', 'developer', NULL, '2020-04-21 08:51:42', '2020-04-21 08:51:42'),
(3, 'admin', 'admin@admin.nl', '$2y$10$qDuHewFMHZAoDKbGj5iNc.15GNrDqZM/LD49uragTIE7Lfl2hkWMS', '2md2', 'ingeschreven', 11, '#empty', '#empty', '#empty', NULL, '2020-04-21 09:24:58', '2020-04-21 09:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `vraag1`
--

CREATE TABLE `vraag1` (
  `id` int(255) NOT NULL,
  `vraag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vraag1`
--

INSERT INTO `vraag1` (`id`, `vraag`) VALUES
(1, 'developer'),
(2, 'webdev'),
(3, 'Concept'),
(4, 'webdevop');

-- --------------------------------------------------------

--
-- Table structure for table `vraag2`
--

CREATE TABLE `vraag2` (
  `id` int(255) NOT NULL,
  `vraag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vraag2`
--

INSERT INTO `vraag2` (`id`, `vraag`) VALUES
(1, 'ja, mijn leidinggevende is op de hoogte van deze inschrijving'),
(2, 'nee, mijn leidinggevende is niet op de hoogte\">nee, mijn leidinggevende is niet op de hoogte'),
(3, 'mijn leidinggevende is akkoord'),
(4, 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formulier`
--
ALTER TABLE `formulier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vraag1`
--
ALTER TABLE `vraag1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vraag2`
--
ALTER TABLE `vraag2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formulier`
--
ALTER TABLE `formulier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vraag1`
--
ALTER TABLE `vraag1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vraag2`
--
ALTER TABLE `vraag2`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
