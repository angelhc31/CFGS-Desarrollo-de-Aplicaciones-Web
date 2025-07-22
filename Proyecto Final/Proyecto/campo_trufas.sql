-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2022 a las 19:54:56
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
-- Base de datos: `campo_trufas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perros`
--

CREATE TABLE `perros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fech_nacimiento` date NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perros`
--

INSERT INTO `perros` (`id`, `nombre`, `fech_nacimiento`, `foto`) VALUES
(1, 'Choco', '2015-06-11', ''),
(2, 'Laika', '2015-02-07', 'fotoPerro2.jpg'),
(3, 'Rubia', '2018-10-18', ''),
(4, 'Gas', '2017-07-07', ''),
(5, 'Curro', '2017-02-16', 'fotoPerro5.jpg'),
(6, 'Covid', '2020-01-15', ''),
(7, 'Bluu', '2018-05-28', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recolectas`
--

CREATE TABLE `recolectas` (
  `id` int(11) NOT NULL,
  `recolector` int(11) NOT NULL,
  `perro` int(11) NOT NULL,
  `zona` int(11) NOT NULL,
  `peso` double NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `DNI` varchar(10) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `nombreUsr` varchar(50) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `esAdmin` int(1) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `DNI`, `mail`, `telefono`, `nombreUsr`, `pwd`, `esAdmin`, `foto`) VALUES
(1, 'Angel', 'Hesse Caracena', '24552121N', 'angelhessecaracena@gamail.com', '681000250', 'admin', '$2y$10$3Obp4p73gkHEl95VnqIp8OKzOPMuCzmdoRn1vNFWQBpbxj/9STAVi', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `area` double NOT NULL,
  `ultRecolecta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `nombre`, `area`, `ultRecolecta`) VALUES
(1, 'Zona A', 1000, '0000-00-00'),
(2, 'Zona B', 1000, '0000-00-00'),
(3, 'Zona C', 1050, '0000-00-00'),
(4, 'Zona D', 1050, '0000-00-00'),
(5, 'Zona E', 1050, '0000-00-00'),
(6, 'Zona F', 1200, '0000-00-00'),
(7, 'Zona G', 1300, '0000-00-00'),
(8, 'Zona H', 400, '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perros`
--
ALTER TABLE `perros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recolectas`
--
ALTER TABLE `recolectas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`recolector`),
  ADD KEY `perro` (`perro`),
  ADD KEY `zona` (`zona`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perros`
--
ALTER TABLE `perros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `recolectas`
--
ALTER TABLE `recolectas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
