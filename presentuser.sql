-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2020 at 04:13 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presentuser`
--

-- --------------------------------------------------------

--
-- Table structure for table `lenda`
--

CREATE TABLE `lenda` (
  `IdLenda` int(10) NOT NULL,
  `Pershkrimi` varchar(100) NOT NULL,
  `DataFillimit` date NOT NULL,
  `DataMbarimit` date NOT NULL,
  `IdMesues` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lenda`
--

INSERT INTO `lenda` (`IdLenda`, `Pershkrimi`, `DataFillimit`, `DataMbarimit`, `IdMesues`) VALUES
(1, 'Cyber Security', '2020-01-06', '2020-01-10', 1),
(2, 'CyberAttacks', '2020-01-13', '2020-01-17', 1),
(3, 'Software Engineering', '2020-01-06', '2020-02-07', 1),
(4, 'Database', '2020-01-01', '2020-01-17', 1),
(5, 'Web Programming', '2019-11-18', '2020-03-06', 1),
(6, 'Operating Systems', '2020-01-06', '2020-01-10', 1),
(8, 'C++', '2019-12-02', '2020-01-17', 1),
(9, 'Computer Networks', '2019-10-14', '2020-01-10', 1),
(10, 'English', '2019-12-09', '2019-12-14', 1),
(11, 'Maths', '2020-01-13', '2020-01-30', 1),
(12, 'Science', '2019-10-21', '2020-06-19', 1),
(13, 'Religion', '2020-01-06', '2020-01-18', 1),
(14, 'Nolur', '2020-01-08', '2020-01-26', 1),
(15, 'Chemistry', '2019-11-04', '2020-03-20', 1),
(16, 'Physics', '2019-11-04', '2020-01-11', 1),
(17, 'Geography', '2019-09-16', '2020-06-12', 3),
(18, 'Elementet e Informatikes', '2019-11-04', '2020-01-11', 2),
(19, 'Physics Education', '2019-06-10', '2019-09-20', 4),
(20, 'Komunikim Inxhinierik', '2019-11-04', '2020-01-10', 2),
(21, 'Biology', '2020-01-06', '2020-01-17', 1),
(22, 'Operating Systems', '2019-11-04', '2020-01-18', 5),
(23, 'Distributed Systems', '2020-03-09', '2020-06-20', 5),
(24, '', '0000-00-00', '0000-00-00', 1),
(25, 'History', '2020-01-13', '2020-02-09', 1),
(26, 'Fizike', '2020-01-06', '2020-01-18', 2),
(27, 'Letersi', '2020-01-06', '2020-01-18', 1),
(28, 'Biology', '2020-02-03', '2020-02-15', 4),
(29, 'Physic Edu', '2020-02-04', '2020-06-13', 1),
(30, 'Web Design', '2019-12-02', '2020-02-06', 1),
(32, 'Matematike', '2019-09-16', '2020-06-12', 9),
(33, 'Fizike', '2019-11-18', '2020-03-20', 9);

-- --------------------------------------------------------

--
-- Table structure for table `mesues`
--

