-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2025 at 10:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aizzy_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `published_year` int(11) NOT NULL,
  `status` enum('available','borrowed') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `published_year`, `status`) VALUES
(5, 'The Catcher in the Rye', 'J.D. Salinger', 1951, 'borrowed'),
(6, 'Moby-Dick', 'Herman Melville', 1851, 'available'),
(7, 'The Hobbit', 'J.R.R. Tolkien', 1937, 'available'),
(8, 'War and Peace', 'Leo Tolstoy', 1869, 'borrowed'),
(9, 'Crime and Punishment', 'Fyodor Dostoevsky', 1866, 'available'),
(10, 'The Lord of the Rings', 'J.R.R. Tolkien', 1954, 'available'),
(12, 'Ang Hopia ni Gulaman', 'Realisan', 2021, 'available'),
(14, 'Neil Panot', 'Neil', 1995, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed`
--

CREATE TABLE `borrowed` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowed`
--

INSERT INTO `borrowed` (`id`, `user_id`, `book_id`, `borrow_date`, `return_date`) VALUES
(1, 2, 3, '2025-03-31', NULL),
(2, 2, 11, '2025-03-31', NULL),
(3, 2, 4, '2025-03-31', NULL),
(4, 2, 5, '2025-03-31', '2025-04-04'),
(5, 2, 6, '2025-03-31', '2025-04-04'),
(6, 2, 7, '2025-03-31', '2025-04-04'),
(7, 2, 9, '2025-03-31', '2025-04-04'),
(8, 1, 4, '2025-04-02', NULL),
(9, 1, 3, '2025-04-02', NULL),
(10, 1, 8, '2025-04-02', NULL),
(11, 1, 9, '2025-04-02', NULL),
(12, 2, 5, '2025-04-04', NULL),
(13, 2, 6, '2025-04-04', NULL),
(14, 2, 8, '2025-04-04', '2025-04-04'),
(15, 2, 13, '2025-04-04', NULL),
(16, 2, 10, '2025-04-04', '2025-04-04'),
(17, 2, 12, '2025-04-04', '2025-04-04'),
(18, 2, 8, '2025-04-04', NULL),
(19, 2, 10, '2025-04-04', '2025-04-04'),
(20, 2, 9, '2025-04-04', '2025-04-04'),
(21, 3, 5, '2025-04-07', '2025-04-07'),
(22, 3, 9, '2025-04-07', '2025-04-07'),
(23, 3, 6, '2025-04-07', '2025-04-07'),
(24, 3, 9, '2025-04-07', '2025-04-07'),
(25, 3, 7, '2025-04-07', '2025-04-07'),
(26, 3, 8, '2025-04-07', '2025-04-07'),
(27, 3, 5, '2025-04-07', '2025-04-07'),
(28, 3, 6, '2025-04-07', '2025-04-07'),
(29, 3, 9, '2025-04-07', '2025-04-07'),
(30, 3, 8, '2025-04-07', NULL),
(31, 3, 6, '2025-04-07', '2025-04-07'),
(32, 5, 5, '2025-04-08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'ceejay', 'cuetoceejaysenodio@gmail.com', '$2y$10$umxtQInJvkOOGaCBrqz.rO5wCp.8zxkqZRpNo19ltyT1aeqQHOYS.', '2025-03-30 13:41:24'),
(2, 'aizzy', 'aizy@gmail.com', '$2y$10$zJ.cSL1qQ4syIhlf/rxqw.xHe5j/HHDWqPAeyM9xplt9PGRISm/xS', '2025-03-31 05:21:37'),
(3, 'ceejay', 'ceejay@gmail.com', '$2y$10$MUHiuzHHHOdJ7uBOBRj7/ufxf7fH4ierN/LjFYAL81YJXZWq30sIW', '2025-04-07 06:04:46'),
(4, 'neil ', 'neil@gmail.com', '$2y$10$n3/ziUF/7JmVbjc4RImPBuIrBIhqGSxCzN.NNrvaUzHpV0U76MqOq', '2025-04-07 06:18:24'),
(6, 'Aizzy Villanueva', 'aizzy@gmail.com', '$2y$10$rnyeXIMxsJ8wJfsjAQfyy.s/dwo119UCB1i28x6mKcTwNGsVmcEay', '2025-04-10 05:59:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowed`
--
ALTER TABLE `borrowed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `borrowed`
--
ALTER TABLE `borrowed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
