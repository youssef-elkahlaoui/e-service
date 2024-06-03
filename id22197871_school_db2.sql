-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2024 at 03:19 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id22197871_school_db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `IdAbsence` int(11) NOT NULL,
  `IdStudent` int(11) NOT NULL,
  `IdCours` int(11) NOT NULL,
  `DateAbsence` datetime NOT NULL DEFAULT current_timestamp(),
  `Justifiée` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`IdAbsence`, `IdStudent`, `IdCours`, `DateAbsence`, `Justifiée`) VALUES
(1, 0, 2, '2024-05-08 00:00:00', 0),
(2, 0, 2, '2024-05-08 00:00:00', 1),
(3, 1, 1, '2024-06-01 05:38:17', 1),
(4, 0, 1, '2024-06-01 05:38:17', 0),
(5, 17, 1, '2024-06-01 05:38:17', 1),
(6, 1, 1, '2024-06-01 06:19:45', 1),
(7, 0, 1, '2024-06-01 06:19:45', 0),
(8, 17, 1, '2024-06-01 06:19:45', 1),
(9, 1, 1, '2024-06-01 08:21:00', 1),
(10, 0, 1, '2024-06-01 08:21:00', 0),
(11, 17, 1, '2024-06-01 08:21:00', 1);

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
  `CNE` varchar(10) DEFAULT NULL,
  `telephone` varchar(255) NOT NULL,
  `cin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `email`, `date`, `password`, `image`, `CNE`, `telephone`, `cin`) VALUES
(5, 'admin', 'you', 'admin.admin@admin.com', '2024-05-15 19:26:38', '$2y$10$zkVXOxs3EgO1LjWruF7sPeppqbHPCn8pVXq6H2uWA6AjOcT7ypYJm', '/uploads/img/students/profile.png', 'NN', '07000000', 'CB341380'),
(6, 'youssef', 'admin', 'youssef.admin@admin.com', '2024-05-15 19:26:38', '$2y$10$zkVXOxs3EgO1LjWruF7sPeppqbHPCn8pVXq6H2uWA6AjOcT7ypYJm', '/uploads/img/students/profile.png', 'NN', '07000000', NULL),
(7, 'anas', 'anas', 'anas.anas@admin.com', '2024-05-29 18:09:15', '$2y$10$GfKrFNz0FHmWpdBo9/x9COskhl2hsSYEZ7.xji3sJVxesxv5iGcze', '/uploads/img/students/profile.png', 'nn', '07000000', 'CB341380');

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
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `IdClasse` int(11) NOT NULL,
  `NomClasse` varchar(255) NOT NULL,
  `Niveau` varchar(50) DEFAULT NULL,
  `AnnéeScolaire` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`IdClasse`, `NomClasse`, `Niveau`, `AnnéeScolaire`) VALUES
(1, 'TDIA1', '1er Annee cycle Ingenieur', '2023-2024'),
(2, 'ID1', '1er Annee cycle Ingenieur', '2023-2024'),
(3, 'CP1', '1er Annee cycle preparatoire', '2023-2024'),
(4, 'GI1', '1er Annee cycle Ingenieur', '2023-2024'),
(5, 'GI2', '2ème Annee cycle Ingenieur', '2023-2024'),
(6, 'GI3', '3ème Annee cycle Ingenieur', '2023-2024'),
(7, 'ID2', '2ème Annee cycle Ingenieur', '2023-2024'),
(8, 'ID3', '3ème Annee cycle Ingenieur', '2023-2024'),
(9, 'CP2', '2ème Annee cycle preparatoire', '2023-2024');

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `IdCours` int(11) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `IdEnseignant` int(11) DEFAULT NULL,
  `IdClasse` int(11) DEFAULT NULL,
  `FilePath` varchar(255) NOT NULL,
  `archived` int(11) NOT NULL DEFAULT 0,
  `IdModule` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`IdCours`, `Titre`, `Description`, `IdEnseignant`, `IdClasse`, `FilePath`, `archived`, `IdModule`, `date`) VALUES
(2, 'walo', 'lkns', 0, 1, '', 0, 1, NULL),
(17, 'wlkkjs', ';sjsi', NULL, 1, '', 0, 1, NULL),
(18, 'wlkkjs', ';sjsi', NULL, 1, '', 0, 1, NULL),
(19, 'mn m', 'mmk', NULL, 1, 'uploads/docs/cours/30032024212256881158389030.pdf', 0, 2, NULL),
(20, 'ojsss', 'skjsos', NULL, 1, '../uploads/cours/PySimpleGUI_Colorizer.py — PySimpleGUI-Photo-Colorizer 2024-05-12 09-38-42.mp4', 0, 2, NULL),
(21, 'ojsss', 'skjsos', NULL, 1, '../uploads/cours/PySimpleGUI_Colorizer.py — PySimpleGUI-Photo-Colorizer 2024-05-12 09-38-42.mp4', 1, 2, NULL),
(22, 'walo', 'hi', NULL, 1, '../uploads/cours/PySimpleGUI_Colorizer.py — PySimpleGUI-Photo-Colorizer 2024-05-12 09-38-42.mp4', 1, 2, NULL),
(23, 'skjs', 'wlhhw', NULL, NULL, '../uploads/cours/PySimpleGUI_Colorizer.py — PySimpleGUI-Photo-Colorizer 2024-05-12 09-38-42.mp4', 1, 4, NULL),
(24, 'wlkkjs', 'wljn', NULL, NULL, '../uploads/cours/PySimpleGUI_Colorizer.py — PySimpleGUI-Photo-Colorizer 2024-05-12 09-38-42.mp4', 1, 8, NULL),
(25, 'walo', 'wljnds', NULL, NULL, '../uploads/cours/emploi.pdf', 1, 8, NULL),
(26, 'alknd', 'alja', NULL, NULL, '../uploads/cours/emploi.pdf', 1, 8, NULL),
(27, 'walo', 'alnaa', NULL, NULL, '../uploads/cours/Cours séance 2.pdf', 1, 4, NULL),
(28, 'ljeidsjd', 'slkjois', NULL, NULL, '../uploads/cours/30032024212654333112520573.pdf', 1, 4, NULL),
(29, 'mn m', 'aljsomms', NULL, NULL, '../uploads/cours/Cours séance 2.pdf', 1, 3, NULL),
(30, 'he', 'he he', NULL, NULL, '../uploads/cours/Cours séance 4.pdf', 0, 4, '2024-05-31 15:48:36'),
(31, 'wpkwk', 'ksskw', NULL, NULL, '../uploads/cours/Cours séance 2.pdf', 1, 3, '2024-05-31 17:02:18'),
(32, 'JAVA', 'GHG', 1, NULL, '../uploads/cours/30032024212654333112520573 (1).pdf', 0, 3, '2024-06-01 07:50:56'),
(33, 'test', 'test', NULL, NULL, '../uploads/cours/Chapitre 2 Les bases du langage Python.pdf', 0, 3, '2024-06-01 07:55:29'),
(34, 'uhu', 'uh', NULL, NULL, '../uploads/cours/30032024212654333112520573 (1).pdf', 0, 3, '2024-06-01 08:01:29'),
(35, 'python', 'python', NULL, NULL, '../uploads/cours/30032024212654333112520573 (1).pdf', 0, 3, '2024-06-01 08:04:47'),
(36, 'python', 'python', NULL, NULL, '../uploads/cours/30032024212151744069269661 (1).pdf', 0, 3, '2024-06-01 08:05:23'),
(37, 'python', 'python', NULL, NULL, 'uploads/cours/30032024212151744069269661 (1).pdf', 0, 3, '2024-06-01 08:13:53');

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
  `status` enum('Approuvé','Non approuvé') NOT NULL DEFAULT 'Non approuvé'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demands`
