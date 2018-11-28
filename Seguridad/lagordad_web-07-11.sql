-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-11-2018 a las 11:34:44
-- Versión del servidor: 5.6.41
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lagordad_web`
--
CREATE DATABASE IF NOT EXISTS `lagordad_web` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lagordad_web`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lottery`
--

CREATE TABLE `lottery` (
  `Id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lottery`
--

INSERT INTO `lottery` (`Id`, `name`, `status`) VALUES
(1, 'Landing La Gorda', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lottery_emails`
--

CREATE TABLE `lottery_emails` (
  `Id` int(11) NOT NULL,
  `id_lottery` int(11) NOT NULL,
  `nombre` varchar(85) NOT NULL,
  `email` varchar(90) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `winner` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lottery_emails`
--

INSERT INTO `lottery_emails` (`Id`, `id_lottery`, `nombre`, `email`, `ip`, `date_add`, `winner`) VALUES
(2, 1, 'Sandra', 'sandra.luengo@sitelicon.com', '31.4.177.11', '2018-10-04 22:00:00', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lottery`
--
ALTER TABLE `lottery`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `lottery_emails`
--
ALTER TABLE `lottery_emails`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lottery`
--
ALTER TABLE `lottery`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lottery_emails`
--
ALTER TABLE `lottery_emails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