CREATE TABLE `mesues` (
  `ID` int(20) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mesues`
--

INSERT INTO `mesues` (`ID`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Eranda', 'Kurtulaj', 'erandakurtulaj@hotmail.com', 'Eranda123'),
(2, 'Desara', 'Kurtulaj', 'desarakurtulaj@hotmail.com', 'Desara123'),
(3, 'Ajsela', 'Kurtulaj', 'ajselakurtulaj@gmail.com', 'Ajsela123'),
(4, 'Eni', 'Çoku', 'eni@gmail.com', 'Enisi123'),
(5, 'Besmir', 'Kurti', 'besi_kurti@gmail.com', 'Besmir123'),
(6, 'Egzon', 'Kurtulaj', 'egzon13@hotmail.com', 'Egzoni123'),
(7, 'Entela', 'Zaraj', 'entela@gmail.com', 'Entela123'),
(9, 'Fejzi', 'Luli', 'fejziluli@gmail.com', 'Fejzi123');

-- --------------------------------------------------------

--
-- Table structure for table `seance`
--

CREATE TABLE `seance` (
  `IdSeance` int(10) NOT NULL,
  `Data` date NOT NULL,
  `Tipi` varchar(20) NOT NULL,
  `Present` tinyint(1) NOT NULL,
  `IdStudent` int(10) NOT NULL,
  `IdLende` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seance`
--

INSERT INTO `seance` (`IdSeance`, `Data`, `Tipi`, `Present`, `IdStudent`, `IdLende`) VALUES
(1, '2020-02-05', 'S', 0, 1, 1),
(2, '2020-02-05', 'L', 0, 1, 1),
(3, '2020-02-05', 'L', 1, 2, 1),
(5, '2020-02-04', 'S', 1, 10, 1),
(6, '2020-02-06', 'Select a type', 0, 1, 1),
(7, '2020-02-05', 'Select a type', 1, 1, 1),
(8, '2020-02-03', 'S', 0, 6, 1),
(9, '2020-02-05', 'S', 0, 19, 4),
(10, '2020-02-04', 'S', 1, 1, 4),
(11, '2020-02-04', 'S', 1, 1, 6),
(12, '2020-02-05', 'S', 0, 1, 6),
(13, '2020-02-04', 'S', 0, 1, 6),
(14, '2020-02-04', 'FP', 0, 1, 6),
(15, '2020-02-04', 'L', 1, 1, 6),
(16, '2020-02-04', 'L', 0, 1, 6),
(17, '2020-02-04', 'L', 1, 1, 6),
(18, '2020-02-04', 'S', 0, 1, 6),
(19, '2020-01-28', 'S', 1, 1, 6),
(20, '2020-02-05', 'L', 1, 1, 6),
(21, '2020-01-31', 'S', 0, 2, 5),
(22, '2020-01-31', 'L', 1, 2, 5),
(23, '2020-01-31', 'FP', 1, 2, 5),
(24, '2020-01-24', 'S', 0, 2, 5),
(25, '2020-02-05', 'S', 1, 12, 19),
(26, '2020-02-03', 'S', 1, 1, 1),
(27, '2020-01-13', 'S', 0, 1, 1),
(28, '2020-01-14', 'S', 0, 1, 1),
(29, '2020-02-10', 'S', 0, 2, 1),
(30, '2020-01-15', 'S', 0, 2, 1),
(31, '2020-02-03', 'S', 0, 10, 1),
(32, '2020-02-05', 'S', 0, 10, 1),
(33, '2020-01-28', 'L', 0, 10, 1),
(34, '2020-01-28', 'S', 0, 10, 1),
(35, '2020-02-04', 'S', 1, 20, 1),
(36, '2020-02-03', 'S', 0, 20, 1),
(37, '2020-02-05', 'S', 0, 21, 1),
(39, '2020-02-04', 'S', 1, 23, 3),
(40, '2020-02-04', 'L', 0, 23, 3),
(41, '2020-02-05', 'FP', 0, 23, 3),
(42, '2020-02-05', 'S', 0, 23, 3),
(43, '2020-01-29', 'S', 0, 23, 3),
(44, '2020-02-05', 'L', 0, 23, 3),
(45, '2020-02-07', 'S', 0, 7, 18),
(46, '2020-02-01', 'L', 0, 7, 18),
(47, '2020-01-27', 'L', 0, 20, 1),
(48, '2020-01-28', 'FP', 0, 20, 1),
(49, '2020-01-29', 'S', 0, 20, 1),
(50, '2020-01-06', 'S', 0, 20, 1),
(51, '2020-02-11', 'S', 0, 19, 4),
(52, '2020-01-28', 'L', 0, 19, 4),
(53, '2019-12-31', 'S', 0, 1, 4),
(54, '2020-01-27', 'FP', 0, 1, 1),
(60, '2020-02-03', 'S', 1, 29, 32),
(61, '2020-02-04', 'S', 0, 30, 32),
(62, '2020-02-03', 'S', 0, 25, 32),
(63, '2020-02-04', 'S', 0, 25, 32),
(64, '2020-02-05', 'S', 0, 25, 32),
(65, '2020-02-03', 'L', 0, 25, 32),
(66, '2020-02-03', 'FP', 0, 25, 32),
(67, '2020-01-29', 'S', 0, 25, 32),
(68, '2020-01-30', 'S', 0, 25, 32),
(69, '2020-01-06', 'L', 0, 25, 32),
(70, '2019-12-31', 'S', 0, 25, 32),
(71, '2020-01-20', 'S', 0, 25, 32),
(72, '2019-12-16', 'S', 0, 25, 32),
(73, '2019-12-17', 'S', 0, 25, 32),
(74, '2020-01-27', 'S', 0, 25, 32),
(75, '2020-01-15', 'S', 0, 25, 32),
(76, '2019-11-19', 'S', 0, 25, 32),
(77, '2020-02-03', 'S', 0, 25, 33),
(78, '2020-02-04', 'S', 0, 25, 33),
(79, '2020-02-05', 'L', 0, 25, 33),
(80, '2020-01-27', 'FP', 0, 25, 33),
(81, '2020-02-10', 'S', 0, 29, 32),
(82, '2020-02-03', 'L', 0, 29, 32),
(83, '2020-01-27', 'FP', 0, 29, 32),
(84, '2020-02-03', 'S', 0, 8, 22),
(85, '2020-02-03', 'S', 0, 33, 22),
(86, '2020-02-03', 'S', 0, 34, 22),
(87, '2020-02-03', 'L', 1, 8, 22),
(88, '2020-02-03', 'FP', 0, 8, 22),
(89, '2020-02-03', 'L', 0, 33, 22),
(90, '2020-02-03', 'L', 0, 34, 22),
(91, '2020-02-05', 'S', 0, 33, 22),
(92, '2020-02-05', 'S', 0, 34, 22),
(93, '2020-02-05', 'L', 0, 8, 22),
(94, '2020-02-03', 'S', 0, 8, 23),
(95, '2020-02-07', 'L', 0, 8, 23),
(96, '2020-01-13', 'S', 0, 8, 22),
(97, '2020-01-13', 'L', 0, 8, 22),
(98, '2020-01-29', 'L', 0, 33, 22);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `IdStudent` int(15) NOT NULL,
  `Emri` varchar(100) NOT NULL,
  `Mbiemri` varchar(100) NOT NULL,
  `Klasa` varchar(20) NOT NULL,
  `Fjalekalimi` varchar(50) NOT NULL,
  `IdMesues` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`IdStudent`, `Emri`, `Mbiemri`, `Klasa`, `Fjalekalimi`, `IdMesues`) VALUES
