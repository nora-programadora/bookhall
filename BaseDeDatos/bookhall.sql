-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-05-2019 a las 23:43:02
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bookhall`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actor`
--

DROP TABLE IF EXISTS `actor`;
CREATE TABLE IF NOT EXISTS `actor` (
  `id_Actor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contrasena` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_Actor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cd`
--

DROP TABLE IF EXISTS `cd`;
CREATE TABLE IF NOT EXISTS `cd` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `formato` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cd_ejemplar`
--

DROP TABLE IF EXISTS `cd_ejemplar`;
CREATE TABLE IF NOT EXISTS `cd_ejemplar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_registro` date DEFAULT NULL,
  `id_CD` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_CD` (`id_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `correo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `comentario`, `correo`) VALUES
(8, 'Muy buen software', 'nora.programadora@gmail.com'),
(9, 'No funciona el login del sistema, y la parte de consultas multicampo es sumamente ineficiente', 'extranio@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desempena`
--

DROP TABLE IF EXISTS `desempena`;
CREATE TABLE IF NOT EXISTS `desempena` (
  `codigo_actor` int(11) NOT NULL,
  `ID_rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_actor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

DROP TABLE IF EXISTS `devolucion`;
CREATE TABLE IF NOT EXISTS `devolucion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_empleado` int(11) DEFAULT NULL,
  `id_ejemplar` int(11) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_limite` date DEFAULT NULL,
  `id_prestamo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tarde` bit(1) DEFAULT NULL,
  `pago` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `codigo_empleado` (`codigo_empleado`),
  KEY `id_prestamo` (`id_prestamo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`ID`, `codigo_empleado`, `id_ejemplar`, `fecha_prestamo`, `fecha_limite`, `id_prestamo`, `id_usuario`, `tarde`, `pago`) VALUES
(1, NULL, 6, '2019-05-26', '2019-06-02', 2, 4, NULL, NULL),
(2, NULL, 6, '2019-05-18', '2019-05-25', 4, 3, NULL, NULL),
(3, NULL, 6, '2019-05-18', '2019-05-25', 4, 3, NULL, NULL),
(4, NULL, 6, '2019-05-18', '2019-05-25', 4, 3, NULL, NULL),
(5, NULL, 6, '2019-05-18', '2019-05-25', 4, 3, b'1', 5),
(6, NULL, 6, '2019-05-26', '2019-06-02', 2, 4, b'0', NULL),
(7, NULL, 7, '2019-05-26', '2019-06-02', 5, 5, b'0', NULL),
(8, NULL, 7, '2019-05-26', '2019-06-02', 5, 5, b'0', NULL),
(9, NULL, 8, '2019-05-11', '2019-05-18', 8, 7, b'1', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multa`
--

DROP TABLE IF EXISTS `multa`;
CREATE TABLE IF NOT EXISTS `multa` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `dias_retraso` int(11) DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT NULL,
  `id_devolucion` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_devolucion` (`id_devolucion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodico`
--

DROP TABLE IF EXISTS `periodico`;
CREATE TABLE IF NOT EXISTS `periodico` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `procedencia` varchar(100) DEFAULT NULL,
  `fecha_de_publicacion` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodico_ejemplar`
--

DROP TABLE IF EXISTS `periodico_ejemplar`;
CREATE TABLE IF NOT EXISTS `periodico_ejemplar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_periodico` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_periodico` (`id_periodico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pie_editorial`
--

DROP TABLE IF EXISTS `pie_editorial`;
CREATE TABLE IF NOT EXISTS `pie_editorial` (
  `fecha_de_edicion` date NOT NULL,
  `procedencia` varchar(100) DEFAULT NULL,
  `lugar` varchar(50) DEFAULT NULL,
  `editor` varchar(100) DEFAULT NULL,
  `id_título` int(11) DEFAULT NULL,
  PRIMARY KEY (`fecha_de_edicion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

DROP TABLE IF EXISTS `prestamo`;
CREATE TABLE IF NOT EXISTS `prestamo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` int(11) DEFAULT NULL,
  `codigo_empleado` int(11) DEFAULT NULL,
  `id_ejemplar` int(11) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_limite` date DEFAULT NULL,
  `tipo_articulo` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `codigo_usuario` (`codigo_usuario`),
  KEY `codigo_empleado` (`codigo_empleado`),
  KEY `tipo_articulo` (`tipo_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`ID`, `codigo_usuario`, `codigo_empleado`, `id_ejemplar`, `fecha_prestamo`, `fecha_limite`, `tipo_articulo`) VALUES
(1, 2, NULL, 5, '2019-05-26', '2019-06-02', 1),
(2, 4, NULL, 6, '2019-05-26', '2019-06-02', 1),
(4, 3, NULL, 6, '2019-05-18', '2019-05-25', 1),
(5, 5, NULL, 7, '2019-05-26', '2019-06-02', 1),
(7, 5, NULL, 7, '2019-05-11', '2019-05-18', 1),
(8, 7, NULL, 8, '2019-05-11', '2019-05-18', 1),
(9, 8, NULL, 9, '2019-05-27', '2019-06-03', 1),
(11, 5, NULL, 6, '2019-05-27', '2019-06-03', 1),
(12, 5, NULL, 8, '2019-05-10', '2019-05-17', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revista`
--

DROP TABLE IF EXISTS `revista`;
CREATE TABLE IF NOT EXISTS `revista` (
  `id_titulo` int(11) NOT NULL AUTO_INCREMENT,
  `no_revista` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `procedencia` varchar(100) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  PRIMARY KEY (`id_titulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revista_ejemplar`
--

DROP TABLE IF EXISTS `revista_ejemplar`;
CREATE TABLE IF NOT EXISTS `revista_ejemplar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_registro` date DEFAULT NULL,
  `id_titulo` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_titulo` (`id_titulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_articulo`
--

DROP TABLE IF EXISTS `tipo_articulo`;
CREATE TABLE IF NOT EXISTS `tipo_articulo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_ejemplar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_articulo`
--

INSERT INTO `tipo_articulo` (`ID`, `tipo_ejemplar`) VALUES
(1, 'Libro'),
(2, 'Revista'),
(3, 'Periodico'),
(4, 'Cd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo_ejemplar`
--

DROP TABLE IF EXISTS `titulo_ejemplar`;
CREATE TABLE IF NOT EXISTS `titulo_ejemplar` (
  `id_titulo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `volumen` varchar(100) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `procedencia` varchar(100) DEFAULT NULL,
  `lugar` varchar(100) DEFAULT NULL,
  `fecha_edicion` varchar(10) DEFAULT NULL,
  `editorial` varchar(100) DEFAULT NULL,
  `anio` varchar(5) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_titulo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `titulo_ejemplar`
--

INSERT INTO `titulo_ejemplar` (`id_titulo`, `titulo`, `autor`, `volumen`, `fecha_registro`, `procedencia`, `lugar`, `fecha_edicion`, `editorial`, `anio`, `codigo`) VALUES
(1, 'Estructura de datos II', 'Koffman', '1', '2019-05-07', 'Mc Graw Hill', 'E.U.A chicago', '1998', '', '1972', NULL),
(2, 'Otro', 'Prueba', '2', '2019-05-20', 'Biblioteca del estado', 'Guadalajara', '2009', 'Mc Graw Hill', '1972', NULL),
(3, 'Test', 'Koffman', '1', '2019-05-09', 'Biblioteca del estado', 'tlaquepaque', '1998', 'Mc Graw Hill', '1972', NULL),
(4, 'Test', 'hola', '2', '2019-05-06', 'Test', 'Test', '1998', 'test', '1972', NULL),
(6, 'Quimica', 'Marie Curie', '1', '2019-05-26', 'Biblioteca del estado', 'Paris ', '1998', 'Mc Graw Hill', '1972', '1345778911'),
(7, 'Programacion ', 'Linus Torvalds', '2', '2019-05-26', 'Biblioteca del estado', 'E.U.A chicago', '1998', 'Mc Graw Hill', '2010', '987654321'),
(8, 'Calculo', 'Baldor', '1', '2019-02-04', 'Biblioteca del estado', 'E.U.A chicago', '1998', 'Mc Graw Hill', '2010', '1000000001'),
(9, 'Bases de datos ', 'Morris Coronel', '', '2019-05-27', 'Biblioteca del estado', 'EspaÃ±a', '2006', 'Mc Graw Hill', '1999', '123456777');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `contrasena` varchar(10) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `correo`, `estatus`, `contrasena`, `codigo`, `tipo`) VALUES
(1, '', 'nora.programadora@gmail.com', 'activo', 'quetevalga', '', ''),
(2, 'Nora Aguirre', 'nora.programadora@gmail.com', 'activo', 'quetevalga', '4545346546', 'Licenciatura'),
(3, 'Jorge Guadalupe Padilla de la Torre', 'jorge@gmail.com', 'activo', 'pedrito123', '213500116', 'Licenciatura'),
(4, 'Joaquin Emiliano Gomez Santoyo', 'joaquin@hotmail.com', 'activo', 'hola123', '224589756', 'Licenciatura'),
(5, 'Maria Torres', 'maria.torres@gmail.com', 'activo', 'maria123', '2134000059', 'Licenciatura'),
(7, 'Pedro Perez', 'pedro@gmail.com', 'activo', 'pedrito', '223400059', 'Licenciatura'),
(8, 'Beatriz SÃ¡nchez Cano', 'beatriz@gmail.com', 'activo', 'beti280364', '213400060', 'Licenciatura');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cd_ejemplar`
--
ALTER TABLE `cd_ejemplar`
  ADD CONSTRAINT `cd_ejemplar_ibfk_1` FOREIGN KEY (`id_CD`) REFERENCES `cd` (`ID`);

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`codigo_empleado`) REFERENCES `actor` (`id_Actor`),
  ADD CONSTRAINT `devolucion_ibfk_2` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`ID`);

--
-- Filtros para la tabla `multa`
--
ALTER TABLE `multa`
  ADD CONSTRAINT `multa_ibfk_1` FOREIGN KEY (`id_devolucion`) REFERENCES `devolucion` (`ID`);

--
-- Filtros para la tabla `periodico_ejemplar`
--
ALTER TABLE `periodico_ejemplar`
  ADD CONSTRAINT `periodico_ejemplar_ibfk_1` FOREIGN KEY (`id_periodico`) REFERENCES `periodico` (`ID`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`codigo_empleado`) REFERENCES `actor` (`id_Actor`),
  ADD CONSTRAINT `prestamo_ibfk_3` FOREIGN KEY (`tipo_articulo`) REFERENCES `tipo_articulo` (`ID`);

--
-- Filtros para la tabla `revista_ejemplar`
--
ALTER TABLE `revista_ejemplar`
  ADD CONSTRAINT `revista_ejemplar_ibfk_1` FOREIGN KEY (`id_titulo`) REFERENCES `revista` (`id_titulo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
