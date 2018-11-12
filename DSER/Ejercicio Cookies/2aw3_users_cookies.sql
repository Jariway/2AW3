-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2018 a las 09:29:26
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `2aw3_users_cookies`
--
CREATE DATABASE IF NOT EXISTS `2aw3_users_cookies` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `2aw3_users_cookies`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `spAddLog`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spAddLog` (IN `pidCookie` INT, IN `pLog` VARCHAR(250))  NO SQL
INSERT INTO log (log.id_cookie,log.log) VALUES (pidCookie,pLog)$$

DROP PROCEDURE IF EXISTS `spGetImageUrl`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetImageUrl` (IN `pKey` VARCHAR(255))  NO SQL
SELECT max(images.url) as url FROM IMAGES Where images.key LIKE CONCAT('%',pKey,'%')$$

DROP PROCEDURE IF EXISTS `spGetNewCookie`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetNewCookie` ()  NO SQL
BEGIN
	INSERT INTO cookies (idCookie) VALUES ('');
	select last_insert_id() as id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cookies`
--

DROP TABLE IF EXISTS `cookies`;
CREATE TABLE `cookies` (
  `idCookie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cookies`
--

INSERT INTO `cookies` (`idCookie`) VALUES
(0),
(1),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `idImage` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `key` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`idImage`, `url`, `key`) VALUES
(1, 'https://cdn5.dibujos.net/dibujos/pintados/201118/3612d5d35bd569458a8340512f32550d.png', 'zapatilla, calzado,zapa,calzado,zapas,zapato,zapatos,zapatak,shoes,shoe'),
(2, 'https://ivobraunsberger.files.wordpress.com/2011/06/motorrad-supercool.png', 'moto, motocicleta,motorra,motorbike');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `idLog` int(11) NOT NULL,
  `id_cookie` int(11) NOT NULL,
  `log` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`idLog`, `id_cookie`, `log`) VALUES
(3, 1, '2018-10-31 13:54 | ::1 | Firefox | es | pen'),
(5, 1, '2018-10-31 13:57 | ::1 | Firefox | es | shoes'),
(6, 1, '2018-10-31 13:57 | ::1 | Firefox | es | computers'),
(7, 1, '2018-10-31 14:07 | ::1 | Firefox | es | television'),
(8, 1, '2018-10-31 14:20 | ::1 | Firefox | es | cars'),
(9, 1, '2018-10-31 14:27 | ::1 | Firefox | es | eitb'),
(10, 1, '2018-10-31 14:49 | ::1 | Firefox | es | home'),
(11, 31, '2018-11-09 09:01 | ::1 | Firefox | eu | moto'),
(12, 31, '2018-11-09 09:01 | ::1 | Firefox | eu | moto'),
(13, 31, '2018-11-09 09:11 | ::1 | Firefox | eu | zapatilla'),
(14, 31, '2018-11-09 09:22 | ::1 | Firefox | eu | zapatillas'),
(15, 31, '2018-11-09 09:26 | ::1 | Firefox | eu | moto'),
(16, 31, '2018-11-09 09:26 | ::1 | Firefox | eu | motorbike'),
(17, 32, '2018-11-09 09:28 | ::1 | Firefox | eu | moto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cookies`
--
ALTER TABLE `cookies`
  ADD PRIMARY KEY (`idCookie`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`idImage`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idLog`),
  ADD KEY `id_user` (`id_cookie`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cookies`
--
ALTER TABLE `cookies`
  MODIFY `idCookie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_cookie`) REFERENCES `cookies` (`idCookie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
