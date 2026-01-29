-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql100.infinityfree.com
-- Generation Time: Jan 29, 2026 at 05:50 PM
-- Server version: 11.4.9-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_40911606_mushgathan`
--

-- --------------------------------------------------------

--
-- Table structure for table `News`
--

CREATE TABLE `News` (
  `ID` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Text` varchar(5000) NOT NULL,
  `Media` char(1) NOT NULL,
  `Link` varchar(255) DEFAULT NULL,
  `Date` date NOT NULL,
  `Time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `News`
--

INSERT INTO `News` (`ID`, `Title`, `Text`, `Media`, `Link`, `Date`, `Time`) VALUES
(2, 'Welcome', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id leo ex. Sed dictum odio urna, nec tempus risus vehicula et. Curabitur orci justo, laoreet quis accumsan non, dignissim nec lorem. Morbi accumsan tincidunt risus, vel blandit velit mattis ultricies. Praesent vestibulum molestie lectus. Fusce quis augue lorem. Curabitur porttitor nec magna non aliquam. Nullam lobortis commodo tincidunt. Aenean pretium purus quis urna dapibus varius. Praesent in tortor eget est cursus auctor. Donec sollicitudin tempor viverra. Pellentesque venenatis felis ipsum, et faucibus elit pharetra eget. Curabitur commodo lorem eu odio vehicula, ac porta sapien sodales. In hac habitasse platea dictumst.\r\n\r\nPraesent vitae semper lorem, vel posuere tortor. Donec vel libero orci. Suspendisse vel quam vel purus tempus sollicitudin congue et odio. Cras ac nisi vel sem tempor pretium. Vestibulum quis elementum dolor, in elementum tellus. Praesent non purus tincidunt, ultricies enim quis, vulputate lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam efficitur eros mattis tellus elementum, vel euismod elit luctus.', 'N', NULL, '2026-01-15', NULL),
(3, 'New Simple', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id leo ex. Sed dictum odio urna, nec tempus risus vehicula et. Curabitur orci justo, laoreet quis accumsan non, dignissim nec lorem. Morbi accumsan tincidunt risus, vel blandit velit mattis ultricies. Praesent vestibulum molestie lectus. Fusce quis augue lorem. Curabitur porttitor nec magna non aliquam. Nullam lobortis commodo tincidunt. Aenean pretium purus quis urna dapibus varius. Praesent in tortor eget est cursus auctor. Donec sollicitudin tempor viverra. Pellentesque venenatis felis ipsum, et faucibus elit pharetra eget. Curabitur commodo lorem eu odio vehicula, ac porta sapien sodales. In hac habitasse platea dictumst.', 'V', 'https://www.youtube.com/embed/jX563YZGlwI?si=VS4oy0_6tFafK5dY', '2026-01-15', NULL),
(6, 'Album Cover', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id leo ex. Sed dictum odio urna, nec tempus risus vehicula et. Curabitur orci justo, laoreet quis accumsan non, dignissim nec lorem. Morbi accumsan tincidunt risus, vel blandit velit mattis ultricies. Praesent vestibulum molestie lectus. Fusce quis augue lorem. Curabitur porttitor nec magna non aliquam. Nullam lobortis commodo tincidunt. Aenean pretium purus quis urna dapibus varius. Praesent in tortor eget est cursus auctor. Donec sollicitudin tempor viverra. Pellentesque venenatis felis ipsum, et faucibus elit pharetra eget. Curabitur commodo lorem eu odio vehicula, ac porta sapien sodales. In hac habitasse platea dictumst.', 'P', NULL, '2026-01-29', '2026-01-29 17:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `Tour`
--

CREATE TABLE `Tour` (
  `ID` int(11) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Link` varchar(255) NOT NULL,
  `Place` varchar(30) NOT NULL,
  `Date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Tour`
--

INSERT INTO `Tour` (`ID`, `Address`, `Link`, `Place`, `Date`) VALUES
(1, 'Topolcany', 'https://mushgathan.infinityfree.me/index.php', 'RockHouse', '2026-01-24'),
(2, 'Banovce nad Bebravou', 'https://mushgathan.infinityfree.me/index.php', 'Ziva', '2026-02-07'),
(3, 'Banovce nad Bebravou', 'https://mushgathan.infinityfree.me/index.php', 'Skusobna', '2026-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(24) NOT NULL,
  `Email` varchar(24) NOT NULL,
  `Password` char(40) NOT NULL,
  `Date` date NOT NULL,
  `Picture` tinyint(4) NOT NULL DEFAULT 0,
  `Privilage` char(1) NOT NULL DEFAULT 'D'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `Username`, `Email`, `Password`, `Date`, `Picture`, `Privilage`) VALUES
(1, 'admin', 'arnoldpepek@gmail.com', 'c7315f106b89da7a4454426491def6eedf115e92', '2026-01-15', 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `Videos`
--

CREATE TABLE `Videos` (
  `ID` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Link` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Videos`
--

INSERT INTO `Videos` (`ID`, `Title`, `Link`) VALUES
(3, 'Disapprobation', 'https://www.youtube.com/embed/dRMIi3YkRx0?si=pgPX8TRw5kd9JhRo'),
(2, 'Simple', 'https://www.youtube.com/embed/atMsoVtbIRs?si=uu_SeR3T4zSg4_Se'),
(4, 'Low', 'https://www.youtube.com/embed/hIOOFk512cc?si=1W4MqHA_XQOwGeeI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Tour`
--
ALTER TABLE `Tour`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `Videos`
--
ALTER TABLE `Videos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `News`
--
ALTER TABLE `News`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Tour`
--
ALTER TABLE `Tour`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Videos`
--
ALTER TABLE `Videos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
