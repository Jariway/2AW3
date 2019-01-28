-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2019 a las 12:14:55
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `azterketa`
--
CREATE DATABASE IF NOT EXISTS `azterketa` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `azterketa`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `spDeleteGroups`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteGroups` (IN `pUser` INT)  NO SQL
DELETE
FROM contactsgroups
WHERE idContact = pUser$$

DROP PROCEDURE IF EXISTS `spGetAllGroups`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllGroups` ()  NO SQL
SELECT groups.idGroup as id, groups.groupName as name
from groups$$

DROP PROCEDURE IF EXISTS `spGetContactInfo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetContactInfo` (IN `pId` INT)  NO SQL
SELECT contacts.idContact as id,contacts.name as name, contacts.surname as surname, contacts.tel as tel
FROM contacts
WHERE contacts.idContact = pId$$

DROP PROCEDURE IF EXISTS `spGetContacts`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetContacts` ()  NO SQL
SELECT contacts.idContact as id, contacts.name as name from contacts$$

DROP PROCEDURE IF EXISTS `spGetUserEmails`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetUserEmails` (IN `pUser` INT)  NO SQL
SELECT emails.e_mail as email, emails.idEmail as id
FROM emails
WHERE emails.idContact = pUser$$

DROP PROCEDURE IF EXISTS `spGetUserGroups`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetUserGroups` (IN `pUser` INT)  NO SQL
SELECT groups.groupName as groupName, groups.idGroup as idGroup
FROM groups
INNER join contactsgroups on contactsgroups.idGroup = groups.idGroup
WHERe contactsgroups.idContact = pUser$$

DROP PROCEDURE IF EXISTS `spInsertEmail`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertEmail` (IN `pemail` VARCHAR(40), IN `pUser` INT)  NO SQL
INSERT INTO emails(e_mail,idContact)
VALUES (pemail,pUser)$$

DROP PROCEDURE IF EXISTS `spInsertGroups`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertGroups` (IN `pid` INT, IN `pgroup` INT)  NO SQL
INSERT INTO contactsgroups(idContact,idGroup)
VALUES (pid,pgroup)$$

DROP PROCEDURE IF EXISTS `spUpdateEmail`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateEmail` (IN `pIdEmail` INT, IN `pEmail` VARCHAR(255))  NO SQL
UPDATE emails
SET emails.e_mail = pEmail
WHERE emails.idEmail = pIdEmail$$

DROP PROCEDURE IF EXISTS `spUpdateUserInfo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateUserInfo` (IN `pname` VARCHAR(50), IN `psurname` VARCHAR(50), IN `ptel` VARCHAR(50), IN `pUserId` INT)  NO SQL
UPDATE contacts
SET name = pname, surname = psurname, tel=ptel
WHERE contacts.idContact = pUserId$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `idContact` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`idContact`, `name`, `surname`, `tel`) VALUES
(1, 'Xabierrrs', 'Fernandezs', '645545454'),
(3, 'Ane', 'Osa', '555224411'),
(4, 'Ane', 'Ruiz', '66778855'),
(5, 'Mick', 'Cook', '1122345'),
(6, 'Rose', 'Stuart', '22334433'),
(16, 'Nick', 'Anderson', '5698854552'),
(23, 'Iñaki', 'Nuñez', '675534231'),
(24, 'Ion Ander', 'Güebbo', '762523223'),
(28, 'Aitor', 'Ibañez', '78236478'),
(31, 'Clint', 'Eastwood', '347853498'),
(32, 'Miren', 'Muñoz', '89742');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactsgroups`
--

DROP TABLE IF EXISTS `contactsgroups`;
CREATE TABLE `contactsgroups` (
  `idContact` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactsgroups`
--

INSERT INTO `contactsgroups` (`idContact`, `idGroup`) VALUES
(1, 1),
(1, 3),
(3, 1),
(4, 3),
(5, 3),
(6, 3),
(16, 1),
(16, 2),
(16, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 2),
(28, 1),
(31, 2),
(32, 2),
(32, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE `emails` (
  `idEmail` int(11) NOT NULL,
  `idContact` int(11) DEFAULT NULL,
  `e_mail` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`idEmail`, `idContact`, `e_mail`) VALUES
(1, 6, 'rose@gmail.com'),
(2, 6, 'rose2@hotmail.com'),
(4, 5, 'mick@gmail.com'),
(5, 3, 'ane@gmail.com'),
(6, 3, 'anebigarrena@gmail.com'),
(8, 1, 'xabier@gmail.comm'),
(27, 31, 'Clint@yahoho.es'),
(38, 23, 'nunez@hotmail.co'),
(39, 24, 'ion@ggg.vom'),
(40, 16, 'nick@gmail.com'),
(41, 16, 'nick@hotmail.com'),
(43, 28, 'aitor@hotmail.com'),
(44, 5, 'mick2@zornotza.eus'),
(46, 4, 'ane@hotmail.com'),
(47, 32, 'miren600@fpzornotza.com'),
(48, 1, 'no hay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `idGroup` int(11) NOT NULL,
  `groupName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`idGroup`, `groupName`) VALUES
(1, 'Lagunak'),
(2, 'Familia'),
(3, 'Lana');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`idContact`);

--
-- Indices de la tabla `contactsgroups`
--
ALTER TABLE `contactsgroups`
  ADD PRIMARY KEY (`idContact`,`idGroup`),
  ADD KEY `idGroup` (`idGroup`);

--
-- Indices de la tabla `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`idEmail`),
  ADD KEY `fk_contactos` (`idContact`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`idGroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
  MODIFY `idEmail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `idGroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactsgroups`
--
ALTER TABLE `contactsgroups`
  ADD CONSTRAINT `contactsgroups_ibfk_1` FOREIGN KEY (`idGroup`) REFERENCES `groups` (`idGroup`),
  ADD CONSTRAINT `contactsgroups_ibfk_2` FOREIGN KEY (`idContact`) REFERENCES `contacts` (`idContact`);

--
-- Filtros para la tabla `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`idContact`) REFERENCES `contacts` (`idContact`),
  ADD CONSTRAINT `fk_contactos` FOREIGN KEY (`idContact`) REFERENCES `contacts` (`idContact`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
