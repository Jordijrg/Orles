-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2023 a las 17:07:43
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
  `srcimagen` text NOT NULL,
  `IDUsuario` int(11) NOT NULL
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
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `pass`) VALUES
(1, 'user0', '$2y$12$basffknz4AMs32WIzqtMtOzHTKDANLQDqq8OwuPFB0TPooDJLyeTK'),
(2, 'user1', '$2y$12$DH/gQDI0cMiI5yOeMatmQO5hKuJ6QkDyJ.x31ph0OwhdorG4GPTSu'),
(3, 'user2', '$2y$12$r63UzlXt80cFwy/WQ188EuMe74saMMi3YdwmxeGNDFZRGreN5h0BW'),
(4, 'user3', '$2y$12$x/DwaxQqbMfNIr2r5h8uxul/NSJJ2Tv.3IYqtbhi59J1YXWsi/QHC'),
(5, 'user4', '$2y$12$HgYQiRZtb4FIYrAIh7AOuOObSr0VVUsuNto2aiiKcNGrD5iUsalC2'),
(6, 'user5', '$2y$12$yv5/22j3GZ81Uo9j57Nv9OE.dnfQGjoGalhemjsahYo35kH1VRU/C'),
(7, 'user6', '$2y$12$/kyTUGEN7Srf/86lwn0tme4ipKntc4noDIpsxKw2jL25fo.IwsE.e'),
(8, 'user7', '$2y$12$ZoU4Y.9ABeq0QcMqHfjcP.kPse3poTrjGFosOZMYuzN8pmhpphHqm'),
(9, 'user8', '$2y$12$lKCMuoaPy9vQpDj2KYLIHOaByp6Weqt73Gt2EycQO..IIAu20Qiua'),
(10, 'user9', '$2y$12$DfnG7E1vg9n7qiT9xnEUDeIDGNAddOpg0UujiPRIZS370XIco30gW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE `usuaris` (
  `IdUsuari` int(11) NOT NULL,
  `Nom` varchar(90) NOT NULL,
  `Cognom` varchar(90) NOT NULL,
  `Correu` varchar(90) NOT NULL,
  `Contrasenya` varchar(90) NOT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`IdUsuari`, `Nom`, `Cognom`, `Correu`, `Contrasenya`, `rol`, `estado`) VALUES
(1, '1', '1', '1@1.com', '$2y$12$EFbKVKaAndTsA3LfLlKFQuiMbz0D9khJfxNeYeHQlI02HIovqBa0K', NULL, 'pendent'),
(2, 'p', 'p1', 'p1@1.com', '$2y$12$LJgCSEkLEyUKnpEcKKKsQe.CNtekf5lfWcHs80Ek1.foEUnEY2kxC', NULL, 'pendent'),
(3, 'prueba', '1', 'p@p.com', '$2y$12$NxGwTJs8JHSeXxLjTdQOm.Xv3UjT23RsIuhoqkxwDzhayXK3ML0RW', NULL, 'pendent'),
(4, 'user1', 'user2', 'caca@caca.com', '$2y$12$1ScAxD2fdSIUqcxTLLQcl.gb3EAmSun6MH78Qh.2siW8PbF0mElW.', NULL, 'pendent'),
(5, '1', '1', '1@1.cm', '$2y$12$S.Fj/dp6A2LOu9aKErSNR.PhIFgZdJFgoqxs49Gi5MkwFJBKNhUzy', NULL, 'pendent'),
(6, '1', '1', '1@2.com', '$2y$12$2PzZbqrQjib3u1mnwIagq.Bwp8BDZ9kKWZlK8WmKONOAobnFRd7sW', NULL, 'pendent');

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
  ADD PRIMARY KEY (`idcarnet`),
  ADD KEY `IDUsuario` (`IDUsuario`);

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
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_owner` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`user`);

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
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `IdUsuari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `avatar`
--
ALTER TABLE `avatar`
  ADD CONSTRAINT `avatar_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuaris` (`IdUsuari`);

--
-- Filtros para la tabla `carnet`
--
ALTER TABLE `carnet`
  ADD CONSTRAINT `carnet_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `usuaris` (`IdUsuari`);

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
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `task_owner` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
