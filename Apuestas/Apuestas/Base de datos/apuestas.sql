-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2017 a las 17:43:43
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `apuestas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` varchar(20) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `comentario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido_marcador_final`
--

CREATE TABLE IF NOT EXISTS `partido_marcador_final` (
  `id_marcador` int(11) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `equipo_1` varchar(100) NOT NULL,
  `equipo_2` varchar(100) NOT NULL,
  `marcador_1` varchar(2) NOT NULL,
  `marcador_2` varchar(2) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partido_marcador_final`
--

INSERT INTO `partido_marcador_final` (`id_marcador`, `id_usuario`, `equipo_1`, `equipo_2`, `marcador_1`, `marcador_2`, `fecha`) VALUES
(1, 'tiflas', 'REAL MADRID', 'BARCELONA', '?', '?', '2017-02-16'),
(2, 'tiflas', 'PATRIOTAS', 'ALIANZA PETROLERA', '?', '?', '2017-02-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE IF NOT EXISTS `publicidad` (
  `id_url` varchar(50) NOT NULL,
  `titulo` varchar(70) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `id_usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado_final`
--

CREATE TABLE IF NOT EXISTS `resultado_final` (
  `id_resultado` int(11) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `marcador_1` varchar(2) NOT NULL,
  `marcador_2` varchar(2) NOT NULL,
  `equipo_1` varchar(100) NOT NULL,
  `equipo_2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` varchar(30) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `total` varchar(10) NOT NULL,
  `clave` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `imagen`, `total`, `clave`) VALUES
('msruiz', 'Stefan', 'adidas.jpg', '0', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`), ADD KEY `id_usuario` (`id_usuario`), ADD KEY `id_usuario_2` (`id_usuario`);

--
-- Indices de la tabla `partido_marcador_final`
--
ALTER TABLE `partido_marcador_final`
  ADD PRIMARY KEY (`id_marcador`), ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`id_url`), ADD KEY `id_usuario` (`id_usuario`), ADD KEY `id_usuario_2` (`id_usuario`);

--
-- Indices de la tabla `resultado_final`
--
ALTER TABLE `resultado_final`
  ADD PRIMARY KEY (`id_resultado`), ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `partido_marcador_final`
--
ALTER TABLE `partido_marcador_final`
  MODIFY `id_marcador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `resultado_final`
--
ALTER TABLE `resultado_final`
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `partido_marcador_final`
--
ALTER TABLE `partido_marcador_final`
ADD CONSTRAINT `partido_marcador_final_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicidad`
--
ALTER TABLE `publicidad`
ADD CONSTRAINT `publicidad_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultado_final`
--
ALTER TABLE `resultado_final`
ADD CONSTRAINT `resultado_final_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
