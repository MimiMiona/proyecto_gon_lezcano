-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2025 a las 21:39:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rebobinar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `activo` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`, `activo`) VALUES
(1, 'Terror', 1),
(2, 'Comedia', 1),
(3, 'Ciencia Ficcion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensaje` varchar(300) NOT NULL,
  `eliminado` varchar(10) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `descripcion`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_prod` varchar(100) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `precio_vta` float(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `eliminado` varchar(10) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_prod`, `imagen`, `categoria_id`, `precio`, `precio_vta`, `stock`, `stock_min`, `eliminado`) VALUES
(1, 'Things to Come', '1749065674_4a5da7da1132fea62921.jpg', 3, 1000.00, 2000.00, 10, 1, 'SI'),
(2, 'Battle Of The Worlds', '1749065704_7e21a0fb85564b4aeffc.jpg', 3, 1000.00, 2000.00, 10, 1, 'NO'),
(3, 'House on Haunted Hill', '1749065730_a86c680863c55b71d781.jpg', 1, 1000.00, 2000.00, 10, 1, 'NO'),
(4, 'Nosferatu', '1749065757_2fdbc5181d92418ea40e.jpg', 1, 1000.00, 2000.00, 10, 1, 'NO'),
(5, 'The Ghoul', '1749065785_9644cd8cff78f2a9df2b.jpg', 1, 1000.00, 2000.00, 10, 1, 'NO'),
(6, 'The Great Dictator', '1749065813_1be18e1096b0bdb84aa1.jpg', 2, 1000.00, 2000.00, 10, 1, 'NO'),
(7, 'Duck Soup', '1749065846_993e7737cff769c675c5.jpg', 2, 1000.00, 2000.00, 10, 1, 'NO'),
(8, 'My Man Godfrey', '1749065894_b9e36c572dbfa9f73ed6.jpg', 2, 1000.00, 2000.00, 10, 1, 'NO'),
(9, '20,000 Leagues Under The Sea', '1749065964_62c5b81b1d64b37a05b3.jpg', 3, 1000.00, 2000.00, 10, 1, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `baja` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `email`, `pass`, `perfil_id`, `baja`) VALUES
(1, 'Jose', 'Gomez', 'jose_gomez', 'jose123@gmail.com', '$2y$10$qirYWr4XmJKkKtx/OJQe5.cTraCqvKA6lUW1M0m1f0SAhBeKq992y', 2, 'NO'),
(2, 'Maria', 'Maidana', 'maidanamari', 'mariamaidana33@gmail.com', '$2y$10$w3rZkNYTqq.WyFbTobRBfOaoIrfxsodOnb0Y5BkERdNS8ZA5QnI3m', 2, 'NO'),
(3, 'Sabrina', 'Ramirez', 'Sabri_12', 'Sasabrina123@gmail.com', '$2y$10$71P0eZVmJf30aNmLALlUC.dvv8G5XM2OddQIEaiqlrXfx.DtK/PPm', 2, 'NO'),
(4, 'Juan', 'Gomez', 'juan12345', 'juan1221@gmail.com', '$2y$10$0E1ER9hQYoEuH0ee2mqIw.QTt/Qlf9Dsdw5pF/f4YdAWDaHhnlKzy', 1, 'NO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
