-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 07:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `demands`
--

CREATE TABLE `demands` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `demand_type` varchar(255) DEFAULT NULL,
  `demand_description` text DEFAULT NULL,
  `demand_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demands`
--

INSERT INTO `demands` (`id`, `student_id`, `demand_type`, `demand_description`, `demand_date`, `status`) VALUES
(1, 1, 'Demande de stage', 'bb\r\n', '2024-05-25', 'en attend\n'),
(2, 1, 'Demande de stage', 'bb', '2024-05-25', 'refuse'),
(3, 1, 'Demande de stage', 'bb', '2024-05-25', 'realise'),
(4, 1, 'Demande de stage', 'sadff', '2024-05-25', 'pending'),
(5, 1, 'Demande de stage', 'dsfa', '2024-05-25', 'pending'),
(6, 1, 'Demande de stage', 'cc', '2024-05-25', 'pending'),
(7, 1, 'Demande de stage', 'd', '2024-05-25', 'pending'),
(8, 1, 'Demande de stage', 'd', '2024-05-25', 'pending'),
(9, 1, 'Demande de stage', 'dd', '2024-05-25', 'pending'),
(10, 1, 'Attestation d&#039;assurance', 'asdklfj', '2024-05-25', 'pending'),
(11, 1, 'Demande de stage', 'bb\r\n', '2024-05-25', NULL),
(12, 1, 'Demande de stage', 'bb\r\n', '2024-05-25', NULL),
(13, 1, 'Demande de stage', 'sadf', '2024-05-25', NULL),
(14, 1, 'Demande de stage', 'sdaf', '2024-05-25', NULL),
(15, 1, 'Demande de stage', 'sdaf', '2024-05-25', NULL),
(16, 1, 'Demande de stage', 'dsafd', '2024-05-25', NULL),
(17, 1, 'Demande de stage', 'dsafd', '2024-05-25', NULL),
(18, 1, 'Demande de stage', 'SFD', '2024-05-25', NULL),
(19, 1, 'Demande de stage', 'ASDF', '2024-05-25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demands`
--
ALTER TABLE `demands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demands`
--
ALTER TABLE `demands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `demands`
--
ALTER TABLE `demands`
  ADD CONSTRAINT `demands_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
