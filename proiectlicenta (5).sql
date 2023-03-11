-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 09:15 PM
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
-- Database: `proiectlicenta`
--

-- --------------------------------------------------------

--
-- Table structure for table `examene`
--

CREATE TABLE `examene` (
  `id` int(11) NOT NULL,
  `materieID` int(11) NOT NULL,
  `specID` int(11) NOT NULL,
  `profID` int(11) NOT NULL,
  `an` int(11) NOT NULL,
  `grupa` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `oraIncepere` varchar(10) NOT NULL,
  `oraFinal` varchar(10) NOT NULL,
  `sala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examene`
--

INSERT INTO `examene` (`id`, `materieID`, `specID`, `profID`, `an`, `grupa`, `data`, `oraIncepere`, `oraFinal`, `sala`) VALUES
(35, 3, 1, 4, 2, '4LF411', '2023-01-16', '08:00', '10:00', 'VIV7'),
(41, 15, 2, 4, 2, '4LF311', '2023-01-17', '08:00', '10:00', 'VIV7'),
(43, 17, 1, 4, 2, '4LF412', '2023-01-26', '12:00', '14:00', 'VIV7'),
(44, 21, 1, 6, 4, '4LF491', '2023-01-19', '08:00', '10:00', 'VI1'),
(45, 22, 1, 7, 4, '4LF491', '2023-01-22', '12:00', '14:00', 'VIV7'),
(46, 23, 1, 8, 4, '4LF491', '2023-01-24', '14:00', '16:00', 'VIV7'),
(47, 24, 1, 9, 4, '4LF491', '2023-01-27', '08:00', '10:00', 'VIV7'),
(48, 25, 1, 10, 4, '4LF491', '2023-01-30', '14:00', '16:00', 'VIII12'),
(49, 26, 1, 11, 4, '4LF491', '2023-01-31', '10:00', '12:00', 'VI1'),
(50, 27, 1, 11, 4, '4LF491', '2023-02-03', '10:00', '12:00', 'VI1'),
(51, 3, 1, 4, 2, '4LF412', '2023-01-19', '08:00', '10:00', 'VIV7'),
(52, 17, 1, 4, 2, '4LF413', '2023-01-16', '14:00', '16:00', 'VIV7');

-- --------------------------------------------------------

--
-- Table structure for table `grupe`
--

CREATE TABLE `grupe` (
  `id` int(255) NOT NULL,
  `numeGrupa` varchar(255) NOT NULL,
  `specID` int(255) NOT NULL,
  `an` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grupe`
--

INSERT INTO `grupe` (`id`, `numeGrupa`, `specID`, `an`) VALUES
(17, '4LF491', 2, 1),
(18, '4LF121', 3, 1),
(19, '4LF122', 3, 1),
(20, '4LF111', 3, 2),
(21, '4LF112', 3, 2),
(22, '4LF101', 3, 3),
(23, '4LF102', 3, 3),
(24, '4LF191', 3, 4),
(25, '4LF521', 4, 1),
(26, '4LF522', 4, 1),
(27, '4LF511', 4, 2),
(28, '4LF512', 4, 2),
(29, '4LF501', 4, 3),
(30, '4LF591', 4, 4),
(31, '4LF592', 4, 4),
(32, '4LF621', 6, 1),
(35, '4LF624', 6, 1),
(36, '4LF611', 6, 2),
(37, '4LF612', 6, 2),
(38, '4LF613', 6, 2),
(39, '4LF601', 6, 3),
(40, '4LF602', 6, 3),
(41, '4LF691', 6, 4),
(42, '4LF692', 6, 4),
(43, '4LF201', 5, 3),
(44, '4LF291', 5, 4),
(45, '4LF721', 7, 1),
(46, '4LF722', 7, 1),
(47, '4LF711', 7, 2),
(48, '4LF712', 7, 2),
(49, '4LF701', 7, 3),
(50, '4LF702', 7, 3),
(51, '4LF791', 7, 4),
(52, '4LF792', 7, 4),
(53, '4LF322', 2, 1),
(54, '4LF311', 2, 2),
(55, '4LF312', 2, 2),
(56, '4LF301', 2, 3),
(57, '4LF302', 2, 3),
(58, '4LF391', 2, 4),
(59, '4LF392', 2, 4),
(73, '4LF821', 8, 1),
(74, '4LF822', 8, 1),
(75, '4LF823', 8, 1),
(76, '4LF811', 8, 2),
(77, '4LF801', 8, 3),
(78, '4LF891', 8, 4),
(105, '4LF422', 1, 1),
(107, '4LF421', 1, 1),
(109, '4LF423', 1, 1),
(110, '4LF424', 1, 1),
(112, '4LF411', 1, 2),
(113, '4LF412', 1, 2),
(114, '4LF413', 1, 2),
(115, '4LF401', 1, 3),
(116, '4LF402', 1, 3),
(117, '4LF403', 1, 3),
(118, '4LF491', 1, 4),
(119, '4LF492', 1, 4),
(120, '4LF493', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `materii`
--

CREATE TABLE `materii` (
  `id` int(255) NOT NULL,
  `Nume` varchar(255) NOT NULL,
  `specID` int(255) NOT NULL,
  `profesorID` int(255) NOT NULL,
  `an` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materii`
--

INSERT INTO `materii` (`id`, `Nume`, `specID`, `profesorID`, `an`) VALUES
(1, 'BD', 1, 3, 3),
(2, 'SAR', 1, 4, 4),
(3, 'TS1', 1, 4, 2),
(12, 'BD', 2, 3, 3),
(13, 'PD', 8, 3, 4),
(14, 'PD', 6, 3, 4),
(15, 'TS2', 1, 4, 2),
(16, 'TS2', 2, 4, 2),
(17, 'SAE', 1, 4, 2),
(18, 'SAE', 2, 4, 2),
(19, 'SAR', 2, 4, 4),
(20, 'TS1', 2, 4, 2),
(21, 'TO', 1, 6, 4),
(22, 'RC', 1, 7, 4),
(23, 'SVA', 1, 8, 4),
(24, 'CAE', 1, 9, 4),
(25, 'ISCA', 1, 10, 4),
(26, 'CPSOTR', 1, 11, 4),
(27, 'TIA', 1, 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `profesori`
--

CREATE TABLE `profesori` (
  `id` int(255) NOT NULL,
  `userID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profesori`
--

INSERT INTO `profesori` (`id`, `userID`) VALUES
(3, 2),
(4, 3),
(6, 9),
(7, 10),
(8, 11),
(9, 12),
(10, 13),
(11, 14);

-- --------------------------------------------------------

--
-- Table structure for table `specializari`
--

CREATE TABLE `specializari` (
  `id` int(255) NOT NULL,
  `NumeSpec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specializari`
--

INSERT INTO `specializari` (`id`, `NumeSpec`) VALUES
(1, 'AIA'),
(2, 'TI'),
(3, 'ET'),
(4, 'IEC'),
(5, 'EA'),
(6, 'TSTC'),
(7, 'CALC'),
(8, 'ROBO');

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
--

CREATE TABLE `studenti` (
  `id` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `specID` int(255) NOT NULL,
  `grupa` varchar(255) NOT NULL,
  `an` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studenti`
--

INSERT INTO `studenti` (`id`, `userID`, `specID`, `grupa`, `an`) VALUES
(3, 1, 1, '4LF491', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `functie` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nume`, `email`, `password`, `functie`) VALUES
(1, 'Uscoiu Rareș', 'rares.uscoiu@student.unitbv.ro', 'a6833092418bf610ed0ff8d2ba549f1a', 'student'),
(2, 'Perniu Liviu', 'liviu.perniu@unitbv.ro', 'e743b2d85f6dceb3adf48d770b8f3e30', 'profesor'),
(3, 'Coman Simona', 'simona.coman@unitbv.ro', '9b17d9dc83047da886bfc5f0b17d9acc', 'profesor'),
(4, 'Cristian Boldișor', 'cristian.boldisor@unitbv.ro', '4be4c19d19d699bd70949ca27d624065', 'profesor'),
(8, 'Cristina Chirilă', 'cristina.chirila@unitbv.ro', 'b4e306225f005b127590492875e98b95', 'secretar'),
(9, 'Vizitiu Anamaria', 'anamaria.vizitiu@unitbv.ro', 'dda94c776f74c15f231d54b70fcb05d8', 'profesor'),
(10, 'Demeter Robert', 'robert.demeter@unitbv.ro', 'c9642410f812604a66420ee61bdab6a2', 'profesor'),
(11, 'Grigorescu Sorin', 'sorin.grigorescu@unitbv.ro', '7eaadda36d3e788fc353e77b4b385465', 'profesor'),
(12, 'Diaconu Laurențiu', 'laurentiu.diaconu@unitbv.ro', '006841715bcaf82a3291d01767aa3d25', 'profesor'),
(13, 'Măceșanu Gigel', 'gigel.macesanu@unitbv.ro', '35b5b14c27ecdac9827078cf26927127', 'profesor'),
(14, 'Suciu Constantin', 'constantin.suciu@unitbv.ro', '7f790d2a280628e712c6a6ef0abb2aaf', 'profesor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examene`
--
ALTER TABLE `examene`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prof_fk` (`profID`),
  ADD KEY `spec_fk2` (`specID`),
  ADD KEY `materie_fk` (`materieID`);

--
-- Indexes for table `grupe`
--
ALTER TABLE `grupe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specID` (`specID`);

--
-- Indexes for table `materii`
--
ALTER TABLE `materii`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profesorID` (`profesorID`),
  ADD KEY `specID` (`specID`);

--
-- Indexes for table `profesori`
--
ALTER TABLE `profesori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk` (`userID`);

--
-- Indexes for table `specializari`
--
ALTER TABLE `specializari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`userID`),
  ADD KEY `specializare` (`specID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examene`
--
ALTER TABLE `examene`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `grupe`
--
ALTER TABLE `grupe`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `materii`
--
ALTER TABLE `materii`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `profesori`
--
ALTER TABLE `profesori`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `specializari`
--
ALTER TABLE `specializari`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `studenti`
--
ALTER TABLE `studenti`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `examene`
--
ALTER TABLE `examene`
  ADD CONSTRAINT `materie_fk` FOREIGN KEY (`materieID`) REFERENCES `materii` (`id`),
  ADD CONSTRAINT `prof_fk` FOREIGN KEY (`profID`) REFERENCES `profesori` (`id`),
  ADD CONSTRAINT `spec_fk2` FOREIGN KEY (`specID`) REFERENCES `specializari` (`id`);

--
-- Constraints for table `grupe`
--
ALTER TABLE `grupe`
  ADD CONSTRAINT `grupe_ibfk_1` FOREIGN KEY (`specID`) REFERENCES `specializari` (`id`);

--
-- Constraints for table `materii`
--
ALTER TABLE `materii`
  ADD CONSTRAINT `materii_ibfk_1` FOREIGN KEY (`profesorID`) REFERENCES `profesori` (`id`),
  ADD CONSTRAINT `materii_ibfk_2` FOREIGN KEY (`specID`) REFERENCES `specializari` (`id`);

--
-- Constraints for table `profesori`
--
ALTER TABLE `profesori`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `studenti`
--
ALTER TABLE `studenti`
  ADD CONSTRAINT `specializare` FOREIGN KEY (`specID`) REFERENCES `specializari` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
