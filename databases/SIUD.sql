-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-06-2023 a las 23:47:44
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
-- Base de datos: `SIUD`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `email`, `password`) VALUES
(1, 'leidy-vanesa@outlook.es', '$2y$10$slhxKpBs3X.0Ylbt4OgIvOWWMFCOOVOeQrZM/UZuUP.V0NDC4QP1i'),
(2, 'leidy-vanesa@outlook.es', '$2y$10$slhxKpBs3X.0Ylbt4OgIvOWWMFCOOVOeQrZM/UZuUP.V0NDC4QP1i'),
(3, 'leidy-vanesa@outlook.es', '$2y$10$Qp2akYYpuPcHSaeQPNeI4.LA3SR3NbxtOLyGA3D.Zzmk4NtMjNQQ2'),
(4, 'leidy-vanesa@outlook.es', '$2y$10$Qp2akYYpuPcHSaeQPNeI4.LA3SR3NbxtOLyGA3D.Zzmk4NtMjNQQ2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
