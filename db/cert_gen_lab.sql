-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 03:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cert_gen_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `lab_id` int(11) NOT NULL,
  `lab_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`lab_id`, `lab_name`) VALUES
(1, 'Dasar'),
(2, 'Menengah'),
(3, 'Lanjut');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `lab_id` int(1) NOT NULL,
  `period` varchar(255) NOT NULL,
  `cert` varchar(255) NOT NULL,
  `sk` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `npm` int(8) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `praktikum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `lab_id`, `period`, `cert`, `sk`, `name`, `npm`, `ttl`, `role`, `praktikum`) VALUES
(2, 3, 'ATA 2022/2023', 'xxx', 'xxx', 'El Rumi Athalla', 21120152, 'Cibinong, 2 November 2999', 'Sekretaris Asisten', 'Kognitif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `lab_id` (`lab_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`lab_id`) REFERENCES `labs` (`lab_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
