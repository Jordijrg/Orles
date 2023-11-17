-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 16:21:30
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
-- Estructura de tabla para la tabla `avatar`
--

CREATE TABLE `avatar` (
  `idavatar` int(11) NOT NULL,
  `srcimagen` text NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estructura de tabla para la tabla `imatges_usuaris`
--

CREATE TABLE `imatges_usuaris` (
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
-- Indices de la tabla `avatar`
--
ALTER TABLE `avatar`
  ADD KEY `iduser` (`iduser`);

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
-- Indices de la tabla `imatges_usuaris`
--
ALTER TABLE `imatges_usuaris`
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
-- AUTO_INCREMENT de la tabla `imatges_usuaris`
--
ALTER TABLE `imatges_usuaris`
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
-- Filtros para la tabla `avatar`
--
ALTER TABLE `avatar`
  ADD CONSTRAINT `avatar_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuaris` (`IdUsuari`);

--
-- Filtros para la tabla `imatges_usuaris`
--
ALTER TABLE `imatges_usuaris`
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
