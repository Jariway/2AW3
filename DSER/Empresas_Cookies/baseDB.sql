-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2018 a las 10:23:38
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
-- Base de datos: `2aw3_favorites`
--
CREATE DATABASE IF NOT EXISTS `2aw3_favorites` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `2aw3_favorites`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `spContrasenaUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spContrasenaUsuario` (IN `iUsuario` VARCHAR(50))  NO SQL
SELECT password FROM user WHERE username=iUsuario$$

DROP PROCEDURE IF EXISTS `spDatosSession`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spDatosSession` (IN `iUsuario` VARCHAR(50))  NO SQL
SELECT idUser,rango FROM user WHERE username=iUsuario$$

DROP PROCEDURE IF EXISTS `spEmailLibre`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spEmailLibre` (IN `iEmail` VARCHAR(255))  NO SQL
SELECT idUser FROM user WHERE email=iEmail$$

DROP PROCEDURE IF EXISTS `spNuevaEmpresa`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spNuevaEmpresa` (IN `iNombre` VARCHAR(50), IN `iTelefono` INT(10), IN `iWeb` VARCHAR(50), IN `iDireccion` VARCHAR(100), IN `iIdSector` INT(11))  NO SQL
BEGIN
	INSERT INTO company (name,tel,web,address,idSector) 		    			VALUES(iNombre,iTelefono,iWeb,iDireccion,iIdSector);

	SELECT LAST_INSERT_ID() as ultimo;
END$$

DROP PROCEDURE IF EXISTS `spNuevoUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spNuevoUsuario` (IN `iNombre` VARCHAR(255), IN `iApellido` VARCHAR(255), IN `iUsuario` VARCHAR(50), IN `iEmail` VARCHAR(255), IN `iContrasena` VARCHAR(255))  NO SQL
INSERT INTO user(name,surname,username,email,password) 
VALUES(iNombre,iApellido,iUsuario,iEmail,iContrasena)$$

DROP PROCEDURE IF EXISTS `spSectores`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSectores` ()  NO SQL
SELECT
	idSector as id,
	name as nombre,
    presupuesto
from sector$$

DROP PROCEDURE IF EXISTS `spUsuarioCorrecto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUsuarioCorrecto` (IN `iUsuario` VARCHAR(50))  NO SQL
SELECT idUser FROM user WHERE username=iUsuario$$

DROP PROCEDURE IF EXISTS `spUsuarioLibre`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUsuarioLibre` (IN `iUsuario` VARCHAR(50))  NO SQL
SELECT idUser FROM user WHERE username=iUsuario$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `idCompany` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `web` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `idSector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`idCompany`, `name`, `tel`, `web`, `address`, `idSector`) VALUES
(2, 'Euskaltel', '1717', 'https://www.euskaltel.com/', 'Parque Científico y Tecnológico de Bizkaia. 48160. Derio. Bizkaia', 1),
(3, 'Goenaga', '943216327 ', 'https://www.yogurgoenaga.com/', 'Pokopandegi Baserria, 36, 20018 San Sebastián, Guipúzcoa', 2),
(4, 'CIFP Zornotza', '946730251', 'http://www.fpzornotza.hezkuntza.net', 'Barrio Urritxe s/n, 48340 Amorebieta-Etxano, BI', 4),
(5, 'Lacturale', '948600449', 'https://www.lacturale.com/eu/', 'Carretera Madoz, s/n, 31868 Etxeberri Arakil', 2),
(6, 'Baqué', '946215610', 'http://www.baque.com/es/', 'Zuaznabar Kalea, 31, 20180, Gipuzkoa', 2),
(17, 'asd', '0', 'asdasd', 'asdasd', 3),
(18, 'Google', '659325684', 'www.google.es', 'NewYork', 1),
(19, 'Facebook', '2147483647', 'www.facebook.com', 'Street Avenue', 1),
(20, 'Space X', '965876238', 'www.spacex.com', 'Mars', 5),
(21, 'Turkish Airlines', '685486329', 'www.turkishairlines.com', 'India', 5),
(22, 'Zara', '2147483647', 'www.zara.com', 'Bilabo', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list`
--

DROP TABLE IF EXISTS `list`;
CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idCompany` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `list`
--

INSERT INTO `list` (`id`, `idUser`, `idCompany`) VALUES
(9, 5, 2),
(10, 5, 3),
(13, 5, 6),
(14, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

DROP TABLE IF EXISTS `sector`;
CREATE TABLE `sector` (
  `idSector` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `presupuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`idSector`, `name`, `presupuesto`) VALUES
(1, 'Telecomunications', 500000),
(2, 'Food', 450000),
(3, 'Security', 600000),
(4, 'Education', 120000),
(5, 'Transporte', 56800000),
(6, 'Vestimenta', 80000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rango` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `name`, `surname`, `email`, `rango`) VALUES
(5, 'iker', '$2y$10$Jr1OhNpXYmHyA68xDOHpbOBKV/kmRz/j/tVxHC8oUhYBIIrxgR59y', 'iker', 'Herran', 'iker@okokl.oc', 1),
(8, 'CristianS9', '$2y$10$kgxHoNyPTIY9nGooxaVKCOXduSmHpan3cRvYYecjtfjRSBnZgRy7S', 'Cristian', 'Siroca', 'cristians9@hotmail.es', 1),
(9, 'prueba', '$2y$10$YJ.NzyNPyedU9oHeMa6ytO/gpZs0ui.Kf5ZnCdnixfwuHv/syTaU2', 'prueba', 'prueba', 'asdas', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`idCompany`),
  ADD KEY `idSector` (`idSector`);

--
-- Indices de la tabla `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idCompany` (`idCompany`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`idSector`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `idCompany` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `idSector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`idSector`) REFERENCES `sector` (`idSector`);

--
-- Filtros para la tabla `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `list_ibfk_2` FOREIGN KEY (`idCompany`) REFERENCES `company` (`idCompany`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