(1, 'Era', 'Kurt', 'C', 'Eranda123', 1),
(2, 'Sara', 'Kurt', 'D', 'Desara123', 1),
(3, 'Alesja', 'Todaj', 'B', 'Alesja123', 1),
(4, 'Alesja', 'Todaj', 'B', 'Alesja123', 1),
(5, 'Sara', 'Kurt', 'D', 'Desara123', 1),
(6, 'Ajsela', 'Kurt', 'A', 'Ajsela123', 1),
(7, 'Era', 'Kurt', 'C', 'Eranda123', 2),
(8, 'Era', 'Kurt', 'C', 'Eranda123', 5),
(9, 'Ana', 'Çokaj', 'B', 'Anaana123', 1),
(10, 'Hera', 'Kurt', 'C', 'Heranda123', 1),
(11, 'Besa', 'Salimusaj', 'C', 'Besalimusaj123', 1),
(12, 'Era', 'Kurtulaj', 'C', 'Eranda123', 4),
(13, 'Era', 'Kurt', 'C', 'Eranda123', 4),
(14, 'Sara', 'Kurt', 'D', 'Desara123', 2),
(15, 'Sara', 'Dokaj', 'C', 'Sarasara123', 1),
(16, 'Besa', 'Salimusaj', 'C', 'Besabesa123', 2),
(17, 'Enkela', 'Bregu', 'C', 'Enkela123', 1),
(19, 'Sara', 'Kurtulaj', 'D', 'Desara123', 1),
(20, 'Anxhela', 'Todaj', 'A', 'Anxhela123', 1),
(21, 'Lia', 'Kurt', 'A', 'Lirije123', 1),
(22, 'Egzon', 'Kurtulaj', 'B', 'Egzoni123', 1),
(23, 'Eranda', 'Kurtulaj', 'C', 'Eranda123', 1),
(25, 'Abedin', 'Alihakaj', 'D', 'Abedin123', 9),
(26, 'Aurora', 'Zekaj', 'E', 'Aurora123', 9),
(27, 'Bleona', 'Kurti', 'D', 'Bleona123', 9),
(28, 'Briselda', 'Manaj', 'D', 'Briselda123', 9),
(29, 'Brendon', 'Semaj', 'D', 'Brendon123', 9),
(30, 'Doriana', 'Manaj', 'D', 'Doriana123', 9),
(31, 'Eranda', 'Kurtulaj', 'D', 'Eranda123', 9),
(32, 'Fatgzon', 'Zekaj', 'D', 'Fatgzon123', 9),
(33, 'Besa', 'Salimusaj', 'C', 'Besa123', 5),
(34, 'Sara', 'Dokaj', 'C', 'Sarasara123', 5);

