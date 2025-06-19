-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2025 a las 02:43:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `distribucion_abarrotes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_entrega`
--

CREATE TABLE `detalle_entrega` (
  `id_detalle` int(11) NOT NULL,
  `id_entrega` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_entrega`
--

INSERT INTO `detalle_entrega` (`id_detalle`, `id_entrega`, `id_producto`, `cantidad`) VALUES
(1, 1, 1, 50),
(2, 1, 2, 30),
(3, 2, 3, 20),
(4, 3, 4, 40),
(5, 4, 5, 25),
(6, 5, 6, 60),
(7, 6, 7, 35),
(8, 7, 8, 45),
(9, 8, 9, 30),
(10, 9, 10, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `id_entrega` int(11) NOT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `estado_entrega` enum('Entregado','Pendiente') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`id_entrega`, `id_sucursal`, `fecha_entrega`, `estado_entrega`) VALUES
(1, 1, '2025-05-01', 'Entregado'),
(2, 2, '2025-05-02', 'Pendiente'),
(3, 3, '2025-05-03', 'Entregado'),
(4, 4, '2025-05-04', 'Pendiente'),
(5, 5, '2025-05-05', 'Entregado'),
(6, 6, '2025-05-06', 'Pendiente'),
(7, 7, '2025-05-07', 'Entregado'),
(8, 8, '2025-05-08', 'Pendiente'),
(9, 9, '2025-05-09', 'Entregado'),
(10, 10, '2025-05-10', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `unidad_medida` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `unidad_medida`) VALUES
(1, 'Frijoles', 'Frijoles negros en bolsa', 'kg'),
(2, 'Aceite', 'Aceite vegetal 1L', 'litro'),
(3, 'Arroz', 'Arroz blanco pulido', 'kg'),
(4, 'Azúcar', 'Azúcar estándar', 'kg'),
(5, 'Sal', 'Sal refinada', 'kg'),
(6, 'Harina', 'Harina de trigo', 'kg'),
(7, 'Cereal', 'Cereal de maíz', 'caja'),
(8, 'Leche', 'Leche entera 1L', 'litro'),
(9, 'Atún', 'Atún enlatado', 'lata'),
(10, 'Sopa', 'Sopa de pasta', 'paquete');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `nombre`, `direccion`, `ciudad`, `telefono`) VALUES
(1, 'Sucursal Centro', 'Av. Hidalgo 123', 'Ciudad de México', '5551234567'),
(2, 'Sucursal Norte', 'Calle 20 #34', 'Monterrey', '8187654321'),
(3, 'Sucursal Sur', 'Av. Reforma 4321', 'Puebla', '2227659876'),
(4, 'Sucursal Este', 'Blvd. del Sol 56', 'Guadalajara', '3334567890'),
(5, 'Sucursal Oeste', 'Calle Palmas 99', 'Toluca', '7221237890'),
(6, 'Sucursal Morelos', 'Av. Morelos 120', 'Cuernavaca', '7778889900'),
(7, 'Sucursal Altura', 'Camino Real 789', 'León', '4771122334'),
(8, 'Sucursal Pacífico', 'Malecón 654', 'Mazatlán', '6699988776'),
(9, 'Sucursal Industrial', 'Zona Ind. 33', 'Querétaro', '4429988776'),
(10, 'Sucursal Lago', 'Lago Azul 112', 'Cancún', '9981234567');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_entrega`
--
ALTER TABLE `detalle_entrega`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_entrega` (`id_entrega`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_entrega`
--
ALTER TABLE `detalle_entrega`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_entrega`
--
ALTER TABLE `detalle_entrega`
  ADD CONSTRAINT `detalle_entrega_ibfk_1` FOREIGN KEY (`id_entrega`) REFERENCES `entrega` (`id_entrega`),
  ADD CONSTRAINT `detalle_entrega_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `entrega_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
