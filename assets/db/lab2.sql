-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 05:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab2`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author_id`, `created_at`, `updated_at`) VALUES
(3, 'ughh', 'ughhhhhhhhhhhhhhhhh', 10, '2025-04-13 12:08:13', NULL),
(4, 'Sarap', 'sarap mo markj\r\n', 11, '2025-04-13 12:08:13', NULL),
(5, 'BAYOT KO', 'AKO AY ISANG BADING', 12, '2025-04-13 12:08:13', NULL),
(6, 'Arl Sison', 'ughhhh ughh guh', 13, '2025-04-16 01:04:17', NULL),
(7, 'wtf', 'a;sdlfkjsdflkj', 4, '2025-04-21 03:06:36', NULL),
(8, 'zvxc', 'dsfsaf', 4, '2025-04-21 03:09:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(4, 'Markj', 'Cortes', 'markj', '$2y$10$wagaeHx2fx4sKV5kUJSs5OTxzWFd7FdW.uL7tbwyvNs9VZkEi5O9i', '2025-04-13 12:06:58', NULL),
(5, 'test', 'test', 'test', '$2y$10$OQHSXyV6SHcuvQPSZqvgc.2FVC5le4ZrnnYVYBRcOuFAKOsedwx5e', '2025-04-13 12:06:58', NULL),
(10, 'Rashid', 'Tapales', 'Snezhy', '$2y$10$fccSwKvDyLFqtwqO/WmKD.3NXSDrApp3GH.vMIK.LIvryKyKbPe7e', '2025-04-13 12:06:58', NULL),
(11, 'Axci', 'Cabusas', 'sumkai', '$2y$10$RuTxNPPePuK.3AFyti7DQuEqIr78QiiCkVqDRR7oyPr8H4hfzwkSO', '2025-04-13 12:06:58', NULL),
(12, 'Aljon', 'Paragoso', 'aljon', '$2y$10$8etoXwUcenOJ89Zm.go96O8na4leMBHrtQXT58pWmPPCMfjZ4L5Ky', '2025-04-13 12:06:58', NULL),
(13, 'Axcee', 'Cabusas', 'axcee1234', '$2y$10$LZUpQ8jHyYTR8XQPJeBBLu/95P/VFCMpXwztuMgTWN5AYTXHR3oP6', '2025-04-16 01:03:28', NULL),
(14, 'test', 'etst', 'test1', '$2y$10$hnKKWxSngbs8.oaF12PZfenUrbyoKqlbE9nU6jE1eds0Vnvr/Iq6K', '2025-04-21 03:12:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