-- --------------------------------------------------------

--
-- Table structure for table `studentlende`
--

CREATE TABLE `studentlende` (
  `IdStudent` int(11) NOT NULL,
  `IdLende` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentlende`
--

INSERT INTO `studentlende` (`IdStudent`, `IdLende`) VALUES
(1, 1),
(2, 1),
(1, 2),
(3, 2),
(4, 9),
(5, 9),
(1, 4),
(2, 5),
(6, 5),
(7, 18),
(7, 20),
(8, 22),
(8, 23),
(9, 16),
(10, 1),
(6, 1),
(6, 2),
(1, 25),
(11, 25),
(12, 19),
(13, 19),
(14, 20),
(7, 26),
(15, 27),
(15, 1),
(16, 18),
(17, 11),
(19, 4),
(3, 4),
(1, 6),
(20, 1),
(21, 1),
(23, 3),
(1, 30),
(1, 5),
(25, 32),
(26, 32),
(27, 32),
(28, 32),
(29, 32),
(30, 32),
(31, 32),
(32, 32),
(25, 33),
(33, 22),
(34, 22);

-- --------------------------------------------------------

--
-- Table structure for table `weekday`
--

CREATE TABLE `weekday` (
  `IdLenda` int(10) NOT NULL,
  `DitetJaves` varchar(20) NOT NULL,
  `IdDays` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weekday`
--

INSERT INTO `weekday` (`IdLenda`, `DitetJaves`, `IdDays`) VALUES
(1, ' Monday ', 1),
(1, ' Tuesday ', 2),
(1, ' Wednsday ', 3),
(2, ' Monday ', 4),
(2, ' Tuesday ', 5),
(3, ' Tuesday ', 6),
(3, ' Wednsday ', 7),
(4, ' Tuesday ', 8),
(5, ' Friday ', 9),
(6, ' Tuesday ', 11),
(6, ' Wednsday ', 12),
(8, ' Monday ', 14),
(8, ' Friday ', 15),
(1, ' Wednsday ', 17),
(14, ' Monday ', 20),
(14, ' Friday ', 21),
(15, ' Monday ', 22),
(15, ' Tuesday ', 23),
(15, ' Wednsday ', 24),
(15, ' Friday ', 25),
(16, ' Monday ', 26),
(16, ' Wednsday ', 27),
(17, ' Monday ', 28),
(17, ' Tuesday ', 29),
(17, ' Wednsday ', 30),
(18, ' Friday ', 31),
(18, ' Saturday ', 32),
(19, ' Monday ', 33),
(19, ' Tuesday ', 34),
(19, ' Wednsday ', 35),
(19, ' Thursday ', 36),
(19, ' Friday ', 37),
(19, ' Saturday ', 38),
(20, ' Monday ', 39),
(20, ' Tuesday ', 40),
(21, ' Monday ', 41),
(21, ' Wednsday ', 42),
(22, ' Monday ', 43),
(22, ' Wednsday ', 44),
(23, ' Monday ', 45),
(23, ' Friday ', 46),
(25, ' Monday ', 47),
(25, ' Tuesday ', 48),
(26, ' Monday ', 49),
(26, ' Wednsday ', 50),
(27, ' Monday ', 51),
(27, ' Wednsday ', 52),
(28, ' Monday ', 53),
(28, ' Wednsday ', 54),
(29, ' Monday ', 55),
(29, ' Tuesday ', 56),
(29, ' Wednsday ', 57),
(29, ' Thursday ', 58),
(29, ' Friday ', 59),
(29, ' Saturday ', 60),
(29, ' Sunday ', 61),
(30, ' Thursday ', 62),
(30, ' Friday ', 63),
(32, ' Monday ', 66),
(32, ' Tuesday ', 67),
(32, ' Wednsday ', 68),
(32, ' Thursday ', 69),
(33, ' Monday ', 70),
(33, ' Tuesday ', 71),
(33, ' Wednsday ', 72);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lenda`
--
ALTER TABLE `lenda`
  ADD PRIMARY KEY (`IdLenda`),
  ADD KEY `IdMesues` (`IdMesues`);

--
-- Indexes for table `mesues`
--
ALTER TABLE `mesues`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`IdSeance`),
  ADD KEY `IdStudent` (`IdStudent`),
  ADD KEY `IdLende` (`IdLende`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`IdStudent`),
  ADD KEY `IdMesues` (`IdMesues`);

--
-- Indexes for table `studentlende`
--
ALTER TABLE `studentlende`
  ADD KEY `IdStudent` (`IdStudent`),
  ADD KEY `IdLende` (`IdLende`);

--
-- Indexes for table `weekday`
--
ALTER TABLE `weekday`
  ADD PRIMARY KEY (`IdDays`),
  ADD KEY `IdLenda` (`IdLenda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lenda`
--
ALTER TABLE `lenda`
  MODIFY `IdLenda` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `mesues`
--
ALTER TABLE `mesues`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seance`
--
ALTER TABLE `seance`
  MODIFY `IdSeance` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `IdStudent` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `weekday`
--
ALTER TABLE `weekday`
  MODIFY `IdDays` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lenda`
--
ALTER TABLE `lenda`
  ADD CONSTRAINT `lenda_ibfk_1` FOREIGN KEY (`IdMesues`) REFERENCES `mesues` (`ID`);

--
-- Constraints for table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`IdStudent`) REFERENCES `student` (`IdStudent`),
  ADD CONSTRAINT `seance_ibfk_2` FOREIGN KEY (`IdLende`) REFERENCES `lenda` (`IdLenda`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`IdMesues`) REFERENCES `mesues` (`ID`);

--
-- Constraints for table `studentlende`
--
ALTER TABLE `studentlende`
  ADD CONSTRAINT `studentlende_ibfk_1` FOREIGN KEY (`IdStudent`) REFERENCES `student` (`IdStudent`),
  ADD CONSTRAINT `studentlende_ibfk_2` FOREIGN KEY (`IdLende`) REFERENCES `lenda` (`IdLenda`);

--
-- Constraints for table `weekday`
--
ALTER TABLE `weekday`
  ADD CONSTRAINT `weekday_ibfk_1` FOREIGN KEY (`IdLenda`) REFERENCES `lenda` (`IdLenda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
