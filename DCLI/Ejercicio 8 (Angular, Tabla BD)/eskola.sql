-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-02-2019 a las 12:44:24
-- Versión del servidor: 10.1.37-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.33-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eskola`
--
CREATE DATABASE IF NOT EXISTS `eskola` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `eskola`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `spAnadirAlumno`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spAnadirAlumno` (IN `p_nombre` VARCHAR(30), IN `p_edad` INT(10), IN `p_curso` INT(10))  NO SQL
BEGIN
 INSERT INTO ikasleak(Nombre, Edad, Curso)              
 VALUES (p_nombre,p_edad,p_curso);
END$$

DROP PROCEDURE IF EXISTS `spBorrarAlumno`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spBorrarAlumno` (IN `p_id_ikasle` INT(10))  NO SQL
    DETERMINISTIC
BEGIN
	DELETE FROM ikasleak WHERE id = p_id_ikasle;
END$$

DROP PROCEDURE IF EXISTS `spDatosAlumno`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spDatosAlumno` (IN `iId` INT(10))  NO SQL
SELECT Nombre,Edad,Curso 
FROM ikasleak
WHERE id = iId$$

DROP PROCEDURE IF EXISTS `spListadoSelect`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spListadoSelect` ()  NO SQL
SELECT id,Nombre
FROM ikasleak$$

DROP PROCEDURE IF EXISTS `spListarAlumnos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarAlumnos` ()  NO SQL
    DETERMINISTIC
SELECT Nombre,Edad,Curso,id
FROM
ikasleak$$

DROP PROCEDURE IF EXISTS `spModificarAlumno`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarAlumno` (IN `pid` INT(30), IN `p_edad` INT(10), IN `p_curso` INT(10), IN `p_nombre` VARCHAR(30))  NO SQL
    DETERMINISTIC
BEGIN
UPDATE ikasleak 
SET Nombre = p_nombre, Edad = p_edad , Curso = p_curso  
where ikasleak.id = pid;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ikasleak`
--

DROP TABLE IF EXISTS `ikasleak`;
CREATE TABLE `ikasleak` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Curso` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ikasleak`
--

INSERT INTO `ikasleak` (`id`, `Nombre`, `Edad`, `Curso`) VALUES
(1, 'Ane', 21, 5),
(2, 'MikelGmh', 18, 5),
(3, 'Gorka', 22, 3),
(16, 'sara', 21, 2),
(15, 'Ander', 28, 2),
(20, 'Analisa', 12, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matrikulak`
--

DROP TABLE IF EXISTS `matrikulak`;
CREATE TABLE `matrikulak` (
  `id_matricula` int(11) NOT NULL,
  `id-ikasle` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `nota` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moduluak`
--

DROP TABLE IF EXISTS `moduluak`;
CREATE TABLE `moduluak` (
  `id_modulo` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Curso` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `moduluak`
--

INSERT INTO `moduluak` (`id_modulo`, `Nombre`, `Curso`) VALUES
(1, 'LENGUAJE DE MARCAS', 1),
(2, 'SISTEMAS', 1),
(3, 'DCLI', 2),
(4, 'IWEB', 2),
(5, 'DSER', 2),
(6, 'INGLES', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ikasleak`
--
ALTER TABLE `ikasleak`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `matrikulak`
--
ALTER TABLE `matrikulak`
  ADD PRIMARY KEY (`id_matricula`);

--
-- Indices de la tabla `moduluak`
--
ALTER TABLE `moduluak`
  ADD PRIMARY KEY (`id_modulo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ikasleak`
--
ALTER TABLE `ikasleak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `matrikulak`
--
ALTER TABLE `matrikulak`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `moduluak`
--
ALTER TABLE `moduluak`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