--

INSERT INTO `demands` (`id`, `student_id`, `demand_type`, `demand_description`, `demand_date`, `status`) VALUES
(26, 0, 'Demande de stage', 'asdf', '2024-05-30', 'Approuvé'),
(27, 0, 'Demande de stage', 'zemmd;d', '2024-05-30', 'Approuvé'),
(28, 0, 'Demande de stage', 'poifpoezlf', '2024-05-30', 'Non approuvé'),
(29, 0, 'Demande de stage', 'eilriter', '2024-05-30', 'Non approuvé'),
(30, 0, 'Attestation de poursuite d&#039;étude', 'iujoij', '2024-05-31', 'Non approuvé'),
(31, 0, 'Demande de stage', 'adsflkfjas', '2024-05-31', 'Non approuvé'),
(32, 1, 'Demande de stage', 'adsfads', '2024-05-31', 'Non approuvé'),
(33, 0, 'Attestation d assurance', 'adskjflkadjsl', '2024-06-01', 'Non approuvé');

-- --------------------------------------------------------

--
-- Table structure for table `devoirs`
--

CREATE TABLE `devoirs` (
  `id` int(11) NOT NULL,
  `id_etudiant` int(11) DEFAULT NULL,
  `sujet` varchar(255) DEFAULT NULL,
  `fichier` varchar(255) DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `fichier_chemin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devoirs`
--

INSERT INTO `devoirs` (`id`, `id_etudiant`, `sujet`, `fichier`, `id_module`, `description`, `date_creation`, `fichier_chemin`) VALUES
(1, 1, 'dsaf', '04072022145125874957474663.jpg', 2, 'asd', '2024-05-25 14:39:25', 'uploads/04072022145125874957474663.jpg'),
(2, 1, 'dfsa', '04072022145125874957474663.jpg', 2, 'adsf', '2024-05-25 14:47:04', 'uploads/04072022145125874957474663.jpg'),
(3, 1, 'dfsa', '04072022145125874957474663.jpg', 2, 'adsf', '2024-05-25 14:48:01', 'uploads/04072022145125874957474663.jpg'),
(4, 1, 'dfsa', '04072022145125874957474663.jpg', 2, 'adsf', '2024-05-25 14:48:55', 'uploads/04072022145125874957474663.jpg'),
(5, 0, 'DAKLJ', 'TP5.py', 3, 'DKJK', '2024-05-25 17:40:58', 'uploads/you2.png'),
(6, 0, 'cc', 'sd.txt', 3, 'sadfdfasdfdasfd', '2024-05-29 19:54:40', 'uploads/sd.txt'),
(7, 0, 'dfsa', '30032024212256881158389030.pdf', 4, 'asdfdas', '2024-05-31 21:58:37', 'uploads/30032024212256881158389030.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `emploi`
--

CREATE TABLE `emploi` (
  `id` int(11) NOT NULL,
  `Classe` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `File_path` varchar(255) NOT NULL,
  `idclass` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emploi`
--

INSERT INTO `emploi` (`id`, `Classe`, `date`, `File_path`, `idclass`) VALUES
(1, 'TDIA 1', '2024-05-30 20:56:43', '/e-service/public/uploads/emplois/1.pdf\n', 1),
(2, 'CP 1', '2024-05-31 13:44:01', '/e-service/public/uploads/emplois/1.pdf\n', 3),
(3, 'CP 2', '2024-05-31 13:44:01', '/e-service/public/uploads/emplois/1.pdf\n', 9),
(4, 'ID 1', '2024-05-31 13:44:01', '/e-service/public/uploads/emplois/1.pdf\n', 2),
(5, 'ID 2', '2024-05-31 13:44:01', '/e-service/public/uploads/emplois/1.pdf\n', 7),
(6, 'ID3', '2024-05-31 13:44:01', '/e-service/public/uploads/emplois/1.pdf\n', 8),
(7, 'GI 1', '2024-05-31 13:44:01', '/e-service/public/uploads/emplois/1.pdf\n', 4),
(8, 'GI 2', '2024-05-31 13:44:01', '/e-service/public/uploads/emplois/1.pdf\n', 5),
(9, 'GI 3', '2024-05-31 13:44:01', '/e-service/public/uploads/emplois/1.pdf\n', 6);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `date`, `count`) VALUES
(1, '2024-05-20', 132),
(2, '2024-05-21', 102),
(3, '2024-05-22', 30),
(4, '2024-05-19', 87),
(5, '2024-05-18', 201),
(6, '2024-05-17', 151),
(7, '2024-05-16', 241),
(8, '2024-05-23', 3),
(9, '2024-05-24', 2),
(10, '2024-05-25', 32),
(11, '2024-05-26', 4),
(12, '2024-05-27', 22),
(13, '2024-05-28', 7),
(14, '2024-05-29', 40),
(15, '2024-05-30', 41),
(16, '2024-05-31', 58),
(17, '2024-06-01', 43);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `IdCours` int(11) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `IdEnseignant` int(11) DEFAULT NULL,
  `IdClasse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`IdCours`, `Titre`, `Description`, `IdEnseignant`, `IdClasse`) VALUES
(1, 'Algèbre Linéaire', 'Introduction aux concepts d\'algèbre linéaire.', 1, 3),
(2, 'JAVA', 'OOP', 1, 1),
(3, 'Python', 'python', 1, 1),
(4, 'Web', 'php et js', 0, 1),
(5, 'Chimie Organique', 'Introduction aux composés organiques et leurs réactions.', 0, 3),
(6, 'Big Data', 'data', 0, 2),
(7, 'Base de donne', 'sql ', 0, 2),
(8, 'Data mining', 'data', 0, 2),
(9, 'IA', 'Inteligence Artifitiel', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `IdNote` int(11) NOT NULL,
  `idstudent` int(11) NOT NULL,
  `IdCours` int(11) NOT NULL,
  `TypeNote` enum('Devoir','Examen','TP','Projet') NOT NULL,
  `Valeur` float DEFAULT NULL,
  `Coefficient` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`IdNote`, `idstudent`, `IdCours`, `TypeNote`, `Valeur`, `Coefficient`) VALUES
(31, 1, 1, 'TP', 18, 1),
(33, 1, 1, 'TP', 18, 1),
(34, 0, 1, 'TP', 16, 1),
(36, 1, 1, 'TP', 18, 1),
(37, 0, 1, 'TP', 16, 1),
(38, 17, 1, 'TP', 15, 1),
(39, 1, 1, 'TP', 18, 1),
(40, 0, 1, 'TP', 16, 1),
(41, 17, 1, 'TP', 15, 1),
(42, 1, 1, 'TP', 18, 1),
(43, 0, 1, 'TP', 16, 1),
(44, 17, 1, 'TP', 15, 1),
(45, 1, 1, 'TP', 18, 1),
(46, 0, 1, 'TP', 16, 1),
(47, 17, 1, 'TP', 15, 1),
(48, 1, 1, 'TP', 18, 1),
(49, 0, 1, 'TP', 16, 1),
(50, 17, 1, 'TP', 15, 1),
(51, 1, 1, 'TP', 18, 1),
(52, 0, 1, 'TP', 16, 1),
(53, 17, 1, 'TP', 15, 1),
(54, 1, 1, 'TP', 18, 1),
(55, 0, 1, 'TP', 16, 1),
(56, 17, 1, 'TP', 15, 1),
(57, 1, 1, 'TP', 18, 1),
(66, 1, 4, 'Examen', 14, 1),
(67, 0, 4, 'TP', 16, 1),
(68, 17, 4, 'Examen', 15, 1),
(69, 1, 4, 'Examen', 17, 1),
(70, 0, 4, 'TP', 16, 1),
(71, 17, 4, 'Examen', 15, 1),
(72, 1, 4, 'Examen', 17, 1),
(73, 0, 4, 'TP', 16, 1),
(74, 17, 4, 'Examen', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `IdNotification` int(11) NOT NULL,
  `Message` text NOT NULL,
  `DateNotification` datetime NOT NULL,
  `idclass` int(255) NOT NULL,
  `Archive` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`IdNotification`, `Message`, `DateNotification`, `idclass`, `Archive`) VALUES
(1, 'hello world ', '2024-05-25 11:28:09', 1, '0'),
(2, 'N\'oubliez pas la réunion de ce soir à 18h.', '2024-05-30 07:27:02', 1, '0'),
(3, 'Votre facture mensuelle est désormais disponible.', '2024-05-30 07:27:02', 1, '0'),
(5, 'Votre facture mensuelle est désormais disponible.', '2024-05-30 07:27:02', 1, '0'),
(8, 'test', '2024-05-30 17:27:18', 3, '1'),
(9, 'test', '2024-05-30 17:28:07', 3, '1'),
(13, 'test', '2024-05-30 18:30:29', 3, '1'),
(35, 'ijpoddo', '2024-06-01 20:22:57', 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Filiere` enum('CP1','CP2','TDIA1','TDIA2','TDIA3','GI1','GI2','GI3','ID1','ID2','ID3','GC1','GC2','GC3') NOT NULL,
  `date` datetime NOT NULL,
  `idclasse` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `cne` varchar(10) DEFAULT NULL,
  `cin` varchar(255) DEFAULT NULL,
  `loged_by_month` int(255) NOT NULL DEFAULT 0,
  `telephone` varchar(255) DEFAULT '0',
  `reset_token` varchar(255) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `Filiere`, `date`, `idclasse`, `password`, `image`, `cne`, `cin`, `loged_by_month`, `telephone`, `reset_token`, `token_expiry`) VALUES
(0, 'Ayoub', 'Gorry', 'ayoub.gorry@etu.com', 'CP1', '2024-05-20 18:54:31', 1, '$2y$10$I8Dz9whRRsWUKQLoBfkqFOyxIXzvQRcdChraaySt.LZu7m0mXZxfy', '/uploads/img/students/ayoub.jpeg', 'N120064384', 'CD920333', 0, '0643385718', NULL, NULL),
(1, 'Anass', 'Chhita', 'khalid.chhita@etu.com', 'CP1', '2024-05-12 11:14:36', 2, '$2y$10$YqZwLRlcgOigCZ/VbAVvUuONNZHD8.Wd8HgIViDvDvThaicuvbJw.', '/uploads/img/students/profile.png', NULL, NULL, 0, '', NULL, NULL),
(17, 'Youssef', 'youssef', 'youssefelkahlaoui18@gmail.com', 'CP1', '2024-05-09 17:34:27', 2, '$2y$10$j2H8asDWXe0SELTjxDOzEOEWPRV1W9Vx.hWIHHiVx.O1Ti6wTHecG', '/uploads/img/students/profile.png', NULL, NULL, 0, '', NULL, NULL),
(18, 'y', 'y', 'you@you.com', 'CP1', '2024-05-11 17:29:37', 1, '$2y$10$Y.LKXFineNBJshi6GnWBne1IunTfyAqZThk3C2Mn2vM07kqrc3HH2', '/uploads/img/students/profile.png', NULL, NULL, 0, '', NULL, NULL),
(19, 'y', 'y', 'you@you.com', 'CP1', '2024-05-11 17:29:37', 1, '$2y$10$LS48UIixUES9Z49lZCQr0eZu6KjbxCq0h.SY7aXW96J.3b1Qeiyky', '/uploads/img/students/profile.png', NULL, NULL, 0, '', NULL, NULL),
(20, 'hihi', 'hoha', 'anass.essafi@etu.com', 'CP1', '2024-05-12 11:13:16', 3, '$2y$10$Dku.IZa0ZCINNIMb3e0WquiPteV13LskJhKfZGLHEjVjpK.ODh09i', '/uploads/img/students/profile.png', NULL, NULL, 0, '', NULL, NULL),
(21, 'hihi', 'hoha', 'ohoash@akha.com', 'CP1', '2024-05-12 11:13:16', 1, '$2y$10$Dku.IZa0ZCINNIMb3e0WquiPteV13LskJhKfZGLHEjVjpK.ODh09i', '/uploads/img/students/profile.png', NULL, NULL, 0, '', NULL, NULL),
(35, 'etu', 'etu', 'etu.etu@etu.com', 'CP1', '2024-05-20 18:54:31', 2, '$2y$10$I8Dz9whRRsWUKQLoBfkqFOyxIXzvQRcdChraaySt.LZu7m0mXZxfy', '/uploads/img/students/profile.png', NULL, NULL, 0, '', NULL, NULL),
(36, 'anas', 'essafi', 'essafianas68@gmail.com', 'TDIA1', '2024-05-31 21:27:54', 1, '$2y$10$uiBnCmmgbw7eFxHY7WKM/OIl66Vw0/XwCwpeOtcYgEXNVBEegy.fO', 'default.jpg', 'H', 'A', 0, '777', 'e395d0a770569bc973a480f6c9cc7d42', '2024-06-01 21:27:55'),
(37, 'anas', 'essafi', 'youssefelkahlaoui18@gmail.com', 'CP1', '2024-05-31 21:27:55', 3, '$2y$10$2DdUGHsPgY4L08B4qEmVTOEFLgd8NSeIl.Qm28im43GGYOyWOlqZK', 'default.jpg', 'n', 'p', 0, '8888', NULL, NULL),
(38, 'anas', 'essafi', 'essafianas68@gmail.com', 'TDIA1', '2024-06-01 07:05:00', 1, '$2y$10$1YFxrac0fVQs1Dhus.wN2uCbakzHMZz.03pmlLAwPdFlTE78maV7W', '/uploads/img/students/profile.png', 'H', 'A', 0, '777', NULL, NULL),
(39, 'anas', 'essafi', 'youssefelkahlaoui18@gmail.com', 'CP1', '2024-06-01 07:05:00', 3, '$2y$10$VZzhwNcUJYG/tTMeRaBNVuMjkCibEGN3TPpdfnXUpG3Th169pU1S2', '/uploads/img/students/profile.png', 'n', 'p', 0, '8888', '99fc806bd76b1d710c9d92b6df20d245', '2024-06-02 07:05:02'),
(40, 'anas', 'essafi', 'essafianas68@gmail.com', 'TDIA1', '2024-06-01 08:51:10', 1, '$2y$10$fJ2WSMklwktz1lIpNQKj8e6Q3Vo5/m8Ew5nw3Bqt3ENPl1iJKvyu2', '/uploads/img/students/profile.png', 'H', 'A', 0, '777', 'a7ab29ab5a2411627b3171ff7bdaf4dd', '2024-06-02 08:51:11'),
(41, 'anas', 'essafi', 'youssefelkahlaoui18@gmail.com', 'CP1', '2024-06-01 08:51:10', 3, '$2y$10$XJP2.mePEn23O1Hkk9ZqZez4C.xI0MmkbuNJ6RzKIkjziMUIcyuvG', '/uploads/img/students/profile.png', 'n', 'p', 0, '8888', 'f382c71c21f3ca86d8035719d008939c', '2024-06-02 08:51:12'),
(42, 'anas', 'essafi', 'essafianas68@gmail.com', 'TDIA1', '2024-06-01 09:39:36', 1, '$2y$10$4pZHOQeICISqUDEeJ6As0eeiiHLwO510PRQt8XXzafTCsU48Odw4K', '/uploads/img/students/profile.png', 'H', 'A', 0, '777', '0a0807597df9d838b3dbcd13dbce4c45', '2024-06-02 09:39:36'),
(43, 'ensah', 'ensah', 'youssefelkahlaoui19@gmail.com', 'ID2', '2024-06-01 09:40:43', 7, '$2y$10$/yLZhUecrZ92Wrw8b1uihOKIuhSMuUyvZTliWiaJNQQXtmu2URn.6', '/uploads/img/students/profile.png', 'n', 'p', 0, '8889', '130eea6f049995efec8dba803e07b7f7', '2024-06-02 09:40:43'),
(44, 'ensah', 'ensah', 'youssef.etu@etu.com', 'ID2', '2024-06-01 09:42:42', 7, '$2y$10$IeRe.yjjm5KxYciJbjCEwujRjI0gpoemC9lMA3KDhOR0K6NNtwe2u', '/uploads/img/students/profile.png', 'n', 'p', 0, '8889', NULL, NULL);

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
  `password` varchar(255) NOT NULL,
  `image` varchar(700) NOT NULL,
  `cin` varchar(10) DEFAULT NULL,
  `telephone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `firstname`, `lastname`, `email`, `date`, `password`, `image`, `cin`, `telephone`) VALUES
(0, 'youssef', 'elkahlaoui', 'youssef.prof@prof.com', '2024-05-18 11:45:56', '$2y$10$pNMXLEzaoqazhE7tom26QOleA6CFVU5nCIBE2FMlYxUGpK9EZEt0m', '/uploads/img/teachers/profile.png', NULL, '0672928222'),
(1, 'youssef', 'teacher', 'prof.prof@prof.com', '2024-05-18 11:43:28', '$2y$10$N22kdTRLajmNx.Vr7Uq3SeBZWhUoecCnMLWptzsSt6eGrjL1U6bDy', '/uploads/img/teachers/you2.png', 'NM00000', '0738398393');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_classes`
--

CREATE TABLE `teacher_classes` (
  `id_teacher` int(11) NOT NULL,
  `id_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_classes`
--

INSERT INTO `teacher_classes` (`id_teacher`, `id_class`) VALUES
(0, 1),
(0, 2),
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_modules`
--

CREATE TABLE `teacher_modules` (
  `teacher_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_modules`
--

INSERT INTO `teacher_modules` (`teacher_id`, `module_id`) VALUES
(0, 1),
(1, 3),
(1, 4),
(1, 8);

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
  ADD KEY `IdUtilisateur` (`IdStudent`),
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
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`IdClasse`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`IdCours`),
  ADD KEY `IdEnseignant` (`IdEnseignant`),
  ADD KEY `IdClasse` (`IdClasse`),
  ADD KEY `cours_ibfk_3` (`IdModule`);

--
-- Indexes for table `demands`
--
ALTER TABLE `demands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `devoirs`
--
ALTER TABLE `devoirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `emploi`
--
ALTER TABLE `emploi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idclasse` (`id`),
  ADD KEY `idclass` (`idclass`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`IdCours`),
  ADD KEY `IdEnseignant` (`IdEnseignant`),
  ADD KEY `IdClasse` (`IdClasse`),
  ADD KEY `idx_IdEnseignant` (`IdEnseignant`),
  ADD KEY `idx_IdClasse` (`IdClasse`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`IdNote`),
  ADD KEY `IdUtilisateur` (`idstudent`),
  ADD KEY `IdCours` (`IdCours`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`IdNotification`),
  ADD KEY `idclass` (`idclass`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `date` (`date`),
  ADD KEY `email` (`email`),
  ADD KEY `idclasse` (`idclasse`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `date` (`date`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `teacher_classes`
--
ALTER TABLE `teacher_classes`
  ADD PRIMARY KEY (`id_teacher`,`id_class`),
  ADD KEY `id_class` (`id_class`);

--
-- Indexes for table `teacher_modules`
--
ALTER TABLE `teacher_modules`
  ADD PRIMARY KEY (`teacher_id`,`module_id`),
  ADD KEY `module_id` (`module_id`);

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
  MODIFY `IdAbsence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `IdAnnonce` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `IdClasse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `IdCours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `demands`
--
ALTER TABLE `demands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `devoirs`
--
ALTER TABLE `devoirs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emploi`
--
ALTER TABLE `emploi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `IdCours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `IdNote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `IdNotification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absences`
--
ALTER TABLE `absences`
  ADD CONSTRAINT `absences_ibfk_1` FOREIGN KEY (`IdStudent`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `absences_ibfk_2` FOREIGN KEY (`IdCours`) REFERENCES `modules` (`IdCours`);

--
-- Constraints for table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`IdEnseignant`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`IdClasse`) REFERENCES `classes` (`IdClasse`),
  ADD CONSTRAINT `cours_ibfk_3` FOREIGN KEY (`IdModule`) REFERENCES `modules` (`IdCours`);

--
-- Constraints for table `demands`
--
ALTER TABLE `demands`
  ADD CONSTRAINT `demands_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `devoirs`
--
ALTER TABLE `devoirs`
  ADD CONSTRAINT `devoirs_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `devoirs_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `modules` (`IdCours`);

--
-- Constraints for table `emploi`
--
ALTER TABLE `emploi`
  ADD CONSTRAINT `emploi_ibfk_1` FOREIGN KEY (`idclass`) REFERENCES `classes` (`IdClasse`);

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`IdEnseignant`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `modules_ibfk_2` FOREIGN KEY (`IdClasse`) REFERENCES `classes` (`IdClasse`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`idstudent`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`IdCours`) REFERENCES `modules` (`IdCours`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`idclass`) REFERENCES `classes` (`IdClasse`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`idclasse`) REFERENCES `classes` (`IdClasse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_classes`
--
ALTER TABLE `teacher_classes`
  ADD CONSTRAINT `teacher_classes_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `classes` (`IdClasse`),
  ADD CONSTRAINT `teacher_classes_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `teacher_modules`
--
ALTER TABLE `teacher_modules`
  ADD CONSTRAINT `teacher_modules_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_modules_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`IdCours`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
