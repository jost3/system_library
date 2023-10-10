-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2023 a las 22:46:36
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
-- Base de datos: `hessen_library`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(5) NOT NULL,
  `dni` int(8) NOT NULL,
  `contra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `dni`, `contra`) VALUES
(1, 89765432, 'josue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `dni_est` int(8) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `carrera` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`dni_est`, `nombre`, `carrera`) VALUES
(89764563, 'juan', 'farmacia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` int(3) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `autor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `titulo`, `descripcion`, `autor`) VALUES
(108, 'enfermeria12', 'opcion3', 'wiliam aa'),
(109, 'medicina humana', 'opcion3', 'carlos'),
(110, 'psicoligia 2', 'opcion1', 'Pedro Manuel Perez '),
(111, 'enfermeria1sdfdsfdsf', 'opcion3', 'wiliam'),
(112, 'enfermeriawqewq', 'opcion3', 'wqewqe'),
(113, 'enfermeria', 'opcion3', 'wiliam'),
(114, 'psicoligia 2', 'opcion2', 'dsfdsdsfdsf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id_prest` int(3) NOT NULL,
  `titulo1` varchar(40) NOT NULL,
  `autor1` varchar(40) NOT NULL,
  `descripcion1` varchar(100) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `dni_est` varchar(8) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id_prest`, `titulo1`, `autor1`, `descripcion1`, `estado`, `fecha`, `dni_est`, `nombre`) VALUES
(32, 'PRUEBA 560', 'jcjgc', 'hfhfhfhf', 'OCPUADO', '1232-03-12', '123', '12312312421'),
(33, 'fdhg', 'hggf', 'hgfhgf', 'hgfhgfh', '2022-02-12', '87564576', 'hghgfgfhgfh'),
(34, '123123', 'fgfdgfdgfd', 'dgfdsgfdgfd', 'gfdgfdg', '2023-03-13', '123123', 'dgfdgdgfdgfd'),
(37, 'PRUEBA 560', 'JOSUE', '', 'OCPUADO', '2023-09-14', '34543577', 'maria'),
(38, 'comba', 'jorge', '', 'OCPUADO', '2023-09-15', '87564576', 'juan'),
(47, 'siguiente', 'asdfsdsfg', 'opcion5', '', '0000-00-00', '', 'carlos'),
(48, 'enfermeria', 'JOSUE', 'opcion4', '', '0000-00-00', '', 'tiago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(1) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `contraseña` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`) VALUES
(1, 'hessenAdm', 'epsep23win'),
(1, 'josue', '1010');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`dni_est`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_prest`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id_prest` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
