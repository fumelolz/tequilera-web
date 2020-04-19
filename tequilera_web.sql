-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2020 a las 01:25:38
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tequilera_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id_almacen` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `encargado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_almacen`, `tipo`, `encargado`) VALUES
(1, 1, 10),
(2, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_persona`) VALUES
(4, 4),
(5, 5),
(6, 6),
(7, 12),
(8, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_orden_prod`
--

CREATE TABLE `detail_orden_prod` (
  `id_orden` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detail_orden_prod`
--

INSERT INTO `detail_orden_prod` (`id_orden`, `id_producto`, `cantidad`) VALUES
(1, 1, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_pedido`
--

CREATE TABLE `detail_pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_insumo` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detail_pedido`
--

INSERT INTO `detail_pedido` (`id_pedido`, `id_insumo`, `cantidad`) VALUES
(2, 1, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_t_insumo`
--

CREATE TABLE `detail_t_insumo` (
  `id_insumo` int(11) NOT NULL,
  `id_transf_insumo` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_t_producto`
--

CREATE TABLE `detail_t_producto` (
  `id_producto` int(11) NOT NULL,
  `id_transf_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detail_t_producto`
--

INSERT INTO `detail_t_producto` (`id_producto`, `id_transf_producto`, `cantidad`) VALUES
(1, 1, 25),
(1, 18, 5),
(1, 19, 20),
(1, 24, 25),
(1, 25, 25),
(1, 30, 600),
(2, 3, 30),
(2, 4, 28),
(2, 20, 2),
(3, 30, 600),
(4, 7, 90),
(4, 8, 40),
(4, 21, 50),
(5, 30, 800),
(6, 5, 5),
(6, 6, 90),
(6, 22, 95),
(6, 24, 650),
(6, 26, 650),
(6, 30, 150),
(8, 1, 22),
(8, 2, 10),
(8, 23, 12),
(8, 24, 10),
(8, 25, 10),
(8, 27, 90),
(8, 28, 80),
(8, 29, 10),
(8, 30, 90),
(10, 30, 500),
(14, 9, 50),
(14, 23, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_venta`
--

CREATE TABLE `detail_venta` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detail_venta`
--

INSERT INTO `detail_venta` (`id_venta`, `id_producto`, `cantidad`) VALUES
(1, 1, 1),
(1, 2, 1),
(4, 1, 2),
(5, 1, 1),
(6, 2, 1),
(6, 4, 1),
(7, 1, 1),
(7, 2, 1),
(8, 1, 1),
(9, 1, 6),
(10, 1, 3),
(11, 1, 3),
(12, 1, 1),
(13, 1, 3),
(14, 1, 5),
(14, 2, 1),
(16, 1, 5),
(17, 1, 5),
(18, 1, 20),
(19, 2, 2),
(20, 4, 50),
(21, 6, 95),
(22, 8, 12),
(22, 14, 50),
(23, 1, 25),
(23, 6, 650),
(23, 8, 10),
(24, 6, 650),
(25, 8, 80),
(26, 8, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `id_insumo` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `unidad` int(11) DEFAULT NULL,
  `cant_unidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`id_insumo`, `descripcion`, `unidad`, `cant_unidad`) VALUES
(1, 'botellas de vidrio', 1, 12),
(2, 'tapon', 2, 100),
(3, 'caja/regalo', 3, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_produccion`
--

CREATE TABLE `orden_produccion` (
  `id_orden_produccion` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `solicitante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden_produccion`
--

INSERT INTO `orden_produccion` (`id_orden_produccion`, `fecha`, `fecha_entrega`, `solicitante`) VALUES
(1, '2020-03-09', '2020-03-13', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_usuario`, `id_proveedor`, `fecha`) VALUES
(2, 10, 3, '2020-03-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `rfc` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `address`, `mail`, `rfc`) VALUES
(4, 'Manuel Chavez Gonzalez', 'Miguel Garcia de la Herran, 280, Hidalgo.', 'omomuxad-7666@yopmail.com', 'CAGM6406181Y9'),
(5, 'Felipe Camargo Llama', 'Juan Pujol, 23, CDMX.', 'hymehattupp-2234@yopmail.com', 'CALF750228LK7'),
(6, 'Alvaro de la O Lozan', 'Caidos de la Division Azul, 56, Puebla.', 'refusynah-4318@yopmail.com', 'OLAL701201R94'),
(9, 'Mario Sanchez de la Cruz', 'General Kirkpatrick, 70, Veracruz.', 'illekappigo-6648@yopmail.com', 'SAGM690224FL0'),
(10, 'Antonio Jimenez Ponce', 'Crucero Baleares, 145, Morelos.', 'ydyfossu-2627@yopmail.com', 'JIPA770808M40'),
(12, 'Yolanda Urcina Macedo', 'Callejon del mirador #27', 'yolanda@hotmail.com', 'AWDADWAWDA'),
(13, 'Daniel Magadan', 'Callejon del mirador #27', 'dany_magadan@hotmail.com', 'MAUK950919H'),
(17, 'Abdiel Reyez', 'Callejon del mirador #27', 'dany_magadan@hotmail.com', 'AWDAWDAWDWA'),
(19, 'Daniel Magadan', 'Callejon del mirador #27', 'dany_magadan@hotmail.com', 'MAUK950919H'),
(20, 'Regina del Paso', 'Tehuantepec #27', 'arel@arel.com.mx', 'AWDAWDAWD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phone_persona`
--

CREATE TABLE `phone_persona` (
  `id_phone` int(11) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `phone_persona`
--

INSERT INTO `phone_persona` (`id_phone`, `telefono`, `celular`, `id_persona`) VALUES
(1, '7621013519', '7626222295', 19),
(2, '7621013591', '1659626291', 17),
(3, '1234567896', '1561181681', 17),
(4, '681816818181', '651681681818', 17),
(6, '123181818', '123456', 4),
(7, '1234567890', '6515165', 4),
(9, '681861861181', '65161658168', 4),
(18, '121212', '123123', 9),
(19, '7621013519', '', 20),
(20, '', '84598489', 20),
(21, '', '51561515', 4),
(22, '', '3423423424', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `presentacion` varchar(20) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `descripcion`, `presentacion`, `precio`, `img`) VALUES
(1, 'Río negro blanco', '750ml', '200', 'vistas/img/productos/Río negro blanco/493.jpg'),
(2, 'Río negro reposado', '750ml', '250', 'vistas/img/productos/Río negro reposado/793.jpg'),
(3, 'Querida', '750ml', '250', NULL),
(4, 'Malquerida', '750ml', '300', NULL),
(5, 'Real del sur', '750ml', '100', NULL),
(6, 'Jarabe de agave ', '750ml', '100', NULL),
(7, 'Crema de agave/ Pistache', '250ml', '200', NULL),
(8, 'Crema de agave/ cafe', '250ml', '200', NULL),
(9, 'Crema de agave/ Pinon', '250ml', '200', NULL),
(10, 'Crema de agave/ PinaCoco', '250ml', '200', NULL),
(11, 'Crema de agave/ Especial', '250ml', '200', NULL),
(12, 'adwawda', '950 ml', '8946', NULL),
(13, 'Majin Vegueta', 'Muneco 3D', '3500', 'vistas/img/productos/Majin Vegueta/680.jpg'),
(14, 'LOL', 'LOL', '50', 'vistas/img/productos/LOL/401.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `id_persona`) VALUES
(3, 9),
(4, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_almacen`
--

CREATE TABLE `tipo_almacen` (
  `id_tipo_almacen` int(11) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_almacen`
--

INSERT INTO `tipo_almacen` (`id_tipo_almacen`, `tipo`) VALUES
(1, 'Productos'),
(2, 'Insumos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento`
--

CREATE TABLE `tipo_movimiento` (
  `id_clasificacion` int(11) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_movimiento`
--

INSERT INTO `tipo_movimiento` (`id_clasificacion`, `descripcion`) VALUES
(3, 'Entrada'),
(4, 'Salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `tipo`) VALUES
(1, 'Administrativo'),
(2, 'Operativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferencia_insumo`
--

CREATE TABLE `transferencia_insumo` (
  `id_transf_insumo` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `movimiento` int(11) DEFAULT NULL,
  `almacen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `transferencia_insumo`
--

INSERT INTO `transferencia_insumo` (`id_transf_insumo`, `fecha`, `hora`, `movimiento`, `almacen`) VALUES
(1, '2020-03-09', '15:33:00', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferencia_producto`
--

CREATE TABLE `transferencia_producto` (
  `id_transf_producto` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `clasificacion` int(11) DEFAULT NULL,
  `almacen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `transferencia_producto`
--

INSERT INTO `transferencia_producto` (`id_transf_producto`, `fecha`, `hora`, `clasificacion`, `almacen`) VALUES
(1, '2020-04-12', '05:27:45', 3, 1),
(2, '2020-04-12', '08:35:00', 4, 1),
(3, '2020-04-12', '20:54:00', 3, 2),
(4, '2020-04-12', '08:55:00', 4, 2),
(5, '2020-04-12', '21:20:00', 3, 1),
(6, '2020-04-12', '21:21:00', 3, 1),
(7, '2020-04-12', '22:20:00', 3, 1),
(8, '2020-04-12', '22:21:00', 4, 1),
(9, '2020-04-16', '17:22:00', 3, 1),
(10, '2020-04-18', '13:10:33', 4, 1),
(11, '2020-04-18', '13:15:03', 4, 1),
(12, '2020-04-18', '13:18:16', 4, 1),
(13, '2020-04-18', '13:18:54', 4, 1),
(14, '2020-04-18', '13:19:29', 4, 1),
(15, '2020-04-18', '14:04:54', 4, 1),
(16, '2020-04-18', '14:07:11', 4, 1),
(17, '2020-04-18', '14:10:54', 4, 1),
(18, '2020-04-18', '16:05:48', 4, 1),
(19, '2020-04-18', '16:21:52', 4, 1),
(20, '2020-04-18', '16:22:04', 4, 1),
(21, '2020-04-18', '16:23:21', 4, 1),
(22, '2020-04-18', '17:19:56', 4, 1),
(23, '2020-04-18', '17:20:10', 4, 1),
(24, '2020-04-18', '19:10:12', 3, 1),
(25, '2020-04-18', '17:40:49', 4, 1),
(26, '2020-04-18', '18:07:17', 4, 1),
(27, '2020-04-19', '11:10:12', 3, 1),
(28, '2020-04-19', '00:56:46', 4, 1),
(29, '2020-04-19', '14:08:09', 4, 1),
(30, '2020-04-19', '18:04:12', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id_unidad` int(11) NOT NULL,
  `unidad` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id_unidad`, `unidad`) VALUES
(1, 'Caja'),
(2, 'Bolsa'),
(3, 'Paquete');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `passwd` varchar(70) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `img` varchar(80) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `usuario`, `passwd`, `tipo`, `img`, `estado`, `ultimo_login`, `fecha`) VALUES
(5, 'lol', 'grast', 'zevur', 1, '', 0, '0000-00-00 00:00:00', '2020-04-16 17:43:40'),
(10, NULL, 'admin', 'admin', 1, NULL, 1, '2020-03-10 20:08:23', '2020-04-16 17:39:59'),
(12, 'Yolanda Urcina Macedo', 'yolanda', 'yolanda', 1, 'vistas/img/usuarios/yolanda/108.jpg', 1, '2020-03-11 09:17:46', '2020-04-16 17:39:58'),
(18, 'Daniel Magadan', 'magadan', '$2a$07$asxx54ahjppf45sd87a5auwDZV/O0xJK5flkiwHhlt67Y6PNnE4Cq', 1, 'vistas/img/usuarios/magadan/348.png', 1, '2020-04-19 14:07:50', '2020-04-19 14:07:50'),
(20, 'Faustino Magadan', 'faustino', '$2a$07$asxx54ahjppf45sd87a5auMnvguyEG4TUXMS0lgfGS8BokSElr81e', 2, NULL, 1, '2020-03-14 14:44:45', '2020-04-16 17:39:57'),
(21, 'Juan Carlos Magadan', 'carlos', '$2a$07$asxx54ahjppf45sd87a5auXaW5n/KLY/bEvEkjrWiw6hTlwjyTGja', 1, NULL, 1, NULL, '2020-04-16 17:39:56'),
(22, 'Juan Carlos Magadan', 'ironman32', '$2a$07$asxx54ahjppf45sd87a5auGD.G7H8Smda9QuzdEJEiZ.SRUJDwAN.', 1, 'vistas/img/usuarios/ironman32/693.jpg', 1, NULL, '2020-04-16 17:39:55'),
(23, 'Rodrigo Sandoval Gonzalez', 'rodrigosik', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 1, 'vistas/img/usuarios/rodrigosik/999.png', 1, '2020-04-16 17:39:45', '2020-04-16 17:39:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `iva` int(11) DEFAULT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `total` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_usuario`, `id_cliente`, `fecha`, `hora`, `iva`, `subtotal`, `total`) VALUES
(1, 18, 4, '2020-04-17', '21:18:59', 16, '450', '522'),
(2, 18, 4, '2020-04-17', '21:33:22', 16, '0', '0'),
(3, 18, 4, '2020-04-17', '21:33:50', 16, '0', '0'),
(4, 18, 5, '2020-04-17', '22:36:56', 16, '400', '464'),
(5, 18, 5, '2020-04-18', '00:02:45', 16, '200', '232'),
(6, 18, 7, '2020-04-18', '00:04:00', 16, '0', '0'),
(7, 18, 6, '2020-04-18', '13:08:29', 16, '450', '522'),
(8, 18, 6, '2020-04-18', '13:09:52', 16, '200', '232'),
(9, 18, 6, '2020-04-18', '13:10:33', 16, '1200', '1392'),
(10, 18, 5, '2020-04-18', '13:15:03', 16, '600', '696'),
(11, 18, 5, '2020-04-18', '13:18:16', 16, '600', '696'),
(12, 18, 4, '2020-04-18', '13:18:54', 16, '200', '232'),
(13, 18, 5, '2020-04-18', '13:19:29', 16, '600', '696'),
(14, 18, 5, '2020-04-18', '14:04:54', 16, '1000', '1160'),
(15, 18, 4, '2020-04-18', '14:07:11', 16, '1050', '1218'),
(16, 18, 5, '2020-04-18', '14:10:54', 16, '1000', '1160'),
(17, 18, 5, '2020-04-18', '16:05:48', 16, '1000', '1160'),
(18, 18, 5, '2020-04-18', '16:21:52', 16, '4000', '4640'),
(19, 18, 8, '2020-04-18', '16:22:04', 16, '500', '580'),
(20, 18, 5, '2020-04-18', '16:23:21', 16, '15000', '17400'),
(21, 18, 5, '2020-04-18', '17:19:56', 16, '9500', '11020'),
(22, 18, 5, '2020-04-18', '17:20:10', 16, '4900', '5684'),
(23, 18, 4, '2020-04-18', '17:40:49', 16, '72000', '83520'),
(24, 18, 5, '2020-04-18', '18:07:17', 16, '65000', '75400'),
(25, 18, 4, '2020-04-19', '00:56:46', 16, '16000', '18560'),
(26, 18, 5, '2020-04-19', '14:08:09', 16, '2000', '2320');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id_almacen`),
  ADD KEY `tipo` (`tipo`),
  ADD KEY `encargado` (`encargado`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `detail_orden_prod`
--
ALTER TABLE `detail_orden_prod`
  ADD PRIMARY KEY (`id_orden`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detail_pedido`
--
ALTER TABLE `detail_pedido`
  ADD PRIMARY KEY (`id_pedido`,`id_insumo`),
  ADD KEY `id_insumo` (`id_insumo`);

--
-- Indices de la tabla `detail_t_insumo`
--
ALTER TABLE `detail_t_insumo`
  ADD PRIMARY KEY (`id_insumo`,`id_transf_insumo`),
  ADD KEY `id_transf_insumo` (`id_transf_insumo`);

--
-- Indices de la tabla `detail_t_producto`
--
ALTER TABLE `detail_t_producto`
  ADD PRIMARY KEY (`id_producto`,`id_transf_producto`),
  ADD KEY `id_transf_producto` (`id_transf_producto`);

--
-- Indices de la tabla `detail_venta`
--
ALTER TABLE `detail_venta`
  ADD PRIMARY KEY (`id_venta`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`id_insumo`),
  ADD KEY `unidad` (`unidad`);

--
-- Indices de la tabla `orden_produccion`
--
ALTER TABLE `orden_produccion`
  ADD PRIMARY KEY (`id_orden_produccion`),
  ADD KEY `solicitante` (`solicitante`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `phone_persona`
--
ALTER TABLE `phone_persona`
  ADD PRIMARY KEY (`id_phone`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `tipo_almacen`
--
ALTER TABLE `tipo_almacen`
  ADD PRIMARY KEY (`id_tipo_almacen`);

--
-- Indices de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  ADD PRIMARY KEY (`id_clasificacion`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `transferencia_insumo`
--
ALTER TABLE `transferencia_insumo`
  ADD PRIMARY KEY (`id_transf_insumo`),
  ADD KEY `clasificacion` (`movimiento`),
  ADD KEY `almacen` (`almacen`);

--
-- Indices de la tabla `transferencia_producto`
--
ALTER TABLE `transferencia_producto`
  ADD PRIMARY KEY (`id_transf_producto`),
  ADD KEY `clasificacion` (`clasificacion`),
  ADD KEY `almacen` (`almacen`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id_unidad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `venta_id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id_almacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `id_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `orden_produccion`
--
ALTER TABLE `orden_produccion`
  MODIFY `id_orden_produccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `phone_persona`
--
ALTER TABLE `phone_persona`
  MODIFY `id_phone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_almacen`
--
ALTER TABLE `tipo_almacen`
  MODIFY `id_tipo_almacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  MODIFY `id_clasificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transferencia_insumo`
--
ALTER TABLE `transferencia_insumo`
  MODIFY `id_transf_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `transferencia_producto`
--
ALTER TABLE `transferencia_producto`
  MODIFY `id_transf_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `almacen_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_almacen` (`id_tipo_almacen`),
  ADD CONSTRAINT `almacen_ibfk_2` FOREIGN KEY (`encargado`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `detail_orden_prod`
--
ALTER TABLE `detail_orden_prod`
  ADD CONSTRAINT `detail_orden_prod_ibfk_1` FOREIGN KEY (`id_orden`) REFERENCES `orden_produccion` (`id_orden_produccion`),
  ADD CONSTRAINT `detail_orden_prod_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `detail_pedido`
--
ALTER TABLE `detail_pedido`
  ADD CONSTRAINT `detail_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `detail_pedido_ibfk_2` FOREIGN KEY (`id_insumo`) REFERENCES `insumo` (`id_insumo`);

--
-- Filtros para la tabla `detail_t_insumo`
--
ALTER TABLE `detail_t_insumo`
  ADD CONSTRAINT `detail_t_insumo_ibfk_1` FOREIGN KEY (`id_transf_insumo`) REFERENCES `transferencia_insumo` (`id_transf_insumo`),
  ADD CONSTRAINT `detail_t_insumo_ibfk_2` FOREIGN KEY (`id_insumo`) REFERENCES `insumo` (`id_insumo`);

--
-- Filtros para la tabla `detail_t_producto`
--
ALTER TABLE `detail_t_producto`
  ADD CONSTRAINT `detail_t_producto_ibfk_1` FOREIGN KEY (`id_transf_producto`) REFERENCES `transferencia_producto` (`id_transf_producto`),
  ADD CONSTRAINT `detail_t_producto_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `detail_venta`
--
ALTER TABLE `detail_venta`
  ADD CONSTRAINT `detail_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`),
  ADD CONSTRAINT `detail_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD CONSTRAINT `insumo_ibfk_1` FOREIGN KEY (`unidad`) REFERENCES `unidad` (`id_unidad`);

--
-- Filtros para la tabla `orden_produccion`
--
ALTER TABLE `orden_produccion`
  ADD CONSTRAINT `orden_produccion_ibfk_1` FOREIGN KEY (`solicitante`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`);

--
-- Filtros para la tabla `phone_persona`
--
ALTER TABLE `phone_persona`
  ADD CONSTRAINT `phone_persona_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `transferencia_insumo`
--
ALTER TABLE `transferencia_insumo`
  ADD CONSTRAINT `transferencia_insumo_ibfk_1` FOREIGN KEY (`movimiento`) REFERENCES `tipo_movimiento` (`id_clasificacion`),
  ADD CONSTRAINT `transferencia_insumo_ibfk_2` FOREIGN KEY (`almacen`) REFERENCES `almacen` (`id_almacen`);

--
-- Filtros para la tabla `transferencia_producto`
--
ALTER TABLE `transferencia_producto`
  ADD CONSTRAINT `transferencia_producto_ibfk_1` FOREIGN KEY (`clasificacion`) REFERENCES `tipo_movimiento` (`id_clasificacion`),
  ADD CONSTRAINT `transferencia_producto_ibfk_2` FOREIGN KEY (`almacen`) REFERENCES `almacen` (`id_almacen`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `venta_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
