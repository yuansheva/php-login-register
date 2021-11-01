-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 04:45 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pweb_tgs8`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `nama`, `username`, `email`, `password`, `photo`) VALUES
(1, 'Muhammad Yuansheva Firmansyahasdasd', 'yuanshevaasdasd', 'sheva@gmail.com', '$2y$10$.M677nn4WvGlRwDdsFDuBeSIpAv/yNjQ3rbrw.eSaEbEi5Ciwwd26', ''),
(4, 'damar', 'damar', 'damar@123.com', '$2y$10$8gZZAEsetaO4bODBaWTsFuBhAabEIB/vJr6mnniEI6cGG55R7SRje', ''),
(5, 'asd', 'yuanshvea', 'sheva123@123', '$2y$10$EfgVHW5F9vaO15SiDUm0BOCNdnD2Ak8xERxc0KtNaFKaA9DrdU3L2', ''),
(6, 'Kelompok 6', 'kelompok6', 'kelompok6@gmail.com', '$2y$10$qQ/jiiC.ewSbgHa/IdcR8u5ZOw.KEgQYcsggVg3SIjIvL9FLT.xvS', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
