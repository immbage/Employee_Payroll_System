-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 12:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `payroll_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(15) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(1, 'IT Consultant'),
(3, 'Manager'),
(5, 'Marketing\r\n'),
(2, 'Public Relations'),
(4, 'Software Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `age` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `FullName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `profile_picture`, `age`, `department`, `salary`, `FullName`) VALUES
(1, 'Rendy', 'rei', 'rei', 'Screenshot_20221215_124056.png', '20', 'Software Engineer', '105589.44', 'RAHMANDI FITRA MADENDA'),
(7, 'Jane', 'jane', 'jane@gmail.com', NULL, '19', 'Public Relations', '28800', 'Jane Doe'),
(8, 'balakotan', 'balakotan', 'balakotan', NULL, '14', 'Manager', '24000', 'Rabbani Madenda'),
(9, 'hansen', 'hansen', 'hansen', 'Screenshot_20221207_192608.png', '19', 'IT Consultant', '28800', 'HANSEN CHRISTOPHER'),
(10, 'iman', 'iman', 'iman', NULL, '22', 'IT Consultant', '', 'Iman'),
(13, 'admin', 'admin', 'admin', NULL, '20', 'Software Engineer', '672000', 'rahmandi fitra madenda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department` (`department`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department` (`department`),
  ADD KEY `salary` (`salary`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department`) REFERENCES `department` (`department`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
