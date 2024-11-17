-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 12:15 PM
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
-- Database: `historydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `historytable`
--

CREATE TABLE `historytable` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(50) NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `plate_number` varchar(50) NOT NULL,
  `total_fees` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `historytable`
--

INSERT INTO `historytable` (`id`, `name`, `age`, `time_in`, `time_out`, `plate_number`, `total_fees`) VALUES
(1, 'Robert Pradilla', 19, '2024-11-17 11:57:52', '2024-11-17 11:57:52', 'G123-123-123', 500),
(2, 'Jimmy Pintuan', 19, '2024-11-17 11:57:52', '2024-11-17 11:57:52', 'G102-132-192', 500),
(3, 'Reanne Carnasa', 19, '2024-11-17 12:05:33', '2024-11-17 12:05:33', 'G123-123-1233123', 500),
(4, 'Kevin Nash Fontanilla', 19, '2024-11-17 12:05:33', '2024-11-17 12:05:33', 'A123-312-412', 500),
(5, 'Rainier Mendoza', 19, '2024-11-17 12:06:45', '2024-11-17 12:06:45', 'B123-3123-2145', 500),
(6, 'Reybie Saminado', 19, '2024-11-17 12:06:45', '2024-11-17 12:06:45', 'C123-123-4231', 500),
(7, 'Mitzi', 19, '2024-11-17 12:07:28', '2024-11-17 12:07:28', 'D1231-231-4124', 500),
(8, 'Aaron Joseph Malbog', 19, '2024-11-17 12:07:28', '2024-11-17 12:07:28', 'E123-321-421', 500),
(9, 'Jayson Torculas', 19, '2024-11-17 12:08:52', '2024-11-17 12:08:52', 'F1312-3123-421', 500),
(10, 'Jhonalyn Serviano', 19, '2024-11-17 12:08:52', '2024-11-17 12:08:52', 'G-123-3124-412', 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `historytable`
--
ALTER TABLE `historytable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historytable`
--
ALTER TABLE `historytable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
