-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-11-2023 a las 18:05:32
-- Versión del servidor: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `orlas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carnet`
--

CREATE TABLE `carnet` (
  `idcarnet` int(11) NOT NULL,
  `srcimagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grup`
--

CREATE TABLE `grup` (
  `IdGrup` int(11) NOT NULL,
  `Nom` varchar(90) NOT NULL,
  `data_grup` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Imatges_Usuaris`
--

CREATE TABLE `Imatges_Usuaris` (
  `IdImatge` int(11) NOT NULL,
  `Srcimatge` text NOT NULL,
  `idusuari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orles`
--

CREATE TABLE `orles` (
  `IdOrla` int(11) NOT NULL,
  `SrcImatge` text NOT NULL,
  `SrcPdf` text NOT NULL,
  `idgrup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE `usuaris` (
  `IdUsuari` int(11) NOT NULL,
  `Nom` varchar(90) NOT NULL,
  `Cognom` varchar(90) NOT NULL,
  `Correu` varchar(90) NOT NULL,
  `Contrasenya` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari_grup`
--

CREATE TABLE `usuari_grup` (
  `IdGrup` int(11) NOT NULL,
  `IdUsuari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carnet`
--
ALTER TABLE `carnet`
  ADD PRIMARY KEY (`idcarnet`);

--
-- Indices de la tabla `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`IdGrup`);

--
-- Indices de la tabla `Imatges_Usuaris`
--
ALTER TABLE `Imatges_Usuaris`
  ADD PRIMARY KEY (`IdImatge`),
  ADD KEY `idusuari` (`idusuari`);

--
-- Indices de la tabla `orles`
--
ALTER TABLE `orles`
  ADD PRIMARY KEY (`IdOrla`),
  ADD KEY `idgrup` (`idgrup`);

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`IdUsuari`);

--
-- Indices de la tabla `usuari_grup`
--
ALTER TABLE `usuari_grup`
  ADD KEY `IdGrup` (`IdGrup`),
  ADD KEY `IdUsuari` (`IdUsuari`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carnet`
--
ALTER TABLE `carnet`
  MODIFY `idcarnet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grup`
--
ALTER TABLE `grup`
  MODIFY `IdGrup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Imatges_Usuaris`
--
ALTER TABLE `Imatges_Usuaris`
  MODIFY `IdImatge` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orles`
--
ALTER TABLE `orles`
  MODIFY `IdOrla` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `IdUsuari` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Imatges_Usuaris`
--
ALTER TABLE `Imatges_Usuaris`
  ADD CONSTRAINT `Imatges_Usuaris_ibfk_1` FOREIGN KEY (`idusuari`) REFERENCES `usuaris` (`IdUsuari`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orles`
--
ALTER TABLE `orles`
  ADD CONSTRAINT `orles_ibfk_1` FOREIGN KEY (`idgrup`) REFERENCES `grup` (`IdGrup`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuari_grup`
--
ALTER TABLE `usuari_grup`
  ADD CONSTRAINT `usuari_grup_ibfk_1` FOREIGN KEY (`IdGrup`) REFERENCES `grup` (`IdGrup`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuari_grup_ibfk_2` FOREIGN KEY (`IdUsuari`) REFERENCES `usuaris` (`IdUsuari`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
