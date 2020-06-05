-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2020 at 05:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_soccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `clubName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeOften` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homeStadium` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youngest` int(11) NOT NULL,
  `oldest` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `clubName`, `level`, `logo`, `timeOften`, `homeStadium`, `address`, `youngest`, `oldest`, `description`, `u_id`, `created_at`, `updated_at`) VALUES
(3, 'Barca', 'Mạnh', 'FTu9E4L2s5barca.png', 'Thứ 3', 'Camp Nou', 'Thành phố HCM', 20, 26, 'abcabc', 1, NULL, '2020-06-04 01:05:21'),
(4, 'Real Madrid', 'Khá', 'sQQGluSiXcreal.png', 'Thứ 6', 'Santiago Bernabéu', 'Hà Nội', 20, 30, 'hellooooooo', 2, NULL, '2020-05-30 01:16:01'),
(5, 'Manchester United', 'Yếu', 'sImbL0MxjSmu.png', 'Thứ 5', 'Old Trafford', 'Hà Nội', 25, 30, 'adgjjkfhgfdfhsg', 3, NULL, '2020-05-30 01:17:13'),
(6, 'Chelsea', 'Khá', 'v2GofMnynichelsea.png', 'Thứ 7', 'Stamford Bridge', 'Thành phố HCM', 15, 18, 'jgkshkdjafkjhjfkljdaf', 4, NULL, '2020-05-30 01:17:55'),
(10, 'Bayern Munich', 'Trung bình', 'BjUE3zQqrKbayern.png', 'Thứ 6', 'Allianz Arena', 'Hà Nội', 20, 30, 'ghjjkhgffgfhjfghjk', 15, '2020-05-29 22:46:55', '2020-05-29 22:46:55'),
(11, 'Arsenal', 'Khá', 'fOgBBjL5vvarsenal.png', 'Thứ 2', 'Emirates', 'Hà Nội', 20, 25, 'okjhgjkgfhjjghj', 18, '2020-05-30 00:29:51', '2020-05-30 01:19:15'),
(14, 'Tottenham Hotspur', 'Khá', 'xXv40meKQ8tottenham.jpg', 'Thứ 6', 'White Hart Lane', 'Thành phố HCM', 26, 30, 'Tottenham Hotspur Football Club, commonly referred to as Tottenham (/ˈtɒtənəm/)[2][3] or Spurs, is an English professional football club in Tottenham, London, that competes in the Premier League. Tottenham Hotspur Stadium has been the club\'s home ground since April 2019, replacing their former home of White Hart Lane, which had been demolished to make way for the new stadium on the same site. Their training ground is on Hotspur Way in Bulls Cross in the London Borough of Enfield. The club is owned by ENIC Group', 16, '2020-06-02 01:18:48', '2020-06-02 01:18:48'),
(21, 'Liverpool', 'Trung bình', 'BujGI3z4G0liverpool.jpg', 'Thứ 7', 'Anfield', 'Hà Nội', 15, 18, 'Liverpool FC live transfer news, team news, fixtures, gossip and more. Get all of the latest Reds breaking transfer news, fixtures, LFC squad news and more every day from the Liverpool ECHO', 6, '2020-06-03 03:33:08', '2020-06-03 03:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `find_amatch`
--

CREATE TABLE `find_amatch` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `lease` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stadium` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allow` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `c_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `find_amatch`
--

INSERT INTO `find_amatch` (`id`, `date`, `time`, `lease`, `stadium`, `address`, `allow`, `status`, `c_id`, `created_at`, `updated_at`) VALUES
(1, '2020-05-31', '20:00:00', '5-5', 'DH Ngoai Ngư', 'Pham Van Dong', 0, 1, 3, NULL, '2020-06-04 20:23:21'),
(2, '2020-06-06', '19:30:00', '6-4', 'My Dinh', 'Le Duc Tho', 1, 0, 4, NULL, '2020-06-04 12:08:43'),
(3, '2020-06-25', '20:00:00', '7-3', 'Camp Nou', 'Spain', 1, 0, 5, NULL, '2020-06-04 11:53:39'),
(4, '2020-06-18', '20:00:00', '5-5', 'Etihad', 'Hà Nam', 0, 0, 3, '2020-06-01 11:29:32', '2020-06-01 11:29:32'),
(5, '2020-06-20', '20:35:00', '7-3', 'Stamford Bridge', 'Anh', 1, 0, 3, '2020-06-01 11:35:04', '2020-06-01 11:47:54'),
(6, '2020-06-25', '01:40:00', '6-4', 'Camp Nou', 'heheheh', 1, 0, 6, '2020-06-01 11:36:10', '2020-06-01 11:48:02'),
(7, '2020-06-20', '13:42:00', '5-5', 'Allianz Arena', 'Anh', 0, 0, 3, '2020-06-01 11:42:35', '2020-06-01 11:42:35'),
(8, '2020-06-27', '14:00:00', '7-3', 'Emirates', 'VN', 0, 0, 3, '2020-06-01 12:00:22', '2020-06-01 12:00:22'),
(9, '2020-06-12', '14:11:00', '7-3', 'Stamford Bridge', 'Hà Nam', 1, 0, 10, '2020-06-01 12:11:54', '2020-06-01 12:11:54'),
(10, '2020-06-09', '17:00:00', '5-5', 'Allianz Arena', 'Đức', 0, 0, 3, '2020-06-01 12:13:50', '2020-06-01 12:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `found`
--

CREATE TABLE `found` (
  `id` int(10) UNSIGNED NOT NULL,
  `fi_id` int(10) UNSIGNED NOT NULL,
  `u_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_05_27_094826_create_clubs_table', 1),
(4, '2020_05_27_101418_create_find_amatch_table', 1),
(5, '2020_05_27_102642_create_found_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `lastName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thunbar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `phone` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastName`, `firstName`, `email`, `email_verified_at`, `password`, `thunbar`, `role`, `phone`, `description`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tran', 'Manh Giang', 'tranmanhgiang06051999@gmail.com', NULL, '$2y$10$qwCMqGOsfgqft8hQQ/LX/OhYDpMFXQL7bMUDG7oO1Lpb.xlrzb316', 'bgau.jpg', 0, 395578355, 'Qme8Ib4zKNoRbI6lWbSD', NULL, NULL, '2020-05-29 19:00:54'),
(2, 'Nguyen', 'Ha', 'nguyenha99153@gmail.com', NULL, '$2y$10$4IbVt18ysy4fnKMHBxZoe.0suCGRoam6VvCTjxV3NgDUhFxCIu2za', 'mute.jpg', 0, 395578355, 'bzO3LuVqCOi9i6qYpKVq', NULL, NULL, '2020-05-31 21:36:59'),
(3, 'Tran', 'Tuan Anh', 'trananh1349.mta@gmail.com', NULL, '$2y$10$9OBoZ.V0bhodu.noOIPqg.AXGxeL6PlRhDRte3Bvd7dEQWe0hYOoC', 'bgau.jpg', 0, 395578355, 'jk8xT1AkBURJU0QjhtqJ', NULL, NULL, NULL),
(4, 'Pham', 'Anh Tu', 'phamanhtu@gmail.com', NULL, '$2y$10$TCmu1PS9MgOmlMNiKPixG.ET1l06Cpowk3DOGsAxMPIyCnJWez/tK', 'mute.jpg', 0, 395578355, '1zDoBvIxpG38SHFosRlw', NULL, NULL, NULL),
(5, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$PLwe7a5NbRZMtrwtMZEcKe4dfGxBa5Q1nAyMCSm6OmIEtyfVHAZIq', 'bgau.jpg', 1, 395578355, 'eeSrj8rcefgQoMQehMeC', NULL, NULL, NULL),
(6, 'nguyen', 'van a', 'nguyenvana@gmail.com', NULL, '$2y$10$n6eMmAax.33wdZW0jw7rhOrMSzHEc91i0xK62fORsmUPXFlthVr3i', 'mute.jpg', 0, 395578355, 'll7LZ3EWmsrr8HGWr0f9', NULL, NULL, '2020-05-29 18:55:08'),
(15, 'Nguyen', 'Van B', 'nguyenvanb@gmail.com', NULL, '123', 'dongchi.jpg', 0, 123456, 'hehehehehe', NULL, '2020-05-29 07:30:58', '2020-05-29 07:30:58'),
(16, 'Nguyen', 'van c', 'nguyenvanc@gmail.com', NULL, '$2y$10$Z7jZ7Y1Y5VcWU9SxLTVkeuIRMiqQOLiNPpQphDHlXIR.gCDO9BgMO', 'image.jpeg', 0, 123321, 'test role', NULL, '2020-05-29 07:33:07', '2020-05-29 10:56:31'),
(17, 'Nguyen', 'van d', 'nguyenvand@gmail.com', NULL, '$2y$10$599No090V4drblUazxZeY.CUw9ja0M36U3mJRTyh0FGGwS2YkYMAW', 'iphone.jpg', 0, 1111, 'adfghjhd', NULL, '2020-05-29 09:23:37', '2020-06-04 01:08:30'),
(18, 'nguyen', 'van g', 'nguyenha99153@gmai.com', NULL, '$2y$10$mVZn6rD6lj1WClheeSqII.B.ln0KfLkis1WStbLvWZBAd2vl180UG', 'messi.jpg', 0, 123123, 'hehehe', NULL, '2020-05-29 21:11:55', '2020-06-04 01:07:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clubs_clubname_unique` (`clubName`),
  ADD KEY `clubs_u_id_foreign` (`u_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `find_amatch`
--
ALTER TABLE `find_amatch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `find_amatch_c_id_foreign` (`c_id`);

--
-- Indexes for table `found`
--
ALTER TABLE `found`
  ADD PRIMARY KEY (`id`),
  ADD KEY `found_fi_id_foreign` (`fi_id`),
  ADD KEY `found_u_id_foreign` (`u_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `find_amatch`
--
ALTER TABLE `find_amatch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `found`
--
ALTER TABLE `found`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_u_id_foreign` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `find_amatch`
--
ALTER TABLE `find_amatch`
  ADD CONSTRAINT `find_amatch_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `clubs` (`id`);

--
-- Constraints for table `found`
--
ALTER TABLE `found`
  ADD CONSTRAINT `found_fi_id_foreign` FOREIGN KEY (`fi_id`) REFERENCES `find_amatch` (`id`),
  ADD CONSTRAINT `found_u_id_foreign` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
