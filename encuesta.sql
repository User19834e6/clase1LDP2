-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2022 a las 00:53:51
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuesta`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearRespuesta` (IN `_nombre` VARCHAR(25), IN `_fecha` DATE, IN `_color` VARCHAR(25), IN `_mascota` VARCHAR(25))   BEGIN 
	INSERT INTO respuestas (nombre, fecha, color, mascota) VALUES (_nombre, _fecha, _color, _mascota);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarRespuesta` (IN `_fechaIni` DATE, IN `_fechaFin` DATE)   BEGIN
	SELECT * FROM respuestas WHERE fecha > _fechaIni AND fecha < _fechaFin;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `fecha` date NOT NULL,
  `color` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `mascota` varchar(25) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `nombre`, `fecha`, `color`, `mascota`) VALUES
(1, 'prueba]', '2022-08-19', '#FF00FF', 'gato'),
(2, 'Prueba', '2022-08-19', '#3a6c28', 'perro'),
(3, '&lt;script&gt;', '2022-08-19', '#ec0909', 'gato'),
(4, 'Prueba', '2022-08-21', '#ffccaa', 'perro'),
(5, 'Prueba', '2022-08-20', '#b01111', 'gato'),
(6, '', '0000-00-00', '#000000', ''),
(7, '', '0000-00-00', '#000000', ''),
(8, '', '0000-00-00', '#000000', ''),
(9, 'TestC', '2022-08-06', '#14470a', 'perro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
