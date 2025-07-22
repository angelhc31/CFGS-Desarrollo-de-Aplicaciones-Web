-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2025 a las 19:36:41
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservas_negocios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Pendiente', 'Pendiente'),
(2, 'Completada', 'Completada'),
(3, 'Cancelada', 'Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocios`
--

CREATE TABLE `negocios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direcc` varchar(100) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `telf` varchar(15) NOT NULL,
  `nomUsr` varchar(50) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `activo` int(1) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT '',
  `tipoNegocio` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `negocios`
--

INSERT INTO `negocios` (`id`, `nombre`, `direcc`, `mail`, `telf`, `nomUsr`, `pwd`, `activo`, `foto`, `tipoNegocio`) VALUES
(0, 'admin', '', '', '', 'admin', '$2y$10$3Obp4p73gkHEl95VnqIp8OKzOPMuCzmdoRn1vNFWQBpbxj/9STAVi', 0, '', 0),
(2, 'Shuno', 'apalapala', 'aglagla@gmail.com', '681000250', 'shun', '$2y$10$vdUKTDrcbXet0PchCBBMvOFGeRTYHW/mST84Ge9AxrFalz4UbHAAm', 1, '', 1),
(3, 'La Paca', 'adadasdadasdad', 'sadasdasdsda', '234243243', 'LaPaca', '$2y$10$3Obp4p73gkHEl95VnqIp8OKzOPMuCzmdoRn1vNFWQBpbxj/9STAVi', 1, '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `negocio` int(11) NOT NULL,
  `nombreCliente` varchar(150) NOT NULL,
  `telfCliente` int(11) NOT NULL,
  `numPersonas` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `turno` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `observaciones` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `negocio`, `nombreCliente`, `telfCliente`, `numPersonas`, `fecha`, `turno`, `estado`, `observaciones`) VALUES
(3, 2, 'asdads', 0, 100, '2025-06-26', 1, 1, ''),
(4, 2, 'dguhinjm', 0, 100, '2025-06-28', 2, 2, ''),
(5, 2, 'JARI KASHMIRI', 45678, 5, '2025-06-27', 3, 3, ''),
(6, 2, 'Angel Hesse', 681000250, 7, '2025-06-27', 2, 2, ''),
(7, 2, 'ANGEL HESSE', 681000250, 2, '2025-07-06', 1, 1, ''),
(8, 2, 'Angel Hesse', 681000250, 2, '2025-06-27', 3, 2, ''),
(9, 2, 'ÁNGEL HESSE', 666666666, 20, '2026-01-04', 2, 2, ''),
(10, 2, 'Angel Hesse', 681000250, 90, '2025-07-03', 1, 3, ''),
(11, 2, 'ANGEL HESSE', 681000250, 6, '2025-06-27', 3, 1, ''),
(12, 2, 'ANGEL HESSE', 681000250, 8, '2025-07-04', 3, 1, ''),
(13, 2, 'Angel Hesse', 681000250, 5, '2025-06-26', 2, 2, ''),
(14, 2, 'ANGEL HESSE', 681000250, 13, '2025-06-28', 1, 2, ''),
(15, 2, 'Angel Hesse', 681000250, 11, '2025-07-03', 2, 3, ''),
(16, 2, 'TACO PORRETE', 123456789, 60, '2025-08-01', 1, 3, 'aaaaaa'),
(17, 3, 'ANGEL HESSE', 681000250, 7, '2025-06-28', 8, 1, ''),
(18, 3, 'PACO PORRO', 234567890, 50, '2025-06-28', 8, 1, ''),
(19, 3, 'Angel Hesse', 681000250, 2, '2025-06-27', 8, 1, ''),
(20, 3, 'Angel Hesse', 681000250, 98, '2025-06-27', 8, 2, ''),
(21, 3, 'KALID KASHMIRI', 123456789, 10, '2025-06-29', 5, 3, ''),
(22, 2, 'ÓSCAR PÉREZ', 123456789, 6, '2025-06-28', 3, 2, ''),
(23, 2, 'ÉDUAR', 123456789, 50, '2025-06-28', 3, 0, ''),
(24, 2, 'ÁLVARO IRLES', 123456789, 99, '2025-06-28', 2, 2, ''),
(25, 2, 'A', 1, 1, '2025-06-28', 1, 3, ''),
(26, 2, 'ANGEL HESSE', 681000250, 8, '2025-07-23', 2, 1, 'uuuuuuuuuuuuuuuuuuuuuuuuuuuu'),
(28, 2, 'ANGEL HESSE', 681000250, 47, '2025-08-01', 3, 1, 'aguaaaaaa'),
(29, 2, 'AWWWWIIIII', 666666666, 53, '2025-08-01', 3, 1, 'uuuuupiiiiilaaaa'),
(30, 2, 'UPAAAAA', 888888888, 23, '2026-08-20', 2, 1, 'apowmcpo wkenñ qw m aspo'),
(31, 2, 'ANGEL HESSE', 681000250, 2, '2025-07-13', 2, 1, 'nada'),
(32, 2, 'ANGEL HESSE', 681000250, 6, '2025-07-13', 2, 1, 'cvbknjlmñ'),
(33, 2, 'ANGEL HESSE', 681000250, 2, '2026-07-18', 2, 1, ''),
(34, 2, 'MAR', 123456789, 90, '2025-07-18', 1, 3, ''),
(35, 2, 'ANGEL HESSE', 681000250, 34, '2025-07-18', 3, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_negocios`
--

CREATE TABLE `tipos_negocios` (
  `id` int(1) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_negocios`
--

INSERT INTO `tipos_negocios` (`id`, `nombre`, `descripcion`) VALUES
(1, 'restaurante', 'restaurante'),
(2, 'peluquería', 'peluquería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `negocio` int(11) NOT NULL,
  `nombre` time NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `maxPersonas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `negocio`, `nombre`, `descripcion`, `maxPersonas`) VALUES
(1, 2, '21:30:00', '21:30 - 22:30', 100),
(2, 2, '22:30:00', '22:30 - 23:30', 100),
(3, 2, '23:30:00', '23:30 - 00:00', 100),
(4, 3, '09:00:00', '9:00 - 9:30', 60),
(5, 3, '09:30:00', '9:30 - 10:00', 60),
(6, 3, '10:00:00', '10:00 - 10:30', 60),
(7, 3, '10:30:00', '10:30 - 11:00', 60),
(8, 3, '21:30:00', '21:30 - 22:00', 100);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `negocios`
--
ALTER TABLE `negocios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipoNegocio` (`tipoNegocio`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turno` (`turno`),
  ADD KEY `restaurante` (`negocio`) USING BTREE,
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `tipos_negocios`
--
ALTER TABLE `tipos_negocios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurante` (`negocio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `negocios`
--
ALTER TABLE `negocios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `tipos_negocios`
--
ALTER TABLE `tipos_negocios`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
