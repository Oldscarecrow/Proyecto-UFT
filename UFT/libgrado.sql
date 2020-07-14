-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2020 at 05:45 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libgrado`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `usuario`, `clave`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `trabajos`
--

DROP TABLE IF EXISTS `trabajos`;
CREATE TABLE IF NOT EXISTS `trabajos` (
  `cota` varchar(20) NOT NULL COMMENT 'Cota de Trabajo',
  `titulo` varchar(255) NOT NULL COMMENT 'Titulo del trabajo',
  `autor` varchar(40) NOT NULL COMMENT 'Aurtor',
  `tutor` varchar(30) NOT NULL COMMENT 'Tutor',
  `biblioteca` varchar(20) NOT NULL COMMENT 'Ubicacion de Biblioteca',
  `npag` int(5) NOT NULL COMMENT 'N de Pag',
  `idioma` varchar(10) NOT NULL COMMENT 'Idioma del trbajo',
  `annp` int(4) NOT NULL COMMENT 'Año',
  `notas` int(3) NOT NULL COMMENT 'Nota del trabaajo',
  `nej` int(3) NOT NULL COMMENT 'N de ejemplar',
  `imgres` text NOT NULL COMMENT 'imagen resumen',
  PRIMARY KEY (`cota`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trabajos`
--

INSERT INTO `trabajos` (`cota`, `titulo`, `autor`, `tutor`, `biblioteca`, `npag`, `idioma`, `annp`, `notas`, `nej`, `imgres`) VALUES
('N41/R365', 'ESTUDIO DE LA TECNOLOGÍA LI-FI APLICADA EN EL SECTOR AERONAUTICO PARA PERMITIR CONEXIÓN \r\nA INTERNET EN EL INTERIOR DE LAS AERONAVES COMERCIALES', 'Adelis Mejia', ' Emily Puentes', 'Cabudare', 58, 'Español', 2019, 89, 1, 'TDGAdelisMejiaCorreguida.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `visitantes`
--

DROP TABLE IF EXISTS `visitantes`;
CREATE TABLE IF NOT EXISTS `visitantes` (
  `CI` varchar(9) NOT NULL COMMENT 'Cedula',
  `Nomyape` varchar(30) NOT NULL COMMENT 'Nombre y apellido',
  `Dvisit` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6) COMMENT 'Fecha de Visita',
  PRIMARY KEY (`CI`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitantes`
--

INSERT INTO `visitantes` (`CI`, `Nomyape`, `Dvisit`) VALUES
('21275419', 'Herbert Rujana', '2019-11-12 15:29:04.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trabajos`
--
ALTER TABLE `trabajos` ADD FULLTEXT KEY `titulo` (`titulo`,`autor`,`tutor`);
ALTER TABLE `trabajos` ADD FULLTEXT KEY `titulo_2` (`titulo`);
ALTER TABLE `trabajos` ADD FULLTEXT KEY `autor` (`autor`);
ALTER TABLE `trabajos` ADD FULLTEXT KEY `tutor` (`tutor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
