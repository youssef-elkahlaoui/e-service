-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 07:58 PM
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
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `IdAbsence` int(11) NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  `IdCours` int(11) NOT NULL,
  `DateAbsence` date NOT NULL,
  `Justifiée` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `CNE` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `annonces`
--

CREATE TABLE `annonces` (
  `IdAnnonce` int(11) NOT NULL,
  `IdClasse` int(11) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `DatePublication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `IdClasse` int(11) NOT NULL,
  `NomFiliere` varchar(255) NOT NULL,
  `Niveau` varchar(50) DEFAULT NULL,
  `AnnéeScolaire` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

CREATE TABLE `departements` (
  `IdDepartement` int(11) NOT NULL,
  `NomDepartement` varchar(255) NOT NULL,
  `IdTeacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documentscours`
--

CREATE TABLE `documentscours` (
  `IdDocument` int(11) NOT NULL,
  `IdCours` int(11) NOT NULL,
  `TypeDocument` enum('Cours PDF','TP','Vidéo') NOT NULL,
  `NomFichier` varchar(255) NOT NULL,
  `CheminFichier` varchar(255) NOT NULL,
  `Archivé` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `IdCours` int(11) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `IdEnseignant` int(11) DEFAULT NULL,
  `IdClasse` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `IdNote` int(11) NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  `IdCours` int(11) NOT NULL,
  `TypeNote` enum('Devoir','Examen','TP','Projet') NOT NULL,
  `Valeur` float DEFAULT NULL,
  `Coefficient` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `IdNotification` int(11) NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  `Message` text NOT NULL,
  `DateNotification` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `IdClasse` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `CNE` varchar(10) DEFAULT NULL,
  `CIN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `date`, `IdClasse`, `password`, `image`, `CNE`, `CIN`) VALUES
(0, 'hoho', 'hihi', 'hoho.bb@etu.com', '2024-05-15 18:44:53', 0, '$2y$10$78uR.Ef1cGrTgpzkJtl7p.WrQQiLrMcSGblleNk7Ph/SJYMHdtauS', '/mdb/img/ayoub.jpeg', 'R6868686', 'BH54578'),
(1, 'youssef', 'ksh', 'jsohsslkdj@ohd.doheo', '2024-05-12 11:14:36', 0, '$2y$10$i.Hj143JT0tSoALA3DyxeOoRMFD8kD0NhNI2d/V4GdWh5fKJMFkzm', '', NULL, NULL),
(6, 'hoho', 'hihi', 'hoho@etu.com', '2024-05-15 18:44:53', 4, '$2y$10$GXOD1Hm9/4zb.bmG21FAbuYwyS6uAGRK6T0Vn7djOAEThxJzU0nFW', '89', 'R6868686', 'BH54578'),
(17, 'Youssef', 'youssef', 'youssefelkahlaoui@gmail.com', '2024-05-09 17:34:27', 0, '$2y$10$j2H8asDWXe0SELTjxDOzEOEWPRV1W9Vx.hWIHHiVx.O1Ti6wTHecG', '', NULL, NULL),
(18, 'y', 'y', 'you@you.com', '2024-05-11 17:29:37', 0, '$2y$10$Y.LKXFineNBJshi6GnWBne1IunTfyAqZThk3C2Mn2vM07kqrc3HH2', '', NULL, NULL),
(19, 'y', 'y', 'you@you.com', '2024-05-11 17:29:37', 0, '$2y$10$LS48UIixUES9Z49lZCQr0eZu6KjbxCq0h.SY7aXW96J.3b1Qeiyky', '', NULL, NULL),
(20, 'hihi', 'hoha', 'ohoash@akha.com', '2024-05-12 11:13:16', 0, '$2y$10$Dku.IZa0ZCINNIMb3e0WquiPteV13LskJhKfZGLHEjVjpK.ODh09i', '', NULL, NULL),
(21, 'hihi', 'hoha', 'ohoash@akha.com', '2024-05-12 11:13:16', 0, '$2y$10$Dku.IZa0ZCINNIMb3e0WquiPteV13LskJhKfZGLHEjVjpK.ODh09i', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `IdDepartement` int(11) NOT NULL,
  `Moduls` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `CIN` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `IdClasse` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `CNE` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `IdClasse`, `password`, `image`, `CNE`) VALUES
(1, 'youssef', 'ksh', 'jsohsslkdj@ohd.doheo', '2024-05-12 11:14:36', 0, '$2y$10$i.Hj143JT0tSoALA3DyxeOoRMFD8kD0NhNI2d/V4GdWh5fKJMFkzm', '', NULL),
(17, 'Youssef', 'youssef', 'youssefelkahlaoui@gmail.com', '2024-05-09 17:34:27', 0, '$2y$10$j2H8asDWXe0SELTjxDOzEOEWPRV1W9Vx.hWIHHiVx.O1Ti6wTHecG', '', NULL),
(18, 'y', 'y', 'you@you.com', '2024-05-11 17:29:37', 0, '$2y$10$Y.LKXFineNBJshi6GnWBne1IunTfyAqZThk3C2Mn2vM07kqrc3HH2', '', NULL),
(19, 'y', 'y', 'you@you.com', '2024-05-11 17:29:37', 0, '$2y$10$LS48UIixUES9Z49lZCQr0eZu6KjbxCq0h.SY7aXW96J.3b1Qeiyky', '', NULL),
(20, 'hihi', 'hoha', 'ohoash@akha.com', '2024-05-12 11:13:16', 0, '$2y$10$Dku.IZa0ZCINNIMb3e0WquiPteV13LskJhKfZGLHEjVjpK.ODh09i', '', NULL),
(21, 'hihi', 'hoha', 'ohoash@akha.com', '2024-05-12 11:13:16', 0, '$2y$10$Dku.IZa0ZCINNIMb3e0WquiPteV13LskJhKfZGLHEjVjpK.ODh09i', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`IdAbsence`),
  ADD KEY `IdUtilisateur` (`IdUtilisateur`),
  ADD KEY `IdCours` (`IdCours`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `date` (`date`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`IdAnnonce`),
  ADD KEY `IdClasse` (`IdClasse`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`IdClasse`);

--
-- Indexes for table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`IdDepartement`),
  ADD KEY `FK_teacher_departement` (`IdTeacher`);

--
-- Indexes for table `documentscours`
--
ALTER TABLE `documentscours`
  ADD PRIMARY KEY (`IdDocument`),
  ADD KEY `IdCours` (`IdCours`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`IdCours`),
  ADD KEY `IdEnseignant` (`IdEnseignant`),
  ADD KEY `IdClasse` (`IdClasse`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`IdNote`),
  ADD KEY `IdUtilisateur` (`IdUtilisateur`),
  ADD KEY `IdCours` (`IdCours`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`IdNotification`),
  ADD KEY `IdUtilisateur` (`IdUtilisateur`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `date` (`date`),
  ADD KEY `school_id` (`IdClasse`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `date` (`date`),
  ADD KEY `Departement_id` (`IdDepartement`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `date` (`date`),
  ADD KEY `school_id` (`IdClasse`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `IdAbsence` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `IdAnnonce` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `IdClasse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departements`
--
ALTER TABLE `departements`
  MODIFY `IdDepartement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documentscours`
--
ALTER TABLE `documentscours`
  MODIFY `IdDocument` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `IdCours` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `IdNote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `IdNotification` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departements`
--
ALTER TABLE `departements`
  ADD CONSTRAINT `FK_teacher_departement` FOREIGN KEY (`IdTeacher`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `FK_departement_teacher` FOREIGN KEY (`IdDepartement`) REFERENCES `departements` (`IdDepartement`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
