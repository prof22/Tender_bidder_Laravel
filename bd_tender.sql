-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 04:33 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_tender`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Emmanuel', 'admin@gmail.com', '$2y$12$YeKBoA4V.dm1Cv79Qvi51.q1BuxSxh0tbBBh5jEQk5DI42aOGkWiC', 'XxhuGI5TxdwuMqnGKs5J32G2DwdpCgeYZq7e2QNdY9Tx1f3T1rbSsmBRKh3a', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Agriculture', 'agriculture', '2018-07-10 08:33:33', '2018-07-10 08:33:44'),
(2, 'Technology', 'technology', '2018-07-10 08:40:28', '2018-07-10 08:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `criteriaforms`
--

CREATE TABLE `criteriaforms` (
  `id` int(11) NOT NULL,
  `tender_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `criteria_name` varchar(255) NOT NULL,
  `criteria_weight` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criteriaforms`
--

INSERT INTO `criteriaforms` (`id`, `tender_id`, `category_id`, `criteria_name`, `criteria_weight`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Appending', 'urgent', '2020-02-29 15:31:21', '2020-02-29 15:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `evaluationreports`
--

CREATE TABLE `evaluationreports` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `decision` text NOT NULL,
  `evaluation_date` varchar(222) NOT NULL,
  `bid` varchar(255) NOT NULL,
  `tender_request_id` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluationreports`
--

INSERT INTO `evaluationreports` (`id`, `category`, `status`, `decision`, `evaluation_date`, `bid`, `tender_request_id`, `created_at`, `updated_at`) VALUES
(4, 'Agriculture', 1, 'Kindly Approve', '2020-02-29', 'Road Repair', 4, '2020-02-29 18:56:13', '2020-02-29 18:56:13'),
(5, 'Technology', 5, 'New Problem', '2020-02-29', 'Notice for PSTU Central Library', 1, '2020-02-29 19:22:08', '2020-02-29 19:24:48');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_07_10_102335_create_admins_table', 1),
(3, '2018_07_10_102348_create_categories_table', 1),
(4, '2018_07_10_102350_create_users_table', 1),
(5, '2018_07_10_102432_create_tenders_table', 1),
(6, '2018_07_10_102450_create_tender_requests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `published_on` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closed_on` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_price` int(11) NOT NULL,
  `security_amount` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipients` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bid_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`id`, `title`, `category_id`, `user_id`, `published_on`, `closed_on`, `document_price`, `security_amount`, `status`, `image`, `visitor`, `slug`, `contract_no`, `type`, `recipients`, `subject`, `message`, `state`, `bid_document`, `created_at`, `updated_at`) VALUES
(1, 'Notice for PSTU Central Library', 2, 8, '2018-07-9', '2018-07-10', 1000000, 10000, 1, '1531237937.jpg', 51, 'notice-for-pstu-central-library-1', '', '', '', '', '', '', '', '2018-07-10 09:52:17', '2020-02-29 15:47:15'),
(2, 'Federal Housing Estate two', 2, 1, '2020-02-22', '2020-02-22', 120000, 12987, 1, '1582364360.jpg', 0, 'federal-housing-estate-two', '', '', '', '', '', '', '', '2020-02-22 17:39:21', '2020-02-29 06:27:05'),
(3, 'Federal Housing Estate test', 2, 1, '2020-02-22', '2020-02-22', 120000, 12987, 1, '1582933388.jpg', 7, 'federal-housing-estate-test', '', '', '', '', '', '', '', '2020-02-22 17:39:53', '2020-02-29 14:59:32'),
(4, 'Road Repair', 1, 1, '2020-02-28', '2020-03-01', 123000, 1200, 1, '1582934147.jpg', 18, 'road-repair', 'NGS 123 WW', '1', 'Emmanuel', 'Road', 'test', 'Abuja', '1582934148.jpg', '2020-02-29 07:55:48', '2020-02-29 08:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `tender_requests`
--

CREATE TABLE `tender_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tender_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `bid_document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tender_requests`
--

INSERT INTO `tender_requests` (`id`, `user_id`, `tender_id`, `message`, `approved`, `bid_document`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Any comments here', 0, '', '2018-07-10 12:07:28', '2020-02-29 15:51:29'),
(3, 1, 1, 'Any comments here\r\n                Applying', 0, '', '2020-02-22 16:37:36', '2020-02-24 19:56:20'),
(4, 9, 1, 'Any comments here\r\n                New Account Bidding', 5, '', '2020-02-25 00:37:44', '2020-02-29 19:24:48'),
(5, 1, 4, 'Login Test upload biding', 3, '30084.doc', '2020-02-29 08:47:58', '2020-02-29 19:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `username`, `city`, `address`, `account_role`, `organization`, `designation`, `image`, `password`, `status`, `remember_token`, `verify_token`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'test@gmail.com', '342576546', 'test', 'Dhaka', 'Mirpur', 'contractor', 'None', 'None', '', '$2y$12$YeKBoA4V.dm1Cv79Qvi51.q1BuxSxh0tbBBh5jEQk5DI42aOGkWiC', 1, 'snGiscNObYwsYTJLet6ZIFnU7ZVCkB6Gc9fKxj8FZmBFwvSqwtPWT5OFjC5X', '1', NULL, NULL),
(8, 'Okoro James 2', 'okoro@gmail.com', '2353456456', 'okoro-james-2', 'Barisal', 'Patuakhali', 'tenderer', 'BDREN', 'Office Register', '1531233450.jpg', '$2y$12$YeKBoA4V.dm1Cv79Qvi51.q1BuxSxh0tbBBh5jEQk5DI42aOGkWiC', 1, 'kDzf83wtJNlDXF5QJsVXFSk16SFdkw1m0xhRKiOosb3Rq6nQHGtHNRZ4hlJD', '1', '2018-07-10 08:37:30', '2020-02-29 06:12:13'),
(9, 'Okoh Emma OO', 'mine@gmail.com', '08164293270', 'okoh-emma-oo-1', 'Asaba', 'Akplao', 'contractor', 'DESPONS', 'Officer', '1582373933.jpg', '$2y$12$YeKBoA4V.dm1Cv79Qvi51.q1BuxSxh0tbBBh5jEQk5DI42aOGkWiC', 1, 'AIvwuiWzxf6A387iHCLSh8PMfeiJuSnwSGvkBEoehytsQgHmJvNZNZaSID3n', '1', '2020-02-22 20:18:54', '2020-02-22 20:44:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteriaforms`
--
ALTER TABLE `criteriaforms`
  ADD PRIMARY KEY (`id`);




--
-- Indexes for table `evaluationreports`
--
ALTER TABLE `evaluationreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenders_category_id_foreign` (`category_id`),
  ADD KEY `tenders_user_id_foreign` (`user_id`);

--
-- Indexes for table `tender_requests`
--
ALTER TABLE `tender_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tender_requests_tender_id_foreign` (`tender_id`),
  ADD KEY `tender_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `criteriaforms`
--
ALTER TABLE `criteriaforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evaluationreports`
--
ALTER TABLE `evaluationreports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tender_requests`
--
ALTER TABLE `tender_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tenders`
--
ALTER TABLE `tenders`
  ADD CONSTRAINT `tenders_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tenders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tender_requests`
--
ALTER TABLE `tender_requests`
  ADD CONSTRAINT `tender_requests_tender_id_foreign` FOREIGN KEY (`tender_id`) REFERENCES `tenders` (`id`)ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tender_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
