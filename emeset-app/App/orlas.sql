-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2023 a las 00:25:30
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

--
-- Volcado de datos para la tabla `avatar`
--

INSERT INTO `avatar` (`idavatar`, `srcimagen`, `iduser`) VALUES
(1, '1702859821ddd.png', 5),
(5, '1702908637ddd.png', 4),
(6, '1703028129ddd.png', 19);

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
-- Estructura de tabla para la tabla `errors`
--

CREATE TABLE `errors` (
  `IdError` int(11) NOT NULL,
  `TextoError` varchar(255) NOT NULL,
  `IdUsuari` int(11) DEFAULT NULL,
  `estat` varchar(255) NOT NULL DEFAULT 'novist'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `errors`
--

INSERT INTO `errors` (`IdError`, `TextoError`, `IdUsuari`, `estat`) VALUES
(2, 'rt4wfes', 4, 'novist'),
(4, 'rt4rwe', 4, 'vist'),
(5, 'rqwefsdaa', 4, 'vist');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grup`
--

CREATE TABLE `grup` (
  `IdGrup` int(11) NOT NULL,
  `Nom` varchar(90) NOT NULL,
  `data_grup` date NOT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grup`
--

INSERT INTO `grup` (`IdGrup`, `Nom`, `data_grup`, `estado`) VALUES
(0, 'Default Group', '2023-01-01', 'activat'),
(1, 'DAW', '2023-11-17', NULL),
(2, 'smx2', '2023-11-17', NULL),
(3, 'smx3', '2023-11-17', NULL),
(4, 'DAW2', '2023-11-17', NULL),
(5, 'f', '2023-12-18', 'desactivat');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imatges_usuaris`
--

CREATE TABLE `imatges_usuaris` (
  `IdImatge` int(11) NOT NULL,
  `Srcimatge` text NOT NULL,
  `idusuari` int(11) NOT NULL,
  `idgrup` int(11) NOT NULL,
  `img_select_orl` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imatges_usuaris`
--

INSERT INTO `imatges_usuaris` (`IdImatge`, `Srcimatge`, `idusuari`, `idgrup`, `img_select_orl`) VALUES
(47, 'descarga.jpeg', 4, 0, 'active'),
(49, 'descarga.jpeg', 5, 1, 'active'),
(50, 'descarga.jpeg', 12, 1, 'active'),
(53, '17025895770.png', 4, 0, NULL),
(54, '17025895771.png', 4, 0, NULL),
(55, '17025895772.png', 4, 0, 'active'),
(56, '17030248230.png', 19, 0, 'active'),
(57, 'descarga.jpeg', 12, 1, 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orles`
--

CREATE TABLE `orles` (
  `IdOrla` int(11) NOT NULL,
  `idgrup` int(11) NOT NULL,
  `nomorle` text NOT NULL,
  `estat` text NOT NULL,
  `datacreacio` int(11) DEFAULT NULL,
  `numcolum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orles`
--

INSERT INTO `orles` (`IdOrla`, `idgrup`, `nomorle`, `estat`, `datacreacio`, `numcolum`) VALUES
(1, 1, 'DAW 2023-11-17', 'activado', 2023, 3),
(2, 1, 'DAW 2023-11-17', 'activado', 2023, 3),
(3, 1, 'DAW 2023-11-17', 'invisible', 2023, 3),
(4, 2, 'smx2 2023-11-17', 'invisible', 2023, 3),
(5, 1, 'DAW 2023-11-17', 'invisible', 2023, 3),
(6, 1, 'DAW 2023-11-17', 'invisible', 2023, 3),
(7, 1, 'DAW 2023-11-17', 'invisible', 2023, 3),
(8, 1, 'DAW 2023-11-17', 'invisible', 2023, 3),
(9, 1, 'DAW 2023-11-17', 'invisible', 2023, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla_orlas`
--

CREATE TABLE `plantilla_orlas` (
  `idplantilla` int(11) NOT NULL,
  `nom` text NOT NULL,
  `datacreacio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plantilla_orlas`
--

INSERT INTO `plantilla_orlas` (`idplantilla`, `nom`, `datacreacio`) VALUES
(1, 'primera plantilla', '2023-12-13');

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
  `estado` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`IdUsuari`, `Nom`, `Cognom`, `Correu`, `Contrasenya`, `rol`, `estado`, `token`) VALUES
(1, '1', '1', '1@1.com', '$2y$12$EFbKVKaAndTsA3LfLlKFQuiMbz0D9khJfxNeYeHQlI02HIovqBa0K', 'alumne', 'actiu', ''),
(2, 'p', 'p1', 'p1@1.com', '$2y$12$LJgCSEkLEyUKnpEcKKKsQe.CNtekf5lfWcHs80Ek1.foEUnEY2kxC', NULL, 'pendent', ''),
(3, 'prueba', '1', 'p@p.com', '$2y$12$NxGwTJs8JHSeXxLjTdQOm.Xv3UjT23RsIuhoqkxwDzhayXK3ML0RW', NULL, 'pendent', ''),
(4, 'dddd', 'user2', 'caca@caca.com', '$2y$12$1ScAxD2fdSIUqcxTLLQcl.gb3EAmSun6MH78Qh.2siW8PbF0mElW.', 'equip_directiu', 'active', ''),
(5, 'pedro', '1', '1@1.cm', '$2y$12$S.Fj/dp6A2LOu9aKErSNR.PhIFgZdJFgoqxs49Gi5MkwFJBKNhUzy', 'alumne', 'pendent', ''),
(6, '1', '1', '1@2.com', '$2y$12$2PzZbqrQjib3u1mnwIagq.Bwp8BDZ9kKWZlK8WmKONOAobnFRd7sW', NULL, 'pendent', ''),
(7, 'd2', 'd2', 'd2@d2.com', '$2y$12$I2/66rULoZrh3pBi5OhBnuy0syrUvUL6ypdSxOFZc2aVg8h/QUrXa', '', 'actiu', ''),
(8, '1', '1', 'prueba@prueba', '$2y$12$q8gHdSAVVXCho/coygZT/uWUy1b86l9lf6VaZ.8qB26.DUogpsan2', '', 'actiu', ''),
(9, 'a', 'a', 'a@a', '$2y$12$0T.5j3lQRN/jYCNUmeOHDO3/JtampCfK5dsDJSBYCYrq2NlRklwaC', 'profe', 'actiu', ''),
(10, 'pruba', 'pru', 'pr@pr', '$2y$12$pYGkm0bkyGc9SjwcKyB50OEq1musJxlnxCnzz3nzbPtfiu/JF8GYC', NULL, 'pendent', ''),
(11, 'preba', 'pre', 'caca2@caca2.com', '$2y$12$Y0KY1T1GCQv3TvXxaRiifOul61UQViVrQA.RWfgsw.hpZWZqtWRdq', NULL, 'pendent', ''),
(12, 'Laura', 'García', 'laura@example.com', '$2y$12$gPNpC2Lt6wmCnh5/X7fhwebBXR3l/zwPeJ6L.fgwFea7vV.Hq9pGK', 'profe', 'pendent', ''),
(13, 'Carlos', 'Fernández', 'carlos@example.com', '$2y$12$6WUYeFUg1XOBYpmkylKxO.HS/7kqsJfpvDYsMk61F4K9o1nPf5w2m', 'professor', 'actiu', ''),
(14, 'Elena', 'Martínez', 'elena@example.com', '$2y$12$ohSJQ0UvWru0dWW/LplIDOY1fuAoxarI83Jzmn.UJfVTyQXnYctvG', 'gestor', 'inactiu', ''),
(15, 'Miguel', 'Ruiz', 'miguel@example.com', '$2y$12$/QQxOGXiA2cF5HTvGR9JtutZadNqw2a0emLWOck9yGkeRRfsCNp.q', 'alumne', 'pendent', ''),
(16, 'Isabel', 'López', 'isabel@example.com', '$2y$12$EuQUSMiji.orscTBHPNoEeLLP/QJ/5wV53XXVZx2hNrByo8NpfaIW', 'professor', 'actiu', ''),
(17, 'Stefan', 'Amundsen', 'stefan.amundsen@example.com', '$2y$12$a3UfrvMi7aMHG3KXjkFkfep.RbEG8fVlsoo1sY3JGiY/VctbGt8bW', '', 'pendent', ''),
(18, 'Jo', 'j', 'jordi@gmail.com', '$2y$12$U6VFOGERc3qRt3AIjS.zVet1ITFveNWuDB4HkMBMUSlu3gNJsZRpy', NULL, 'pendent', ''),
(19, 'c', 'c', 'c@c.com', '$2y$12$rQu.AsApL5kbKogzET6kAeHPbErAJsrbVhqkUKG9aB1Z56MWrqOjS', 'profe', 'pendent', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari_grup`
--

CREATE TABLE `usuari_grup` (
  `IdGrup` int(11) NOT NULL,
  `IdUsuari` int(11) NOT NULL,
  `id_d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuari_grup`
--

INSERT INTO `usuari_grup` (`IdGrup`, `IdUsuari`, `id_d`) VALUES
(1, 4, 1),
(2, 4, 2),
(4, 4, 5),
(3, 3, 8),
(3, 1, 10),
(3, 5, 11),
(1, 5, 12),
(1, 11, 13),
(1, 19, 14);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`idavatar`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `carnet`
--
ALTER TABLE `carnet`
  ADD PRIMARY KEY (`idcarnet`),
  ADD KEY `IDUsuario` (`IDUsuario`);

--
-- Indices de la tabla `errors`
--
ALTER TABLE `errors`
  ADD PRIMARY KEY (`IdError`),
  ADD KEY `IdUsuari` (`IdUsuari`);

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
  ADD KEY `idusuari` (`idusuari`),
  ADD KEY `idgrup` (`idgrup`);

--
-- Indices de la tabla `orles`
--
ALTER TABLE `orles`
  ADD PRIMARY KEY (`IdOrla`),
  ADD KEY `idgrup` (`idgrup`);

--
-- Indices de la tabla `plantilla_orlas`
--
ALTER TABLE `plantilla_orlas`
  ADD PRIMARY KEY (`idplantilla`);

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
  ADD PRIMARY KEY (`id_d`),
  ADD KEY `IdGrup` (`IdGrup`),
  ADD KEY `IdUsuari` (`IdUsuari`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avatar`
--
ALTER TABLE `avatar`
  MODIFY `idavatar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `carnet`
--
ALTER TABLE `carnet`
  MODIFY `idcarnet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `errors`
--
ALTER TABLE `errors`
  MODIFY `IdError` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `grup`
--
ALTER TABLE `grup`
  MODIFY `IdGrup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `imatges_usuaris`
--
ALTER TABLE `imatges_usuaris`
  MODIFY `IdImatge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `orles`
--
ALTER TABLE `orles`
  MODIFY `IdOrla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `plantilla_orlas`
--
ALTER TABLE `plantilla_orlas`
  MODIFY `idplantilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `IdUsuari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuari_grup`
--
ALTER TABLE `usuari_grup`
  MODIFY `id_d` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- Filtros para la tabla `errors`
--
ALTER TABLE `errors`
  ADD CONSTRAINT `errors_ibfk_1` FOREIGN KEY (`IdUsuari`) REFERENCES `usuaris` (`IdUsuari`);

--
-- Filtros para la tabla `imatges_usuaris`
--
ALTER TABLE `imatges_usuaris`
  ADD CONSTRAINT `Imatges_Usuaris_ibfk_1` FOREIGN KEY (`idusuari`) REFERENCES `usuaris` (`IdUsuari`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idgrup` FOREIGN KEY (`idgrup`) REFERENCES `grup` (`IdGrup`);

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
